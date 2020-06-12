<? include("session.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>添加友情链接</title>

</head>
<body>
<div style="margin-top:10px;">
	<form  name="add" method="post" action="add_link_pass.php" enctype="multipart/form-data">
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
	  <tr>
		<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">增加友情链接</div></td>
	  </tr>
	  <tr>
		<td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
 
		  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF" >
			<td height="28" width="16%" class="td">链接名称</td>
			<td width="84%"  class="td">
			  <input name="title" id="title" type="text" size="50"  /></td>
		  </tr>
		 
 
		  <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
			<td height="25" width="16%" class="td">链接地址</td>
			<td class="td"><input name="url" id="url" type="text" size="50"  />空链接请用#号</td>
		  </tr>
		  <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
			<td height="25" width="16%" class="td">排序ID</td>
			<td class="td"><input name="px_id" id="px_id" type="text" size="10"  /> </td>
		  </tr>
		  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#F1F5F8">
			<td height="25" class="td">&nbsp;</td>
			<td class="td"><input type="submit" name="button" id="button" value="确认提交"  class="btn"/></td>
		  </tr>
		</table>
		</td>
	  </tr>
	</table></form>
</div>
</body>
</html>