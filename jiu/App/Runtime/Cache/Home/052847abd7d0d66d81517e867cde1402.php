<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
        <!-- 引入样式表 -->
    <link rel="stylesheet" href="/jiu/Public/css/bootstrap.min.css">
</head>
<style>
	.col-xs-2 , .col-xs-6{
		font-size: 20px;
		font-family: 微软雅黑;
		color:#AC396D;
	}
</style>
<body>
	<h1 style="color:red">个人资料</h1>
	<hr><br>

	<?php if(is_array($list)): foreach($list as $key=>$val): ?><div class="row">
		  	<div class="col-xs-3"></div>
		  	<div class="col-xs-2">账 号:</div>
		  	<div class="col-xs-6"><?php echo ($val['user_name']); ?></div>
		</div><br>
		<div class="row">
		  	<div class="col-xs-3"></div>
		  	<div class="col-xs-2">等 级:</div>
		  	<div class="col-xs-6"><?php echo ($val['user_level']); ?></div>
		</div><br>
		<div class="row">
		  	<div class="col-xs-3"></div>
		  	<div class="col-xs-2">性 别:</div>
		  	<div class="col-xs-6"><?php echo ($val['user_sex']); ?></div>
		</div><br>
		<div class="row">
		  	<div class="col-xs-3"></div>
		  	<div class="col-xs-2">头 像<font color="red" size="3px">(点击头像可以修改头像)</font>:</div>
		  	<div class="col-xs-6">
			  	<a href="<?php echo U('Home/User/edit_icon',array('id'=>$val['user_id'],'name'=>$val['user_icon']));?>">
			  		<img src="/jiu/Public/homeIcon/<?php echo ($val['user_icon']); ?>" alt="" width="100">
			  	</a>
			</div>
		</div><br>
		<div class="row">
		  	<div class="col-xs-3"></div>
		  	<div class="col-xs-2">真实姓名:</div>
		  	<div class="col-xs-6"><?php echo ($val['real_name']); ?></div>
		</div><br>
		<div class="row">
		  	<div class="col-xs-3"></div>
		  	<div class="col-xs-2">手机号码:</div>
		  	<div class="col-xs-6"><?php echo ($val['user_tel']); ?></div>
		</div><br>
		<div class="row">
		  	<div class="col-xs-3"></div>
		  	<div class="col-xs-2">邮 箱:</div>
		  	<div class="col-xs-6"><?php echo ($val['user_email']); ?></div>
		</div><br>
		<div class="row">
		  	<div class="col-xs-3"></div>
		  	<div class="col-xs-2">注册时间:</div>
		  	<div class="col-xs-6"><?php echo ($val['addtime']); ?></div>
		</div><br><?php endforeach; endif; ?>
</body>
</html>