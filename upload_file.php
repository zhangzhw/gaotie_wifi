<?php
require_once 'api/post_func.php';
function getname($exname){
	$dir = "resource/adviertisement/public/";
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

	$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Ad_table';
	$data = array("task_id" => (int)$task_id, "url" => $uploadfile);
	$output = post_fun($url,$data);

	echo "<script>javascript:alert('添加成功,点击确定返回。');location.href='mission_add.php';</script>";
}
?>


<html>
<body>

<form action=<?php echo "upload_file.php?task_id=".$task_id;?> method="post" enctype="multipart/form-data">
<label for="file">请选择文件:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>