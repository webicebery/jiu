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
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>商品评论</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品评论管理 <span class="c-gray en">&gt;</span>商品评论浏览 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <table class="table table-border table-bordered table-hover table-bg" id="table-sort">
        <thead>
            <tr>
                <th scope="col" colspan="14">商品评论浏览</th>
            </tr>
            <tr class="text-c">
                <th width="40">ID</th>
                <th width="50">用户名</th>
                <th width="50">商品ID</th>
                <th width="50">商品名</th>
                <th width="50">商品图</th>
                <th width="80">评分等级</th>
                <th width="200">评论内容</th>
                <th width="60">评论时间</th>
                <th width="70">操作</th>
            </tr>
        </thead>

        <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$val): ?><tr class="text-c">
                <td><?php echo ($val["cm_id"]); ?></td>
                <td><?php echo ($val["userName"]); ?></td>
                <td><?php echo ($val["goodsId"]); ?></td>
                <td><?php echo ($val["goodsName"]); ?></td>
                <td><img src="/jiu/Public/goodsimage/<?php echo ($val["goodsImg"]); ?>" width="50px" height="50px" alt="" /></td>
                <td><img src="/jiu/Public/homeIcon/<?php echo ($val["cm_grade"]); ?>.jpg" width="100" height="25"></td>
                <td><?php echo ($val["cm_content"]); ?></td>
                <td><?php echo ($val["cm_addtime"]); ?></td>
                <td class="td-manage">
                    <a title="删除" href="javascript:;" onclick="comment_del(this,<?php echo ($val["cm_id"]); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>

</div>
<script type="text/javascript" src="/jiu/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/jiu/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/jiu/Public/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/jiu/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/jiu/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/jiu/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
$(function(){
    $('#table-sort').dataTable({
        // "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        // "bStateSave": true,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          // {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
        ]
    });
    $('.table-sort tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
});
/*管理员-角色-删除*/
function comment_del(obj,id){
    layer.confirm('数据价值高，删除需谨慎，确认要删除吗？',function(index){
        //此处请求后台程序，下方是成功后的前台处理……


        $(obj).parents("tr").remove();
        layer.msg('已删除!',{icon:1,time:1000});
        $.get("<?php echo U('Admin/Comment/del');?>",{'id':id},function(data){
            if(data.status == '1'){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
                window.location.reload();
            }else{
                alert('错误了。。');
            }
        });
    });
}
</script>
</body>
</html>