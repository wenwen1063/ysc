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
</style>
<title>用户新增</title>
</head>

<body>
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 系统 <span class="c-gray en">&gt;</span> 用户管理 <span class="c-gray en">&gt;</span> 用户信息 <span class="c-gray en">&gt;</span> 新增
        <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回"><i class="Hui-iconfont">&#xe66b;</i></a><a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20">
        <form action="<?php echo U('/home/admin/adminadd');?>" method="post" name="main_form" class="form form-horizontal" id="form-admin-add">
            <div class="row cl">
                <label class="form-label col-3"><span class="c-red">*</span>用户账号：</label>
                <div class="formControls col-5">
                    <input type="text" class="input-text" value="" placeholder="用户账号" id="name" name="name" datatype="*2-16" nullmsg="用户账号不能为空">
                </div>
                <div class="col-4"> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-3"><span class="c-red">*</span>初始密码：</label>
                <div class="formControls col-5">
                    <input type="password" placeholder="初始密码" value="" class="input-text" datatype="*6-20" id="pwd" name="pwd">
                </div>
                <div class="col-4"> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-3"><span class="c-red">*</span>确认密码：</label>
                <div class="formControls col-5">
                    <input type="password" placeholder="密码须一致" value="" class="input-text" datatype="*6-20" id="pwd2" name="pwd2">
                </div>
                <div class="col-4"> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-3"><span class="c-red">*</span>用户邮箱：</label>
                <div class="formControls col-5">
                    <input type="text" class="input-text" value="" placeholder="用户邮箱" id="email" name="email" datatype="*2-16" nullmsg="用户邮箱不能为空">
                </div>
                <div class="col-4"> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-3"><span class="c-red">*</span>手机号码：</label>
                <div class="formControls col-5">
                    <input type="text" class="input-text" value="" placeholder="手机号码" id="phone" name="phone" datatype="*2-16" nullmsg="手机号码不能为空">
                </div>
                <div class="col-4"> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-3">角色：</label>
                <div class="formControls col-5">
                    <table class="table table-border table-bordered table-hover table-bg">
                        <tr class="text-c">
                            <th width="25">
                            </th>
                            <th width="40">编号</th>
                            <th width="150">角色名</th>
                            <th width="350">描述</th>
                        </tr>
                        <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                                <td>
                                    <?php if($v['is_depart_admin'] == 1): ?><input type="checkbox" value="<?php echo ($v['role_id']); ?>" name="choose[]" onclick="showDepart()">
                                    <?php else: ?><!---->
                                     <input type="checkbox" value="<?php echo ($v['role_id']); ?>" name="choose[]"><?php endif; ?>
                                </td>
                                <td><?php echo ($v['id']); ?></td>
                                <td><?php echo ($v['role_name']); ?></td>
                                <td><?php echo ($v['role_remark']); ?></td>
                            </tr><?php endforeach; endif; ?>
                    </table>
                </div>
            </div>
            <div class="row cl" id="stockall" style="display:none;">
                    <label class="form-label col-3">
                    分店选择：</label>
                    <div class="formControls col-5">
                        <select class="select" size="1" name="departs_id" id="departs_id">
                            <?php if(is_array($name)): foreach($name as $key=>$v): ?><option value="<?php echo ($v['departs_id']); ?>"><?php echo ($v['departs_name']); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
            <div class="row cl">
                <div class="col-9 col-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;" onclick="return check()">
                    <input class="btn btn-primary radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/Validform/5.3.2/Validform.min.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/lib/webuploader/0.1.5webuploader.min.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
    <script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
    <script type="text/javascript">


        function showDepart(){
            if($("#stockall").css('display') == "none") {
                $("#stockall").css('display','block');
            }else{
                $("#stockall").css('display','none');
            }
        }

        function outputObj(obj) {
            var description = "";
            for (var i in obj) {
                description += i + " = " + obj[i] + "\n";
            }
            alert(description);
        }

        function yesbook(){
        $("#bookmax").css('display','block');
    }
    function nobook(){
        $("#bookmax").css('display','none');
    }
    </script>

    <script type="text/javascript">
    function check() {
        //form1是form中的name属性
        var _form = document.main_form;
        if (trim(_form.name.value) == "") {
            alert("用户账号不能为空!");
            return false;
        }
        if (trim(_form.pwd.value) == "") {
            alert("密码不能为空!");
            return false;
        }
        if (trim(_form.pwd2.value) == "") {
            alert("密码不能为空!");
            return false;
        }
        var str = document.getElementById("pwd").value
        if (str.length < 6) {
            alert('对不起，您的密码小于六位');
            return false;
        }
        if (trim(_form.pwd.value) != trim(_form.pwd2.value)) {
            alert("密码不一致");
            return false;
        }
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
    <script type="text/javascript">
    function DoCheck() {
        var ch = document.getElementsByName("choose[]");
        if (document.getElementsByName("allChecked")[0].checked == true) {
            for (var i = 0; i < ch.length; i++) {
                ch[i].checked = true;
            }
        } else {
            for (var i = 0; i < ch.length; i++) {
                ch[i].checked = false;
            }
        }
    }
    </script>
 <script type="text/javascript">
        $(function() {
            $('select').searchableSelect();
        });
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
                    var value = item.data('value');
                    this.holder.data('value', value);
                    this.element.val(value);
                    // getClass(value);

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
</body>

</html>