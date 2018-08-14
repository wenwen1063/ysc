<?php
/**
 *商品信息
 *author:cyl
 */
namespace Home\Controller;

use Think\Controller;

class GoodsController extends GoodsBaseController
{
    /**
     * 说明
     * @access public
     * @param 商品分页
     * @param display
     */
    public function goodsindex()
    {
        $search = I();
        if ($search != null) {
            // dump($search);
            $map['g.is_delete'] = 0;
            //所属商家
            if ($search['seller_id'] != null) {
                $map['g.seller_id'] = $search['seller_id'];
            }
            //实际销售价格区间
            if ($search['shop_price_l'] != null) {
                $map1['gai.shop_price'] = array('EGT', $search['shop_price_l']);
            }
            if ($search['shop_price_h'] != null) {
                $map1['gai.shop_price'] = array('ELT', $search['shop_price_h']);
            }
            if ($search['shop_price_l'] != null && $search['shop_price_h'] != null) {
                $map1['gai.shop_price'] = array('between', array($search['shop_price_l'], $search['shop_price_h']));
            }
            if ($search['shop_price_l'] == null && $search['shop_price_h'] == null) {
                $map1['gai.shop_price'] = array('EGT', 0);
            }
            //实际销量区间
            if ($search['r_sale_l'] != null) {
                $map['g.r_sale'] = array('EGT', $search['r_sale_l']);
            }
            if ($search['r_sale_h'] != null) {
                $map['g.r_sale'] = array('ELT', $search['r_sale_h']);
            }
            if ($search['r_sale_l'] != null && $search['r_sale_h'] != null) {
                $map['g.r_sale'] = array('between', array($search['r_sale_l'], $search['r_sale_h']));
            }
            //商品名称模糊查询
            $map['g.goods_name'] = array('like', "%" . $search['goods_name'] . "%");
            //奖金审核状态
            if ($search['bonus_state'] != 0) {
                $map['g.bonus_state'] = $search['bonus_state'];
            }
            //判断是平台还是商家
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['s.id'] = array('eq', $seller_id);
//            $cooksj['company_id'] = array(array('eq', 0), array('eq', $seller_id), 'or');
            }

            //库存状态
            //全部
            if ($search['status'] == 0) {
                // dump($map);
                $data = M()->table('__GOODS__ g')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,min(gai.stock) as goods_inventory')
                    ->where($map)
                    ->where($map1)
                    ->group('g.id')
                    ->page($_GET['p'] . ',20')
                    ->select();
                // dump($data);
                $tmp = M()->table('__GOODS__ g')
                    ->where($map)
                    ->where($map1)
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,min(gai.stock) as goods_inventory')
                    ->group('g.id')
                    ->select();
                $count = count($tmp);
            } else if ($search['status'] == 1) {
                //1.出售中
                $map['g.is_on_sale'] = 1;

                $subQuery = M()->table('__GOODS__ g')
                    ->where($map1)
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->field('g.id,min(gai.stock) as goods_inventory')
                    ->group('g.id')
                    ->buildSql();

                $data = M()->table('__GOODS__ g')
                    ->where($map)
                    ->where('sub.goods_inventory > g.stock_warning')
                    ->join('left join ' . $subQuery . ' sub on sub.id=g.id')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,sub.goods_inventory')
                    ->page($_GET['p'] . ',20')
                    ->select();

                $tmp = M()->table('__GOODS__ g')
                    ->where($map)
                    ->where('sub.goods_inventory > g.stock_warning')
                    ->join('left join ' . $subQuery . ' sub on sub.id=g.id')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->select();
                $count = count($tmp);
            } else if ($search['status'] == 2) {
                //2.已售罄
                $subQuery = M()->table('__GOODS__ g')
                    ->where($map1)
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->field('g.id,min(gai.stock) as goods_inventory')
                    ->group('g.id')
                    ->buildSql();

                $data = M()->table('__GOODS__ g')
                    ->where($map)
                    ->where('sub.goods_inventory = 0')
                    ->join('left join ' . $subQuery . ' sub on sub.id=g.id')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,sub.goods_inventory')
                    ->page($_GET['p'] . ',20')
                    ->select();

                $tmp = M()->table('__GOODS__ g')
                    ->where($map)
                    ->where('sub.goods_inventory = 0')
                    ->join('left join ' . $subQuery . ' sub on sub.id=g.id')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->select();
                $count = count($tmp);
            } else if ($search['status'] == 3) {
                //3.警戒中
                $map['g.is_on_sale'] = 1;
                $subQuery            = M()->table('__GOODS__ g')
                    ->where($map1)
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->field('g.id,min(gai.stock) as goods_inventory')
                    ->group('g.id')
                    ->buildSql();

                $data = M()->table('__GOODS__ g')
                    ->where($map)
                    ->where('sub.goods_inventory > 0 and sub.goods_inventory <= g.stock_warning')
                    ->join('left join ' . $subQuery . ' sub on sub.id=g.id')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,sub.goods_inventory')
                    ->page($_GET['p'] . ',20')
                    ->select();

                $tmp = M()->table('__GOODS__ g')
                    ->where($map)
                    ->where('sub.goods_inventory > 0 and sub.goods_inventory <= g.stock_warning')
                    ->join('left join ' . $subQuery . ' sub on sub.id=g.id')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->select();
                $count = count($tmp);
            } else if ($search['status'] == 4) {
                //4.已下架
                $map['g.is_on_sale'] = 0;
                $data                = M()->table('__GOODS__ g')
                    ->where($map)
                    ->where($map1)
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,min(gai.stock) as goods_inventory')
                    ->group('g.id')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $tmp = M()->table('__GOODS__ g')
                    ->where($map)
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,min(gai.stock) as goods_inventory')
                    ->group('g.id')
                    ->select();
                $count = count($tmp);
            }
        } else {
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] = array('eq', $seller_id);

                $data = M()->table('__GOODS__ g')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->where(array('g.is_delete' => 0, 's.id' => $seller_id))
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,min(gai.stock) as goods_inventory')
                    ->group('g.id')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__GOODS__ g')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->where(array('g.is_delete' => 0, 's.id' => $seller_id))
                    ->count();
            } else {
                $data = M()->table('__GOODS__ g')
                    ->join('left join __SELLER__ s on s.id=g.seller_id')
                    ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                    ->join('left join __GOODS_ATTRIBUTE_INFO__ gai on gai.goods_id=g.id')
                    ->where(array('g.is_delete' => 0))
                    ->field('g.*,s.name as seller_name,l.name as logistics_name,min(gai.stock) as goods_inventory')
                    ->group('g.id')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__GOODS__ g')->count();
            }
        }
        // dump($search);
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();

        $seller_id = cookie("seller_id");
        if ($seller_id != 0 || !empty($seller_id)) {
            $cooksj['id'] = array('eq', $seller_id);
//            $cooksj['company_id'] = array(array('eq', 0), array('eq', $seller_id), 'or');
            $seller = M('seller')->where($cooksj)->field('id,name')->select();
        } else {
            $seller = M('seller')->field('id,name')->select();
        }
//        $map['type'] = array("eq", 1);

        $seller_id = $search['seller_id'];
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        // dump($data);
        $this->assign('data', $data);
        $this->assign('seller', $seller);
        $this->assign('seller_id', $seller_id);
        $this->display();
    }

    /**
     * 说明
     * @access public
     * @param 商品新增
     * @param display
     */
    public function goodsadd()
    {
        $arr = I();
//        pp($arr);
        $is_name_repeat = M('goods')->where(array('goods_name' => $arr['goods_name'], 'is_delete' => 0))->find();
        if ($is_name_repeat) {
            $this->error('商品名称已存在，请重新输入！');
        }
        if ($arr != null) {
//      	pp($arr);
            //商品基本信息
            $data               = M('goods');
            $data->number       = 'G' . date('YmdHis', time()) . rand(1000, 9999); //商品编号
            $data->is_recommend = $arr['is_recommend']; //是否推荐
            $data->addtime      = time(); //新增时间
            $data->is_baoyou    = $arr['is_baoyou']; //包邮
            $data->is_seven     = $arr['is_seven']; //七天退换
            $data->goods_name   = $arr['goods_name']; //商品名称
            $data->seller_id    = $arr['seller_id']; //所属商家
            $data->bonus_ratio  = $arr['bonus_ratio']; //平台返佣比例
            $upload             = new \Think\Upload(); // 实例化上传类
            $upload->maxSize    = 3145728; // 设置附件上传大小
            $upload->exts       = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath   = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath   = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
                $data->sm_pic = $info['sm_pic']['savepath'] . $info['sm_pic']['savename']; //商品小图
            }
            $data->goods_introduce = $_POST['goods_introduce']; //商品详情
            $data->r_sale          = $arr['r_sale']; //实际销量
            $data->v_sale          = $arr['v_sale']; //虚拟销量
            // $data->is_on_sale      = $arr['is_on_sale']; //上架状态
            $data->default_express = $arr['logistics']; //默认物流
            $data->invoice         = $arr['invoice']; //发票
            $data->is_recommend    = $arr['is_recommend'];
            $data->bonus_state     = 1; //奖金审核状态 默认1
            $data->stock_warning   = $arr['stock_warning']; //库存警戒数量
            $goods_id              = $data->add();

            //商品规格明细信息
            $attr_ids          = $arr['attr_id'];
            $attr_weight       = $arr['weight']; //规格重量
            $attr_stock        = $arr['stock']; //规格库存
            $attr_market_price = $arr['market_price']; //规格原价
            $attr_shop_price   = $arr['shop_price']; //规格现价
            
            for ($i = count($attr_ids) - 1; $i > -1; $i--) {
                $gai                     = M('goods_attribute_info');
                $gai->goods_id           = $goods_id; //商品id
                $gai->goods_attribute_id = $attr_ids[$i]; //规格id
                $gai->weight             = $attr_weight[$i];
                $gai->stock              = $attr_stock[$i];
                $gai->market_price       = $attr_market_price[$i];
                $gai->shop_price         = $attr_shop_price[$i];
                $gai->add();
            }

            /*图片库*/
            $url = explode(",", $arr['allpic']);
            //p($url);
            for ($i = 0; $i < count($url); $i++) {
                if ($url[$i] != null) {
                    $pic           = M('pic');
                    $pic->pic      = str_replace(' ', '', $url[$i]);
                    $pic->goods_id = $goods_id;
                    $pic->add();
                }
            }
			
//			商品分类关联
			$goods_and_class           = M('goods_and_class');
            $goods_and_class->goods_id = $goods_id;
            $goods_and_class->gcs_id   = $arr['classsan'];
            $goods_and_class->add();
            //商品奖金设置信息
            $bonus_type   = $arr['bonus_type']; //奖金类别 1搭档奖金 0平台返点
            $partner_id   = $arr['partner_id']; //搭档级别id
            $partner_ids  = $arr['partner_ids']; //搭档级别id
            $fist_level   = $arr['first_level']; //第一层级
            $second_level = $arr['second_level']; //第二层级
            $third_level  = $arr['third_level']; //第三层级
            //奖金--自定义
            if ($bonus_type == 1) {
                for ($j = 0; $j < count($partner_id); $j++) {

                    $gbi                    = M('goods_bouns_info');
                    $gbi->goods_id          = $goods_id; //商品id
                    $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                    $gbi->partner_level     = $partner_id[$j]; //搭档名称
                    $gbi->partner_id        = $partner_ids[$j]; //搭档级别id
                    $gbi->bonus_level       = 1; //奖金层次
                    $gbi->bonus_level_ratio = $fist_level[$j]; //层级奖金比例
                    $gbi->state             = 0; //生效状态
                    $gbi->add();

                    $gbi                    = M('goods_bouns_info');
                    $gbi->goods_id          = $goods_id; //商品id
                    $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                    $gbi->partner_level     = $partner_id[$j]; //搭档名称
                    $gbi->partner_id        = $partner_ids[$j]; //搭档级别id
                    $gbi->bonus_level       = 2; //奖金层次
                    $gbi->bonus_level_ratio = $second_level[$j]; //层级奖金比例
                    $gbi->state             = 0; //生效状态
                    $gbi->add();

                    $gbi                    = M('goods_bouns_info');
                    $gbi->goods_id          = $goods_id; //商品id
                    $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                    $gbi->partner_level     = $partner_id[$j]; //搭档名称
                    $gbi->partner_id        = $partner_ids[$j]; //搭档级别id
                    $gbi->bonus_level       = 3; //奖金层次
                    $gbi->bonus_level_ratio = $third_level[$j]; //层级奖金比例
                    $gbi->state             = 0; //生效状态
                    $gbi->add();

                }
            }
            //奖金--平台默认设定
            else if ($bonus_type == 0) {
                $partner = M()->table('__SALE_BONUS_SET__ sbs')
                    ->join('left join __PARTNER__ p on p.id=sbs.partner_id')
					->where(array("sbs.seller_id"=>$arr['seller_id']))
                    ->field('sbs.*,p.name')
                    ->select();
				
                foreach ($partner as $key => $value) {
                    $gbi                    = M('goods_bouns_info');
                    $gbi->goods_id          = $goods_id; //商品id
                    $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                    $gbi->partner_level     = $value['name']; //搭档名称
                    $gbi->partner_id        = $value['partner_id']; //搭档级别id
                    $gbi->bonus_level       = $value['partner_level']; //搭档层级
                    $gbi->bonus_level_ratio = $value['rate']; //层级奖金比例
                    $gbi->state             = 0; //生效状态
                    $gbi->add();
                }
            }
            $this->success('新增成功！', U('/home/goods/goodsindex'));
        } else {
            // $logistics = M('logistics')->field('id,name')->select(); //物流
            //$attribute = M('goods_attribute')->field('id,name,class_san_id')->select(); //规格
            //搭档奖金默认设置数据
            $partner = M()->table('__SALE_BONUS_SET__ sbs')
                ->join('left join __PARTNER__ p on p.id=sbs.partner_id')
                ->field('sbs.*,p.name')
                ->select();
            //数据处理
            $done = array();
            foreach ($partner as $key => $value) {
                $done[$value['partner_id']][] = $value;
            }
            // pp($done);
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] = array('eq', $seller_id);

                $logistics = M()->table('__LOGISTICS__ L')
                    ->join('left join __LOGISTICS_SELLER__ LS on LS.logistics_id = L.id')
                    ->where(array('LS.seller_id' => $seller_id))
                    ->field('L.id,L.name')
                    ->select(); //物流
                $seller = M('seller')->where($cooksj)->field('id,name')->select();
//                dump($seller);
            } else {
                $seller    = M('seller')->field('id,name')->select();
                $logistics = M('logistics')->field('id,name')->select(); //物流
            }

            $classone = M('goods_class')->where(array('is_disable' => 0))->select();
//pp($classone);
            $this->assign('classone', $classone);

            $this->assign('logistics', $logistics);
            //$this->assign('attribute', $attribute);
            $this->assign('partner', $done);
            $this->assign('seller', $seller);
            $this->display();
        }
    }

    /**
     * 说明
     * @access public
     * @param 商品编辑
     * @param display
     */
    public function goodsupdate()
    {
        $arr                              = I();
        $time                             = time(); //当前时间
        $is_name_repeat_map['id']         = array('neq', $arr['id']);
        $is_name_repeat_map['goods_name'] = $arr['goods_name'];
        $is_name_repeat_map['is_delete']  = 0;
        $is_name_repeat                   = M('goods')->where($is_name_repeat_map)->find();
        if ($is_name_repeat) {
            $this->error('商品名称已存在，请重新输入！');
        }
        if ($arr['goods_name'] != null) {
            // pp($arr);
            //商品基本信息
            $data             = M('goods');
            $data->id         = $arr['id']; //商品id
            $data->goods_name = $arr['goods_name']; //商品名称
            $data->seller_id  = $arr['seller_id']; //所属商家
            $old_bonus_ratio  = M('goods')->where(array('id' => $arr['id']))->getField('bonus_ratio'); //平台返佣
            $a_state          = M('goods')->where(array('id' => $arr['id']))->getField('bonus_state'); //审核状态
            //平台返佣有变动
            if ($arr['bonus_ratio'] != $old_bonus_ratio) {
                $data->bonus_ratio   = $arr['bonus_ratio'];
                $data->bonus_state   = 1; // 待审核
                $data->auditing_time = $time;
                if ($a_state == 2) {
                    $data->old_bonus_ratio = $old_bonus_ratio; //把原来的平台返佣比例存起来
                }

            }
            $upload           = new \Think\Upload(); // 实例化上传类
            $upload->maxSize  = 3145728; // 设置附件上传大小
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
                $data->sm_pic = $info['sm_pic']['savepath'] . $info['sm_pic']['savename']; //商品小图
            }
            $data->goods_introduce = $_POST['goods_introduce']; //商品详情
            $data->r_sale          = $arr['r_sale']; //实际销量
            $data->v_sale          = $arr['v_sale']; //虚拟销量
            // $data->is_on_sale      = $arr['is_on_sale']; //上架状态
            $data->default_express = $arr['logistics']; //默认物流
            $data->invoice         = $arr['invoice']; //发票
            $data->is_recommend    = $arr['is_recommend'];
            $data->stock_warning   = $arr['stock_warning']; //库存警戒数量
            $data->save();
			
			
			
			
            //商品规格明细信息
            M('goods_attribute_info')->where(array('goods_id' => $arr['id']))->delete();
            $attr_ids          = $arr['attr_id'];
            $attr_weight       = $arr['weight']; //规格重量
            $attr_stock        = $arr['stock']; //规格库存
            $attr_market_price = $arr['market_price']; //规格原价
            $attr_shop_price   = $arr['shop_price']; //规格现价
            for ($i = count($attr_ids) - 1; $i > -1; $i--) {
                $gai                     = M('goods_attribute_info');
                $gai->goods_id           = $arr['id']; //商品id
                $gai->goods_attribute_id = $attr_ids[$i]; //规格id
                $gai->weight             = $attr_weight[$i];
                $gai->stock              = $attr_stock[$i];
                $gai->market_price       = $attr_market_price[$i];
                $gai->shop_price         = $attr_shop_price[$i];
                $gai->add();
            }

            /*图片库*/
            //1.删除点击过的图片
            if ($arr['pic_id'] != null) {
                $delpicid['id']       = array('not in', $arr['pic_id']);
                $delpicid['goods_id'] = $arr['id'];
                if ($delpicid['goods_id'] != null) {
                    M('pic')->where($delpicid)->delete();
                }
            } else {
                $delpicid['goods_id'] = $arr['id'];
                M('pic')->where($delpicid)->delete();
            }
            //2.插入图片
            $url = explode(",", $arr['allpic']);
            //p($url);
            for ($i = 0; $i < count($url); $i++) {
                if ($url[$i] != null) {
                    $pic           = M('pic');
                    $pic->pic      = str_replace(' ', '', $url[$i]);
                    $pic->goods_id = $arr['id'];
                    $pic->add();
                }
            }
						
			$is_class=M("goods_and_class")->where(array('goods_id'=>$arr['id']))->find();
			if($is_class){
				if(isset($arr['classsan'])||!empty($arr['classsan'])){
					if($is_class['gcs_id']!=$arr['classsan']){
					M("goods_and_class")->where(array('goods_id'=>$arr['id']))->setfield("gcs_id",$arr['classsan']);
				}
				}
			}else{
				$goods_and_class           = M('goods_and_class');
	            $goods_and_class->goods_id = $goods_id;
	            $goods_and_class->gcs_id   = $arr['classsan'];
	            $goods_and_class->add();
			}
//			商品分类关联
//			die;



            //商品奖金设置信息
            $bonus_state    = M('goods')->where(array('id' => $arr['id']))->getField('bonus_state'); //奖金审核状态 1待审核 2已审核 3审核不通过
            $old_goods      = M('goods_bouns_info')->where(array('goods_id' => $arr['id']))->field('type')->select();
            $old_bonus_type = $old_goods[0]['type']; //原搭档奖金设置 0平台定义 1自定义
            $bonus_type     = $arr['bonus_type']; //搭档奖金设置 0平台定义 1自定义
            $partner_id     = $arr['partner_id']; //搭档级别名称
            $partner_ids    = $arr['partner_ids']; //搭档级别id
            $fist_level     = $arr['first_level']; //第一层级
            $second_level   = $arr['second_level']; //第二层级
            $third_level    = $arr['third_level']; //第三层级
            //组合一波传过来的新数据
            // $new_bonus_data = array();
            // for ($i = 1; $i <= 3; $i++) {
            //     $new_bonus_data[$i][] = $fist_level[$i - 1];
            //     $new_bonus_data[$i][] = $second_level[$i - 1];
            //     $new_bonus_data[$i][] = $third_level[$i - 1];
            // }
            // pp($new_bonus_data);
            //写到此处就有点忧伤了  挺麻烦的更新操作(要考虑设置方式的变更和自定义设置的变更)
            $old_bonus_level_ratio = M('goods_bouns_info')->where(array('goods_id' => $arr['id']))->select(); //原奖金设置信息
            //1.由平台设置变成自定义设置
            if ($old_bonus_type == 0 && $bonus_type == 1) {
                // foreach ($new_bonus_data as $key => $value) {
                //     foreach ($value as $k => $v) {
                //         $change_map['goods_id']          = $arr['id'];
                //         $change_map['partner_id']        = $key;
                //         $change_map['bonus_level']       = $k + 1;
                //         $chang_save['bonus_level_ratio'] = $v;
                //         M('goods_bouns_info')->where($change_map)->save($chang_save);
                //     }
                // }

                M('goods_bouns_info')->where(array('goods_id' => $arr['id']))->delete();
                for ($j = 0; $j < count($partner_id); $j++) {
                    $gbi                    = M('goods_bouns_info');
                    $gbi->goods_id          = $arr['id']; //商品id
                    $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                    $gbi->partner_level     = $partner_id[$j]; //搭档名称
                    $gbi->partner_id        = $partner_ids[$j]; //搭档级别id
                    $gbi->bonus_level       = 1; //奖金层次
                    $gbi->bonus_level_ratio = $fist_level[$j]; //层级奖金比例
                    $gbi->state             = 0; //生效状态
                    $gbi->time              = $time;
                    $gbi->add();

                    $gbi                    = M('goods_bouns_info');
                    $gbi->goods_id          = $arr['id']; //商品id
                    $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                    $gbi->partner_level     = $partner_id[$j]; //搭档名称
                    $gbi->partner_id        = $partner_ids[$j]; //搭档级别id
                    $gbi->bonus_level       = 2; //奖金层次
                    $gbi->bonus_level_ratio = $second_level[$j]; //层级奖金比例
                    $gbi->state             = 0; //生效状态
                    $gbi->time              = $time;
                    $gbi->add();

                    $gbi                    = M('goods_bouns_info');
                    $gbi->goods_id          = $arr['id']; //商品id
                    $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                    $gbi->partner_level     = $partner_id[$j]; //搭档名称
                    $gbi->partner_id        = $partner_ids[$j]; //搭档级别id
                    $gbi->bonus_level       = 3; //奖金层次
                    $gbi->bonus_level_ratio = $third_level[$j]; //层级奖金比例
                    $gbi->state             = 0; //生效状态
                    $gbi->time              = $time;
                    $gbi->add();
                }
                if ($a_state == 2) {
                    //把原奖金信息记录起来
                    foreach ($old_bonus_level_ratio as $key => $value) {
                        $map_change['goods_id']        = $arr['id'];
                        $map_change['partner_id']      = $value['partner_id'];
                        $map_change['bonus_level']     = $value['bonus_level'];
                        $chang_save['old_bonus_ratio'] = $value['bonus_level_ratio'];
                        M('goods_bouns_info')->where($map_change)->save($chang_save);
                    }
                }
            }
            //2.由自定义设置变成平台设置
            else if ($old_bonus_type == 1 && $bonus_type == 0) {
                M('goods_bouns_info')->where(array('goods_id' => $arr['id']))->delete(); //清空原有的奖金设置信息
                $partner = M()->table('__SALE_BONUS_SET__ sbs')
                    ->join('left join __PARTNER__ p on p.id=sbs.partner_id')
					->where(array("sbs.seller_id"=>$arr['seller_id']))
                    ->field('sbs.*,p.name')
                    ->select();
                foreach ($partner as $key => $value) {
                    $gbi                    = M('goods_bouns_info');
                    $gbi->goods_id          = $arr['id']; //商品id
                    $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                    $gbi->partner_level     = $value['name']; //搭档名称
                    $gbi->partner_id        = $value['partner_id']; //搭档级别id
                    $gbi->bonus_level       = $value['partner_level']; //搭档层级
                    $gbi->bonus_level_ratio = $value['rate']; //层级奖金比例
                    $gbi->time              = $time;
                    $gbi->state             = 0; //生效状态
                    $gbi->add();
                }
                if ($a_state == 2) {
                    //把原奖金信息记录起来
                    foreach ($old_bonus_level_ratio as $key => $value) {
                        $map_change['goods_id']        = $arr['id'];
                        $map_change['partner_id']      = $value['partner_id'];
                        $map_change['bonus_level']     = $value['bonus_level'];
                        $chang_save['old_bonus_ratio'] = $value['bonus_level_ratio'];
                        M('goods_bouns_info')->where($map_change)->save($chang_save);
                    }
                }

            }
            //3.自定义设置的变更
            else if ($old_bonus_type == 1 && $bonus_type == 1) {
                $is_change = false; //变化标志位
                $tmp_arr   = array(); //存放新的奖金设置信息
                //处理一波这个数据
                for ($i = 0; $i < 3; $i++) {
                    $tmp_arr[] = $fist_level[$i];
                    $tmp_arr[] = $second_level[$i];
                    $tmp_arr[] = $third_level[$i];
                }
                // dump($old_bonus_level_ratio);
                // pp($tmp_arr);
                foreach ($tmp_arr as $key => $value) {
                    if ($value != $old_bonus_level_ratio[$key]['bonus_level_ratio']) {
                        $is_change = true;
                        break;
                    }
                }
                // pp($is_change);
                //奖金信息有变动
                if ($is_change) {
                    // pp($partner_id);
                    M('goods_bouns_info')->where(array('goods_id' => $arr['id']))->delete(); //清空原有的奖金设置信息
                    for ($j = 0; $j < count($partner_id); $j++) {
                        $gbi                    = M('goods_bouns_info');
                        $gbi->goods_id          = $arr['id']; //商品id
                        $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                        $gbi->partner_level     = $partner_id[$j]; //搭档名称
                        $gbi->partner_id        = $partner_ids[$j]; //搭档级别id
                        $gbi->bonus_level       = 1; //奖金层次
                        $gbi->bonus_level_ratio = $fist_level[$j]; //层级奖金比例
                        $gbi->state             = 0; //生效状态
                        $gbi->time              = $time;
                        $gbi->add();

                        $gbi                    = M('goods_bouns_info');
                        $gbi->goods_id          = $arr['id']; //商品id
                        $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                        $gbi->partner_level     = $partner_id[$j]; //搭档名称
                        $gbi->partner_id        = $partner_ids[$j]; //搭档级别id
                        $gbi->bonus_level       = 2; //奖金层次
                        $gbi->bonus_level_ratio = $second_level[$j]; //层级奖金比例
                        $gbi->state             = 0; //生效状态
                        $gbi->time              = $time;
                        $gbi->add();

                        $gbi                    = M('goods_bouns_info');
                        $gbi->goods_id          = $arr['id']; //商品id
                        $gbi->type              = $bonus_type; //奖金类别 1自定义 0平台默认
                        $gbi->partner_level     = $partner_id[$j]; //搭档名称
                        $gbi->partner_id        = $partner_ids[$j]; //搭档级别id
                        $gbi->bonus_level       = 3; //奖金层次
                        $gbi->bonus_level_ratio = $third_level[$j]; //层级奖金比例
                        $gbi->state             = 0; //生效状态
                        $gbi->time              = $time;
                        $gbi->add();
                    }
                    // pp($old_bonus_level_ratio);
                    //把原奖金信息记录起来
                    if ($a_state == 2) {
                        foreach ($old_bonus_level_ratio as $key => $value) {
                            $map_change['goods_id']        = $arr['id'];
                            $map_change['partner_id']      = $value['partner_id'];
                            $map_change['bonus_level']     = $value['bonus_level'];
                            $chang_save['old_bonus_ratio'] = $value['bonus_level_ratio'];
                            M('goods_bouns_info')->where($map_change)->save($chang_save);
                        }
                    }
                }
            }

            $this->success('编辑成功！', U('/home/goods/goodsindex'));
        } else {
            /*商品基本信息*/
            $data = M()->table('__GOODS__ g')
                ->where(array('g.id' => $arr['id']))
                ->join('left join __SELLER__ s on s.id=g.seller_id')
                ->join('left join __LOGISTICS__ l on l.id=g.default_express')
                ->field('g.*,s.name as seller_name,l.name as logistics_name')
                ->find();
            /* //物流
            $logistics_map['id'] = array('neq', $data['default_express']);
            $logistics           = M('logistics')->where($logistics_map)->field('id,name')->select();*/
            //商品规格分类
            $attribute = M('goods_attribute')->field('id,name')->select();
            //商品规格信息详情
            $attribute_info = M()->table('__GOODS_ATTRIBUTE_INFO__ gai')
                ->where(array('gai.goods_id' => $arr['id']))
                ->join('left join __GOODS_ATTRIBUTE__ ga on ga.id=gai.goods_attribute_id')
				->order('gai.id desc')
                ->field('gai.*,ga.name as attr_name')
                ->select();
            //搭档奖金设置--平台返佣比例
            $bonus_type_tmp = M('goods_bouns_info')->where(array('goods_id' => $arr['id']))->field('type')->select();
            $bonus_type     = $bonus_type_tmp[0]['type'];
            $bonus_ratio    = $data['bonus_ratio'];
            //商品奖金设置信息
            $bonus_info_num = M('goods_bouns_info')->where(array('goods_id' => $arr['id']))->select();
			if(count($bonus_info_num)!=9){
				$bonus_info= M()->table('__SALE_BONUS_SET__ sbs')
                    ->join('left join __PARTNER__ p on p.id=sbs.partner_id')
					->where(array("sbs.seller_id"=>$data['seller_id']))
                    ->field('sbs.*,p.name as partner_level,sbs.rate as bonus_level_ratio')
                    ->select();
			}else{
				$bonus_info=$bonus_info_num;
			}
            //数据处理
            $done = array();
            foreach ($bonus_info as $key => $value) {
                $done[$value['partner_id']][] = $value;
            }
            //所属商家
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] = array('eq', $seller_id);
                //物流
                $logistics_map['L.id']         = array('neq', $data['default_express']);
                $logistics_map['LS.seller_id'] = array('eq', $seller_id);

                //$logistics           = M('logistics')->where($logistics_map)->field('id,name')->select();
                $logistics = M()->table('__LOGISTICS__ L')
                    ->join('left join __LOGISTICS_SELLER__ LS on LS.logistics_id = L.id')
                    ->where($logistics_map)
                    ->field('L.id,L.name')
                    ->select(); //物流
                //
            } else {
                $seller_map['id'] = array('neq', $data['seller_id']);
                $seller           = M('seller')->where($seller_map)->field('id,name')->select();
                $logistics        = M()->table('__LOGISTICS__ L')
                    ->join('left join __LOGISTICS_SELLER__ LS on LS.logistics_id = L.id')
                    ->field('L.id,L.name')
                    ->select(); //物流
            }

            // $seller_null['num'] = array('id' => null, 'name' => "无");
            // $seller             = array_merge($seller_tmp, $seller_null);
            /*图片集*/
            $datapic = M('pic')->where(array('goods_id' => $arr['id']))->field('id,pic')->select();
            //已添加规格
            $tmp          = '';
            $tmp_selected = M('goods_attribute_info')->where(array('goods_id' => $arr['id']))->field('goods_attribute_id')->select();
            foreach ($tmp_selected as $k => $v) {
                $tmp = $tmp . ";" . $v['goods_attribute_id'] . ";"; //已添加规格的字符串
            }

            $classone = M('goods_class')->where(array('is_disable' => 0))->select();
            $this->assign('classone', $classone);
            $this->assign('data', $data);
            $this->assign('logistics', $logistics);
            $this->assign('attribute', $attribute);
            $this->assign('attribute_info', $attribute_info);
            $this->assign('bonus_type', $bonus_type);
            $this->assign('bonus_ratio', $bonus_ratio);
            $this->assign('bonus_info', $done);
            $this->assign('seller', $seller);
            $this->assign('datapic', $datapic);
            $this->assign('tmp', $tmp);
            $this->display();
        }
    }

    //商品详情
    public function goodsinfo()
    {
        $goods_id = I('id');
        //商品基本信息
        $data = M()->table('__GOODS__ g')
            ->where(array('g.id' => $goods_id))
            ->join('left join __SELLER__ s on s.id=g.seller_id')
            ->join('left join __LOGISTICS__ l on l.id=g.default_express')
            ->field('g.*,s.name as seller_name,l.name as logistics_name')
            ->find();
        // dump($data);
        //图集
        $goodspic = M()->table('__PIC__ p')
            ->where(array('p.goods_id' => $goods_id))
            ->field('p.pic')
            ->select();
        //规格详情
        $goodsattr = M()->table('__GOODS_ATTRIBUTE_INFO__ gai')
            ->join('left join __GOODS_ATTRIBUTE__ ga on ga.id=gai.goods_attribute_id')
            ->where(array('gai.goods_id' => $goods_id))
            ->field('ga.name as attr_name,gai.*')
            ->select();
        $bonus_info = M('goods_bouns_info')->where(array('goods_id' => $goods_id))->select();
        // dump($bonus_info);
        // $bonus_ratio_amount = $bonus_info[0];
        // $bunus_type         = $bonus_info[0]['type'];
        $this->assign('data', $data);
        $this->assign('goodspic', $goodspic);
        $this->assign('goodsattr', $goodsattr);
        $this->assign('bonus_info', $bonus_info);
        // $this->assign('bonus_ratio_amount', $bonus_ratio_amount);
        // $this->assign('bunus_type', $bunus_type);
        $this->display();
    }

    /*
     *商品管理-上架商品
     */
    public function goodsonsale()
    {
        $arr = I();
        // pp($arr['id']);
        //判断勾选的商品中是否有奖金未审核状态的商品
        for ($i = 0; $i < count($arr['id']); $i++) {
            $bonus_state = M('goods')->where(array('id' => $arr['id'][$i]))->getField('bonus_state');
            if ($bonus_state != 2) {
                $this->error('上架失败，所选商品中存在奖金未审核状态的商品！');
            }
        }
        //只有勾选的商品全部是奖金审核状态通过的才进行上架
        for ($i = 0; $i < count($arr['id']); $i++) {
            $data             = M('goods');
            $data->id         = $arr['id'][$i];
            $data->is_on_sale = 1;
            $data->save();
        }
        $this->success('上架成功！', U('/home/goods/goodsindex'));
    }
    /*
     *商品管理-下架商品
     */
    public function goodsoutsale()
    {
        $arr = I();
        // pp($arr['id']);
        for ($i = 0; $i < count($arr['id']); $i++) {
            $data             = M('goods');
            $data->id         = $arr['id'][$i];
            $data->is_on_sale = 0;
            $data->save();
        }
        $this->success('下架成功！', U('/home/goods/goodsindex'));
    }
    /*
     *商品管理-删除商品
     */
    public function goodsdel()
    {
        $arr = I();
        //批量
        if ($arr['type'] != 2) {
            set_time_limit(0);
            for ($i = 0; $i < count($arr['id']); $i++) {
                $data            = M('goods');
                $data->id        = $arr['id'][$i];
                $data->is_delete = 1;
                $data->save();
            }
        } else {
//            pp($arr);
            $data            = M('goods');
            $data->id        = $arr['id'];
            $data->is_delete = 1;
            $data->save();
        }
        $this->success('删除成功！', U('/home/goods/goodsindex'));
    }

    /*
     *商品管理-增加七天退换
     */
    public function goodsonseven()
    {
        $arr = I();
        for ($i = 0; $i < count($arr['id']); $i++) {
            $data           = M('goods');
            $data->id       = $arr['id'][$i];
            $data->is_seven = 1;
            $data->save();
        }
        $this->success('添加七天退换成功！', U('/home/goods/goodsindex'));
    }
    /*
     *商品管理-移除七天退换
     */
    public function goodsoutseven()
    {
        $arr = I();
        for ($i = 0; $i < count($arr['id']); $i++) {
            $data           = M('goods');
            $data->id       = $arr['id'][$i];
            $data->is_seven = 0;
            $data->save();
        }
        $this->success('移除七天退换成功！', U('/home/goods/goodsindex'));
    }

    /*
     *商品管理-增加包邮
     */
    public function goodsonbaoyou()
    {
        $arr = I();
        for ($i = 0; $i < count($arr['id']); $i++) {
            $data            = M('goods');
            $data->id        = $arr['id'][$i];
            $data->is_baoyou = 1;
            $data->save();
        }
        $this->success('添加包邮成功！', U('/home/goods/goodsindex'));
    }
    /*
     *商品管理-移除包邮
     */
    public function goodsoutbaoyou()
    {
        $arr = I();
        for ($i = 0; $i < count($arr['id']); $i++) {
            $data            = M('goods');
            $data->id        = $arr['id'][$i];
            $data->is_baoyou = 0;
            $data->save();
        }
        $this->success('移除包邮成功！', U('/home/goods/goodsindex'));
    }

    /*
     *商品管理-增加推荐
     */
    public function goodsonrecommend()
    {
        $arr = I();
        for ($i = 0; $i < count($arr['id']); $i++) {
            $data               = M('goods');
            $data->id           = $arr['id'][$i];
            $data->is_recommend = 1;
            $data->save();
        }
        $this->success('添加推荐成功！', U('/home/goods/goodsindex'));
    }
    /*
     *商品管理-移除推荐
     */
    public function goodsoutrecommend()
    {
        $arr = I();
        for ($i = 0; $i < count($arr['id']); $i++) {
            $data               = M('goods');
            $data->id           = $arr['id'][$i];
            $data->is_recommend = 0;
            $data->save();
        }
        $this->success('移除推荐成功！', U('/home/goods/goodsindex'));
    }

    //多图上传方法
    public function goodsaddpic()
    {
        if ($_FILES) {
            $file = uploads();
        }
        $this->ajaxReturn($file);
    }

    public function recommend()
    {
        $arr = I();
        if ($arr['type'] == 2) {
            $data               = M('goods');
            $data->id           = $arr['id'];
            $data->is_recommend = 1;
            $data->save();
        }
        $this->success('推荐成功！', U('/home/goods/goodsindex'));
    }

}