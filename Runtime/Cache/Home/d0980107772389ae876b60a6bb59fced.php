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
<script type="text/javascript" src="/ysc2/Public/timejs/laydate.js"></script>
<title>会员管理</title>
</head>

<body>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 会员列表 <span class="c-gray en">&gt;</span> 查看
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回"><i class="Hui-iconfont">&#xe66b;</i></a>
		<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="pd-20">
		<table class="table table-border table-bordered table-bg mt-20">
			<thead>
				<tr>
					<th colspan="2" scope="col">会员详情</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>会员账号</td>
					<td><?php echo ($data['userphone']); ?></td>
				</tr>
				<tr>
					<td>会员余额</td>
					<td>￥<?php echo ($data['balance']); ?></td>
				</tr>
				<tr>
					<td>奖励金额总额</td>
					<td>￥<?php echo ($data['reward']); ?></td>
				</tr>
				<tr>
					<td>可领取奖励金额</td>
					<td>￥<?php echo ($data['reward_receive']); ?></td>
				</tr>
				<tr>
					<td>冻结奖励金额</td>
					<td>￥<?php echo ($data['reward_freeze']); ?></td>
				</tr>
				<tr>
					<td>奖励积分总数</td>
					<td><?php echo ($data['gold']); ?></td>
				</tr>
				<tr>
					<tr>
						<td>可领取奖励积分</td>
						<td><?php echo ($data['gold_receive']); ?></td>
					</tr>
					<tr>
						<tr>
							<td>冻结奖励积分</td>
							<td><?php echo ($data['gold_freeze']); ?></td>
						</tr>
						<tr>
			</tbody>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th scope="col" colspan="15">地址列表</th>
					</tr>
					<tr class="text-c">
						<th width="40">联系人</th>
						<th width="40">联系电话</th>
						<th width="40">所在区域</th>
						<th width="40">详细地址</th>
						<th width="40">默认地址</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($addr)): foreach($addr as $key=>$v): ?><tr class="text-c">
							<td><?php echo ($v['contact']); ?></td>
							<td><?php echo ($v['phone']); ?></td>
							<td><?php echo ($v['province']); echo ($v['city']); echo ($v['district']); ?></td>
							<td><?php echo ($v['address']); ?></td>
							<td>
								<?php if($v['default_address'] == 1): ?>是
									<?php else: ?>否<?php endif; ?>
							</td>
						</tr><?php endforeach; endif; ?>
				</tbody>
			</table>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th scope="col" colspan="15">会员升级记录列表</th>
					</tr>
					<tr class="text-c">
						<th width="40">原始类型</th>
						<th width="40">升级类型</th>
						<th width="40">申请条件</th>
						<th width="40">付款金额</th>
						<th width="40">申请时间</th>
						<th width="40">审核状态</th>
						<th width="40">审核时间</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($upgrade)): foreach($upgrade as $key=>$u): ?><tr class="text-c">
							<td> <?php echo ($u['type_name']); ?></td>
							<td><?php echo ($u['upgrade_type_name']); ?></td>
							<td>
								<?php if($u['condition'] == 1): ?>消费额
									<?php else: ?> 软件使用费<?php endif; ?>
							</td>
							<td><?php echo ($u['payment']); ?></td>
							<td><?php echo (date('Y-m-d H:i:s',$u['time'])); ?></td>

							<?php if($u['state']==0): ?>
							<td class="td-status"><span class="label radius">待审核</span></td>
							<?php elseif($u['state']==1): ?>
							<td class="td-status"><span class="label label-success radius">通过</span></td>
							<?php else: ?>
							<td class="td-status"><span class="label label-success radius">不通过</span></td>
							<?php endif ?>
							<td>
								<?php if($u['auditing_time'] != 0): echo (date('Y-m-d H:i:s',$u['auditing_time'])); ?>
									<?php else: endif; ?>
							</td>
						</tr><?php endforeach; endif; ?>
				</tbody>
			</table>

	</div>
	<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
	<script type="text/javascript" src="/ysc2/Public/admin/lib/laypage/1.2/laypage.js"></script>
	<script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
	<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
	<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
	<script type="text/javascript">
		/*
				  参数解释：
				  title 标题
				  url   请求的url
				  id    需要操作的数据id
				  w   弹出层宽度（缺省调默认值）
				  h   弹出层高度（缺省调默认值）
				*/
		/*用户-查看*/
		function member_show(title, url, id, w, h) {
			layer_show(title, url, w, h);
		}
		/*管理员-编辑*/
		function admin_edit(title, url, id, w, h) {
			layer_show(title, url, w, h);
		}
		//批量删除判断是否选择
		function Check() {
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
			}
		}

		function orderclose() {
			document.forms.main_form.action = "<?php echo U('/home/order/orderclose/del');?>";
			document.forms.main_form.submit();
		}

		function orderpost() {
			document.forms.main_form.action = "<?php echo U('/home/order/orderpost/out');?>";
			document.forms.main_form.submit();
		}
	</script>
	<script type="text/javascript">
		! function() {
			laydate.skin('molv'); //切换皮肤，请查看skins下面皮肤库
			laydate({
				elem: '#demo'
			}); //绑定元素
		}();

		//日期范围限制
		var start = {
			elem: '#start',
			format: 'YYYY-MM-DD',
			min: laydate.now(), //设定最小日期为当前日期
			max: '2099-06-16', //最大日期
			istime: true,
			istoday: false,
			choose: function(datas) {
				end.min = datas; //开始日选好后，重置结束日的最小日期
				end.start = datas //将结束日的初始值设定为开始日
			}
		};

		var end = {
			elem: '#end',
			format: 'YYYY-MM-DD',
			min: laydate.now(),
			max: '2099-06-16',
			istime: true,
			istoday: false,
			choose: function(datas) {
				start.max = datas; //结束日选好后，充值开始日的最大日期
			}
		};
		laydate(start);
		laydate(end);

		//自定义日期格式
		laydate({
			elem: '#test1',
			format: 'YYYY年MM月DD日',
			festival: true, //显示节日
			choose: function(datas) { //选择日期完毕的回调
				alert('得到：' + datas);
			}
		});

		//日期范围限定在昨天到明天
		laydate({
			elem: '#hello3',
			min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
			max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
		});
	</script>
</body>

</html>