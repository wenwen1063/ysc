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

<title>物流分类</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  物流管理 <span class="c-gray en">&gt;</span>
   物流分类 
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
	<form action="<?php echo U('/home/logmanage/logmanageindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
		<div class="text-c">
			<input type="text" id="name" name="name" value="<?php echo ($search['name']); ?>" class="input-text" style="width:250px" placeholder="输入物流名称">
			<button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
		</div>
	</form>
	<form action="<?php echo U('/home/logclass/logclassdel/del');?>" method="post/get" name="main_form">
		<div class="text-c"><br></div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
		<a href="<?php echo U('/home/logmanage/logmanageadd');?>" class="btn btn-primary radius"> 新增 </a></span>&nbsp;
		<!-- <input type="submit" class="btn btn-danger radius" value="删除" onclick="return Check()" /> --><!-- <i class="Hui-iconfont">&#xe6e2;</i> -->
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg table-hover">
		<thead>
			<tr>
				<th scope="col" colspan="15">分类列表</th>
			</tr>
			<tr class="text-c">
				<th width="40">操作</th>
				<th width="40">商家信息</th>
				<th width="40">物流编号</th>
				<th width="40">物流名称</th>
				<th width="40">首重</th>
				<th width="40">首重费用</th>
				<th width="40">续重运费（每公斤）</th>
				<th width="40">状态</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
					<td class="td-manage">
					<?php if ($v['is_disable']==0): ?>
					<a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/logmanage/logmanagedisable',array('id'=>$v['id'],'is_disable'=>$v['is_disable']));?>">禁用</a>
					<?php else: ?>
					<a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/logmanage/logmanagedisable',array('id'=>$v['id'],'is_disable'=>$v['is_disable']));?>">启用</a>
					<?php endif ?>
					<a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/logmanage/logmanageupdate',array('id'=>$v['id']));?>">编辑</a>
					<a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/logmanage/logmanagedel',array('id'=>$v['id']));?>" onclick="return confirm('确认要删除吗？');">删除</a>
					</td>
					<td><?php echo ($v['forshort']); ?>&nbsp;(<?php echo ($v['number']); ?>)</td>
					<td><?php echo ($v['sn']); ?></td>
					<td><?php echo ($v['name']); ?></td>
					<td><?php echo ($v['ykg']); ?>kg</td>
					<td><?php echo ($v['ykg_cost']); ?>元</td>
					<td><?php echo ($v['perkg_cost']); ?>元</td>
					<!--<td><?php echo ($v['perkg_cost']); ?></td>-->
					<?php if ($v['is_disable']==0): ?>
					    <td class="td-status"><span class="label label-success radius">已启用</span></td>	  
					<?php else: ?>
  						<td class="td-status"><span class="label radius">已禁用</span></td>	
					<?php endif ?>
				</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
	<div class="pageright"><?php echo ($page); ?></div>
	</form>
</div>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>  
<script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script> 
<script type="text/javascript" src="/ysc2/Public/admin/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script> 
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
//批量删除判断是否选择
function Check()
{
var chks=document.getElementsByTagName('input');
var bl=true;
for(var i=0;i<chks.length;i++)
{
    if(chks[i].checked) 
    {
        bl=false;
        break;
    }
} 
if(bl){
	alert('最少选择一个');
	return false;
}
}
</script>
</body>
</html>