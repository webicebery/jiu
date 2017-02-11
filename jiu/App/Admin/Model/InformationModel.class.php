<?php
// 1.与目录路径对应
namespace Admin\Model;
use Think\Model;
class InformationModel extends Model{

    // 公告展示
	public function pro_info(){

		$list =  $this->select();
		foreach($list as $key =>&$val){
			$val['addtime'] = date('Y-m-d' , $val['addtime'] );
		}
		return $list;

	}
    // 删除公告
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
    // 添加公告
    public function add_info(){
    	$list['info_content'] = I('post.adminName');
    	$list['addtime'] = time();
    	$this->add($list);
    }

}