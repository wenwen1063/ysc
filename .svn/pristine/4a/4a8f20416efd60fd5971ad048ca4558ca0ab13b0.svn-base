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
class InsuranceModel extends BaseModel
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
            $table  = M("insurance");
            $confir = D("base")->addDataNpic($arr, $table);
            $url    = explode(",", $arr['allpic']);
            for ($i = 0; $i < count($url); $i++) {
                if ($url[$i] != null) {
                    $pic               = M('insurance_pic');
                    $pic->pic          = str_replace(' ', '', $url[$i]);
                    $pic->insurance_id = $confir;
                    $pic->add();
                }
            }
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
        $table  = M("insurance");
        $confir = D("base")->editData($arr, $table);

        if ($arr['pic_id'] != null) {
            $delpicid['id']           = array('not in', $arr['pic_id']);
            $delpicid['insurance_id'] = $arr['id'];
            if ($delpicid['insurance_id'] != null) {
                M('insurance_pic')->where($delpicid)->delete();
            }
        }
        $url = explode(",", $arr['allpic']);
        for ($i = 0; $i < count($url); $i++) {
            if ($url[$i] != null) {
                $pic               = M('insurance_pic');
                $pic->pic          = str_replace(' ', '', $url[$i]);
                $pic->insurance_id = $arr['id'];
                $pic->add();
            }
        }
        if ($confir) {
            $data = array('updata' => 1);
        } else {
            $data = array('updata' => 2);
        }
        return $data;
    }

}
