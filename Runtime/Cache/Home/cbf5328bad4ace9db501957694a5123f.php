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
<title>商品奖金设置审核</title>
<style type="text/css">
ul{list-style:none;padding:0;}
#menu #tree_root{overflow:auto;}
#menu #tree_root li span{display:block;height:18px;line-height:18px;color:#222;cursor:pointer;}
#menu #tree_root li span.tree2{padding:6px 6px 6px 20px;}
#menu #tree_root li span.tree3{padding:6px 6px 6px 34px;}
#menu #tree_root li span.tree4{padding:6px 6px 6px 48px;}
#menu #tree_root li span.tree5{padding:6px 6px 6px 62px;}
#menu li .hover,#menu li span:hover{background-color:#e9edf6;}
#menu ul{overflow:hidden;}
#menu ul li b{font-weight:normal;position:relative;padding-left:16px;}
#menu ul li b:before{display:block;font-size:0;top:5px;left:0;content:"";width:4px;height:4px; border:solid 1px transparent;transform:rotate(45deg);-o-transform:rotate(45deg);-ms-transform:rotate(45deg);-moz-transform:rotate(45deg);-webkit-transform:rotate(45deg);position:absolute;}
#menu ul li .On:before,#menu ul li .On2Off:before{top:3px;border-bottom-color:#999;border-right-color:#999;}
#menu ul li .Off:before{top:5px;border-top-color:#999;border-right-color:#999;}
#menu ul li .On2Off:before{transform:rotate(0deg);-o-transform:rotate(0deg);-ms-transform:rotate(0deg);-moz-transform:rotate(0deg);-webkit-transform:rotate(0deg);}
</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  商品管理 <span class="c-gray en">&gt;</span>
   商品奖金设置审核
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-2" id="menu">
    <div style="text-align:center;"><a href="<?php echo U('/home/bonuscheck/bonuscheckindex',array('gct_id'=>null));?>">全部分类</a></div>
    <ul id="tree_root">
    <?php if(is_array($tree_data)): foreach($tree_data as $key=>$v): ?><li>
            <span class="tree2"><b class="Off"><?php echo ($key); ?></b></span>
            <ul style="display:none;">
            <?php if(is_array($v)): foreach($v as $key=>$v2): ?><li>
                    <span class="tree3"><b class="Off"><?php echo ($v2['name']); ?></b></span>
                    <ul style="display:none;">
                        <?php if(is_array($v2['belong'])): foreach($v2['belong'] as $key=>$v3): ?><li>
                                <span class="tree4"><b><a href="<?php echo U('/home/bonuscheck/bonuscheckindex',array('gcs_id'=>$v3['id']));?>"><?php echo ($v3['name']); ?></a></b></span>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </li><?php endforeach; endif; ?>
            </ul>
        </li><?php endforeach; endif; ?>
    </ul>
</div>
<div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-10">
    <form action="" method="post/get" name="mainform" class="form form-horizontal" id="form-admin-add" style="float:right;">
        <input type="hidden" name="gct_id" value="<?php echo ($search['gct_id']); ?>">
        <div class="text-c">
            <input type="text" id="goods_name" name="goods_name" value="<?php echo ($search['goods_name']); ?>" class="input-text" style="width:100px" placeholder="输入商品名称">
            <input type="text" id="number" name="number" value="<?php echo ($search['number']); ?>" class="input-text" style="width:200px" placeholder="输入商品编号">
            <span class="select-box inline">
            <?php if($search['bonus_state'] == 0): ?><select name="bonus_state" class="select">
                    <option value="0">全部状态</option>
                    <option value="1">待审核</option>
                    <option value="2">已审核</option>
                    <option value="3">不通过</option>
                </select>
            <?php elseif($search['bonus_state'] == 1): ?>
                <select name="bonus_state" class="select">
                    <option value="1">待审核</option>
                    <option value="0">全部状态</option>
                    <option value="2">已审核</option>
                    <option value="3">不通过</option>
                </select>
            <?php elseif($search['bonus_state'] == 2): ?>
                <select name="bonus_state" class="select">
                    <option value="2">已审核</option>
                    <option value="0">全部状态</option>
                    <option value="1">待审核</option>
                    <option value="3">不通过</option>
                </select>
            <?php else: ?>
                <select name="bonus_state" class="select">
                    <option value="3">不通过</option>
                    <option value="0">全部状态</option>
                    <option value="1">待审核</option>
                    <option value="2">已审核</option>
                </select><?php endif; ?>
            </span>
            <button type="submit" class="btn btn-success" onclick="return search()"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
             <!-- <input type="submit" class="btn btn-danger radius" value="导出" onclick="return goodsexcel();" style="background-color: #f5862e;border-color: #f5862e;" /> -->
        </div>
    </form>

    <form action="" method="post/get" name="main_form" id="main_form">
    <div class="text-c"><br></div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <input type="submit" class="btn btn-danger radius" value="不通过" onclick="return delgoods()" />
        <input type="submit" class="btn btn-danger radius" value="通过" onclick="return ongoods()" style="background-color: #19d419;border-color: #19d419;" /></span>
        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="14">商品列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="160">编号</th>
                <th>商品名称</th>
                <th>所属商家</th>
                <th width="50">商品小图</th>
                <th>库存数量</th>
                <th colspan="2">商品原价和商品现价</th>
                <th width="50">商品状态</th>
                <th width="50">虚拟销量</th>
                <th width="50">实际销量</th>
                <th>默认发货物流</th>
                <th width="80">奖金审核状态</th>
                <th>奖金审核时间</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td><input type="checkbox" value="<?php echo ($v['id']); ?>" name="id[]"></td>
                    <td><?php echo ($v['number']); ?></td>
                    <td class="text-l"><center><a class="maincolor" href="<?php echo U('/home/goods/goodsinfo',array('id'=>$v['id']));?>"><?php echo ($v['goods_name']); ?></a></center></td>
                    <td><?php echo ($v['seller_name']); ?></td>
                    <td><img src="/ysc2/Public/Uploads/<?php echo ($v['sm_pic']); ?>" width="40"></td>
                    <td>
                        <?php if(is_array($v['price'])): foreach($v['price'] as $key=>$v2): echo ($v2['ga_name']); ?>: <?php echo ($v2['stock']); ?><br/><?php endforeach; endif; ?>
                    </td>
                    <td colspan="2">
                        <?php if(is_array($v['price'])): foreach($v['price'] as $key=>$v2): echo ($v2['ga_name']); ?>: 原价:<?php echo ($v2['market_price']); ?>元&nbsp;&nbsp;&nbsp;&nbsp;现价:<?php echo ($v2['shop_price']); ?>元<br/><?php endforeach; endif; ?>
                    </td>
                    <?php if($v['is_on_sale']==0): ?>
                        <td class="td-status"><span class="label radius">已下架</span></td>
                    <?php elseif($v['goods_inventory']==0): ?>
                        <td class="td-status"><span class="label radius" style="background-color: #E06D6D;">已售罄</span></td>
                    <?php elseif($v['goods_inventory']<=$v['stock_warning'] && $v['goods_inventory']>0): ?>
                        <td class="td-status"><span class="label radius" style="background-color: #E06D6D;">警戒中</span></td>
                    <?php elseif($v['is_on_sale']==1): ?>
                        <td class="td-status"><span class="label label-success radius">出售中</span></td>
                    <?php endif ?>
                    <td><?php echo ($v['v_sale']); ?></td>
                    <td><?php echo ($v['r_sale']); ?></td>
                    <td><?php echo ($v['logistics_name']); ?></td>
                    <?php if($v['bonus_state']==1): ?>
                        <td><span class="label label-warning radius">待审核</span></td>
                    <?php elseif($v['bonus_state']==2): ?>
                        <td><span class="label label-success radius">已审核</span></td>
                    <?php elseif($v['bonus_state']==3): ?>
                        <td><span class="label radius" style="background-color: #E06D6D;">不通过</span></td>
                    <?php endif ?>

                    <?php if ($v['auditing_time']!=null): ?>
                        <td><?php echo (date('Y-m-d H:i:s',$v['auditing_time'])); ?></td>
                    <?php else: ?>
                        <td></td>
                    <?php endif ?>
                </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="pageright"><?php echo ($page); ?></div>
</div>
</form>
</body>
</html>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
    function setTreeStyle(obj){
        var objStyle = obj.children("b");
        var objList = obj.siblings("ul");
        if(objList.length == 1){
            var style = objStyle.attr("class");
            objStyle.attr("class","On2Off");
            setTimeout(
                function(){
                    if(style == "Off"){
                        objList.parent().siblings("li").children("span").children(".On").each(function(){
                            setTreeStyle($(this).parent());
                        });
                        var H = objList.innerHeight()
                        objList.css({display:"block",height:"0"});
                        objList.animate({height:H},300,function(){$(this).css({height:"auto"});});
                        objStyle.attr("class","On");
                    }
                    else if(style == "On"){
                        objList.find("li").children("span").children(".On").each(function(){
                            setTreeStyle($(this).parent());
                        });
                        var H = objList.innerHeight()
                        objList.animate({height:0},300,function(){$(this).css({height:"auto",display:"none"})});
                        objStyle.attr("class","Off");
                    }
                },
                42
            );
        }
    }
    $("#tree_root").find("li").children("span").click(function(){
        setTreeStyle($(this));
    });
</script>
<script type="text/javascript">
//批量删除判断是否选择
function delgoods(){
    var gnl = confirm('确认不通过吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
        var bl=true;
        for(var i=0;i<chks.length;i++)
        {
            if(chks[i].checked)
            {
                bl=false;
                break;
            }
        }
        if(bl){
            alert('最少选择一个');
            return false;
        }else{
            document.forms.main_form.action="<?php echo U('/home/bonuscheck/bonuscheckdel');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}
function ongoods(){
    var gnl = confirm('确认通过吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
        var bl=true;
        for(var i=0;i<chks.length;i++)
        {
            if(chks[i].checked)
            {
                bl=false;
                break;
            }
        }
        if(bl){
            alert('最少选择一个');
            return false;
        }else{
            document.forms.main_form.action="<?php echo U('/home/bonuscheck/bonuscheckon');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}
//导出商品数据
 // function goodsexcel(){
 //     document.forms.mainform.action="<?php echo U('/home/goods/goodsexcel');?>";
 //     document.forms.mainform.submit();
 // }
function search(){
    document.forms.mainform.action="<?php echo U('/home/bonuscheck/bonuscheckindex/search/');?>";
    document.forms.mainform.submit();
}
</script>