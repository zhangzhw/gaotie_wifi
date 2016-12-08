<?php
require_once 'conn.php';
session_start();
$index=0;
$data;
$over=0;

if (is_array($_GET)&&count($_GET)>0)
{
	$index=$_GET["index"];
	$data=$_GET["data"];
	$data=json_decode($data,true);
	if(count($data)<=$index)
	{
		$over=1;
	}
}
if (is_array($_POST)&&count($_POST)>0)
{
	if(!isset($_SESSION["insert_data"]))
		$_SESSION["insert_data"]=array();
	$answer="";
	if($data[$index-1]["type"]=="多选题")
	{
		$checkbox=$_POST["checkbox"];
		for($i=0;$i<count($checkbox);$i++)
		{
			if(!is_null($checkbox[$i]))
				$answer=$answer."/".$checkbox[$i];
		}	
	}
	elseif ($data[$index-1]["type"]=="单选题")
	{
		$answer=$_POST["radio"];
	}
	else
	{
		$answer=$_POST["text"];
	}
	
 	$_SESSION["insert_data"][]=array("answer"=>$answer,"subject_id"=>$data[$index-1]["subject_id"],"task_id"=>$data[$index-1]["task_id"]);
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>手机端显示问卷</title>
<script src="js/jquery.min.js"></script>

<?php echo"<script>
function go(){
 location.href = '"."mobile_questionnaire.php?data=".json_encode($data)."&index=".($index+1)."'
}
</script>"
?>
</head>

<body style="background: #26C281;color: rgba(0,0,0,0.45);width:100%">
<?php
if($over==1)
{
	echo $_SESSION["device_id"]."欢迎参加本次调查问卷，您已获得流量".$_SESSION["bandwidth"]."B，你的权限已提高".$_SESSION["priority"]."个等级";
	$insert_data=$_SESSION["insert_data"];
	$timestamp=time();
	$sql="";
	for($i=0;$i<count($insert_data);$i++)
	{
		if($i==0)
		{
			$sql="insert into answers(device_id,task_id,subject_id,answer,time) values('".$_SESSION["device_id"]."',".$insert_data[$i]["task_id"].",".$insert_data[$i]["subject_id"].",'".$insert_data[$i]["answer"]."','".$timestamp."')";
		}
		else
		{
			$sql=$sql.",('".$_SESSION["device_id"]."',".$insert_data[$i]["task_id"].",".$insert_data[$i]["subject_id"].",'".$insert_data[$i]["answer"]."','".$timestamp."')";
		}
	}
	exec_upt_sql($sql) ;
	
	$sql="update device set left_bandwidth=left_bandwidth+".$_SESSION["bandwidth"].",permission=permission+".$_SESSION["priority"]." where device_id='".$_SESSION["device_id"]."'";
	exec_upt_sql($sql) ;
	
	
	if(isset($_SESSION["task_name"]))
	{
		unset($_SESSION["task_name"]);
	}
	if(isset($_SESSION["insert_data"]))
	{
		unset($_SESSION["insert_data"]);
	}
	unset($_SESSION["task_name"]);
	unset($_SESSION["device_id"]);
	unset($_SESSION["priority"]);
	unset($_SESSION["bandwidth"]);
	
}
else
{
// 	if(isset($_SESSION["insert_data"]))
// 	{
// 		print_r($_SESSION["insert_data"]);
// 	}
	
	$subject_name=$data[$index]["subject_name"];
	$subject_id=$data[$index]["subject_id"];
	$task_id=$data[$index]["task_id"];
	$task_type=$data[$index]["type"];
	if($task_type!="文本框")
	{
		$sql="select * from subject where task_id=".$task_id." and subject_id=".$subject_id." order by option_id";
		$subject=exec_select_sql($sql);
	}	
?>
<form action=<?php echo "mobile_questionnaire.php?data=".json_encode($data)."&index=".($index+1); ?>  method="post">
<table style="width:100%">
	<tr>
	<td style="text-align:center;color: rgba(0,0,0,0.35);width:100%">
		<h1>
		<?php 
		if(isset($_SESSION["task_name"]))
		{
			echo $_SESSION["task_name"];	
		}?>
		</h1>
		
	</td>
	</tr>
	
	<tr ><td><?php echo $subject_name?></td></tr>
	
	<tr style="background-color: #2dcb89">
	<td>
		<table id="question_table" style="width:100%">
			<?php 
			if($task_type=="多选题")
			{
				for($i=0;$i<count($subject);$i++)
				{?>
					<tr class="duoxuan">
						<td>
							<input type="checkbox" name="checkbox[]" id=<?php echo $subject[$i]["option_id"];?> value=<?php echo $subject[$i]["option_id"];?> />
							<?php echo $subject[$i]["option_detail"]?>
						</td>
					</tr>
				<?php 
				}
			}
			elseif ($task_type=="单选题")
			{
				for($i=0;$i<count($subject);$i++)
				{?>
					<tr class="danxuan">
						<td>
							<input type="radio" name="radio" id=<?php echo $subject[$i]["option_id"];?> value=<?php echo $subject[$i]["option_id"];?> />
							<?php echo $subject[$i]["option_detail"]?>
						</td>
					</tr>
				<?php 
				}
			}
			else
			{?>
				<tr>
					<td><input type="text" name="text"  /></td>
				</tr>
			<?php
			}
			?>
		</table>
	</td>
	</tr>
	
	
	<tr>
	<td style="text-align:center">
		<input type="submit"   value="下一个" />
	</td>
	</tr>
</table>
</form>
<?php
}
?>

<script type="text/javascript">
	$("#question_table").find('tr.duoxuan').each(function() {
		$(this).click(function() {
			var checkbox = $(this).find(":checkbox");
			if (checkbox.is(":checked")) {
				checkbox.attr("checked", false);
			} else {
				checkbox.attr("checked", true);
			}
		});
	});
	
	$("#question_table").find('tr.danxuan').each(function() {
		$(this).click(function() {
			$(this).parent().find('tr.danxuan :radio').attr("checked",false);
			$(this).find(":radio").attr("checked",true);
		});
	});
</script>
</body>
</html>