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
    
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/addtest.css">

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
                
	<span>添加试题</span>

                
            </div>
            
            
	<div id="row">添加试题</div>
	<form action="/index.php/Admin/Test/upload" method="post">
	<div id="table-top">
		<span>考试类别1:</span>
		<select name="fileid" id="fileid">
            <?php if(is_array($filetype)): foreach($filetype as $key=>$v): if($v["fileid"] != 5): ?><option value ="<?php echo ($v["fileid"]); ?>"><?php echo ($v["filename"]); ?></option><?php endif; endforeach; endif; ?>
        </select>
        <span>考试类别2:</span>
        <select name="typeid" id="typeid">
            <?php if(is_array($questiontype)): foreach($questiontype as $key=>$vv): if($vv["typeid"] != 4): ?><option value ="<?php echo ($vv["typeid"]); ?>"><?php echo ($vv["tyname"]); ?></option><?php endif; endforeach; endif; ?>
        </select>
	</div>

	
	<table border="1" cellpadding="0" cellspacing="0" id="test">
		<tr>
			<td>题目内容：</td>
			<td>
				<textarea name='content' id='content'></textarea>
			</td>
		</tr>

		<tr>
			<td>选项数目：</td>
			<td>
				<select name='shumu' id="shumu">
					<option value ='4'>4</option>
					<option value ='3'>3</option>
					<option value ='2'>2</option>
					<option value ='1'>1</option>
				</select>
			</td>
		</tr>

		<!-- <tr>
			<td>选项答案：</td>
			<td>
				<input type='radio' name='panduan' id='panduan' value='1' >对
				<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type='radio' name='panduan' id='panduan' value='0' >错
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type='submit' name='' value='提交'>
			</td>
		</tr> -->

		<!-- <tr>
			<td>参考答案</td>
			<td>
				<textarea id='answer'></textarea>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type='submit' name='' value='提交'>
			</td>
		</tr> -->
	
		<tr>
			<td rowspan='4'>选项</td>
			<td>
				<input type='radio' name='select' value='1'>:
				<input type='text' name='select1' id='1'>
			</td>
		</tr>
		<tr>
			<td>
				<input type='radio' name='select' value='2'>:
				<input type='text' name='select2' id='2'>
			</td>
		</tr>
		<tr>
			<td>
				<input type='radio' name='select' value='3'>:
				<input type='text' name='select3' id='3'>
			</td>
		</tr>
		<tr>
			<td>
				<input type='radio' name='select' value='4'>:
				<input type='text' name='select4' id='4'>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type='submit' name='' value='提交'>
			</td>
		</tr>

	</table>
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
$(function () {
	/*确认试题类型*/
	$("#typeid").change(function(){
		$("#test").empty();
		var typeid=$("#typeid").val();
		show(typeid);
	});

	/*根据不同试题类型展现页面*/
	function show(typeid) {
		var str = "<tr><td>题目内容：</td><td><textarea name='content' id='content'></textarea></td></tr>";
		if(typeid == 1){
			str += "<tr><td>选项数目：</td><td><select name='shumu' id='shumu'><option value ='4'>4</option><option value ='3'>3</option><option value ='2'>2</option><option value ='1'>1</option></select></td></tr>";
			str += "<tr><td rowspan='4'>选项</td><td><input type='radio' name='select' value='1'>:<input type='text' name='select1' id='1'></td></tr>";
			str += "<tr><td><input type='radio' name='select' value='2'>:<input type='text' name='select2' id='2'></td></tr>";
			str += "<tr><td><input type='radio' name='select' value='3'>:<input type='text' name='select2' id='3'></td></tr>";
			str += "<tr><td><input type='radio' name='select' value='4'>:<input type='text' name='select2' id='4'></td></tr>";
			str += "<tr><td></td><td><input type='submit' name='' value='提交'></td></tr>";

		}
		else if(typeid == 2){
			str += "<tr><td>选项答案：</td><td>";
			str += "<input type='radio' name='panduan' id='panduan' value='1' >对<span>&nbsp;&nbsp;&nbsp;&nbsp;</span><input type='radio' name='panduan' id='panduan' value='0' >错</td></tr>";
			str += "<tr><td></td><td><input type='submit' name='' value='提交'></td></tr>";
		}
		else if(typeid == 3){
			str += "<tr><td>参考答案</td><td><textarea name='answer' id='answer'></textarea></td></tr>";
			str += "<tr><td></td><td><input type='submit' name='' value='提交'></td></tr>";
		}
		else if(typeid == 5){  //多选题
			str += "<tr><td>选项数目：</td><td><select name='duoxuan' id='duoxuan'><option value ='4'>4</option><option value ='3'>3</option><option value ='2'>2</option><option value ='1'>1</option></select></td></tr>";
			str += "<tr><td rowspan='4'>选项</td><td><input type='checkbox' class='checkboxid' name='checkbox1' value='1'>:<input type='text' name='select1' id='1'></td></tr>";
			str += "<tr><td><input type='checkbox' class='checkboxid' name='checkbox2' value='2'>:<input type='text' name='select2' id='2'></td></tr>";
			str += "<tr><td><input type='checkbox' class='checkboxid' name='checkbox3' value='3'>:<input type='text' name='select3' id='3'></td></tr>";
			str += "<tr><td><input type='checkbox' class='checkboxid' name='checkbox4' value='4'>:<input type='text' name='select4' id='4'></td></tr>";
			str += "<tr><td><input type='hidden' name='answer' value='' ></td><td><input type='submit' name='' value='提交'></td></tr>";
		}
		else{
			alert("注意：不能选择‘所有’！");
		}

		$("#test").html(str);

	}

	/*选择题确认选项数目*/
	$(document).on("change","#shumu",function(){
		$("#shumu").parent().parent().nextAll().empty();
		var shumu=$("#shumu").val();
		showselect(shumu);
	});

	/*多选题确认数目*/
	$(document).on("change","#duoxuan",function(){
		$("#duoxuan").parent().parent().nextAll().empty();
		var shumu=$("#duoxuan").val();
		showcheckbox(shumu);
	});
	/*多选题确认选中*/
	$(document).on("change",".checkboxid",function(){
		var str = "";
		var checkbox = $(".checkboxid");
		for (var i = 0; i < checkbox.length; i++) {
			if (checkbox.eq(i).prop("checked")) {
				str += checkbox.eq(i).val() + "|";
			}
		}
		str = str.substring(0,str.length-1);
		$("input[name='answer']").val(str);
	});

	function showselect(shumu) {
		var str1 = "";
		for(var i=1; i<=shumu; i++){
			if(i == 1){
				str1 += "<tr><td rowspan='"+shumu+"'>选项</td><td><input type='radio' name='select' value='"+i+"'>:<input type='text' name='select1' id='"+i+"' value=''></td></tr>";
			}
			else{
				str1 += "<tr><td><input type='radio' name='select' value='"+i+"'>:<input type='text' name='select"+i+"' id='"+i+"' value=''></td></tr>";
			}
		}
		str1 += "<tr><td></td><td><input type='submit' name='' value='提交'></td></tr>";
		$("#shumu").parent().parent().after(str1);
	}


	function showcheckbox(shumu) {
		var str1 = "";
		for(var i=1; i<=shumu; i++){
			if(i == 1){
				str1 += "<tr><td rowspan='"+shumu+"'>选项</td><td><input type='checkbox' class='checkboxid' name='checkbox1' value='"+i+"'>:<input type='text' name='select1' id='"+i+"' value=''></td></tr>";
			}
			else{
				str1 += "<tr><td><input type='checkbox' class='checkboxid' name='checkbox"+i+"' value='"+i+"'>:<input type='text' name='select"+i+"' id='"+i+"' value=''></td></tr>";
			}
		}
		str1 += "<tr><td><input type='hidden' name='answer' value='' ></td><td><input type='submit' name='' value='提交'></td></tr>";
		$("#duoxuan").parent().parent().after(str1);
	}
});
</script>

</html>