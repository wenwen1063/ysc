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
class UserModel extends Model
{
//  首页会员列表显示
    /**
     * 说明
     * @access public
     * @param 用户添加
     * @param display
     * @return array      0：跳到添加，1：添加成功，2添加失败，
     */
    public function UserAddList($arr)
    {
        if ($arr == null) {
            $data = array('add' => 0);
        } else {
            $table  = M("user");
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
    public function UserUpdateList($arr)
    {
        if ($arr['password'] == null) {
            $list = M('user')->where(array('id' => $arr['id']))->find();
            $data = array(
                'list'   => $list,
                'updata' => 0,
            );
        } else {
            $table  = M("user");
            $confir = D("base")->editData($arr, $table);
            if ($confir) {
                $data = array('updata' => 1);
            } else {
                $data = array('updata' => 2);
            }
        }
        return $data;
    }

}
