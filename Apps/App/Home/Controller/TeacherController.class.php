<?php
/**
 * 导师信息管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class TeacherController extends IndexController
{
    /*
     *导师信息列表
     */
    public function teacherindex()
    {
        $search = I();
        if ($search != null) {
            if ($search['teacher_name'] != null) {
                $map['t.teacher_name'] = array("like", "%" . $search['teacher_name'] . "%");
            }
            $data = M()->table('__TEACHER__ t')
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__TEACHER__ t')
                ->where($map)
                ->count();
        } else {
            $data  = M()->table('__TEACHER__ t')->select();
            $count = M('teacher')->count();
        }
        // pp($data);
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    /*
     *导师新增操作
     */
    public function teacheradd()
    {
        $arr = I();
        if ($arr != null) {
            // pp($arr);
            if ($arr['name'] != $arr['rname']) {
                $isnot = M('teacher')->where($where = array('teacher_name' => $arr['name']))->find();
                if ($isnot != null) {
                    $this->error('名称重复，请重新输入');
                }
            }
            if ($_FILES) {
                $files = uploadss();
                // pp($files);
                if ($files) {
                    $arr['pic']         = $files['0'];
                    $arr['teacher_img'] = $files['1'];
                    // dump($files);
                }
            }
            // dump($arr);die;
            //提交字符串转成数组
            $arrnew = explode('src="', $_POST['synopsis_detailed']);
            //获取服务器ip
            if (isset($_SERVER)) {
                if ($_SERVER['SERVER_ADDR']) {
                    $server_ip = $_SERVER['SERVER_ADDR'];
                } else {
                    $server_ip = $_SERVER['LOCAL_ADDR'];
                }
            } else {
                $server_ip = getenv('SERVER_ADDR');
            }
            //图片路径前加入服务器ip
            for ($i = 1; $i < count($arrnew); $i++) {
                if (substr_count($arrnew[$i], 'http://') <= 0) {
                    $arrnew[$i] = 'src="http://' . $server_ip . $arrnew[$i];
                } else {
                    $arrnew[$i] = 'src="' . $arrnew[$i];
                }
            }
            //重新转成字符串
            $arrnew = implode($arrnew);
            //由于I()函数会对ueditor提交的商品详情数据进行转码，所以对商品详情数据单独提交
            D('teacher')->teacheradd($arr, $arrnew);
            $this->success('新增成功！', U('/home/teacher/teacherindex'));
        } else {
            $this->display();
        }
    }

    /*
     *导师信息编辑
     */

    public function teacherupdate()
    {
        $arr = I();
        if ($arr['name'] != null) {
            // $find = M("teacher")->where(array('teacher_name' => $arr['name']))->find();
            // if ($find) {
            //     $this->error("名称不能重复");
            // }
            if ($_FILES) {
                $files = uploadss();
                if ($files) {
                    $arr['pic']         = $files['0'];
                    $arr['teacher_img'] = $files['1'];
                }

            }
            //提交字符串转成数组
            $arrnew = explode('src="', $_POST['synopsis_detailed']);
            //获取服务器ip
            if (isset($_SERVER)) {
                if ($_SERVER['SERVER_ADDR']) {
                    $server_ip = $_SERVER['SERVER_ADDR'];
                } else {
                    $server_ip = $_SERVER['LOCAL_ADDR'];
                }
            } else {
                $server_ip = getenv('SERVER_ADDR');
            }
            //图片路径前加入服务器ip
            for ($i = 1; $i < count($arrnew); $i++) {
                if (substr_count($arrnew[$i], 'http://') <= 0) {
                    $arrnew[$i] = 'src="http://' . $server_ip . $arrnew[$i];
                } else {
                    $arrnew[$i] = 'src="' . $arrnew[$i];
                }
            }
            //重新转成字符串
            $arrnew = implode($arrnew);
            //由于I()函数会对ueditor提交的商品详情数据进行转码，所以对商品详情数据单独提交
            D('teacher')->tupdate($arr, $arrnew);

            $this->success('编辑成功！', U('/home/teacher/teacherindex'));
        } else {
            $data = M()->table('__TEACHER__ t')
                ->join('left join __USER__ us on us.id = t.user_id')
                ->field('t.*,
                    us.userphone,
                    us.password,
                    us.email,
                    us.province,
                    us.city,
                    us.district,
                    us.address,
                    us.remark')
                ->where($where = array('t.id' => $arr['id']))
                ->find();
            // $datapic = M('pic')->where($where = array('id' => $arr['id']))->field('id,pic')->select();
            // $this->assign('datapic', $datapic);
            $this->assign('data', $data);
            $this->display();
        }
    }

    /*
     *导师信息删除
     */
    public function teacherdel()
    {
        M('teacher')->where($where = array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/teacher/teacherindex'));
    }

    // 导师详情
    // public function teacherinfo()
    // {
    //     $arr = I();
    //     if ($arr != null) {
    //         $map['D.id'] = $arr['id'];
    //         $data        = M()->table('__TEACHER__ D')
    //             ->field('D.*')
    //             ->where($map)
    //             ->find();
    //     }
    //     // pp($data);
    //     $this->assign('data', $data);
    //     $this->display();
    // }
}
