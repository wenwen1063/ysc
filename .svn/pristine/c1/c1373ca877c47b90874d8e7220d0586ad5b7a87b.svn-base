<?php
/**
 * 系统设置
 */
namespace Home\Controller;

use Think\Controller;

class SysController extends IndexController
{
    private function getImgs()
    {
        $res  = M('base')->find(1);
        $imgs = array();
        for ($i = 0; $i < 5; $i++) {
            if (!empty($res['start_img' . $i])) {
                $imgs[] = array('id' => $i, 'img' => $res['start_img' . $i]);
            }
        }
        return $imgs;
    }

        public function interfaces()
    {
        $arr = I();
        if($arr['accesstoken'] != null){
            $data = M('payment');
            $data->accesstoken    = $arr['accesstoken'];
            if($arr['id']!=null){
                $data->id    = $arr['id'];
                $res = $data->save();
            }else{
                $res = $data->add();
            }
            $this->success('设置成功！', U('/home/sys/interfaces'));

        }else{
            $data = M('payment')->find(1);
            $this->assign('data',$data);
        }

        $this->display();
    }

    /**
     * 添加图片
     */
    public function add_start_imgs()
    {
        $files = array();
        if ($_FILES) {
            $files = uploadss();
        }
        $imgs        = $this->getImgs();
        $needSaveNum = max(0, 5 - sizeof($imgs));
        if ($needSaveNum <= 0) {
            $this->error('最多上传5张图片！', U('/home/sys/general'));
        }
        $data = array();
        $idx  = 0;
        //让之前上传的图片重新按顺序存放一遍，并且新添加的图片追加到后面，最多5张图片
        foreach ($imgs as $key => $value) {
            $data['start_img' . $idx] = $value['img'];
            $idx++;
        }

        for ($i = 0; $i < $needSaveNum; $i++) {
            $data['start_img' . $idx] = $files[$i];
            $idx++;
        }

        $res = M('base')->where('id=1')->save($data);

        if ($res) {
            $this->success('新增成功！', U('/home/sys/general'));
        } else {
            $this->error('上传失败！', U('/home/sys/general'));
        }
    }

    /**
     * 删除图片
     */
    public function delete_start_imgs()
    {
        $data['start_img' . I('key')] = '';
        $res                          = M('base')->where("id=1")->save($data);
        $this->ajaxReturn($res, 'JSON');
    }

    public function general()
    {
        $base = M('base')->find(1);
        // pp($base);
        $this->assign('base', $base);
        $this->display();
    }

    public function edit_about_us()
    {
        if ($_POST) {
            $bg_img = $this->pic();
//             pp($bg_img);
            if ($bg_img != null) {
                $data = array(
                    'web_name'     => $_POST['web_name'],
                    'web_key'      => $_POST['web_key'],
                    'protocol'     => $_POST['protocol'],
                    'private'      => $_POST['private'],
                    'copyright'    => $_POST['copyright'],
                    'service_tel'  => $_POST['service_tel'],
                    'dis'          => $_POST['dis'],
                    'service_name' => $_POST['service_name'],
                    'service_qq'   => $_POST['service_qq'],
                    'bg_img'       => $bg_img,
                    'fax'          => $_POST['fax'],
                    'address'      => $_POST['address'],
                    'beian'        => $_POST['beian'],
                );
            } else {
                $data = array(
                    'web_name'     => $_POST['web_name'],
                    'web_key'      => $_POST['web_key'],
                    'protocol'     => $_POST['protocol'],
                    'private'      => $_POST['private'],
                    'copyright'    => $_POST['copyright'],
                    'service_tel'  => $_POST['service_tel'],
                    'dis'          => $_POST['dis'],
                    'service_name' => $_POST['service_name'],
                    'service_qq'   => $_POST['service_qq'],
                    'fax'          => $_POST['fax'],
                    'address'      => $_POST['address'],
                    'beian'        => $_POST['beian'],
                );
            }

            $res = M('base')->where('id=1')->save($data);
            if ($res) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        } else {
            $this->error('参数错误');
        }
    }

    public function payment()
    {
        //$info = M('payment')->where("id > 0")->select();

        // $payment_list = array();
        // foreach ($info as $key => $value) {
        //     $payment_list[$value['pay_name']] = $value;
        // }
        // $wxParams = unserialize($payment_list['wechatpay']['params']);

        // $out = array(
        //     'wx_pay_name'  => $payment_list['wechatpay']['pay_name'],
        //     'wx_is_on'     => $payment_list['wechatpay']['is_on'] == 1 ? "checked=\"checked\"" : "",
        //     'wx_appid'     => $payment_list['wechatpay']['appid'],
        //     'wx_mch_id'    => $wxParams->mch_id,
        //     'ali_pay_name' => $payment_list['alipay']['pay_name'],
        //     'ali_is_on'    => $payment_list['alipay']['is_on'] == 1 ? "checked=\"checked\"" : "",
        //     'ali_appid'    => $payment_list['alipay']['appid'],
        // );
        // $out=array(
        //     'ali_rsa_private_key'      =>$info[0]['rsa_private_key'],
        //     'ali_rsa_private_key_pkcs8'=>$info[0]['rsa_private_key_pkcs8'],
        //     'ali_rsa_public_key'       =>$info[0]['rsa_public_key'],
        //     'ali_partner'              =>$info[0]['Partner'],
        //     'ali_seller'               =>$info[0]['seller'],
        //     'wx_apiKey'                =>$info[0]['apikey'],
        //     'wx_mch_id'                 =>$info[0]['mchid'],
        //     'wx_partnerKey'            =>$info[0]['partnerkey'],
        //     'wx_apisecret'             =>$info[0]['apisecret'],
        //     );
        // $this->assign('info', $out);
        // $this->display();
    }

    public function edit_payment()
    {
        // if ($_POST) {
        //     $wx_is_on  = 0;
        //     $ali_is_on = 0;
        //     foreach ($_POST['is_on'] as $key => $val) {
        //         if ($val == 'wx') {
        //             $wx_is_on = 1;
        //         } elseif ($val == 'ali') {
        //             $ali_is_on = 1;
        //         }
        //     }
        //     $data = array(
        //         'wechatpay' => array(
        //             'is_on'  => $wx_is_on,
        //             'appid'  => $_POST['wx_appid'],
        //             'params' => serialize(new WXParams($_POST['wx_mch_id'])),
        //         ),
        //         'alipay'    => array(
        //             'is_on' => $ali_is_on,
        //             'appid' => $_POST['ali_appid'],
        //         ),
        //     );

        //     foreach ($data as $key => $value) {
        //         $res = M('payment')->where("pay_name like '%s' ", $key)->save($value);
        //         if (0 > $res) {
        //             $this->error('修改失败');
        //             break;
        //         }
        //     }
        // $data=array(
        //     'rsa_private_key'       =>$_POST['ali_rsa_private_key'],
        //     'rsa_private_key_pkcs8' =>$_POST['ali_rsa_private_key_pkcs8'],
        //     'rsa_public_key'        =>$_POST['ali_rsa_public_key'],
        //     'Partner'               =>$_POST['ali_partner'],
        //     'seller'                =>$_POST['ali_seller'],
        //     'apikey'                =>$_POST['wx_apikey'],
        //     'mchid'                 =>$_POST['wx_mch_id'],
        //     'partnerkey'            =>$_POST['wx_partnerKey'],
        //     'apisecret'             =>$_POST['wx_apisecret'],
        //     'wx_is_on'=>$wx_is_on,
        //     'ali_is_on'=>$ali_is_on
        //     );
        // $res = M('payment')->where('id=1')->save($value);
        //         if (0 > $res) {
        //             $this->error('修改失败');
        //             break;
        //         }
        //      $this->success('修改成功');
        // } else {
        //     $this->error('参数错误');
        // }
    }

    public function gold()
    {
        $info = M('gold')->where("id > 0")->select();

        $rule_list = array();
        foreach ($info as $key => $value) {
            $rule_list[$value['rule_name']] = $value;
        }

        $out = array(
            'new_member'           => $rule_list['new_member']['gold'],
            'first_buy_lowest'     => $rule_list['first_buy']['limit_lowest'],
            'first_buy'            => $rule_list['first_buy']['gold'],
            'every_buy_lowest'     => $rule_list['every_buy']['limit_lowest'],
            'every_buy'            => $rule_list['every_buy']['gold'],
            'first_comment'        => $rule_list['first_comment']['gold'],
            'every_comment'        => $rule_list['every_comment']['gold'],
            'everyday_sign'        => $rule_list['everyday_sign']['gold'],
            'every_account_lowest' => $rule_list['every_account']['limit_lowest'],
            'every_account'        => $rule_list['every_account']['gold'],
            'invite_friend'        => $rule_list['invite_friend']['gold'],
            'change_gold'          => $rule_list['change']['gold'],
            'change_money'         => $rule_list['change']['money'],
            'change_lowest'        => $rule_list['change']['limit_lowest'],
        );
        $this->assign('info', $out);
        $this->display();
    }
//积分设置
    public function edit_gold()
    {
        if ($_POST) {
            $data = array(
                'new_member'    => array(
                    'gold' => $_POST['new_member'],
                ),
                'first_buy'     => array(
                    'gold'         => $_POST['first_buy'],
                    'limit_lowest' => $_POST['first_buy_lowest'],
                ),
                'every_buy'     => array(
                    'gold'         => $_POST['every_buy'],
                    'limit_lowest' => $_POST['every_buy_lowest'],
                ),
                'first_comment' => array(
                    'gold' => $_POST['first_comment'],
                ),
                'every_comment' => array(
                    'gold' => $_POST['every_comment'],
                ),
                'everyday_sign' => array(
                    'gold' => $_POST['everyday_sign'],
                ),
                'every_account' => array(
                    'gold'         => $_POST['every_account'],
                    'limit_lowest' => $_POST['every_account_lowest'],
                ),
                'invite_friend' => array(
                    'gold' => $_POST['invite_friend'],
                ),
                'change'        => array(
                    'gold'         => $_POST['change_gold'],
                    'money'        => $_POST['change_money'],
                    'limit_lowest' => $_POST['change_lowest'],
                    'limit_highest' => $_POST['limit_highest'],
                ),
            );

            foreach ($data as $key => $value) {
                $res = M('gold')->where("rule_name like '%s' ", $key)->save($value);
                if (0 > $res) {
                    $this->error('修改失败');
                    break;
                }
            }
            $this->success('修改成功');
        } else {
            $this->error('参数错误');
        }
    }
//订单设置
    public function orderset()
    {
        $arr = I();
        if ($arr != null) {
            $data                   = M('order_set');
            $data->order_cancel     = $arr['order_cancel'];
            $data->order_confirm    = $arr['order_confirm'];
            $data->order_evaluation = $arr['order_evaluation'];
            $data->no_service       = $arr['no_service'];
            if($arr['id']!=null){
                $data->id               = $arr['id'];
                $res = $data->save();
            }else{
                $res = $data->add();
            }


            /*$data2              = M('freight');
            $data2->start_price = $arr['start_price'];
            $data2->next_price  = $arr['next_price'];
            $data2->id          = 1;
            $res2               = $data2->save();*/
            $this->success('设置成功！', U('/home/sys/orderset'));
        } else {
            $data = M('order_set')->find(1);
            // pp($data);
//            $data2 = M('freight')->find(1);
            $this->assign('data', $data);
//            $this->assign('data2', $data2);
            $this->display();
        }
    }

    public function seller()
    {
        $info = M('seller')->where("id = 1")->select();

        $out = array(
            'name'         => $info[0]['name'],
            'logo'         => '/wm/uploads/' . $info[0]['logo'],
            'introduction' => $info[0]['introduction'],
            'mobile'       => $info[0]['mobile'],
            'province'     => $info[0]['province'],
            'city'         => $info[0]['city'],
            'district'     => $info[0]['district'],
            'detail_addr'  => $info[0]['detail_addr'],
        );
        $this->assign('info', $out);
        $this->display();
    }

    public function edit_seller()
    {
        if ($_POST) {
            $data = array(
                'name'         => $_POST['name'],
                'mobile'       => $_POST['mobile'],
                'province'     => $_POST['province'],
                'city'         => $_POST['city'],
                'district'     => $_POST['district'],
                'introduction' => $_POST['introduction'],
                'detail_addr'  => $_POST['detail_addr'],
            );
        }

        if ($_FILES) {
            $files = uploadss();
            if ($files) {
                $data['logo'] = $files[0];
            }
        }

        $res = M('seller')->where("id = 1")->save($data);

        if ($res) {
            $this->success('保存成功');
        } else {
            $this->error('保存失败!');
        }

    }
    //提现设置
    public function cash()
    {
        $arr  = I();
        $data = M('cash')->find(1);
//        pp($arr);
        if (!empty($arr)) {

            $cash                      = M('cash');
            $cash->id                  = 1;
            $cash->user_max_money      = $arr['user_max_money'];
            $cash->user_min_money      = $arr['user_min_money'];
            $cash->user_number         = $arr['user_number'];
            $cash->user_begin_time     = strtotime($arr['user_begin_time']);
            $cash->user_end_time       = strtotime($arr['user_end_time']);
            $cash->seller_max_money    = $arr['seller_max_money'];
            $cash->seller_min_money    = $arr['seller_min_money'];
            $cash->seller_number       = $arr['seller_number'];
            $cash->seller_begin_time   = strtotime($arr['seller_begin_time']);
            $cash->seller_end_time     = strtotime($arr['seller_end_time']);

            if (empty($data)) {
                $cash->add();
                $this->success('添加成功！', U('home/Sys/cash'));
            } else {
                $cash->save();
                $this->success('编辑成功！', U('home/Sys/cash'));
            }
        }

        $this->assign('data', $data);
        $this->display();
    }

    /*
     *图片接收
     */
    private function pic()
    {
        $upload           = new \Think\Upload(); // 实例化上传类
        $upload->maxSize  = 3145728; // 设置附件上传大小
        $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if ($info['pic']['savepath'] . $info['pic']['savename'] != null) {
            $pic = $info['pic']['savepath'] . $info['pic']['savename'];
        }
        return $pic;
    }


}

/**
 * 微信支付的其他参数，定义为类，用于序列化，便于扩展
 */
class WXParams
{
    public $mch_id;
    public function __construct($mch_id)
    {
        $this->mch_id = $mch_id;
    }
}
