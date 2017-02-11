<?php
// 1.与目录路径对应
namespace Admin\Model;
use Think\Model;
// 2.命名必须与文件名相同
class CategoryModel extends Model{

    public function index(){
        // 查询分类
        $cateList = $this->order('pid ASC')->select();
        // 返回数据
        return $cateList;
    } 

    // 添加子分类
    public function addChild(){
        // 获取提交的数据
        $post = I('post.');
        $pid = isset($post['pid']) ? $post['pid'] : '0';
        $list['pid'] = $pid;
        $path = isset($post['path']) ? $post['path'] : '';
        if(substr_count($path,',') > 3){
            $result[ 'msg' ] = '添加失败！';
            return $result;
        }
        $path = $path . $pid . ',';
        $list['path'] = $path;
        $list['name'] = $post['name'];
        $list['description'] = $post['description'];
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
    // 修改分类信息
    public function cate_edit(){
        // 获取提交的数据
        $post = I('post.');
        echo '<pre>';
            print_r($post);
        echo '</pre>';
        $id = $post['id'];
        $map['id'] = ['eq',$id];
        $list['name'] = $post['name'];
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
    /**
     * 单个id查询
     */
    public function find($id){
        // 条件
        $map['id'] = ['eq',$id];
       
        // 结果员列表
        $list = $this->where($map)->select();

        // 如果返回多个数据，就以数组形式返回 ！
        return $list;
    }
    /**
     * 判断分类能否删除的方法
     */
    public function cate_sel($id){
        $map['pid'] = ['eq',$id];
        $result = $this->where($map)->select();
        if(is_array($result)){
            $res['status'] = '0';
        }else{
            $res['status'] = '1';
        }
        
        return $res;
    }
    /**
     * 删除分类
     */
    public function cate_del($id){
    
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
    /**
     * 排除
     */
    public function cate_goods(){
        $map['pid'] = ['gt',43];
        // 查询分类
        $cateList = $this->where($map)->select();
        $list = [];
        foreach($cateList as $key => &$val){
            // 计算逗号
            $num = substr_count($val['path'],',');
            // 根据数量填充占位符
            // $str = str_repeat('|--',$num - 1);
            // 禁止
            $val['name'] = $num . '级－' .$val['name'];

        }
        // 返回数据
        return $cateList;
    } 
    
}
