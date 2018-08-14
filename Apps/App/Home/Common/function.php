<?php
//打印
function p($arr)
{
    dump($arr);
    die;
}
//微信头像解码	
function userTextDecode($name)
    {
        $text = json_encode($name); //暴露出unicode
        $text = preg_replace_callback('/\\\\\\\\/i', function ($name) {
            return '\\';
        }, $text); //将两条斜杠变成一条，其他不动
        return json_decode($text);
    }
//微信头像转码	
 function userTextEncode($wx_name)
    {
        if (!is_string($wx_name)) {
            return $wx_name;
        }

        if (!$wx_name || $wx_name == 'undefined') {
            return '';
        }

        $wxname = json_encode($wx_name); //暴露出unicode
        $wxname = preg_replace_callback("/(\\\u[ed][0-9a-f]{3})/i", function ($wx_name) {
            return addslashes($wx_name[0]);
        }, $wxname); //将emoji的unicode留下，其他不动，这里的正则比原答案增加了d，因为我发现我很多emoji实际上是\ud开头的，反而暂时没发现有\ue开头。
        return json_decode($wxname);
    }

//传递数据以易于阅读的样式格式化后输出
function pp($data)
{
    // 定义样式
    $str = '<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid #CCC;border-radius: 4px;">';
    // 如果是boolean或者null直接显示文字；否则print
    if (is_bool($data)) {
        $show_data = $data ? 'true' : 'false';
    } elseif (is_null($data)) {
        $show_data = 'null';
    } else {
        $show_data = print_r($data, true);
    }
    $str .= $show_data;
    $str .= '</pre>';
    echo $str;
    die;
}
/**
 * 验证码检查
 */
function check_verify($code, $id = "1")
{

    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}
//数组合并
function Merge($arr1, $arr2)
{
    $arr = array_merge($arr1, $arr2);
    return $arr;
}
//组合数组
function mergearr($list1, $list2, $list3)
{
    $arr = array_merge($list1, $list2, $list3);
    return $arr;
}
//时间月份
function month()
{
    $year       = date("Y");
    $month      = date("m");
    $allday     = date("t");
    $strat_time = strtotime($year . "-" . $month . "-1");
    $end_time   = strtotime($year . "-" . $month . "-" . $allday);
    $arr        = array(
        'sttime'  => $strat_time,
        'endtime' => $end_time,
    );
    return $arr;
}
function create_guid()
{
    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
    $hyphen = chr(45);
    $uuid   = chr(123)
        . substr($charid, 0, 8) . $hyphen
        . substr($charid, 8, 4) . $hyphen
        . substr($charid, 12, 4) . $hyphen
        . substr($charid, 16, 4) . $hyphen
        . substr($charid, 20, 12)
        . chr(125);
    $uuid = substr($uuid, 0, -1); //去头//去尾
    $uuid = substr($uuid, 1);
    $arr  = explode("-", $uuid);
    for ($i = 0; $i < count($arr); $i++) {
        $str = $arr[$i] . $str;
    }
    return $str;
}
//存储照片
function upload()
{
    $upload           = new \Think\Upload(); // 实例化上传类
    $upload->maxSize  = 3145728; // 设置附件上传大小
    $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
    $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
    $upload->savePath = ''; // 设置附件上传（子）目录
    $info             = $upload->upload();
    $url              = $info['file']['savepath'] . $info['file']['savename'];
    return $url;
}
//存储多照片
function uploads()
{
    $upload           = new \Think\Upload(); // 实例化上传类
    $upload->maxSize  = 3145728; // 设置附件上传大小
    $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
    $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
    $upload->savePath = ''; // 设置附件上传（子）目录
    $info             = $upload->upload();
    $arr              = array();
    foreach ($info as $file) {
        $arr['pic'] = $file['savepath'] . $file['savename'];
    }
    return $arr;
}
//商品存储多照片
function uploadss()
{
    $upload           = new \Think\Upload(); // 实例化上传类
    $upload->maxSize  = 3145728; // 设置附件上传大小
    $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
    $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
    $upload->savePath = ''; // 设置附件上传（子）目录
    $info             = $upload->upload();
    $arr              = array();
    foreach ($info as $file) {
        $arr[] = $file['savepath'] . $file['savename'];
    }
    return $arr;
}
//删除照片
function delpic($url)
{
    unlink($url);
}

function column($input, $columnKey, $indexKey = null)
{
    $columnKeyIsNumber = (is_numeric($columnKey)) ? true : false;
    $indexKeyIsNull    = (is_null($indexKey)) ? true : false;
    $indexKeyIsNumber  = (is_numeric($indexKey)) ? true : false;
    $result            = array();

    foreach ((array) $input as $key => $row) {
        if ($columnKeyIsNumber) {
            $tmp = array_slice($row, $columnKey, 1);
            $tmp = (is_array($tmp) && !empty($tmp)) ? current($tmp) : null;
        } else {
            $tmp = isset($row[$columnKey]) ? $row[$columnKey] : null;
        }
        if (!$indexKeyIsNull) {
            if ($indexKeyIsNumber) {
                $key = array_slice($row, $indexKey, 1);
                $key = (is_array($key) && !empty($key)) ? current($key) : null;
                $key = is_null($key) ? 0 : $key;
            } else {
                $key = isset($row[$indexKey]) ? $row[$indexKey] : 0;
            }
        }

        $result[$key] = $tmp;
    }

    return $result;
}

/**
 * 根据登录者身份获取其所在分店
 * @return departId|NULL 分店ID
 */
function getDepartId()
{
    $admin_id = cookie('admin_id');
    if (isDepartAdmin()) {
        //分店管理员
        $depart = M()->table('__ADMIN__ A')->where(array('A.admin_id' => $admin_id))->field('A.depart_id')->find();
        return $depart['depart_id'];
    }

    return null;
}

function getCurrentUserRoleId()
{
    $admin_id = cookie('admin_id');
    $role     = M()->table('__ROLEADMIN__ RADMIN')->where($where = array('RADMIN.admin_id' => $admin_id))->field('RADMIN.role_id')->find();
    return $role['role_id'];
}

function getCurrentUserRoleIds()
{
    $admin_id = cookie('admin_id');
    $roles    = M()->table('__ROLEADMIN__ RADMIN')->where($where = array('RADMIN.admin_id' => $admin_id))->field('RADMIN.role_id')->select();
    return $roles;
}

function isDepartAdmin()
{
    $admin_id = cookie('admin_id');
    $role     = M()->table('__ROLEADMIN__ RADMIN')
        ->join('left join __ROLE__ r on r.role_id = RADMIN.role_id')
        ->where($where = array('RADMIN.admin_id ' => $admin_id))->field('r.is_depart_admin')->select();
    foreach ($role as $key => $value) {
        if ($value['is_depart_admin'] == 1) {
            return true;
        }
    }
    return false;
}

function isDepartAdminUser($user_id)
{
    $role = M()->table('__ROLEADMIN__ RADMIN')
        ->join('left join __ROLE__ r on r.role_id = RADMIN.role_id')
        ->where($where = array('RADMIN.admin_id ' => $user_id))->field('r.is_depart_admin')->select();
    foreach ($role as $key => $value) {
        if ($value['is_depart_admin'] == 1) {
            return true;
        }
    }
    return false;
}

/**
 * 根据商品ID获取品类ID
 */
function getClassIdFromGoodsId($goods_id)
{
    $data = M()->table('__GOODS__ g')
        ->join('left join __GOODS_CLASS__ gc on gc.id = g.class_id')
        ->field('gc.id as class_id')
        ->where($where = array('g.id' => $goods_id))
        ->find();
    // $data = column($data, 'class_id');
    // dump($data);
    return $data['class_id'];
}
function pic()
{
    $upload           = new \Think\Upload(); // 实例化上传类
    $upload->maxSize  = 3145728; // 设置附件上传大小
    $upload->exts     = array('jpg', 'gif', 'png', 'jpeg', 'mp4'); // 设置附件上传类型
    $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
    $upload->savePath = ''; // 设置附件上传（子）目录
    // 上传文件
    $info = $upload->upload();
    if ($info['sm_pic']['savepath'] . $info['sm_pic']['savename'] != null) {
        $pic = $info['sm_pic']['savepath'] . $info['sm_pic']['savename'];
    }
    return $pic;
}

