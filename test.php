<?php
require_once 'api/post_func.php';
require_once 'api/get_methods.php';
require_once 'api/put_func.php';
require_once 'api/delete_func.php';


$subject = search_recorder('Subject', 'task_id', 2);
if(count($subject) >0){
	$url1 = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Subject';
	foreach($subject AS $uniqid => $row)
		$output = delete_fun($url1,$row['id']);

}




 ?>