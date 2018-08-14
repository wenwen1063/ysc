<?php
/**
 * base-model
 * base: lwh
 */
namespace Home\Model;

use Think\Model;

/**
 * 基础模型
 * @access public
 * @param CURD
 */
class PartnerModel extends BaseModel
{
//  首页会员列表显示
    /**
     * 说明
     * @access public
     * @param 用户添加
     * @param display
     * @return array      0：跳到添加，1：添加成功，2添加失败，
     */
    public function AddList($arr)
    {
        if ($arr == null) {
            $data = array('add' => 0);
        } else {
            $table  = M("partner");
            $confir = D("base")->addDataNpic($arr, $table);
            if ($confir) {
                $data = array('add' => 1);
            } else {
                $data = array('add' => 2);
            }
        }
        return $data;
    }
    /**
     * 说明
     * @access public
     * @param 用户编辑
     * @param display
     * @return array      0：跳到编辑，1：编辑成功，2编辑失败，
     */
    public function UpdateList($arr)
    {
        $table  = M("partner");
        $confir = D("base")->editData($arr, $table);
        if ($confir) {
            $data = array('updata' => 1);
        } else {
            $data = array('updata' => 2);
        }
        return $data;
    }

}
