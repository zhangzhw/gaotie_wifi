
<html>
<head>
<title>浏览表中记录</title>
</head>
<body>


<?php
//数据库链接文件

//error_reporting(0);
$host='127.0.0.1';//数据库服务器
$user='root';//数据库用户名
$password='';//数据库密码
$database='gaotie';//数据库名
$conn=@mysql_connect($host,$user,$password) or die('数据库连接失败！');
@mysql_select_db($database) or die('没有找到数据库！');
mysql_query("set names 'gb2312'");



$sql="select * from deceive";
$result=mysql_query($sql);

echo "<table border=1>";     //使用表格格式化数据
echo "<tr><td>ID</td><td>剩余流量</td><td>已使用</td></tr>";

while($row=mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$row['deceive_id']."</td>";   //显示ID
	echo "<td>".$row['left_bandwidth']." </td>";  //显示姓名
	echo "<td>".$row['totaluse']." </td>";   //显示邮箱
	echo "</tr>";
}

echo "</table>";

?>

</body>
</html>