<?php 
include("session.php"); 
include("../php/conn.php");
error_reporting(0);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
 
<title>添加设计师案例</title>
<?php 
$uid=intval(trim($_GET['uid']));
?>
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
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加设计师案例</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
    
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
         <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28"  class="td">推 荐</td>
        <td  class="td">
        <input type="radio" name="istui"  value="0" checked>否 
        <input type="radio" name="istui"   value="1" ><font color="#FF0000">推荐</font>     
      </td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28" class="td">所属设计师</td>
        <td  class="td">
    <select name="uid">
		 <option value="" selected="selected">==所属设计师==</option>	 
	<?php
	   	$rs2=mysql_query("select id,relname from tb_user where  bid=1 order by  id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
	 <option value="<?php echo $array2['id']?>"  <?php if ($uid==$array2['id']) echo "selected"?>><?php echo $array2['relname']?></option>
	<?php 
	endwhile;
	mysql_free_result($rs2);
	?>		 
	</select>
      
      　　</td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28" width="16%" class="td">案例名称</td>
        <td width="84%"  class="td"><input name="title"   type="text" size="50"  />   </td>
      </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28" class="td">面 积</td>
        <td class="td"><input name="mjs"  type="text"   size="10"  /> ㎡   
        <input name="data"  type="hidden"   value="<?php echo date('Y-m-d G:i:s')?>" /></td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28"   class="td">风 格</td>
        <td class="td">
<select name="bid">
		 <option value="" selected="selected">==选择风格==</option>	 
	<?php
	   	$rs2=mysql_query("select btitle,bid from tb_ustyle order by px_id asc ",$conn);
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
  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28"   class="td">简介说明</td>
        <td   class="td"><input name="jtitle"   type="text" size="50"  />   </td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28"  class="td">户 型</td>
        <td  class="td">
<select name="hxs">
	<option value="" selected="selected">==选择户型==</option>	 
	 <option value="普通住宅"  >普通住宅</option>
     <option value="跃层"  >跃层</option>
     <option value="公寓"  >公寓</option>
     <option value="别墅"  >别墅</option>
     <option value="其他"  >其他</option>
</select>
        </td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28" class="td">案例造价</td>
        <td   class="td"><input name="hprice"   type="text"   size="10"  /> 元</td>
      </tr>
   
  
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="25"  class="td">案 例 图</td>
        <td class="td">
        <input name="img" type="text" id="img"  size="50" />

         <input type="text" id="image" value="上传图片" class="btn"  size="10"/></td>
      </tr>
<tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" width="16%" class="td">案例组图上传</td>
        <td class="td">
        <input name="pic1" type="hidden"   size="38" value=""/> <input name="image1" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic2" type="hidden"   size="38" value=""/> <input name="image2" type="file" class="btn"  style="width:180px;" /> <br />
        <input name="pic3" type="hidden"   size="38" value=""/> <input name="image3" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic4" type="hidden"   size="38" value=""/> <input name="image4" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic5" type="hidden"   size="38" value=""/> <input name="image5" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic6" type="hidden"   size="38" value=""/> <input name="image6" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic7" type="hidden"   size="38" value=""/> <input name="image7" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic8" type="hidden"   size="38" value=""/> <input name="image8" type="file" class="btn"  style="width:180px;" /><br />
       </td>
      </tr>
   
 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
     
        <td height="25" class="td">案例简介</td>
        <td class="td">
	 <textarea name="content" style="width:100%;height:300px;"></textarea>
		</td>
      </tr>
  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
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
 
<?php 
$action=trim($_GET["action"]);

if($action=="add" ){

$istui=trim($_POST['istui']);
$title=trim($_POST['title']);
$jtitle=trim($_POST['jtitle']);
$mjs=trim($_POST['mjs']);
$bid=trim($_POST['bid']);
$hprice=trim($_POST['hprice']);
$hxs=trim($_POST['hxs']);
 
$uid=trim($_POST['uid']);
$imgs=trim($_POST['img']);
$content=trim($_POST['content']);

date_default_timezone_set('PRC');
$data=$_POST['data'];
 
 
if ($uid==""){
echo "<script>alert('请选择设计师！');history.go(-1);</script>";
}

if ($bid==""){
	$bid=0;
}

$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);


if($title<>""   and $imgs<>""   ){
	
	$error1=$_FILES["image1"]["error"];
	$tmpname1=$_FILES["image1"]["tmp_name"];
	$name1=$_FILES["image1"]["name"];
	$size1=$_FILES["image1"]["size"];
	$type1=$_FILES["image1"]["type"];
	if($name1<>""){
		if(!in_array($type1, $uptypes))
		//检查文件类型
		{
			echo "<script>alert('图片格式不支持！支持jpg、png、gif、bmp、jpeg');history.go(-1);</script>";
			exit;
		}
		if(is_uploaded_file($tmpname1)){
			$date1=date("Y-m-d");
			$imgdir1='../uploadfile/upshop/';
			$rootpath1='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name1);
			if(!file_exists($imgdir1)) mkdir($imgdir1);
			if(!move_uploaded_file($tmpname1,$rootpath1))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image1;
		$image1='/uploadfile/upshop/'.time().$name1;
		}
		else{
			$image1=$_POST['pic1'];
		}
		
    $error2=$_FILES["image2"]["error"];
	$tmpname2=$_FILES["image2"]["tmp_name"];
	$name2=$_FILES["image2"]["name"];
	$size2=$_FILES["image2"]["size"];
	$type2=$_FILES["image2"]["type"];
	if($name2<>""){
	 
		if(is_uploaded_file($tmpname2)){
			$date2=date("Y-m-d");
			$imgdir2='../uploadfile/upshop/';
			$rootpath2='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name2);
			if(!file_exists($imgdir2)) mkdir($imgdir2);
			if(!move_uploaded_file($tmpname2,$rootpath2))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image2;
		$image2='/uploadfile/upshop/'.time().$name2;
		}
		else{
			$image2=$_POST['pic2'];
		}
		
		
    $error3=$_FILES["image3"]["error"];
	$tmpname3=$_FILES["image3"]["tmp_name"];
	$name3=$_FILES["image3"]["name"];
	$size3=$_FILES["image3"]["size"];
	$type3=$_FILES["image3"]["type"];
	if($name3<>""){
	 
		if(is_uploaded_file($tmpname3)){
			$date3=date("Y-m-d");
			$imgdir3='../uploadfile/upshop/';
			$rootpath3='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name3);
			if(!file_exists($imgdir3)) mkdir($imgdir3);
			if(!move_uploaded_file($tmpname3,$rootpath3))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image3;
		$image3='/uploadfile/upshop/'.time().$name3;
		}
		else{
			$image3=$_POST['pic3'];
		}
	$error4=$_FILES["image4"]["error"];
	$tmpname4=$_FILES["image4"]["tmp_name"];
	$name4=$_FILES["image4"]["name"];
	$size4=$_FILES["image4"]["size"];
	$type4=$_FILES["image4"]["type"];
	if($name4<>""){
	 
		if(is_uploaded_file($tmpname4)){
			$date4=date("Y-m-d");
			$imgdir4='../uploadfile/upshop/';
			$rootpath4='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name4);
			if(!file_exists($imgdir4)) mkdir($imgdir4);
			if(!move_uploaded_file($tmpname4,$rootpath4))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image4;
		$image4='/uploadfile/upshop/'.time().$name4;
		}
		else{
			$image4=$_POST['pic4'];
		}
	$error5=$_FILES["image5"]["error"];
	$tmpname5=$_FILES["image5"]["tmp_name"];
	$name5=$_FILES["image5"]["name"];
	$size5=$_FILES["image5"]["size"];
	$type5=$_FILES["image5"]["type"];
	if($name5<>""){
	 
		if(is_uploaded_file($tmpname5)){
			$date5=date("Y-m-d");
			$imgdir5='../uploadfile/upshop/';
			$rootpath5='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name5);
			if(!file_exists($imgdir5)) mkdir($imgdir5);
			if(!move_uploaded_file($tmpname5,$rootpath5))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image5;
		$image5='/uploadfile/upshop/'.time().$name5;
		}
		else{
			$image5=$_POST['pic5'];
		}
		
	$error6=$_FILES["image6"]["error"];
	$tmpname6=$_FILES["image6"]["tmp_name"];
	$name6=$_FILES["image6"]["name"];
	$size6=$_FILES["image6"]["size"];
	$type6=$_FILES["image6"]["type"];
	if($name6<>""){
	 
		if(is_uploaded_file($tmpname6)){
			$date6=date("Y-m-d");
			$imgdir6='../uploadfile/upshop/';
			$rootpath6='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name6);
			if(!file_exists($imgdir6)) mkdir($imgdir6);
			if(!move_uploaded_file($tmpname6,$rootpath6))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image6;
		$image6='/uploadfile/upshop/'.time().$name6;
		}
		else{
			$image6=$_POST['pic6'];
		}
		
	$error7=$_FILES["image7"]["error"];
	$tmpname7=$_FILES["image7"]["tmp_name"];
	$name7=$_FILES["image7"]["name"];
	$size7=$_FILES["image7"]["size"];
	$type7=$_FILES["image7"]["type"];
	if($name7<>""){
	 
		if(is_uploaded_file($tmpname7)){
			$date7=date("Y-m-d");
			$imgdir7='../uploadfile/upshop/';
			$rootpath7='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name7);
			if(!file_exists($imgdir7)) mkdir($imgdir7);
			if(!move_uploaded_file($tmpname7,$rootpath7))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image7;
		$image7='/uploadfile/upshop/'.time().$name7;
		}
		else{
			$image7=$_POST['pic7'];
		}
 
    $error8=$_FILES["image8"]["error"];
	$tmpname8=$_FILES["image8"]["tmp_name"];
	$name8=$_FILES["image8"]["name"];
	$size8=$_FILES["image8"]["size"];
	$type8=$_FILES["image8"]["type"];
	if($name8<>""){
	 
		if(is_uploaded_file($tmpname8)){
			$date8=date("Y-m-d");
			$imgdir8='../uploadfile/upshop/';
			$rootpath8='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name8);
			if(!file_exists($imgdir8)) mkdir($imgdir8);
			if(!move_uploaded_file($tmpname8,$rootpath8))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image8;
		$image8='/uploadfile/upshop/'.time().$name8;
		}
		else{
			$image8=$_POST['pic8'];
		}
		if ($content<>""){
		$content=str_replace("'","",$content);
        $content=str_replace("white-space:nowrap;","",$content); 
		}
 
	include("../php/dbo.php");
	$_my=new Dbo("insert into tb_ushe(title,jtitle,mjs,bid,uid,content,data,img,img1,img2,img3,img4,img5,img6,img7,img8,tjs,hprice,hxs,sh) values('$title','$jtitle','$mjs','$bid','$uid','$content','$data','$imgs','$image1','$image2','$image3','$image4','$image5','$image6','$image7','$image8','$istui','$hprice','$hxs',1)",0);
	echo "<script>alert('设计师案例添加成功！');document.location.href='admin_ushe.php';</script>";
    }else{
	echo "<script>alert('信息不完整！');history.go(-1);</script>";
    }
}
mysql_close($conn); 
?>