<?php
/**
 * 报表管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class AppealsController extends IndexController
{
    public function appealsindex()
    {
        $search = I();
        $map    = array();
        if ($search['username'] != null) {
            $username          = $search['username'];
            $map['o.username'] = array("like", "%$username%");
        }
        if ($search['seller_name'] != null) {
            $seller_name          = $search['seller_name'];
            $map['s.seller_name'] = array("like", "%$seller_name%");
        }
        if ($search['content'] != null) {
            $content          = $search['content'];
            $map['e.content'] = array("like", "%$content%");
        }
        if (($search['time'] != null) && ($search['time2'] != null)) {
            $stime   = str_replace('+', '', $search['time']);
            $etime   = str_replace('+', '', $search['time2']);
            $timearr = array(strtotime($stime), strtotime($etime));
            // $timearr          = array(strtotime($search['time']), strtotime($search['time2']));
            $map['ea.time'] = array('between', $timearr);
        }
        if ($search['status'] != null) {

            $map['ea.type'] = $search['status'];
            // $status          = $this->statusselect($search['status']);
        }
$seller_id=cookie("seller_id");
          if($seller_id!=0)
          {
          	$data = M()->table('__EVALUATION_APPLY__ ea')
            ->join('left join __ORDERS__ o on o.id = ea.order_id')
            ->join('left join __EVALUATION__ e on e.id = ea.evaluation_id')
            ->join('left join __ADMIN__ a on a.id = ea.admin_id')
            ->join('left join __SELLER__ s on s.id = ea.seller_id')
			->where(array('o.seller_id'=>$seller_id))
            ->field('
                ea.*,
                e.content,
                e.type,
                e.id as evaluation_id,
                a.user,
                o.order_number,
                s.name as seller_name
                ')
            ->page($_GET['p'] . ',20')->order('ea.time desc')->select();

        $count = M()->table('__EVALUATION_APPLY__ ea')
        // ->where($map)
            ->join('left join __ORDERS__ o on o.id = ea.order_id ')
            ->join('left join __EVALUATION__ e on e.id = ea.evaluation_id')
            ->join('left join __ADMIN__ a on a.id = ea.admin_id')
            ->join('left join __SELLER__ s on s.id = ea.seller_id')
			->where(array('o.seller_id'=>$seller_id))
            ->count();
        $seller = M('seller')->where(array('id'=>cookie('seller_id')))->field('id,name')->select();
          }
		  else{
        $data = M()->table('__EVALUATION_APPLY__ ea')
            ->join('left join __ORDERS__ o on o.id = ea.order_id')
            ->join('left join __EVALUATION__ e on e.id = ea.evaluation_id')
            ->join('left join __ADMIN__ a on a.id = ea.admin_id')
            ->join('left join __SELLER__ s on s.id = ea.seller_id')
            ->field('
                ea.*,
                e.content,
                e.type,
                e.id as evaluation_id,
                a.user,
                o.order_number,
                s.name as seller_name
                ')
            ->page($_GET['p'] . ',20')->order('ea.time desc')->select();

        $count = M()->table('__EVALUATION_APPLY__ ea')
        // ->where($map)
            ->join('left join __ORDERS__ o on o.id = ea.order_id ')
            ->join('left join __EVALUATION__ e on e.id = ea.evaluation_id')
            ->join('left join __ADMIN__ a on a.id = ea.admin_id')
            ->join('left join __SELLER__ s on s.id = ea.seller_id')
            ->count();
        $seller = M('seller')->field('id,name')->select();
        }

        $Page   = new \Think\Page($count, 20);
        $show   = $Page->show();
        $this->assign('page', $show);
        $this->assign('data', $data);
        $this->assign('seller', $seller);
        $this->assign('class', $class);
        $this->assign('count', $count);
        $this->assign('search', $search);
        $this->display();
    }

    public function pass()
    {
        $arr = I();
        $evo = M('evaluation_apply')
            ->where($where = array('id' => $arr['id']))
            ->field('evaluation_id')->find();

        $evo_id = $evo['evaluation_id'];

        // dump($evo_id);die;
        $data            = M('evaluation_apply');
        $data->id        = $arr['id'];
        $data->status    = 1;
        $data->deal_time = strtotime(date('Y-m-d H:i:s'));
        $data->save();
		$info=M("evaluation");
		$info->is_disable=1;
		$info->status=2;
		$info->where(array('id' => $evo_id))->save();
        $this->success('处理成功', U('/home/appeals/appealsindex'));
    }
    public function not()
    {
        $arr             = I();
        $data            = M('evaluation_apply');
        $data->id        = $arr['id'];
        $data->status    = 2;
        $data->deal_time = strtotime(date('Y-m-d H:i:s'));
        $data->save();
		$evo = M('evaluation_apply')
            ->where($where = array('id' => $arr['id']))
            ->field('evaluation_id')->find();
        $evo_id = $evo['evaluation_id'];
		$info=M("evaluation");
		$info->status=1;
		$info->where(array('id' => $evo_id))->save();
        $this->success('处理成功', U('/home/appeals/appealsindex'));

    }

    public function appealsinfo()
    {
        $arr = I("");
        $this->assign('content', $arr);
        $this->display();

    }
}
