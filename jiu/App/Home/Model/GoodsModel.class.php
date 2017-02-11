<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model{
	// 今日热卖
	public function pro_todayHot(){
		$map['display'] = ['eq','1'];
		$map['store'] = ['gt','0'];
		return $this->order('id desc')->where($map)->limit(6)->select();
	}
	// 乐享盛宴
	public function pro_lexiang(){
		$map['display'] = ['eq','1'];
		$map['store'] = ['gt','0'];
		$map['cateid'] = ['eq','68'];
		return $this->order('id desc')->where($map)->limit(4)->select();
	}
	// 人气商品
	public function pro_renqi(){
		$map['display'] = ['eq','1'];
		$map['store'] = ['gt','0'];
		$map['cateid'] = ['eq','70'];
		return $this->order('id desc')->limit(4)->where($map)->select();
	}
	// 好礼佳品
	public function pro_haoli(){
		$map['display'] = ['eq','1'];
		$map['store'] = ['gt','0'];
		$map['cateid'] = ['eq','70'];
		return $this->limit(4)->where($map)->select();
	}
	// 流连忘返
	public function pro_liulian(){
		$map['display'] = ['eq','1'];
		$map['store'] = ['gt','0'];
		$map['cateid'] = ['eq','68'];
		return $this->limit(4)->where($map)->select();
	}
	// 闲情小酌
	public function pro_xianqing(){
		$map['display'] = ['eq','1'];
		$map['store'] = ['gt','0'];
		$map['cateid'] = ['eq','67'];
		return $this->order('id desc')->limit(4)->where($map)->select();
	}
	// 葡萄酒
	public function pro_putao(){
		$map['display'] = ['eq','1'];
		$map['store'] = ['gt','0'];
		$map['cateid'] = ['eq','72'];
		return $this->order('id desc')->limit(8)->where($map)->select();
	}
	// 白酒
	public function pro_baijiu(){
		return $this->order('id desc')->limit(8)->where('cateid=109')->select();
	}
	// 白葡萄酒
	public function pro_baiputao(){
		$map['display'] = ['eq','1'];
		$map['store'] = ['gt','0'];
		$map['cateid'] = ['eq','73'];
		return $this->order('id desc')->limit(8)->where($map)->select();
	}

	// 查找商品
	public function pro_search(){
		$content = I('post.content');
		$map['display'] = ['eq','1'];
		$map['store'] = ['gt','0'];
		$map['name'] = ['LIKE' , '%' . $content . '%'];
		$list =  $this->where($map)->limit(12)->select();

		return ['list' => $list , 'count'=> $count];
	}

	// 价位搜索
	public function pro_search2(){
		switch (I('get.id')) {
			case '1000':
				$map['display'] = ['eq','1'];
				$map['store'] = ['gt','0'];
				$map['id'] = ['lt' , 100];
				$count = $this->order('price desc')->where($map)->count();
				$Page = new \Think\Page($count,12);

				$show  = $Page->show();
				$list =  $this->order('price desc')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

				return ['list' => $list , 'show' => $show , 'count'=> $count];
			break;
			case '1001':
				$map['id'] = ['lt' , 100];
				$map['display'] = ['eq','1'];
				$map['store'] = ['gt','0'];
				$count = $this->order('price ')->where($map)->count();
				$Page = new \Think\Page($count,12);

				$show  = $Page->show();
				$list =  $this->order('price ')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

				return ['list' => $list , 'show' => $show , 'count'=> $count];
			break;

			default:
				$map['display'] = ['eq','1'];
				$map['store'] = ['gt','0'];
				$map['cateid'] = ['eq' , I('get.id')];
				$count = $this->where($map)->count();
				$Page = new \Think\Page($count,12);

				$show  = $Page->show();
				$list =  $this->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

				return ['list' => $list , 'show' => $show , 'count'=> $count];
			break;
		}

	}
	// 商品详情
	public function pro_goods($id){
		$map['id'] = ['eq' , $id];
		$list =  $this->where($map)->select();

		
		$status = ['下架' , '在售'];
		foreach($list as $key => &$val){
			if($val['store'] <= 0){
				$val['display'] = 0;
			}
			$val['display'] = $status[ $val['display'] ];
		}

		return $list;
	}

	// 商品浏览量
	public function view($id){
		$map['id'] = ['eq' , $id];

		$list = $this->where($map)->select();


		foreach($list as $key=>&$val){
			$data['views'] = $val['views'] + 1;
		}

		$this->where($map)->save($data);
	}

	//----------ajax加入购物车--------------//
	public function goods_select(){
		 $id = I('post.gid');
		 $num = I('post.num');
		 $date = $this->where("id=$id")->select();
		  
		if(!$num){
			$num=1;
		}
		//-------------判断商品是否已存在购物车------------------//
		if(isset($_SESSION['cart'][$id])){
			if($num){
				$_SESSION['cart'][$id]['num']+=$num;
			}else{
				$_SESSION['cart'][$id]['num']+=1;
			}
			
			$add['status']=1;
		}else{
			 $_SESSION['cart'][$id] = $date[0];
			 $_SESSION['cart'][$id]['num'] = $num;
			$add['status']=0;
		}

		 $add['content']='<center>
		 	<a href="'.__MODULE__.'/Goodsdetail/index?id='.$date[0]['id'].'">
			<div id="id-'.$date[0]['id'].'" class="gwkuang" >
			<img src="'.__ROOT__.'/Public/goodsimage/'.$date[0]['picture'].'" height="50" width="50">
			<div class="kuangzide">'.$date[0]['name'].'</div>
			<li class="jiagelo">￥'.$date[0]['price'].'元　　x'.$_SESSION['cart'][$id]['num'].'</li>
			</div>
			</a>
			</center>';  
		return $add;
		
	}
	
	// 天气查询
    public function heather(){
      	
	    $list = ['北京市' , '上海市' , '重庆市' , '天津市'];
	    if(in_array(I('post.location_p'),$list)){
	      	$area = I('post.location_p');
	    }else{
	      	$area = I('post.location_c');
	    }
	    if(I('post.location_p') == '其它'){
	      	$area = '广州';
	    }
      	if(empty($area)){
      		$area = '广州';
      	}
      	
       	$url = 'http://api.jisuapi.com/weather/query?appkey=dd7681a3b4dfef38&city='.$area;

       	$ch = curl_init( $url );
        // 2.设置请求头
        curl_setopt($ch,CURLOPT_HTTPHEADER , $data );
        // 3.获取的信息以字符串返回，而不是直接输出
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        // 4.发起请求
        $json =  curl_exec($ch);
        return $result = json_decode($json , true);
    }

}