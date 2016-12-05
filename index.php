<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员界面</title>
<link href="css_admin/admin_skin.css" rel="stylesheet" type="text/css" />
<link href="css_admin/alogin_skin.css" rel="stylesheet" type="text/css" />
<link href="css_admin/topleft_skin.css" rel="stylesheet" type="text/css" />
<link href="css_admin/manage_menu.css" rel="stylesheet" type="text/css" />
<link href="css_admin/newdiv_window.css" rel="stylesheet" type="text/css" />


</head>


<frameset rows="121,*" framespacing="0" border="0" frameborder="0">
  <frame name="frame_top" src="top.php" scrolling="no" noresize="true" target="frame_main" />
  <frameset cols="179,*">
    <frame id="frame_left" name="frame_left" src="main_left.php" scrolling="auto" target="frame_main" />
    <frame id="frame_main" name="frame_main" src="welcome.php" scrolling="yes" target="frame_main" style=" margin-right:5px;" />
  </frameset>
</frameset>

</html>