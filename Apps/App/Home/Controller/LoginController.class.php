<?php
namespace Home\Controller;

use Think\Controller;

/*
 *系统登入控制
 */
class LoginController extends Controller
{
/*
 * 后台登入主页
 */
    public function index()
    {
        $this->display();
    }
/*
 * 后台登入判断
 */
    public function login()
    {
    //dump("aaa");die;
        $verify = I('verify');
        if (!check_verify($verify)) {
            $this->error("亲,您的验证码输错了哦！", $this->site_url, 1);
        }
        $login['user']     = I('username');
        $login['password'] = md5(I('password') . C('MD5_KEY'));
		
		//dump(M("admin"));die;
        $admin = M('admin')->where($login)->find();
        // dump($admin);
        // pp($login);

        if ($admin == null) {
            $this->error('找不到此用户');
        }
        if ($admin['is_disable'] != 0) {
            $this->error('该用户已被禁用');
        }
        cookie('admin_id', $admin['admin_id']);
        cookie('user', $admin['user']);
        cookie('seller_id', $admin['seller_id']);
        $this->success('登录成功', U('/home/index/index'));
    }
    public function logout()
    {
        cookie('admin_id', null);
        cookie('user', null);
        $this->redirect("/home/login/index");
    }

}
