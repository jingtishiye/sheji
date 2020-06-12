<?php 
include("session.php"); 
include("../php/conn.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>分类管理</title>
</head>
 
<body>
<div style="margin-top:10px;"> 
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
		<tr>
			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">分类管理</div></td>
		</tr>
		<tr>
			<td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" >
			<?php
				$xxrs=mysql_query("select * from tb_tbbs order by px_id asc ",$conn);
				while($array=mysql_fetch_array($xxrs)):
			?> 
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
				  <td width="10%" class="td"><?php echo $array["bid"]?> </td>
			      <td width="41%" class="td td3" align="left"><?php echo $array["btitle"]?></td>
			      <td width="19%" class="td">排序：<?php echo $array["px_id"]?></td>
			      <td width="30%" class="td"><input type="button" onclick="window.location.href='?action1=mod&did=<?php echo $array["bid"]?>#xlei' " name="button2" id="button2" value=" 修 改 "  class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
			      <input type="button" name="Submit" value=" 删 除 " onClick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='?act=del&dd=<?php echo $array["bid"]?>';}else{history.go(0);}"  class="btn"/></td> 
			  </tr>
				<?php
				 endwhile;
				 mysql_free_result($xxrs);
				?>	
				 
			 
			</table></td>
		</tr>
	</table>
	</div>
    <div style="margin-top:10px">
    
<?php
$action1=$_GET["action1"];
if ($action1=="mod"){
 $did=$_GET["did"];
	
	$rs1=mysql_query("select * from tb_tbbs where bid='$did'",$conn);
	$array1=mysql_fetch_array($rs1);
 
?>
	
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
	<form action="admin_sbbs.php?act=edit" method="post" name="add">
       <input name="id" type="hidden"  value="<?php echo $array1["bid"]?>" />
	  <tr>
		<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改分类</div><a name="xlei"></a></td>
	  </tr>
	  <tr>
		<td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
 
		  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF" >
			<td height="25" width="19%" class="td">名 称：</td>
			<td width="81%"  class="td"><input type="text" name="title" id="title" size="30" value="<?php echo $array1["btitle"]?>" /><font color="#FF0000">  * </font>名称与前面的不可重复！</td>
		  </tr>
		  <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
			<td width="19%" height="13" class="td">排序ID：</td>
			<td class="td"><input type="text" name="px_id" id="px_id" size="30"  value="<?php echo $array1["px_id"]?>"/><font color="#FF0000">  * </font>数字越小越靠前！</td>
		  </tr>
           <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF" >
			<td height="25" class="td">&nbsp;</td>
			<td class="td"><input type="submit" name="button" id="button" value="确认修改"  class="btn"/></td>
		  </tr>
		</table></td>
	  </tr></form>
	</table>
<?php 
 
mysql_free_result($rs1);
}  
if ($action1==""){
?>

	
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
	<form action="admin_sbbs.php?act=add" method="post" name="add">
	  <tr>
		<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">增加分类</div></td>
	  </tr>
	  <tr>
		<td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
        
		  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF" >
			<td height="25" width="19%" class="td">名 称：</td>
			<td width="81%"  class="td"><input type="text" name="title" id="title" size="30"  /><font color="#FF0000">  * </font>名称与前面的不可重复！</td>
		  </tr>
		 <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
			<td width="19%" height="13" class="td">排序ID：</td>
			<td class="td"><input type="text" name="px_id" id="px_id" size="30"  /><font color="#FF0000">  * </font>数字越小越靠前！</td>
		  </tr>
         
		  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF" >
			<td height="25" class="td">&nbsp;</td>
			<td class="td"><input type="submit" name="button" id="button" value="提交数据"  class="btn"/></td>
		  </tr>
		</table></td>
	  </tr></form>
	</table>
<?php
 }
?>
    </div>
</body>
</html>
<?php
	$act=$_GET["act"];
	$id=trim($_POST["id"]);
	$title=trim($_POST["title"]);
	$px_id=trim($_POST["px_id"]);
 
	if($act=="edit" and $id<>"" and $title<>"" and $px_id<>""){
		include("../php/conn.php");
		mysql_query("update tb_tbbs set btitle='$title',px_id='$px_id' where bid='$id'",$conn);
		echo"<script>alert('分类修改成功!');window.location.href='admin_sbbs.php';</script>" ; 
		mysql_close($conn);
	}	
	
	$dd=$_GET["dd"];
	if($act=='del' and $dd<>""){
		include("../php/conn.php");
		mysql_query("delete from tb_tbbs where bid='$dd'",$conn);
		echo"<script>alert('分类删除成功!');window.location.href='admin_sbbs.php';</script>" ; 
		mysql_close($conn);
	}
	
	if($act=='add' and $title<>"" and $px_id<>""){
	 
		include("../php/conn.php");
		mysql_query("insert into tb_tbbs(btitle,px_id) values('$title','$px_id')",$conn);
        echo "<script>alert('分类添加成功!');window.location.href='admin_sbbs.php';</script>" ; 
		mysql_close($conn);
	}
?>