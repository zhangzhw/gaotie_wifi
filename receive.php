<?php 
require 'conn.php';
require_once 'api/get_methods.php';
require_once 'api/post_func.php';
require_once 'api/put_func.php';

if ($_SERVER['REQUEST_METHOD']=='POST')
{
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);
	if($data["type"]==1)//首次接入的时候给予流量，及以后每次查询流量和权限        {"type":"3","device_id":"knimei","past_use":"120"}
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$sql="select * from device where device_id='".$device_id."'";
		//$result=exec_select_sql($sql);
		//******************* sql to api  *******************//
		$result = search_recorder('Device_table', 'device_id', $device_id);

		$ret=array("left_bandwidth"=>"2048","permission"=>"0");
		if(count($result)>0)
		{
			$ret["left_bandwidth"]=$result[0]["left_bandwidth"]-$past_use;
			$ret["permission"]=$result[0]["permission"];
			$toaluse=$result[0]["totaluse"]+$past_use;
			$sql="update device set left_bandwidth='".$ret["left_bandwidth"]."',totaluse='".$toaluse."', ison='1' where device_id='".$device_id."'";
			//exec_upt_sql($sql);
			//******************* sql to api  *******************//
  			$temp = search_recorder('Device_table', 'device_id', $device_id);
  			$result = $temp[0];

  			$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
  			$result['left_bandwidth'] = (int)$ret["left_bandwidth"];
  			$result['totaluse'] = (int)$toaluse;
  			$result['ison'] = 1;

  			$output = put_fun($url,$result['id'],$result);

			echo json_encode($ret);
		}
		else
		{
			$sql="insert into device values('".$device_id."',".$ret["left_bandwidth"].",0,0,1)";
			//exec_upt_sql($sql);
			//******************* sql to api  *******************//
			$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
			$data = array("device_id" => $device_id, "left_bandwidth" => (int)$ret["left_bandwidth"], "totaluse" => (int)0, "permission" => (int)0, "ison" => (int)1);	
			$output = post_fun($url,$data);
			
			
			echo json_encode($ret);
		}
	}
	elseif ($data["type"]==2)//获取任务列表
	{
		$device_id=$data["device_id"];
		$sql="select * from task_table where task_id not in (select task_id from task_done where device_id='".$device_id."')";
		//$result=exec_select_sql($sql);
		//******************* sql to api  *******************//
		$done = search_recorder('Task_done', 'device_id', $device_id);

		$task = search_recorder('Task_table', 'task_id', $task_id);

		$result;

	function isinArray($data, $array, $col){ 
      foreach($array AS $uniqid => $row)  {
        if($row[$col] == $data[$col]){
          return 1;
        }     
      }
      return 0;
	}	
		
     	foreach($task AS $uniqid => $row)  
     	{
     		if(!isinArray($row, $done, 'task_id'))
     		{
     			$result[]=$row;
     		}    		
     	}

		echo json_encode($result);
	}
	elseif($data["type"]==3)//广告地址              {"type":"3","task_id":3}
	{
		$task_id=$data["task_id"];
		$sql="select url from ad_table where task_id=".$task_id;
		//$result=exec_select_sql($sql);
    	//******************* sql to api  *******************//
		$result = search_recorder('Ad_table', 'task_id', $task_id);

		echo json_encode($result);
	}
	elseif($data["type"]==4)//获取资源列表及其地址 
	{
		$sql="select * from resoure_tb";
		//$result=exec_select_sql($sql);
    	//******************* sql to api  *******************//
   		$table = 'Resource_table';
    	$temp = get_table($table);

		echo json_encode($result);
	}
	elseif ($data["type"]==5)//告诉我哪个任务已经完成了
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$task_id=$data["task_id"];
		$sql="select * from task_table where task_id=".$task_id;
		//$result=exec_select_sql($sql);
		//******************* sql to api  *******************//
		$result = search_recorder('Task_table', 'task_id', $task_id);

		$add_bandwidth=$result[0]["bandwidth"];
		$add_premission=$result[0]["priority"];
		
		$sql="select * from device where device_id='".$device_id."'";
		//$res=exec_select_sql($sql);
		//******************* sql to api  *******************//
		$res = search_recorder('Device_table', 'device_id', $_POST["device_id"]);

		$ret=array("left_bandwidth"=>"0","permission"=>"0");

		$ret["left_bandwidth"]=$res[0]["left_bandwidth"]+$add_bandwidth-$past_use;
		$ret["permission"]=$res[0]["permission"]+$add_premission;
		$toaluse=$res[0]["totaluse"]+$past_use;
		$sql="update device set left_bandwidth='".$ret["left_bandwidth"]."',totaluse='".$toaluse."',permission='".$ret["permission"]."' where device_id='".$device_id."'";
		//exec_upt_sql($sql);
			//******************* sql to api  *******************//
  			$temp = search_recorder('Device_table', 'device_id', $device_id);
  			$result1 = $temp[0];

  			$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
  			$result1['left_bandwidth'] = (int)$ret["left_bandwidth"];
  			$result1['totaluse'] = (int)$toaluse;
  			$result1['permission'] = (int)$ret["permission"];

  			$output = put_fun($url,$result1['id'],$result1);

		$sql="insert into task_done values(".$task_id.",'".$device_id."')";
		//exec_upt_sql($sql);
			//******************* sql to api  *******************//
			$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Task_done';

			$data = array("device_id" => $device_id, "task_id" => (int)$task_id);

			$output = post_fun($url,$data);
		
		echo json_encode($ret);
	}
	elseif($data["type"]==6)//告诉离开了
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$sql="select * from device where device_id='".$device_id."'";
		$result=exec_select_sql($sql);
		//******************* sql to api  *******************//
		$result = search_recorder('Device_table', 'device_id', $device_id);

		$ret=array("left_bandwidth"=>"2048","permission"=>"0");
		$ret["left_bandwidth"]=$result[0]["left_bandwidth"]-$past_use;
		$ret["permission"]=$result[0]["permission"];
		$toaluse=$result[0]["totaluse"]+$past_use;
		$sql="update device set left_bandwidth='".$ret["left_bandwidth"]."',totaluse='".$toaluse."', ison='0' where device_id='".$device_id."'";
		//exec_upt_sql($sql);
			//******************* sql to api  *******************//
  			$temp = search_recorder('Device_table', 'device_id', $device_id);
  			$result1 = $temp[0];

  			$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
  			$result1['left_bandwidth'] = (int)$ret["left_bandwidth"];
  			$result1['totaluse'] = (int)$toaluse;
  			$result1['ison'] = 0;

  			$output = put_fun($url,$result1['id'],$result1);

		echo json_encode($ret);
	}
	elseif ($data["type"]==7)//抢红包
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$add_bandwidth=rand(10,2048);
		$sql="select * from device where device_id='".$device_id."'";
		//$res=exec_select_sql($sql);
		//******************* sql to api  *******************//
		$res = search_recorder('Device_table', 'device_id', $device_id);

		$ret=array("left_bandwidth"=>"0","permission"=>"0","add_bandwidth"=>$add_bandwidth);
		
		$ret["left_bandwidth"]=$res[0]["left_bandwidth"]+$add_bandwidth-$past_use;
		$ret["permission"]=$res[0]["permission"];
		$toaluse=$res[0]["totaluse"]+$past_use;
		$sql="update device set left_bandwidth='".$ret["left_bandwidth"]."',totaluse='".$toaluse."' where device_id='".$device_id."'";
		//exec_upt_sql($sql);
			//******************* sql to api  *******************//
  			$temp = search_recorder('Device_table', 'device_id', $device_id);
  			$result1 = $temp[0];

  			$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
  			$result1['left_bandwidth'] = (int)$ret["left_bandwidth"];
  			$result1['totaluse'] = (int)$toaluse;

  			$output = put_fun($url,$result1['id'],$result1);


		echo json_encode($ret);		
	}	
}


?>