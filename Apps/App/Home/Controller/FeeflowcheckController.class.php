<?php

namespace Home\Controller;

use Think\Controller;

/**
 * 话费流量明细订单轮询控制器(无权限) 配合Linux 定时任务
 * User: cyl
 */
class FeeflowcheckController extends Controller
{
    /*
     *执行话费流量明细订单轮询
     */
    public function index()
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
        //查出需要遍历的话费流量订单数据
        $data = M('telephone_fare_record')
            ->where(array('is_pay' => 1, 'state' => 0))
            ->field('feeflow_number')
            ->select();
        //遍历数据的api订单
        foreach ($data as $key => $value) {
            $billId = $value['feeflow_number'];
            //查询充值订单的充值状态 payState
            $req = new \RechargeOrderInfoRequest();
            $req->setBillId($billId);
            $res            = $client->execute($req, $accessToken);
            $res            = json_decode(json_encode($res), true); //json转为数组
            $recharge_state = $res['rechargeState']; // 0充值中 1充值成功 9已撤销
            if ($recharge_state == 1) {
                $save['state']  = 1;
                $save['remark'] = '充值成功!';
                M('telephone_fare_record')->where(array('is_pay' => 1, 'feeflow_number' => $billId))->save($save);
            } else if ($recharge_state == 9) {
                $save['state']  = 9;
                $save['remark'] = '已撤销，请联系千米客服';
                M('telephone_fare_record')->where(array('is_pay' => 1, 'feeflow_number' => $billId))->save($save);
            }
        }
        echo 'success';
    }

}
