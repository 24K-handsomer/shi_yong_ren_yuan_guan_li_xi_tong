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
				<span><?php echo ($v["title"]); ?></span>
			</li><?php endforeach; endif; ?>
		<li>
			<input type="checkbox" name="guanbi" class="checkboxid" value="0">
			<span style="color: red;">关闭该功能</span>
		</li>
	</ul>
	<input type="hidden" name="zhong" value="<?php echo ($zhong); ?>">
</body>
<script type="text/javascript">
$(function() {
	function in_array(search,array){
	    for(var i in array){
	        if(array[i]==search){
	            return true;
	        }
	    }
	    return false;
	}

	//显示已经选中的
	var zhong = $("input[name='zhong']").val();
	var zhongarr = zhong.split(",");

	var jc = $(".checkboxid");
	jc.prop("checked",false);
	for(var i=0;i<jc.length;i++){
		if(in_array(jc.eq(i).val(),zhongarr)){
			jc.eq(i).prop("checked",true);
		}
	}


	$(".checkboxid").click(function(){
		var checkbox = $(".checkboxid");
		var num = 0;
		var str = '';
		for (var i = 0; i < checkbox.length; i++) {
    		if (checkbox.eq(i).prop("checked")) {
    			num++;
    			str += checkbox.eq(i).val()+",";
    		}
    	}
    	$("#shu").html(num);
    	str = str.substring(0,str.length-1);
    	$("input[name='zhong']").val(str);
	});


	//当选中“关闭”时，以上选中的都将清空
	$("input[name='guanbi']").click(function(){
		if ($("input[name='guanbi']").prop("checked")) {
			var checkbox = $(".checkboxid");
			for (var i = 0; i < checkbox.length-1; i++) {
				jc.eq(i).prop("checked",false);
			}
		}
	});
})
</script>
</html>