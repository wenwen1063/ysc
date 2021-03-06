<?php
/**
 * 商品一级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class ToolController extends IndexController
{
    public function index()
    {
        $search = I();
        if ($search != null) {
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

            $result = M('tool')->where($map)
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M('tool')->where($map)
                ->count();
        } else {
            $result = M('tool')->page($_GET['p'] . ',20')->select();
            $count  = M('tool')->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $result);
        $this->display();
    }

    public function tooladd()
    {
        $arr = I();
        if ($arr != null) {
            $upload           = new \Think\Upload(); // 实例化上传类
            $upload->maxSize  = 52428800; // 设置附件上传大小
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg', 'mp4'); // 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['sm_logo']['savepath'] . $info['sm_logo']['savename'] != null) {
                $arr['pic'] = $info['sm_logo']['savepath'] . $info['sm_logo']['savename'];
            }
            if ($info['viedo']['savepath'] . $info['viedo']['savename'] != null) {
                $arr['video'] = $info['viedo']['savepath'] . $info['viedo']['savename'];
            }
            $find = M("tool")->where(array('name' => $arr['name']))->find();
            if ($find) {
                $this->error("您新增的会员已存在");
            }
            $arr['is_on_sale'] = 2;
            $arr['addtime']    = strtotime(date('Y-m-d H:i:s', time()));

            $result = D("tool")->AddList($arr);
            if ($result['add'] == 1) {
                $this->success('新增成功！', U('/home/tool/index'));
            } else if ($result['add'] == 2) {
                $this->success('新增失败！', U('/home/tool/index'));
            }
        } else {
            $this->display();
        }

    }

    public function toolupdate()
    {
        $arr = I();
        if ($arr['name'] != '') {
            $upload           = new \Think\Upload(); // 实例化上传类
            $upload->maxSize  = 52428800; // 设置附件上传大小
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg', 'mp4'); // 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['sm_logo']['savepath'] . $info['sm_logo']['savename'] != null) {
                $arr['pic'] = $info['sm_logo']['savepath'] . $info['sm_logo']['savename'];
            }
            if ($info['viedo']['savepath'] . $info['viedo']['savename'] != null) {
                $arr['video'] = $info['viedo']['savepath'] . $info['viedo']['savename'];
            }
            if ($arr['name'] != $arr['nextname']) {
                $find = M("tool")->where(array('name' => $arr['name']))->find();
                if ($find) {
                    $this->error("您修改的软件已存在");
                }
            }
            $result = D("tool")->UpdateList($arr);
            if ($result['updata'] == 1) {
                $this->success('编辑成功！', U('/home/tool/index'));
            } else if ($result['updata'] == 2) {
                $this->success('编辑失败！', U('/home/tool/index'));
            }
        } else {
            $result  = M('tool')->where(array('id' => $arr['id']))->find();
            $datapic = M('tool_pic')->where(array('tool_id' => $arr['id']))->select();
            $this->assign('datapic', $datapic);
            $this->assign('data', $result);
            $this->display();
        }
    }

//  删除
    public function tooldel()
    {
        $arr    = I();
        $table  = M("tool");
        $result = D("base")->deleteData($arr, $table);
        if ($result == 1) {
            $this->success('删除成功！', U('/home/tool/index'));
        } else {
            $this->success('删除失败！', U('/home/tool/index'));
        }

    }
    public function tooldisable()
    {
        $arr    = I();
        $table  = M("tool");
        $result = D("base")->disableData($arr, $table);
        if ($result == 1) {
            $this->success('成功！', U('/home/tool/index'));
        } else {
            $this->success('失败！', U('/home/tool/index'));
        }

    }

    public function toolpic()
    {
        $data = M("tool")->where(array('id' => I("id")))->find();
        $pic  = M("tool_pic")->where(array("tool_id" => I("id")))->select();
        $this->assign("pic", $pic);
        $this->assign("data", $data);
        $this->display();
    }

    public function toolsale()
    {
        $arr    = I();
        $table  = M("tool");
        $result = D("base")->saleData($arr, $table);
        if ($result == 1) {
            $this->success('成功！', U('/home/tool/index'));
        } else {
            $this->success('失败！', U('/home/tool/index'));
        }
    }

}
