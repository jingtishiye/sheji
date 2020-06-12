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
<title>幻灯片管理</title>
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
.btn1{
color:#ffffff; font-weight:bold; cursor:hand; background:url(images/sub1.jpg) no-repeat; width:90px; height:35px; border:0; cursor:pointer;
}
-->
</style>
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
</head>
<body>
<?php 
	
	$pagesize=20;
	$rs=mysql_query("select id from tb_flash ",$conn);
	$num=mysql_num_rows($rs);
	$pagemax=ceil($num/$pagesize);
	mysql_free_result($rs);
	$page=$_GET["page"];
	if($page<1) $page=1;
	if($page>$pagemax) $page=$pagemax;
	$p=($page-1)*$pagesize;
	$xxrs=mysql_query("select * from tb_flash order by weizhi asc, px_id asc limit $p,$pagesize",$conn);	
?> 
	<div style="margin-top:10px;"> 
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
		<tr>
			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">幻灯片管理</div></td>
		</tr> 
		<tr>
			<td bgcolor="#FFFFFF">
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
		<form action="admin_flash.php" method="get" name="forms">
		<tr>
 <td style="text-align:left; background-color:#F1F5F8; height:25px; padding:5px;"> 
            <b>搜 索：</b>

 <input type="text" name="keys1" id="keys1"  size="20"/> 
 <input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " />
				
				
			 </td>
             <td width="47%" bgcolor="#F1F5F8" align="center" style="padding:5px;">
              <input type="button" name="Submit3" value=" 添 加 " onclick="window.location.href='add_flash.php' "   class="btn1"/>  
 
 
</td>
		</tr></form>
        </table>
            <table width="100%" border="0" align="center" cellpadding="5" cellspacing="2" >
				<?php if($num>0): ?>
				<form id="form1" name="form1" method="post" action="admin_flash.php?del=checkbox">
				<tr bgcolor="#5EB1E3" align="center" >
					<td width="8%" height="30" class="bai">序 号</td>
			      <td width="34%" class="bai">标 题</td>
				  <td width="11%" class="bai">预 览</td>
				  <td width="29%" class="bai">位 置</td>
				   
				  <td width="18%" class="bai">操 作</td>
				</tr>
				
				<?php
				while($array=mysql_fetch_array($xxrs)):
			 	?>
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><?php echo $array["px_id"]?></td>
				    <td class="td"><a href="xiugai_flash.php?id=<?php echo $array["id"]?>" style="color:#003399"><?php echo $array["title"]?></a></td>
					<td class="td">&nbsp;&nbsp;[<a href="../<?php echo $array['image']?>" target="_blank" style="color:#003399">预览</a>]</td>
				    <td class="td">
					<?php if ($array["weizhi"]==0){?>
                    <font color="#ff0000">首页幻灯图</font>
                    <?php }elseif ($array["weizhi"]==1){?>       
                    <font color="#0000ff">首页最新签约幻灯图</font>       
                    <?php }elseif ($array["weizhi"]==2){?>       
                    <font color="#006600">手机幻灯图</font>
                    <?php }?>
                    </td>
					 
				    <td class="td"><input type="button" name="Submit3" value=" 修 改 " onclick="window.location.href='xiugai_flash.php?id=<?php echo $array["id"]?>' "  class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
				    <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='admin_flash.php?id=<?php echo $array["id"]?>&&del=ok';}else{history.go(0);}"  class="btn"/></td>
				</tr>
				<?php
				 endwhile;
				 mysql_free_result($xxrs);
				
				?>
				
				<tr bgcolor="#F1F5F8" align="center" >
					
				    
				</tr>
                </form>
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
$id=$_GET["id"];
if($del=='ok' and $id<>"")
{
$rs=mysql_query("delete from tb_flash where id='$id'",$conn);
echo"<script>window.location.href='admin_flash.php';</script>" ; 
}
 mysql_close($conn);
?>