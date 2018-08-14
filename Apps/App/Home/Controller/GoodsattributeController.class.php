<?php
/**
 * 商品规格分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class GoodsattributeController extends IndexController
{
    //商品规格分类首页
    public function goodsattributeindex()
    {
        $search = I();
        if ($search != null) {
            $name           = $search['name'];
            $map['ga.name'] = array("like", "%$name%");
            $data = M('goods_attribute')->table('__GOODS_ATTRIBUTE__ ga')
                ->join('left join __GOODS_CLASS_SAN__ gca on gca.id = ga.class_san_id')
                ->where($map)
                ->field('ga.*,gca.name as gca_name')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__GOODS_ATTRIBUTE__ ga')
                ->where($map)
                ->count();
        } else {
            $data = M('goods_attribute')->table('__GOODS_ATTRIBUTE__ ga')
                ->join('left join __GOODS_CLASS_SAN__ gca on gca.id = ga.class_san_id')
                ->field('ga.*,gca.name as gca_name')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M('goods_attribute')->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    //商品规格分类新增
    public function goodsattributeadd()
    {
        $arr = I();
        if ($arr != null) {
//            dump($arr);die;
            $isnot = M('goods_attribute')->where(array('name' => $arr['name'],'class_san_id'=>$arr['classsan']))->find();
            if ($isnot != null) {
                $this->error('所属三级分类下已有此规格，请重复输入');
            } else {
                $goodsattribute         = M('goods_attribute');
                $goodsattribute->number = 'GA' . date('YmdHis', time()) . rand(1000, 9999);
                $goodsattribute->name   = $arr['name'];
                $goodsattribute->class_san_id   = $arr['classsan'];
                $goodsattribute->add();
                $this->success('新增成功！', U('/home/goodsattribute/goodsattributeindex'));
            }
        } else {
            $classone = M('goods_class')->select();
//pp($classone);
            $this->assign('classone',$classone);

            $this->display();
        }
    }

    //商品规格分类编辑
    public function goodsattributeupdate()
    {
        $arr = I();
//        pp($arr);
        if ($arr['name'] != null) {
            if ($arr['rename'] != $arr['name']) {
                $where['id']   = array('neq', $arr['id']);
                $where['name'] = $arr['name'];
                $where['class_san_id'] = $arr['classsan'];
                $isnot         = M('goods_attribute')->where(array('name' => $arr['name'],'class_san_id'=>$arr['classsan']))->find();
                if ($isnot != null) {
                    $this->error('所属三级分类下已有此规，请重新输入');
                }
            }
            if ($arr['rclasssan'] != $arr['classsan']) {
                $where['id']   = array('neq', $arr['id']);
                $where['name'] = $arr['name'];
                $where['class_san_id'] = $arr['classsan'];
                $isnot         = M('goods_attribute')->where($where)->find();
                if ($isnot != null) {
                    $this->error('所属三级分类下已有此规，请重新输入');
                }
            }
            if($arr['classsan']){
                $goodsattribute              = M('goods_attribute');
                $goodsattribute_data['id']   = $arr['id'];
                $goodsattribute_data['name'] = $arr['name'];
                $goodsattribute_data['class_san_id'] = $arr['classsan'];
                $goodsattribute->save($goodsattribute_data);
                $this->success('编辑成功！', U('/home/goodsattribute/goodsattributeindex'));
            }else{
                $goodsattribute              = M('goods_attribute');
                $goodsattribute_data['id']   = $arr['id'];
                $goodsattribute_data['name'] = $arr['name'];
                $goodsattribute->save($goodsattribute_data);
                $this->success('编辑成功！', U('/home/goodsattribute/goodsattributeindex'));
            }


        } else {
            $classone = M('goods_class')->select();
//pp($classone);
            $this->assign('classone',$classone);
            $data = M('goods_attribute')->where(array('id' => $arr['id']))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }

    //商品规格分类删除
    public function goodsattributedel()
    {
        $result = M('goods_attribute_info')->where(array('goods_attribute_id' => I('id')))->find();
        if ($result != null) {
            $this->error('该属性分类已使用,无法删除');
        }
        M('goods_attribute')->where(array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/goodsattribute/goodsattributeindex'));
    }
}
