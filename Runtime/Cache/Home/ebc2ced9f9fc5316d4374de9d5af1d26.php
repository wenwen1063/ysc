<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=NO" />
    <!--<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">-->
    <link rel="stylesheet" href="/ysc2/Public/Wx/CSS/CommonCSS/Base.css">
    <link rel="stylesheet" href="/ysc2/Public/Wx/CSS/BusinessCSS/index.css">
    	<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/mui.min.js"></script>
    <!-- <link rel="stylesheet" href="/ysc2/Public/Wx/CSS/kefandtop.css"> -->
    <title>搭档商城</title>
    <style>
    html,
    body {
        /*font-size: 14px;*/
        /*height: 100% !important;*/
        background: #F1F2F6 !important;
        color: #444 !important;
        font-family: sans-serif !important;
        font-style: normal !important;
        /*text-align: center !important;*/
        margin-bottom: 0;
    }

    #shop_notice {
        border-top: 1px solid #eee;
    }

    .searchbar {
        width: 100%;
        padding-right: 40px;
        position: relative;
        height: 35px;
        background: #fff;
        border-radius: 5px;
        padding-right: 60px;
    }

    .searchbar .searchimg {
        position: absolute;
        right: 10px;
        top: 10px;
        width: 20px;
        height: 20px;
    }

    .searchbar input[type='search'] {
        margin: 0;
        display: inline-block;
        border: none;
        height: 35px;
        padding: 5px 10px;
        padding-right: 0;
        font-size: 14px;
        background: #fff;
        text-align: left;
    }

    .mui-bar-tab .mui-tab-item.mui-active {
        color: #fe504f;
    }

    .ellipsis {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100%;
        color: #444;
    }

    #shop_notice {
        height: 50px;
    }

    #shop_notice .fonst {
        width: 100px;
        padding: 0 10px;
    }

    #shop_notice .fonst img {
        left: 0;
        position: none;
        width: 100%;
    }

    #shop_notice .content {
        left: 8px;
    }

    #shop_notice .content .content_fonst {
        top: 10px;
        left: 8px;
        height: 30px;
    }

    #shop_notice .content .more {
        border: none;
        right: 15px;
    }

    #shops {
        height: auto;
        top: 0;
        margin-top: 10px;
    }

    #shops .lists {
        padding-top: 0;
        padding: 20px 10px;
        padding-bottom: 15px;
        width: 33.3333%;
        height: auto;
    }

    #shops .lists:nth-child(n+3) {
        border-right: 0;
    }

    #shops .lists h5 {
        margin: 0;
        color: #444;
        font-size: 13px;
        font-weight: 600;
    }

    #shops .lists img {
        top: 0;
        width: 100% !important;
        height: auto;
        padding: 10px;
    }

    #commodity_name {
        padding: 10px;
        height: auto;
        color: red;
        font-size: 16px;
        top: 0px;
        margin-top: 10px;
        border-bottom: 1px solid #f0f0f0;
    }

    #commodity_name .more {
        top: 0;
        border: none;
        right: 0;
        padding: 0;
    }

    #shopcontent {
        top: 0;
        height: auto;
        padding: 0;
    }

    #shopcontent .list {
        border: 1px solid #F0F0F0;
        padding: 10px;
        width: 50%;
        height: auto;
        margin-bottom: 0px;
    }

    #shopcontent .list h5 {
        margin: 5px 0;
        font-size: 15px;
    }

    #shopcontent .list img {
        height: auto;
    }

    #shopcontent .list input {
        right: 0;
    }

    .imgkefu img {
        top: auto;
        bottom: 110px;
    }

    #shopcontent .list input {
        border: 1px solid #fe504f;
    }

    .searchbar .imgdiv {
        width: 50px;
        height: 100%;
        text-align: center;
        display: inline-block;
        position: absolute;
        top: 0;
        right: 0px;
        background: #FE504F;
        border-radius: 0 5px 5px 0;
    }

    .searchbar .imgdiv span {
        vertical-align: middle;
        /* width: 20px; */
        position: absolute;
        font-size: 15px;
        /* top: 7.5px; */
        width: 100%;
        display: inline-block;
        line-height: 35px;
        right: 0px;
        color: #fff;
    }

    .marketing_div {
        background: #fff;
    }

    .marketing_div .banner_div {
        width: 100%;
        float: left;
    }

    .marketing_div .banner_div img {
        width: 100%;
        float: left;
    }

    .more span {
        color: #FE504F !important;
        font-size: 12px !important;
    }
    </style>
</head>
<body>
	
    <!--<header class="mui-bar mui-bar-nav header">-->
        <!--<a id="info" class="mui-icon mui-icon-search mui-pull-right" href="classification/Searchgoods.html"></a>-->
        <!--<h1 class="mui-title">首页</h1>-->
    <!--</header>-->
    <div style="padding-bottom: 50px;">
        <div style="padding:10px;">
            <form>
                <div class="searchbar">
                   <input type="search" id="searchtext" placeholder="输入搜索关键字" />
                    <div class="imgdiv">
                        <span id="search">搜索</span>
                    </div>
                    <!--<img class="searchimg" src="/ysc2/Public/Wx/img/Home/search.png" alt="">-->
                </div>
            </form>
        </div>
        <div>
            <div id="slider" class="mui-slider">
                <div class="mui-slider-group mui-slider-loop" id="adverinfo">
                    <?php if(is_array($picinfo)): foreach($picinfo as $k2=>$v1): if($k2 == count($picinfo)-1): ?><div class="mui-slider-item mui-slider-item-duplicate">
                                <a href="#"><img src=" /ysc2/Public/Uploads/<?php echo ($v1['img']); ?>" /></a>
                            </div><?php endif; endforeach; endif; ?>
                        
	                         <?php if(is_array($picinfo)): foreach($picinfo as $k=>$v): ?><div class="mui-slider-item">
	                            <?php if ($v['ad_type']==1): ?>
	                            	<a href="javascript:void(0)">
	                            <?php elseif ($v['ad_type']==2): ?>
	                                <a href="<?php echo ($v['ad_link']); ?>">
	                            <?php else : ?>
	                            	<a href="<?php echo U('/home/goods/goodsinfo',array('id'=>$v['ad_goods']));?>">
	                            <?php endif ?>
	                            <img src=" /ysc2/Public/Uploads/<?php echo ($v['img']); ?>" /></a>
	                        </div><?php endforeach; endif; ?>
                        
                       <?php if(is_array($picinfo)): foreach($picinfo as $k1=>$v2): if($k1 == 0): ?><div class="mui-slider-item mui-slider-item-duplicate">
                                <a href="#"><img id="aaaa" src=" /ysc2/Public/Uploads/<?php echo ($v2['img']); ?>" /></a>
                            </div><?php endif; endforeach; endif; ?>
                <!--</div>-->
            </div>
        </div>
        <div class="navigation">
            <div class="navigation_one">
                <a href="<?php echo U('/home/partners/index');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_partners.png">
                        </div>
                        <span class="list_span">成为搭档</span>
                    </div>
                </a>
                <a href="<?php echo U('/home/Special/partnerspecial');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_exclusive.png">
                        </div>
                        <span class="list_span">搭档福利</span>
                    </div>
                </a>
                <a href="<?php echo U('/home/extension/extensionlist');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_extensiontool.png">
                        </div>
                        <span class="list_span">推广工具</span>
                    </div>
                </a>
                <a href="<?php echo U('/home/teacher/index');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_mentor.png">
                        </div>
                        <span class="list_span">创业社区</span>
                    </div>
                </a>
                <!-- <a href="<?php echo U('/home/seller/sellercenter');?>"> -->
                <a href="<?php echo U('/home/seller/sellerapply');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_bc.png">
                        </div>
                        <span class="list_span">商家入驻</span>
                    </div>
                </a>
            </div>
            <div class="navigation_two">
                <a href="<?php echo U('/home/feeflow/feeflow');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_vc.png">
                        </div>
                        <span class="list_span">话费流量</span>
                    </div>
                </a>
                <a href="<?php echo U('/home/goldmall/goldmallindex');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_exchange.png">
                        </div>
                        <span class="list_span">积分换购</span>
                    </div>
                </a>
                <a href="<?php echo U('/home/coupon/couponindex');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_lc.png">
                        </div>
                        <span class="list_span">领券中心</span>
                    </div>
                </a>
                <a href="<?php echo U('/home/information/index');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_consulting.png">
                        </div>
                        <span class="list_span">精品资讯</span>
                    </div>
                </a>
                <a href="<?php echo U('/home/goodsclass/goodsclassindex');?>">
                    <div class="list">
                        <div class="list_img">
                            <img class="img" src="/ysc2/Public/Wx/img/Home/home_btn_goods.png">
                        </div>
                        <span class="list_span">全部商品</span>
                    </div>
                </a>
            </div>
        </div>
        <div id="shop_notice">
            <div class="fonst">
                <img src="/ysc2/Public/Wx/img/Home/shop_fonst.png">
            </div>
            <div class="content">
                <div class="circular">
                </div>
                <div class="content_fonst">
                    <marquee direction="up" scrollDelay="190" height="30px" loop="-1" scrollamount="3">
                        <?php if(is_array($notic)): foreach($notic as $key=>$vb): ?><p class="ellipsis" style="color:#000"><?php echo ($vb['content']); ?></p><?php endforeach; endif; ?>
                    </marquee>
                </div>
                <div class="more">
                    <a href="<?php echo U('/home/index/notice');?>">
                        <span>更多</span>
                    </a>
                </div>
            </div>
        </div>
        <div id="shops">
            <?php if(is_array($shop)): foreach($shop as $key=>$vi): ?><a href="<?php echo U('/home/seller/sellerinfo',array('id'=>$vi['id']));?>">
                    <div class="lists" style="border-bottom: 1px solid #e0e0e0">
                        <div class="names">
                            <h5 class="ellipsis"><?php echo ($vi['forshort']); ?>
                        </h5>
                        </div>
                        <img src="/ysc2/Public/Uploads/<?php echo ($vi['logo']); ?>">
                    </div>
                </a><?php endforeach; endif; ?>
        </div>
        <div style="clear: both;"></div>
        <?php if ($activity != null): ?>
        <div class="marketing_div">
            <div id="commodity_name">
                限时抢购
                <a href="<?php echo U('/home/index/goods',array('goods_id'=>$as['goods_id']));?>">
                    <div class="more">
                        <span>更多</span>
                    </div>
                </a>
            </div>
            <?php if(is_array($activity)): foreach($activity as $key=>$as): ?><a href="<?php echo U('/home/goods/goodsinfo',array('id'=>$as['goods_id']));?>">
                    <div class="banner_div">
                        <img src="/ysc2/Public/Uploads/<?php echo ($as['img']); ?>">
                    </div>
                </a><?php endforeach; endif; ?>
        </div>
        <?php endif ?>
        <div style="clear: both;"></div>
        <!-- <?php if ($activity != null): ?> -->
        <!-- <div id="commodity_name"> -->
        <!-- <img src="/ysc2/Public/Wx/img/Home/1F.png">
                <span>营销活动</span>
                <div class="more">
                    <a href="<?php echo U('/home/goodsclass/goodsclassindex');?>">
                        <span>更多</span>
                    </a>
                </div>
                 <div id="advertisements">
                <?php if(is_array($activity)): foreach($activity as $key=>$as): ?><a href="<?php echo U('/home/goods/goodsinfo',array('id'=>$as['goods_id']));?>">
                    <div class="lists" style="margin-bottom: 5px">
                        <img src="/ysc2/Public/Uploads/<?php echo ($as['pic']); ?>">
                    </div>
                     </a><?php endforeach; endif; ?>
            </div>
            </div>
            <?php endif ?> -->
        <?php if(is_array($arr)): foreach($arr as $k=>$as): ?><div id="commodity_name">
                <!-- <img src="/ysc2/Public/Wx/img/Home/1F.png"> -->
                <?php echo ($k); ?>
                <!-- <span><?php echo ($k); ?></span> -->
                <div class="more">
                    <a href="<?php echo U('/home/goodsclass/goodsclassindex',array('id'=>$as[0]['class_id']));?>">
                        <span>更多</span>
                    </a>
                </div>
            </div>
            <div id="shopcontent">
                <?php if(is_array($as)): foreach($as as $key=>$vl): if($key < 4): ?><a href="<?php echo U('/home/goods/goodsinfo',array('id'=>$vl['goods_id']));?>">
                            <div class="list">
                                <img src="/ysc2/Public/Uploads/<?php echo ($vl['sm_pic']); ?>">
                                <h5 class="ellipsis"><?php echo ($vl['goods_name']); ?></h5>
                                <div class="money">
                                    <span>￥<?php echo ($vl['price']); ?></span>
                                    <input type="button" value="购买">
                                </div>
                            </div>
                        </a><?php endif; endforeach; endif; ?>
            </div><?php endforeach; endif; ?>
    </div>
    <!--客服和回到顶部-->
        <!--客服图标-->
    <div class="imgkefu">
        <a href="http://chat8.live800.com/live800/chatClient/chatbox.jsp?companyID=820706&configID=151385&jid=5530154684">
            <img src="/ysc2/Public/Wx/img/KFRK.png" alt="">
        </a>
    </div>
    <!--回到顶部按钮-->
    <div class="imgTopDiv">
        <a href="#"><img src="/ysc2/Public/Wx/img/btn_top.png" alt=""></a>
    </div>
    <!--nav底部导航-->
            <style>
            /*底部栏*/

            #footer .mui-tab-item:nth-child(1) .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_home_normal.png) no-repeat;
                background-size: 20px 20px;
            }

            #footer .mui-tab-item:nth-child(1).mui-active .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_home_press.png) no-repeat;
                background-size: 20px 20px;
            }

            #footer .mui-tab-item:nth-child(2) .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_classification_normal.png) no-repeat;
                background-size: 20px 20px;
            }

            #footer .mui-tab-item:nth-child(2).mui-active .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_classification_press.png) no-repeat;
                background-size: 20px 20px;
            }

            #footer .mui-tab-item:nth-child(3) .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_qrcode_normal.png) no-repeat;
                background-size: 20px 20px;
            }

            #footer .mui-tab-item:nth-child(3).mui-active .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_qrcode_press.png) no-repeat;
                background-size: 20px 20px;
            }

            #footer .mui-tab-item:nth-child(4) .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_shoppingcart_normal.png) no-repeat;
                background-size: 20px 20px;
            }

            #footer .mui-tab-item:nth-child(4).mui-active .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_shoppingcart_press.png) no-repeat;
                background-size: 20px 20px;
            }

            #footer .mui-tab-item:nth-child(5) .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_my_normal.png) no-repeat;
                background-size: 20px 20px;
            }

            #footer .mui-tab-item:nth-child(5).mui-active .mui-icon {
                background: url(/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_my_press.png) no-repeat;
                background-size: 20px 20px;
            }
        </style>
        <nav id="footer" class="mui-bar mui-bar-tab footer">
            <a id="one" class="mui-tab-item mui-active">
                <span class="mui-icon">
               <!--  <img src="/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_home_press.png" alt=""> -->
                </span>
                <span class="mui-tab-label">首页</span>
            </a>
            <a id="two" class="mui-tab-item">
                <span class="mui-icon"><!-- <img
                        src="/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_classification_normal.png"
                        alt=""> --></span>
                <span class="mui-tab-label">分类</span>
            </a>
            <a id="code" class="mui-tab-item">
                <span class="mui-icon"><!-- <img src="/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_qrcode_normal.png"
                                            alt=""> --></span>
                <span class="mui-tab-label">二维码</span>
            </a>
            <a id="three" class="mui-tab-item">
                <span class="mui-icon"><!-- <img src="/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_shoppingcart_normal.png" alt=""> --></span>
                <span class="mui-tab-label">购物车</span>
            </a>
            <a id="four" class="mui-tab-item">
                <span class="mui-icon"><!-- <img src="/ysc2/Public/Wx/img/TabBarController/tabbarcontroller_icon_my_normal.png" alt=""> --></span>
                <span class="mui-tab-label">我的</span>
            </a>
        </nav>
        <script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/jquery-2.1.1.min.js"></script>
        <script src="/ysc2/Public/Wx/Script/CommonJS/Base.js"></script>
        <script>
            var gallery = mui('.mui-slider');
            gallery.slider({
                interval: 2000 //自动轮播周期，若为0则不自动播放，默认为0；
            });
            var test = "<?php echo $test;?>";
            if(test == ''){
                test = 'one';
            }
            $('#footer .mui-tab-item').removeClass('mui-active');
            $("#"+test).addClass('mui-active');

            document.getElementById('one').addEventListener('tap', function() {
                mui.openWindow({
                    url: "<?php echo U('/home/index/index?test=one');?>",
                    id: 'classification'
                });
            });
            document.getElementById('code').addEventListener('tap', function() {
                mui.openWindow({
                    url: "<?php echo U('/home/two/two?test=code');?>",
                    id: 'classification'
                });
            });
            document.getElementById('two').addEventListener('tap', function() {
                mui.openWindow({
                    url: "<?php echo U('/home/goodsclass/goodsclassindex?test=two');?>",
                    id: 'classification'
                });
            });
            document.getElementById('three').addEventListener('tap', function() {
                mui.openWindow({
                    url: "<?php echo U('/home/order/carindex?test=three');?>",
                    id: 'classification'
                });
            });
            document.getElementById('four').addEventListener('tap', function() {
                mui.openWindow({
                    url: "<?php echo U('/home/user/userindex?test=four');?>",
                    id: 'classification'
                });
            });
        </script>
    <!--nav底部导航结束-->
</body>
<script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/index/js/template.js"></script>
<script language="javascript" src="http://chat8.live800.com/live800/chatClient/monitor.js?jid=5530154684&companyID=820706&configID=151384&codeType=custom"></script>
<script type="text/javascript">

$("#search").click(function(){
	$text=$("#searchtext").val();
	mui.openWindow({
					url: "/ysc2/wx.php/home/index/search?search=" + $text,
					id: 'indexsearch'
				});
})
</script>
<script type="text/javascript" src="/ysc2/Public/admin/js/jweixin-1.2.0.js"></script>
<script type="text/javascript">  

//通过config接口注入权限验证配置
$link = window.location.href;
alert("<?php echo C('URL_IP');?>"+$(".mui-slider-item img:first-child").attr("src"));
$.ajax({
        url:"<?php echo U('/home/user/getjsdk');?>",//后台给你提供的接口
        type:"post",
        data:{"url":$link},
        async:true,
        dataType:"json",
        success:function (data){
        	/*alert(JSON.stringify(data));*/
            wx.config({
                debug: ture, // 开启调试模式,调用的所有api的返回值会在客户端alert出来
                appId: data.appid, // 必填，公众号的唯一标识
                timestamp: data.timestamp, // 必填，生成签名的时间戳
                nonceStr: data.noncestr, // 必填，生成签名的随机串
                signature: data.signature,// 必填，签名，见附录1
                jsApiList: [
                    "onMenuShareTimeline",
                    "onMenuShareAppMessage"
                ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
            });
            wx.error(function (res) {
//              mui.toast('');
            });
        },
        error:function (error){
//          alert(2)
        }
   });
wx.ready(function(){
wx.onMenuShareTimeline({
    title: '搭档商城', // 分享标题
    link: '', // 分享链接
    imgUrl: "<?php echo C('URL_IP');?>"+"/Public/Wx/img/ysclogo.jpg", // 分享图标
    success: function () { 
    },
    cancel: function () { }
});
//发送给好友
wx.onMenuShareAppMessage({
    title: '搭档商城', // 分享标题
    desc: '精致生活，健康搭档, // 分享描述
    link: '', // 分享链接
    imgUrl: "<?php echo C('URL_IP');?>"+"/Public/Wx/img/ysclogo.jpg", // 分享图标
    type: '', // 分享类型,music、video或link，不填默认为link
    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
    success: function () {},
    cancel: function () {}
});

});
wx.error(function(res){ 
alert(JSON.stringify(res));
})
</script>



</html>