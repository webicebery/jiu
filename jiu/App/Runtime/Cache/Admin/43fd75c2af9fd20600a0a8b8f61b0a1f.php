<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui.admin/css/style.css" />

<title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form action="<?php echo U('Admin/Adminer/show');?>" method="get">
	        <select name="search" class="select input_select" size="1" style="width:80px;height:30px;">
	            <option value="ad_id">会员ID</option>
	            <option value="ad_adminer">会员名称</option>
	        </select>
	        <input type="text" class="input-text" style="width:200px" placeholder="输入管理员ID或名称" id="" name="content" value="<?php echo ($content); ?>">
	        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	    </form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加管理员','add.html','800')"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a> </span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="100">用户名</th>
				<th width="100">用户头像</th>
				<th width="60">手机号码</th>
				<th width="100">用户邮箱</th>
				<th width="40">用户性别</th>
				<th width="40">用户等级</th>
				<th width="40">用户状态</th>
				<th width="60">添加时间</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$val): ?><tr class="text-c">
				<td><?php echo ($val["ad_id"]); ?></td>
				<td><?php echo ($val["ad_adminer"]); ?></td>
				<td><a title="编辑头像" href="javascript:;" onclick="admin_role_edit('管理员编辑','edit_icon.html?id=<?php echo ($val["ad_id"]); ?>','500' ,'400')" style="text-decoration:none"><i class="Hui-iconfont"><img src="/jiu/Public/adminerIcon/<?php echo ($val["ad_icon"]); ?>" width="50"></i></a></td>
				<td><?php echo ($val["ad_tel"]); ?></td>
				<td><?php echo ($val["ad_email"]); ?></td>

				<td><?php echo ($val["ad_sex"]); ?></td>
				<td><?php echo ($val["ad_level"]); ?></td>
				<?php if($val[ad_status] == '启用'): ?><td class="td-status"><span class="label label-success radius">已<?php echo ($val["ad_status"]); ?></span></td>
				<?php else: ?>
					<td class="td-status"><span class="label radius">已<?php echo ($val["ad_status"]); ?></span></td><?php endif; ?>
				<td><?php echo ($val["addtime"]); ?></td>

				<td class="f-14">
					<?php if($_SESSION['admin_logininfo'][0]['ad_level'] == '超级管理员'): if($val[ad_level] == $_SESSION['admin_logininfo'][0]['ad_level']): ?><a title="编辑" href="javascript:;" onclick="admin_role_edit('管理员编辑','edit.html?id=<?php echo ($val["ad_id"]); ?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<?php else: ?>
							<?php if($val[ad_status] == '启用'): ?><a style="text-decoration:none" onClick="admin_stop(this,<?php echo ($val["ad_id"]); ?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
							<?php else: ?>
								<a style="text-decoration:none" onClick="admin_start(this,<?php echo ($val["ad_id"]); ?>)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a><?php endif; ?>
							<a title="编辑" href="javascript:;" onclick="admin_role_edit('管理员编辑','edit.html?id=<?php echo ($val["ad_id"]); ?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" href="javascript:;" onclick="admin_role_del(this,<?php echo ($val["ad_id"]); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a><?php endif; ?>
					<?php else: ?>
						<?php if($val[ad_id] == $_SESSION['admin_logininfo'][0]['ad_id']): ?><a title="编辑" href="javascript:;" onclick="admin_role_edit('管理员编辑','edit.html?id=<?php echo ($val["ad_id"]); ?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a><?php endif; endif; ?>
				</td>
			</tr><?php endforeach; endif; ?>	
	</table>
</div>
<script type="text/javascript" src="/jiu/Public/lib/jquery/1.9.1/jquery.min.js"></script>
 
<script type="text/javascript" src="/jiu/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/jiu/Public/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/jiu/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
/*管理员-角色-添加*/
function admin_role_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-编辑*/
function admin_role_edit(title,url,w,h){
	layer_show(title,url,w,h);

}
/*管理员-角色-删除*/
function admin_role_del(obj,id){
	layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
		$.get("<?php echo U('Admin/Adminer/del');?>",{'ad_id':id},function(data){
			if(data.status == '1'){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			}else{
				alert('错误了。。');
			}
		});
	});
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".f-14").prepend('<a style="text-decoration:none" onClick="admin_start(this,<?php echo ($val["ad_id"]); ?>)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		$.get("<?php echo U('Admin/Adminer/status');?>",{'ad_id':id,'status':0},function(data){
			if(data.status == '1'){				
				layer.msg('已停用!',{icon: 5,time:1000});
				location.replace(location); 
			}else{
				alert('错误了。。');
			}
		});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
				
		$(obj).parents("tr").find(".f-14").prepend('<a style="text-decoration:none" onClick="admin_stop(this,<?php echo ($val["ad_id"]); ?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		$.get("<?php echo U('Admin/Adminer/status');?>",{'ad_id':id,'status':1},function(data){
			if(data.status == '1'){				
				layer.msg('已启用!', {icon: 6,time:1000});
				location.replace(location); 
			}else{
				alert('错误了。。');
			}
		});
	});
}
</script>
</body>
</html>