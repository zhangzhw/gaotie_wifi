<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="10"/>
<title>流量查询</title>
<?php
      require_once 'api/get_methods.php';
 ?>
</head>

<body>
<p>已接入设备</p>
<table   border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="width:100%;border-collapse:collapse">  
  <tr>
    <td bgcolor="A4B6D7">序号</td>
    <td bgcolor="A4B6D7">设备号</td>
    <td bgcolor="A4B6D7">状态</td>
    <td bgcolor="A4B6D7">剩余流量</td>
    <td bgcolor="A4B6D7">总共使用流量</td>
    <td bgcolor="A4B6D7">权限等级</td>
    <td bgcolor="A4B6D7">操作</td>
  </tr>
 
  <?php

    $table = 'Device_table';
    $temp = get_table($table);
    //SORT_DESC
    $arrSort = array();  
    foreach($temp AS $uniqid => $row)  
        foreach($row AS $key=>$value) 
          $arrSort[$key][$uniqid] = $value;  
    array_multisort($arrSort['ison'], SORT_DESC,$temp); //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序  
    $result = $temp;
    
	  $rowscount=count($result);
	 for($i=0;$i<$rowscount;$i++)
	 {
  ?>
  <tr>
    <td><?php echo $i+1; ?></td>
    <td><?php echo $result[$i]["device_id"]; ?></td>
    <td><?php 	if($result[$i]["ison"]==1)
    				echo "在线";
    			else
    				echo "离线";
    	?></td>
    <td><?php echo $result[$i]["left_bandwidth"]; ?></td>
    <td><?php echo $result[$i]["totaluse"]; ?></td>
    <td><?php echo $result[$i]["permission"] ?></td>
    <td><a href=<?php echo "bandwidth_upt.php?device_id=".$result[$i]["device_id"]?> style="text-decoration:none;color:#000">修改</a></td>
  </tr>
  <?php
  	}
  ?>
</table>


</body>


</html>