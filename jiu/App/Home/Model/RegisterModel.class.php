<?php
namespace Home\Model;
use Think\Model;
class RegisterModel extends Model{


	public function check_userName($userName){
		$map['user_name'] = ['eq' , $userName];
		return $result = $this->where($map)->select();
		
	}
}
