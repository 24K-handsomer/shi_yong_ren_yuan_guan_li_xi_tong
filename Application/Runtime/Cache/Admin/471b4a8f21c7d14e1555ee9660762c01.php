<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>客服系统管理平台</title>
    
    <!-- <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon"> -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <!-- <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css"> -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
    <script type="text/javascript" src="/Public/Admin/js/jquery-2.0.2.min.js"></script>
    
	<script type="text/javascript" src='/Public/ueditorpro/ueditor.config.js'></script>
    <script type="text/javascript" src='/Public/ueditorpro/ueditor.all.min.js'></script>
    <script type="text/javascript" src='/Public/ueditorpro/lang/zh-cn/zh-cn.js'></script>
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/index.css">

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
                
	<span>公司资料提交发布</span>

                
            </div>
            
            
	<div id="body">
	<form name='MyForm' id='MyForm' method='POST' action="/index.php/Admin/Index/update" >
		<input type="hidden" name="id" value="<?php echo ($file["id"]); ?>">
		<div id="row">
	        <div id="rowname">&nbsp;标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</div>
	        <input type="text" name="title" id="title" value="<?php echo ($file["title"]); ?>">
	    </div>
	    <div id="row">
	        <div id="rowname">&nbsp;发&nbsp;布&nbsp;者：</div>
	        <input type="text" name="author" id="author" value="<?php echo ($file["author"]); ?>">
	    </div>
	    <div id="row">
	        <span>文件类型：</span>
	        <select name="filetype">
	            <?php if(is_array($filetype)): foreach($filetype as $key=>$v): if($v["fileid"] == $file['filetype']): ?><option selected="selected" value ="<?php echo ($v["fileid"]); ?>"><?php echo ($v["filename"]); ?></option>
	            	<?php else: ?>
	            		<option value ="<?php echo ($v["fileid"]); ?>"><?php echo ($v["filename"]); ?></option><?php endif; endforeach; endif; ?>
	        </select>
	    </div>
        <div id="row-other">
		    <div id="rowname">具体内容</div>
	        <input name="content" type="hidden" id="content">
	        <script id="editor" name="editor" type="text/plain" style="height:400px">
	        	<?php echo ($file["content"]); ?>
	        </script>
		</div>
	    <div id="sub">
	        <button onclick="submitEditor()"/>提交</button>
	    </div>
	</form>
	<button onclick="getneirong()"/>查看内容</button>
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

<script type="text/javascript">
    //实例化编辑器
    var ue = UE.getEditor('editor',{
    	scaleEnabled:true
    });
    
    //提交方法
    function submitEditor()    {
        //此处以非空为例
        if(ue.hasContents()){
            ue.sync();       //同步内容(内容里的图片)
            document.MyForm.content.value=ue.getContent();
            document.MyForm.submit();
        }
    }
    function getneirong(){
    	alert(ue.getContent());
    }
</script>

</html>