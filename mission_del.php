<?php
require_once 'api/delete_func.php';
require_once 'api/get_methods.php';

$task_id=$_GET["task_id"];
$type=$_GET["type"];
$sql1="delete from task_table where task_id=".$task_id;
//******************* sql to api  *******************//
$id = search_id('Task_table', 'task_id', $task_id);
$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Task_table';
$output = delete_fun($url,$id);


if($type==2)
{
	$sql2="delete from ad_table where task_id=".$task_id;
	//******************* sql to api  *******************//
	$id = search_id('Ad_table', 'task_id', $task_id);
	$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Ad_table';
	$output = delete_fun($url,$id);
	echo "<script language='javascript'>alert('删除成功');location.href='mission_list.php';</script>";

}else if($type==1)
{

	$sql2="delete from questionnaire where task_id=".$task_id;
	//******************* sql to api  *******************//
	$id = search_id('Questionnaire', 'task_id', $task_id);
	$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Questionnaire';
	$output = delete_fun($url,$id);

	$sql3="delete from subject where task_id=".$task_id;
	//******************* sql to api  *******************//
	$subject = search_recorder('Subject', 'task_id', $task_id);
	if(count($subject) >0){
		$url1 = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Subject';
		foreach($subject AS $uniqid => $row)
			$output = delete_fun($url1,$row['id']);
		
	}


	$sql4="delete from answers where task_id=".$task_id;
    //******************* sql to api  *******************//
	$answers = search_recorder('Answers', 'task_id', $task_id);
	if(count($answers) >0){
		$url2 = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Answers';
		foreach($answers AS $uniqid => $row)
			$output = delete_fun($url2,$row['id']);
	}


	echo "<script language='javascript'>alert('删除成功');location.href='mission_list.php';</script>";


}

?>