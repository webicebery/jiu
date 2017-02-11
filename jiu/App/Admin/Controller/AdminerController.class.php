<?php
namespace Admin\Controller;
use Think\Controller;
class AdminerController extends CommonController {

    // 1.模板继承
    public function show(){
        // 实例化对象
        $stu = D('adminer');
        // 数据处理
        $data=$stu->index();
        // 分配数据
        $this->assign($data);
        $this->display();
    }

    // 添加用户
    public function add(){

        if(IS_GET){
            $this->display();
        }

        if(IS_POST){
            $adminer = D('adminer');
            $result = $adminer->pro_add();
            if($result['status']){
                echo '添加成功 !';
                     
            }else{
                $this->error('添加失败！'.$result['msg'],U('Admin/Adminer/add'),5);
            }

        }
    }

    // 删除用户
    public function del(){
        $ad_id= I('get.ad_id');
        $adminer = D('adminer');
        $result = $adminer->pro_del($ad_id);
          if($result['status']){
              
                $this->success('已删除！'.$result['msg'],U('Admin/Adminer/show'),2);
               
            }else{
                $this->error('删除失败！'.$result['msg'],U('Admin/Adminer/show'),5);
            }
    }
    // 注销
    public function logout(){
        unset($_SESSION['admin_logininfo'][0]);
         $this->success('退出登录中！'.$result['msg'],U('Admin/Login/index'),2);
    }
    /**
     * 修改管理员信息
     */
    public function edit(){
        if(IS_GET){
            $id=I('get.id');
            $adminer = D('adminer');
            $data['list'] = $adminer->find($id);
            $this->assign($data);

            $this->display();
        }
        if(IS_POST){

            $adminer = D('adminer');
            $result = $adminer->pro_edit();

           
            if($result['status']){
                $this->success('修改成功！',U('Admin/Adminer/show'));
            }else{
                $this->error($result['msg'] . '失败',U('Admin/Adminer/edit'),5);
            }
            
        }
    }

    // 修改头像
    public function edit_icon(){
        if(IS_GET){
            $id =  I('get.id');
            $adminer = D('adminer');
            $data = $adminer->find($id);
            $this->assign('data' , $data);
            $this->display();
        }

        if(IS_POST){

            $adminer = D('adminer');
            $result = $adminer->pro_editIcon();
            if($result == 1 ){

                $this->success('头像更新成功！'.$result['msg'],U('Admin/Adminer/Close'),2);
           
            }else{
                $this->error('头像更新失败！'. $result ,U('Admin/Adminer/Close'),3);
            }
        }

    }
    
    // 修改状态
    public function status(){
        $ad_id= I('get.ad_id');
        $status = I('get.status');
        $adminer = D('adminer');
        $result = $adminer->pro_status($ad_id,$status);
        if($result['status']){

            $this->success('已设置！'.$result['msg'],U('Admin/Adminer/show'),2);
           
        }else{
            $this->error('设置失败！'.$result['msg'],U('Admin/Adminer/show'),5);
        }
    }

    // 发送站内信
    public function send_adminers(){
        // 实例化对象
        $stu = D('adminer');
        // 数据处理
        $data['list']=$stu->choose();

          
        // 分配数据
        $this->assign($data);
        $this->display('Inmail/send_letter');
    }
    /**
     * 查询用户是否存在
     */
    public function select_ad(){
        $ad_name = I('get.adminer_name');
        $adminer = D('adminer');
        // 数据处理
        $data=$adminer->select_adminer($ad_name);
        // echo '<pre>';
        //     print_r($data);
        // echo '</pre>';
        if(is_array($data)){
            echo '0';
        }else{
            echo '1';
        }
    }
}
