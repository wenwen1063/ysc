<?php
/**
 * 营销管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class BonusmanageController extends IndexController
{
    public function recommendindex()
    {
        $arr = I();
        if ($arr != null) {
            //            pp($arr);
            if ($arr['username'] != null) {
                $search['U.username'] = $arr['username'];
            }
            // if ($arr['partner'] != null) {
            //     $search['BR.name'] = $arr['partner'];
            // }
            if ($arr['r_partner'] != null) {
                $search['BR.recommend_name'] = $arr['r_partner'];
            }
            $data = M()->table('__BONUS_RECOMMEND__ BR')
                ->join('left join __USER__ U on U.id = BR.user_id')
                ->where($search)
                ->select();
            for ($i = 0; $i < count($data); $i++) {
                //获取推荐会员名称
                $data[$i]['recommend_username'] = M('user')
                    ->where(array('id' => $data[$i]['recommend_user']))
                    ->field('username')
                    ->select();
            }
            if ($arr['r_username'] != null) {
                //按推荐会员名称查找

                $search['r_username'] = $arr['r_username'];

                $search2 = M('user')->where(array('username' => $arr['r_username']))->select();
                //pp($search2);
                for ($k = 0; $k < count($search2); $k++) {
                    $data = M()->table('__BONUS_RECOMMEND__ BR')
                        ->join('left join __USER__ U on U.id = BR.user_id')
                        ->where(array('recommend_user' => $search2[$k]['id']))
                        ->select();
                }

                for ($i = 0; $i < count($data); $i++) {
                    //获取推荐会员名称
                    $data[$i]['recommend_username'] = M('user')
                        ->where(array('id' => $data[$i]['recommend_user']))
                        ->field('username')
                        ->select();
                }
                //                pp($data);

            }
        } else {
            $data = M()->table('__BONUS_RECOMMEND__ BR')
                ->join('left join __USER__ U on U.id = BR.user_id')
                ->join('left join __PARTNER__ p on p.id = U.privilege_hierarchy_id')
                ->field('BR.*,U.username,p.name as p_name')
                ->page($_GET['p'] . ',20')
                ->select();
            // $datas = array();
            // foreach ($data as $key => $value) {
            //     $datas = explode(',', $value['goods_names']);
            //     foreach ($goods_name_arr as $k => $v) {
            //         $goods_name_arr[$k] = '<li>' . $v . '</li>';
            //     }
            //     $data[$key]['goods_names'] = implode('', $goods_name_arr);
            // }
            // dump($data);
            $count = M()->table('__BONUS_RECOMMEND__ BR')->count();
            for ($i = 0; $i < count($data); $i++) {
                //获取推荐会员名称
                $data[$i]['recommend_username'] = M('user')
                    ->where(array('id' => $data[$i]['recommend_user']))
                    ->field('username,privilege_hierarchy_id')
                    ->select();
            }
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->assign('arr', $arr);
//        pp($arr);

        $this->display();
    }
    public function userTextDecode($name)
    {
        $text = json_encode($name); //暴露出unicode
        $text = preg_replace_callback('/\\\\\\\\/i', function ($name) {
            return '\\';
        }, $text); //将两条斜杠变成一条，其他不动
        return json_decode($text);
    }
    /*
     *  消费奖励
     * */
    public function consume()
    {
        $search = I();
        if ($search != null) {
            $username   = $search['username'];
            $partner    = $search['partner'];
            $orderno    = $search['orderno'];
            $r_username = $search['r_username']; //订单会员名称
            $goodsname  = $search['goodsname'];
            $sellername = $search['sellername'];
            if ($username != '') {
                $map['u.username'] = array("like", "%$username%");
            }
            if ($partner != '') {
                $map['pa.name'] = array("like", "%$partner%");
            }
            if ($orderno != '') {
                $map['o.order_number'] = array("like", "%$orderno%");
            }
            if ($r_username != '') {
                $map['u1.username'] = array("like", "%$r_username%");
            }
            if ($goodsname != '') {
                $map['g.goods_name'] = array("like", "%$goodsname%");
            }
            if ($sellername != '') {
                $map['s.name'] = array("like", "%$sellername%");
            }

            $data = M()->table('bonus_consume bc')
                ->join("left join partner pa on pa.id=bc.parent_id")
                ->join('left join orders o on o.id = bc.order_id')
                ->join("left join user u1 on u1.id = o.user_id")
                ->join('left join order_goods og on og.order_id = o.id')
                ->join('left join goods g on g.id = og.goods_id')
                ->join('left join seller s on s.id = g.seller_id')
                ->join('left join user u on u.id = bc.user_id')
                ->field('bc.*,o.order_number,o.total_price,s.name as s_name,g.goods_name,u.username as u_name,og.price,pa.name as p_name,u1.username as o_name')
                ->order('bc.id desc')
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('bonus_consume bc')
                ->join("left join partner pa on pa.id=bc.parent_id")
                ->join('left join orders o on o.id = bc.order_id')
                ->join("left join user u1 on u1.id = o.user_id")
                ->join('left join order_goods og on og.order_id = o.id')
                ->join('left join goods g on g.id = og.goods_id')
                ->join('left join seller s on s.id = g.seller_id')
                ->join('left join user u on u.id = bc.user_id')
                ->where($map)
                ->count();
        } else {
            $data = M()->table('bonus_consume bc')
                ->join("left join partner pa on pa.id=bc.parent_id")
                ->join('left join orders o on o.id = bc.order_id')
                ->join("left join user u1 on u1.id = o.user_id")
                ->join('left join order_goods og on og.order_id = o.id')
                ->join('left join goods g on g.id = og.goods_id')
                ->join('left join seller s on s.id = g.seller_id')
                ->join('left join user u on u.id = bc.user_id')
                ->field('bc.*,o.order_number,o.total_price,s.name as s_name,g.goods_name,u.username as u_name,og.price,pa.name as p_name,u1.username as o_name')
                ->order('bc.id desc')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('bonus_consume bc')
                ->join("left join partner pa on pa.id=bc.parent_id")
                ->join('left join orders o on o.id = bc.order_id')
                ->join("left join user u1 on u1.id = o.user_id")
                ->join('left join order_goods og on og.order_id = o.id')
                ->join('left join goods g on g.id = og.goods_id')
                ->join('left join seller s on s.id = g.seller_id')
                ->join('left join user u on u.id = bc.user_id')
                ->count();
        }
//pp($data);
        $seller = M()->table('seller')->field('id,name')->select();
        $Page   = new \Think\Page($count, 20);
        $show   = $Page->show();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->assign('seller', $seller);
        $this->assign('search', $search);
        $this->display();
    }
    /*
     * 平台奖励
     * */
    public function platform()
    {
        $search = I();
        if ($search != null) {
//            PP($search);
            //          if($search['s_name'] != null){
            //              $sname            = $search['s_name'];
            //              $map['S.name'] = array("like", "%$sname%");
            //          }
            //          if($search['time'] != null && $search['time2'] !=null){
            //              $stime               = strtotime($search['time']);
            //              $etime               = strtotime($search['time2']);
            //              $map['O.pok_time'] = array('between',array($stime,$etime));
            //          }
            $data = M()->table('bonus_platform b')
                ->join('left join orders o on o.id = b.order_id and o.order_from = 0')
                ->join('left join order_goods og on b.goods_id = og.goods_id and og.order_id=o.id') //商品单价  奖励金额 奖励积分 平台奖励总额
                ->join('left join goods_attribute_info gai on gai.goods_id = b.goods_id and gai.goods_attribute_id=og.goods_attr_id') //type=0  商品现价
                ->join('left join goods g on g.id = b.goods_id') //商品名称和实际销量
                ->join('left join seller s on s.id = b.seller_id') //商家名称
                ->page($_GET['p'] . ',20')
                ->field(
                    'b.id,b.platform_ratio,
                    og.price,
                    og.platform_bonus,
                    og.score_number,
                    b.platform_total as bonus_amount,
                    o.pok_time,
                    o.order_number,
                    g.goods_name,
                    g.r_sale,
                    s.name as s_name
                    ') //商家名称
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('bonus_platform b')
                ->join('left join orders o on o.id = b.order_id and o.order_from = 0')
                ->join('left join order_goods og on b.goods_id = og.goods_id and og.order_id=o.id') //商品单价  奖励金额 奖励积分 平台奖励总额
                ->join('left join goods_attribute_info gai on gai.goods_id = b.goods_id and gai.goods_attribute_id=og.goods_attr_id') //type=0  商品现价
                ->join('left join goods g on g.id = b.goods_id') //商品名称和实际销量
                ->join('left join seller s on s.id = b.seller_id') //商家名称
                ->where($map)
                ->count();
        } else {
            $data = M()->table('bonus_platform b')
                ->join('left join orders o on o.id = b.order_id and o.order_from = 0')
                ->join('left join order_goods og on b.goods_id = og.goods_id and og.order_id=o.id') //商品单价  奖励金额 奖励积分 平台奖励总额
                ->join('left join goods_attribute_info gai on gai.goods_id = b.goods_id and gai.goods_attribute_id=og.goods_attr_id') //type=0  商品现价
                ->join('left join goods g on g.id = b.goods_id') //商品名称和实际销量
                ->join('left join seller s on s.id = b.seller_id') //商家名称
            //                ->where(array('O.order_status'=>1))
                ->page($_GET['p'] . ',20')
                ->field(
                    'b.id,b.platform_ratio,
                    og.price,
                    og.platform_bonus,
                    og.score_number,
                    b.platform_total as bonus_amount,
                    o.pok_time,
                    o.order_number,
                    g.goods_name,
                    g.r_sale,
                   s.name as s_name
                    ')
                ->select();
            $count = M()->table('bonus_platform b')
                ->join('left join orders o on o.id = b.order_id and o.order_from = 0')
                ->join('left join order_goods og on b.goods_id = og.goods_id and og.order_id=o.id') //商品单价  奖励金额 奖励积分 平台奖励总额
                ->join('left join goods_attribute_info gai on gai.goods_id = b.goods_id and gai.goods_attribute_id=og.goods_attr_id') //type=0  商品现价
                ->join('left join goods g on g.id = b.goods_id') //商品名称和实际销量
                ->join('left join seller s on s.id = b.seller_id')
                ->count();
        }

        $seller = M()->table('bonus_platform b')
            ->join('left join seller s on s.id = b.seller_id')
            ->group('s.name')
            ->field('s.name as s_name,s.number,s.name,sum(b.platform_total) as platform_bonus')
            ->select();
        $bonuscount1 = 0;
        for ($i = 0; $i < (count($seller)); $i++) {
            $bonuscount1 += $seller[$i]['platform_bonus'];
        }
        $bonuscount = number_format($bonuscount1, 2); //奖金总额保留两位小数

        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->assign('seller', $seller);
        $this->assign('search', $search);
        $this->assign('bonuscount', $bonuscount);
        $this->display();
    }

}
