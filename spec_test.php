<?php 
require 'conn.php';
// $data=array("device_id"=>"dec110","past_use"=>"10");


// $device_id=$data["device_id"];
// $past_use=$data["past_use"];
// $sql="select * from device where device_id='".$device_id."'";
// $result=exec_select_sql($sql);

// $ret=array("left_bandwidth"=>"2048","permission"=>"0");
// if(count($result)>0)
// {
	
// 	$ret["left_bandwidth"]=$result[0]["left_bandwidth"]-$past_use;
// 	$ret["permission"]=$result[0]["permission"];
// 	$toaluse=$result[0]["totaluse"]+$past_use;
// 	$sql="update device set left_bandwidth='".$ret["left_bandwidth"]."',totaluse='".$toaluse."' where device_id='".$device_id."'";
// 	exec_upt_sql($sql);
// }

$device_id="fds";
$sql="insert into device values('".$device_id."',,,)";
echo $sql;
exec_upt_sql($sql);


?>