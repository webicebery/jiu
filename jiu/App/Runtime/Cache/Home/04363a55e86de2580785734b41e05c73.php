<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<script src="/jiu/Public/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="/jiu/Public/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="http://lib.h-ui.net/icheck/jquery.icheck.min.js"></script>
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" href="/jiu/Public/css/bootstrap.min.css">

</head>
<style>
	a{
		text-decoration:none;
	}
	#notice_content{
		position:absolute;
		/*border:1px solid red;*/
		top:48px;
		left:16px;
		color: red;
	}
	#notice_content1{
		position:absolute;
		/*border:1px solid red;*/
		top:48px;
		left:16px;
		color: red;
	}
	
</style>
<body style="overflow: hidden;">
	<div style="width:1350px;height:710px;margin:0 auto">
	<div style="height:700px;position:relative">
		<div style="height:100px;">
			<div style="float:left;margin-top:30px"><a href="<?php echo U('Home/Index/show');?>"><img src="/jiu/Public/Home/pic/2016-12-16_215120.png" height="60" alt=""></a></div>
			
		</div>

		<div style="height:480px;width:1800px;margin-left:-150px;background: url('/jiu/Public/Home/pic/2016-12-16_222623.png');">
		</div>
		<div style="position:absolute;left:90px;top:291px;width:241px;height:59px;background:white"><img src="/jiu/Public/Home/pic/2016-12-16_214959.png" width="241" height="58"  alt=""></div>

		<div style="position:absolute;left:895px;top:105px;width:432px;height:470px;background:white">
			<h4 style="margin-left:110px;"><span style="margin-left:135px;">已有账号,<a href="<?php echo U('Home/Login/index?s=1');?>" style="text-decoration:none">立即登录</a></span></h4><br>
			<!-- <article class="page-container"> -->
			<form class="form form-horizontal" id="form-admin-add" method="post" action="<?php echo U('Home/Register/pro_register');?>">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
					<div class="formControls col-xs-8 col-sm-8">
						<input type="text" class="input-text" value="" placeholder="" id="adminName" name="adminName" style="height:40px"><span id="notice_content"></span>
					</div>
				</div><br>
				<div class="row cl">
					<label class="form-label col-xs-3 col-sm-3"><span class="c-red">*</span>密码：</label>
					<div class="formControls col-xs-9 col-sm-8">
						<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password" style="height:40px"><span id="notice_content1"></span>
					</div>
				</div><br>
				<div class="row cl ">
					<label class="form-label col-xs-4 col-sm-3 "><span class="c-red">*</span>确认密码：</label>
					<div class="formControls col-xs-8 col-sm-8">
						<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2" style="height:40px">
					</div>
				</div><br>
				<div class="row cl ">
					<label class="form-label col-xs-4 col-sm-3 "><span class="c-red">*</span>手机号码：</label>
					<div class="formControls col-xs-8 col-sm-8">
						<input type="text" class="input-text" autocomplete="off"  placeholder="请输入11位手机号码" id="tell" name="tell" style="height:40px">
					</div>
				</div>
				<div class="row cl ">
					<div class="formControls col-xs-8 col-sm-3"></div>
					<div class="formControls col-xs-8 col-sm-5">
						<input type="text" class="input-text" autocomplete="off"  placeholder="验证码" id="phone_code" name="phone_code" style="height:40px">
					</div>
					<button class="btn btn-primary radius" style="height:35px" id="resendtime" disabled="disabled" onclick="retime()">获取验证码</button>
				</div>
				
				<div class="row cl box">
					<div class="col-xs-8 col-sm-9 col-sm-offset-3">
						<input class="btn btn-primary radius" id="zhucetj" onclick="return textForm()" type="submit"  value="&nbsp;&nbsp;提交&nbsp;&nbsp;" style="width:280px;height:40px">
					</div>
				</div>
			</form>
		</article>
			
		</div>

	</div>
	</div>
</body>


<script>
	// 当长度满足11位字符，按钮才出现
	$('#tell').keyup(function(){
    	if(this.value.length == 11){
            $('#resendtime').removeAttr('disabled');
        }
    });
    
    // 按钮点击，禁止按钮
	function retime(){
		var tel = $('#tell').val();
		console.log(tel);
		$.get("<?php echo U('Home/Register/phone');?>" , {'tel':tel},function(data){
			alert(data);
    	})

		$('#resendtime').attr('disabled','true');
		var i = 60;
		var timer = setInterval(function(){
			if(i < 1){
				$('#resendtime').html('获取验证码');
				$('#resendtime').removeAttr('disabled');
				
				// 将定时器清除
				clearInterval(timer);
			}else{
				$('#resendtime').html(i+'秒后获取'); 
			}
			i--;
		},1000);

	}
	
	
	$('#adminName').focusout(function(){
		// alert(this.value);
		// 准备正则
        var preg = /^[a-zA-Z\d]{3,10}$/;
        var result = preg.test(this.value);
        $('#notice_content').html('');
        if(result){
            // 提示错误
        	$.get("<?php echo U('Home/Register/varify_userName');?>" , {'user_name':this.value},function(data){
        		if(data == '0'){
        			alert('该账号已被注册,请您再换个骚气一点的名字！');
        		}
        	})
        }
	});
	$('#adminName').focusin(function(){
		$('#notice_content').html('只能以3-10位数字或者字母为注册名');
	});
	$('#password').focusin(function(){
		$('#notice_content1').html('密码为不少于6位数的纯数字');
	});
	$('#password').focusout(function(){
		$('#notice_content1').html('');
	});
	$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			adminName:{
				required:true,
				minlength:3,
				maxlength:10
			},
			password:{
				required:true,
				minlength:6
			},
			password2:{
				required:true,
				equalTo: "#password"
			},
			tell:{
				required:true,
				isMobile:true,
			},
			phone_code:{
				required:true,
				minlength:1,
			},
			
		},
		messages:{
			password:{
				required:'密码不能为空',
				minlength:'密码至少为6位'
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		
	});
});

	$('#phone_code').focusout(function(){
		$.get("<?php echo U('Home/Register/phone1');?>" , {'code':$('#phone_code').val()},function(data){
			// alert(data);
    		if(data == '0'){
    			alert('验证码错误了！！');
    			sign = 'false';
    			// $('#zhucetj').attr('disabled','true');
    		}else{
    			// alert('终点');
    			sign = 'true';
    		}
    	})
    });

function textForm(){
		
	if(sign=='false'){
		return false;
	}else{
		return true;
	}
};

</script>
</html>