<?php
//require_once 'conn.php';
require_once 'api/get_methods.php';
$video_name;
$id;
$type;
$sql;
$result;
if (is_array($_GET)&&count($_GET)>0)
{
	$id=$_GET["id"];
	$video_name=$_GET["name"];
	$type=$_GET["type"];
	if($type==1){
		$sql="select * from ad_table where task_id=".$id;
  		//******************* sql to api  *******************//	
  		$result = search_recorder('Ad_table', 'task_id', $id);
  		//$result = $temp[0];
	}		
	else{
		$sql="select * from resoure_tb where res_id=".$id;
		//******************* sql to api  *******************//
		$result = search_recorder('Resoure_tb', 'res_id', $id);
  		//$result = $temp[0];
	}
		
}

//$result=exec_select_sql($sql);
$url=$result[0]["url"];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Zhangzhiwei">
	<title>查看视频</title>
</head>
<body>
<div style="text-align:center">
	<h1><?php echo $video_name;?></h1>
	<video src=<?php echo $url;?> controls="controls" >
	你的浏览器不支持
	</video>
</div>
	


</body>
</html>