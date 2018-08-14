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
<title>用户设置</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 用户管理 <span class="c-gray en">&gt;</span> 用户信息 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20">
        <form action="<?php echo U('/home/admin/adminindex/search/');?>" method="post/get" name="main_form1" class="form form-horizontal" id="form-admin-add" style="float:right;">
            <div class="text-c">
            <input type="text" name="phone" value="<?php echo ($search['phone']); ?>" class="input-text" style="width:250px" placeholder="输入用户手机号">
                <input type="text" name="user" value="<?php echo ($search['user']); ?>" class="input-text" style="width:250px" placeholder="输入用户名称">
                <button type="submit" class="btn btn-success" id=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </div>
        </form>
        <form action="<?php echo U('/home/admin/deladmin/del');?>" method="post/get" name="main_form">
            <div class="text-c">
                <br>
            </div>
            <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <a href="<?php echo U('/home/admin/adminadd');?>" class="btn btn-primary radius"> 新增 </a></span>&nbsp;
                <input type="submit" class="btn btn-danger radius" value="删除" onclick="return deladmin()" />
                <!-- <i class="Hui-iconfont">&#xe6e2;</i> -->
                <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
            <table class="table table-border table-bordered table-bg">
                <thead>
                    <tr>
                        <th scope="col" colspan="9">用户列表</th>
                    </tr>
                    <tr class="text-c">
                        <th width="100">
                            <input type="checkbox" name="" value="">
                        </th>
                        <th width="200">操作</th>
                        <th width="150">编号</th>
                        <th width="200">用户账号</th>
                        <!-- <th width="200">用户密码</th> -->
                        <th width="300">用户邮箱</th>
                        <th width="200">手机号码</th>
                        <th width="300">创建时间</th>
                        <!-- <th width="150">状态</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                            <td>
                                <input type="checkbox" value="<?php echo ($v['id']); ?>" name="id[]">
                            </td>
                            <td class="td-manage">
                                 <!--<?php if ($v['is_disable']==0): ?>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/admin/admindisable',array('id'=>$v['id'],'disable'=>$v['is_disable']));?>">禁用</a>
                                <?php else: ?>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/admin/admindisable',array('id'=>$v['id'],'disable'=>$v['is_disable']));?>">启用</a>
                                <?php endif ?> -->
                               <?php if ($v['id']!=1): ?>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/admin/adminupdate',array('id'=>$v['id'],'admin_id'=>$v['admin_id']));?>">编辑</a>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/admin/deladmin',array('id'=>$v['id'],'admin_id'=>$v['admin_id'],'type'=>2));?>" onclick="return confirm('确认要删除吗？');">删除</a>
                            <?php endif ?> 
                            </td>
                            <td><?php echo ($v['id']); ?></td>
                            <td><!-- <u style="cursor:pointer" class="text-primary" onclick="member_show('<?php echo ($v["user"]); ?>','<?php echo U('/home/admin/adminshow', array('id'=>$v['id']));?>','1001','400','600')"> --><?php echo ($v['user']); ?></td>
                            <!-- <td><?php echo ($v['password']); ?></td> -->
                    <td><?php echo ($v['email']); ?></td>
                    <td><?php echo ($v['phone']); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s',$v['create_time'])); ?></td>
                   <!--  <?php if ($v['is_disable']==0): ?>
                        <td class="td-status"><span class="label label-success radius">已启用</span></td>
                    <?php else: ?>
                        <td class="td-status"><span class="label radius">已禁用</span></td>
                    <?php endif ?> -->


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
 function deladmin(){
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
            document.forms.main_form.action="<?php echo U('/home/admin/deladmin/del');?>";
            document.forms.main_form.submit();
        }
        return false;
}
</script>
</body>
</html>