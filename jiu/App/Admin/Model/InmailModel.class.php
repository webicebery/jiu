<?php
namespace Admin\Model;
use Think\Model;
class InmailModel extends Model{

	// 查看收件箱
	public function show_mail($id){
		
		$map['Inm_sjid'] = ['eq',$id];
		$list = $this->where($map)->select();

		$status = ['未读','已读'];

		
		foreach( $list as $key=>&$val){
			// echo $status[ $val['Inm_status'] ];
			$val['Inm_status'] = $status[ $val['Inm_status'] ];

		}
		
		
		return $list;
	}

	// 处理要发送的站内信
	public function pro_send(){
    	$post = I('post.');
		
		$jq = explode(',', $post['adminRole']);
		$data['Inm_sjid'] =$jq['0'];  
		$data['Inm_sjname'] =$jq['1'];  
		
		
		
		$data['Inm_content'] = $post['content'];
		$data['Inm_title'] = $post['adminName'];
		$data['Inm_fjid'] = $_SESSION['admin_logininfo'][0]['ad_id'] ;
		 
		$data['Inm_fjname'] =  $_SESSION['admin_logininfo'][0]['ad_adminer'] ; 
		$data['Inm_sendtime'] =date('Y-m-d H:i:s' , time());
		
		return $this->add($data);

	}

	// 查看发件箱
	public function show_mysend(){
		$map['Inm_fjid'] = ['eq' , $_SESSION['admin_logininfo'][0]['ad_id']];

		$list =  $this->where($map)->select();
		$status = ['未读','已读'];

		foreach( $list as $key=>&$val){
			// echo $status[ $val['Inm_status'] ];
			$val['Inm_status'] = $status[ $val['Inm_status'] ];

		}
		return $list;
	}

	// 查看站内信详情 并且把状态改为已读
	public function  show_letter($id){
		$map['Inm_id'] = ['eq' , $id];
		$data['Inm_status'] = 1;
		return $result = $this->where($map)->save($data);
	}

	// 查看站内信详情
	public function show_letter1($id){
		$map['Inm_id'] = ['eq' , $id];
		
		return $result = $this->where($map)->select();
	}

	// 处理回复站内信
	public function pro_reply(){
    	$post = I('post.');
		
		$jq = explode(',', $post['adminRole']);
		$data['Inm_sjid'] =$jq['0'];  
		$data['Inm_sjname'] =$jq['1'];  
		
		
		
		$data['Inm_content'] = $post['content'];
		$data['Inm_title'] = $post['adminName'];
		$data['Inm_fjid'] = $post['Inm_fjid'] ;
		 
		$data['Inm_fjname'] = $post['Inm_fjname']  ; 
		$data['Inm_sendtime'] =date('Y-m-d H:i:s' , time());
		
		return $this->add($data);

	}

    // 处理删除站内信
	public function pro_del($id){
	$del_result = $this->delete($id);
    $result = [];
    
    if($del_result > 0){
        $result[ 'status' ] = $del_result;
        $result[ 'msg' ] = '添加成功';

    }else{
       
            $result[ 'msg' ] = '添加失败！';
       
        }
            return $result;
	}

    // 统计站内信
    public function pro_counter(){
        $Inm_sjid = $_SESSION['admin_logininfo'][0]['ad_id'];
        // echo $Inm_sjid;
        $map['Inm_sjid'] = ['eq',$Inm_sjid];
        $map['Inm_status'] = ['eq',0];
        return $result = $this->where($map)->count();
        // $result ? 
    }



}