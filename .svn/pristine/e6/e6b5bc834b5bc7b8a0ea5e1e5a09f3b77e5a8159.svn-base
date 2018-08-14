<?php
namespace Home\Model;
use Think\Model;
class ActivityModel extends BaseModel{
    /**
     * 说明
     * @access public
     * @param 商品活动-信息
     * @param array
     */
    public function goods_act($goods_array){
        $goods_id_map['ag.goods_id'] = array('in',$goods_array);
        return $this->table('__ACTIVITY__ a')
        ->join('__ACTIVITY_GOODS__ ag on ag.act_id=a.act_id')//活动表
        ->join('__ACT_CHIC__ ac on ac.act_id=a.act_id')//单品活动属性表
        ->field('
            a.act_id,
            ag.goods_id,
            a.act_name,
            a.act_type,
            a.act_bgcolor,
            ac.id as ac_id,
            ac.is_varied,
            ac.after_type,
            ac.after_price,
            ac.after_discount
          ')
        ->where("a.starttime<'$time'")
        ->where("a.endtime>'$time'")
        ->where($goods_id_map)
        ->where($where = array('a.act_type'=>3))
        ->select();
    }
}