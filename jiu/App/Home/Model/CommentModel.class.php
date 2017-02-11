<?php
// 1.与目录路径对应
namespace Home\Model;
use Think\Model;

// 2.命名必须与文件名相同
class CommentModel extends Model{
	// 前台商品评论展示
	public function index($id){
		$map['goodsId'] = ['eq' , $id];

        $count = $this->where($map)->count();
        $Page = new \Think\Page($count,5);

        $show  = $Page->show();
        $list =  $this->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

        foreach($list as $key=>&$val){
            $val['cm_addtime'] = date('Y-m-d H:i:s' , $val['cm_addtime']);
        }

        return ['list' => $list, 'count'=>$count,'show'=>$show];
	}
	// 发表评论
	public function cm_add(){
		$post = I('post.');
		$list['userName'] = $_SESSION['user_logininfo'][0]['user_name'];
		$list['goodsId'] = $post['goodsId'];
		$list['goodsName'] = $post['goodsName'];
		$list['goodsImg'] = $post['goodsImage'];
		$list['cm_grade'] = $post['cm_grade'];
		$list['cm_content'] = $post['cm_content'];
		$list['cm_addtime'] = time();
		$insertid = $this->add($list);
        $result = [];

        if($insertid > 0){
            $result[ 'status' ] = $insertid;
            $result[ 'msg' ] = '评论成功';

        }else{

            $result[ 'msg' ] = '评论失败！';

        }
        return $result;
	}
	// 我的评论
	public function pro_myComment(){
		$map['userName'] = ['eq' , $_SESSION['user_logininfo'][0]['user_name']];
		$list =  $this->order('cm_addtime desc')->where($map)->select();
		$count = $this->where($map)->count();
		$Page = new \Think\Page($count,2);

 		$show  = $Page->show();
 		$list =  $this->order('cm_addtime desc')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

		foreach($list as $key=>&$val){
				$val['cm_addtime'] = date('Y-m-d H:i:s' , $val['cm_addtime']);
		}
		
		return ['list' => $list, 'count'=>$count , 'show'=>$show];
	}


}
