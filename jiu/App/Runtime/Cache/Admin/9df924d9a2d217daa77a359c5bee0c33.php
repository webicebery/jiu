<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/jiu/Public/2016-12-13_195944.ico" >
<LINK rel="Shortcut Icon" href="/jiu/Public/2016-12-13_195944.ico" />
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
<title> 玖酒久</title>
<meta name="keywords" content="H-ui.admin v2.5,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v2.5，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="<?php echo U('Admin/Index/index');?>">玖酒久</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> <span class="logo navbar-slogan f-l mr-10 hidden-xs">后台管理系统</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo ($admin_logininfo['ad_adminer']); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="<?php echo U('Admin/Adminer/logout');?>">注销</a></li>
						</ul>
					</li>
					<li><?php echo ($admin_logininfo["ad_level"]); ?></li>
					
					<li id="Hui-msg"> <a href="" title="消息"><span class="badge badge-danger"><?php echo ($count); ?></span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					
					<li><a data-href="<?php echo U('Admin/Adminer/show');?>" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
					
					
				</ul>
			</dd>
		</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('Admin/User/index');?>" data-title="会员列表" href="javascript:;">会员列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe68a;</i> 站内信管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					
					<li><a data-href="<?php echo U('Admin/Inmail/index');?>" data-title="收件箱" href="javascript:void(0)">收件箱</a></li>
					<li><a data-href="<?php echo U('Admin/Inmail/my_send');?>" data-title="发件箱" href="javascript:void(0)">发件箱</a></li>
					<li><a data-href="<?php echo U('Admin/Adminer/send_adminers');?>" data-title="发送站内信" href="javascript:void(0)">发送站内信</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe613;</i> 轮播图管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('Admin/Carousel/index');?>" data-title="轮播图浏览" href="javascript:void(0)">轮播浏览</a></li>
					<li><a data-href="<?php echo U('Admin/Carousel/add');?>" data-title="轮播图添加" href="javascript:void(0)">轮播添加</a></li>	
				</ul>
			</dd>
		</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 分类管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('Admin/Category/index');?>" data-title="分类浏览" href="javascript:void(0)">分类浏览</a></li>
					<li><a data-href="<?php echo U('Admin/Category/addTop');?>" data-title="分类添加" href="javascript:void(0)">分类添加</a></li>
				</ul>
			</dd>
		</dl>	
			
	</div>

	<div class="menu_dropdown bk_3">
		
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe620;</i> 商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					
					<li><a data-href="<?php echo U('Admin/Goods/index');?>" data-title="商品浏览" href="javascript:void(0)">商品浏览</a></li>
					<li><a data-href="<?php echo U('Admin/Goods/add');?>" data-title="添加商品" href="javascript:void(0)">添加商品</a></li>
					
					
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe620;</i> 商品评论管理 <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('Admin/Comment/index');?>" data-title="商品评论浏览" href="javascript:void(0)">商品评论浏览</a></li>	
				</ul>
			</dd>
		</dl>

	</div>

	<div class="menu_dropdown bk_2">
		
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe620;</i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					
					<li><a data-href="<?php echo U('Admin/Order/index');?>" data-title="订单管理" href="javascript:void(0)">订单列表</a></li>
					
					
				</ul>
			</dd>
		</dl>
		
		
	</div>
	<div class="menu_dropdown bk_2">
		
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 友情链接<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					
					<li><a data-href="<?php echo U('Admin/Frilink/index');?>" data-title="浏览友情链接" href="javascript:void(0)">浏览友情链接</a></li>

					<li><a data-href="<?php echo U('Admin/Frilink/add');?>" data-title="添加友情链接" href="javascript:void(0)">添加友情链接</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe616; </i> 公告管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?php echo U('Admin/Information/index');?>" data-title="会员列表" href="javascript:;">公告列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 用户反馈<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					
					<li><a data-href="<?php echo U('Admin/Suggest/index');?>" data-title="反馈内容" href="javascript:void(0)">反馈内容</a></li>

					
				</ul>
			</dd>
		</dl>
		
	</div>

</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo U('Admin/index/welcome');?>"></iframe>
		</div>
	</div>
</section>

<div class="contextMenu" id="myMenu1">
	<ul>
		<li id="open">Open </li>
		<li id="email">email </li>
		<li id="save">save </li>
		<li id="delete">delete </li>
	</ul>
</div>


<script type="text/javascript" src="/jiu/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/jiu/Public/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script> 
<script type="text/javascript" src="/jiu/Public/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/jiu/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
$(function(){
	$(".Hui-tabNav-wp").contextMenu('myMenu1', {
		bindings: {
			'open': function(t) {
				alert('Trigger was '+t.id+'\nAction was Open');
			},
			'email': function(t) {
				alert('Trigger was '+t.id+'\nAction was Email');
			},
			'save': function(t) {
				alert('Trigger was '+t.id+'\nAction was Save');
			},
			'delete': function(t) {
				alert('Trigger was '+t.id+'\nAction was Delete')
			}
		}
	});
});
/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
</script> 

<!--此乃百度统计代码，请自行删除-->
<script type="text/javascript">
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s)})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>