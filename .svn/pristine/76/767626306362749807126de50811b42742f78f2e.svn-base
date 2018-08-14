<?php
/**
 * 物流分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class LogclassController extends IndexController
{
/*
 *物流分类管理-首页
 */
    public function logclassindex()
    {
        $search = I();
        if ($search != null) {
            /*if ($search['is_disable'] != null) {
                $map['is_disable'] = $search['is_disable'];
            }*/
            $name          = $search['name'];
            $map['name'] = array("like", "%$name%");
            $data          = M('logistics')->where($map)->page($_GET['p'] . ',20')->select();
            $count         = M('logistics')->where($map)->count();
        } else {
            $data  = M('logistics')->page($_GET['p'] . ',20')->select();
            $count = M('logistics')->count();
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
     *物流分类管理-添加
     */
    public function logclassadd()
    {
        $arr = I();
//        pp($arr);
        if ($arr != null) {
            $result = M('logistics')->where($where = array('name' => I('name')))->find();
            $result2 = M('logistics')->where($where = array('sn' => I('sn')))->find();
            if ($result != null) {
                $this->error('名称重复，请重新输入');
            }
              if ($result2 != null) {
                $this->error('物流编号重复，请重新输入');
            }
            $data              = M('logistics');
            $data->sn        = $arr['sn'];
            $data->name      = $arr['name'];
            $data->interface = $arr['interface'];
            $data->add();
            $this->success('添加成功！', U('/home/logclass/logclassindex'));
        } else {
            $this->display();
        }
    }
    /*
     *物流分类管理-编辑
     */
    public function logclassupdate()
    {
        $arr = I();
//        pp($arr);
        if ($arr['sn'] != null) {
//            pp($arr);
            if($arr['orsn'] != $arr['sn']){
                $result = M('logistics')->where($where = array('sn' => I('sn')))->find();
                if ($result != null) {
                    $this->error('编号重复，请重新输入');
                }
            }
            if($arr['orname'] != $arr['name']){
                $result = M('logistics')->where($where = array('name' => I('name')))->find();
                if ($result != null) {
                    $this->error('名称重复，请重新输入');
                }
            }
            /*$result = M('logistics')->where($where = array('name' => I('name')))->find();
            if ($result != null) {
                $this->error('名称重复，请重新输入');
            }*/

            $data              = M('logistics');
            $data->id          = $arr['id'];
            $data->sn        = $arr['sn'];
            $data->name      = $arr['name'];
            $data->interface = $arr['interface'];
            $data->save();
            $this->success('编辑成功！',U('/home/logclass/logclassindex'));
        } else {
            $data = M('logistics')->where($where = array('id' => I('id')))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }
    /*
     *物流分类管理-删除
     */
    public function logclassdel()
    {
        $result = M('logistics_seller')->where($where = array('logistics_id' => I('id')))->find();
        if ($result != null) {
            $this->error('该分类已使用，无法删除');
        }
        M('logistics')->where($where = array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/logclass/logclassindex'));
    }
    /*
     *物流分类管理-禁用
     */
    public function logclassdisable()
    {
        $arr  = I();
        $data = M('logistics');
        if ($arr['is_disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            $this->success('禁用成功！', U('/home/logclass/logclassindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            $this->success('禁用成功！', U('/home/logclass/logclassindex'));
        }
    }

}
