<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="10"/>
<title>流量查询</title>
<?php require_once 'conn.php'; ?>
</head>

<body>
<p>已接入设备</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td bgcolor="A4B6D7">序号</td>
    <td bgcolor="A4B6D7">设备号</td>
    <td bgcolor="A4B6D7">剩余流量</td>
    <td bgcolor="A4B6D7">总共使用流量</td>
    <td bgcolor="A4B6D7">权限等级</td>
  </tr>
 
  <?php
	  $sql="select * from device";
	  $result=exec_select_sql($sql);
	  $rowscount=count($result);
	 for($i=0;$i<$rowscount;$i++)
	 {
  ?>
  <tr>
    <td><?php echo $i+1; ?></td>
    <td><?php echo $result[$i]["device_id"]; ?></td>
    <td><?php echo $result[$i]["left_bandwidth"]; ?></td>
    <td><?php echo $result[$i]["totaluse"]; ?></td>
    <td><?php echo $result[$i]["permission"] ?></td>
  </tr>
  <?php
  	}
  ?>
</table>


</body>


</html>