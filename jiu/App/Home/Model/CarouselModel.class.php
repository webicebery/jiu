<?php
    
    //1.与目录路径对应
namespace Home\Model;
use Think\Model;

//2.命名必须与文件名相同
class CarouselModel extends Model{

    public function index(){

        $list = $this->order('cal_id desc')->limit(5)->select();
        
        foreach($list as $key=>&$val){
            $val['addtime'] = date('Y-m-d' , $val['addtime']);
        }

        return $list;
    }
    // 轮播图添加
    public function cal_add(){
        $post = I('post.');
        if($_FILES['Filedata']['error']==4){
            $info['savename'] = 'default.png';

        }else{
            // 实例化上传类型
            $upload = new \Think\Upload();
            // 设置上传文件大小
            $upload->maxSize    = 3145728 ;
            // 设置上传类型
            $upload->exts       = array('jpg','gif','png','jpeg');
            $upload->rootPath   =    './Public/';
            // 设置图片上传目录
            $upload->savePath   = './carouselimage/';
            $upload->subName    =    '';
            // 文件上传名字
            $upload->saveName   = time().'_'.mt_rand();
            // 上传文件
            $info   =   $upload->uploadOne($_FILES['Filedata']);
            if(!$info){
                // 上传错误提示错误信息        
                $result['msg'] = $upload->getError();
                $result['status'] = 0;
                return $result;  
            }
            
        }
        if(!empty($info['savename'])){
            // 上传成功 获取上传文件信息         
            $list['cal_name'] = $post['cal_name'];
            $list['cal_image'] = $info['savename'];
            $list['cal_address'] = $post['cal_address'];
            $list['addtime'] = time();
            // 插入数据库
            $result['status'] = $this->add($list);
            
            return $result; 
        }
    }
    // 轮播图修改
    public function cal_edit(){
        $post = I('post.');
        $cal_id = $post['id'];
        $map['cal_id'] = ['eq',$cal_id];
        $list['cal_name'] = $post['cal_name'];
        $list['cal_address'] = $post['cal_address'];

        if($_FILES['Filedata']['error']==4){
            $info['savename'] = $post['image'];
            $list['cal_image'] = $info['savename'];
            $result['status'] = $this->where($map)->save($list);       
            return $result;
        }else{
            // 实例化上传类型
            $upload = new \Think\Upload();
            // 设置上传文件大小
            $upload->maxSize    = 3145728 ;
            // 设置上传类型
            $upload->exts       = array('jpg','gif','png','jpeg');
            $upload->rootPath   =    './Public/';
            // 设置图片上传目录
            $upload->savePath   = './carouselimage/';
            $upload->subName    =    '';
            // 文件上传名字
            $upload->saveName   = time().'_'.mt_rand();
            // 上传文件
            $info   =   $upload->uploadOne($_FILES['Filedata']);
            if(!$info){
                // 上传错误提示错误信息        
                $result['msg'] = $upload->getError();
                $result['status'] = 0;
                return $result;  
            }else{
                
                // 插入数据库
                $list['cal_image'] = $info['savename'];
                $result['status'] = $this->where($map)->save($list);     
                return $result; 
            }
        }
    }
    // 查询一条数据
    public function cal_find(){
        $id=I('get.id');
        // 条件
        $cal_id = $id;
        $map['cal_id'] = ['eq',$cal_id];
       
        // 结果员列表
        $list = $this->where($map)->select();

        // 如果返回多个数据，就以数组形式返回 ！
        return $list;

    }
    //删除轮播图的处理函数
    public function cal_del(){
        $cal_id= I('get.id');
        $del_result = $this->delete($cal_id);
        $result = [];
        
        if($del_result > 0){
            $result[ 'status' ] = $del_result;
            $result[ 'msg' ] = '添加成功';

        }else{
           
            $result[ 'msg' ] = '添加失败！';
           
        }
        return $result;

    }

}
