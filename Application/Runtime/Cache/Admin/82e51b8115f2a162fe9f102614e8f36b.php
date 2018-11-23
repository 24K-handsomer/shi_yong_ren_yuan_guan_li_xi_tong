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
    
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/filelist.css" media="all">
	<!-- 客服人员列表css引用 资料列表 css -->  

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
                
	<span>添加新人</span>

                
            </div>
            
            
	<div>添加新人</div>
	<form action="/index.php/Admin/Peomanager/addpeople" method="post">
		<div id="tarow">
			<span>姓名：</span>
			<span><input type="text" name="uname"></span>
		</div>
		<div id="tarow">
			<span>密码：</span>
			<span><input type="text" name="pwd"></span>
		</div>
		<div id="tarow">
			<span>所属部门小组：</span>
			<select name="group">
	            <?php if(is_array($grouplist)): foreach($grouplist as $key=>$v): ?><option value ="<?php echo ($v["group_id"]); ?>"><?php echo ($v["group_name"]); ?></option><?php endforeach; endif; ?>
	        </select>
			<span>&nbsp;&nbsp;&nbsp;</span>
			<span>添加新部门</span>
			<span>
				<i onclick="show()" id="type1" ps="1" class="layui-icon" style="font-size: 18px; color: #3a4d5a;">&#xe61f;</i>
			</span>
		</div>
		<div id="tarow">
			<span>人员身份：</span>
			<input type="radio" name="role" value="1">管理人员
			<span>&nbsp;&nbsp;</span>
			<input type="radio" name="role" value="2">实习客服
			<span>&nbsp;&nbsp;</span>
			<input type="radio" name="role" value="3">非客服实习人员
		</div>
		<div id="tarow">
			<input type="submit" name="" value="注册">
		</div>
	</form>
	
	<table border="1" cellpadding="0" cellspacing="0">
		<caption>管理人员列表</caption>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>姓名</td>
			<td>密码</td>
			<td>部组名</td>
			<td>创建时间</td>
			<td>操作</td>
		</tr>

		<?php $i=($p-1)*$limit+1; $j=0; ?>
		<?php if(is_array($list)): foreach($list as $key=>$v3): ?><tr>
			<td>
				<input type="checkbox" name="checkboxid" xu="<?php echo ++$j; ?>" ps="<?php echo ($v3["uid"]); ?>">
			</td>
			<td><?php echo $i++; ?></td>
			<td>
				<?php echo ($v3["uname"]); ?>
			</td>
			<td>
				<?php echo ($v3["pwd"]); ?>
			</td>
			<td>
				<?php if(is_array($grouplist)): foreach($grouplist as $key=>$vg): if($vg["group_id"] == $v3['group']): echo ($vg["group_name"]); endif; endforeach; endif; ?>
			</td>
			<td><?php echo ($v3["crtime"]); ?></td>
			<td>
				
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

<script type="text/javascript" src="/Public/layui/layui.js"></script>
<script type="text/javascript">
function show() {
	layui.use('layer', function(){
	    var layer = layui.layer;
	    layer.prompt({title: '添加新部门小组', formType: 0}, function(pass, index){
	    	addgroup(pass);
		    layer.close(index);
		});
	});
}
function addgroup(pass) {
	$.ajax({
		url:"/index.php/Admin/Peomanager/addgroup",
		data:{name:pass},
		type:"POST",
		dataType:"JSON",
		success:function (data) {
			var z=data['z'];
			switch (z) {
				case 0:
					alert("添加失败！");
					break;
				case 1:
					var str = "<option selected='selected' value='"+data['id']+"'>"+data['name']+"</option>"
					$("select[name='group'] option:last-child").after(str);
					break;
				default:
					alert("抱歉，后台未接收到传出去的值");
					break;
			}
		}
	});
}
</script>

</html>