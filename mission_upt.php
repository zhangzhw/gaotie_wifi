<?php 
require_once 'api/get_methods.php';
require_once 'api/put_func.php';

$task_id;
if (is_array($_GET)&&count($_GET)>0)
{
	$task_id=$_GET["task_id"];
}
if (is_array($_POST)&&count($_POST)>0)
{
  $temp = search_recorder('Task_table', 'task_id', $task_id);
  $result = $temp[0];

  $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Task_table';
  $result['task_name'] = $_POST["task_name"];
  $result['bandwidth'] = (int)$_POST["bandwidth"];
  $result['priority'] = (int)$_POST["priority"];

  $output = put_fun($url,$result['id'],$result);

  echo "<script>javascript:alert('修改成功!');location.href='mission_list.php';</script>";

}
$result = search_recorder('Task_table', 'task_id', $task_id);
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


