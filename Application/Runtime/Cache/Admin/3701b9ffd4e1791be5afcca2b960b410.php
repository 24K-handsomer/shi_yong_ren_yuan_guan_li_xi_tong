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
    
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/filelist.css">

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
                
	<span>成绩列表</span>

                
            </div>
            
            
	<div id="row">
	<form name='MyForm' id='MyForm' method='GET' action="/index.php/Admin/Person/gradelist" style="padding-bottom:10px; " >
        <span>实习客服姓名：</span>
        <input type="text" name="uname">
        <input type="submit" name="" value="搜索">
    </form>
    <form name='MyForm' id='MyForm' method='GET' action="/index.php/Admin/Person/gradelistgroup" >
        <span>搜索部门小组：</span>
        <select name="group">
        	<?php if(is_array($grouplist)): foreach($grouplist as $key=>$vg): ?><option value="<?php echo ($vg["group_id"]); ?>"><?php echo ($vg["group_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        <input type="submit" name="" value="搜索">
    </form>
    </div>
	<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>姓名</td>
			<td>试卷类型</td>
			<td>试卷名字</td>
			<td>选择判断题得分</td>
			<td>简答题得分</td>
			<td>总分</td>
		</tr>

		<?php $i=($p-1)*$limit+1; ?>
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr id="">
				<td><?php echo $i++; ?></td>
				<td><?php echo ($v["uname"]); ?></td>
				<td>
				<?php if(is_array($filetype)): foreach($filetype as $key=>$vv): if($v["filetype"] == $vv['fileid']): echo ($vv["filename"]); endif; endforeach; endif; ?>
				</td>
				<td><?php echo ($v["pname"]); ?></td>
				<td><?php echo ($v["grade1"]); ?></td>
				<td>
				<?php if($v["isgrade2"] == 1): echo ($v["grade2"]); ?>
				<?php else: ?>
					<input type="submit" name="pigai" ps="<?php echo ($v["grade2"]); ?>" gid="<?php echo ($v["gid"]); ?>" value="批改"><?php endif; ?>
				</td>
				<td><?php echo ($v["grade"]); ?></td>
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
 	$("input[name='pigai']").click(function() {
 		var gid = $(this).attr("gid");
		var ps = $(this).attr("ps");
		show(gid,ps);
	});
</script>
<script type="text/javascript" src="/Public/layui/layui.js"></script>
<script type="text/javascript">
	function show(gid,ps) {
		layui.use('layer', function(){
		    var layer = layui.layer;
		    var index = layer.open({
			    type: 2,
			    title: '请勾选',
			    shadeClose: true,
			    shade: 0.4,
			    area: ['1000px','600px'],
			    content: '/index.php/Admin/Person/gradeselect?grade2='+ps, //iframe的url
			    btn: '确认',yes: function (index, layero) {
			    	var frame = layer.getChildFrame('body', index);
			    	var checkbox=frame.find("#shu");
			    	var shu = checkbox.html();
			    	updategrade2(gid,shu);
			    	layer.close(index);
			    }
			});
		});
	}


	function updategrade2(gid,shu){
		var id = gid;
		var su = shu;
		$.ajax({
			url:"/index.php/Admin/Person/updategrade2",
			data:{gid:id,grade2:su},
			type:"POST",
			dataType:"JSON",
			success:function (data) {
				var z=data['z'];
				switch (z) {
					case 0:
						alert("批改失败！");
						break;
					case 1:
						window.location.reload();
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