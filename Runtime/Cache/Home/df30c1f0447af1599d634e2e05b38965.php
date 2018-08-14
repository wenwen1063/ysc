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
.box {
    text-align: center;
    font-size: 18px;
    color: white;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
}
</style>
<style type="text/css">
* {
    padding: 0;
    margin: 0;
    font-size: 11px;
    line-height: 18px;
    color: #000;
}

.food_tip {
    width: 207px;
    /*长：227 宽：605*/
    height: 601px;
    text-align: left;
    padding: 20px 10px;
}

p span:first-child {
    float: left;
}

p span:last-child {
    float: right;
}

.shop_name span {
    padding-top: 3px;
}

.shop_name span:nth-child(2) {
    font-size: 13px;
}

.payer_status {
    padding-top: 19px;
    padding-bottom: 33px;
}

.payer_remarks {
    font-size: 12px;
    padding-top: 10px;
    padding-bottom: 13px;
    color: #000;
}

.goods {
    text-align: right;
    padding-bottom: 19px;
}

.goods i {
    color: #000;
}

.color44 span {
    color: #000;
}

.goods p:nth-child(1) {
    text-align: center;
    font-size: 13px;
    padding-bottom: 15px;
    color: #000;
}

.lastColor span:last-child {
    color: #000;
    width: 70px;
    text-align: right;
}

.other_payment {
    padding-bottom: 35px;
}

.payer_address {
    font-size: 12px;
    padding-top: 15px;
}

.telphone {
    padding-bottom: 20px;
}

.text_align_center {
    text-align: center;
}
</style>
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
<title>评价管理</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span>申诉管理 <span class="c-gray en">&gt;</span> 申诉列表
        <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <ul class="left_ul">
            <a href="<?php echo U('/home/appeals/appealsindex',array('seller_id'=>null));?>">
                <li class="maincolor left_ul_li" id="seller_all">全部商家</li>
            </a>
            <?php if(is_array($seller)): foreach($seller as $key=>$v): ?><a href="<?php echo U('/home/appeals/appealsindex',array('seller_id'=>$v['id']));?>">
                    <li class="maincolor left_ul_li" id="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></li>
                </a><?php endforeach; endif; ?>
        </ul>
    </div>
    <div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-10">
        <form action="<?php echo U('/home/appeals/appealsindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
            <div class="text-c">
                <!--<input type="text" id="username" name="username" value="<?php echo ($search['username']); ?>" class="input-text" style="width:150px" placeholder="申诉人">-->
                <input type="text" id="seller_name" name="seller_name" value="<?php echo ($search['seller_name']); ?>" class="input-text" style="width:150px" placeholder="申诉商家">
                <input type="text" id="content" name="content" value="<?php echo ($search['content']); ?>" class="input-text" style="width:150px" placeholder="评论内容">
                <input placeholder="下单时间区间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time']); ?>" name="time" id="time" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                <input placeholder="下单时间区间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time2']); ?>" name="time2" id="time2" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                <span class="select-box inline">
            <select name="status" class="select">
                <?php if($search['status'] == null): ?><option value="">全部状态</option>
                    <option value="0">待处理</option>
                    <option value="1">已通过</option>
                    <option value="2">已驳回</option>

                <?php elseif($search['status'] == 0): ?>
                    <option value="0">待处理</option>
                    <option value="1">已通过</option>
                    <option value="2">已驳回</option>
                    <option value="">全部状态</option>

                <?php elseif($search['status'] == 1): ?>
                    <option value="1">已通过</option>
                    <option value="2">已驳回</option>
                    <option value="">全部状态</option>
                    <option value="0">待处理</option>

                <?php else: ?>
                    <option value="2">已驳回</option>
                    <option value="">全部状态</option>
                    <option value="0">待处理</option>
                    <option value="1">已通过</option><?php endif; ?>
            </select>
            </span>
                <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </div>
        </form>
        <div class="text-c">
            <br>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l"></span>&nbsp;
            <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
        <table class="table table-border table-bordered table-bg">
            <thead>
                <tr>
                    <th scope="col" colspan="20">申诉列表</th>
                </tr>
                <tr class="text-c">
                    <th width="40">操作</th>
                    <th width="40">申诉理由</th>
                    <th width="40">申诉图片</th>
                    <th width="40">申诉状态</th>
                    <th width="40">申诉时间</th>
                    <!--<th width="40">申诉人</th>-->
                    <th width="40">申诉商家</th>
                    <th width="40">审核时间</th>
                    <!-- <th width="40">评论内容</th> -->
                    <th width="40">订单编号</th>
                    <th width="40">所属商家</th>
                    <!--<th width="40">评价类型</th>-->
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                        <td>
                            <?php if (($v['status']==0)): ?>
                            <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/appeals/pass',array('id'=>$v['id'],'type'=>$v['type']));?>">通过</a>
                            <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/appeals/not',array('id'=>$v['id']));?>" class="ml-5" style="text-decoration:none">驳回</a>
                            <?php endif ?>
                        </td>
                        <td>
                        	<center><a class="maincolor" href="<?php echo U('/home/service/serviceinfo',array('id'=>$v['id'],'order_id'=>$v['order_id']));?>"><?php echo ($v['reason']); ?></a></center>
                        	<!--<?php echo ($v['reason']); ?>-->
                        
                        </td>
                        <td width="40"><img height="30" src="/ysc2/Public/uploads/<?php echo ($v['main_pic']); ?>"></td>
                        <td>
                            <?php if($v['status']==0){ echo "待处理"; }elseif($v['status']==1){ echo "已通过"; }else{ echo "已驳回"; } ?>
                        </td>
                        <td><?php echo (date('Y-m-d H:i:s',$v['time'])); ?></td>
                        <!--<td><?php echo ($v['user']); ?></td>-->
                        <td><?php echo ($v['seller_name']); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$v['deal_time'])); ?></td>
                        <!-- <td><?php echo ($v['evaluation_id']); ?></td> -->
                        </td>
                        <!-- <td><?php echo (date('Y-m-d H:i:s',$v['create_time'])); ?></td> -->
                        <td><?php echo ($v['order_number']); ?></td>
                        <td><?php echo ($v['seller_name']); ?></td>
                        <!--<td><?php echo ($v['type']); ?></td>-->
                    <!--    <?php if ($v['reply']!=null): ?>
                        <td><?php echo ($v['reply']); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$v['replytime'])); ?></td>
                        <?php else: ?>
                        <td><span class="label label-success radius">请回复</span></td>
                        <td><span class="label label-success radius">请回复</span></td>
                        <?php endif ?> -->
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
    <script type="text/javascript" src="/ysc2/Public/timejs/laydate.js"></script>
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
    function orderclose() {
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
        } else {
            document.forms.result_form.action = "<?php echo U('/home/order/orderclose');?>";
            document.forms.result_form.submit();
        }
        return false;
    }
    // function orderclose(){
    //     document.forms.main_form.action="<?php echo U('/home/order/orderclose/del');?>";
    //     document.forms.main_form.submit();
    // }
    // function orderpost(){
    //     document.forms.main_form.action="<?php echo U('/home/order/orderpost/out');?>";
    //     document.forms.main_form.submit();
    // }
    </script>
    <script type="text/javascript">
    ! function() {
        laydate.skin('molv'); //切换皮肤，请查看skins下面皮肤库
        laydate({
            elem: '#demo'
        }); //绑定元素
    }();

    //日期范围限制
    var start = {
        elem: '#start',
        format: 'YYYY-MM-DD',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16', //最大日期
        istime: true,
        istoday: false,
        choose: function(datas) {
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
        choose: function(datas) {
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
        choose: function(datas) { //选择日期完毕的回调
            alert('得到：' + datas);
        }
    });

    //日期范围限定在昨天到明天
    laydate({
        elem: '#hello3',
        min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
        max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
    });
    </script>
    <script language="javascript">
    function printHTML(page) {
        var bodyHTML = window.document.body.innerHTML;
        window.document.body.innerHTML = $(page).html();
        window.print();
        window.document.body.innerHTML = bodyHTML;

    }
    </script>
    <script type="text/javascript">
    function close_order(id) {
        var requestURL = '<?php echo U(' / home / order / orderclose ');?>';
        if (id != '') {
            requestURL += '?id=' + id;
        }
        layer_show('', requestURL, '500', '400');
    }
    </script>
</body>

</html>