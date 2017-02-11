<?php
// 1.与目录路径对应
namespace Admin\Model;
use Think\Model;
    // 2.命名必须与文件名相同

class SuggestModel extends Model{

    // 展示意见反馈
	public function pro_sug(){
		$list = $this->select();
		foreach($list as $key=>&$val){
            $val['sug_time'] = date('Y-m-d H:i:s' , $val['sug_time']);
        }
        return $list;
	}
    // 删除意见反馈
	public function pro_del($id){
        
        $del_result = $this->delete($id);
        $result = [];
        
        if($del_result > 0){
            $result[ 'status' ] = $del_result;
            $result[ 'msg' ] = '删除成功';

        }else{
           
            $result[ 'msg' ] = '删除失败！';
           
        }
        return $result;
    }
}