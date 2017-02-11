<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController{
    // 首页显示
    public function index(){

        $stu = D('goods');
        $data['list']=$stu->index();

        $this->assign($data);

        $this->display();
    }
    // 删除商品
    public function del(){
        $id = I('get.id');
        $goods = D('goods');
        $result = $goods->pro_del($id);

         if($result['status']){
      
        $this->success('已删除！'.$result['msg'],U('Admin/GoodsController/index'),2);
       
        }else{
        $this->error('删除失败！'.$result['msg'],U('Admin/GoodsController/index'),5);
        }
    }
    // 商品添加
    public function add(){

        if(IS_POST){ 
            $stu = D('goods');
            
            $data=$stu->adds();

            //如果上传图片不存在错误信息则执行跳转 
            if(empty($data['msg'])){
                if($data['number']){
                    $this->success("添加成功！",U('Admin/goods/add'),3);
                }else{
                    $this->error("添加失败！",U('Admin/goods/add'),3);
                }
            }else{
                $this->error("{$data['msg']}！",U('Admin/goods/add'),3);
            }
            
        }

        if(IS_GET){
            $category = D('category');
            $cate['list'] = $category->cate_goods();
            $this->assign($cate);
            $this->display();
        }
    }
    // 商品修改
    public function edit(){
        if(IS_GET){
            $stu = D('Goods');
            $data['list']=$stu->edits();

            $this->assign($data);

            $this->display();
        }

        if(IS_POST){
            $stu = D('Goods');
            $result=$stu->indexs();

            if($result > 0){
                
                $this->success("修改成功！",U('Admin/goods/Close'),3);
            }else{
                $this->error("修改失败！",U('Admin/goods/Close'),3);
            }
        }

    }
    // 修改商品图
    public function edit_icon(){
        if(IS_GET){
            $id =  I('get.id');
            $goods = D('goods');
            $data = $goods->find($id);
            $this->assign('data' , $data);
            $this->display();
        }

        if(IS_POST){

            $goods = D('goods');
            $result = $goods->pro_editIcon();
            if($result > 0 ){

            $this->success('更新成功！'.$result['msg'],U('Admin/Goods/Close'),2);
           
            }else{
                $this->error('更新失败！'. $result ,U('Admin/goods/Close'),3);
            }
        }

    }

          // 修改商品详情图
    public function not_icon(){
        if(IS_GET){
            $id =  I('get.id');
            $goods = D('goods');
            $data = $goods->not($id);
            $this->assign('data' , $data);
            $this->display();
        }

        if(IS_POST){

            $goods = D('goods');
            $result = $goods->pro_noticon();
            if($result > 0 ){

            $this->success('更新成功！'.$result['msg'],U('Admin/Goods/Close'),2);
           
            }else{
                $this->error('更新失败！'. $result ,U('Admin/goods/Close'),3);
            }
        }

    }



}