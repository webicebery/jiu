<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>账号-登录</title>
		<script type="text/javascript" src="/jiu/Public/js/jquery-2.1.3.min.js"></script>
                     <script type="text/javascript" src="/jiu/Public/js/bootstrap.min.js"></script>
                     <link rel="stylesheet" type="text/css" href="/jiu/Public/css/bootstrap.min.css" />
	 	<style>
			body{
				
			}
			.col-md-8{
				width:430px;
				height:470px;
				margin:50px 0 0 700px;
			}
			a{
				color:#757575;
			}
			a:hover{
				color:blue;
			}

	 	</style>
	</head>
	<body>
		<div style="height:100px;background:#FFFFFF;">
			<div style="float:left;margin-left:50px;margin-top:30px"><a href="<?php echo U('Home/index/show');?>"><img src="/jiu/Public/Home/pic/2016-12-16_215120.png" height="60" alt=""></a></div>
			
		</div>

		<div style="margin:0 auto;background: url('/jiu/Public/Home/pic/2016-12-16_222623.png');position:relative; " >
		<div class="container" style="">
			<div style="position:absolute;left:250px;top:205px;width:241px;height:59px;background:white"><img src="/jiu/Public/Home/pic/2016-12-16_214959.png" width="241" height="58"  alt=""></div>
			<div class="row">
				<div class="col-md-2"></div>
					<div class="col-md-8" style="background:#F9F9F9;">
						<center>
							<h2 style="margin-top:40px;"><b>账号登录</b></h2>
							<br><br>

							<form action="<?php echo U('Home/Login/geetest_submit_check');?>" method="post">

								<div class="form-group">
									<input type="text" class="form-control" name="user_name" id="exampleInputEmail1" placeholder="用户名username" style="width:330px;height:50px;">
								</div>

								<div class="form-group">
									<input type="password" name="user_pass" class="form-control" id="exampleInputPassword1" placeholder="密码pasword" style="width:330px;height:50px;">
								</div>
								<br>
								<div class="form-group">
									<div id="captcha" style="height:35px;"></div>
								</div>
                                                                                      <br>  
								<button type="submit" class="btn btn-info" style="width:330px;height:50px;">立即登录</button>
							</form>

							<br>
							<a href="<?php echo U('Home/Register/index');?>" style="text-decoration:none;">注册账号</a>
							<a href="<?php echo U('Home/Index/show');?>" style="text-decoration:none;">返回主页</a>
					
						</center>
					</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		</div>
                    <br>

	</body>
	<script src="/jiu/Public/geetest/geetest.js"></script>
    <script src="/jiu/Public/js/jquery-2.1.3.min.js"></script>
    <script>

    var handler = function (captchaObj) {
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#captcha");
       
     };
    // 获取验证码
    $.get("<?php echo U('Home/Login/geetest_show_verify');?>",function(data) {
 
        // 使用initGeetest接口
        // 参数1：配置参数，与创建Geetest实例时接受的参数一致
        // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
        initGeetest({
            gt: data.gt,
            challenge: data.challenge,
            product: "float", // 产品形式
            offline: !data.success
        }, handler);
    },'json');
    // 检测验证码
    function check_verify(){
        // 组合验证需要用的数据
        var test=$('.geetest_challenge').val();
        var postData={
            geetest_challenge: $('.geetest_challenge').val(),
            geetest_validate: $('.geetest_validate').val(),
            geetest_seccode: $('.geetest_seccode').val()
        }
        // 验证是否通过
        $.post("<?php echo U('Home/Login/geetest_ajax_check');?>", postData, function(data) {
            
            if (data.status==1) {
              alert(12);
            }else{
                alert('验证失败');
            }
        });
    }
	</script>
</html>