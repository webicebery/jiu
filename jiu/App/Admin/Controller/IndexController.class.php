<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {

    // 1.模板继承
    public function index(){
        $Inmail = D('inmail');

        $count = $Inmail->pro_counter();
        
        $this->assign('admin_logininfo',$_SESSION['admin_logininfo'][0]);
        $this->assign('count',$count);
       
        $this->display();
    }

    public function welcome(){
       
        
        $this->display();
    }

    
    
}
