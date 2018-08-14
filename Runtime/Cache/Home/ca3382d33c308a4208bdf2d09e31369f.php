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
<script src="/ysc2/Public/ueditor/ueditor.config.js"></script>
<script src="/ysc2/Public/ueditor/ueditor.all.min.js"></script>
<!--index-->
<style type="text/css">
.searchable-select-hide {
    display: none;
}

.searchable-select {
    display: inline-block;
    min-width: 200px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    position: relative;
    outline: none;
}

.searchable-select-holder {
    padding: 6px;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    min-height: 30px;
    box-sizing: border-box;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

.searchable-select-caret {
    position: absolute;
    width: 0;
    height: 0;
    box-sizing: border-box;
    border-color: black transparent transparent transparent;
    top: 0;
    bottom: 0;
    border-style: solid;
    border-width: 5px;
    margin: auto;
    right: 10px;
}

.searchable-select-dropdown {
    position: absolute;
    background-color: #fff;
    border: 1px solid #ccc;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    padding: 4px;
    border-top: none;
    top: 28px;
    left: 0;
    right: 0;
    z-index: 999
}

.searchable-select-input {
    margin-top: 5px;
    border: 1px solid #ccc;
    outline: none;
    padding: 4px;
    width: 100%;
    box-sizing: border-box;
    width: 100%;
}

.searchable-scroll {
    margin-top: 4px;
    position: relative;
}

.searchable-scroll.has-privious {
    padding-top: 16px;
}

.searchable-scroll.has-next {
    padding-bottom: 16px;
}

.searchable-has-privious {
    top: 0;
}

.searchable-has-next {
    bottom: 0;
}

.searchable-has-privious,
.searchable-has-next {
    height: 16px;
    left: 0;
    right: 0;
    position: absolute;
    text-align: center;
    z-index: 10;
    background-color: white;
    line-height: 8px;
    cursor: pointer;
}

.searchable-select-items {
    max-height: 400px;
    overflow-y: scroll;
    position: relative;
}

.searchable-select-items::-webkit-scrollbar {
    display: none;
}

.searchable-select-item {
    padding: 5px 5px;
    cursor: pointer;
    min-height: 30px;
    box-sizing: border-box;
}

.searchable-select-item.hover {
    background: #555;
    color: white;
}

.searchable-select-item.selected {
    background: #28a4c9;
    color: white;
}

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
<title>新增广告</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 广告信息 <span class="c-gray en">&gt;</span> 新增 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回"><i class="Hui-iconfont">&#xe66b;</i></a><a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20">
        <form action="<?php echo U('/home/adver/adveradd');?>" name="main_form" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
            <div class="row cl">
                <label class="form-label col-2"><span class="c-red">*</span>广告名称：</label>
                <div class="formControls col-4">
                    <input type="text" class="input-text" value="" placeholder="输入广告名称" id="ad_name" name="ad_name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2">
                    <span class="c-red">*</span>广告位置：</label>
                <div class="formControls col-4">
                    <span class="select-box">
                <select class="select" size="" name="ad_position" id="ad_position">
                    <option value="1">轮播</option>
                    <option value="2">固定</option>
                    <option value="3">成为搭档</option>
                </select>
              </span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2">
                    <span class="c-red">*</span>广告类型：</label>
                <div class="formControls col-4">
                    <span class="select-box">
                <select class="select" size="" name="ad_type" id="ad_type">
                      <option value="1" id='ad_type_content'>内容</option>
                      <option value="2" id='ad_type_link'>链接</option>
                      <option value="3" id='ad_type_goods'>商品</option>
                </select>
              </span>
                </div>
            </div>
            <div class="row cl" id='row_ad_link' style='display: none'>
                <label class="form-label col-2">广告链接：</label>
                <div class="formControls col-4">
                    <input type="text" class="input-text" value="" placeholder="输入广告链接" id="ad_link" name="ad_link">
                </div>
            </div>
            <!--<div class="row cl" id='row_ad_goods' style='display: none'>
                <label class="form-label col-2">选择商品：</label>
                <div class="formControls col-4">
                    &lt;!&ndash;<input type="text" class="input-text" value="" placeholder="输入商品链接" id="ad_goods" name="ad_link2">&ndash;&gt;
                    <select class="goods" size="" name="goods" id="ad_type">
                        <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><option value="<?php echo ($v['goods_id']); ?>" id='ad_type_content'><?php echo ($v['goods_name']); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
            </div>-->
            <div class="row cl" id='row_ad_goods' style='display: none'>
                <label class="form-label col-2"><span class="c-red">*</span>选择商品：</label>
                <div class="formControls col-5">
                    <select class="goods" size="" name="goods" id="seller_select">
                        <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><option value="<?php echo ($v['goods_id']); ?>"><?php echo ($v['goods_name']); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2"><span class="c-red">*</span>广告小图：</label>
                <div class="formControls col-5" style="width:10%;">
                    <a href="javascript:;" class="file">选择图片<input onchange="change()" type="file" id="sm_logo" name="sm_logo"></a>
                    <p></p>
                    <p id="smtext" class="sm_logo">
                        <img id="smlogo" name="smlogo" higth="100" width="100" />
                    </p>
                </div>
                <div class="col-4"> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2"><span class="c-red">*</span>广告大图：</label>
                <div class="formControls col-5" style="width:10%;">
                    <a href="javascript:;" class="file">选择图片<input onchange="change2()" type="file" id="sm_logo2" name="sm_logo2"></a>
                    <p></p>
                    <p id="smtext" class="sm_logo">
                        <img id="smlogo2" name="smlogo2" higth="100" width="100" />
                    </p>
                </div>
                <div class="col-4"> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2"><span class="c-red">*</span>广告顺序：</label>
                <div class="formControls col-4">
                    <input type="text" class="input-text" value="" placeholder="输入广告顺序" id="ad_sort" name="ad_sort">
                </div>
            </div>
            <div class="row cl " id="row_ad_content" style="">
                <label class="form-label col-2">广告内容：</label>
                <div class="formControls col-6">
                    <script id="container_ad_content" name="ad_content" type="text/plain">
                        <?php echo ($data['ad_content']); ?>
                    </script>
                </div>
            </div>
            <div class="row cl">
                <div class="col-10 col-offset-2">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;" onclick="return check()">
                    <input class="btn btn-primary radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
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
    var ue = UE.getEditor('container_ad_content');
    </script>
    <script type="text/javascript">
    $(function() {
            // 广告类型变动
            $("#ad_type").change(function() {
                var type = $("#ad_type").val();
                //链接
                if (type == 2) {
                    $("#row_ad_content").css('display', 'none');
                    $("#row_ad_link").show();
                    $('#row_ad_goods').hide();
                }
                //内容
                if (type == 1) {
                    $('#row_ad_link').hide();
                    $('#row_ad_goods').hide();
                    $('#row_ad_content').show();
                }
                //商品
                if (type == 3) {
                    $('#row_ad_goods').show();
                    $('#row_ad_link').hide();
                    $('#row_ad_content').hide();
                }
            })
        })
        // 广告位置变动
    $('#ad_position').change(function() {
        //轮播
        if ($(this).val() == 1) {
            //轮播只能是链接类型
            $('#ad_type_link').prop('selected', true);
            $('#ad_type_content').hide();
            $("#row_ad_content").hide();
            $("#row_ad_link").show();
        } else {
            $('#ad_type_content').show();
        }
    })
    </script>
    <script type="text/javascript">
    function check() {
        if ($('#ad_name').val() == "") {
            alert("广告名称不能为空!");
            return false;
        }
        if ($('#ad_sort').val() == "") {
            alert("广告显示顺序不能为空!");
            return false;
        }
        // if ($('#sort_num').val() == "") {
        //     alert("排序不为空!");
        //     return false;
        // }
        if ($('#sm_logo').val() == "") {
            alert("请选择广告小图!");
            return false;
        }
        if ($('#sm_logo2').val() == "") {
            alert("请选择广告大图!");
            return false;
        }
        return true;
    }
    </script>
    <script type="text/javascript">
    function change() {
        var pic = document.getElementById("smlogo"),
            file = document.getElementById("sm_logo");

        var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        //修改内容：if添加判断条件&& ext != 'gif' 修改者：czq
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
    function change2() {
        var pic = document.getElementById("smlogo2"),
            file = document.getElementById("sm_logo2");

        var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        //修改内容：if添加判断条件&& ext != 'gif' 修改者：czq
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
            html5Reader2(file);
        }
    }

    function html5Reader2(file) {
        var file = file.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e) {
            var pic = document.getElementById("smlogo2");
            pic.src = this.result;
        }
    }
    </script>
    <script type="text/javascript">
    $(function() {
        $('#seller_select').searchableSelect();
    });
    var strid = '';
    (function($) {

        // a case insensitive jQuery :contains selector
        $.expr[":"].searchableSelectContains = $.expr.createPseudo(function(arg) {
            return function(elem) {
                return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
            };
        });

        $.searchableSelect = function(element, options) {
            this.element = element;
            this.options = options || {};
            this.init();

            var _this = this;

            this.searchableElement.click(function(event) {
                // event.stopPropagation();
                _this.show();
            }).on('keydown', function(event) {
                if (event.which === 13 || event.which === 40 || event.which == 38) {
                    event.preventDefault();
                    _this.show();
                }
            });


            $(document).on('click', null, function(event) {
                if (_this.searchableElement.has($(event.target)).length === 0)
                    _this.hide();
            });

            this.input.on('keydown', function(event) {
                event.stopPropagation();
                if (event.which === 13) { //enter
                    event.preventDefault();
                    _this.selectCurrentHoverItem();
                    _this.hide();
                } else if (event.which == 27) { //ese
                    _this.hide();
                } else if (event.which == 40) { //down
                    _this.hoverNextItem();
                } else if (event.which == 38) { //up
                    _this.hoverPreviousItem();
                }
            }).on('keyup', function(event) {
                if (event.which != 13 && event.which != 27 && event.which != 38 && event.which != 40)
                    _this.filter();
            })

        }

        var $sS = $.searchableSelect;

        $sS.fn = $sS.prototype = {
            version: '0.0.1'
        };

        $sS.fn.extend = $sS.extend = $.extend;

        $sS.fn.extend({
            init: function() {
                var _this = this;
                this.element.hide();

                this.searchableElement = $('<div tabindex="0" class="searchable-select"></div>');
                this.holder = $('<div class="searchable-select-holder"></div>');
                this.dropdown = $('<div class="searchable-select-dropdown searchable-select-hide"></div>');
                this.input = $('<input type="text" class="searchable-select-input" />');
                this.items = $('<div class="searchable-select-items"></div>');
                this.caret = $('<span class="searchable-select-caret"></span>');

                this.scrollPart = $('<div class="searchable-scroll"></div>');
                this.hasPrivious = $('<div class="searchable-has-privious">...</div>');
                this.hasNext = $('<div class="searchable-has-next">...</div>');

                this.hasNext.on('mouseenter', function() {
                    _this.hasNextTimer = null;

                    var f = function() {
                        var scrollTop = _this.items.scrollTop();
                        _this.items.scrollTop(scrollTop + 20);
                        _this.hasNextTimer = setTimeout(f, 50);
                    }

                    f();
                }).on('mouseleave', function(event) {
                    clearTimeout(_this.hasNextTimer);
                });

                this.hasPrivious.on('mouseenter', function() {
                    _this.hasPriviousTimer = null;

                    var f = function() {
                        var scrollTop = _this.items.scrollTop();
                        _this.items.scrollTop(scrollTop - 20);
                        _this.hasPriviousTimer = setTimeout(f, 50);
                    }

                    f();
                }).on('mouseleave', function(event) {
                    clearTimeout(_this.hasPriviousTimer);
                });

                this.dropdown.append(this.input);
                this.dropdown.append(this.scrollPart);

                this.scrollPart.append(this.hasPrivious);
                this.scrollPart.append(this.items);
                this.scrollPart.append(this.hasNext);

                this.searchableElement.append(this.caret);
                this.searchableElement.append(this.holder);
                this.searchableElement.append(this.dropdown);
                this.element.after(this.searchableElement);

                this.buildItems();
                this.setPriviousAndNextVisibility();
            },

            filter: function() {
                var text = this.input.val();
                this.items.find('.searchable-select-item').addClass('searchable-select-hide');
                this.items.find('.searchable-select-item:searchableSelectContains(' + text + ')').removeClass('searchable-select-hide');
                if (this.currentSelectedItem.hasClass('searchable-select-hide') && this.items.find('.searchable-select-item:not(.searchable-select-hide)').length > 0) {
                    this.hoverFirstNotHideItem();
                }

                this.setPriviousAndNextVisibility();
            },

            hoverFirstNotHideItem: function() {
                this.hoverItem(this.items.find('.searchable-select-item:not(.searchable-select-hide)').first());
            },

            selectCurrentHoverItem: function() {
                if (!this.currentHoverItem.hasClass('searchable-select-hide'))
                    this.selectItem(this.currentHoverItem);
            },

            hoverPreviousItem: function() {
                if (!this.hasCurrentHoverItem())
                    this.hoverFirstNotHideItem();
                else {
                    var prevItem = this.currentHoverItem.prevAll('.searchable-select-item:not(.searchable-select-hide):first')
                    if (prevItem.length > 0)
                        this.hoverItem(prevItem);
                }
            },

            hoverNextItem: function() {
                if (!this.hasCurrentHoverItem())
                    this.hoverFirstNotHideItem();
                else {
                    var nextItem = this.currentHoverItem.nextAll('.searchable-select-item:not(.searchable-select-hide):first')
                    if (nextItem.length > 0)
                        this.hoverItem(nextItem);
                }
            },

            buildItems: function() {
                var _this = this;
                this.element.find('option').each(function() {
                    var item = $('<div class="searchable-select-item" data-value="' + $(this).attr('value') + '">' + $(this).text() + '</div>');

                    if (this.selected) {
                        _this.selectItem(item);
                        _this.hoverItem(item);
                    }

                    item.on('mouseenter', function() {
                        $(this).addClass('hover');
                    }).on('mouseleave', function() {
                        $(this).removeClass('hover');
                    }).click(function(event) {
                        event.stopPropagation();
                        _this.selectItem($(this));
                        _this.hide();
                    });

                    _this.items.append(item);
                });

                this.items.on('scroll', function() {
                    _this.setPriviousAndNextVisibility();
                })
            },
            show: function() {
                this.dropdown.removeClass('searchable-select-hide');
                this.input.focus();
                this.status = 'show';
                this.setPriviousAndNextVisibility();
            },

            hide: function() {
                if (!(this.status === 'show'))
                    return;

                if (this.items.find(':not(.searchable-select-hide)').length === 0)
                    this.input.val('');
                this.dropdown.addClass('searchable-select-hide');
                this.searchableElement.trigger('focus');
                this.status = 'hide';
            },

            hasCurrentSelectedItem: function() {
                return this.currentSelectedItem && this.currentSelectedItem.length > 0;
            },
            selectItem: function(item) {
                if (this.hasCurrentSelectedItem())
                    this.currentSelectedItem.removeClass('selected');

                this.currentSelectedItem = item;
                item.addClass('selected');

                this.hoverItem(item);

                this.holder.text(item.text());
                var value = item.data('value'); //当前选择的门店的value

                // var option = value.split('-');//当前选择的门店的value分割成的数组
                // var obj = option[0];

                // if(option[2]=='store' && option[0] !=0){
                //     console.log(strid);
                //     if(strid.indexOf(obj)>=0){
                //         alert('已经添加过该商家！');
                //     }else{
                //     var html = "<input type='checkbox' name='real_store_list[]' value="+option[0]+" checked='checked'><label>"+option[1]+"</label>";
                //     $('#real_store_list').append(html);
                //     strid = strid + obj + ";";
                //     // console.log(strid);
                //     }
                // }
                // $("#real_store_list input[name='real_store_list[]']:checkbox").change(function(){
                //     if($(this).attr("checked")!=true){
                //          var removeid=$(this).val();
                //          strid = strid.replace(removeid+';','');
                //         $(this).next("label").remove();
                //         $(this).remove();
                //     }
                // });

                this.holder.data('value', value);
                this.element.val(value);
                // alert(value);
                // alert(name);

                if (this.options.afterSelectItem) {
                    this.options.afterSelectItem.apply(this);
                }

            },

            hasCurrentHoverItem: function() {
                return this.currentHoverItem && this.currentHoverItem.length > 0;
            },

            hoverItem: function(item) {
                if (this.hasCurrentHoverItem())
                    this.currentHoverItem.removeClass('hover');

                if (item.outerHeight() + item.position().top > this.items.height())
                    this.items.scrollTop(this.items.scrollTop() + item.outerHeight() + item.position().top - this.items.height());
                else if (item.position().top < 0)
                    this.items.scrollTop(this.items.scrollTop() + item.position().top);

                this.currentHoverItem = item;
                item.addClass('hover');
            },

            setPriviousAndNextVisibility: function() {
                if (this.items.scrollTop() === 0) {
                    this.hasPrivious.addClass('searchable-select-hide');
                    this.scrollPart.removeClass('has-privious');
                } else {
                    this.hasPrivious.removeClass('searchable-select-hide');
                    this.scrollPart.addClass('has-privious');
                }

                if (this.items.scrollTop() + this.items.innerHeight() >= this.items[0].scrollHeight) {
                    this.hasNext.addClass('searchable-select-hide');
                    this.scrollPart.removeClass('has-next');
                } else {
                    this.hasNext.removeClass('searchable-select-hide');
                    this.scrollPart.addClass('has-next');
                }
            }
        });

        $.fn.searchableSelect = function(options) {
            this.each(function() {
                var sS = new $sS($(this), options);
            });

            return this;
        };

    })(jQuery);

    function outputObj(obj) {
        var description = "";
        for (var i in obj) {
            description += i + " = " + obj[i] + "\n";
        }
        alert(description);
    }
    </script>
    <script type="text/javascript">
    function setTreeStyle(obj) {
        var objStyle = obj.children("b");
        var objList = obj.siblings("ul");
        if (objList.length == 1) {
            var style = objStyle.attr("class");
            objStyle.attr("class", "On2Off");
            setTimeout(
                function() {
                    if (style == "Off") {
                        objList.parent().siblings("li").children("span").children(".On").each(function() {
                            setTreeStyle($(this).parent());
                        });
                        var H = objList.innerHeight()
                        objList.css({
                            display: "block",
                            height: "0"
                        });
                        objList.animate({
                            height: H
                        }, 300, function() {
                            $(this).css({
                                height: "auto"
                            });
                        });
                        objStyle.attr("class", "On");
                    } else if (style == "On") {
                        objList.find("li").children("span").children(".On").each(function() {
                            setTreeStyle($(this).parent());
                        });
                        var H = objList.innerHeight()
                        objList.animate({
                            height: 0
                        }, 300, function() {
                            $(this).css({
                                height: "auto",
                                display: "none"
                            })
                        });
                        objStyle.attr("class", "Off");
                    }
                },
                42
            );
        }
    }
    $("#tree_root").find("li").children("span").click(function() {
        setTreeStyle($(this));
    });
    </script>
</body>

</html>