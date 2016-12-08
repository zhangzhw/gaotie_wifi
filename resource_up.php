<?php
require_once 'conn.php';
function getname($exname){
	$dir = "resource/adviertisement/private/";
	$i=1;
	$str = "0123456789abcdefghijklmnopqrstuvwxyz";
	$n = 4; 
	$len = strlen($str)-1;
	$s="";
	for($i=0 ; $i<$n; $i++){
		$s .=  $str[rand(0,$len)];
	}
	$timestamp=time();
	return $dir.$timestamp.$s.".".$exname;
}
$task_id;

if (is_array($_GET)&&count($_GET)>0)
{
	$task_id=$_GET["task_id"];
}

if (is_array($_POST)&&count($_POST)>0)
{
	$exname=strtolower(substr($_FILES["file"]["name"],(strrpos($_FILES["file"]["name"],'.')+1)));	
	$uploadfile = getname($exname);	
	move_uploaded_file($_FILES["file"]["tmp_name"],$uploadfile);
	$resource_name=$_POST["resource_name"];
	$priority=$_POST["priority"];
	
	$sql="insert into resoure_tb(res_id,url,res_name,priority) values(NULL,'".$uploadfile."','".$resource_name."',".$priority.")";
	echo $sql;
	if(exec_upt_sql($sql))
	 	echo "<script>javascript:alert('添加成功。');location.href='resource_up.php';</script>";
}
?>


<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>资源上传</title>

<body>

<form action="resource_up.php" method="post" enctype="multipart/form-data">
<table border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="width:100%;border-collapse:collapse">
<tr>
	<td>
	资源名称:
	</td>
	<td>
	<input type="text" name="resource_name" />
	</td>
</tr>

<tr>
	<td>
	需求的权限等级:
	</td>
	<td>
	<input type="text" name="priority" />
	</td>
</tr>
<tr>
	<td>
	请选择文件:
	</td>
	<td>
	<input type="file" name="file" id="file" />
	</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" name="submit" value="添加" />
</td>
</tr>
</table>
</form>

</body>
</html>