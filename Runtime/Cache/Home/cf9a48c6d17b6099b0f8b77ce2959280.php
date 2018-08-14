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
<title>资讯管理</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯信息详情
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回" ><i class="Hui-iconfont">&#xe66b;</i></a>
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20">
        <div class="text-c">
            <br>
        </div>
        <table class="table table-border table-bordered table-bg">
            <thead>
                <tr>
                    <th scope="col" colspan="13" style="text-align:center;">资讯信息详情</th>
                </tr>
                <tr class="text-c">
                    <th width="20">资讯主题</th><td><?php echo ($data['title']); ?></td>
                </tr>
                <tr class="text-c">
                    <th width="20">资讯内容</th><td width="40"><?php echo ($data['content']); ?></td>
                </tr>
                <tr class="text-c">
                    <th width="20">资讯分类</th><td><?php echo ($data['name']); ?></td>
                </tr>
                <tr class="text-c">
                    <th width="20">发布时间</th><td><?php echo (date('Y-m-d H:i:s',$data['creat_time'] )); ?></td>
                </tr>
                <tr class="text-c">
                    <th width="20">发布人</th><td><?php echo ($data['admin_user']); ?></td>
                </tr>
                <tr class="text-c">
                    <th width="20">资讯图片</th><td><?php if ($data['pic']!=null): ?><img height="60" src="/ysc2/Public/Uploads/<?php echo ($data['pic']); ?>"><?php endif?></td>
                </tr>
                <tr class="text-c">
                    <th width="20">阅读量</th><td><?php echo ($data['read_num']); ?></td>
                </tr>
                <tr class="text-c">
                    <th width="20">点赞量</th><td><?php echo ($data['click_num']); ?></td>
                </tr>
            </thead>
        </table>
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

function change_status(member_id, status) {
    var requestURL ='<?php echo U('/home/member/reason');?>';
    if (member_id != '') {
        requestURL += '?id='+member_id;
    }
    layer_show('', requestURL, '500','400');
}




/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}
//批量删除判断是否选择
 function delmember(){
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
            document.forms.result_form.action="<?php echo U('/home/member/delmember/del');?>";
            document.forms.result_form.submit();
        }
        return false;
}
</script>
</body>
</html>