<?php
/**
 * 商品一级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class TwoController extends IndexController
{
    //商品一级分类编辑
    public function twoindex()
    {
        $arr  = I();
        $data = M('base')->where(array('id' => 1))->field('b_pic')->find();
        if (IS_POST) {

            $goodsclass     = M('base');
            $goodsclass->id = 1;
            // $goodsclass_data['name'] = $arr['name'];
            $upload           = new \Think\Upload(); // 实例化上传类
            $upload->maxSize  = 3145728; // 设置附件上传大小
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['pic']['savepath'] . $info['pic']['savename'] != null) {
                $goodsclass->b_pic = $info['pic']['savepath'] . $info['pic']['savename'];
            }
            if ($data != null) {
                $goodsclass->save();
                $this->success('编辑成功!',U('/home/two/twoindex'));
				exit;
            } else {
                $goodsclass->add();
                $this->success('添加成功！', U('/home/two/twoindex'));
				exit;
            }
        }
        // dump($data);
        $this->assign('data', $data);
        $this->display();
    }

}
