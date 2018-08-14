<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
    body {
        font-family: sans-serif;
        font-style: normal;
    }

    #time {
        color: #909090;
    }

    .classheader {
        position: relative;
    }

    .classheader span {
        border-left: 3px solid #1E88EC;
        padding-left: 15px;
        line-height: 30px;
        font-size: 18px;
        height: 30px;
    }

    * {
        list-style: none;
        outline: none;
        box-sizing: border-box;
    }

    section p {
        margin: 0;
        padding: 0;
    }

    .sectiondiv {
        float: left;
        width: 100%;
        font-size: 15px;
        text-align: center;
    }

    .sectiondiv li {
        width: 20%;
        float: left;
        padding: 0 25px 25px 0;
    }

    .sectiondiv li div.divbody {
        width: 100%;
        border-radius: 5px;
        overflow: hidden;
        border: 1px solid #d3d3d3;
    }

    .sectiondiv li div.divbody p {
        line-height: 30px;
        color: #fff;
        font-size: 14px;
    }

    .sectiondiv li div.divbody div {
        line-height: 100px;
    }

    .sectiondiv li div.divbody div big {
        font-size: 35px;
    }

    .sectiondiv li div.divbody div small {
        font-size: 14px;
    }

    .bg1 {
        background: #FF6484;
    }

    .co1 {
        color: #FF6484;
    }

    .bg2 {
        background: #47D195;
    }

    .co2 {
        color: #47D195;
    }

    .bg3 {
        background: #4EC1F8;
    }

    .co3 {
        color: #4EC1F8;
    }

    .bg4 {
        background: #F7B82D;
    }

    .co4 {
        color: #F7B82D;
    }

    .bg5 {
        background: #987FFF;
    }

    .co5 {
        color: #987FFF;
    }

    .bg6 {
        background: #987FFF;
    }

    .co6 {
        color: #987FFF;
    }

    .bg7 {
        background: #EA8245;
    }

    .co7 {
        color: #EA8245;
    }

    .bg8 {
        background: #65A7FE;
    }

    .co8 {
        color: #65A7FE;
    }

    .bg9 {
        background: #3CE157;
    }

    .co9 {
        color: #3CE157;
    }
    </style>
</head>

<body>

    <header>
        <h3>欢迎使用搭档商城后台管理系统！</h3>
        <p id="time"></p>
    </header>
    <section>
        <div class="classheader">
            <span>今日信息</span>
        </div>
        <div class="sectiondiv">
            <ul>
                <?php if (!$is_seller): ?>
                <li>
                    <div class="divbody">
                        <p class="bg1">新增会员数</p>
                        <div class="co1">
                                <big><?php echo ($data['cmem_new']); ?></big><small>人</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg2">新增商家数</p>
                        <div class="co2">
                                <big><?php echo ($data['cseller_new']); ?></big><small>家</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg3">新增商品数</p>
                        <div class="co3">
                            <big><?php echo ($data['cgoods_new']); ?></big><small>个</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg4">新增订单总数</p>
                        <div class="co4">
                            <big><?php echo ($data['corder_new']); ?></big><small>单</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg5">新增订单总额</p>
                        <div class="co5">
                            <big>
                                <?php if ($data['corderprice_new']!=null): ?>
                                <?php echo ($data['corderprice_new']); ?>
                                <?php else: ?>
                                0
                                <?php endif ?>
                            </big>
                            <small>元</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg6">新增文章数</p>
                        <div class="co6">
                            <big><?php echo ($data['carticle_new']); ?></big><small>篇</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg7">新增软件购买金额</p>
                        <div class="co7">
                            <big>
                                <?php if ($data['ctool_new']!=null): ?>
                                <?php echo ($data['ctool_new']); ?>
                                <?php else: ?>
                                0
                                <?php endif ?>
                            </big>
                            <small>元</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg8">新增话费充值金额</p>
                        <div class="co8">
                            <big>
                                <?php if ($data['ctool_new'] != null): ?>
                                <?php echo ($data['chuafei_new']); ?>
                                <?php else: ?>
                                0
                                <?php endif ?>
                            </big>
                            <small>元</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg9">新增流量充值金额</p>
                        <div class="co9">
                            <big>
                                <?php if ($data['ctool_new']!=null): ?>
                                <?php echo ($data['cliuliang_new']); ?>
                                <?php else: ?>
                                0
                                <?php endif ?>
                            </big>
                            <small>元</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg1">新增奖励金额</p>
                        <div class="co1">
                            <big>
                                <?php if ($data['cbonus_new']!=null): ?>
                                <?php echo ($data['cbonus_new']); ?>
                                <?php else: ?>
                                0
                                <?php endif ?>
                            </big>
                            <small>元</small>
                        </div>
                    </div>
                </li>
                <?php else: ?>
                <li>
                    <div class="divbody">
                        <p class="bg3">新增商品数</p>
                        <div class="co3">
                            <big><?php echo ($data['cgoods_new']); ?></big><small>个</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg4">新增订单总数</p>
                        <div class="co4">
                            <big><?php echo ($data['corder_new']); ?></big><small>单</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg5">新增订单总额</p>
                        <div class="co5">
                            <big>
                                <?php if ($data['corderprice_new']!=null): ?>
                                <?php echo ($data['corderprice_new']); ?>
                                <?php else: ?>
                                0
                                <?php endif ?>
                            </big>
                            <small>元</small>
                        </div>
                    </div>
                </li>

                <?php endif ?>

            </ul>
        </div>
        <div class="classheader">
            <span>系统信息</span>
        </div>
        <div class="sectiondiv">
            <ul>
                <?php if (!$is_seller): ?>
                <li>
                    <div class="divbody">
                        <p class="bg1">会员总数</p>
                        <div class="co1">
                            <big><?php echo ($data['cmem']); ?></big><small>人</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg2">商家总数</p>
                        <div class="co2">
                            <big><?php echo ($data['cseller']); ?></big><small>家</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg3">商品总数</p>
                        <div class="co3">
                            <big><?php echo ($data['cgoods']); ?></big><small>个</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg4">订单总数</p>
                        <div class="co4">
                            <big><?php echo ($data['corder']); ?></big><small>单</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg5">订单总额</p>
                        <div class="co5">
                            <big><?php if ($data['corderprice']!=null): ?>
                                <?php echo ($data['corderprice']); ?>
                                <?php else: ?>
                                0
                                <?php endif ?></big><small>元</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg6">文章总数</p>
                        <div class="co6">
                            <big><?php echo ($data['carticle']); ?></big><small>篇</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg7">软件购买金额</p>
                        <div class="co7">
                            <big><?php echo ($data['ctool']); ?></big><small>元</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg8">话费充值金额</p>
                        <div class="co8">
                            <big><?php echo ($data['chuafei']); ?></big><small>元</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg9">流量充值金额</p>
                        <div class="co9">
                            <big><?php echo ($data['cliuliang']); ?></big><small>元</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg1">奖励金额</p>
                        <div class="co1">
                            <big><?php echo ($data['cbonus']); ?></big><small>元</small>
                        </div>
                    </div>
                </li>

                <?php else: ?>

                <li>
                    <div class="divbody">
                        <p class="bg3">商品总数</p>
                        <div class="co3">
                            <big><?php echo ($data['cgoods']); ?></big><small>个</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg4">订单总数</p>
                        <div class="co4">
                            <big><?php echo ($data['corder']); ?></big><small>单</small>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="divbody">
                        <p class="bg5">订单总额</p>
                        <div class="co5">
                            <big><?php if ($data['corderprice']!=null): ?>
                                <?php echo ($data['corderprice']); ?>
                                <?php else: ?>
                                0
                                <?php endif ?></big><small>元</small>
                        </div>
                    </div>
                </li>



                <?php endif ?>
            </ul>
        </div>
    </section>
</body>

</html>
<script type="text/javascript" src="/ysc2/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
changetime();

function changetime() {
    var today;
    today = new Date();
    timeString = today.toLocaleString();
    $('#time').html(timeString);
    setTimeout(function() {
        changetime();
    }, 1000);
}

</script>