<?php
header("content-type:text/html;charset=utf-8");
include("session.php"); 
include("../php/conn.php");
error_reporting(0);

$actions=trim($_GET["action"]);

if ($actions=="mod"){

$id=trim($_POST["id"]);
$lxid=trim($_POST['lxid']);
$sh=trim($_POST['sh']);
$content=trim($_POST['content']);
$uid=trim($_POST["uid"]); 
 
if ($lxid==""){
$lxid=0;
}
if ($uid==""){
$uid=0;
}
if ($sh==""){
$sh=0;
}
  
if($uid>0   and $content<>""  ){
 
 
 include("../php/dbo.php"); 
 
 $_my=new Dbo("update tb_upl set lxid='$lxid',sh='$sh',content='$content'  where id=$id",0);
	echo "<script>alert('修改成功！');document.location.href='admin_ubm.php?uyid=$uid';</script>";
}else{
	echo "<script>alert('信息不完整！');history.go(-1);</script>";
}
}

$id=intval(trim($_GET["id"]));
if($id>0){
	 
	$rs=mysql_query("select * from tb_upl where id=$id",$conn);
	$array=mysql_fetch_array($rs);
	$uid=$array['uyid'];
	
 $rs5=mysql_query("select relname,id from tb_user  where  id=$uid",$conn);
 $array5=mysql_fetch_array($rs5);
 $bname=$array5["relname"];
 mysql_free_result($rs5);
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
 
<title>修改评论工长<?php echo $bname?>的信息</title>
 
 
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
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改评论工长<?php echo $bname?>的信息</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
    <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">  
        <td height="36" class="td">审 核</td>
        <td  class="td"><input name="sh" type="radio"  value="0" <?php if ($array["sh"]==0){?> checked <?php }?> > 待审核 <input name="sh" type="radio"  value="1" <?php if ($array["sh"]==1){?> checked <?php }?> > 已审核 </td>
      </tr>
  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="36" class="td">评论工长</td>
        <td class="td"  style="font-size:16px; color:#FF0000;">
 	  
	 <b><?php echo $bname?></b><input name="uid"  type="hidden"  value="<?php echo $uid?>" />
    </td>
  </tr>
    
  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">  
        <td height="36" width="16%" class="td">评论人</td>
        <td width="84%"  class="td">
<?php
 if ($array['uid']>0) {
 $rs5=mysql_query("select username  from tb_user where  id=$array[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
 ?>
  <font style="color:#983D66;"><?php echo $array5["username"]?></font> 
  <?php
mysql_free_result($rs5);
}else{
	echo  $array["utel"];
}
?>
        
         <input name="id"   type="hidden"   value="<?php echo $array["id"]?>" /> </td>
      </tr>
 
    <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="36" width="16%" class="td">类 型</td>
        <td width="84%"  class="td"><input name="lxid" type="radio"  value="0" <?php if ($array["lxid"]==0){?> checked <?php }?> > 表扬 <input name="lxid" type="radio"  value="1" <?php if ($array["lxid"]==1){?> checked <?php }?> > 投诉 </td>
      </tr>
 
  
 
  
       
      
   
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">   

       
        <td height="36" width="16%" class="td">评论内容</td>
        <td width="84%"  class="td"><textarea id="content" name="content" cols="80" rows="10" ><?php echo $array["content"]?></textarea></td>
      </tr>
  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="36" class="td">评论时间</td>
        <td class="td"  style="font-size:16px; color:#FF0000;">
 	  
	  <?php echo $array["data"]?> 
    </td>
  </tr>

      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF"> 
        <td height="36" class="td">&nbsp;</td>
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