<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="/Public/Admin/js/jquery-2.0.2.min.js"></script>
</head>
<style type="text/css">
#title{
	position:fixed;
	top:0px; 

	height: 30px;
	width: 100%;
	text-align: center;
	line-height: 30px;
	font-size: 20px;
}
#title>#shu{
	color: red;
}
ul{
	list-style:none;
	margin-top: 30px; 
}
ul>li{
	font-size: 16px;
	margin-top: 8px;
}
#btn{
	text-align: center;
}
</style>
<body>
	<div id="title">共勾选<span id="shu">0</span>道题</div>
	<ul>
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><li>
				<input type="checkbox" name="" class="checkboxid" value="<?php echo ($v["id"]); ?>">
				<span><?php echo ($v["question"]); ?></span>
			</li><?php endforeach; endif; ?>
	</ul>
</body>
<script type="text/javascript">
$(function() {
	$(".checkboxid").click(function(){
		var checkbox = $(".checkboxid");
		var num = 0;
		for (var i = 0; i < checkbox.length; i++) {
    		if (checkbox.eq(i).prop("checked")) {
    			num++;
    		}
    	}
    	$("#shu").html(num);
	});
})
</script>
</html>