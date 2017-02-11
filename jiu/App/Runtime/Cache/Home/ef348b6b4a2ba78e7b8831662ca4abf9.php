<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品评价</title>
	<link type="text/css" rel="stylesheet" href="/jiu_xiangmu/xiangmu/jiu/Public/css/show.css">
	<script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/js/jquery-2.1.3.min.js"></script>
	<style>
    body{
        overflow-y: hidden;
    }
        #star li{
            width: 27px;
            height: 28px;
            /*border:1px solid red;*/
            background: url("/jiu_xiangmu/xiangmu/jiu/Public/homeIcon/xing.gif");
            background-repeat: no-repeat;
            /*background-position: 0 -28px;*/
            list-style:none;
            float:left;
        }
        .commentbuju{
        	background: url("/jiu_xiangmu/xiangmu/jiu/Public/homeIcon/commentbg.jpg");
        }
    </style>
</head>
<body>
	<div class="commentbuju" style="border:1px solid red;width:900px;margin:0">
    
		<form id="first" action="<?php echo U('Home/comment/index');?>" method="post">
			<h3 style="padding:50px 0 50px 150px">您好! 请为商品-- <?php echo ($list[0]['name']); ?> --发表评价 0.0</h3>
            <input type="hidden" name="goodsName" value="<?php echo ($list[0]['name']); ?>">
            <input type="hidden" name="goodsImage" value="<?php echo ($list[0]['picture']); ?>">
            <input type="hidden" name="goodsId" value="<?php echo ($list[0]['id']); ?>">
            <input type="hidden" name="detail_id" value="<?php echo ($number); ?>">
            
			<input type="hidden" name="cm_grade" id="dengji">
			<fieldset class="pingjiakuang">
				<legend class="legend" align="right">发表评论</legend>
				<div style="margin:60px 0 0 100px;">
					
				
				<div>
					评分:
					
					<ul id="star">
				        <li></li>
				        <li></li>
				        <li></li>
				        <li></li>
				        <li></li>
				    </ul>
				</div>
				<div style="clear:both"></div>
				<br>
			    <div>
			    	<span class="" style="color:red">*</span> 评语:
			    	<br>
			    	<textarea name="cm_content" id="textarea" cols="50" rows="8" style="font-size:14px">    商品百分百正品,客服服务态度也很好,好评！好评！！下次还要来买..0.0</textarea>
			    	<br>
			    	<span style="margin-left:250px">还可以输入<i id="i1" style="color:red">100</i>个字！</span>
			    </div>
				<input class="tijiao" type="submit" value="确认提交">
				</div>
			</fieldset>
		</form>
	</div>
</body>
<script>
    // var star = $('#star');
    var star_li = $('#star li');
    var xing1 = 0;
    // console.dir(star_li);

    // 为每一个li绑定鼠标经过事件
    for(var i = 0; i < star_li.length; i++){
        // 记录下表索引
        star_li[i].index = i;

        star_li[i].onmouseover = function(){
            // console.log(this.index);
            xing1 = this.index+1;
            $('#dengji').attr('value',xing1);
            // 1.先清空所有星星
            for(var k = 0; k < star_li.length; k++){
                star_li[k].style.backgroundPosition = '0 0';
            }
            // 2.以当前下标为循环终止条件，小于当前下标的元素都点亮
            for(var j = 0; j <= this.index; j++){
                star_li[j].style.backgroundPosition = '0 -28px';
            }
            $('.tijiao').removeAttr('disabled');

        };
        if(xing1<1){
        	$('.tijiao').attr('disabled','true');
        }
    }
    var num = 100;
    var textarea = $('#textarea');

    $('#textarea').keyup(function(){
    	console.log(this.value.length);
        if(num - this.value.length < 0){
            // alert('stop');
            this.value = this.value.substr(0,num);
        }
        // 显示剩余的字符
        $('#i1').html(num - this.value.length);
    });




</script>
</html>