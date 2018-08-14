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
<style type="text/css">
	* {
		padding: 0;
		margin: 0;
		font-size: 11px;
		line-height: 18px;
		color: #000;
	}
	
	.food_tip {
		width: 207px;
		/*长：227 宽：605*/
		height: 601px;
		text-align: left;
		padding: 20px 10px;
	}
	
	p span:first-child {
		float: left;
	}
	
	p span:last-child {
		float: right;
	}
	
	.shop_name span {
		padding-top: 3px;
	}
	
	.shop_name span:nth-child(2) {
		font-size: 13px;
	}
	
	.payer_status {
		padding-top: 19px;
		padding-bottom: 33px;
	}
	
	.payer_remarks {
		font-size: 12px;
		padding-top: 10px;
		padding-bottom: 13px;
		color: #000;
	}
	
	.goods {
		text-align: right;
		padding-bottom: 19px;
	}
	
	.goods i {
		color: #000;
	}
	
	.color44 span {
		color: #000;
	}
	
	.goods p:nth-child(1) {
		text-align: center;
		font-size: 13px;
		padding-bottom: 15px;
		color: #000;
	}
	
	.lastColor span:last-child {
		color: #000;
		width: 70px;
		text-align: right;
	}
	
	.other_payment {
		padding-bottom: 35px;
	}
	
	.payer_address {
		font-size: 12px;
		padding-top: 15px;
	}
	
	.telphone {
		padding-bottom: 20px;
	}
	
	.text_align_center {
		text-align: center;
	}
</style>
<style type="text/css">
	.left_ul {
		list-style-type: none;
		/*border:1px solid rgb(179,179,179);*/
	}
	
	.left_ul_li {
		text-align: center;
		border-bottom: 1px solid rgb(179, 179, 179);
	}
</style>
<title>评价管理</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 评价管理 <span class="c-gray en">&gt;</span> 评价列表
        <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <ul class="left_ul">
            <a href="<?php echo U('/home/comment/commentindex',array('seller_id'=>null));?>">
                <li class="maincolor left_ul_li" id="seller_all">全部商家</li>
            </a>
            <?php if(is_array($seller)): foreach($seller as $key=>$v): ?><a href="<?php echo U('/home/comment/commentindex',array('seller_id'=>$v['id']));?>">
                    <li class="maincolor left_ul_li" id="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></li>
                </a><?php endforeach; endif; ?>
        </ul>
    </div>
    <div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-10">
        <form action="<?php echo U('/home/comment/commentindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
            <div class="text-c">
                <input type="text" id="order_number" name="order_number" value="<?php echo ($search['order_number']); ?>" class="input-text" style="width:250px" placeholder="输入订单编号">
                <!--<span class="select-box inline">
                    <select name="class_id" class="select">
                        <?php if(is_array($class)): foreach($class as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
                    </select>
                </span>-->
                <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </div>
        </form>
        <div class="text-c">
            <br>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l"></span>&nbsp;
            <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
        <table class="table table-border table-bordered table-bg">
            <thead>
                <tr>
                    <th scope="col" colspan="20">评价列表</th>
                </tr>
                <tr class="text-c">
                    <th width="40">操作</th>
                    <th width="40">评价编号</th>
                    <th width="40">订单编号</th>
                    <th width="40">所属商家</th>
                    <!--<th width="40">评价类型</th>-->
                    <!--<th width="40">商品编号</th>-->
                    <!--<th width="40">商品名称</th>-->
                    <th width="40">评价会员</th>
                    <th width="40">评价分数</th>
                    <th width="40">评价内容</th>
                    <th width="40">评价时间</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                        <td>
                            <?php if($v['status'] == 0): ?><a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/comment/appeals',array('id'=>$v['id'],'type'=>$v['type']));?>">申诉</a>
							<?php elseif($v['status'] == 1): ?><span class="label radius">拒绝</span>
							<?php elseif($v['status'] == 2): ?>
							<span class="label radius">通过</span>
							<a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/comment/deletecomn',array('id'=>$v['id']));?>">删除</a>
							<?php else: ?><span class="label radius">待通过</span><?php endif; ?>
                            	
                            <?php if ($v['reply']==null): ?>
                            <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/comment/commentreply',array('id'=>$v['id']));?>" class="ml-5" style="text-decoration:none">回复</a>
                            <?php else: ?>
                            <span class="label radius">已回复</span>
                            <?php endif ?>
                        </td>
                        <td class="text-l">
                                <center><a class="maincolor" href="<?php echo U('/home/comment/comshow',array('id'=>$v['id']));?>"><?php echo ($v['id']); ?></a></center>
                            </td>
                        <td>
                        	<center>
								<a class="maincolor" href="<?php echo U('/home/order/orderinfo',array('id'=>$v['order_id']));?>"><?php echo ($v['order_number']); ?></a>
							</center></td>
                        <td><?php echo ($v['seller_name']); ?></td>
                        <!--<td>
                            <?php if($v['type']==0){ echo "商品"; }else{ echo "商家"; } ?>
                        </td>-->
                        <!--<td><?php echo ($v['goods_id']); ?></td>-->
                        <!--<td><?php echo ($v['goods_name']); ?></td>-->
                        <td><?php echo ($v['username']); ?></td>
                        <td><?php echo ($v['score']); ?></td>
                        <td><?php echo ($v['content']); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$v['time'])); ?></td>
                    <!--    <?php if ($v['reply']!=null): ?>
                        <td><?php echo ($v['reply']); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$v['replytime'])); ?></td>
                        <?php else: ?>
                        <td><span class="label label-success radius">请回复</span></td>
                        <td><span class="label label-success radius">请回复</span></td>
                        <?php endif ?> -->
                    </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <div class="pageright"><?php echo ($page); ?></div>
    </div>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/laypage/1.2/laypage.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
</body>

</html>