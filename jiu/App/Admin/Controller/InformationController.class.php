<?php
namespace Admin\Controller;
use Think\Controller;
class InformationController extends CommonController{

    // 公告展示
	public function index(){


		$info = D('information');
		$data = $info->pro_info();    
		$this->assign('data' , $data);
		$this->display();


	}
    // 删除公告
	public function del(){
        $info_id= I('get.info_id');
        $info = D('information');
        $result = $info->pro_del($info_id);
        if($result['status']){
              
            $this->success('已删除！'.$result['msg'],U('Admin/Adminer/show'),2);
               
        }else{
            $this->error('删除失败！'.$result['msg'],U('Admin/Adminer/show'),5);
        }
    }

    // 添加公告
    public function add_info(){
    	if(IS_GET){
    		$this->display();
    	}
    	if(IS_POST){
    		$add_info = D('information');
    		$data = $add_info->add_info();
    		    
    	}	
    }
} 