<?php
require_once 'conn.php';
$task_id=$_GET["task_id"];
$task_name=$_GET["task_name"];
$subject_id=$_GET["subject_id"];
$sql1="delete from questionnaire where task_id=".$task_id." and subject_id=".$subject_id;
$sql2="delete from subject where task_id=".$task_id." and subject_id=".$subject_id;
$sql3="delete from answers where task_id=".$task_id." and subject_id=".$subject_id;

if(exec_upt_sql($sql1)&&exec_upt_sql($sql2)&&exec_upt_sql($sql3))
{
	echo "成功";
	echo "<script language='javascript'>alert('删除成功');location.href='questionnaire_list.php?task_id=".$task_id."&task_name=".$task_name."';</script>";
}
	
else
	echo "<script language='javascript'>alert('删除失败');location.href='questionnaire_list.php?task_id=".$task_id."&task_name=".$task_name."';</script>";


?>