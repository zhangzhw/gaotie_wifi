<?php

//error_reporting(0);
$host='127.0.0.1';
$user='root';
$password='';
$database='gaotie';
$con=mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno($con))
{
	echo "连接MySQL失败：".mysqli_connect_error();
}
mysqli_set_charset($con,"utf8");


$sql="select * from device";
$result=mysqli_query($con, $sql);

$device=mysqli_fetch_all($result,MYSQLI_ASSOC);

echo "device_id:".$device[0]["device_id"]." left_bandwidth".$device[0]["left_bandwidth"];





?>
