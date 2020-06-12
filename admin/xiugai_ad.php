<?php
include("session.php");
error_reporting(0);
$id=intval(trim($_GET["id"]));

if($id>0){

	include("../php/conn.php");
	$rs=mysql_query("select * from tb_ads where id='$id'",$conn);
	$array=mysql_fetch_array($rs);
		 $bname="栏目位置图片";

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>修改<?php echo $bname?></title>
</head>
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

<body >
<div  style="margin-top:10px;">
  <form  name="add" method="post" action="xiugai_ad_pass.php" enctype="multipart/form-data">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改<?php echo $bname?></div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="32"  class="td">位 置</td>
              <td class="td"><input name="weizhi" type="text"  value="<?php echo $array["weizhi"]?>"  size="50" /></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="32" width="18%" class="td">名 称</td>
              <td width="82%"  class="td"><input name="title"  type="text" size="50" value="<?php echo $array["title"]?>" />
                <input name="id" type="hidden"  value="<?php echo $array["id"]?>"/></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="32"   class="td">图 片</td>
              <td class="td"><input name="img" type="text" id="img"  size="50" value="<?php echo $array['image']?>" />
                <input type="text" id="image" value="上传图片" class="btn"  size="10"/></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="32"   class="td">链 接</td>
              <td class="td"><input name="urls"   type="text" size="50"  value="<?php echo $array['url']?>"/></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="32" class="td">&nbsp;</td>
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
<div style="display:none;">
  <textarea name="content"  style="visibility:hidden;"> </textarea>
</div>