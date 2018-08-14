<?php
/**
 * 商品奖金设置审核
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class BonuscheckController extends IndexController
{
    //首页
    public function bonuscheckindex()
    {
        $search = I();
        if ($search != null) {
            //左侧三级分类
            if ($search['gcs_id'] != null) {
                $map['gac.gcs_id'] = $search['gcs_id'];
            }
            //商品名称
            if ($search['goods_name'] != null) {
                $map['g.goods_name'] = array("like", "%" . $search['goods_name'] . "%");
            }
            //商品编号
            if ($search['number'] != null) {
                $map['g.number'] = array("like", "%" . $search['number'] . "%");
            }
            //奖金审核状态
            if ($search['bonus_state'] != 0) {
                $map['g.bonus_state'] = $search['bonus_state'];
            }
            //判断是平台还是商家
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['s.id'] = array('eq', $seller_id);
            }
            $goods_data = M()->table('__GOODS__ g')
                ->where(array('g.is_delete' => 0))
                ->where($map)
                ->join('left join __GOODS_AND_CLASS__ gac on g.id=gac.goods_id')
                ->join('left join __SELLER__ s on s.id=g.seller_id')
                ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                ->field('g.*,s.name as seller_name,l.name as logistics_name,min(gai.stock) as goods_inventory')
                ->group('g.id')
                ->order('g.bonus_state')
                ->page($_GET['p'] . ',20')
                ->select();
            $tmp = M()->table('__GOODS__ g')
                ->where(array('g.is_delete' => 0))
                ->where($map)
                ->join('left join __GOODS_AND_CLASS__ gac on g.id=gac.goods_id')
                ->join('left join __SELLER__ s on s.id=g.seller_id')
                ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                ->group('g.id')
                ->select();
            $count = count($tmp);
            //对商品信息进行遍历 查出每个商品规格下的现价 原价 库存
            foreach ($goods_data as $key => $value) {
                $market_shop = M()->table('__GOODS_ATTRIBUTE_INFO__ gai')
                    ->join('left join __GOODS_ATTRIBUTE__ ga on ga.id=gai.goods_attribute_id')
                    ->where(array('gai.goods_id' => $value['id']))
                    ->field('ga.name as ga_name,gai.market_price,gai.shop_price,gai.stock')
                    ->select();
                $goods_data[$key]['price'] = $market_shop;
            }
        } else {
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['s.id'] = array('eq', $seller_id);

                //查出所有的商品信息
                $goods_data = M()->table('__GOODS__ g')
                    ->where(array('g.is_delete' => 0))
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,min(gai.stock) as goods_inventory')
                    ->where($cooksj)
                    ->group('g.id')
                    ->order('g.bonus_state')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__GOODS__ g')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->where($cooksj)
                    ->count();
            } else {
                //查出所有的商品信息
                $goods_data = M()->table('__GOODS__ g')
                    ->where(array('g.is_delete' => 0))
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,min(gai.stock) as goods_inventory')
                    ->group('g.id')
                    ->order('g.bonus_state')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__GOODS__ g')->count();
            }

            //对商品信息进行遍历 查出每个商品规格下的现价 原价 库存
            foreach ($goods_data as $key => $value) {
                $market_shop = M()->table('__GOODS_ATTRIBUTE_INFO__ gai')
                    ->join('left join __GOODS_ATTRIBUTE__ ga on ga.id=gai.goods_attribute_id')
                    ->where(array('gai.goods_id' => $value['id']))
                    ->field('ga.name as ga_name,gai.market_price,gai.shop_price,gai.stock')
                    ->select();
                $goods_data[$key]['price'] = $market_shop;
            }
        }
        //查出商品一级二级分类树的数据
        $gct_tree = M()->table('__GOODS_CLASS_TWO__ gct')
            ->join('left join __GOODS_CLASS__ gc on gc.id=gct.goods_class_id')
            ->where(array('gct.is_disable' => 0, 'gc.is_disable' => 0))
            ->field('gct.*,gc.name as gc_name')
            ->select();
        $gcs_tree = M()->table('__GOODS_CLASS_SAN__ gcs')
            ->join('left join __GOODS_CLASS_TWO__ gct on gct.id=gcs.gct_id')
            ->where(array('gct.is_disable' => 0, 'gcs.is_disable' => 0))
            ->field('gcs.*,gct.name as gct_name')
            ->select();
        foreach ($gct_tree as $key => $value) {
            foreach ($gcs_tree as $k => $v) {
                if ($v['gct_id'] == $value['id']) {
                    $gct_tree[$key]['belong'][] = $v;
                }
            }
        }
        foreach ($gct_tree as $key => $value) {
            $tree_data[$value['gc_name']][] = $value;
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('tree_data', $tree_data);
        $this->assign('data', $goods_data);
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->display();
    }

    //奖金通过审核
    public function bonuscheckon()
    {
        $arr       = I();
        $goods_ids = $arr['id']; //要通过审核的商品的id集
        $time      = time();
        foreach ($goods_ids as $key => $value) {
            $goods_id                  = $value; //商品id
            $map['goods_id']           = $goods_id;
            $map_g['id']               = $goods_id;
            $data['state']             = 1; //生效
            $data['old_bonus_ratio']   = null; //旧的奖金信息
            $data['time']              = $time;
            $data_g['bonus_state']     = 2; //已审核
            $data_g['old_bonus_ratio'] = null; //旧的平台返佣比例
            $data_g['auditing_time']   = $time;
            M('goods_bouns_info')->where($map)->save($data);
            M('goods')->where($map_g)->save($data_g);
        }
        $this->success('操作成功！');
    }

    //奖金不通过审核
    public function bonuscheckdel()
    {
        $arr       = I();
        $goods_ids = $arr['id']; //要通过审核的商品的id集
        $time      = time();
        set_time_limit(0);
        foreach ($goods_ids as $key => $value) {
            $goods_id        = $value; //商品id
            $map['goods_id'] = $goods_id;
            $map_g['id']     = $goods_id;
            /////////////////////////////////////////////第一步
            //原奖金设置信息
            $old = M('goods_bouns_info')
                ->where(array('goods_id' => $goods_id))
                ->field('old_bonus_ratio,partner_id,bonus_level')
                ->select();
            //原奖金信息不为空  说明是变更过的
            if ($old[0]['old_bonus_ratio'] != null) {
                //清空原奖金信息
                $data['old_bonus_ratio'] = null;
                //将原奖金信息写入
                foreach ($old as $key => $value) {
                    $map_chang['goods_id']           = $goods_id;
                    $map_chang['partner_id']         = $value['partner_id'];
                    $map_chang['bonus_level']        = $value['bonus_level'];
                    $chang_data['bonus_level_ratio'] = $value['old_bonus_ratio'];
                    $chang_data['state']             = 1; //生效
                    $chang_data['time']              = $time;
                    M('goods_bouns_info')->where($map_chang)->save($chang_data);
                }
            }
            //原奖金信息为空  说明是没变更过的
            else {
                $map_chang['goods_id'] = $goods_id;
                $chang_data['state']   = 2; //无效
                $chang_data['time']    = $time;
                M('goods_bouns_info')->where($map_chang)->save($chang_data);
            }
            //////////////////////////////////////第二步
            //原平台返佣比例
            $old2_bonus_ratio = M('goods')->where(array('id' => $goods_id))->getField('old_bonus_ratio');
            //原平台返佣比例 不为空
            if ($old2_bonus_ratio != null) {
                $map_chang2['id']         = $goods_id;
                $data2['bonus_ratio']     = $old2_bonus_ratio;
                $data2['old_bonus_ratio'] = null;
                $data2['bonus_state']     = 2; //已审核
                $data2['auditing_time']   = $time; //时间
                M('goods')->where($map_chang2)->save($data2);
            } else {
                $map_chang2['id']       = $goods_id;
                $data2['bonus_state']   = 3; //不通过
                $data2['auditing_time'] = $time; //时间
                M('goods')->where($map_chang2)->save($data2);
            }
            $this->success('操作成功！');
        }
    }

}
