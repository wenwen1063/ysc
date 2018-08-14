<?php
/**
 * 商品一级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class ArticleclassController extends IndexController
{
    //商品一级分类首页
    public function articleclassindex()
    {
        $search = I();
        if ($search != null) {
            $name           = $search['name'];
            $map['ac.name'] = array("like", "%$name%");
            // if ($search['is_disable'] != null) {
            //     $map['ac.is_disable'] = $search['is_disable'];
            // }
            $data = M()->table('__ARTICLE_CLASS__ ac')
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__ARTICLE_CLASS__ ac')
                ->where($map)
                ->count();
        } else {
            $data = M('article_class')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M('article_class')->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    //商品一级分类新增
    public function articleclassadd()
    {
        $arr = I();
        if ($arr != null) {
            $isnot = M('article_class')->where(array('name' => $arr['name']))->find();
            if ($isnot != null) {
                $this->error('名称重复，请重复输入');
            } else {
                $class = M('article_class');
                // $class->number = 'GC' . date('YmdHis', time()) . rand(1000, 9999);
                $class->name        = $arr['name'];
                $class->gold_number = $arr['number'];
                $class->is_disable  = $arr['is_disable'];
                $class->add();
                $this->success('新增成功！', U('/home/articleclass/articleclassindex'));
            }
        } else {
            $this->display();
        }
    }

    //商品一级分类编辑
    public function articleclassupdate()
    {
        $arr = I();
        if ($arr['name'] != null) {
            if ($arr['rename'] != $arr['name']) {
                $where['id']   = array('neq', $arr['id']);
                $where['name'] = $arr['name'];
                $isnot         = M('article_class')->where($where)->find();
                if ($isnot != null) {
                    $this->error('分类名称重复，请重新输入');
                }
            }
            $class                     = M('article_class');
            $class_data['id']          = $arr['id'];
            $class_data['name']        = $arr['name'];
            $class_data['gold_number'] = $arr['number'];
            $class_data['is_disable']  = $arr['is_disable'];
            // dump($arr);die;
            $class->save($class_data);
            $this->success('编辑成功！', U('/home/articleclass/articleclassindex'));
        } else {
            $data = M('article_class')->where(array('id' => $arr['id']))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }

    //商品一级分类禁用启用
    public function articleclassdisable()
    {
        $arr  = I();
        $data = M('article_class');
        if ($arr['is_disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            $this->success('禁用成功！', U('/home/articleclass/articleclassindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            $this->success('启用成功！', U('/home/articleclass/articleclassindex'));
        }
    }

    //商品一级分类删除
    public function articleclassdel()
    {
        // $result = M('article_class')->where(array('id' => I('id')))->find();
        if ($result != null) {
            $this->error('该分类已使用,无法删除');
        }
        M('article_class')->where(array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/articleclass/articleclassindex'));
    }
}
