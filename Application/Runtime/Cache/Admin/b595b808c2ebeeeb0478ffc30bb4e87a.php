<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>X-Man 管理后台</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="/favicon.ico">
	<link rel="stylesheet" href="/Public/static/layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="/Public/static/css/jquery.toast.min.css" media="all" />
	<link rel="stylesheet" href="/Public/static/css/index.css" media="all" />
	<link rel="stylesheet" href="//at.alicdn.com/t/font_495240_oxbe4zwl9tem6lxr.css" media="all"/>
	<style type="text/css">
		/*选中以后的颜色+左上角隐藏按钮*/
		.layui-nav-tree .layui-nav-child dd.layui-this, .layui-nav-tree .layui-nav-child dd.layui-this a, .layui-nav-tree .layui-this, .layui-nav-tree .layui-this>a, .layui-nav-tree .layui-this>a:hover,.hideMenu,.layui-nav-tree .layui-nav-bar,.layui-nav-itemed:before{
			background-color: #01AAED;
		}
		/*三级菜单悬停颜色*/
		.layui-nav .layui-nav-child a:hover, .layui-nav .layui-nav-child dd.layui-this a:hover{
			background-color: #1E9Fbb;
		}
		/*左上边框颜色*/
		.layui-body {
			border-top: 5px solid #01AAED;
			border-left: 0px solid #01AAED;
		}
		/*上边框选中的颜色*/
		.layui-nav .layui-this:after, .layui-nav-bar, .layui-nav-tree .layui-nav-itemed:after{
			background-color:gold;
		}
		.layui-tab-title .layui-this {
			color: #01AAED;
			border-bottom: 1px solid #01AAED;
		}
		/*顶部菜单被*/
		.topLevelMenus .layui-nav-item.layui-this a{
			background-color:#595963;
			/*color:#66CCFF!important;
			font-weight: bolder;*/
		}
		/*移动版菜单颜色*/
		.layui-nav .layui-nav-child dd.layui-this a, .layui-nav-child dd.layui-this{
			background-color: #1E9Fbb;
		}
	</style>
</head>
<body class="main_body">
	<div class="layui-layout layui-layout-admin">
		<!-- 顶部 -->
		<div class="layui-header header">
			<div class="layui-main mag0">
				<a href="#" class="logo">X-Man</a>
				<!-- 显示/隐藏菜单 -->
				<a href="javascript:;" class="hideMenu">
					<i class="iconfont icon-menu1"></i>
				</a>
				<!-- 顶级菜单 -->
				<ul class="layui-nav mobileTopLevelMenus" mobile>
					<li class="layui-nav-item">
						<a href="javascript:;"><i class="iconfont icon-caidan"></i><cite>X-Man</cite></a>
						<dl class="layui-nav-child">
							<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; if($k == 1): ?><dd class="layui-this" data-menu="<?php echo ($v["id"]); ?>">
									<a href="javascript:void(0);">
										<i class="<?php echo ($v["icon"]); ?>"></i>
										<cite><?php echo ($v["name"]); ?></cite>
									</a>
								</dd>
									<?php else: ?>
									<dd data-menu="<?php echo ($v["id"]); ?>">
										<a href="javascript:void(0);">
											<i class="<?php echo ($v["icon"]); ?>"></i>
											<cite><?php echo ($v["name"]); ?></cite>
										</a>
									</dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</dl>
					</li>
				</ul>
				<ul class="layui-nav topLevelMenus" pc>
					<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; if($k == 1): ?><li class="layui-nav-item layui-this" data-menu="<?php echo ($v["id"]); ?>">
								<a href="javascript:void(0);">
									<i class="<?php echo ($v["icon"]); ?>" ></i>
									<cite><?php echo ($v["name"]); ?></cite>
								</a>
							</li>
							<?php else: ?>
							<li class="layui-nav-item" data-menu="<?php echo ($v["id"]); ?>">
								<a href="javascript:void(0);">
									<i class="<?php echo ($v["icon"]); ?>" ></i>
									<cite><?php echo ($v["name"]); ?></cite>
								</a>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			    <!-- 顶部右侧菜单 -->
			    <ul class="layui-nav top_menu">
					<li class="layui-nav-item" pc>
						<a href="javascript:;" class="clearCache"><i class="layui-icon" data-icon="&#xe640;">&#xe640;</i><cite>清除缓存</cite></a>
					</li>
					<li class="layui-nav-item lockcms" pc>
						<a href="javascript:;"><i class="iconfont icon-lock"></i><cite>锁屏</cite></a>
					</li>
					<li class="layui-nav-item" id="userInfo">
						<a href="javascript:;"><img src="/Public/static/images/face.png" class="layui-nav-img userAvatar" width="35" height="35"><cite class="adminName"><?php echo ($user["nickname"]); ?></cite></a>
						<dl class="layui-nav-child">
<!--							<dd><a href="javascript:;" data-url="page/user/userInfo.html"><i class="seraph icon-ziliao" data-icon="icon-ziliao"></i><cite>个人资料</cite></a></dd>-->
							<dd><a href="javascript:;" data-url="/admin/index/changepass"><i class="iconfont icon-bianji4" data-icon="iconfont icon-bianji4"></i><cite>修改密码</cite></a></dd>
							<dd><a href="javascript:;" class="showNotice"><i class="layui-icon layui-icon-speaker" data-icon="layui-icon layui-icon-speaker"></i><cite>系统公告</cite><span class="layui-badge-dot"></span></a></dd>
							<dd pc><a href="javascript:;" class="functionSetting"><i class="layui-icon">&#xe620;</i><cite>功能设定</cite><span class="layui-badge-dot"></span></a></dd>
							<dd pc><a href="javascript:;" class="changeSkin"><i class="layui-icon">&#xe61b;</i><cite>更换皮肤</cite></a></dd>
							<dd><a href="/admin/login/logout" class="signOut"><i class="seraph icon-tuichu"></i><cite>退出</cite></a></dd>
						</dl>
					</li>
				</ul>
			</div>
		</div>
		<!-- 左侧导航 -->
		<div class="layui-side layui-bg-black">
<!--			<div class="user-photo">
				<a class="img" title="我的头像" ><img src="/Public/static/images/face.png" class="userAvatar"></a>
				<p>你好！<span class="userName">Xiny</span>, 欢迎登录</p>
			</div>-->
			<!-- 搜索 -->
			<!--<div class="layui-form component" style="margin:10px;">
				<select name="search" id="search" lay-search lay-filter="searchPage">
					<option value="">搜索页面或功能</option>
					<option value="1">layer</option>
					<option value="2">form</option>
				</select>
				<i class="layui-icon">&#xe615;</i>
			</div>-->
			<div class="navBar layui-side-scroll" id="navBar" style="border-bottom: 1px dashed #454545">
				<ul class="layui-nav layui-nav-tree">
					<li class="layui-nav-item layui-this">
						<a href="javascript:;" data-url="/Public/static/page/main.html"><i class="layui-icon" data-icon=""></i><cite>后台首页</cite></a>
					</li>
				</ul>
			</div>
		</div>
		<!-- 右侧内容 -->
		<div class="layui-body layui-form">
			<div class="layui-tab mag0" lay-filter="bodyTab" id="top_tabs_box">
				<ul class="layui-tab-title top_tab" id="top_tabs">
					<li class="layui-this" lay-id=""><i class="layui-icon">&#xe68e;</i> <cite>后台首页</cite></li>
				</ul>
				<ul class="layui-nav closeBox">
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="layui-icon caozuo">&#xe643;</i> 页面操作</a>
				    <dl class="layui-nav-child">
					  <dd><a href="javascript:;" class="refresh refreshThis"><i class="layui-icon layui-icon-refresh"></i> 刷新当前</a></dd>
				      <dd><a href="javascript:;" class="closePageOther"><i class="seraph icon-prohibit"></i> 关闭其他</a></dd>
				      <dd><a href="javascript:;" class="closePageAll"><i class="iconfont icon-guanbi"></i> 关闭全部</a></dd>
				    </dl>
				  </li>
				</ul>
				<div class="layui-tab-content clildFrame">
					<div class="layui-tab-item layui-show">
						<iframe src="<?php echo U('Index/main');?>"></iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- 底部 -->
		<div class="layui-footer footer" style="border-top:1px solid #dedede">
			<p><span>copyright @<?php echo date('Y');?> Xiny</span></p>
		</div>
	</div>

	<!-- 移动导航 -->
	<div class="site-tree-mobile"><i class="layui-icon">&#xe602;</i></div>
	<div class="site-mobile-shade"></div>
	<script type="text/javascript" src="/Public/static/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/static/js/jquery.toast.min.js"></script>
	<script type="text/javascript" src="/Public/static/js/alert.js"></script>
	<script type="text/javascript" src="/Public/static/layui/layui.js"></script>
	<script type="text/javascript" src="/Public/static/js/index.js"></script>
	<script type="text/javascript" src="/Public/static/js/cache.js"></script>
	<script type="text/javascript">
		window.onload = function(){
            getData($('.layui-nav-item .layui-this').data('menu'));
		}
	</script>
</body>
</html>