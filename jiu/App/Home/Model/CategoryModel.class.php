<?php
// 1.与目录路径对应
namespace Home\Model;
use Think\Model;

    // 2.命名必须与文件名相同
    class CategoryModel extends Model{

        public function sel(){
            // 查询分类
            $cateList = $this->select();
            // 返回数据
            return $cateList;
        }
        
        
    }
