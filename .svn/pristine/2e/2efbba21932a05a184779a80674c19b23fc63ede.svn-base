<?php

namespace Home\Controller;

use Think\Controller;

/**
 * 话费流量
 * User: cyl
 */
class FeeflowController extends IndexController
{
    /*
     *话费流量列表
     */
    public function feeflowindex()
    {
        $search = I();
        if ($search != null) {
            //类型
            if ($search['type'] != null) {
                $map['tf.type'] = $search['type'];
            }
            //充值数量或金额
            if ($search['number_l'] != null) {
                $map['tf.number'] = array('EGT', $search['number_l']);
            }
            if ($search['number_h'] != null) {
                $map['tf.number'] = array('ELT', $search['number_h']);
            }
            if ($search['number_l'] != null && $search['number_h'] != null) {
                $map['tf.number'] = array('between', array($search['number_l'], $search['number_h']));
            }
            $data = M()->table('__TELEPHONE_FARE__ tf')
                ->where($map)
                ->page($_GET['p'] . ',20')
                ->select();
            $count = M()->table('__TELEPHONE_FARE__ tf')
                ->where($map)
                ->count();
        } else {
            $data = M()->table('__TELEPHONE_FARE__ tf')
                ->page($_GET['p'] . ',20')
                ->select();
//            pp($data);
            $count = M('telephone_fare')->count();
        }
        // pp($data);
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    /*
     *新增
     */
    public function feeflowadd()
    {
        $arr = I();
        if ($arr != null) {
            $data       = M('telephone_fare');
            $data->name = $arr['name'];
            $data->type = $arr['type']; //类型0话费 1流量
            if ($arr['type'] == 1) {
                $data->flow_type = $arr['flow_type']; //流量类型 0省内 1国内
            }
            $data->number = $arr['number'];
            if ($arr['type'] == 1) {
                $data->unit = 1;
            } else {
                $data->unit = 0;
            }
            $data->old_price = $arr['old_price'];
            $data->price     = $arr['price'];
            $data->remark    = $arr['remark'];
            $data->add();
            $this->success('新增成功！', U('/home/feeflow/feeflowindex'));
        } else {
            $this->display();
        }
    }

    /*
     *编辑
     */
    public function feeflowupdate()
    {
        $arr = I();
        if ($arr['name'] != null) {
            $data = M('telephone_fare');
            // $data->id   = $arr['id'];
            $data->name = $arr['name'];
            $data->type = $arr['type']; //类型0话费 1流量
            if ($arr['type'] == 1) {
                $data->flow_type = $arr['flow_type']; //流量类型 0省内 1国内
            }
            $data->number = $arr['number'];
            if ($arr['type'] == 1) {
                $data->unit = 1;
            } else {
                $data->unit = 0;
            }
            $data->old_price = $arr['old_price'];
            $data->price     = $arr['price'];
            $data->remark    = $arr['remark'];
            $data->where(array('id' => $arr['id']))->save();
            $this->success('编辑成功！', U('/home/feeflow/feeflowindex'));
        } else {
            $id   = $arr['id'];
            $data = M('telephone_fare')->where(array('id' => $id))->find();
            // pp($data);
            $this->assign('data', $data);
            $this->display();
        }
    }

    /*
     *删除
     */
    public function feeflowdel()
    {
        $id = I('id');
        if (!empty($id) && $id != null) {
            M('telephone_fare')->where(array('id' => $id))->delete();
            $this->success('删除成功！', U('/home/feeflow/feeflowindex'));
        }
    }
}
