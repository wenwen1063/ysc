<?php
/**
 * 用户管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class BankController extends IndexController
{
/*
 *用户管理
 */
    public function bankindex()
    {
        $search = I();
        if ($search != null) {
            $bank_name          = $search['bank_name'];
            $map['B.bank_name'] = array("like", "%$bank_name%");
            if ($search['is_disable'] != null) {
                $map['B.is_disable'] = $search['is_disable'];
            }
            $data = M()->table('__BANK__ B')->where($map)
                ->where('B.is_delete = 0')
                ->page($_GET['p'] . ',20')->select();
            $count = M()->table('__BANK__ B')->where($map)
                ->where('B.is_delete = 0')
                ->count();
        } else {
            $data = M()->table('__BANK__ B')
                ->where('B.is_delete = 0')
                ->page($_GET['p'] . ',20')->select();
            $count = M()->table('__BANK__ B')
                ->where('B.is_delete = 0')
                ->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }
    /*
     *用户管理-添加用户
     */
    public function bankadd()
    {
        $arr = I();
        if ($arr != null) {
//      	dump($arr);die;
            $name = M('bank')->where($where = array('bank_name' => $arr['name']))->find();
//			dump($name);die;
            if ($name==null) {
                $data             = M('bank');
                $data->bank_name  = $arr['name'];
                $data->is_disable = 0;
                $data->is_delete  = 0;
                $data->add();
                $this->success('添加成功', U('/home/bank/bankindex'));
            }else{
            	 $this->error('该银行已存在',U('/home/bank/bankindex'));
            }
           
        } else {
            //角色信息-id-name-rabc
            $data = M('role')->select();
            $this->assign('data', $data);
            $this->display();
        }
    }
    /*
     *用户管理-禁用操作
     */
    public function bankdisable()
    {
        $arr  = I();
        $data = M('bank');
        if ($arr['disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            $this->success('禁用成功！', U('/home/bank/bankindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            $this->success('启动成功！', U('/home/bank/bankindex'));
        }
    }
    /*
     *用户管理-删除
     */
    public function bankdel()
    {
        $arr             = I();
        $data            = M('bank');
        $data->id        = $arr['id'];
        $data->is_delete = 1;
        $data->save();
        $this->success('删除成功！', U('/home/bank/bankindex'));
    }

    public function delbank()
    {
        $arr = I();
        for ($i = 0; $i < count($arr['id']); $i++) {
            $data            = M('bank');
            $data->id        = $arr['id'][$i];
            $data->is_delete = 1;
            $data->save();
        }
        $this->success('删除成功！', U('/home/bank/bankindex'));
    }
    /*
     *用户管理-修改页面
     */
    public function bankupdate()
    {
        $arr = I();
        // dump($name);die;
        // dump($arr);
        if ($arr['name'] != null || $_FILES) {
            if ($arr['rename'] != $arr['name']) {
                $isnot = M('bank')->where($where = array('bank_name' => $arr['name']))->find();
                if ($isnot != null) {
                    $this->error('名称重复，请重新输入');
                }
            }
            $data            = M('bank');
            $data->id        = $arr['id'];
            $data->bank_name = $arr['name'];
            // dump($data);
            $data->save();
            $this->success('编辑成功！', U('/home/bank/bankindex'));

        } else {
            $data = M('bank')
                ->where($where = array('id' => I('id')))->find();
            $this->assign('name', $name);
            $this->assign('data', $data);
            $this->display();

        }
    }
}
