<?php

header("content-type:text/html;charset=utf-8");

include("session.php"); 

include("../php/conn.php");

error_reporting(0);



$actions=$_GET["action"];



if ($actions=="mod"){



$id=trim($_POST["id"]);

$title=trim($_POST['title']);

$px_id=trim($_POST['px_id']);

$content=$_POST['content'];

 

 

 

if($title<>""   and $content<>""  ){	

 include("../php/dbo.php"); 

 $_my=new Dbo("update tb_about set title='$title',px_id='$px_id',content='$content'  where id=$id",0);

	echo "<script>alert('修改成功！');document.location.href='admin_about.php';</script>";

}else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

}

}



$id=$_GET["id"];

if($id<>""){

	 

	$rs=mysql_query("select * from tb_about where id=$id",$conn);

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

<title>修改单页</title>

 

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

 <style type="text/css">

.td{

padding-left:10px;

}

</style>

</head>

<body>

<div style="margin-top:10px;">

<form  name="form1" method="post" action="?action=mod" enctype="multipart/form-data">

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">

  <tr>

    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改单页</div></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >

  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

      

        <td height="28" width="16%" class="td">名 称</td>

        <td width="84%"  class="td"><input name="title" id="title" type="text" size="60"  value="<?php echo $array["title"]?>"/>   </td>

      </tr>

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="28" width="16%" class="td">面 积</td>

        <td width="84%"  class="td">

        <input name="px_id"  type="text"   size="10"  value="<?php echo $array["px_id"]?>"/> 越小越靠前 

        <input name="id"   type="hidden"   value="<?php echo $array["id"]?>" /></td>

      </tr>

   



 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

     

        <td height="25" class="td">简 介</td>

        <td class="td">

	 <textarea id="content" name="content" cols="100" rows="25" class="button1"><?php echo $array['content']?></textarea>

		</td>

      </tr>

  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="25" class="td">&nbsp;</td>

        <td class="td"><input type="submit" name="button" id="button" value="确认修改"  class="btn"/></td>

      </tr>



    </table>

	</td>

  </tr>

</table></form>

</div>

</body>

</html>	

<?

mysql_free_result($rs);

mysql_close($conn);

?>