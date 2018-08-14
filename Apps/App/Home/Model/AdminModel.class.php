<?php
/**
 * admin-model
 * admin: lwh
 */
namespace Home\Model;

use Think\Model;

class AdminModel extends Model
{
    /*添加后台用户*/
    public function addadmin()
    {
        $guid = create_guid();
        $arr  = I();
        //添加用户
        $data              = M('admin');
        $data->admin_id    = $guid;
        $data->password    = md5($arr['pwd'] . C('MD5_KEY'));
        $data->user        = $arr['name'];
        $data->is_disable  = 0;
        $data->create_time = strtotime(date('Y-m-d H:i:s'));
        $data->depart_id   = $arr['departs_id'];
        $data->phone       = $arr['phone'];
        $data->email       = $arr['email'];
        $data->add();
        //roleadmin角色关联表
        $roleadmin = M('roleadmin');
        for ($i = 0; $i < count($arr['choose']); $i++) {
            $roleadmin->admin_id = $guid;
            $roleadmin->role_id  = $arr['choose'][$i];
            $roleadmin->add();
        }
    }
    /*添加后台商家用户*/
    public function addselleruser()
    {
        $guid = create_guid();
        $arr  = I();
        //添加用户
        $data              = M('admin');
        $data->admin_id    = $guid;
        $data->password    = md5($arr['password'] . C('MD5_KEY'));
        $data->user        = $arr['user'];
        $data->is_disable  = 0;
        $data->is_depart_admin  = 1;
        $data->create_time = strtotime(date('Y-m-d H:i:s'));
        $data->depart_id   = $arr['departs_id'];
        $data->seller_id   = $arr['seller'];
        $data->phone       = $arr['phone'];
        $data->email       = $arr['email'];
        $data->add();
        //roleadmin角色关联表
        $roleadmin = M('roleadmin');
        $roleadmin->admin_id = $guid;
        $roleadmin->role_id  = 'DDE10D1E2E69AD08450231D810F5BCFC';
        $roleadmin->add();
      /*  $roleadmin = M('roleadmin');
        for ($i = 0; $i < count($arr['choose']); $i++) {
            $roleadmin->admin_id = $guid;
            $roleadmin->role_id  = $arr['choose'][$i];
            $roleadmin->add();
        }*/
    }
    /*修改信息*/
    public function upadmin()
    {
        $arr = I();
        // pp($arr);
        if ($arr['pwd'] != null) {
            $data           = M('admin');
            $data->id       = $arr['id'];
            $data->admin_id = $arr['admin_id'];
            $data->user     = $arr['name'];
            if ($arr['password'] != $arr['pwd']) {
                $data->password = md5($arr['pwd'] . C('MD5_KEY'));
            }
            $data->save();
        }
        if ($arr['admin_id'] != null) {
            $res = M('roleadmin')->where($arr1 = array('admin_id' => $arr['admin_id']))->delete();
        }
        if (count($arr['choose']) > 0) {
            for ($i = 0; $i < count($arr['choose']); $i++) {
                $rabc           = M('roleadmin');
                $rabc->admin_id = $arr['admin_id'];
                $rabc->role_id  = $arr['choose'][$i];
                $rabc->add();
            }
        }

    }
    /*批量删除*/
    public function adminbatch()
    {
        $admin_id = I();
        //防止超时
        set_time_limit(0);
        for ($i = 0; $i < count($admin_id['id']); $i++) {
            //找出admin_id
            $adminid = M('admin')->where($where = array('id' => $admin_id['id'][$i]))->field('admin_id')->find();
            //删除用户
            M('admin')->where($where = array('id' => $admin_id['id'][$i]))->delete();
            //删除roleadmin关联表
            M('roleadmin')->where($where = array('admin_id' => $adminid['admin_id']))->delete();
        }
    }
    //admin 查找是否为管理员 分店管理员
    public function searchrole()
    {
        echo "string";
    }
}
