<?php
    
    //1.与目录路径对应
namespace Home\Model;
use Think\Model;

//2.命名必须与文件名相同
class FrilinkModel extends Model{
	public function index(){
		return $this->order('Fri_id desc')->limit(5)->select();
	}
}