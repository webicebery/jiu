<?php
    
    //1.与目录路径对应
namespace Admin\Model;
use Think\Model;

//2.命名必须与文件名相同
class GoodsModel extends Model{

    // 商品展示
    public function index(){

        $list = $this->select();

        $display = array('下架','上架');
        $status = array('热销','新品','猜你喜欢');
        
        foreach($list as $key=>&$val){
            $val['display'] = $display[$val['display']];
            $val['status'] = $status[$val['status']];
            $val['addtime'] = date('Y-m-d' , $val['addtime']);
        }

        return $list;
    }
    // 删除商品
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


    // 添加商品
    public function adds(){

        $post = I('post.');
            if( $_FILES['ad_icon']['error'] !== 4){

            // //设置附件上传类型
            $upload = new \Think\Upload();// 实例化上传类   
            $upload->maxSize   =     3145728 ;// 设置附件上传大小    
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath  =    './Public/';
            $upload->subName   =    '';
            $upload->saveName  =   time().'_'.mt_rand();
            //设置附件上传类型    
            $upload->savePath  =      './goodsimage/'; 
    
            // 设置附件上传目录    // 上传单个文件     
            $info   =   $upload->uploadOne($_FILES['myfile']); 
            if(!$info){
                // 上传错误返回错误信息        
               $result['msg'] = $upload->getError();
               return $result;    
            }else{
                // 上传成功 获取上传文件信息并插入数据库
                $list['name'] = $post['name'];
                $list['cateid'] = $post['cateid'];
                $list['price'] = $post['price'];
                $list['picture'] = $info['savename'];
                $list['store'] = $post['store'];
                $list['describe'] = $post['describe'];
                $list['display'] = $post['display'];
                $list['status'] = $post['status'];
                $list['addtime'] = time();

                $result['number'] = $this->add($list);
        
                return $result;            
                // $info['savename'];    
            }
        }   
    }
    // 商品修改前展示
    public function edits(){
        $get = I('get.');
        $map['id'] = ['eq',$get['id'] + 0];
        $list = $this->where($map)->select();

        foreach($list as $key=>$val){
            $list['id'] = $val['id'];
            $list['cateid'] = $val['cateid'];
            $list['name'] = $val['name'];
            $list['price'] = $val['price'];
            $list['store'] = $val['store'];
            $list['display'] = $val['display'];
            $list['status'] = $val['status'];
            $list['describe'] = $val['describe'];
        }
      
        return $list;
    }

    //更新商品信息 
    public function indexs(){
        $p = D('Goods');
        $post = I('post.');
       
        $list['id'] = $post['id'];
        $list['name'] = $post['name'];
        $list['price'] = $post['price'];
        $list['store'] = $post['store'];
        $list['describe'] = $post['describe'];
        $list['display'] = $post['display'];
        $list['status'] = $post['status'];

        $map['id'] = ['eq',$post['id'] ];
        $result = $this->where($map)->save($list);
        
        
        return $result;
    }

    // 查一条数据
    public function find($id){
        // 条件
        $map['id'] = ['eq',$id];
       
        // 结果员列表
        $list = $this->where($map)->select();

        // 如果返回多个数据，就以数组形式返回 ！
        return $list;
    }
    // 修改商品图
    public function pro_editIcon(){
        
        $id = I('post.id');
        if( $_FILES['picture']['error'] !== 4){

            // //设置附件上传类型
            $upload = new \Think\Upload();// 实例化上传类   
            $upload->maxSize   =     3145728 ;// 设置附件上传大小    
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath  =    './Public/';
            $upload->subName   =    '';
            $upload->saveName  =   time().'_'.mt_rand();
            //设置附件上传类型    
            $upload->savePath  =      './goodsimage/'; 
    
            // 设置附件上传目录    // 上传单个文件     
            $info   =   $upload->uploadOne($_FILES['picture']); 
            if(!$info){
                // 上传错误提示错误信息        
               return $result = $upload->getError();    
            }else{
                // 上传成功 获取上传文件信息
                $list['picture'] = $info['savename'];
                $map['id'] = ['eq' ,$id ];
                return $this->where($map)->save($list);            
                // $info['savename'];    
            }   
        }   
    }    

            // 查一条数据
    public function not($id){
        // 条件
        $map['id'] = ['eq',$id];
       
        // 结果员列表
        $list = $this->where($map)->select();

        // 如果返回多个数据，就以数组形式返回 ！
        return $list;
    }
    // 修改商品图
    public function pro_noticon(){
        
        $id = I('post.id');
        if( $_FILES['not_icon']['error'] !== 4){

            // //设置附件上传类型
            $upload = new \Think\Upload();// 实例化上传类   
            $upload->maxSize   =     3145728 ;// 设置附件上传大小    
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath  =    './Public/';
            $upload->subName   =    '';
            $upload->saveName  =   time().'_'.mt_rand();
            //设置附件上传类型    
            $upload->savePath  =      './goodsimage/'; 
    
            // 设置附件上传目录    // 上传单个文件     
            $info   =   $upload->uploadOne($_FILES['not_icon']); 
            if(!$info){
                // 上传错误提示错误信息        
               return $result = $upload->getError();    
            }else{
                // 上传成功 获取上传文件信息
                $list['not_icon'] = $info['savename'];
                $map['id'] = ['eq' ,$id ];
                return $this->where($map)->save($list);            
                // $info['savename'];    
            }   
        }   
    } 
    /**
      * 查询分类底下是否有商品
      */ 
    public function goods_sel($id){
        $map['cateid'] = ['eq',$id];
        $res= $this->where($map)->select();
        if(is_array($res)){
            $result['status'] = '0';
        }else{
            $result['status'] = '1';
        }
        
        return $result;
    }    

}





  



           
            
