<?php
require_once 'api/post_func.php';
require_once 'api/get_methods.php';
require_once 'api/put_func.php';


    $data = array("task_id" => 21, "subject_id" => 3, "subject_name" => "zhognwen", "subject_type" => "danxuanti");

    $done= array( 
          array("task_id" => 21, "subject_id" => 3, "subject_name" => "zhognwen", "subject_type" => "danxuanti"),
          array("task_id" => 23, "subject_id" => 3, "subject_name" => "zhognwen", "subject_type" => "danxuanti"),
          array("task_id" => 24, "subject_id" => 3, "subject_name" => "zhognwen", "subject_type" => "danxuanti"),
          array("task_id" => 25, "subject_id" => 3, "subject_name" => "zhognwen", "subject_type" => "danxuanti"),
          array("task_id" => 26, "subject_id" => 3, "subject_name" => "zhognwen", "subject_type" => "danxuanti"),
    );
    var_dump($done);
    var_dump($done[1]);
    var_dump($done[2]);

    $arr = array(
array('id'=>1,'xuefei'=>'50万以下'),
array('id'=>2,'xuefei'=>'51万~60万'),
array('id'=>3,'xuefei'=>'61万~70万'),
array('id'=>4,'xuefei'=>'71万~80万'),
array('id'=>5,'xuefei'=>'81万~90万'),
array('id'=>6,'xuefei'=>'90万以上')
  );

    var_dump($arr);

//      foreach($task AS $uniqid => $row)  {
        //if(!in_array($data['task_id'], $done){
          echo "yes";
       // }       
//      }



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