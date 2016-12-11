<?php

require_once "log_func.php";

function post_fun($url,$data){//
	if($url == null)
		return 0;
	if($data == null)
		return 0;
	//echo $url;
	$data_string = json_encode($data);
	$ch = curl_init($url);                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    	'Content-Type: application/json',                                                                                
    	'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                 
	$output = curl_exec($ch);
	if(curl_errno($ch))
		$output = 0;
	curl_close($ch);

	$log_data = array("timestamp" => time(), "method" => 'POST',"url" => $url, "status" => $output);
	log_recoder($log_data);
	return $output;
}

//$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
//$data = array("device_id" => "fdskf-dsjf-feinve", "left_bandwith" => 1000, "total_use" => 200, "priority" => 2);
/*
$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Task_table';


//$data = array("task_id" => 1, "task_name" => "旅游意愿调查", "bandwidth" => 1024, "priority" => 3 , "type" => 1);
$data = array("task_id" => 2, "task_name" => "个人信息调查", "bandwidth" => 1024, "priority" => 1 , "type" => 1);

$output = post_fun($url,$data);
echo "</br>output:</br>";
print_r($output);
*/
?>