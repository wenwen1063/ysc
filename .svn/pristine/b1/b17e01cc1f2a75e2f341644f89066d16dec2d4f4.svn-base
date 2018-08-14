<?php
/**
商家管理
 */

namespace Home\Controller;

use Think\Controller;


class SelleruserController extends IndexController
{
/*商家用户列表*/
    public function Selleruserindex(){
        $search = I();
//        pp($search);
        if ($search['name'] != null || $search['seller_id'] != null) {
            $user         = $search['name'];
            $seller_id    = $search['seller_id'];

            $map['a.user'] = array("like", "%$user%");
            $map['s.id'] = array("like", "%$seller_id%");


            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['s.id'] =  array('eq', $seller_id);
                $map2['id'] =  array('eq', $seller_id);
            }

            $data = M()->table('__SELLER__ s')
                ->join('left join __ADMIN__ a on a.seller_id = s.id')
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->field('a.user,a.phone,a.email,a.id')
                ->select();
            $count = M()->table('__SELLER__ s')
                ->join('left join __ADMIN__ a on a.seller_id = s.id')
                ->where($map)
                ->count();
            $seller = M('seller')
                ->where($map2)
                ->field('id as seller_id,name as s_name,number as s_number')
                ->select();
//            dump($data);
        }else if($search['s_name'] != null){
            $s_name       = $search['s_name'];
            $map['s.name'] = array("like", "%$s_name%");

            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['s.id'] =  array('eq', $seller_id);
            }
            $seller = M('seller s')
                ->where($map)
                ->field('id as seller_id,name as s_name,number as s_number')
                ->select();
        } else {
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] =  array('eq', $seller_id);

                $data = M('admin')
                    ->where(array('seller_id'=>$cooksj['id']))
                    ->page($_GET['p'] . ',20')
                    ->field('user,phone,email,id')
                    ->select();
                $count = M('admin')->where(array('seller_id'=>$cooksj['id']))->count();
                $seller = M('seller')
                    ->where($cooksj)
                    ->field('id as seller_id,name as s_name,number as s_number')
                    ->select();
            }else{
                $data = M('admin')
                    ->page($_GET['p'] . ',20')
                    ->field('user,phone,email,id')
                    ->select();
                $count = M('admin')->count();
                $seller = M('seller')
                    ->field('id as seller_id,name as s_name,number as s_number')
                    ->select();
            }


        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->assign('seller', $seller);
        $this->display();

    }
    //删除商家用户
    public function selleruserdel(){
        $arr = I();
//        pp($arr);
        if ($arr['type'] != 2) {
            set_time_limit(0);
//            pp($arr);
            for ($i = 0; $i < count($arr['id']); $i++) {
                M('admin')
                    ->where($where=array('id'=>$arr['id'][$i]))
                    ->delete();
               /* $data            = M('admin');
                $data->admin_id  = $arr['admin_id'][$i];
                $data->delete();*/
            }
        }else{
            M('admin')->where($where=array('id'=>I('id')))->delete();
        }

        $this->success('删除成功！',U('Home/selleruser/selleruserindex'));
    }
    //新增用户
    public function selleruseradd()
    {

        $arr = I();
//        pp($arr);
        if($arr != null){
//            $where = $arr['seller']
            $isnot = M('admin')->where($where=array('seller_id'=>$arr['seller'],'user'=>$arr['user']))->select();
            if($isnot){
                $this->error('名称重复请重新输入');
            }else{
                D('admin')->addselleruser();
                $this->success('添加成功', U('/home/selleruser/selleruserindex'));
            }
            /*$password = md5(I('password') . C('MD5_KEY'));
            $data = M('admin');
            $data->user             = $arr['user'];
            $data->password          = $password;
            $data->is_disable        = '0';  //默认不禁用
            $data->create_time       = time();
            $data->is_depart_admin   = '1';  //默认为分店管理员
            $data->seller_id         = $arr['seller'];
            $data->phone             = $arr['phone'];
            $data->email             = $arr['email'];
            $result = $data->add();
            if($result){
                $this->success('新增成功！',U('Home/selleruser/selleruserindex'));
            }*/
        }else{
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] =  array('eq', $seller_id);
                $seller = M('seller')->where($cooksj)->select();
            }else{
                $seller = M('seller')->select();
            }


            $this->assign('seller',$seller);
        }
        $this->display();
    }



}