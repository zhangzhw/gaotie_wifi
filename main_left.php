<html>
<head>
<meta charset="UTF-8">
<meta name="author" content="Zhangzhiwei">
<meta http-equiv="refresh" content="10">
<title>管理员界面</title>

</head>


<body>
<div class="dtree">

	<script type="text/javascript" src="dtree.js">
		d = new dTree('d');
		

		d.add(0,-1,'');
		d.add(1,0,'authority','','111111 ',"","","","","","","","open");
		d.add(2,0,'authority','','2222222 ');
		d.add(12,1,'authority','','mission',"","","mission_list.php");
		document.write(d);
		</script>

	</div>


</body>


</html>