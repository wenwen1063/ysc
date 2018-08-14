<?php
/**
 * 商品一级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class ArticleController extends IndexController
{

    public function articleindex()
    {
        $search = I();
        if ($search['title'] != null) {
            $title          = $search['title'];
            $map['a.title'] = array("like", "%$title%");
        }

        if ($search['teacher_name'] != null) {
            $teacher_name          = $search['teacher_name'];
            $map['t.teacher_name'] = array("like", "%$teacher_name%");
        }
        if (($search['time'] != null) && ($search['time2'] != null)) {
            $stime   = str_replace('+', '', $search['time']);
            $etime   = str_replace('+', '', $search['time2']);
            $timearr = array(strtotime($stime), strtotime($etime));
            // $timearr          = array(strtotime($search['time']), strtotime($search['time2']));
            $map['a.time'] = array('between', $timearr);
        }

        if ($search['status'] != null) {

            $map['a.status'] = $search['status'];
            // $status          = $this->statusselect($search['status']);
        }
        $data = M()->table('__ARTICLE__ a')
//            ->join('left join __TEACHER__ t on t.id = a.teacher_id')
            ->join('left join __USER__ u on u.id = a.teacher_id')
            ->join('left join __ARTICLE_CLASS__ ac on ac.id = a.class_id')
            ->where($map)
//            ->field('a.*,t.teacher_name,ac.name as class_name')
            ->field('a.*,u.username,ac.name as class_name')
            ->page($_GET['p'] . ',20')
            ->select();
        $count = M()->table('__ARTICLE__ a')
            ->where($map)
            ->join('left join __TEACHER__ t on t.id = a.teacher_id')
            ->join('left join __ARTICLE_CLASS__ ac on ac.id = a.class_id')
            ->count();
        // }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }
    public function articlepass()
    {
        $arr  = I();
        $a_id = $arr['article_id'];
        //获取类型积分
        $jifen = M()->table('__ARTICLE__ a')
            ->join('left join __ARTICLE_CLASS__ ac on ac.id = a.class_id')
            ->join('left join __TEACHER__ t on t.id = a.teacher_id')
            ->join('left join __USER__ u on u.id = t.user_id')
            ->field('ac.gold_number,u.id as u_id')
            ->where(array('a.id ' => $a_i))
            ->find();
        $gold = $jifen['gold_number'];
        $u_id = $jifen['u_id'];
        //修改文章状态
        $data         = M('article');
        $data->id     = $arr['article_id'];
        $data->status = 1;
        $data->save();
        //用户曾加类型相应的积分
        M('user')->where(array('id' => $u_id))->setInc('stock', $gold);
        $this->success('操作成功！', U('/home/article/articleindex'));
    }
    public function articleno()
    {
        $arr          = I();
        $data         = M('article');
        $data->id     = $arr['article_id'];
        $data->status = 2;
        $data->save();
        $this->success('操作成功！', U('/home/article/articleindex'));
    }
    public function articledel()
    {
        //获取文章评论内容
        $data = M('article_comment')->table('__ARTICLE_COMMENT__ ac')
            ->join('left join __ARTICLE__ a on a.id = ac.article_id')
            ->where($where = array('ac.article_id' => I('article_id')))
            ->find();
        //判断是否为空，不为空则删除评论
        if ($data != null) {
            M('article_comment')->where($where = array('article_id' => I('article_id')))->delete();
        }
        //删除文章
        M('article')->where($where = array('id' => I('article_id')))->delete();
        $this->success('删除成功！', U('/home/article/articleindex'));
    }
    //文章详情
    public function articleinfo()
    {
        $data = M()->table('__ARTICLE__ a')
            ->join('left join __USER__ u on u.id = a.teacher_id')
            ->join('left join __ARTICLE_CLASS__ ac on ac.id = a.class_id')
            ->where(array('a.id' => I('id')))
            ->field('a.*,u.username,ac.name as class_name')
            ->find();
//        pp($data);
        $this->assign('data', $data);
        $this->display();
    }
}
