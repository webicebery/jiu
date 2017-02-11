<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/css/bootstrap.min.css" />

	<script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/js/jquery-2.1.3.min.js"></script>
</head>
<body>
	<div class="goodscomment">
		<div style="background:#EFEFEF">
			<div class="commentbtn" style="background:pink;padding:15px;font-size:20px">我的评价</div>

		</div>
		<div>
			<p style="margin-left:30px;margin-top:20px;height:30px;line-height:30px;font-size:20px">全部评论(<?php echo ($count); ?>)</p>
			<hr>
			<!-- 遍历 -->
			<?php if(empty($list)): ?><center><h1 style="height:500px"> 暂无评价 </h1></center>
			<?php else: ?>
			<?php if(is_array($list)): foreach($list as $key=>$val1): ?><div class="commentall" style="margin:5px 0">
				<div style="margin-left:30px;height:50px">
						<div style="float:left ;width:50px; height:50px">
							<img src="/jiu_xiangmu/xiangmu/jiu/Public/goodsimage/<?php echo ($val1["goodsImg"]); ?>" width="50px" height="50px" alt="" />
						</div>
						<div style="float:left;margin-top:30px;margin-left:15px;color:blue">
								<?php echo ($val1["goodsName"]); ?>
						</div>
				</div>
				<div class="comment1" style="margin-left:30px;margin-top:5px" >
					<div style="height:20px;margin-top:10px">
						<div style="float:left;line-height:25px;">评分:</div>
						<div style="float:left">
							<img src="/jiu_xiangmu/xiangmu/jiu/Public/homeIcon/<?php echo ($val1["cm_grade"]); ?>.jpg" style="width:100px;height:25px;">
						</div>
					</div>
					<div style="clear:both"></div>
					<div style="line-height:25px;float:left"><?php echo ($val1["cm_content"]); ?></div><div style="float:right"><?php echo ($val1["cm_addtime"]); ?></div>
				</div>

			</div>
			<div style="clear:both"></div><hr><?php endforeach; endif; ?>
			<div class="boss"><?php echo ($show); ?></div><?php endif; ?>
			<!-- 遍历 -->
		</div>
	</div>
</div>
</body>
<script>
	$('.boss').children().children().attr('class' , 'btn ');
	var p = "<?php  echo $_GET['p'] ?>"

	$('.boss span').attr('class' , 'btn btn-info');
</script>
</html>