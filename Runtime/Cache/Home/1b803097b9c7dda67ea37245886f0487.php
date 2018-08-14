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
<title>商品管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  会员管理 <span class="c-gray en">&gt;</span>
   会员列表
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <form action="" method="post/get" name="mainform" class="form form-horizontal" id="form-admin-add" style="float:right;">
        <div class="text-c">
            <input type="text" id="userphone" name="userphone" value="<?php echo ($search['userphone']); ?>" class="input-text" style="width:250px" placeholder="输入会员账号">
            <input type="text" id="username" name="username" value="<?php echo ($search['username']); ?>" class="input-text" style="width:250px" placeholder="输入会员姓名">
            <input type="text" id="introduce" name="introduce" value="<?php echo ($search['introduce']); ?>" class="input-text" style="width:250px" placeholder="输入推荐会员账号">
            <span class="select-box inline">
            <select name="is_disable" class="select">
                <?php if($search['is_disable'] == null): ?><option value="">全部状态</option>
                    <option value="0">启用</option>
                    <option value="1">禁用</option>
                <?php elseif($search['user_type'] == 0): ?>
                    <option value="0">启用</option>
                    <option value="1">禁用</option>
                    <option value="">全部状态</option>
                <?php else: ?>
                    <option value="1">禁用</option>
                    <option value="">全部状态</option>
                    <option value="0">启用</option><?php endif; ?>

            </select>
            </span>
            <button type="submit" class="btn btn-success" onclick="return search()"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
    </form>
    <form action="" method="post/get" name="main_form" id="main_form">
    <div class="text-c"><br></div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <a href="<?php echo U('/home/user/UserAdd');?>" class="btn btn-primary radius"> 新增 </a></span>&nbsp;
        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="14">会员列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">操作</th>
                <th width="40">会员账号（手机号码）</th>
                <th width="40">会员姓名</th>
                <!--<th width="40">关联微信号</th>-->
                <th width="40">会员头像</th>
                <th width="40">所在地区（省市区）</th>
                <th width="40">详细地址</th>
                <th width="40">邮箱</th>
                
                <th width="40">推荐会员账号</th>
                <th width="40">推荐会员姓名</th>
                <th width="40">备注</th>
                <th width="40">会员状态</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td><input type="checkbox" value="<?php echo ($v['goods_id']); ?>" name="goods_id[]"></td>
                    <td class="td-manage">
                    <?php if($v['is_disable']==0): ?>
                    	<a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/user/userdisable',array('id'=>$v['id'],'type'=>1));?>" onclick="return confirm('确认要禁用吗？');">禁用</a>
                    <?php else: ?>
                    	<a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/user/userdisable',array('id'=>$v['id'],'type'=>0));?>" onclick="return confirm('确认要启用吗？');">启用</a>
                    <?php endif ?>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/user/userupdate',array('id'=>$v['id']));?>">编辑</a>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/user/userdel',array('id'=>$v['id']));?>" onclick="return confirm('确认要删除吗？');">删除</a>
                    </td>
                     <td><a class="maincolor" href="<?php echo U('/home/user/userlook',array('id'=>$v['id']));?>"><?php echo ($v['userphone']); ?></a></td>
                    <!--<td><center><u style="cursor:pointer" class="text-primary"
                    		onclick="member_show('<?php echo ($v["userphone"]); ?>','<?php echo U('/home/user/userlook', array('id'=>$v['id']));?>','10001','600','400')"><?php echo ($v['userphone']); ?></center>
											</td>-->
                    <!--<td><?php echo ($v['username']); ?></td>-->
                    <td><?php echo userTextDecode($v['username']);?></td>
                    <td>
                    	<?php if ($v['is_xg']==0): ?>
                <img src="<?php echo ($v['avatar']); ?>" alt="" width="40">
                <?php else : ?>
                <img src="/ysc2/Public/Uploads/<?php echo ($v['avatar']); ?>" alt="" id="headimg" width="40">
            <?php endif ?>
                    	<!--<img src="/ysc2/Public/Uploads/<?php echo ($v['avatar']); ?>" width="40">-->
                    
                    </td>
                    <td><?php echo ($v['province']); echo ($v['city']); echo ($v['district']); ?></td>
                    <td><?php echo ($v['address']); ?></td>
                    <td><?php echo ($v['email']); ?></td>
                    <td><a class="maincolor" href="<?php echo U('/home/user/userlook',array('id'=>$v['introduce']));?>"><?php echo ($v['shangphone']); ?></a></td>
                    <td><?php echo userTextDecode($v['shangname']);?></td>
                    <td><?php echo ($v['remark']); ?></td>
                    <?php if($v['is_disable']==0): ?>
                        <td class="td-status"><span class="label radius">已启用</span></td>
                    <?php else: ?>
                        <td class="td-status"><span class="label label-success radius">已禁用</span></td>
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
function member_show(title,url,id,w,h){
    layer_show(title,url,w,h);
}
//批量删除判断是否选择
function delgoods(){
    var gnl = confirm('确认要删除吗？');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsdel/del');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}
function ongoods(){
    var gnl = confirm('确认要上架吗？');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsonsale/on');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}
function outgoods(){
    var gnl = confirm('确认要下架吗？');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsoutsale/');?>";
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
    document.forms.mainform.action="<?php echo U('/home/user/index/search/');?>";
    document.forms.mainform.submit();
}
</script>