<?php
namespace Home\Model;
use Think\Model;
class UsersModel extends BaseModel{
    /**
     * 说明
     * @access public
     * @param 商品主分类
     * @param array
     */
    public function getUserById($UserId){
        return $this->where($where = array('id'=>$UserId))->field('id,type,level,balance')->find();
    }
}