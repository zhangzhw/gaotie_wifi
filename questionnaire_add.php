<?php
require_once 'conn.php';
require_once 'api/get_methods.php';
require_once 'api/post_func.php';

$task_id;
$task_name;
if (is_array($_GET)&&count($_GET)>0)
{
	$task_id=$_GET["task_id"];
	$task_name=$_GET["task_name"];
// 	echo $task_name;
}
if (is_array($_POST)&&count($_POST)>0)
{
	$sql="select subject_id from questionnaire where task_id=".$task_id;
	//$result=exec_select_sql($sql);
	//******************* sql to api  *******************//
	$temp = search_recorder('Questionnaire', 'task_id', $task_id);
	$result = $temp;

	$id_new=0;
	if(count($result) >0 )
		$id_new=$result[0]["subject_id"];
	for ($i=1;$i<count($result);$i++)
	{
		if($id_new<$result[$i]["subject_id"])
			$id_new=$result[$i]["subject_id"];
	}
	$id_new=$id_new+1;
	if($_GET["ctype"]==1)
	{
		$option=array();
		if(!empty($_POST["option1"])) $option[]=$_POST["option1"];
		if(!empty($_POST["option2"])) $option[]=$_POST["option2"];
		if(!empty($_POST["option3"])) $option[]=$_POST["option3"];
		if(!empty($_POST["option4"])) $option[]=$_POST["option4"];
		if(!empty($_POST["option5"])) $option[]=$_POST["option5"];
		if(!empty($_POST["option6"])) $option[]=$_POST["option6"];
		if(!empty($_POST["option7"])) $option[]=$_POST["option7"];
		
		$sql="insert into questionnaire(task_id,subject_id,subject_name,type) values(".$task_id.",".$id_new.",'".$_POST["subject_name"]."','".$_GET["subject_type"]."')";
		//exec_upt_sql($sql);
		//******************* sql to api  *******************//
		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Questionnaire';
		$data = array("task_id" => (int)$task_id, "subject_id" => (int)$id_new, "subject_name" => $_POST["subject_name"], "type" => $_GET["subject_type"]);
		$output = post_fun($url,$data);

		for($i=0;$i<count($option);$i++)
		{
		/*
			if($i==0)
			{
				$sql="insert into subject(task_id,subject_id,option_id,option_detail) values(".$task_id.",".$id_new.",".($i+1).",'".$option[$i]."')";
			}
			else
			{
				$sql=$sql.",(".$task_id.",".$id_new.",".($i+1).",'".$option[$i]."')";
			}
			*/
			$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Subject';
			$data = array("task_id" => (int)$task_id, "subject_id" => (int)$id_new, "option_id" => (int)($i+1), "option_detail" => $option[$i]);
			$output = post_fun($url,$data);
		}
		//if(exec_upt_sql($sql))
			echo "<script>javascript:alert('添加成功，请继续添加题目。');location.href='questionnaire_add.php?task_id=".$task_id."&task_name=".$task_name."';</script>";
	}
	elseif ($_GET["ctype"]==2)
	{
		$sql="insert into questionnaire(task_id,subject_id,subject_name,type) values(".$task_id.",".$id_new.",'".$_POST["subject_name"]."','文本框')";
		//******************* sql to api  *******************//
		$url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt/Questionnaire';
		$data = array("task_id" => (int)$task_id, "subject_id" => (int)$id_new, "subject_name" => $_POST["subject_name"], "type" => '文本框');
		$output = post_fun($url,$data);
		//if(exec_upt_sql($sql))
			echo "<script>javascript:alert('添加成功，请继续添加题目。');location.href='questionnaire_add.php?task_id=".$task_id."&task_name=".$task_name."';</script>";
	}
	
}


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>问卷题目添加</title>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#form1").hide();
	$("#form2").hide();
 	$("#bt1").click(function(){
	var type=$('#type').val();
	console.log(type);
	if(type=="单选题"||type=="多选题")
	{
		$("#form1").show();
		$("#form2").hide();
	}
	else
	{	
		$("#form1").hide();
		$("#form2").show();
	}
  });
 	$("#bt2").click(function(){
 	 	var type="";
 		type+=$('#form1').attr("action");
		type+="&subject_type=";
		type+=$('#type').val();
		$('#form1').attr("action",type);
 	  });
	  
});
</script>

</head>
<body>

<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">
<tr><td colspan="2" style="text-align: center"><?php echo $task_name;?></td></tr>
<tr>
	<td style="width: 10%">请选择添加的试题类型</td>
	<td>
		<select id="type">
		<option value="单选题">单选题</option>
		<option value="多选题">多选题</option>
		<option value="文本框">文本框</option>
		</select>
	</td>
</tr>
<tr>
<td colspan="2">
<button id="bt1">确定</button>
<button onclick=<?php echo "javascript:location.href='questionnaire_list.php?task_id=".$task_id."&task_name=".$task_name."'";?>>查看问卷列表</button>
</td>
</tr>
</table>

<form action=<?php echo "questionnaire_add.php?ctype=1&task_id=".$task_id."&task_name=".$task_name;?>  id="form1" method="post">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
<tr><td colspan="2">选项若不填则默认不需要该选项</td></tr>
<tr>
	<td>题目内容</td>
	<td><input name="subject_name" type="text"></td>
</tr>
<tr>
	<td>问题1</td>
	<td><input name="option1" type="text"></td>
</tr>
<tr>
	<td>问题2</td>
	<td><input name="option2" type="text"></td>
</tr>
<tr>
	<td>问题3</td>
	<td><input name="option3" type="text"></td>
</tr>
<tr>
	<td>问题4</td>
	<td><input name="option4" type="text"></td>
</tr>
<tr>
	<td>问题5</td>
	<td><input name="option5" type="text"></td>
</tr>
<tr>
	<td>问题6</td>
	<td><input name="option6" type="text"></td>
</tr>
<tr>
	<td>问题7</td>
	<td><input name="option7" type="text"></td>
</tr>
<tr><td><input type="submit" id="bt2" value="添加"></td></tr>
</table>
</form>

<form action=<?php echo "questionnaire_add.php?ctype=2&task_id=".$task_id."&task_name=".$task_name;?>  id="form2" method="post">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
<tr><td>题目内容</td><td><input name="subject_name" type="text"></td></tr>
<tr>
<td>
<input type="submit" id="bt3" value="添加">
</td>

</tr>
</table>
</form>
<p>以下是已有题目列表</p>
<iframe src=<?php echo "questionnaire_show.php?task_id=".$task_id."&task_name=".$task_name ;?> style="width: 100% ;height:1000" frameborder="0"></iframe>



</body>