<?php 
	include("session.php"); 
	include("../php/conn.php");
error_reporting(0);


$bid=intval($_GET["bid"]);
if ($bid>0){
 
	$rsu=mysql_query("select id,title,mjs  from xingxis where id=$bid",$conn);
	$arrayu=mysql_fetch_array($rsu);
	$bname=$arrayu["title"];
	$bid=$arrayu["id"];
	$mjs=$arrayu["mjs"];
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>工地<?php echo $bname?> 装修报价管理</title>
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
color:#ffffff; font-weight:bold; cursor:hand; background:url(images/sub1.jpg) no-repeat; width:90px; height:35px; border:0;
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
			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF; font-size:14px;">工地<?php echo $bname?> 装修报价管理</div></td>
	  	</tr>
        <tr><td bgcolor="#FFFFFF">	
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
		<form action="admin_price.php" method="get" name="forms">
		<tr>
 <td style="text-align:left; background-color:#F1F5F8; height:25px; padding:5px;"> 
            <b>搜 索：</b>
 <input type="hidden" name="bid" value="<?php echo $bid?>" />
 <input type="text" name="keys1" id="keys1"  size="30"/> 
 <input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " />
				
				
			 </td>
             <td width="47%" bgcolor="#F1F5F8" align="center" style="padding:5px;">
              <input type="button" name="Submit3" value=" 添 加 " onclick="window.location.href='admin_price_add.php?bid=<?php echo $bid?>' "   class="btn1"/>  
 
 
</td>
		</tr></form>
        </table>
         
<?php
				$pagesize=20;
				$bid=$_GET['bid'];
				if ($bid==""){
				$bid=0;
				}

				$keys1=trim($_GET['keys1']);
	 
				if($bid>0){
				$tiao3="and bid=$bid";
				}
				if($keys1<>""){
				$tiao2="and  xqus like '%$keys1%' ";
				}
  
		 $rs=mysql_query("select id from tb_gong where id>0   $tiao2 $tiao3  ",$conn);
					$num=mysql_num_rows($rs);
					$pagemax=ceil($num/$pagesize);
					mysql_free_result($rs);
					$page=$_GET["page"];
					if($page<1) $page=1;
					if($page>$pagemax) $page=$pagemax;
					$p=($page-1)*$pagesize;
					$xxrs=mysql_query("select * from tb_gong where id>0   $tiao2 $tiao3  order by id desc limit $p,$pagesize",$conn);	
				 
				?>
	 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
			<?php 
			if($num>0): 
			?>
<form id="form1" name="form1" method="post" action="admin_price.php?dell=checkbox&bid=<?php echo $bid?>">
				<tr bgcolor="#5EB1E3" align="center" >
				  <td width="83" height="30" class="bai">排 序</td>
				  <td width="206" class="bai">工 地</td>
			      <td width="84" class="bai">工 长</td>
                  <td width="187" class="bai">报价小区</td>
                  <td width="103" class="bai">合同价</td>
                  <td width="102" class="bai">面 积</td>
                  <td width="161" class="bai">时 间</td>
				  <td width="191" class="bai">操 作</td>
				</tr>
				
				<?php
 while($array=mysql_fetch_array($xxrs)):			
 $tname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["xqus"]);
 ?>
	 <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
	<td class="td"><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" /> <?php echo $array["id"]?></td>
	<td class="td"><a href="?bid=<?php echo $array["bid"]?>" ><?php echo $bname?></a></td>
	<td class="td"> <?php
 if ($array['uid']>0) {
 $rs5=mysql_query("select relname  from tb_user where bid=0 and id=$array[uid]",$conn);
	$array5=mysql_fetch_array($rs5);
 ?>				
	 <a href="?uid=<?php echo $array["uid"]?>&bid=<?php echo $array["bid"]?>" ><font style="color:#983D66;"><?php echo $array5["relname"]?></font></a>             
           <?php
           mysql_free_result($rs5);
		   }?>
     </td>
     <td class="td" ><a href="admin_price_mod.php?id=<?php echo $array["id"]?>" style="color:#0000ff; font-size:14px;"><?php echo $tname?></a> <?php if ($array['img']<>"") {?><a href="../<?php echo $array['img']?>" target="_blank" title="报价"><img src="images/h001.gif" /></a><?php } ?></td>
     <td class="td" ><font style="color:#983D66;"><?php echo $array["hprice"]?>元</font></td>
     <td class="td"><?php echo $array["mjs"]?>㎡</td>
     <td class="td"><?php echo date("Y-m-d",strtotime($array['data']))?></td>
	 <td class="td">
    <input type="button" name="Submit3" value=" 修 改 " onclick="window.location.href='admin_price_mod.php?id=<?php echo $array["id"]?>' "  class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后放入回收站!')){window.location.href='admin_price.php?id=<?php echo $array["id"]?>&del=ok&bid=<?php echo $bid?>';}else{history.go(0);}"  class="btn"/></td>
				</tr>
				<?php
				 endwhile;
				 mysql_free_result($xxrs);
				
				?>
				
				<tr   align="center"  >
                <td colspan="8" style="border:0;">
                 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
                 <tr>
					<td width="7%" class="td" align="center"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
					<td align="left" colspan="2" class="td"><input type="submit" name="button" id="button" value="删除选中项"  class="btn"/></td>
					 
				 
				    <td width="74%" height="30" colspan="4" align="right" class="td">
                    <div id="showpages" >
	<div id="pagesinfo">共<?php echo $num?>条  每页<?php echo $pagesize?>条 页次：<?php echo $page?>/<?php echo $pagemax?></div>
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
 <?php }else {
	 echo $ys;
	 } ?>
   
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
$del=$_GET["del"];
$id=$_GET["id"];
$bid=intval($_GET["bid"]);
$dell=$_GET["dell"];
$checkbox=$_POST['chk'];

include("../php/conn.php");
if($del=='ok' and $id<>""){
	mysql_query("delete from tb_gong where id=$id",$conn);
	echo"<script>window.location.href='admin_price.php?bid=$bid';</script>" ; 
}
if( $dell=="checkbox" and $checkbox<>""){
  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			mysql_query("delete from tb_gong where id=$id",$conn);
			echo "<script>alert('批量删除成功!');location.href='admin_price.php?bid=$bid';</script>";
		}
	}
}
 mysql_close($conn);
?>
