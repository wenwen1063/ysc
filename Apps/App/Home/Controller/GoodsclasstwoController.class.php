<?php
/**
 * 商品二级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class GoodsclasstwoController extends IndexController
{
    //商品二级分类首页
    public function goodsclasstwoindex()
    {
        $search = I();
        if ($search != null) {
            $name            = $search['name'];
            $map['gct.name'] = array("like", "%$name%");
            if ($search['is_disable'] != null) {
                $map['gct.is_disable'] = $search['is_disable'];
            }
            $data = M()->table('__GOODS_CLASS_TWO__ gct')
                ->where($map)
                ->join('left join __GOODS_CLASS__ gc on gc.id=gct.goods_class_id')
                ->order('gct.sort asc')
                ->field('gct.*,gc.name as gc_name')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__GOODS_CLASS_TWO__ gct')
                ->where($map)
                ->count();
        } else {
            $data = M()->table('__GOODS_CLASS_TWO__ gct')
                ->join('left join __GOODS_CLASS__ gc on gc.id=gct.goods_class_id')
                ->order('gct.sort asc')
                ->field('gct.*,gc.name as gc_name')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M('goods_class_two')->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    //商品二级分类新增
    public function goodsclasstwoadd()
    {
        $arr = I();
        if ($arr != null) {
            $isnot = M('goods_class_two')->where(array('name' => $arr['name']))->find();
            if ($isnot != null) {
                $this->error('名称重复，请重复输入');
            } else {
                $goodsclasstwo                 = M('goods_class_two');
                $goodsclasstwo->goods_class_id = $arr['gc_id'];
                $goodsclasstwo->number         = 'GCT' . date('YmdHis', time()) . rand(1000, 9999);
                $goodsclasstwo->name           = $arr['name'];
                $goodsclasstwo->sort           = $arr['sort'];
                $upload                        = new \Think\Upload(); // 实例化上传类
                $upload->maxSize               = 3145728; // 设置附件上传大小
                $upload->exts                  = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
                $upload->rootPath              = './Public/Uploads/'; // 设置附件上传根目录
                $upload->savePath              = ''; // 设置附件上传（子）目录
                // 上传文件
                $info = $upload->upload();
                if ($info['big_pic']['savepath'] . $info['big_pic']['savename'] != null) {
                    $goodsclasstwo->big_pic = $info['big_pic']['savepath'] . $info['big_pic']['savename'];
                }
                if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
                    $goodsclasstwo->sm_pic = $info['sm_pic']['savepath'] . $info['sm_pic']['savename'];
                }
                $goodsclasstwo->is_disable = 0;
                $goodsclasstwo->add();
                $this->success('新增成功！', U('/home/goodsclasstwo/goodsclasstwoindex'));
            }
        } else {
            $gc = M('goods_class')
                ->where(array('is_disable' => 0))
                ->field('id,name')
                ->select();
            $this->assign('gc', $gc);
            $this->display();
        }
    }

    //商品二级分类编辑
    public function goodsclasstwoupdate()
    {
        $arr = I();
        if ($arr['name'] != null) {
            if ($arr['rename'] != $arr['name']) {
                $where['id']   = array('neq', $arr['id']);
                $where['name'] = $arr['name'];
                $isnot         = M('goods_class_two')->where($where)->find();
                if ($isnot != null) {
                    $this->error('分类名称重复，请重新输入');
                }
            }
            $goodsclasstwo                        = M('goods_class_two');
            $goodsclasstwo_data['id']             = $arr['id'];
            $goodsclasstwo_data['goods_class_id'] = $arr['gc_id'];
            $goodsclasstwo_data['name']           = $arr['name'];
            $goodsclasstwo_data['sort']           = $arr['sort'];
            $upload                               = new \Think\Upload(); // 实例化上传类
            $upload->maxSize                      = 3145728; // 设置附件上传大小
            $upload->exts                         = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath                     = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath                     = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['big_pic']['savepath'] . $info['big_pic']['savename'] != null) {
                $goodsclasstwo_data['big_pic'] = $info['big_pic']['savepath'] . $info['big_pic']['savename'];
            }
            if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
                $goodsclasstwo_data['sm_pic'] = $info['sm_pic']['savepath'] . $info['sm_pic']['savename'];
            }
            $goodsclasstwo->save($goodsclasstwo_data);
            $this->success('编辑成功！', U('/home/goodsclasstwo/goodsclasstwoindex'));
        } else {
            $data              = M('goods_class_two')->where(array('id' => $arr['id']))->find();
            $map['id']         = array('neq', $data['goods_class_id']);
            $map['is_disable'] = 0;
            $gc                = M('goods_class')->field('id,name')->where($map)->select();
            $goods_class_name  = M('goods_class')->where(array('id' => $data['goods_class_id']))->getField('name');
            $this->assign('gc', $gc);
            $this->assign('data', $data);
            $this->assign('goods_class_name', $goods_class_name);
            $this->display();
        }
    }

    //商品二级分类禁用启用
    public function goodsclasstwodisable()
    {
        $arr  = I();
        $data = M('goods_class_two');
        if ($arr['is_disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            // //下架二级分类下的商品
            // $goods_ids = M()->table('__GOODS_AND_CLASS__ gac')
            //     ->where(array('gac.gct_id' => $arr['id']))
            //     ->field('goods_id')
            //     ->select();
            // $do['is_on_sale'] = 0;
            // foreach ($goods_ids as $key => $value) {
            //     M('goods')->where(array('id' => $value['goods_id']))->save($do);
            // }
            $this->success('禁用成功！', U('/home/goodsclasstwo/goodsclasstwoindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            // //上架二级分类下的商品
            // $goods_ids = M()->table('__GOODS_AND_CLASS__ gac')
            //     ->where(array('gac.gct_id' => $arr['id']))
            //     ->field('goods_id')
            //     ->select();
            // $do['is_on_sale'] = 1;
            // foreach ($goods_ids as $key => $value) {
            //     M('goods')->where(array('id' => $value['goods_id']))->save($do);
            // }
            $this->success('启用成功！', U('/home/goodsclasstwo/goodsclasstwoindex'));
        }
    }

    //商品二级分类删除
    public function goodsclasstwodel()
    {
        $result = M('goods_and_class')->where(array('gct_id' => I('id')))->find();
        if ($result != null) {
            $this->error('该分类已使用,无法删除');
        }
        M('goods_class_two')->where(array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/goodsclasstwo/goodsclasstwoindex'));
    }
}
