<?php
namespace Home\Model;
use Think\Model;
class GoodsMainModel extends BaseModel{
    /**
     * 说明
     * @access public
     * @param 商品主分类
     * @param array
     */
    public function getGoodsmain(){
        return $this->select();
    }
}