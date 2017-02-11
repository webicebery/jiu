<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends CommonController{

      // 1.模板继承
      public function index(){
      	if(IS_GET){
          	$id=I('get.id');
            if(empty($id)){
              $this->error('非法操作!',U('Home/Index/show'));
            }
            $number = I('get.detail_id');
            $goods = D('goods');
            $list = $goods->pro_goods($id);
            $this->assign('list' , $list);
            $this->assign('number' , $number);
            $this->display();
          }
          if(IS_POST){
          	$comment = D('comment');
            $detail_id = I('post.detail_id');
           
            $detail = D('detail');
            $res = $detail->pro_edit($detail_id);
           
          	$result = $comment->cm_add();
          	if($result['status']){
                  $this->success($result['msg'],U('Home/Comment/myComment'));
              }else{
                  $this->error($result['msg'],U('Home/Order/index'));
              }
          }
      }
      // 我的评论
      public function myComment(){
        $comment = D('comment');
        $result = $comment->pro_myComment();
        $this->assign($result);
        $this->display();
      }
}
