<?php
include("session.php");
include("../php/conn.php");
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<script charset="utf-8" src="../kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>

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
<title>添加信息</title>
</head>
<style type="text/css">
.td {
	padding-left:10px;
}
</style>

<body>
<div style="margin-top:10px;">
  <form  name="form1" method="post" action="add_cate_pass.php" enctype="multipart/form-data">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加信息</div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" class="td">分 类</td>
              <td class="td"><select name="bid" >
      <?php
	   	$rs2=mysql_query("select bid,btitle from tb_talk_b  order by px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	 ?>
      <option value="<?php echo $array2['bid']?>"  ><?php echo $array2['btitle']?></option>
   <?php 
	endwhile;
	mysql_free_result($rs2);
	?>
                </select>
                <input name="data" type="hidden"   value="<?php echo date('Y-m-d G:i:s')?>" /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28" width="16%" class="td">名 称</td>
              <td width="84%"  class="td"><input name="title" id="title" type="text" size="60"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" width="16%" class="td">来 源</td>
              <td width="84%"  class="td"><input name="uname" id="uname" type="text"    value="" size="20"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28" width="16%" class="td">责 编</td>
              <td width="84%"  class="td"><input name="zuser" id="zuser" type="text"     value="" size="20"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" width="16%" class="td">推 荐</td>
              <td width="84%"  class="td"><input type="radio" name="tjs"  value="0" checked>
                否
                <input type="radio" name="tjs"   value="1" >
                <font color="#FF0000">是</font> 　　</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="25"  class="td">宣传图</td>
              <td class="td"><input name="img" type="text" id="img"  size="38" />
                <input type="text" id="image" value="上传图片" class="btn"  size="10"/></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25"  class="td">简 介</td>
              <td class="td"><textarea name="bei" style="width:500px;height:100px;"></textarea></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" lass="td">视频信息</td>
              <td class="td"><textarea name="mflv" style="width:500px;height:60px;"></textarea> 有视频内容可填</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="25" class="td">内 容</td>
              <td class="td">
               <textarea name="content" style="width:100%;height:300px;"></textarea>
              </td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" class="td">&nbsp;</td>
              <td class="td"><input type="submit" name="button" id="button" value="确认提交"  class="btn"/></td>
            </tr>
          </table></td>
      </tr>
    </table>
   
  </form>
</div>
</body>
</html>
<?php mysql_close($conn);?>