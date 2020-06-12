<?php include("session.php");
error_reporting(0);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企业网站后台管理系统</title>
</head>
<frameset rows="122,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="165,*" framespacing="0" frameborder="no" border="0">
    <frame src="left.php" name="leftmenu" id="mainFrame" title="mainFrame" />
   <!-- <frameset rows="50,*" cols="*" framespacing="0" frameborder="no" border="0">
    <frame src="menu.php" name="topmenu" id="mainFrame" title="mainFrame" />-->
    <frame src="main.php" name="main" scrolling="yes" noresize="noresize" id="rightFrame" title="rightFrame" />
  </frameset>
  <!--</frameset>-->
</frameset><noframes></noframes>


<body>
</body>
</html>
