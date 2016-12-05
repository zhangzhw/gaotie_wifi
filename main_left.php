<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航栏</title>
<link rel="StyleSheet" href="dtree.css" type="text/css" />
<script type="text/javascript" src="dtree.js"></script>

<link href="css_admin/admin_skin.css" rel="stylesheet" type="text/css" />
<link href="css_admin/alogin_skin.css" rel="stylesheet" type="text/css" />
<link href="css_admin/topleft_skin.css" rel="stylesheet" type="text/css" />
<link href="css_admin/manage_menu.css" rel="stylesheet" type="text/css" />
<link href="css_admin/newdiv_window.css" rel="stylesheet" type="text/css" />

</head>

<body class="menu_body">

<base target="frame_main" />
<div class="amanagemenu_div">
  <div class="Left_NavTop"></div>
  <span class="mmenu_title2">网站栏目</span>
  
  
  
  <div class="dtree">

	<script type="text/javascript">
		d = new dTree('d');

		d.add(0,-1,'');
		d.add(1,0,'authority','','设备管理 ',"","","","","","","","open");
		d.add(2,0,'authority','','资源管理 ');
		
		d.add(11,1,'authority','','设备流量监控 ',"","","bandwidth_query.php");
		d.add(12,1,'authority','','设备流量权限修改',"","","yhzhgl.php");

		
		d.add(12,2,'authority','','问卷查看 ',"","","questionnaire_list.php");
		d.add(13,2,'authority','','问卷上传 ',"","","xinwentongzhi_list.php");

		document.write(d);
		
	</script>
</body>
</html>