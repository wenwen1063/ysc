<?php
/**
 * 广告管理
 * User: czq
 */
namespace Home\Controller;

use Think\Controller;

class AdverController extends IndexController
{
/*
 *广告列表
 */

    public function adverindex()
    {
        $search = I();
        if ($search != null) {
            $adname         = $search['ad_name'];
            $adtype         = $search['ad_type'];
            $map['ad_name'] = array("like", "%$adname%");
            $map['ad_type'] = array("like", "%$adtype%");
            $data           = M('ad')->where($map)->page($_GET['p'] . ',20')->select();
            $count          = M('ad')->where($map)->count();
        } else {
            $data = M()->table('__AD__')
                ->page($_GET['p'] . ',20')
                ->order('id desc')->select();
            $count = M()->table('__AD__')->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    // 广告详情
    public function adverinfo()
    {
        $id   = I('id');
        $data = M('ad')->where($map = array('id' => $id))->find();
        $this->assign('data', $data);
        // pp($data);
        $this->display();
    }

    /*
     * - 广告信息 - 添加
     */
    public function adveradd()
    {
        $arr = I();
        // pp($arr);
        if ($arr != null) {
            if ($_FILES) {
                $files = uploadss();
                // pp($files);
                if ($files) {
                    $arr['img']  = $files[0];
                    $arr['img2'] = $files[1];
                }
            }
            if ($arr['ad_type'] == 1) {
                $arr['ad_content'] = $_POST['ad_content'];
                $arr['ad_link']    = '';
            }
            if ($arr['ad_type'] == 2) {
                $arr['ad_link']    = $_POST['ad_link'];
                $arr['ad_content'] = '';
            }
            if ($arr['ad_type'] == 3) {
                $arr['ad_goods']   = $_POST['goods'];
                $arr['ad_content'] = '';
            }
//            pp($arr['ad_goods']);
            $arr['ad_position'] = $_POST['ad_position'];
            // pp($arr);

            M('ad')->data($arr)->add();
            $this->success('新增成功！', U('/home/adver/adverindex'));
        } else {
            //分类
            $adtype     = M('ad')->field('ad_type')->find();
            $adposition = M('ad')->field('ad_position')->find();
            $goods      = M('goods')->field('id as goods_id,goods_name')->select();
//            pp($goods);
            $this->assign('adtype', $adtype);
            $this->assign('adposition', $adposition);
            $this->assign('goods', $goods);
            $this->display();
        }
    }
    /*
     * - 广告 - 删除
     */
    public function adverdel()
    {
        if (I('id') != null) {
            M('ad')->where($where = array('id' => I('id')))->delete();
            $this->success('删除成功！', U('/home/adver/adverindex'));
        }
    }
    /*
     * - 广告管理 - 编辑
     */
    public function adverupdate()
    {
        $arr = I();
//        pp($arr);
        if ($arr['ad_name'] != null) {
            if ($_FILES) {
                $upload           = new \Think\Upload(); // 实例化上传类
                $upload->maxSize  = 3145728; // 设置附件上传大小
                $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
                $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
                $upload->savePath = ''; // 设置附件上传（子）目录
                // 上传文件
                $files = $upload->upload();
//                $files = uploadss();

                // pp($files);
                if ($files) {
                    if ($files['sm_logo']['savepath'] . $files['sm_logo']['savename'] != null) {
                        $arr['img'] = $files['sm_logo']['savepath'] . $files['sm_logo']['savename'];
                    }
                    if ($files['sm_logo2']['savepath'] . $files['sm_logo2']['savename'] != null) {
                        $arr['img2'] = $files['sm_logo2']['savepath'] . $files['sm_logo2']['savename'];
                    }
                }
            }
            if ($arr['ad_type'] == 1) {
                $arr['ad_content'] = $_POST['ad_content'];
                $arr['ad_link']    = '';
            }
            if ($arr['ad_type'] == 2) {
                $arr['ad_link']    = $_POST['ad_link1'];
                $arr['ad_content'] = '';
            }
            if ($arr['ad_type'] == 3) {
                $arr['ad_goods']   = $_POST['goods'];
                $arr['ad_content'] = '';
            }
            $arr['ad_sort'] = $_POST['ad_sort'];
//            pp($arr);

            M('ad')->save($arr);
            $this->success('编辑成功！', U('/home/adver/adverindex'));
        } else {
            $data = M()->table('__AD__ a')->where($where = array('a.id' => I('id')))
                ->find();
            $ad_goods = M('goods')->where(array('id' => $data['ad_goods']))->find();

            $goods_map['id'] = array('neq', $data['ad_goods']);
            $goods           = M('goods')->where($goods_map)->field('id as g_id,goods_name as g_name')->select();
//            pp($goods);
            $this->assign('data', $data);
            $this->assign('ad_goods', $ad_goods);
            $this->assign('goods', $goods);
            $this->display();
        }

    }

}
