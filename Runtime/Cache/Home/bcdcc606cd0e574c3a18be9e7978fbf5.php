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
<title>商品管理</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 会员升级管理
        <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="pd-20">
        <form action="" method="post/get" name="mainform" class="form form-horizontal" id="form-admin-add" style="float:right;">
            <div class="text-c">
                <input type="text" id="userphone" name="userphone" value="<?php echo ($search['userphone']); ?>" class="input-text" style="width:250px" placeholder="输入会员账号（手机号码）">
                <input type="text" id="username" name="username" value="<?php echo ($search['username']); ?>" class="input-text" style="width:250px" placeholder="输入会员姓名">
                <span class="select-box inline">
            <select name="upgrade_type" class="select">
                <?php if(($search['upgrade_type'] == null) OR ($search['upgrade_type'] == 0) ): ?><option value="">全部升级类型</option>
                    <?php if(is_array($partner)): foreach($partner as $key=>$p): ?><option value="<?php echo ($p['id']); ?>"><?php echo ($p['name']); ?></option><?php endforeach; endif; ?>
                <?php else: ?>
                <option value="<?php echo ($search['upgrade_type']); ?>">
                          <?php echo ($partner1['name']); ?>
                        </option>
                        <?php if(is_array($partner)): foreach($partner as $key=>$p): if($search['upgrade_type'] != $p['id']): ?><option value="<?php echo ($p['id']); ?>"><?php echo ($p['name']); ?></option><?php endif; endforeach; endif; ?>
                    <option value="">全部升级类型</option>`<?php endif; ?>
            </select>
         </span>

                <span class="select-box inline">
            <select name="condition" class="select">
                <?php if($search['condition'] == null): ?><option value="">全部条件</option>
                    <option value="0">软件使用费用</option>
                    <option value="1">消费额</option>
                <?php elseif($search['condition'] == 0): ?>
                    <option value="0">软件使用费用</option>
                    <option value="1">消费额</option>
                    <option value="">全部条件</option>
                <?php else: ?>
                    <option value="1">消费额</option>
                    <option value="">全部条件</option>
                    <option value="0">软件使用费用</option><?php endif; ?>
            </select>
           </span>
            <input placeholder="申请时间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time']); ?>" name="time" id="time" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
            -
            <input placeholder="申请时间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time2']); ?>" name="time2" id="time2" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
            <span class="select-box inline">
            <select name="state" class="select">
                <?php if($search['state'] == null): ?><option value="">全部状态</option>
                    <option value="0">待审核</option>
                    <option value="1">通过</option>
                    <option value="2">不通过</option>
                <?php elseif($search['state'] == 0): ?>
                    <option value="0">待审核</option>
                    <option value="1">通过</option>
                    <option value="2">不通过</option>
                    <option value="">全部状态</option>
                <?php elseif($search['state'] == 1): ?>
                        <option value="1">通过</option>
                    <option value="0">待审核</option>
                    <option value="2">不通过</option>
                    <option value="">全部状态</option>
                <?php else: ?>
                    <option value="2">不通过</option>
                    <option value="1">通过</option>
                    <option value="0">待审核</option>
                    <option value="">全部状态</option><?php endif; ?>
            </select>
            </span>

                <button type="submit" class="btn btn-success" onclick="return search()"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </div>
        </form>
        <form action="" method="post/get" name="main_form" id="main_form">
            <div class="text-c"><br></div>
            <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <input type="hidden" name="type" id="type" value="" />
        <!--<a href="<?php echo U('/home/user/UserAdd');?>" class="btn btn-primary radius"> 新增 </a></span>&nbsp;-->
                <!-- <input type="submit" class="btn btn-danger radius" value="通过" onclick="return outgoods()" style="background-color: #ead047;border-color: #ead047;" />
                <input type="submit" class="btn btn-danger radius" value="不通过" onclick="return ongoods()" style="background-color: #19d419;border-color: #19d419;" /></span> -->

                <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
            <table class="table table-border table-bordered table-bg">
                <thead>
                    <tr>
                        <th scope="col" colspan="14">会员升级列表</th>
                    </tr>
                    <tr class="text-c">
                        <!-- <th width="25"><input type="checkbox" name="" value=""></th>
                        <th width="40">操作</th>
                        <th width="40">会员账号（手机号码）</th> -->
                        <th width="40">会员姓名</th>
                        <th width="40">会员头像</th>

                        <th width="40">原始类型</th>
                        <th width="40">升级类型</th>
                        <th width="40">申请条件</th>
                        <th width="40">付款金额</th>
                        <th width="40">申请时间</th>
                        <th width="40">审核状态</th>
                        <th width="40">审核时间</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                            <!-- <td>
                                <?php if($v['state']==0): ?>
                                <input type="checkbox" value="<?php echo ($v['id']); ?>" name="id[]">
                                <?php endif ?>
                            </td> -->
                            <!-- <td class="td-manage">
                                <?php if($v['state']==0): ?>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/user/userupgrade',array('id'=>$v['id'],'type'=>1));?>" onclick="return confirm('确认要通过吗？');">通过</a>
                                <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/user/userupgrade',array('id'=>$v['id'],'type'=>0));?>" onclick="return confirm('确认要不通过吗？');">不通过</a>
                                <?php endif ?>
                            </td>

                            <td>
                                <a class="maincolor" href="<?php echo U('/home/user/userlook',array('id'=>$v['user_id']));?>"><?php echo ($v['shangphone']); ?></a>
                            </td> -->
                            <td><?php echo ($v['shangname']); ?></td>
                            <td><img src="/ysc2/Public/Uploads/<?php echo ($v['avatar']); ?>" width="40"></td>

                            <td><?php echo ($v['typename']); ?></td>
                            <td><?php echo ($v['sname']); ?></td>

                            <td>
                                <?php if($v['condition'] == 1): ?>消费额
                                    <?php else: ?> 软件使用费<?php endif; ?>
                            </td>
                            <td><?php echo ($v['payment']); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$v['time'])); ?></td>

                            <?php if($v['state']==0): ?>
                            <td class="td-status"><span class="label radius">待审核</span></td>
                            <?php elseif($v['state']==1): ?>
                            <td class="td-status"><span class="label label-success radius">通过</span></td>
                            <?php else: ?>
                            <td class="td-status"><span class="label label-success radius">不通过</span></td>
                            <?php endif ?>
                            <td>
                                <?php if($v['auditing_time'] != 0): echo (date('Y-m-d H:i:s',$v['auditing_time'])); ?>
                                    <?php else: endif; ?>
                            </td>

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
    function member_show(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    function ongoods() {
        $("#type").val(0);
        var gnl = confirm('确认要不通过吗？');
        if(gnl == true) {
            var chks = document.getElementsByTagName('input');
            var bl = true;
            for(var i = 0; i < chks.length; i++) {
                if(chks[i].checked) {
                    bl = false;
                    break;
                }
            }
            if(bl) {
                alert('最少选择一个');
                return false;
            } else {
                document.forms.main_form.action = "<?php echo U('/home/user/userupgrade');?>";
                document.forms.main_form.submit();
            }
        } else {
            return false;
        }
    }

    function outgoods() {
        $("#type").val(1);
        var gnl = confirm('确认要通过吗？');
        if(gnl == true) {
            var chks = document.getElementsByTagName('input');
            var bl = true;
            for(var i = 0; i < chks.length; i++) {
                if(chks[i].checked) {
                    bl = false;
                    break;
                }
            }
            if(bl) {
                alert('最少选择一个');
                return false;
            } else {
                document.forms.main_form.action = "<?php echo U('/home/user/userupgrade');?>";
                document.forms.main_form.submit();
            }
        } else {
            return false;
        }
    }

    function search() {
        document.forms.mainform.action = "<?php echo U('/home/user/upgradeindex/search/');?>";
        document.forms.mainform.submit();
    }
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