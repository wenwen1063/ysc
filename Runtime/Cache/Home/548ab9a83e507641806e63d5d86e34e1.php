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
<style type="text/css">
.left_ul {
    list-style-type: none;
    /*border:1px solid rgb(179,179,179);*/
}

.left_ul_li {
    text-align: center;
    border-bottom: 1px solid rgb(179, 179, 179);
}
</style>
<title>售后服务管理</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 售后服务信息
        <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <ul class="left_ul">
            <a href="<?php echo U('/home/service/serviceindex',array('seller_id'=>null));?>">
                <li class="maincolor left_ul_li" id="seller_all">全部商家</li>
            </a>
            <?php if(is_array($seller)): foreach($seller as $key=>$v): ?><a href="<?php echo U('/home/service/serviceindex',array('seller_id'=>$v['id']));?>">
                    <li class="maincolor left_ul_li" id="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></li>
                </a><?php endforeach; endif; ?>
        </ul>
    </div>
    <div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-10">
        <form action="<?php echo U('/home/service/serviceindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
            <div class="text-c">
                <input type="text" name="order_number" value="<?php echo ($search['order_number']); ?>" class="input-text" style="width:250px" placeholder="输入订单号">
                <span class="select-box inline">
            <select name="status" class="select">
                <?php if($search['type'] == null): ?><option value="">全部类型</option>
                    <option value="1">退款</option>
                    <option value="2">退货</option>
                <?php elseif($search['type'] == 1): ?>
                    <option value="1">退款</option>
                    <option value="2">退货</option>
                    <option value="">全部类型</option>
                <?php else: ?>
                    <option value="2">退货</option>
                    <option value="">全部类型</option>
                    <option value="1">退款</option<?php endif; ?>
            </select>
            </span>
                <button type="submit" class="btn btn-success" id=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </div>
        </form>
        <form action="" method="post" name="main_form">
            <div class="text-c">
                <br>
            </div>
            <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"></span>&nbsp;
                <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
            <table class="table table-border table-bordered table-bg">
                <thead>
                    <tr>
                        <th scope="col" colspan="13">售后信息列表</th>
                    </tr>
                    <tr class="text-c">
                        <th width="100">操作</th>
                        <th width="100">售后服务订单号</th>
                        <th width="100">订单编号</th>
                        <th width="100">所属商家</th>
                        <th width="100">申请类型</th>
                        <th width="200">申请时间</th>
                        <th width="100">申请人</th>
                        <th width="100">服务状态</th>
                        <th width="200">备注</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                            <td class="td-manage">
                                <?php if (($v['status']==0)): ?>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/service/pass',array('id'=>$v['id'],'type'=>$v['type']));?>">通过</a>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/service/no',array('id'=>$v['id'],'type'=>$v['type']));?>">拒绝</a>
                                <?php endif ?>
                                	
                                <?php if (($v['status']==1)&&($v['type']==2)): ?>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/service/serviceprice',array('id'=>$v['id'],'type'=>$v['type'],'order_id'=>$v['order_id'],'member_id'=>$v['member_id']));?>">确认收货</a>
                                <?php endif ?>
                                <?php if (($v['status']==2)&&($v['type']==1)): ?>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/service/serviceprice',array('id'=>$v['id'],'type'=>$v['type'],'order_id'=>$v['order_id'],'member_id'=>$v['member_id']));?>">确认退款</a>
                                <?php endif ?>
                            </td>
                            <td class="text-l">
                                <center><a class="maincolor" href="<?php echo U('/home/service/serviceinfo',array('id'=>$v['id'],'order_id'=>$v['order_id']));?>"><?php echo ($v['service_number']); ?></a></center>
                            </td>
                            <td><?php echo ($v['order_number']); ?></td>
                            <td><?php echo ($v['seller_name']); ?></td>
                            <td>
                                 <?php if($v['type']==1){ echo "退款"; }else{ echo "退货"; } ?>
                            </td>
                            <td><?php echo (date('Y-m-d H:i:s',$v['apply_time'])); ?></td>
                            <td><?php echo ($v['username']); ?></td>
                            <td>
                                <?php if($v['status']==0){ echo "待通过"; }elseif($v['status']==1){ echo "待退货"; }elseif($v['status']==2){ echo "待退款"; }elseif($v['status']==3){ echo "待换货"; }elseif($v['status']==4){ echo "已完成"; }elseif($v['status']==5){ echo "拒绝退货"; }elseif($v['status']==6){ echo "拒绝退款"; }else{ echo "拒绝换货"; } ?>
                            </td>
                            <td><?php echo ($v['remark']); ?></td>
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
                                                                w       弹出层宽度（缺省调默认值
                                                                h       弹出层高度（缺省调默认值）
                                                            */
    /*用户-查看*/
    function service_show(title, url, id, w, h) {
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