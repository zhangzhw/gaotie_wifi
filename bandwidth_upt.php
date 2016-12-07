<?php 
require_once 'conn.php';

$device_id;
$result;
if (is_array($_GET)&&count($_GET)>0)
{
	$device_id=$_GET["device_id"];
}
if (is_array($_POST)&&count($_POST)>0)
{
	$sql="update device  set left_bandwidth=".$_POST["left_bandwidth"].",permission=".$_POST["permission"]." where device_id='".$device_id."'";
	exec_upt_sql($sql) ;
	echo "<script>javascript:alert('修改成功!');location.href='bandwidth_query.php';</script>";
}
$sql="select * from device where device_id='".$device_id."'";
$result=exec_select_sql($sql);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>流量权限修改</title>
</head>
<body>
<form id="form1" name="form1" method="post" action=<?php echo "bandwidth_upt.php?device_id=".$device_id?>>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 

      <tr><td style="width: 10%">设备号</td><td><?php echo $result[0]["device_id"];?></td></tr>
      <tr><td style="width: 10%">剩余流量</td><td><input name='left_bandwidth' type='text' value='<?php echo $result[0]["left_bandwidth"];?>' /></td></tr>
      <tr><td style="width: 10%">总共使用流量</td><td><?php echo $result[0]["totaluse"];?></td></tr>
      <tr><td style="width: 10%">权限等级</td><td><input name='permission' type='text'  value='<?php echo $result[0]["permission"];?>'/></td></tr>   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>




</body>


