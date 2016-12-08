<?php
require_once 'conn.php';
$task_id=$_GET["task_id"];
$type=$_GET["type"];
$sql1="delete from task_table where task_id=".$task_id;

if($type==2)
{
	$sql2="delete from ad_table where task_id=".$task_id;
	if(exec_upt_sql($sql1)&&exec_upt_sql($sql2))
		echo "<script language='javascript'>alert('删除成功');location.href='mission_list.php';</script>";
	else
		echo "<script language='javascript'>alert('删除失败');location.href='mission_list.php';</script>";
	
}else if($type==1)
{

	$sql2="delete from questionnaire where task_id=".$task_id;
	$sql3="delete from subject where task_id=".$task_id;
	$sql4="delete from answers where task_id=".$task_id;
	if(exec_upt_sql($sql1)&&exec_upt_sql($sql2)&&exec_upt_sql($sql3)&&exec_upt_sql($sql4))
		echo "<script language='javascript'>alert('删除成功');location.href='mission_list.php';</script>";
		else
			echo "<script language='javascript'>alert('删除失败');location.href='mission_list.php';</script>";

}

?>