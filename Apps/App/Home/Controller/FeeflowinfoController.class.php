<?php

namespace Home\Controller;

use Think\Controller;

/**
 * 话费流量明细
 * User: cyl
 */
class FeeflowinfoController extends IndexController
{
    /*
     *话费流量明细列表
     */
    public function feeflowinfoindex()
    {
        $search = I();
        if ($search != null) {
            //会员名称
            if ($search['username'] != null) {
                $map['u.username'] = array('like', '%' . $search['username'] . '%');
            }
            //类型
            if ($search['type'] != null) {
                $map['tfr.type'] = $search['type'];
            }
            //充值数量或金额
            if ($search['number_l'] != null) {
                $map['tfr.number'] = array('EGT', $search['number_l']);
            }
            if ($search['number_h'] != null) {
                $map['tfr.number'] = array('ELT', $search['number_h']);
            }
            if ($search['number_l'] != null && $search['number_h'] != null) {
                $map['tfr.number'] = array('between', array($search['number_l'], $search['number_h']));
            }
            //手机号码
            if ($search['tel'] != null) {
                $map['tfr.tel'] = array('like', '%' . $search['tel'] . '%');
            }
            //充值状态
            if ($search['state'] != null) {
                $map['tfr.state'] = $search['state'];
            }
            $data = M()->table('__TELEPHONE_FARE_RECORD__ tfr')
                ->where($map)
                ->join('left join __USER__ u on u.id=tfr.user_id')
                ->order('tfr.state asc,tfr.time asc')
                ->field('tfr.*,u.username')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__TELEPHONE_FARE_RECORD__ tfr')
                ->where($map)
                ->join('left join __USER__ u on u.id=tfr.user_id')
                ->count();
        } else {
            $data = M()->table('__TELEPHONE_FARE_RECORD__ tfr')
                ->join('left join __USER__ u on u.id=tfr.user_id')
                ->order('tfr.state asc,tfr.time asc')
                ->field('tfr.*,u.username')
                ->page($_GET['p'] . ',20')
                ->select();
//            pp($data);
            $count = M('telephone_fare_record')->count();
        }
        // pp($data);
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    /*
     *话费流量充值
     */
    public function feeflow_recharge()
    {
        //引入千米sdk
        header("Content-type:text/html; charset=utf-8");
        require "./ThinkPHP/Library/Vendor/Qianmi/OpenSdk.php";
        $loader                = new \QmLoader();
        $loader->autoload_path = array(CURRENT_FILE_DIR . DS . "client");
        $loader->init();
        $loader->autoload();
        //初始化
        $client            = new \OpenClient();
        $client->appKey    = '10001544';
        $client->appSecret = 'e6L8XM6YcpYeB5NNGsqljuMX62AsaWDR';
        $accessToken       = 'c03fdca9639e42b4ba6903ea1b86cfbc';

        $id           = I('id'); //充值记录的id
        $type         = M('telephone_fare_record')->where(array('id' => $id))->getField('type'); //充值类型 0话费 1流量
        $order_number = M('telephone_fare_record')->where(array('id' => $id))->getField('order_number'); //内部订单号
        //查询号码和充值金额(流量数量)
        $phone  = M('telephone_fare_record')->where(array('order_number' => $order_number, 'is_pay' => 1))->getField('tel');
        $amount = M('telephone_fare_record')->where(array('order_number' => $order_number, 'is_pay' => 1))->getField('number');
        // pp($type);
        //话费
        if ($type == 0) {
            //调用话费查询商品接口 返回商品id
            $req = new \RechargeMobileGetItemInfoRequest();
            $req->setMobileNo($phone);
            $req->setRechargeAmount($amount);
            $res = $client->execute($req, $accessToken);
            $res = json_decode(json_encode($res), true); //json转为数组

            if ($res) {
                $itemId = $res['itemId']; //充值系统的商品id
                $req1   = new \RechargeMobileCreateBillRequest();
                $req1->setItemId($itemId);
                $req1->setMobileNo($phone);
                $req1->setRechargeAmount($amount);
                $res1 = $client->execute($req1, $accessToken);
                $res1 = json_decode(json_encode($res1), true); //json转为数组

                if ($res1) {
                    $billId                  = $res1['billId']; //充值系统的订单号
                    $data1['feeflow_number'] = $billId;
                    M('telephone_fare_record')->where(array('order_number' => $order_number, 'is_pay' => 1))->save($data1);
                    //查询充值订单的支付状态 payState
                    $req3 = new \RechargeOrderInfoRequest();
                    $req3->setBillId($billId);
                    $res3 = $client->execute($req3, $accessToken);
                    $res3 = json_decode(json_encode($res3), true); //json转为数组

                    if ($res3) {
                        $order_payState = $res3['payState']; // 1已付款 0未付款

                        if ($order_payState == 1) {
                            //充值系统中此订单已付款 等待充值到账
                            $data2['remark'] = $billId . '的订单系统正在充值中...请等待';
                            M('telephone_fare_record')->where(array('order_number' => $order_number, 'is_pay' => 1))->save($data2);
                        } else {
                            //调用接口进行话费充值
                            $req2 = new \RechargeBasePayBillRequest();
                            $req2->setBillId($billId);
                            $res2 = $client->execute($req2, $accessToken);
                            $res2 = json_decode(json_encode($res2), true); //json转为数组

                            if ($res2) {
                                $payState = $res2['payState']; // 1已付款 0未付款
                                // $test['test'] = $res2['payState'];
                                // $test['text'] = $billId; //(到这边都没问题了)
                                // M('test')->add($test);
                                if ($payState == 1) {
                                    $data2['remark'] = $billId . '的订单系统正在充值中...';
                                    M('telephone_fare_record')->where(array('order_number' => $order_number, 'is_pay' => 1))->save($data2);
                                }
                            }
                        }
                    }
                }
            }
        } else {
            //流量
            //调用流量查询商品接口 返回商品id
            $req = new \MobileFlowItemsList2Request();
            $req->setMobileNo($phone);
            $req->setFlow($amount . "M");
            $res = $client->execute($req, $accessToken);
            $res = json_decode(json_encode($res), true); //json转为数组

            if ($res) {
                $itemId = $res['items']['item'][0]['itemId']; //充值系统的商品id
                $req1   = new \MobileFlowCreateBillRequest();
                $req1->setItemId($itemId);
                $req1->setMobileNo($phone);
                $res1 = $client->execute($req1, $accessToken);
                $res1 = json_decode(json_encode($res1), true); //json转为数组

                if ($res1) {
                    $billId                  = $res1['orderDetailInfo']['billId']; //充值系统的订单号
                    $data1['feeflow_number'] = $billId;
                    M('telephone_fare_record')->where(array('order_number' => $order_number, 'is_pay' => 1))->save($data1);
                    //查询充值订单的支付状态 payState
                    $req3 = new \RechargeOrderInfoRequest();
                    $req3->setBillId($billId);
                    $res3 = $client->execute($req3, $accessToken);
                    $res3 = json_decode(json_encode($res3), true); //json转为数组

                    if ($res3) {
                        $order_payState = $res3['payState']; // 1已付款 0未付款

                        if ($order_payState == 1) {
                            //充值系统中此订单已付款 等待充值到账
                            $data2['remark'] = $billId . '的订单系统正在充值中...请等待';
                            M('telephone_fare_record')->where(array('order_number' => $order_number, 'is_pay' => 1))->save($data2);
                        } else {
                            //调用接口进行流量充值
                            $req2 = new \RechargeBasePayBillRequest();
                            $req2->setBillId($billId);
                            $res2 = $client->execute($req2, $accessToken);
                            $res2 = json_decode(json_encode($res2), true); //json转为数组

                            if ($res2) {
                                $payState = $res2['payState']; // 1已付款 0未付款

                                if ($payState == 1) {
                                    $data2['remark'] = $billId . '的订单系统正在充值中...';
                                    M('telephone_fare_record')->where(array('order_number' => $order_number, 'is_pay' => 1))->save($data2);
                                }
                            }
                        }
                    }
                }
            }
        }
        $this->success('操作成功！', U('/home/feeflowinfo/feeflowinfoindex'));
    }

}
