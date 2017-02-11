<?php
namespace Home\Widget;
use Think\Controller;
class CateWidget extends Controller {

    //友情链接
  	public function menu(){       
   	// return 'menuWidget';  
   		$flink = D('frilink');
		$cate = $flink->index();
		    
		$this->assign('cate' , $cate);
		$this->display("Widget:menu");   
   	}

    //公告
   	public function info(){
   		$info = D('information');
   		$infor = $info->pro_info();
   		$this->assign('infor' , $infor);
		$this->display("Widget:info");
   	}



  }