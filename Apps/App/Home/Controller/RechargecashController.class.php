<?php
/**
 * 充值提现管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class RechargecashController extends IndexController
{

/*
 *商家提现管理
 */
    public function rechargeseller()
    {
        $search = I();
        if ($search != null) {
//            pp($search);
            if ($search['username'] != null) {
                $name          = $search['username'];
                $map['s.name'] = array("like", "%$name%");
            }
            if ($search['is_ok'] != null) {
                $map['r.is_ok'] = $search['is_ok'];
            }
            if ($search['time'] != null && $search['time2'] != null) {
                $stime             = strtotime($search['time']);
                $etime             = strtotime($search['time2']);
                $map['apply_time'] = array('between', array($stime, $etime));
            }
            $data = M()->table('__RECHARGECASH_SELLER__ r')
                ->join('left join __SELLER__ s on s.id = r.seller_id')
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->order('r.is_ok,r.apply_time desc')
                ->field('
                r.*,
                s.name as s_name
                ')->select();
            $count = M()->table('__RECHARGECASH_SELLER__ r')
                ->join('left join __SELLER__ s on s.id = r.seller_id')
                ->where($map)
                ->count();
        } else {
            $data = M()->table('__RECHARGECASH_SELLER__ r')
                ->join('left join __SELLER__ s on s.id = r.seller_id')
                ->page($_GET['p'] . ',20')
                ->order('r.is_ok,r.apply_time desc')
                ->field('
                r.*,
                s.name as s_name,
                s.id as s_id
                ')->select();
//            pp($data);
            $count = M()->table('__RECHARGECASH_SELLER__ r')
                ->join('left join __SELLER__ s on s.id = r.seller_id')
                ->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('data', $data);
        $this->assign('count', $count);
        $this->assign('search', $search);
        $this->display();
    }
    /*
     * 拒绝提现
     */
    public function cashclose()
    {
        //1.找出商家的可金额和已提现金额
        $money = M('seller')
            ->where($where = array('id' => I('s_id')))
            ->field('withdrawals,already_withdrawals,freeze,balance')
            ->find();
        //2.可提现金额相减，已提现金额相加
        $data              = M('seller');
        $data->id          = I('s_id');
        $data->freeze      = $money['freeze'] - I('r_money'); //冻结余额减少
        $data->withdrawals = $money['withdrawals'] + I('r_money'); //可提现金额增加
        $data->balance     = $money['balance'] + I('r_money'); //商家余额金额增加
        $data->save();
        //3.状态修改
        $case        = M('rechargecash_seller');
        $case->id    = I('id');
        $case->is_ok = 2;
        $case->save();
        $this->success('操作成功！', U('/home/rechargecash/rechargeseller'));
    }
    /*
     * 通过提现
     */
    public function cashpass()
    {
//        pp(I());
        //1.找出商家的可金额和已提现金额
        $money = M('seller')
            ->where($where = array('id' => I('s_id')))
            ->field('withdrawals,already_withdrawals,freeze')
            ->find();
        //2.可提现金额相减，已提现金额相加
        $data                      = M('seller');
        $data->id                  = I('s_id');
        $data->freeze              = $money['freeze'] - I('r_money'); //冻结金额减少
        $data->withdrawals         = $money['withdrawals'] - I('r_money'); //可提现金额减少
        $data->already_withdrawals = $money['already_withdrawals'] + I('r_money'); //已提现金额增加
        $data->save();
        //状态修改
        $case        = M('rechargecash_seller');
        $case->id    = I('id');
        $case->is_ok = 1;
        $case->save();
        $this->success('操作成功！', U('/home/rechargecash/rechargeseller'));
    }

    /*
     *用户充值提现管理
     */
    public function recharge()
    {
        $search = I();
        if ($search != null) {
//            pp($search);
            if ($search['username'] != null) {
                $name              = $search['username'];
                $map['u.username'] = array("like", "%$name%");
            }
            if ($search['is_ok'] != null) {
                $map['r.is_ok'] = $search['is_ok'];
            }
            if ($search['type'] != null) {
                $map['type'] = $search['type'];
            }
            if ($search['time'] != null && $search['time2'] != null) {
                $stime             = strtotime($search['time']);
                $etime             = strtotime($search['time2']);
                $map['apply_time'] = array('between', array($stime, $etime));
            }
            $data = M()->table('__RECHARGECASH__ r')
                ->join('left join __USER__ u on u.id = r.user_id')
                ->join('left join __USER_BANK__ ub on r.user_bank_id = ub.id')
                ->join('left join __BANK__ b on b.id = ub.bank_type')
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->order('r.is_ok,r.apply_time desc')
                ->field('r.*,u.username,ub.open_name,ub.open_account,ub.open_address,b.bank_name')
                ->select();
            $count = M()->table('__RECHARGECASH__ r')
                ->join('left join __USER__ u on u.id = r.user_id')
                ->where($map)
                ->count();
        } else {
            $data = M()->table('__RECHARGECASH__ r')
                ->join('left join __USER__ u on u.id = r.user_id')
                ->join('left join __USER_BANK__ ub on r.user_bank_id = ub.id')
                ->join('left join __BANK__ b on b.id = ub.bank_type')
                ->page($_GET['p'] . ',20')
                ->order('r.is_ok,r.apply_time desc')
                ->field('r.*,u.username,ub.open_name,ub.open_account,ub.open_address,b.bank_name')
                ->select();
//            pp($data);
            $count = M()->table('__RECHARGECASH__ r')
                ->join('left join __USER__ u on u.id = r.user_id')
                ->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('data', $data);
        $this->assign('count', $count);
        $this->assign('search', $search);
        $this->display();
    }

    /*
     * 通过提现
     */
    public function cashpassuser()
    {
//        pp(I());
        if (I('type') == 2) {
            //判断类型为提现时，user表的账户余额减少金额
            $money = M('user')
                ->where($where = array('id' => I('user_id')))
                ->field('balance')
                ->find();
            $balance       = $money['balance'] - I('money');
            $data          = M('user');
            $data->id      = I('user_id');
            $data->balance = $balance;
            $user          = $data->save();
        }
        //状态修改
        $case          = M('rechargecash');
        $case->id      = I('id');
        $case->is_ok   = 1;
        $case->is_time = time();
        $re            = $case->save();

        if ($user && $re) {
            $this->success('操作成功！', U('/home/rechargecash/recharge'));
        }

    }
    /*
     * 拒绝提现
     */
    public function cashcloseuser()
    {
        if (I('type') == 2) {
            //判断类型为提现时，user表的账户余额加上金额，充值不做处理
            $money = M('user')
                ->where($where = array('id' => I('user_id')))
                ->field('balance')
                ->find();
            $data          = M('user');
            $data->id      = I('user_id');
            $data->balance = $money['balance'] + I('money'); //商家余额金额增加
            $data->save();
        }

        //3.状态修改
        $case          = M('rechargecash');
        $case->id      = I('id');
        $case->is_ok   = 2;
        $case->is_time = time();
        $case->save();
        $this->success('操作成功！', U('/home/rechargecash/recharge'));
    }
    /*
     * 赠送
     * */
    public function rechargesend()
    {
        $arr = I();
        if ($arr != null) {
//            pp($arr);
            $money = M('user')
                ->where($where = array('username' => $arr['username']))
                ->field('balance,id')
                ->find();
            if (!$money) {
                $this->error('查无此用户，请核对后重新输入');
            }
            $user          = M('user'); //更新用户表账户余额
            $user->balance = $money['balance'] + $arr['money'];
            $user->id      = $money['id'];
            $user->save();

            $data             = M('rechargecash'); //充值提现表添加记录
            $data->user_id    = $money['id'];
            $data->type       = 3; //类型默认为赠送
            $data->money      = $arr['money'];
            $data->apply_time = time();
            $data->is_ok      = 1; //默认已完成
            $data->note       = $arr['note'];
            $data->add();
            $this->success('赠送成功！', U('/home/rechargecash/recharge'));
        } else {
            $this->display();
        }
    }
    /*
     * 扣款
     * */
    public function rechargeback()
    {
        $arr = I();
        if ($arr != null) {
//            pp($arr);
            $money = M('user')
                ->where($where = array('username' => $arr['username']))
                ->field('balance,id')
                ->find();
            if (!$money) {
                $this->error('查无此用户，请核对后重新输入');
            }
            if ($arr['money'] > $money['balance']) {
                $this->error('用户余额不足，请重新输入');
            }
            $user          = M('user'); //更新用户表账户余额
            $user->balance = $money['balance'] - $arr['money'];
            $user->id      = $money['id'];
            $user->save();

            $data             = M('rechargecash'); //充值提现表添加记录
            $data->user_id    = $money['id'];
            $data->type       = 4; //类型默认为扣款
            $data->money      = $arr['money'];
            $data->apply_time = time();
            $data->is_ok      = 1; //默认已完成
            $data->note       = $arr['note'];
            $data->add();
            $this->success('扣款成功！', U('/home/rechargecash/recharge'));
        } else {
            $this->display();
        }
    }
}
