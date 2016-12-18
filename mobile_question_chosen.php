<?php
require_once 'api/get_methods.php';
session_start();

$task_id;
if (is_array($_GET)&&count($_GET)>0)
{
	$task_id=$_GET["task_id"];
	$device_id=$_GET["device_id"];

	$result = search_recorder('Task_table', 'task_id', $task_id);

	$_SESSION["task_name"]=$result[0]["task_name"];
	$_SESSION["device_id"]=$device_id;
	$_SESSION["priority"]=$result[0]["priority"];
	$_SESSION["bandwidth"]=$result[0]["bandwidth"];
	$index=0;

	$data = search_recorder('Questionnaire', 'task_id', $task_id);

	header("Location:mobile_questionnaire.php?data=".json_encode($data)."&index=".$index);
	
	
}




?>