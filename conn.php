<?php
function exec_select_sql($sql)
{	
	$host='127.0.0.1';
	$user='root';
	$password='root';
	$database='gaotie';
	$con=mysqli_connect($host,$user,$password,$database);
	if(mysqli_connect_errno($con))
	{
		echo "连接MySQL失败：".mysqli_connect_error();
	}
	mysqli_set_charset($con,"utf8");
// 	echo $sql;
	$result=mysqli_query($con, $sql);
	$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
	mysqli_close($con);
	return $data;
	
}

function exec_upt_sql($sql)
{
	$host='127.0.0.1';
	$user='root';
	$password='root';
	$database='gaotie';
	$con=mysqli_connect($host,$user,$password,$database);
	if(mysqli_connect_errno($con))
	{
		echo "连接MySQL失败：".mysqli_connect_error();
	}
	mysqli_set_charset($con,"utf8");
// 	echo $sql;
	$result=mysqli_query($con, $sql);
	mysqli_close($con);
	return $result;
}

// $device=execsql("select * from device where 1=1");
//echo "device_id:".$device[0]["device_id"]." left_bandwidth".$device[0]["left_bandwidth"];
?>
