<?php

namespace Home\Controller;

use Think\Controller;

/**
 * 积分管理
 * User: cyl
 */
class GoldController extends IndexController
{
    /*
     *积分列表
     */
    public function goldindex()
    {
        $search = I();
        if ($search != null) {
//             pp($search);
            if ($search['username'] != null) {
                $map['username'] = array("like", "%" . $search['username'] . "%");
            }
            if ($search['source_type'] != null) {
                $map['source_type'] = $search['source_type'];
            }
            $data = M()->table('__GOLD_USER__ GU')
                ->join('left join __USER__ U on U.id = GU.user_id')
                ->where($map)
                ->order('GU.create_time desc')
                ->page($_GET['p'] . ',20')
                ->select();
            $count =  M()->table('__GOLD_USER__ GU')
                ->join('left join __USER__ U on U.id = GU.user_id')
                ->where($map)
                ->count();
            // pp($data);
        } else {
            $data = M()->table('__GOLD_USER__ GU')
                ->join('left join __USER__ U on U.id = GU.user_id')
                ->field('GU.*,U.username')
                ->order('GU.create_time desc')
                ->page($_GET['p'] . ',20')
                ->select();
//            pp($data);
            $count = M('gold_user')->count();
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

}
