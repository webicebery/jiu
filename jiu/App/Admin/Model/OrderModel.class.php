<?php
namespace Admin\Model;

use Think\Model;

class OrderModel extends Model{

    public function index(){   
        $list = $this->select();
        $status = ['新订单','已发货','订单完成','无效订单','未发货'];
        foreach($list as $key=>&$val){
            $val['order_status'] = $status[ $val['order_status'] ];
            $val['order_addtime'] = date('Y-m-d',$val['order_addtime']);
        }
        return $list;
    }

    public function counter(){
       
        $list=$this->count();

        return $list;
    }

    public function showDetail($id){
        $list = M('detail');
        $map['pid'] = ['eq',$id];
        $result =  $list->where($map)->select();
        return $result;
    }
    public function orderStatus($id){            
        $map['order_id'] = ['eq',$id];
        $result =  $this->where($map)->select();
        return $result;
    }


    public function orderAction(){
        $post = I('post.');
        $p= M('order');
        $list['order_id'] = $post['id'];
        $list['order_status'] = $post['status'];
        $map['order_id'] = ['eq',$post['id'] ];
        $edit_id = $this->where($map)->save($list);
        $result = [];
            if($edit_id > 0){
                $result[ 'status' ] = $edit_id;
                $result[ 'msg' ] = '添加成功';
             }else{
               
                $result[ 'msg' ] = '添加失败！';
               
            }
            return $result;
    }
}
