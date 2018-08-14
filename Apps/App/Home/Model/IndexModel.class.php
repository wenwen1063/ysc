<?php
/**
 * base-model
 * base: lwh
 */
namespace Home\Model;
use Think\Model;
/**
 * 基础模型
 * @access public
 * @param CURD
 */
class IndexModel extends BaseModel{
    public function _initialize(){
        echo "这是index-model执行"."</br>";
    }

	public function index(){
		echo "这是model执行1"."</br>";
	}
}