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
<style type="text/css">
	ul {
		list-style: none;
		padding: 0;
	}
	
	#menu #tree_root {
		overflow: auto;
	}
	
	#menu #tree_root li span {
		display: block;
		height: 18px;
		line-height: 18px;
		color: #222;
		cursor: pointer;
	}
	
	#menu #tree_root li span.tree2 {
		padding: 6px 6px 6px 20px;
	}
	
	#menu #tree_root li span.tree3 {
		padding: 6px 6px 6px 34px;
	}
	
	#menu #tree_root li span.tree4 {
		padding: 6px 6px 6px 48px;
	}
	
	#menu #tree_root li span.tree5 {
		padding: 6px 6px 6px 62px;
	}
	
	#menu li .hover,
	#menu li span:hover {
		background-color: #e9edf6;
	}
	
	#menu ul {
		overflow: hidden;
	}
	
	#menu ul li b {
		font-weight: normal;
		position: relative;
		padding-left: 16px;
	}
	
	#menu ul li b:before {
		display: block;
		font-size: 0;
		top: 5px;
		left: 0;
		content: "";
		width: 4px;
		height: 4px;
		border: solid 1px transparent;
		transform: rotate(45deg);
		-o-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-webkit-transform: rotate(45deg);
		position: absolute;
	}
	
	#menu ul li .On:before,
	#menu ul li .On2Off:before {
		top: 3px;
		border-bottom-color: #999;
		border-right-color: #999;
	}
	
	#menu ul li .Off:before {
		top: 5px;
		border-top-color: #999;
		border-right-color: #999;
	}
	
	#menu ul li .On2Off:before {
		transform: rotate(0deg);
		-o-transform: rotate(0deg);
		-ms-transform: rotate(0deg);
		-moz-transform: rotate(0deg);
		-webkit-transform: rotate(0deg);
	}
	
	.act {
		background-color: #e9edf6;
	}
</style>
<title>新增商品</title>
</head>

<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 商品列表 <span class="c-gray en">&gt;</span> 新增
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回"><i class="Hui-iconfont">&#xe66b;</i></a>
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="pd-20">
		<form action="<?php echo U('/home/goods/goodsadd');?>" name="main_form" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>商品名称：</label>
				<div class="formControls col-4">
					<input type="text" class="input-text" value="" placeholder="输入商品名称" id="goods_name" name="goods_name">
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>默认发货物流：</label>
				<div class="formControls col-4">
					<select class="select" size="1" name="logistics">
						<?php if(is_array($logistics)): foreach($logistics as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
					</select>
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>一级分类：</label>
				<div class="formControls col-6">
					<select class="classone" size="1" name="classone" id="classone">
						<option value="">请选择一级分类</option>
						<?php if(is_array($classone)): foreach($classone as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
					</select>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>二级分类：</label>
				<div class="formControls col-6" id="classtwo2">
					<script id="classtwo" type="text/template">
						<div>
							<select class="classtwo" size="1" id="classtwo1" name="classtwo">
								<option value="">请选择二级分类</option>
								{{each data as item i}}
								<option value="{{item.id}}">{{item.name}}</option>
								{{/each}}
							</select>
						</div>
					</script>

				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>三级分类：</label>
				<div class="formControls col-6" id="classsan2">
					<script id="classsan" type="text/template">
						<div>
							<select class="classsan" size="1" id="classsan1" name="classsan">
								<option value="">请选择三级分类</option>
								{{each data as item i}}
								<option value="{{item.id}}">{{item.name}}</option>
								{{/each}}
							</select>
						</div>
					</script>

				</div>
			</div>

			<div class="row cl" id="attribute_con">
				<label class="form-label col-2"><span class="c-red">*</span>商品规格：</label>

				<div class="formControls col-4" id="aaaa">
					<script id="test" type="text/template">
						<div>
							<select class="select" size="1" id="attribute" name="attribute">
								<option value="">无</option>
								{{each data as item i}}
								<option value="{{item.id}}-{{item.name}}">{{item.name}}</option>
								{{/each}}
							</select>
						</div>
					</script>

				</div>
			</div>

			<div class="row cl" id="bonus_con">
				<label class="form-label col-2"><span class="c-red">*</span>搭档奖金设置：</label>
				<div class="formControls col-4">
					<select class="select" size="1" id="bonus_type" name="bonus_type">
						<option value="1" check="true">自定义设置</option>
						<option value="0">系统默认设置</option>
					</select>
				</div>
			</div>

			<div class="row cl partner_bonus">
				<label class="form-label col-2">搭档奖金自定义设置(现价百分比)：</label>
			</div>

			<?php if(is_array($partner)): foreach($partner as $key=>$v): ?><div class="row cl partner_bonus" id="">
					<input type="hidden" name="partner_id[]" value="<?php echo ($v[0]['name']); ?>">
					<input type="hidden" name="partner_ids[]" value="<?php echo ($key); ?>">
					<label class="form-label col-3"><?php echo ($v[0]['name']); ?>：</label>
					<label class="form-label col-0">层级1</label>
					<div class="formControls col-1">
						<input type="text" class="input-text" value="0" placeholder="层级1奖金比例" name="first_level[]">
					</div>
					<label class="form-label col-0">层级2</label>
					<div class="formControls col-1">
						<input type="text" class="input-text" value="0" placeholder="层级2奖金比例" name="second_level[]">
					</div>
					<label class="form-label col-0">层级3</label>
					<div class="formControls col-1">
						<input type="text" class="input-text" value="0" placeholder="层级3奖金比例" name="third_level[]">
					</div>
				</div><?php endforeach; endif; ?>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>平台返佣比例(现价百分比)：</label>
				<div class="formControls col-1">
					<input type="text" class="input-text" value="0" placeholder="平台返佣比例" id="bonus_ratio" name="bonus_ratio">
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>所属商家：</label>
				<div class="formControls col-5">
					<select class="select" size="1" id="seller_select" name="seller_id">
						<!-- <option value="" >无</option> -->
						<?php if(count($seller) == 1): ?><option value="<?php echo ($seller[0]['id']); ?>"><?php echo ($seller[0]['name']); ?></option>
							<?php else: ?>
							<!---->
							<?php if(is_array($seller)): foreach($seller as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; endif; ?>
					</select>
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>商品小图(340*340)：</label>
				<div class="formControls col-5" style="width:10%;">
					<a href="javascript:;" class="file">选择图片<input onchange="change()" type="file" id="sm_pic" name="sm_pic"></a>
					<p></p>
					<p id="smtext">
						<img id="smpic" name="smpic" higth="100" width="100" />
					</p>
				</div>
				<div class="col-4"> </div>
			</div>

			<div class="row cl">
				<label class="form-label col-2">商品图集(750*500)：</label>
				<div class="formControls col-8">
					<div class="uploader-list-container">
						<div class="queueList">
							<div id="dndArea" class="placeholder">
								<div id="filePicker-2"></div>
								<p>或将照片拖到这里，单次最多可选300张</p>
							</div>
						</div>
						<div class="statusBar" style="display:none;">
							<div class="progress"> <span class="text">0%</span> <span class="percentage"></span> </div>
							<div class="info"></div>
							<div class="btns">
								<div id="filePicker2"></div>
								<div class="uploadBtn">开始上传</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="allpic" id="allpic">

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>商品详情(700*700)：</label>
				<div class="formControls col-8">
					<script id="goods_introduce" name="goods_introduce" type="text/plain"></script>
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>虚拟销量：</label>
				<div class="formControls col-2">
					<input type="text" class="input-text" value="0" id="v_sale" name="v_sale" onkeyup="value=value.replace(/[^\d]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>实际销量：</label>
				<div class="formControls col-2">
					<input type="text" class="input-text" value="0" id="r_sale" name="r_sale" onkeyup="value=value.replace(/[^\d]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">
				</div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>库存警戒数量：</label>
				<div class="formControls col-2">
					<input type="text" class="input-text" value="0" id="stock_warning" name="stock_warning" onkeyup="value=value.replace(/[^\d]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">
				</div>
			</div>

			<!--         <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>是否上架：</label>
            <div class="formControls col-5 skin-minimal">
                <div class="radio-box">
                    <input type="radio" id="is_on_sale" name="is_on_sale" value="1">
                    <label>是</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="is_on_sale" name="is_on_sale" value="0" checked="true">
                    <label>否</label>
                </div>
            </div>
            <div class="col-4"> </div>
        </div> -->

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>提供发票：</label>
				<div class="formControls col-5 skin-minimal">
					<div class="radio-box">
						<input type="radio" id="invoice" name="invoice" value="1">
						<label>是</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="invoice" name="invoice" value="0" checked="true">
						<label>否</label>
					</div>
				</div>
				<div class="col-4"> </div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>是否推荐：</label>
				<div class="formControls col-5 skin-minimal">
					<div class="radio-box">
						<input type="radio" id="is_recommend" name="is_recommend" value="1">
						<label>是</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="is_recommend" name="is_recommend" value="0" checked="true">
						<label>否</label>
					</div>
				</div>
				<div class="col-4"> </div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>七天退换：</label>
				<div class="formControls col-5 skin-minimal">
					<div class="radio-box">
						<input type="radio" id="is_seven" name="is_seven" value="1">
						<label>是</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="is_seven" name="is_seven" value="0" checked="true">
						<label>否</label>
					</div>
				</div>
				<div class="col-4"> </div>
			</div>

			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>包邮：</label>
				<div class="formControls col-5 skin-minimal">
					<div class="radio-box">
						<input type="radio" id="is_baoyou" name="is_baoyou" value="1">
						<label>是</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="is_baoyou" name="is_baoyou" value="0" checked="true">
						<label>否</label>
					</div>
				</div>
				<div class="col-4"> </div>
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
	<script type="text/javascript" src="/ysc2/Public/index/js/template.js"></script>
	<script>
		$(function() {
			$("#classone").change(function() {
				var classone = $("#classone").val();
				$.ajax({
					type: "get",
					url: "<?php echo U('/home/search/classtwo');?>",
					async: false,
					data: {
						"classone": classone
					},
					dataType: "json",
					success: function(data) {
						var data = {
							data
						}
						var html = template('classtwo', data);
						document.getElementById('classtwo2').innerHTML = html;
					}
				})

			})
		})
		var tmp = '';
		$("#classtwo2").change(function() {

			var classtwo = $("#classtwo1").val();
			$.ajax({
				type: "get",
				url: "<?php echo U('/home/search/classsan');?>",
				async: false,
				data: {
					"classtwo": classtwo
				},
				dataType: "json",
				success: function(data) {
					var data = {
						data
					}
					var html = template('classsan', data);
					document.getElementById('classsan2').innerHTML = html;
				}
			})
		})

		$("#classsan2").change(function() {
				var classsan = $("#classsan1").val();
				$.ajax({
					type: "get",
					url: "<?php echo U('/home/search/attribute2');?>",
					async: false,
					data: {
						"classsan": classsan
					},
					dataType: "json",
					success: function(data) {
						var data = {
							data
						}
						var html = template('test', data);
						document.getElementById('aaaa').innerHTML = html;
						//下拉选择规格分类创建分类下的规格明细

						$('#attribute').change(function() {
							if($(this).children('option:selected').val() != '') {
								var selected_attr = $(this).children('option:selected').val();
								var selected_attr_arr = selected_attr.split('-');
								var id = selected_attr_arr[0];
								var attr_name = selected_attr_arr[1];
								var id_tmp = ';' + id + ';';
								if(tmp.indexOf(id) >= 0) {
									alert('已经添加过该规格！');
								} else {
									$('#attribute_con').after("<div class='row cl' id='attr" + id + "'><input type='hidden' name='attr_id[]'' value='" + id + "'><label class='form-label col-2'>" + attr_name + "：</label><label class='form-label col-0'>重量(kg)</label><div class='formControls col-1'><input type='text' class='input-text weight_control' value='' placeholder='输入商品重量' name='weight[]'></div><label class='form-label col-0'>库存</label><div class='formControls col-1'><input type='text' class='input-text stock_control' value='' placeholder='输入商品库存' name='stock[]'></div><label class='form-label col-0'>原价</label><div class='formControls col-1'><input type=text' class='input-text market_control' value='' placeholder='输入商品原价' name='market_price[]'></div><label class='form-label col-0'>现价</label><div class='formControls col-1'><input type='text' class='input-text shop_control' value='' placeholder='输入商品现价' name='shop_price[]'></div><button class='btn btn-primary radius' onclick='remove_attr(" + id + ")'>移除</button></div>");
									tmp = tmp + ';' + id + ';';
								}

								//                      $('.weight_control').onblur(function(){
								//                          if($(this).val()==''){
								//                              alert('重量不能为空!');
								//                              return;
								//                          }
								//                          if(Number($(this).val())<=0){
								//                              alert('重量不能小于等于0!');
								//                              return;
								//                          }
								//                      })
								//
								//                      $('.stock_control').onblur(function(){
								//                          if($(this).val()==''){
								//                              alert('库存不能为空!');
								//                              return;
								//                          }
								//                          if(Number($(this).val())<0){
								//                              alert('库存不能小于0!');
								//                              return;
								//                          }
								//                      })
								//
								//                      $('.shop_control').onblur(function(){
								//                          if($(this).val()==''){
								//                              alert('现价不能为空!');
								//                              return;
								//                          }
								//                          if(Number($(this).val())<0){
								//                              alert('现价不能小于0!');
								//                              return;
								//                          }
								//                      });
								//
								//                      $('.market_control').onblur(function(){
								//                          if($(this).val()==''){
								//                              alert('原价不能为空!');
								//                              return;
								//                          }
								//                          if(Number($(this).val())<0){
								//                              alert('原价不能小于0!');
								//                              return;
								//                          }
								//                      })
							}
						});
					}
				})

			})
			//移除规格的方法
		function remove_attr(id) {
			var obj = 'attr' + id;
			tmp = tmp.replace(';' + id + ';', '');
			$('#' + obj).remove();
		}
	</script>

	<script type="text/javascript">
		//奖金、返点类别
		$('#bonus_type').change(function() {
			if($(this).children('option:selected').val() == 1) {
				$('.partner_bonus').css('display', 'block');
			} else {
				$('.partner_bonus').css('display', 'none');
			}
		});
		// //添加搭档
		// var partner_str = '';
		// $('#partner_select').change(function(){
		//     if($(this).children('option:selected').val() != ''){
		//         var partner_selected = $(this).children('option:selected').val();
		//         var partner_selected_arr = partner_selected.split('-');
		//         var partner_count = partner_selected_arr[0];
		//         var partner_name = partner_selected_arr[1];//搭档名字
		//         // alert(partner_count);
		//         var partner_name_tmp = ';'+partner_name+';'
		//         if(partner_str.indexOf(partner_name_tmp)>=0){
		//             alert('已经添加过该搭档！');
		//             return;
		//         }else{
		//             // console.log(partner_count+' '+partner_name);
		//             $('#partner_select_con').after("<div class='row cl partnerclass' id='partner"+partner_count+"'><input type='hidden' name='partner_ids[]' value='"+partner_count+"'><input type='hidden' name='partner_id[]' value='"+partner_name+"'><label class='form-label col-3'>"+partner_name+"：</label><label class='form-label col-0'>层级1</label><div class='formControls col-1'><input type='text' class='input-text' value='' placeholder='层级1奖金比例' name='first_level[]'></div><label class='form-label col-0'>层级2</label><div class='formControls col-1'><input type='text' class='input-text' value='' placeholder='层级2奖金比例' name='second_level[]'></div><label class='form-label col-0'>层级3</label><div class='formControls col-1'><input type='text' class='input-text' value='' placeholder='层级3奖金比例' name='third_level[]'></div><input class='btn btn-primary radius' type='button' value='移除' onclick='remove_partner("+partner_count+",\""+partner_name+"\")' /></div>");
		//             partner_str = partner_str+';'+partner_name+';';
		//         }
		//     }
		// });
		// //移除搭档的方法
		// function remove_partner(id,name){
		//     var obj = 'partner'+id;
		//     partner_str = partner_str.replace(';'+name+';','');
		//     $('#'+obj).remove();
		// }
	</script>
	<script>
		var ue = UE.getEditor('goods_introduce');
	</script>
	<script type="text/javascript">
		function check() {
			if($('#goods_name').val() == "") {
				alert("商品名称不能为空!");
				return false;
			}
			if($('#bonus_ratio').val() == "") {
				alert("奖金比例不能为空!");
				return false;
			}
			if($('#bonus_amount').val() == "") {
				alert("奖金金额不能为空!");
				return false;
			}
			if($('#v_sale').val() == "") {
				alert("虚拟销量不为空!");
				return false;
			}
			if($('#r_sale').val() == "") {
				alert("实际销量不为空!");
				return false;
			}
			if($('#stock_warning').val() == "") {
				alert("库存警戒数量不为空!");
				return false;
			}
			if($('#sm_pic').val() == "") {
				alert("请选择商品小图!");
				return false;
			}
			$wi = 0;

			$('.weight_control').each(function() {
				if($(this).val() == '') {
					$wi = 1;
				}else if(Number($(this).val()) <= 0){
					$wi = 2;
				}

			})

			$('.stock_control').each(function() {
					if($(this).val() == '') {
						$wi = 3;
					}else if(Number($(this).val()) <= 0){
					$wi = 4;
				}
				})
				//
			$('.shop_control').each(function() {
				if($(this).val() == '') {
					$wi = 5;
				}else if(Number($(this).val()) <= 0){
					$wi = 6;
				}
			});
			$('.market_control').each(function() {
				if($(this).val() == '') {
					$wi = 7;
				}else if(Number($(this).val()) <= 0){
					$wi = 8;
				}
			})
			if($wi != 0) {
				if($wi == 1) {
					alert('重量不能为空!');
				} else if($wi == 2) {
					alert('重量不能小于等于0!');
				} else if($wi == 3) {
					alert('库存不能为空!');
				} else if($wi == 4) {
					alert('库存不能小于等于0!');
				} else if($wi == 5) {
					alert('现价不能为空!');
				} else if($wi == 6) {
					alert('现价不能小于0!');
				} else if($wi == 7) {
					alert('原价不能为空!');
				} else if($wi == 8) {
					alert('原价不能小于0!');
				}
				return false;
			}
			return true;
		}
	</script>
	<script type="text/javascript">
		function change() {
			var pic = document.getElementById("smpic"),
				file = document.getElementById("sm_pic");

			var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();

			// gif在IE浏览器暂时无法显示
			if(ext != 'png' && ext != 'jpg' && ext != 'jpeg') {
				alert("图片的格式必须为png或者jpg或者jpeg格式！");
				return;
			}
			var isIE = navigator.userAgent.match(/MSIE/) != null,
				isIE6 = navigator.userAgent.match(/MSIE 6.0/) != null;

			if(isIE) {
				file.select();
				var reallocalpath = document.selection.createRange().text;

				// IE6浏览器设置img的src为本地路径可以直接显示图片
				if(isIE6) {
					pic.src = reallocalpath;
				} else {
					// 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
					pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
					// 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
					pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
				}
			} else {
				html5Reader(file);
			}
		}

		function html5Reader(file) {
			var file = file.files[0];
			var reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onload = function(e) {
				var pic = document.getElementById("smpic");
				pic.src = this.result;
			}
		}
	</script>
	<script type="text/javascript">
		$(function() {
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			$list = $("#fileList"),
				$btn = $("#btn-star"),
				state = "pending",
				uploader;

			var uploader = WebUploader.create({
				auto: true,
				swf: 'lib/webuploader/0.1.5/Uploader.swf',

				// 文件接收服务端。
				server: 'http://lib.h-ui.net/webuploader/0.1.5/server/fileupload.php',

				// 选择文件的按钮。可选。
				// 内部根据当前运行是创建，可能是input元素，也可能是flash.
				pick: '#filePicker',

				// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
				resize: false,
				// 只允许选择图片文件。
				accept: {
					title: 'Images',
					extensions: 'gif,jpg,jpeg,bmp,png',
					mimeTypes: 'image/*'
				}
			});
			uploader.on('fileQueued', function(file) {
				var $li = $(
						'<div id="' + file.id + '" class="item">' +
						'<div class="pic-box"><img></div>' +
						'<div class="info">' + file.name + '</div>' +
						'<p class="state">等待上传...</p>' +
						'</div>'
					),
					$img = $li.find('img');
				$list.append($li);

				// 创建缩略图
				// 如果为非图片文件，可以不用调用此方法。
				// thumbnailWidth x thumbnailHeight 为 100 x 100
				uploader.makeThumb(file, function(error, src) {
					if(error) {
						$img.replaceWith('<span>不能预览</span>');
						return;
					}

					$img.attr('src', src);
				}, thumbnailWidth, thumbnailHeight);
			});
			// 文件上传过程中创建进度条实时显示。
			uploader.on('uploadProgress', function(file, percentage) {
				var $li = $('#' + file.id),
					$percent = $li.find('.progress-box .sr-only');

				// 避免重复创建
				if(!$percent.length) {
					$percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo($li).find('.sr-only');
				}
				$li.find(".state").text("上传中");
				$percent.css('width', percentage * 100 + '%');
			});

			// 文件上传成功，给item添加成功class, 用样式标记上传成功。
			uploader.on('uploadSuccess', function(file) {
				$('#' + file.id).addClass('upload-state-success').find(".state").text("已上传");
			});

			// 文件上传失败，显示上传出错。
			uploader.on('uploadError', function(file) {
				$('#' + file.id).addClass('upload-state-error').find(".state").text("上传出错");
			});

			// 完成上传完了，成功或者失败，先删除进度条。
			uploader.on('uploadComplete', function(file) {
				$('#' + file.id).find('.progress-box').fadeOut();
			});
			uploader.on('all', function(type) {
				if(type === 'startUpload') {
					state = 'uploading';
				} else if(type === 'stopUpload') {
					state = 'paused';
				} else if(type === 'uploadFinished') {
					state = 'done';
				}

				if(state === 'uploading') {
					$btn.text('暂停上传');
				} else {
					$btn.text('开始上传');
				}
			});

			$btn.on('click', function() {
				if(state === 'uploading') {
					uploader.stop();
				} else {
					uploader.upload();
				}
			});

		});

		(function($) {
			// 当domReady的时候开始初始化
			$(function() {
				var $wrap = $('.uploader-list-container'),

					// 图片容器
					$queue = $('<ul class="filelist"></ul>')
					.appendTo($wrap.find('.queueList')),

					// 状态栏，包括进度和控制按钮
					$statusBar = $wrap.find('.statusBar'),

					// 文件总体选择信息。
					$info = $statusBar.find('.info'),

					// 上传按钮
					$upload = $wrap.find('.uploadBtn'),

					// 没选择文件之前的内容。
					$placeHolder = $wrap.find('.placeholder'),

					$progress = $statusBar.find('.progress').hide(),

					// 添加的文件数量
					fileCount = 0,

					// 添加的文件总大小
					fileSize = 0,

					// 优化retina, 在retina下这个值是2
					ratio = window.devicePixelRatio || 1,

					// 缩略图大小
					thumbnailWidth = 110 * ratio,
					thumbnailHeight = 110 * ratio,

					// 可能有pedding, ready, uploading, confirm, done.
					state = 'pedding',

					// 所有文件的进度信息，key为file id
					percentages = {},
					// 判断浏览器是否支持图片的base64
					isSupportBase64 = (function() {
						var data = new Image();
						var support = true;
						data.onload = data.onerror = function() {
							if(this.width != 1 || this.height != 1) {
								support = false;
							}
						}
						data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
						return support;
					})(),

					// 检测是否已经安装flash，检测flash的版本
					flashVersion = (function() {
						var version;

						try {
							version = navigator.plugins['Shockwave Flash'];
							version = version.description;
						} catch(ex) {
							try {
								version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
									.GetVariable('$version');
							} catch(ex2) {
								version = '0.0';
							}
						}
						version = version.match(/\d+/g);
						return parseFloat(version[0] + '.' + version[1], 10);
					})(),

					supportTransition = (function() {
						var s = document.createElement('p').style,
							r = 'transition' in s ||
							'WebkitTransition' in s ||
							'MozTransition' in s ||
							'msTransition' in s ||
							'OTransition' in s;
						s = null;
						return r;
					})(),

					// WebUploader实例
					uploader;

				if(!WebUploader.Uploader.support('flash') && WebUploader.browser.ie) {

					// flash 安装了但是版本过低。
					if(flashVersion) {
						(function(container) {
							window['expressinstallcallback'] = function(state) {
								switch(state) {
									case 'Download.Cancelled':
										alert('您取消了更新！')
										break;

									case 'Download.Failed':
										alert('安装失败')
										break;

									default:
										alert('安装已成功，请刷新！');
										break;
								}
								delete window['expressinstallcallback'];
							};

							var swf = 'expressInstall.swf';
							// insert flash object
							var html = '<object type="application/' +
								'x-shockwave-flash" data="' + swf + '" ';

							if(WebUploader.browser.ie) {
								html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
							}

							html += 'width="100%" height="100%" style="outline:0">' +
								'<param name="movie" value="' + swf + '" />' +
								'<param name="wmode" value="transparent" />' +
								'<param name="allowscriptaccess" value="always" />' +
								'</object>';

							container.html(html);

						})($wrap);

						// 压根就没有安转。
					} else {
						$wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
					}

					return;
				} else if(!WebUploader.Uploader.support()) {
					alert('Web Uploader 不支持您的浏览器！');
					return;
				}

				// 实例化
				uploader = WebUploader.create({
					pick: {
						id: '#filePicker-2',
						label: '点击选择图片'
					},
					formData: {
						uid: 123
					},
					dnd: '#dndArea',
					paste: '#uploader',
					swf: 'lib/webuploader/0.1.5/Uploader.swf',
					chunked: false,
					chunkSize: 512 * 1024,
					// 文件上传后端的路径
					server: "<?php echo U('/home/goods/goodsaddpic');?>",
					// runtimeOrder: 'flash',

					accept: {
						title: 'Images',
						extensions: 'gif,jpg,jpeg,bmp,png',
						mimeTypes: 'image/*'
					},

					// 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
					disableGlobalDnd: true,
					fileNumLimit: 300,
					fileSizeLimit: 200 * 1024 * 1024, // 200 M
					fileSingleSizeLimit: 50 * 1024 * 1024 // 50 M
				});
				var str = " ";
				uploader.on('uploadSuccess', function(file, ret) {
						console.log(ret);
						str += ret['pic'] + ",";
						document.getElementById("allpic").value = str;
					})
					// 拖拽时不接受 js, txt 文件。
				uploader.on('dndAccept', function(items) {
					var denied = false,
						len = items.length,
						i = 0,
						// 修改js类型
						unAllowed = 'text/plain;application/javascript ';

					for(; i < len; i++) {
						// 如果在列表里面
						if(~unAllowed.indexOf(items[i].type)) {
							denied = true;
							break;
						}
					}

					return !denied;
				});

				uploader.on('dialogOpen', function() {
					console.log('here');
				});

				// uploader.on('filesQueued', function() {
				//     uploader.sort(function( a, b ) {
				//         if ( a.name < b.name )
				//           return -1;
				//         if ( a.name > b.name )
				//           return 1;
				//         return 0;
				//     });
				// });

				// 添加“添加文件”的按钮，
				uploader.addButton({
					id: '#filePicker2',
					label: '继续添加'
				});

				uploader.on('ready', function() {
					window.uploader = uploader;
				});

				// 当有文件添加进来时执行，负责view的创建
				function addFile(file) {
					var $li = $('<li id="' + file.id + '">' +
							'<p class="title">' + file.name + '</p>' +
							'<p class="imgWrap"></p>' +
							'<p class="progress"><span></span></p>' +
							'</li>'),

						$btns = $('<div class="file-panel">' +
							'<span class="cancel">删除</span>' +
							'<span class="rotateRight">向右旋转</span>' +
							'<span class="rotateLeft">向左旋转</span></div>').appendTo($li),
						$prgress = $li.find('p.progress span'),
						$wrap = $li.find('p.imgWrap'),
						$info = $('<p class="error"></p>'),

						showError = function(code) {
							switch(code) {
								case 'exceed_size':
									text = '文件大小超出';
									break;

								case 'interrupt':
									text = '上传暂停';
									break;

								default:
									text = '上传失败，请重试';
									break;
							}

							$info.text(text).appendTo($li);
						};

					if(file.getStatus() === 'invalid') {
						showError(file.statusText);
					} else {
						// @todo lazyload
						$wrap.text('预览中');
						uploader.makeThumb(file, function(error, src) {
							var img;

							if(error) {
								$wrap.text('不能预览');
								return;
							}

							if(isSupportBase64) {
								img = $('<img src="' + src + '">');
								$wrap.empty().append(img);
							} else {
								$.ajax('lib/webuploader/0.1.5/server/preview.php', {
									method: 'POST',
									data: src,
									dataType: 'json'
								}).done(function(response) {
									if(response.result) {
										img = $('<img src="' + response.result + '">');
										$wrap.empty().append(img);
									} else {
										$wrap.text("预览出错");
									}
								});
							}
						}, thumbnailWidth, thumbnailHeight);

						percentages[file.id] = [file.size, 0];
						file.rotation = 0;
					}

					file.on('statuschange', function(cur, prev) {
						if(prev === 'progress') {
							$prgress.hide().width(0);
						} else if(prev === 'queued') {
							$li.off('mouseenter mouseleave');
							$btns.remove();
						}

						// 成功
						if(cur === 'error' || cur === 'invalid') {
							console.log(file.statusText);
							showError(file.statusText);
							percentages[file.id][1] = 1;
						} else if(cur === 'interrupt') {
							showError('interrupt');
						} else if(cur === 'queued') {
							percentages[file.id][1] = 0;
						} else if(cur === 'progress') {
							$info.remove();
							$prgress.css('display', 'block');
						} else if(cur === 'complete') {
							$li.append('<span class="success"></span>');
						}

						$li.removeClass('state-' + prev).addClass('state-' + cur);
					});

					$li.on('mouseenter', function() {
						$btns.stop().animate({
							height: 30
						});
					});

					$li.on('mouseleave', function() {
						$btns.stop().animate({
							height: 0
						});
					});

					$btns.on('click', 'span', function() {
						var index = $(this).index(),
							deg;

						switch(index) {
							case 0:
								uploader.removeFile(file);
								return;

							case 1:
								file.rotation += 90;
								break;

							case 2:
								file.rotation -= 90;
								break;
						}

						if(supportTransition) {
							deg = 'rotate(' + file.rotation + 'deg)';
							$wrap.css({
								'-webkit-transform': deg,
								'-mos-transform': deg,
								'-o-transform': deg,
								'transform': deg
							});
						} else {
							$wrap.css('filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (~~((file.rotation / 90) % 4 + 4) % 4) + ')');
							// use jquery animate to rotation
							// $({
							//     rotation: rotation
							// }).animate({
							//     rotation: file.rotation
							// }, {
							//     easing: 'linear',
							//     step: function( now ) {
							//         now = now * Math.PI / 180;

							//         var cos = Math.cos( now ),
							//             sin = Math.sin( now );

							//         $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
							//     }
							// });
						}

					});

					$li.appendTo($queue);
				}

				// 负责view的销毁
				function removeFile(file) {
					var $li = $('#' + file.id);

					delete percentages[file.id];
					updateTotalProgress();
					$li.off().find('.file-panel').off().end().remove();
				}

				function updateTotalProgress() {
					var loaded = 0,
						total = 0,
						spans = $progress.children(),
						percent;

					$.each(percentages, function(k, v) {
						total += v[0];
						loaded += v[0] * v[1];
					});

					percent = total ? loaded / total : 0;

					spans.eq(0).text(Math.round(percent * 100) + '%');
					spans.eq(1).css('width', Math.round(percent * 100) + '%');
					updateStatus();
				}

				function updateStatus() {
					var text = '',
						stats;

					if(state === 'ready') {
						text = '选中' + fileCount + '张图片，共' +
							WebUploader.formatSize(fileSize) + '。';
					} else if(state === 'confirm') {
						stats = uploader.getStats();
						if(stats.uploadFailNum) {
							text = '已成功上传' + stats.successNum + '张照片至XX相册，' +
								stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
						}

					} else {
						stats = uploader.getStats();
						text = '共' + fileCount + '张（' +
							WebUploader.formatSize(fileSize) +
							'），已上传' + stats.successNum + '张';

						if(stats.uploadFailNum) {
							text += '，失败' + stats.uploadFailNum + '张';
						}
					}

					$info.html(text);
				}

				function setState(val) {
					var file, stats;

					if(val === state) {
						return;
					}

					$upload.removeClass('state-' + state);
					$upload.addClass('state-' + val);
					state = val;

					switch(state) {
						case 'pedding':
							$placeHolder.removeClass('element-invisible');
							$queue.hide();
							$statusBar.addClass('element-invisible');
							uploader.refresh();
							break;

						case 'ready':
							$placeHolder.addClass('element-invisible');
							$('#filePicker2').removeClass('element-invisible');
							$queue.show();
							$statusBar.removeClass('element-invisible');
							uploader.refresh();
							break;

						case 'uploading':
							$('#filePicker2').addClass('element-invisible');
							$progress.show();
							$upload.text('暂停上传');
							break;

						case 'paused':
							$progress.show();
							$upload.text('继续上传');
							break;

						case 'confirm':
							$progress.hide();
							$('#filePicker2').removeClass('element-invisible');
							$upload.text('开始上传');

							stats = uploader.getStats();
							if(stats.successNum && !stats.uploadFailNum) {
								setState('finish');
								return;
							}
							break;
						case 'finish':
							stats = uploader.getStats();
							if(stats.successNum) {
								alert('上传成功');
							} else {
								// 没有成功的图片，重设
								state = 'done';
								location.reload();
							}
							break;
					}

					updateStatus();
				}

				uploader.onUploadProgress = function(file, percentage) {
					var $li = $('#' + file.id),
						$percent = $li.find('.progress span');

					$percent.css('width', percentage * 100 + '%');
					percentages[file.id][1] = percentage;
					updateTotalProgress();
				};

				uploader.onFileQueued = function(file) {
					fileCount++;
					fileSize += file.size;

					if(fileCount === 1) {
						$placeHolder.addClass('element-invisible');
						$statusBar.show();
					}

					addFile(file);
					setState('ready');
					updateTotalProgress();
				};

				uploader.onFileDequeued = function(file) {
					fileCount--;
					fileSize -= file.size;

					if(!fileCount) {
						setState('pedding');
					}

					removeFile(file);
					updateTotalProgress();

				};

				uploader.on('all', function(type) {
					var stats;
					switch(type) {
						case 'uploadFinished':
							setState('confirm');
							break;

						case 'startUpload':
							setState('uploading');
							break;

						case 'stopUpload':
							setState('paused');
							break;

					}
				});

				uploader.onError = function(code) {
					alert('Eroor: ' + code);
				};

				$upload.on('click', function() {
					if($(this).hasClass('disabled')) {
						return false;
					}

					if(state === 'ready') {
						uploader.upload();
					} else if(state === 'paused') {
						uploader.upload();
					} else if(state === 'uploading') {
						uploader.stop();
					}
				});

				$info.on('click', '.retry', function() {
					uploader.retry();
				});

				$info.on('click', '.ignore', function() {
					alert('todo');
				});

				$upload.addClass('state-' + state);
				updateTotalProgress();
			});

		})(jQuery);
	</script>
	<script type="text/javascript">
		$(function() {
			$('#seller_select').searchableSelect();
		});
		var strid = '';
		(function($) {

			// a case insensitive jQuery :contains selector
			$.expr[":"].searchableSelectContains = $.expr.createPseudo(function(arg) {
				return function(elem) {
					return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
				};
			});

			$.searchableSelect = function(element, options) {
				this.element = element;
				this.options = options || {};
				this.init();

				var _this = this;

				this.searchableElement.click(function(event) {
					// event.stopPropagation();
					_this.show();
				}).on('keydown', function(event) {
					if(event.which === 13 || event.which === 40 || event.which == 38) {
						event.preventDefault();
						_this.show();
					}
				});

				$(document).on('click', null, function(event) {
					if(_this.searchableElement.has($(event.target)).length === 0)
						_this.hide();
				});

				this.input.on('keydown', function(event) {
					event.stopPropagation();
					if(event.which === 13) { //enter
						event.preventDefault();
						_this.selectCurrentHoverItem();
						_this.hide();
					} else if(event.which == 27) { //ese
						_this.hide();
					} else if(event.which == 40) { //down
						_this.hoverNextItem();
					} else if(event.which == 38) { //up
						_this.hoverPreviousItem();
					}
				}).on('keyup', function(event) {
					if(event.which != 13 && event.which != 27 && event.which != 38 && event.which != 40)
						_this.filter();
				})

			}

			var $sS = $.searchableSelect;

			$sS.fn = $sS.prototype = {
				version: '0.0.1'
			};

			$sS.fn.extend = $sS.extend = $.extend;

			$sS.fn.extend({
				init: function() {
					var _this = this;
					this.element.hide();

					this.searchableElement = $('<div tabindex="0" class="searchable-select"></div>');
					this.holder = $('<div class="searchable-select-holder"></div>');
					this.dropdown = $('<div class="searchable-select-dropdown searchable-select-hide"></div>');
					this.input = $('<input type="text" class="searchable-select-input" />');
					this.items = $('<div class="searchable-select-items"></div>');
					this.caret = $('<span class="searchable-select-caret"></span>');

					this.scrollPart = $('<div class="searchable-scroll"></div>');
					this.hasPrivious = $('<div class="searchable-has-privious">...</div>');
					this.hasNext = $('<div class="searchable-has-next">...</div>');

					this.hasNext.on('mouseenter', function() {
						_this.hasNextTimer = null;

						var f = function() {
							var scrollTop = _this.items.scrollTop();
							_this.items.scrollTop(scrollTop + 20);
							_this.hasNextTimer = setTimeout(f, 50);
						}

						f();
					}).on('mouseleave', function(event) {
						clearTimeout(_this.hasNextTimer);
					});

					this.hasPrivious.on('mouseenter', function() {
						_this.hasPriviousTimer = null;

						var f = function() {
							var scrollTop = _this.items.scrollTop();
							_this.items.scrollTop(scrollTop - 20);
							_this.hasPriviousTimer = setTimeout(f, 50);
						}

						f();
					}).on('mouseleave', function(event) {
						clearTimeout(_this.hasPriviousTimer);
					});

					this.dropdown.append(this.input);
					this.dropdown.append(this.scrollPart);

					this.scrollPart.append(this.hasPrivious);
					this.scrollPart.append(this.items);
					this.scrollPart.append(this.hasNext);

					this.searchableElement.append(this.caret);
					this.searchableElement.append(this.holder);
					this.searchableElement.append(this.dropdown);
					this.element.after(this.searchableElement);

					this.buildItems();
					this.setPriviousAndNextVisibility();
				},

				filter: function() {
					var text = this.input.val();
					this.items.find('.searchable-select-item').addClass('searchable-select-hide');
					this.items.find('.searchable-select-item:searchableSelectContains(' + text + ')').removeClass('searchable-select-hide');
					if(this.currentSelectedItem.hasClass('searchable-select-hide') && this.items.find('.searchable-select-item:not(.searchable-select-hide)').length > 0) {
						this.hoverFirstNotHideItem();
					}

					this.setPriviousAndNextVisibility();
				},

				hoverFirstNotHideItem: function() {
					this.hoverItem(this.items.find('.searchable-select-item:not(.searchable-select-hide)').first());
				},

				selectCurrentHoverItem: function() {
					if(!this.currentHoverItem.hasClass('searchable-select-hide'))
						this.selectItem(this.currentHoverItem);
				},

				hoverPreviousItem: function() {
					if(!this.hasCurrentHoverItem())
						this.hoverFirstNotHideItem();
					else {
						var prevItem = this.currentHoverItem.prevAll('.searchable-select-item:not(.searchable-select-hide):first')
						if(prevItem.length > 0)
							this.hoverItem(prevItem);
					}
				},

				hoverNextItem: function() {
					if(!this.hasCurrentHoverItem())
						this.hoverFirstNotHideItem();
					else {
						var nextItem = this.currentHoverItem.nextAll('.searchable-select-item:not(.searchable-select-hide):first')
						if(nextItem.length > 0)
							this.hoverItem(nextItem);
					}
				},

				buildItems: function() {
					var _this = this;
					this.element.find('option').each(function() {
						var item = $('<div class="searchable-select-item" data-value="' + $(this).attr('value') + '">' + $(this).text() + '</div>');

						if(this.selected) {
							_this.selectItem(item);
							_this.hoverItem(item);
						}

						item.on('mouseenter', function() {
							$(this).addClass('hover');
						}).on('mouseleave', function() {
							$(this).removeClass('hover');
						}).click(function(event) {
							event.stopPropagation();
							_this.selectItem($(this));
							_this.hide();
						});

						_this.items.append(item);
					});

					this.items.on('scroll', function() {
						_this.setPriviousAndNextVisibility();
					})
				},
				show: function() {
					this.dropdown.removeClass('searchable-select-hide');
					this.input.focus();
					this.status = 'show';
					this.setPriviousAndNextVisibility();
				},

				hide: function() {
					if(!(this.status === 'show'))
						return;

					if(this.items.find(':not(.searchable-select-hide)').length === 0)
						this.input.val('');
					this.dropdown.addClass('searchable-select-hide');
					this.searchableElement.trigger('focus');
					this.status = 'hide';
				},

				hasCurrentSelectedItem: function() {
					return this.currentSelectedItem && this.currentSelectedItem.length > 0;
				},
				selectItem: function(item) {
					if(this.hasCurrentSelectedItem())
						this.currentSelectedItem.removeClass('selected');

					this.currentSelectedItem = item;
					item.addClass('selected');

					this.hoverItem(item);

					this.holder.text(item.text());
					var value = item.data('value'); //当前选择的门店的value

					// var option = value.split('-');//当前选择的门店的value分割成的数组
					// var obj = option[0];

					// if(option[2]=='store' && option[0] !=0){
					//     console.log(strid);
					//     if(strid.indexOf(obj)>=0){
					//         alert('已经添加过该商家！');
					//     }else{
					//     var html = "<input type='checkbox' name='real_store_list[]' value="+option[0]+" checked='checked'><label>"+option[1]+"</label>";
					//     $('#real_store_list').append(html);
					//     strid = strid + obj + ";";
					//     // console.log(strid);
					//     }
					// }
					// $("#real_store_list input[name='real_store_list[]']:checkbox").change(function(){
					//     if($(this).attr("checked")!=true){
					//          var removeid=$(this).val();
					//          strid = strid.replace(removeid+';','');
					//         $(this).next("label").remove();
					//         $(this).remove();
					//     }
					// });

					this.holder.data('value', value);
					this.element.val(value);
					// alert(value);
					// alert(name);

					if(this.options.afterSelectItem) {
						this.options.afterSelectItem.apply(this);
					}

				},

				hasCurrentHoverItem: function() {
					return this.currentHoverItem && this.currentHoverItem.length > 0;
				},

				hoverItem: function(item) {
					if(this.hasCurrentHoverItem())
						this.currentHoverItem.removeClass('hover');

					if(item.outerHeight() + item.position().top > this.items.height())
						this.items.scrollTop(this.items.scrollTop() + item.outerHeight() + item.position().top - this.items.height());
					else if(item.position().top < 0)
						this.items.scrollTop(this.items.scrollTop() + item.position().top);

					this.currentHoverItem = item;
					item.addClass('hover');
				},

				setPriviousAndNextVisibility: function() {
					if(this.items.scrollTop() === 0) {
						this.hasPrivious.addClass('searchable-select-hide');
						this.scrollPart.removeClass('has-privious');
					} else {
						this.hasPrivious.removeClass('searchable-select-hide');
						this.scrollPart.addClass('has-privious');
					}

					if(this.items.scrollTop() + this.items.innerHeight() >= this.items[0].scrollHeight) {
						this.hasNext.addClass('searchable-select-hide');
						this.scrollPart.removeClass('has-next');
					} else {
						this.hasNext.removeClass('searchable-select-hide');
						this.scrollPart.addClass('has-next');
					}
				}
			});

			$.fn.searchableSelect = function(options) {
				this.each(function() {
					var sS = new $sS($(this), options);
				});

				return this;
			};

		})(jQuery);

		function outputObj(obj) {
			var description = "";
			for(var i in obj) {
				description += i + " = " + obj[i] + "\n";
			}
			alert(description);
		}
	</script>
	<script type="text/javascript">
		function setTreeStyle(obj) {
			var objStyle = obj.children("b");
			var objList = obj.siblings("ul");
			if(objList.length == 1) {
				var style = objStyle.attr("class");
				objStyle.attr("class", "On2Off");
				setTimeout(
					function() {
						if(style == "Off") {
							objList.parent().siblings("li").children("span").children(".On").each(function() {
								setTreeStyle($(this).parent());
							});
							var H = objList.innerHeight()
							objList.css({
								display: "block",
								height: "0"
							});
							objList.animate({
								height: H
							}, 300, function() {
								$(this).css({
									height: "auto"
								});
							});
							objStyle.attr("class", "On");
						} else if(style == "On") {
							objList.find("li").children("span").children(".On").each(function() {
								setTreeStyle($(this).parent());
							});
							var H = objList.innerHeight()
							objList.animate({
								height: 0
							}, 300, function() {
								$(this).css({
									height: "auto",
									display: "none"
								})
							});
							objStyle.attr("class", "Off");
						}
					},
					42
				);
			}
		}
		$("#tree_root").find("li").children("span").click(function() {
			setTreeStyle($(this));
		});
	</script>
</body>

</html>