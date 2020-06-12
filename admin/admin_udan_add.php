<?php 

include("session.php"); 

include("../php/conn.php");

error_reporting(0);



$bid=intval($_GET["bid"]);

if ($bid>0){

 

	$rsu=mysql_query("select id,title from tb_honors where id=$bid",$conn);

	$arrayu=mysql_fetch_array($rsu);

	

	$bid=$arrayu["id"];

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" id="css" href="images/style.css">

 

<title>添加活动劲爆单品</title>

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

    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加活动劲爆单品</div></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF">

    

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >

     <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

        <td height="32" width="16%" class="td">排 序</td>

        <td width="84%"  class="td"><input name="px_id"  type="text"   size="10"  /> <font color="#FF0000">数字越小越靠前</font>     

      </td>

      </tr>

      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="32" width="16%" class="td">单品名称</td>

        <td width="84%"  class="td"><input name="title" id="title" type="text" size="60"  />   </td>

      </tr>

      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

        <td height="32" width="16%" class="td">活动信息</td>

        <td width="84%"  class="td"><?php echo $arrayu["title"]?>  <input name="data" id="data" type="hidden"   value="<?php echo date('Y-m-d G:i:s')?>" /> <input type="hidden" name="bid"  value="<?php echo $bid?>"/> </td>

      </tr>

   

      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="32" width="16%" class="td">单品图</td>

        <td class="td">

        <input name="img" type="text" id="img"  size="50" />



         <input type="text" id="image" value="上传图片" class="btn"  size="10"/></td>

      </tr>

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

        <td height="32" width="16%" class="td">选择团购</td>

        <td width="84%"  class="td"><select name="tid" >

			  

			 <?php

	   	$rs2=mysql_query("select  tid,subject from pre_forum_post  where fid=48 and first=1 and invisible=0 order by  pid desc  ",$conn);

		while($array2=mysql_fetch_array($rs2)):

	   ?>

	 <option value="<?php echo $array2['tid']?>"><?php echo $array2['subject']?></option>

	<?php   

	endwhile;

	mysql_free_result($rs2);

	?>

			</select>　</td>

      </tr>

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

      

        <td height="32" width="16%" class="td">团购价</td>

        <td width="84%"  class="td"><input name="tprice"   type="text" size="20"  />元  </td>

      </tr>

<tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

        <td height="32" width="16%" class="td">备注信息</td>

        <td width="84%"  class="td"><input name="spec"   type="text" size="20"  /></td>

      </tr>

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="32" width="16%" class="td">我要比价链接</td>

        <td width="84%"  class="td"><input name="links"   type="text" size="60"  /></td>

      </tr>

    <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

        <td height="32" class="td">&nbsp;</td>

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

<div style="display:none;"><textarea  name="content"   class="button1"></textarea></div>

<?php

 

mysql_free_result($rsu);

}



$action=$_GET["action"];



if($action=="add" ){



$px_id=trim($_POST['px_id']);

$title=trim($_POST['title']);

$bid=trim($_POST['bid']);

$imgs=trim($_POST['img']);



$tid=trim($_POST['tid']);

$tprice=trim($_POST['tprice']);

$spec=trim($_POST['spec']);

$links=trim($_POST['links']);

date_default_timezone_set('PRC');

$data=$_POST['data'];

 

 

if ($px_id==""){

$px_id=10;

}

if ($tid==""){

$tid=0;

}

 



if($title<>""   and $imgs<>""  and $tid>0  ){

	

 

 

	include("../php/dbo.php");

	$_my=new Dbo("insert into tb_dan(title,px_id,bid,data,img,tid,tprice,spec,links) values('$title','$px_id','$bid','$data','$imgs','$tid','$tprice','$spec','$links')",0);

	echo "<script>alert('劲爆单品添加成功！');document.location.href='admin_udan.php?bid=$bid';</script>";

    }else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

    }

}

mysql_close($conn); 

?>