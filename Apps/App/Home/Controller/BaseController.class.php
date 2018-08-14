<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    /**
     * 说明
     * @access public
     */
    public function __construct(){
        parent::__construct();
        //echo "这是父类,执行base-c"."</br>";
    }
    /**
     * 初始化方法
     */
    // public function _initialize(){
    //     echo "这是父类执行1"."</br>";
    // }
}