<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/jiu_xiangmu/xiangmu/jiu/Public/css/bootstrap.min.css">
	<script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/js/jquery-2.1.3.min.js"></script>
	<style>
		body{
			font-family: 微软雅黑
		}
	</style>
</head>
<body>
	<h1 style="color:red">订单详情</h1><hr><br><br>
	
	<table class="table table-hover" border="1" style="text-align:center">
		<tr>
			
			<th style="text-align:center;font-size:16px">商品名</th>
			<th style="text-align:center;font-size:16px">商品图</th>
			<th style="text-align:center;font-size:16px">商品单价</th>
			<th style="text-align:center;font-size:16px">购买数量</th>
			<th style="text-align:center;font-size:16px">状态</th>
			<th style="text-align:center;font-size:16px">操作</th>
		</tr>
			<?php if(is_array($list)): foreach($list as $key=>$val): ?><tr>
			<td><?php echo ($val["g_name"]); ?></td>
			<td><img src="/jiu_xiangmu/xiangmu/jiu/Public/goodsimage/<?php echo ($val["g_picture"]); ?>" height="50" width='50'/></td>
			<td  style="color:red">￥ <?php echo ($val["g_price"]); ?></td>
			<td><?php echo ($val["g_num"]); ?></td>
			<td><?php echo ($val["is_comment"]); ?></td>

			<?php if($message == '已发货'): ?><td class="replace"><a href="javascript:;" onclick="shou(this,<?php echo ($val["pid"]); ?>,<?php echo ($val["detail_id"]); ?>)">确认收货</a></td>
				
			<?php elseif($message == '已收货'): ?>
				<?php if($val["is_comment"] == '已评价'): ?><td class="form-group">已评价</td>
				<?php else: ?>
					<td class="form-group"><a  href='<?php echo U("Home/Comment/index",array(id => $val[gid],detail_id =>$val[detail_id]));?>'>评价</a></td><?php endif; ?>
			<?php elseif($message == '无效订单'): ?>
				<td class="form-group"><p>订单关闭</p></td>
			<?php elseif($message == '已付款'): ?>
				<td class="form-group"><p>等待发货</p></td><?php endif; ?>


		</tr><?php endforeach; endif; ?>
	</table><br>
	
</body>

<script>
	function shou(obj , id){
		if(confirm('确定收货?')){
			$.get("<?php echo U('Home/Order/shou');?>" , {'id' : id},function(data){
				if(data > 0){
					window.location.href="orderDetail.html?id="+data+"&message=已收货"
				}else{
					alert('收货失败');
				}
			})
		}
	}


</script>
</body>
</html>