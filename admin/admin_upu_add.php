<?php 
include("session.php"); 
include("../php/conn.php");
error_reporting(0);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
 
<title>添加会员信息</title>
 
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
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加会员信息</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
    
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
 
      
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28" width="16%" class="td">会员账号</td>
        <td width="84%"  class="td"><input name="username"   type="text" size="30"  />  <font color="#FF0000">*</font>  </td>
      </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28" class="td">密 码</td>
        <td class="td"><input name="password" type="password"   size="20"  />    <font color="#FF0000">*</font> 
        <input name="data"  type="hidden"   value="<?php echo date('Y-m-d G:i:s')?>" /></td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28"   class="td">确认密码</td>
        <td class="td">
<input name="repassword"  type="password"   size="20"  />  <font color="#FF0000">*</font> 
        
            </td>
      </tr>
 
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28"  class="td">姓 名</td>
        <td  class="td">
 <input name="relname"   type="text"   size="20"  />  <font color="#FF0000">*</font> 
        </td>
      </tr>
 
  
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="25"  class="td">会员头像</td>
        <td class="td">
        <input name="img" type="text" id="img"  size="50" />

         <input type="text" id="image" value="上传图片" class="btn"  size="10"/></td>
      </tr>
 
 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
     
        <td height="25" class="td">个人简介</td>
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

 
$username=trim($_POST['username']);
$password=trim($_POST['password']);
$repassword=trim($_POST['repassword']);
$relname=trim($_POST['relname']);
$hprice=trim($_POST['hprice']);
 
$imgs=trim($_POST['img']);
$content=trim($_POST['content']);

date_default_timezone_set('PRC');
$data=$_POST['data'];
 
 
if ($username==""){
echo "<script>alert('请填写会员账号！');history.go(-1);</script>";
exit;
}
 
if ($password==""){
echo "<script>alert('请填写密码！');history.go(-1);</script>";
exit;
}

if ($password<>$repassword){
echo "<script>alert('两次密码输入不一致！');history.go(-1);</script>";
exit;
}
if ($relname==""){
echo "<script>alert('请填写会员姓名！');history.go(-1);</script>";
exit;
} 

if ($username<>""   and $relname<>""   ){
	
 $pwd=md5($password);
 
		if ($content<>""){
		$content=str_replace("'","",$content);
        $content=str_replace("white-space:nowrap;","",$content); 
		}
 
	include("../php/dbo.php");
	$_my=new Dbo("insert into tb_user(username,passwords,relname,bid,bei,data,img) values('$username','$pwd','$relname','2','$content','$data','$imgs')",0);
	echo "<script>alert('会员信息添加成功！');document.location.href='admin_upu.php';</script>";
    }else{
	echo "<script>alert('信息不完整！');history.go(-1);</script>";
    }
}
mysql_close($conn); 
?>