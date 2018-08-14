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
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 分类信息 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20">
        <form action="<?php echo U('/home/informationclass/informationclassindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
            <div class="text-c">
                <input type="text" id="name" name="name" value="<?php echo ($search['name']); ?>" class="input-text" style="width:250px" placeholder="输入名称">
                <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </div>
        </form>
        <div class="text-c">
            <br>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <a href="<?php echo U('/home/informationclass/informationclassadd');?>" class="btn btn-primary radius"><i class="Hui-iconfont"></i> 新增 </a></span>&nbsp;
            <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
        <table class="table table-border table-bordered table-bg">
            <thead>
                <tr>
                    <th scope="col" colspan="13">分类列表</th>
                </tr>
                <tr class="text-c">
                    <th width="200">操作</th>
                    <th width="200">编号</th>
                    <th width="200">分类名称</th>
                    <!--<th width="200">是否帮助中心分类</th>-->
                    <th width="200">状态</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                        <td class="td-manage">
                            <?php if ($v['is_disable']==0): ?>
                            <a class="btn btn-primary size-MINI radius" style="text-decoration:none" href="<?php echo U('/home/informationclass/informationclassdisable',array('id'=>$v['id'],'is_disable'=>$v['is_disable']));?>">禁用</a>
                            <?php else: ?>
                            <a class="btn btn-primary size-MINI radius" style="text-decoration:none" href="<?php echo U('/home/informationclass/informationclassdisable',array('id'=>$v['id'],'is_disable'=>$v['is_disable']));?>">启用</a>
                            <?php endif ?>
                            <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/informationclass/informationclassupdate',array('id'=>$v['id']));?>" class="ml-5" style="text-decoration:none">编辑</a>
                            <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/informationclass/informationclassdel',array('id'=>$v['id']));?>" onclick="return confirm('确认要删除吗？');" class="ml-5" style="text-decoration:none">删除</a>
                        </td>
                        <td><?php echo ($v['number']); ?></td>

                        <td><?php echo ($v['name']); ?></td>
                        <!--<?php if ($v['is_help']==0): ?>-->
                        <!--<td class="td-status"><span class="label radius">否</span></td>-->
                        <!--<?php else: ?>-->
                        <!--<td class="td-status"><span class="label label-success radius">是</span></td>-->
                        <!--<?php endif ?>-->
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
    function member_show(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }
    /*管理员-编辑*/
    function admin_edit(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }
    //批量删除判断是否选择
    function Check() {
        var chks = document.getElementsByTagName('input');
        var bl = true;
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                bl = false;
                break;
            }
        }
        if (bl) {
            alert('最少选择一个');
            return false;
        }
    }
    </script>
</body>

</html>