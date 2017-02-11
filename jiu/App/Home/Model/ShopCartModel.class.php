<?php

namespace Home\Model;

use Think\Model;
class ShopCartModel extends Model{


    //添加地址
    public function add_Address($post){
            $post['l_address'] = $post['location_p'].$post['location_c'].$post['location_a'].$post['detail_addr'];
            $post['uid'] = $_SESSION['user_logininfo'][0]['user_id'];
            $post['l_addtime'] = time();

            $location =M('location');
            $res = $location->create($post);
            $result = $location->add();
            if($result > 0){
                  return $res;
             }else{
                 
                redirect(U('Home/ShopCart/addAddress'),2, '添加失败！...');
             }
       
    }

    //新增地址
    public function newAddress(){
        $location =M('location');
        $map['uid'] =['eq',$_SESSION['user_logininfo'][0]['user_id']];
        $res = $location->where($map)->order('lid desc')->select();
        
        return $res;
    }

    //加入购物车
    public function inCart($id,$num=1){
        
        //如果该商品已存在则直接加其数量
        if ($_SESSION['cart'][$id]['id']==$id) {

            $this->incGoods($id,$num);
            return;
        }
        $goods = M('Goods');
        $map['id'] = ['eq',$id];
        $list = $goods->where($map)->find();
        $item = array();
        $item = array();
        $item['id'] = $list['id'];
        $item['name'] = $list['name'];
        $item['price'] = $list['price'];
        $item['num'] = $num;
        $item['store'] = $list['store'];
        $item['picture'] = $list['picture'];
        $_SESSION['cart'][$id] = $item;
        
           
    }

    //修改商品数量
    //商品数+1
    public function incGoods($id,$num=1){
        if (isset($_SESSION['cart'][$id])) {
            if($_SESSION['cart'][$id]['num'] >=$_SESSION['cart'][$id]['store']){
                $_SESSION['cart'][$id]['num'] = $_SESSION['cart'][$id]['store'];
            }else{
                $_SESSION['cart'][$id]['num']+=1; 
                $_SESSION['total'] +=  $_SESSION['cart'][$id]['price'];

            }
            
        }
        
        return $_SESSION['cart'][$id]['num'];
    }

    //商品数-1
    public function decGoods($id,$num=1){
        if (isset($_SESSION['cart'][$id])) {
             if ($_SESSION['cart'][$id]['num'] <=1) {
                $_SESSION['cart'][$id]['num'] = 1;
             }else{
                $_SESSION['cart'][$id]['num'] -= 1;
                $_SESSION['total'] -=  $_SESSION['cart'][$id]['price'];
             }

        }
        // echo $_SESSION['cart'][$id]['num'];
        return $_SESSION['cart'][$id]['num'];
    }

    //删除商品
    public function delGoods($id){
        unset($_SESSION['cart'][$id]);
        $url = U('ShopCart/index');
        header("location:$url");

    }

    //清空购物车
    public function clearCart(){
        $_SESSION['cart'] = array();
        $url = U('ShopCart/index');
        header("location:$url");
    }

    PUBLIC function ensureOrder(){
        $post = I('post.');
        
        $data=[];
        foreach($post['goods'] as $key=>$val){
           if (array_key_exists($val,$_SESSION['cart'])){
            $data[$val] = $_SESSION['cart'][$val];
           }
        }  
        return $data;        
    }
    //提交订单
    public function orderSubmit($post){
        $location  = M('location');
        $map['lid'] = ['eq',$post['status']];
        $list = $location->where($map)->find();
        $order = [];
        $order['order_uid'] = $_SESSION['user_logininfo'][0]['user_id'];
        $order['order_linkman'] = $list['l_name'];
        $order['order_tel'] = $list['l_tel'];
        $order['order_address'] = $list['l_address'];
        $order['order_total'] = $post['totally'];
        $order['order_addtime'] = time();
        $order['order_status'] = 0;
        $num = str_pad($_SESSION['user_logininfo'][0]['user_id'],4,0, STR_PAD_LEFT);
        $order['order_num'] = time().$num;
        $orderlist = M('order');
        $result = $orderlist->create($order);
        $res =  $orderlist->add();
       
        $this->addOrdreDetail($res);
        
        $result['order_id'] = $res;
        if($res > 0){
            return $result;
        }
       
    }

    //从订单中心付款
    public function payFromUser($oid){
        $order = M('order');
        $map['order_id'] = ['eq',$oid];
        $list = $order->where($map)->find();

        return $list;
    }

    //增加积分
    public function addIntegral($uid,$total){
        $user = M('user');
        $map['user_id'] = ['eq',$uid];
        $list = $user->where($map)->find();
        $list['user_integral'] +=  ceil($total/10);
        $user->where($map)->save($list);
        return ;
    }

    //生成订单详情
    public function addOrdreDetail($pid){
       
        $detail = [];
        foreach ($_SESSION['cart'] as $key => $val) {
            $detail['pid']        = $pid;
            $detail['gid']        = $key;
            $detail['g_name']     = $val['name'];
            $detail['g_price']    = $val['price'];
            $detail['g_num']      = $val['num'];
            $detail['g_total']    = $val['num'] * $val['price'];
            $detail['g_picture']  = $val['picture'];
            $detail['is_comment'] = '0';
            $detailList = M('detail');
            $result = $detailList->create($detail);
            $res = $detailList->add();

        }
       



    }

    //减库存,加销量
    public function goodsChange($oid){
        $detail = M('detail');
        $goodsList = M('goods');
        $res = [];
        $map['pid'] = ['eq',$oid];
        $list = $detail->where($map)->select();
        foreach($list as $key=>$val){
            $condition['id'] = ['eq',$val['gid']];
            $res = $goodsList->where($condition)->find();
            $res['store'] -= $val['g_num'];
            if($res['store'] <= 0){
                $res['display'] = '0';
                $res['store'] = 0;

            }
            $res['buy'] += $val['g_num'];
            $maps['id'] = ['eq',$res['id']];
            $goodsList ->where($maps)->save($res);

        }    
        return true;
    }

    //  修改订单状态
    public function changeOrderStatus($order){
        $order['order_status'] = '4';
        $map['order_id'] = ['eq',$order['order_id']];
        $list = M('order');
        $list ->where($map)->save($order);
    }

    //完成支付，销毁购物车
    public function payDone($order){
        $post = I('post.');
            
        $orderList = M('order');
        $map['order_id'] = ['eq',$post['order_id']];
        $order = $orderList->where($map)->find();
        
        $this->addIntegral($order['order_uid'],$order['order_total']);
        $this->goodsChange($order['order_id']);
        $this->changeOrderStatus($order);
        
        echo "<script>alert('支付成功')</script>";
        $_SESSION['cart'] = array();
    }
}