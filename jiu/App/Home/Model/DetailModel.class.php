<?php
namespace Home\Model;
use Think\Model;
class DetailModel extends Model{
	// 详情页
	public function pro_detail($id){
		$map['pid'] = ['eq' , $id];
		$list = $this->where($map)->select();
		$status = ['未评价' , '已评价'];
		foreach ($list as $key => &$val) {
			$val['is_comment'] = $status[$val['is_comment']] ;
		}
		return $list;
	}
	// 更改订单状态
	public function pro_edit($id){
		$map['detail_id'] = ['eq' , $id];
		   
		$data['is_comment'] = "1";
		// $data['g_price'] = 500;
		return $this->where($map)->save($data);
	}

}