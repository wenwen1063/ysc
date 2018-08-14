<?php if (!defined('THINK_PATH')) exit();?><!--index -->
  <!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/ysc2/Public/admin/lib/html5.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/respond.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/ysc2/Public/admin/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/ysc2/Public/admin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<!-- <link href="/ysc2/Public/admin/skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" /> -->
<link href="/ysc2/Public/admin/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/ysc2/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="/ysc2/Public/admin/http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--index-->
<title>商品详情</title>
<style type="text/css">
  td p{
    margin-bottom: 0;
  }
</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  商品管理 <span class="c-gray en">&gt;</span>
   商品列表 <span class="c-gray en">&gt;</span>
   商品详情
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);"  title="返回" ><i class="Hui-iconfont">&#xe66b;</i></a><a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
  <table class="table table-border table-bordered table-bg mt-20">
    <thead>
      <tr>
        <th colspan="2" scope="col">商品详情</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>商品编号</td>
        <td><?php echo ($data['number']); ?></td>
      </tr>
      <tr>
        <td>商品名称</td>
        <td><?php echo ($data['goods_name']); ?></td>
      </tr>
      <tr>
        <td>所属商家</td>
        <td><?php echo ($data['seller_name']); ?></td>
      </tr>
      <tr>
        <td>商品小图</td>
        <td><img height="100" width="150" src="/ysc2/Public/Uploads/<?php echo ($data['sm_pic']); ?>"></td>
      </tr>
      <tr>
        <td>商品图集</td>
        <td width="80%">
        <?php if(is_array($goodspic)): foreach($goodspic as $key=>$v): ?><img height="100" width="150" src="/ysc2/Public/Uploads/<?php echo ($v['pic']); ?>">&nbsp;<?php endforeach; endif; ?>
        </td>
      </tr>
      <tr>
        <td>是否上架</td>
        <?php if ($data['is_on_sale']==1): ?>
            <td class="td-status"><span class="label label-success radius">上架中</span></td>
        <?php else: ?>
            <td class="td-status"><span class="label radius">下架中</span></td>
        <?php endif ?>
      </tr>
      <tr>
        <td>商品详情</td>
        <td width="80%">
          <?php echo html_entity_decode($data['goods_introduce']); ?>
        </td>
      </tr>
      <tr>
        <td>虚拟销量</td>
        <td><?php echo ($data['v_sale']); ?></td>
      </tr>
      <tr>
        <td>实际销量</td>
        <td><?php echo ($data['r_sale']); ?></td>
      </tr>
      <tr>
        <td>默认发货物流</td>
        <td><?php echo ($data['logistics_name']); ?></td>
      </tr>
      <tr>
        <td>平台返佣比例</td>
        <td><?php echo ($data['bonus_ratio']); ?>%</td>
      </tr>
<!--       <tr>
        <td>奖金金额</td>
        <td><?php echo ($bonus_ratio_amount['bonus_amount']); ?>元</td>
      </tr> -->
      <tr>
        <td>奖金审核状态</td>
        <?php if($data['bonus_state']==1): ?>
            <td><span class="label label-warning radius">待审核</span></td>
        <?php elseif($data['bonus_state']==2): ?>
            <td><span class="label label-success radius">已审核</span></td>
        <?php elseif($data['bonus_state']==3): ?>
            <td><span class="label radius" style="background-color: #E06D6D;">不通过</span></td>
        <?php endif ?>
      </tr>
      <tr>
        <td>奖金审核时间</td>
        <?php if ($data['auditing_time']!=null): ?>
            <td><?php echo (date('Y-m-d H:i:s',$data['auditing_time'])); ?></td>
        <?php else: ?>
            <td></td>
        <?php endif ?>
      </tr>
      <tr>
        <td>是否提供发票</td>
        <?php if($data['invoice']==0): ?>
            <td>不提供</td>
        <?php else: ?>
            <td>提供</td>
        <?php endif ?>
      </tr>
      <tr>
        <td>是否推荐</td>
        <?php if($data['is_recommend']==0): ?>
            <td>否</td>
        <?php else: ?>
            <td>是</td>
        <?php endif ?>
      </tr>
      <tr>
        <td>是否七天退换</td>
        <?php if($data['is_seven']==0): ?>
            <td>否</td>
        <?php else: ?>
            <td>是</td>
        <?php endif ?>
      </tr>
      <tr>
        <td>是否包邮</td>
        <?php if($data['is_baoyou']==0): ?>
            <td>否</td>
        <?php else: ?>
            <td>是</td>
        <?php endif ?>
      </tr>
      <tr>
        <td>库存警戒量</td>
        <td><?php echo ($data['stock_warning']); ?></td>
      </tr>
    </tbody>
</table>

<table class="table table-border table-bordered table-bg">
  <thead>
    <tr>
      <th scope="col" colspan="15">商品规格列表</th>
    </tr>
    <tr class="text-c">
      <th width="40">规格编号</th>
      <th width="40">规格名称</th>
      <th width="40">重量</th>
      <th width="40">库存</th>
      <th width="40">原价</th>
      <th width="40">现价</th>
    </tr>
  </thead>
  <tbody>
    <?php if(is_array($goodsattr)): foreach($goodsattr as $key=>$v): ?><tr class="text-c">
        <td><?php echo ($v['goods_attribute_id']); ?></td>
        <td><?php echo ($v['attr_name']); ?></td>
        <td><?php echo ($v['weight']); ?>KG</td>
        <td><?php echo ($v['stock']); ?></td>
        <td><?php echo ($v['market_price']); ?>元</td>
        <td><?php echo ($v['shop_price']); ?>元</td>
      </tr><?php endforeach; endif; ?>
  </tbody>
</table>

  <table class="table table-border table-bordered table-bg">
    <thead>
      <tr>
        <th scope="col" colspan="15">商品奖金列表</th>
      </tr>
      <tr class="text-c">
        <th width="40">搭档名称</th>
        <th width="40">奖金层级</th>
        <th width="40">奖金比例</th>
      </tr>
    </thead>
    <tbody>
      <?php if(is_array($bonus_info)): foreach($bonus_info as $key=>$v): ?><tr class="text-c">
          <td><?php echo ($v['partner_level']); ?></td>
          <td>层级<?php echo ($v['bonus_level']); ?></td>
          <td><?php echo ($v['bonus_level_ratio']); ?>%</td>
        </tr><?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
</body>
</html>