<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {

    // 1.模板继承
    public function index(){
        // echo __METHOD__.'<br>';
        
        $this->display();
    }

    // 个人资料详情
    public function User_detail(){
        $Userdetail = D('user');
        $user_id = I('get.id');
        
        $list = $Userdetail->pro_User_detail($user_id); 
        $this->assign('list' , $list);
        $this->display();   
           
    }

    // 修改个人资料
    public function edit_detail(){

        if(IS_GET){
            
            $user_id = I('get.id');
            $Userdetail = D('user');
            $list = $Userdetail->pro_User_detail($user_id);
            $this->assign('list' , $list);
            $this->display();
        }

        if(IS_POST){
            $Userdetail = D('user');
            $list = $Userdetail->pro_Edit_detail();
            if($list > 0){
                $this->success('修改成功！',U('Home/User/User_detail' , array(id => $_SESSION['user_logininfo'][0]['user_id'])),2);
            }else{
                // 将ID携带过去\\\\\\\\\\\\\\\\\\\\\\\
                $this->error('修改失败！',U('Home/User/edit_detail' , array(id => $_SESSION['user_logininfo'][0]['user_id'])),3);
            }  
        }


    }
    //我的积分
    public function my_integral(){
        $id   = $_SESSION['user_logininfo'][0]['user_id'];
        $user = D('user');
        $list = $user->pro_myIntegral($id);
        $this->assign('list' , $list);
        $this->display();
    }
    
    //
    public function edit_icon(){
        if(IS_GET){
               
            $this->assign('user_id' , I('get.id'));
            $this->assign('user_icon' , I('get.name'));
        
            $this->display();
        }

        if(IS_POST){
            $Usericon = D('user');
            $result = $Usericon->pro_Edit_icon();
            // echo '<pre>';
            //     print_r($result);
            // echo '</pre>';    
            if($result == 1){
                $this->success('更新成功！',U('Home/User/User_detail' , array(id => $_SESSION['user_logininfo'][0]['user_id'])),2);
            }else{
                $this->success('更新失败！',U('Home/User/User_detail' , array(id => $_SESSION['user_logininfo'][0]['user_id'])),2);
            }
        }
        
    }
    
}
