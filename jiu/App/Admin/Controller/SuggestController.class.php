<?php
namespace Admin\Controller;
use Think\Controller;
class SuggestController extends CommonController{
    // 意见反馈展示
	public function index(){
		$sug = D('suggest');
		$data['list'] = $sug->pro_sug();
		$this->assign($data);

 		$this->display();
	}
    // 删除意见反馈
	public function del(){
            $id = I('get.Fri_id');
            $frilink = D('suggest');
            $result = $frilink->pro_del($id);

            if($result['status']){
          
            $this->success('已删除！'.$result['msg'],U('Admin/FrilinkController/index'),2);
           
            }else{
            $this->error('删除失败！'.$result['msg'],U('Admin/FrilinkController/index'),5);
            }
    }


}