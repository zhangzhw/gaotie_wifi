<?php 
require_once 'conn.php';
$sql="select * from questionnaire";
$result=exec_select_sql($sql);
 echo $result[0]["subject_name"];
?>