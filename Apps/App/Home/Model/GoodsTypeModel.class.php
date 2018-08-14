<?php
namespace Home\Model;
use Think\Model;
class GoodsTypeModel extends BaseModel{
    /**
     * 说明
     * @access public
     * @param 商品主分类
     * @param array
     */
    public function getGoodstype(){
        return $this->order('main_id')->select();
    }
}