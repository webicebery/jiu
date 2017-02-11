<?php
//1.与目录路径对应
namespace Admin\Model;
use Think\Model;

//2.命名必须与文件名相同
class CommentModel extends Model{

    public function index(){

        $list = $this->order('cm_id desc')->select();
        
        foreach($list as $key=>&$val){
            $val['cm_addtime'] = date('Y-m-d H:i:s' , $val['cm_addtime']);
        }

        return $list;
    }
    //删除商品评论的处理函数
    public function cm_del(){
        $cm_id= I('get.id');
        $del_result = $this->delete($cm_id);
        $result = [];
        
        if($del_result > 0){
            $result[ 'status' ] = $del_result;
            $result[ 'msg' ] = '添加成功！';

        }else{
           
            $result[ 'msg' ] = '添加失败！';
           
        }
        return $result;

    }
}
