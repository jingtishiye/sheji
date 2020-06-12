<?php
include("session.php");
include("../php/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
 

<title>增加区域分站信息</title>
 


</head>
<body >
<div style="margin-top:10px;">
<form  name="form1" method="post" action="admin_fenz_adds.php" enctype="multipart/form-data">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
  <tr>
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">增加区域分站信息</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
    
     <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
 
        <td height="28" width="16%" class="td">本站默认显示</td>
        <td width="84%"  class="td">
      
			<input type="radio" name="mrs" id="mrs" value="0" checked="checked" >否　 
			<input type="radio" name="mrs" id="mrs" value="1" ><font color="#FF0000">是</font>
       
          </td>
      </tr>
	 
    
 <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28" class="td">排 序</td>
        <td   class="td">
          <input name="paixu"  type="text" size="5" /> *序号数字越小越靠前</td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28"   class="td">区域名称</td>
        <td  class="td">
          <input name="title"   type="text" size="50"  /></td>
      </tr>
       <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
 
        <td height="28" class="td">开 通</td>
        <td  class="td">
      
			<input type="radio" name="tuijian" id="tuijian" value="0" checked="checked" >不开通　 
			<input type="radio" name="tuijian" id="tuijian" value="1" ><font color="#FF0000">开通</font>
       
          </td>
      </tr>
        <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
	 
 
        <td height="28" class="td">热 门</td>
        <td  class="td">
      
			<input type="radio" name="ishot"   value="0" checked="checked" >否　 
			<input type="radio" name="ishot"   value="1" ><font color="#FF0000">是</font>
       
          </td>
      </tr>
    <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
    
        <td height="28"  class="td">链接地址</td>
        <td   class="td">
          <input name="url"   type="text" size="50"  />  </td>
      </tr>
	   
       <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
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