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

<title>奖金管理</title>
</head>
<style>
    .left_ul_li{
        text-align: center;
        border-bottom: 1px solid rgb(179,179,179);
    }
</style>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  奖金管理 <span class="c-gray en">&gt;</span>
   消费奖金明细
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<!--<div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-2">
    <ul class="left_ul">
        <a href="<?php echo U('/home/goods/goodsindex',array('seller_id'=>null));?>"><li class="maincolor left_ul_li" id="seller_all">全部商家</li></a>
        <?php if(is_array($seller)): foreach($seller as $key=>$v): ?><a href="<?php echo U('/home/goods/goodsindex',array('seller_id'=>$v['id']));?>"><li class="maincolor left_ul_li" id="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></li></a><?php endforeach; endif; ?>
    </ul>
</div>-->
<div class="pd-20 ">
    <form action="<?php echo U('/home/bonusmanage/consume/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
        <div class="text-c">
            <input type="text" id="username" name="username" value="<?php echo ($search['username']); ?>" class="input-text" style="width:200px" placeholder="输入会员名称">
            <input type="text" id="partner" name="partner" value="<?php echo ($search['partner']); ?>" class="input-text" style="width:200px" placeholder="输入搭档级别">
            <input type="text" id="orderno" name="orderno" value="<?php echo ($search['orderno']); ?>" class="input-text" style="width:200px" placeholder="输入订单编号">
            <input type="text" id="r_username" name="r_username" value="<?php echo ($search['r_username']); ?>" class="input-text" style="width:200px" placeholder="输入订单会员名称">
            <input type="text" id="goodsname" name="goodsname" value="<?php echo ($search['goodsname']); ?>" class="input-text" style="width:200px" placeholder="输入商品名称">
            <input type="text" id="sellername" name="sellername" value="<?php echo ($search['sellername']); ?>" class="input-text" style="width:200px" placeholder="输入商家名称">
            <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
    </form>

        <div class="text-c"><br></div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"></span>
        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span></div>

    <table class="table table-border table-bordered table-bg table-hover">
        <thead>
            <tr>
                <th scope="col" colspan="12">消费奖励</th>
            </tr>
            <tr class="text-c">
                <th width="40">会员名称</th>
                <th width="40">搭档级别</th>
                <th width="40">奖金层次</th>
                <!--<th width="40">奖励积分</th>-->
                <th width="40">奖励金额</th>
                <th width="40">订单编号</th>
                <th width="40">订单金额</th>
                <th width="40">订单会员</th>
                <th width="40">商品名称</th>
                <th width="40">商品金额</th>
                <th width="40">所属商家</th>
                <th width="40">奖励状况</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td><?php echo ($v['u_name']); ?></td>
                    <td><?php echo ($v['p_name']); ?></td>
                    <td><?php echo ($v['hierarchy']); ?></td>
                    <!--<td><?php echo ($v['integral']); ?></td>-->
                    <td><?php echo ($v['money']); ?></td>
                    <td><?php echo ($v['order_number']); ?></td>
                    <td><?php echo ($v['total_price']); ?></td>
                    <td><?php echo ($v['o_name']); ?></td>
                    <td><?php echo ($v['goods_name']); ?></td>
                    <td><?php echo ($v['price']); ?></td>
                    <td><?php echo ($v['s_name']); ?></td>
                    <!--<td><?php echo ($v['state']); ?></td>-->
                    <?php if ($v['state']==0): ?>
                    <td class="td-status"><span class="label radius">冻结</span></td>
                    <?php else: ?>
                    <td class="td-status"><span class="label label-success radius">正常</span></td>
                    <?php endif ?>
                </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="pageright"><?php echo ($page); ?></div>
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
    title   标题
    url     请求的url
    id      需要操作的数据id
    w       弹出层宽度（缺省调默认值）
    h       弹出层高度（缺省调默认值）
*/
var seller_id = "<?php echo $seller_id; ?>";
if(seller_id == ''){
    $('.left_ul li').css('color','#06c');
    $('.left_ul #seller_all').css('color','black');
}else{
    $('.left_ul li').css('color','#06c');
    $(".left_ul li[id*="+seller_id+"]").css('color','black');
}
/*用户-查看*/
function member_show(title,url,id,w,h){
    layer_show(title,url,w,h);
}
/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}
//批量删除判断是否选择
function Check()
{
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
}
}
</script>
</body>
</html>