<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>订单管理</title>
		<meta content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta content="black" name="apple-mobile-web-app-status-bar-style">
		<link href="/ysc2/Public/Wx/CSS/CommonCSS/Base.css" rel="stylesheet">
		<link href="/ysc2/Public/Wx/CSS/BusinessCSS/Myorder/Myorder.css" rel="stylesheet">
		<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/mui.min.js"></script>
		<style>
			.mui-card .mui-control-content {
				padding: 10px;
			}
			
			.mui-control-content {
				height: 290px;
			}
			
			#item1 .list {
				background: #fff;
				width: 100%;
				margin-top: 10px;
				float: left;
			}
			
			.clear_both {
				clear: both;
			}
			
			#item1 .other {
				position: relative;
				padding: 10px;
				width: 100%;
				float: left;
				background: #fff;
				top: 0;
				height: auto;
			}
			
			#item1 {
				background: none;
			}
			
			#item1 .other input {
				margin-right: 0;
			}
			
			#item1 .other input:first-child {
				margin-left: 10px;
			}
			/*.mui-segmented-control .mui-control-item{
				width: 16.66667%;
			}*/
			
			#segmentedControl {
				padding-top: 0;
			}
			
			.mui-segmented-control a {
				background: #006DCC;
			}
			
			.nav_div {
				width: 100%;
				height: 40px;
				line-height: 40px;
				background: #fff;
			}
			
			.nav_div a {
				/* display: inline-block; */
				display: block;
				float: left;
				width: 16.666667%;
				text-align: center;
				font-size: 14px;
				color: #444;
			}
			.content{
				top: 0;
			}
			.nav_div a.active span {
				color: #FE504F;
				display: inline-block;
				line-height: 40px;
				padding: 0 5px;
				border-bottom: 2px solid #FE504F;
			}
		</style>
	</head>

	<body>
		<!--<header class="mui-bar mui-bar-nav header">
			<a class=" mui-icon mui-icon-left-nav mui-pull-left userinfo"></a>
			<h1 class="mui-title">订单管理</h1>
		</header>-->

		<div class="mui-content">
			<div>
				<div id="segmentedControl" class="">
					<div class="nav_div">
						<?php if($type == 10): ?><a class="active status" oid="10"><span>全部</span></a>
							<a class=" status" oid="0"><span>待付款</span> </a>
							<a class=" status" oid="1"><span>待发货</span></a>
							<a class=" status" oid="2"> <span>待收货</span></a>
							<a class=" status" oid="3"><span>待评价</span></a>
							<a class=" status" oid="4"><span>已完成</span></a>
							<?php elseif($type == 0): ?>
							<a class="status" oid="10"><span>全部</span></a>
							<a class="active status" oid="0"> <span>待付款</span></a>
							<a class="status" oid="1"><span>待发货</span></a>
							<a class="status" oid="2"> <span>待收货</span></a>
							<a class="status" oid="3"><span>待评价</span></a>
							<a class="status" oid="4"><span>已完成</span></a>
							<?php elseif($type == 1): ?>
							<a class="status" oid="10"><span>全部</span></a>
							<a class="status" oid="0"> <span>待付款</span></a>
							<a class="active  status" oid="1"><span>待发货</span></a>
							<a class="status" oid="2"> <span>待收货</span></a>
							<a class="status" oid="3"><span>待评价</span></a>
							<a class="status" oid="4"><span>已完成</span></a>
							<?php elseif($type == 2): ?>
							<a class="status" oid="10"><span>全部</span></a>
							<a class=" status" oid="0"> <span>待付款</span></a>
							<a class="status" oid="1"><span>待发货</span></a>
							<a class="status active" oid="2"> <span>待收货</span></a>
							<a class="status" oid="3"><span>待评价</span></a>
							<a class="status" oid="4"><span>已完成</span></a>
							<?php elseif($type == 3): ?>
							<a class="status" oid="10"><span>全部</span></a>
							<a class=" status" oid="0"> <span>待付款</span></a>
							<a class="status" oid="1"><span>待发货</span></a>
							<a class="status" oid="2"> <span>待收货</span></a>
							<a class="status active" oid="3"><span>待评价</span></a>
							<a class="status" oid="4"><span>已完成</span></a>
							<?php elseif($type == 4): ?>
							<a class="status" oid="10"><span>全部</span></a>
							<a class=" status" oid="0"> <span>待付款</span></a>
							<a class="status" oid="1"><span>待发货</span></a>
							<a class="status" oid="2"> <span>待收货</span></a>
							<a class="status" oid="3"><span>待评价</span></a>
							<a class="status active" oid="4"><span>已完成</span></a><?php endif; ?>
					</div>
				</div> 
				
				<div class="content">
					<div id="item1" class="mui-control-content mui-active">
						<?php if(is_array($data)): foreach($data as $k=>$v): ?><div class="list">
								<div class="title">
									<img src="/ysc2/Public/Uploads/<?php echo ($v['0']['logo']); ?>">
									<p class="mui-ellipsis"><span>&nbsp;<?php echo ($v['0']['sname']); ?>>&nbsp;
                    	<!--<p class="mui-ellipsis derdetail" oid="<?php echo ($k); ?>">-->
                    		<span class="derdetail" oid="<?php echo ($v['0']['id']); ?>"><?php echo ($v['0']['order_number']); ?></span>
										<!--</p>-->
										</span>
										<h5>
						<?php if($v[0]['order_status'] == 0): ?>待付款
				        <?php elseif($v[0]['order_status'] == 1): ?>待发货
				        <?php elseif($v[0]['order_status'] == 2): ?>待收货
				        <?php elseif($v[0]['order_status'] == 3): ?>待评价
				        <?php elseif($v[0]['order_status'] == 4): ?>已完成<?php endif; ?>
                    </h5>
									</p>
								</div>

								<div class="commodity">
									<?php if(is_array($v)): foreach($v as $key1=>$g): ?><div class="list">
											<img src="/ysc2/Public/Uploads/<?php echo ($g['sm_pic']); ?>">
											<h5><?php echo ($g["goods_name"]); ?></h5>
											<p>￥<?php echo ($g["shop_price"]); ?> &numsp;&numsp;<span>x<?php echo ($g["goods_number"]); ?></span></p>
										</div><?php endforeach; endif; ?>
								</div>
								<div class="clear_both"></div>
								<div class="other">
									<?php if($v[0]['order_status'] == 0): ?><input class="red payment" type="button" oid="<?php echo ($v[0]['id']); ?>" order_number="<?php echo ($v[0]['order_number']); ?>" order_paid="<?php echo ($v[0]['paid_price']); ?>" value="马上付款" />
										<input type="button" class="quxiao" oid="<?php echo ($v[0]['id']); ?>" value="取消订单" />
										<?php elseif($v[0]['order_status'] == 1): ?>
											<?php if($v[0]['order_from'] == 0): ?><input type="button" class="shouhou" oid="<?php echo ($v[0]['id']); ?>" value="售后" /><?php endif; ?>
										<?php elseif($v[0]['order_status'] == 2): ?>
										<?php if($v[0]['order_from'] == 0): ?><input type="button" class="shouhou" oid="<?php echo ($v[0]['id']); ?>" value="售后" /><?php endif; ?>
										<input class="red suregoods" type="button" oid="<?php echo ($v[0]['id']); ?>" value="确认收货" />
										<?php elseif($v[0]['order_status'] == 3): ?>
										<input class="red evaluate" type="button" oid="<?php echo ($v[0]['id']); ?>" value="马上评价" />
										<?php elseif($v[0]['order_status'] == 4): ?>
										<input type="button" class="cancelorder" oid="<?php echo ($v[0]['id']); ?>" value="删除订单" /><?php endif; ?>

								</div>
							</div><?php endforeach; endif; ?>
					</div>
					<div id="item2" class="mui-control-content">
						<div class="img">
							<img src="/ysc2/Public/Wx/img/My/default_noorder.png" alt="">
							<p>暂无任何订单哦~</p>
						</div>
					</div>
					<div id="item3" class="mui-control-content">
						<div class="img">
							<img src="/ysc2/Public/Wx/img/My/default_noorder.png" alt="">
							<p>暂无任何订单哦~</p>
						</div>
					</div>
					<div id="item4" class="mui-control-content">
						<div class="img">
							<img src="/ysc2/Public/Wx/img/My/default_noorder.png" alt="">
							<p>暂无任何订单哦~</p>
						</div>
					</div>
					<div id="item5" class="mui-control-content">
						<div class="img">
							<img src="/ysc2/Public/Wx/img/My/default_noorder.png" alt="">
							<p>暂无任何订单哦~</p>
						</div>
					</div>
				</div>
			</div>
			<script src="/ysc2/Public/Wx/Script/CommonJS/Base.js"></script>
			<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
			<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/mui.min.js"></script>
			<script>
				$(".userinfo").click(function() {
					mui.openWindow({
						url: "/ysc2/wx.php/home/user/userindex",
						id: 'orderinfo'
					});
				})
				$(".status").click(function() {
					$state = $(this).attr('oid');
									mui.openWindow({
										url: "/ysc2/wx.php/home/user/orderinfo?state=" + $state,
										id: 'orderinfo'
									});
				})

				//详情页
				$(".derdetail").click(function() {
						$id = $(this).attr('oid');
						mui.openWindow({
							url: "/ysc2/wx.php/home/user/orderdetails?order_no=" + $id,
							id: 'orderinfo'
						});
					})
					//支付
				$(".payment").click(function() {
						$id = $(this).attr('oid');
						$order_number = $(this).attr('order_number');
						$paid_price = $(this).attr('order_paid');
						$order_ids = $order_number + $id;
						mui.openWindow({
							url: "/ysc2/wx.php/home/pay/order_wxpay?id=" + $order_ids + "&allmoney=" + $paid_price,
							id: 'orderinfo'
						});
					})
					//确认收货
				$(".suregoods").click(function() {
					$id = $(this).attr('oid');
					var btnArray = ['否', '是'];
					mui.confirm('确定收货', ' ', btnArray, function(e) {
						if(e.index == 1) {
							mui.openWindow({
								url: "/ysc2/wx.php/home/user/suregoods?order_no=" + $id,
								id: 'orderinfo'
							});
						} else {}
					})
				});

				//马上评价
				$(".evaluate").click(function() {
						$id = $(this).attr('oid');
						mui.openWindow({
							url: "/ysc2/wx.php/home/user/evaluate?order_no=" + $id,
							id: 'orderinfo'
						});
					})
					//取消订单
				$(".quxiao").click(function() {
					$id = $(this).attr('oid');
					var btnArray = ['否', '是'];
					mui.confirm('确定取消订单', ' ', btnArray, function(e) {
						if(e.index == 1) {
							mui.openWindow({
								url: "/ysc2/wx.php/home/user/quxiaoorder?order_no=" + $id,
								id: 'orderinfo'
							});
						} else {}
					})
				});
				//删除订单
				$(".cancelorder").click(function() {
					$id = $(this).attr('oid');
					var btnArray = ['否', '是'];
					mui.confirm('确定删除订单', ' ', btnArray, function(e) {
						if(e.index == 1) {
							mui.openWindow({
								url: "/ysc2/wx.php/home/user/cancelorder?order_no=" + $id,
								id: 'orderinfo'
							});
						} else {}
					})
				});
				//售后订单
				$(".shouhou").click(function() {
					$id = $(this).attr('oid');
					var btnArray = ['否', '是'];
					mui.confirm('确定申请售后服务', ' ', btnArray, function(e) {
						if(e.index == 1) {
							$.ajax({
								url: "<?php echo U('/home/user/havecustomer');?>",
								type: "post",
								data: {
									'order_id': $id,
								},
								dataType: "json",
								success: function(data) {
									if(data.result == 1) {
										mui.toast('该订单已申请过售后服务'), setTimeout(function() {
											mui.openWindow({
												url: "/ysc2/wx.php/home/customer/index?state=10",
												id: 'orderinfo'
											});
										}, 1000);
									} else {
										mui.openWindow({
											url: "/ysc2/wx.php/home/customer/customer?order_no=" + $id,
											id: 'orderinfo'
										});
									}
								}
							})
						} else {}
					})
				});
			</script>
	</body>

</html>