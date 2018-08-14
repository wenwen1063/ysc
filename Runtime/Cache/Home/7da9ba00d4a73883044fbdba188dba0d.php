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

<title>商家管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
    系统 <span class="c-gray en">&gt;</span>
    商家管理 <span class="c-gray en">&gt;</span>
    商家用户列表
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">

    <form action="<?php echo U('/home/Selleruser/Selleruserindex/search/');?>" method="post/get" name="main_form" class="form form-horizontal" id="form-admin-add" style="float:right;">
        <div class="text-c">
            <input type="text" name="s_name" value="<?php echo ($search['s_name']); ?>" class="input-text" style="width:250px" placeholder="输入商家名称">
            <input type="text" name="name" value="<?php echo ($search['name']); ?>" class="input-text" style="width:250px" placeholder="输入用户名称">

            <button type="submit" class="btn btn-success" id=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
    </form>
    <div class="text-c"><br></div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l" style="margin-left: 25%"><a href="<?php echo U('/home/selleruser/selleruseradd');?>" class="btn btn-primary radius"> 新增 </a></span>&nbsp;
        <input type="submit" class="btn btn-danger radius" value="删除" onclick="return deluser()" />
        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span>
    </div>
    <form action="" method="post/get" name="main_form" id="main_form">
    <div class="container row cl">
        <div class="col-3">
            <form action="" method="post/get" name="result_form">
                <div style="height: 760px;overflow-y: scroll">
                    <table class="table table-border table-bordered table-bg table-hover">
                        <thead>
                        <tr class="text-c">
                            <th scope="col" colspan="15">
                                <span style="line-height: 30px">商家列表</span>
                                <!--<span style="line-height: 30px" class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span>-->
                            </th>
                        </tr>
                        <tr class="text-c">
                            <th width="80">商家名称</th>
                            <th width="80">商家编号</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-c">
                            <td><a href="<?php echo U('/home/Selleruser/Selleruserindex');?>" style="text-decoration: none;color: blue">全部商家</a></td>
                            <td></td>
                        </tr>
                        <?php if(is_array($seller)): foreach($seller as $key=>$v): ?><tr class="text-c">
                                <td><a href="<?php echo U('/home/Selleruser/Selleruserindex',array('seller_id'=>$v['seller_id']));?>" style="text-decoration: none;color: blue"><?php echo ($v['s_name']); ?></a></td>
                                <td><?php echo ($v['s_number']); ?></td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="col-9">
            <table class="table table-border table-bordered table-bg table-hover">
                <thead>
                <tr>
                    <th scope="col" colspan="12">商家用户列表</th>
                </tr>
                <tr class="text-c">
                    <th width="25"><input type="checkbox" name="" value=""></th>
                    <th width="40">操作</th>
                    <!--<th width="70">商家信息</th>-->
                    <!--<th width="40">商家简称</th>-->
                    <th width="40">用户名称</th>
                    <th width="40">用户电话</th>
                    <th width="40">email</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                        <td><input type="checkbox" value="<?php echo ($v['id']); ?>" name="id[]" class="input"></td>
                        <td><a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/Selleruser/selleruserdel',array('id'=>$v['id'],'type'=>2));?>" onclick="return confirm('确认要删除吗？');">删除</a></td>
                        <!--<td><?php echo ($v['forshort']); ?>&nbsp;&nbsp;&nbsp;&nbsp;(<?php echo ($v['number']); ?>)</td>-->
                        <td><?php echo ($v['user']); ?></td>
                        <td><?php echo ($v['phone']); ?></td>
                        <td><?php echo ($v['email']); ?></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <!--</form>-->
            <div class="pageright"><?php echo ($page); ?></div>
        </div>
    </div>
</form>
</div>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
<script src="/ysc2/Public/assets/js/jquery.cityselect.js" type="text/javascript"></script>

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
    function deluser(){
        var gnl = confirm('确认要删除吗？');
        if (gnl==true){
//            var chks=document.getElementsByTagName('input');
            var chks=document.getElementsByClassName('input');

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
                document.forms.main_form.action="<?php echo U('/home/selleruser/selleruserdel');?>";
                document.forms.main_form.submit();
            }
        }else{
            return false;
        }
    }
</script>
</body>
</html>