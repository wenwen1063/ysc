<?php
/**
 * 意见反馈管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class FeedbackController extends IndexController
{
    /*意见反馈*/
    public function feedbackindex()
    {
        $search   = I();
//        dump($search);
        $username = $search['username'];
        $content  = $search['content'];
        $map      = array();
        if ($search != null) {
            if ($username != null) {
                $map['M.username'] = array("like", "%$username%");
            }
            if ($content != null) {
                $map['F.content'] = array("like", "%$content%");
            }
            $data = M()->table('__FEEDBACK__ F')
                ->join('left join __USER__ M on M.id = F.member_id')
                ->where($map)
                ->field('
                F.id,
                F.content,
                F.creat_time,
                F.contact,
                M.username,
                M.is_delete
                ')
                ->where('M.is_delete = 0')
                ->page($_GET['p'] . ',20')->select();
            $count = M()->table('__FEEDBACK__ F')
                ->where($map)
                ->where('M.is_delete = 0')
                ->join('left join __USER__ M on M.id = F.member_id')
                ->count();

        } else {
            $data = M()->table('__FEEDBACK__ F')
                ->join('left join __USER__ M on M.id = F.member_id')
                ->field('
                F.id,
                F.content,
                F.creat_time,
                F.contact,
                M.username,
                M.is_delete
                ')
                ->where('M.is_delete = 0')
                ->page($_GET['p'] . ',20')->select();
//            pp($data);

            $count = M()->table('__FEEDBACK__ F')
                ->where('M.is_delete = 0')
                ->join('left join __USER__ M on M.id = F.member_id')
                ->count();
        }
        // dump($data);die;
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    public function replyFeedback()
    {
        $arr = I();
        if ($arr['act'] == 'update') {
            $goodsclass             = M('feedback');
            $goodsclass->id         = $arr['id'];
            $goodsclass->replytext  = $arr['reply'];
            $goodsclass->is_reply   = '1';
            $goodsclass->reply_time = strtotime(date('Y-m-d H:i:s'));
            $goodsclass->save();
            $this->success("回复成功！", U('/home/Feedback/feedbackindex'));
        } else {
            $map['id'] = $arr;
            $data      = M("feedback")->find($arr['id']);
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function deleteFeedback()
    {
        $arr            = I();
        $goodsclass     = M('feedback');
        $goodsclass->id = $arr['id'];
        $res            = $goodsclass->delete();
        if ($res) {
            $this->success("删除成功！", U('/home/Feedback/feedbackindex'));
        } else {
            $this->success("删除失败！", U('/home/Feedback/feedbackindex'));
        }

    }
}
