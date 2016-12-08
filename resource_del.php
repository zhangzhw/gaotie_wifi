<?php
require_once 'conn.php';
$res_id=$_GET["res_id"];
$sql="delete from resoure_tb where res_id=".$res_id;
if(exec_upt_sql($sql))
	echo "<script language='javascript'>alert('删除成功');location.href='resource_list.php';</script>";
else
	echo "<script language='javascript'>alert('删除失败');location.href='resource_list.php';</script>";
?>