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

<title>商家管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
    系统 <span class="c-gray en">&gt;</span>
    商家管理 <span class="c-gray en">&gt;</span>
    商家详情
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回" ><i class="Hui-iconfont">&#xe66b;</i></a>
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <div class="text-c"><br></div>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="12" style="text-align:center;">商家详情</th>
        </tr>
        <tr class="text-c">
            <th width="200">商家编号</th><td><?php echo ($data['number']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">名称</th><td><?php echo ($data['name']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">简称</th><td><?php echo ($data['forshort']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">公司名称</th><td><?php echo ($data['company_name']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">简介</th><td><?php echo ($data['synopsis']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">logo</th><td><img src="/ysc2/Public/Uploads/<?php echo ($data['logo']); ?>" width="80"></td>
        </tr>
        <tr class="text-c">
            <th width="80">广告图</th><td><img src="/ysc2/Public/Uploads/<?php echo ($data['ad_pic']); ?>" width="80"></td>
        </tr>
        <tr class="text-c">
            <th width="80">联系人</th><td><?php echo ($data['contact']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">电话</th><td><?php echo ($data['tel']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">手机</th><td><?php echo ($data['phone']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">QQ</th><td><?php echo ($data['qq']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">微信</th><td><?php echo ($data['wechat']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">地址</th><td><?php echo ($data['province']); ?> <?php echo ($data['city']); ?> <?php echo ($data['district']); ?> <?php echo ($data['address']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">营业执照</th><td><img src="/ysc2/Public/Uploads/<?php echo ($data['license']); ?>" width="80"></td>
        </tr>
        <tr class="text-c">
            <th width="80">经营许可证</th><td><img src="/ysc2/Public/Uploads/<?php echo ($data['business_certificate']); ?>" width="80"></td>
        </tr>
        <tr class="text-c">
            <th width="80">法人身份证（正面）</th><td><img src="/ysc2/Public/Uploads/<?php echo ($data['corporationid_front']); ?>" width="80"></td>
        </tr>
        <tr class="text-c">
            <th width="80">法人身份证（背面）</th><td><img src="/ysc2/Public/Uploads/<?php echo ($data['corporationid_back']); ?>" width="80"></td>
        </tr>
        <tr class="text-c">
            <th width="80">商家余额</th><td><?php echo ($data['balance']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">可提现金额</th><td><?php echo ($data['withdrawals']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">冻结金额</th><td><?php echo ($data['freeze']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">已提现金额</th><td><?php echo ($data['already_withdrawals']); ?></td>
        </tr>
        <tr class="text-c">
            <th width="80">开店时间</th><td><?php echo (date('Y-m-d H:i:s',$data['time'] )); ?></td>
        </tr>
        </thead>
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
        if(bl)
        {
            alert('最少选择一个');
            return false;
        }
    }
</script>
</body>
</html>