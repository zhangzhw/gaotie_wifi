<?php 
require_once 'conn.php';

$task_id;
if (is_array($_GET)&&count($_GET)>0)
{
	$task_id=$_GET["task_id"];
}
if (is_array($_POST)&&count($_POST)>0)
{
	$sql="update task_table  set task_name='".$_POST["task_name"]."',bandwidth=".$_POST["bandwidth"].",priority=".$_POST["priority"]." where task_id=".$task_id;
	if(exec_upt_sql($sql))
		echo "<script>javascript:alert('修改成功!');location.href='mission_list.php';</script>";
	else
		echo "<script>javascript:alert('修改失败!');location.href='mission_list.php';</script>";
}
$sql="select * from task_table where task_id=".$task_id;
$result=exec_select_sql($sql);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>流量权限修改</title>
</head>
<body>
<form id="form1" name="form1" method="post" action=<?php echo "mission_upt.php?task_id=".$task_id?>>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
      <tr><td style="width: 10%">任务名</td><td><input name='task_name' type='text' value='<?php echo $result[0]["task_name"];?>' /></td></tr>
      <tr><td style="width: 10%">任务类型</td><td><?php 	if($result[0]["type"]==1)
      														echo "问卷";
      													else
      														echo "公益广告";
      													?></td></tr>
      <tr><td style="width: 10%">奖励流量</td><td><input name='bandwidth' type='text'  value='<?php echo $result[0]["bandwidth"];?>'/></td></tr>
      <tr><td style="width: 10%">奖励权限</td><td><input name='priority' type='text'  value='<?php echo $result[0]["priority"];?>'/></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>




</body>


