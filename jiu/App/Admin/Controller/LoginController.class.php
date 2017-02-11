<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    // 显示登录模板
    public function index(){
        
        $assign=array('data'=>$data);
        $this->assign($assign);
        $this->display();
    }


    // 处理登录
    public function proLogin(){
        $post = I('post.');
        $code = $post['code'];
        $adminer = D('adminer');
        $res = $adminer->pro_login();
        switch($res){
            case '1':
                $this->error('用户名不存在',U('Admin/Login/index'));
                break;
             case '2':
                $this->error('密码错误',U('Admin/Login/index'));
                break;
             case '3':
                $this->error('无权登录',U('Admin/Login/index'));
                break;
             case '4':
                $this->success('登录成功',U('Admin/Index/index'));
                break;
        }
         
    }
    /**
     * geetest生成验证码
     */
    public function geetest_show_verify(){
        $geetest_id=C('GEETEST_ID');
        $geetest_key=C('GEETEST_KEY');
        $geetest=new \Org\Xb\Geetest($geetest_id,$geetest_key);
       
        $user_id = "test";
        $status = $geetest->pre_process($user_id);
        $_SESSION['geetest']=array(
            'gtserver'=>$status,
            'user_id'=>$user_id
            );
        echo $geetest->get_response_str();
    }
 
    /**
     * geetest submit 提交验证
     */
    public function geetest_submit_check(){
        $data=I('post.');
        if (geetest_chcek_verify($data)) {
            $this->proLogin();
        }else{
            $this->error('图片验证失败','index',3);
        }
    }
 
    /**
     * geetest ajax 验证
     */
    public function geetest_ajax_check(){
        $data=I('post.');
        echo intval(geetest_chcek_verify($data));
    }
    // 检测验证码
    public function CheckVerify($code){
        $verify = new \Think\Verify();
        return $verify->check($code);
    }

}
