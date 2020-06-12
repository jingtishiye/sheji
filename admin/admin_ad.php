<?php 
	include("session.php");
error_reporting(0); 
	include("../php/conn.php");
	$bid=$_GET['bid'];
	 if ($bid==""){
	 $bid=0;
	 }
	 
		 $bname="栏目位置图片";
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>管理<?php echo $bname?></title>
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
color:#ffffff; font-weight:bold; font-size:14px; cursor:hand; background:url(images/sub1.jpg) no-repeat; width:90px; height:35px; border:0;
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
<body >
<div  style="margin-top:10px;"> 
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
		<tr>
			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">管理<?php echo $bname?></div></td>
		</tr>
        <tr><td bgcolor="#FFFFFF">
         <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
		<form action="admin_ad.php" method="get" name="forms">
		<tr>
			<td style="text-align:left; background-color:#F1F5F8; height:25px; padding:5px;"> 
            <b>搜 索：</b>
			 
                <input type="text" name="keys1" id="keys1"  size="30"/> 
				<input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " />
				<input type="hidden" name="bid"  value="<?php echo $bid?>"/> 
				
			 </td>
             <td width="40%" align="center" style="background-color:#F1F5F8;padding:5px;">
             <input type="button" name="Submit3" value=" 添 加 " onclick="window.location.href='add_ad.php?bid=<?php echo $bid?>' "  class="btn1"/>
             </td>
		</tr></form>
        </table>
        
                <?php 
$keys1=trim($_GET['keys1']);
				 
 
				if($keys1<>""){
				$tiao1="and title like'%$keys1%'";
				}
	$pagesize=20;
	$rs=mysql_query("select id from tb_ads where id>0 $tiao1 ",$conn);
	$num=mysql_num_rows($rs);
	$pagemax=ceil($num/$pagesize);
	mysql_free_result($rs);
	$page=$_GET["page"];
	if($page<1) $page=1;
	if($page>$pagemax) $page=$pagemax;
	$p=($page-1)*$pagesize;
	$xxrs=mysql_query("select * from tb_ads where  id>0 $tiao1 order by  id asc limit $p,$pagesize",$conn);	
?> 
               
			<table width="100%" border="0" align="center" cellpadding="5" cellspacing="2" >
			<?php if($num>0):	?> 
				<form id="form1" name="form1" method="post" action="admin_ad.php?dell=checkbox&bid=<?php echo $bid?>">
				<tr bgcolor="#5EB1E3" align="center" >
					<td width="9%" height="30" class="bai">ID</td>
                    
				  <td width="20%" class="bai">位置</td>
               
			      <td width="44%" class="bai">名称</td>
			       
               
			      
				  <td width="27%" class="bai">操作</td>
				</tr>
				
				<?php
				while($array=mysql_fetch_array($xxrs)):
			 	?>
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" /><?php echo $array["id"]?></td>
                     
					<td class="td" style="color:#F00;"><?php echo $array["weizhi"]?></td>
                    
				    <td class="td td3"><a href="xiugai_ad.php?id=<?php echo $array["id"]?>&bid=<?php echo $bid?>" style="color:#003399; font-size:14px;"><?php echo $array["title"]?></a>
                    
                 <?php if ($array['image']<>"") {?><a href="../<?php echo $array['image']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a><?php } ?>   
                    </td>
				    
					 
				    <td class="td"><input type="button" name="Submit3" value=" 修 改 " onclick="window.location.href='xiugai_ad.php?id=<?php echo $array["id"]?>&bid=<?php echo $bid?>' "  class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
				   <!-- <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='admin_ad.php?id=<?php echo $array["id"]?>&del=ok&bid=<?php echo $bid?>';}else{history.go(0);}"  class="btn"/>--></td>
				</tr>
				<?php
				 endwhile;
				 mysql_free_result($xxrs);
				  
				?>
				
				<tr   align="center" >
					<td   colspan="6"> 
                    
                    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
                 <tr>
					<td width="6%" class="td" align="center"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
					<td align="left" colspan="2" class="td"><!--<input type="submit" name="button" id="button" value="删除选中项"  class="btn"/>--></td>
					 
				 
				    <td width="74%" height="30" colspan="4" align="right" class="td">
                    <div id="showpages" >
	<div id="pagesinfo">共<?php echo $num?>个  每页<?php echo $pagesize?>个 页次：<?php echo $page?>/<?php echo $pagemax?></div>
	<div id="pages"><ul><li class="pbutton"> <a href="?page=1&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" >首页</a></li><li class="pbutton"> <a href="?page=<?php echo ($page-1)?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" >上一页</a></li>
      <?php 
	  if (($page-4)>1) {
$ys=$page-4;
$yb=$page+4;
}
else{
$ys=1;
$yb=5;
}
 if ($yb>$pagemax){
$yb=$pagemax;
}
for($ys;$ys<=$yb;$ys++){ 
?>
<li class="pagesnow"><a href='?page=<?php echo $ys?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>'>
 
                             <?php if ($ys==$page) {?>   
                             <font color=#ff0000><b style="font-size:14px;"><?php echo $ys?></b></font>
 <?php }else {?>
 <?php echo $ys?>
 <?php } ?>
   
                                </a></li>
 <?php } ?>                               
    <li class="pbutton"><a href="?page=<?php echo ($page+1)?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" >下一页</a></li><li class="pbutton"><a href="?page=<?php echo $pagemax?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" class="titlefont" >尾页</a></li></ul></div>
</div>
                    
                    
                   		</td>
                   </tr>
                    </table>
					</td>
					
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
$dell=$_GET["dell"];
$checkbox=$_POST['chk'];
$allbox=$_POST["allbox"];
include("../php/conn.php");
if($del=='ok' and $id<>""){
	mysql_query("delete from tb_ads where id='$id'",$conn);
	echo"<script>window.location.href='admin_ad.php?bid=$bid';</script>" ; 
}

if($dell==checkbox and $checkbox<>""){
	include("../php/conn.php");
	for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			$rsg=mysql_query("delete from tb_ads where id='$id'");
			echo"<script>alert('批量删除成功!');window.location.href='admin_ad.php?bid=$bid';</script>";	
		}
	}
	mysql_free_result($rsg);
	mysql_close($conn);
}
?>