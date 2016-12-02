
<html>
<head>
<title>������м�¼</title>
</head>
<body>


<?php
//���ݿ������ļ�

//error_reporting(0);
$host='127.0.0.1';//���ݿ������
$user='root';//���ݿ��û���
$password='';//���ݿ�����
$database='gaotie';//���ݿ���
$conn=@mysql_connect($host,$user,$password) or die('���ݿ�����ʧ�ܣ�');
@mysql_select_db($database) or die('û���ҵ����ݿ⣡');
mysql_query("set names 'gb2312'");



$sql="select * from deceive";
$result=mysql_query($sql);

echo "<table border=1>";     //ʹ�ñ���ʽ������
echo "<tr><td>ID</td><td>剩余流量</td><td>已用流量</td></tr>";

while($row=mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$row['deceive_id']."</td>";   //��ʾID
	echo "<td>".$row['left_bandwidth']." </td>";  //��ʾ����
	echo "<td>".$row['totaluse']." </td>";   //��ʾ����
	echo "</tr>";
}

echo "</table>";

?>

</body>
</html>