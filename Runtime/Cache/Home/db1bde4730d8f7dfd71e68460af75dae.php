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
</head>
<style type="text/css">
    .left_ul{
        list-style-type:none;
        /*border:1px solid rgb(179,179,179);*/
    }
    .left_ul_li{
        text-align: center;
        border-bottom: 1px solid rgb(179,179,179);
    }
</style>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  商品管理 <span class="c-gray en">&gt;</span>
   商品列表
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-2">
    <ul class="left_ul">
            <a href="<?php echo U('/home/goods/goodsindex',array('seller_id'=>null));?>"><li class="maincolor left_ul_li" id="seller_all">全部商家</li></a>
        <?php if(is_array($seller)): foreach($seller as $key=>$v): ?><a href="<?php echo U('/home/goods/goodsindex',array('seller_id'=>$v['id']));?>"><li class="maincolor left_ul_li" id="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></li></a><?php endforeach; endif; ?>
    </ul>
</div>
<div class="pd-20 col-xs-2 col-sm-2 col-md-2 col-lg-10">
    <form action="" method="post/get" name="mainform" class="form form-horizontal" id="form-admin-add" style="float:right;">
        <input type="hidden" name="seller_id" value="<?php echo ($seller_id); ?>">
        <div class="text-c">
            <input type="text" id="goods_name" name="goods_name" value="<?php echo ($search['goods_name']); ?>" class="input-text" style="width:100px" placeholder="输入商品名称">
            <input type="text" id="shop_price_l" name="shop_price_l" value="<?php echo ($search['shop_price_l']); ?>" class="input-text" style="width:100px" placeholder="输入现价下限">
            -
            <input type="text" id="shop_price_h" name="shop_price_h" value="<?php echo ($search['shop_price_h']); ?>" class="input-text" style="width:100px" placeholder="输入现价上限">
            <input type="text" id="r_sale_l" name="r_sale_l" value="<?php echo ($search['r_sale_l']); ?>" class="input-text" style="width:100px" placeholder="输入实销下限">
            -
            <input type="text" id="r_sale_h" name="r_sale_h" value="<?php echo ($search['r_sale_h']); ?>" class="input-text" style="width:100px" placeholder="输入实销上限">
            <span class="select-box inline">
            <?php if($search['bonus_state'] == 0): ?><select name="bonus_state" class="select">
                    <option value="0">全部状态</option>
                    <option value="1">待审核</option>
                    <option value="2">已审核</option>
                    <option value="3">不通过</option>
                </select>
            <?php elseif($search['bonus_state'] == 1): ?>
                <select name="bonus_state" class="select">
                    <option value="1">待审核</option>
                    <option value="0">全部状态</option>
                    <option value="2">已审核</option>
                    <option value="3">不通过</option>
                </select>
            <?php elseif($search['bonus_state'] == 2): ?>
                <select name="bonus_state" class="select">
                    <option value="2">已审核</option>
                    <option value="0">全部状态</option>
                    <option value="1">待审核</option>
                    <option value="3">不通过</option>
                </select>
            <?php else: ?>
                <select name="bonus_state" class="select">
                    <option value="3">不通过</option>
                    <option value="0">全部状态</option>
                    <option value="1">待审核</option>
                    <option value="2">已审核</option>
                </select><?php endif; ?>
            </span>

            <span class="select-box inline">
            <?php if($search['status'] == 0): ?><select name="status" class="select">
                    <option value="0">全部状态</option>
                    <option value="1">出售中</option>
                    <option value="2">已售罄</option>
                    <option value="3">警戒中</option>
                    <option value="4">已下架</option>
                </select>
            <?php elseif($search['status'] == 1): ?>
                <select name="status" class="select">
                    <option value="1">出售中</option>
                    <option value="2">已售罄</option>
                    <option value="3">警戒中</option>
                    <option value="4">已下架</option>
                    <option value="0">全部状态</option>
                </select>
            <?php elseif($search['status'] == 2): ?>
                <select name="status" class="select">
                    <option value="2">已售罄</option>
                    <option value="3">警戒中</option>
                    <option value="4">已下架</option>
                    <option value="0">全部状态</option>
                    <option value="1">出售中</option>
                </select>
            <?php elseif($search['status'] == 3): ?>
                <select name="status" class="select">
                    <option value="3">警戒中</option>
                    <option value="4">已下架</option>
                    <option value="0">全部状态</option>
                    <option value="1">出售中</option>
                    <option value="2">已售罄</option>
                </select>
            <?php else: ?>
                <select name="status" class="select">
                    <option value="4">已下架</option>
                    <option value="0">全部状态</option>
                    <option value="1">出售中</option>
                    <option value="2">已售罄</option>
                    <option value="3">警戒中</option>
                </select><?php endif; ?>
            </span>
            <button type="submit" class="btn btn-success" onclick="return search()"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
             <!-- <input type="submit" class="btn btn-danger radius" value="导出" onclick="return goodsexcel();" style="background-color: #f5862e;border-color: #f5862e;" /> -->
        </div>
    </form>

    <form action="" method="post/get" name="main_form" id="main_form">
    <div class="text-c"><br></div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <a href="<?php echo U('/home/goods/goodsadd');?>" class="btn btn-primary radius"> 新增 </a></span>&nbsp;
        <input type="submit" class="btn btn-danger radius" value="删除" onclick="return delgoods()" />
        <input type="submit" class="btn btn-danger radius" value="下架" onclick="return outgoods()" style="background-color: #ead047;border-color: #ead047;" />
        <input type="submit" class="btn btn-danger radius" value="上架" onclick="return ongoods()" style="background-color: #19d419;border-color: #19d419;" />
        <input type="submit" class="btn btn-danger radius" value="移除七天退换" onclick="return outseven()" style="background-color: #ead047;border-color: #ead047;" />
        <input type="submit" class="btn btn-danger radius" value="添加七天退换" onclick="return onseven()" style="background-color: #19d419;border-color: #19d419;" />
        <input type="submit" class="btn btn-danger radius" value="移除包邮" onclick="return outbaoyou()" style="background-color: #ead047;border-color: #ead047;" />
        <input type="submit" class="btn btn-danger radius" value="添加包邮" onclick="return onbaoyou()" style="background-color: #19d419;border-color: #19d419;" />
        <input type="submit" class="btn btn-danger radius" value="移除推荐" onclick="return outrecommend()" style="background-color: #ead047;border-color: #ead047;" />
        <input type="submit" class="btn btn-danger radius" value="添加推荐" onclick="return onrecommend()" style="background-color: #19d419;border-color: #19d419;" />
        </span>
        <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="17">商品列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">操作</th>
                <th width="40">编号</th>
                <th width="40">商品名称</th>
                <th width="40">所属商家</th>
                <th width="40">商品小图</th>
                <th width="40">商品状态</th>
                <th width="40">虚拟销量</th>
                <th width="40">实际销量</th>
                <th width="40">默认发货物流</th>
                <th width="40">奖金审核状态</th>
                <th width="40">奖金审核时间</th>
                <th width="40">提供发票</th>
                <th width="40">是否推荐</th>
                <th width="40">七天退换</th>
                <th width="40">是否包邮</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td><input type="checkbox" value="<?php echo ($v['id']); ?>" name="id[]"></td>
                    <td class="td-manage">
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/goods/goodsupdate',array('id'=>$v['id']));?>">编辑</a>
                    <a class="btn btn-primary size-MINI radius" href="<?php echo U('/home/goods/goodsdel',array('id'=>$v['id'],'type'=>2));?>" onclick="return confirm('确认要删除吗？');">删除</a>
                    </td>
                    <td><?php echo ($v['number']); ?></td>
                    <td class="text-l"><center><a class="maincolor" href="<?php echo U('/home/goods/goodsinfo',array('id'=>$v['id']));?>"><?php echo ($v['goods_name']); ?></a></center></td>
                    <td><?php echo ($v['seller_name']); ?></td>
                    <td><img src="/ysc2/Public/Uploads/<?php echo ($v['sm_pic']); ?>" width="40"></td>
                    <?php if($v['is_on_sale']==0): ?>
                        <td class="td-status"><span class="label radius">已下架</span></td>
                    <?php elseif($v['goods_inventory']==0): ?>
                        <td class="td-status"><span class="label radius" style="background-color: #E06D6D;">已售罄</span></td>
                    <?php elseif($v['goods_inventory']<=$v['stock_warning'] && $v['goods_inventory']>0): ?>
                        <td class="td-status"><span class="label radius" style="background-color: #E06D6D;">警戒中</span></td>
                    <?php elseif($v['is_on_sale']==1): ?>
                        <td class="td-status"><span class="label label-success radius">出售中</span></td>
                    <?php endif ?>
                    <td><?php echo ($v['v_sale']); ?></td>
                    <td><?php echo ($v['r_sale']); ?></td>
                    <td><?php echo ($v['logistics_name']); ?></td>

                    <?php if($v['bonus_state']==1): ?>
                        <td><span class="label label-warning radius">待审核</span></td>
                    <?php elseif($v['bonus_state']==2): ?>
                        <td><span class="label label-success radius">已审核</span></td>
                    <?php elseif($v['bonus_state']==3): ?>
                        <td><span class="label radius" style="background-color: #E06D6D;">不通过</span></td>
                    <?php endif ?>

                    <?php if ($v['auditing_time']!=null): ?>
                        <td><?php echo (date('Y-m-d H:i:s',$v['auditing_time'])); ?></td>
                    <?php else: ?>
                        <td></td>
                    <?php endif ?>

                    <?php if($v['invoice']==0): ?>
                        <td>不提供</td>
                    <?php else: ?>
                        <td>提供</td>
                    <?php endif ?>
                    <?php if($v['is_recommend']==0): ?>
                        <td>否</td>
                    <?php else: ?>
                        <td>是</td>
                    <?php endif ?>
                    <?php if($v['is_seven']==0): ?>
                        <td>否</td>
                    <?php else: ?>
                        <td>是</td>
                    <?php endif ?>
                    <?php if($v['is_baoyou']==0): ?>
                        <td>否</td>
                    <?php else: ?>
                        <td>是</td>
                    <?php endif ?>
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
    var seller_id = "<?php echo $seller_id; ?>";
    if(seller_id == ''){
        $('.left_ul li').css('color','#06c');
        $('.left_ul #seller_all').css('color','black');
    }else{
        $('.left_ul li').css('color','#06c');
        $(".left_ul li[id*="+seller_id+"]").css('color','black');
    }
</script>
<script type="text/javascript">
//批量删除判断是否选择
function delgoods(){
    var gnl = confirm('确认要删除吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsdel');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}
function ongoods(){
    var gnl = confirm('确认要上架吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsonsale');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}
function outgoods(){
    var gnl = confirm('确认要下架吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsoutsale');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}

function onseven(){
    var gnl = confirm('确认要添加七天退换吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsonseven');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}
function outseven(){
    var gnl = confirm('确认要移除七天退换吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsoutseven');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}

function onbaoyou(){
    var gnl = confirm('确认要添加包邮吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsonbaoyou');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}
function outbaoyou(){
    var gnl = confirm('确认要移除包邮吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsoutbaoyou');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}

function onrecommend(){
    var gnl = confirm('确认要添加推荐吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsonrecommend');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}
function outrecommend(){
    var gnl = confirm('确认要移除推荐吗？');
    if (gnl==true){
        var chks=document.getElementsByTagName('input');
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
            document.forms.main_form.action="<?php echo U('/home/goods/goodsoutrecommend');?>";
            document.forms.main_form.submit();
        }
    }else{
        return false;
    }
}

//导出商品数据
 // function goodsexcel(){
 //     document.forms.mainform.action="<?php echo U('/home/goods/goodsexcel');?>";
 //     document.forms.mainform.submit();
 // }
function search(){
    document.forms.mainform.action="<?php echo U('/home/goods/goodsindex/search/');?>";
    document.forms.mainform.submit();
}
</script>