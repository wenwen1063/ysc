<?php
/**
 * 优惠券管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class DiscountController extends IndexController
{
    public function discountindex()
    {
        $search = I();
        if ($search != null) {
            if ($search['time'] != null && $search['time2'] != null) {
                $stime               = strtotime($search['time']);
                $etime               = strtotime($search['time2']);
                $map['c.start_time'] = array("EGT", $stime);
                $map['c.end_time']   = array("ELT", $etime);
            }
            if ($search['name'] != null) {
                $name          = $search['name'];
                $map['c.name'] = array("like", "%$name%");
            }
            if ($search['sm_money'] != null && $search['lg_money'] != null) {
                $moneyarr       = array($search['sm_money'], $search['lg_money']);
                $map['c.money'] = array("between", $moneyarr);
            }
            //判断是平台还是商家
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['s.id'] =  array('eq', $seller_id);
            }
            $data  = M()->table('__COUPON__ c')
                ->join('left join __SELLER__ s on s.id = c.seller_id')
                ->where($map)
                ->field('c.*,s.number as s_number,s.name as s_name')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__COUPON__ c')
                ->join('left join __SELLER__ s on s.id = c.seller_id')
                ->where($map)
                ->count();

        } else {

            //判断是平台还是商家
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['s.id'] =  array('eq', $seller_id);
                $data  = M()->table('__COUPON__ c')
                    ->join('left join __SELLER__ s on s.id = c.seller_id')
                    ->where($map)
                    ->field('c.*,s.number as s_number,s.name as s_name')
                    ->order('c.id','desc')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__COUPON__ c')
                    ->join('left join __SELLER__ s on s.id = c.seller_id')
                    ->where($map)
                    ->count();
            }else{
                $data  = M()->table('__COUPON__ c')
                    ->join('left join __SELLER__ s on s.id = c.seller_id')
                    ->field('c.*,s.number as s_number,s.name as s_name')
                    ->order('c.id','desc')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__COUPON__ c')->count();
            }


        }
        foreach ($data as $k => $v) {
            if (time() >= $v['start_time'] && time() <= $v['end_time']) {
                $data[$k]['is_ing'] = 1;
            } else {
                $data[$k]['is_ing'] = 0;
            }
        }
        // pp($data);
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('search', $search);
        $this->assign('data', $data);
        $this->display();
    }

    //优惠券新增
    public function discountadd()
    {
        $arr = I();
//        pp($arr);
        if ($arr != null) {
            $user                = M("coupon");
            $user->name          = $arr['name'];
            $user->money         = $arr['money'];
            $user->use_condition = $arr['use_condition'];
            $user->get_user      = $arr['get_user'];
            $user->start_time    = strtotime($arr['start_time']);
            $user->end_time      = strtotime($arr['end_time']);
            $user->out_number    = $arr['out_number'];
            $user->seller_id     = $arr['seller_id'];
            $user->remain_number = $arr['out_number']; //新增的时候剩余量等于发行量
            $user->got_number    = 0;   //新增时已领取量为0
            $user->used_number   = 0;   //新增时已使用量为0
            $user->is_disable    = 0;   //新增时默认不禁用
            $user->add();
            $this->success('新增成功！', U('/home/discount/discountindex'));
        } else {
            //判断是平台还是商家
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['id'] =  array('eq', $seller_id);
                $seller = M('seller')->where($map)->field('number,name as s_name,id')->select();
            }else{
                $seller = M('seller')->field('number,name as s_name,id')->select();
            }
//            pp($seller);

//            pp($seller);
            $this->assign('seller',$seller);
            $this->display();
        }
    }

    //优惠券编辑
    public function discountupdate()
    {
        $arr = I();
        //先确认该优惠券有没有过期
        $map_is_over_time['end_time'] = array('ELT', time());
        $map_is_over_time['id']       = $arr['id'];
        $is_overtime                  = M('coupon')
            ->where($map_is_over_time)
            ->find();
//        pp($is_overtime);
        if (!$is_overtime) {
            //确认有没有用户领取过该优惠券
            $map['discount_id'] = $arr['id'];
            $isnot              = M('coupon_user')->where($map)->find();
            if ($isnot) {
                $this->error('该优惠券已有用户领取，无法编辑！');
            }
         else {
             //无人领取过执行更新操作
             if ($arr['name'] != null) {
                 $user                = M("coupon");
                 $user->id            = $arr['id'];
                 $user->name          = $arr['name'];
                 $user->money         = $arr['money'];
                 $user->use_condition = $arr['use_condition'];
                 $user->get_user      = $arr['get_user'];
                 $user->start_time    = strtotime($arr['start_time']);
                 $user->end_time      = strtotime($arr['end_time']);
                 $user->out_number    = $arr['out_number'];
                 $user->remain_number = $arr['out_number'];
                 $user->save();
                 $this->success('修改成功！', U('/home/discount/discountindex'));
             } else {
                 $user  = M()->table('__COUPON__ c')
                     ->join('left join __SELLER__ s on s.id = c.seller_id')
                     ->where($where = array('c.id' => I('id')))
                     ->field('c.*,s.number as s_number,s.name as s_name')
                     ->find();
//                 $user = M('coupon')->where($where = array('id' => I('id')))->find();
//                pp($user);
                 $this->assign('result', $user);
                 $this->display();
             }
         }
        }else{
            $this->error('该优惠券已过期，无法编辑！');
        }


    }

    /*
     *删除操作
     */
    public function discountdel()
    {
            //确认有没有用户领取过该优惠券
            $map['discount_id'] = I('id');
            $isnot              = M('coupon_user')->where($map)->find();
            if ($isnot) {
                $this->error('该优惠券已有用户领取，无法删除！');
            }
         else {
            M('coupon')->where($where = array('id' => I('id')))->delete();
            $this->success('删除成功！', U('/home/discount/discountindex'));
        }
    }

    /*
     *禁用启用操作
     */
    public function discountdisable()
    {
        $arr  = I();
        $data = M('coupon');
        if ($arr['is_disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            $this->success('禁用成功！', U('/home/discount/discountindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            $this->success('启用成功！', U('/home/discount/discountindex'));
        }
    }

    //优惠券发放
    public function discountsend()
    {
        $arr = I();
        if ($arr['username'] != null) {
            $user_id = M('user')->where($where = array('username' => $arr['username']))->field('id')->find();
            if (!$user_id) {
                $this->error('用户名有误，查无此用户');
            }
            $d    = M('coupon');
            $info = $d->where($where = array('id' => $arr['discount_id']))->find();
            if ((intval($info['remain_number']) - intval($arr['out_number'])) < 0) {
                $this->error('优惠券剩余量不足，请重新填写发放数量');
            }
            $di              = M('coupon_user');
            $di->discount_id = $arr['discount_id'];
            $di->user_id     = $user_id['id'];
            $di->out_number  = $arr['out_number'];
            $di->got_time    = time();
            $di->add();

            $d->remain_number = intval($info['remain_number']) - intval($arr['out_number']);
//          已领
            $d->got_number = intval($info['got_number']) + intval($arr['out_number']);

            $d->where($where = array('id' => $arr['discount_id']))->save();
            $this->success('发放成功！', U('/home/discount/discountindex'));
        } else {
            //判断是平台还是商家
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $arr['seller_id'] =  array('eq', $seller_id);
                $arr['is_disable'] = 0;
//            $arr['start_time'] = array('ELT', time());
                $arr['end_time']   = array('EGT', time());
                $discount          = M('coupon')->where($arr)->field('id,name')->select();
            }else{
                $arr['is_disable'] = 0;
//            $arr['start_time'] = array('ELT', time());
                $arr['end_time']   = array('EGT', time());
                $discount          = M('coupon')->field('id,name')->select();
            }


            $this->assign('discount', $discount);
            $this->display();
        }
    }

    //优惠券明细
    public function infor()
    {
        $search = I();
        if ($search != null) {
            if ($search['name'] != null) {
                $map['c.name'] = array("like", "%" . $search['name'] . "%");

            }
            if ($search['sm_money'] != null && $search['lg_money'] != null) {
                $moneyarr       = array($search['sm_money'], $search['lg_money']);
                $map['c.money'] = array("between", $moneyarr);
            }
            if ($search['username'] != null) {
                $map['u.username'] = array("like", "%" . $search['username'] . "%");

            }
            if ($search['use_status'] != null) {
                $map['cu.use_status'] = $search['use_status'];
            }
            //判断是平台还是商家
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['c.seller_id'] =  array('eq', $seller_id);
            }
//            pp($search);
            $user = M()->table('__COUPON_USER__ cu')
                ->join('left join __COUPON__ c on cu.discount_id = c.id')
                ->join('left join __USER__ u on cu.user_id = u.id')
                ->where($map)
                ->order('cu.use_status asc')
                ->order('cu.got_time asc')
                ->field('cu.got_time,cu.use_status,cu.use_time,cu.order_id,c.*,u.username,cu.out_number as sendnum')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__COUPON_USER__ cu')
                ->join('left join __COUPON__ c on cu.discount_id = c.id')
                ->join('left join __USER__ u on cu.user_id = u.id')
                ->where($map)
                ->count();
//             pp($user);
        } else {
            //判断是平台还是商家
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $arr['c.seller_id'] =  array('eq', $seller_id);
            }
            $user = M()->table('__COUPON_USER__ cu')
                ->join('left join __COUPON__ c on cu.discount_id = c.id')
                ->join('left join __USER__ u on cu.user_id = u.id')
                ->where($arr)
                ->order('cu.use_status asc')
                ->order('cu.got_time asc')
                ->field('cu.got_time,cu.use_status,cu.use_time,cu.order_id,c.*,u.username,cu.out_number as sendnum')
                ->page($_GET['p'] . ',20')
                ->select();
//             pp($user);
            $count = M()->table('__COUPON_USER__ cu')
                ->join('left join __COUPON__ c on cu.discount_id = c.id')
                ->where($arr)
                ->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $user);
        $this->display();
    }
}
