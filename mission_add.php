<?php
require_once 'conn.php';
if (is_array($_POST)&&count($_POST)>0)
{
	$sql="insert into task_table(task_id,task_name,bandwidth,priority,type) values(NULL,'".$_POST["task_name"]."',".$_POST["bandwidth"].",".$_POST["priority"].",".$_POST["type"].")";
	exec_upt_sql($sql);
	$sql="select * from task_table where task_name='".$_POST["task_name"]."'";
	$result=exec_select_sql($sql);
	if($_POST["type"]==1)
	 	echo "<script>javascript:alert('添加成功，请继续添加题目。');location.href='questionnaire_add.php?task_id=".$result[0]["task_id"]."&task_name=".$_POST["task_name"]."';</script>";
	elseif ($_POST["type"]==2)
		echo "<script>javascript:alert('添加成功，请继续添加公益广告。');location.href='upload_file.php?task_id=".$result[0]["task_id"]."';</script>";
		
}


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>任务添加</title>
</head>

<body>
<p>任务添加</p>
<form action="" method="post">
<table border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="width:100%;border-collapse:collapse">
<tr>
	<td style="width: 10%">
	任务类型
	</td>
	<td>
	<select name="type">
		<option value=1>问卷</option>
		<option value=2>公益广告</option>
	</select>
	</td>
</tr>

<tr>
	<td style="width: 10%">	任务名称	</td>
	<td>
	<input type="text" name="task_name"/>
	</td>
</tr>

<tr>
	<td style="width: 10%" >	奖励流量	</td>
	<td>
		<input type="text" name="bandwidth"/>
	</td>
</tr>

<tr>
	<td style="width: 10%" >	奖励权限	</td>
	<td>
		<input type="text" name="priority"/>
	</td>
</tr>

<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="添加" style='border:solid 1px #000000; color:#666666' /></td>
</tr>


</table>

</form>
</body>



</html>