<?php
/**
 * Goods-model
 * Goods: lwh
 */
namespace Home\Model;

use Think\Model;

class TeacherModel extends Model
{
    /*新增商品*/
    public function teacheradd($arr, $synopsis_detailed)
    {
        set_time_limit(0);

        $user            = M('user');
        $user->userphone = $arr['userphone'];
        $user->password  = $arr['password'];
        $user->username  = $arr['name'];
        $user->email     = $arr['email'];
        if ($arr['pic']) {
            $user->avatar = $arr['pic'];
        }
        $user->province = $arr['province'];
        $user->city     = $arr['city'];
        $user->district = $arr['district'];
        $user->address  = $arr['address'];
        $user->remark   = $arr['remark'];
        $user->addtime  = strtotime(date('Y-m-d H:i:s'));
        $g_id           = $user->add(); //商品添加
        // $user->id       = $g_id;
        // $user->save();

        $teacher = M('teacher');
        // $teacher->user_id = $arr[''];
        $teacher->teacher_name = $arr['name'];
        $teacher->user_id      = $g_id;
        $teacher->synopsis     = $arr['synopsis'];

        if ($arr['pic']) {
            $teacher->img = $arr['pic'];
        }
        if ($arr['teacher_img']) {
            $teacher->teacher_img = $arr['teacher_img'];
        }
        $teacher->synopsis_detailed = $synopsis_detailed;
        $teacher->is_recommend      = $arr['is_recommend'];
        $teacher->add();
    }
    /*商品编辑*/
    public function tupdate($arr, $synopsis_detailed)
    {
        //会员信息编辑
        set_time_limit(0);
        $user            = M('user');
        $user->userphone = $arr['userphone'];
        $user->password  = $arr['password'];
        $user->username  = $arr['name'];
        $user->email     = $arr['email'];
        if ($arr['pic']) {
            $user->avatar = $arr['pic'];
        }
        $user->province = $arr['province'];
        $user->city     = $arr['city'];
        $user->district = $arr['district'];
        $user->address  = $arr['address'];
        $user->remark   = $arr['remark'];
        $user->addtime  = strtotime(date('Y-m-d H:i:s'));
        $user->save();

        $teacher = M('teacher');
        // $teacher->user_id = $arr[''];
        $teacher->teacher_name = $arr['name'];
        $teacher->synopsis     = $arr['synopsis'];

        if ($arr['pic']) {
            $teacher->img = $arr['pic'];
        }
        if ($arr['teacher_img']) {
            $teacher->teacher_img = $arr['teacher_img'];
        }
        $teacher->synopsis_detailed = $synopsis_detailed;
        $teacher->is_recommend      = $arr['is_recommend'];
        $teacher->save();
    }
    /*相册添加图片*/
    public function picadd($arr)
    {
        $pic           = M('pic');
        $pic->pic      = $arr['pic'];
        $pic->goods_id = $arr['goods_id'];
        $pic->add();
    }

}
