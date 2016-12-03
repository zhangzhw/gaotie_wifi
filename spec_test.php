<?php 
require 'conn.php';

// if (exec_upt_sql("insert into device(device_id,left_bandwidth,totaluse) values ('ssa',50,0)"))
// 	echo "\nchenggong";
// else
// 	echo "\nshibai";

$device=exec_select_sql("select * from device where device_id='dec110'");
echo count($device);
// echo "device_id:".$device[0]["device_id"]." left_bandwidth".$device[0]["left_bandwidth"];

?>