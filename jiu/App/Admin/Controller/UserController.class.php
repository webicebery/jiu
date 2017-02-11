<?php
namespace Admin\Controller;
use Think\Controller;
	class UserController extends CommonController{
		// 用户展示
		public function index(){
			$user = D('user');
			$data['list'] = $user->index();
			$counter= $user->counter(); 
			$this->assign($data);
			$this->assign('counter',$counter);
        	$this->display();
		}
		// 用户信息
		public function Userinfo(){
			$id =I('get.user_id');
			
			$user = D('user');
			$data['list'] = $user->User_info($id);
			  
			$this->assign($data);
        	$this->display();
		}

		// 修改用户信息
		public function user_edit(){
			if(IS_GET){
				$id = I('get.id');
				$user = D('user');
				$data['list'] = $user->User_info($id);
				$this->assign($data);
        		$this->display();    
			}

			if(IS_POST){
				
				$user = D('user');
				$user->user_edit();    
			}
		}
	}