<?php 
require_once 'get_func.php';

function get_table($table){//
	if($table == null)
		return 0;	
	//echo $url;
    $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/' . $table;
    //echo $url;
    $output = get_fun($url);
    $temple = json_decode($output,true);
    $result = $temple[$table];
	return $result;
}

function search_recorder($table, $row, $value){//
	if($table == null)
		return 0;
	if($row == null)
		return 0;	
	if($value == null)
		return 0;
	//echo $url;
    $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/'.$table.'/?' .$table.'.'.$row.'='.$value;
    //echo $url;
    $output = get_fun($url);
    $temple = json_decode($output,true);
    if(empty($temple))
    	return $temple;
    $result = $temple[$table];
    //var_dump($result);
	return $result;
}

function search_recorder_double($table, $row1, $value1, $row2, $value2){//
	if($table == null)
		return 0;
	if($row1 == null)
		return 0;	
	if($value1 == null)
		return 0;
	if($row2 == null)
		return 0;	
	if($value2 == null)
		return 0;
	//echo $url;
    $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/'.$table.'/?' .$table.'.'.$row1.'='.$value1 . '&'.$table.'.'.$row2.'='.$value2 ;
    //echo $url;
    $output = get_fun($url);
    $temple = json_decode($output,true);
    if(empty($temple))
    	return $temple;
    $result = $temple[$table];
    //var_dump($result);
    return $result;
}



function search_id($table, $row, $value){//
	if($table == null)
		return 0;
	if($row == null)
		return 0;	
	if($value == null)
		return 0;
	//echo $url;
    $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/'.$table.'/?' .$table.'.'.$row.'='.$value;
    //echo $url;
    $output = get_fun($url);
    $temple = json_decode($output,true);
    $result = $temple[$table];
    $id = $result[0]['id'];
    //echo $id;
	return $id;
}

 ?>