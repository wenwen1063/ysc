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
<title>搭档权限管理</title>
</head>
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

<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 分销管理 <span class="c-gray en">&gt;</span> 奖金设置
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-2">
		<ul class="left_ul">
			<!--<a href="<?php echo U('/home/bonusinfo/index',array('id'=>null));?>"><li class="maincolor left_ul_li" id="seller_all">全部商家</li></a>-->
			<?php if(is_array($partner)): foreach($partner as $key=>$v): ?><a href="<?php echo U('/home/bonusinfo/index',array('id'=>$v['id']));?>">
					<li class="maincolor left_ul_li" id="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></li>
				</a><?php endforeach; endif; ?>
		</ul>
	</div>
	<div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-10">
		<form action="" method="post/get" name="mainform" class="form form-horizontal" id="form-admin-add" style="float:right;">
			<input type="hidden" name="id" value="<?php echo ($id); ?>">
			<div class="text-c">

				<button type="submit" class="btn btn-success" onclick="return search()"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
				<!-- <input type="submit" class="btn btn-danger radius" value="导出" onclick="return bonusinfoexcel();" style="background-color: #f5862e;border-color: #f5862e;" /> -->
			</div>
		</form>

		<form action="" method="post/get" name="main_form" id="main_form">
			<div class="text-c"><br></div>
			<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <a href="<?php echo U('/home/bonusinfo/bonusinfoadd',array('id'=>$id));?>" class="btn btn-primary radius"> 新增 </a></span>&nbsp;
				<!--<input type="submit" class="btn btn-danger radius" value="删除" onclick="return delbonusinfo()" />-->
				<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th scope="col" colspan="14">商品列表</th>
					</tr>
					<tr class="text-c">
						<!--<th width="25"><input type="checkbox" name="" value=""></th>-->
						<th width="40">操作</th>
						<th width="40">搭档级别</th>
						<th width="40">奖金层级</th>
						<th width="40">层级名称</th>
						<th width="40">推荐奖励积分</th>
						<th width="40">推荐奖励金额</th>
						<th width="40">消费奖励积分最高比例</th>
						<th width="40">消费奖励金额最高比例</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
							<!--<td><input type="checkbox" value="<?php echo ($v['id']); ?>" name="id[]"></td>-->
							<td class="td-manage">
								<a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/bonusinfo/bonusinfoupdate',array('id'=>$v['id']));?>">编辑</a>
								<a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/bonusinfo/bonusinfodel',array('id'=>$v['id'],'type'=>2));?>" onclick="return confirm('确认要删除吗？');">删除</a>
							</td>
							<td><?php echo ($v['pname']); ?></td>
							<td><?php echo ($v['hierarchy']); ?></td>
							<td><?php echo ($v['name']); ?></td>
							<td><?php echo ($v['integral']); ?></td>
							<td><?php echo ($v['bonus_amount']); ?></td>
							<td><?php echo ($v['consume_integral']); ?>%</td>
							<td><?php echo ($v['consume_amount']); ?>%</td>
						</tr><?php endforeach; endif; ?>
				</tbody>
			</table>
			<div class="pageright"><?php echo ($page); ?></div>
	</div>
	</form>
</body>

</html>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
	var id = "<?php echo $id;?>";
	if(id == '') {
		$('.left_ul li').css('color', '#06c');
		$(".left_ul li:first").css("color", "black");
	} else {
		$('.left_ul li').css('color', '#06c');
		$(".left_ul li[id*=" + id + "]").css('color', 'black');
	}
</script>
<script type="text/javascript">
	//批量删除判断是否选择
	function delbonusinfo() {
		var gnl = confirm('确认要删除吗？');
		if(gnl == true) {
			var chks = document.getElementsByTagName('input');
			var bl = true;
			for(var i = 0; i < chks.length; i++) {
				if(chks[i].checked) {
					bl = false;
					break;
				}
			}
			if(bl) {
				alert('最少选择一个');
				return false;
			} else {
				document.forms.main_form.action = "<?php echo U('/home/bonusinfo/bonusinfodel');?>";
				document.forms.main_form.submit();
			}
		} else {
			return false;
		}
	}

	function search() {
		document.forms.mainform.action = "<?php echo U('/home/bonusinfo/index/search/');?>";
		document.forms.mainform.submit();
	}
</script>