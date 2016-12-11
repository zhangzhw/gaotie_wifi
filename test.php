<?php
require_once 'api/post_func.php';
require_once 'api/get_methods.php';
require_once 'api/put_func.php';


    $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Questionnaire';
    $data = array("task_id" => 21, "subject_id" => 3, "subject_name" => "zhognwen", "subject_type" => "danxuanti");
    var_dump($data);
        $output = post_fun($url,$data);
    var_dump($output);

/*
  $temp = search_recorder('Device_table', 'device_id', 'dec110');
  $result = $temp[0];$_POST["subject_name"], "subject_type" => $_GET["subject_type"]);
    $output = post_fun($url,$data);
  print_r($result);
  $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
  $result['left_bandwidth'] = "1024";
  $result['permission'] = 10;

  print_r($result['id']);
  $output = put_fun($url,$result['id'],$result);
	print_r($output);

  */

/*
	$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Task_table';

	$filename = "taskid.txt";
    $handle = fopen($filename, "r");  
    $contents = fread($handle, filesize ($filename));    
    fclose($handle);

	$contents += 1;
	$data = array("task_id" => $contents , "task_name" => "测试", "bandwidth" => 100, "priority" => 100 , "type" => 2);
    
    $handle = fopen($filename, "w");
    $output = fwrite($handle, $contents);    
    fclose($handle);
    print_r($data);
	$output = post_fun($url,$data);
	print_r($output);

	*/

/*
    $filename = "taskid.txt";
    $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'    
    //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
    $contents = fread($handle, filesize ($filename));    
    $contents +=1;
    echo $contents;
    fclose($handle);

    $handle = fopen($filename, "w");
    $output = fwrite($handle, $contents);    
    fclose($handle);


*/


/*

<?php 
require_once 'api/get_methods.php';
require_once 'api/put_func.php';

  $result = search_recorder('Device_table', 'device_id', 'dec110');
  $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Device_table';
  echo "<br>";
  print_r( $result);
  $result['left_bandwidth'] = 8181;
  $result['permission'] = 9;
   echo "<br>";
  print_r( $result);
  $output = put_fun($url,$result['id'],$result);
   echo "<br>";
  print_r($output);
 ?>

 */


 ?>