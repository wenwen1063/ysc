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
<title>角色管理-新增角色</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 角色管理 <span class="c-gray en">&gt;</span> 角色信息 <span class="c-gray en">&gt;</span> 新增
        <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回"><i class="Hui-iconfont">&#xe66b;</i></a><a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20">
        <form action="<?php echo U('/home/role/roleadd');?>" name="main_form" method="post" class="form form-horizontal" id="form-user-character-add">
            <div class="row cl">
                <label class="form-label col-2"><span class="c-red">*</span>角色名称：</label>
                <div class="formControls col-10">
                    <input type="text" class="input-text" value="" placeholder="" id="name" name="name" datatype="*4-16" nullmsg="用户账户不能为空">
                </div>
            </div>
           <!--  <div class="row cl">
                <label class="form-label col-2">
                    是否为分店管理：</label>
                <div class="formControls col-5 skin-minimal">
                    <div class="radio-box">
                        <input type="radio" id="depart_admin" name="depart_admin" value="1" checked="true">
                        <label>是</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="depart_admin" name="depart_admin" value="0">
                        <label>否</label>
                    </div>
                </div>
                <div class="col-4"> </div>
            </div> -->
            <div class="row cl">
                <label class="form-label col-2">备注：</label>
                <div class="formControls col-10">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="remark">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2">用户信息：</label>
                <div class="formControls col-10">
                    <dl class="permission-list">
                        <dt>
                            <label>
                                <input type="checkbox" adminid="admin_id" id="user-Character-0"> 全部用户
                            </label>
                        </dt>
                        <dd>
                            <dl class="cl permission-list2">
                                <?php if(is_array($alladmin)): foreach($alladmin as $key=>$v): ?><dd style="display:inline; margin-left:0px;">
                                        <label class="">
                                            <input type="checkbox" value="<?php echo ($v['admin_id']); ?>" name="lvadminid[]" id="user-Character-0-0-0"><?php echo ($v['user']); ?>
                                        </label>
                                    </dd><?php endforeach; endif; ?>
                            </dl>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2">权限节点：</label>
                <div class="formControls col-10">
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><dl class="permission-list">
                            <dt>
                                <label>
                                    <input type="checkbox" value="<?php echo ($v['id']); ?>" id1="<?php echo ($v['id']); ?>" name="lvid[]" id="user-Character-0"> <?php echo ($v['controllername']); ?>
                                </label>
                            </dt>
                            <dd>
                                <?php if(is_array($v['child'])): foreach($v['child'] as $key=>$vo): ?><dl class="cl permission-list2">
                                        <dt>
                                            <label class="">
                                                <input type="checkbox" value="<?php echo ($vo['id']); ?>" id2="<?php echo ($vo['t_id']); ?>" class="checkboxid" name="lvid[]" id="user-Character-0-0-0"><?php echo ($vo['controllername']); ?>
                                            </label>
                                        </dt>
                                        <dd>
                                            <?php if(is_array($vo['child'])): foreach($vo['child'] as $key=>$voo): ?><label class="">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="checkbox" value="<?php echo ($voo['id']); ?>" class="checkboxid" name="lvid[]" id3="<?php echo ($voo['t_id']); ?>" id="user-Character-0-0-0"><?php echo ($voo['controllername']); endforeach; endif; ?>
                                        </dd>
                                    </dl><?php endforeach; endif; ?>
                            </dd>
                        </dl><?php endforeach; endif; ?>
                </div>
            </div>
            <div class="row cl">
                <div class="col-10 col-offset-2">
                    <button type="submit" onclick="return check()" class="btn btn-primary radius" id="admin-role-save"><i class="icon-ok"></i> 保存</button>
                    <input class="btn btn-primary radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
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
    <script type="text/javascript">
    function check() {
        //form1是form中的name属性
        var _form = document.main_form;
        if (trim(_form.name.value) == "") {
            alert("名字不能为空!");
            return false;
        }
        /*document.write("<div id='showtime'style='font-size:9pt;color:#598F03;'></div><br><div align=center style='font-size:9pt;color:#598F03;'>loading...</div><div align=center style='font-size:9pt;color:#598F03;'>数据处理请等待...</div>")*/
        return true;
    }

    function trim(s) {
        var count = s.length;
        var st = 0; // start
        var end = count - 1; // end

        if (s == "") return s;
        while (st < count) {
            if (s.charAt(st) == " ")
                st++;
            else
                break;
        }
        while (end > st) {
            if (s.charAt(end) == " ")
                end--;
            else
                break;
        }
        return s.substring(st, end + 1);
    }
    </script>
    <script>
    // $(function(){

    //  $(".permission-list dt input:checkbox").click(function(){
    //      //$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
    //      var adminid=$(this).attr('adminid');
    //      if (adminid)
    //      {
    //          if ($(this).prop("checked"))
    //             {
    //              $(this).closest(".permission-list").find("input:checkbox").prop("checked",true);
    //          }else{
    //              $(this).closest(".permission-list").find("input:checkbox").prop("checked",false);
    //          }
    //      }
    //      var id1=$(this).attr('id1');
    //      if(id1)
    //      {
    //          if ($(this).prop("checked"))
    //             {
    //              $(this).closest(".permission-list").find("input:checkbox").prop("checked",true);
    //          }else{
    //              $(this).closest(".permission-list").find("input:checkbox").prop("checked",false);
    //          }
    //      }
    //      var l =$(this).parent().parent().find("input:checked").length;
    //      if ($(this).prop("checked"))
    //         {
    //          $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
    //      }
    //         var id2=$(this).val();
    //         if (id2) {
    //             if($(this).prop("checked")==0){
    //                 var idtop=$(this).attr('id2');
    //                 $("input[id3="+id2+"]").prop("checked",false);
    //                 $("input[id1="+idtop+"]").prop("checked",true);
    //             }
    //         }
    //      if(l==0){
    //          $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
    //      }
    //  });
    //  $(".permission-list2 dd input:checkbox").click(function(){
    //      var l =$(this).parent().parent().find("input:checked").length;
    //      var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
    //      if($(this).prop("checked")){
    //          $(this).closest("dl").find("dt input:checkbox").prop("checked",true);
    //          $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
    //      }
    //      else{
    //          if(l==0){
    //              $(this).closest("dl").find("dt input:checkbox").prop("checked",false);
    //          }
    //          if(l2==0){
    //              $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
    //          }
    //      }
    //  });
    // });


    $(function() {

        $(".permission-list dt input:checkbox").click(function() {

            $(this).closest("dl").find("dd input:checkbox").prop("checked", $(this).prop("checked"));
        });

        $(".permission-list2 dd input:checkbox").click(function() {
            var l = $(this).parent().parent().find("input:checked").length;
            var l2 = $(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
            if ($(this).prop("checked")) {
                $(this).closest("dl").find("dt input:checkbox").prop("checked", true);
                $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked", true);
            } else {
                // if (l2 == 0) {
                //     $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked", false);
                // }
            }

        });
    });
    </script>
</body>

</html>