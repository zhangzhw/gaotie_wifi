<?php
require_once 'conn.php';
require_once 'api/delete_func.php';
require_once 'api/get_methods.php';

$task_id=$_GET["task_id"];
$task_name=$_GET["task_name"];
$subject_id=$_GET["subject_id"];
$sql1="delete from questionnaire where task_id=".$task_id." and subject_id=".$subject_id;
	//******************* sql to api  *******************//
	$temp = search_recorder_double('Questionnaire', 'task_id', $task_id,'subject_id', $subject_id);
	if(count($temp) != 0){
		$id = $temp[0]['id'];
		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Questionnaire';
		$output = delete_fun($url,$id);
	}

$sql2="delete from subject where task_id=".$task_id." and subject_id=".$subject_id;
	//******************* sql to api  *******************//
	$subject = search_recorder_double('Subject', 'task_id', $task_id,'subject_id', $subject_id);
	if(count($subject) > 0){
		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Subject';
		foreach($subject AS $uniqid => $row)
			$output = delete_fun($url1,$row['id']);
	}

$sql3="delete from answers where task_id=".$task_id." and subject_id=".$subject_id;
	//******************* sql to api  *******************//
	$answer = search_recorder_double('Answers', 'task_id', $task_id,'subject_id', $subject_id);
	if(count($answer) > 0){
		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Answers';
		foreach($answer AS $uniqid => $row)
			$output = delete_fun($url1,$row['id']);
	}

	echo "<script language='javascript'>alert('删除成功');location.href='questionnaire_list.php?task_id=".$task_id."&task_name=".$task_name."';</script>";
/*
if(exec_upt_sql($sql1)&&exec_upt_sql($sql2)&&exec_upt_sql($sql3))
{
	echo "成功";
	echo "<script language='javascript'>alert('删除成功');location.href='questionnaire_list.php?task_id=".$task_id."&task_name=".$task_name."';</script>";
}
	
else
	echo "<script language='javascript'>alert('删除失败');location.href='questionnaire_list.php?task_id=".$task_id."&task_name=".$task_name."';</script>";
*/

?>