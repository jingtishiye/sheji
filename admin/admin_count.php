<?php
include("../php/conn.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>后台登陆记录</title>
<script language="javascript"> 
<!-- 
function CheckAll(){ 
 for (var i=0;i<eval(form1.elements.length);i++){ 
  var e=form1.elements[i]; 
  if (e.name!="allbox") e.checked=form1.allbox.checked; 
 } 
} 
--> 
</script> 
<style type="text/css">
<!--
.STYLE1 {color: #000000}
.bai{
color:#FFFFFF;
font-size:12px;
font-weight:bold;
text-align:center;
font-family:"宋体";
}
-->
</style>
</head>
<body>
<?php 
	
	$pagesize=20;
	$rs=mysql_query("select * from tb_admincount",$conn);
	$num=mysql_num_rows($rs);
	$pagemax=ceil($num/$pagesize);
	mysql_free_result($rs);
	$page=$_GET["page"];
	if($page<1) $page=1;
	if($page>$pagemax) $page=$pagemax;
	$p=($page-1)*$pagesize;
	$xxrs=mysql_query("select * from tb_admincount order by dldata desc limit $p,$pagesize",$conn);	
?> 
	<div style="margin-top:10px;"> 
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
		<tr>
			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">后台登陆记录</div></td>
		</tr> 
		<tr>
			<td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="2" >
				<?php if($num>0): ?>
				<form id="form1" name="form1" method="post" action="admin_count.php?del=checkbox">
				<tr bgcolor="#5EB1E3" align="center" >
					<td width="4%" height="30" class="bai"></td>
					<td width="6%" class="bai">序号</td>
				    <td width="30%" class="bai">用户名</td>
				    <td width="30%" class="bai">登陆IP</td>
				    <td width="30%" class="bai">最后登陆时间</td>
				</tr>
				
				<?php
				while($array=mysql_fetch_array($xxrs)):
			 	?>
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" /></td>
					<td class="td"><?php echo $array["id"]?></td>
				    <td class="td"><?php echo $array["name"]?></td>
				    <td class="td"><a href="http://www.ip138.com/ips.asp?ip=<?php echo $array["ip"]?>" target="_blank" title="点击查看IP信息"><?php echo $array["ip"]?></a></td>
				    <td class="td"><?php echo $array["dldata"]?></td>
				</tr>
				<?php
				 endwhile;
				 mysql_free_result($xxrs);
				 mysql_close($conn);
				?>
				
				<tr bgcolor="#F1F5F8" align="center" >
					<td class="td"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
					<td align="left" colspan="2" class="td"><input type="submit" name="button" id="button" value="删除选中项"  class="btn"/></td>
					</form>
				    <form id="form2" name="form2" method="get" action="">
				    <td colspan="5" height="30" align="right" class="td">					
						<a href="admin_count.php?page==1">首页</a>
						<a href="admin_count.php?page=<?php echo ($page-1)?>">上一页</a>
						<a href="admin_count.php?page=<?php echo ($page+1)?>">下一页</a>
						<a href="admin_count.php?page=<?php echo $pagemax?>">尾页</a>
						当前第<?php echo $page?>/<?php echo $pagemax?>页						
						<input name="page" type="text" id="page" size="2" />
						<input type="submit" name="Submit" value="GO" />	
					</td>
					</form>
				</tr>
				<?php else:?>
				<div style=" padding:20px;font-size:14px; color:#990000; font-weight:bold; text-align:center">暂时没有信息！</div>
				<?php endif?>
			</table></td>
		</tr>
	</table>
	</div>
</body>
</html>

<?php
$del=$_GET["del"];
$checkbox=$_POST['chk'];
$allbox=$_POST["allbox"];

if($del==checkbox and $checkbox<>""){
	include("../php/conn.php");
	for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			$rsg=mysql_query("delete from tb_admincount where id='$id'");
			echo"<script>alert('批量删除成功!');window.location.href='admin_count.php';</script>";	
		}
	}
	mysql_free_result($rsg);
	mysql_close($conn);
}
?>