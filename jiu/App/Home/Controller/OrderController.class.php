<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends CommonController{
	// 订单显示
	public function index(){
		if(empty($_SESSION['user_logininfo'])){
			$this->error('非法操作!' , U('Home/Index/show'),3);
		}
		$order = D('order');
		$id=$_SESSION['user_logininfo'][0]['user_id'];
		$list = $order->pro_order($id);   
		$this->assign($list);
		$this->display();
	}
	// 订单详情
	public function orderDetail(){
		if(empty($_SESSION['user_logininfo'])){
			$this->error('非法操作!' , U('Home/Index/show'),3);
		}
		$id = I('get.id');
		$message = I('get.message');
		$detail = D('detail');
		$list = $detail->pro_detail($id);
		$this->assign('list' , $list);
		$this->assign('message' , $message);
		$this->display();
	}
	// 改状态
	public function shou(){
		$id = I('get.id');
		if(empty($id)){
			$this->error('非法操作!' , U('Home/Index/show'),3);
		}
		$status = D('order');
		$result = $status->pro_status($id);
		if($result >0){	
			echo $result;
		}else{
			echo '0';
		}
	}
}