<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\index\main.html";i:1535010860;}*/ ?>
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
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>今日访问</h3>
                                                <p>
                                                    <cite>66</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>本月访问</h3>
                                                <p>
                                                    <cite>12</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>总访问量</h3>
                                                <p>
                                                    <cite>99</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>会员数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>67</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>产品数</h3>
                                                <p>
                                                    <cite>0</cite></p>
                                            </a>
                                        </li>
                                    </ul>
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
                            <td>T2.0.180820</td></tr>
                        <tr>
                            <th>服务器域名</th>
                            <td><?php echo $_SERVER['SERVER_NAME']; ?></td></tr>
                        <tr>
                            <th>操作系统</th>
                            <td><?php if(IS_WIN): ?>WINDOWS<?php else: ?>LIUNX<?php endif; ?></td></tr>
                        <tr>
                            <th>运行环境</th>
                            <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td></tr>
                        <tr>
                            <th>PHP版本</th>
                            <td><?php echo PHP_VERSION; ?></td></tr>
                        <tr>
                            <th>PHP运行方式</th>
                            <td><?php echo php_sapi_name(); ?></td></tr>
                        <tr>
                            <th>MYSQL版本</th>
                            <td><?php echo re_substr(mysql_get_client_info(),0,25,false); ?></td></tr>
                        <tr>
                            <th>上传附件限制</th>
                            <td><?php echo ini_get('upload_max_filesize'); ?></td></tr>
                        <tr>
                            <th>执行时间限制</th>
                            <td><?php echo ini_get('max_execution_time'); ?>秒</td></tr>
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