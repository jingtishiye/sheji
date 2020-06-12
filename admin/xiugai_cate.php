<?php
include("session.php");
include("../php/conn.php");
error_reporting(0);
$id=intval(trim($_GET["id"]));
if($id>0){
	$rs=mysql_query("select * from tb_talk where id=$id",$conn);
	$array=mysql_fetch_array($rs);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>修改信息</title>
<style type="text/css">
.td {
	padding-left:10px;
}
</style>
</head>

<body>
<div style="margin-top:10px;">
  <form  name="form1" method="post" action="xiugai_cate_pass.php" enctype="multipart/form-data">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改信息</div></td>
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
                  <option value="<?php echo $array2['bid']?>"  <? if ($array['bid']==$array2['bid']) echo"selected"?> ><?php echo $array2['btitle']?></option>
                  <?php 

	endwhile;

	mysql_free_result($rs2);

	?>
                </select></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28" width="16%" class="td">名 称</td>
              <td width="84%"  class="td">
              <input name="title" type="text" size="60"  value="<?php echo $array["title"]?>"/>
                <input name="id" type="hidden"   value="<?php echo $array["id"]?>" /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28"  class="td">来 源</td>
              <td  class="td"><input name="uname" id="uname" type="text"    value="<?php echo $array["uname"]?>" size="20"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28" class="td">责 编</td>
              <td class="td"><input name="zuser" id="zuser" type="text"    value="<?php echo $array["zuser"]?>" size="20"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" class="td">推 荐</td>
              <td class="td">
              <input type="radio" name="tjs"  value="0" <?php if ($array['tjs']==0) echo"checked"?>>
                否
                <input type="radio" name="tjs"  value="1" <?php if ($array['tjs']==1) echo"checked"?>>
                <font color="#FF0000">是</font> 　　</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="25"  class="td">宣传图</td>
              <td class="td">
              <input name="img" type="text" id="img"  size="38" value="<?php echo $array["img"]?>" />
                <input type="text" id="image" value="修改图片" class="btn"  size="10"/></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25"  class="td">简 介</td>
              <td class="td">
    <textarea name="bei" style="width:500px;height:100px;"><?php echo $array["bei"]?></textarea></td>
            </tr>
                 <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" lass="td">视频信息</td>
              <td class="td"><textarea name="mflv" style="width:500px;height:60px;"><?php echo $array["mflv"]?></textarea> 有视频内容可填</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="25" class="td">内 容</td>
              <td class="td">
 <textarea name="content" style="width:100%;height:300px;"><?php echo $array["content"]?></textarea> 
            </td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" class="td">&nbsp;</td>
              <td class="td"><input type="submit" name="button" id="button" value="确认修改"  class="btn"/></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
<?php 
mysql_free_result($rs); 
mysql_close($conn);
?>