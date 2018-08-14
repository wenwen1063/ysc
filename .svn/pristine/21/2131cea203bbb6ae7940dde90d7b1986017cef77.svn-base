<?php
/**
 * 角色管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class RoleController extends IndexController
{
/*
 *角色管理
 */
    public function roleindex()
    {
        $search = I();
        if ($search != null) {
            if ($search['id'] != null) {
                $id        = $search['id'];
                $map['id'] = $id;
            }
            if ($search['role_name'] != null) {
                $role_name        = $search['role_name'];
                $map['role_name'] = array("like", "%$role_name%");
            }
            $data = M('role')->where($map)->page($_GET['p'] . ',20')->select();
            // pp($data);
            $count = M('role')->where($map)->count();
        } else {
            // $admin     = $this->admin(); //不可编辑
            // $map['id'] = array('neq', 1);
            $data  = M('role')->page($_GET['p'] . ',20')->select();
            $count = M('role')->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('data', $data);
        // $this->assign('admin', $admin);
        $this->assign('search', $search);
        $this->display();
    }
    private function admin()
    {
        $data = M('role')->where($where = array('id' => 1))->find();
        return $data;
    }
    /*
     *角色管理-添加角色
     */
    //首先做一个类内的变量，存储一下相关的数组：
    public $tree = null;
    // 递归方法
    private function unlimitedForLayer($cate, $name = 'child', $pid = 0)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['t_id'] == $pid) {
                $v[$name] = self::unlimitedForLayer($cate, $name, $v['id']);
                $arr[]    = $v;
            }
        }
        return $arr;
    }
    /*
     *角色管理-添加角色页面
     */
    public function roleadd()
    {
        // $arr = $this->getTreeData();
        // pp($arr);
        $arr = I();
//        pp($arr);
        if ($arr != null) {
            $result = M('role')->where($where = array('role_name' => I('name')))->find();
            if ($result != null) {
                $this->error('名称重复，请重复输入');
            }
            $data = D('role')->addrole($arr);
            $this->success('新增成功！', U('/home/role/roleindex'));
        } else {
            // 全部管理员
            $alladmin = M('admin')->field('admin_id,user')->select();
            // 抓取全部节点
            $data = D('role')->allrabc();
            // 递归节点分级
            $data = $this->unlimitedForLayer($data);
            //pp($data);
            $this->assign('data', $data);
            $this->assign('alladmin', $alladmin);
            $this->display();
        }
    }
    /*
     *角色管理-角色-添加用户
     */
    public function addadmin()
    {
        $arr = I();
        if ($arr['role_name'] != null) {
            if ($arr['choose'] == null) {
                $this->error('必须选择用户');
            }
            D('role')->addadmin($arr);
            $this->success('添加成功！', U('/home/role/roleindex'));
        } else {
            $role = M('role')->where($where = array('id' => I('id')))->find();
            $this->assign('role', $role);
            $this->display();
        }
    }


    /*
     *角色管理-删除角色
     */
        public function delrole()
    {
        $id      = I('id');
        $role_id = I('role_id');
        M('role')->where($where = array('id' => $id))->delete();
        M('rolerabc')->where($where = array('role_id' => $role_id))->delete();
        $this->success('删除成功！', U('/home/role/roleindex'));
    }
    /*
     *角色管理-编辑角色
     */
    public function roleupdate()
    {
        $arr = I();
        if ($arr['name'] != null) {
//            pp($arr);
            //判断名字重复
            if ($arr['name'] != $arr['rename']) {
                $result = M('role')->where($where = array('role_name' => I('name')))->find();
                if ($result != null) {
                    $this->error('名称重复，请重复输入');
                }
            }
            //1.删除角色权限-用户角色-不能用model  当删除自己的权限无法使用modelfunction
            M('rolerabc')->where($where = array('role_id' => $arr['role_id']))->delete();
            M('roleadmin')->where($where = array('role_id' => $arr['role_id']))->delete();
            //2.更新权限
            set_time_limit(0);
            //1.角色添加
            $data              = M('role');
            $data->id          = $arr['user_id'];
            $data->role_id     = $arr['role_id'];
            $data->role_name   = $arr['name'];
            $data->role_remark = $arr['remark'];
            // $data->is_depart_admin = $arr['depart_admin'];
            $data->save();
            //2.角色权限关联表新增
            $rabc     = $arr['lvidd'];
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
            $this->success('编辑成功！', U('/home/role/roleindex'));
        } else {
            set_time_limit(0);
            //1.找出已经拥有的权限的id
            $user = M('role')->where($where = array('id' => I('id')))->find();
            $rabc = M()->table('__RABC_INFO__ ri')
                ->join('left join __ROLERABC__ rr on ri.id = rr.rabc_id')
                ->where($where = array('rr.role_id' => $user['role_id']))
                ->field('ri.id')->select();
            // dump($user);p($rabc);
            //二维数组合并一维
            $rabc = column($rabc, 'id');
            // 抓取全部节点
            $data = D('role')->allrabc();
            // 递归节点分级
            $data = $this->unlimitedForLayer($data);
            //2.用户的信息-已经拥有的，未拥有的
            $admin = M('roleadmin')->where($where = array('role_id' => $user['role_id']))->field('admin_id')->select();
            $admin = column($admin, 'admin_id');
            if ($admin != null) {
                //2.1 拥有的用户
                $mapin['admin_id'] = array('in', $admin);
                $adminin           = M('admin')->where($mapin)->field('admin_id,user')->select();
                //2.2 未拥有的用户
                $mapnot['admin_id'] = array('not in', $admin);
                $adminnot           = M('admin')->where($mapnot)->field('admin_id,user')->select();
            } else {
                //当没有选择的用户时，为全空
                $adminnot = M('admin')->where($mapnot)->field('admin_id,user')->select();
            }
            $this->assign('adminin', $adminin);
            $this->assign('adminnot', $adminnot);
            $this->assign('data', $data);
            $this->assign('rabc', $rabc);
            $this->assign('user', $user);
            $this->display();
        }
    }
    private function getTreeData($type = 'tree')
    {
        $data = M('rabc_info')->select();
        // 获取树形或者结构数据
        if ($type == 'tree') {
            $data = \Org\Nx\Data::tree($data, 'controllername', 'id', 't_id');
        } elseif ($type = "level") {
            $data = \Org\Nx\Data::channelLevel($data, 0, '&nbsp;', 'id');
            // 显示有权限的菜单
            $auth = new \Think\Auth();
            foreach ($data as $k => $v) {
                if ($auth->check($v['mca'], $_SESSION['user']['id'])) {
                    foreach ($v['_data'] as $m => $n) {
                        if (!$auth->check($n['mca'], $_SESSION['user']['id'])) {
                            unset($data[$k]['_data'][$m]);
                        }
                    }
                } else {
                    // 删除无权限的菜单
                    unset($data[$k]);
                }
            }
        }
        // p($data);die;
        return $data;
    }
    /*
     *角色管理-禁用操作
     */
    public function roledisable()
    {
        $arr  = I();
        $data = M('role');
        if ($arr['disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            $this->success('禁用成功！', U('/home/role/roleindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            $this->success('启动成功！', U('/home/role/roleindex'));
        }
    }

}
