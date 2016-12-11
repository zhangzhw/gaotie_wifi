<?php

require_once "log_func.php";

function put_fun($url,$id,$data){//
	if($url == null)
		return 0;
	if($data == null)
		return 0;
	if($id == null)
		return 0;
	if($id != 0)
		$url = $url . '/' . $id;	
	//echo $url;
	$data_string = json_encode($data);
	$ch = curl_init();                  
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                    
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    	'Content-Type: application/json',                                                                         
    	'Content-Length: ' . strlen($data_string)
    	)                                                                       
	);                                                                                                             
	$output = curl_exec($ch);
	if(curl_errno($ch))
		$output = 0;
	curl_close($ch);
	
	$log_data = array("timestamp" => time(), "method" => 'PUT',"url" => $url, "status" => $output);
	log_recoder($log_data);
	return $output;
}

//$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/test3/Usertable';
//$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Task_table';

//$data = array("userid" => 3, "username" => "test");
//$id = 1480834024398;
//$output = put_fun($url,$id,$data);
//print_r($output);
?>