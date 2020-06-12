<?php 
	include("session.php"); 
	include("../php/conn.php");
error_reporting(0);

$bid=intval($_GET["bid"]);
if ($bid>0){
 
	$rsu=mysql_query("select id,title from tb_honors where  id=$bid",$conn);
	$arrayu=mysql_fetch_array($rsu);
	
	$bid=$arrayu["id"];
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title><?php echo $arrayu["title"]?> 活动报名管理</title>
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

<body>
	<div style="margin-top:10px;"> 
	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
	  	<tr>
			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF; font-size:14px;"><?php echo $arrayu["title"]?> 活动报名管理</div></td>
	  	</tr>
        <tr><td bgcolor="#FFFFFF">	
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
		<form action="admin_ubao.php" method="get" name="forms">
		<tr>
 <td style="text-align:left; background-color:#F1F5F8; height:25px; padding:5px;"> 
            <b>搜 索：</b>
 
        <input type="text" name="keys1" id="keys1"  size="30"/> 
       <input type="hidden" name="bid"  value="<?php echo $bid?>"/> 
	 <input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " />
				
				
			 </td>
             <td width="40%" align="center" style="background-color:#F1F5F8;padding:5px;">
              <input type="button" name="Submit3" value=" 导出数据 " onclick="window.location.href='dao2.php?bid=<?php echo $bid?>' "  class="btn1"/>
             &nbsp; &nbsp; &nbsp;
             
             <input type="button" name="Submit3" value=" 返 回 " onclick="window.location.href='admin_honor.php' "  class="btn1"/>
             </td>
		</tr></form>
        </table>
         
<?php
 
				$pagesize=20;
			 
 
	 
				$keys1=trim($_GET['keys1']);
	 
				if($bid>0){
				$tiao3="and bid=$bid";
				}
				if($keys1<>""){
				$tiao2="and (uname like '%$keys1%' or tel like '%$keys1%' or xiaoqu like '%$keys1%' )";
				}
  
		 $rs=mysql_query("select id from tb_ubao where id>0   $tiao2 $tiao3  ",$conn);
					$num=mysql_num_rows($rs);
					$pagemax=ceil($num/$pagesize);
					mysql_free_result($rs);
					$page=$_GET["page"];
					if($page<1) $page=1;
					if($page>$pagemax) $page=$pagemax;
					$p=($page-1)*$pagesize;
					$xxrs=mysql_query("select * from tb_ubao where id>0   $tiao2 $tiao3  order by id desc limit $p,$pagesize",$conn);	
				 
				?>
	 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
			<?php 
			if($num>0): 
			?>
				<form id="form1" name="form1" method="post" action="admin_ubao.php?dell=checkbox&bid=<?php echo $bid?>">
				<tr bgcolor="#5EB1E3" align="center" >
					<td width="87" height="30" class="bai">排 序</td>
					
			      <td width="193" class="bai">姓名</td>
         <td width="193" class="bai">手机</td>
         <td width="134" class="bai">小区</td>
         <td width="226" class="bai">QQ</td>
    
                   <td width="119" class="bai">报名时间</td>
				  <td width="154" class="bai">操 作</td>
				</tr>
				
				<?php
 while($array=mysql_fetch_array($xxrs)):			
 $tname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["uname"]);
 $dname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["tel"]);
 $xname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["xiaoqu"]);
  
 ?>
	 <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" /> <?php echo $array["id"]?></td>
					 
				    <td class="td td3" align="left"><span style="color:#0000ff; font-size:14px;"><?php echo $tname?></span>  
  
              </td>
              <td class="td"> <span style="color:#ff0000; font-size:14px;"><?php echo $dname?></span>   </td>
            <td class="td"> <span style="color:#006600; font-size:14px;"><?php echo $xname?></span>   </td>
            <td class="td"> <?php echo  $array['qqs']?>  </td>
            
			 
                <td class="td">
					<?php echo date("Y-m-d",strtotime($array['data']))?>
					 </td>
				    <td class="td">
     
	<input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后放入回收站!')){window.location.href='admin_ubao.php?id=<?php echo $array["id"]?>&del=ok&bid=<?php echo $bid?>';}else{history.go(0);}"  class="btn"/></td>
				</tr>
				<?php
				 endwhile;
				 mysql_free_result($xxrs);
				
				?>
				
				<tr   align="center"  >
                <td colspan="9" style="border:0;">
                 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
                 <tr>
					<td width="7%" class="td" align="center"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
					<td align="left" colspan="2" class="td"><input type="submit" name="button" id="button" value="删除选中项"  class="btn"/></td>
					 
				 
				    <td width="74%" height="30" colspan="4" align="right" class="td">
                    <div id="showpages" >
	<div id="pagesinfo">共<?php echo $num?>个 每页<?php echo $pagesize?>个 页次：<?php echo $page?>/<?php echo $pagemax?></div>
	<div id="pages"><ul><li class="pbutton"> <a href="?bid=<?php echo $bid?>&page=1&keys1=<?php echo $keys1?>" >首页</a></li><li class="pbutton"> <a href="?bid=<?php echo $bid?>&page=<?php echo ($page-1)?>&keys1=<?php echo $keys1?>" >上一页</a></li>
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
                           <li class="pagesnow"><a href='?page=<?php echo $ys?>&bid=<?php echo $bid?>&keys1=<?php echo $keys1?>'>
 
    <?php if ($ys==$page) {?>   
                             <font color=#ff0000><b style="font-size:14px;"><?php echo $ys?></b></font>
 <?php }else {?>
 <?php echo $ys?>
 <?php } ?>
   
                                </a></li>
 <?php } ?>                               
    <li class="pbutton"><a href="?page=<?php echo ($page+1)?>&bid=<?php echo $bid?>&keys1=<?php echo $keys1?>" >下一页</a></li><li class="pbutton"><a href="?bid=<?php echo $bid?>&page=<?php echo $pagemax?>&keys1=<?php echo $keys1?>" class="titlefont" >尾页</a></li></ul></div>
</div>
                    
                    
                   		</td>
                   </tr>
                    </table>
                    </td>
					
				</tr>
				</form>
			<?php else:?>
			<div style=" padding:20px;font-size:14px; color:#990000; background:#FFFFFF; font-weight:bold; text-align:center">暂时没有信息！</div>
			<?php endif?>	
			</table></td>
		</tr>
	</table>
    
	</div>

</body>
</html>

<?php
 
mysql_free_result($rsu);
}
 

$del=$_GET["del"];
$id=$_GET["id"];
$bid=intval($_GET["bid"]);
$dell=$_GET["dell"];
$checkbox=$_POST['chk'];

include("../php/conn.php");
if($del=='ok' and $id<>""){
	mysql_query("delete from tb_ubao   where id=$id",$conn);
	echo"<script>window.location.href='admin_ubao.php?bid=$bid';</script>" ; 
}
if( $dell=="checkbox" and $checkbox<>""){
  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			mysql_query("delete from tb_ubao   where id=$id",$conn);
			echo "<script>alert('批量删除成功!');location.href='admin_ubao.php?bid=$bid';</script>";
		}
	}
}
 mysql_close($conn);
?>
