<?php
/**
 * ajax- search
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class SearchController extends Controller
{
    /*
     *角色管理-角色选择用户
     */
    public function adminsearch()
    {
        $id   = I('role_id');
        $user = I('user');
        //选择为拥有此角色的用户
        $role   = M('roleadmin')->where($where = array('role_id' => $id))->field('admin_id')->select();
        $search = I();
        if ($search != null) {
            if ($role != null) {
                $role            = column($role, 'admin_id');
                $map['admin_id'] = array('not in', $role);
            }
            if ($user != null) {
                $map['user'] = array('like', "%$user%");
            } else {
                $map['user'] = array('like', "%%");
            }
            $arr = M('admin')
                ->where($map)
                ->select();
        } else {
            $admin = M()->table('__ROLEADMIN__ rl')
                ->where($where = array('r.role_id' => $id))
                ->join('left join __ROLE__ r on r.role_id = rl.role_id')
                ->join('left join __ADMIN__ a on a.admin_id = rl.admin_id')
                ->field('a.admin_id')->select();

            \Think\Log::record(var_export($admin, true));

            $where['wm.admin_id'] = array('not in', $admin['admin_id']);
            $arr                  = M('admin')
                ->where($where)
                ->select();
        }
        $this->ajaxReturn($arr);
    }
    /*
     *角色管理-用户编辑选择角色
     */
    public function rolesearch()
    {
        $admin_id = I('admin_id');
        $user     = I('user');
    }
    /*
     *商品添加-选择类型后-找出全部类型的属性值
     */
    public function goodsclassadd()
    {
        $id   = I('classid');
        $data = M('attr')->where($where = array('class_id' => $id))->select();
        $this->ajaxReturn($data);
    }

    public function goodsaddpic()
    {
        if ($_FILES) {
            $file = uploads();
        }
        $this->ajaxReturn($file);
    }
    /*换货*/
    public function servicereceipt()
    {
        $arr = I();
        //1.发货
        $data               = M('logistics_log');
        $data->order_id     = $arr['order_id'];
        $data->logistics_id = $arr['logistics_id'];
        $data->consignee    = $arr['consignee'];
        $data->address      = $arr['address'];
        $data->class_id     = $arr['class_id'];
        $data->tel          = $arr['tel'];
        $data->dynamic      = $arr['dynamic'];
        $data->status       = 0;
        $data->create_time  = strtotime(date('Y-m-d H:i:s'));
        $data->add();
        /*售后服务状态*/
        $data         = M('service');
        $data->id     = I('id');
        $data->status = 3; //待换货
        $data->save();
        $this->success('收货结束！', U('/home/service/serviceindex'));
    }
    //查看详细期号
    public function wincode()
    {
        $str = substr_replace(I('wincode'), '', 0, 3);
        $str = explode("+++", $str);
        $str = array_filter($str);
        $this->assign('str', $str);
        $this->display();
    }
    //查看二维码
    public function ecode()
    {
        $data = M('rechargecash')->where($where = array('id' => I('id')))->find();
        $this->assign('data', $data);
        $this->display();
    }
    public function test()
    {
        // $user = I('user');
        // $pwd = I('pwd');
        $data = array(
            'user' => I('user'),
            'pwd'  => I('pwd'),
        );
        $result = M('testlogin')->data($data)->add();
        if ($result) {
            $json = array(
                'result' => 1,
            );
        } else {
            $json = array(
                'result' => 0,
            );
        }
        $this->ajaxReturn($json);
    }

    public function getClass()
    {
        \Think\Log::record('aaa');
        $data = M()->table('__GOODS__ g')
            ->join('left join __GOODS_CLASS__ gc on gc.id = g.class_id')
            ->field('g.is_stock,gc.id as class_id,gc.name as class_name')
            ->where($where = array('g.id' => I('goods_id')))
            ->find();
        // dump($name);die;
        if (!empty($data)) {
            $json = array(
                'result'        => 0,
                'message'       => "查询成功！",
                'class_id_name' => $data,
            );
            \Think\Log::record(var_export($json, true));
            $this->ajaxReturn($json);
        } else {
            $json = array(
                'result'  => 1,
                'message' => "查询失败！",
            );
            $this->ajaxReturn($json);
        }

    }

    //声音提示
    public function notiyf()
    {
        $order = M('order')->where($where = array('post_status' => 2, 'prompt_tone' => 0))->field('id,prompt_tone')->find();
        //值不变时为null
        if ($order == null) {
            $ajax['cash'] = null;
        } else {
            $orderchange              = M('order');
            $orderchange->id          = $order['id'];
            $orderchange->prompt_tone = 1;
            $orderchange->save();
            sleep(1000);
            $ajax['cash'] = 1;
        }
        $this->ajaxReturn($ajax);
    }


    public function classtwo(){
        $classtwo = M('goods_class_two')->where(array('goods_class_id'=>I('classone')))->select();
//        pp($classtwo);
        $this->ajaxReturn($classtwo);
    }
    public function classsan(){

        $classsan = M('goods_class_san')->where(array('gct_id'=>I('classtwo')))->select();
//        pp($classsan);
        $this->ajaxReturn($classsan);
    }

    public function attribute2(){
        $arr = I();
        $attribute = M('goods_attribute')->where(array('class_san_id'=>$arr['classsan']))->field('id,name,class_san_id')->select(); //规格
//        pp($attribute);
        $this->ajaxReturn($attribute);
//        pp($attribute);
    }

    //新订单声音提示
    public function neworder()
    {
        $adminid         = cookie('admin_id');
//        pp($adminid);
        $seller_id = cookie("seller_id");
        //判断 订单列表权限 37
        if ($seller_id != 0 || !empty($seller_id)) {
            $rabc = M()->table('__ADMIN__ a')
                ->where(array('a.seller_id'=>$seller_id))
                ->join('left join __ROLEADMIN__  ra on ra.admin_id = a.admin_id')
                ->join("left join __ROLERABC__ rr on  rr.role_id = ra.role_id")
                ->where(array('rr.rabc_id'=>37))
                ->field('rr.*')
                ->select();

//            pp($rabc);
        }else{
            $rabc = M()
                ->table('__RABC_INFO__ ri')
                ->join("left join __ROLERABC__ rr on  ri.id = rr.rabc_id")
                ->join('left join __ROLEADMIN__  ra on  rr.role_id = ra.role_id')
                ->where($where = array('ra.admin_id' => $adminid, 'ri.id' => 37))
                ->field('ri.id')
                ->select();
//            pp($rabc);
        }


        if ($rabc == null) {
            $ajax['cash'] = null;
            $this->ajaxReturn($ajax);
            exit();
        }
        //判断 是商家还是平台

        if ($seller_id != 0 || !empty($seller_id)) {
            $cooksj['o.seller_id'] =  array('eq', $seller_id);
            $order = M()
                ->table('__ORDERS__ o')
                ->where($where = array('o.pay_status' => 1,'o.prompt_tone' => 0,'o.seller_id'=>$seller_id))
                ->field('
                o.id,
                o.prompt_tone
            ')->select();
//            pp($order);
        }else{
            $order = M()
                ->table('__ORDERS__ o')
                ->where($where = array('o.pay_status' => 1,'prompt_tone' => 0))
                ->field('
                o.id,
                o.prompt_tone
            ')->select();
        }
        //值不变时为null
        if ($order == null) {
            $ajax['cash'] = null;
        } else {
             $orderchange              = M('orders');
            for($i=0;$i<count($order);$i++){
                $orderchange->id          = $order[$i]['id'];
                $orderchange->prompt_tone = 1;
                $orderchange->save();
            }
            $ajax['cash'] = 1;
        }
        $this->ajaxReturn($ajax);
    }

    //新商品奖金设置变更需要审核
    public function newbonus()
    {
        $adminid         = cookie('admin_id');
//        pp($adminid);
        $seller_id = cookie("seller_id");
        // 奖金审核通过权限 2083
        if ($seller_id == 0 || empty($seller_id)) {
            $rabc = M()
                ->table('__RABC_INFO__ ri')
                ->join("left join __ROLERABC__ rr on  ri.id = rr.rabc_id")
                ->join('left join __ROLEADMIN__  ra on  rr.role_id = ra.role_id')
                ->where($where = array('ra.admin_id' => $adminid, 'ri.id' => 2083))
                ->field('ri.id')
                ->select();
        }else{
            $rabc = null;
        }

        if ($rabc == null) {
            $ajax['cash'] = null;
            $this->ajaxReturn($ajax);
            exit();
        }

        $goods = M('goods')
            ->where($where = array('prompt_tone' => 0))
            ->field('id,prompt_tone')
            ->select();
//        pp($goods);
        //值不变时为null
        if ($goods == null) {
            $ajax['cash'] = null;
        } else {
            $goodsbonus            = M('goods');
            for($i=0;$i<count($goods);$i++){
                $goodsbonus->id          = $goods[$i]['id'];
                $goodsbonus->prompt_tone = 1;
                $goodsbonus->save();
            }
            $ajax['cash'] = 1;
        }
        $this->ajaxReturn($ajax);
    }

    //有新的会员升级需要审核
    public function upgrade()
    {
        $adminid         = cookie('admin_id');
//        pp($adminid);
        $seller_id = cookie("seller_id");
        // 会员升级审核通过权限 2130
        if ($seller_id == 0 || empty($seller_id)) {
            $rabc = M()
                ->table('__RABC_INFO__ ri')
                ->join("left join __ROLERABC__ rr on  ri.id = rr.rabc_id")
                ->join('left join __ROLEADMIN__  ra on  rr.role_id = ra.role_id')
                ->where($where = array('ra.admin_id' => $adminid, 'ri.id' => 2130))
                ->field('ri.id')
                ->select();
        }else{
            $rabc = null;
        }

        if ($rabc == null) {
            $ajax['cash'] = null;
            $this->ajaxReturn($ajax);
            exit();
        }

        $user = M('user_upgrade_logs')
            ->where($where = array('prompt_tone' => 0))
            ->field('id,prompt_tone')
            ->select();
//        pp($user);
        //值不变时为null
        if ($user == null) {
            $ajax['cash'] = null;
        } else {
            $upgrade            = M('user_upgrade_logs');
            for($i=0;$i<count($user);$i++){
                $upgrade->id          = $user[$i]['id'];
                $upgrade->prompt_tone = 1;
                $upgrade->save();
            }
            $ajax['cash'] = 1;
        }
        $this->ajaxReturn($ajax);
    }

    //有新的售后服务订单
    public function service()
    {
        $adminid         = cookie('admin_id');
//        pp($adminid);
        $seller_id = cookie("seller_id");
        // 售后通过处理权限 2108
        if ($seller_id == 0 || empty($seller_id)) {
            $rabc = M()
                ->table('__RABC_INFO__ ri')
                ->join("left join __ROLERABC__ rr on  ri.id = rr.rabc_id")
                ->join('left join __ROLEADMIN__  ra on  rr.role_id = ra.role_id')
                ->where($where = array('ra.admin_id' => $adminid, 'ri.id' => 2108))
                ->field('ri.id')
                ->select();
        }else{
            $rabc = null;
        }

        if ($rabc == null) {
            $ajax['cash'] = null;
            $this->ajaxReturn($ajax);
            exit();
        }

        $cs = M('customer_service')
            ->where($where = array('prompt_tone' => 0))
            ->field('id,prompt_tone')
            ->select();
//        pp($cs);
        //值不变时为null
        if ($cs == null) {
            $ajax['cash'] = null;
        } else {
            $service            = M('customer_service');
            for($i=0;$i<count($cs);$i++){
                $service->id          = $cs[$i]['id'];
                $service->prompt_tone = 1;
                $service->save();
            }
            $ajax['cash'] = 1;
        }
        $this->ajaxReturn($ajax);
    }

    //有新的提现申请
    public function rechargecash()
    {
        $adminid         = cookie('admin_id');
//        pp($adminid);
        $seller_id = cookie("seller_id");
        // 售后通过处理权限 1600
        if ($seller_id == 0 || empty($seller_id)) {
            $rabc = M()
                ->table('__RABC_INFO__ ri')
                ->join("left join __ROLERABC__ rr on  ri.id = rr.rabc_id")
                ->join('left join __ROLEADMIN__  ra on  rr.role_id = ra.role_id')
                ->where($where = array('ra.admin_id' => $adminid,'ri.id' => 1600))
                ->field('ri.id')
                ->select();
        }else{
            $rabc = null;
        }
        if ($rabc == null) {
            $ajax['cash'] = null;
            $this->ajaxReturn($ajax);
            exit();
        }

        $ruser = M('rechargecash')
            ->where($where = array('type'=>2,'prompt_tone' => 0))
            ->field('id,prompt_tone')
            ->select();
        $rseller = M('rechargecash_seller')
            ->where($where = array('type'=>1,'prompt_tone' => 0))
            ->field('id,prompt_tone')
            ->select();

//        pp($rseller);
        //值不变时为null
        if ($ruser == null) {
            $ajax['cash'] = null;
        }
        if($rseller == null){
            $ajax['cash'] = null;
        }
        if($ruser != null) {
            $reuser            = M('rechargecash');
            for($i=0;$i<count($ruser);$i++){
                $reuser->id          = $ruser[$i]['id'];
                $reuser->prompt_tone = 1;
                $reuser->save();
            }
            $ajax['cash'] = 1;
        }
        if($rseller != null) {
            $reseller            = M('rechargecash_seller');
            for($i=0;$i<count($rseller);$i++){
                $reseller->id          = $rseller[$i]['id'];
                $reseller->prompt_tone = 1;
                $reseller->save();
            }
            $ajax['cash'] = 2;
        }
        $this->ajaxReturn($ajax);
    }

}
