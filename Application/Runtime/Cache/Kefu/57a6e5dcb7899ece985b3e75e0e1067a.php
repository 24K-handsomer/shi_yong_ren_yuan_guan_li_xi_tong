<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
body{
	text-align: center;
}
table{
	width: 100%;
    text-align: center;
}
</style>
<body>
	<div>成长任务展示</div>
	<table border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td></td>
			<td>7天</td>
			<td>14天</td>
			<td>21天</td>
			<td>30天</td>
			<td>总</td>
		</tr>
		<tr>
			<td>任务</td>
			<td><?php echo ($task["task7"]); ?></td>
			<td><?php echo ($task["task14"]); ?></td>
			<td><?php echo ($task["task21"]); ?></td>
			<td><?php echo ($task["task30"]); ?></td>
			<td></td>
		</tr>
		<tr>
			<td>填单量</td>
			<td><?php echo ($sum7); ?></td>
			<td><?php echo ($sum14); ?></td>
			<td><?php echo ($sum21); ?></td>
			<td><?php echo ($sum30); ?></td>
			<td><?php echo ($sumnow); ?></td>
		</tr>
		</tr>
	</table>
</body>
</html>