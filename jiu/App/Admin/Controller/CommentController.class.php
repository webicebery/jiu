<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends CommonController{
	public function index(){
		$comment = D('comment');
		// 调用函数
		$data['list'] = $comment->index();
		// 分配变量
		$this->assign($data);
		// 展示模板
		$this->display();

	}
	// 删除
    public function del(){
        
        $Comment = D('Comment');
        $result = $Comment->cm_del();
      	if($result['status']){
          
            $this->success('已删除！'.$result['msg'],U('Admin/Comment/index'),2);
           
        }else{
            $this->error('删除失败！'.$result['msg'],U('Admin/Comment/index'),5);
        }
    }
}
