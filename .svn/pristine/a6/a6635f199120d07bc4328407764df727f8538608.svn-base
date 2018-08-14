<?php
/**
 * 物流分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class GoldmallController extends IndexController
{
/*
 *积分商城-首页
 */
    public function goldmallindex()
    {
        $search = I();
//        pp($search);
        if ($search != null) {
            $l_time = strtotime($search['l_time']);
            $r_time = strtotime($search['r_time']);
            $name   = $search['g_name'];
            $number = $search['g_number'];

            $map['name']      = array("like", "%$name%");
            $map['number']    = array("like", "%$number%");
            $map['starttime'] = array('between', array($l_time, $r_time));
//            pp($map['starttime']);

            if ($name != null || $number != null) {
                $seller_id = cookie("seller_id");
                if ($seller_id != 0 || !empty($seller_id)) {
                    $cookiejs['GM.seller_id'] =  array('eq', $seller_id);

                    $data = M()->table('__GOLD_MALL__ GM')
                        ->where($cookiejs)
                        ->join('left join __SELLER__ S on S.id = GM.seller_id')
                        ->join('left join __GOODS__ G on G.id = GM.goods_id')
                        ->where($where = array('G.goods_name' => $map["name"], 'G.number' => $map['number']))
                        ->page($_GET['p'] . ',20')
                        ->field('GM.*,S.name as s_name,S.number as s_number,G.number as g_number,G.goods_name')
                        ->select();
//                pp($data);
                    $count = M()->table('__GOLD_MALL__ GM')
                        ->where($cookiejs)
                        ->join('left join __SELLER__ S on S.id = GM.seller_id')
                        ->join('left join __GOODS__ G on G.id = GM.goods_id')
                        ->where($where = array('G.goods_name' => $map["name"], 'G.number' => $map['number']))
                        ->count();

                }else{
                    $data = M()->table('__GOLD_MALL__ GM')
                        ->join('left join __SELLER__ S on S.id = GM.seller_id')
                        ->join('left join __GOODS__ G on G.id = GM.goods_id')
                        ->where($where = array('G.goods_name' => $map["name"], 'G.number' => $map['number']))
                        ->page($_GET['p'] . ',20')
                        ->field('GM.*,S.name as s_name,S.number as s_number,G.number as g_number,G.goods_name')
                        ->select();
//                pp($data);
                    $count = M()->table('__GOLD_MALL__ GM')
                        ->join('left join __SELLER__ S on S.id = GM.seller_id')
                        ->join('left join __GOODS__ G on G.id = GM.goods_id')
                        ->where($where = array('G.goods_name' => $map["name"], 'G.number' => $map['number']))
                        ->count();
                }
            }
            if ($l_time != null && $r_time != null) {
                $seller_id = cookie("seller_id");
                if ($seller_id != 0 || !empty($seller_id)) {
                    $cookiejs['GM.seller_id'] = array('eq', $seller_id);

                    $data = M()->table('__GOLD_MALL__ GM')
                        ->where($cookiejs)
                        ->join('left join __SELLER__ S on S.id = GM.seller_id')
                        ->join('left join __GOODS__ G on G.id = GM.goods_id')
                        ->where($where = array('GM.start_time' => $map["starttime"]))
                        ->page($_GET['p'] . ',20')
                        ->field('GM.*,S.name as s_name,S.number as s_number,G.number as g_number,G.goods_name')
                        ->select();
//                pp($data);
                    $count = M()->table('__GOLD_MALL__ GM')
                        ->where($cookiejs)
                        ->join('left join __SELLER__ S on S.id = GM.seller_id')
                        ->join('left join __GOODS__ G on G.id = GM.goods_id')
                        ->where($where = array('GM.start_time' => $map["starttime"]))
                        ->count();
                }else{
                    $data = M()->table('__GOLD_MALL__ GM')
                        ->join('left join __SELLER__ S on S.id = GM.seller_id')
                        ->join('left join __GOODS__ G on G.id = GM.goods_id')
                        ->where($where = array('GM.start_time' => $map["starttime"]))
                        ->page($_GET['p'] . ',20')
                        ->field('GM.*,S.name as s_name,S.number as s_number,G.number as g_number,G.goods_name')
                        ->select();
//                pp($data);
                    $count = M()->table('__GOLD_MALL__ GM')
                        ->join('left join __SELLER__ S on S.id = GM.seller_id')
                        ->join('left join __GOODS__ G on G.id = GM.goods_id')
                        ->where($where = array('GM.start_time' => $map["starttime"]))
                        ->count();
                }


            }

        } else {
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['GM.seller_id'] =  array('eq', $seller_id);
                $data = M()->table('__GOLD_MALL__ GM')
                    ->where($map)
                    ->join('left join __SELLER__ S on S.id = GM.seller_id')
                    ->join('left join __GOODS__ G on G.id = GM.goods_id')
                    ->order('GM.id', 'desc')
                    ->page($_GET['p'] . ',20')
                    ->field('GM.*,S.name as s_name,S.number as s_number,G.number as g_number,G.goods_name')
                    ->select();
//            pp($data);
                $count = M()->table('__GOLD_MALL__ GM')
                    ->where($map)
                    ->join('left join __SELLER__ S on S.id = GM.seller_id')
                    ->join('left join __GOODS__ G on G.id = GM.goods_id')
                    ->count();

            }else{
                $data = M()->table('__GOLD_MALL__ GM')
                    ->join('left join __SELLER__ S on S.id = GM.seller_id')
                    ->join('left join __GOODS__ G on G.id = GM.goods_id')
                    ->order('GM.id', 'desc')
                    ->page($_GET['p'] . ',20')
                    ->field('GM.*,S.name as s_name,S.number as s_number,G.number as g_number,G.goods_name')
                    ->select();
//            pp($data);
                $count = M()->table('__GOLD_MALL__ GM')
                    ->join('left join __SELLER__ S on S.id = GM.seller_id')
                    ->join('left join __GOODS__ G on G.id = GM.goods_id')
                    ->count();
            }


        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }
    /*
     *积分商城-添加
     */
    public function goldmalladd()
    {
        $arr = I();
//        pp($arr);
        if ($arr != null) {
            $start_time = strtotime($arr['l_time']);
            $end_time   = strtotime($arr['r_time']);
//            $map['start_time'] = array("elt",$start_time);
            //            $map['end_time']   = array("egt",$end_time);
            $map['goods_id'] = $arr['goods'];
            $isnot           = M()->table('__GOLD_MALL__ gm')
                ->where($map)
                ->select();
//            pp($isnot);
            if ($isnot) {
                foreach ($isnot as $k => $v) {
                    if ($start_time >= $v['start_time'] && $start_time <= $v['end_time']) {
                        //判断新的开始在原时间段内
                        $this->error('这款商品在这个时间段已参与其他兑换，请更换商品或者修改时间段！');
                    }
                    if ($start_time <= $v['start_time'] && $end_time >= $v['start_time']) {
                        //判断新的开始原时间段前，新的结束时间在原开始时间之后
                        $this->error('这款商品在这个时间段已参与其他兑换，请更换商品或者修改时间段！');
                    }
                }
            }

            $data                 = M('gold_mall');
            $data->goods_id       = $arr['goods'];
            $data->gold_price     = $arr['gold_price'];
            $data->money          = $arr['money'];
            $data->create_time    = time(); //创建时间
            $data->number         = $arr['surplus_number'];
            $data->surplus_number = $arr['surplus_number'];
            $data->start_time     = strtotime($arr['l_time']);
            $data->end_time       = strtotime($arr['r_time']);
            $data->seller_id      = $arr['seller_id'];
            $data->add();
            $this->success('添加成功！', U('/home/Goldmall/goldmallindex'), 3);
        } else {

            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['id'] =  array('eq', $seller_id);
                $seller = M('seller')->where($map)->select();
                $goods  = M('goods')->where(array('seller_id'=>$map['id']))->select();
            }else{
                $seller = M('seller')->select();
                $goods  = M('goods')->select();
            }
//            pp($goods);
            $this->assign('seller', $seller);
            $this->assign('goods', $goods);

            $this->display();
        }
    }
    /*
     *积分商城-编辑
     */
    public function goldmallupdate()
    {
        $arr = I();
//        pp($arr);
        if ($arr['gold_price'] != null) {
//            $start_time     = strtotime($arr['l_time']);
            //            $end_time       = strtotime($arr['r_time']);

            if ($arr['retime'] != strtotime($arr['l_time']) || $arr['retime2'] != strtotime($arr['r_time'])) {
                if ($arr['retime'] != $arr['time']) {
                    $start_time = strtotime($arr['time']);
                }
                if ($arr['retime2'] != $arr['time2']) {
                    $end_time = strtotime($arr['time2']);
                }
                $map['goods_id'] = $arr['goods_id'];
                $isnot2          = M('gold_mall')->where($map)->select();

                if ($isnot2) {
                    $array['goods_id'] = $arr['goods_id'];
                    $array['id']       = array('neq', $arr['id']);
                    $isnot             = M('gold_mall')
                        ->where($array)
                        ->select();
                    foreach ($isnot as $k => $v) {
                        if ($start_time >= $v['start_time'] && $start_time <= $v['end_time']) {
                            //判断新的开始在原时间段内
                            $this->error('这款商品在这个时间段已参与其他活动，请更换商品或者修改时间段1！');
                        }
                        if ($start_time <= $v['start_time'] && $end_time >= $v['start_time']) {
                            //判断新的开始原时间段前，新的结束时间在原开始时间之后
                            $this->error('这款商品在这个时间段已参与其他活动，请更换商品或者修改时间段2！');
                        }
                    }
                }

            }

            /*  $isnot = M()->table('__GOLD_MALL__ gm')
            ->where($map)
            ->select();
            //            pp($isnot);
            foreach($isnot as $k =>$v){
            if($start_time >= $v['start_time'] && $start_time<=$v['end_time'] ){          //判断新的开始在原时间段内
            $this->error('这款商品在这个时间段已参与其他兑换，请更换商品或者修改时间段！');
            }
            if($start_time <= $v['start_time'] && $end_time>=$v['start_time'] ){          //判断新的开始原时间段前，新的结束时间在原开始时间之后
            $this->error('这款商品在这个时间段已参与其他兑换，请更换商品或者修改时间段！');
            }
            }*/

            $data                 = M('gold_mall');
            $data->id             = $arr['id'];
            $data->gold_price     = $arr['gold_price'];
            $data->money          = $arr['money'];
            $data->number         = $arr['surplus_number'];
            $data->surplus_number = $arr['surplus_number'];
            $data->start_time     = strtotime($arr['l_time']);
            $data->end_time       = strtotime($arr['r_time']);
            $data->save();
            $this->success('编辑成功！', U('/home/Goldmall/goldmallindex'), 3);
        } else {
            $data = M()->table('__GOLD_MALL__ GM')
                ->join('left join __SELLER__ S on S.id = GM.seller_id')
                ->join('left join __GOODS__ G on G.id = GM.goods_id')
                ->where($where = array('GM.id' => $arr['id']))
                ->page($_GET['p'] . ',20')
                ->field('GM.*,S.name as s_name,S.number as s_number,G.number as g_number,G.goods_name')
                ->find();
//            $data['start_time'] = date('Y-m-d H:m:s',$data['start_time']);  //将时间戳转换成时间格式
            //            $data['end_time'] = date('Y-m-d H:m:s',$data['end_time']);
            //            pp($data);
            $this->assign('data', $data);
            $this->display();
        }
    }
    /*
     *积分商城-删除
     */
    public function goldmalldel()
    {
        /*$result = M('logistics_seller')->where($where = array('logistics_id' => I('id')))->find();
        if ($result != null) {
        $this->error('该分类已使用，无法删除');
        }*/
        M('gold_mall')->where($where = array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/Goldmall/goldmallindex'));
    }
    /*
     *物流分类管理-禁用
     */
    /*public function logmanagedisable()
{
$arr  = I();
$data = M('logistics_seller');
if ($arr['is_disable'] == 0) {
//禁用操作
$data->id         = $arr['id'];
$data->is_disable = 1;
$data->save();
$this->success('禁用成功！', U('/home/logmanage/logmanageindex'));
} else {
//启动操作
$data->id         = $arr['id'];
$data->is_disable = 0;
$data->save();
$this->success('禁用成功！', U('/home/logmanage/logmanageindex'));
}
}*/

}
