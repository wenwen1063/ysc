<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>订单详情</title>
		<meta content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta content="black" name="apple-mobile-web-app-status-bar-style">
		<link href="/ysc2/Public/Wx/CSS/CommonCSS/Base.css" rel="stylesheet">
		<link href="http://dcloud.io/hellomui/css/mui.picker.css" rel="stylesheet" />
		<link href="http://dcloud.io/hellomui/css/mui.poppicker.css" rel="stylesheet" />
		<link href="/ysc2/Public/Wx/CSS/BusinessCSS/ShoppingCart/Orderdetails.css" rel="stylesheet">
	</head>
	<style>
		.titlebtn {
			background: white;
			padding: 15px 10px;
			font-size: 14px;
		}
		
		.titlebtn .title {
			border-bottom: 1px solid #ddd;
			padding-bottom: 5px;
		}
		
		.titlebtn .btn_div {
			padding-top: 10px;
		}
		
		.btn_red {
			border-radius: 3px;
			display: inline-block;
			text-align: center;
			font-size: 14px !important;
			border: 1px solid #ff5353 !important;
			background: #ff5353 !important;
			color: white !important;
			height: 35px;
			padding: 5px 10px !important;
		}
		
		.btn_red_outlined {
			border: 1px solid #ff5353 !important;
			color: #ff5353 !important;
			background: white !important;
		}
		
		.checkimg {
			vertical-align: middle;
			width: 20px;
		}
		
		.margin_10 {
			margin: 10px;
		}
		
		.margin_l_10 {
			margin-left: 10px;
		}
		
		.margin_t_10 {
			margin-top: 10px;
		}
		
		.margin_r_10 {
			margin-right: 10px;
		}
		
		.inputtxt {
			margin-top: 10px;
		}
		
		.redbtn_div {
			margin-left: 10px;
			margin-right: 10px;
			margin-top: 30px;
		}
		
		.selecteddiv i.active {
			background: url(/ysc2/Public/Wx/img/ShoppingCart/btn_check.png) no-repeat;
			background-size: 15px;
		}
		
		.selecteddiv i {
			height: 15px;
			width: 15px;
			display: inline-block;
			background: url(/ysc2/Public/Wx/img/ShoppingCart/btn_checkoff.png) no-repeat;
			background-size: 15px;
			margin-right: 10px;
			position: relative;
			top: 1px;
		}
		
		.color {
			background: #f5f5f5;
		}
		
		.mui-bar-tab .right span {
			float: none;
		}
		
		.zhifu {
			margin-bottom: 60px;
		}
		
		.content .list .name h5 {
			width: 100%;
			float: left;
			margin: 0;
			line-height: 24px;
			overflow: hidden;
			white-space: nowrap;
			/* overflow: hidden; */
			text-overflow: ellipsis;
		}
		
		.content .list .name {
			padding-left: 45px;
		}
		
		.content .list .name .userm {
			position: absolute;
			left: 10px;
		}
		/*优惠券*/
		
		.demo {
			list-style: none;
			width: 100%;
			text-align: left !important;
			padding-left: 1rem;
			padding-right: 1rem;
			margin-top: 0;
		}
		
		.demo li {
			position: relative;
			width: 100%;
			height: 100%;
			margin-bottom: 0.5rem;
			display: inline-block;
			background-color: #FFFFFF;
		}
		
		.demo li:before,
		.demo li:after {
			content: "";
			position: absolute;
			top: -20px;
			display: block;
			width: 10px;
			height: 100%;
			margin-top: 20px;
			background-size: 20px 10px;
		}
		
		.demo li::before {
			left: -10px;
			background-color: #EFEFF4;
			background-position: 100% 35%;
			background-image: linear-gradient(-45deg, #fff 25%, transparent 25%, transparent), linear-gradient(-135deg, #fff 25%, transparent 25%, transparent), linear-gradient(-45deg, transparent 75%, #fff 75%), linear-gradient(-135deg, transparent 75%, #fff 75%);
		}
		
		.demo li:after {
			right: -10px;
			background-color: #FFAB20;
			background-position: 100% 15%;
			background-image: linear-gradient(-45deg, #EFEFF4 25%, transparent 25%, transparent), linear-gradient(-135deg, #EFEFF4 25%, transparent 25%, transparent), linear-gradient(-45deg, transparent 75%, #EFEFF4 75%), linear-gradient(-135deg, transparent 75%, #EFEFF4 75%);
		}
		
		.flex-container {
			display: -webkit-flex;
			display: flex;
			-webkit-flex-direction: row;
			flex-direction: row;
			-webkit-justify-content: space-between;
			justify-content: space-between;
		}
		
		.flex-container .item1 {
			width: 3.5rem;
			height: 3.5rem;
			padding: 0.5rem;
			padding-left: 0.25rem;
			box-sizing: content-box;
		}
		
		.flex-container .item1 img {
			width: 100%;
			height: 100%;
		}
		
		.flex-container .couponname {}
		
		.flex-item.item2 {
			display: -webkit-flex;
			display: flex;
			-webkit-flex-direction: column;
			flex-direction: column;
			-webkit-align-items: flex-start;
			align-items: flex-start;
			-webkit-flex: 1.4;
			flex: 1.4;
			padding-top: 0.5rem;
			padding-bottom: 0.5rem;
			background: url(quan.png) no-repeat;
			background-size: 4rem 4rem;
			background-position: 100% 300%;
			padding-right: 10px;
		}
		
		.flex-item.item2 .validdate {
			margin-top: auto;
			font-size: 0.6rem;
			color: #9D9FA2;
		}
		
		.flex-item.item3 {
			display: -webkit-flex;
			display: flex;
			-webkit-align-items: center;
			align-items: center;
			-webkit-flex-direction: column-reverse;
			flex-direction: column;
			-webkit-flex: 0.9;
			flex: 0.9;
			color: #fff;
			background-color: #FFAB20;
			padding-top: 0.5rem;
			padding-bottom: 0.5rem;
			max-width: 7.5rem;
		}
		
		.flex-item.item3 .money {
			margin-top: auto;
			font-size: 18px;
		}
		
		.flex-item.item3 .condition {
			margin-bottom: auto;
			font-size: 12px;
		}
		
		.demo li.used:after {
			background-color: #C1C3D0;
		}
		
		.flex-item.item4 {
			background-color: #C1C3D0;
		}
		
		.ellipse_1 {
			display: -webkit-box;
			overflow: hidden;
			text-overflow: ellipsis;
			word-wrap: break-word;
			word-break: break-all;
			white-space: normal !important;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
		}
		/*优惠券 结束*/
		
		.pay {
			border: 1px solid red;
		}
	</style>

	<body>
		<div id="dx" style="position: fixed;overflow-y: hidden;width: 100%;height: 100%;text-align: center;background: rgba(0,0,0,0.4);z-index: 99999999999; display: none;margin: 0;padding: 0;">
            <div style="width: 150px;height: 150px;border-radius: 10px;position: relative;top: 37%;display: inline-block;background: rgba(0,0,0,0.6);color: #fff;">
                <img src="/ysc2/Public/Wx/img/loading.gif" style="width: 75px;vertical-align: middle;margin-top: 25px;" />
                <span style="display: block;text-align: center;margin-top: 10px;">正在提交</span>
            </div>
        </div>
		<div id="all">
			<!--<header class="mui-bar mui-bar-nav header">
				<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
				<h1 class="mui-title">订单详情</h1>
			</header>-->
			<input type="hidden" name="ordertype" id="ordertype" value="<?php echo ($type); ?>" />
			<!--地址显示-->
			<div class="address">
				<!--oneress被css隐藏了-->
				<?php if($address==''||$address==null):?>
				<div class="oneress">
					<input type="hidden" name="address_id" id="address_id" value="<?php echo $moadd['id']; ?>" />
					<p>暂无收货地址</p>
					<input type="button" id="addaddress" value="添加">
				</div>
				<?php else: ?>
				<div class="ress">
					<input type="hidden" name="address_id" id="address_id" value="<?php echo $moadd['id']; ?>" />
					<h5 id="moname"><?php echo $moadd['contact']; ?>&numsp;&numsp;&numsp;&numsp;<?php echo $moadd['phone']; ?></h5>
					<p id="moinfo">
						<?php echo $moadd['province']; ?>
						<?php echo $moadd['city']; ?>
						<?php echo $moadd['district']; ?>
						<?php echo $moadd['address']; ?>
					</p>
					<input type="button" id="changeaddress" value="更换地址">
				</div>
				<?php endif ?>
			</div>
			<div class="border">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
				<img src="/ysc2/Public/Wx/img/My/my_gpdc_line_bar.png" alt="">
				<img class="blue" src="/ysc2/Public/Wx/img/My/my_address_blue_line.png" alt="">
			</div>
			<!--商品-->

			<?php if(is_array($goods_info)): foreach($goods_info as $key=>$g): ?><div class="goodsinfo">
					<div class="content">
						<div class="list">
							<div class="name">
								<img class="userm" src="/ysc2/Public/Uploads/<?php echo ($g['logo']); ?>" alt="">
								<h5><?php echo ($g['goods_name']); ?>&numsp;</h5>
							</div>
							<div class="commodity">
								<?php if(is_array($g["shop"])): foreach($g["shop"] as $key=>$s): ?><div class="list">
										<img class="userm" src="/ysc2/Public/Uploads/<?php echo ($s['sm_pic']); ?>" alt="">
										<input type="hidden" class="car_id" value="<?php echo ($s['id']); ?>" />
										<input type="hidden" class="goods_id" value="<?php echo ($s['goods_id']); ?>" />
										<input type="hidden" class="goods_attribute_id" value="<?php echo ($s['goods_attribute_id']); ?>" />
										<div class="title">
											<h5><?php echo ($s['gname']); ?></h5>
											<input type="hidden" name="weight" id="weight" value="<?php echo ($s['weight']); ?>" />
											<p>￥<span class="shopmoney"><?php echo ($s['shop_price']); ?></span>&numsp;<span>x<span class="shopnum"><?php echo ($s['goods_number']); ?></span></span>
											</p>
										</div>
									</div><?php endforeach; endif; ?>
							</div>

						</div>
					</div>
					<div class="feiyong" style="margin-bottom: 10px;">
						<div class="title">
							<span>费用详情</span>
						</div>
						<ul class="feedetails mui-table-view">
							<li class="mui-table-view-cell">
								<div class="mui-navigate-right">物流配送
									<div class="mui-pull-right padded_r_20"><span>包邮</span></div>
									<!--<select  class="mui-pull-right padded_r_20 conselect">
									<?php if(is_array($g["seller"])): foreach($g["seller"] as $key=>$l): ?><option value="<?php echo ($l["alllom"]); ?>" uid="<?php echo ($l["id"]); ?>"> <span class=""><?php echo ($l["name"]); ?><span style="margin-left: 5px;"><?php echo ($l["alllom"]); ?></span>元</span></option><?php endforeach; endif; ?>
								</select>-->
									<!--<?php if(is_array($g["seller"])): foreach($g["seller"] as $key=>$l): ?><div class="mui-pull-right padded_r_20"><?php echo ($l["name"]); ?><span style="margin-left: 5px;"><?php echo ($l["alllom"]); ?></span>元</div><?php endforeach; endif; ?>-->
								</div>
							</li>
							<!--<li id="showUserPicker" class="mui-table-view-cell">
							<div class="mui-navigate-right">优惠方案
								<div class="userResult mui-pull-right padded_r_20">-￥5</div>
							</div>
						</li>-->
							<li class="mui-table-view-cell">
								<div class="mui-navigate-right selectcou" conid="<?php echo ($g['seller_id']); ?>" id="<?php echo ($g['seller_id']); ?>">选择优惠券
									<input type="hidden" name="hidecon" class="hidecon" value="" />
									<div class="mui-pull-right padded_r_20"><span style="margin-left: 5px;" class="conmoney"></span><span class="yuan">暂无选择优惠券</span></div>
								</div>
							</li>
							<?php if($g['id'] != ''): ?><li id="showUserPicker " class="mui-table-view-cell">

									<div class="mui-navigate-right selectfa" conid="<?php echo ($g['seller_id']); ?>" id="f<?php echo ($g['seller_id']); ?>" allid="<?php echo ($g['id']); ?>">发票
										<!--发票商品id-->
										<input type="hidden" class="allid" value="" />
										<!--发票类型-->
										<input type="hidden" class="invoice_type" value="" />
										<!--发票内容-->
										<input type="hidden" class="invoice_content" value="" />
										<!--个人或单位-->
										<input type="hidden" class="invoice_content_sel" value="" />
										<!--发票抬头-->
										<input type="hidden" class="invoice_title" value="" />
										<div class="userResult mui-pull-right padded_r_20 showfapiao">暂无选择发票</div>
									</div>
								</li><?php endif; ?>
							<li class="mui-table-view-cell">
								商品小计

								<div class="mui-pull-right sellermoney" style="padding-right: 5px;color: red;">￥
									<span class="sellmoney">5263</span>
									<input type="hidden" class="nomoney" value="" />
								</div>
							</li>
						</ul>
					</div>
				</div><?php endforeach; endif; ?>
			<div id="">
				<input type="text" name="remark" id="remark" value="" placeholder="备注" />
			</div>
			<div class="zhifu">
				<div class="title">
					<span>支付方式</span>
				</div>
				<div class="list">
					<img class="panyselect pay" ptype="1" src="/ysc2/Public/Wx/img/ShoppingCart/yue.png" alt="">
				</div>
				<div class="list">
					<img class="panyselect" ptype="2" src="/ysc2/Public/Wx/img/ShoppingCart/shoppingcart_btn_wechat_normal.png" alt="">
				</div>

			</div>

			<nav class="mui-bar mui-bar-tab">
				<div class="right">
					<a>￥ <span id="allsellmoney">0.00</span></a>
					<input type="button" id="suborder" value="提交订单">
				</div>
			</nav>
		</div>
		<!--优惠券-->
		<div id="hidecou" style="z-index: 2000;display: none;">
			<header class="mui-bar mui-bar-nav header">
				<a class="mui-icon mui-icon-left-nav mui-pull-left" style="opacity: .3;" id="hidecoua"></a>
				<h1 class="mui-title">优惠券选择</h1>
			</header>
			<p class="margin_10"><span class="margin_r_10" style="color: red;">*</span>一个订单只可使用一张，不可叠加使用</p>
			<input type="hidden" name="aid" id="aid" value="11" />
			<ul class="demo" id="coninfo">
				<script id="tpl" type="text/template">
					{{each data as v i}} {{if v.use_condition
					< v.allmoney}} <li class="used coupondiv" onclick="consure({{v.cu_id}},{{v.money}},{{v.aid}})">
						<div class="flex-container">
							<div class="item1">
								<img src="/ysc2/Public/Wx/img/Common/coupon_icon.png" alt="">
							</div>
							<div class="flex-item item2">
								<div class="couponname ellipse_1">{{v.name}}</div>
								<div class="validdate">有效期至:<span>{{v.end_time}}</span></div>
							</div>
							<div class="flex-item item3 ">
								<div class="money">￥{{v.money}}</div>
								<div class="condition">满{{v.use_condition}}元</div>
							</div>
						</div>
						</li>
						{{else}}
						<li>
							<div class="flex-container">
								<div class="item1">
									<img src="/ysc2/Public/Wx/img/Common/coupon_icon.png" alt="">
								</div>
								<div class="flex-item item2">
									<div class="couponname ellipse_1">{{v.name}}</div>
									<div class="validdate">有效期至:<span>{{v.end_time}}</span></div>
								</div>
								<div class="flex-item item3 item4">
									<div class="money">￥{{v.money}}</div>
									<div class="condition">满{{v.use_condition}}元</div>
								</div>
							</div>
						</li>
						{{/if}} {{/each}}
				</script>
			</ul>
			<!--<div id="coninfo">
				<script id="tpl" type="text/template">
					{{each data as v i}} {{if v.use_condition > v.allmoney}}
					<div class="coupondiv" style="margin-left: 0.25rem;margin-right: 0.25rem;">
						<div class="flex-container" style="background: #f1f2f5;">
							<div class="item1">
								<img src="/ysc2/Public/Wx/img/Common/coupon_icon.png" alt="">
							</div>
							<div class="flex-item item2">
								<h4>{{v.name}}</h4>
								<div class="validdate"><small>有效期至:<span>{{v.end_time}}</span></small></div>
							</div>
							<div class="flex-item item3">
								<h4>￥{{v.money}}</h4>
								<p><small>满{{v.use_condition}}元使用</small></p>
							</div>
						</div>
					</div>
					{{else}}
					<div class="coupondiv" style="margin-left: 0.25rem;margin-right: 0.25rem;" onclick="consure({{v.cu_id}},{{v.money}},{{v.aid}})">
						<div class="flex-container">
							<div class="item1">
								<img src="/ysc2/Public/Wx/img/Common/coupon_icon.png" alt="">
							</div>
							<div class="flex-item item2">
								<h4>{{v.name}}</h4>
								<div class="validdate"><small>有效期至:<span>{{v.end_time}}</span></small></div>
							</div>
							<div class="flex-item item3">
								<h4>￥{{v.money}}</h4>
								<p><small>满{{v.use_condition}}元使用</small></p>
							</div>
						</div>
					</div>
					{{/if}} {{/each}}
				</script>
			</div>-->
		</div>

		<!--发票-->
		<div id="hidafa" style="z-index: 3000;display: none;">
			<header class="mui-bar mui-bar-nav header">
				<a class=" mui-icon mui-icon-left-nav mui-pull-left" style="opacity: .3;" id="hideadda"></a>
				<h1 class="mui-title">发票选择</h1>
			</header>

			<div class="titlebtn">
				<div class="title">发票商品</div>
				<div class="btn_div" id="goodsinfos">
					<script id="tpl1" type="text/template">
						{{each data as go i}}
						<span class="btn_red btn_red_outlined" id="{{go.id}}" onclick="selectgoods(this)">{{go.goods_name}}</span> {{/each}}
					</script>
				</div>
			</div>
			<div class="titlebtn">
				<div class="title">发票类型</div>
				<div class="btn_div">
					<span class="btn_red btn_red_outlined">纸质发票</span>
				</div>
			</div>
			<div class="titlebtn margin_t_10">
				<div class="title">发票抬头</div>
				<div class="btn_div">
					<label>
						<input class="checkimg" type="radio" name="fapiao" id="" value="1" />
			     		<!--<img class="checkimg" src="/ysc2/Public/Wx/img/My/my_icon_check_red.png" alt="" />-->
			     		个人
			     	</label>
					<label class="margin_l_10">
						<input class="checkimg" type="radio" name="fapiao" id="" value="2" />
			     		<!--<img class="checkimg" src="/ysc2/Public/Wx/img/My/my_icon_checkoff.png" alt="" />-->
			     		单位
			     	</label>
				</div>
				<input class="inputtxt" type="text" placeholder="请填写个人姓名/单位名称" />
			</div>
			<div class="titlebtn margin_t_10">
				<div class="title">发票内容</div>
				<div class="btn_div">
					<input class="checkimg" type="radio" name="fapiaon" id="" value="1" />
					<!--<img class="checkimg" src="/ysc2/Public/Wx/img/My/my_icon_check_red.png" alt="" />-->
					电脑配件
				</div>
				<div class="btn_div">
					<input class="checkimg" type="radio" name="fapiaon" id="" value="2" />
					<!--<img class="checkimg" src="/ysc2/Public/Wx/img/My/my_icon_checkoff.png" alt="" />-->
					办公用品(附购物清单)
				</div>
				<div class="btn_div">
					<input class="checkimg" type="radio" name="fapiaon" id="" value="3" />
					<!--<img class="checkimg" src="/ysc2/Public/Wx/img/My/my_icon_checkoff.png" alt="" />-->
					耗材
				</div>
				<div class="btn_div">
					<input class="checkimg" type="radio" name="fapiaon" id="" value="4" />
					<!--<img class="checkimg" src="/ysc2/Public/Wx/img/My/my_icon_checkoff.png" alt="" />-->
					明细
				</div>
			</div>
			<div class="redbtn_div">
				<input type="hidden" id="hidefacon" value="" />
				<span class="btn_red fapiaosure" style="width: 100%;">确 定</span>
			</div>
		</div>
		<!--地址-->
		<div id="hideadd" style="z-index: 1000;display: none;">
			<header class="mui-bar mui-bar-nav header">
				<a class=" mui-icon mui-icon-left-nav mui-pull-left" style="opacity: .3;" id="hideadda"></a>
				<h1 class="mui-title">地址选择</h1>
			</header>
			<div>
				<ul class="mui-table-view mui-table-view-striped mui-table-view-condensed">
					<?php if(is_array($address)): foreach($address as $key=>$vo): ?><li class="mui-table-view-cell">
							<div class="mui-table">
								<div class="mui-table-cell mui-col-xs-10">
									<h4 class="mui-ellipsis addname"><?php echo ($vo['contact']); ?> &numsp;&numsp;&numsp;&numsp;<?php echo ($vo['phone']); ?></h4>
									<p class="mui-h6 mui-ellipsis addinfo"><?php echo ($vo['province']); echo ($vo['city']); echo ($vo['district']); echo ($vo['address']); ?></p>
								</div>
								<div class="mui-text-right selecteddiv">
									<i class="" id="<?php echo ($vo['id']); ?>"></i>
								</div>
							</div>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<nav class="mui-bar mui-bar-tab">
				<div class="right">
					<input type="button" id="addsure" value="确&numsp;定">
				</div>
			</nav>
		</div>

		<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/jquery-2.1.1.min.js"></script>
		<script src="/ysc2/Public/Wx/Script/ActiveXJS/mui.min.js"></script>
		<script src="/ysc2/Public/Wx/Script/ActiveXJS/mui.picker.js"></script>
		<script src="/ysc2/Public/Wx/Script/ActiveXJS/mui.poppicker.js"></script>
		<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/template.js"></script>
		<!--页面开始-->
		<script type="text/javascript">
			$(function() {
				shuanmoney();
			})

			$balance = "<?php echo $user_info['balance']?>";
			$(".panyselect").click(function() {
					$(".panyselect").removeClass("pay");
					$(this).addClass('pay');
				})
				//	改变用费
				//					$(".conselect").change(function(){
				//						shuanmoney();
				//					})
				//	算小计和全部金额
			function shuanmoney() {
				$allsellmoney = 0
				$(".sellermoney").each(function() {
					$allmoney = 0;
					$allnum = 0;
					$(this).parents('.goodsinfo').find(".commodity .list").each(function() {
						$money = Number($(this).find(".shopmoney").html()) * Number($(this).find(".shopnum").html());
						$allmoney += $money;
					})
					$(this).find(".nomoney").val($allmoney);
					//		   邮费 
					//		   $youmoney=$(this).parents('.goodsinfo').find(".conselect").val();
					//		   优惠券
					$couponmoney = $(this).parents('.goodsinfo').find(".conmoney").html();
					if($couponmoney == '') {
						$couponmoney = 0;
					}
					$sellmoney = Number($allmoney) - Number($couponmoney);
					$(this).find(".sellmoney").text($sellmoney.toFixed(2));
					$allsellmoney += $sellmoney;
				})
				$("#allsellmoney").text($allsellmoney.toFixed(2));
			}
			$("#suborder").click(function() {
				$('#dx').show();
				$type = $("#ordertype").val();
				$ptype = $(".pay").attr("ptype");
				if($ptype == 1) {
					$allmoney = $("#allsellmoney").html();
					if(parseFloat($balance) > parseFloat($allmoney)) {
						if($type == 2) {
							$json = new Array();
							$(".goodsinfo").each(function() {
									$lid = '';
									//       	优惠券
									$con = $(this).find(".hidecon").val();
									//发票
									$invoice_content_sel = $(this).find('.invoice_content_sel').val();
									$invoice_content = $(this).find('.invoice_content').val();
									$invoice_title = $(this).find(".invoice_title").val();
									$allid = $(".goodsinfo").find(".allid").val();
									$seller_id = $(this).find(".selectcou").attr('conid');

									$(this).find(".commodity .list").each(function() {
										$id = $(this).find(".car_id").val();
										$lid += $id + ",";
									})
									$nomoney = $(this).find(".nomoney").val();
									$sellmoney = $(this).find(".sellmoney").html();

									$arr = {
										"id": $lid,
										"con": $con,
										"invoice_content_sel": $invoice_content_sel,
										"invoice_content": $invoice_content,
										"invoice_title": $invoice_title,
										"nomoney": $nomoney,
										'allid': $allid,
										'seller_id': $seller_id
									}
									$json.push($arr);
								})
								//		地址id
							$address_id = $("#address_id").val();
							if($address_id == '') {
								mui.toast('收货地址不能为空');
								return false;

							}

							$total_price = $("#allsellmoney").html();
							$remark = $("#remark").val();
							console.log($json);
							$.ajax({
								url: "<?php echo U('/home/order/addorder');?>",
								type: "post",
								data: {
									'goods_info': $json,
									'type': $type,
									'remark': $remark,
									'address': $address_id,
									'total_price': $total_price,
									'ptype': 1,
								},
								dataType: "json",
								success: function(data1) {
//									console.log(data);
//																alert(JSON.stringify(data));
									setTimeout(function(){
										if(data1['ptype'] == 1) {
										mui.openWindow({
											url: "/ysc2/wx.php/home/order/orderpay?id=" + data1['order_ids'] + "&allmoney=" + data1['allmoney'],
											id: 'orderinfo'
										});
									} else {
										mui.openWindow({
											url: "/ysc2/wx.php/home/pay/order_wxpay?id=" + data1['order_ids'] + "&allmoney=" + data1['allmoney'],
											id: 'orderinfo'
										});
									}
									},1000)
								}
							})
						} else {
							//		数量
							$num = $(".goodsinfo").find(".shopnum").html();
							//id
							$id = $(".goodsinfo").find(".goods_id").val();
							//规格id
							$goods_attribute_id = $(".goodsinfo").find(".goods_attribute_id").val();
							//优惠券
							$con = $(".goodsinfo").find(".hidecon").val();
							//邮费       
							//      $conselect=$(".goodsinfo").find(".conselect").val();
							//      $conselect_id=$(".goodsinfo").find(".conselect option:selected").attr('uid');
							//      if($conselect_id==''){
							//			mui.toast('改商品不能没有物流配送');
							//			return false;
							//		}
							//发票
							$invoice_content_sel = $(".goodsinfo").find('.invoice_content_sel').val();
							$invoice_content = $(".goodsinfo").find('.invoice_content').val();
							$invoice_title = $(".goodsinfo").find(".invoice_title").val();
							$allid = $(".goodsinfo").find(".allid").val();
							//		备注
							$remark = $("#remark").val();
							//		总价钱
							$total_price = $("#allsellmoney").html();
							//		地址id
							$address_id = $("#address_id").val();
							if($address_id == '') {
								mui.toast('收货地址不能为空');
								return false;
							}
							$remark = $("#remark").val();
							//		商家id
							$seller_id = $(".goodsinfo").find(".selectcou").attr('conid');

							$.ajax({
								url: "<?php echo U('/home/order/addorder');?>",
								type: "post",
								data: {
									'num': $num,
									'id': $id,
									'allid': $allid,
									'goods_attribute_id': $goods_attribute_id,
									'con': $con,
									'invoice_content_sel': $invoice_content_sel,
									'invoice_content': $invoice_content,
									'invoice_title': $invoice_title,
									'type': $type,
									'remark': $remark,
									'total_price': $total_price,
									'address': $address_id,
									'seller_id': $seller_id,
									'ptype': 1,
								},
								dataType: "json",
								success: function(data2) {
									console.log(data2);
//																alert(JSON.stringify(data));
									setTimeout(function(){
										if(data2['ptype'] == 1) {
										mui.openWindow({
											url: "/ysc2/wx.php/home/order/orderpay?id=" + data2['order_ids'] + "&allmoney=" + data2['allmoney'],
											id: 'orderinfo'
										});
									} else {
										mui.openWindow({
											url: "/ysc2/wx.php/home/pay/order_wxpay?id=" + data2['order_ids'] + "&allmoney=" + data2['allmoney'],
											id: 'orderinfo'
										});
									}
									},1000)
									
								}
							})
						}
					} else {
						mui.toast("余额不足");
					}

				} else {
					if($type == 2) {
						$json = new Array();
						$(".goodsinfo").each(function() {
								$lid = '';
								//       	优惠券
								$con = $(this).find(".hidecon").val();
								//邮费
								//       	$conselect=$(this).find(".conselect").val();
								//       	邮费类型
								//       	$conselect_id=$(this).find(".conselect option:selected").attr('uid'); 
								//       	if($conselect_id==''){
								//			mui.toast('改商品不能没有物流配送');
								//			return false;
								//		}

								//发票
								$invoice_content_sel = $(this).find('.invoice_content_sel').val();
								$invoice_content = $(this).find('.invoice_content').val();
								$invoice_title = $(this).find(".invoice_title").val();
								$allid = $(".goodsinfo").find(".allid").val();
								$seller_id = $(this).find(".selectcou").attr('conid');

								$(this).find(".commodity .list").each(function() {
									$id = $(this).find(".car_id").val();
									$lid += $id + ",";
								})
								$nomoney = $(this).find(".nomoney").val();
								$sellmoney = $(this).find(".sellmoney").html();

								$arr = {
									"id": $lid,
									"con": $con,
									"invoice_content_sel": $invoice_content_sel,
									"invoice_content": $invoice_content,
									"invoice_title": $invoice_title,
									"nomoney": $nomoney,
									'allid': $allid,
									'seller_id': $seller_id
								}
								$json.push($arr);
							})
							//		地址id
						$address_id = $("#address_id").val();
						if($address_id == '') {
							mui.toast('收货地址不能为空');
							return false;

						}
						$total_price = $("#allsellmoney").html();
						$remark = $("#remark").val();
						console.log($json);
						$.ajax({
							url: "<?php echo U('/home/order/addorder');?>",
							type: "post",
							data: {
								'goods_info': $json,
								'type': $type,
								'remark': $remark,
								'address': $address_id,
								'total_price': $total_price,
								'ptype': 2
							},
							dataType: "json",
							success: function(data3) {
								console.log(data3);
								setTimeout(function(){
										if(data3['ptype'] == 1) {
										mui.openWindow({
											url: "/ysc2/wx.php/home/order/orderpay?id=" + data3['order_ids'] + "&allmoney=" + data3['allmoney'],
											id: 'orderinfo'
										});
									} else {
										mui.openWindow({
											url: "/ysc2/wx.php/home/pay/order_wxpay?id=" + data3['order_ids'] + "&allmoney=" + data3['allmoney'],
											id: 'orderinfo'
										});
									}
									},1000)
							}
						})
					} else {
						//		数量
						$num = $(".goodsinfo").find(".shopnum").html();
						//id
						$id = $(".goodsinfo").find(".goods_id").val();
						//规格id
						$goods_attribute_id = $(".goodsinfo").find(".goods_attribute_id").val();
						//优惠券
						$con = $(".goodsinfo").find(".hidecon").val();
						//邮费       
						//      $conselect=$(".goodsinfo").find(".conselect").val();
						//      $conselect_id=$(".goodsinfo").find(".conselect option:selected").attr('uid');
						//      if($conselect_id==''){
						//			mui.toast('改商品不能没有物流配送');
						//			return false;
						//		}
						//发票
						$invoice_content_sel = $(".goodsinfo").find('.invoice_content_sel').val();
						$invoice_content = $(".goodsinfo").find('.invoice_content').val();
						$invoice_title = $(".goodsinfo").find(".invoice_title").val();
						$allid = $(".goodsinfo").find(".allid").val();
						//		备注
						$remark = $("#remark").val();
						//		总价钱
						$total_price = $("#allsellmoney").html();
						//		地址id
						$address_id = $("#address_id").val();
						if($address_id == '') {
							mui.toast('收货地址不能为空');
							return false;
						}
						$remark = $("#remark").val();
						//		商家id
						$seller_id = $(".goodsinfo").find(".selectcou").attr('conid');

						$.ajax({
							url: "<?php echo U('/home/order/addorder');?>",
							type: "post",
							data: {
								'num': $num,
								'id': $id,
								'allid': $allid,
								'goods_attribute_id': $goods_attribute_id,
								'con': $con,
								//				'conselect': $conselect,
								//				'conselect_id':$conselect_id,
								'invoice_content_sel': $invoice_content_sel,
								'invoice_content': $invoice_content,
								'invoice_title': $invoice_title,
								'type': $type,
								'remark': $remark,
								'total_price': $total_price,
								'address': $address_id,
								'seller_id': $seller_id,
								'ptype': 2
							},
							dataType: "json",
							success: function(data4) {
								console.log(data4);
								setTimeout(function(){
										if(data4['ptype'] == 1) {
										mui.openWindow({
											url: "/ysc2/wx.php/home/order/orderpay?id=" + data4['order_ids'] + "&allmoney=" + data4['allmoney'],
											id: 'orderinfo'
										});
									} else {
										mui.openWindow({
											url: "/ysc2/wx.php/home/pay/order_wxpay?id=" + data4['order_ids'] + "&allmoney=" + data4['allmoney'],
											id: 'orderinfo'
										});
									}
									},1000)
							}
						})
					}

				}

			})
			



			//二维数组转字符串
			function getString(objarr) {　　
				var typeNO = objarr.length;　
				var tree = "[";　　
				for(var i = 0; i < typeNO; i++) {
					tree += "{";
					tree += objarr[i].join(",");　　　
					tree += "}";　　　
					if(i < typeNO - 1) {　　　　
						tree += ",";　　　
					}　
				}　
				tree += "]";　
				return tree;
			};
		</script>
		<!--优惠券-->
		<script type="text/javascript">
			$(".selectcou").click(function() {
				console.log($(this));
				$id = $(this).attr('conid');
				$allmoney = 0;
				$allnum = 0;
				$(this).parents('.goodsinfo').find(".commodity .list").each(function() {
					$money = Number($(this).find(".shopmoney").html()) * Number($(this).find(".shopnum").html());
					$allmoney += $money;
				})
				$("#all").hide();
				$("#hidecou").show();
				couponinfo($id, $allmoney, $(this));

			})

			function consure(con_id, money, aid) {
				$c = "#" + aid;
				$($c).find('.conmoney').html(money);
				$($c).find('.yuan').html('元');
				$($c).find(".hidecon").val(con_id);
				shuanmoney();
				$("#all").show();
				$("#hidecou").hide();
			}

			$('#hidecoua').click(function() {
				$("#all").show();
				$("#hidecou").hide();
			})

			function couponinfo(id, money) {
				$.ajax({
					url: "<?php echo U('/home/Order/getconinfo');?>",
					type: "post",
					data: {
						'seller_id': id,
					},
					dataType: "json",
					success: function(data) {
						console.log(data);
						for(var i = 0; i < data.data.length; i++) {
							data.data[i].allmoney = money;
							data.data[i].aid = id;
						}

						var html = template('tpl', data);
						//			console.log(html);
						$("#coninfo").html(html);
						console.log($("#aid").val());
					}
				})
			}
		</script>
		<!--发票-->
		<script type="text/javascript">
			$(".selectfa").click(function() {
				$("#all").hide();
				$("#hidafa").show();
				$id = $(this).attr('conid');
				$allid = $(this).attr('allid');
				$.ajax({
					url: "<?php echo U('/home/Order/goodsinfo');?>",
					type: "post",
					data: {
						'id': $allid,
					},
					dataType: "json",
					success: function(data) {
						console.log(data);
						var html = template('tpl1', data);
						console.log(html);
						$("#goodsinfos").html(html);
					}
				})

				$("#hidefacon").val($id);
			})

			function selectgoods(obj) {
				//	console.log(obj);
				$ys = $(obj).hasClass('btn_red_outlined');
				if($ys) {
					$(obj).removeClass('btn_red_outlined');
				} else {
					$(obj).addClass('btn_red_outlined');
				}
			}
			$(".fapiaosure").click(function() {
				$("#all").show();
				$("#hidafa").hide();
				$con_id = $(this).parent('.redbtn_div').find("#hidefacon").val();

				$c = "#f" + $con_id;
				$invoice_content_sel = $('#hidafa input[name="fapiao"]:checked ').val();
				$invoice_content = $('#hidafa input[name="fapiaon"]:checked ').val();
				$invoice_title = $(" #hidafa .inputtxt").val();
				$allid = '';
				$("#goodsinfos").find(".btn_red_outlined").each(function() {
					$id = $(this).attr('id');
					$allid += $id + ",";
				})
				$($c).find('.invoice_content_sel').val($invoice_content_sel);
				$($c).find('.invoice_content').val($invoice_content);
				$($c).find(".invoice_title").val($invoice_title);
				$($c).find(".allid").val($allid);
				if($allid != '') {
					if($invoice_content_sel == 1) {
						$($c).find(".showfapiao").html("个人");
					} else {
						$($c).find(".showfapiao").html("单位");
					}
				}
				$("#all").show();
				$("#hidafa").hide();
			})
		</script>
		<!--地址-->
		<script>
			$('#changeaddress').click(function() {
				$("#all").hide();
				$("#hideadd").show();
			})

			$('#hideadda').click(function() {
				$("#all").show();
				$("#hideadd").hide();
			})

			$('#addaddress').click(function() {
				mui.openWindow({
					url: "/ysc2/wx.php/home/address/addrindex",
					id: 'addaddress'
				});
			})

			$(".mui-table-view .mui-table-view-cell").click(function() {
				$(".mui-table-view .mui-table-view-cell").removeClass('color');
				$(".mui-table-view .mui-table-view-cell i").removeClass('active');
				$(this).addClass('color');
				$(this).find("i").addClass('active');
				$c = $(this).find("i").attr('id');
			})
			$("#addsure").click(function() {
				$("#hideadd").hide();
				$('#all').show();
				$c = $(".active").attr('id');
				$("#address_id").val($c);
				$addname = $(".active").parents(".mui-table").find(".addname").html();
				$("#moname").html($addname);
				$addinfo = $(".active").parents(".mui-table").find(".addinfo").html();
				$("#moinfo").html($addinfo);

			})
		</script>
	</body>

</html>