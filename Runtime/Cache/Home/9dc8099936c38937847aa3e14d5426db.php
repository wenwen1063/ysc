<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>充值中心</title>
		<meta content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta content="black" name="apple-mobile-web-app-status-bar-style">
		<link href="/ysc2/Public/Wx/CSS/CommonCSS/Base.css" rel="stylesheet">
		<link href="/ysc2/Public/Wx/CSS/BusinessCSS/VoucherCenter.css" rel="stylesheet">
		<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/mui.min.js"></script>
		<style>
			.mui-table-view {
				background: #f1f2f6;
			}
			
			.mui-table-view-cell {
				background: #f1f2f6;
			}
			
			.mui-table-view-cell .mui-input-row {
				background: #fff;
				margin-bottom: 15px;
			}
			
			.border_div {
				background: #fff;
				float: left;
			}
			
			.border_div .list {
				width: 33.3333%;
			}
			
			.border_div .list:nth-child(3n+3) {
				border-right: none;
			}
			
			#item2,
			#item3 {
				top: 0; 
			}
			.mui-input-row{
				border-top: 1px solid #f0f0f0;
			}
			.mui-input-row input{
				top: 0;
				height: 50px;
			}
			#segmentedControl .mui-active span {
				padding-bottom: 0;
				display: inline-block;
			}
			
			.liuliangs {
				border-top: 0 !important;
				background: #fff;
				height: auto !important;
				float: left;
			}
			
			.liuliangs .list {
				width: 33.3333%;
			}
			
			.mui-table-view .mui-table-view-cell:active {
				background: transparent;
			}
		</style>
	</head>

	<body>
		<!--<header class="mui-bar mui-bar-nav header">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">充值中心</h1>
		</header>-->
		<div style="height: 45px;background-color:#fff;">
			<div id="segmentedControl" class="mui-segmented-control">
				<a id="obj" class="mui-control-item  mui-active" href="#item2">
					<span>话 费</span>
				</a>
				<a id="liuliang" class="mui-control-item" href="#item3">
					<span>流 量</span>
				</a>
			</div>
		</div>
		<div class="mui-input-row mui-password">
			<input class="mui-input-password" data-input-password="3" type="text" placeholder="请输入电话号码" id="fee_phone">
		</div>
		<div class="" style="padding-bottom:60px;">
			<div id="item2" class="mui-control-content mui-active">
				<ul class="mui-table-view">
					<li class="mui-table-view-cell">
						<div class="border_div">
							<?php if(is_array($fee)): foreach($fee as $key=>$v): ?><div class="list" name="<?php echo ($v['id']); ?>">
									<h5 style="font-size:15px;"><?php echo ($v['name']); ?></h5>
									<p>优惠价: <?php echo ($v['price']); ?>元</p>
								</div><?php endforeach; endif; ?>
						</div>
					</li>
				</ul>
			</div>
			<div id="item3" class="mui-control-content ">
				<ul class="mui-table-view">
					<li class="mui-table-view-cell"> 
						<div class="liuliangs">
							<?php if(is_array($flow)): foreach($flow as $key=>$v): ?><div class="list" name="<?php echo ($v['id']); ?>">
									<h5 style="font-size:15px;"><?php echo ($v['name']); ?></h5>
									<p>优惠价: <?php echo ($v['price']); ?>元</p>
								</div><?php endforeach; endif; ?>
						</div>
						<div class="" style="clear:both;"></div>
						<div class="jiesuans" style="display:none;" id="flow_price_show">
							<div class="jielist">
								<h5><label id="now_price"></label>元 <del><label id="old_price"></label>元</del></h5>
								<p><label id="area"></label>可用,即时生效,当月有效</p>
							</div>
						</div>

					</li>
				</ul>
			</div>
		</div>

		<nav class="mui-bar mui-bar-tab footer">
			<div class="money">
				<div class="jie">
					<span>合计:<p>￥<label id="total_money">0.00</label></p></span>
					<input type="button" value="结算" onclick="buy_now()">
				</div>
			</div>
		</nav>

		<script src="/ysc2/Public/Wx/Script/CommonJS/Base.js"></script>
	</body>

</html>
<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
	$type="<?php echo $type;?>";
	if($type==2){
		$("#obj").removeClass("mui-active");$("#liuliang").addClass("mui-active");
		$("#item2").removeClass("mui-active");$("#item3").addClass("mui-active");
	}
//	var id = ''; //默认进入未选中
	 var click_type='obj';//默认进来是话费
	//选择话费
	$('#item2 .list').click(function() {
		$('#flow_price_show').css('display', 'none');
		//显示效果
		$('#item2 .list').removeClass('bgm');
		$('#item3 .list').removeClass('bgm');
		$(this).addClass('bgm');
		//id
		id = $(this).attr('name');
		$.ajax({
			url: "<?php echo U('/home/feeflow/feeflowinfo');?>",
			type: "post",
			data: {
				"id": id
			},
			dataType: "json",
			success: function(data) {
				$('#total_money').html(data.data.price);
			}
		});
	});

	//选择流量
	$('#item3 .list').click(function() {
		$('#flow_price_show').css('display', 'block');
		//显示效果
		$('#item2 .list').removeClass('bgm');
		$('#item3 .list').removeClass('bgm');
		$(this).addClass('bgm');
		//id
		id = $(this).attr('name');
		$.ajax({
			url: "<?php echo U('/home/feeflow/feeflowinfo');?>",
			type: "post",
			data: {
				"id": id
			},
			dataType: "json",
			success: function(data) {
				$('#total_money').html(data.data.price);
				$('#old_price').html(data.data.old_price);
				$('#now_price').html(data.data.price);
				if(data.data.flow_type == 0) {
					$('#area').html('省内');
				} else {
					$('#area').html('国内');
				}
			}
		});
	});

	//点击结算
	function buy_now() {
		var total_money = Number($('#total_money').html());
		if(total_money == 0 || total_money == '') {
			mui.toast('您还没有选择任何话费或流量！');
			return false;
		}
		//点击的是话费 还是流量
		click_type = $("#segmentedControl a[class='mui-control-item mui-active']").attr("id");
		if(typeof(click_type) == "undefined") {
			click_type = 'obj';
		}
		//根据不同的选择获取不同的手机号码
		if(click_type == 'obj') {
			var phone = $('#fee_phone').val();
		} else {
			var phone = $('#flow_phone').val();
		}
		//校验手机号
		if(phone == '') {
			mui.toast('充值号码不能为空！');
			return false;
		}
		//写入未支付充值数据 成功转到支付
		$.ajax({
			url: "<?php echo U('/home/feeflow/pre_feeflow');?>",
			type: "post",
			data: {
				"id": id,
				"tel": phone
			},
			dataType: "json",
			success: function(data) {
				console.log(data);
				if(data.result == 1 && click_type == 'obj') {
					window.location.href = "/ysc2/wx.php/home/pay/hf_wxpay?total_money=" + data.total_money + "&order_number=" + data.order_number;
				} else if(data.result == 1 && click_type == 'liuliang') {
					window.location.href = "/ysc2/wx.php/home/pay/ll_wxpay?total_money=" + data.total_money + "&order_number=" + data.order_number;
				} else {
					mui.toast(data.msg);
				}
			}
		});

	}
</script>