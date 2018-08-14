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
    cursor: pointer;
    background: #3bb4f2;
    padding: 4px 12px;
    color: #fff;
    text-align: center;
    border-radius: 3px;
    overflow: hidden;
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
<title>通用设置</title>
<link href="/ysc2/Public/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<link href="/ysc2/Public/assets/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- <div class="pd-20">
        <div class="panel panel-info">
            <div class="panel-heading">启动图片</div>
            <div class="panel-body">
            <form class="form-horizontal" name="form0" id="form0" method="post" action="<?php echo U('/home/sys/add_start_imgs');?>" enctype="multipart/form-data">
                <div class="row cl">
                    <label class="form-label col-2">最多上传5张图：</label>
                    <div class="formControls col-6" id="pic_list">
                        <div class="pd-10">
                            <input id="j_file_list" name="file[]" type="file" class="file" multiple="multiple" size="20" />
                        </div>
                    </div>
                </div>
                <div class="row cl">
                    <div class="col-9 col-offset-3">
                        <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;上传&nbsp;&nbsp;">
                        <input class="btn btn-default radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
                    </div>
                </div>
            </form>
            </div>
        </div> -->

        <form id="form1" method="post" action="<?php echo U('edit_about_us');?>" role="form" class="form form-horizontal" enctype="multipart/form-data">
            <!-- <div class="panel panel-info">
                <div class="panel-heading">派送设置</div>
                <div class="panel-body">
                <div class="row cl">
                    <label class="form-label col-5">派送范围（米） ：</label>
                    <div class="formControls col-2">
                        <input type="text" name="distance" class="input-text" ignore="ignore" datatype="/^\d+(\.\d+)?$/" errormsg="请输入数字" value="<?php echo ($base["distance"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-5">可选的派送费（元） ：</label>
                    <div class="formControls col-2">
                        <input type="text" name="distribute_fee" class="input-text" ignore="ignore" datatype="/^\d+(\.\d+)?$/" errormsg="请输入数字" value="<?php echo ($base["distribute_fee"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-3" for="distribute">运费 ：</label>
                    <div class="formControls col-2">
                        <input type="text" name="logitics_fee" class="input-text" ignore="ignore" datatype="/^\d+(\.\d+)?$/" errormsg="请输入数字" value="<?php echo ($base["distance"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-5">自动确认物流送达时间（小时）：</label>
                    <div class="formControls col-2">
                        <input type="text" name="logitics_auto_confirm" class="input-text" size="5" ignore="ignore" datatype="/^\d+(\.\d+)?$/" errormsg="请输入数字" value="<?php echo ($base["logitics_auto_confirm"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-5" for="distribute">自动确认物流派送员派送时间（小时）：</label>
                    <div class="formControls col-2">
                        <input type="text" name="distribute_auto_confirm" class="input-text" ignore="ignore" datatype="/^\d+(\.\d+)?$/" errormsg="请输入数字" value="<?php echo ($base["distribute_auto_confirm"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>
            </div>
            </div> -->
            <div class="panel panel-info">
                <div class="panel-heading">通用设置</div>
                <div class="row cl">
                    <label class="form-label col-3" for="name">网站名称：</label>
                    <div class="formControls col-5">
                        <input type="text" name="web_name" class="input-text" placeholder="" value="<?php echo ($base["web_name"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-3" for="name">网站描述：</label>
                    <div class="formControls col-5">
                        <!-- <input type="text" name="dis" class="input-text" placeholder="" value="<?php echo ($base["dis"]); ?>"> -->
                        <textarea name="dis" id="dis" cols="64" rows="10"><?php echo ($base["dis"]); ?></textarea>
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-3" for="name">客服名称：</label>
                    <div class="formControls col-5">
                        <input type="text" name="service_name" class="input-text" placeholder="" value="<?php echo ($base["service_name"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-3" for="tel">客服电话：</label>
                    <div class="formControls col-5">
                        <input type="text" name="service_tel" class="input-text" placeholder="多个客服电话请用英文逗号隔开" value="<?php echo ($base["service_tel"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-3" for="qq">客服QQ：</label>
                    <div class="formControls col-5">
                        <input type="text" name="service_qq" class="input-text" placeholder="多个客服QQ请用英文逗号隔开" value="<?php echo ($base["service_qq"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>
                  <div class="row cl">
                    <label class="form-label col-3" for="key">关键字：</label>
                    <div class="formControls col-5">
                        <input type="text" name="web_key" class="input-text" placeholder="多个关键字请用英文逗号隔开" value="<?php echo ($base["web_key"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>

                </div>
                  <div class="row cl">
                    <label class="form-label col-3" for="key">传真：</label>
                    <div class="formControls col-5">
                        <input type="text" name="fax" class="input-text" placeholder="传真号码" value="<?php echo ($base["fax"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>

                </div>
                  <div class="row cl">
                    <label class="form-label col-3" for="key">地址：</label>
                    <div class="formControls col-5">
                        <input type="text" name="address" class="input-text" placeholder="地址" value="<?php echo ($base["address"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>

                </div>
                  <div class="row cl">
                    <label class="form-label col-3" for="key">备案号：</label>
                    <div class="formControls col-5">
                        <input type="text" name="beian" class="input-text" placeholder="备案号" value="<?php echo ($base["beian"]); ?>">
                    </div>
                    <div class="col-4"> </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-3" for="protocol">用户协议：</label>
                    <div class="formControls col-8">
                        <script id="container_protocol" name="protocol" type="text/plain">
                            <?php echo ($base["protocol"]); ?>
                        </script>
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-3" for="private">隐私政策：</label>
                    <div class="formControls col-8">
                        <script id="container_private" name="private" type="text/plain">
                            <?php echo ($base["private"]); ?>
                        </script>
                    </div>
                    <div class="col-4"> </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-3" for="copyright">版权信息：</label>
                    <div class="formControls col-8">
                        <script id="container_copyright" name="copyright" type="text/plain">
                            <?php echo ($base["copyright"]); ?>
                        </script>
                    </div>
                    <div class="col-4"> </div>
                </div>

                <div class="row cl">
                  <label class="form-label col-3"></span>原推广二维码背景：</label>
                  <div class="formControls col-5">
                    <img src="/ysc2/Public/Uploads/<?php echo ($base["bg_img"]); ?>" width="80">
                  </div>
                  <div class="col-4"> </div>
                </div>

                <div class="row cl">
                  <label class="form-label col-3"><span class="c-red">*</span>推广二维码背景(750*796)：</label>
                  <div class="formControls col-5" style="width:10%;">
                      <a href="javascript:;" class="file">选择图片<input onchange="change()" type="file" id="bg_img" name="pic"></a><p></p>
                      <p id="smtext" class="pic">
                        <img id="picname" name="picname" higth="100" width="100"/>
                      </p>
                  </div>
                  <div class="col-4"> </div>
                </div>

            </div>
            <div class="row cl">
                <div class="col-9 col-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                    <input class="btn btn-default radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
                </div>
            </div>
        </form>

    </div>
    <script src="/ysc2/Public/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/ysc2/Public/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/ysc2/Public/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="/ysc2/Public/ueditor/ueditor.config.js"></script>
    <script src="/ysc2/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/Validform/5.3.2/Validform.min.js"></script>
    <script type="text/javascript">
    $(function() {
      $("#form1").Validform({
        tiptype:2,
        callback:function(form){
          form[0].submit();
          var index = parent.layer.getFrameIndex(window.name);
          parent.$('.btn-refresh').click();
          parent.layer.close(index);
        }
      });
    });

    var ue = UE.getEditor('container_protocol');
    var ue2 = UE.getEditor('container_private');
    var ue3 = UE.getEditor('container_copyright');
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: "<?php echo U('/home/SysNo/get_start_imgs');?>",
            dataType: "json",
            success: function(data) {
                showPhotos(data);
            },
        });

        function showPhotos(djson) {
            var reData = djson;

            var preList = new Array();
            for (var i = 0; i < reData.length; i++) {
                var array_element = reData[i];
                preList[i] = '<img src="/wm/uploads/' + array_element['img'] + '" class="kv-preview-data file-preview-image" style="max-width:100px;height:80px">';
            }

            var previewJson = preList;
            var preConfigList = new Array();
            for (var i = 0; i < reData.length; i++) {
                var array_element = reData[i];
                var tjson = {
                    width: '12px',
                    url: "<?php echo U('/home/sys/delete_start_imgs');?>",
                    key: array_element['id'],
                    extra: {
                        id: 100
                    }
                };
                preConfigList[i] = tjson;
            }

            $('#j_file_list').fileinput('refresh', {
                language: 'zh',
                fileActionSettings: {
                    showZoom: false,
                    showDrag: false,
                    showCaption: false,
                    showUpload: false,
                    showRemove: false
                },
                uploadAsync: true,
                showUpload: false,
                showPreview: true,
                showRemove: false,
                showCancel: false,
                dropZoneEnabled: true,
                maxFileCount: 5,
                initialPreviewShowDelete: true,
                msgFilesTooMany: "选择上传文件数量超过允许的最大值5张",
                initialPreview: previewJson,
                allowedPreviewTypes: ['image'],
                initialPreviewConfig: preConfigList
            }).off('filepreupload').on('filepreupload', function() {
                alert(data.url);
            }).on('fileuploaded', function(event, outData) {
                alert(outData.reponse.id);
            });
        }

        function outputObj(obj) {
            var description = "";
            for (var i in obj) {
                description += i + " = " + obj[i] + "\n";
            }
            alert(description);
        }

        function string(obj) {
            var substr = "";
            if (typeof obj == 'object') {
                for (var i in obj) {

                    substr += i + " = " + eval(obj[i]) + "\n";
                }
            }
            return substr;
        }
    });
    </script>
    <script type="text/javascript">
    function change() {
    var pic = document.getElementById("picname"),
        file = document.getElementById("bg_img");

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
</script>
</body>

</html>