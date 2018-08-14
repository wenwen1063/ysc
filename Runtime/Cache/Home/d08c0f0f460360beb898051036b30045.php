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
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  奖金管理 <span class="c-gray en">&gt;</span>
   推荐奖金明细
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
  <!--   <form action="<?php echo U('/home/bonusmanage/recommendindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
        <div class="text-c">
            <input type="text" id="username" name="username" value="<?php echo ($arr['username']); ?>" class="input-text" style="width:250px" placeholder="输入会员名称">
            <input type="text" id="partner" name="partner" value="<?php echo ($arr['partner']); ?>" class="input-text" style="width:250px" placeholder="输入搭档级别">
            <input type="text" id="r_username" name="r_username" value="<?php echo ($arr['r_username']); ?>" class="input-text" style="width:250px" placeholder="输入推荐会员名称">
            <input type="text" id="r_partner" name="r_partner" value="<?php echo ($arr['r_partner']); ?>" class="input-text" style="width:250px" placeholder="输入推荐会员搭档级别">
            <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
    </form> -->
    <form action="<?php echo U('/home/discount/delmember/del');?>" method="post/get" name="main_form">
        <div class="text-c"><br></div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"></span>
        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span></div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="10">推荐会员</th>
            </tr>
            <tr class="text-c">
<!--                 <th width="40">编号</th> -->
                <th width="100">会员名称</th>
                <th width="100">搭档级别</th>
                <th width="100">奖金层次</th>
             <!--    <th width="100">奖励积分</th> -->
                <th width="100">奖励金额</th>
                <th width="100">推荐会员</th>
                <th width="100">推荐会员搭档级别</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td><?php echo ($v['username']); ?></td>
                    <td><?php echo ($v['p_name']); ?></td>
                    <td><?php echo ($v['hierarchy']); ?>级</td>
                    <!-- <td><?php echo ($v['integral']); ?></td> -->
                    <td><?php echo ($v['bonus_amount']); ?></td>
                    <td><?php echo ($v['recommend_username'][0]['username']); ?></td>
                    <!--<td><?php echo ($v['id']); ?></td>-->
                    <td>
                    <?php
 if ($v['recommend_username'][0]['privilege_hierarchy_id']==1) { echo "草根搭档"; }elseif ($v['recommend_username'][0]['privilege_hierarchy_id']==2) { echo "贵族搭档"; } elseif ($v['recommend_username'][0]['privilege_hierarchy_id']==3) { echo "精英搭档"; } ?>
                    </td>
                </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="pageright"><?php echo ($page); ?></div>
    </form>
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