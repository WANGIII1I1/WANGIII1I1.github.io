<?php

    include '../ayangw/common.php';
    @header('Content-Type: text/html; charset=UTF-8');
    if($islogin==1){
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?=$title?> - 后台管理中心</title>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/app.css" />
    <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/jquery/jquery.cookie.js"></script>
    <script type="text/javascript" src="../assets/jquery/jquery.md5.js"></script>
    <script type="text/javascript" src="../assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/layer/layer.js"></script>
    <script type="text/javascript" src="../assets/js/ayangw.js"></script>
    <!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  
</head>
<body>
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">导航按钮</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./" style="color:#42a5f5;">后台管理中心</a>
        </div><!-- /.navbar-header -->
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" >
                <li>
                    <a href="./" style="color:#18a0a0;"><span class="glyphicon glyphicon-user"></span> 平台首页</a>
                </li>
                <li>
                    <a href="./list.php" style="color:#cd5c00;"><span class="glyphicon glyphicon-calendar"></span> 订单管理</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#f48224;"><span  class="glyphicon glyphicon-list-alt"></span> 卡密管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a href="./kmlist.php" ><span class="glyphicon glyphicon-list"></span> 卡密列表</a>
                        </li>
                        <li class="">
                            <a href="addkm.php"><span class="glyphicon glyphicon-plus-sign"></span> 添加卡密</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#f40086;"><span class="glyphicon glyphicon-list-alt"></span> 商品管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a href="./clist.php"><span class="glyphicon glyphicon-globe"></span> 商品列表</a>
                        </li>
                        <li class="">
                            <a href="./clist.php?my=add"><span class="glyphicon glyphicon-plus-sign"></span> 添加商品</a>
                        </li>
                        <li class="">
                            <a href="./typelist.php"><span class="glyphicon glyphicon-plus-sign"></span> 商品分类管理</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="loglist.php" style="color:#9754d1;"><span class="glyphicon glyphicon-user"></span> 系统日志</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#0071ce;"><span class="glyphicon glyphicon-cog"></span> 系统设置<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="./set.php?mod=site">网站信息配置</a></li>
                        <li><a href="./other-set.php?act=email">发件邮箱配置</a><li>
                        <li><a href="./set.php?mod=admin">管理员账号配置</a><li>
                             <li><a href="./other-set.php?act=paytype">支付接口开关</a><li>
                        <li><a href="./set.php?mod=pay">支付接口配置</a><li>
                        <li><a href="blacklist.php">黑名单管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#ff0000;"><span class="glyphicon glyphicon-cog"></span> 首页装修<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="./other-set.php?act=view">修改首页模板</a></li>
                        <li><a href="./set.php?mod=upimg">修改首页logo</a></li>
                        <li><a href="./set.php?mod=upBgimg">修改首页背景</a></li>
                    </ul>
                </li>
                <li>
                    <a href="./login.php?logout" style="color:#18ce6a;"><span class="glyphicon glyphicon-log-out"></span> 退出登陆</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->
<?php 
    }else{
        exit("<script language='javascript'>window.location.href='./login.php';</script>");
    }  
?>