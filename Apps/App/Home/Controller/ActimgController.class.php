<?php
/**
 * 商品一级分类管理
 * User: cyl
 */
namespace Home\Controller;

use Think\Controller;

class ActimgController extends IndexController
{

    public function actimgindex()
    {

        $data = M()->table('__ACTIVITY_IMG__ a')
            ->join('left join __GOODS__ g on g.id = a.goods_id')
            ->field('a.*,g.goods_name')
            ->page($_GET['p'] . ',20')
            ->select();
        $count = M()->table('__ACTIVITY_IMG__ a')
            ->join('left join __GOODS__ g on g.id = a.goods_id')->count();
        // }
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->display();
    }

    //商品一级分类新增
    public function actimgadd()
    {
        $arr = I();

        if ($arr != null) {

            $data = M('activity_img')->where(array('is_recommend' => 1))->field('id as i_id')->find();
            if ($data != null) {
                $datas     = $data['i_id'];
                $map['id'] = $datas;
                $user      = M('activity_img');
                $user->where($map)->setField('is_recommend', '0');
            }
            $pic = M('activity_img');
            // $goodsclass->name   = $arr['name'];
            $upload           = new \Think\Upload(); // 实例化上传类
            $upload->maxSize  = 3145728; // 设置附件上传大小
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['pic']['savepath'] . $info['pic']['savename'] != null) {
                $pic->img = $info['pic']['savepath'] . $info['pic']['savename'];
            }
            $pic->is_recommend = $arr['is_recommend'];
            $pic->goods_id     = $arr['goods_id'];
            $pic->add();
            $this->success('新增成功！', U('/home/actimg/actimgindex'));
            // }
        } else {

            $data     = M('activity_img')->select();
            $goods_id = "";
            foreach ($data as $key => $value) {
                $goods_id .= $value['goods_id'] . ',';
            }
            $goods_id = trim($goods_id, ',');
            if ($goods_id != null) {

                $map['g.id'] = array('not in', $goods_id);
            }
            $go['g.is_delete']  = 0;
            $go['g.is_on_sale'] = 1;
            $goods              = M()->table('__GOODS__ g')
                ->where($go)
                ->field('g.id as goods_id,g.goods_name')
                ->select();

            // dump($goods);
            $this->assign('goods', $goods);
            $this->display();
        }
    }

    //商品一级分类编辑
    public function actimgupdate()
    {
        $arr = I();
        // dump($arr);

        if ($arr['rename'] != null) {
            // dump($arr);die;
            $a_id = $arr['id'];

            $where['id']           = array('neq', $a_id);
            $where['is_recommend'] = 1;
            $data                  = M('activity_img')->where($where)->field('id as i_id')->find();
            if ($data != null) {
                $datas       = $data['i_id'];
                $where['id'] = $datas;
                $user        = M('activity_img');
                $user->where($where)->setField('is_recommend', '0');
            }
            $goodsclass               = M('activity_img');
            $goodsclass->id           = $arr['id'];
            $goodsclass->is_recommend = $arr['is_recommend'];
            // $goodsclass_data['name'] = $arr['name'];
            $upload           = new \Think\Upload(); // 实例化上传类
            $upload->maxSize  = 3145728; // 设置附件上传大小
            $upload->exts     = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if ($info['pic']['savepath'] . $info['pic']['savename'] != null) {
                $goodsclass->img = $info['pic']['savepath'] . $info['pic']['savename'];
            }
            $goodsclass->save();
            $this->success('编辑成功！', U('/home/actimg/actimgindex'));
        } else {
            $data = M()->table('__ACTIVITY_IMG__ a')
                ->join('left join __GOODS__ g on g.id = a.goods_id')
                ->where(array('a.id' => $arr['id']))
                ->field('a.*,g.goods_name')
                ->find();
            $this->assign('data', $data);
            $this->display();
        }
    }
    //商品一级分类删除
    public function actimgdel()
    {
        M('activity_img')->where(array('id' => I('id')))->delete();
        $this->success('删除成功！', U('/home/actimg/actimgindex'));
    }
}
