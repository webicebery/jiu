<?php
namespace Home\Controller;
use Think\Controller;
class SuggestController extends CommonController{
	// 反馈意见
	public function index(){
		if(IS_GET){
			if(empty($_SESSION['user_logininfo'])){
				$this->error('非法操作!' , U('Home/Index/show'),3);
			}
			$this->display();
		}

		if(IS_POST){
			$sug = D('suggest');
			if(!empty(I('post.content'))){
					$result = $sug->pro_sug();
				if($result > 0){
					$this->success('反馈成功！再次感谢您的反馈！',U('Home/Suggest/index'),2);
				}else{
					$this->error('反馈失败！',U('Home/Suggest/index'),2);
				}
			}else{
				$this->error('亲, 你还没有填写反馈内容喔！',U('Home/Suggest/index'),2);
			}
			

		}
	}

}