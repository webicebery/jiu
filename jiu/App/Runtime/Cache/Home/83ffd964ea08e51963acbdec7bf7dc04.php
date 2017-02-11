<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui/css/H-ui.min.css" />

<link rel="stylesheet" type="text/css" href="/jiu/Public/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/lib/icheck/icheck.css" />

</head>
<body>
<h1>修改个人头像</h1>
<hr><br>
<article class="page-container">
	
	<form action="<?php echo U('Home/User/edit_icon');?>" class="form form-horizontal" id="form-admin-add" method="post" enctype="multipart/form-data">
	<input type="hidden" name="user_id" value="<?php echo ($user_id); ?>">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>当前头像：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<img src="/jiu/Public/homeIcon/<?php echo ($user_icon); ?>" alt="" width="100">
		</div>
	</div><br>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>修改头像：</label>
		<div class="formControls col-xs-5 col-sm-5">
			<input type="file" class="input-text" value="<?php echo ($val["real_name"]); ?>" placeholder=""  name="user_icon">
		</div>
	</div><br>
	
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
	
</article>

</body>
</html>