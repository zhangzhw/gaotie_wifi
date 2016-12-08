<?php 
require 'conn.php';
if ($_SERVER['REQUEST_METHOD']=='POST')
{
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);

	if($data["type"]==1)//首次接入的时候给予流量
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$sql="select * from device where device_id='".$device_id."'";
		$result=exec_select_sql($sql);
		$ret=array("left_bandwidth"=>"2048","permission"=>"0");
		if(count($result)>0)
		{
			$ret["left_bandwidth"]=$result[0]["left_bandwidth"]-$past_use;
			$ret["permission"]=$result[0]["permission"];
			$toaluse=$result[0]["totaluse"]+$past_use;
			$sql="update device set left_bandwidth='".$ret["left_bandwidth"]."',totaluse='".$toaluse."' where device_id='".$device_id."'";
			exec_upt_sql($sql);
			echo json_encode($ret);
		}
		else
		{
			$sql="insert into device values('".$device_id."',".$ret["left_bandwidth"].",0,0)";
			exec_upt_sql($sql);
			echo json_encode($ret);
		}
	}
	elseif ($data["type"]==2)//获取任务列表
	{
		$device_id=$data["device_id"];
		$sql="select * from task_table where task_id not in (select task_id from task_done where device_id='".$device_id."')";
		$result=exec_select_sql($sql);
		echo json_encode($result);
	}
	
	
}


?>