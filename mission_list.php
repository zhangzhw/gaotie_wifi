<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>任务查询</title>
<?php require_once 'conn.php'; 
  require_once 'api/get_methods.php';
?>
</head>

<body>
<p>已有任务</p>
<table   border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="width:100%;border-collapse:collapse">  
  <tr>
    <td bgcolor="A4B6D7">序号</td>
    <td bgcolor="A4B6D7">任务编号号</td>
    <td bgcolor="A4B6D7">任务类型</td>
    <td bgcolor="A4B6D7">任务名</td>
    <td bgcolor="A4B6D7">奖励流量</td>
    <td bgcolor="A4B6D7">奖励权限</td>
    
    <td bgcolor="A4B6D7">操作</td>
  </tr>
 
  <?php
	  $sql="select * from task_table";
	  //$result=exec_select_sql($sql);
    //******************* sql to api  *******************//
    $table = 'Task_table';
    $temp = get_table($table);
    //SORT_DESC
    $arrSort = array();  
    foreach($temp AS $uniqid => $row)  
        foreach($row AS $key=>$value) 
          $arrSort[$key][$uniqid] = $value;  
    array_multisort($arrSort['task_id'], SORT_ASC,$temp); //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序  
    $result = $temp;


	  $rowscount=count($result);
	 for($i=0;$i<$rowscount;$i++)
	 {
  ?>
  <tr>
    <td><?php echo $i+1; ?></td>
    <td><?php echo $result[$i]["task_id"]; ?></td>
    <td><?php if($result[$i]["type"]==1)
    		echo "问卷";
    	else
    		echo "公益广告";?>
    </td>
    <td><?php echo $result[$i]["task_name"]; ?></td>
    <td><?php echo $result[$i]["bandwidth"] ?></td>
    <td><?php echo $result[$i]["priority"] ?></td>
    <td>
    	<a href=<?php if($result[$i]["type"]==1)
    				echo "questionnaire_list.php?task_id=".$result[$i]["task_id"]."&task_name=".$result[$i]["task_name"];
    			else if ($result[$i]["type"]==2)
    				echo "play.php?id=".$result[$i]["task_id"]."&name=".$result[$i]["task_name"]."&type=1";

    			?> style="text-decoration:none;color:#000">查看</a>
    	&nbsp;
    	<a href=<?php echo "mission_upt.php?task_id=".$result[$i]["task_id"];?>  style="text-decoration:none;color:#000">修改</a>
    	&nbsp;
    	<a href=<?php echo "mission_del.php?task_id=".$result[$i]["task_id"]."&type=".$result[$i]["type"];?> onclick="return confirm('确认删除吗？')" style="text-decoration:none;color:#000">删除</a>
    </td>
  </tr>
  <?php
  	}
  ?>
</table>


</body>


</html>