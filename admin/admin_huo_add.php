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
<title>添加最新活动信息</title>
 
<script>
var editor;
KindEditor.ready(function(K) {
editor = K.create('textarea[name="content"]', {
allowFileManager : true
  });
editor = K.create('textarea[name="content1"]', {
allowFileManager : true
  });
editor = K.create('textarea[name="content2"]', {
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
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加最新活动信息</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
    
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
<tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28" class="td">推 荐</td>
        <td  class="td">
        	<label>
			<input type="radio" name="tuijian"   value="0" checked="checked" >
			不推荐　 
			<input type="radio" name="tuijian"  value="1" >
			<font color="#ff0000">推荐</font>　			</label></td>
      </tr>
  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="25" class="td">活动类型</td>
        <td class="td">
		<select name="bid" >
		<option selected>===选择活动类型===</option>	  
	<?php
	   	$rs2=mysql_query("select  bid,btitle from tb_huo_b  order by  px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	?>
	<option value="<?php echo $array2['bid']?>"  ><?php echo $array2['btitle']?></option>
	<?php 
	endwhile;
	mysql_free_result($rs2);
	?>
	</select>
  
		</td>
      </tr>

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
     
        <td height="28" width="16%" class="td">活动名称</td>
        <td width="84%"  class="td"><input name="title"  type="text" size="60"  />   </td>
      </tr>
      
       <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="32"  class="td">活动标签</td>
        <td  class="td"><input name="hbiao" type="text"   size="30"  maxlength="30" /> </td>
      </tr>
 
 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="32" class="td">活动福利</td>
        <td class="td"><input name="hfuli" type="text"  size="50" /> 
		</td>
      </tr>
  
      
      
       <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="32"  class="td">活动时间</td>
        <td  class="td"><input name="htime" type="text"   size="50"  /> </td>
      </tr>
  

 
 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="32" class="td">活动简介</td>
        <td class="td">
       <textarea name="hjian"  cols="60" rows="5"  ></textarea> 
		</td>
      </tr>
  
  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="32" class="td">活动图片</td>
        <td class="td">
	 <input name="img" type="text" id="img"  size="50" /> 
     <input type="text" id="image" value="上传图片" class="btn"  size="10"/>
		</td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
     
        <td height="32" class="td">报名基数</td>
        <td   class="td"><input name="bms"  type="text" size="10"  /> 个   </td>
      </tr>
 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="32" class="td">活动介绍</td>
        <td    class="td"><textarea id="content" name="content" style="width:100%; height:300px;" class="button1"></textarea></td>
      </tr>
 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="32" class="td">活动流程</td>
        <td  class="td"><textarea id="content1" name="content1" style="width:100%; height:300px;" class="button1"></textarea></td>
      </tr>
<tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="32"  class="td">活动回顾</td>
        <td   class="td"><textarea id="content2" name="content2" style="width:100%; height:300px;" class="button1"></textarea></td>
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
 
<?php 
$action=trim($_GET["action"]);

if($action=="add" ){

 
$title=trim($_POST['title']);
$tuijian=trim($_POST['tuijian']);
$img=trim($_POST['img']);
$bms=trim($_POST['bms']);
$bid=trim($_POST['bid']);

$hbiao=trim($_POST['hbiao']);
$hfuli=trim($_POST['hfuli']);
$htime=trim($_POST['htime']);
$hjian=trim($_POST['hjian']);


$content=trim($_POST['content']);
$content1=trim($_POST['content1']);
$content2=trim($_POST['content2']);
 
 
if ($tuijian==""){
$tuijian=0;
}
if ($bid==""){
$bid=0;
}
if ($bms==""){
$bms=0;
}

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

if($title<>""   and   $img<>""   ){
	
if ($content<>""){
$content=str_replace("'","",$content);  
$content=str_replace("white-space:nowrap;","",$content); 
}

if ($content1<>""){
$content1=str_replace("'","",$content1);  
$content1=str_replace("white-space:nowrap;","",$content1); 
}

if ($content2<>""){
$content2=str_replace("'","",$content2);  
$content2=str_replace("white-space:nowrap;","",$content2); 
}

 
	include("../php/dbo.php");
	$_my=new Dbo("insert into tb_huo(title,bid,bms,img,hbiao,hfuli,htime,hjian,data,tuijian,content,content1,content2) values('$title','$bid','$bms','$img','$hbiao','$hfuli','$htime','$hjian','$datas','$tuijian','$content','$content1','$content2')",0);
		echo "<script>alert('添加成功！');document.location.href='admin_huo.php';</script>";
    }else{
	echo "<script>alert('信息不完整！');history.go(-1);</script>";
    }
}
mysql_close($conn); 
?>