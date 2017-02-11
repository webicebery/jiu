<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends CommonController {

    // 1.模板继承
    public function index(){
        // echo __METHOD__.'<br>';
        $this->display();
    }
    // 登录
    public function _initialize(){
        // 判断是否登录
        if(empty(session('user_logininfo'))){
            $this->success('跳转登录ing...',U('Home/Login/index'),2);
            exit;
        }
    }
    
}
