<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends CommonController {
	public function index(){

        $get_error = I('get.error');  
        $get_registe = I('get.s');
       
        if(!$get_error ){
            session('returnUrl',$_SERVER['HTTP_REFERER']);
        }
        if($get_registe){
            session('returnUrl',null);
        }
		// 直接展示登录模板
		$this->display();
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
            $this->pro_login();
        }else{
            $this->error('图片验证失败','index?error=2',3);
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
    public function pro_login(){
        $post = I('post.');
        $code = $post['code'];
        $user = D('user');
        $res = $user->pro_login();
        switch($res){
            case '1':
                $this->error('用户名不存在','index?error=1',3);
                break;
            case '2':
                $this->error('密码错误','index?error=1',3);
                break;
            case '3':
                $this->error('帐号被禁用','index?error=1',3);
                break;
            case '4':
               if($returnUrl = session('returnUrl')) {
                    session('returnUrl',null);
               
                    $this->success('登录成功',$returnUrl,0);
               }else{
                    $this->success('登录成功',U("Home/Index/show"),0);
               }
        
                break;
        }
    
    }
    // 注销并清空购物车
    public function logout(){
        unset($_SESSION['user_logininfo']);
        $_SESSION['cart'] = array();
        $this->success('注销成功',U('Home/Index/show'));
    }
}
