<?php
require_once 'api/post_func.php';
require_once 'api/get_methods.php';
require_once 'api/put_func.php';
require_once 'api/delete_func.php';


$data = array("device_id" => "dec009", "left_bandwidth" => (int)10, "totaluse" => (int)2038, "permission" => (int)4, "time"=>"2016-12-14");
$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_history';
$output = post_fun($url,$data);


echo $output;

 ?>