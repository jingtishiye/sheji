<?php
include("session.php");
include("../php/conn.php");
error_reporting(0);
$id=intval(trim($_GET["id"]));
if($id>0){
	
	$rs=mysql_query("select * from tb_flash where id='$id'",$conn);
	$array=mysql_fetch_array($rs);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>修改幻灯片</title>
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
<body>
<div style="margin-top:10px;">
<form  name="add" method="post" action="xiugai_flash_pass.php" enctype="multipart/form-data">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
  <tr>
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改幻灯片</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="32" width="16%" class="td">幻灯片名称</td>
        <td width="84%"  class="td">
          <input name="title" type="text" size="30"  value="<?php echo $array["title"]?>"/>
          <input name="id" type="hidden"   value="<?php echo $array["id"]?>" /></td>
      </tr>
	  <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="32"  class="td">幻灯片图片</td>
        <td class="td">
<input name="img" type="text" id="img"  size="50" value="<?php echo $array["image"]?>"/>

         <input type="text" id="image" value="上传图片" class="btn"  size="10"/> 
        
        </td>
      </tr>
  	 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="32"  class="td">链接地址</td>
        <td class="td"><input name="url"  type="text" size="50" value="<?php echo $array["url"]?>" />  空链接请用#号</td> 
      </tr>
      
       <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
      
        <td height="32"   class="td">显示位置</td>
        <td  class="td">
<label>
<input type="radio" name="radio" value="0" <?php if ($array['weizhi']==0) echo"checked"?>/>首页幻灯图    
<input type="radio" name="radio" value="2" <?php if ($array['weizhi']==2) echo"checked"?>/>手机幻灯图 (像素：640px*200px)
</label>
          </td>
      </tr>
      <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        <td height="32" class="td">排序ID</td>
        <td class="td"><input name="px_id"   type="text" size="20" value="<?php echo $array["px_id"]?>" /></td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="32" class="td">&nbsp;</td>
        <td class="td"><input type="submit" name="button" id="button" value="确认提交"  class="btn"/></td>
      </tr>
    </table>
	</td>
  </tr>
</table></form>
</div>
</body>
</html>
<?php 
mysql_free_result($rs); 
mysql_close($conn);
?>
<div style="display:none;">
<textarea name="content" style="visibility:hidden;"></textarea>
</div>