<?php
namespace Home\Model;
use Think\Model;
class InformationModel extends Model{


	public function pro_info(){
		return $this->order('info_id desc')->limit(5)->select();
	}
}