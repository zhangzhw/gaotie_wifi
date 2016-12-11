<?php

//require_once"get_func.php";
//require_once "put_func.php";
//require_once "post_func.php";
//require_once "delete_func.php";

function log_recoder($data){//
	$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt_backup/Log_table';
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
	return $output;
}


//$data = array("timestamp" => time(), "method" => 'GET',"url" => 'gt_backup/Log_table', "status" => 'error');
//$output = log_recoder($data);
//echo "</br>output:</br>";
//print_r($output);

?>