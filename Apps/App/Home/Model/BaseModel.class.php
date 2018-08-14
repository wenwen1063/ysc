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
class BaseModel extends Model
{

    /**
     * 添加数据
     * @param  array $data  添加的数据没有图片
     * @param  array $table 数据库表
     * @param  array $map where查询条件
     * @return int          新增的数据id
     */
    public function addDataNpic($data, $table, $map = array())
    {
        // 去除键值首尾的空格
        foreach ($data as $k => $v) {
            if ($this->isDateTime($v)) {
                //          时间处理
                $data[$k] = $this->isDateTime($v);
            } else if ($k == 'password') {
                //密码处理
                $data[$k] = md5($v . C('MD5_KEY'));
            } else {
                $data[$k] = trim($v);
            }
        }
        if (count($map) == 0) {
            $result = $table->add($data);
        } else {
            $result = $table->where($map)->add($data);
        }
        return $result;
    }

/**
 * 判断是否是时间格式
 * @param  $dateTime
 * @return
 */

    private function isDateTime($dateTime)
    {
        $ret = strtotime($dateTime);
        return $ret !== false && $ret != -1;
    }

//***************************************************************************************
    /**
     * 修改数据
     * @param   array   $map    where语句数组形式
     * @param   array   $data   数据
     * @return  boolean         操作是否成功
     */
    public function editData($data, $table, $map = array())
    {
        // 去除键值首位空格
        foreach ($data as $k => $v) {
            if ($this->isDateTime($v)) {
                //          时间处理
                $data[$k] = $this->isDateTime($v);
            } else {
                $data[$k] = trim($v);
            }
        }
        if (count($map) == 0) {
            $result = $table->save($data);
        } else {
            $result = $table->where($map)->save($data);
        }
        return $result;
    }

    /**
     * 删除数据
     * @param   array   $arr    where语句数组形式
     * @return  boolean         操作是否成功
     */
    public function deleteData($arr, $table)
    {
        if (empty($arr)) {
            $result = 0;
        } else {
            if (is_array($arr['id'])) {
                set_time_limit(0);
                for ($i = 0; $i < count($arr['id']); $i++) {
                    $table->where(array('id' => $arr['id'][$i]))->delete();
                }
                $result = 1;
            } else {
                $table->where(array('id' => $arr['id']))->delete();
                $result = 1;
            }
        }
        return $result;
    }
/**
 * 禁启数据
 * @param   array   $arr    where语句数组形式
 *@param   $arr['type']    1:禁 ,2启
 *@param   table    数据库表
 * @return  boolean         操作是否成功
 */

    public function disableData($arr, $table)
    {
        $arr = I();
        if ($arr['type'] == 1) {
            //禁用操作
            if (empty($arr)) {
                $result = 0;
            } else {
                if (is_array($arr['id'])) {
                    set_time_limit(0);
                    for ($i = 0; $i < count($arr['id']); $i++) {
                        $table->where(array('id' => $arr['id'][$i]))->setField('is_disable', 1);
                    }
                    $result = 1;
                } else {
                    $table->where(array('id' => $arr['id']))->setField('is_disable', 1);
                    $result = 1;
                }
            }
        } else {
            if (empty($arr)) {
                $result = 0;
            } else {
                if (is_array($arr['id'])) {
                    set_time_limit(0);
                    for ($i = 0; $i < count($arr['id']); $i++) {
                        $table->where(array('id' => $arr['id'][$i]))->setField('is_disable', 0);
                    }
                    $result = 1;
                } else {
                    $table->where(array('id' => $arr['id']))->setField('is_disable', 0);
                    $result = 1;
                }
            }
        }
        return $result;
    }

    /**
     * 上下架数据
     * @param   array   $arr    where语句数组形式
     *@param   $arr['type']    1:禁 ,2启
     *@param   table    数据库表
     * @return  boolean         操作是否成功
     */

    public function saleData($arr, $table)
    {
        $arr = I();
        if ($arr['type'] == 1) {
            //禁用操作
            if (empty($arr)) {
                $result = 0;
            } else {
                if (is_array($arr['id'])) {
                    set_time_limit(0);
                    for ($i = 0; $i < count($arr['id']); $i++) {
                        $table->where(array('id' => $arr['id'][$i]))->setField('is_on_sale', 2);
                    }
                    $result = 1;
                } else {
                    $table->where(array('id' => $arr['id']))->setField('is_on_sale', 2);
                    $result = 1;
                }
            }
        } else {
            if (empty($arr)) {
                $result = 0;
            } else {
                if (is_array($arr['id'])) {
                    set_time_limit(0);
                    for ($i = 0; $i < count($arr['id']); $i++) {
                        $table->where(array('id' => $arr['id'][$i]))->setField('is_on_sale', 1);
                    }
                    $result = 1;
                } else {
                    $table->where(array('id' => $arr['id']))->setField('is_on_sale', 1);
                    $result = 1;
                }
            }
        }
        return $result;
    }
    /**
     * 数据排序
     * @param  array $data   数据源
     * @param  string $id    主键
     * @param  string $order 排序字段
     * @return boolean       操作是否成功
     */
    public function orderData($data, $id = 'id', $order = 'order_number')
    {
        foreach ($data as $k => $v) {
            $v = empty($v) ? null : $v;
            $this->where(array($id => $k))->save(array($order => $v));
        }
        return true;
    }

    /**
     * 获取全部数据
     * @param  string $type  tree获取树形结构 level获取层级结构
     * @param  string $order 排序方式
     * @return array         结构数据
     */
    public function getTreeData($type = 'tree', $order = '', $name = 'name', $child = 'id', $parent = 'pid')
    {
        // 判断是否需要排序
        if (empty($order)) {
            $data = $this->select();
        } else {
            $data = $this->order($order . ' is null,' . $order)->select();
        }
        // 获取树形或者结构数据
        if ($type == 'tree') {
            $data = \Org\Nx\Data::tree($data, $name, $child, $parent);
        } elseif ($type = "level") {
            $data = \Org\Nx\Data::channelLevel($data, 0, '&nbsp;', $child);
        }
        return $data;
    }

    /**
     * 获取分页数据
     * @param  subject  $model  model对象
     * @param  array    $map    where条件
     * @param  string   $order  排序规则
     * @param  integer  $limit  每页数量
     * @param  integer  $field  $field
     * @return array            分页数据
     */
    public function getPage($model, $map, $order = '', $limit = 10, $field = '')
    {
        $count = $model
            ->where($map)
            ->count();
        $page = new \Think\Page($count, $limit);
        // 获取分页数据
        if (empty($field)) {
            $list = $model
                ->where($map)
                ->order($order)
                ->limit($page->firstRow . ',' . $page->listRows)
                ->select();
        } else {
            $list = $model
                ->field($field)
                ->where($map)
                ->order($order)
                ->limit($page->firstRow . ',' . $page->listRows)
                ->select();
        }
        $data = array(
            'data' => $list,
            'page' => $page->show(),
        );
        return $data;
    }
}
