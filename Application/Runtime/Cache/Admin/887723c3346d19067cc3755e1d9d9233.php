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
	<!-- 客服人员列表css引用 资料列表css -->  

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
                
	<span>非客服实习人员列表</span>

                
            </div>
            
            
	<div id="row">
	<form name='MyForm' id='MyForm' method='GET' action="/index.php/Admin/Person/notkefuindex" style ="padding-bottom:10px;">
        <span>搜&nbsp;&nbsp;&nbsp;索&nbsp;&nbsp;人&nbsp;&nbsp;名：</span>
        <input type="text" name="uname" placeholder="输入人名">
        <input type="submit" name="" value="搜索">
    </form>
    
	<form name='MyForm' id='MyForm' method='GET' action="/index.php/Admin/Person/notkefuselectgroup" >
        <span>搜索部门小组：</span>
        <select name="group">
        	<?php if(is_array($grouplist)): foreach($grouplist as $key=>$vg): ?><option value="<?php echo ($vg["group_id"]); ?>"><?php echo ($vg["group_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        <input type="submit" name="" value="搜索">
    </form>
    </div>


	<table border="1" cellpadding="0" cellspacing="0">
		<caption>非实习客服人员列表</caption>
		<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>姓名</td>
			<td>密码</td>
			<td>部组名</td>
			<td>公司制度测试</td>
			
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
				<?php if($v3["isexam"] == 1): ?><a class="isexam" ps="<?php echo ($v3["uid"]); ?>" style="color: red;cursor: pointer;"><?php echo ($v3["uname"]); ?></a>
				<?php else: ?>
					<?php echo ($v3["uname"]); endif; ?>
			</td>
			<td>
				<?php echo ($v3["pwd"]); ?>
			</td>
			<td>
				<?php if(is_array($grouplist)): foreach($grouplist as $key=>$vg): if($vg["group_id"] == $v3['group']): echo ($vg["group_name"]); endif; endforeach; endif; ?>
			</td>
			<td>
				<?php if($v3["test1"] == 0): ?><input class="add" type="submit" name="test1" xu="<?php echo $j; ?>" ps="<?php echo ($v3["uid"]); ?>" test="<?php echo ($v3["test1"]); ?>" value="开通">
				<?php else: ?>
					<input class="add" type="submit" name="test1" xu="<?php echo $j; ?>" ps="<?php echo ($v3["uid"]); ?>" test="<?php echo ($v3["test1"]); ?>" value="添加"><?php endif; ?>
			</td>
			
			<td><?php echo ($v3["crtime"]); ?></td>
			<td>
				<!-- <a href="/index.php/Admin/Person/task?id=<?php echo ($v3["uid"]); ?>">查看</a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
				<!-- <a href="">编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
				<?php if($v3["status"] == 1): ?><input type="submit" class="status" name="status" xu="<?php echo $j ?>" ps="<?php echo ($v3["uid"]); ?>" status="<?php echo ($v3["status"]); ?>" value="禁用">
				<?php else: ?>
				<input type="submit" class="status" name="status" xu="<?php echo $j ?>" ps="<?php echo ($v3["uid"]); ?>" status="<?php echo ($v3["status"]); ?>" value="启用"><?php endif; ?>
			</td>
		</tr><?php endforeach; endif; ?>
		<tr>
			<td>
				<input type="submit" name="all" value="全选" >
			</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>
				<input type="submit" name="add1" value="添加试题">
			</td>
			
			<td></td>
			<td></td>
		</tr>
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
 $(function(){

 	//人员状态
 	$("input[name='status']").click(function(){
 		var st=$(this).attr("status");
 		var ps=$(this).attr("ps");
 		var xu=$(this).attr("xu")-1;
 		$.ajax({
 			url:"/index.php/Admin/Person/status",
 			data:{status:st,id:ps},
 			type:"POST",
 			dataType:"JSON",
 			success:function (data) {
 				//console.log(data);
 				var z=data['z'];
 				var sta=data['status'];
 				switch (z) {
 					case 0:
 						alert("未修改成功！");
 						break;
 					case 1:
 						if(sta == 1){
 							$("input[name='status']").eq(xu).attr("status",sta);
 							$("input[name='status']").eq(xu).val("禁用");
 						}
 						else{
 							$("input[name='status']").eq(xu).attr("status",sta);
 							$("input[name='status']").eq(xu).val("启用");
 						}
 						break;
 					default:
 						alert("抱歉，后台未接收到传出去的值");
 						break;
 				}
 			}
 		});
 	});


 	//开通话术对练
 	$("input[name='practice']").click(function(){
 		var st=$(this).attr("test");  //practice值，1或0
 		var ps=$(this).attr("ps");    //uid
 		var xu=$(this).attr("xu")-1;  //第几个
 		
 		$.ajax({
 			url:"/index.php/Admin/Person/practice",
 			data:{practice:st,id:ps},
 			type:"POST",
 			dataType:"JSON",
 			success:function (data) {
 				//console.log(data);
 				var z=data['z'];
 				var sta=data['practice'];
 				switch (z) {
 					case 0:
 						alert("未修改成功！");
 						break;
 					case 1:
 						if(sta == 1){
 							var str ="请使用“账号:广宇07  密码:ABCabc666”登录百度商桥客户端为该实习客服添加一个新的普通客服账号！或联系技术人员进行配置添加！！";
 							alert(str);
 							
 							$("input[name='practice']").eq(xu).attr("test",sta);
 							$("input[name='practice']").eq(xu).val("关闭");
 						}
 						else{
 							$("input[name='practice']").eq(xu).attr("test",sta);
 							$("input[name='practice']").eq(xu).val("开通");
 						}
 						break;
 					default:
 						alert("抱歉，后台未接收到传出去的值");
 						break;
 				}
 			}
 		});
 	});


 	//产品知识、销售技巧、话术案例、朋友圈展示等开通关闭
 	$(".chang").click(function(){
 		var te=$(this).attr("test"); //用户的test里的内容
 		var ps=$(this).attr("ps");  //用户的uid
 		var name=$(this).attr("name"); //存着proknowledge,或sellskills,或speechcase,或friend
 		var xu=$(this).attr("xu")-1;

 		/*$.ajax({
 			url:"/index.php/Admin/Person/chang",
 			data:{id:ps,keyname:name,keyvalue:te},
 			type:"POST",
 			dataType:"JSON",
 			success:function (data) {
 				//console.log(data);
 				var z=data['z'];
 				var sta=data['keyvalue'];
 				switch (z) {
 					case 0:
 						alert("未修改成功！");
 						break;
 					case 1:
 						var a = "input[name='"+name+"']";
 						if(sta == 1){
 							$(a).eq(xu).attr("test",sta);
 							$(a).eq(xu).val("关闭");
 						}
 						else{
 							$(a).eq(xu).attr("test",sta);
 							$(a).eq(xu).val("启用");
 						}
 						break;
 					default:
 						alert("抱歉，后台未接收到传出去的值");
 						break;
 				}
 			}
 		});*/


 		layui.use('layer', function(){
		    var layer = layui.layer;
		    var index = layer.open({
			    type: 2,
			    title: '请勾选',
			    shadeClose: true,
			    shade: 0.4,
			    area: '400px',
			    content: '/index.php/Admin/Person/selectfile?name='+name+'&test='+te, //iframe的url
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

			    	//console.log(name,ps,str);
			    	if(str.length > 0){
			    		addtest(name,ps,str,xu);
			    	}
			    	layer.close(index);
			    }
			});
		});
 		
 	});


 	//从“正在考试中”，解锁出来
 	$(".isexam").click(function(){
 		alert("该人员正在考试中，你确定把他从“考试中”解锁出来");
 		var ps = $(this).attr("ps"); //用户的uid
 		var a = $(this).parent("td");
 		var name = $(this).text();

		$.ajax({
			url:"/index.php/Admin/Admin/isexam",
			data:{uid:ps},
			type:"POST",
			dataType:"JSON",
			success:function(data){
				var z = data["z"];
				if(z == 1){
					a.html(name);
					console.log("一切OK，静等结果");
				}
				else if(z == 0) {
					console.log("请告知管理员，考试成绩未输入数据库");
				}
				else{
					console.log("数据未传入后台服务器，出现bug！");
				}
			}
		});
 	});


 	//公司制度测试 思路：点击之后跳出弹窗，并选择要添加的试卷
 	$(".add").click(function(){
 		var te=$(this).attr("test"); //用户的test里的内容
 		var ps=$(this).attr("ps");  //用户的uid
 		var name=$(this).attr("name"); //存着test1,或test2,或test3
 		var xu=$(this).attr("xu")-1;
 		show(name,te,ps,xu);
 	});
 });
</script>
<script type="text/javascript" src="/Public/layui/layui.js"></script>
<script type="text/javascript">
function show(name,te,ps,xu) {
	layui.use('layer', function(){
	    var layer = layui.layer;
	    var index = layer.open({
		    type: 2,
		    title: '请勾选',
		    shadeClose: true,
		    shade: 0.4,
		    area: '400px',
		    content: '/index.php/Admin/Person/select?name='+name+'&test='+te, //iframe的url
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

		    	//console.log(name,ps,str);
		    	if(str.length > 0){
		    		addtest(name,ps,str,xu);
		    	}
		    	layer.close(index);
		    }
		});
	});
}

function addtest(name,ps,str,xu){
	var zd = name;
	var id = ps;
	var test = str;
	$.ajax({
		url:"/index.php/Admin/Person/addtest",
		data:{uid:id,zd:zd,test:test},
		type:"POST",
		dataType:"JSON",
		success:function (data) {
			var z=data['z'];
			switch (z) {
				case 0:
					alert("添加失败");
					break;
				case 1:
					var a = "input[name='"+zd+"']";
					$(a).eq(xu).attr("test",data['test']);
					switch (data['test']) {
						case '0':
							$(a).eq(xu).val("开通");
							break;
						default:
							$(a).eq(xu).val("添加");
							alert("ok");
							break;
					}
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