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
<link href="/ysc2/Public/admin/lib/icheck/icheck.css" rel="stylesheet" type="text/css" />
<link href="/ysc2/Public/admin/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/ysc2/Public/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
<script src="/ysc2/Public/ueditor/ueditor.config.js"></script>
<script src="/ysc2/Public/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/timejs/laydate.js"></script>
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
<title>编辑资讯</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯信息 <span class="c-gray en">&gt;</span> 编辑 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回"><i class="Hui-iconfont">&#xe66b;</i></a><a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20">
        <form action="<?php echo U('/home/information/informationupdate');?>" name="main_form" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
             <input type="hidden" name="rtitle" value="<?php echo ($data['title']); ?>">
            <div class="row cl">
                <label class="form-label col-2"><span class="c-red">*</span>资讯主题：</label>
                <div class="formControls col-4">
                    <input type="text" class="input-text" value="<?php echo ($data['title']); ?>" placeholder="输入资讯名称" id="information_title" name="title">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2">
                    <span class="c-red">* </span>资讯类型：
                </label>
                <div class="formControls col-4">
                    <span class="select-box">
                        <select class="select" size="1" name="class_id" id="class_id">
                            <option value="<?php echo ($data['class_id']); ?>"><?php echo ($data['name']); ?></option>
                            <?php if(is_array($goodsClasses)): foreach($goodsClasses as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['class_name']); ?></option><?php endforeach; endif; ?>
                        </select>
                     </span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2"><span class="c-red">*</span>资讯图片：</label>
                <div class="formControls col-5" style="width:10%;">
                <?php if ($data['pic']!=null): ?>
                    <img height="80" width="80" src="/ysc2/Public/Uploads/<?php echo ($data['pic']); ?>">
                <?php endif?>
                    <p></p>
                    <a href="javascript:;" class="file">选择图片<input onchange="change()" type="file" id="sm_logo" name="sm_logo"></a>
                    <p></p>
                    <p id="smtext" class="sm_logo">
                        <img id="smlogo" name="smlogo" higth="60" width="60" />
                    </p>
                </div>
            </div>
            <input type="hidden" name="allpic" id="allpic">
            <div class="row cl">
                <label class="form-label col-2">资讯内容：</label>
                <div class="formControls col-10">
                    <script id="container_content" name="content" type="text/plain"><?php echo ($data['content']); ?></script>
                </div>
            </div>

            <div class="row cl">
                <div class="col-10 col-offset-2">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;" onclick="return check()">
                    <input class="btn btn-default radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
                </div>
            </div>
        </form>
        </div>
        </div>
        <script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
        <script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
        <script type="text/javascript" src="/ysc2/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
        <script type="text/javascript" src="/ysc2/Public/admin/lib/Validform/5.3.2/Validform.min.js"></script>
        <script type="text/javascript" src="/ysc2/Public/admin/lib/webuploader/0.1.5/webuploader.min.js"></script>
        <script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
        <script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
        <script type="text/javascript">
        function yesbook() {
            $("#bookmax").css('display', 'block');
        }

        function nobook() {
            $("#bookmax").css('display', 'none');
        }

        function yesstock() {
            $("#stockall").css('display', 'block');
        }

        function nostock() {
            $("#stockall").css('display', 'none');
        }

        </script>
        <script>
        var ue = UE.getEditor('container_content');
        </script>
        <script type="text/javascript">
        function check() {
            if ($('#information_title').val() == "") {
                alert("资讯名称不能为空!");
                return false;
            }
            var content=ue.getPlainTxt();
            // alert(content.length)
            if ((content.length-1)=='') {
                alert("资讯内容不能为空!");
                return false;
            }
            return true;
        }
        </script>
        <script type="text/javascript">
        function member_del(obj, id) {
            $(obj).closest('li[class="item"]').remove();
        }

        function change() {
            var pic = document.getElementById("smlogo"),
                file = document.getElementById("sm_logo");

            var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();

            // gif在IE浏览器暂时无法显示
            if (ext != 'png' && ext != 'jpg' && ext != 'jpeg' && ext != 'gif') {
                alert("图片的格式必须为png、jpg、jpeg、gif格式！");
                return;
            }
            var isIE = navigator.userAgent.match(/MSIE/) != null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/) != null;

            if (isIE) {
                file.select();
                var reallocalpath = document.selection.createRange().text;

                // IE6浏览器设置img的src为本地路径可以直接显示图片
                if (isIE6) {
                    pic.src = reallocalpath;
                } else {
                    // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                    pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                    // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                    pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
                }
            } else {
                html5Reader(file);
            }
        }

        function html5Reader(file) {
            var file = file.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e) {
                var pic = document.getElementById("smlogo");
                pic.src = this.result;
            }
        }
        </script>
        <script type="text/javascript">
        function changepic() {
            var pic = document.getElementById("midlogo"),
                file = document.getElementById("mid_logo");

            var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();

            // gif在IE浏览器暂时无法显示
            if (ext != 'png' && ext != 'jpg' && ext != 'jpeg') {
                alert("图片的格式必须为png或者jpg或者jpeg格式！");
                return;
            }
            var isIE = navigator.userAgent.match(/MSIE/) != null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/) != null;

            if (isIE) {
                file.select();
                var reallocalpath = document.selection.createRange().text;

                // IE6浏览器设置img的src为本地路径可以直接显示图片
                if (isIE6) {
                    pic.src = reallocalpath;
                } else {
                    // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                    pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                    // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                    pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
                }
            } else {
                htmlReader(file);
            }
        }

        function htmlReader(file) {
            var file = file.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e) {
                var pic = document.getElementById("midlogo");
                pic.src = this.result;
            }
        }
        </script>
        <script type="text/javascript">
        $(function() {
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });

            $list = $("#fileList"),
                $btn = $("#btn-star"),
                state = "pending",
                uploader;

            var uploader = WebUploader.create({
                auto: true,
                swf: 'lib/webuploader/0.1.5/Uploader.swf',

                // 文件接收服务端。
                server: 'http://lib.h-ui.net/webuploader/0.1.5/server/fileupload.php',

                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#filePicker',

                // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                resize: false,
                // 只允许选择图片文件。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/*'
                }
            });
            uploader.on('fileQueued', function(file) {
                var $li = $(
                        '<div id="' + file.id + '" class="item">' +
                        '<div class="pic-box"><img></div>' +
                        '<div class="info">' + file.name + '</div>' +
                        '<p class="state">等待上传...</p>' +
                        '</div>'
                    ),
                    $img = $li.find('img');
                $list.append($li);

                // 创建缩略图
                // 如果为非图片文件，可以不用调用此方法。
                // thumbnailWidth x thumbnailHeight 为 100 x 100
                uploader.makeThumb(file, function(error, src) {
                    if (error) {
                        $img.replaceWith('<span>不能预览</span>');
                        return;
                    }

                    $img.attr('src', src);
                }, thumbnailWidth, thumbnailHeight);
            });
            // 文件上传过程中创建进度条实时显示。
            uploader.on('uploadProgress', function(file, percentage) {
                var $li = $('#' + file.id),
                    $percent = $li.find('.progress-box .sr-only');

                // 避免重复创建
                if (!$percent.length) {
                    $percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo($li).find('.sr-only');
                }
                $li.find(".state").text("上传中");
                $percent.css('width', percentage * 100 + '%');
            });

            // 文件上传成功，给item添加成功class, 用样式标记上传成功。
            uploader.on('uploadSuccess', function(file) {
                $('#' + file.id).addClass('upload-state-success').find(".state").text("已上传");
            });

            // 文件上传失败，显示上传出错。
            uploader.on('uploadError', function(file) {
                $('#' + file.id).addClass('upload-state-error').find(".state").text("上传出错");
            });

            // 完成上传完了，成功或者失败，先删除进度条。
            uploader.on('uploadComplete', function(file) {
                $('#' + file.id).find('.progress-box').fadeOut();
            });
            uploader.on('all', function(type) {
                if (type === 'startUpload') {
                    state = 'uploading';
                } else if (type === 'stopUpload') {
                    state = 'paused';
                } else if (type === 'uploadFinished') {
                    state = 'done';
                }

                if (state === 'uploading') {
                    $btn.text('暂停上传');
                } else {
                    $btn.text('开始上传');
                }
            });

            $btn.on('click', function() {
                if (state === 'uploading') {
                    uploader.stop();
                } else {
                    uploader.upload();
                }
            });

        });

        (function($) {
                // 当domReady的时候开始初始化
                $(function() {
                    var $wrap = $('.uploader-list-container'),

                        // 图片容器
                        $queue = $('<ul class="filelist"></ul>')
                        .appendTo($wrap.find('.queueList')),

                        // 状态栏，包括进度和控制按钮
                        $statusBar = $wrap.find('.statusBar'),

                        // 文件总体选择信息。
                        $info = $statusBar.find('.info'),

                        // 上传按钮
                        $upload = $wrap.find('.uploadBtn'),

                        // 没选择文件之前的内容。
                        $placeHolder = $wrap.find('.placeholder'),

                        $progress = $statusBar.find('.progress').hide(),

                        // 添加的文件数量
                        fileCount = 0,

                        // 添加的文件总大小
                        fileSize = 0,

                        // 优化retina, 在retina下这个值是2
                        ratio = window.devicePixelRatio || 1,

                        // 缩略图大小
                        thumbnailWidth = 110 * ratio,
                        thumbnailHeight = 110 * ratio,

                        // 可能有pedding, ready, uploading, confirm, done.
                        state = 'pedding',

                        // 所有文件的进度信息，key为file id
                        percentages = {},
                        // 判断浏览器是否支持图片的base64
                        isSupportBase64 = (function() {
                            var data = new Image();
                            var support = true;
                            data.onload = data.onerror = function() {
                                if (this.width != 1 || this.height != 1) {
                                    support = false;
                                }
                            }
                            data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                            return support;
                        })(),

                        // 检测是否已经安装flash，检测flash的版本
                        flashVersion = (function() {
                            var version;

                            try {
                                version = navigator.plugins['Shockwave Flash'];
                                version = version.description;
                            } catch (ex) {
                                try {
                                    version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                                        .GetVariable('$version');
                                } catch (ex2) {
                                    version = '0.0';
                                }
                            }
                            version = version.match(/\d+/g);
                            return parseFloat(version[0] + '.' + version[1], 10);
                        })(),

                        supportTransition = (function() {
                            var s = document.createElement('p').style,
                                r = 'transition' in s ||
                                'WebkitTransition' in s ||
                                'MozTransition' in s ||
                                'msTransition' in s ||
                                'OTransition' in s;
                            s = null;
                            return r;
                        })(),

                        // WebUploader实例
                        uploader;

                    if (!WebUploader.Uploader.support('flash') && WebUploader.browser.ie) {

                        // flash 安装了但是版本过低。
                        if (flashVersion) {
                            (function(container) {
                                window['expressinstallcallback'] = function(state) {
                                    switch (state) {
                                        case 'Download.Cancelled':
                                            alert('您取消了更新！')
                                            break;

                                        case 'Download.Failed':
                                            alert('安装失败')
                                            break;

                                        default:
                                            alert('安装已成功，请刷新！');
                                            break;
                                    }
                                    delete window['expressinstallcallback'];
                                };

                                var swf = 'expressInstall.swf';
                                // insert flash object
                                var html = '<object type="application/' +
                                    'x-shockwave-flash" data="' + swf + '" ';

                                if (WebUploader.browser.ie) {
                                    html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
                                }

                                html += 'width="100%" height="100%" style="outline:0">' +
                                    '<param name="movie" value="' + swf + '" />' +
                                    '<param name="wmode" value="transparent" />' +
                                    '<param name="allowscriptaccess" value="always" />' +
                                    '</object>';

                                container.html(html);

                            })($wrap);

                            // 压根就没有安转。
                        } else {
                            $wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
                        }

                        return;
                    } else if (!WebUploader.Uploader.support()) {
                        alert('Web Uploader 不支持您的浏览器！');
                        return;
                    }

                    // 实例化
                    uploader = WebUploader.create({
                        pick: {
                            id: '#filePicker-2',
                            label: '点击选择图片'
                        },
                        formData: {
                            uid: 123
                        },
                        dnd: '#dndArea',
                        paste: '#uploader',
                        swf: 'lib/webuploader/0.1.5/Uploader.swf',
                        chunked: false,
                        chunkSize: 512 * 1024,
                        // 文件上传后端的路径
                        server: "<?php echo U('/home/search/goodsaddpic');?>",
                        // runtimeOrder: 'flash',

                        accept: {
                            title: 'Images',
                            extensions: 'gif,jpg,jpeg,bmp,png',
                            mimeTypes: 'image/*'
                        },

                        // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
                        disableGlobalDnd: true,
                        fileNumLimit: 300,
                        fileSizeLimit: 200 * 1024 * 1024, // 200 M
                        fileSingleSizeLimit: 50 * 1024 * 1024 // 50 M
                    });
                    var str = " ";
                    uploader.on('uploadSuccess', function(file, ret) {
                            console.log(ret);
                            str += ret['pic'] + ",";
                            document.getElementById("allpic").value = str;
                        })
                        // 拖拽时不接受 js, txt 文件。
                    uploader.on('dndAccept', function(items) {
                        var denied = false,
                            len = items.length,
                            i = 0,
                            // 修改js类型
                            unAllowed = 'text/plain;application/javascript ';

                        for (; i < len; i++) {
                            // 如果在列表里面
                            if (~unAllowed.indexOf(items[i].type)) {
                                denied = true;
                                break;
                            }
                        }

                        return !denied;
                    });

                    uploader.on('dialogOpen', function() {
                        console.log('here');
                    });

                    // uploader.on('filesQueued', function() {
                    //     uploader.sort(function( a, b ) {
                    //         if ( a.name < b.name )
                    //           return -1;
                    //         if ( a.name > b.name )
                    //           return 1;
                    //         return 0;
                    //     });
                    // });

                    // 添加“添加文件”的按钮，
                    uploader.addButton({
                        id: '#filePicker2',
                        label: '继续添加'
                    });

                    uploader.on('ready', function() {
                        window.uploader = uploader;
                    });

                    // 当有文件添加进来时执行，负责view的创建
                    function addFile(file) {
                        var $li = $('<li id="' + file.id + '">' +
                                '<p class="title">' + file.name + '</p>' +
                                '<p class="imgWrap"></p>' +
                                '<p class="progress"><span></span></p>' +
                                '</li>'),

                            $btns = $('<div class="file-panel">' +
                                '<span class="cancel">删除</span>' +
                                '<span class="rotateRight">向右旋转</span>' +
                                '<span class="rotateLeft">向左旋转</span></div>').appendTo($li),
                            $prgress = $li.find('p.progress span'),
                            $wrap = $li.find('p.imgWrap'),
                            $info = $('<p class="error"></p>'),

                            showError = function(code) {
                                switch (code) {
                                    case 'exceed_size':
                                        text = '文件大小超出';
                                        break;

                                    case 'interrupt':
                                        text = '上传暂停';
                                        break;

                                    default:
                                        text = '上传失败，请重试';
                                        break;
                                }

                                $info.text(text).appendTo($li);
                            };

                        if (file.getStatus() === 'invalid') {
                            showError(file.statusText);
                        } else {
                            // @todo lazyload
                            $wrap.text('预览中');
                            uploader.makeThumb(file, function(error, src) {
                                var img;

                                if (error) {
                                    $wrap.text('不能预览');
                                    return;
                                }

                                if (isSupportBase64) {
                                    img = $('<img src="' + src + '">');
                                    $wrap.empty().append(img);
                                } else {
                                    $.ajax('lib/webuploader/0.1.5/server/preview.php', {
                                        method: 'POST',
                                        data: src,
                                        dataType: 'json'
                                    }).done(function(response) {
                                        if (response.result) {
                                            img = $('<img src="' + response.result + '">');
                                            $wrap.empty().append(img);
                                        } else {
                                            $wrap.text("预览出错");
                                        }
                                    });
                                }
                            }, thumbnailWidth, thumbnailHeight);

                            percentages[file.id] = [file.size, 0];
                            file.rotation = 0;
                        }

                        file.on('statuschange', function(cur, prev) {
                            if (prev === 'progress') {
                                $prgress.hide().width(0);
                            } else if (prev === 'queued') {
                                $li.off('mouseenter mouseleave');
                                $btns.remove();
                            }

                            // 成功
                            if (cur === 'error' || cur === 'invalid') {
                                console.log(file.statusText);
                                showError(file.statusText);
                                percentages[file.id][1] = 1;
                            } else if (cur === 'interrupt') {
                                showError('interrupt');
                            } else if (cur === 'queued') {
                                percentages[file.id][1] = 0;
                            } else if (cur === 'progress') {
                                $info.remove();
                                $prgress.css('display', 'block');
                            } else if (cur === 'complete') {
                                $li.append('<span class="success"></span>');
                            }

                            $li.removeClass('state-' + prev).addClass('state-' + cur);
                        });

                        $li.on('mouseenter', function() {
                            $btns.stop().animate({
                                height: 30
                            });
                        });

                        $li.on('mouseleave', function() {
                            $btns.stop().animate({
                                height: 0
                            });
                        });

                        $btns.on('click', 'span', function() {
                            var index = $(this).index(),
                                deg;

                            switch (index) {
                                case 0:
                                    uploader.removeFile(file);
                                    return;

                                case 1:
                                    file.rotation += 90;
                                    break;

                                case 2:
                                    file.rotation -= 90;
                                    break;
                            }

                            if (supportTransition) {
                                deg = 'rotate(' + file.rotation + 'deg)';
                                $wrap.css({
                                    '-webkit-transform': deg,
                                    '-mos-transform': deg,
                                    '-o-transform': deg,
                                    'transform': deg
                                });
                            } else {
                                $wrap.css('filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (~~((file.rotation / 90) % 4 + 4) % 4) + ')');
                                // use jquery animate to rotation
                                // $({
                                //     rotation: rotation
                                // }).animate({
                                //     rotation: file.rotation
                                // }, {
                                //     easing: 'linear',
                                //     step: function( now ) {
                                //         now = now * Math.PI / 180;

                                //         var cos = Math.cos( now ),
                                //             sin = Math.sin( now );

                                //         $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
                                //     }
                                // });
                            }


                        });

                        $li.appendTo($queue);
                    }

                    // 负责view的销毁
                    function removeFile(file) {
                        var $li = $('#' + file.id);

                        delete percentages[file.id];
                        updateTotalProgress();
                        $li.off().find('.file-panel').off().end().remove();
                    }

                    function updateTotalProgress() {
                        var loaded = 0,
                            total = 0,
                            spans = $progress.children(),
                            percent;

                        $.each(percentages, function(k, v) {
                            total += v[0];
                            loaded += v[0] * v[1];
                        });

                        percent = total ? loaded / total : 0;


                        spans.eq(0).text(Math.round(percent * 100) + '%');
                        spans.eq(1).css('width', Math.round(percent * 100) + '%');
                        updateStatus();
                    }

                    function updateStatus() {
                        var text = '',
                            stats;

                        if (state === 'ready') {
                            text = '选中' + fileCount + '张图片，共' +
                                WebUploader.formatSize(fileSize) + '。';
                        } else if (state === 'confirm') {
                            stats = uploader.getStats();
                            if (stats.uploadFailNum) {
                                text = '已成功上传' + stats.successNum + '张照片至XX相册，' +
                                    stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
                            }

                        } else {
                            stats = uploader.getStats();
                            text = '共' + fileCount + '张（' +
                                WebUploader.formatSize(fileSize) +
                                '），已上传' + stats.successNum + '张';

                            if (stats.uploadFailNum) {
                                text += '，失败' + stats.uploadFailNum + '张';
                            }
                        }

                        $info.html(text);
                    }

                    function setState(val) {
                        var file, stats;

                        if (val === state) {
                            return;
                        }

                        $upload.removeClass('state-' + state);
                        $upload.addClass('state-' + val);
                        state = val;

                        switch (state) {
                            case 'pedding':
                                $placeHolder.removeClass('element-invisible');
                                $queue.hide();
                                $statusBar.addClass('element-invisible');
                                uploader.refresh();
                                break;

                            case 'ready':
                                $placeHolder.addClass('element-invisible');
                                $('#filePicker2').removeClass('element-invisible');
                                $queue.show();
                                $statusBar.removeClass('element-invisible');
                                uploader.refresh();
                                break;

                            case 'uploading':
                                $('#filePicker2').addClass('element-invisible');
                                $progress.show();
                                $upload.text('暂停上传');
                                break;

                            case 'paused':
                                $progress.show();
                                $upload.text('继续上传');
                                break;

                            case 'confirm':
                                $progress.hide();
                                $('#filePicker2').removeClass('element-invisible');
                                $upload.text('开始上传');

                                stats = uploader.getStats();
                                if (stats.successNum && !stats.uploadFailNum) {
                                    setState('finish');
                                    return;
                                }
                                break;
                            case 'finish':
                                stats = uploader.getStats();
                                if (stats.successNum) {
                                    alert('上传成功');
                                } else {
                                    // 没有成功的图片，重设
                                    state = 'done';
                                    location.reload();
                                }
                                break;
                        }

                        updateStatus();
                    }

                    uploader.onUploadProgress = function(file, percentage) {
                        var $li = $('#' + file.id),
                            $percent = $li.find('.progress span');

                        $percent.css('width', percentage * 100 + '%');
                        percentages[file.id][1] = percentage;
                        updateTotalProgress();
                    };

                    uploader.onFileQueued = function(file) {
                        fileCount++;
                        fileSize += file.size;

                        if (fileCount === 1) {
                            $placeHolder.addClass('element-invisible');
                            $statusBar.show();
                        }

                        addFile(file);
                        setState('ready');
                        updateTotalProgress();
                    };

                    uploader.onFileDequeued = function(file) {
                        fileCount--;
                        fileSize -= file.size;

                        if (!fileCount) {
                            setState('pedding');
                        }

                        removeFile(file);
                        updateTotalProgress();

                    };

                    uploader.on('all', function(type) {
                        var stats;
                        switch (type) {
                            case 'uploadFinished':
                                setState('confirm');
                                break;

                            case 'startUpload':
                                setState('uploading');
                                break;

                            case 'stopUpload':
                                setState('paused');
                                break;

                        }
                    });

                    uploader.onError = function(code) {
                        alert('Eroor: ' + code);
                    };

                    $upload.on('click', function() {
                        if ($(this).hasClass('disabled')) {
                            return false;
                        }

                        if (state === 'ready') {
                            uploader.upload();
                        } else if (state === 'paused') {
                            uploader.upload();
                        } else if (state === 'uploading') {
                            uploader.stop();
                        }
                    });

                    $info.on('click', '.retry', function() {
                        uploader.retry();
                    });

                    $info.on('click', '.ignore', function() {
                        alert('todo');
                    });

                    $upload.addClass('state-' + state);
                    updateTotalProgress();
                }); < script type = "text/javascript" >
                    function member_del(obj, id) {
                        $(obj).closest('li[class="item"]').remove();
                    }

                function change() {
                    var pic = document.getElementById("smlogo"),
                        file = document.getElementById("sm_logo");

                    var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();

                    // gif在IE浏览器暂时无法显示
                    if (ext != 'png' && ext != 'jpg' && ext != 'jpeg') {
                        alert("图片的格式必须为png或者jpg或者jpeg格式！");
                        return;
                    }
                    var isIE = navigator.userAgent.match(/MSIE/) != null,
                        isIE6 = navigator.userAgent.match(/MSIE 6.0/) != null;

                    if (isIE) {
                        file.select();
                        var reallocalpath = document.selection.createRange().text;

                        // IE6浏览器设置img的src为本地路径可以直接显示图片
                        if (isIE6) {
                            pic.src = reallocalpath;
                        } else {
                            // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                            pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                            // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                            pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
                        }
                    } else {
                        html5Reader(file);
                    }
                }

                function html5Reader(file) {
                    var file = file.files[0];
                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function(e) {
                        var pic = document.getElementById("smlogo");
                        pic.src = this.result;
                    }
                }
        </script>
        <script type="text/javascript">
        $(function() {
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });

            $list = $("#fileList"),
                $btn = $("#btn-star"),
                state = "pending",
                uploader;

            var uploader = WebUploader.create({
                auto: true,
                swf: 'lib/webuploader/0.1.5/Uploader.swf',

                // 文件接收服务端。
                server: 'http://lib.h-ui.net/webuploader/0.1.5/server/fileupload.php',

                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#filePicker',

                // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                resize: false,
                // 只允许选择图片文件。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/*'
                }
            });
            uploader.on('fileQueued', function(file) {
                var $li = $(
                        '<div id="' + file.id + '" class="item">' +
                        '<div class="pic-box"><img></div>' +
                        '<div class="info">' + file.name + '</div>' +
                        '<p class="state">等待上传...</p>' +
                        '</div>'
                    ),
                    $img = $li.find('img');
                $list.append($li);

                // 创建缩略图
                // 如果为非图片文件，可以不用调用此方法。
                // thumbnailWidth x thumbnailHeight 为 100 x 100
                uploader.makeThumb(file, function(error, src) {
                    if (error) {
                        $img.replaceWith('<span>不能预览</span>');
                        return;
                    }

                    $img.attr('src', src);
                }, thumbnailWidth, thumbnailHeight);
            });
            // 文件上传过程中创建进度条实时显示。
            uploader.on('uploadProgress', function(file, percentage) {
                var $li = $('#' + file.id),
                    $percent = $li.find('.progress-box .sr-only');

                // 避免重复创建
                if (!$percent.length) {
                    $percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo($li).find('.sr-only');
                }
                $li.find(".state").text("上传中");
                $percent.css('width', percentage * 100 + '%');
            });

            // 文件上传成功，给item添加成功class, 用样式标记上传成功。
            uploader.on('uploadSuccess', function(file) {
                $('#' + file.id).addClass('upload-state-success').find(".state").text("已上传");
            });

            // 文件上传失败，显示上传出错。
            uploader.on('uploadError', function(file) {
                $('#' + file.id).addClass('upload-state-error').find(".state").text("上传出错");
            });

            // 完成上传完了，成功或者失败，先删除进度条。
            uploader.on('uploadComplete', function(file) {
                $('#' + file.id).find('.progress-box').fadeOut();
            });
            uploader.on('all', function(type) {
                if (type === 'startUpload') {
                    state = 'uploading';
                } else if (type === 'stopUpload') {
                    state = 'paused';
                } else if (type === 'uploadFinished') {
                    state = 'done';
                }

                if (state === 'uploading') {
                    $btn.text('暂停上传');
                } else {
                    $btn.text('开始上传');
                }
            });

            $btn.on('click', function() {
                if (state === 'uploading') {
                    uploader.stop();
                } else {
                    uploader.upload();
                }
            });

        });

        (function($) {
            // 当domReady的时候开始初始化
            $(function() {
                var $wrap = $('.uploader-list-container'),

                    // 图片容器
                    $queue = $('<ul class="filelist"></ul>')
                    .appendTo($wrap.find('.queueList')),

                    // 状态栏，包括进度和控制按钮
                    $statusBar = $wrap.find('.statusBar'),

                    // 文件总体选择信息。
                    $info = $statusBar.find('.info'),

                    // 上传按钮
                    $upload = $wrap.find('.uploadBtn'),

                    // 没选择文件之前的内容。
                    $placeHolder = $wrap.find('.placeholder'),

                    $progress = $statusBar.find('.progress').hide(),

                    // 添加的文件数量
                    fileCount = 0,

                    // 添加的文件总大小
                    fileSize = 0,

                    // 优化retina, 在retina下这个值是2
                    ratio = window.devicePixelRatio || 1,

                    // 缩略图大小
                    thumbnailWidth = 110 * ratio,
                    thumbnailHeight = 110 * ratio,

                    // 可能有pedding, ready, uploading, confirm, done.
                    state = 'pedding',

                    // 所有文件的进度信息，key为file id
                    percentages = {},
                    // 判断浏览器是否支持图片的base64
                    isSupportBase64 = (function() {
                        var data = new Image();
                        var support = true;
                        data.onload = data.onerror = function() {
                            if (this.width != 1 || this.height != 1) {
                                support = false;
                            }
                        }
                        data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                        return support;
                    })(),

                    // 检测是否已经安装flash，检测flash的版本
                    flashVersion = (function() {
                        var version;

                        try {
                            version = navigator.plugins['Shockwave Flash'];
                            version = version.description;
                        } catch (ex) {
                            try {
                                version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                                    .GetVariable('$version');
                            } catch (ex2) {
                                version = '0.0';
                            }
                        }
                        version = version.match(/\d+/g);
                        return parseFloat(version[0] + '.' + version[1], 10);
                    })(),

                    supportTransition = (function() {
                        var s = document.createElement('p').style,
                            r = 'transition' in s ||
                            'WebkitTransition' in s ||
                            'MozTransition' in s ||
                            'msTransition' in s ||
                            'OTransition' in s;
                        s = null;
                        return r;
                    })(),

                    // WebUploader实例
                    uploader;

                if (!WebUploader.Uploader.support('flash') && WebUploader.browser.ie) {

                    // flash 安装了但是版本过低。
                    if (flashVersion) {
                        (function(container) {
                            window['expressinstallcallback'] = function(state) {
                                switch (state) {
                                    case 'Download.Cancelled':
                                        alert('您取消了更新！')
                                        break;

                                    case 'Download.Failed':
                                        alert('安装失败')
                                        break;

                                    default:
                                        alert('安装已成功，请刷新！');
                                        break;
                                }
                                delete window['expressinstallcallback'];
                            };

                            var swf = 'expressInstall.swf';
                            // insert flash object
                            var html = '<object type="application/' +
                                'x-shockwave-flash" data="' + swf + '" ';

                            if (WebUploader.browser.ie) {
                                html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
                            }

                            html += 'width="100%" height="100%" style="outline:0">' +
                                '<param name="movie" value="' + swf + '" />' +
                                '<param name="wmode" value="transparent" />' +
                                '<param name="allowscriptaccess" value="always" />' +
                                '</object>';

                            container.html(html);

                        })($wrap);

                        // 压根就没有安转。
                    } else {
                        $wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
                    }

                    return;
                } else if (!WebUploader.Uploader.support()) {
                    alert('Web Uploader 不支持您的浏览器！');
                    return;
                }

                // 实例化
                uploader = WebUploader.create({
                    pick: {
                        id: '#filePicker-2',
                        label: '点击选择图片'
                    },
                    formData: {
                        uid: 123
                    },
                    dnd: '#dndArea',
                    paste: '#uploader',
                    swf: 'lib/webuploader/0.1.5/Uploader.swf',
                    chunked: false,
                    chunkSize: 512 * 1024,
                    // 文件上传后端的路径
                    server: "<?php echo U('/home/search/goodsaddpic');?>",
                    // runtimeOrder: 'flash',

                    accept: {
                        title: 'Images',
                        extensions: 'gif,jpg,jpeg,bmp,png',
                        mimeTypes: 'image/*'
                    },

                    // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
                    disableGlobalDnd: true,
                    fileNumLimit: 300,
                    fileSizeLimit: 200 * 1024 * 1024, // 200 M
                    fileSingleSizeLimit: 50 * 1024 * 1024 // 50 M
                });
                var str = " ";
                uploader.on('uploadSuccess', function(file, ret) {
                        console.log(ret);
                        str += ret['pic'] + ",";
                        document.getElementById("allpic").value = str;
                    })
                    // 拖拽时不接受 js, txt 文件。
                uploader.on('dndAccept', function(items) {
                    var denied = false,
                        len = items.length,
                        i = 0,
                        // 修改js类型
                        unAllowed = 'text/plain;application/javascript ';

                    for (; i < len; i++) {
                        // 如果在列表里面
                        if (~unAllowed.indexOf(items[i].type)) {
                            denied = true;
                            break;
                        }
                    }

                    return !denied;
                });

                uploader.on('dialogOpen', function() {
                    console.log('here');
                });

                // uploader.on('filesQueued', function() {
                //     uploader.sort(function( a, b ) {
                //         if ( a.name < b.name )
                //           return -1;
                //         if ( a.name > b.name )
                //           return 1;
                //         return 0;
                //     });
                // });

                // 添加“添加文件”的按钮，
                uploader.addButton({
                    id: '#filePicker2',
                    label: '继续添加'
                });

                uploader.on('ready', function() {
                    window.uploader = uploader;
                });

                // 当有文件添加进来时执行，负责view的创建
                function addFile(file) {
                    var $li = $('<li id="' + file.id + '">' +
                            '<p class="title">' + file.name + '</p>' +
                            '<p class="imgWrap"></p>' +
                            '<p class="progress"><span></span></p>' +
                            '</li>'),

                        $btns = $('<div class="file-panel">' +
                            '<span class="cancel">删除</span>' +
                            '<span class="rotateRight">向右旋转</span>' +
                            '<span class="rotateLeft">向左旋转</span></div>').appendTo($li),
                        $prgress = $li.find('p.progress span'),
                        $wrap = $li.find('p.imgWrap'),
                        $info = $('<p class="error"></p>'),

                        showError = function(code) {
                            switch (code) {
                                case 'exceed_size':
                                    text = '文件大小超出';
                                    break;

                                case 'interrupt':
                                    text = '上传暂停';
                                    break;

                                default:
                                    text = '上传失败，请重试';
                                    break;
                            }

                            $info.text(text).appendTo($li);
                        };

                    if (file.getStatus() === 'invalid') {
                        showError(file.statusText);
                    } else {
                        // @todo lazyload
                        $wrap.text('预览中');
                        uploader.makeThumb(file, function(error, src) {
                            var img;

                            if (error) {
                                $wrap.text('不能预览');
                                return;
                            }

                            if (isSupportBase64) {
                                img = $('<img src="' + src + '">');
                                $wrap.empty().append(img);
                            } else {
                                $.ajax('lib/webuploader/0.1.5/server/preview.php', {
                                    method: 'POST',
                                    data: src,
                                    dataType: 'json'
                                }).done(function(response) {
                                    if (response.result) {
                                        img = $('<img src="' + response.result + '">');
                                        $wrap.empty().append(img);
                                    } else {
                                        $wrap.text("预览出错");
                                    }
                                });
                            }
                        }, thumbnailWidth, thumbnailHeight);

                        percentages[file.id] = [file.size, 0];
                        file.rotation = 0;
                    }

                    file.on('statuschange', function(cur, prev) {
                        if (prev === 'progress') {
                            $prgress.hide().width(0);
                        } else if (prev === 'queued') {
                            $li.off('mouseenter mouseleave');
                            $btns.remove();
                        }

                        // 成功
                        if (cur === 'error' || cur === 'invalid') {
                            console.log(file.statusText);
                            showError(file.statusText);
                            percentages[file.id][1] = 1;
                        } else if (cur === 'interrupt') {
                            showError('interrupt');
                        } else if (cur === 'queued') {
                            percentages[file.id][1] = 0;
                        } else if (cur === 'progress') {
                            $info.remove();
                            $prgress.css('display', 'block');
                        } else if (cur === 'complete') {
                            $li.append('<span class="success"></span>');
                        }

                        $li.removeClass('state-' + prev).addClass('state-' + cur);
                    });

                    $li.on('mouseenter', function() {
                        $btns.stop().animate({
                            height: 30
                        });
                    });

                    $li.on('mouseleave', function() {
                        $btns.stop().animate({
                            height: 0
                        });
                    });

                    $btns.on('click', 'span', function() {
                        var index = $(this).index(),
                            deg;

                        switch (index) {
                            case 0:
                                uploader.removeFile(file);
                                return;

                            case 1:
                                file.rotation += 90;
                                break;

                            case 2:
                                file.rotation -= 90;
                                break;
                        }

                        if (supportTransition) {
                            deg = 'rotate(' + file.rotation + 'deg)';
                            $wrap.css({
                                '-webkit-transform': deg,
                                '-mos-transform': deg,
                                '-o-transform': deg,
                                'transform': deg
                            });
                        } else {
                            $wrap.css('filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (~~((file.rotation / 90) % 4 + 4) % 4) + ')');
                            // use jquery animate to rotation
                            // $({
                            //     rotation: rotation
                            // }).animate({
                            //     rotation: file.rotation
                            // }, {
                            //     easing: 'linear',
                            //     step: function( now ) {
                            //         now = now * Math.PI / 180;

                            //         var cos = Math.cos( now ),
                            //             sin = Math.sin( now );

                            //         $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
                            //     }
                            // });
                        }


                    });

                    $li.appendTo($queue);
                }

                // 负责view的销毁
                function removeFile(file) {
                    var $li = $('#' + file.id);

                    delete percentages[file.id];
                    updateTotalProgress();
                    $li.off().find('.file-panel').off().end().remove();
                }

                function updateTotalProgress() {
                    var loaded = 0,
                        total = 0,
                        spans = $progress.children(),
                        percent;

                    $.each(percentages, function(k, v) {
                        total += v[0];
                        loaded += v[0] * v[1];
                    });

                    percent = total ? loaded / total : 0;


                    spans.eq(0).text(Math.round(percent * 100) + '%');
                    spans.eq(1).css('width', Math.round(percent * 100) + '%');
                    updateStatus();
                }

                function updateStatus() {
                    var text = '',
                        stats;

                    if (state === 'ready') {
                        text = '选中' + fileCount + '张图片，共' +
                            WebUploader.formatSize(fileSize) + '。';
                    } else if (state === 'confirm') {
                        stats = uploader.getStats();
                        if (stats.uploadFailNum) {
                            text = '已成功上传' + stats.successNum + '张照片至XX相册，' +
                                stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
                        }

                    } else {
                        stats = uploader.getStats();
                        text = '共' + fileCount + '张（' +
                            WebUploader.formatSize(fileSize) +
                            '），已上传' + stats.successNum + '张';

                        if (stats.uploadFailNum) {
                            text += '，失败' + stats.uploadFailNum + '张';
                        }
                    }

                    $info.html(text);
                }

                function setState(val) {
                    var file, stats;

                    if (val === state) {
                        return;
                    }

                    $upload.removeClass('state-' + state);
                    $upload.addClass('state-' + val);
                    state = val;

                    switch (state) {
                        case 'pedding':
                            $placeHolder.removeClass('element-invisible');
                            $queue.hide();
                            $statusBar.addClass('element-invisible');
                            uploader.refresh();
                            break;

                        case 'ready':
                            $placeHolder.addClass('element-invisible');
                            $('#filePicker2').removeClass('element-invisible');
                            $queue.show();
                            $statusBar.removeClass('element-invisible');
                            uploader.refresh();
                            break;

                        case 'uploading':
                            $('#filePicker2').addClass('element-invisible');
                            $progress.show();
                            $upload.text('暂停上传');
                            break;

                        case 'paused':
                            $progress.show();
                            $upload.text('继续上传');
                            break;

                        case 'confirm':
                            $progress.hide();
                            $('#filePicker2').removeClass('element-invisible');
                            $upload.text('开始上传');

                            stats = uploader.getStats();
                            if (stats.successNum && !stats.uploadFailNum) {
                                setState('finish');
                                return;
                            }
                            break;
                        case 'finish':
                            stats = uploader.getStats();
                            if (stats.successNum) {
                                alert('上传成功');
                            } else {
                                // 没有成功的图片，重设
                                state = 'done';
                                location.reload();
                            }
                            break;
                    }

                    updateStatus();
                }

                uploader.onUploadProgress = function(file, percentage) {
                    var $li = $('#' + file.id),
                        $percent = $li.find('.progress span');

                    $percent.css('width', percentage * 100 + '%');
                    percentages[file.id][1] = percentage;
                    updateTotalProgress();
                };

                uploader.onFileQueued = function(file) {
                    fileCount++;
                    fileSize += file.size;

                    if (fileCount === 1) {
                        $placeHolder.addClass('element-invisible');
                        $statusBar.show();
                    }

                    addFile(file);
                    setState('ready');
                    updateTotalProgress();
                };

                uploader.onFileDequeued = function(file) {
                    fileCount--;
                    fileSize -= file.size;

                    if (!fileCount) {
                        setState('pedding');
                    }

                    removeFile(file);
                    updateTotalProgress();

                };

                uploader.on('all', function(type) {
                    var stats;
                    switch (type) {
                        case 'uploadFinished':
                            setState('confirm');
                            break;

                        case 'startUpload':
                            setState('uploading');
                            break;

                        case 'stopUpload':
                            setState('paused');
                            break;

                    }
                });

                uploader.onError = function(code) {
                    alert('Eroor: ' + code);
                };

                $upload.on('click', function() {
                    if ($(this).hasClass('disabled')) {
                        return false;
                    }

                    if (state === 'ready') {
                        uploader.upload();
                    } else if (state === 'paused') {
                        uploader.upload();
                    } else if (state === 'uploading') {
                        uploader.stop();
                    }
                });

                $info.on('click', '.retry', function() {
                    uploader.retry();
                });

                $info.on('click', '.ignore', function() {
                    alert('todo');
                });

                $upload.addClass('state-' + state);
                updateTotalProgress();
            });

        })(jQuery);
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
</body>

</html>