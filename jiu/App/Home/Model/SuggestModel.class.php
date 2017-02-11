<?php
// 1.与目录路径对应
namespace Home\Model;
use Think\Model;
// 2.命名必须与文件名相同    
class SuggestModel extends Model{

	public function pro_sug(){
		$list['userId'] = I('post.userId');
		$list['userName'] = I('post.userName');
		$list['sug_content'] = I('post.content');
		$list['sug_time'] = time();
		return $this->add($list);
	}


}