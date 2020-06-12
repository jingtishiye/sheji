<?php include("session.php");
error_reporting(0);?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/style.css" rel="stylesheet" type="text/css" />
<title>top</title>
<style>
body{
font-size:14px;
margin:0;
padding:0;
background:url(images/tbg.jpg) repeat-x top;
}
</style>
<script>
function onKeyDown()
{
	if ((event.keyCode==116)||(window.event.ctrlKey)||(window.event.shiftKey)||(event.keyCode==122))
	{
	event.keyCode=0;
	event.returnValue=false;
	}
}
</script>

<script>
function yxl() { 
if(window.event.altKey) 
{
window.event.returnValue=false;
}
}
document.onkeydown=yxl 
</script> 
</head>

<body  onkeydown="onKeyDown()" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
  <tr><td height="89" align="left"><a  href="http://www.xydai.cn/" target="_blank"><img src="images/logo.jpg" /></a></td><td align="right"><img src="images/daoh.jpg" border="0" usemap="#Map" /></td>
  </tr>
<tr><td colspan="2" align="left"  background="images/dsbg.jpg" valign="top" style="padding-top:8px; height:28px;">&nbsp;&nbsp;&nbsp;&nbsp; 
欢迎你：<font color="#FF0000"><?php echo $admin;?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo date("Y-m-d"); ?> &nbsp;&nbsp;&nbsp;&nbsp;  <a href="exit.php" target="_parent" style="font-size:14px;">安全退出</a>

</td></tr></table>

<map name="Map" id="Map">
<area shape="rect" coords="5,10,59,79" href="../index.php" target="_blank" />
<?Php if($admin==admin) {
?>
<area shape="rect" coords="85,10,145,79" href="admin_menu.php" target="main"/>
<area shape="rect" coords="165,10,223,83" href="admin_administrator.php" target="main" />
<area shape="rect" coords="248,13,309,81" href="admin_xtsz.php" target="main"  />
<?Php
}
?>
</map></body>
</html>



 