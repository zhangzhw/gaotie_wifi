<?php

require_once "log_func.php";

function get_fun($url){//
	if($url == null)
		return 0;	
	//echo $url;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);

	$output = curl_exec($ch);
	if(curl_errno($ch))
		$output = 0;
	curl_close($ch);

	$log_data = array("timestamp" => time(), "method" => 'GET',"url" => $url, "status" => $output);
	log_recoder($log_data);
	return $output;
}

//$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/test3/Usertable' . '/?userid=5';
//$id = 1480834024398;
//$output = get_fun($url);
//print_r($output);
?>