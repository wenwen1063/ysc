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
<style>
    #content  {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        /*border: 1px solid red;*/
        text-align: left;
        width: 500px;
        height: 50px;
    }
    #content p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        /*border: 1px solid red;*/
        text-align: left;
        width: 495px;
        height:50px;
    }
</style>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 创业社区 <span class="c-gray en">&gt;</span> 文章信息
        <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20">
        <form action="<?php echo U('/home/article/articleindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
            <div class="text-c">
                <input type="text" id="title" name="title" value="<?php echo ($search['title']); ?>" class="input-text" style="width:250px" placeholder="标题名称">
                <input type="text" id="teacher_name" name="teacher_name" value="<?php echo ($search['teacher_name']); ?>" class="input-text" style="width:250px" placeholder="评论员名称">
                <input placeholder="新增时间区间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time']); ?>" name="time" id="time" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                <input placeholder="新增时间区间" class="laydate-icon" style="height:29px;" value="<?php echo ($search['time2']); ?>" name="time2" id="time2" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                  <span class="select-box inline">
            <select name="status" class="select">
                <?php if($search['status'] == null): ?><option value="">全部状态</option>
                    <option value="0">待审核</option>
                    <option value="1">通过</option>
                    <option value="2">不通过</option>
                <?php elseif($search['status'] == 0): ?>
                    <option value="0">待审核</option>
                    <option value="1">通过</option>
                    <option value="2">不通过</option>
                    <option value="">全部状态</option>
                <?php elseif($search['status'] == 1): ?>
                    <option value="1">通过</option>
                    <option value="2">不通过</option>
                    <option value="">全部状态</option>
                    <option value="0">待审核</option>
                <?php else: ?>
                    <option value="2">不通过</option>
                    <option value="">全部状态</option>
                    <option value="0">待审核</option>
                    <option value="1">通过</option><?php endif; ?>
            </select>
            </span>
                <button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
            </div>
        </form>
        <div class="text-c">
            <br>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
        <table class="table table-border table-bordered table-bg">
            <thead>
                <tr>
                    <th scope="col" colspan="20">分类列表</th>
                </tr>
                <tr class="text-c">
                    <th >操作</th>
                    <th >主题</th>
                    <th >内容</th>
                    <th>文章缩略图</th>
                    <th >发表会员</th>
                    <th >发表时间</th>
                    <th>所属分类</th>
                    <th >审核状态</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                        <td class="td-manage">
                            <?php if ($v['status']==0): ?>
                            <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/article/articlepass',array('article_id'=>$v['id']));?>">通过</a>
                            <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/article/articleno',array('article_id'=>$v['id']));?>">不通过</a>
                            <?php else: ?>
                            <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/article/articledel',array('article_id'=>$v['id']));?>" onclick="return confirm('确认要删除吗？');">删除</a>
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="<?php echo U('home/Article/articleinfo',array('id'=>$v['id']));?>" class="maincolor">
                            <?php echo ($v['title']); ?></a>
                        </td>
                        <td style="width: 500px">
                            <div id="content">
                            <?php echo htmlspecialchars_decode($v['content']); ?>
                            </div>
                            <!--<?php echo ($v['content']); ?>-->
                        </td>
                        <td >
                            <img src="/ysc2/Public/Uploads/<?php echo ($v['video']); ?>" alt="" style="width: 50px;height: 50px;overflow: hidden">
                            <!--<?php echo ($v['video']); ?>-->
                        </td>
                        <td><?php echo ($v['username']); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$v['time'])); ?></td>
                        <td><?php echo ($v['class_name']); ?></td>
                        <?php if ($v['status']==0): ?>
                        <td class="td-status"><span class="label label-success radius">待审核</span></td>
                         <?php elseif ($v['status']==1): ?>
                            <td class="td-status"><span class="label label-success radius">已通过</span></td>
                        <?php else: ?>
                        <td class="td-status"><span class="label radius">不通过</span></td>
                        <?php endif ?>
                    </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <div class="pageright"><?php echo ($page); ?></div>
    </div>
</body>

</html>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/timejs/laydate.js"></script>
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
</script>