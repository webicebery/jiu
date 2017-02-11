<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

    public function _initialize(){
        

        // 判断是否登录
        if(empty(session('admin_logininfo'))){
            $this->success('跳转登录ing...',U('Admin/Login/index'),2);
            exit;
        }
    }

}
