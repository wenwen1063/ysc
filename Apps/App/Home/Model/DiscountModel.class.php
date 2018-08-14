<?php
namespace Home\Model;
use Think\Model;
class DiscountModel extends BaseModel{
     /**
     * 说明
     * @access public
     * @param 优惠券
     * @return num/arr
     */
     public function getDiscount($change_couponid,$coupon_price=0){
        if ($change_couponid!=null) {
            $coupon = $this->where($where = array('id'=>$change_couponid))->find();
            $coupon_price = $coupon['money'];
        }
        return $coupon_price;
     }
     /**
     * 说明
     * @access public
     * @param 优惠券-改为使用
     * @doing
     */
     public function save_o_Discount($change_couponid,$user_id=999999,$order_add_id=999999){
        $data['use_time'] = time();
        $data['use_status'] = 1;
        $data['order_id'] = $order_add_id;
        M('DiscountInfor')->where($where = array('discount_id'=>$change_couponid,'user_id'=>$user_id))->save($data);
     }
}