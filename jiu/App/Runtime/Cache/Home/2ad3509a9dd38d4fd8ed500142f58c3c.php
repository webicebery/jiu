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
        
        
        
<!-- 放大镜的js和css引入 -->

<link href="/jiu/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/jiu/Public/Home/css/goodsdetail.css" rel="stylesheet" type="text/css" />
<script src="/jiu/Public/Home/js/jquery-1.9.1.min.js"></script>
<script src="/jiu/Public/Home/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="/jiu/Public/Home/css/main.css" />
<link rel="stylesheet" type="text/css" href="/jiu/Public/Home/css/left.css" />
<link type="text/css" rel="stylesheet" href="/jiu/Public/css/show.css">

    <style>
      .prea_tu{
        width:30px;
        height:30px;
        float:left;
        /*border:1px solid red;*/
         cursor:pointer;
        background-image:url("/jiu/Public/Home/images/d_e.jpg");
      }
      .wai-1{
                  width:30px;
                  height:25px;
                  /*border:1px solid red;*/
                  float: left;
                   background-image:url("/jiu/Public/Home/images/d_i.jpg");
                }

    </style>

    <!-- 主体部分开始 -->

    <!--   开始遍历   -->
    <?php if(empty($data)): ?><center><h1 style="height:500px"> 暂无详情 </h1></center>
    <?php else: ?>
    <?php if(is_array($data)): foreach($data as $key=>$val): ?><div id="left_o">
    <!-- 主体的左边 -->
       <a name="top"></a>    
          <div id="o_left">

            <div class="subNav">
              <a href="#">首页</a> <span>&gt;</span>
              
              <span>&gt;</span> <a class="curName" style="color:red;">
                  <?php echo ($val["name"]); ?></a>
            </div>
            <div id="showbox">
              <!--         商品图          -->
              <img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="300" height="300" />
            </div>
          <!--展示图片盒子-->
            <div class="spec-scroll">
              <div id="showsum"></div><!--展示图片里边-->
                  <p class="showpage"  style="width:435px; z-index:10;">
                  <a href="javascript:void(0);" id="showlast"> < </a>
                  <a href="javascript:void(0);" id="shownext"> > </a>
                  </p>
            </div>
          </div>
    </div>
    <!-- 主体的右边 -->
    <div id="o_right" style="">
    <form action="#" id="form" method="post">
        <div class="right1">
                <b><?php echo ($val["name"]); ?></b>
        </div>
        <div class="right2">
                <dt class="li-right1">玖酒价 : </dt>
                <dt class="li-right3">￥</dt>
                <dt class="li-right2"><?php echo ($val["price"]); ?></dt>
                <div id="wai-right">
                    <dt class="wai-1"></dt>
                    <a href="#pinlun"><p class="wai-2">(<?php echo ($count); ?>)条评论</p></a>
                </div>
        </div>
        <div class="right3">
                  <p class="part_clear1" style="font-size:16px;font-family:微软雅黑">促&nbsp;&nbsp;销 : </p>
                  <dt class="part_clear2"><p style="text-align:center;   font-size:20px; color: white;">加价购</p></dt>
                  <p class="part_clear3" style="font-size:10px;font-family:微软雅黑">加价购活动商品满1元即可换购1件商品</p>
        </div>
        <div class="right4">
                  <p class="part_line1">商品描述 : </p>
                  <p class="part_line2"><?php echo ($val["describe"]); ?> </p>
        </div>
        <div class="right5">
                <ul><p class="part_cun1" style="font-size:16px;font-family:微软雅黑">浏览量:</p> <p class="part_cun2"><?php echo ($val["views"]); ?></p></ul>
               <ul><p class="part_cun3" style="font-size:16px;font-family:微软雅黑">购买量:</p> <p class="part_cun4"><?php echo ($val["buy"]); ?></p></ul>
        </div>
        <div class="right6">
                  <ul><b class="part_L1" style="font-size:16px;font-family:微软雅黑">库&nbsp;&nbsp;&nbsp;存:</b> <b class="part_L2"><?php echo ($val["store"]); ?></b></ul>
                 
                 <ul><b class="part_L3" style="font-size:16px;font-family:微软雅黑">状&nbsp;&nbsp;&nbsp;态:</b> <b class="part_L4"><?php echo ($val["display"]); ?></b></ul>
        </div>
        <hr width=100%>
        <div class="right7">
          <div class="part_jie" style="position:relative;z-index:20;">
                <input type="text" readonly style="width:40px; height:40px;text-align:center;float:left;z-index:-1;" id='goodsCount'  name="num" value="1">
              
                  <div id="jie_num1">
                  <a href="javascript:;" style="margin-left:5px;" class="glyphicon glyphicon-plus control-label" onclick="num('add')"></a>
                  </div>
                  <div id="jie_num2">
                  <a href="javascript:;"  style="margin-left:4px;" class="glyphicon glyphicon-minus control-label" onclick="num('minus')"></a>
                 </div>
                <?php if(($val[display] == '在售') AND ($val[store] > 0)): ?><a onclick="addToCart(<?php echo ($val["id"]); ?>)"><dt class="prea_gou"><p class="prea_tu"></p >加入购物车</dt></a>
                <?php else: ?>
                  <dt class="prea_gou"><p class="prea_tu"></p >已售罄</dt><?php endif; ?>
          </div>
        </div>
      </form>
    </div>
      <!-- 主体的结束 -->
    </div><br><br><hr>
        
    <br>
    <!-- 评论区 -->
    <div style="clear:both;"></div>
    <div class="buju" style="height:3250px;">
    <!-- 左边商品推荐 -->
      <div class="buju_left">
            
            <div class="buju_left1">
                <div class="left_s">买过此商品的人还买过</div>

                <?php if(is_array($res)): foreach($res as $key=>$val): ?><a href="Home/goodsdetail/index?id=<?php echo ($val[id]); ?>">
                <div class="left_s1">
                      <dt class="left_zt1"><img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="70" height="80" /></dt>
                      <dt class="left_zm1"><?php echo ($val['name']); ?></dt>
                      <dt class="left_zj1">$<?php echo ($val['price']); ?></dt>
                </div>
                </a><?php endforeach; endif; ?>
            </div>
            <!--                            上面                              -->
            <div class="buju_left2">
                <div class="left_x">看过此商品的人还看过</div>
                <?php if(is_array($ad)): foreach($ad as $key=>$val): ?><a href="Home/goodsdetail/index?id=<?php echo ($val[id]); ?>">
                <div class="left_x1">
                      <dt class="left_xt1"><img src="/jiu/Public/goodsimage/<?php echo ($val["picture"]); ?>" width="70" height="80" /></dt>
                      <dt class="left_xm1"><?php echo ($val['name']); ?></dt>
                      <dt class="left_xj1">$<?php echo ($val['price']); ?></dt>
                </div>
                </a><?php endforeach; endif; ?>
            </div>
      </div>
    <div style="color:red;width:950px;height:40px;margin-left:249px;background-color:#EFEFEF">
        <dt style="float:left;width:100px;height:40px;text-align:center;font-size:20px;background-color:#A40C59;color: white;padding:5px 0;cursor:pointer;"><a href="#xiangqin" style="color:white;">商品详情</a></dt>
        <dt style="float:left;width:100px;height:40px;text-align:center;font-size:19px; background-color: #A40C59; padding:5px 0;">
        <a href="#pinlun" style="color:white;">商品评论</a></dt>
        <dt style="float:left;width:100px;height:40px;text-align:center;font-size:19px; background-color: #A40C59; padding:5px 0;">
        <a href="#fuwu" style="color:white;">服务保障</a></dt>
    </div>
    <a name="xiangqin"></a>
    <div style=" width:950px;height:1800px;margin-left:249px;">
            <img src="/jiu/Public/goodsimage/<?php echo ($data[0][not_icon]); ?>" style="width:900px;height:1790px;">
    </div>

    <!--    商品评论展示   -->

    <a name="pinlun"></a>
    <div class="goodscomment" style="height:600px;margin-top:20px;">

      <div style="background:#EFEFEF">
        <div class="commentbtn">商品评价</div>
        
      </div>
      <div>
        <p style="margin-left:30px;margin-top:20px;height:30px;line-height:30px;font-size:20px">全部评论(<?php echo ($count); ?>)</p>
        <hr>
        <!-- 遍历 -->
        <?php if(empty($list)): ?><center><h1 style="height:400px"> 暂无评价 </h1></center>
        <?php else: ?>
        <?php if(is_array($list)): foreach($list as $key=>$val1): ?><div class="commentall" style="margin:5px 0">
          <div class="comment1" style="margin-left:30px;float:left" >
            <div>
              <div style="float:left;line-height:25px;">评分:</div>
              <div style="float:left">
                <img src="/jiu/Public/homeIcon/<?php echo ($val1["cm_grade"]); ?>.jpg" style="width:100px;height:25px;">
              </div>
            </div>
            <div style="clear:both"></div>
            <div style="line-height:25px"><?php echo ($val1["cm_content"]); ?></div>
          </div>
          <div class="comment2" style="float:right" >
            <div style="height:30px;line-height:30px"><?php echo ($val1["userName"]); ?></div>
            <div><?php echo ($val1["cm_addtime"]); ?></div>
          </div>
        </div>
        <div style="clear:both"></div><hr><?php endforeach; endif; endif; ?>
        <!-- 遍历 -->
        <div><?php echo ($show); ?></div>
      </div>
      <a name="fuwu"></a>
    <div class="goodscomment" style=" #ccc;height:730px;margin-top:70px;background-color:#EFEFEF;position:absolute;top:560px;left:0">

      <div style="background:#EFEFEF">
        <div class="commentbtn">服务保障</div>
        </div>
        <div id="container">
        <ul style="background-color:white;">
            <li><a href="">品牌授权</a></li>
            <li><a href="">保真"基金"</a></li>
            <li><a href="">万千信赖</a></li>
            <li><a href="">挂牌公司</a></li>
            <li><a href="">金牌客服</a></li>
            <li><a href="">专业配送</a></li>
        </ul>
        <ol style="background-color:white;">
            <li><img src="/jiu/Public/Home/images/enc_01.jpg" style="width:895px;height:558px;"></li>
            <li>
              <dt class="baozhen"><h5>网酒网隶属于乐视控股，于2013年正式运营，秉承乐视互联网基因，扎根酒行业，以互联网思维改变行业，立志成为行业的创新者与引领者。
              <br><br>
              网酒网是专注于进口酒全产业链的生态酒企，主营进口葡萄酒、烈酒、啤酒、生态IP定制酒等相关品类，形成囊括线上网酒商城全网络覆盖（官网、第三方平台店铺群、生态合作平台）、线下自建生态终端（乐视生活馆、乐花）及构建酒直供网络（LePar、商超、KA、餐饮等）的全场景生态网络。网酒网以极致美酒产品、丰富生态体验、多元商业价值为核心价值，立志以颠覆的生态思维改变行业，成为行业的创新者与引领者，为用户带去极致美酒生活体验。</h5></dt>
            <dt><img src="/jiu/Public/Home/images/enc_05.jpg" style="width:895px;height:358px;"></dt>
            </li>
            <li>
                  <dt class="guapai1"><b style="font-size:20px">我们承诺</b><br>
                    <h5>
                    网酒网所售商品均为正品。我们保证消费者在网酒网买的任何商品，均为正品。如果消费者在网酒网购买的商品经鉴定为假冒商品，我们承诺假一赔十，并严格对相关责任人进行惩处，绝不姑息。
                    </h5>
                 </dt>
                  <dt><b style="font-size:20px"  class="guapai2">专业的客服团队</b><br><img src="/jiu/Public/Home/images/enc_02.jpg" style="width:895px;height:280px;"></dt>
            </li>
            <li>
                  <dt class="wanqian1"><h5>网酒网秉承顾客至上的服务理念，期待您的关注与反馈；如您在网酒网购物过程中遇到任何问题，可通过如下方式联系客服，我们将以最优质的服务帮您解决问题。<h5></dt>
                  <dt class="wanqian2"><b style="font-size:20px">在线客服</b><br>
                    <h5>
                          包括自有平台与第三方商家入驻的所有咨询问题。
                    </h5>
                  </dt>
                  <dt class="wanqian3"><b style="font-size:20px">  电话客服</b><br>
                    <h5>
                        服务时间：每日09:00-20:00 客服热线：4000-519-519
                    </h5>
                  </dt>
                  <dt class="wanqian4"><b style="font-size:20px">服务邮箱</b><br>
                    <h5>
                      服务邮箱：wj.service9@le.com
                    </h5>
                  </dt>
                  <dt> <img src="/jiu/Public/Home/images/enc_08.jpg" style="width:895px;height:250px;"></dt>
            </li>
            <li>
            <dt class="kefu1"><b style="font-size:20px">专业的客服团队</b><br>
                  <h5>网酒网客户服务中心，我们始终秉承“客户至上、始终如一”的核心价值理念，向客户提供优质、高效、全方位服务。我们工作在后台，服务在最前线专注聆听客户心声，用声音传递热诚，用专业锻造优质，用服务擦亮品牌。具备WSET二级水平的资深客服随时为您答疑，与您享受到更便捷、更专业更优质的服务。</h5>
            </dt>
            <dt class="kefu2"> <img src="/jiu/Public/Home/images/enc_06.jpg" style="width:895px;height:458px;"></dt>
            </li>
            <li>
            <dt class="zhuanye"><h5>网酒网物流业务全国覆盖，现全国拥有2大物流中心，分别为北京，宁波，仓库的专业及高科技化管理方式，配送队伍高效及严谨工作方法，仓配之间的无缝衔接， 100%保证订单能高速准确的送达您的手中。<h5></dt>
            <dt> <img src="/jiu/Public/Home/images/enc_07.jpg" style="width:895px;height:500px;"></li></dt> 
        </ol>
    </div>
      </div>
    </div>
  </div><?php endforeach; endif; endif; ?>



                <!--图片预览结束-->
<script type="text/javascript">
  $(document).ready(function(){
      var showproduct = {
          "boxid":"showbox",
          "sumid":"showsum",
          "boxw":435,//宽度,该版本中请把宽高填写成一样
          "boxh":435,//高度,该版本中请把宽高填写成一样
          "sumw":60,//列表每个宽度,该版本中请把宽高填写成一样
          "sumh":60,//列表每个高度,该版本中请把宽高填写成一样
          "sumi":1,//列表间隔
          "sums":6,//列表显示个数
          "sumsel":"sel",
          "sumborder":1,//列表边框，没有边框填写0，边框在css中修改
          "lastid":"showlast",
          "nextid":"shownext"
          };//参数定义
     $.ljsGlasses.pcGlasses(showproduct);//方法调用，务必在加载完后执行
  });

        $('#showbox').mouseover(function(){
          $('#o_right').css("z-index",-3);

        });
        $('#showbox').mouseout(function(){
          $('#o_right').css("z-index",1);

        });

        //商品购买数量
        var val = document.getElementById('goodsCount');
        function num(action){
          if(action=='add' && val.value<<?php echo ($val["store"]); ?>){
            val.value++;
          }else if(action=='minus' && val.value>1){
            val.value--;
          }
        }

    
    //尾部选项卡  
     var container = document.getElementById('container');
    // 所有ol下的li
    var oli = container.lastChild.previousSibling.children;
    // 当前显示的图片
    var currentPic = 0;
    // 默认显示第一张
    oli[currentPic].style.display = 'block';

    // 所有ul下的li
    var uli = container.firstChild.nextSibling.children;
    // console.dir(uli);
    for(var i = 0; i < uli.length; i++){
        // 在循环的同时，记录一个索引
        uli[i].sign = i;
        // 为所有li绑定事件
        uli[ i ].onmouseover = function(){
            // 更改前设置为隐藏
            oli[currentPic].style.display = 'none';
            // 更改下标
            currentPic = this.sign;
            // 更改后设置为显示
            oli[currentPic].style.display = 'block';
        };
    }

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
<div style="clear:both;"></div>

        

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