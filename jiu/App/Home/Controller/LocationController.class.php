<?php
namespace Home\Controller;
use Think\Controller;
class LocationController extends CommonController{

	// 展示收货地址
	public function index(){
		if(empty($_SESSION['user_logininfo'])){
			$this->error('非法操作!' , U('Home/Index/show'),3);
		}
		$local = D('location');
		$list = $local->pro_local();
		$this->assign('list' , $list);    
		$this->display();
	}

	// 添加地址
	public function add(){
		if(IS_GET){
			if(empty($_SESSION['user_logininfo'])){
			$this->error('非法操作!' , U('Home/Index/show'),3);
			}
			$this->display();
		}
		if(IS_POST){
			$local = D('location');
			$result = $local->pro_add();
			if($result>0){
				$this->success('添加成功!' , U('Home/Location/index'),3);
			}else{
				$this->error('添加失败!' , U('Home/Location/add'),3);
			}  
		}
	}


	// 删除地址
	public function del(){
		$id = I('get.id') + 0;
		$local = D('location');
		$result = $local->pro_del($id);
		if($result > 0){

			echo '1';
		}else{
			echo '0';
		}
	}

}