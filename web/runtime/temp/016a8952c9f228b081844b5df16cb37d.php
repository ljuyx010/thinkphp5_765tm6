<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\index\main.html";i:1536824113;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
        <link rel="stylesheet" type="text/css" href="/public/static/css/welcome.css" />
        <link rel="stylesheet" type="text/css" href="/public/static/css/public.css" />
    </head>
    <body>
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote layui-quote-nm"><h1>欢迎使用Dpcms管理系统</h1></blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-row layui-col-space10 panel_box">
                                <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                                    <a href="javascript:;">
                                        <div class="panel_icon layui-bg-green">
                                            <i class="layui-icon layui-icon-chart"></i>
                                        </div>
                                        <div class="panel_word">
                                            <span>1000</span>
                                            <cite>访问量</cite>
                                        </div>
                                    </a>
                                </div>
                                <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                                    <a href="javascript:;">
                                        <div class="panel_icon layui-bg-black">
                                            <i class="layui-icon layui-icon-dialogue"></i>
                                        </div>
                                        <div class="panel_word">
                                            <span>0</span>
                                            <cite>留言</cite>
                                        </div>
                                    </a>
                                </div>
                                <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                                    <a href="javascript:;">
                                        <div class="panel_icon layui-bg-red">
                                            <i class="layui-icon layui-icon-tabs"></i>
                                        </div>
                                        <div class="panel_word">
                                            <span>3</span>
                                            <cite>专题</cite>
                                        </div>
                                    </a>
                                </div>
                                <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                                    <a href="javascript:;">
                                        <div class="panel_icon layui-bg-orange">
                                            <i class="layui-icon layui-icon-user"></i>
                                        </div>
                                        <div class="panel_word userAll">
                                            <span>3</span>
                                            <em>用户总数</em>
                                            <cite class="layui-hide">用户中心</cite>
                                        </div>
                                    </a>
                                </div>
                                <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                                    <a href="javascript:;">
                                        <div class="panel_icon layui-bg-cyan">
                                            <i class="layui-icon layui-icon-list"></i>
                                        </div>
                                        <div class="panel_word outIcons">
                                            <span>34</span>
                                            <em>文章</em>
                                        </div>
                                    </a>
                                </div>
                                <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
                                    <a href="javascript:;">
                                        <div class="panel_icon layui-bg-blue">
                                            <i class="layui-icon layui-icon-log"></i>
                                        </div>
                                        <div class="panel_word">
                                            <span class="loginTime">2018-09-06<br>  11:29:58</span>
                                            <cite>上次登录时间</cite>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>       
        <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>系统版本</th>
                            <td>T2.0.180820</td>
                            <th>服务器域名</th>
                            <td><?php echo $_SERVER['SERVER_NAME']; ?></td>
                        </tr>
                        <tr>
                            <th>操作系统</th>
                            <td><?php if(IS_WIN): ?>WINDOWS<?php else: ?>LIUNX<?php endif; ?></td>
                            <th>运行环境</th>
                            <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
                        </tr>
                        <tr>
                            <th>PHP版本</th>
                            <td><?php echo PHP_VERSION; ?></td>
                            <th>PHP运行方式</th>
                            <td><?php echo php_sapi_name(); ?></td>
                        </tr>
                        <tr>
                            <th>MYSQL版本</th>
                            <td><?php echo re_substr(mysql_get_client_info(),0,25,false); ?></td>
                            <th>上传附件限制</th>
                            <td><?php echo ini_get('upload_max_filesize'); ?></td>
                        </tr>
                        <tr>
                            <th>执行时间限制</th>
                            <td><?php echo ini_get('max_execution_time'); ?>秒</td>
                            <th></th>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>                        
                        <tr>
                            <th>开发者</th>
                            <td>李俊 (528051088@qq.com)</td></tr>
                        <tr>
                            <th>版权所有</th>
                            <td>湖北大鹏网络科技有限公司 (400-6688-605)
                                <a href="http://www.dpwl.net/" class='x-a' target="_blank">访问官网</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        
    </div>
    </body>
</html>