<?php
include("session.php");
include("../php/conn.php");
error_reporting(0);
$rs=mysql_query("select * from tb_config order by id desc limit 1",$conn);//desc降序排列
$array=mysql_fetch_array($rs);


?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站基本设置</title>
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<script charset="utf-8" src="xyeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="xyeditor/lang/zh_CN.js"></script>
<script>



var editor;
KindEditor.ready(function(K) {
editor = K.create('textarea[name="content"]', {
allowFileManager : true
  });
 
 
   K('#image').click(function() {
	editor.loadPlugin('image', function() {
	editor.plugin.imageDialog({
	imageUrl : K('#img').val(),
	clickFn : function(img, title, width, height, border, align) {
	K('#img').val(img);
	editor.hideDialog();
	}
	});
   });
  });
});

 

</script> 
</head>
<body >
<div  style="margin-top:5px;"> 
<form  name="add"  method="post" action="admin_xtsz_ok.php" target="_self">
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
  <tr>
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">网站基本设置</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="25" width="20%" class="td">网站名称</td>
        <td width="80%"  class="td"><textarea cols="60"  rows="3" name="name" ><?php echo $array['name']?></textarea>
          <input name="id" type="hidden" value="<?php echo $array['id']?>"  /></td>
      </tr>
           <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
	    
        <td height="25" class="td">网站描述</td>
        <td class="td">
        <textarea cols="60"  rows="3" name="description" ><?php echo $array['description']?></textarea>
        </td>
      </tr>
 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        <td height="25" class="td"><font color="#FF0000">关键字</font></td>
        <td class="td">
          <textarea cols="60"  rows="3" name="keywords" ><?php echo $array['keywords']?></textarea>
  </td>
      </tr> 
 
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="7" class="td">网站域名</td>
        <td class="td"><input name="url" type="text"  value="<?php echo $array['url']?>" size="50" /></td>
      </tr>
 
      
 
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" class="td">公司名称</td>
        <td class="td"><input name="mail" type="text" value="<?php echo $array['mail']?>"  size="50" /></td>
      </tr>
      
           <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
  
			<td height="32" width="16%" class="td">LOGO图</td>
<td class="td">  <input name="img" type="text" id="img" value="<?php echo $array['qq2']?>" size="50"  />  
<input type="text" id="image" value="修改图片" class="btn"  size="10"/>  </td>
		  </tr>
           
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        <td height="25" class="td">全国热线</td>
        <td class="td"><input name="tel" type="text" value="<?php echo $array['tel']?>" size="50" /></td>
      </tr>
       <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        <td height="25" class="td">上海专线</td>
        <td class="td" style="line-height:28px;">
 <input name="fax" type="text" value="<?php echo $array['fax']?>" size="20" /> 
        </td>
      </tr>
	  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" class="td">QQ客服</td>
        <td class="td">
        <input name="qq" type="text" value="<?php echo $array['qq']?>" size="20" />
         
        </td>
      </tr>
	  
 
     
	  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" class="td">备案号</td>
        <td class="td"><input name="beian" type="text" id="beian"  value="<?php echo $array['beian']?>" size="50" /></td>
      </tr>

      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        <td height="25" class="td">公司地址</td>
        <td class="td"><input name="address" type="text" id="textfield8" value="<?php echo $array['address']?>" size="50" /></td>
      </tr> 
     
    <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" class="td">&nbsp;</td>
        <td class="td"><label>
          <input type="submit" name="button" id="button" value="保存配置" class="btn" />
        </label></td>
      </tr>
    </table>
    	
    </td>
  </tr>
</table>
</form>
</div>
</body>
</html>
<div style="display:none"><textarea name="content"  style="visibility:hidden;"></textarea></div>