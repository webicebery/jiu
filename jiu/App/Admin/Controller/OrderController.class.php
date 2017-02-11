<?php
namespace Admin\Controller;

use Think\Controller;

class OrderController extends CommonController{
    // 订单展示
    public function index(){
        $list  = D('order');
        $order['list'] = $list->index();
        $this->assign($order);
        $this->display();
    }
    // 订单详情
    public function orderDetail(){
        $id = I('get.id');
        
        $detail = D('Order');

        $data['detail'] = $detail->showDetail($id);
        $this->assign($data);
        $this->display();
    }
    // 订单修改
    public function edit(){
        if(IS_GET){
            
            $id = I('get.id');
            $detail = D('Order');
            $data['list'] = $detail->orderStatus($id);
            $this->assign($data);
            $this->display();
        }
        if(IS_POST){
            $post = I('post.');  
            $stu = D('Order');
            $data['list']=$stu->orderAction();
                
            
        }
        
    }
}

