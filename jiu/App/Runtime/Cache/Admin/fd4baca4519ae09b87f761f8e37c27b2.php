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
<title>分类管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类管理 <span class="c-gray en">&gt;</span> 分类浏览 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">
	
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="40">ID</th>
					<th width="60">父级ID</th>
					<th width="130">分类名</th>
					<th width="150">分类描述</th>
					<th width="90">路径</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$val): ?><tr class="text-c">
						<td><?php echo ($val["id"]); ?></td>
						<td><?php echo ($val["pid"]); ?></td>
						<td><?php echo ($val["name"]); ?></td>
						<td><?php echo ($val["description"]); ?></td>
						<td class="text-l"><?php echo ($val['path']); ?></td>
						<td class="f-14 product-brand-manage">
						<a title="编辑" href="javascript:;" onclick="category_edit('分类编辑','edit.html?id=<?php echo ($val["id"]); ?>','500','350')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>  
						<a title="删除" href="javascript:;" onclick="category_del(this,<?php echo ($val["id"]); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
						<a title="子分类添加" href="javascript:;" onclick="category_add('子分类添加','addChild.html?id=<?php echo ($val["id"]); ?>','500','350')" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript" src="/jiu/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/layer/2.1/layer.js"></script><script type="text/javascript" src="/jiu/Public/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/jiu/Public/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/jiu/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  // 制定列不参与排序
		]
	});
	$('.table-sort tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			$('.table').$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
});

/*分类管理-添加*/
function category_add(title,url,w,h){
	layer_show(title,url,w,h);

}
/*分类管理-编辑*/
function category_edit(title,url,w,h){
	layer_show(title,url,w,h);

}
/*分类管理-删除*/
function category_del(obj,id){
	layer.confirm('分类删除须谨慎，确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.get("<?php echo U('Admin/category/del');?>",{'id':id},function(data){
			if(data == '1'){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			}else{
				layer.msg('不能删除!',{icon:0,time:1000});
			}
		});
	});
}
</script>
</body>
</html>