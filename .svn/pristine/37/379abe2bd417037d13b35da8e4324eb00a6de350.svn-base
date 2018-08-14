<?php
/**
 *  商家营收明细
 * User: qql
 */
namespace Home\Controller;

use Think\Controller;

class SellerrevenueController extends IndexController
{
    public function revenueindex()
    {
        $arr = I();
        if($arr != null){
//            pp($arr);
            $type     = $arr['type'];
            $map2['SR.type']  = array("like", "%$type%");

            if($arr['s_name'] != null){
                $s_name = $arr['s_name'];
                $map['name'] = array("like","%$s_name%");
            }
            if($arr['s_id'] != null){
                $map['id'] = $arr['s_id'];
                $map2['SR.seller_id'] = $arr['s_id'];
            }
            if($arr['time1'] != null && $arr['time2'] != null){
                $l_time = strtotime($arr['time1']);
                $r_time = strtotime($arr['time2']);
//                $map2['O.pay_time'] = array("between",array($l_time,$r_time));
//                $map2['CS.apply_time'] = array("between",array($l_time,$r_time));
//                $map2['RS.apply_time'] = array("between",array($l_time,$r_time));
//                $map2['_logic'] = 'OR';
                $map2 = array(
                    'O.pay_time'=>array("between",array($l_time,$r_time)),
                    'CS.apply_time'=>array("between",array($l_time,$r_time)),
                    'RS.apply_time'=>array("between",array($l_time,$r_time)),
                    '_logic'=>'or'       // 关系为or
                );
            }
            if($arr['down_money'] != null && $arr['up_money'] != null){
                $down_money = $arr['down_money'];
                $up_money = $arr['up_money'];
                $map2 = array(
                    'O.total_price'=>array("between",array($down_money,$up_money)),
                    'CS.money'=>array("between",array($down_money,$up_money)),
                    'RS.r_money'=>array("between",array($down_money,$up_money)),
                    '_logic'=>'or'
                );
            }

            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] =  array('eq', $seller_id);
                $map3['SR.seller_id'] =  array('eq', $seller_id);
                $map3['_complex'] = $map2;

                $seller = M('seller')
                    ->where($cooksj)
                    ->field('id,number,name as s_name,balance,withdrawals,freeze,already_withdrawals')
                    ->select();

                $data = M()->table('__SELLER_REVENUE__ SR')
                    ->join('left join __ORDERS__ O on O.id = SR.order_id')
                    ->join('left join __RECHARGECASH_SELLER__ RS on RS.id = SR.rechargecash_id')
                    ->join('left join __CUSTOMER_SERVICE__ CS on CS.id = SR.service_id ')
//                    ->where($map2)
                    ->where($map3)
                    ->field('SR.type,O.order_number,O.total_price,O.seller_price,O.pay_time,CS.service_number,CS.status as cs_status,CS.money as cs_money,CS.apply_time as cs_time,RS.is_ok as rs_is_ok,RS.r_money,RS.apply_time,RS.rs_number as rs_id')
                    ->page($_GET['p'] . ',20')
                    ->select();
					$count=M()->table('__SELLER_REVENUE__ SR')
                    ->join('left join __ORDERS__ O on O.id = SR.order_id')
                    ->join('left join __RECHARGECASH_SELLER__ RS on RS.id = SR.rechargecash_id')
                    ->join('left join __CUSTOMER_SERVICE__ CS on CS.id = SR.service_id ')
                    ->where($map3)
                    ->count();
            }else{
                $seller = M('seller')
                    ->where($map)
                    ->field('id,number,name as s_name,balance,withdrawals,freeze,already_withdrawals')
                    ->select();
                $data = M()->table('__SELLER_REVENUE__ SR')
                    ->join('left join __ORDERS__ O on O.id = SR.order_id')
                    ->join('left join __RECHARGECASH_SELLER__ RS on RS.id = SR.rechargecash_id')
                    ->join('left join __CUSTOMER_SERVICE__ CS on CS.id = SR.service_id ')
                    ->where($map2)
//                ->where($where = array('O.pay_time'=>1 OR 'CS.apply_time'=>1))
                    ->field('SR.type,O.order_number,O.total_price,O.seller_price,O.pay_time,CS.service_number,CS.status as cs_status,CS.money as cs_money,CS.apply_time as cs_time,RS.is_ok as rs_is_ok,RS.r_money,RS.apply_time,RS.rs_number as rs_id')
                    ->page($_GET['p'] . ',20')
                    ->select();
				$count=	M()->table('__SELLER_REVENUE__ SR')
                    ->join('left join __ORDERS__ O on O.id = SR.order_id')
                    ->join('left join __RECHARGECASH_SELLER__ RS on RS.id = SR.rechargecash_id')
                    ->join('left join __CUSTOMER_SERVICE__ CS on CS.id = SR.service_id ')
                    ->where($map2)
                    ->count();
            }

        }else{
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] =  array('eq', $seller_id);
//                $seller    = M('seller')->where($cooksj)->field('id,name')->select();
                $seller = M('seller')
                    ->where($cooksj)
                    ->field('id,number,name as s_name,balance,withdrawals,freeze,already_withdrawals')
                    ->select();

                //获取营收明细
                $data = M()->table('__SELLER_REVENUE__ SR')
                    ->join('left join __ORDERS__ O on O.id = SR.order_id')
                    ->join('left join __RECHARGECASH_SELLER__ RS on RS.id = SR.rechargecash_id ')
                    ->join('left join __CUSTOMER_SERVICE__ CS on CS.id = SR.service_id ')
                    ->where(array('SR.seller_id'=>$cooksj['id']))
                    ->field('
                        SR.type,
                        O.order_number,
                        O.total_price,
                        O.seller_price,
                        O.pay_time,
                        CS.service_number,
                        CS.status as cs_status,
                        CS.money as cs_money,
                        CS.apply_time as cs_time,
                        RS.is_ok as rs_is_ok,
                        RS.r_money,
                        RS.apply_time,
                        RS.rs_number as rs_id
                        ')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M('seller_revenue')->where(array('seller_id'=>$cooksj['id']))->count();


            }else{
                // 获取商家信息
                $seller = M('seller')
//             ->where($where=array('id'=>$seller_id['seller_id']))
                    ->field('id,number,name as s_name,balance,withdrawals,freeze,already_withdrawals')
                    ->select();
                //获取营收明细
                $data = M()->table('__SELLER_REVENUE__ SR')
                    ->join('left join __ORDERS__ O on O.id = SR.order_id')
                    ->join('left join __RECHARGECASH_SELLER__ RS on RS.id = SR.rechargecash_id ')  //is_ok=1
                    ->join('left join __CUSTOMER_SERVICE__ CS on CS.id = SR.service_id ')

//            ->where(array('SR.seller_id'=>$seller_id['seller_id']))  //订单号，订单金额，营收金额，订单时间
                    ->field('
                        SR.type,
                        O.order_number,
                        O.total_price,
                        O.seller_price,
                        O.pay_time,
                        CS.service_number,
                        CS.status as cs_status,
                        CS.money as cs_money,
                        CS.apply_time as cs_time,
                        RS.is_ok as rs_is_ok,
                        RS.r_money,
                        RS.apply_time,
                        RS.rs_number as rs_id
                        ')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M('seller_revenue')->count();
            }
        }



//pp($data);
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('seller',$seller);
        $this->assign('data',$data);
        $this->assign('search',$arr);
        $this->display();
    }
    //商家提现
    public function cash(){
        $s_id = I('s_id');
        $seller = M('seller')
            ->where(array('id'=>$s_id))
            ->field('id,name,balance,withdrawals,freeze,already_withdrawals')
            ->find();

        $bank = M()->table('__SELLER_ACCOUNT__ sa')
            ->join('left join __BANK__ b on b.id = sa.bank_type')
            ->where(array('sa.seller_id'=>$s_id))
            ->field('sa.*,b.bank_name')
            ->select();
        //限制每天的提现时间
        $cash = M('cash')->find();
        $time = date('h:i:s',$cash['seller_begin_time']);
        $time2 = date('h:i:s',$cash['seller_end_time']);
        $start_time = strtotime($time);
        $end_time = strtotime($time2);
        $time3 = strtotime("2017-4-02 12:00:00");
        if($start_time >= time() &&  $end_time <= time()){
            $this->error('现在不在提现时间！');
        }
        //限制每月的提现次数
        $yuetime = date('Y-m',time());
        $yue_start = strtotime($yuetime);
        $yue['apply_time'] = array("between",array($yue_start,time()));
        $yue['seller_id'] = $s_id;
        $yuesum = M('rechargecash_seller')->where($yue)->count();
        if($yuesum > $cash['seller_number']){
            $this->error('本月的提现次数已用完！');
        }
        //限制每天的提现总额
        $day0 = date('Y-m-d',time());
        $day_start = strtotime($day0);
        $daytime['apply_time'] = array("between",array($day_start,time()));
        $daytime['seller_id'] = $s_id;
        $daymoney = M('rechargecash_seller')->where($daytime)->field('sum(r_money) as r_money')->select();
        if($daymoney[0]['r_money'] >= $cash['seller_max_money']){
            $this->error('今日提现金额已用完！');
        }else{
            $left_money = $cash['seller_max_money'] - $daymoney[0]['r_money'];
            $this->assign('left_money',$left_money);
        }
        //每次最低提现金额
        $min_money = $cash['seller_min_money'];
        $this->assign('min_money',$min_money);
//        pp($daymoney);
        $this->assign('seller',$seller);
        $this->assign('bank',$bank);
        $this->display();
    }
    public function sellercash(){
        $arr = I();
        $bank = M()->table('__SELLER_ACCOUNT__ sa')
            ->join('left join __BANK__ b on b.id = sa.bank_type')
            ->where(array('sa.id'=>$arr['bank_id']))
            ->field('sa.*,b.bank_name')
            ->find();
//        pp($bank);

        //添加提现表格
        $tmp     = "TX" . date('YmdHis', time()) . rand(1000, 9999); //订单编号
        $data                 = M('rechargecash_seller');
        $data->seller_id      = $bank['seller_id'];
        $data->rs_number      = $tmp;
        $data->type           = 1;
        $data->r_money        = $arr['money'];
        $data->apply_time     = time();
        $data->is_ok          = 0;
        $data->bankclass      = $bank['bank_name'];
        $data->bankaccount    = $bank['open_bank'];
        $data->bankcode       = $bank['accounts'];
        $data->bankname       = $bank['name'];
        $data->bankname       = $bank['name'];
        $res                  = $data->add();

        $rs_id = M('rechargecash_seller')->where(array('rs_number'=>$tmp))->getField('id');
        //添加商家营收表
        $revenue = M('seller_revenue');
        $revenue->seller_id = $bank['seller_id'];
        $revenue->type = 2;
        $revenue->rechargecash_id = $rs_id;
        $rev = $revenue->add();

        //更新商家表
        $seller = M('seller')->where(array('id'=>$bank['seller_id']))->field('balance,withdrawals,freeze,already_withdrawals')->find();

        $balance = $seller['balance'] - $arr['money'];
        $withdrawals = $seller['withdrawals'] - $arr['money'];
        $freeze = $seller['freeze'] + $arr['money'];

        $sellers = M('seller');
        $sellers->id = $bank['seller_id'];
        $sellers->balance = $balance;
        $sellers->withdrawals = $withdrawals;
        $sellers->freeze = $freeze;
        $sel = $sellers->save();

        if($res && $rev && $sel){
            $this->success('提交成功，等待审核！',U('/home/Sellerrevenue/revenueindex'));
        }
//        pp($arr);
    }

}
