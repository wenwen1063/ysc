<?php
/**
 * 商品一级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class UserController extends IndexController
{
    //商品一级分类首页
    public function index()
    {
        $search = I();
        if ($search != null) {
            // dump($search);
            if ($search['is_disable'] != null) {
                $is_disable          = $search['is_disable'];
                $map['u.is_disable'] = array("like", "%$is_disable%");
            }
            if ($search['userphone'] != null) {
                $userphone          = $search['userphone'];
                $map['u.userphone'] = array("like", "%$userphone%");
            }
            if ($search['username'] != null) {
                $username          = userTextEncode($search['username']);
                $map['u.username'] = array("like", "%$username%");
            }
            if ($search['introduce'] != null) {
                $introduce           = $search['introduce'];
                $map['us.userphone'] = array("eq", "$introduce");
            }

            $result = M()->table('__USER__ as u')
                ->join('left join __USER__ as us on us.id=u.introduce')
                ->field('u.*,us.username as shangname,us.userphone as shangphone')
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->select();

            $count = M()->table('__USER__ as u')
                ->join('left join __USER__ as us on us.id=u.introduce')
                ->field('u.*,us.username as shangname,us.userphone as shangphone')
                ->where($map)
                ->count();
        } else {
            $result = M()->table('__USER__ as u')
                ->join('left join __USER__ as us on us.id=u.introduce')
                ->field('u.*,us.username as shangname,us.userphone as shangphone')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__USER__ as u')
                ->join('left join __USER__ as us on us.id=u.introduce')
                ->field('u.*,us.username as shangname,us.userphone as shangphone')
                ->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $result);
        $this->display();
    }


public  function userTextEncode($wx_name)
    {
        if (!is_string($wx_name)) {
            return $wx_name;
        }

        if (!$wx_name || $wx_name == 'undefined') {
            return '';
        }

        $wxname = json_encode($wx_name); //暴露出unicode
        $wxname = preg_replace_callback("/(\\\u[ed][0-9a-f]{3})/i", function ($wx_name) {
            return addslashes($wx_name[0]);
        }, $wxname); //将emoji的unicode留下，其他不动，这里的正则比原答案增加了d，因为我发现我很多emoji实际上是\ud开头的，反而暂时没发现有\ue开头。
        return json_decode($wxname);
    }

    public function useradd()
    {
        $arr = I();
        if ($arr != null) {
            $find = M("user")->where(array('username' => $arr['username']))->find();
            if ($find) {
                $this->error("用户名已存在");
            }
            $arr['avatar']   = pic();
            $arr['password'] = md5(I("password") . C('MD5_KEY'));
            $arr['addtime']  = strtotime(date('Y-m-d H:i:s', time()));
            $result          = D("User")->UserAddList($arr);
            if ($result['add'] == 1) {
                $this->success('新增成功！', U('/home/user/index'));
            } else if ($result['add'] == 2) {
                $this->success('新增失败！', U('/home/user/index'));
            }

        } else {
            $this->display();
        }

    }

    public function userupdate()
    {
        $arr   = I();
        $table = M("user");
        if ($arr['password'] != '') {
            $c = pic();
            if ($arr['password'] != $arr['pwd']) {
                $table->password = md5($arr['password'] . C('MD5_KEY'));
            }
            if ($c != '') {
                $table->avatar = $c;
            }
            $table->id        = I("id");
            $table->userphone = I("userphone");
            $table->username  = I("username");
            $table->email     = I("email");
            $table->province  = I("province");
            $table->city      = I("city");
            $table->district  = I("district");
            $table->address   = I("address");
            $table->remark    = I("remark");
            $table->save();
            $this->success('编辑成功！', U('/home/user/index'));
        } else {
            $result = M('user')->where(array('id' => $arr['id']))->find();
            $this->assign('data', $result);
            $this->display();
        }
    }

//  删除
    public function userdel()
    {
        $arr    = I();
        $table  = M("user");
        $result = D("base")->deleteData($arr, $table);
        if ($result == 1) {
            $this->success('删除成功！', U('/home/user/index'));
        } else {
            $this->success('删除失败！', U('/home/user/index'));
        }

    }
    // 禁启
    public function userdisable()
    {
        $arr    = I();
        $table  = M("user");
        $result = D("base")->disableData($arr, $table);
        if ($result == 1) {
            $this->success('成功！', U('/home/user/index'));
        } else {
            $this->success('失败！', U('/home/user/index'));
        }
    }
// 查看
    public function userlook()
    {
        $data    = M("user")->where(array('id' => I("id")))->find();
        $addr    = M("user_addr")->where(array("user_id" => I("id")))->select();
        $upgrade = M()->table("user_upgrade_logs u")
            ->join("partner p on p.id=u.type")
            ->join("partner pa on pa.id=u.upgrade_type")
            ->field("u.*,p.name as type_name,pa.name as upgrade_type_name")
            ->where(array("user_id" => I("id")))->select();
        $this->assign("upgrade", $upgrade);
        $this->assign("addr", $addr);
        $this->assign("data", $data);
        $this->display();
    }
    // 审核列表
    public function upgradeindex()
    {

        $search = I();
        if ($search != null) {
            if ($search['is_disable'] != null) {
                $is_disable           = $search['is_disable'];
                $map['us.is_disable'] = array("like", "%$is_disable%");
            }
            if ($search['userphone'] != null) {
                $userphone           = $search['userphone'];
                $map['us.userphone'] = array("like", "%$userphone%");
            }
            if ($search['username'] != null) {
                $username           = $search['username'];
                $map['us.username'] = array("like", "%$username%");
            }
            if ($search['upgrade_type'] != null) {
                $upgrade_type          = $search['upgrade_type'];
                $map['u.upgrade_type'] = array("like", "%$upgrade_type%");
            }
            if ($search['condition'] != null) {
                $condition          = $search['condition'];
                $map['u.condition'] = array("like", "%$condition%");
            }
            if ($search['state'] != null) {
                $state          = $search['state'];
                $map['u.state'] = array("like", "%$state%");
            }
            if ($search['time'] != null && $search['time2'] != null) {
                $stime         = strtotime($search['time']);
                $etime         = strtotime($search['time2']);
                $moneyarr      = array($stime, $etime);
                $map['u.time'] = array("between", $moneyarr);
            }
            // condition
            $result = M()->table('user_upgrade_logs as u')
                ->join('left join user as us on us.id=u.user_id')
                ->join('left join partner as p on u.type=p.id')
                ->join('left join partner as pa on u.upgrade_type=pa.id')
                ->field('u.*,us.username as shangname,us.userphone as shangphone,us.avatar,p.name as typename,pa.name as sname')
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->select();

            $count = M()->table('user_upgrade_logs as u')
                ->join('left join user as us on us.id=u.user_id')
                ->join('left join partner as p on u.type=p.id')
                ->join('left join partner as pa on u.upgrade_type=pa.id')
                ->field('u.*,us.username as shangname,us.userphone as shangphone,us.avatar,p.name as typename,pa.name as sname')
                ->where($map)
                ->count();
            $partner1 = M("partner")->where(array('id' => $search['upgrade_type']))->find();
            $this->assign('partner1', $partner1);
        } else {
            $result = M()->table('user_upgrade_logs as u')
                ->join('left join user as us on us.id=u.user_id')
                ->join('left join partner as p on u.type=p.id')
                ->join('left join partner as pa on u.upgrade_type=pa.id')
                ->field('u.*,us.username as shangname,us.userphone as shangphone,us.avatar,p.name as typename,pa.name as sname')
                ->page($_GET['p'] . ',20')
                ->select();

            $count = M()->table('user_upgrade_logs as u')
                ->join('left join user as us on us.id=u.user_id')
                ->join('left join partner as p on u.type=p.id')
                ->join('left join partner as pa on u.upgrade_type=pa.id')
                ->field('u.*,us.username as shangname,us.userphone as shangphone,us.avatar,p.name as typename,pa.name as sname')
                ->count();
        }
//        pp($result);
        $partner = M("partner")->select();

        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('partner', $partner);
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $result);
        $this->display();
    }
// 审核
    public function userupgrade()
    {
        $arr = I();
        // dump($arr);die;
        $table  = M("user_upgrade_logs");
        $result = $this->UserUpgradeList($arr, $table);
        if ($result == 1) {
            $this->success('成功！', U('/home/user/upgradeindex'));
        } else {
            $this->success('失败！', U('/home/user/upgradeindex'));
        }
    }
    // 通过
    public function UserUpgradeList($arr, $table)
    {
        if ($arr['type'] == 1) {
            //通过
            if (empty($arr)) {
                $result = 0;
            } else {
                if (is_array($arr['id'])) {
                    set_time_limit(0);
                    for ($i = 0; $i < count($arr['id']); $i++) {
                        $data['auditing_time'] = strtotime(date('Y-m-d H:i:s', time()));
                        $data['state']         = 1;
                        $table->where(array('id' => $arr['id'][$i]))->save($data);
                    }
                    $result = 1;
                } else {
                    $data['auditing_time'] = strtotime(date('Y-m-d H:i:s', time()));
                    $data['state']         = 1;
                    $table->where(array('id' => $arr['id']))->save($data);
                    $result = 1;
                }
            }
        } else {
            if (empty($arr)) {
                $result = 0;
            } else {
                if (is_array($arr['id'])) {
                    set_time_limit(0);
                    for ($i = 0; $i < count($arr['id']); $i++) {
                        $data['auditing_time'] = strtotime(date('Y-m-d H:i:s', time()));
                        $data['state']         = 2;
                        $table->where(array('id' => $arr['id'][$i]))->save($data);
                    }
                    $result = 1;
                } else {
                    $data['auditing_time'] = strtotime(date('Y-m-d H:i:s', time()));
                    $data['state']         = 2;
                    $table->where(array('id' => $arr['id']))->save($data);
                    $result = 1;
                }
            }
        }
        return $result;
    }

}
