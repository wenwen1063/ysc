<?php
/**
 * 空页面跳转
 * User: czq
 */
namespace Home\Controller;

use Think\Controller;

class PublicController extends Controller
{
    public function kong()
    {
        $this->display();
    }
}
