<?php
//1.与目录路径对应
namespace Admin\Model;
use Think\Model;
//2.命名必须与文件名相同
class FrilinkModel extends Model{
    // 查询出数据
    public function index(){
        $list = $this->select();
        foreach($list as $key=>&$val){
            $val['Fri_linktime'] = date('Y-m-d' , $val['Fri_linktime']);
        }

        return $list;
    }
    // 友情链接的删除
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
    // 友情链接的添加
    public function pro_add(){
        $post = I('post.');
        $list['Fri_name'] = $post['Fri_name'];
        $list['Fri_url'] = $post['Fri_url'];
        $list['Fri_describe'] = $post['Fri_describe'];
        $list['Fri_linktime'] = time();

        $insertid = $this->add($list);
        $result = [];
        
        if($insertid > 0){
            $result[ 'status' ] = $insertid;
            $result[ 'msg' ] = '添加成功';

        }else{
           
            $result[ 'msg' ] = '添加失败！';
           
        }
        return $result;

    }


    public function find($id){
        $map['Fri_id'] = ['eq',$id];

        $list = $this->where($map)->select();

        return $list;
    }

    // 修改友情链接
    public function pro_edit(){

        // 获取提交的数据
        $post = I('post.');
         
        $id = $post['id'];
        $map['Fri_id'] = ['eq',$id];
        $list['Fri_name'] = $post['Fri_name'];
        $list['Fri_url'] = $post['Fri_url'];
        $list['Fri_describe'] = $post['Fri_describe'];
        // echo $edit_result;
        $edit_result = $this->where($map)->save($list); 
        $result = [];
        if($edit_result > 0){
            $result[ 'status' ] = $edit_result;
            $result[ 'msg' ] = '设置成功';

        }else{
           
            $result[ 'msg' ] = '设置失败！';         
        }
        return $result;
    }

}