<?php
/**
商家管理
 */

namespace Home\Controller;

use Think\Controller;


class SellerController extends IndexController
{
/*商家列表*/
    public function Sellerindex(){
        $search = I();
//        dump($search);
        if ($search != null) {
            $name         = $search['name'];
            $synopsis     = $search['synopsis'];
            $is_disable   = $search['is_disable'];
            $prov     = $search['prov'];
            $city     = $search['city'];
            $dist     = $search['dist'];
            if($name != ""){
                $map['name']        = array("like", "%$name%");
            }
            if($synopsis != ""){
                $map['synopsis']    = array("like", "%$synopsis%");
            }
            if($is_disable != ""){
                $map['is_disable']  = array("like", "%$is_disable%");
            }
            if($prov != ""){
                $map['province']    = array("like", "%$prov%");
                $map['city']        = array("like", "%$city%");
                $map['district']    = array("like", "%$dist%");
            }

//            $map['name']        = array("like", "%$name%");
//            $map['synopsis']    = array("like", "%$synopsis%");
//            $map['is_disable']  = array("like", "%$is_disable%");
//            $map['province']    = array("like", "%$prov%");
//            $map['city']        = array("like", "%$city%");
//            $map['district']    = array("like", "%$dist%");

            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $map['id'] =  array('eq', $seller_id);
                $data = M('seller')
                    ->where($map)
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M('seller')->where($map)->count();

            }else{
                $data = M()->table('__SELLER__')
                    ->where($map)
                    ->page($_GET['p'] . ',20')
                    ->select();
//                pp($data);
                $count = M('seller')->where($map)->count();
            }
//            $data = M('seller')
//                ->where($map)
//                ->page($_GET['p'] . ',20')
//                ->select();
//            $count = M('seller')->where($map)->count();

//            pp($map);
        } else {
            $seller_id = cookie("seller_id");
            if ($seller_id != 0 || !empty($seller_id)) {
                $cooksj['id'] =  array('eq', $seller_id);
                $data = M()->table('__SELLER__')
                    ->where($cooksj)
//                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__SELLER__')->where($cooksj)->count();
            }else{
                $data = M()->table('__SELLER__')
                    ->page($_GET['p'] . ',20')
                    ->select();
                $count = M()->table('__SELLER__')->count();
//                pp($data);
            }
        }
//        pp($data);
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();

    }
    //新增商家
    public function selleradd(){
        $arr = I();
        if($arr != null){
            $isnot = M('seller')->where(array('name'=>$arr['name']))->find();
            $isnot2 = M('seller')->where(array('forshort'=>$arr['forshort']))->find();
            $isnot3 = M('seller')->where(array('number'=>$arr['number']))->find();
            if($isnot3){
                $this->error('编号重复请重新输入');
            }
            if($isnot2){
                $this->error('简称重复请重新输入');
            }
            if($isnot){
                $this->error('名称重复请重新输入');
            }

            $arr_img     = uploadss();
            $seller = M('seller');
            $seller->number          = $arr['number'];
            $seller->name            = $arr['name'];
            $seller->forshort        = $arr['forshort'];
            $seller->company_name    = $arr['company_name'];
            $seller->synopsis        = $arr['synopsis'];
            $seller->contact         = $arr['contact'];
            $seller->tel             = $arr['tel'];
            $seller->phone           = $arr['phone'];
            $seller->qq              = $arr['qq'];
            $seller->wechat          = $arr['wechat'];
            $seller->province        = $arr['prov'];
            $seller->city            = $arr['city'];
            $seller->district        = $arr['dist'];
            $seller->address         = $arr['address'];
            $seller->is_recommend    = $arr['is_recommend'];
            $seller->sort            = $arr['sort'];
            $seller->is_disable      = '0'; //是否禁用，默认不禁用
            $seller->disable_reason  = ''; //禁用原因，默认为空
            $seller->time            = time();
            //图片
            $seller->logo                  = $arr_img[0];
            $seller->ad_pic                = $arr_img[1];
            $seller->license               = $arr_img[2];
            $seller->business_certificate  = $arr_img[3];
            $seller->corporationid_front   = $arr_img[4];
            $seller->corporationid_back    = $arr_img[5];
            $seller->other                 = $arr_img[6];

            $result  = $seller->add();
            if($result){
                $this->success('新增成功！',U('Home/seller/sellerindex'));
            }
        }
        $this->display();
    }

    /*
     *商家管理 - 禁用操作
     */
    public function sellerdisable()
    {
        $arr  = I();
        $data = M('seller');
        if ($arr['is_disable'] == 0) {
            //禁用操作
            $data->id         = $arr['id'];
            $data->is_disable = 1;
            $data->save();
            $this->success('禁用成功！', U('/home/seller/sellerindex'));
        } else {
            //启动操作
            $data->id         = $arr['id'];
            $data->is_disable = 0;
            $data->save();
            $this->success('启用成功！', U('/home/seller/sellerindex'));
        }
    }

    /*
     *商家管理 - 编辑
     */
    public function sellerupdate()
    {
        $arr = I();

//         pp($arr);
        if ($arr['name'] != null || $arr['forshort'] != null) {
            if($arr['renumber'] != $arr['number']){
                $isnot3 = M('seller')->where(array('number'=>$arr['number']))->find();
                if($isnot3){
                    $this->error('编号重复请重新输入');
                }
            }
            if($arr['rename'] != $arr['name']){
                $isnot2 = M('seller')->where(array('name'=>$arr['name']))->find();
                if($isnot2){
                    $this->error('名称重复请重新输入');
                }
            }
            if($arr['reforshort'] != $arr['forshort']){
                $isnot1 = M('seller')->where(array('forshort'=>$arr['forshort']))->find();
                if($isnot1){
                    $this->error('简称重复请重新输入');
                }
            }
            /*$isnot = M('seller')->where(array('name'=>$arr['name']))->find();
            $isnot2 = M('seller')->where(array('forshort'=>$arr['forshort']))->find();
            $isnot3 = M('seller')->where(array('number'=>$arr['number']))->find();
            if($isnot3){
                $this->error('编号重复请重新输入');
            }
            if($isnot2){
                $this->error('简称重复请重新输入');
            }
            if($isnot){
                $this->error('名称重复请重新输入');
            }*/
            $upload             = new \Think\Upload(); // 实例化上传类
            $upload->maxSize    = 3145728; // 设置附件上传大小
            $upload->exts       = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath   = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath   = ''; // 设置附件上传（子）目录
            // 上传文件
            $arr_img = $upload->upload();
//            $logo = $arr_img['logo']['savepath'] . $arr_img['logo']['savename'];

//            $arr_img     = upload();
//            pp($logo);

            $seller = M('seller');
            $seller->number          = $arr['number'];
            $seller->name            = $arr['name'];
            $seller->forshort        = $arr['forshort'];
            $seller->company_name    = $arr['company_name'];
            $seller->synopsis        = $arr['synopsis'];
            $seller->contact         = $arr['contact'];
            $seller->tel             = $arr['tel'];
            $seller->phone           = $arr['phone'];
            $seller->qq              = $arr['qq'];
            $seller->wechat          = $arr['wechat'];
            $seller->province        = $arr['prov'];
            $seller->city            = $arr['city'];
            $seller->district        = $arr['dist'];
            $seller->address         = $arr['address'];
            $seller->is_recommend    = $arr['is_recommend'];
            $seller->sort            = $arr['sort'];
            $seller->is_disable      = '1'; //是否禁用，默认禁用
            $seller->disable_reason  = ''; //禁用原因，默认为空
//            $seller->time            = time();
            $seller->id         = $arr['id'];
            //图片
            if($arr_img['logo']['savepath'] . $arr_img['logo']['savename'] != null){
                $seller->logo                   = $arr_img['logo']['savepath'] . $arr_img['logo']['savename'];
            }
            if($arr_img['ad_pic']['savepath'] . $arr_img['ad_pic']['savename'] != null){
                $seller->ad_pic                 = $arr_img['ad_pic']['savepath'] . $arr_img['ad_pic']['savename'];
            }
            if($arr_img['license']['savepath'] . $arr_img['license']['savename'] != null){
                $seller->license                 = $arr_img['license']['savepath'] . $arr_img['license']['savename'];
            }
            if($arr_img['business_certificate']['savepath'] . $arr_img['business_certificate']['savename'] != null){
                $seller->business_certificate    = $arr_img['business_certificate']['savepath'] . $arr_img['business_certificate']['savename'];
            }
            if($arr_img['corporationid_front']['savepath'] . $arr_img['corporationid_front']['savename'] != null){
                $seller->corporationid_front     = $arr_img['corporationid_front']['savepath'] . $arr_img['corporationid_front']['savename'];
            }
            if($arr_img['corporationid_back']['savepath'] . $arr_img['corporationid_back']['savename'] != null){
                $seller->corporationid_back      = $arr_img['corporationid_back']['savepath'] . $arr_img['corporationid_back']['savename'];
            }
            if($arr_img['other']['savepath'] . $arr_img['other']['savename'] != null){
                $seller->other      = $arr_img['other']['savepath'] . $arr_img['other']['savename'];
            }

            $result  = $seller->save();
            if($result){
                $this->success('编辑成功！',U('Home/seller/sellerindex'));
            }

        } else {
            $data = M('seller')
                ->where($where = array('id' => I('id')))->find();
//            pp($data);
            $this->assign('data', $data);
            $this->display();

        }
    }
    /*
    *商家删除
    */
    public function sellerdel()
    {
        M('seller')->where($where = array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/seller/sellerindex'));
    }
    /*
  *商家详情
  */
    public function sellerinfo()
    {
        $data = M('seller')->where($where = array('id' => I('id')))->find();
//        pp($data);
        $this->assign('data',$data);
        $this->display();
    }
//	商家返点设置
	public function bonus(){
		$search = I();
        if ($search != null) {
			 $map['sbs.seller_id']        = array("eq", I("seller_id"));
			$sid=$search['seller_id'];
			
        }else{
        	 $map['sbs.seller_id']        = array("eq",0);
        	 $sid=0;
        }
        	$count = M()->table('__SALE_BONUS_SET__ sbs')
                ->where($map)
                ->count();
		if($count==0){
			for ($i = 0; $i < 3; $i++) {
                 $save['partner_id'] = $i+1;
                for ($j = 0; $j < 3; $j++) {
                    $save['partner_level'] = $j + 1; //搭档层级
                    $save['rate'] = 0;
					$save['seller_id'] =I("seller_id");
                	$res = M('sale_bonus_set')->add($save);
                }
            }
		}
		$data = M()->table('__SALE_BONUS_SET__ sbs')
                ->join('left join __PARTNER__ p on p.id=sbs.partner_id')
                ->where($map)
                ->field('sbs.*,p.name')
                ->select();
            //数据处理
            $done = array();
            foreach ($data as $key => $value) {
                $done[$value['partner_id']][] = $value;
            }    
//		商家列表	
		 $seller_id = cookie("seller_id");
        if ($seller_id != 0 || !empty($seller_id)) {
            $cooksj['id'] = array('eq', $seller_id);
//            $cooksj['company_id'] = array(array('eq', 0), array('eq', $seller_id), 'or');
            $seller = M('seller')->where($cooksj)->field('id,name')->select();
        } else {
            $seller = M('seller')->field('id,name')->select();
        }
		
        $this->assign('sale', $done);
		$this->assign('seller_id', $sid);
        $this->assign('seller', $seller);
        $this->display();
	}

	public function bonus_updata(){
		$arr = I();
		foreach ($arr['partner_ids'] as $key => $value) {
               $map['partner_id'] = $value; //搭档id
               $map['seller_id'] = I("seller_id");
                for ($i = 0; $i < 3; $i++) {
                    $partner_level        = $i + 1;
                    $map['partner_level'] = $partner_level; //搭档层级
                    if ($partner_level == 1) {
                        $save['rate'] = $arr['first_level'][$key];
                    } else if ($partner_level == 2) {
                        $save['rate'] = $arr['second_level'][$key];
                    } else if ($partner_level == 3) {
                        $save['rate'] = $arr['third_level'][$key];
                    }
                    $res = M('sale_bonus_set')->where($map)->save($save);
                }
            }
		$this->redirect("/home/seller/bonus",array('seller_id'=>I('seller_id')));
	}
}