<?php
/**
 * 资讯分类管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class InformationclassController extends IndexController
{
/*
 *资讯分类管理
 */
    public function informationclassindex()
    {
        $search = I();
        if ($search != null) {
            $name        = $search['name'];
            $map['name'] = array("like", "%$name%");
            $data        = M('infor_class')
                ->where($map)->page($_GET['p'] . ',20')->select();
            $count = M('infor_class')
                ->where($map)->count();
        } else {
            $data = M('infor_class')
                ->page($_GET['p'] . ',20')->select();
            $count = M('infor_class')
                ->count();
//            pp($data);
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
     *资讯分类管理 - 新增分类
     */
    public function informationclassadd()
    {
        $arr = I();
//        pp($arr);
        if ($arr != null) {
            $isnot     = M('infor_class')->where($where = array('name' => $arr['name']))->find();
            $isnot2     = M('infor_class')->where($where = array('number'=>$arr['number']))->find();
//            $is_repeat = M('infor_class')->where(array('is_disable' => 0))->count("id");
//            if ($is_repeat > 5) {
//                $this->error('已启用的帮助中心分类不能超过6个！');
//            }
            if ($isnot2 != null) {
                $this->error('编号重复，请重新输入');
            }
            if ($isnot != null) {
                $this->error('名称重复，请重新输入');
            } else {
                $inforclass             = M('infor_class');
                $inforclass->name       = $arr['name'];
                $inforclass->number       = $arr['number'];
                $inforclass->is_disable = 0;
                // dump($inforclass);die;
                $inforclass->add();
                $this->success('新增成功！', U('/home/informationclass/informationclassindex'));
            }
        } else {
            $this->display();
        }
    }
    /*
     *资讯分类管理 - 编辑
     */
    public function informationclassupdate()
    {
        $arr = I();

//         pp($arr);
        if ($arr['name'] != null || $arr['number'] != null) {
//             pp($arr);
            if ($arr['rename'] != $arr['name']){
                $isnot     = M('infor_class')->where($where = array('name' => $arr['name']))->find();
                if ($isnot) {
                    $this->error('名称重复，请重新输入');
                }
            }
            if($arr['renumber'] != $arr['number']){
                $isnot2     = M('infor_class')->where($where = array('number'=>$arr['number']))->find();
                if ($isnot2) {
                    $this->error('编号重复，请重新输入');
                }
            }
            $data['id']      = $arr['id'];
            $data['name']    = $arr['name'];
            $data['number']    = $arr['number'];
            M('infor_class')->data($data)->save();
            $this->success('编辑成功！', U('/home/informationclass/informationclassindex'));

        } else {
            $data = M('infor_class')
                ->where($where = array('id' => I('id')))->find();
            $this->assign('data', $data);
            $this->display();

        }
    }

    /*
     *资讯分类管理 - 删除
     */
    public function informationclassdel()
    {
//        pp(I('id'));
        $result = M('information')->where($where = array('class_id' => I('id')))->find();
        if ($result != null) {
            $this->error('该分类已使用,无法删除');
        }
        M('infor_class')->where($where = array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/informationclass/informationclassindex'));
    }
    /*
     *资讯分类管理 - 禁用操作
     */
    public function informationclassdisable()
    {
        $arr  = I();
        $data = M('infor_class');
        if ($arr['is_disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            $this->success('禁用成功！', U('/home/informationclass/informationclassindex'));
        } else {
            //启动操作
            $is_repeat = M('infor_class')->where(array('is_disable' => 0, 'is_help' => 1))->count("id");
            if ($is_repeat > 5) {
                $this->error('已启用的帮助中心分类不能超过6个！');
            }
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            $this->success('启用成功！', U('/home/informationclass/informationclassindex'));
        }
    }
}
