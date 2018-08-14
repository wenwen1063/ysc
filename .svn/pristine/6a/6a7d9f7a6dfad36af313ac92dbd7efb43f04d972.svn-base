<?php
namespace Home\Controller;

use Think\Controller;

class VerifyController extends Controller
{
/*
 * 验证码
 */
    public function index()
    {
        $Verify           = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet  = '024689';
        $Verify->imageW   = 130;
        $Verify->imageH   = 50;
        ob_clean();
        $Verify->entry(1);
    }
}
