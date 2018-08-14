<?php
/**
 * 公告管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class NoticeController extends IndexController
{
    /*公告通知*/
    public function noticeindex()
    {
        $search = I();
        if ($search != null) {
            if ($search['title'] != null) {
                $title          = $search['title'];
                $map['N.title'] = array("like", "%$title%");
            }
            $data = M()->table('__NOTICE__ N')
                ->where($map)
                ->join('left join __ADMIN__ A on A.admin_id=N.admin_id')
                ->order('N.create_time desc')
                ->field('N.*,A.user')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__NOTICE__ N')
                ->where($map)
                ->count();
        } else {
            $data = M()->table('__NOTICE__ N')
                ->join('left join __ADMIN__ A on A.admin_id=N.admin_id')
                ->order('N.create_time desc')
                ->field('N.*,A.user')
                ->page($_GET['p'] . ',20')
                ->select();
            // dump($data);die;
            $count = M('notice')->count();
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }
    /*公告通知增加*/
    public function noticeadd()
    {
        $arr = I();
        if ($arr != null) {
            $isnot = M('notice')->where($where = array('title' => $arr['title']))->find();
            if ($isnot != null) {
                $this->error('名称重复，请重新输入');
            } else {
                $data              = M('notice');
                $data->title       = $arr['title'];
                $data->content     = $arr['content'];
                $data->create_time = strtotime(date('Y-m-d H:i:s'));
                $data->admin_id    = 1; //此处的发布人id后面要改成登录的人的id
                // dump($data);die;
                $data->add();
                $this->success('新增成功！', U('/home/Notice/noticeindex'));
            }
        } else {
            $this->display();
        }
    }
    /*公告通知编辑*/
    public function noticeupdate()
    {
        $arr = I();
        // dump($arr);die;
        if ($arr['content'] != null) {
            if ($arr['retitle'] != $arr['title']) {
                $isnot = M('notice')->where($where = array('title' => $arr['title']))->find();
                if ($isnot != null) {
                    $this->error('名称重复，请重新输入');
                }
            }
            $data              = M('notice');
            $data->id          = $arr['id'];
            $data->title       = $arr['title'];
            $data->content     = $arr['content'];
            $data->create_time = strtotime(date('Y-m-d H:i:s'));
            $data->admin_id    = cookie('admin_id'); //此处的发布人id后面要改成登录的人的id
            // p($data);
            $data->save();
            $this->success('编辑成功！', U('/home/Notice/noticeindex'));
        } else {
            $data = M('notice')->where($where = array('id' => I('id')))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }
    /*公告通知删除*/
    public function noticedel()
    {
        M('notice')->where($where = array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/Notice/noticeindex'));
    }
    /*公告通知首页查看内容*/
    public function noticelook()
    {
        $arr = I("");
        $this->assign('content', $arr);
        $this->display();
    }
}
