<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends CommonController{
	// 搜索商品
	public function index(){
		$dataList = D('goods');
		if(IS_POST){
			$post = I('post.');
			$data = $dataList->pro_search();
			
			$information = D('information');
	        $info = $information->pro_info();
			$this->assign('info' , $info);
			$this->assign($data);    
			$this->display();
		}
		
		if(IS_GET){
			// $get = I('get.id');
			$information = D('information');
	        $info = $information->pro_info();
			$this->assign('info' , $info);
			$this->assign($info);
			$data = $dataList->pro_search2();
			$this->assign($data);    
			$this->display();
		}
	}

}