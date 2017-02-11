<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends CommonController{


	public function index(){
		$this->display();
	}
	// 验证用户名是否存在
	public function varify_userName(){
		$userName = D('user');
		$user_name = I('get.user_name');
		return $result = $userName->check_userName($user_name);
		    
		  
	}


    public function pro_register(){
    	$newUser = D('user');
    	 
    	$num = $newUser->inUser();

    	if(!empty($num)){
    		$this->success('注册成功', U('Home/Index/show'));
    	}else{
    		$this->error('注册失败', "index");

    	}   
    }
    /**
     * 记录手机验证码
     */
    public function phone(){
        // 以下是极速数据验证
        // $tel=I('get.tel');
        // $newUser = D('user');
        // $res = $newUser->pro_phone($tel);
        // echo $res;

        // 以下的是阿里大于短信验证
        // import('Org.Alidayu.top.TopClient');
        // import('Org.Alidayu.top.ResultSet');
        // import('Org.Alidayu.top.RequestCheckUtil');
        // import('Org.Alidayu.top.TopLogger');
        // import('Org.Alidayu.top.request.AlibabaAliqinFcSmsNumSendRequest');
        

        $mobile=I('get.tel');            //接收短信的手机号码
        $code=mt_rand(100000,999999);         //随机生成一个短信验证码
        session('phone_code',$code); 
        Vendor('Alidayu.TopSdk','','.php');
        $c = new \TopClient;           //实例化第三方类的对象
        $req = new \AlibabaAliqinFcSmsNumSendRequest;   //实例化第三方类的对象
        // 测试输出到页面用的，可以删掉这条   
        $appkey = '23582646';      //阿里大于的短信appkey,也就是本人帐号的appkey
        $secret = '420677b12beaf9e0d3724c45fd03c7fa';  //appkey的密码，也就是本人帐号的appkey密码
        $c->appkey = $appkey;         //appkey的赋值
        $c->secretKey = $secret;        ////secretKey的赋值
        $c->format = 'json';            //使用json方式发送
        $req->setExtend("123456");      
        $req->setSmsType('normal');
        $req->setSmsFreeSignName('玖酒久'); //发送的签名
        $req->setSmsParam('{"code":"'.$code.'"}');//短信模板变量，传参规则{"key":"value"}，key的名字须和申请模板中的变量名一致，多个变量之间以逗号隔开。
      
        $req->setRecNum($mobile);//接收着的手机号码
        $req->setSmsTemplateCode("SMS_36395044");
        $resp = $c->execute($req);
        if($resp){
            
            echo '验证码发送成功！';
        }else{
            echo '验证码发送失败！';
        }
    }

    public function phone1(){
        $code=I('get.code');
        $newUser = D('user');
        $res = $newUser->pro_phone1($code);
        echo $res;
    }
}
