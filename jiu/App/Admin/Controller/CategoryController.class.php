<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController {

	public function index(){
		// 实例化
		$category = D('category');
        // 数据处理
       	$data['list']=$category->index();
        // 分配数据
        // dump($data);
       	$this->assign($data);
		$this->display();
	}
	/**
	 * 顶级分类及子分类添加
	 */
	public function addChild(){
		if(IS_GET){
            $id=I('get.id');
            $category = D('category');
            $data['list'] = $category->find($id);
            $this->assign($data);
            $this->display();
        }

        if(IS_POST){
            $category = D('category');
            $result = $category->addChild();
            if($result['status']){
                $this->success('添加成功！',U('Admin/category/index'));
            }else{
                $this->error($result['msg'],U('Admin/category/addTop'),5);
            }
        }
	}
	/**
     * 修改分类信息
     */
    public function edit(){
        if(IS_GET){
            $id=I('get.id');
            $category = D('category');
            $data['list'] = $category->find($id);
            $this->assign($data);
            $this->display();
        }
        if(IS_POST){
            $category = D('category');
            $result = $category->cate_edit();
            if($result['status']){
                $this->success('添加成功！',U('Admin/category/index'));
            }else{
                $this->error($result['msg'],U('Admin/category/index'),5);
            }
        }
    }
	/**
	 * 分类删除
	 */
	public function del(){
        $id= I('get.id');
        $category = D('category');
        $goods = D('goods');
        $res=$category->cate_sel($id);
        $result=$goods->goods_sel($id);
        if($res['status'] == '0' || $result['status']=='0'){
            echo '0';
        }else{
            $sign=$category->cate_del($id);
            if($sign['status']){
                echo '1';
            }else{
                echo '0';
            }
        }
    }
}
