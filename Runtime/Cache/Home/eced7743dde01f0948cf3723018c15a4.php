<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>余额支付</title>
    <meta content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <link href="/ysc2/Public/Wx/CSS/CommonCSS/Base.css" rel="stylesheet">
    <link href="/ysc2/Public/Wx/CSS/BusinessCSS/ShoppingCart/Addressselection.css" rel="stylesheet">
</head>
<style type="text/css">
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
	.color{
		background: #f5f5f5;
	}
</style>
<body>
<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/mui.min.js"></script>
<script type="text/javascript">
	$(function(){
		mui.toast('支付成功',setTimeout(function(){
		mui.openWindow({
					url: "/ysc2/wx.php/home/user/orderinfo?state=1",
					id: 'orDERSKJAJ'
				});
		},1000));
	})
</script>

</html>