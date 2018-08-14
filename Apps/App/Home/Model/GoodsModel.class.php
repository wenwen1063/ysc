<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends BaseModel{
    /**
     * 说明
     * @access public
     * @param 商品分页model
     * @param display
     */
    public function getGoodslist($map,$page,$limit = 2){
        // return $this->alias('g')->where($map)->select();
        $count=$this->where($map)->count();
        $page = new \Think\Page($count,$limit);
        // 获取分页数据
        $list=$this->where($map)->limit($page->firstRow.','.$page->listRows)->select();
        $data=array(
            'data'=>$list,
            'page'=>$page->show()
            );
        return $data;
    }
    /**
     * 说明
     * @access public
     * @param 商品库存变动 type{1.更新 2.新增 3.减少}
     * @param
     */
    public function upGoodsStock($type=null,$goods_id=999999,$num=0,$set='goods_inventory'){
        switch ($type) {
            case '1':
                $data['goods_id'] = $goods_id;
                $data['$set'] = $num;
                $this->data($data)->save();
                break;
            case '2':
                $this->where($where = array('goods_id'=>$goods_id))->setInc($set,$num);
                break;
            case '3':
                $this->where($where = array('goods_id'=>$goods_id))->setDec($set,$num);
                break;
            default:
                # code...
                break;
        }
    }
}