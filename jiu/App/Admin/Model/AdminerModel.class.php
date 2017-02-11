<?php
// 1.与目录路径对应
namespace Admin\Model;
use Think\Model;
class AdminerModel extends Model{

    public function choose(){
        $list = $this->select();
        return $list;

    }
    // 管理员展示
    public function index(){
        $get = I('get.');
        if(!empty($get['content'])){
            
            $get['content'] =isset($_GET['content']) ? $_GET['content'] : '';
            
            switch ($get['search']) {
                case 'ad_id':
                    $map[ $get['search'] ] = [ 'eq', $get['content'] ];
                    break;
                case 'ad_adminer':
                    $map[ $get['search'] ] = [ 'LIKE' , '%' . $get['content'] . '%' ];
                    break;
            }
        }
        
        // 查询总条数
        $count = $this->where($map)->count();
        // 管理员列表
        $list = $this->where($map)->select();

        $sex = ['女','男','兽'];
        $status = ['禁用','启用'];
        $level = ['超级管理员','管理员'];

        foreach($list as $key=>&$val){
            $val['ad_sex'] = $sex[ $val['ad_sex'] ];
            $val['ad_status'] = $status[ $val['ad_status'] ];
            $val['ad_level'] = $level[ $val['ad_level'] ];
            $val['addtime'] = date('Y-m-d' , $val['addtime']);
        }
        // 如果返回多个数据，就以数组形式返回 ！
        return ['list' => $list, 'count'=>$count,'content'=>$get['content']];
    }

    /**
     * 单个id查询
     */
    public function find($id){
        // 条件
        $map['ad_id'] = ['eq',$id];
       
        // 结果员列表
        $list = $this->where($map)->select();

        // 如果返回多个数据，就以数组形式返回 ！
        return $list;
    }

    // 处理登录信息
    public function pro_login(){
    
        $adminer = I('post.name');
        $ad_pass =I('post.pwd');
        // var_dump($ad_pass);
        // exit;
        $list = $this->select();
        $level = ['超级管理员','管理员'];

        foreach ($list as $key => $val) {
            $list[] = $val['ad_adminer'];

        }

        // 验证用户名
        if(in_array($adminer , $list)){
            $map['ad_adminer'] = ['eq',$adminer];

            // 查询数据库 遍历
            $list = $this->where($map)->select();
            foreach ($list as $key => &$val) {
                $password = $val['ad_pass'];
                $val['ad_level'] = $level[ $val['ad_level'] ];
                $status = $val['ad_status']; 

            }
            // 判断密码
            if(password_verify($ad_pass,$password)){
                // 判断管理员状态是否被禁用
                if($status == 1){
                    // 记录到SESSION
                    session('admin_logininfo', $list );
					return '4';
                }else{
                   return '3';
                    
                }
            }else{
                return '2';
            }

        }else{
           return '1';
            
            
        }
    }


    //添加管理员的处理函数
    public function pro_add(){

        // 获取提交的数据
        $post = I('post.');
           
        $list['ad_adminer'] = $post['adminName'];
        $list['ad_sex'] = $post['sex'];
        $list['ad_email'] = $post['email'];
        $list['ad_tel'] = $post['phone'];
        $list['ad_level'] = $post['adminRole'];
        $list['ad_pass'] = password_hash($post['password'],PASSWORD_DEFAULT);
        $list['addtime'] = time();
 
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

    // 修改管理员信息
    public function pro_edit(){

        // 获取提交的数据
        $post = I('post.');
        // echo '<pre>';
        //     print_r(I('post.'));
        // echo '</pre>';
         
        $id = $post['id'];
        $map['ad_id'] = ['eq',$id];
        $list['ad_adminer'] = $post['ad_adminer'];
        $list['ad_sex'] = $post['ad_sex'];
        $list['ad_email'] = $post['ad_email'];
        $list['ad_tel'] = $post['ad_tel'];
        $list['description'] = $post['description'];
        $edit_result = $this->where($map)->save($list); 
        // echo $edit_result;
        $result = [];
        if($edit_result > 0){
            $result[ 'status' ] = $edit_result;
            $result[ 'msg' ] = '设置成功';

        }else{
           
            $result[ 'msg' ] = '设置失败！';         
        }
        return $result;
    }

    // 修改头像
    public function pro_editIcon(){
        
        $id = I('post.id');
        if( $_FILES['ad_icon']['error'] !== 4){

            // //设置附件上传类型
            $upload = new \Think\Upload();// 实例化上传类   
            $upload->maxSize   =     3145728 ;// 设置附件上传大小    
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath  =    './Public/';
            $upload->subName   =    '';
            $upload->saveName  =   time().'_'.mt_rand();
            //设置附件上传类型    
            $upload->savePath  =      './adminerIcon/'; 
    
            // 设置附件上传目录    // 上传单个文件     
            $info   =   $upload->uploadOne($_FILES['ad_icon']); 
            if(!$info) {
                // 上传错误提示错误信息        
               return $result = $upload->getError();    
            }else{
                // 上传成功 获取上传文件信息
                $list['ad_icon'] = $info['savename'];
                $map['ad_id'] = ['eq' ,$id ]; 
                return $result =  $this->where($map)->save($list);            
                // $info['savename'];    
            }

        }
                     
    }

    //删除管理员的处理函数
    public function pro_del($id){
        
        $del_result = $this->delete($id);
        $result = [];
        
        if($del_result > 0){
            $result[ 'status' ] = $del_result;
            $result[ 'msg' ] = '添加成功';

        }else{
           
            $result[ 'msg' ] = '添加失败！';
           
        }
        return $result;

    }

    // 修改状态
    public function pro_status($id,$status){
        $map['ad_id'] = ['eq',$id];
        $data['ad_status'] = $status;
        $status_result = $this->where($map)->save($data); 
        $result = [];
        if($status_result > 0){
            $result[ 'status' ] = $status_result;
            $result[ 'msg' ] = '设置成功';

        }else{
           
            $result[ 'msg' ] = '设置失败！';
           
        }
        return $result;
    }
    public function select_adminer($ad_name){
        $map['ad_adminer'] = ['eq',$ad_name];
        $status_result = $this->where($map)->select();
        return $status_result;
    }

}

















    
    
