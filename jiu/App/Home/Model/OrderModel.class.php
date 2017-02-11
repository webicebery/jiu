<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends Model{

	public function pro_order($id){
		$map['order_uid'] = ['eq' , $id];
		$count = $this->where($map)->count();
		$Page = new \Think\Page($count,3);
 		$show  = $Page->show();
 		$list =  $this->where($map)->order('order_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$status = ['未付款','已发货' ,'已收货' , '无效订单','已付款'];
		foreach ($list as $key => &$val) {
			$val['order_addtime'] = date('Y-m-d H:i:s' ,$val['order_addtime']);
			$val['order_status'] = $status[ $val['order_status'] ];
		}
		return ['list' => $list, 'count'=>$count , 'show'=>$show];

	}
	
	public function pro_status($id){
		$map['order_id'] = ['eq' , $id];
		$data['order_status'] = 2;
		$list = $this->where($map)->save($data);
		if($list > 0){
			return $id;
		}else{
			return $list;
		}

	} 

}