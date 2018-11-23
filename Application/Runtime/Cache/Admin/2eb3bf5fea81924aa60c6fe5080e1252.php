<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>客服系统管理平台</title>
    
	<link rel="stylesheet" type="text/css" href="/Public/layui/css/layui.css">

    <!-- <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon"> -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <!-- <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css"> -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
    <script type="text/javascript" src="/Public/Admin/js/jquery-2.0.2.min.js"></script>
    
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/addtest.css">
	<style type="text/css">
		#table-top{
			text-align: center;
		}
	</style>

    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo">管理端</span>
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
                
                <li class="manager">你好，<em title=""><?php echo session('uname') ?></em></li>
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
                

            <?php if(session('u_role_id') == 1): ?><h3><i class="icon icon-unfold"></i>资料管理</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/Admin/Index/filelist">资料列表</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php/Admin/Index/index">发布资料</a>
                    </li>
                </ul>

                <h3><i class="icon icon-unfold"></i>题库管理</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/Admin/Test/index">试题列表</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php/Admin/Test/addtest">试题添加</a>
                    </li>
                </ul>

                <h3><i class="icon icon-unfold"></i>试卷管理</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/Admin/Paper/index">试卷列表</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php/Admin/Paper/addpaper">添加新试卷</a>
                    </li>
                </ul>

                <h3><i class="icon icon-unfold"></i>实习人员</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/Admin/Person/index">实习客服列表</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php/Admin/Person/notkefuindex">非客服实习人员列表</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php/Admin/Person/talking">话术对练</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php/Admin/Person/gradelist">成绩列表</a>
                    </li>
                </ul>
                
                <h3><i class="icon icon-unfold"></i>管理人员</h3>
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php/Admin/Peomanager/index">人员添加</a>
                    </li>
                </ul><?php endif; ?>
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
                
	<span>添加试卷</span>

                
            </div>
            
            
	<div id="row">添加试卷</div>
	<form action="/index.php/Admin/Paper/upload" method="post">
	<div id="table-top">
		<span>试卷所属：</span>
		<select name="fileid" id="fileid">
            <?php if(is_array($filetype)): foreach($filetype as $key=>$v): if($v["fileid"] != 5): ?><option value ="<?php echo ($v["fileid"]); ?>"><?php echo ($v["filename"]); ?></option><?php endif; endforeach; endif; ?>
        </select>
	</div>
	<div id="table-top">
		<span>&nbsp;试&nbsp;卷&nbsp;名：</span>
		<input type="text" placeholder="例如:公司制度培训测试2017-4-8" name="pname" >
	</div>
	<div id="table-top">
		<span>&nbsp;选&nbsp;择&nbsp;题：</span>
		<span>
			<i id="type1" ps="1" class="layui-icon" style="font-size: 18px; color: #3a4d5a;">&#xe61f;</i>
		</span>
		<input style="display: none;" type="text" name="type1" class="type1">
	</div>
	<div id="table-top">
		<span>&nbsp;判&nbsp;断&nbsp;题：</span>
		<span>
			<i id="type2" ps="2" class="layui-icon" style="font-size: 18px; color: #3a4d5a;">&#xe61f;</i>
		</span>
		<input style="display: none;" type="text" name="type2" class="type2" >
	</div>
	<div id="table-top">
		<span>&nbsp;多&nbsp;选&nbsp;题：</span>
		<span>
			<i id="type5" ps="5" class="layui-icon" style="font-size: 18px; color: #3a4d5a;">&#xe61f;</i>
		</span>
		<input style="display: none;" type="text" name="type5" class="type5" >
	</div>
	<div id="table-top">
		<span>&nbsp;简&nbsp;答&nbsp;题：</span>
		<span>
			<i id="type3" ps="3" class="layui-icon" style="font-size: 18px; color: #3a4d5a;">&#xe61f;</i>
		</span>
		<input style="display: none;" type="text" name="type3" class="type3" >
	</div>
	<div id="table-top">
		<input type="submit" name="" value="提交">
	</div>
	</form>

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
$(function(){
	$(".layui-icon").click(function() {
		var ps = $(this).attr("ps");
		var fileid = $("#fileid").val();
		show(fileid,ps);
	});

	$("#fileid").change(function() {
		$(".type1").val("");
		$(".type1").css("display","none");
		$(".type2").val("");
		$(".type2").css("display","none");
		$(".type3").val("");
		$(".type3").css("display","none");
		$(".type5").val("");
		$(".type5").css("display","none");
	});
});
</script>
<script type="text/javascript" src="/Public/layui/layui.js"></script>
<script type="text/javascript">
	function show(fileid,ps) {
		layui.use('layer', function(){
	    var layer = layui.layer;
	    var index = layer.open({
		    type: 2,
		    title: '请勾选',
		    shadeClose: true,
		    shade: 0.4,
		    area: '400px',
		    content: '/index.php/Admin/Paper/select?filetype='+fileid+'&type='+ps, //iframe的url
		    btn: '确认',yes: function (index, layero) {
		    	var frame = layer.getChildFrame('body', index);
		    	var checkbox=frame.find(".checkboxid");
		    	var str = "";
		    	for (var i = 0; i < checkbox.length; i++) {
		    		if (checkbox.eq(i).prop("checked")) {
		    			str += checkbox.eq(i).val()+",";
		    		}
		    	}
		    	
		    	str = str.substring(0,str.length-1);

		    	var type = ".type"+ps;
		    	if(str.length == 0){
		    		$(type).css("display","none");
		    	}
		    	else{
		    		$(type).css("display","inline-block");
		    		$(type).val(str);
		    	}
		    	layer.close(index);
		    }
		});
	});
	}
</script>

</html>