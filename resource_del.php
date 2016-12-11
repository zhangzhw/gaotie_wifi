<?php
require_once 'conn.php';
$res_id=$_GET["res_id"];
$sql="delete from resoure_tb where res_id=".$res_id;
$temp = search_recorder('Resoure_tb', 'res_id', $res_id);
if(count($temp) != 0){
	$id = $temp[0]['id'];
	$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Resoure_tb';
	$output = delete_fun($url,$id);
}

//if(exec_upt_sql($sql))
	echo "<script language='javascript'>alert('删除成功');location.href='resource_list.php';</script>";

?>