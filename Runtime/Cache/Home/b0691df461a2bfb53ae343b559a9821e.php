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
<script type="text/javascript" src="/ysc2/Public/timejs/laydate.js"></script>
<title>订单管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>
 系统 <span class="c-gray en">&gt;</span>
  订单管理 <span class="c-gray en">&gt;</span>
   订单信息 <span class="c-gray en">&gt;</span>
   查看
   <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="#" onClick="javascript :history.go(-1);" title="返回" ><i class="Hui-iconfont">&#xe66b;</i></a><a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
  <table class="table table-border table-bordered table-bg mt-20">
    <thead>
      <tr>
        <th colspan="2" scope="col">订单详情</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>订单编号</td>
        <td><?php echo ($order['order_number']); ?></td>
      </tr>
      <tr>
        <td>商品店铺</td>
        <td><?php echo ($order['seller_name']); ?></td>
      </tr>
      <tr>
        <td>订单费用</td>
        <td><?php echo ($order['paid_price']); ?></td>
      </tr>
      <tr>
        <td>联系人</td>
        <td><?php echo ($order['contact']); ?></td>
      </tr>
      <tr>
        <td>联系方式</td>
        <td><?php echo ($order['phone']); ?></td>
      </tr>
      <tr>
        <td>订单所在地址</td>
        <td><?php echo ($order['province']); echo ($order['city']); echo ($order['district']); ?>-<?php echo ($order['address']); ?></td>
      </tr>
      <tr>
      <tr>
        <td>备注</td>
        <td><?php echo ($order['note']); ?></td>
      </tr>
      <tr>
        <td>下单时间</td>
        <?php if ($order['addtime']!=0): ?>
          <td><?php echo (date('Y-m-d H:i:s',$order['addtime'])); ?></td>
        <?php else: ?>
          <td></td>
        <?php endif ?>
      </tr>
      <tr>
        <td>支付时间</td>
        <?php if ($order['pay_time']!=0): ?>
          <td><?php echo (date('Y-m-d H:i:s',$order['pay_time'])); ?></td>
        <?php else: ?>
          <td></td>
        <?php endif ?>
      </tr>
       <tr>
        <td>发货时间</td>
        <?php if ($order['post_time']!=0): ?>
										<td><?php echo (date('Y-m-d H:i:s',$order['post_time'])); ?></td>
										<?php else: ?>
										<td></td>
										<?php endif ?>
      </tr>
      <tr>
        <td>完成时间</td>
        <?php if ($order['pok_time']!=0): ?>
										<td><?php echo (date('Y-m-d H:i:s',$order['pok_time'])); ?></td>
										<?php else: ?>
										<td></td>
										<?php endif ?>
      </tr>
      <tr>
        <td>订单状态</td>
        <td><?php echo ($order['post_type']); ?></td>
      </tr>
      <!--发票信息-->
      <?php if ($order['is_invoice'] != 0): ?>
      <tr>
        <td>发票抬头</td>
        <td>
        	<?php if ($order['invoice_type'] == 0): ?> 个人
                      <?php else: ?> 公司
                        <?php endif ?>
        </td>
      </tr>
      <tr>
        <td>发票抬头信息</td>
        <td>
        	<?php echo ($order['invoice_content']); ?>
        </td>
      </tr>
      <tr>
        <td>发票内容</td>
        <td>
        	<?php if($order['invoice_type'] == 1 ): ?>电脑配件
<?php elseif($order['invoice_type'] == 2): ?>办公用品(附购物清单)
<?php elseif($order['invoice_type'] == 3): ?>耗材
<?php else: ?> 明细<?php endif; ?>
        </td>
      </tr>
      
    <?php endif ?>
    	
    	<!--商品列表-->
    </tbody>
  <table class="table table-border table-bordered table-bg">
    <thead>
      <tr>
        <th scope="col" colspan="15">商品列表</th>
      </tr>
      <tr class="text-c">
        <th width="40">商品名称</th>
        <th width="40">商品规格</th>
        <th width="40">购买数量</th>
        <th width="40">金额</th>
        <th width="40">开发票</th>
        <th width="40">平台奖金金额</th>
        <th width="40">搭档奖励总额</th>
      </tr>
    </thead>
    <tbody>
      <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
                    <td><?php echo ($v['goods_name']); ?></td> 
                      <td><?php echo ($v['ganame']); ?></td>
                    <td><?php echo ($v['goods_number']); ?></td>
                    <td><?php echo ($v['price']); ?></td>
                    <td>
                        <?php if ($v['is_kaifapiao'] == 0): ?> 否
                        <?php else: ?> 是
                        <?php endif ?>
                    </td>
                    <td><?php echo ($v['platform_bonus']); ?></td>
                    <td><?php echo ($v['partner_bonus']); ?></td>
        </tr><?php endforeach; endif; ?>
    </tbody>
  </table>
  
  <?php if($con != '' ): ?><!--优惠券信息-->
    <table class="table table-border table-bordered table-bg">
    <thead>
      <tr>
        <th scope="col" colspan="15">使用优惠券</th>
      </tr>
      <tr class="text-c">
        				<th width="40">名称</th>
                <th width="40">面值</th>
                <th width="40">开始时间</th>
                <th width="80">结束时间</th>
                <th width="100">限制使用金额</th>
      </tr>
    </thead>
    <tbody>
        <tr class="text-c">
                   <td><?php echo ($con['name']); ?></td>
                   <td><?php echo ($con['money']); ?>元</td>
                    <td><?php echo (date('Y-m-d H:i:s',$con['start_time'])); ?></td>
                    <td><?php echo (date('Y-m-d H:i:s',$con['end_time'])); ?></td>
                    <td><?php echo ($con['use_condition']); ?>元</td>
        </tr>
    </tbody>
  </table><?php endif; ?>
</div>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.js"></script>
<script type="text/javascript" src="/ysc2/Public/admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
/*
  参数解释：
  title 标题
  url   请求的url
  id    需要操作的数据id
  w   弹出层宽度（缺省调默认值）
  h   弹出层高度（缺省调默认值）
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
function Check()
{
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
  }
}
function orderclose(){
    document.forms.main_form.action="<?php echo U('/home/order/orderclose/del');?>";
    document.forms.main_form.submit();
}
function orderpost(){
    document.forms.main_form.action="<?php echo U('/home/order/orderpost/out');?>";
    document.forms.main_form.submit();
}
</script>
<script type="text/javascript">
!function(){
  laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
  laydate({elem: '#demo'});//绑定元素
}();

//日期范围限制
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
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
    choose: function(datas){
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
    choose: function(datas){ //选择日期完毕的回调
        alert('得到：'+datas);
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