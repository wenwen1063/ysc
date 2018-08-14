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
<link href="/ysc2/Public/admin/lib/icheck/icheck.css" rel="stylesheet" type="text/css" />
<link href="/ysc2/Public/admin/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/ysc2/Public/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
<script src="/ysc2/Public/ueditor/ueditor.config.js"></script>
<script src="/ysc2/Public/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/timejs/laydate.js"></script>
<sc>
	<!--index-->
	<style type="text/css">
		.file {
			position: relative;
			display: inline-block;
			cursor: pointer;
			background: #3bb4f2;
			padding: 4px 12px;
			color: #fff;
			text-align: center;
			border-radius: 3px;
			overflow: hidden;
		}
		
		.file input {
			position: absolute;
			font-size: 100px;
			right: 0;
			top: 0;
			opacity: 1;
		}
		
		.file:hover {
			background: #AADFFD;
			border-color: #78C3F3;
			color: #004974;
			text-decoration: none;
		}
	</style>
	<style type="text/css">
		.searchable-select-hide {
			display: none;
		}
		
		.searchable-select {
			display: inline-block;
			min-width: 200px;
			font-size: 14px;
			line-height: 1.428571429;
			color: #555;
			vertical-align: middle;
			position: relative;
			outline: none;
		}
		
		.searchable-select-holder {
			padding: 6px;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 4px;
			min-height: 30px;
			box-sizing: border-box;
			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
			-webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
			transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		}
		
		.searchable-select-caret {
			position: absolute;
			width: 0;
			height: 0;
			box-sizing: border-box;
			border-color: black transparent transparent transparent;
			top: 0;
			bottom: 0;
			border-style: solid;
			border-width: 5px;
			margin: auto;
			right: 10px;
		}
		
		.searchable-select-dropdown {
			position: absolute;
			background-color: #fff;
			border: 1px solid #ccc;
			border-bottom-left-radius: 4px;
			border-bottom-right-radius: 4px;
			padding: 4px;
			border-top: none;
			top: 28px;
			left: 0;
			right: 0;
			z-index: 999
		}
		
		.searchable-select-input {
			margin-top: 5px;
			border: 1px solid #ccc;
			outline: none;
			padding: 4px;
			width: 100%;
			box-sizing: border-box;
			width: 100%;
		}
		
		.searchable-scroll {
			margin-top: 4px;
			position: relative;
		}
		
		.searchable-scroll.has-privious {
			padding-top: 16px;
		}
		
		.searchable-scroll.has-next {
			padding-bottom: 16px;
		}
		
		.searchable-has-privious {
			top: 0;
		}
		
		.searchable-has-next {
			bottom: 0;
		}
		
		.searchable-has-privious,
		.searchable-has-next {
			height: 16px;
			left: 0;
			right: 0;
			position: absolute;
			text-align: center;
			z-index: 10;
			background-color: white;
			line-height: 8px;
			cursor: pointer;
		}
		
		.searchable-select-items {
			max-height: 400px;
			overflow-y: scroll;
			position: relative;
		}
		
		.searchable-select-items::-webkit-scrollbar {
			display: none;
		}
		
		.searchable-select-item {
			padding: 5px 5px;
			cursor: pointer;
			min-height: 30px;
			box-sizing: border-box;
		}
		
		.searchable-select-item.hover {
			background: #555;
			color: white;
		}
		
		.searchable-select-item.selected {
			background: #28a4c9;
			color: white;
		}
	</style>
	<title>新增商品</title>
	</head>

	<body>
		<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 分销管理 <span class="c-gray en">&gt;</span> 奖金设置 <span class="c-gray en">&gt;</span> 新增
			<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回"><i class="Hui-iconfont">&#xe66b;</i></a>
			<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>
		<div class="pd-20">
			<form action="<?php echo U('/home/bonusinfo/bonusinfoadd');?>" name="main_form" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
				<input type="hidden" name="partner_id" id="partner_id" value="<?php echo ($partner_id); ?>" />
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>奖金层级：</label>
					<div class="formControls col-4">
						<input type="text" class="input-text" value="" placeholder="输入奖金层级" id="hierarchy" name="hierarchy">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>层级名称：</label>
					<div class="formControls col-4">
						<input type="text" class="input-text" value="" placeholder="输入层级名称" id="name" name="name">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>推荐奖励积分：</label>
					<div class="formControls col-4">
						<input type="text" class="input-text" value="" placeholder="输入推荐奖励积分" id="integral" name="integral">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>推荐奖励金额：</label>
					<div class="formControls col-4">
						<input type="text" class="input-text" value="" placeholder="输入奖励金额" id="bonus_amount" name="bonus_amount">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">推荐奖励备注：</label>
					<div class="formControls col-8">
						<script id="container_goods_desc" name="recommend_remark" type="text/plain" style="width:1000px">
						</script>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>消费奖励积分最高比例：</label>
					<div class="formControls col-4">
						<input type="text" class="input-text" value="" placeholder="输入消费奖励积分最高比例" id="consume_integral" name="consume_integral">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>消费奖励金额最高比例：</label>
					<div class="formControls col-4">
						<input type="text" class="input-text" value="" placeholder="输入消费奖励金额最高比例" id="consume_amount" name="consume_amount">
					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-2">消费奖励备注：</label>
					<div class="formControls col-8">
						<script id="consume_remark" name="consume_remark" type="text/plain" style="width:1000px">
						</script>
					</div>
				</div>

				<div class="row cl">
					<div class="col-10 col-offset-2">
						<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;" onclick="return check()">
					</div>
				</div>
			</form>
		</div>
		</div>
		<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
		<script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
		<script type="text/javascript" src="/ysc2/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
		<script type="text/javascript" src="/ysc2/Public/admin/lib/Validform/5.3.2/Validform.min.js"></script>
		<script type="text/javascript" src="/ysc2/Public/admin/lib/webuploader/0.1.5/webuploader.min.js"></script>
		<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
		<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
		<script type="text/javascript">
			function check() {
				
				if($('#hierarchy').val() == "") {
					alert("奖金层级不能为空!");
					return false;
				}
				if($('#name').val() == "") {
					alert("层级名称不能为空!");
					return false;
				}
				if($('#integral').val() == "") {
					alert("推荐奖励积分不能为空!");
					return false;
				}
				if($('#bonus_amount').val() == "") {
					alert("推荐奖励金额不能为空!");
					return false;
				}
				if($('#consume_integral').val() == "") {
					alert("消费奖励积分最高比例不能为空!");
					return false;
				}
				if($('#consume_amount').val() == "") {
					alert("消费奖励金额最高比例不能为空!");
					return false;
				}
				return true;
			}
		</script>
		<script>
			var editor = new UE.ui.Editor({
				initialFrameHeight: 300,
				initialFrameWidth: 1000
			});
			var editor1 = new UE.ui.Editor({
				initialFrameHeight: 300,
				initialFrameWidth: 1000
			});
			editor.render("consume_remark");
			editor1.render("container_goods_desc");
		</script>
	</body>

	</html>