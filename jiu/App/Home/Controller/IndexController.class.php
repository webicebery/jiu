<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {

    // 1.模板继承
    public function index(){
        // echo __METHOD__.'<br>';
        $this->display();
    }

    public function test(){
        $this->display();
    }
    // 前台遍历的商品
    public function show(){
        $public = D('goods');
        // 今日热卖遍历的数据
        $todayHot = $public->pro_todayHot();
        // 乐享盛宴分配的数据
        $lexiang = $public->pro_lexiang();
        // 乐享盛宴--人气爆棚分配的数据
        $renqi = $public->pro_renqi();
        // 乐享盛宴--好礼佳品分配的数据
        $haoli = $public->pro_haoli();
        // 乐享盛宴--流连忘返分配的数据
        $liulian = $public->pro_liulian();
        // 乐享盛宴--闲情小酌分配的数据
        $xianqing = $public->pro_xianqing();

        // 商品详情--红葡萄酒
        $putao = $public->pro_putao();
        // 商品详情--白酒
        $baijiu = $public->pro_baijiu();
        // 商品详情--白葡萄酒
        $baiputao = $public->pro_baiputao();
        //天气
        $result = $public->heather();
        $carousel = D('carousel');
        $category = D('category');
        // 调用函数
        $data['list'] = $carousel->index();
        $data['cate_list'] = $category->sel();
        $this->assign($data);
        $this->assign('result' , $result);
        $this->assign('todayHot' , $todayHot);
        $this->assign('lexiang' , $lexiang);
        $this->assign('renqi' , $renqi);
        $this->assign('haoli' , $haoli);
        $this->assign('liulian' , $liulian);
        $this->assign('xianqing' , $xianqing);
        $this->assign('putao' , $putao);
        $this->assign('baijiu' , $baijiu);
        $this->assign('baiputao' , $baiputao);
        $this->display();  
    }
    // 添加商品
    public function insertgoods(){
        $goods = D('goods');
        $test = $this->ajaxReturn($goods->goods_select());
        
    }
    // 统计购物车商品的件数
    public function selsession(){
        $this->ajaxReturn(count($_SESSION['cart']));
    }

}
