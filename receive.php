<?php 
require 'conn.php';
if ($_SERVER['REQUEST_METHOD']=='POST')
{
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);

	if($data["type"]==1)//首次接入的时候给予流量，及以后每次查询流量和权限
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
			$sql="update device set left_bandwidth='".$ret["left_bandwidth"]."',totaluse='".$toaluse."', ison='1' where device_id='".$device_id."'";
			exec_upt_sql($sql);
			echo json_encode($ret);
		}
		else
		{
			$sql="insert into device values('".$device_id."',".$ret["left_bandwidth"].",0,0,1)";
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
	elseif($data["type"]==3)//广告地址
	{
		$task_id=$data["task_id"];
		$sql="select url from ad_table where task_id=".$task_id;
		$result=exec_select_sql($sql);
		echo json_encode($result);
	}
	elseif($data["type"]==4)//获取资源列表及其地址
	{
		$sql="select * from resoure_tb";
		$result=exec_select_sql($sql);
		echo json_encode($result);
	}
	elseif ($data["type"]==5)//告诉我哪个任务已经完成了
	{
		$device_id=$data["device_id"];
		$task_id=$data["task_id"];
		$sql="insert into task_done values(".$task_id.",'".$device_id."')";
		exec_upt_sql($sql);
	}
	elseif($data["type"]==6)//告诉离开了
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$sql="select * from device where device_id='".$device_id."'";
		$result=exec_select_sql($sql);
		$ret=array("left_bandwidth"=>"2048","permission"=>"0");
		$ret["left_bandwidth"]=$result[0]["left_bandwidth"]-$past_use;
		$ret["permission"]=$result[0]["permission"];
		$toaluse=$result[0]["totaluse"]+$past_use;
		$sql="update device set left_bandwidth='".$ret["left_bandwidth"]."',totaluse='".$toaluse."', ison='0' where device_id='".$device_id."'";
		exec_upt_sql($sql);
		echo json_encode($ret);
	}
	
}


?>