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
    .file {
        position: relative;
        display: inline-block;
        background: #D0EEFF;
        border: 1px solid #99D3F5;
        border-radius: 4px;
        padding: 4px 12px;
        overflow: hidden;
        color: #1E88C7;
        text-decoration: none;
        text-indent: 0;
        line-height: 20px;
    }
    .file input {
        position: absolute;
        font-size: 100px;
        right: 0;
        top: 0;
        opacity: 1;
    }
    .file:hover {
        background: #AADFFD;
        border-color: #78C3F3;
        color: #004974;
        text-decoration: none;
    }
</style>
<title>新增</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
    系统 <span class="c-gray en">&gt;</span>
    商家管理 <span class="c-gray en">&gt;</span>
    商家信息 <span class="c-gray en">&gt;</span>
    新增
    <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回" ><i class="Hui-iconfont">&#xe66b;</i></a><a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <form action="<?php echo U('/home/seller/selleradd');?>" method="post" enctype="multipart/form-data" name="main_form" class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>商家编号：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入商家编号" id="number" name="number" datatype="*2-16">
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>商家名称：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入商家名称" id="name" name="name" datatype="*2-16">
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>商家简称：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入商家简称" id="forshort" name="forshort" datatype="*2-16">
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>公司名称：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="xxxx有限公司" id="company_name" name="company_name" datatype="*2-16">
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>商家简介：</label>
            <div class="formControls col-5">
                <!--<input type="text" class="input-text" value="" placeholder="请输入商家简介" name="synopsis" id="synopsis">-->
                <textarea name="synopsis" id="synopsis"  cols="" rows="" class="textarea"  placeholder="请输入商家简介...请输入字符" datatype="*10-100" dragonfly="true" onKeyUp="textarealength(this,300)"></textarea>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>商家logo：</label>
            <div class="formControls col-5" style="width:10%;">
                <a href="javascript:;" class="file">选择图片<input onchange="change()" type="file" id="logo" name="pic[]"></a><p></p>
                <p id="smtext" class="pic">
                    <img id="picname" name="picname" higth="100" width="100"/>
                </p>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>联系人：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入联系人" id="contact" name="contact" datatype="*2-16">
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>商家电话：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入商家电话" id="tel" name="tel" datatype="*2-16">
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入手机号码" id="phone" name="phone" datatype="/^\d+(\.\d+)?$/"  maxlength="12" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"
                >
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>QQ：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入QQ号码" id="qq" name="qq" datatype="/^\d+(\.\d+)?$/"      maxlength="13" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}">
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>微信：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入微信号" id="wechat" name="wechat" datatype="*2-16">
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>商家广告图：</label>
            <div class="formControls col-5" style="width:10%;">
                <a href="javascript:;" class="file">选择图片<input onchange="change2()" type="file" id="ad_pic" name="pic[]"></a><p></p>
                <p id="smtext" class="pic">
                    <img id="picname2" name="picname2" higth="100" width="100"/>
                </p>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>营业执照：</label>
            <div class="formControls col-5" style="width:10%;">
                <a href="javascript:;" class="file">选择图片<input onchange="change3()" type="file" id="license" name="pic[]"></a><p></p>
                <p id="smtext" class="pic">
                    <img id="picname3" name="picname3" higth="100" width="100"/>
                </p>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>经营许可证：</label>
            <div class="formControls col-5" style="width:10%;">
                <a href="javascript:;" class="file">选择图片<input onchange="change4()" type="file" id="business_certificate" name="pic[]"></a><p></p>
                <p id="smtext" class="pic">
                    <img id="picname4" name="picname4" higth="100" width="100"/>
                </p>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>法人身份证（正面）：</label>
            <div class="formControls col-5" style="width:10%;">
                <a href="javascript:;" class="file">选择图片<input onchange="change5()" type="file" id="corporationid_front" name="pic[]"></a><p></p>
                <p id="smtext" class="pic">
                    <img id="picname5" name="picname5" higth="100" width="100"/>
                </p>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>法人身份证（反面）：</label>
            <div class="formControls col-5" style="width:10%;">
                <a href="javascript:;" class="file">选择图片<input onchange="change6()" type="file" id="corporationid_back" name="pic[]"></a><p></p>
                <p id="smtext" class="pic">
                    <img id="picname6" name="picname6" higth="100" width="100"/>
                </p>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>其他资质</label>
            <div class="formControls col-5" style="width:10%;">
                <a href="javascript:;" class="file">选择图片<input onchange="change7()" type="file" id="other" name="pic[]"></a><p></p>
                <p id="smtext" class="pic">
                    <img id="picname7" name="picname7" higth="100" width="100"/>
                </p>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>推荐：</label>
            <div class="formControls col-5 skin-minimal">
                <div class="radio-box">
                    <input type="radio" name="is_recommend" value="1" id="radio1" >
                    <label>是</label>
                </div>
                <div class="radio-box">
                    <input type="radio" name="is_recommend" value="0" checked="true">
                    <label>否</label>
                </div>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red"></span>推荐顺序：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入推荐顺序(不推荐要放空)" id="sort" name="sort" datatype="*2-16">
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>省市区：</label>
            <!--<div id="dist_select" class="formControls col-8">-->
                <!--<select class="prov" name="province"></select>-->
                <!--<select class="city"  name="city"></select>-->
                <!--<select class="dist" name="district"></select>-->
            <!--</div>-->
            <div id="dist_select" style="padding-left: 20px;" class="liststyle ">
                <select class="prov" name="prov" style="height: 30px;border: solid 1px #ddd;vertical-align: middle"></select>
                <select class="city " name="city" style="height: 30px;border: solid 1px #ddd;vertical-align: middle"></select>
                <select class="dist " name="dist" style="height: 30px;border: solid 1px #ddd;vertical-align: middle"></select>
            </div>
            <div class="col-4"> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>详细地址：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="请输入详细地址" id="address" name="address" datatype="*2-16">
            </div>
            <div class="col-4"> </div>
        </div>



        <div class="row cl">
            <div class="col-9 col-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;" onclick="return check()">
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script src="/ysc2/Public/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="/ysc2/Public/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/ysc2/Public/assets/js/jquery.cityselect.js" type="text/javascript"></script>
<script>
    var ue = UE.getEditor('container_ad_content');
</script>
<script type="text/javascript">
    $(function() {
        $("#dist_select").citySelect({
            prov: "",
            city: "",
            dist: "",
            required:false,
            nodata: "none"
        });
    });
</script>
<script type="text/javascript">

    /*if($('input:radio:checked').val() == 0){
        $("#sort").css("display","none")
    }*/

//    $(function(){
//        $("input:radio[name:is_recommend]").change(function(){
//            var v = $(this).val();
//            if (v =="1"){
//                alert(1)
//            }else{
//                alert(2)
//            }
//        });
//    });


</script>
<script type="text/javascript">

    function check(){
        if($('#number').val()==""){
            alert("商家编号不能为空!");
            return false;
        }
        if($('#name').val()==""){
            alert("商家名称不能为空!");
            return false;
        }
        if($('#forshort').val()==""){
            alert("商家简称不能为空!");
            return false;
        }
        if($('#company_name').val()==""){
            alert("公司名称不能为空!");
            return false;
        }
        if($('#synopsis').val()==""){
            alert("商家简介不能为空!");
            return false;
        }
        if($('#logo').val()==""){
            alert("请选择logo图片!");
            return false;
        }
        if($('#contact').val()==""){
            alert("联系人不能为空!");
            return false;
        }
        if($('#tel').val()==""){
            alert("联系电话不能为空!");
            return false;
        }
        if($('#phone').val()==""){
            alert("手机号码不能为空!");
            return false;
        }
        if($('#qq').val()==""){
            alert("qq不能为空!");
            return false;
        }
        if($('#wechat').val()==""){
            alert("微信不能为空!");
            return false;
        }
        if($('#ad_pic').val()==""){
            alert("请选择广告图片!");
            return false;
        }
        if($('#license').val()==""){
            alert("请选择营业执照!");
            return false;
        }
        if($('#business_certificate').val()==""){
            alert("请选择选择经营许可证!");
            return false;
        }
        if($('#corporationid_front').val()==""){
            alert("请选择法人身份证正面!");
            return false;
        }
        if($('#corporationid_back').val()==""){
            alert("请选择法人身份证背面!");
            return false;
        }
//         if($('.province').val()==""){
//             alert("省份不能为空!");
//             return false;
//         }
//         if($('.city').val()==""){
//             alert("城市不能为空!");
//             return false;
//         }
//         if($('.district').val()==""){
//             alert("区/县不能为空!");
//             return false;
//         }
        if($('#address').val()==""){
            alert("详细地址不能为空!");
            return false;
        }
       /* if($('#email').val()==""){
            alert("邮箱不能为空!");
            return false;
        }*/
        return true;
    }
</script>
<script type="text/javascript">
    function change() {
        var pic = document.getElementById("picname"),
                file = document.getElementById("logo");

        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
            alert("图片的格式必须为png或者jpg或者jpeg格式！");
            return;
        }
        var isIE = navigator.userAgent.match(/MSIE/)!= null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;

        if(isIE) {
            file.select();
            var reallocalpath = document.selection.createRange().text;

            // IE6浏览器设置img的src为本地路径可以直接显示图片
            if (isIE6) {
                pic.src = reallocalpath;
            }else {
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
            }
        }else {
            html5Reader(file);
        }
    }

    function html5Reader(file){
        var file = file.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var pic = document.getElementById("picname");
            pic.src=this.result;
        }
    }

    function change2() {
        var pic = document.getElementById("picname2"),
                file = document.getElementById("ad_pic");

        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
            alert("图片的格式必须为png或者jpg或者jpeg格式！");
            return;
        }
        var isIE = navigator.userAgent.match(/MSIE/)!= null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;

        if(isIE) {
            file.select();
            var reallocalpath = document.selection.createRange().text;

            // IE6浏览器设置img的src为本地路径可以直接显示图片
            if (isIE6) {
                pic.src = reallocalpath;
            }else {
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
            }
        }else {
            html5Reader2(file);
        }
    }

    function html5Reader2(file){
        var file = file.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var pic = document.getElementById("picname2");
            pic.src=this.result;
        }
    }

    function change3() {
        var pic = document.getElementById("picname3"),
                file = document.getElementById("license");

        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
            alert("图片的格式必须为png或者jpg或者jpeg格式！");
            return;
        }
        var isIE = navigator.userAgent.match(/MSIE/)!= null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;

        if(isIE) {
            file.select();
            var reallocalpath = document.selection.createRange().text;

            // IE6浏览器设置img的src为本地路径可以直接显示图片
            if (isIE6) {
                pic.src = reallocalpath;
            }else {
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
            }
        }else {
            html5Reader3(file);
        }
    }

    function html5Reader3(file){
        var file = file.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var pic = document.getElementById("picname3");
            pic.src=this.result;
        }
    }

    function change4() {
        var pic = document.getElementById("picname4"),
                file = document.getElementById("business_certificate");

        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
            alert("图片的格式必须为png或者jpg或者jpeg格式！");
            return;
        }
        var isIE = navigator.userAgent.match(/MSIE/)!= null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;

        if(isIE) {
            file.select();
            var reallocalpath = document.selection.createRange().text;

            // IE6浏览器设置img的src为本地路径可以直接显示图片
            if (isIE6) {
                pic.src = reallocalpath;
            }else {
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
            }
        }else {
            html5Reader4(file);
        }
    }

    function html5Reader4(file){
        var file = file.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var pic = document.getElementById("picname4");
            pic.src=this.result;
        }
    }

    function change5() {
        var pic = document.getElementById("picname5"),
                file = document.getElementById("corporationid_front");

        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
            alert("图片的格式必须为png或者jpg或者jpeg格式！");
            return;
        }
        var isIE = navigator.userAgent.match(/MSIE/)!= null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;

        if(isIE) {
            file.select();
            var reallocalpath = document.selection.createRange().text;

            // IE6浏览器设置img的src为本地路径可以直接显示图片
            if (isIE6) {
                pic.src = reallocalpath;
            }else {
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
            }
        }else {
            html5Reader5(file);
        }
    }

    function html5Reader5(file){
        var file = file.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var pic = document.getElementById("picname5");
            pic.src=this.result;
        }
    }

    function change6() {
        var pic = document.getElementById("picname6"),
                file = document.getElementById("corporationid_back");

        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
            alert("图片的格式必须为png或者jpg或者jpeg格式！");
            return;
        }
        var isIE = navigator.userAgent.match(/MSIE/)!= null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;

        if(isIE) {
            file.select();
            var reallocalpath = document.selection.createRange().text;

            // IE6浏览器设置img的src为本地路径可以直接显示图片
            if (isIE6) {
                pic.src = reallocalpath;
            }else {
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
            }
        }else {
            html5Reader6(file);
        }
    }

    function html5Reader6(file){
        var file = file.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var pic = document.getElementById("picname6");
            pic.src=this.result;
        }
    }

    function change7() {
        var pic = document.getElementById("picname7"),
                file = document.getElementById("other");

        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
            alert("图片的格式必须为png或者jpg或者jpeg格式！");
            return;
        }
        var isIE = navigator.userAgent.match(/MSIE/)!= null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;

        if(isIE) {
            file.select();
            var reallocalpath = document.selection.createRange().text;

            // IE6浏览器设置img的src为本地路径可以直接显示图片
            if (isIE6) {
                pic.src = reallocalpath;
            }else {
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
            }
        }else {
            html5Reader7(file);
        }
    }

    function html5Reader7(file){
        var file = file.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var pic = document.getElementById("picname7");
            pic.src=this.result;
        }
    }
</script>
</body>
</html>