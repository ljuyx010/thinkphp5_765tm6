<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\index\index.html";i:1535010820;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dpcmst2管理后台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/css/font.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/css/index.css" />
</head>
<body class="main_body">
<div class="layui-layout layui-layout-admin">
    <!-- 顶部 -->
    <div class="layui-header header">
        <div class="layui-main mag0">
            <a href="#" class="logo">DpcmsT2</a>
            <!-- 显示/隐藏菜单 -->
            <a href="javascript:;" class="hideMenu">
                <i class="iconfont">&#xe699;</i>
            </a>
            <!-- 顶级菜单 -->
            <ul class="layui-nav mobileTopLevelMenus" mobile>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="iconfont icon-caidan"></i><cite>DpcmsT2</cite></a>
                    <dl class="layui-nav-child">
                        <dd class="layui-this" data-menu="1">
                            <a href="javascript:void(0);">
                                <i class="iconfont">&#xe6ae;</i>
                                <cite>系统设置</cite>
                            </a>
                        </dd>

                        <dd data-menu="2">
                            <a href="javascript:void(0);">
                                <i class="iconfont">&#xe6a2;</i>
                                <cite>内容管理</cite>
                            </a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav topLevelMenus" pc>
                <li class="layui-nav-item layui-this" data-menu="1">
                    <a href="javascript:void(0);">
                        <i class="iconfont">&#xe6ae;</i>
                        <cite>系统设置</cite>
                    </a>
                </li>
                <li class="layui-nav-item" data-menu="2">
                    <a href="javascript:void(0);">
                        <i class="iconfont">&#xe6a2;</i>
                        <cite>内容管理</cite>
                    </a>
                </li>
            </ul>
            <!-- 顶部右侧菜单 -->
            <ul class="layui-nav top_menu">
                <li class="layui-nav-item" pc>
                    <a href="javascript:;" data-url="<?php echo url('/index/index'); ?>" target="_blank"><i class="iconfont">&#xe6da;</i><cite>网站首页</cite></a>
                </li>
                <li class="layui-nav-item" pc>
                    <a href="javascript:;" class="clearCache"><i class="iconfont">&#xe69d;</i><cite>清除缓存</cite></a>
                </li>
                <li class="layui-nav-item lockcms" pc>
                    <a href="javascript:;"><i class="iconfont">&#xe82b;</i><cite>锁屏</cite></a>
                </li>
                <li class="layui-nav-item" id="userInfo">
                    <a href="javascript:;"><img src="/public/static/images/face.jpg" class="layui-nav-img userAvatar"
                            width="35" height="35"><cite class="adminName"><?php echo \think\Session::get('name'); ?></cite></a>
                    <dl class="layui-nav-child">
                        <!--<dd><a href="javascript:;" data-url="page/user/userInfo.html"><i class="seraph icon-ziliao" data-icon="icon-ziliao"></i><cite>个人资料</cite></a></dd>-->
                        <dd><a href="javascript:;" data-url="<?php echo url('admin/modfiy'); ?>"><i class="iconfont icon-bianji4"
                                data-icon="iconfont icon-bianji4"></i><cite>修改密码</cite></a></dd>
                        <dd pc><a href="javascript:;" class="functionSetting"><i class="layui-icon">&#xe620;</i><cite>功能设定</cite><span
                                class="layui-badge-dot"></span></a></dd>
                        <dd pc><a href="javascript:;" class="changeSkin"><i
                                class="layui-icon">&#xe61b;</i><cite>更换皮肤</cite></a></dd>
                        <dd><a href="<?php echo url('index/loginout'); ?>" class="signOut"><i
                                class="seraph icon-tuichu"></i><cite>退出</cite></a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <!-- 左侧导航 -->
    <div class="layui-side layui-bg-black">
        <div class="user-photo">
            <a class="img" title="我的头像" ><img src="/public/static/images/face.jpg" class="userAvatar"></a>
            <p>你好！<span class="userName"><?php echo \think\Session::get('name'); ?></span>, 欢迎登录</p>
        </div>
        <!-- 搜索 
        <div class="layui-form component" style="margin:10px;">
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
                    <a href="javascript:;" data-url="<?php echo url('index/main'); ?>"><i class="layui-icon" data-icon="&#xe68e;"></i><cite>后台首页</cite></a>
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
                        <dd><a href="javascript:;" class="refresh refreshThis"><i
                                class="layui-icon layui-icon-refresh"></i> 刷新当前</a></dd>
                        <dd><a href="javascript:;" class="closePageOther"><i class="seraph icon-prohibit"></i> 关闭其他</a>
                        </dd>
                        <dd><a href="javascript:;" class="closePageAll"><i class="iconfont">&#xe6b7;</i> 关闭全部</a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <div class="layui-tab-content clildFrame">
                <div class="layui-tab-item layui-show">
                    <iframe src="<?php echo url('index/main'); ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部 -->
    <div class="layui-footer footer" style="border-top:1px solid #dedede">
        <p><span>copyright @ <?php echo date('Y'); ?> Dpwl.net 湖北大鹏网络科技有限公司版权所有</span></p>
    </div>
</div>

<!--右键菜单 start-->
<ul class="ul-context-menu" style="position: absolute; text-align: center; width: 110px;padding: 10px 0; background-color: rgba(51, 51, 51,.5); display: none;z-index: 1000;">
    <li class="ui-context-menu-item">
        <a href="javascript:void(0);" class="refresh refreshThis">
            <i class="layui-icon layui-icon-refresh"></i>
            <span style="">刷新当前</span>
        </a>
    </li>
    <li class="ui-context-menu-item">
        <a href="javascript:void(0);" class="whoShow">
            <i class="layui-icon"></i>
            <span style="">关闭当前</span>
        </a>
    </li>
    <li class="ui-context-menu-item">
        <a href="javascript:void(0);" class="closePageOther">
        <i class="seraph icon-prohibit"></i>
        <span style="">关闭其他</span>
        </a>
    </li>
    <li class="ui-context-menu-item">
        <a href="javascript:void(0);" class="closePageAll">
            <i class="iconfont">&#xe6b7;</i>
            <span style="">关闭全部</span>
        </a>
    </li>
</ul>
<!--右键菜单 end-->
<!-- 移动导航 -->
<div class="site-tree-mobile"><i class="layui-icon">&#xe602;</i></div>
<div class="site-mobile-shade"></div>
<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
<script type="text/javascript">
    var sat="/public/static";
    var url="<?php echo url('index/getmenu','',''); ?>";
    var curl="<?php echo url('index/clear','',''); ?>";
    var uname="<?php echo \think\Session::get('name'); ?>";
</script>
<script type="text/javascript" src="/public/static/js/jquery.toast.min.js"></script>
<script type="text/javascript" src="/public/static/js/alert.js"></script>
<script type="text/javascript" src="/public/static/layui/layui.js"></script>
<script type="text/javascript" src="/public/static/js/index.js"></script>
<script type="text/javascript" src="/public/static/js/cache.js"></script>
<script>
    window.onload = function () {
        getData($('.layui-nav-item .layui-this').data('menu'));
    };
    layui.use(['layer'],function(){
        let topmenu = $("#top_tabs_box");
        $("body").on('mousedown','#top_tabs_box li',function(e){
            if (3 === e.which) {
                $(this).click();
                e = e || window.event;
                let xx = e.pageX || e.clientX + document.body.scroolLeft;
                let yy = e.pageY || e.clientY + document.body.scrollTop;
                /*let xx = e.originalEvent.x || e.originalEvent.layerX || 0;
                let yy = e.originalEvent.y || e.originalEvent.layerY || 0;*/
                menu1.css({'left':xx -5,'top':yy- 5}).show();
                $(document).one('click','.ui-context-menu-item',function(){
                    menu1.hide();
                });
            }
        });
        topmenu.unbind("mousedown").bind("contextmenu", function (e) {
            e.preventDefault();
            return false;
        });
        let menu1 = $(".ul-context-menu");
        menu1.unbind("mousedown").bind("contextmenu", function (e) {
            e.preventDefault();
            return false;
        });
        let timer;
        menu1.on('mouseleave',function(){
            if($(this).css('display') === 'none'){
                return false;
            }
            timer = setTimeout(function(){
                menu1.hide();
            },1000);
        });
        menu1.on('mouseenter',function(){
            if($(this).css('display') === 'none'){
                return false;
            }
            if (timer) {
                clearTimeout(timer);
            }
        });
        topmenu.mousedown(function(e){
            if (3 === e.which) {
                e = e||window.event;
                let xx = e.pageX || e.clientX + document.body.scroolLeft;
                let yy = e.pageY || e.clientY + document.body.scrollTop;
                menu1.css({'left': xx - 5, 'top': yy - 5}).show();
                $(document).one('click','.ui-context-menu-item',function(){
                    menu1.hide();
                });
            }
            //return false;//阻止链接跳转
        });
        $(".whoShow").on('click',function(){
            let frame = $(".clildFrame .layui-tab-item.layui-show").find("iframe")[0];
        let id = $(frame).data('id');
            if(typeof id === "undefined"){
                return layer.msg('首页不可关闭');
            }
            $("i[data-id=" +id+ "]").click();
        });
    });
</script>
</body>
</html>