<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>玖酒久</title>
    <link rel="stylesheet" type="text/css" href="/jiu/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/jiu/Public/Home/css/index.css" />
    <script type="text/javascript" src="/jiu/Public/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/jiu/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/jiu/Public/js/region_select.js"></script>
    <script type="text/javascript" src="/jiu/Public/js/tendina.js"></script>
    <script type="text/javascript">
        $.post("/jiu/Home/Index/selsession",{cx:'cart-num'},function(data){
            if(data){
                document.getElementById('cart-num').innerHTML = data;
            };
        });
    </script>
</head>
<body style="position:relative;">
<!--                这里是顶部                 -->
    <a name="top"></a>
    <div style="margin:0 auto;width:1220px;position:relative">
    <div style="position: relative; z-index: 10;display:block" class="AD">
        <a href="#"><img style="margin-left:-300px" src="/jiu/Public/Home/pic/head.jpg" width=""></a>
        <div style="border:1px solid white;color:white;font-size:16px;position:absolute;top:3px;left:1140px;cursor:pointer" onclick="closeAD()">X关闭</div>
    </div>

    <div class="" id="header-tips">
        <nav class="navbar navbar-defaultf" role="navigation" style="width:1860px;margin-left:-300px;border-bottom:1px solid gray">
        <div class="container-fluid" style="1px solid red;width:1200px;color:red">
            <div class="navbar-header">
            <?php if($_SESSION['user_logininfo'][0][user_name]): ?><a class="navbar-brand" href="#" style="color:black">欢迎<?php echo ($_SESSION['user_logininfo'][0][user_name]); ?></a>
                <ul class="nav navbar-nav">
                    <li ><a class="navbar-brand" href="<?php echo U('Home/Login/logout');?>">[注销]</a></li>
                </ul>
            <?php else: ?>
                <a href="" id="flag" style="display:none">标记</a>
                <a class="navbar-brand" href="<?php echo U('Home/Login/index');?>" stutus="0"> 登录</a>
                <a class="navbar-brand" href="<?php echo U('Home/Register/index');?>">注册</a><?php endif; ?>

                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right ">
                            <li class="nav-hide ">
                              <a href="<?php echo U('Home/Index/show');?>">返回首页</a>
                            </li>
                            <?php if($_SESSION['user_logininfo'][0][user_name]): ?><li class="dropdown">
                                    <a href="<?php echo U('Home/User/index');?>" >个人中心</a>

                                </li>
                            <?php else: ?>
                                <li class="dropdown">
                                    <a href="<?php echo U('Home/Login/index');?>" >个人中心</a>

                                </li><?php endif; ?>
                            <li><a href="#">帮助中心</a></li>
                            <li><a href="#">网站公告</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>    
        
            <script type="text/javascript" src="/jiu/Public/js/jquery.headroom.js"></script>
            <div id="header-mn-z" style="background:white;position: absolute;z-index: 9999;">              
                <div id="header-table">
                    <a href="<?php echo U('Home/Index/show');?>">
                        <div class="logo"></div>
                    </a>
                </div>
                <div class="header-adv" style="margin-left:0px"></div>
                <div id="header-search">
                    <div class="searchClass" style="position:relative">
                        <form action="<?php echo U('Home/Search/index');?>" method="post">
                            <input id="searchContent" type="text" placeholder="大宴肆方 壕礼不断 怎么买都划算！" name="content">
                            <input  style="position:absolute;width:60px;top:40px;height:30px;background-color:#A40C59;border:1px solid #A40C59;color:white" type="submit" value="搜索" >
                        </form>
                        <div class="search-tips">
                            <a href="#" target="_blank">葡萄酒</a>
                            <a href="#" target="_blank">/白酒</a>
                            <a href="#" target="_blank">/奔富</a>
                            <a href="#" target="_blank">/拉菲</a>
                            <a href="#" target="_blank">/轩尼诗</a>
                            <a href="#" target="_blank">/名庄</a>
                            <a href="#" target="_blank">/买酒送手机</a>
                            <a href="#" target="_blank">/格鲁特超值优惠</a>
                        </div>
                    </div>
                </div>


                <div  id="hd-cart" class="topCart" >
                    <a href="#">
                       <div id="cart-text" >我的购物车<span id="cart-num">0</span>件</div>
                    </a>

                    <?php if(count($_SESSION['cart']) < 1): ?><div id="cart-show" style="height:auto;" class="cart-show">
                            <span id="no-sp" style="font-size:12px;color:#A9A9A9;display:block;">购物车还没有商品，赶紧选购吧！</span>
                            <div id="sp-show"></div>
                            <center><a id="shoplink" href='/jiu/Home/Index/show'><input type="button" id='go-sp' value="去购物" style="color:white"/></a></center>
                            
                        </div>
                    <?php else: ?>
                        <div id="cart-show" style="height:auto" class="cart-show">
                            <div id="sp-show">
                                <?php if(is_array($_SESSION['cart'])): foreach($_SESSION['cart'] as $key=>$val): ?><center>
                                        <a href="/jiu/Home/Goodsdetail/index?id=<?php echo ($val[id]); ?>">
                                        <div id="id-<?php echo ($val['id']); ?>" class='gwkuang'>
                                            <img src="/jiu/Public/goodsimage/<?php echo ($val[picture]); ?>" height="50" width="50">
                                            <div class='kuangzide'><?php echo ($val['name']); ?></div>
                                            <li class='jiagelo'>￥<?php echo ($val['price']); ?>元　　x<?php echo ($val["num"]); ?></li>
                                        </div>
                                        </a>
                                    </center><?php endforeach; endif; ?>
                            </div>
                            <?php if($_SESSION['user_logininfo']): ?><center> <a href="/jiu/Home/ShopCart/index"><button id='go-pay' style="border:1px green solid;">去结算</button></a></center>
                                <?php else: ?>
                                <center> <a href="/jiu/Home/Login/index"><button id='go-pay' style="border:1px green solid;">去结算</button></a></center><?php endif; ?>
                        </div><?php endif; ?>
                </div>
            </div>
        

            <script>
                $('#header-mn-z').headroom({'hiddenTop':3200});
                
                $('#hd-cart').mouseover(function(){
                    $('#cart-show').show();
                    $(this).css({
                        'border':'none',
                        'box-shadow':'1px 2px 1px 1px lightgray',

                    });
                    $('#cart-text').css({
                        'background':"url('/jiu/Public/Home/pic/icon.png')",
                        'background-position':'10px -423px',
                        'background-repeat':'no-repeat',
                        'background-color':"#F7F7F7",
                        'color':'black',
                
                    })
                    $('#cart-num').css({
                        'color':'black',
                    })
                }).mouseout(function()
                {
                    $('#cart-show').hide();
                    $(this).css({
                        'border':'1px solid #CCCCCC',
                        'box-shadow':'none',
                    });
                     $('#cart-text').css({
                        'background':"url('/jiu/Public/Home/pic/icon.png')",
                        'background-position':'10px -47px',
                        'background-repeat':'no-repeat',
                        'background-color':"#a40c59",
                        'color':'white',
                    })
                    $('#cart-num').css({
                        'color':'white',
                    })
                });


                function closeAD(){
                    $('.AD').css('display' , 'none');
                }

                 

                //从商品详情页加入购物车
                   function addToCart(id){
                     $.post("/jiu/Home/Index/insertgoods",{gid:id,num:$('#goodsCount').val()},function(data){
                          if(data){
                            $('#no-sp').html('');
                            // $('#go-sp').remove();

                            if(data['status']==1){
                                alert('商品已添加');                
                
                                $('#id-'+id).remove();
                            }else{
                                  alert('商品已添加'); 
                                
                                  $('#cart-num').html(function(){
                                    return parseInt($('#cart-num').html())+1;
                                  });
                                  
                              
                            }

                            $('#sp-show').append(data['content']);
                            $('#go-sp').val('去结算');
                            if($('#flag')=='标记'){
                                $('#shoplink').attr("href","/jiu/Home/Login/index"); 
                            }else{
                                $('#shoplink').attr("href","/jiu/Home/ShopCart/index"); 
                            }
                            
                            
                        }
                    });
                    }
            </script>
        
        <div style="position:relative;height:50px;">
            <div style="float:left;margin-top:15px;"><img src="/jiu/Public/Home/pic/2016-12-19_194742.png" alt=""></div>
            <div class="news-icon" style="float:left;margin-top:15px;margin-left: 10px;">玖酒资讯:</div>
                
            <div class="apple" style="width:500px;height:20px;overflow:hidden;margin-top:10px;position:absolute;top:5px;left:90px">
                <ul>
                    <?php echo W('Cate/info');?>
                </ul>
            </div>
            <?php if(empty($result)): else: ?>

                <div style="width:550px;height:60px;margin-top:50px;position:absolute;top:-50px;left:700px;">
                    <ul style="text-align:center;margin-top:10px">
                        <li style="float:left;color:red;font-size:16px"> &nbsp;<?php echo ($result['result']['city']); ?>&nbsp; </li>
                        <li style="float:left;color:blue;font-size:16px"> &nbsp;<?php echo ($result['result']['weather']); ?>&nbsp; </li>
                        <li style="float:left;color:red;font-size:16px"> &nbsp;<?php echo ($result['result']['temp']); ?>&#8451;&nbsp; </li>
                        <li style="float:left;color:blue;font-size:16px"> &nbsp;<?php echo ($result['result']['date']); ?>&nbsp; </li>
                        <li style="float:left;color:blue;font-size:16px"> &nbsp;<?php echo ($result['result']['week']); ?>&nbsp; </li>
                        <li style="float:left;color:blue;font-size:16px;position:absolute;top:-10px;left:270px"> <img src="/jiu/Public/weathercn/<?php echo ($result['result']['img']); ?>.png" width="50" height="50" alt="">&nbsp; </li>
                        <li>
                            <div style="position:absolute;left:340px;" >
                                <form action="<?php echo U('Home/Index/show');?>" method="post">
                                    <div class="control-group">
                                        <div class="controls">
                                            <select name="location_p" id="location_p" style="width:60px">
                                            </select>
                                            <select name="location_c" id="location_c" style="position:absolute;top:0px;left:60px;width:60px">
                                            </select>
                                            <script src="/jiu/Public/js/region_select.js"></script>
                                            <script type="text/javascript">
                                                new PCAS('location_p', 'location_c', '广东', '广州');
                                            </script>
                                        </div>
                                    </div>
                                    <input type="submit" style="position:absolute;border:none;top:0px;left:120px" value="查询">
                                </form>
                           </div>
                       </li>
                    </ul>                    
                </div><?php endif; ?>

        </div>
        <hr>
        
        
        
<link rel="stylesheet" type="text/css" href="/jiu/Public/Home/css/main.css" />
<link type="text/css" rel="stylesheet" href="/jiu/Public/css/show.css">

	<!-- 		轮播图					 -->
	<!-- 导航+轮播图 -->
 	<div class="container">
 		<!-- 横导航栏开始 -->
 		<div class="topnavall">
 			<div class="topnavall1">
 				全部商品
 			</div>
 			<div>
 				<ul class="topnavall2">

 					<li><a href="">首页</a></li>
 					<li><a href="">名庄臻选</a></li>
 					<li><a href="">限时闪购</a></li>
 					<li><a href="">玖玖美酒</a></li>
 					<li><a href="">乐享生态</a></li>
 					<li><a href="">超级伙伴</a></li>
 					<li><a href="">RVF评分</a></li>
 				</ul>
 			</div>

			<!-- 左侧导航 start -->
			<div style="width:1000px;height:402px;overflow:hidden">

			    <div class="cate-nav1" >

			        <ul class="cate-nav-ul1">
						<?php if(is_array($cate_list)): foreach($cate_list as $key1=>$val1): if($val1[pid] == 1): ?><li class="cate-nav-li1">
			                <a class="cate-link1"><?php echo ($val1["name"]); ?></a>

			                <div class="cate-hidden-two1">
			                	<div style="width:345px">
								<?php if(is_array($cate_list)): foreach($cate_list as $key2=>$val2): if($val1[id] == $val2[pid]): ?><p class="cate-p1"><?php echo ($val2["name"]); ?></p>
				                    <div class="cate-hidden-three1">

			                            <?php if(is_array($cate_list)): foreach($cate_list as $key3=>$val3): if($val2[id] == $val3[pid]): ?><a href="<?php echo U('Home/Search/index',array(id=>$val3['id']));?>" id="catethree"><?php echo ($val3["name"]); ?></a><?php endif; endforeach; endif; ?>
				                    </div><?php endif; endforeach; endif; ?>
								</div>
								<div class="zhanshi"><img src="/jiu/Public/goodsimage/123.png" alt=""></div>
			                </div>
			            </li><?php endif; endforeach; endif; ?>
			        </ul>
			    </div>
			</div>
		    <!-- 左侧导航 end -->
		
		</div>
		<!-- 横导航栏结束 -->

		<!-- 轮播图 -->
		<div class="out">
			<ul style="margin-left:-550px;" class="img">
				<?php if(is_array($list)): foreach($list as $key=>$val): ?><li><a href=""><img src="/jiu/Public/carouselimage/<?php echo ($val["cal_image"]); ?>" alt=""></a></li><?php endforeach; endif; ?>
	        </ul>
	        <ul class="num">
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5</li>
			</ul>
			<input class="left btn" type="button" value="<">
			<input class="right btn" type="button" value=">">
		</div>
	</div>
	<!-- 导航+轮播图结束 -->



	<!-- 	今日热卖					 -->
	<!--  		这里是1楼     -->
	<a name="F1"></a>
	<div class="todayHot" style="height: 100px; ">
		<div class="todayHot-1"><img src="/jiu/Public/Home/pic/2016-12-19_201321.png" alt=""></div>
		<div class="todayHot-2"> 今日闪购</div>
		<div class="todayHot-3">10点开抢 限时低价 限量特惠<span ><a href="#" style="color:#CF1111;text-decoration: none;"> 更多低价商品闪购 >></a> </span></div>
	</div>
	
	<div class="big_Box" style="width:1206px;height:280px;border:1px solid white">
		<?php if(is_array($todayHot)): foreach($todayHot as $key=>$val): ?><ul onmouseout="small_boss(this,<?php echo ($val["id"]); ?>)" onmouseover="Big_boss(this,<?php echo ($val["id"]); ?>)" style="float:left;width:200px;height:280px;text-align:center;position:relative;border:1px solid gray"><a href="<?php echo U('Home/Goodsdetail/index',array(id => $val['id']));?>" >
			<li class='sp-picture'><img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width='195' height='195' alt=""></li>
			<li style="margin-top:10px"><?php echo ($val["name"]); ?></li>
			<li style="margin-top:10px;color:red;font-size:20px">￥ <?php echo ($val["price"]); ?></li></a>
			<li><button onclick="addToCart(<?php echo ($val["id"]); ?>)" class="shop_car" id="shop_car<?php echo ($val["id"]); ?>" style="width:197px;padding:10px;background-color:#a40c59;position:absolute;top:238px;left:0px;display:none;border:none;color:white;">加入购物车</button></li>
		</ul><?php endforeach; endif; ?>
	</div>


	




	<!-- 				乐享盛宴					 -->
	<!-- 			这里是二楼							 -->
	<a name="F2"></a>
	<div class="todayHot" style="height:50px">
		<div class="todayHot-1"><img src="/jiu/Public/Home/pic/2016-12-20_111353.png" alt=""></div>
		<div class="todayHot-2" style="margin:30px auto;font-family:黑体;"> 乐享盛宴</div>

	</div>

	<div class='tabs'>
		<ul class="menu">
			<li class="on">今日特惠</li>
		    <li>人气爆棚</li>
		    <li>好礼佳品</li>
		    <li>流连忘返</li>
		    <li>闲情小酌</li>
		</ul>
		<div class="main">
	        <div class="tab" style="display:block;">
				<div class="big-img"><img src="/jiu/Public/goodsimage/1481683027168305.png" alt=""></div>
				<?php if(is_array($lexiang)): foreach($lexiang as $key=>$val): ?><div onmouseout="small_boss(this,<?php echo ($val["id"]); ?>)" onmouseover="Big_boss(this,<?php echo ($val["id"]); ?>)" style="width:360px;height:210px;border-top:none;border:1px solid gray;float: left;position:relative"><a href="<?php echo U('Home/Goodsdetail/index',array(id => $val['id']));?>">
						<div class='sp-picture' style="width:200px;height:209px;float:left"><img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="198" height="206px" alt=""></div>
						<div style="width:157px;float:left;margin-top:85px;text-align:center;font-size:2px;color:black;font-family:微软雅黑"><?php echo ($val["name"]); ?></div>
						<div style="width:157px;float:left;color:red;text-align:center;margin-top:10px;font-size:20px">￥ <?php echo ($val["price"]); ?></div></a>
						<button onclick="addToCart(<?php echo ($val["id"]); ?>)" class="shop_car" id="shop_car<?php echo ($val["id"]); ?>" style="width:157px;padding:10px;background-color:#a40c59;position:absolute;top:166px;left:200px;display:none;border:none;color:white;">加入购物车</button>
					</div><?php endforeach; endif; ?>
	        </div>
	        <div class="tab" >
				<div class="big-img"><img src="/jiu/Public/goodsimage/1482142259714561.png" alt=""></div>
				<?php if(is_array($renqi)): foreach($renqi as $key=>$val): ?><div onmouseout="small_boss(this,<?php echo ($val["id"]); ?>)" onmouseover="Big_boss(this,<?php echo ($val["id"]); ?>)" style="width:360px;height:210px;border-top:none;border:1px solid gray;float: left;position:relative"><a href="<?php echo U('Home/Goodsdetail/index',array(id => $val['id']));?>">
						<div style="width:200px;height:208px;float:left"><img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="198" height="206px" alt=""></div>
						<div style="width:157px;float:left;margin-top:85px;text-align:center;font-size:2px;color:black;font-family:微软雅黑"><?php echo ($val["name"]); ?></div>
						<div style="width:157px;float:left;color:red;text-align:center;margin-top:10px;font-size:20px">￥ <?php echo ($val["price"]); ?></div>
					</a>
					<button onclick="addToCart(<?php echo ($val["id"]); ?>)" class="shop_car" id="shop_car<?php echo ($val["id"]); ?>" style="width:157px;padding:10px;background-color:#a40c59;position:absolute;top:166px;left:200px;display:none;border:none;border:none;color:white;">加入购物车</button>
					</div><?php endforeach; endif; ?>
	        </div>
	        <div class="tab" >
				<div class="big-img"><img src="/jiu/Public/goodsimage/1481683097072118.png" alt=""></div>
				<?php if(is_array($haoli)): foreach($haoli as $key=>$val): ?><div onmouseout="small_boss(this,<?php echo ($val["id"]); ?>)" onmouseover="Big_boss(this,<?php echo ($val["id"]); ?>)" style="width:360px;height:210px;border-top:none;border:1px solid gray;float: left;position:relative"><a href="<?php echo U('Home/Goodsdetail/index',array(id => $val['id']));?>">
						<div style="width:200px;height:208px;float:left"><img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="198" height="206px" alt=""></div>
						<div style="width:157px;float:left;margin-top:85px;text-align:center;font-size:2px;color:black;font-family:微软雅黑"><?php echo ($val["name"]); ?></div>
						<div style="width:157px;float:left;color:red;text-align:center;margin-top:10px;font-size:20px">￥ <?php echo ($val["price"]); ?></div>
					</a>
					<button onclick="addToCart(<?php echo ($val["id"]); ?>)" class="shop_car" id="shop_car<?php echo ($val["id"]); ?>" style="width:157px;padding:10px;background-color:#a40c59;position:absolute;top:166px;left:200px;display:none;border:none;color:white;">加入购物车</button>
					</div><?php endforeach; endif; ?>
	        </div>
	        <div class="tab" >
				<div class="big-img"><img src="/jiu/Public/goodsimage/1479260955739647.png" alt=""></div>
				<?php if(is_array($liulian)): foreach($liulian as $key=>$val): ?><div onmouseout="small_boss(this,<?php echo ($val["id"]); ?>)" onmouseover="Big_boss(this,<?php echo ($val["id"]); ?>)" style="width:360px;height:210px;border-top:none;border:1px solid gray;float: left;position:relative"><a href="<?php echo U('Home/Goodsdetail/index',array(id => $val['id']));?>">
						<div style="width:200px;height:208px;float:left"><img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="198" height="206px" alt=""></div>
						<div style="width:157px;float:left;margin-top:85px;text-align:center;font-size:2px;color:black;font-family:微软雅黑;overflow:hidden"><?php echo ($val["name"]); ?></div>
						<div style="width:157px;float:left;color:red;text-align:center;margin-top:10px;font-size:20px">￥ <?php echo ($val["price"]); ?></div>
					</a>
					<button onclick="addToCart(<?php echo ($val["id"]); ?>)" class="shop_car" id="shop_car<?php echo ($val["id"]); ?>" style="width:157px;padding:10px;background-color:#a40c59;position:absolute;top:166px;left:200px;display:none;border:none;color:white">加入购物车</button>
					</div><?php endforeach; endif; ?>
	        </div>
	        <div class="tab" >
				<div class="big-img"><img src="/jiu/Public/goodsimage/1481770360752948.png" alt=""></div>
				<?php if(is_array($xianqing)): foreach($xianqing as $key=>$val): ?><div onmouseout="small_boss(this,<?php echo ($val["id"]); ?>)" onmouseover="Big_boss(this,<?php echo ($val["id"]); ?>)" style="width:360px;height:210px;border-top:none;border:1px solid gray;float: left;position:relative"><a href="<?php echo U('Home/Goodsdetail/index',array(id => $val['id']));?>">
						<div style="width:200px;height:208px;float:left"><img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="198" height="206px" alt=""></div>
						<div style="width:157px;float:left;margin-top:85px;text-align:center;font-size:2px;color:black;font-family:微软雅黑"><?php echo ($val["name"]); ?></div>
						<div style="width:157px;float:left;color:red;text-align:center;margin-top:10px;font-size:20px">￥ <?php echo ($val["price"]); ?></div>
					</a>
					<button onclick="addToCart(<?php echo ($val["id"]); ?>)" class="shop_car" id="shop_car<?php echo ($val["id"]); ?>" style="width:157px;padding:10px;background-color:#a40c59;position:absolute;top:166px;left:200px;display:none;border:none;color:white;">加入购物车</button>
					</div><?php endforeach; endif; ?>
	        </div>
	    </div>
	</div><br>


	<!-- 				热销推荐						 -->

	<div class="todayHot">
		<div class="todayHot-1"><img src="/jiu/Public/Home/pic/2016-12-20_165722.png" alt=""></div>
		<div class="todayHot-2" style="margin-top:25px;font-family:黑体"> 热销推荐</div>

	</div>
	<div style="clear:both"></div><br>

	<div style="float:left;border:1px solid gray">
		<img src="/jiu/Public/goodsimage/1481684142012371.png" alt="">
	</div>
	<div style="float:left;border:1px solid gray">
		<img src="/jiu/Public/goodsimage/1480390238790862.png" alt="">
	</div>

	<div style="float:left;border:1px solid gray">
		<img src="/jiu/Public/goodsimage/1481684605926234.png" alt="">
	</div>

	<div style="float:left;border:1px solid gray">
		<img src="/jiu/Public/goodsimage/1478512099064785.png" alt="">
	</div>
	<div style="clear:both"></div><br>
	<br>

	<!-- 			商品分类----葡萄酒								 -->
	<!-- 这里是3楼 -->
	<a name="F3"></a>

	<div style="font-size:20px;font-family:黑体">红葡萄酒</div><hr>

	<div class="public-box">

		<div class="left-box"><img src="/jiu/Public/goodsimage/1481694604908169.png" alt=""></div>
		<div class="center-box">
			<?php if(is_array($putao)): foreach($putao as $key=>$val): ?><div onmouseout="small_boss(this,<?php echo ($val["id"]); ?>)" onmouseover="Big_boss(this,<?php echo ($val["id"]); ?>)" style="width:189px;height:230px;border:1px solid gray;float: left;overflow: hidden;position:relative">
				<div><a href="<?php echo U('Home/Goodsdetail/index',array(id => $val['id']));?>">
					<img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="188" height="179px" alt="">
				</div>
				<div style="text-align:center;font-size:5px;margin-top:6px;font-family:微软雅黑"><?php echo ($val["name"]); ?></div></a>
				<div style="text-align:center;font-size:20px;margin-top:2px;color:red">￥ <?php echo ($val["price"]); ?></div>
				<button onclick="addToCart(<?php echo ($val["id"]); ?>)" class="shop_car" id="shop_car<?php echo ($val["id"]); ?>" style="width:187px;background-color:#a40c59;padding:10px;position:absolute;top:189px;left:0px;display:none;border:none;color:white">加入购物车</button>
			</div><?php endforeach; endif; ?>
		</div>
		<div class="left-box"><img src="/jiu/Public/goodsimage/1481695235727838.png" alt=""></div>

		<div class="zhezhao"><a href="#"><img src="/jiu/Public/goodsimage/1481695334589614.jpg" alt=""></a></div>
	</div><br><br>


	<!-- 			白酒						 -->
	<!-- 			这里是4楼			 -->
	<a name="F4"></a>

	<div style="font-size:20px;font-family:黑体">白酒</div><hr>

	<div class="public-box">

		<div class="left-box"><img src="/jiu/Public/goodsimage/1481695224255200.png" alt=""></div>
		<div class="center-box">
			<?php if(is_array($baijiu)): foreach($baijiu as $key=>$val): ?><div onmouseout="small_boss(this,<?php echo ($val["id"]); ?>)" onmouseover="Big_boss(this,<?php echo ($val["id"]); ?>)" style="width:189px;height:230px;border:1px solid gray;float: left;overflow: hidden;position:relative">
				<div><a href="<?php echo U('Home/Goodsdetail/index',array(id => $val['id']));?>">
					<img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="188" height="179px" alt="">
				</div>
				<div style="text-align:center;font-size:5px;margin-top:6px;font-family:微软雅黑"><?php echo ($val["name"]); ?></div></a>
				<div style="text-align:center;font-size:20px;margin-top:2px;color:red">￥ <?php echo ($val["price"]); ?></div>
				<button onclick="addToCart(<?php echo ($val["id"]); ?>)" class="shop_car" id="shop_car<?php echo ($val["id"]); ?>" style="width:187px;background-color:#a40c59;padding:10px;position:absolute;top:189px;left:0px;display:none;border:none;color:white">加入购物车</button>
			</div><?php endforeach; endif; ?>
		</div>
		<div class="left-box"><img src="/jiu/Public/goodsimage/1482117014222541.png" alt=""></div>

		<div class="zhezhao"><a href="#"><img src="/jiu/Public/goodsimage/1481695393652826.jpg" alt=""></a></div>
	</div><br>


	<!-- 			商品分类----白葡萄酒								 -->
	<!-- 			这里是5楼		 -->
	<a name="F5"></a>
	<div style="font-size:20px;font-family:黑体">白葡萄酒</div><hr>

	<div class="public-box">

		<div class="left-box"><img src="/jiu/Public/goodsimage/1481695235727838.png" alt=""></div>
		<div class="center-box" >
			<?php if(is_array($baiputao)): foreach($baiputao as $key=>$val): ?><div onmouseout="small_boss(this,<?php echo ($val["id"]); ?>)" onmouseover="Big_boss(this,<?php echo ($val["id"]); ?>)" style="width:189px;height:230px;border:1px solid gray;float: left;overflow: hidden;position:relative;">
				<div><a href="<?php echo U('Home/Goodsdetail/index',array(id => $val['id']));?>">
					<img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="188" height="179px" alt="">
				</div>
				<div style="text-align:center;font-size:5px;margin-top:6px;font-family:微软雅黑"><?php echo ($val["name"]); ?></div></a>
				<div style="text-align:center;font-size:20px;margin-top:2px;color:red">￥ <?php echo ($val["price"]); ?></div>
				<button onclick="addToCart(<?php echo ($val["id"]); ?>)" class="shop_car" id="shop_car<?php echo ($val["id"]); ?>" style="width:185px;background-color:#a40c59;padding:10px;position:absolute;top:189px;left:0px;display:none;border:none;color:white">加入购物车</button>
			</div><?php endforeach; endif; ?>
		</div>
		<div class="left-box"><img src="/jiu/Public/goodsimage/1481694604908169.png" alt=""></div>

		<div class="zhezhao"><a href="#"><img src="/jiu/Public/goodsimage/1481695794856413.jpg" alt=""></a></div>
	</div><br><br><br><hr>
<!--            这里是楼层展示                     -->
	<div style="display:none;position:absolute;top:300px;left:-60px" class="top3">

		<div style="border:2px solid gray;padding:12px"><a href="#F1" style="text-decoration:none" title="1楼">F1</a></div>
		<div style="border:2px solid gray;padding:12px"><a href="#F2" style="text-decoration:none" title="2楼">F2</a></div>
		<div style="border:2px solid gray;padding:12px"><a href="#F3" style="text-decoration:none" title="3楼">F3</a></div>
		<div style="border:2px solid gray;padding:12px"><a href="#F4" style="text-decoration:none" title="4楼">F4</a></div>
		<div style="border:2px solid gray;padding:12px"><a href="#F5" style="text-decoration:none" title="5楼">F5</a></div>
	</div>

<script src="/jiu/Public/js/jquery.scrollpic.js" type="text/javascript"></script>
<script src="/jiu/Public/js/TabSwitch.js" type="text/javascript"></script>
<script>

  function views($id){
    alert(123);
    $.get("<?php echo U('Home/Goodsdetail/views');?>" , {'id' : $id} , function(data){
        alert(data);

    });
  }
	$(document).ready(function(){
    $('.tabs').myTab({
        operate:'mouseover',
        time:2000,
        auto:true,
        delayTime: 0
    })
});
//
$(function(){
  $('.bannerFocus01').hhScrollpic({
 			scrollPicMth:2,  //每页显示个数
			defaultSpeed : 1000,   //默认滚动时间  点击按钮滚动时间
			speed : 2000   //自动播放滚动时间

 	});

  	$('.bannerFocus02').hhScrollpic({
 			scrollPicMth:6,  //每页显示个数
			defaultSpeed : 1000,   //默认滚动时间  点击按钮滚动时间
			speed : 2000   //自动播放滚动时间
 	});

});


	$(window).scroll(function(){

		var st = document.body.scrollTop;
		if(st > 500){
			$('.top2').css('display' , 'block' );
			$('.top3').css('display' , 'block' );
			$('.top2').css('top' ,st + 520    +  'px' );
			$('.top3').css('top' ,st + 200    +  'px' );
			console.log($('.top2').css('top'));
		}else{
			$('.top2').css('display' , 'none' );
			$('.top3').css('display' , 'none' );
		}

	});

	 	//手动控制轮播图
	$(".img li").eq(0).fadeIn(300);//加载页面的时候让第一个图片显示
	$(".num li").eq(0).addClass("active");//给序号为1的加上红色背景
	$(".num li").mouseover(function () {
		//当前的数字显示红色背景,其他的数字都隐藏背景
		$(this).addClass("active").siblings().removeClass("active");
		//当前数字对应的图片显示,其他图片都隐藏
		var index = $(this).index();
		$(".img li").eq(index).stop().fadeIn(300).siblings().stop().fadeOut(300);
	})
	//实现自动轮播
	var i = 0;//计时器控制数字
	var t = setInterval(move,3000);
	//该方法显示与序号对应的图片
	function move() {
		if (++i ==5){
			i = 0;
		}
		$(".num li").eq(i).addClass("active").siblings().removeClass("active");
		$(".img li").eq(i).stop().fadeIn(300).siblings().stop().fadeOut(300);
	}
	//鼠标移入后停止自动轮播
	$(".out").hover(function () {
		clearInterval(t);
	}, function () {
		t = setInterval(move,3000);
	});
	//按钮移动事件
	$(".right").click(function () {
		move();
	});
	$(".left").click(function () {
		i = i-2;
		move();
	});


	function Big_boss(obj,$id){
		console.log($id + 'shop_car' + 'over');
		clearInterval()
		$('#shop_car' + $id).css('display' , 'block')

	}
	function small_boss(obj,$id){
		console.log($id + 'shop_car' + 'out');

		$('#shop_car' + $id).css('display' , 'none');

	}

	
</script>


        

            <div id="footer">
            <link rel="stylesheet" type="text/css" href="/jiu/Public/Home/css/footer.css" />
      <!-- 最外部的一个边框 -->
            <div id="ww">
                <center>
                <div id="wb">

                    <div id="wb1">
                        <dt></dt>
                        <dd><b>甄选全球葡萄酒</b></dd>
                    </div>

                    <div id="wb2">
                        <dt class="s2"></dt>
                        <dd><b>社区智能化终端触达</b></dd>
                    </div>

                    <div id="wb3">
                        <dt class="s3"></dt>
                        <dd><b>原产地高品质享受</b></dd>
                    </div>

                    <div id="wb4">
                        <dt class="s4"></dt>
                        <dd><b>新葡萄酒品位生活</b></dd>
                    </div>

                </div>
                </center>
            <!-- 一条完美的分割线 -->
                <hr style="height:1px; width:100%; border:none;border-top:1px dashed #0066CC;" />
            <!--                这里是回到顶部和意见反馈               -->
                <a href="#top" title="点我返回顶部" style="display:none;position:absolute;top:500px;right:-40px;" class="top2"><img src="/jiu/Public/Home/pic/2016-12-20_221717.png" height="100px" alt=""></a>

                <?php if($_SESSION['user_logininfo']): ?><a href="<?php echo U('Home/User/index');?>" title="意见反馈" style="display:none;position:absolute;top:700px;right:-40px" class="message"><div style="margin-top:10px;border:1px solid red;width:37px;height:37px;text-align:center;border-radius:50%;font-size:9px;background:red;color:white">意见反馈</div></a>
                <?php else: ?>
                    <a href="<?php echo U('Home/Login/index');?>" title="意见反馈" style="display:none;position:absolute;top:700px;right:-40px" class="message"><div style="margin-top:10px;border:1px solid red;width:37px;height:37px;text-align:center;border-radius:50%;font-size:9px;background:red;color:white">意见反馈</div></a><?php endif; ?>
                <!-- 尾部的中间一部 -->
                <center>
                    <div id="zwb">

                        <div id="zwb1">
                            <ul>
                                <b><a href="#">关于我们</a></b>
                                <br>
                                <li><a href="#">公司简介</a></li>
                                <li><a href="#">网酒基地</a></li>
                                <li><a href="#">媒体报道</a></li>
                            </ul>
                        </div>

                        <div id="zwb2">
                            <ul>
                                <b><a href="#">新手指南</a></b>
                                <br>
                                <li><a href="#">新用户注册</a></li>
                                <li><a href="#">购买流程</a></li>
                            </ul>
                        </div>

                        <div id="zwb3">
                            <ul>
                                <b><a href="#">配送服务</a></b>
                                <br>
                                <li><a href="#">配送范围及时限</a></li>
                                <li><a href="#">配送运费(满99元免邮)</a></li>
                                <li><a href="#">运输包装说明</a></li>
                                <li><a href="#">发票制度</a></li>
                            </ul>
                        </div>

                        <div id="zwb4">
                            <ul>
                                <b><a href="#">支付方式</a></b>
                                <br>
                                <li><a href="#">货到付款</a></li>
                                <li><a href="#">在线支付</a></li>
                                <li><a href="#">优惠卷</a></li>
                                <li><a href="#">礼品卡/购物卡</a></li>
                                <li><a href="#">账户余额</a></li>
                            </ul>
                        </div>

                        <div id="zwb5">
                            <ul>
                                <b><a href="#">售后服务</a></b>
                                <br>
                                <li><a href="#">退换货流程</a></li>
                                <li><a href="#">退款说明</a></li>
                                <li><a href="#">正品保障</a></li>
                                <li><a href="#">投诉建议</a></li>
                            </ul>
                        </div>

                        <div id="zwb6">
                            <b><a href="#">商家入驻</a></b>
                                <?php echo W('Cate/menu');?>
                        </div>
                            <!-- 微博 -->
                        <div id="weibo">
                            <dt><img src="/jiu/Public/Home/pic/weibo.png"></dt>
                            <li>微博</li>
                        </div>
                            <!-- 微信 -->
                        <div id="weixin">
                            <dt><img src="/jiu/Public/Home/pic/weibo.png"></dt>
                            <li>微信</li>
                        </div>

                    </div>
                </center>
            <!-- 中间部分结束 -->
            <!-- 最后部分的开始 -->

                <div id="jieshu">
                    <center>
                        <div id="jieshu1">
                            <dt><a href="">友情链接|</a></dt>
                            <dt><a href="">联系我们|</a></dt>
                            <dt><a href="">隐私声明|</a></dt>
                            <dt><a href="">媒体报道|</a></dt>
                            <dt><a href="">消费者保护|</a></dt>
                            <dt><a href="">真伪辨别</a></dt>
                            <dt><li>食品流通许可证：SP1101081110120639 营业执照：9111010858442448XQ 公司地址：广州兄弟连PHP22期 </li></dt>
                            <dt><li>广州兄弟连PHP22期 · 粤ICP备16030607号-1 本网站中消费指南、售后服务、用户反馈及法定公示等内容并非广告 </li></dt>
                        </div>
                        <div id="jieshu2">
                            <dd>
                                全国售后服务热线 : 4000-519-519
                                <br>
                                周一至周日：9：00-20：00
                            </dd>
                        </div>
                    </center>
                </div>
            </div>
        
    <!-- 尾部 end -->
    </div>        
</body>
</html>



<script type="text/javascript">
      function autoScroll(obj){
            $(obj).find("ul").animate({
                marginTop : "-16px"
            },500,function(){
                $(this).css({marginTop : "0px"}).find("li:first").appendTo(this);
            })
        }
        $(function(){
            setInterval('autoScroll(".maquee")',3000);
            setInterval('autoScroll(".apple")',3000);

        }) ;
        $(window).scroll(function(){

        var st = document.body.scrollTop;
        if(st > 500){
            $('.top2').css('display' , 'block' );
            $('.message').css('display' , 'block' );

            $('.top2').css('top' ,st + 480    +  'px' );
            $('.message').css('top' ,st + 580    +  'px' );

            // console.log($('.top2').css('top'));
        }else{
            $('.top2').css('display' , 'none' );
            $('.message').css('display' , 'none' );

        }

    });

</script>