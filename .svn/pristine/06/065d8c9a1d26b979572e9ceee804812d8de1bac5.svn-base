<?php
namespace Home\Model;
use Think\Model;
class CartModel extends BaseModel{
    /**
     * 说明
     * @access public
     * @param 通过购物获取总金额 总数量
     * @param array
     */
    public function o_g_num_price($arr_id){
        $cartmap['c.id']  = array('in',$arr_id);//购物车id集
        return $this->table('__CART__ c')
        ->where($cartmap)
        ->where("g.goods_inventory is not null")
        ->join('left join __GOODS__ g on g.goods_id = c.goods_id and g.goods_inventory>=c.goods_number')
        ->group('user_id')
        ->field('
            sum(c.goods_number*g.now_price) as all_price,
            sum(c.goods_number) as goods_number
          ')
        ->find();
    }
    /**
     * 说明
     * @access public
     * @param 通过购物购买的商品id集合
     * @param array
     */
    public function getCartgoods($arr_id){
        $cartmap['id']  = array('in',$arr_id);//购物车id集
        return $this->where($cartmap)->getField('goods_id',true);
    }
    /**
     * 说明
     * @access public
     * @param 通过购物车结合购买的商品信息集合
     * @param array
     */
    public function cart_goods($arr_id){
        $cartmap['id']  = array('in',$arr_id);//购物车id集
        return $this->table('__CART__ c')
        ->where($cartmap)
        ->join('left join __GOODS__ g on g.goods_id = c.goods_id')
        ->field('
            c.*,
            g.goods_id,
            g.now_price,
            g.goods_weight
          ')
        ->select();
    }
}