<?php
// 1.与目录路径对应
namespace Home\Model;
use Think\Model;
// 2.命名必须与文件名相同    
class UserModel extends Model{


    // 个人资料详情
    public function pro_User_detail($user_id){
        $map['user_id'] = ['eq' , $user_id];
        $list = $this->where($map)->select();
        $level = ['黄金会员' , '普通会员'];
        $sex = ['女' , '男' , '保密'];
        foreach($list as $key=>&$val){
            $val['user_level'] = $level[ $val['user_level'] ];
            $val['user_sex'] = $sex[ $val['user_sex'] ];
            $val['addtime'] = date('Y-m-d' , $val['addtime']);            
        }
        return $list;
    }

    // 修改个人资料
    public function pro_Edit_detail(){
        $post = I('post.');
           
        $map['user_id'] = ['eq' , $post['user_id'] ];
        $list['real_name'] = $post['adminName'];
        $list['user_sex'] = $post['sex'];
        $list['user_tel'] = $post['phone'];
        $list['user_email'] = $post['email'];
        if(empty($post['password'])){
            
            $edit_result = $this->where($map)->save($list); 
        }else{
            
            $list['user_pass'] = password_hash($post['password'],PASSWORD_DEFAULT);
           
             $edit_result = $this->where($map)->save($list);
        }
        return $edit_result;
    }

    public function pro_Edit_icon(){

        $map['user_id'] = ['eq',I('post.user_id')];

        if( $_FILES['user_icon']['error'] !== 4){

                // //设置附件上传类型
                $upload = new \Think\Upload();// 实例化上传类   
                $upload->maxSize   =     3145728 ;// 设置附件上传大小    
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
                $upload->rootPath  =    './Public/';
                $upload->subName   =    '';
                $upload->saveName  =   time().'_'.mt_rand();
                //设置附件上传类型    
                $upload->savePath  =      './homeIcon/'; 
        
                // 设置附件上传目录    // 上传单个文件     
                $info   =   $upload->uploadOne($_FILES['user_icon']);
                
                if(!$info) {
                    // 上传错误提示错误信息        
                   return $result = $upload->getError();    
                }else{
                    // 上传成功 获取上传文件信息
                    $list['user_icon'] = $info['savename'];         
                    return $result =  $this->where($map)->save($list);            
                    // $info['savename'];    
                }
                
    
            }
       
    }

    public function check_userName($userName){
        $map['user_name'] = ['eq' , $userName];
        $result = $this->where($map)->select();
        if(empty($result)){
            // 空即是没有该用户
            echo '1';
        }else{
            // 不为空即为有该用户
            echo '0';
        }
    }


    // 前台注册
    public function inUser(){
        $post = I('post.');
        $list['user_name'] = $post['adminName'];

        $list['user_pass'] =password_hash($post['password'],PASSWORD_DEFAULT);
        $list['addtime'] = time();
        $list['user_tel'] = $post['tell'];
        // echo '<pre>';
        //     print_r($list);
        // echo '</pre>'; 

        $num = $this->add($list);
        $map['user_id'] = ['eq',$num];

            // 查询数据库 遍历
        $dataList = $this->where($map)->select();
        session('user_logininfo' , $dataList);
        // echo '<pre>';
        //     print_r($_SESSION);
        // echo '</pre>';    
        return $num;
            
    }

    public function pro_login(){
        $user_name = I('post.user_name');
        $user_pass =I('post.user_pass');
        
        $list = $this->select();
        foreach ($list as $key => $val) {
            $list[] = $val['user_name'];

        }
        // 验证用户名
        if(in_array($user_name , $list)){
            $map['user_name'] = ['eq',$user_name];

            // 查询数据库 遍历
            $list = $this->where($map)->select();
            foreach ($list as $key => $val) {
                $password = $val['user_pass'];
                $status = $val['user_status'];
            }
            if(password_verify($user_pass,$password)){
               
                if($status == 0){
                    //状态禁用
                    return '3';
                }else{
                    //登陆成功
                    session('user_logininfo', $list );
                    return '4';
                }
                
                
                }else{
                // 密码错误
                    return '2';
                }
            
            
        }else{
          //用户名错误  
          return '1';
            
            
        }
    }
    // 我的积分
    public function pro_myIntegral($id){
        $map['user_id'] = ['eq' , $id];
        return $this->where($map)->select();
    }
    public function pro_phone($tel){
        $mobile = $tel;
        $code = mt_rand(100000,999999);
        session('phone_code', $code);
        // echo $_SESSION['phone_code'];
        $url = 'http://api.jisuapi.com/sms/send?mobile='.$mobile.'&content=尊敬的用户，您的验证码为：'.$code.'，请您在30分钟内使用，千万不要告诉任何人哦！！！【玖酒久】&appkey=dd7681a3b4dfef38';

        $data = [];
        $ch = curl_init( $url );
        // 2.设置请求头
        curl_setopt($ch,CURLOPT_HTTPHEADER , $data );
        // 3.获取的信息以字符串返回，而不是直接输出
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        // 4.发起请求
        $json =  curl_exec($ch);
        $result = json_decode($json , true);
        if($result){
            return '验证码发送成功！';
        }else{
            return '验证码发送失败！';
        }
            
        
    }
    public function pro_phone1($code){
        if($code==$_SESSION['phone_code']){
            return '1';
        }else{
            return '0';
        }
    }
}
    
