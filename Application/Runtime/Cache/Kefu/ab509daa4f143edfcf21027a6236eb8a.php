<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>客服系统管理平台</title>
    
    <!-- <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon"> -->
    <link rel="stylesheet" type="text/css" href="/Public/Kefu/css/base.css" media="all">
    <!-- <link rel="stylesheet" type="text/css" href="/Public/Kefu/css/common.css" media="all"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/Public/Kefu/css/module.css"> -->
    <link rel="stylesheet" type="text/css" href="/Public/Kefu/css/style.css" media="all">
    <script type="text/javascript" src="/Public/Kefu/js/jquery-2.0.2.min.js"></script>
    
	<link rel="stylesheet" type="text/css" href="/Public/Kefu/css/showfile.css">

    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo">实习客服</span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <li><a href="">页面1</a></li>
            <li><a href="">页面2</a></li>
            <li><a href="">页面3</a></li>
            <li><a href="">页面4</a></li>
            <li><a href="">页面5</a></li>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                
                <li class="manager">你好，<em title=""><?php echo session("uname"); ?></em></li>
                <li><a href="">修改密码</a></li>
                <li><a href="">修改昵称</a></li>
                <li><a href="/index.php/Home/Index/logout">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                
                <h3><i class="icon icon-unfold"></i>公司制度</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/Kefu/Comsys/index" >公司制度培训资料</a>
                    </li>
                    <?php if(session('test1') != 0 ): ?><li>
                            <a class="item" href="/index.php/Kefu/Comsys/paperlist" >公司制度培训测试</a>
                        </li><?php endif; ?>
                </ul>
                
                <?php if(session('proknowledge') != 0 or session('test2') != 0): ?><h3><i class="icon icon-unfold"></i>产品知识</h3>
                <ul class="side-sub-menu">
                    <?php if(session('proknowledge') != 0 ): ?><li>
                            <a class="item" href="/index.php/Kefu/Proknowledge/index" >产品知识培训资料</a>
                        </li><?php endif; ?>
                    <?php if(session('test2') != 0 ): ?><li>
                            <a class="item" href="/index.php/Kefu/Proknowledge/paperlist" >产品知识培训测试</a>
                        </li><?php endif; ?>
                </ul><?php endif; ?>
                
                <?php if(session('sellskills') != 0 or session('test3') != 0): ?><h3><i class="icon icon-unfold"></i>销售技巧</h3>
                <ul class="side-sub-menu">
                    <?php if(session('sellskills') != 0 ): ?><li>
                            <a class="item" href="/index.php/Kefu/Sellskills/index" >销售技巧培训资料</a>
                        </li><?php endif; ?>
                    <?php if(session('test3') != 0 ): ?><li>
                            <a class="item" href="/index.php/Kefu/Sellskills/paperlist" >销售技巧培训测试</a>
                        </li><?php endif; ?>
                </ul><?php endif; ?>

                <?php if(session('speechcase') != 0 or session('practice') == 1): ?><h3><i class="icon icon-unfold"></i>话术案例</h3>
                <ul class="side-sub-menu">
                    <?php if(session('speechcase') != 0): ?><li>
                            <a class="item" href="/index.php/Kefu/Speechcase/index" >话术案例培训资料</a>
                        </li><?php endif; ?>
                    <?php if(session('practice') == 1): ?><li>
                            <a class="item" href="/index.php/Kefu/Speechcase/talking" >话术对练</a>
                        </li><?php endif; ?>
                </ul><?php endif; ?>

                <?php if(session('friend') != 0): ?><h3><i class="icon icon-unfold"></i>朋友圈展示</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/Kefu/Friend/index" >朋友圈展示资料</a>
                    </li>
                </ul><?php endif; ?>

                <h3><i class="icon icon-unfold"></i>成长任务</h3>
                <ul class="side-sub-menu">
                        <li>
                            <a class="item" href="/index.php/Kefu/Growth/gradelist" >成绩列表</a>
                        </li>
                    <?php if(session('task7') != 0): ?><li>
                            <a class="item" href="/index.php/Kefu/Growth/orderlist" >订单列表</a>
                        </li><?php endif; ?>
                </ul>
                
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <!-- <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div> -->
        <div id="main" class="main">
            
            <div class="breadcrumb">
                <span>您的位置:</span>
                
	<span>话术对练</span>
	

                
            </div>
            
            
<div>
	请登录百度商桥软件，用户名是：广宇07:<?php echo session('uname'); ?>，密码：123456
</div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">艾乐生物客服训练培训系统</div>
                <div class="fr">V1.0.170408</div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->

</body>
<script type="text/javascript">
+function(){
    var $window = $(window), $subnav = $("#subnav"), url;
    $window.resize(function(){
        $("#main").css("min-height", $window.height() - 130);
    }).resize();

    /* 左边菜单高亮 */
    url = window.location.pathname + window.location.search;
    url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
    $subnav.find("a[href='" + url + "']").parent().addClass("current");

    /* 左边菜单显示收起 */
    $("#subnav").on("click", "h3", function(){
        var $this = $(this);
        $this.find(".icon").toggleClass("icon-fold");
        $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
              prev("h3").find("i").addClass("icon-fold").end().end().hide();
    });

    $("#subnav h3 a").click(function(e){e.stopPropagation()});

    /* 头部管理员菜单 */
    $(".user-bar").mouseenter(function(){
        var userMenu = $(this).children(".user-menu ");
        userMenu.removeClass("hidden");
        clearTimeout(userMenu.data("timeout"));
    }).mouseleave(function(){
        var userMenu = $(this).children(".user-menu");
        userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
        userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
    });

    /* 表单获取焦点变色 */
    $("form").on("focus", "input", function(){
        $(this).addClass('focus');
    }).on("blur","input",function(){
                $(this).removeClass('focus');
            });
    $("form").on("focus", "textarea", function(){
        $(this).closest('label').addClass('focus');
    }).on("blur","textarea",function(){
        $(this).closest('label').removeClass('focus');
    });

    // 导航栏超出窗口高度后的模拟滚动条
    var sHeight = $(".sidebar").height();
    var subHeight  = $(".subnav").height();
    var diff = subHeight - sHeight; //250
    var sub = $(".subnav");
    if(diff > 0){
        $(window).mousewheel(function(event, delta){
            if(delta>0){
                if(parseInt(sub.css('marginTop'))>-10){
                    sub.css('marginTop','0px');
                }else{
                    sub.css('marginTop','+='+10);
                }
            }else{
                if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                    sub.css('marginTop','-'+(diff-10));
                }else{
                    sub.css('marginTop','-='+10);
                }
            }
        });
    }
}();
</script>



</html>