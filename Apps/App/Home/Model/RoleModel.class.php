<?php
/**
 * role-model
 * User: lwh
 */
namespace Home\Model;

use Think\Model;

class RoleModel extends Model
{
    /*抓取全部节点*/
    public function allrabc()
    {
        $data = M('rabc_info')->select();
        return $data;
    }
    /*添加角色*/
    public function addrole($arr)
    {
        $guid = create_guid();
        //防止超时
        set_time_limit(0);
        //1.角色添加
        $data              = M('role');
        $data->role_id     = $guid;
        $data->role_name   = $arr['name'];
        $data->role_remark = $arr['remark'];
        $data->add();
        //2.角色权限关联表新增
        $rabc = $arr['lvid'];
        if ($rabc != null) {
            $rolerabc = M('rolerabc');
            for ($i = 0; $i < count($rabc); $i++) {
                $rolerabc->role_id = $guid;
                $rolerabc->rabc_id = $rabc[$i];
                $rolerabc->add();
            }
        } else {
            $allrabc  = M('rabc_info')->field('id')->select();
            $rolerabc = M('rolerabc');
            for ($i = 0; $i < count($allrabc); $i++) {
                $rolerabc->role_id = $guid;
                $rolerabc->rabc_id = $allrabc[$i]['id'];
                $rolerabc->add();
            }
        }
        //3.用户角色关联表新增
        $data = M('roleadmin');
        for ($i = 0; $i < count($arr['lvadminid']); $i++) {
            $data->role_id  = $guid;
            $data->admin_id = $arr['lvadminid'][$i];
            $data->add();
        }
    }
    /*编辑角色*/
    public function roleupdate()
    {
        $arr = I();
        set_time_limit(0);
        //1.角色添加
        $data                  = M('role');
        $data->id              = $arr['user_id'];
        $data->role_id         = $arr['role_id'];
        $data->role_name       = $arr['name'];
        $data->role_remark     = $arr['remark'];
        $data->is_depart_admin = $arr['depart_admin'];
        $data->save();
        //2.角色权限关联表新增
        $rabc     = array_merge($arr['id'], $arr['lvid']);
        $rolerabc = M('rolerabc');
        if ($rabc != null) {
            for ($i = 0; $i < count($rabc); $i++) {
                $rolerabc->role_id = $arr['role_id'];
                $rolerabc->rabc_id = $rabc[$i];
                $rolerabc->add();
            }
        } else {
            $allrabc  = M('rabc_info')->field('id')->select();
            $rolerabc = M('rolerabc');
            for ($i = 0; $i < count($allrabc); $i++) {
                $rolerabc->role_id = $arr['role_id'];
                $rolerabc->rabc_id = $allrabc[$i]['id'];
                $rolerabc->add();
            }
        }

        //3.用户角色关联表新增
        $data = M('roleadmin');
        for ($i = 0; $i < count($arr['lvadminid']); $i++) {
            $data->role_id  = $arr['role_id'];
            $data->admin_id = $arr['lvadminid'][$i];
            $data->add();
        }
    }
    /*角色选择用户*/
    public function addadmin($arr)
    {
        set_time_limit(0);
        for ($i = 0; $i < count($arr['choose']); $i++) {
            $data           = M('roleadmin');
            $data->role_id  = $arr['role_id'];
            $data->admin_id = $arr['choose'][$i];
            $data->add();
        }
    }
}
