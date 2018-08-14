<?php
/**
 * 物流分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class LogmanageController extends IndexController
{
/*
 *物流管理-首页
 */
    public function logmanageindex()
    {
        $search = I();
        if ($search != null) {
            $name          = $search['name'];
            $map['name'] = array("like", "%$name%");
            $data  = M()->table('__LOGISTICS_SELLER__ LS')
                ->join('left join __SELLER__ S on S.id = LS.seller_id')
                ->join('left join __LOGISTICS__ L on L.id = LS.logistics_id')
                ->field('LS.*,S.forshort,S.number,L.sn,L.name')
                ->where($where = array('L.name' => $map["name"]))
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__LOGISTICS_SELLER__ LS')
                ->join('left join __SELLER__ S on S.id = LS.seller_id')
                ->join('left join __LOGISTICS__ L on L.id = LS.logistics_id')
                ->where($where = array('L.name' => $map["name"]))
                ->count();
        } else {

            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['S.id'] =  array('eq', $seller_id);
                $data  = M()->table('__LOGISTICS_SELLER__ LS')
                    ->join('left join __SELLER__ S on S.id = LS.seller_id')
                    ->join('left join __LOGISTICS__ L on L.id = LS.logistics_id')
                    ->where($cooksj)
                    ->page($_GET['p'] . ',20')
                    ->field('LS.*,S.forshort,S.number,L.sn,L.name')
                    ->select();
//            pp($data);
                $count = M()->table('__LOGISTICS_SELLER__ LS')
                    ->join('left join __SELLER__ S on S.id = LS.seller_id')
                    ->join('left join __LOGISTICS__ L on L.id = LS.logistics_id')
                    ->where($cooksj)
                    ->count();
            }else{
                $data  = M()->table('__LOGISTICS_SELLER__ LS')
                    ->join('left join __SELLER__ S on S.id = LS.seller_id')
                    ->join('left join __LOGISTICS__ L on L.id = LS.logistics_id')
                    ->page($_GET['p'] . ',20')
                    ->field('LS.*,S.forshort,S.number,L.sn,L.name')
                    ->select();
//            pp($data);
                $count = M()->table('__LOGISTICS_SELLER__ LS')
                    ->join('left join __SELLER__ S on S.id = LS.seller_id')
                    ->join('left join __LOGISTICS__ L on L.id = LS.logistics_id')
                    ->count();
            }
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
     *物流管理-添加
     */
    public function logmanageadd()
    {
        $arr = I();
//        pp($arr);
        if ($arr != null) {
            /*$result = M('logistics')->where($where = array('name' => I('name')))->find();
            $result2 = M('logistics')->where($where = array('sn' => I('sn')))->find();
            if ($result != null) {
                $this->error('名称重复，请重新输入');
            }
              if ($result2 != null) {
                $this->error('物流编号重复，请重新输入');
            }*/
            $data                 = M('logistics_seller');
            $data->logistics_id   = $arr['logistics_id'];
            $data->ykg            = $arr['ykg'];
            $data->ykg_cost       = $arr['ykg_cost'];
            $data->perkg_cost     = $arr['perkg_cost'];
            $data->seller_id      = $arr['seller_id'];
            $data->add();
            $this->success('添加成功！', U('/home/logmanage/logmanageindex'));
        } else {
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] =  array('eq', $seller_id);
                $seller = M('seller')->where($cooksj)->select();
            }else{
                $seller = M('seller')->select();
            }
//            pp($seller);
            $log = M('logistics')->select();
            $this->assign('seller',$seller);
            $this->assign('log',$log);

            $this->display();
        }
    }
    /*
     *物流分类管理-编辑
     */
    public function logmanageupdate()
    {
        $arr = I();
//        pp($arr);
        if ($arr['sn'] != null) {
//            pp($arr);

            $data             = M('logistics_seller');
            $data->id         = $arr['id'];
            $data->ykg        = $arr['ykg'];
            $data->ykg_cost   = $arr['ykg_cost'];
            $data->perkg_cost = $arr['perkg_cost'];
            $data->save();
            $this->success('编辑成功！',U('/home/logmanage/logmanageindex'));
        } else {
            $data  = M()->table('__LOGISTICS_SELLER__ LS')
                ->join('left join __SELLER__ S on S.id = LS.seller_id')
                ->join('left join __LOGISTICS__ L on L.id = LS.logistics_id')
                ->where($where = array('LS.id' => I('id')))
                ->order('LS.id asc')
                ->field('LS.*,S.forshort,S.number,L.sn,L.name')
                ->find();
//            pp($data);
            $this->assign('data', $data);
            $this->display();
        }
    }
    /*
     *物流管理-删除
     */
    public function logmanagedel()
    {
        /*$result = M('logistics_seller')->where($where = array('logistics_id' => I('id')))->find();
        if ($result != null) {
            $this->error('该分类已使用，无法删除');
        }*/
        M('logistics_seller')->where($where = array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/logmanage/logmanageindex'));
    }
    /*
     *物流分类管理-禁用
     */
    public function logmanagedisable()
    {
        $arr  = I();
        $data = M('logistics_seller');
        if ($arr['is_disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            $this->success('禁用成功！', U('/home/logmanage/logmanageindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            $this->success('禁用成功！', U('/home/logmanage/logmanageindex'));
        }
    }

}
