<?php

namespace Admin\Controller;
use Think\Controller;
class InmailController extends CommonController{

	// 查看收件箱 
	public function index(){
		$show_mail = D('inmail');
		$id = $_SESSION['admin_logininfo'][0]['ad_id'];

		$data['list'] = $show_mail->show_mail($id);   
		$this->assign($data);
		$this->display();  
	}

	// 处理要发送的站内信
	public function deal_send(){
		
		$Inmail = D('inmail');
                        if(!empty(I('post.content'))){
                            $result = $Inmail->pro_send();
                            if($result > 0){
                            $this->success('发送成功', U('Admin/Adminer/send_adminers') , 3);
                            }else{
                            $this->error('发送失败', U('Admin/Adminer/send_adminers') , 3);
                            }
                        }else{
                            $this->error('发送失败 , 没有写内容', U('Admin/Adminer/send_adminers') , 3); 
                        }

    	}

	//  查看发件箱
	public function my_send(){

		$Inmail = D('inmail');
		$data['list'] = $Inmail->show_mysend();
		$this->assign($data);
		$this->display();

    }


    // 查看站内信详情
    public function Letterinfo(){
    	$Inmail = D('inmail');
    	$id= I('get.id');
    	$result = $Inmail->show_letter($id);
    	if($result == 1 || $result == 0){
    		$Inmail = D('inmail');
    		$data['list'] =$Inmail->show_letter1($id);
    		
    		$this->assign($data);
    		$this->display();    
    	}
    }

    // 去回复站内信
    public function reply(){
    	 
    	$data = I('post.');
    	$this->assign('data' , $data);
    	$this->display('reply');   
    	
    }

    // 处理回复的站内信
    public function deal_reply(){
    	 
    	$data = I('post.');
    	$Inmail = D('inmail');
		$result = $Inmail->pro_reply();
		if($result > 0){
			$this->success('回复成功', U('Admin/Inmail/Close') ,0);
		}else{
			$this->error('回复失败', U('Admin/Inmail/Close') , 0);
		}
    }
    // 删除站内信
    public function del(){
    	$Inm_id = I('get.Inm_id');
    	$Inmail = D('inmail');
    	$result = $Inmail->pro_del($Inm_id);
          if($result['status']){
              
                $this->success('已删除！'.$result['msg'],U('Admin/Adminer/show'),2);
               
            }else{
                $this->error('删除失败！'.$result['msg'],U('Admin/Adminer/show'),5);
            }
    }
    // 查看未读站内信条数
    
    public function counter(){
        $Inmail = D('inmail');
        $count = $Inmail->pro_counter();
        $Inmail->assign('count',$count);
        $Inmail->display('Index/index');        
    } 
}