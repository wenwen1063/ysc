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
<style type="text/css">
    .box {
        text-align: center;
        font-size: 18px;
        color: white;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
    }
</style>
<title>充值提现</title>
</head>

<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 财务管理 <span class="c-gray en">&gt;</span> 用户充值提现 <span class="c-gray en">&gt;</span> 充值提现管理
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <form action="<?php echo U('/home/rechargecash/recharge/search/');?>" method="post/get" name="mainform" class="form form-horizontal" id="form-admin-add" style="float:right;">
        <div class="text-c">
            <input type="text" id="username" name="username" value="<?php echo ($search['username']); ?>" class="input-text" style="width:250px" placeholder="会员名称">
            <input placeholder="开始时间区间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time']); ?>" name="time" id="time" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
            <input placeholder="结束时间区间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time2']); ?>" name="time2" id="time2" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                <span class="select-box inline">
            <select name="type" class="select">
                <?php if($search['type'] == null): ?><option value="">全部类别</option>
                    <option value="1">充值</option>
                    <option value="2">提现</option>
                    <option value="3">赠送</option>
                    <option value="4">扣款</option>
                    <?php elseif($search['type'] == 1): ?>
                    <option value="1">充值</option>
                    <option value="2">提现</option>
                    <option value="3">赠送</option>
                    <option value="4">扣款</option>
                    <option value="">全部类别</option>
                    <?php elseif($search['type'] == 2): ?>
                    <option value="2">提现</option>
                    <option value="3">赠送</option>
                    <option value="4">扣款</option>
                    <option value="">全部类别</option>
                    <option value="1">充值</option>
                    <?php elseif($search['type'] == 3): ?>
                    <option value="3">赠送</option>
                    <option value="4">扣款</option>
                    <option value="">全部类别</option>
                    <option value="1">充值</option>
                    <option value="2">提现</option>
                    <?php else: ?>
                    <option value="4">扣款</option>
                    <option value="">全部类别</option>
                    <option value="1">充值</option>
                    <option value="2">提现</option>
                    <option value="3">赠送</option><?php endif; ?>
            </select>
            </span>

            <span class="select-box inline">
            <select name="is_ok" class="select">
                <?php if($search['is_ok'] == null): ?><option value="">全部状态</option>
                    <option value="0">未完成</option>
                    <option value="1">已完成</option>
                    <option value="2">已拒绝</option>
                    <?php elseif($search['is_ok'] == 0): ?>
                    <option value="0">未完成</option>
                    <option value="1">已完成</option>
                    <option value="2">已拒绝</option>
                    <option value="">全部</option>
                    <?php elseif($search['is_ok'] == 1): ?>
                    <option value="1">已完成</option>
                    <option value="2">已拒绝</option>
                    <option value="">全部</option>
                    <option value="0">未完成</option>
                    <?php else: ?>
                    <option value="2">已拒绝</option>
                    <option value="">全部</option>
                    <option value="0">未完成</option>
                    <option value="1">已完成</option><?php endif; ?>
            </select>
            </span>

            <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
    </form>
    <form action="" method="post/get" name="main_form" id="main_form">
        <div class="text-c">
            <br>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <a href="<?php echo U('/home/rechargecash/rechargesend');?>" class="btn btn-primary radius"> 赠送 </a></span>&nbsp;
            <a href="<?php echo U('/home/rechargecash/rechargeback');?>" class="btn btn-danger radius"> 扣款 </a></span>&nbsp;
            <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
        <table class="table table-border table-bordered table-bg table-hover">
            <thead>
            <tr>
                <th scope="col" colspan="15">充值提现列表</th>
            </tr>
            <tr class="text-c">
                <th width="100">操作</th>
                <!-- <th width="150">账号类型</th> -->
                <th width="150">会员帐号</th>
                <th width="150">金额</th>
                <th width="150">时间</th>
                <th width="150">财务类型</th>
                <th width="150">银行类型</th>
                <th width="150">银行账号</th>
                <th width="150">开户行</th>
                <th width="150">姓名</th>
                <th width="150">状态</th>
                <th width="150">处理时间</th>
                <th width="100">备注</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td>
                        <?php if ($v['is_ok']==0 && $v['type']==2): ?>
                        <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/rechargecash/cashpassuser',array('id'=>$v['id'],'user_id'=>$v['user_id'],'money'=>$v['money'],'type'=>$v['type']));?>" onclick="return confirm('确认要通过提现吗？');">通过</a>
                        <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/rechargecash/cashcloseuser',array('id'=>$v['id'],'user_id'=>$v['user_id'],'money'=>$v['money'],'type'=>$v['type']));?>" onclick="return confirm('确认要拒绝提现吗？');">拒绝</a>
                        <?php endif ?>
                    </td>
                    <!-- <td><?php echo ($v['usertype']); ?></td> -->
                    <td><?php echo ($v['username']); ?></td>
                    <td><?php echo ($v['money']); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s',$v['apply_time'])); ?></td>
                    <?php if ($v['type']==1): ?>
                    <td>充值</td>
                    <?php elseif ($v['type']==2): ?>
                    <td>提现</td>
                    <?php  elseif($v['type']==3): ?>
                    <td>赠送</td>
                    <?php elseif ($v['type']==4): ?>
                    <td>扣款</td>
                    <?php endif ?>
                    <td><?php echo ($v['bank_name']); ?></td>
                    <td><?php echo ($v['open_account']); ?></td>
                    <td><?php echo ($v['open_address']); ?></td>
                    <td><?php echo ($v['open_name']); ?></td>
                    <td><?php
 if($v['is_ok']==0){ echo "未完成";}elseif($v['is_ok']==1){ echo "已完成";}else{echo "已拒绝";} ?></td>
                    <?php if ($v['is_time'] != null): ?>
                    <td><?php echo (date('Y-m-d H:i:s',$v['is_time'])); ?></td>
                    <?php else: ?>
                    <td></td>
                    <?php endif ?>

                    <td><?php echo ($v['note']); ?></td>
                    <!--  <td><?php echo ($v['note']); ?></td> -->
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <div class="pageright"><?php echo ($page); ?></div>
</div>
</form>
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
    function orderclose(){
        document.forms.main_form.action="<?php echo U('/home/order/orderclose/del');?>";
        document.forms.main_form.submit();
    }
    function orderpost(){
        document.forms.main_form.action="<?php echo U('/home/order/orderpost/out');?>";
        document.forms.main_form.submit();
    }
</script>
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