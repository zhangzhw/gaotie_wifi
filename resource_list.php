<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>资源列表</title>
<?php require_once 'conn.php'; 
  require_once 'api/get_methods.php';
?>
</head>

<body>
<p>已有资源</p>
<table   border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="width:100%;border-collapse:collapse">  
  <tr>
	<td bgcolor="A4B6D7">序号</td>
    <td bgcolor="A4B6D7">资源名</td>
    <td bgcolor="A4B6D7">权限要求</td>
    
    <td bgcolor="A4B6D7">操作</td>
  </tr>
 
  <?php
	  $sql="select * from resoure_tb";
	  //$result=exec_select_sql($sql);
    //******************* sql to api  *******************//
    $table = 'Resoure_tb';
    $result = get_table($table);

	  $rowscount=count($result);
	 for($i=0;$i<$rowscount;$i++)
	 {
  ?>
  <tr>
    <td><?php echo $i+1; ?></td>
    <td><?php echo $result[$i]["res_name"]; ?></td>
    <td><?php echo $result[$i]["priority"] ?></td>
    <td>
    	<a href=<?php echo "play.php?id=".$result[$i]["res_id"]."&name=".$result[$i]["res_name"]."&type=2";?> style="text-decoration:none;color:#000">查看</a>
    	&nbsp;
    	<a href=<?php echo "resource_upt.php?id=".$result[$i]["res_id"];?> style="text-decoration:none;color:#000">修改</a>
    	&nbsp;
    	<a href=<?php echo "resource_del.php?res_id=".$result[$i]["res_id"];?> onclick="return confirm('确认删除吗？')" style="text-decoration:none;color:#000">删除</a>
    </td>
  </tr>
  <?php
  	}
  ?>
</table>


</body>


</html>