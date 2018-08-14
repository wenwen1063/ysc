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
<title>话费流量管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  话费流量管理 <span class="c-gray en">&gt;</span>
   话费流量明细列表
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <form action="<?php echo U('/home/feeflowinfo/feeflowinfoindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
        <div class="text-c">
            <input type="text" name="username" value="<?php echo ($search['username']); ?>" class="input-text" style="width:150px" placeholder="输入会员名称">
            <input type="text" name="tel" value="<?php echo ($search['tel']); ?>" class="input-text" style="width:150px" placeholder="输入号码">
            <input type="text" name="number_l" value="<?php echo ($search['number_l']); ?>" class="input-text" style="width:250px" placeholder="输入充值数量或金额下限">-
            <input type="text" name="number_h" value="<?php echo ($search['number_h']); ?>" class="input-text" style="width:250px" placeholder="输入充值数量或金额上限">
            <span class="select-box inline">
            <select name="type" class="select">
                <?php if($search['type'] == null): ?><option value="">全部类型</option>
                    <option value="0">话费</option>
                    <option value="1">流量</option>
                <?php elseif($search['type'] == 0): ?>
                    <option value="0">话费</option>
                    <option value="1">流量</option>
                    <option value="">全部类型</option>
                <?php else: ?>
                    <option value="1">流量</option>
                    <option value="">全部类型</option>
                    <option value="0">话费</option><?php endif; ?>
            </select>
            </span>
            <span class="select-box inline">
            <select name="state" class="select">
                <?php if($search['state'] == null): ?><option value="">全部状态</option>
                    <option value="0">未到账</option>
                    <option value="1">已到账</option>
                <?php elseif($search['state'] == 0): ?>
                    <option value="0">未到账</option>
                    <option value="1">已到账</option>
                    <option value="">全部状态</option>
                <?php else: ?>
                    <option value="1">已到账</option>
                    <option value="">全部状态</option>
                    <option value="0">未到账</option><?php endif; ?>
            </select>
            </span>
            <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
    </form>
    <div class="text-c"><br></div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"></span>
        <!-- <a href="<?php echo U('/home/feeflowinfo/feeflowinfo_action');?>" class="btn btn-primary radius"> 执行 </a></span>&nbsp; -->
        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="13">话费流量明细列表</th>
            </tr>
            <tr class="text-c">
                <th width="40">操作</th>
                <th width="80">会员名称</th>
                <th width="100">充值订单号</th>
                <th width="100">API订单号</th>
                <th width="80">充值类型</th>
                <th width="120">充值数量(金额)</th>
                <th width="80">流量类型</th>
                <th width="120">充值手机号码</th>
                <th width="40">售价</th>
                <th width="80">实付金额</th>
                <th width="80">充值时间</th>
                <th width="80">充值状态</th>
                <th width="40">备注</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td class="td-manage">
                        <?php if($v['state'] == 9): ?><a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/feeflowinfo/feeflow_recharge',array('id'=>$v['id']));?>">充值</a>
                        <?php else: endif; ?>
                    </td>
                    <td><?php echo ($v['username']); ?></td>
                    <td><?php echo ($v['order_number']); ?></td>
                    <td><?php echo ($v['feeflow_number']); ?></td>
                    <td><?php if($v['type'] == 0): ?>话费<?php else: ?>流量<?php endif; ?></td>
                    <td><?php echo ($v['number']); if($v['unit'] == 0): ?>元<?php else: ?>兆<?php endif; ?></td>
                    <td>
                        <?php if($v['type'] != 0): if($v['flow_type'] == 0): ?>省内
                            <?php else: ?>国内<?php endif; ?>
                        <?php else: endif; ?>
                    </td>
                    <td><?php echo ($v['tel']); ?></td>
                    <td><?php echo ($v['price']); ?>元</td>
                    <td><?php echo ($v['paid_price']); ?></td>
                    <td><?php if($v['time'] != null): echo (date("Y-m-d H:i:s",$v['time'])); else: endif; ?></td>
                    <td><?php if($v['state'] == 0): ?>未到账<?php elseif($v['state'] == 1): ?>已到账<?php else: ?>已撤销<?php endif; ?></td>
                    <td><?php echo ($v['remark']); ?></td>
                </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="pageright"><?php echo ($page); ?></div>
</div>
</body>
</html>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

</script>