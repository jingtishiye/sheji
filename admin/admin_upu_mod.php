<?php
header("content-type:text/html;charset=utf-8");
include("session.php"); 
include("../php/conn.php");
error_reporting(0);

$actions=trim($_GET["action"]);

if ($actions=="mod"){

$id=trim($_POST["id"]);
 
$username=trim($_POST['username']);
$relname=trim($_POST['relname']);
$imgs=trim($_POST['img']);
$content=$_POST['content'];
$password=trim($_POST['password']);
$repassword=trim($_POST['repassword']);



 
if($username<>""  and $imgs<>""   ){	

        if ($content<>""){
		$content=str_replace("'","",$content);
        $content=str_replace("white-space:nowrap;","",$content); 
		}
 
 include("../php/dbo.php"); 
 
if ($password<>""){
 if ($password<>$repassword){	
    echo "<script>alert('修改填写的密码不一致！');history.go(-1);</script>";
	exit;
  }else{
	  $pwd=md5($password);
  $_my=new Dbo("update tb_user set relname='$relname',passwords='$pwd',img='$imgs',bei='$content'  where id=$id and bid=2",0);
 }
}else{
 $_my=new Dbo("update tb_user set relname='$relname',img='$imgs',bei='$content'  where id=$id and bid=2",0);	
}
 
	echo "<script>alert('修改成功！');document.location.href='admin_ushe.php';</script>";
 }else{
	echo "<script>alert('信息不完整！');history.go(-1);</script>";
	exit;
 }
}

$id=intval(trim($_GET["id"]));
if($id>0){
	 
	$rs=mysql_query("select * from tb_user where id=$id and bid=2",$conn);
	$array=mysql_fetch_array($rs);
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
 
<title>修改会员信息</title>
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
<body>
<div style="margin-top:10px;">
<form  name="form1" method="post" action="?action=mod" enctype="multipart/form-data">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
  <tr>
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改会员信息</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
 
 
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28" width="16%" class="td">会员账号</td>
        <td width="84%"  class="td"><input name="username"  type="text" size="30"  value="<?php echo $array["username"]?>" readonly />   <input name="id" type="hidden"   value="<?php echo $array["id"]?>" />     </td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28"  class="td">修改密码</td>
        <td  class="td">
        <input name="password"  type="text"   size="20"  value=""/>  
        </td>
      </tr>
  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28"  class="td">重复密码</td>
        <td   class="td">
<input name="repassword"  type="text"   size="20"  value=""/>  
           </td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28"  class="td">会员姓名</td>
        <td  class="td"><input name="relname"  type="text" size="20"  value="<?php echo $array["relname"]?>"/>   </td>
      </tr>
 
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        
        <td height="25"  class="td">会员头像</td>
        <td class="td">
        <input name="img" type="text" id="img" value="<?php echo $array['img']?>"  size="50" />

         <input type="text" id="image" value="修改头像" class="btn"  size="10"/></td>
      </tr>
   
  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
     
        <td height="25" class="td">个人简介</td>
        <td class="td">
	 <textarea name="content" style="width:100%;height:300px;"><?php echo $array['bei']?></textarea>
		</td>
      </tr>
   <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28"  class="td">注册时间</td>
        <td   class="td">
 <?php echo $array['data']?>
           </td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28"  class="td">登陆次数</td>
        <td  class="td"><?php echo $array["dlcs"]?>  </td>
      </tr>
     <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28"  class="td">注册时间</td>
        <td   class="td">
 <?php echo $array['dldata']?>
           </td>
      </tr>
      
   <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
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
<?php
mysql_free_result($rs);
mysql_close($conn);
?>