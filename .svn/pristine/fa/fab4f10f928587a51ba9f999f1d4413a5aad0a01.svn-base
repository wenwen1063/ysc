<?php
/**
 * 用户管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class AdminController extends IndexController
{
/*
 *用户管理
 */
    public function adminindex()
    {
        $search = I();
        if ($search == null) {
            $data  = M('admin')->page($_GET['p'] . ',20')->select();
            $count = M('admin')->count();
        } else {
            if ($search['phone'] != null) {
                $phone        = $search['phone'];
                $map['phone'] = array("like", "%$phone%");
            }
            if ($search['user'] != null) {
                $user        = $search['user'];
                $map['user'] = array("like", "%$user%");
            }
            $data  = M('admin')->where($map)->page($_GET['p'] . ',20')->select();
            $count = M('admin')->where($map)->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->assign('search', $search);
        $this->display();
    }
    /*
     *用户管理-添加用户
     */
    public function adminadd()
    {
        $arr = I();
//        pp($arr);
        if ($arr != null) {
            $name = M('admin')->where($where = array('user' => $arr['name']))->find();
            if ($name == null) {
                D('admin')->addadmin();
                $this->success('添加成功', U('/home/admin/adminindex'));
            } else {
                $this->error('用户名重复');
            }
        } else {
            //角色信息-id-name-rabc
            $map['id'] = array('neq', 1);
            // $name      = M('departs')
            //     ->where($map)
            //     ->where('is_delete = 0')
            //     ->field('name as departs_name,id as departs_id')
            //     ->select();
            // p($name);
            $data = M('role')->where($arr = array('is_disable' => 0))->select();
            // $this->assign('name', $name);
            $this->assign('data', $data);
            $this->display();
        }
    }
    /*
     *用户管理-查看详情
     */
    public function adminshow()
    {
        //获取id
        $id   = I('id');
        $data = M('admin')->where($where = array('id' => I('id')))->find();
        //找出全部角色id
        $rolename = M('role')->table('__ROLE__ r')
            ->where($where = array('ra.admin_id' => $data['admin_id']))
            ->join("left join __ROLEADMIN__ ra on ra.role_id = r.role_id")
            ->field('r.*')->distinct(true)->select();
        // //sql->in role_id
        // for ($i=0; $i < count($data); $i++) {
        //  $arr[$i] = $data[$i]['role_id'];
        // }
        // $roleid['id']  = array('in',$arr);
        // //找出角色名
        // $rolename = M('role')->where($roleid)->select();
        $this->assign('rolename', $rolename);
        $this->assign('data', $data);
        $this->display();
    }
    /*
     *用户管理-禁用操作
     */
    public function admindisable()
    {
        $arr  = I();
        $data = M('admin');
        if ($arr['disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            $this->success('禁用成功！', U('/home/admin/adminindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            $this->success('启动成功！', U('/home/admin/adminindex'));
        }
    }
    /*
     *用户管理-删除
     */
    public function deladmin()
    {
        $arr = I();
        // pp($arr);
        //批量
        if ($arr['type'] != 2) {
            for ($i = 0; $i < count($arr['id']); $i++) {
                $id       = $arr['id'][$i];
                $admin_id = M('admin')->where(array('id' => $id))->getField('admin_id');
                M('admin')->where($where = array('id' => $id))->delete();
                M('roleadmin')->where($where = array('admin_id' => $admin_id))->delete();
            }
        } else {
            $id       = I('id');
            $admin_id = I('admin_id');
            M('admin')->where($where = array('id' => $id))->delete();
            M('roleadmin')->where($where = array('admin_id' => $admin_id))->delete();
        }
        $this->success('删除成功！', U('/home/admin/adminindex'));
    }
    /*
     *用户管理-修改页面
     */
    public function adminupdate()
    {
        $arr = I();
        if ($arr['name'] != null) {
            D('admin')->upadmin();
            $this->success('修改成功！', U('/home/admin/adminindex'));
        } else {

            $data = M()->table('__ADMIN__ A')
                ->where($where = array('A.id' => I('id')))
                ->find();
            // $map['id'] = array('neq', 1);
            // $name      = M('departs')
            //     ->where($map)
            //     ->where('is_delete = 0')
            //     ->field('name as departs_name,id as departs_id')
            //     ->select();

            /*自身的权限*/
            $rolename = M()->table('__ROLE__ r')
            // ->where($arr = array('r.is_disable' => 0))
                ->where($where = array('ra.admin_id' => I('admin_id')))
                ->join("left join __ROLEADMIN__ ra on r.role_id = ra.role_id")
                ->field('r.*')->distinct(true)->select();
            /*未有的权限*/
            for ($i = 0; $i < count($rolename); $i++) {
                $role_id[$rolename[$i]['role_id']] = $rolename[$i]['role_id'];
            }

            $allRole = M('role')
                ->distinct(true)->where(array('is_disable' => 0))->select();

            foreach ($allRole as $key => $value) {
                if (array_key_exists($allRole[$key]['role_id'], $role_id)) {
                    $allRole[$key]['ownrole'] = 1;
                } else {
                    $allRole[$key]['ownrole'] = 0;
                }
            }

            // die;
            $this->assign('allrole', $allRole);
//            $this->assign('name', $name);
            $this->assign('data', $data);
            $this->display();
        }
    }
}
