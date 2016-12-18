<?php 
require_once 'api/get_methods.php';
require_once 'api/post_func.php';
require_once 'api/put_func.php';

if ($_SERVER['REQUEST_METHOD']=='POST')
{
	$post_data = file_get_contents('php://input');
	$data = json_decode($post_data, true);
	if($data["type"]==1)//首次接入的时候给予流量，及以后每次查询流量和权限        {"type":"1","device_id":"knimei","past_use":"120"}
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$result = search_recorder('Device_table', 'device_id', $device_id);

		$ret=array("left_bandwidth"=>"10000000","permission"=>"0");
		if(count($result)>0)
		{
			$ret["left_bandwidth"]=$result[0]["left_bandwidth"]-$past_use;
			$ret["permission"]=$result[0]["permission"];
			$toaluse=$result[0]["totaluse"]+$past_use;
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
			$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
			$data = array("device_id" => $device_id, "left_bandwidth" => (int)$ret["left_bandwidth"], "totaluse" => (int)0, "permission" => (int)0, "ison" => (int)1);	
			$output = post_fun($url,$data);
			
			
			echo json_encode($ret);
		}
	}
	elseif ($data["type"]==2)//获取任务列表   {"type":"2","device_id":"dec110"}
	{
		$device_id=$data["device_id"];
		$done = search_recorder('Task_done', 'device_id', $device_id);

		$task = get_table('Task_table');

		$result;
		
		function isinArray($data, $array, $col){
			foreach($array AS $uniqid => $row)  {
				if($row[$col] == $data[$col]){
					return 1;
				}
			}
			return 0;
		}
		
		if(count($done)>0)
		{

	     	foreach($task AS $uniqid => $row)  
	     	{
	     		if(!isinArray($row, $done, 'task_id'))
	     		{
	     			$result[]=$row;
	     		}    		
	     	}
		}
		else
			$result=$task;

		echo json_encode($result);
	}
	elseif($data["type"]==3)//广告地址              {"type":"3","task_id":3}
	{
		$task_id=$data["task_id"];
		$result = search_recorder('Ad_table', 'task_id', $task_id);

		echo json_encode($result);
	}
	elseif($data["type"]==4)//获取资源列表及其地址    不行，一测试就会把远端搞崩 
	{
		$table = 'Resoure_tb';
		$result = get_table($table);
		echo json_encode($result);
	}
	elseif ($data["type"]==5)//告诉我哪个任务已经完成了 {"type":"5","device_id":"dec110","past_use":"0","task_id":"3"}
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$task_id=$data["task_id"];

		$result = search_recorder('Task_table', 'task_id', $task_id);

		$add_bandwidth=$result[0]["bandwidth"];
		$add_premission=$result[0]["priority"];
		

		$res = search_recorder('Device_table', 'device_id', $device_id);

		$ret=array("left_bandwidth"=>"0","permission"=>"0");

		$ret["left_bandwidth"]=$res[0]["left_bandwidth"]+$add_bandwidth-$past_use;
		$ret["permission"]=$res[0]["permission"]+$add_premission;
		$toaluse=$res[0]["totaluse"]+$past_use;

  		$temp = search_recorder('Device_table', 'device_id', $device_id);
  		$result1 = $temp[0];

  		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
  		$result1['left_bandwidth'] = (int)$ret["left_bandwidth"];
		$result1['totaluse'] = (int)$toaluse;
 		$result1['permission'] = (int)$ret["permission"];

  		$output = put_fun($url,$result1['id'],$result1);


		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Task_done';

		$data = array("device_id" => $device_id, "task_id" => (int)$task_id);

		$output = post_fun($url,$data);
		
		echo json_encode($ret);
	}
	elseif($data["type"]==6)//告诉离开了 {"type":"6","device_id":"dec110","past_use":"0"}
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$result = search_recorder('Device_table', 'device_id', $device_id);

		$ret=array("left_bandwidth"=>"2048","permission"=>"0");
		$ret["left_bandwidth"]=$result[0]["left_bandwidth"]-$past_use;
		$ret["permission"]=$result[0]["permission"];
		$toaluse=$result[0]["totaluse"]+$past_use;

  		$temp = search_recorder('Device_table', 'device_id', $device_id);
  		$result1 = $temp[0];

  		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
  		$result1['left_bandwidth'] = (int)$ret["left_bandwidth"];
  		$result1['totaluse'] = (int)$toaluse;
  		$result1['ison'] = 0;

  		$output = put_fun($url,$result1['id'],$result1);

		echo json_encode($ret);
	}
	elseif ($data["type"]==7)//抢红包 {"type":"7","device_id":"dec110","past_use":"0"}
	{
		$device_id=$data["device_id"];
		$past_use=$data["past_use"];
		$add_bandwidth=rand(10,2048);

		$res = search_recorder('Device_table', 'device_id', $device_id);

		$ret=array("left_bandwidth"=>"0","permission"=>"0","add_bandwidth"=>$add_bandwidth);
		
		$ret["left_bandwidth"]=$res[0]["left_bandwidth"]+$add_bandwidth-$past_use;
		$ret["permission"]=$res[0]["permission"];
		$toaluse=$res[0]["totaluse"]+$past_use;

  		$temp = search_recorder('Device_table', 'device_id', $device_id);
  		$result1 = $temp[0];
  		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
  		$result1['left_bandwidth'] = (int)$ret["left_bandwidth"];
  		$result1['totaluse'] = (int)$toaluse;

  		$output = put_fun($url,$result1['id'],$result1);
  		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Task_done';
  			
  		$data = array("device_id" => $device_id, "task_id" => -1);
  			
  		$output = post_fun($url,$data);

		echo json_encode($ret);		
	}
	elseif($data["type"]==8)
	{
		$device_id=$data["device_id"];
		$result = search_recorder_double('Task_done', 'task_id', -1, 'device_id', $device_id);
		$ret=array("is_done"=>"0");
		if(count($result)>0)
		{
			$ret["is_done"]=1;
		}
		echo json_encode($ret);
	}
}


?>