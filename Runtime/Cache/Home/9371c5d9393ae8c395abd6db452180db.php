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
<title>益商城后台管理系统</title>
<style type="text/css">
  a{color:#333}a:hover,a:focus,.maincolor,.maincolor a{color:#06c}
  .Hui-header{ color:#fff}/*头部颜色*/
    .Hui-logo,.Hui-logo-m,.Hui-subtitle,.Hui-userbar{color:#fff}/*logo 及 用户信息文字颜色*/
    .Hui-logo:hover,.Hui-logo-m:hover{color:#fff;text-decoration: none}

  .Hui-header{background-color:#2d6dcc}/*顶部导航*/
  #Hui-nav > ul > li > a{ color:#fff}/*顶部导航文字颜色*/
  #Hui-nav > ul > li > a:hover,#Hui-nav > ul > li.current > a{ color:#fff}/*导航高亮状态*/
  .Hui-userbar > li > a{ color:#fff}
  .Hui-userbar > li > a:hover,.Hui-userbar > li.current > a{ color:#fff}/*用户信息条高亮*/
  .Hui-aside{}/*侧边栏*/
  .Hui-aside .menu_dropdown dt{color:#333}/*左侧二级导航菜单*/
  .Hui-aside .menu_dropdown dt:hover{color:#148cf1}
  .Hui-aside .menu_dropdown dt:hover [class^="icon-"]{ color:#7e8795}
  .Hui-aside .menu_dropdown li a{color:#666;border-bottom: 1px solid #e5e5e5}
  .Hui-aside .menu_dropdown li a:hover{color:#148cf1;background-color:#fafafa}
  .Hui-aside .menu_dropdown li.current a,.menu_dropdown li.current a:hover{color:#148cf1}
  .Hui-aside .menu_dropdown dt .Hui-iconfont{ color:#a0a7b1}
  .Hui-aside .menu_dropdown dt .menu_dropdown-arrow{ color:#b6b7b8}
  .dislpayArrow a{background:url(/ysc2/Public/admin/skin/default/acrossTab.png) no-repeat 0 0}
</style>
</head>
<body>
<!--head 头部-->
  <header class="Hui-header cl"> <a class="Hui-logo l" title="H-ui.admin v2.3" href="<?php echo U('/home/index/index');?>">搭档商城后台管理系统</a>
    <div id="rightMenu">
        <ul>
            <a href="<?php echo U('/home/index/index');?>"><li>关闭全部页面</li></a>
        </ul>
    </div>
    <ul class="Hui-userbar">
        <li>管理员</li>
        <li class="dropDown dropDown_hover"><a href="#" class="dropDown_A"><?php echo cookie('user'); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
            <ul class="dropDown-menu radius box-shadow">
                <li><a href="<?php echo U('/home/login/logout');?>">退出</a></li>
            </ul>
        </li>
    </ul>
</header>
<link href="/ysc2/Public/youji/css/zzsc.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/ysc2/Public/youji/js/zzsc.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<div id="newOrderDIV" style="display:none"></div>
<div id="newBonusDIV" style="display:none"></div>
<div id="newUpgradeDIV" style="display:none"></div>
<div id="newServiceDIV" style="display:none"></div>
<div id="newUserTxDIV" style="display:none"></div>
<div id="newSellerTxDIV" style="display:none"></div>
<script type="text/javascript">
    function neworder(ture){
        $.ajax({
            type: "post",
            url: "<?php echo U('/home/search/neworder');?>",
            async: false,
            data: name,
            dataType: "json",
            success: function(data){
                cash = eval(data.cash);
                if(cash!=null){
                    $('#newOrderDIV').html('<audio autoplay="autoplay"><source src="/ysc2/Public/admin/notifys.mp3" type="audio/mpeg"/></audio>');
                }
            }
        });
    }

    //新商品奖金设置变更需要审核
    function newbonus(ture){
        $.ajax({
            type: "post",
            url: "<?php echo U('/home/search/newbonus');?>",
            async: false,
            data: name,
            dataType: "json",
            success: function(data){
                cash = eval(data.cash);
                if(cash!=null){
//                    alert('您有新商品奖金设置变更需要审核');
                    $('#newBonusDIV').html('<audio autoplay="autoplay"><source src="/ysc2/Public/admin/newbonus.mp3" type="audio/mpeg"/></audio>');
                }
            }
        });
    }

    //有新的会员升级需要审核
    function upgrade(ture){
        $.ajax({
            type: "post",
            url: "<?php echo U('/home/search/upgrade');?>",
            async: false,
            data: name,
            dataType: "json",
            success: function(data){
                cash = eval(data.cash);
                if(cash!=null){
//                    alert('您有新的会员升级需要审核');
                    $('#newUpgradeDIV').html('<audio autoplay="autoplay"><source src="/ysc2/Public/admin/upgrade.mp3" type="audio/mpeg"/></audio>');
                }
            }
        });
    }

    //有新的售后服务订单
    function service(ture){
        $.ajax({
            type: "post",
            url: "<?php echo U('/home/search/service');?>",
            async: false,
            data: name,
            dataType: "json",
            success: function(data){
                cash = eval(data.cash);
                if(cash!=null){
//                    alert('您有新的售后服务订单,请及时处理');
                    $('#newServiceDIV').html('<audio autoplay="autoplay"><source src="/ysc2/Public/admin/shouhou.mp3" type="audio/mpeg"/></audio>');
                }
            }
        });
    }

    //有新的提现申请
    function rechargecash(ture){
        $.ajax({
            type: "post",
            url: "<?php echo U('/home/search/rechargecash');?>",
            async: false,
            data: name,
            dataType: "json",
            success: function(data){
                cash = eval(data.cash);
                if(cash == 1){
//                    alert('您有新的用户提现,请及时处理');
                    $('#newUserTxDIV').html('<audio autoplay="autoplay"><source src="/ysc2/Public/admin/usertx.mp3" type="audio/mpeg"/></audio>');
                }
                if(cash == 2){
//                    alert('您有新的商家提现,请及时处理');
                    $('#newSellerTxDIV').html('<audio autoplay="autoplay"><source src="/ysc2/Public/admin/sellertx.mp3" type="audio/mpeg"/></audio>');
                }
            }
        });
    }
    setInterval(neworder,60000);
    setInterval(newbonus,65000);
//    setInterval(upgrade,70000);
    setInterval(service,75000);
    setInterval(rechargecash,80000);
</script>
<!--head-->
<!--aside 边-->
   <!---->
<style type="text/css">
  .Hui-aside .menu_dropdown dt .Hui-iconfont {
    color: #3bb4f2;
    padding-left: 4px;
    font-size: 18px;
  }
</style>
<aside class="Hui-aside">
  <input runat="server" id="divScrollValue" type="hidden" value="" />
  <div class="menu_dropdown bk_2">

    <?php if(is_array($menus)): foreach($menus as $key=>$v): ?><dl id="menu-admin">
        <dt><i class="Hui-iconfont"><?php echo ($v['icon']); ?></i> <?php echo ($v['controllername']); ?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
        <dd>
          <ul>
            <?php if(is_array($v['submenus'])): foreach($v['submenus'] as $key=>$vo): ?><li><a _href="/ysc2/admin.php/<?php echo ($vo['controller']); ?>" href="javascript:void(0)"><?php echo ($vo['controllername']); ?></a></li><?php endforeach; endif; ?>
          </ul>
        </dd>
      </dl><?php endforeach; endif; ?>
  </div>
</aside>

<!--aside-->
<!--aside-->
<div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
  <div id="Hui-tabNav" class="Hui-tabNav">
    <div class="Hui-tabNav-wp">
      <ul id="min_title_list" class="acrossTab cl">
        <li class="active"><span title="搭档商城" data-href="welcome.html" id="test">搭档商城</span><em></em></li>
      </ul>
    </div>
    <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
  </div>
  <div id="iframe_box" class="Hui-article">
    <div class="show_iframe">
      <div style="display:none" class="loading"></div>
      <iframe scrolling="yes" frameborder="0" src="<?php echo U('/home/index/welcome');?>"></iframe>
    </div>
  </div>
</section>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
       // window.onload = function(){
       //     //去掉默认的contextmenu事件，否则会和右键事件同时出现。
       //     document.oncontextmenu = function(e){
       //         e.preventDefault();
       //     };
       //     document.getElementById("test").onmousedown = function(e){
       //         if(e.button ==2){
       //             alert("你点了右键");
       //         }else if(e.button ==0){
       //             alert("你点了左键");
       //         }else if(e.button ==1){
       //             alert("你点了滚轮");
       //         }
       //     }
       // }
</script>
<script type="text/javascript">
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s)})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
function colse(){
  var gnl = confirm('是否关闭其他窗口');
  if (gnl==true){
      window.location.href="<?php echo U('/home/index/index');?>";
  }else{
      return false;
  }
}
</script>
</body>
</html>