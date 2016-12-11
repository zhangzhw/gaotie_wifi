<?php

require_once "log_func.php";

function delete_fun($url,$id){//
	if($url == null)
		return 0;
	if($id != 0)
		$url = $url . '/' . $id;	
	//echo $url;
	$ch = curl_init();                  
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');                                                      
	$output = curl_exec($ch);
	if(curl_errno($ch))
		$output = 0;
	curl_close($ch);

	$log_data = array("timestamp" => time(), "method" => 'DELETE',"url" => $url, "status" => $output);
	log_recoder($log_data);
	return $output;
}

//$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
//$id = 1481166528306;
//$output = delete_fun($url,$id);
//print_r($output);
?>