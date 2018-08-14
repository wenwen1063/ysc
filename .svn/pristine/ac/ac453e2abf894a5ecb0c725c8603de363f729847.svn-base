var winscreen;
winscreen = $('body').width();
if(winscreen >= 320 && winscreen <= 768) {
    $('.index_headernav').click(function() {
        $('.modelnav').show();
    });
    $('.modelnav div').click(function() {
        $('.modelnav').hide();
    });
    $('.classnav:first-child').find('i').addClass('active');
    //标题隐藏
    //  $('.noticebody_body a:nth-child(n+7)').hide();
    //      医师专家、合作门店
    //  $('.index_doctor_body .index_doctor_body_div:nth-child(n+4)').hide();
    //      滋补保健、母婴用品、药妆个护
    //  $('.healthcare a:nth-child(n+7)').hide();
} else {
    //      $('.noticebody_body a:nth-child(n+7)').show();
    //  $('.index_doctor_body .index_doctor_body_div:nth-child(n+4)').show()
}
if(winscreen >= 1200) {
    $('.index_doctor_body_border').mouseover(function() {
        $(this).find('button').addClass('indexstore');
    });
    $('.index_doctor_body_border').mouseout(function() {
        $(this).find('button').removeClass('indexstore');
    });
    //      显示隐藏侧边栏
    $('.sidebar_cart').click(function() {
        $('.sidebar_right').show('fold');
        setTimeout(function() {
            $('.sidebar_close').show(300);
        }, 200)
    });
    $('.sidebar_close').click(function() {
        $('.sidebar_right').hide('fold');
        setTimeout(function() {
            $('.sidebar_close').hide(300);
        }, 200);
    });
    $(".sidebar_play").click(function(){
        $(".indexqq").toggle();
    });

    //  //          关闭购物车商品
    //  $('.index_cart_header_close img').click(function() {
    //          $('.index_cart').hide();
    //      })
    //      滚动回首页
    $('.sidebar_cancel').click(function() {
        $(document.body).animate({
            'scrollTop': 0
        }, 500);
    });
    //      当鼠标位于购物车里时 禁止页面滚动
    //      $('.sidebar_right').mouseover(function(){
    //          $(document.body).css({
    //              "overflow-y": "hidden"
    //          });
    //      });
    //      $('.sidebar_right').mouseout(function(){
    //          $(document.body).css({
    //              "overflow-y": "auto"
    //          });
    //      });
    //      显示侧边栏二维码
    $('.sidebar_qrcode').click(function() {
        $('.sidebar_qrcode img').toggle();
    });
}

$('.sidebar_cart').click(function() {
    $('.sidebar_right').show('clip');
    setTimeout(function() {
        $('.sidebar_close').show(300);
    }, 200)
});
//  无商品、无登录时显示默认状态
function defultcommodity() {
    if($('.index_cart').length > 0) {
        $('.defultcommodity').hide();
    } else {
        $('.defultcommodity').show();
    }
}
//  手机端关闭购物车
$('.modelclose').click(function() {
    $('.sidebar_right').hide(200);
});
//商品详情的轮播图的点击切换功能
$('.tran_header_img div').click(function() {
    $('.tran_header_img div').children().removeClass('active');
    $(this).children().addClass('active');
    var imgsrc = $(this).children().attr('src');
    $('.tran_header_bigimg').attr('src', imgsrc)
});
//  分类的显示隐藏
$('.leftmod .classnav div').click(function() {
    $(this).find('i').toggleClass('active');
    var left_div = $('.leftmod .classnav ul');
    var display = $(this).siblings('ul').css('display');
    var thisul = $(this).siblings('ul');
    if(display == 'block') {
        thisul.hide();
    } else {
        left_div.hide();
        thisul.show();
    }

});
//  分类的点击效果
$('.leftmod .classnav ul li').click(function() {
    $('.leftmod .classnav ul li').removeClass('active');
    $(this).addClass('active');
});


$('.index_leftnav li:nth-child(1)').click(function() {
    $(document.body).animate({
        'scrollTop': $('#f1').offset().top
    }, 500);
    $('.index_leftnav li span').hide();
    $('.index_leftnav li i').show();
    $(this).find('i').hide();
    $('.index_leftnav li').removeClass('active');
    $(this).addClass('active');
    $(this).find('span').css('display', 'block');
});
$('.index_leftnav li:nth-child(2)').click(function() {
    $(document.body).animate({
        'scrollTop': $('#f2').offset().top
    }, 500);
    $('.index_leftnav li span').hide();
    $('.index_leftnav li i').show();
    $(this).find('i').hide();
    $('.index_leftnav li').removeClass('active');
    $(this).addClass('active');
    $(this).find('span').css('display', 'block');
});
$('.index_leftnav li:nth-child(3)').click(function() {
    $(document.body).animate({
        'scrollTop': $('#f3').offset().top
    }, 500);
    $('.index_leftnav li span').hide();
    $('.index_leftnav li i').show();
    $(this).find('i').hide();
    $('.index_leftnav li').removeClass('active');
    $(this).addClass('active');
    $(this).find('span').css('display', 'block');
});
$('.index_leftnav li:nth-child(4)').click(function() {
    $(document.body).animate({
        'scrollTop': $('#f4').offset().top
    }, 500);
    $('.index_leftnav li span').hide();
    $('.index_leftnav li i').show();
    $(this).find('i').hide();
    $('.index_leftnav li').removeClass('active');
    $(this).addClass('active');
    $(this).find('span').css('display', 'block');
});
$('.index_leftnav li:nth-child(5)').click(function() {
    $(document.body).animate({
        'scrollTop': $('#f5').offset().top
    }, 500);
    $('.index_leftnav li span').hide();
    $('.index_leftnav li i').show();
    $(this).find('i').hide();
    $('.index_leftnav li').removeClass('active');
    $(this).addClass('active');
    $(this).find('span').css('display', 'block');
});
$('.index_leftnav li:nth-child(6)').click(function() {
    $(document.body).animate({
        'scrollTop': $('#f6').offset().top
    }, 500);
    $('.index_leftnav li span').hide();
    $('.index_leftnav li i').show();
    $(this).find('i').hide();
    $('.index_leftnav li').removeClass('active');
    $(this).addClass('active');
    $(this).find('span').css('display', 'block');
});

$(function(){
    $.ajax({
        type: "post",
        url: advlunbo,
        data: {},
        dataType: "json",
        success: function(data){
            //console.log(data)
            if (data.result==1) {
                var html = template('tpl10', data);
                $('#banner').html(html);
                swiper();
            }
        },
    });
})
//这是购物车计算
function cartinfo(){
    $.ajax({
        type: "post",
        url: cartinfo_ajaxurl,
        async: false,
        data: {"user_id":user_id},
        dataType: "json",
        success: function(data){
            //console.log(data)
            if (data.result==1) {
                var html = template('tpl9', data);
                $('#sidebar_right').html(html);
                $("#defultcommodity").css('display', 'none');
            }else if(data.result==0){
                var html = template('tpl9', data);
                $('#sidebar_right').html(html);
                $("#defultcommodity").css('display', 'block');
            }
            onchange_li()
        },
    });
}
//改变值
function cartchange(goods_id,type){
    var carval = "#cart_number"+goods_id;
    var price = "#cart_nowprice"+goods_id;
    var allprice = "#cart_allprice"+goods_id;
    var cartnum = Number($(carval).val());
    var nowprice = Number($(price).html());
    if (cartnum<2 && type=="-1"){
        alert('到头了')
        return;
    }
    $.ajax({
        type: "post",
        url: cartchange_ajaxurl,
        async: false,
        data: {"user_id":user_id,"goods_id":goods_id,"type":type},
        dataType: "json",
        success: function(data){
            cart_number()
            //console.log(data)
            if (data.result==1) {
                if (type==1) {
                    $(carval).val(cartnum+1);
                    var changenum = ((cartnum+1)*nowprice).toFixed(2);
                    var change_allprice = Number($("#all_money").html())+nowprice;
                }else{
                    $(carval).val(cartnum-1);
                    var changenum = ((cartnum-1)*nowprice).toFixed(2);
                    var change_allprice = Number($("#all_money").html())-nowprice;
                }
                $("#all_money").html(change_allprice.toFixed(2));
                $(allprice).html(changenum);
            }
        },
    });
}
//删除
function cartdel(cartid){
    if(confirm("确认删除吗")){
        $.ajax({
            type: "post",
            url: cartdel_ajaxurl,
            async: false,
            data: {"user_id":user_id,"cartid":cartid},
            dataType: "json",
            success: function(data){
                cart_number();
                if (data.result==1) {
                    var html = template('tpl9', data);
                    $('#sidebar_right').html(html);
                    $("#defultcommodity").css('display', 'none');
                }else{
                    var html = template('tpl9', data);
                    $('#sidebar_right').html(html);
                    $("#defultcommodity").css('display', 'block');
                }
            },
        });
    }else{
        return;
    }
}
//change_num_cart  input 输入
function change_num_cart(input_num,input_id,input_goods_id){
    var price = "#cart_nowprice"+input_goods_id;
    var allprice = "#cart_allprice"+input_goods_id;
    var nowprice = Number($(price).html());
    $.ajax({
        type: "post",
        url: change_num_cart_ajaxurl,
        async: false,
        data: {"input_num":input_num,"input_id":input_id,"user_id":user_id},
        dataType: "json",
        success: function(data){
            //console.log(data)
            if (data.result==1) {
                var changenum = (input_num*nowprice).toFixed(2);
                $(allprice).html(changenum);
                $("#all_money").html(data.allp);
                cart_number()
            }
        },
    });
}
//激活监听
function onchange_li(){
    $(function(){
        var $inputwrapper = $('#sidebar_right .index_cart .index_cart_body');
        $inputwrapper.find('input').bind('input propertychange',function(){
            var input_num = $(this).val();
            var input_id = $(this).attr('change_id');
            var input_goods_id = $(this).attr('goods_id');
            var stock = "#cart_stock"+input_id;
            var cart_stock = Number($(stock).html());
            console.log(input_num);
            console.log(input_id);
            if (input_num>cart_stock) {
                alert('库存不足')
                cartinfo()
                return;
            };

            if (isNaN(input_num)){
                //只有数字符合条件
                return;
            }
            //改变购物车数字
            change_num_cart(input_num,input_id,input_goods_id);
        });
    })
}

//监听input  购物车
$(function(){
    var $inputwrapper = $('#sidebar_right .index_cart .index_cart_body');
    $inputwrapper.find('input').bind('input propertychange',function(){
        var input_num = $(this).val();
        var input_id = $(this).attr('change_id');
        var input_goods_id = $(this).attr('goods_id');
        var stock = "#cart_stock"+input_id;
        var cart_stock = Number($(stock).html());
        // console.log(input_num);
        // console.log(input_id);
        if (input_num>cart_stock) {
            alert('库存不足')
            cartinfo();
            onchange_li();
            return;
        };

        if (isNaN(input_num)){
            //只有数字符合条件
            return;
        }
        //改变购物车数字
        change_num_cart(input_num,input_id,input_goods_id);
    });
})
//这是购物车计算结束
//推荐商品
function recommon_goods(){
    $.ajax({
        type: "post",
        url: recommon,
        async: false,
        data: {"user_id":user_id},
        dataType: "json",
        success: function(data){
            //console.log(data)
            if (data.result==1) {
                var html = template('tpl8', data);
                $('#recommon_goods_id').html(html);
            }
        },
    });
}
//获取购物当前数量
function cart_number(){
    $.ajax({
        type: "post",
        url: cart_number_ajaxurl,
        async: false,
        data: {"user_id":user_id},
        dataType: "json",
        success: function(data){
            $("#all_number_cart").html(data.number)
        },
    });
}
