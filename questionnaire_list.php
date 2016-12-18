<?php 
require_once 'conn.php';
require_once 'api/get_methods.php';
$task_id;
$task_name;
if (is_array($_GET)&&count($_GET)>0)
{
	$task_id=$_GET["task_id"];
	$task_name=$_GET["task_name"];
}
$sql="select * from questionnaire where task_id=".$task_id;
//$result=exec_select_sql($sql);
//******************* sql to api  *******************//
$temp = search_recorder('Questionnaire', 'task_id', $task_id);
$result = $temp;

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>问卷详情</title>



</head>
<body>
<table   width="100%" height="103" border="1" cellpadding="0" cellspacing="0" bordercolor="#F8C878">
<tr>
<td  colspan="6" style="text-align: center"><?php echo $task_name;?></td>
</tr>
<tr>
	<td  style="width: 10%">序号</td>
	<td  style="width: 20%">题目</td>
	<td  style="width: 20%">题目类型</td>
	<td>选项</td>
	<td>统计数据</td>
	<td>操作</td>
</tr>
<?php 
for($i=0;$i<count($result);$i++)
{
	$sql="select * from subject where task_id=".$task_id." and subject_id=".$result[$i]["subject_id"]." order by 'option_id'";
	//$subject=exec_select_sql($sql);
	//******************* sql to api  *******************//
	$temp = search_recorder_double('Subject', 'task_id', $task_id,'subject_id', $result[$i]["subject_id"]);
	if($result[$i]['type'] != '文本框'){
    	    //SORT_DESC
   		$arrSort = array();  
    	foreach($temp AS $uniqid => $row)  
        	foreach($row AS $key=>$value) 
          		$arrSort[$key][$uniqid] = $value;  
    	array_multisort($arrSort['option_id'], SORT_ASC,$temp); //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序  
   		//$subject = $temp;
    }
    $subject = $temp;
    //var_dump($subject);

	$sql="select * from answers where task_id=".$task_id." and subject_id=".$result[$i]["subject_id"];
	//$answers=exec_select_sql($sql);
	//******************* sql to api  *******************//
	$temp = search_recorder_double('Answers', 'task_id', $task_id,'subject_id', $result[$i]["subject_id"]);
    $answers = $temp;
	$final_index=array();
	$final_num=array();
?>
<tr >
	<td  style="width: 10%"><?php echo $i+1;?></td>
	<td  style="width: 20%"><?php echo $result[$i]["subject_name"];?></td>
	<td  style="width: 20%"><?php echo $result[$i]["type"];?></td>
	<td>
	<?php 	
	for($j=0;$j<count($subject);$j++)
	{

		echo $subject[$j]["option_id"].".".$subject[$j]["option_detail"];
		if($j<count($subject)-1)
			echo "<br />";
		$chose_num=0;
		for($k=0;$k<count($answers);$k++)
		{

			if(strpos($answers[$k]["answer"],(string)$subject[$j]["option_id"])||($answers[$k]["answer"]==$subject[$j]["option_id"]))
			{
				
				$chose_num++;
			}
		}
		$final_num[]=$chose_num;
		
	}
	?>
	</td>
	<td>
	<?php 
// 	for($j=0;$j<count($final_index);$j++)
// 	{
// 		echo $final_index[$j]."有".$final_num[$j]."人选择";
// 		if($j<count($final_index)-1)
// 			echo "<br />";
// 	}
	if(count($final_num)>0)
	{
	?>
	<img alt="error" src=<?php echo "draw.php?final=".json_encode($final_num);?>> 
	<?php 
	}
	?>
	
	</td>
	<td>
	<a href=<?php echo "questionnaire_del.php?task_id=".$task_id."&subject_id=".$result[$i]["subject_id"]."&task_name=".$task_name;?> onclick="return confirm('确认删除吗？')" style="text-decoration:none;color:#000">删除</a>
	</td>
	
	
</tr>

<?php
}
?>


</table>

<a href=<?php echo "questionnaire_add.php?task_id=".$task_id."&task_name=".$task_name;?>>添加选项</a>


</body>
