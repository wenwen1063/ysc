<?php
namespace Home\Model;

use Think\Model;

class OrdersModel extends BaseModel
{

    /*发货*/
    public function orderpost($arr)
    {

        //获得订单商品信息 2016/12/16 添加 czq
//      $goodsinfo = M()->table('__ORDERS__ O')
//          ->join('left join __ORDER_GOODS__ OG on OG.order_id=O.id')
//          ->join('left join __GOODS__ G on G.id=OG.goods_id')
//          ->field('OG.goods_id, OG.goods_number,OG.goods_attr_id, O.seller_id')
//          ->group('OG.goods_id')
//          ->where(array('O.id' => $arr['order_id']))
//          ->select();
//      //更新库存 2016/12/16 添加
//      foreach ($goodsinfo as $key => $value) {
//          $map['seller_id'] = $goodsinfo[$key]['depart_id'];
//          $map['goods_id']  = $goodsinfo[$key]['goods_id'];
//          // dump($goodsinfo[$key]['is_book']);
//          // dump($goodsinfo[$key]['is_stock']);
//          // die;
//          //库存量
//          $data['stock'] = M()->table('__GOODS_ATTRIBUTE_INFO__ gai')
//              ->join('left join __GOODS__ g on g.id = gai.goods_id')
//              ->where($map)
//              ->field('stock')
//              ->find();
//          //更新后库存量
//          $data['stock'] -= $goodsinfo[$key]['goods_number'];
//          $result = M('goods_attribute_info')
//          // ->table('wm_goods_management')
//          ->where($map)
//              ->save($data);
//
//      }
        //走物流。配送方式ID默认为0，表示默认为派送员派送
        $order              = M('orders');
        $order->id          = $arr['order_id'];
//      $order->post_status = 2;
		$order->order_status = 2;
        $order->post_time   = time();
        $order->post_number = $arr['shipment_number'];
        $order->post_way    = 1;
        $order->save();

    }

    public function updateorder($arr)
    {
        // $address            = M('address');
        // $address->consignee = $arr['consignee'];
        // $address->province  = $arr['province'];
        // $address->city      = $arr['city'];
        // $address->district  = $arr['district'];
        // $address->address   = $arr['address'];
        // $address->phone     = $arr['tel'];
        // $address_id         = $address->add();

        $order           = M('orders');
        $order->id       = $arr['order_id'];
        $order->contact  = $arr['contact'];
        $order->phone    = $arr['tel'];
        $order->province = $arr['province'];
        $order->city     = $arr['city'];
        $order->district = $arr['district'];
        $order->address  = $arr['address'];
        $order->note     = $arr['note'];
        // $order->address_id = $address_id;
        $order->save();
    }
}
