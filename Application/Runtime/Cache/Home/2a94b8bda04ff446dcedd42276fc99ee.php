<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>登录注册</title>
    <link rel="stylesheet" href="/Public/Home/css/index.css" />
    <link rel="shortcut icon" href="/Public/Home/img/tubiao.ico"/>
	<link rel="bookmark" href="/Public/Home/css/tubiao.ico"/>
</head>
<body>
<div id="biaoti">乐艾实习人员系统</div>
<div id="jiemian" style="display: block;">
	<h1>登录</h1>
	<form action="/index.php/Home/Index/loginHandle" method="post">
	<div id="name">姓&nbsp;&nbsp;&nbsp;名：<input type="text" name="name"/></div>
	<div id="pwd">密&nbsp;&nbsp;&nbsp;码：<input type="password" name="pwd"/></div>
	<div id="yzm">
		<div>验证码：</div>
		<input type="text" name="yzm"/>
		<img class="yzm" src="/index.php/Home/Index/yzm"/>
	</div>
	<!-- <a href="">忘记密码</a> -->
	<input type="submit" class="loginBtn" value="登录"/>
	<!-- <a id="zuce">注册</a> -->
	</form>
</div>

<div id="jiemian" class="register" style="display: none;">
	<h1>注册</h1>
	<form action="/index.php/Home/Index/register" method="post">
	<div id="name">姓&nbsp;&nbsp;&nbsp;名：<input id="re-name" type="text" name="name"/></div>
	<div id="pwd">密&nbsp;&nbsp;&nbsp;码：<input id="re-pwdone" type="password" name="pwdone"/></div>
	<div id="pwd">确认密码：<input id="re-pwd" type="password" name="pwd"/></div>
	<div id="yzm">
		<div>验证码：</div>
		<input id="re-yzm" type="text" name="yzm"/>
		<img class="yzm" src="/index.php/Home/Index/yzm"/>
	</div>
	<div>
		<span>部门小组：</span>
		<select name="group">
			<?php if(is_array($grouplist)): foreach($grouplist as $key=>$vg): ?><option value="<?php echo ($vg["group_id"]); ?>"><?php echo ($vg["group_name"]); ?></option><?php endforeach; endif; ?>
		</select>
	</div>
	<input type="submit" class="loginBtn" value="注册"/>
	</form>
</div>

</body>
<script type="text/javascript" src='/Public/Home/js/jquery-2.0.2.min.js'></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(".yzm").click(function(){
        $(this).attr("src","/index.php/Home/Index/yzm");
    });

    $("#zuce").click(function(){
    	$(".register").attr("style","display:block;");
    	$("#jiemian").attr("style","display:none;");
    });


    $("#re-yzm").click(function() {
    	var a = $("#re-pwdone").val();
    	var b = $("#re-pwd").val();
    	if (a != b) {
    		alert("两次密码不一样！");
    	}
    });


    

});
</script>
</html>