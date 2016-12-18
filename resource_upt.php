<?php 
require_once 'api/put_func.php';
require_once 'api/get_methods.php';

$res_id;
if (is_array($_GET)&&count($_GET)>0)
{
	$res_id=$_GET["id"];
}
if (is_array($_POST)&&count($_POST)>0)
{

  $temp = search_recorder('Resoure_tb', 'res_id', $res_id);
  $result = $temp[0];

  $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Resoure_tb';
  $result['res_name'] = $_POST["res_name"];
  $result['priority'] = (int)$_POST["priority"];

  $output = put_fun($url,$result['id'],$result);

	echo "<script>javascript:alert('修改成功!');location.href='resource_list.php';</script>";
}
$result = search_recorder('Resoure_tb', 'res_id', $res_id);

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>流量权限修改</title>
</head>
<body>
<form id="form1" name="form1" method="post" action=<?php echo "resource_upt.php?id=".$res_id?>>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
      <tr><td style="width: 10%">资源名</td><td><input name='res_name' type='text' value='<?php echo $result[0]["res_name"];?>' /></td></tr>
      <tr><td style="width: 10%">权限要求</td><td><input name='priority' type='text'  value='<?php echo $result[0]["priority"];?>'/></td></tr>   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>




</body>


