<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

    // 1.模板继承
    public function index(){
       
        $this->display();
    }

    
}
