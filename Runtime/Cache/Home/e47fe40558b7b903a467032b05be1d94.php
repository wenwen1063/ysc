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

<title>广告管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 广告信息
 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
<form action="<?php echo U('/home/adver/adverindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
<div class="text-c">
            <input type="text" name="ad_name" value="<?php echo ($search['ad_name']); ?>" class="input-text" style="width:250px" placeholder="请输入广告名称">
            <span class="select-box inline">
            <select name="ad_type" class="select">
                <?php if($search['ad_type'] == null): ?><option value="">全部类型</option>
                    <option value="1">内容</option>
                    <option value="2">链接</option>
                    <option value="3">商品</option>
                <?php elseif($search['ad_type'] == 1): ?>
                    <option value="1">内容</option>
                    <option value="2">链接</option>
                    <option value="3">商品</option>
                    <option value="">全部状态</option>
                <?php elseif($search['ad_type'] == 2): ?>
                    <option value="2">链接</option>
                    <option value="3">商品</option>
                    <option value="">全部状态</option>
                    <option value="1">内容</option>
                    <?php elseif($search['ad_type'] == 3): ?>
                    <option value="3">商品</option>
                    <option value="">全部状态</option>
                    <option value="2">链接</option>
                    <option value="1">内容</option><?php endif; ?>
            </select>
            </span>
            <button type="submit" class="btn btn-success" id=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </div>
            </form>
    <div class="text-c"><br></div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <a href="<?php echo U('/home/adver/adveradd');?>" class="btn btn-primary radius"><i class="Hui-iconfont"></i> 新增 </a></span>&nbsp;

        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg table-hover">
        <thead>
            <tr>
                <th scope="col" colspan="13">轮播图列表</th>
            </tr>
            <tr class="text-c">
                <th width="100">操作</th>
                <th width="100">广告名称</th>
                <th width="100">广告小图</th>
                <!-- <th width="100">广告大图</th> -->
                <th width="100">广告位置</th>
                <th width="100">广告类型</th>
                <!-- <th width="200">广告内容</th> -->
                <th width="150">广告链接</th>
                <th width="100">广告顺序</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td class="td-manage">
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/adver/adverupdate',array('id'=>$v['id']));?>">编辑</a>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/adver/adverdel',array('id'=>$v['id']));?>" onclick="return confirm('确认要删除吗？');">删除</a>
                    </td>
                    <td>
                    <a class="maincolor" href="<?php echo U('/home/adver/adverinfo',array('id'=>$v['id']));?>"><?php echo ($v['ad_name']); ?></a>
                    </td>
                    <td><img height="40" src="/ysc2/Public/Uploads/<?php echo ($v['img']); ?>"></td>
                    <!-- <td><img height="40" src="/ysc2/Public/Uploads/<?php echo ($v['img2']); ?>"></td> -->
                    <td><?php if ($v['ad_position']==1) {echo "轮播";} else if ($v['ad_position']==2) { echo "固定";} else {echo "成为搭档";}?></td>
                    <td><?php if ($v['ad_type']==1){echo "内容";}else if ($v['ad_type']==3){echo "商品";}else{echo "链接";}?></td>
                    <!-- <td><?php echo ($v['ad_content']); ?></td> -->
                    <td><?php echo ($v['ad_link']); ?></td>
                    <td><?php echo ($v['ad_sort']); ?></td>
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