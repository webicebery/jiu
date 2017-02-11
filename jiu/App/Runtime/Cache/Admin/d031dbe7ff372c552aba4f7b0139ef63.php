<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<title>轮播图管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 轮播图管理 <span class="c-gray en">&gt;</span> 轮播图添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<article class="page-container">
    <form action="<?php echo U('Admin/Carousel/cal_add');?>" class="form form-horizontal" id="form-admin-add" method="post" enctype="multipart/form-data">

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>轮播图名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" autocomplete="off" style="width:600px;" placeholder="请输入轮播图名" name="cal_name">
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>轮播图片：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="file" class="input-text" autocomplete="off"  style="width:600px;" name="Filedata">
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>轮播图跳转地址：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" autocomplete="off" style="width:600px;" placeholder="轮播图跳转网址 如:www.baidu.com" name="cal_address" id="cal_address" value="http://">
        </div>
    </div>

    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="submit" style="width:150px;" value="&nbsp;&nbsp;确定&nbsp;&nbsp;">
        </div>
    </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/jiu/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/jiu/Public/lib/jquery-form/jquery-form.js"></script>  -->

<script type="text/javascript" src="/jiu/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="http://lib.h-ui.net/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/jiu/Public/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/jiu/Public/static/h-ui.admin/js/H-ui.admin.js"></script>  
 
<!--/_footer /作为公共模版分离出去--> 

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript">
// $('#cal_address').focusout(function(){
//         // alert(this.value);
//         // 准备正则
//         var preg = /^(((ht|f)tp(s?))\://)?(www.|[a-zA-Z].)[a-zA-Z0-9\-\.]+\.(com|edu|gov|mil|net|org|biz|info|name|museum|us|ca|uk)(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\;\?\'\\\+&amp;%\$#\=~_\-]+))*$/;
//         var result = preg.test(this.value);
// }
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    
    $("#form-admin-add" ).validate({
        rules:{
            cal_name:{
                required:true,
                minlength:2,
                maxlength:16
            },
            // myfile:{
            //     required:true,
            //     minlength:6
            // },
            cal_address:{
                required:true,
                url:true,
                minlength:8
            },
        },

        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            $(form).ajaxSubmit();
            var index = parent.layer.getFrameIndex(window.name);
            parent.$('.btn-refresh').click();
            parent.layer.msg('已添加!',{icon:1,time:1000});
            // window.location.reload();
        }
    });
});
</script> 
</body>
</html>