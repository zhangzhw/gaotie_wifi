<?php 
require_once 'conn.php';
$task_id;
$task_name;
if (is_array($_GET)&&count($_GET)>0)
{
	$task_id=$_GET["task_id"];
	$task_name=$_GET["task_name"];
}
$sql="select * from questionnaire where task_id=".$task_id;
$result=exec_select_sql($sql);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>问卷详情</title>
</head>
<body>
<table   width="100%" height="103" border="1" cellpadding="0" cellspacing="0" bordercolor="#F8C878">
<tr>
<td  colspan="5" style="text-align: center"><?php echo $task_name;?></td>
</tr>
<?php 
for($i=0;$i<count($result);$i++)
{
	$sql="select * from subject where task_id=".$task_id." and subject_id=".$result[$i]["subject_id"]." order by 'option_id'";
	$subject=exec_select_sql($sql);
	$sql="select * from answers where task_id=".$task_id." and subject_id=".$result[$i]["subject_id"];
	$answers=exec_select_sql($sql);
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
			if(strpos($answers[$k]["answer"],$subject[$j]["option_id"])||($answers[$k]["answer"]==$subject[$j]["option_id"]))
			{
				
				$chose_num++;
			}
		}
		$final_index[]=$subject[$j]["option_id"];
		$final_num[]=$chose_num;
		
	}
	?>
	</td>
	<td>
	<?php 
	for($j=0;$j<count($final_index);$j++)
	{
		echo $final_index[$j]."有".$final_num[$j]."人选择";
		if($j<count($final_index)-1)
			echo "<br />";
	}
	
	
	?>
	</td>
	
	
</tr>

<?php
}
?>

</table>




</body>
