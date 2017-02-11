<?php
namespace Home\Model;
use Think\Model;
class LocationModel extends Model{
	// 展示收货地址
	public function pro_local(){
		$map['uid'] = ['eq' , $_SESSION['user_logininfo'][0]['user_id']];
		$list = $this->order('l_status desc')->where($map)->select();
		$status = ['普通地址' , '默认地址'];
		foreach ($list as $key => &$val) {
			$val['l_status'] = $status[$val['l_status']];
			$val['l_addtime'] = date('Y-m-d' ,$val['l_addtime']);	
		}
		return $list;
	}

	// 添加收货地址
	public function pro_add(){
		
		$post = I('post.');
		// echo '<pre>';
		//     print_r($post);
		// echo '</pre>';    
		$list['l_address'] = $post['location_p'] . $post['location_c'].
		$post['location_a'].$post['detail_addr'];
		$list['l_tel'] = $post['l_tel'];
		$list['uid'] = $_SESSION['user_logininfo'][0]['user_id'];
		$list['l_status'] = $post['l_status'];
		$list['l_name'] =$post['l_name'];
		$list['l_addtime'] =time();
		// echo '<pre>';
		//     print_r($list);
		// echo '</pre>';    
		return $this->add($list);
	}
	// 删除收货地址
	public function pro_del($id){
		$map['lid'] = ['eq' , $id];
		return $this->where($map)->delete();
	}

}