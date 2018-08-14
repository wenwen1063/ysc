<?php

namespace Home\Controller;

use Think\Controller;

class DoOrderSetController extends Controller
{
/**
 * 执行订单设置内容
 *  1. 订单自动取消
 *
 */
    public function do_order_set()
    {
        //获取订单设置
        $order_set    = M('order_set')->where(array('id' => 1))->find();
        $order_cancel = $order_set['order_cancel'] * 86400; //订单自动取消小时 * 秒
        $order_confirm = $order_set['order_confirm'] * 86400; //订单自动确认小时 * 秒
        $order_evaluation = $order_set['order_evaluation'] * 86400; //订单自动评价天数
        $no_service = $order_set['no_service'] * 86400; //订单不可申请售后天数
//发货状态,0：待付款、1：待发货、2：待收货,3：待评价,4：已完成,5：已关闭;

		$nowtime = time(); //当前时间
//**************************************自动取消        
        //获取所有待支付订单
        $order_nopay = M('orders')->where(array('order_status' => 0, 'is_delete' => 0))->field('addtime,id')->select();
        //自动取消
        if ($order_nopay != null) {
            foreach ($order_nopay as $key => $value) {
            	$id=$value['id'];
                $time_diff = $nowtime - $value['addtime']; //时间差
                if ($time_diff > $order_cancel) {
                     M("orders")->where(array("id" => $id))->setField("order_status", 5);
					 $goods=M()->table("orders o")->join("left join order_goods og on o.id=og.order_id")->where(array("o.id"=>$id))
			        ->field("og.*")->select();
					foreach ($goods as $key => $value) {
			            M("goods_attribute_info")->where(array('goods_id' => $value['goods_id'],'goods_attribute_id'=>$value['goods_attr_id']))->setInc('stock', floatval($value['goods_number'])); //可领取奖励加
			        }
                }
            }
        }
		
//**************************************自动确认
 		//获取所有待收货订单
		$order_nopj = M('orders')->where(array('order_status' =>2, 'is_delete' => 0))->field('addtime,id')->select();
        //自动取消
        if ($order_nopj != null) {
            foreach ($order_nopj as $key => $value) {
            	$id=$value['id'];
                $time_diff = $nowtime - $value['addtime']; //时间差
                if ($time_diff > $order_evaluation) {
					M("orders")->where(array("id" => $id))->setField("order_status", 3);
			        M("orders")->where(array("id" => $id))->setField("pok_time", time());
			//	修改返点：冻结返点解冻
					$bonus_consume = M("bonus_consume")->where(array("order_id" =>$id))->select();
			        foreach ($bonus_consume as $key => $value) {
			            $user->where(array('id' => $value['user_id']))->setDec('reward_freeze', floatval($value['money'])); // 用户的冻结奖励减少
			            $user->where(array('id' => $value['user_id']))->setInc('reward_receive', floatval($value['money'])); //可领取奖励加
			        }
                }
            }
        }

//**************************************自动评价
 		//获取所有待评价订单
		$order_noquren = M('orders')->where(array('order_status' =>3, 'is_delete' => 0))->field('addtime,id')->select();
        //自动取消
        if ($order_noquren != null) {
            foreach ($order_noquren as $key => $value) {
            	$id=$value['id'];
                $time_diff = $nowtime - $value['addtime']; //时间差
                if ($time_diff > $order_confirm) {
					M("orders")->where(array("id" => $id))->setField("order_status", 4);
                }
            }
        }
    }
}
