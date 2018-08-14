<?php
namespace Home\Controller;
use Think\Controller;
class OrderBaseController extends RbacController {
    public function __construct(){
        parent::__construct();
    }
    /**
     * order订单支付
     * @access public
     * @param 购物车信息转sql查询需要的数组
     * @param 1.普通分割字段 2.去除特殊字段 3其他
     * @return array
     */
    public function cart_explode($order_code,$type,$exp=",",$unset="on"){
        $cart_id = array_filter(explode($exp, $order_code));
        switch ($type) {
            case '1':
                break;
            case '2':
                for ($i=0; $i < count($cart_id); $i++) {
                    if($cart_id[$i]==$unset){
                        unset($cart_id[$i]);
                    }
                }
                break;
            default:
                break;
        }
        return $cart_id;
    }
    /**
     * order订单支付-订单计算信息-针对有活动的订单
     * @access public
     * @param discount_price//优惠金额
     * @param total_price//合计金额
     * @param c_o_g//定义从0开始数组-订单明细-用于订单明细的修改
     * @return array
     */
    public function orderCalculation($goods_act,$ordergoodsinfo,$freight,$discount_price = 0,$freight_price = 0,$c_o_g = 0){
        if($goods_act){
            for ($i=0; $i < count($goods_act); $i++) {
                for ($j=0; $j < count($ordergoodsinfo); $j++) {
                    //比对商品goods_id
                    if ($goods_act[$i]['goods_id']!=$ordergoodsinfo[$j]['goods_id']) {
                        continue;
                    }
                    //优惠金额
                    if($goods_act[$i]['after_type']==1){
                        $discount_price+=$ordergoodsinfo[$j]['goods_number']*$goods_act[$i]['after_price'];
                        $change_o_g[$c_o_g] = array(
                            'id'=>$ordergoodsinfo[$j]['id'],
                            'goods_number'=>$ordergoodsinfo[$j]['goods_number'],
                            'buy_number'=>$ordergoodsinfo[$j]['goods_number'],
                            'pay_price'=>$ordergoodsinfo[$j]['now_price']-$goods_act[$i]['after_price'],
                            );
                    }
                    //折扣
                    if($goods_act[$i]['after_type']==2){
                        $discount_price+=$ordergoodsinfo[$j]['goods_number']*$ordergoodsinfo[$j]['now_price']*($goods_act[$i]['after_discount']/10);
                        $change_o_g[$c_o_g] = array(
                            'id'=>$ordergoodsinfo[$j]['id'],
                            'goods_number'=>$ordergoodsinfo[$j]['goods_number'],
                            'buy_number'=>$ordergoodsinfo[$j]['goods_number'],
                            'pay_price'=>$ordergoodsinfo[$j]['now_price']*($goods_act[$i]['after_discount']/10),
                            );
                    }
                    //买赠
                    if($goods_act[$i]['after_type']==3){
                        $give_number = M()->table('__ACT_CHIC__ ac')
                        ->join('left join __ACT_CHIC_ATTR__ aca on aca.act_chic_id = ac.id')
                        ->where('aca.buy_number<='.$ordergoodsinfo[$j]['goods_number'].' and aca.goods_id='.$ordergoodsinfo[$j]['goods_id'])
                        ->field('aca.buy_number,aca.give_number')->find();
                        if ($give_number!=null) {
                            //订单明细改变数组
                            $change_o_g[$c_o_g] = array(
                                'id'=>$ordergoodsinfo[$j]['id'],
                                'goods_number'=>$ordergoodsinfo[$j]['goods_number'],
                                'buy_number'=>round($ordergoodsinfo[$j]['goods_number']/$give_number['buy_number'])*$give_number['give_number'] + $ordergoodsinfo[$j]['goods_number'],
                                'pay_price'=>($ordergoodsinfo[$j]['goods_number']*$ordergoodsinfo[$j]['now_price'])/(round($ordergoodsinfo[$j]['goods_number']/$give_number['buy_number'])*$give_number['give_number'] + $ordergoodsinfo[$j]['goods_number']),
                                );
                        }
                    }
                    $c_o_g+=1;
                    //免邮  计算邮费
                    if ($goods_act[$i]['after_type']!=4) {
                        $all_weight = $ordergoodsinfo[$j]['goods_number']*$ordergoodsinfo[$j]['goods_weight'];
                        $freight_price+=$freight['start_price'];
                        if ($all_weight>1) {
                            $freight_price+=ceil(($all_weight-1))*$freight['next_price'];
                        }
                    }
                }
            }
        }
        //组合实际订单明细 p($change_o_g);
        for ($i=0; $i < count($ordergoodsinfo); $i++) {
            for ($j=0; $j < count($change_o_g); $j++) {
                if ($ordergoodsinfo[$i]['id']!=$change_o_g[$j]['id']) {
                    continue;
                }else{
                    $ordergoodsinfo[$i]['buy_number'] = $change_o_g[$j]['buy_number'];
                    $ordergoodsinfo[$i]['pay_price'] = $change_o_g[$j]['pay_price'];
                }
            }
            if ($ordergoodsinfo[$i]['pay_price']==null) {
                $ordergoodsinfo[$i]['pay_price'] = $ordergoodsinfo[$i]['now_price'];
            }
        }
        $order_return_arr = array(
            'discount_price'=>$discount_price,
            'freight_price'=>$freight_price,
            'ordergoodsinfo'=>$ordergoodsinfo,
            );
        return $order_return_arr;
    }
    /**
     * order订单支付-订单计算信息-针对有活动的订单
     * @access public
     * @param 拼接数组(订单总额，邮费，优惠)
     * @return array
     */
    public function orderIfno($order_c_info,$coupon_price,$o_g_num_price,$total_price=0){
        $total_price = $o_g_num_price['all_price']+$order_c_info['freight_price']-$order_c_info['discount_price']-$coupon_price;
        $order_info = array(
            'total_price'=>$total_price,
            'freight'=>$order_c_info['freight_price'],
            'discount_price'=>($order_c_info['discount_price']+$coupon_price),
            );
        return $order_info;
    }
    /**
     * order订单支付-订单明细信息-库存变动
     * @access public
     * @param 拼接数组(datalist)做批量更新
     * @return array
     */
    public function orderGoodsInfo($ordergoodsinfo,$order_add_id=999999){
        for ($i=0; $i < count($ordergoodsinfo); $i++) {
            $dataList[$i] = array(
              'order_id'=>$order_add_id,
              'goods_id'=>$ordergoodsinfo[$i]['goods_id'],
              'goods_number'=>$ordergoodsinfo[$i]['goods_number'],
              'now_price'=>$ordergoodsinfo[$i]['now_price'],
              'pay_price'=>$ordergoodsinfo[$i]['pay_price'],
              'buy_number'=>$ordergoodsinfo[$i]['buy_number'],
              );
            D('goods')->upGoodsStock(3,$ordergoodsinfo[$i]['goods_id'],$ordergoodsinfo[$i]['goods_number'],'goods_inventory');
        }
        return $dataList;
    }
}