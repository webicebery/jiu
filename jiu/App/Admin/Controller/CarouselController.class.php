<?php
namespace Admin\Controller;
use Think\Controller;
class CarouselController extends CommonController{
	public function index(){
		$carousel = D('carousel');
		// 调用函数
		$data['list'] = $carousel->index();
		// 分配变量
		$this->assign($data);
		// 展示模板
		$this->display();

	}
    // 添加轮播图
	public function cal_add(){
		if(IS_GET){
            $this->display();
        }
        if (IS_POST) { 
            $carousel = D('carousel');
            $data = $carousel->cal_add();
            if($data['status']){
                $this->success("添加成功！",U('Admin/carousel/index'),3);
            }else{
                $this->error("添加失败！".$result['msg'],U('Admin/carousel/cal_add'),3);
            }
        }
    }
    // 轮播图修改
    public function edit(){
        if(IS_GET){
            
            $carousel = D('carousel');
            $data['list'] = $carousel->cal_find();
            $this->assign($data);

            $this->display();
        }
        if(IS_POST){
            $carousel = D('carousel');
            $result=$carousel->cal_edit();

            
            if($result['status'] == 1 ){

                $this->success('更新成功！',U('Admin/Carousel/Close'),1);
           
            }else{
                $this->error('更新失败！',U('Admin/Carousel/Close'),1);
            }    

         
		}
    }
    // 删除
    public function del(){
        
        $carousel = D('carousel');
        $result = $carousel->cal_del();
      	if($result['status']){
          
            $this->success('已删除！'.$result['msg'],U('Admin/Carousel/index'),2);
           
        }else{
            $this->error('删除失败！'.$result['msg'],U('Admin/Carousel/index'),5);
        }
    }

               
}
