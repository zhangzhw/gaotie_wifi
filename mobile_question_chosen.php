<?php
require_once 'conn.php';
session_start();

$task_id;
if (is_array($_GET)&&count($_GET)>0)
{
	$task_id=$_GET["task_id"];
	$device_id=$_GET["device_id"];
	$sql="select * from task_table where task_id=".$task_id;
	$result=exec_select_sql($sql);
	$_SESSION["task_name"]=$result[0]["task_name"];
	$_SESSION["device_id"]=$device_id;
	$_SESSION["priority"]=$result[0]["priority"];
	$_SESSION["bandwith"]=$result[0]["bandwith"];
	$index=0;
	$sql="select * from questionnaire where task_id=".$task_id;
	$data=exec_select_sql($sql);
	header("Location:mobile_questionnaire.php?data=".json_encode($data)."&index=".$index);
	
	
}




?>