<?php
/**
 * 商品分类关联
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class GoodsandclassController extends IndexController
{
    //首页
    public function goodsandclassindex()
    {
        $search = I();
        if ($search != null) {
            // dump($search);
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
            //商家权限
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['g.seller_id'] =  array('eq', $seller_id);
//
            }


            //商品三级分类名称(这个很蛋疼)
            if ($search['gcs_name'] != null) {
                $map_tmp['name'] = array("like", "%" . $search['gcs_name'] . "%");
                $gct_ids         = M('goods_class_san')->where($map_tmp)->field('id')->select();
                $gct_ids_do      = array();
                foreach ($gct_ids as $key => $value) {
                    $gct_ids_do = $value['id'];
                }
                $map['gac.gcs_id'] = array('in', $gct_ids_do);
            }
            $goods_data = M()->table('__GOODS__ g')
                ->where(array('g.is_delete' => 0))
                ->join('left join __GOODS_AND_CLASS__ gac on g.id=gac.goods_id')
                ->where($map)
                ->field('g.id,g.number,g.goods_name,g.sm_pic')
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__GOODS__ g')
                ->join('left join __GOODS_AND_CLASS__ gac on g.id=gac.goods_id')
                ->where($map)
                ->count();
            //对商品信息进行遍历 查出每个商品规格下的现价和原价
            foreach ($goods_data as $key => $value) {
                $market_shop = M()->table('__GOODS_ATTRIBUTE_INFO__ gai')
                    ->join('left join __GOODS_ATTRIBUTE__ ga on ga.id=gai.goods_attribute_id')
                    ->where(array('gai.goods_id' => $value['id']))
                    ->field('ga.name as ga_name,gai.market_price,gai.shop_price')
                    ->select();
					$is_not = M('goods_and_class')->where(array('goods_id' => $value['id']))->find();
				if($is_not){
					 $goods_data[$key]['gl'] = 1;
				}else{
					 $goods_data[$key]['gl'] = 2;
				}
                $goods_data[$key]['price'] = $market_shop;
            }
        } else {
            //查出所有的商品信息

            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['g.seller_id'] =  array('eq', $seller_id);
                $cooksj['g.is_delete'] =  0;

                $goods_data = M()->table('__GOODS__ g')
                    ->where($cooksj)
                    ->field('g.id,g.number,g.goods_name,g.sm_pic')
					->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__GOODS__ g')->where($cooksj)->count();
            }else{
                $goods_data = M()->table('__GOODS__ g')
                    ->where(array('g.is_delete' => 0))
                    ->field('g.id,g.number,g.goods_name,g.sm_pic')
					->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__GOODS__ g')->count();
            }

            //对商品信息进行遍历 查出每个商品规格下的现价和原价
            foreach ($goods_data as $key => $value) {
                $market_shop = M()->table('__GOODS_ATTRIBUTE_INFO__ gai')
                    ->join('left join __GOODS_ATTRIBUTE__ ga on ga.id=gai.goods_attribute_id')
                    ->where(array('gai.goods_id' => $value['id']))
                    ->field('ga.name as ga_name,gai.market_price,gai.shop_price')
                    ->select();
				$is_not = M('goods_and_class')->where(array('goods_id' => $value['id']))->find();
				if($is_not){
					 $goods_data[$key]['gl'] = 1;
				}else{
					 $goods_data[$key]['gl'] = 2;
				}
               
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

        // dump($tree_data);
        //查出所有三级分类的id和名字
        $gcs = M()->table('__GOODS_CLASS_SAN__ gcs')
            ->where(array('gcs.is_disable' => 0))
            ->field('gcs.id,gcs.name as gcs_name')
            ->select();
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('tree_data', $tree_data);
        $this->assign('data', $goods_data);
        $this->assign('count', $count);
        $this->assign('gcs', $gcs);
        $this->assign('search', $search);
        $this->display();
    }

    //添加关联
    public function goodsandclasson()
    {
        $arr       = I();
        $gcs_id    = $arr['gcs_id_do']; // 要关联的分类id
        $goods_ids = $arr['id']; //要关联的商品的id集
        //先查一下有没有关联过
        foreach ($goods_ids as $key => $value) {
            $is_not = M('goods_and_class')->where(array('goods_id' => $value))->find();
            if ($is_not) {
                $this->error('关联失败，所选的商品中已存在该分类下的商品！');
            }
        }
        //执行关联操作
        foreach ($goods_ids as $key => $value) {
            $data           = M('goods_and_class');
            $data->goods_id = $value;
            $data->gcs_id   = $gcs_id;
            $data->add();
        }
        $this->success('关联成功！');
    }

    //删除关联
    public function goodsandclassdel()
    {
        $arr       = I();
        $gcs_id    = $arr['gcs_id_do']; // 要取消关联的分类id
        $goods_ids = $arr['id']; //要取消关联的商品的id集
        //执行取消关联操作
        foreach ($goods_ids as $key => $value) {
            $map['goods_id'] = $value;
//          $map['gcs_id']   = $gcs_id;
            if ($map != null) {
                M('goods_and_class')->where($map)->delete();
            } else {
                $this->error('参数错误，请重试！');
            }
        }
        $this->success('取消关联成功！');
    }
	
	public function list_sort_by($list, $field, $sortby = 'asc')
    {
        if (is_array($list))
        {
            $refer = $resultSet = array();
            foreach ($list as $i => $data)
            {
                $refer[$i] = &$data[$field];
            }
            switch ($sortby)
            {
                case 'asc': // 正向排序
                    asort($refer);
                    break;
                case 'desc': // 逆向排序
                    arsort($refer);
                    break;
                case 'nat': // 自然排序
                    natcasesort($refer);
                    break;
            }
            foreach ($refer as $key => $val)
            {
                $resultSet[] = &$list[$key];
            }
            return $resultSet;
        }
        return false;
    }

}
