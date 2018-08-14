<?php
/**
 * 商品一级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class BonusinfoController extends IndexController
{
    public function index()
    {
        $search = I();
        // if ($search != null) {
        //
        $partner = M("partner")->select();

        if ($search['id'] != null) {
            $parnter_id          = $search['id'];
            $map['b.partner_id'] = $parnter_id;
        } else {
            $parnter_id          = $partner['0']['id'];
            $map['b.partner_id'] = $parnter_id;
        }

        $result = M()->table('bonusinfo as b')
            ->join("left join partner as p on p.id=b.partner_id")
            ->field('b.*,p.name as pname')
            ->where($map)
            ->page($_GET['p'] . ',20')
            ->select();
        $count = M()->table('bonusinfo as b')
            ->join("left join partner as p on p.id=b.partner_id")
            ->field('b.*,p.name as pname')
            ->where($map)
            ->count();
        // } else {
        //     $result = M('bonusinfo')->page($_GET['p'] . ',20')->select();
        //     $count  = M('bonusinfo')->count();
        // }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('id', $parnter_id);
        $this->assign('partner', $partner);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $result);
        $this->display();
    }

    public function bonusinfoadd()
    {
        $arr = I();
        if ($arr['name'] != null) {
            $find = M("bonusinfo")->where(array('hierarchy' => $arr['hierarchy'], 'partner_id' => $arr['partner_id']))->find();
            if ($find) {
                $this->error("您新增的层级奖金已存在");
            }
            $arr['addtime'] = strtotime(date('Y-m-d H:i:s', time()));
            $result         = D("bonusinfo")->AddList($arr);
            if ($result['add'] == 1) {
                $this->success('新增成功！', U('/home/bonusinfo/index', array('id' => $arr['partner_id'])));
            } else if ($result['add'] == 2) {
                $this->success('新增失败！', U('/home/bonusinfo/index', array('id' => $arr['partner_id'])));
            }
        } else {
            $id = I("id");
            $this->assign('partner_id', $id);
            $this->display();
        }

    }

    public function bonusinfoupdate()
    {
        $arr = I();
        if ($arr['name'] != null) {
            $upload           = new \Think\Upload(); // 实例化上传类
            $upload->maxSize  = 52428800; // 设置附件上传大小
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg', 'mp4'); // 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
                $arr['ico'] = $info['sm_pic']['savepath'] . $info['sm_pic']['savename'];
            }
            if ($arr['name'] != $arr['nextname']) {
                $find = M("bonusinfo")->where(array('name' => $arr['name']))->find();
                if ($find) {
                    $this->error("您编辑的特权名称已存在");
                }
            }
            if ($arr['type'] == 0) {
                $arr['flow_type']        = '';
                $arr['rebate']           = '';
                $arr['rebate_frequency'] = '';
                $arr['rebate_quota']     = '';
                $arr['tool_id']          = $arr['bonusinfo_products'];
            } else if ($arr['type'] == 1) {
                $arr['flow_type']        = '';
                $arr['rebate']           = '';
                $arr['rebate_frequency'] = '';
                $arr['rebate_quota']     = '';
                $arr['insurance_id']     = $arr['bonusinfo_products'];
            } else if ($arr['type'] == 4) {
                $arr['term']             = '';
                $arr['flow_type']        = '';
                $arr['rebate']           = '';
                $arr['rebate_frequency'] = '';
                $arr['rebate_quota']     = '';
                $arr['goods_id']         = $arr['bonusinfo_products'];
            } else if ($arr['type'] == 2) {
                $arr['term']      = '';
                $arr['number']    = '';
                $arr['flow_type'] = '';
            } else if ($arr['type'] == 3) {
                $arr['term']   = '';
                $arr['number'] = '';
            }
            $arr['term'] = strtotime($arr['term']);
            $result      = D("bonusinfo")->UpdateList($arr);
            if ($result['updata'] == 1) {
                $this->success('编辑成功！', U('/home/bonusinfo/index', array('id' => $arr['partner_id'])));
            } else if ($result['updata'] == 2) {
                $this->success('编辑失败！', U('/home/bonusinfo/index', array('id' => $arr['partner_id'])));
            }
        } else {
            $id = I("id");
            $this->assign('partner_id', $id);
            $result = M('bonusinfo')->where(array('id' => $arr['id']))->find();
            $this->assign('data', $result);
            $this->display();
        }
    }

//  删除
    public function bonusinfodel()
    {
        $arr    = I();
        $table  = M("bonusinfo");
        $result = D("base")->deleteData($arr, $table);
        if ($result == 1) {
            $this->success('删除成功！', U('/home/bonusinfo/index'));
        } else {
            $this->success('删除失败！', U('/home/bonusinfo/index'));
        }

    }

    public function bonusinfopic()
    {
        $data = M("bonusinfo")->where(array('id' => I("id")))->find();
        $pic  = M("bonusinfo_pic")->where(array("bonusinfo_id" => I("id")))->select();
        $this->assign("pic", $pic);
        $this->assign("data", $data);
        $this->display();
    }

    public function getinfo()
    {
        $id = I('id');
        if ($id == 0) {
            $data = M("tool")->where(array('is_on_sale' => 2))->select();
        } else if ($id == 1) {
            $data = M("insurance")->where(array('is_on_sale' => 2))->select();
        } else if ($id == 4) {
            $data = M("goods")->where(array('is_on_sale' => 1, 'is_delete' => 0))->field('goods_name as name,id')->select();
        }
        $this->ajaxReturn($data);
    }
}
