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
	background-color: aquamarine;
}
#title>#shu{
	color: red;
}
ul{
	list-style:none;
	margin-top: 30px; 
}
ul>li{
	font-size: 14px;
	margin-top: 8px;
}
.grade{
	width: 60px;
}

</style>
<body>
<div>
	<div id="title">共得分：<span id="shu">0</span></div>
	<ul>
		<?php $i=1; ?>
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><li>
				
				<?php if(is_array($question)): foreach($question as $key=>$v2): if($v2["id"] == $v['qid']): ?><div id="wt">
							<span><?php echo $i++; ?>、</span>
							<span><?php echo ($v2["question"]); ?></span>
						</div>
						<div id="daan">
							<span>参考答案：</span>
							<span><?php echo ($v2["answer"]); ?></span>
						</div><?php endif; endforeach; endif; ?>
				<div id="hd">
					<span>回答：</span>
					<span><?php echo ($v["qanswer"]); ?></span>
				</div>
				<div id="df">
					<span>得分：</span>
					<input class="grade" type="text" name="grade" value="">
				</div>
			</li><?php endforeach; endif; ?>
	</ul>
</div>
</body>
<script type="text/javascript">
$(function() {
	$(".grade").change(function(){
		var grade = $(".grade");
		var num = 0;
		for (var i = 0; i < grade.length; i++) {
			if (grade.eq(i).val() == "") {
				var a = 0;
			}
			else{
				var a = parseFloat(grade.eq(i).val());
			}
			num = num + a; 
    	}
    	$("#shu").html(num);
	});
})
</script>
</html>