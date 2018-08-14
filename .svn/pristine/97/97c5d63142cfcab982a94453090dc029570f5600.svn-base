<?php
namespace Home\Controller;
use Think\Controller;
class GoodsBaseController extends RbacController {
    public function __construct(){
            parent::__construct();
        // echo "这是父类,执行admin-c  继承上级类base"."</br>";
    }
    public function _initialize(){
        //echo "这是父类,执行admin-c  继承上级类base"."</br>";
    }
    /**
     * 说明
     * @access public
     * @param 商品分类树-组合操作
     * @param array
     */
    public function get_class_tree($o_arr,$t_arr,$child='id',$parent='pid'){
        $arr = array();
        for ($i=0,$num = 0; $i < count($o_arr); $i++) {
            for ($j=0; $j < count($t_arr); $j++) {
                if ($t_arr[$j]['main_id']==$o_arr[$i]['id']) {
                    $o_arr[$i]['child'][$num] = $t_arr[$j];
                    $num+=1;
                }
            }
        }
        return $o_arr;
    }
}