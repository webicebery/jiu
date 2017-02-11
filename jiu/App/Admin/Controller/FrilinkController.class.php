<?php
namespace Admin\Controller;
use Think\Controller;
class FrilinkController extends CommonController{
        public function index(){
            $stu = D('frilink');
            $data['list']=$stu->index();

            $this->assign($data);
            $this->display();
        }
        // 删除友情链接
        public function del(){
            $id = I('get.Fri_id');
            $frilink = D('frilink');
            $result = $frilink->pro_del($id);

             if($result['status']){
          
            $this->success('已删除！'.$result['msg'],U('Admin/FrilinkController/index'),2);
           
            }else{
            $this->error('删除失败！'.$result['msg'],U('Admin/FrilinkController/index'),5);
            }
        }

            // 友情链接的添加
            public function add(){
                    if(IS_GET){
                    $this->display();
                    }

                    if(IS_POST){
                    $frilink = D('frilink');
                    if(!empty(I('post.Fri_name')) && !empty(I('post.Fri_url')) ){
                        $result = $frilink->pro_add();
                        if($result['status']){
                      $this->success("添加成功！",U('Admin/Frilink/add'),3);
                         
                        }else{
                        $this->error('添加失败！'.$result['msg'],U('Admin/Frilink/add'),3);
                        }
                    }else{
                        $this->error('添加失败！没有添加名字或者地址！',U('Admin/Frilink/add'),3);
                    }

        }

                }
            // 友情链接的修改
             public function edit(){
                if(IS_GET){
                    $id=I('get.id');
                    $frilink = D('frilink');
                    $data['list'] = $frilink->find($id);
                    $this->assign($data);

                    $this->display();
                }
                if(IS_POST){

                    $frilink = D('frilink');
                    $result = $frilink->pro_edit();

                   
                    if($result['status']){
                        $this->success('修改成功！',U('Admin/Frilink/index'));
                    }else{
                        $this->error($result['msg'] . '失败',U('Admin/Frilink/edit'),5);
                    }
                    
                }
        }







}
