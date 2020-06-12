<?php 

include("session.php"); 

include("../php/conn.php");

error_reporting(0);

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" id="css" href="images/style.css">

<script charset="utf-8" src="xyeditor/kindeditor-min.js"></script>

<script charset="utf-8" src="xyeditor/lang/zh_CN.js"></script>

<title>添加合作伙伴信息</title>

 

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

<body >

<div style="margin-top:10px;">

<form  name="form1" method="post" action="?action=add" enctype="multipart/form-data">

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">

  <tr>

    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加合作伙伴信息</div></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF">

    

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

     

        <td height="28" width="16%" class="td">名 称</td>

        <td width="84%"  class="td"><input name="title" id="title" type="text" size="60"  />   </td>

      </tr>

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="28" width="16%" class="td">排 序</td>

        <td width="84%"  class="td"><input name="px_id" type="text"   size="10"  /> 越小越靠前   <input name="data" id="data" type="hidden"   value="<?php echo date('Y-m-d G:i:s')?>" /></td>

      </tr>

  



 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

        <td height="25" class="td">图 片</td>

        <td class="td">

	 <input name="img" type="text" id="img"  size="50" /> <input type="text" id="image" value="上传图片" class="btn"  size="10"/>

		</td>

      </tr>

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="28" width="16%" class="td">链接</td>

        <td width="84%"  class="td"><input name="links" type="text"   size="50"  />  </td>

      </tr>

      

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

     

        <td height="25" class="td">&nbsp;</td>

        <td class="td"><input type="submit" name="button" id="button" value="确认提交"  class="btn"/></td>

      </tr>



    </table>

    </td>

      </tr>



    </table>

	</form>

    

</div>

</body>

</html>

<div style="display:none;"><textarea id="content" name="content" cols="100" rows="25" class="button1"></textarea></div> 

<? 

$action=$_GET["action"];



if($action=="add" ){



 

$title=trim($_POST['title']);

$px_id=trim($_POST['px_id']);

$img=trim($_POST['img']);

$links=trim($_POST['links']);

 

 

if ($px_id==""){

$px_id=10;

}





if($title<>""   and   $img<>""   ){

 

	include("../php/dbo.php");

	$_my=new Dbo("insert into tb_uhe(title,px_id,img,links) values('$title','$px_id','$img','$links')",0);

		echo "<script>alert('添加成功！');document.location.href='admin_uhe.php';</script>";

    }else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

    }

}

mysql_close($conn); 

?>