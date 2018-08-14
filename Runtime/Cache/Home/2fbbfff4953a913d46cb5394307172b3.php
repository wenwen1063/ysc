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
<title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  角色管理 <span class="c-gray en">&gt;</span>
   角色信息
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <form action="<?php echo U('/home/Role/roleindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
            <div class="text-c">
            <input type="text" name="id" value="<?php echo ($search['id']); ?>" class="input-text" style="width:250px" placeholder="输入角色编号">
                <input type="text" name="role_name" value="<?php echo ($search['role_name']); ?>" class="input-text" style="width:250px" placeholder="输入角色名称">
                <button type="submit" class="btn btn-success" id=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </div>
    </form>
     <div class="text-c">
                <br><br>
    </div>
    <div class="cl pd-5 bg-1 bk-gray">
        <span class="l">
            <!-- <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>  -->
            <!-- <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','<?php echo U('/home/role/roleadd');?>','800')"> 添加角色</a>  -->
            <a class="btn btn-primary radius" href="<?php echo U('/home/role/roleadd');?>" > 新增 </a>
            </span>
        <span class="r">共有数据：<strong id="strong" value="<?php echo ($count); ?>"><?php echo ($count); ?></strong> 条</span>
    </div>
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="6">角色管理</th>
            </tr>
            <tr class="text-c">
                <!-- <th width="25"><input type="checkbox" value="" name=""></th> -->
                <th width="250">操作</th>
                <th width="250">编号</th>
                <th width="250">角色名</th>
                <th width="250">描述</th>
                <th width="250">状态</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <!-- <td><input type="checkbox" value="" name=""></td> -->
                    <?php if($v['id'] == 1): ?><td></td>
                    <?php else: ?>
                    <td class="f-14">
                     <?php if ($v['is_disable']==0): ?>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/role/roledisable',array('id'=>$v['id'],'disable'=>$v['is_disable']));?>">禁用</a>
                                <?php else: ?>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/role/roledisable',array('id'=>$v['id'],'disable'=>$v['is_disable']));?>">启用</a>
                                <?php endif ?>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/role/roleupdate',array('id'=>$v['id']));?>">编辑</a>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/role/addadmin',array('id'=>$v['id']));?>">新增</a>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/role/delrole',array('id'=>$v['id'],'role_id'=>$v['role_id']));?>" onclick="return confirm('角色删除须谨慎，确认要删除吗？');">删除</a>
<!--                    <a title="编辑" href="<?php echo U('/home/role/roleupdate',array('id'=>$v['id']));?>" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a title="添加" href="<?php echo U('/home/role/addadmin',array('id'=>$v['id']));?>" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe600;</i></a>
                    <a title="删除" href="<?php echo U('/home/role/delrole',array('id'=>$v['id'],'role_id'=>$v['role_id']));?>" onclick="return confirm('角色删除须谨慎，确认要删除吗？');"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a> -->
                    </td><?php endif; ?>
                    <td><?php echo ($v['id']); ?></td>
                    <td><?php echo ($v['role_name']); ?></td>
                    <td><?php echo ($v['role_remark']); ?></td>
                      <?php if ($v['is_disable']==0): ?>
                        <td class="td-status"><span class="label label-success radius">已启用</span></td>
                    <?php else: ?>
                        <td class="td-status"><span class="label radius">已禁用</span></td>
                    <?php endif ?>


                </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="pageright"><?php echo ($page); ?></div>
</div>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
/*管理员-角色-添加*/
function admin_role_add(title,url,w,h){
    layer_show(title,url,w,h);
}
/*管理员-角色-编辑*/
function admin_role_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}
/*管理员-角色-删除*/
function admin_role_del(obj,id){
    layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
        //此处请求后台程序，下方是成功后的前台处理……
        $.ajax({
            type: "POST",
            url: "<?php echo U('/home/role/delrole');?>",
            async: false,
            data: {"id":id},
            dataType: "json",
            success: function(data){

            },
            error: function(data){

            }
        });

        $(obj).parents("tr").remove();
        layer.msg('已删除!',{icon:1,time:1000});
        document.getElementById('strong').innerHTML= <?php echo $count-1;?>;
    });
}
</script>
</body>
</html>