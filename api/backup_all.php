<?php

require_once "get_func.php";
//require_once "put_func.php";
require_once "post_func.php";
require_once "delete_func.php";

function backup_all($source_url,$dest_url){//
	if($source_url == null || $dest_url == null)
		return 0;	
	//echo $url;
	echo $source_url;
	echo "</br>";
	echo $dest_url;

	$content = get_fun($source_url.'/');
	if(empty($content))
		return 0;
	$output = json_decode($content,true);
	//print_r($output['Device_table']);
	foreach($output['Device_table'] as $i => $node_v)
	{
		//echo "</br>";
		//print_r($i);
		//echo "</br>";
		//print_r($node_v);
		$node_v['timestamp'] = time();
		//print_r($node_v);
		//echo "</br>";
		$post_res = post_fun($dest_url,$node_v);
		//print_r($post_res);
		//echo "</br>";
		//echo $node_v['id'];
		$del_res = delete_fun($source_url,$node_v['id']);
		//print_r($del_res);
		//echo "</br>";

	}
	//return $result;
}

$url1 = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
$url2 = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt_backup/Device_table';
$output = backup_all($url1 , $url2);

echo "</br>output:</br>";
print_r($output);

?>