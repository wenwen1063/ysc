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
<script type="text/javascript" src="/ysc2/Public/timejs/laydate.js"></script>
<title>优惠券管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
   优惠券管理 <span class="c-gray en">&gt;</span>
   优惠券列表
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <form action="<?php echo U('/home/discount/discountindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
        <div class="text-c">
            <input type="text" id="name" name="name" value="<?php echo ($search['name']); ?>" class="input-text" style="width:150px" placeholder="输入名称">
            <input type="text" id="sm_money" name="sm_money" value="<?php echo ($search['sm_money']); ?>" class="input-text" style="width:150px" placeholder="输入面额">
            至
            <input type="text" id="lg_money" name="lg_money" value="<?php echo ($search['lg_money']); ?>" class="input-text" style="width:150px" placeholder="输入面额">
            <input placeholder="开始时间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time']); ?>" name="time" id="time" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
            <input placeholder="结束时间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time2']); ?>" name="time2" id="time2" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
            <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
    </form>
    <form action="<?php echo U('/home/discount/delmember/del');?>" method="post/get" name="main_form">
        <div class="text-c"><br></div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <a href="<?php echo U('/home/discount/discountadd');?>" class="btn btn-primary radius"> 新增 </a></span>&nbsp;
        <a href="<?php echo U('/home/discount/discountsend');?>" class="btn btn-primary radius"> 发放 </a></span>&nbsp;
        <!-- <input type="submit" class="btn btn-danger radius" value="删除" onclick="return Check()" /> --><!-- <i class="Hui-iconfont">&#xe6e2;</i> -->
        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="13">优惠券列表</th>
            </tr>
            <tr class="text-c">
                <th width="40">操作</th>
                <th width="40">所属商家</th>
                <th width="40">名称</th>
                <th width="40">面值</th>
                <th width="40">开始时间</th>
                <th width="80">结束时间</th>
                <th width="80">领取用户</th>
                <th width="100">限制使用金额</th>
                <th width="40">发行量</th>
                <th width="40">剩余量</th>
                <th width="40">已领取量</th>
                <th width="40">已使用量</th>
                <th width="40">状态</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td class="td-manage">
                    <?php if ($v['is_disable']==0): ?>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/discount/discountdisable',array('id'=>$v['id'],'is_disable'=>$v['is_disable']));?>">禁用</a>
                    <?php else: ?>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/discount/discountdisable',array('id'=>$v['id'],'is_disable'=>$v['is_disable']));?>">启用</a>
                    <?php endif ?>
                    <?php if($v['is_ing'] == 0): ?><a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/discount/discountupdate',array('id'=>$v['id']));?>">编辑</a>
                        <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/discount/discountdel',array('id'=>$v['id']));?>" onclick="return confirm('确认要删除吗？');">删除</a><?php endif; ?>
                    </td>
                    <!--<td><?php if($v['seller_id'] == 0): ?>全平台<?php else: echo ($v['s_name']); endif; ?></td>-->
                    <td><?php echo ($v['s_name']); ?></td>
                    <!--<td><?php echo ($v['forshort']); ?>（<?php echo ($v['s_number']); ?>）</td>-->
                    <td><?php echo ($v['name']); ?></td>
                    <td><?php echo ($v['money']); ?>元</td>
                    <td><?php echo (date('Y-m-d H:i:s',$v['start_time'])); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s',$v['end_time'])); ?></td>
                    <td><?php if($v['get_user'] == 0): ?>新用户<?php else: ?>普通用户<?php endif; ?></td>
                    <td><?php echo ($v['use_condition']); ?>元</td>
                    <td><?php echo ($v['out_number']); ?></td>
                    <td><?php echo ($v['remain_number']); ?></td>
                    <td><?php echo ($v['got_number']); ?></td>
                    <td><?php echo ($v['used_number']); ?></td>
                    <?php if ($v['is_disable']==0): ?>
                        <td class="td-status"><span class="label label-success radius">已启用</span></td>
                    <?php else: ?>
                        <td class="td-status"><span class="label radius">已禁用</span></td>
                    <?php endif ?>
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
!function(){
  laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
  laydate({elem: '#demo'});//绑定元素
}();

//日期范围限制
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};

var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，充值开始日的最大日期
    }
};
laydate(start);
laydate(end);

//自定义日期格式
laydate({
    elem: '#test1',
    format: 'YYYY年MM月DD日',
    festival: true, //显示节日
    choose: function(datas){ //选择日期完毕的回调
        alert('得到：'+datas);
    }
});

//日期范围限定在昨天到明天
laydate({
    elem: '#hello3',
    min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
    max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
});
</script>
</body>
</html>