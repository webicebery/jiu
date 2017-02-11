<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <title>Document</title>
        <meta charset='utf-8'/>
        <script type="text/javascript" src="/jiu/Public/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="/jiu/Public/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/jiu/Public/css/bootstrap.min.css" />
        <style>
            body{
                background-color: #ccc;
                background-image:url('/jiu/Public/Admin/image/loginbg.jpg');
            }
            .container{
                background-color: lightblue;
                border:2px solid lightblue;
                margin-top: 50px;
                width: 600px;
                height:500px;
                border-radius:10px;
                /*box-shadow: -30px 2px 10px 10px gray;*/
                position: relative;
            }
            .btn{
                top:370px;
                padding-left: 100px;
                padding-right: 100px;
                padding-top:10px; 
                padding-bottom:10px;
                position: absolute; 
            }
        </style>
    </head>
    <body>
        
        <!-- 居中的容器 -->
        <div class="container">
            <!-- 列需要包含在 row 里面 -->
            <div class="row">
                <!-- 4:4:4 -->
                <div class="col-md-2"></div>
                <div class="col-md-8" style="">
                    <h1>后台登录</h1><br><br>
                    <form id="geetest" action="<?php echo U('Admin/Login/geetest_submit_check');?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-size:16px">帐 号</label><br>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="User">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="font-size:16px">密 码</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Password">
                        </div><br><br>

                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">验证码</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="code" placeholder="code">
                            <div style="margin-top:10px;">
                                <img style="cursor:pointer;" src="<?php echo U('Admin/Login/code');?>" onclick="this.src='<?php echo U('Admin/Login/code');?>'" >
                            
                            </div>
                        </div> -->
                     <!--    <input type="button" value="异步验证登录" onclick="check_verify()" class="btn btn-default""/> -->
                                <div><div id="captcha"></div></div><br><br>
                                <input type="submit" value="登录" class="btn btn-info" >
                            
                            <a href=""></a>
                        <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                    </form>


                </div>
                <div class="col-md-4"></div>
            </div>
        

    

    </div>
    </body>
    <script src="/jiu/Public/geetest/geetest.js"></script>
    <script src="/jiu/Public/js/jquery-2.1.3.min.js"></script>
    <script>

    var handler = function (captchaObj) {
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#captcha");
       
     };
    // 获取验证码
    $.get("<?php echo U('Admin/Login/geetest_show_verify');?>",function(data) {
 
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
        $.post("<?php echo U('Admin/Index/geetest_ajax_check');?>", postData, function(data) {
            
            if (data.status==1) {
              
            }else{
                alert('验证失败');
            }
        });
    }
</script>
                
</html>