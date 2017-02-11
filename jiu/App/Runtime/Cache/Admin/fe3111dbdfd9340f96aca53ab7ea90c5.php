<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>订单管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单中心 <span class="c-gray en">&gt;</span> 订单管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i >&#xe68f;</i></a></nav>
<div class="page-container">
	
	<table class="table table-border table-bordered table-hover table-bg" id='tablestyle'>
		<thead>
			<tr>
				<th scope="col" colspan="11">订单管理</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th width="40">ID</th>
				<th width="40">用户ID</th>
				<th width="100">联系人</th>
				<th width="60">收货地址</th>
				<th width="100">总金额</th>
				<th width="40">添加时间</th>
				<th width="40">订单状态</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$val): ?><tr class="text-c">
				
				<td><input type="checkbox" value="" name=""></td>
				<td><?php echo ($val["order_id"]); ?></td>
				<td><?php echo ($val["order_uid"]); ?></td>
				<td><?php echo ($val["order_linkman"]); ?></td>
				<td><?php echo ($val["order_address"]); ?></td>
				<td><?php echo ($val["order_total"]); ?></td>
				<td><?php echo ($val["order_addtime"]); ?></td>
				<td><?php echo ($val["order_status"]); ?></td>
				<?php if($val["order_status"] == '未发货'OR $val["order_status"] == '新订单'): ?><td class="f-14"><a title="查看" href="javascript:;" onclick="order_detail('订单详情','orderDetail.html?id=<?php echo ($val["order_id"]); ?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe665;</i></a><a title="处理" href="javascript:;" onclick="order_edit('订单处理','edit.html?id=<?php echo ($val["order_id"]); ?>','360','400')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> </td>
				<?php else: ?>
					<td class="f-14"><a title="查看" href="javascript:;" onclick="order_detail('订单详情','orderDetail.html?id=<?php echo ($val["order_id"]); ?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe665;</i></a></td><?php endif; ?>
			</tr><?php endforeach; endif; ?>	
	</table>
	<div id="hiddenresult" style="display:none;">
	<!-- 列表元素 -->
</div>
	
</div>
<script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 

<script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script>

$(document).ready(function() {
$('#tablestyle ').dataTable( {

"bStateSave": true,
"aLengthMenu" : [2, 10, 20],
"bInfo" : false,
"bPaginate" : true,
"sPaginationType": "full_numbers"//分页
} );
} );

//订单编辑
function order_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}

//订单详情查看
function order_detail(title,url,id,w,h){
    layer_show(title,url,w,h);
}
</script>
</body>
</html>