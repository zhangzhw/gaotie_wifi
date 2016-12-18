<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>流量查询</title>
<?php 
require_once 'api/get_methods.php';
?>
</head>

<body>
<p>历史接入设备</p>
<table   border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="width:100%;border-collapse:collapse">  
  <tr>
  	<td bgcolor="A4B6D7">序号</td>
    <td bgcolor="A4B6D7">日期</td>
    
    <td bgcolor="A4B6D7">设备号</td>
    <td bgcolor="A4B6D7">剩余流量</td>
    <td bgcolor="A4B6D7">总共使用流量</td>
    <td bgcolor="A4B6D7">权限等级</td>
    
  </tr>
 
  <?php


	  $url = 'http:/120.77.42.242:8080/Entity/U9527f52303e3e/gt_backup/Device_table';
	  //echo $url;
	  $output = get_fun($url);
	  $temple = json_decode($output,true);
	  $result = $temple['Device_table'];
	  
	  
	  $rowscount=count($result);
	 for($i=0;$i<$rowscount;$i++)
	 {
  ?>
  <tr>
  	<td><?php echo $i+1; ?></td>
  	<td><?php echo date("Y-m-d",$result[$i]["timestamp"]); ?></td>
    
    <td><?php echo $result[$i]["device_id"]; ?></td>
    <td><?php echo $result[$i]["left_bandwith"]; ?></td>
    <td><?php echo $result[$i]["total_use"]; ?></td>
    <td><?php echo $result[$i]["priority"] ?></td>
    
  </tr>
  <?php
  	}
  ?>
</table>


</body>


</html>