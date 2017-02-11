<?php
namespace Home\Controller;
use Think\Controller;
class GoodsdetailController extends CommonController {

    // 显示商品详情
    public function index(){
    	$goods = D('goods');
    	$id = I('get.id');

        $res = $goods->order('rand()')->limit(4)->select();
        $this->assign('res' , $res);    
        
        $list = $goods->order('id desc')->order('rand()')->limit(4)->select();
        $this->assign('ad' , $list);
        $comment = D('comment');
        $dataList = $comment->index($id);
        $view = $goods->view($id);

        $this->assign($dataList);

    	$data = $goods->pro_goods($id);
    	$this->assign('data' , $data);
    	
        $this->display();
    }

    

}
