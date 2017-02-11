<?php

namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    // 展示用户
	public function index(){

        $list = $this->select();   
        $sex = ['女','男','兽'];
        $status = ['禁用','启用'];
        $level = ['黄金会员','普通会员'];

        foreach($list as $key=>&$val){
            $val['user_sex'] = $sex[ $val['user_sex'] ];
            $val['user_status'] = $status[ $val['user_status'] ];
            $val['user_level'] = $level[ $val['user_level'] ];
            $val['addtime'] = date('Y-m-d' , $val['addtime']);
        }

        // 如果返回多个数据，就以数组形式返回 ！
        return $list;
    }
    // 用户信息
    public function User_info($id){
    	// echo 213;
    	
    	$map['user_id'] = ['eq',$id];
        $list = $this->where($map)->select(); 
        // echo '<pre>';
        //       print_r($list);
        //  echo '</pre>';      
        $sex = ['女','男','兽'];
        $status = ['禁用','启用'];
        $level = ['黄金会员','普通会员'];

        foreach($list as $key=>&$val){
            $val['user_sex'] = $sex[ $val['user_sex'] ];
            $val['user_status'] = $status[ $val['user_status'] ];
            $val['user_level'] = $level[ $val['user_level'] ];
            $val['addtime'] = date('Y-m-d' , $val['addtime']);
        }

        // 如果返回多个数据，就以数组形式返回 ！
        return $list;
    }
    // 统计用户总数
    public function counter(){
    	$counter = $this->count();
    	return $counter;
    }
    // 修改用户信息
    public function user_edit(){ 
        $data = I('post.');
        $id = I('post.user_id');
        $map['user_id'] = ['eq' , $id];
        return $this->where($map)->save($data);     
    } 
   
}