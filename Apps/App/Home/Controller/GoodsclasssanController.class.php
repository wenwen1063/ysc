<?php
/**
 * 商品三级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class GoodsclasssanController extends IndexController
{
    //商品三级分类首页
    public function goodsclasssanindex()
    {
        $search = I();
        if ($search != null) {
            $name            = $search['name'];
            $map['gcs.name'] = array("like", "%$name%");
            if ($search['is_disable'] != null) {
                $map['gcs.is_disable'] = $search['is_disable'];
            }
            $data = M()->table('__GOODS_CLASS_SAN__ gcs')
                ->where($map)
                ->join('left join __GOODS_CLASS_TWO__ gct on gct.id=gcs.gct_id')
                ->order('gcs.id')
                ->field('gcs.*,gct.name as gct_name')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__GOODS_CLASS_SAN__ gcs')
                ->where($map)
                ->count();
        } else {
            $data = M()->table('__GOODS_CLASS_SAN__ gcs')
                ->join('left join __GOODS_CLASS_TWO__ gct on gct.id=gcs.gct_id')
                ->order('gcs.id')
                ->field('gcs.*,gct.name as gct_name')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M('goods_class_san')->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    //商品三级分类新增
    public function goodsclasssanadd()
    {
        $arr = I();
        if ($arr != null) {
            $isnot = M('goods_class_san')->where(array('name' => $arr['name']))->find();
            if ($isnot != null) {
                $this->error('名称重复，请重复输入');
            } else {
                $goodsclasssan         = M('goods_class_san');
                $goodsclasssan->gct_id = $arr['gct_id'];
                $goodsclasssan->number = 'GCS' . date('YmdHis', time()) . rand(1000, 9999);
                $goodsclasssan->name   = $arr['name'];
                $upload                = new \Think\Upload(); // 实例化上传类
                $upload->maxSize       = 3145728; // 设置附件上传大小
                $upload->exts          = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
                $upload->rootPath      = './Public/Uploads/'; // 设置附件上传根目录
                $upload->savePath      = ''; // 设置附件上传（子）目录
                // 上传文件
                $info = $upload->upload();
                if ($info['big_pic']['savepath'] . $info['big_pic']['savename'] != null) {
                    $goodsclasssan->big_pic = $info['big_pic']['savepath'] . $info['big_pic']['savename'];
                }
                if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
                    $goodsclasssan->sm_pic = $info['sm_pic']['savepath'] . $info['sm_pic']['savename'];
                }
                $goodsclasssan->is_disable = 0;
                $goodsclasssan->add();
                $this->success('新增成功！', U('/home/goodsclasssan/goodsclasssanindex'));
            }
        } else {
            $gct = M('goods_class_two')
                ->where(array('is_disable' => 0))
                ->field('id,name')
                ->select();
            $this->assign('gct', $gct);
            $this->display();
        }
    }

    //商品三级分类编辑
    public function goodsclasssanupdate()
    {
        $arr = I();
        if ($arr['name'] != null) {
            if ($arr['rename'] != $arr['name']) {
                $where['id']   = array('neq', $arr['id']);
                $where['name'] = $arr['name'];
                $isnot         = M('goods_class_san')->where($where)->find();
                if ($isnot != null) {
                    $this->error('分类名称重复，请重新输入');
                }
            }
            $goodsclasssan                = M('goods_class_san');
            $goodsclasssan_data['id']     = $arr['id'];
            $goodsclasssan_data['gct_id'] = $arr['gct_id'];
            $goodsclasssan_data['name']   = $arr['name'];
            $upload                       = new \Think\Upload(); // 实例化上传类
            $upload->maxSize              = 3145728; // 设置附件上传大小
            $upload->exts                 = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath             = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath             = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['big_pic']['savepath'] . $info['big_pic']['savename'] != null) {
                $goodsclasssan_data['big_pic'] = $info['big_pic']['savepath'] . $info['big_pic']['savename'];
            }
            if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
                $goodsclasssan_data['sm_pic'] = $info['sm_pic']['savepath'] . $info['sm_pic']['savename'];
            }
            $goodsclasssan->save($goodsclasssan_data);
            $this->success('编辑成功！', U('/home/goodsclasssan/goodsclasssanindex'));
        } else {
            $data              = M('goods_class_san')->where(array('id' => $arr['id']))->find();
            $map['id']         = array('neq', $data['gct_id']);
            $map['is_disable'] = 0;
            $gct               = M('goods_class_two')->field('id,name')->where($map)->select();
            $gct_name          = M('goods_class_two')->where(array('id' => $data['gct_id']))->getField('name');
            $this->assign('gct', $gct);
            $this->assign('data', $data);
            $this->assign('gct_name', $gct_name);
            $this->display();
        }
    }

    //商品三级分类禁用启用
    public function goodsclasssandisable()
    {
        $arr  = I();
        $data = M('goods_class_san');
        if ($arr['is_disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            //下架三级分类下的商品
            $goods_ids = M()->table('__GOODS_AND_CLASS__ gac')
                ->where(array('gac.gcs_id' => $arr['id']))
                ->field('goods_id')
                ->select();
            $do['is_on_sale'] = 0;
            foreach ($goods_ids as $key => $value) {
                M('goods')->where(array('id' => $value['goods_id']))->save($do);
            }
            $this->success('禁用成功！', U('/home/goodsclasssan/goodsclasssanindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            //上架三级分类下的商品
            $goods_ids = M()->table('__GOODS_AND_CLASS__ gac')
                ->where(array('gac.gcs_id' => $arr['id']))
                ->field('goods_id')
                ->select();
            $do['is_on_sale'] = 1;
            foreach ($goods_ids as $key => $value) {
                M('goods')->where(array('id' => $value['goods_id']))->save($do);
            }
            $this->success('启用成功！', U('/home/goodsclasssan/goodsclasssanindex'));
        }
    }

    //商品三级分类删除
    public function goodsclasssandel()
    {
        $result = M('goods_and_class')->where(array('gcs_id' => I('id')))->find();
        if ($result != null) {
            $this->error('该分类已使用,无法删除');
        }
        M('goods_class_san')->where(array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/goodsclasssan/goodsclasssanindex'));
    }
}
