<?php
/**
 * 用户管理
 * User: lwh
 */
namespace Home\Controller;

use Think\Controller;

class StatistController extends IndexController
{
    // 维修类型报表
    public function userrank()
    {
        set_time_limit(0);
        $search    = I();
        $seller_id=cookie("seller_id");
        if ($depart_id != 0 || !empty($depart_id)) {
            $map['m.company_id'] = array('eq', $depart_id);
        }
		
		
        if ($search != null) {
            if ($search['time1'] != null && $search['time2'] != null) {
                $timearr          = array(strtotime($search['time1']), strtotime($search['time2']));
                $map['o.addtime'] = array("between", $timearr);
            }

            if ($search['fault'] != null) {
                $map['f.id'] = array("eq", $search['fault']);
            }
            $map['o.order_type'] = array("eq", 0);
            $info                = M()->table('__FAULT_TYPE__  f')
                ->join('left join __FAULTGOODS__ fg  on f.id = fg.type_id')
                ->join('left join __ORDER__ o  on fg.id = o.faultgoods_id')
                ->join('left join  __MEMBER__ m  on o.member_id = m.id')
                ->where($map)
                ->field("f.fault_num,f.name,count(f.fault_num) as ordernum,sum(o.s_money) as s_money_num,sum(o.money) as money_num")
                ->group('f.fault_num')
                ->order("ordernum desc ,money_num desc ")
                ->page($_GET['p'] . ',20')
                ->select();

            $count1 = M()->table('__FAULT_TYPE__  f')
                ->join('left join __FAULTGOODS__ fg  on f.id = fg.type_id')
                ->join('left join __ORDER__ o  on fg.id = o.faultgoods_id')
                ->join('left join  __MEMBER__ m  on o.member_id = m.id')
                ->where($map)
                ->field("f.fault_num,f.name,count(f.fault_num) as ordernum,sum(o.s_money) as s_money_num,sum(o.money) as money_num")
                ->group('f.fault_num')
                ->order("ordernum desc ,money_num desc ")
                ->select();
            $count = count($count1);
        } else {
            $map['o.order_type'] = array("eq", 0);
            $info                = M()->table('__FAULT_TYPE__  f')
                ->join('left join __FAULTGOODS__ fg  on f.id = fg.type_id')
                ->join('left join __ORDER__ o  on fg.id = o.faultgoods_id')
                ->join('left join  __MEMBER__ m  on o.member_id = m.id')
                ->where($map)
                ->field("f.fault_num,f.name,count(f.fault_num) as ordernum,sum(o.s_money) as s_money_num,sum(o.money) as money_num")
                ->group('f.fault_num')
                ->order("ordernum desc ,money_num desc ")
                ->page($_GET['p'] . ',20')
                ->select();
            $count1 = M()->table('__FAULT_TYPE__  f')
                ->join('left join __FAULTGOODS__ fg  on f.id = fg.type_id')
                ->join('left join __ORDER__ o  on fg.id = o.faultgoods_id')
                ->join('left join  __MEMBER__ m  on o.member_id = m.id')
                ->where($map)
                ->field("f.fault_num,f.name,count(f.fault_num) as ordernum,sum(o.s_money) as s_money_num,sum(o.money) as money_num")
                ->group('f.fault_num')
                ->order("ordernum desc ,money_num desc ")
                ->select();
            $count = count($count1);
        }

        $fault = M("fault_type")->where(array('state' => 1, 'is_first' => 1))->select();
        $Page  = new \Think\Page($count, 20);
        $show  = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('fault', $fault);
        $this->assign('data', $info);
        $this->display();

    }


// *******************************************************************************************************
    // 商品排行榜
    public function goodsrank()
    {
        $search    = I();
        $depart_id = cookie("depart_id");
        if ($depart_id != 0 || !empty($depart_id)) {
            $map['m.company_id'] = array('eq', $depart_id);
        }
        if ($search != null) {
            if ($search['time1'] != null && $search['time2'] != null) {
                $timearr          = array(strtotime($search['time1']), strtotime($search['time2']));
                $map['o.addtime'] = array("between", $timearr);
            }

            if ($search['fault'] != null) {
                $map['f.id'] = array("eq", $search['fault']);
            }

            if ($search['faultgoods'] != null) {
                $map['fg.id'] = array("eq", $search['faultgoods']);
            }

            $map['o.order_type'] = array("eq", 0);
			
            
        } else {
            $map['o.order_type'] = array("eq", 0);
            $data=M()->table('goods g')
					->join('left join')
            		->join('left join seller s on g.seller_id=s.id')
					->join('left join order_goods og on g.id=og.goods_id')
					->join('left join orders o on og.order_id=o.id')
					
					->join()
					->join()
					->join()
					->join()
					->join()
					
					
			
            $count = count($count1);
        }
       
        $Page       = new \Think\Page($count, 20);
        $show       = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('fault', $fault);
        $this->assign('faultgoods', $faultgoods);
        $this->assign('data', $info);
        $this->display();

    }
// 导出维修产品报表
    public function faultgoods_forms_sexcel()
    {
        set_time_limit(0);
        $search    = I();
        $depart_id = cookie("depart_id");
        if ($depart_id != 0 || !empty($depart_id)) {
            $map['m.company_id'] = array('eq', $depart_id);
        }
        if ($search['time1'] != null && $search['time2'] != null) {
            $timearr          = array(strtotime($search['time1']), strtotime($search['time2']));
            $map['o.addtime'] = array("between", $timearr);
        }

        if ($search['fault'] != null) {
            $map['f.id'] = array("eq", $search['fault']);
        }

        if ($search['faultgoods'] != null) {
            $map['fg.id'] = array("eq", $search['faultgoods']);
        }

        $map['o.order_type'] = array("eq", 0);
        $info                = M()->table('__FAULTGOODS__ fg')
            ->join('left join __FAULT_TYPE__ f  on f.id = fg.type_id')
            ->join('left join __ORDER__ o  on fg.id = o.faultgoods_id')
            ->join('left join  __MEMBER__ m  on o.member_id = m.id')
            ->where($map)
            ->field("f.name as fault_name,fg.name,count(fg.name),sum(o.money) as money_num,count(fg.name) as ordernum")
            ->group('fg.name')
            ->order("ordernum desc ,money_num desc ")
            ->select();
        $headArr  = array('维修类型名称', '维修产品', '维修总数量', '维修总金额', '订单总量');
        $filename = "维修产品汇总信息";
        $this->getExcel($filename, $headArr, $info);
    }
// *******************************************************************************************************
    // 师傅订单排行榜
    public function techlist()
    {
        $search    = I();
        $depart_id = cookie("depart_id");
        if ($depart_id != 0 || !empty($depart_id)) {
            $map['m.company_id'] = array('eq', $depart_id);
        }
        if ($search != null) {
            if ($search['time1'] != null && $search['time2'] != null) {
                $timearr          = array(strtotime($search['time1']), strtotime($search['time2']));
                $map['o.addtime'] = array("between", $timearr);
            }

            if ($search['name'] != null) {
                $sname         = $search['name'];
                $map['m.name'] = array("like", "%$sname%");
            }

            $map['m.type'] = array("eq", 2);
            $info          = M()->table('__MEMBER__ m')
                ->join('left join __ORDER__ o on m.id=o.tid')
                ->join('left join __MEMBER__ me on m.id=me.s_member')
                ->join('left join __RED_LOG__ rl on rl.member_id=m.id')
                ->join('left join __COMPANY__ c on c.id=m.company_id')
                ->where($map)
                ->group('m.name')
                ->field('m.name,count(me.s_member) as groopnum,c.name as cname,m.member,count(o.id) as ordernum,
                 sum(o.money) as moneynum,sum(o.s_money) as s_money_num,sum(rl.money) as red_money')
                ->order('groopnum desc, ordernum desc, moneynum desc ')
                ->page($_GET['p'] . ',20')
                ->select();
            $count1 = M()->table('__MEMBER__ m')
                ->join('left join __ORDER__ o on m.id=o.tid')
                ->join('left join __MEMBER__ me on m.id=me.s_member')
                ->join('left join __RED_LOG__ rl on rl.member_id=m.id')
                ->join('left join __COMPANY__ c on c.id=m.company_id')
                ->where($map)
                ->group('m.name')
                ->field('m.name,count(me.s_member) as groopnum,c.name as cname,m.member,count(o.id) as ordernum,
                 sum(o.money) as moneynum,sum(o.s_money) as s_money_num,sum(rl.money) as red_money')
                ->order('groopnum desc, ordernum desc, moneynum desc ')
                ->select();
            $count = count($count1);
        } else {
            $map['m.type'] = array("eq", 2);
            $info          = M()->table('__MEMBER__ m')
                ->join('left join __ORDER__ o on m.id=o.tid')
                ->join('left join __MEMBER__ me on m.id=me.s_member')
                ->join('left join __RED_LOG__ rl on rl.member_id=m.id')
                ->join('left join __COMPANY__ c on c.id=m.company_id')
                ->where($map)
                ->group('m.name')
                ->field('m.name,count(me.s_member) as groopnum,c.name as cname,m.member,count(o.id) as ordernum,
                 sum(o.money) as moneynum,sum(o.s_money) as s_money_num,sum(rl.money) as red_money')
                ->order('groopnum desc, ordernum desc, moneynum desc ')
                ->page($_GET['p'] . ',20')
                ->select();
            $count1 = M()->table('__MEMBER__ m')
                ->join('left join __ORDER__ o on m.id=o.tid')
                ->join('left join __MEMBER__ me on m.id=me.s_member')
                ->join('left join __RED_LOG__ rl on rl.member_id=m.id')
                ->join('left join __COMPANY__ c on c.id=m.company_id')
                ->where($map)
                ->group('m.name')
                ->field('m.name,count(me.s_member) as groopnum,c.name as cname,m.member,count(o.id) as ordernum,
                 sum(o.money) as moneynum,sum(o.s_money) as s_money_num,sum(rl.money) as red_money')
                ->order('groopnum desc, ordernum desc, moneynum desc ')
                ->select();
            $count = count($count1);

        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $info);
        $this->display();

    }
// 导出师傅订单排行榜
    public function techlist_sexcel()
    {
        set_time_limit(0);
        $search    = I();
        $depart_id = cookie("depart_id");
        if ($depart_id != 0 || !empty($depart_id)) {
            $map['m.company_id'] = array('eq', $depart_id);
        }
        if ($search['time1'] != null && $search['time2'] != null) {
            $timearr          = array(strtotime($search['time1']), strtotime($search['time2']));
            $map['o.addtime'] = array("between", $timearr);
        }

        if ($search['name'] != null) {
            $sname         = $search['name'];
            $map['m.name'] = array("like", "%$sname%");
        }

        $map['m.type'] = array("eq", 2);
        $info          = M()->table('__MEMBER__ m')
            ->join('left join __ORDER__ o on m.id=o.tid')
            ->join('left join __MEMBER__ me on m.id=me.s_member')
            ->join('left join __RED_LOG__ rl on rl.member_id=m.id')
            ->join('left join __COMPANY__ c on c.id=m.company_id')
            ->where($map)
            ->group('m.name')
            ->field('c.name as cname,m.name,m.member,count(o.id) as ordernum, sum(o.money) as moneynum,sum(o.s_money) as s_money_num,count(me.s_member) as groopnum,sum(rl.money) as red_money')
            ->order('groopnum desc, ordernum desc, moneynum desc ')
            ->select();
        $headArr  = array('公司名称', '师傅姓名', '师傅账号', '接单总量', '维修费用总额', '上门维修费用总额', '推荐人数', '奖金总额');
        $filename = "师傅订单排行榜";
        $this->getExcel($filename, $headArr, $info);
    }

// *******************************************************************************************************
    public function ordertree()
    {
        $this->display();
    }
    //ajax获取树状结构
    public function ttt()
    {
        $depart_id = cookie("depart_id");
        if ($depart_id != 0 || !empty($depart_id)) {
            $map['company_id'] = array('eq', $depart_id);
        }
        $map['type']  = array('eq', 1);
        $map['state'] = array('eq', 1);
        $data         = M("member")->where($map)->field("id,s_member,name,member")->order('s_member desc')->select();
        $c            = array();
        foreach ($data as $a) {
            $c1  = array('id' => $a["id"], 'pId' => $a["s_member"], 'name' => $a["name"], 'click' => 'getinfo(' . $a["id"] . ')');
            $c[] = $c1;
        }
        $ison = array(
            'id' => I(),
            'c'  => $c,
        );
        $this->ajaxReturn($ison);
    }
    //获取点击会员的全部id
    private function qq($id2)
    {
        $str       = $this->get_category($id2);
        $member_id = $str . $id2;
        return $member_id;
    }

//  递归获取id
    private function get_category($id1)
    {
        $str  = '';
        $data = M("member")->field("id,s_member,name")->where($id = array('s_member' => $id1, 'state' => 1, 'type' => 1))->select();
        if ($data != null) {
            foreach ($data as $v) {
                $str1 = self::get_category($v['id']);
                $str1 .= $v['id'] . ',';
                $str .= $str1;
            }
        } else {
            $str .= $id1 . ',';
        }
        return $str;
    }
// 时间撮季度算法
    private function getQuarterByMonth($date)
    {
        $date3 = date('Y-m-d H:i:s', $date);
        $month = date('m', $date);
        $year  = date('Y', $date);
        $Q     = ceil($month / 3);
        $json  = array(
            'year' => $year,
            'jidu' => $Q,
        );
        return $json;
    }

    //固定客户季度清算汇总
    public function member_forms()
    {
        $search    = I();
        $depart_id = cookie("depart_id");
        if ($depart_id != 0 || !empty($depart_id)) {
            $map['m.company_id'] = array('eq', $depart_id);
        }
        if ($search != null) {
            if ($search['tid'] != null) {
                $tid         = $this->qq($search['tid']);
                $map['m.id'] = array("in", $tid);
            }
            $map['m.type']  = array("eq", 1);
            $map['m.state'] = array("eq", 1);
            if ($search['pay_status'] != 10) {
                $map['o.pay_status'] = array("eq", $search['pay_status']);
            } else {
            }

            if ($search['time2'] != null) {
                $map['o.cyear'] = array("eq", $search['time2']);
                if ($search['year'] != null) {
                    $map['o.cmonth'] = array("eq", $search['year']);
                }
            }
            $info = M()->table('__ORDER__ ')
                ->where(array("order_type" => 0))
                ->order('pay_time desc,addtime desc')
                ->field("group_concat(id) as id,sum(money),YEAR(FROM_UNIXTIME(`addtime`)) as cyear ,CEILING(MONTH( FROM_UNIXTIME(`addtime`))/3.0) as cmonth,member_id,pay_status")
                ->group("concat(cyear,cmonth),member_id")
                ->buildSql();

            $data = M()->table($info . ' o')
                ->join('left join  __MEMBER__ m  on o.member_id = m.id')
                ->join('left join __COMPANY__ c on c.id=m.company_id')
                ->where($map)
                ->order("o.cmonth,o.cmonth")
                ->page($_GET['p'] . ',20')
                ->field("o.*,c.name as cname,m.id as member_id,m.member as username , m.name as mname")
                ->select();
            $count1 = M()->table($info . ' o')
                ->join('left join  __MEMBER__ m  on o.member_id = m.id')
                ->join('left join __COMPANY__ c on c.id=m.company_id')
                ->where($map)
                ->order("o.cmonth,o.cmonth")
                ->field("o.*,c.name")
                ->select();
            $count = count($count1);
        } else {
            $map['m.type']       = array("eq", 1);
            $map['m.state']      = array("eq", 1);
            $map['o.pay_status'] = array("eq", 0);
            $info                = M()->table('__ORDER__ ')
                ->where(array("order_type" => 0))
                ->order('pay_time desc,addtime desc')
                ->field("group_concat(id) as id,sum(money),YEAR(FROM_UNIXTIME(`addtime`)) as cyear ,CEILING(MONTH( FROM_UNIXTIME(`addtime`))/3.0) as cmonth,member_id,pay_status")
                ->group("concat(cyear,cmonth),member_id")
                ->buildSql();
            $data = M()->table($info . ' o')
                ->join('left join  __MEMBER__ m  on o.member_id = m.id')
                ->join('left join __COMPANY__ c on c.id=m.company_id')
                ->where($map)
                ->order("o.cmonth,o.cmonth")
                ->field("o.*,c.name as cname,m.id as member_id,m.member as username , m.name as mname")
                ->page($_GET['p'] . ',20')
                ->select();
            $count1 = M()->table($info . ' o')
                ->join('left join  __MEMBER__ m  on o.member_id = m.id')
                ->join('left join __COMPANY__ c on c.id=m.company_id')
                ->where($map)
                ->order("o.cmonth,o.cmonth")
                ->field("o.*,c.name as cname,m.id as member_id,m.member as username , m.name as mname")
                ->select();
            $count = count($count1);
        }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }
// 导出固定客户季度清算汇总
    public function member_forms_sexcel()
    {
        set_time_limit(0);
        $search    = I();
        $depart_id = cookie("depart_id");
        if ($depart_id != 0 || !empty($depart_id)) {
            $map['company_id'] = array('eq', $depart_id);
        }
        if ($search['tid'] != null) {
            $tid         = $this->qq($search['tid']);
            $map['m.id'] = array("in", $tid);
        }
        $map['m.type']  = array("eq", 1);
        $map['m.state'] = array("eq", 1);
        if ($search['pay_status'] != 10) {
            $map['o.pay_status'] = array("eq", $search['pay_status']);
        }
        if ($search['time2'] != null) {
            $map['o.cyear'] = array("eq", $search['time2']);
            if ($search['year'] != null) {
                $map['o.cmonth'] = array("eq", $search['year']);
            }
        }

        $info = M()->table('__ORDER__ ')
            ->where(array("order_type" => 0))
            ->order('pay_time desc,addtime desc')
            ->field("YEAR(FROM_UNIXTIME(`addtime`)) as cyear ,CEILING(MONTH( FROM_UNIXTIME(`addtime`))/3.0) as cmonth,sum(money),pay_status,member_id")
            ->group("concat(cyear,cmonth),member_id")
            ->buildSql();

        $data = M()->table($info . ' o')
            ->join('left join  __MEMBER__ m  on o.member_id = m.id')
            ->join('left join __COMPANY__ c on c.id=m.company_id')
            ->where($map)
            ->order("o.cmonth,o.cmonth")
            ->field("c.name as cname, m.name as mname,m.member as username,o.*")
            ->select();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['pay_status'] == 1) {
                $data[$i]['pay_status'] = '已结算';
                $data[$i]['member_id']  = '';
            } else {
                $data[$i]['pay_status'] = '未结算';
                $data[$i]['member_id']  = '';
            }
        }
        $headArr  = array('公司名称', '会员名称', '会员账号', '年度', '季度', '小计', '状态');
        $filename = "固定客户季度清算汇总";
        $this->getExcel($filename, $headArr, $data);
    }
    //结算
    public function balance()
    {
        set_time_limit(0);
        $arr    = I();
        $pieces = explode(",", $arr['id']);
        for ($i = 0; $i < count($pieces); $i++) {
            $data              = M('order');
            $data->id          = $pieces[$i];
            $data->pay_time    = strtotime(date('Y-m-d H:i:s'));
            $data->pay_status  = 1;
            $data->post_status = 6;
            $data->save();
        }
        $this->success('结算成功！', U('/home/statist/member_forms'));
    }
    //查看详情
    public function look()
    {
        $arr         = I();
        $map['o.id'] = array("in", $arr['id']);
        $info        = M()->table('__ORDER__ o ')
            ->join("__BILL__ b on b.order_id=o.id")
            ->join("__BILL_GOODS__ bg on bg.bill_id=b.id")
            ->join("__GOODS__ g on g.id=bg.goods_id")
            ->field("g.goods_name,sum(bg.use_num) as usenum,g.price")
            ->group("g.goods_name")
            ->where($map)->select();
        $this->assign('data', $info);
        $this->display();

    }

    //导出方法实现
    private function getExcel($fileName, $headArr, $data)
    {
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");

        $date = date("Y_m_d", time());
        $fileName .= "_{$date}.xls";

        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps    = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        //print_r($headArr);exit;
        foreach ($headArr as $v) {
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
            $key += 1;
        }

        $column      = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();

        //print_r($data);exit;
        foreach ($data as $key => $rows) {
            //行写入
            $span = ord("A");
            foreach ($rows as $keyName => $value) {
// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j . $column, $value);
                $span++;
            }
            $column++;
        }

        $fileName = iconv("utf-8", "gb2312", $fileName);

        //重命名表
        //$objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean(); //清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }

}
