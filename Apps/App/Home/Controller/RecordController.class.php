<?php
/**
 * 特权领取记录
 * User:
 */
namespace Home\Controller;

use Think\Controller;

class RecordController extends IndexController
{

    public function recordindex()
    {
        $search = I();
		
//		会员账号、会员名称、会员层级、特权名称、产品类型（软件/保险/话费/流量/商品）、特权产品、领取数量、流量类型（本地/国内）、领取时间、备注。

            if ($search['username'] != null) {
                $username          = $search['username'];
                $map['u.username'] = array("like", "%$username%");
            }
			if ($search['userphone'] != null) {
                $userphone         = $search['userphone'];
                $map['u.userphone'] = array("like", "%$userphone%");
            }
			if ($search['type'] != '') {
                $type            = $search['type'];
                $map['r.type'] = array("eq", "$type");
            }

            if ($search['pname'] != null) {
            	$pname       = $search['pname'];
                $map['p.name']  = array("like", "%$pname%");
            }
//          $map['r.is_pay'] = 1;  //1为已支付
                $data  = M()
                    ->table('record r')
                    ->join('left join user u on u.id = r.user_id')
                    ->join('left join partner p on p.id = u.privilege_hierarchy_id')
					 ->join('left join goods g on g.id = r.privilege_id')
                    ->page($_GET['p'] . ',20')
                    ->order('r.time desc')
                    ->where($map)
                    ->field('r.*,u.username,u.userphone,p.name as pname,g.goods_name')
                    ->select();
                $count =  M()
                    ->table('record r')
                    ->join('left join user u on u.id = r.user_id')
                    ->join('left join partner p on p.id = u.privilege_hierarchy_id')
                    ->where($map)
                    ->count();
//					dump($data);
//        pp($search);
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
//  }
    }
    /*
     *营销管理 - 新增活动
     */
    public function actgoodsadd()
    {
        $arr = I();
        if($arr != null){
            $files = uploadss();
            // pp($files);
            if ($files) {
                $arr['img']  = $files[0];
                $arr['img2'] = $files[1];
            }
//            pp($arr);
            $start_time = strtotime($arr['time']);
            $end_time = strtotime($arr['time2']);

            for($i = 0;$i<count($arr['goods']);$i++){

                $isnot2 = M('activity_goods')->where($where=array('goods_id'=>$arr['goods'][$i]))->select();
                if($isnot2){
                    $isnot = M()->table('__ACTIVITY_GOODS__ ag')
                        ->join('left join __ACTIVITY__ a on ag.activity_id = a.id')
                        ->where($where=array('goods_id'=>$arr['goods'][$i]))
                        ->select();
                    foreach($isnot as $k =>$v){
                        if($start_time >= $v['start_time'] && $start_time<=$v['end_time'] ){          //判断新的开始在原时间段内
                            $this->error('一款商品在这个时间段已参与其他活动，请更换商品或者修改时间段！');
                        }
                        if($start_time <= $v['start_time'] && $end_time>=$v['start_time'] ){          //判断新的开始原时间段前，新的结束时间在原开始时间之后
                            $this->error('一款商品在这个时间段已参与其他活动，请更换商品或者修改时间段！');
                        }
                    }
                }
            }

//            $map['ag.goods_id'] = $arr['goods'];
            //添加营销活动表
            $data = M('activity');
            $data->name        = $arr['a_name'];
            $data->start_time  = $start_time;
            $data->end_time    =  $end_time;
            $data->content     = $arr['content'];
            $data->pic         = $arr['img'];
            $data->infopic     = $arr['img2'];
            $data->status      = 1;  //默认为开启
            $data->seller_id   = $arr['seller_id'];
            $data->add();
            $activity_id = M('activity')->where($where=array('name'=>$arr['a_name']))->field('id')->find();  //获取活动id
//            pp($activity_id);
            if($arr['after_type'] == 1 || $arr['after_type'] == 2 || $arr['after_type'] == 4){  //优惠，买赠，包邮在同一张表
                //添加活动折扣信息表
                if($arr['after_type'] == 1){
                    $arr['after_type2'] = null;
                }
                if($arr['after_type'] == 2){
                    $arr['after_type1'] = null;
                }
                $activity_discount = M('activity_discount');
                $activity_discount->activity_id        = $activity_id['id'];
                $activity_discount->after_type  = $arr['after_type'];
                $activity_discount->after_price    = $arr['after_type1'];  //优惠价格
                $activity_discount->after_discount    = $arr['after_type2'];  //优惠折扣
                $activity_discount->add();
            }
            if($arr['after_type'] == 3){
                //添加活动折扣信息表
                $activity_discount = M('activity_discount');
                $activity_discount->activity_id   = $activity_id['id'];
                $activity_discount->after_type    = $arr['after_type'];
//                $activity_discount->after_price    = $arr['after_type1'];  //优惠价格
//                $activity_discount->after_discount    = $arr['after_type2'];  //优惠折扣
                $activity_discount->add();
                //添加买赠活动表
                $ade = M('activity_discount_extend');
                $ade->activity_id      = $activity_id['id'];
//                $ade->goods_id         =$arr['goods'];
                $ade->buy_number       =$arr['after_type3'];
                $ade->give_number      =$arr['after_type3_2'];
                $ade->most_give_number =$arr['after_type3_3'];
                $ade->add();
            }
            //添加活动商品表

            $ag = M('activity_goods');
            for($i=0;$i<count($arr['goods']);$i++){
                $ag->goods_id = $arr['goods'][$i];
                $ag->activity_id = $activity_id['id'];
                $ag->add();
            }

            $this->success('添加成功！', U('/home/activity/activityindex'));
        }else{

            //1.已经有并进行的活动的商品id
            set_time_limit(0);
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $where['a.seller_id'] =  array('eq', $seller_id);
                $where2['g.seller_id'] =  array('eq', $seller_id);
                $where['a.status'] =  array('eq', 1);

                $data = M()
                    ->table('__ACTIVITY__ a')
                    ->where($where)
                    ->join('left join __ACTIVITY_GOODS__ ag on ag.activity_id = a.id')
                    ->distinct(true)
                    ->getField('goods_id', true);

                if ($data != null) {
                    $map['goods_id'] = array('not in', array_filter($data)); //去空
                } else {
                    $map['goods_id'] = array('egt', 0);
                }
                //2.分类后的商品信息
                $goodstype = M('goods_class_san')->where(array('is_disable'=>0))->field('id,name as gcs_name')->select();
                for ($i = 0; $i < count($goodstype); $i++) {
                    $goods[$i]['goods'] = M()->table('__GOODS_AND_CLASS__ gac')
                        ->join('left join __GOODS__ g on g.id = gac.goods_id')
                        ->where(array('gac.gcs_id' => $goodstype[$i]['id']))
                        ->where($map)
                        ->where($where2)
                        ->field('gac.goods_id,g.goods_name')
                        ->select();
                    if ($goods[$i]['goods'] != null) {
                        $arr[$i]['goods'] = $goods[$i]['goods'];
                        $arr[$i]['name']  = $goodstype[$i]['gcs_name'];
                    }
                }
            }else{
                $where['a.status'] =  array('eq', 1);
                $data = M()
                    ->table('__ACTIVITY__ a')
                    ->where($where)
                    ->join('left join __ACTIVITY_GOODS__ ag on ag.activity_id = a.id')
                    ->distinct(true)
                    ->getField('goods_id', true);

                if ($data != null) {
                    $map['goods_id'] = array('not in', array_filter($data)); //去空
                } else {
                    $map['goods_id'] = array('egt', 0);
                }
                //2.分类后的商品信息
                $goodstype = M('goods_class_san')->where(array('is_disable'=>0))->field('id,name as gcs_name')->select();
                for ($i = 0; $i < count($goodstype); $i++) {
                    $goods[$i]['goods'] = M()->table('__GOODS_AND_CLASS__ gac')
                        ->join('left join __GOODS__ g on g.id = gac.goods_id')
                        ->where(array('gac.gcs_id' => $goodstype[$i]['id']))
                        ->where($map)
                        ->field('gac.goods_id,g.goods_name')
                        ->select();
                    if ($goods[$i]['goods'] != null) {
                        $arr[$i]['goods'] = $goods[$i]['goods'];
                        $arr[$i]['name']  = $goodstype[$i]['gcs_name'];
                    }
                }
            }


//            pp($goods);
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] =  array('eq', $seller_id);
                $seller    = M('seller')->where($cooksj)->select();
            }else{
                $seller = M('seller')->select();
                $isnot = 1;
            }

            $this->assign('seller',$seller);
            $this->assign('arr',$arr);
            $this->assign('isnot',$isnot);
            $this->display();
        }
    }
    /*
     *营销管理 - 删除活动
     */
    public function activitydel()
    {
        $arr = I();
//        pp($arr);
        if($arr['after_type'] == 3){
            M('activity')->where(array('id'=>I('id')))->delete();
            M('activity_discount')->where(array('activity_id'=>I('id')))->delete();
            M('activity_discount_extend')->where(array('activity_id'=>I('id')))->delete();
            M('activity_goods')->where(array('activity_id'=>I('id')))->delete();
        }else{
            M('activity')->where(array('id'=>I('id')))->delete();
            M('activity_discount')->where(array('activity_id'=>I('id')))->delete();
            M('activity_goods')->where(array('activity_id'=>I('id')))->delete();

        }
        /*if (I('act_id') != null) {
            M('activity')->where($where = array('act_id' => I('act_id')))->delete();
        } else {
            $this->success('删除失败！', U('/home/activity/activityindex'));
        }*/
        $this->success('删除成功！', U('/home/activity/activityindex'));
    }
    /*
     *营销管理 - 编辑
     */
    public function activityupdate()
    {
        $arr = I();
        if($arr['a_name'] != null){
            $files = uploadss();
            if ($files) {
                $arr['img']  = $files[0];
                $arr['img2'] = $files[1];
            }
//pp($arr);
            if($arr['retime'] != strtotime($arr['time']) || $arr['retime2'] != strtotime($arr['time2'])){
                if($arr['retime'] != $arr['time']){
                    $start_time = strtotime($arr['time']);
                }
                if($arr['retime2'] != $arr['time2']){
                    $end_time = strtotime($arr['time2']);
                }
                $map['ag.goods_id'] = $arr['goods'];

                for($i = 0;$i<count($arr['goods']);$i++){
                    $isnot2 = M('activity_goods')->where($where=array('goods_id'=>$arr['goods'][$i]))->select();
                    if($isnot2){
                        $array['goods_id'] = $arr['goods'][$i];
                        $array['activity_id'] = array('neq',$arr['id']);
                        $isnot = M()->table('__ACTIVITY_GOODS__ ag')
                            ->join('left join __ACTIVITY__ a on ag.activity_id = a.id')
                            ->where($array)
                            ->select();
                        foreach($isnot as $k =>$v){
                            if($start_time >= $v['start_time'] && $start_time<=$v['end_time'] ){          //判断新的开始在原时间段内
                                $this->error('有款商品在这个时间段已参与其他活动，请更换商品或者修改时间段1！');
                            }
                            if($start_time <= $v['start_time'] && $end_time>=$v['start_time'] ){          //判断新的开始原时间段前，新的结束时间在原开始时间之后
                                $this->error('有款商品在这个时间段已参与其他活动，请更换商品或者修改时间段2！');
                            }
                        }
                    }
                }
            }
                $start_time = strtotime($arr['time']);
                $end_time = strtotime($arr['time2']);
                //更新营销活动表
                $data = M('activity');
                $data->id          = $arr['id'];
                $data->name        = $arr['a_name'];
                $data->start_time  = $start_time;
                $data->end_time    =  $end_time;
                $data->content     = $arr['content'];
                if($arr['img'] != null){
                    $data->pic         = $arr['img'];
                }
                if($arr['img2'] != null){
                    $data->infopic         = $arr['img2'];
                }
                $data->save();
//            pp($arr);
                if($arr['after_type'] == 1 || $arr['after_type'] == 2 || $arr['after_type'] == 4){  //优惠，买赠，包邮在同一张表
                    //更新活动折扣信息表
                    $activity_discount = M('activity_discount');
//                    $activity_discount->activity_id     =$arr['id'];
                    $activity_discount->after_price     = $arr['after_type1'];  //优惠价格
                    $activity_discount->after_discount  = $arr['after_type2'];  //优惠折扣
                    $activity_discount->where(array('activity_id'=>$arr['id']))->save();
                }
                if($arr['after_type'] == 3){
                    //修改买赠活动表
                    $ade = M('activity_discount_extend');
//                    $ade->activity_id      = $arr['id'];
                    $ade->buy_number       = $arr['after_type3'];
                    $ade->give_number      = $arr['after_type3_2'];
                    $ade->most_give_number = $arr['after_type3_3'];
                    $ade->where(array('activity_id'=>$arr['id']))->save();
                }

                M('activity_goods')->where(array('activity_id' => $arr['activity_id']))->delete();
                for ($i = 0; $i < count($arr['goods']); $i++) {
                    $ab           = M('activity_goods');
                    $ab->goods_id = $arr['goods'][$i];
                    $ab->activity_id   = $arr['activity_id'];
                    $ab->add();
                }

            $this->success('编辑成功！', U('/home/activity/activityindex'));


        }else{
            $data = M()->table('__ACTIVITY__ A')
                ->join('left join __ACTIVITY_DISCOUNT__ AD on AD.activity_id = A.id')
                ->join('left join __ACTIVITY_DISCOUNT_EXTEND__ ADE on ADE.activity_id = A.id')
                ->join('left join __ACTIVITY_GOODS__ AG on AG.activity_id = A.id')
                ->join('left join __GOODS__ G on G.id = AG.goods_id')
                ->join('left join __SELLER__ S on S.id = A.seller_id')
                ->where($where=array('A.id'=>I('id')))
                ->field('A.*,AD.*,ADE.*,AG.*,G.goods_name,S.forshort,S.number as s_number')
                ->find();
            $goods_map['id'] = array('neq',$data['goods_id']);
            if($data['seller_id'] != 0){
                $goods_map['seller_id'] = $data['seller_id'];
            }
            $goods = M('goods')->where($goods_map)->field('id as g_id,goods_name as g_name')->select();
            //查询未参加活动的商品
            $arr = $this->goodsallid();
            //查询已参加活动的商品
            $goodsarr = M('activity_goods ag')
                ->where(array('ag.activity_id' => I('id')))
                ->join('left join goods g on g.id = ag.goods_id')
                ->field('g.id,g.goods_name')
                ->select();
//            pp($data);
            $this->assign('data',$data);
            $this->assign('goods',$goods);
            $this->assign('arr',$arr);
            $this->assign('goodsarr',$goodsarr);
            $this->display();
        }
    }

   public function activityinfo(){
       $arr= I();
//       PP($arr);

           $data = M()->table('__ACTIVITY__ A')
               ->join('left join __ACTIVITY_DISCOUNT__ AD on AD.activity_id = A.id')
               ->join('left join __ACTIVITY_DISCOUNT_EXTEND__ ADE on ADE.activity_id = A.id')
               ->join('left join __ACTIVITY_GOODS__ AG on AG.activity_id = A.id')
               ->join('left join __GOODS__ G on G.id = AG.goods_id')
               ->join('left join __SELLER__ S on S.id = A.seller_id')
               ->where($where=array('A.id'=>I('id')))
               ->field('A.*,AD.*,ADE.*,AG.*,G.goods_name,G.number,G.r_sale,G.sm_pic,S.forshort,S.number as s_number,S.name as s_name')
               ->select();
//           pp($data);
            $this->assign('data',$data);


       $this->display();
   }

    private function goodsallid()
    {
        $seller_id = cookie("seller_id");
        if ($seller_id != 0 || !empty($seller_id)) {
            $cooksj['id'] =  array('eq', $seller_id);
//            $cooksj['company_id'] = array(array('eq', 0), array('eq', $seller_id), 'or');
            $seller    = M('seller')->where($cooksj)->field('id,name')->select();

            $where['a.seller_id'] =  array('eq', $seller_id);
            $where2['g.seller_id'] =  array('eq', $seller_id);
            $where['a.status'] =  array('eq', 1);

            $goodsallid = M()
                ->table('__ACTIVITY__ a')
                ->where($where)
                ->join('left join __ACTIVITY_GOODS__ ag on ag.activity_id = a.id')
                ->distinct(true)->getField('goods_id', true);
            $map['goods_id']   = array('not in', array_filter($goodsallid)); //去空
            $map['is_on_sale'] = 1;
            //2.分类后的商品信息
            $goodstype = M('goods_class_san')->where(array('is_disable'=>0))->field('id,name as gcs_name')->select();
            for ($i = 0; $i < count($goodstype); $i++) {
                $goods[$i]['goods'] = M()->table('__GOODS_AND_CLASS__ gac')
                    ->join('left join __GOODS__ g on g.id = gac.goods_id')
                    ->where(array('gac.gcs_id' => $goodstype[$i]['id']))
                    ->where($map)
                    ->where($where2)
                    ->field('gac.goods_id,g.goods_name')
                    ->select();

                if ($goods[$i]['goods'] != null) {
                    $arr[$i]['goods'] = $goods[$i]['goods'];
                    $arr[$i]['name']  = $goodstype[$i]['gcs_name'];
                }
            }

        }else{
            $goodsallid = M()
                ->table('__ACTIVITY__ a')
                ->where(array('a.status' => 1))
                ->join('left join __ACTIVITY_GOODS__ ag on ag.activity_id = a.id')
                ->distinct(true)->getField('goods_id', true);
            $map['goods_id']   = array('not in', array_filter($goodsallid)); //去空
            $map['is_on_sale'] = 1;
            //2.分类后的商品信息
            $goodstype = M('goods_class_san')->where(array('is_disable'=>0))->field('id,name as gcs_name')->select();
            for ($i = 0; $i < count($goodstype); $i++) {
                $goods[$i]['goods'] = M()->table('__GOODS_AND_CLASS__ gac')
                    ->join('left join __GOODS__ g on g.id = gac.goods_id')
                    ->where(array('gac.gcs_id' => $goodstype[$i]['id']))
                    ->where($map)
                    ->field('gac.goods_id,g.goods_name')
                    ->select();

                if ($goods[$i]['goods'] != null) {
                    $arr[$i]['goods'] = $goods[$i]['goods'];
                    $arr[$i]['name']  = $goodstype[$i]['gcs_name'];
                }
            }
        }






        return $arr;
    }

}
