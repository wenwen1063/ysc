<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>我的主页</title>
    <meta content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <link href="/ysc2/Public/Wx/CSS/CommonCSS/Base.css" rel="stylesheet">
    <link href="/ysc2/Public/Wx/CSS/BusinessCSS/Mypage/Mypage.css" rel="stylesheet">
    <script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/mui.min.js"></script>
    <style>
    #dingdan .all .list {
        width: 20%;
    }

    #dingdan {
        top: 10px;
    }

    #classification {
        top: 15px;
    }

    #classification .list {
        height: auto;
        padding: 20px 10px;
        width: 33.3333%;
        border-bottom: 1px solid #f0f0f0;
    }

    #header .userimg {
        position: relative;
        top: 0px;
        left: 0;
    }

    #classification .list img {
        padding: 0;
        width: 30px;
        height: 30px;
    }

    #classification .list h5 {
        margin-bottom: 0;
    }

    #header {
        height: auto;
        padding: 10px;
    }

    #header div {
        width: 80px;
    }

    #header div img {
        width: 100%;
    }

    #header .name {
        position: relative;
        left: 15px;
        top: 10px;
    }

    #header .right {
        top: 0px;
    }

    #dao .list {
        width: 33.333%;
    }

    #dao {
        height: auto;
    }

    #dao .list {
        width: 33.333%;
        padding: 15px 10px;
        padding-bottom: 10px;
        height: auto;
        background: #fff;
    }

    #dingdan {
        position: relative;
        top: 5px;
    }

    #dingdan .all {
        border-top: 1px solid #f0f0f0;
    }

    #dingdan .all .list img {
        width: 25px;
    }

    #dingdan .all .list {
        padding-top: 15px;
    }

    .clear_both {
        clear: both;
    }

    .mui-bar-nav {
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    </style>
</head>

<body style="margin-bottom: 70px;">
    <header class="mui-bar mui-bar-nav header" style="height: 0;">
        <!-- <a id="info" class="mui-icon mui-icon-search mui-pull-right" href="classification/Searchgoods.html"></a> -->
        <!--<h1 class="mui-title">个人中心</h1>-->
    </header>
    <div id="header">
        <div class="userimg">
            <?php if ($user['is_xg']==0): ?>
            <a href="<?php echo U('/home/user/userinfo');?>">
                <img src="<?php echo ($user['avatar']); ?>" alt="">
            </a>
            <?php else : ?>
            <a href="<?php echo U('/home/user/userinfo');?>">
                <img src="/ysc2/Public/Uploads/<?php echo ($user['avatar']); ?>" alt="">
            </a>
            <?php endif ?>
            <!--<img src="/ysc2/Public/Uploads/<?php echo ($user['avatar']); ?>" alt="">-->
        </div>
        <div class="name">
            <h4><?php echo $names?></h4>
            <p>ID:<?php echo(intval($user['id'])+180000)?></p>
        </div>
        <div class="right">
            <!--<a href="<?php echo U('/home/rechargecash/recharge');?>">
                <input type="button" value="充值" style="background-color:#49d3ff;">
            </a>-->
            <a href="<?php echo U('/home/rechargecash/cash');?>">
                <input type="button" value="提现" style="background-color:#00ff86;">
            </a>
        </div>
    </div>
    <div id="dao">
        <a href="<?php echo U('/home/wallet/walletindex');?>">
            <div class="list">
                <img src="/ysc2/Public/Wx/img/My/my_btn_money.png" alt="">
                <h5>钱包</h5>
            </div>
        </a>
        <a href="<?php echo U('/home/User/mygold');?>">
            <div class="list">
                <img src="/ysc2/Public/Wx/img/My/my_btn_points.png" alt="">
                <h5>积分</h5>
            </div>
        </a>
        <a href="<?php echo U('/home/coupon/mycoupon');?>">
            <div class="list">
                <img src="/ysc2/Public/Wx/img/My/my_btn_coupon.png" alt="">
                <h5>优惠券</h5>
            </div>
        </a>
    </div>
    <div class="clear_both"></div>
    <div id="dingdan">
        <div class="title">
            <img src="/ysc2/Public/Wx/img/My/my_icon_order.png">
            <h5>订单中心</h5>
            <p>
                <a style="color: #909090" onclick="orderinfo(10)">查看全部订单</a> &numsp;></p>
        </div>
        <div class="all">
            <a onclick="orderinfo(0)">
                <div class="list">
                    <img src="/ysc2/Public/Wx/img/Home/1.png" alt="">
                    <?php if($num['payment'] != 0 ): ?><span class="mui-badge mui-badge-danger"><?php echo ($num['payment']); ?></span>
                        <?php else: ?>
                         <span class="mui-badge mui-badge-danger" >0</span><?php endif; ?>
                    <h5>待付款</h5>
                </div>
            </a>
            <a onclick="orderinfo(1)">
                <div class="list">
                    <img src="/ysc2/Public/Wx/img/Home/2.png" alt="">
                    <?php if($num['delivery'] != 0 ): ?><span class="mui-badge mui-badge-danger"><?php echo ($num['delivery']); ?></span>
                        <?php else: ?>
                        <span class="mui-badge mui-badge-danger" >0</span><?php endif; ?>

                    <h5>待发货</h5>
                </div>
            </a>
            <a onclick="orderinfo(2)">
                <div class="list">
                    <img src="/ysc2/Public/Wx/img/Home/3.png" alt="">
                    <?php if($num['Receiving'] != 0 ): ?><span class="mui-badge mui-badge-danger"><?php echo ($num['Receiving']); ?></span>
                        <?php else: ?>
                        <span class="mui-badge mui-badge-danger" >0</span><?php endif; ?>

                    <h5>待收货</h5>
                </div>
            </a>
            <a onclick="orderinfo(3)">
                <div class="list" style="bottom: 5px">
                    <img src="/ysc2/Public/Wx/img/Home/4.png" alt="">
                    <?php if($num['evaluate'] != 0 ): ?><span class="mui-badge mui-badge-danger"><?php echo ($num['evaluate']); ?></span>
                        <?php else: ?>
                        <span class="mui-badge mui-badge-danger" >0</span><?php endif; ?>
                    <h5>待评价</h5>
                </div>
            </a>
            <a onclick="customer()">
                <div class="list" style="bottom: 5px">
                    <img src="/ysc2/Public/Wx/img/Home/5.png" alt="">
                    <?php if($num['customer'] != 0 ): ?><span class="mui-badge mui-badge-danger"><?php echo ($num['customer']); ?></span>
                        <?php else: ?>
                        <span class="mui-badge mui-badge-danger" >0</span><?php endif; ?>
                    <h5>售后</h5>
                </div>
            </a>
        </div>
    </div>
    <div id="classification">
        <a href="<?php echo U('/home/partner/partner');?>">
            <div class="list" style="border-right:1px solid #f0f0f0;">
                <img src="/ysc2/Public/Wx/img/My/my_btn_gpdc.png" alt="">
                <h5>搭档中心</h5>
            </div>
        </a>
        <a href="<?php echo U('/home/User/myattention');?>">
            <div class="list" style="border-right:1px solid #f0f0f0;">
                <img src="/ysc2/Public/Wx/img/My/my_btn_follow.png" alt="">
                <h5>我的关注</h5>
            </div>
        </a>
        <a href="<?php echo U('/home/User/mycollection');?>">
            <div class="list">
                <img src="/ysc2/Public/Wx/img/my_btn_collection.png" alt="">
                <h5>我的收藏</h5>
            </div>
        </a>
        <a href="<?php echo U('/home/Myarticle/myarticle');?>">
            <div class="list" style="border-right:1px solid #f0f0f0;">
                <img src="/ysc2/Public/Wx/img/5.jpg" alt="">
                <h5>我的文章</h5>
            </div>
        </a>
        <a href="<?php echo U('/home/address/addrmanage');?>">
            <div class="list" style="border-right:1px solid #f0f0f0;">
                <img src="/ysc2/Public/Wx/img/My/my_btn_address.png" alt="">
                <h5>地址管理</h5>
            </div>
        </a>
        <a href="<?php echo U('/home/User/attractfansplay');?>">
            <div class="list" style="border-right:1px solid #f0f0f0;">
                <img src="/ysc2/Public/Wx/img/6.jpg" alt="">
                <h5>吸粉游戏</h5>
            </div>
        </a>
        <!--<a href="Myincome/Myincome.html">-->
        <!--<div class="list">-->
        <!--<img src="../../img/My/my_btn_income.png" alt="">-->
        <!--<h5>我的收益</h5>-->
        <!--</div>-->
        <!--</a>-->
     <!--    <a href="<?php echo U('/home/user/pswupdate');?>">
            <div class="list" style="border-right:1px solid #f0f0f0;">
                <img src="/ysc2/Public/Wx/img/my_btn_modify_password.png" alt="">
                <h5>密码管理</h5>
            </div>
        </a> -->
        <a href="http://chat8.live800.com/live800/chatClient/chatbox.jsp?companyID=820706&configID=151385&jid=5530154684">
            <div class="list" style="border-right:1px solid #f0f0f0;">
                <img src="/ysc2/Public/Wx/img/4.png" alt="">
                <h5>在线客服</h5>
            </div>
        </a>
        <!--<a href="../BindonAccount/Forgetpassword.html">-->
        <!--<div class="list">-->
        <!--<img src="../../img/1.jpg" alt="">-->
        <!--<h5>忘记密码</h5>-->
        <!--</div>-->
        <!--</a>-->
        <a href="<?php echo U('/home/user/more');?>">
            <div class="list" style="border-right:1px solid #f0f0f0;">
                <img src="/ysc2/Public/Wx/img/my_btn_more.png" alt="">
                <h5>更多</h5>
            </div>
        </a>
    </div>
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
    <script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/ysc2/Public/Wx/Script/ActiveXJS/mui.min.js"></script>
    <script src="/ysc2/Public/Wx/Script/CommonJS/Base.js"></script>
    <script>
    function orderinfo(state) {
        mui.openWindow({
            url: "/ysc2/wx.php/home/user/orderinfo?state=" + state,
            id: 'orderinfo'
        });
    }

    function customer() {
        mui.openWindow({
            url: "/ysc2/wx.php/home/customer/index?state=" + 10,
            id: 'orderinfo'
        });
    }
    </script>
    <script language="javascript" src="http://chat8.live800.com/live800/chatClient/monitor.js?jid=5530154684&companyID=820706&configID=151384&codeType=custom"></script>
</body>

</html>