<?php 

include("session.php");

error_reporting(0);

 

		 $bname="栏目位置图片";

	 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>添加<?php echo $bname?></title>
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
<div  style="margin-top:10px;">
  <form  name="add" method="post" action="add_ad_pass.php" enctype="multipart/form-data">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">增加<?php echo $bname?></div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="25" width="18%" class="td">位 置</td>
              <td class="td"><input name="weizhi" type="text"    size="50" /></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" width="18%" class="td">名称</td>
              <td width="82%"  class="td"><input name="title" id="title" type="text" size="50"  /></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="25" width="18%" class="td">图片</td>
              <td class="td"><input name="img" type="text" id="img"  size="50" />
                <input type="text" id="image" value="上传图片" class="btn"  size="10"/></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="32" width="18%" class="td">链接</td>
              <td class="td"><input name="urls"   type="text" size="50"  /></td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
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
<div style="display:none;">
  <textarea name="content"  style="width:670px;height:180px;visibility:hidden;"> </textarea>
</div>