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
	<h1 style="color:red">我的订单</h1><hr><br><br>
	<?php if(empty($list)): ?><h2>暂时没有订单</h2><br>
	<?php else: ?>
	

	<table class="table table-hover" border="1" style="text-align:center">
		<tr>
			<th style="text-align:center;font-size:16px;">订单号</th>
			<th style="text-align:center;font-size:16px;">收货人</th>
			<th style="text-align:center;font-size:16px;">手机号码</th>
			<th style="text-align:center;font-size:16px;">收货地址</th>
			<th style="text-align:center;font-size:16px;">总价</th>
			<th style="text-align:center;font-size:16px;">订单状态</th>
			<th style="text-align:center;font-size:16px;">下单时间</th>
			<th style="text-align:center;font-size:16px;">操作</th>
		</tr>
			<?php if(is_array($list)): foreach($list as $key=>$val): ?><tr>
			<td><?php echo ($val["order_num"]); ?></td>
			<td><?php echo ($val["order_linkman"]); ?></td>
			<td><?php echo ($val["order_tel"]); ?></td>
			<td><?php echo ($val["order_address"]); ?></td>
			<td style="color:red; font-size:8px">￥<?php echo ($val["order_total"]); ?></td>
			<td style="color:red"><?php echo ($val["order_status"]); ?></td>
			<td><?php echo ($val["order_addtime"]); ?></td>
			<?php if($val[order_status] == '未付款'): ?><form action="<?php echo U('Home/ShopCart/pay');?>" method="post" target="_top">
				<input type="hidden" name="to_pay" value="<?php echo ($val["order_id"]); ?>">
				<td class="form-group"><button type="submit">付款</button></td>
			</form>
			<?php else: ?>
				<td class="form-group"><a href="/jiu_xiangmu/xiangmu/jiu/Home/Order/orderDetail.html?id=<?php echo ($val["order_id"]); ?>&message=<?php echo ($val["order_status"]); ?>" >查看</td><?php endif; ?>
		</tr><?php endforeach; endif; ?>
	</table><br>
	<div class="boss"><?php echo ($show); ?></div><?php endif; ?>
</body>
<script>
	$('.boss').children().children().attr('class' , 'btn ');
	var p = "<?php  echo $_GET['p'] ?>"

	$('.boss span').attr('class' , 'btn btn-info');
</script>
</body>
</html>