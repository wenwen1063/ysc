<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: linweihong
// +----------------------------------------------------------------------
namespace Org\Util;

/**
 * 订单号实现类
 * @category   ORG
 * @package  ORG
 * @subpackage  Util
 * @author linweihong
 */
class Utils{
    //英文字母、年月日、Unix 时间戳和微秒数、随机数,一个字母对应一个年份
    public function orderNo() {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
        return $orderSn;
    }
    static public function orderNoNumber() {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
        return $orderSn;
    }
    public function column($input, $columnKey, $indexKey = NULL){
        $columnKeyIsNumber = (is_numeric($columnKey)) ? TRUE : FALSE;
        $indexKeyIsNull = (is_null($indexKey)) ? TRUE : FALSE;
        $indexKeyIsNumber = (is_numeric($indexKey)) ? TRUE : FALSE;
        $result = array();

        foreach ((array)$input AS $key => $row)
        {
          if ($columnKeyIsNumber)
          {
            $tmp = array_slice($row, $columnKey, 1);
            $tmp = (is_array($tmp) && !empty($tmp)) ? current($tmp) : NULL;
          }
          else
          {
            $tmp = isset($row[$columnKey]) ? $row[$columnKey] : NULL;
          }
          if ( ! $indexKeyIsNull)
          {
            if ($indexKeyIsNumber)
            {
              $key = array_slice($row, $indexKey, 1);
              $key = (is_array($key) && ! empty($key)) ? current($key) : NULL;
              $key = is_null($key) ? 0 : $key;
            }
            else
            {
              $key = isset($row[$indexKey]) ? $row[$indexKey] : 0;
            }
          }

          $result[$key] = $tmp;
        }

        return $result;
    }
}
