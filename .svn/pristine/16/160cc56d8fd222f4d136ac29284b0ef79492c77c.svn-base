<?php
/**
 *资讯馈管理
 * User: czq
 */
namespace Home\Controller;

use Think\Controller;

class InformationController extends IndexController
{
    /*资讯信息*/
    public function informationindex()
    {
        $search = I();
        $title  = $search['title'];
        $name   = $search['name'];
//        pp($search);
        $map    = array();
        if ($search != null) {
            if ($title != null) {
                $map['I.title'] = array("like", "%$title%");
            }
            if ($name != null) {
                $map['I.class_id'] = $name;
                //排除搜索过的分类
                $classid['id'] = array('neq', $name);
                $midclass      = M('infor_class')->where($classid)->field('id,name')->select();
                //全部分类
                $endclass['num'] = array('id' => null, 'name' => "全部分类");
                //搜索完毕后,第一个分类默认是之前搜索的分类
                $stclass = M('infor_class')->where($where = array('id' => $name))->field('id,name')->select();
                $class   = array_merge($stclass, $midclass, $endclass);
//                pp($class);
            } else {
                $class = $this->classsearch();
            }
            $data = M()->table('__INFORMATION__ I')
                ->join('left join __ADMIN__ A on A.id=I.admin_id')
                ->where($map)
                ->field('
                    I.*,
                    A.user as admin_user')
                ->page($_GET['p'] . ',20')->select();
            $count = M()->table('__INFORMATION__ I')
                ->join('left join __ADMIN__ A on A.id=I.admin_id')
                ->where($map)
                ->count();

        } else {
            $data = M()->table('__INFORMATION__ I')
                ->join('left join __ADMIN__ A on A.admin_id=I.admin_id')
                ->field('
                    I.*,
                    A.user as admin_user')
                ->page($_GET['p'] . ',20')->select();
//            pp($data);
            $count = M()->table('__INFORMATION__ I')
                ->join('left join __ADMIN__ A on A.id=I.admin_id')
                ->count();
            $class = $this->classsearch();
        }
//         dump($data);die;
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('search', $search);
        $this->assign('count', $count);
        $this->assign('data', $data);
        $this->assign('class', $class);
        $this->display();
    }

    //classsearch
    private function classsearch()
    {
        $classall['num'] = array('id' => null, 'name' => "全部分类");
        $class           = M('infor_class')->field('id,name')->select();
        $class           = array_merge($classall, $class);
//        pp($class);
        return $class;
    }

    // 资讯详情
    public function informationinfo()
    {
        $id          = I('id');
        $map['I.id'] = $id;
        $data        = M()->table('__INFORMATION__ I')
            ->where($map)
            ->join('left join __ADMIN__ A on A.id=I.admin_id')
            ->field('
                    I.*,
                    A.user as admin_user')
            ->find();
        // pp($data);
        $this->assign('data', $data);
        $this->display();
    }
    /*
     *资讯管理--添加资讯
     */
    public function informationadd()
    {
        $arr = I();
        if ($arr != null) {
            if ($_FILES) {
                $files = uploadss();
                if ($files) {
                    $data['pic'] = $files['0'];
                }
            }
            $data['admin_id']   = cookie('admin_id');
            $data['content']    = $_POST['content'];
            $data['creat_time'] = time();
            $data['title']      = $arr['title'];
            $data['class_id']   = $arr['class_id'];
            $name               = M('infor_class')->where(array('id' => array('eq', $arr['class_id'])))->field('name')->find();
            $data['name']       = $name['name'];
            $isnot = M('information')->where(array('title' => $data['title']))->find();
            if($isnot){
                $this->error('标题重复请重新输入');
            }
//            pp($data);
            // $data['admin_id']   = cookie('admin_id'); //后续要换成当前登录的管理员id
            $ret = M('information')->data($data)->add();
            $this->success('添加成功！', U('/home/information/informationindex'));
        } else {
            $infor_class = M('infor_class')->where($where = array('is_disable' => 0))->field('id,name as class_name')->select();
            $this->assign('infor_class', $infor_class);
            $this->display();
        }
    }
    public function deleteinformation()
    {
        $arr             = I();
        $information     = M('information');
        $information->id = $arr['id'];
        $res             = $information->delete();
        if ($res) {
            $this->success("删除成功！", U('/home/information/informationindex'));
        } else {
            $this->success("删除失败！", U('/home/information/informationindex'));
        }

    }

    /*
     *资讯管理-资讯编辑
     */
    public function informationupdate()
    {
        $arr = I();
        if ($arr['title'] != null) {
            if ($_FILES) {
                $files = uploadss();
                if ($files) {
                    $data['pic'] = $files['0'];
                }
            }
            $data['content']  = $_POST['content'];
            $data['title']    = $arr['title'];
            $data['class_id'] = $arr['class_id'];
            $name             = M('infor_class')->where(array('id' => array('eq', $arr['class_id'])))->field('name')->find();
            $data['name']     = $name['name'];
            if($arr['rtitle'] != $arr['title']){
                $isnot = M('information')->where(array('title' => $data['title']))->find();
                if($isnot){
                    $this->error('标题重复请重新输入');
                }
            }

            // dump($data);die;
            $ret = M('information')->where('id=' . $arr['id'])->data($data)->save();
            $this->success('编辑成功！', U('/home/information/informationindex'));
        } else {
            $data = M()->table('__INFORMATION__')->where($where = array('id' => $arr['id']))
                ->find();
            $classFilter['id'] = array('neq', $data['class_id']);
            $goodsClasses      = M('infor_class')->where($classFilter)->field('id,name as class_name')->select();
            // $datapic                   = M('pic')->where($where = array('goods_id' => $arr['goods_id']))->field('id,pic')->select();
            // $this->assign('datapic', $datapic);

            $this->assign('data', $data);
            $this->assign('goodsClasses', $goodsClasses);
            $this->display();
        }
    }
}
