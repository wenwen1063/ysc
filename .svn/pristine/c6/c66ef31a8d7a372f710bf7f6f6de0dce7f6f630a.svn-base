<?php
/**
 * 商品一级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class TlunboController extends IndexController
{
    //商品一级分类首页
    public function index()
    {
        // $search = I();
        // if ($search != null) {
        //     $name           = $search['name'];
        //     $map['gc.name'] = array("like", "%$name%");
        //     if ($search['is_disable'] != null) {
        //         $map['gc.is_disable'] = $search['is_disable'];
        //     }
        //     $data = M()->table('__GOODS_CLASS__ gc')
        //         ->where($map)
        //         ->page($_GET['p'] . ',20')
        //         ->select();
        //     $count = M()->table('__GOODS_CLASS__ gc')
        //         ->where($map)
        //         ->count();
        // } else {
        $data = M('teacher_lb')
            ->page($_GET['p'] . ',20')
            ->select();
        $count = M('teacher_lb')->count();
        // }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    //商品一级分类新增
    public function add()
    {
        $arr = I();

        if ($arr != null) {
            // dump($arr);die;
            //     $isnot = M('goods_class')->where(array('name' => $arr['name']))->find();
            //     if ($isnot != null) {
            //         $this->error('名称重复，请重复输入');
            //     } else {
            $pic = M('teacher_lb');
            // $goodsclass->number = 'GC' . date('YmdHis', time()) . rand(1000, 9999);
            // $goodsclass->name   = $arr['name'];
            $upload           = new \Think\Upload(); // 实例化上传类
            $upload->maxSize  = 3145728; // 设置附件上传大小
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['pic']['savepath'] . $info['pic']['savename'] != null) {
                $pic->pic = $info['pic']['savepath'] . $info['pic']['savename'];
            }
            // if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
            //     $pic  ->sm_pic = $info['sm_pic']['savepath'] . $info['sm_pic']['savename'];
            // }
            // $pic  ->is_disable = 0;
            $pic->link = $arr['link'];
            $pic->add();
            $this->success('新增成功！', U('/home/tlunbo/index'));
            // }
        } else {
            $this->display();
        }
    }

    //商品一级分类编辑
    public function update()
    {
        $arr = I();
        if ($arr['link'] != null) {
            //     if ($arr['rename'] != $arr['name']) {
            //         $where['id']   = array('neq', $arr['id']);
            //         $where['name'] = $arr['name'];
            //         $isnot         = M('goods_class')->where($where)->find();
            //         if ($isnot != null) {
            //             $this->error('分类名称重复，请重新输入');
            //         }
            //     }
            $goodsclass              = M('teacher_lb');
            $goodsclass_data['id']   = $arr['id'];
            $goodsclass_data['link'] = $arr['link'];
            // $goodsclass_data['name'] = $arr['name'];
            $upload           = new \Think\Upload(); // 实例化上传类
            $upload->maxSize  = 3145728; // 设置附件上传大小
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['pic']['savepath'] . $info['pic']['savename'] != null) {
                $goodsclass_data['pic'] = $info['pic']['savepath'] . $info['pic']['savename'];
            }
            // if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
            //     $goodsclass_data['sm_pic'] = $info['sm_pic']['savepath'] . $info['sm_pic']['savename'];
            // }
            $goodsclass->save($goodsclass_data);
            $this->success('编辑成功！', U('/home/tlunbo/index'));
        } else {
            $data = M('teacher_lb')->where(array('id' => $arr['id']))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }

    //商品一级分类禁用启用
    // public function goodsclassdisable()
    // {
    //     $arr  = I();
    //     $data = M('goods_class');
    //     if ($arr['is_disable'] == 0) {
    //         //禁用操作
    //         $data->id         = $arr['id'];
    //         $data->is_disable = 1;
    //         $data->save();
    //         //禁用一级分类下的二级分类
    //         $map['goods_class_id'] = $arr['id'];
    //         $type                  = M('goods_class_two');
    //         $save['is_disable']    = 1;
    //         $type->where($map)->save($save);
    //         $this->success('禁用成功！', U('/home/goodsclass/goodsclassindex'));
    //     } else {
    //         //启动操作
    //         $data->id         = $arr['id'];
    //         $data->is_disable = 0;
    //         $data->save();
    //         //启用一级分类下的二级分类
    //         $map['goods_class_id'] = $arr['id'];
    //         $type                  = M('goods_class_two');
    //         $save['is_disable']    = 0;
    //         $type->where($map)->save($save);
    //         $this->success('启用成功！', U('/home/goodsclass/goodsclassindex'));
    //     }
    // }

    //商品一级分类删除
    public function del()
    {
        // $result = M('teacher_lb')->where(array('id' => I('id')))->find();
        // if ($result != null) {
        //     $this->error('该分类已使用,无法删除');
        // }
        M('teacher_lb')->where(array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/tlunbo/index'));
    }
}
