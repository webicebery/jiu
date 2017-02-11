<?php
namespace Home\Controller;

use Think\Controller;

class ShopCartController extends EmptyController{


    public function index(){
        $post = I('post.');
        $id = $post['gid'];
        $num = $post['num'];
        $orderlist = D('ShopCart');
        $orderlist->inCart($id,$num=1);
        $data = $_SESSION['cart'];
        $this->assign('cart',$data);
        $this->display();
    }

 


    
//添加新地址
    public function addAddress(){
        if( IS_GET){
            $this->display();
        }else{
               
             $post = I('post.');
             $addr = D('ShopCart');
             $data = $addr->add_Address($post);
             
             $this->check();
                
        }
       
    }

//确认订单
    public function check(){
   
        $list = D('ShopCart');
        $address=$list->newAddress();
        $data = $list->ensureOrder($post);
        $this->assign('address',$address);
        $this->assign('data',$data); 
        $this->display();
    }


//修改购物车中的商品数量
    public function modNum($gid,$num=1){
        $list = D('ShopCart');
        $list->modNum($gid,$num);
    }

 //商品数+1
    public function incGoods($id,$num=1){
        
        $list = D('ShopCart');
        $res =  $list->incGoods($id,$num);
        echo $res;
    }   

//商品数-1
    public function decGoods($id,$num=1){
        // $id = I('post.id');
        $list = D('ShopCart');
        $res = $list->decGoods($id,$num=1);
        echo $res;
        
    }

//删除商品
    public function delGoods($id){
        $list = D('ShopCart');
        $list->delGoods($id);

    }  

 //清空购物车
    public function clearCart(){
          $list = D('ShopCart');
          $list->clearCart();
    }   
   
//支付页面
    public function pay(){
        if(IS_POST){
            $post=I('post.');
              
            $list = D('ShopCart');
            if($post['to_pay']){
                   
                $res = $list->payFromUser($post['to_pay']);
              ;   
            }else{
                $res = $list->orderSubmit($post);  
            }
           
            $this->assign('data',$res);      
            $this->display('pay');
        }
    }
        

//支付方式
    public function payWay(){
        $post=I('post.val');
        $passhash = $_SESSION['user_logininfo'][0]['user_pass'];
        if (password_verify($post, $passhash)) {
            echo 'Y';
        } else {
            echo 'N';
        }
    }

    //支付成功
    public function paySuccess(){
            
        $list = D('ShopCart');
        $res = $list->payDone();
        $this->display('paySuccess');
    }

}

