<?php
/**
 * 商品一级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class PrivilegeController extends IndexController
{
    public function index()
    {
        $search = I();
        // if ($search != null) {
        //
        $partner = M("partner")->select();

        if ($search['id'] != null) {
            $parnter_id          = $search['id'];
            $map['p.partner_id'] = $parnter_id;
        } else {
            $parnter_id        = $partner['0']['id'];
            $map['partner_id'] = $parnter_id;
        }
        if ($search['is_on_sale'] != null) {
            $is_on_sale        = $search['is_on_sale'];
            $map['is_on_sale'] = array("eq", "$is_on_sale");
        }
        if ($search['name'] != null) {
            $name        = $search['name'];
            $map['name'] = array("like", "%$name%");
        }
        if ($search['number'] != null) {
            $number        = $search['number'];
            $map['number'] = array("like", "%$number%");
        }

        $result = M()->table('privilege as p')
            ->join("left join tool as t on p.tool_id=t.id")
            ->join("left join insurance as i on p.insurance_id=i.id")
            ->join("left join goods as g on p.goods_id=g.id")
            ->field('t.name as tname,i.name as iname,g.goods_name as gname,p.*')
            ->where($map)
            ->page($_GET['p'] . ',20')
            ->select();
        $count = M()->table('privilege as p')
            ->join("left join tool as t on p.tool_id=t.id")
            ->join("left join insurance as i on p.insurance_id=i.id")
            ->join("left join goods as g on p.goods_id=g.id")
            ->field('t.name as tname,i.name as iname,g.goods_name as gname,p.*')
            ->where($map)
            ->count();
        // } else {
        //     $result = M('privilege')->page($_GET['p'] . ',20')->select();
        //     $count  = M('privilege')->count();
        // }
        // dump($result);
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

    public function privilegeadd()
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

            $find = M("privilege")->where(array('name' => $arr['name']))->find();
            if ($find) {
                $this->error("您新增的特权名称已存在");
            }

            if ($arr['type'] == 0) {
                $arr['flow_type']        = '';
                $arr['rebate']           = 0;
                $arr['rebate_frequency'] = '';
                $arr['rebate_quota']     = '';
                $arr['tool_id']          = $arr['privilege_products'];
            } else if ($arr['type'] == 1) {
                $arr['flow_type']        = '';
                $arr['rebate']           = 0;
                $arr['rebate_frequency'] = '';
                $arr['rebate_quota']     = '';
                $arr['insurance_id']     = $arr['privilege_products'];
            } else if ($arr['type'] == 4||$arr['type'] == 5) {
                $arr['term']             = '';
                $arr['flow_type']        = '';
                $arr['rebate']           = 0;
                $arr['rebate_frequency'] = '';
                $arr['rebate_quota']     = '';
                $arr['goods_id']         = $arr['privilege_products'];
            } else if ($arr['type'] == 2) {
                $arr['term']      = '';
                $arr['number']    = '';
                $arr['flow_type'] = '';
            } else if ($arr['type'] == 3) {
                $arr['term']   = '';
                $arr['number'] = '';
            }
            $arr['term'] =$arr['term'];

            $arr['addtime'] = strtotime(date('Y-m-d H:i:s', time()));
//			$arr['id']        = '';
//			["id"] => string(2) "19"
//["nextname"] => string(10) "草根1年"
//["partner_id"] => string(1) "1"
//["name"] => string(10) "草根1年"
//["type"] => string(1) "3"
//["number"] => string(4) "1000"
//["term"] => string(1) "1"
//["flow_type"] => string(1) "1"
//["rebate"] => string(3) "9.6"
//["rebate_frequency"] => string(1) "1"
//["rebate_quota"] => string(3) "800"
//["remark"] => string(11) "11111111111"
			
			
			
			
			
            $result = M("privilege")->add($arr);
            if ($result) {
                $this->success('新增成功！', U('/home/privilege/index', array('id' => $arr['partner_id'])));
            } else {
                $this->success('新增失败！', U('/home/privilege/index', array('id' => $arr['partner_id'])));
            }
        } else {
            $id = I("id");
            $this->assign('partner_id', $id);
            $this->display();
        }

    }

    public function privilegeupdate()
    {
        $arr = I();
        if ($arr['name'] != null) {
//      	dump(I());DIE;
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
                $find = M("privilege")->where(array('name' => $arr['name']))->find();
                if ($find) {
                    $this->error("您编辑的特权名称已存在");
                }
            }
            if ($arr['type'] == 0) {
                $arr['flow_type']        = '';
                $arr['rebate']           = 0;
                $arr['rebate_frequency'] = '';
                $arr['rebate_quota']     = '';
                $arr['tool_id']          = $arr['privilege_products'];
            } else if ($arr['type'] == 1) {
                $arr['flow_type']        = '';
                $arr['rebate']           = 0;
                $arr['rebate_frequency'] = '';
                $arr['rebate_quota']     = '';
                $arr['insurance_id']     = $arr['privilege_products'];
            } else if ($arr['type'] == 4||$arr['type'] == 5) {
                $arr['term']             = '';
                $arr['flow_type']        = '';
                $arr['rebate']           = 0;
                $arr['rebate_frequency'] = '';
                $arr['rebate_quota']     = '';
                $arr['goods_id']         = $arr['privilege_products'];
            } else if ($arr['type'] == 2) {
                $arr['term']      = '';
                $arr['number']    = '';
                $arr['flow_type'] = '';
            } else if ($arr['type'] == 3) {
                $arr['term']   = '';
                $arr['number'] = '';
            }
//          $arr['term'] =$arr['term'];
//			$arr['partner_id'] =$arr['partner_id'];
            $result      = M("privilege")->save($arr);
            if ($result) {
                $this->success('编辑成功！', U('/home/privilege/index', array('id' => $arr['partner_id'])));
            } else{
                $this->success('编辑失败！', U('/home/privilege/index', array('id' => $arr['partner_id'])));
            }
        } else {
            $partner_id = I("partner_id");
            $this->assign('partner_id', $partner_id);
            $result = M('privilege')->where(array('id' => $arr['id']))->find();
            $this->assign('data', $result);
            $this->display();
        }
    }

//  删除
    public function privilegedel()
    {
        $arr    = I();
        $table  = M("privilege");
        $result = D("base")->deleteData($arr, $table);
        if ($result == 1) {
            $this->success('删除成功！', U('/home/privilege/index'));
        } else {
            $this->success('删除失败！', U('/home/privilege/index'));
        }

    }

    public function privilegepic()
    {
        $data = M("privilege")->where(array('id' => I("id")))->find();
        $pic  = M("privilege_pic")->where(array("privilege_id" => I("id")))->select();
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
        } else if ($id == 4||$id==5) {
            $data = M("goods")->where(array('is_on_sale' => 1, 'is_delete' => 0))->field('goods_name as name,id')->select();
        }
        $this->ajaxReturn($data);
    }
}
