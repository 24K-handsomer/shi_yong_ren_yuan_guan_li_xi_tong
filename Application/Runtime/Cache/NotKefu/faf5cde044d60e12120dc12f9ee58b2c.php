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
    
	<link rel="stylesheet" type="text/css" href="/Public/Kefu/css/filelist.css">

    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo">非客服人员</span>
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
                        <a class="item" href="/index.php/NotKefu/Comsys/index" >公司制度培训资料</a>
                    </li>
                    <?php if(session('test1') != 0 ): ?><li>
                            <a class="item" href="/index.php/NotKefu/Comsys/paperlist" >公司制度培训测试</a>
                        </li><?php endif; ?>
                </ul>
                
                <?php if(session('proknowledge') == 1): ?><h3><i class="icon icon-unfold"></i>产品知识</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/NotKefu/Proknowledge/index" >产品知识培训资料</a>
                    </li>
                    <?php if(session('test2') != 0 ): ?><li>
                            <a class="item" href="/index.php/NotKefu/Proknowledge/paperlist" >产品知识培训测试</a>
                        </li><?php endif; ?>
                </ul><?php endif; ?>
                
                <?php if(session('sellskills') == 1): ?><h3><i class="icon icon-unfold"></i>销售技巧</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/NotKefu/Sellskills/index" >销售技巧培训资料</a>
                    </li>
                    <?php if(session('test3') != 0 ): ?><li>
                            <a class="item" href="/index.php/NotKefu/Sellskills/paperlist" >销售技巧培训测试</a>
                        </li><?php endif; ?>
                </ul><?php endif; ?>

                <?php if(session('speechcase') == 1): ?><h3><i class="icon icon-unfold"></i>话术案例</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/NotKefu/Speechcase/index" >话术案例培训资料</a>
                    </li>
                    <?php if(session('practice') == 1): ?><li>
                            <a class="item" href="/index.php/NotKefu/Speechcase/talking" >话术对练</a>
                        </li><?php endif; ?>
                </ul><?php endif; ?>

                <?php if(session('friend') ==1): ?><h3><i class="icon icon-unfold"></i>朋友圈展示</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/NotKefu/Friend/index" >朋友圈展示资料</a>
                    </li>
                </ul><?php endif; ?>

                <h3><i class="icon icon-unfold"></i>成长任务</h3>
                <ul class="side-sub-menu">
                        <li>
                            <a class="item" href="/index.php/NotKefu/Growth/gradelist" >成绩列表</a>
                        </li>
                    <?php if(session('task7') != 0): ?><li>
                            <a class="item" href="/index.php/NotKefu/Growth/orderlist" >订单列表</a>
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
                
	<span>公司制度培训资料</span>

                
            </div>
            
            
	<div id="row">
    </div>
	<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>标题</td>
			<td>发布者</td>
			<td>文件类型</td>
			<td>发布时间</td>
			<td>操作</td>
		</tr>

		<?php $i=($p-1)*$limit+1; ?>
		<?php if(is_array($filelist)): foreach($filelist as $key=>$v): ?><tr id="">
			<td><?php echo $i++; ?></td>
			<td><?php echo ($v["title"]); ?></td>
			<td><?php echo ($v["author"]); ?></td>
			<td>
			<?php if(is_array($filetype)): foreach($filetype as $key=>$vv): if($v["filetype"] == $vv['fileid']): echo ($vv["filename"]); endif; endforeach; endif; ?>
			</td>
			<td><?php echo ($v["createtime"]); ?></td>
			<td>
				<a href="/index.php/NotKefu/Comsys/showfile?id=<?php echo ($v["id"]); ?>">查看</a>
			</td>
		</tr><?php endforeach; endif; ?>

	</table>
	<div id="page"><?php echo ($show); ?></div>

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

<script type="text/javascript">

</script>

</html>