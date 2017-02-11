<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>玖酒久</title>
    <link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/Home/css/index.css" />
    <script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/js/region_select.js"></script>
    <script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/js/tendina.js"></script>
    <script type="text/javascript">
        $.post("/jiu_xiangmu/xiangmu/jiu/Home/Index/selsession",{cx:'cart-num'},function(data){
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
        <a href="#"><img style="margin-left:-300px" src="/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/head.jpg" width=""></a>
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
        
            <script type="text/javascript" src="/jiu_xiangmu/xiangmu/jiu/Public/js/jquery.headroom.js"></script>
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
                            <center><a id="shoplink" href='/jiu_xiangmu/xiangmu/jiu/Home/Index/show'><input type="button" id='go-sp' value="去购物" style="color:white"/></a></center>
                            
                        </div>
                    <?php else: ?>
                        <div id="cart-show" style="height:auto" class="cart-show">
                            <div id="sp-show">
                                <?php if(is_array($_SESSION['cart'])): foreach($_SESSION['cart'] as $key=>$val): ?><center>
                                        <a href="/jiu_xiangmu/xiangmu/jiu/Home/Goodsdetail/index?id=<?php echo ($val[id]); ?>">
                                        <div id="id-<?php echo ($val['id']); ?>" class='gwkuang'>
                                            <img src="/jiu_xiangmu/xiangmu/jiu/Public/goodsimage/<?php echo ($val[picture]); ?>" height="50" width="50">
                                            <div class='kuangzide'><?php echo ($val['name']); ?></div>
                                            <li class='jiagelo'>￥<?php echo ($val['price']); ?>元　　x<?php echo ($val["num"]); ?></li>
                                        </div>
                                        </a>
                                    </center><?php endforeach; endif; ?>
                            </div>
                            <?php if($_SESSION['user_logininfo']): ?><center> <a href="/jiu_xiangmu/xiangmu/jiu/Home/ShopCart/index"><button id='go-pay' style="border:1px green solid;">去结算</button></a></center>
                                <?php else: ?>
                                <center> <a href="/jiu_xiangmu/xiangmu/jiu/Home/Login/index"><button id='go-pay' style="border:1px green solid;">去结算</button></a></center><?php endif; ?>
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
                        'background':"url('/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/icon.png')",
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
                        'background':"url('/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/icon.png')",
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
                     $.post("/jiu_xiangmu/xiangmu/jiu/Home/Index/insertgoods",{gid:id,num:$('#goodsCount').val()},function(data){
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
                                $('#shoplink').attr("href","/jiu_xiangmu/xiangmu/jiu/Home/Login/index"); 
                            }else{
                                $('#shoplink').attr("href","/jiu_xiangmu/xiangmu/jiu/Home/ShopCart/index"); 
                            }
                            
                            
                        }
                    });
                    }
            </script>
        
        <div style="position:relative;height:50px;">
            <div style="float:left;margin-top:15px;"><img src="/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/2016-12-19_194742.png" alt=""></div>
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
                        <li style="float:left;color:blue;font-size:16px;position:absolute;top:-10px;left:270px"> <img src="/jiu_xiangmu/xiangmu/jiu/Public/weathercn/<?php echo ($result['result']['img']); ?>.png" width="50" height="50" alt="">&nbsp; </li>
                        <li>
                            <div style="position:absolute;left:340px;" >
                                <form action="<?php echo U('Home/Index/show');?>" method="post">
                                    <div class="control-group">
                                        <div class="controls">
                                            <select name="location_p" id="location_p" style="width:60px">
                                            </select>
                                            <select name="location_c" id="location_c" style="position:absolute;top:0px;left:60px;width:60px">
                                            </select>
                                            <script src="/jiu_xiangmu/xiangmu/jiu/Public/js/region_select.js"></script>
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
        

 <link  rel="stylesheet"  type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/Home/css/cart.css"/>
 <div id="header-title" style="width:200px; height:90px; font-size:25px;float:left;line-height:70px;font-weight:bold;">订单提交</div>
            <div class="cart-status">
                <div class="cart-status-bg">
                    <p class="running" style="width:100%"></p>
                </div>
            </div>
            <div style="clear:both">
           <hr>

        
        
         <div class="payway">
                              <div  >
                                  <div class="lepay_content">
                                      <div class="submit_success">
                                          <p style="font-size:20px;">恭喜你！订单已提交成功! 订单号:<?php echo ($data['order_num']); ?></p>
                                          <p  style="color:red; text-align:center; ">请在60分钟内完成支付否则订单将会取消！</p>
                                      </div>
                                  </div>
                              </div>
                <div id='pay_bank'>
            <br>
            <table width="800px">
                <tr>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/ABC.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/BOC.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/CCB.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/BOD.png' class='left'></td>
                </tr>
                <tr>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/CEB.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/CIB.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/CITIC.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/CEB.png' class='left'></td>
                </tr>
                <tr>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/CMB.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/COMM.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img checked src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/GDB.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/CITIC.png' class='left'></td>
                </tr>
                <tr>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/ICBC.png'  class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/BJBANK.png' class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/HKBEA.png'  class='left'></td>
                    <td align="center"><input type='radio' name='aes'></td>
                    <td align="center"><img src='/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/BOHAIB.png' class='left'></td>

                </tr>
            </table>
            <br>
            <form action='/jiu_xiangmu/xiangmu/jiu/Home/ShopCart/paySuccess' method='post'>
                <input type='hidden' name='order_id' value='<?php echo ($data[order_id]); ?>'>
            <div class='passboxdiv'><b style="font-size:14px">支付密码:</b>　<input type='password' name='pas' class="passbox" placeholder="请输入支付密码"/><span class='size' style="color:red;"></span></div>
            <br>
            <center>
                <button class='btn btn-success' onclick='return asob()'>确认付款</button>
             

            </center>
            </form>
        </div>
        </center>
    </div>
    <script type="text/javascript">
            var paybank = document.getElementById('pay_bank');
            var choose =document.getElementsByName('aes');
            var flag = false;
        for (var i =0; i <choose.length; i++) {
            choose[i].onclick = function(){
                $('.passboxdiv').css('display','block');
            }
        };

        function asob(){
            for(var i=0;i<choose.length;i++){
                if(choose[i].checked == true){
                    flag=true;
                }
            }
            if(flag==false){
                
                return false;
            }
            if($('.passbox').val()=='' || $('.size').html()!='密码正确'){
               
                return false;
                
            }
        }
        
        $('.passbox').blur(function(){
            $.post("/jiu_xiangmu/xiangmu/jiu/Home/ShopCart/payWay",{val:$('.passbox').val()},function(data){
              if(data){
                if(data=='Y'){
                    $('.size').html('密码正确');

                }else{
                    $('.size').html('密码错误');
                }
              }
            }); 

        });
    </script>
    
        

            <div id="footer">
            <link rel="stylesheet" type="text/css" href="/jiu_xiangmu/xiangmu/jiu/Public/Home/css/footer.css" />
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
                <a href="#top" title="点我返回顶部" style="display:none;position:absolute;top:500px;right:-40px;" class="top2"><img src="/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/2016-12-20_221717.png" height="100px" alt=""></a>

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
                            <dt><img src="/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/weibo.png"></dt>
                            <li>微博</li>
                        </div>
                            <!-- 微信 -->
                        <div id="weixin">
                            <dt><img src="/jiu_xiangmu/xiangmu/jiu/Public/Home/pic/weibo.png"></dt>
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