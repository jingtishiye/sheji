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

<title>论坛帖子评论管理</title>

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

			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">论坛帖子评论管理</div></td>

	  	</tr>

        <tr><td>	

        

         

<?php

 

				$pagesize=20;

			 

               $uid=$_GET['uid'];

			    $tid=$_GET['tid'];

		 

				if ($uid==""){

				$uid=0;

				}

				if ($tid==""){

				$tid=0;

				}

				 

			 

			 if($uid>0){

				$tiao3="and uid=$uid";

				 }

			  if($tid>0){

				$tiao1="and bid=$tid";

				 }

		  

				 

				 

		 $rs=mysql_query("select id from tb_upl where id>0 $tiao1   $tiao3",$conn);

					$num=mysql_num_rows($rs);

					$pagemax=ceil($num/$pagesize);

					mysql_free_result($rs);

					$page=$_GET["page"];

					if($page<1) $page=1;

					if($page>$pagemax) $page=$pagemax;

					$p=($page-1)*$pagesize;

					$xxrs=mysql_query("select * from tb_upl where id>0 $tiao1 $tiao3 order by id  desc limit $p,$pagesize",$conn);	

				 

				?>

	 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">

			<?php 

			if($num>0): 

			?>

				<form id="form1" name="form1" method="post" action="admin_upl.php?dell=checkbox">

				<tr bgcolor="#5EB1E3" align="center" >

					<td width="7%" height="30" class="bai">排 序</td>

				  <td width="13%" class="bai">评论人姓名</td>

			      <td width="46%" class="bai">评论帖子</td>

 

                       

				  <td width="18%" class="bai">评论时间</td>

                   

				  <td width="16%" class="bai">操作</td>

				</tr>

				

				<?php

				while($array=mysql_fetch_array($xxrs)):

				

				 

			 	?>

				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

					<td class="td"><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" /> <?php echo $array["id"]?></td>

					<td class="td">		





<?php

if ($array['uid']>0) {

 $rs5=mysql_query("select username  from tb_user where  id=$array[uid]",$conn);

	$array5=mysql_fetch_array($rs5);

	?>				

	<a href="admin_upl_xx.php?id=<?php echo $array["id"]?>" style="color:#003399; font-size:14px;"> <?php echo $array5["username"]?></font></a>             

           <?php

           mysql_free_result($rs5);

		   }

		   ?>  

                    </td>

				   <td class="td"  align="left" >

<?php	

 if ($array['bid']>0) {

 $array1=mysql_fetch_array(mysql_query("select title,id from xingxi where id=$array[bid]",$conn)) ;

?>

<a href="../showbbs.php?id=<?php echo $array1["id"]?>" target="_blank" style="color:#990033; font-size:12px;"><?php echo $array1["title"]?></a> 

<?php } ?>       

                   </td>

				    

                    

					<td class="td"><?php echo $array["data"]?></td>

                   

				    <td class="td"><input type="button" name="Submit3" value=" 查 看 " onclick="window.location.href='admin_upl_xx.php?id=<?php echo $array["id"]?>' "  class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;

				    <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='admin_upl.php?id=<?php echo $array["id"]?>&&del=ok';}else{history.go(0);}"  class="btn"/></td>

				</tr>

				<?php

				 endwhile;

				 mysql_free_result($xxrs);

				

				?>

				

				<tr   align="center"  >

                <td colspan="10" style="border:0;">

                 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">

                 <tr>

					<td width="6%" class="td" align="center"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>

					<td align="left" colspan="2" class="td"><input type="suplit" name="button" id="button" value="删除选中项"  class="btn"/></td>

					 

				 

				    <td width="74%" height="30" colspan="4" align="right" class="td">

                    <div id="showpages" >

	<div id="pagesinfo">共<?php echo $num?>个  每页<?php echo $pagesize?>个 页次：<?php echo $page?>/<?php echo $pagemax?></div>

	<div id="pages"><ul><li class="pbutton"> <a href="?tid=<?php echo $tid?>&page=1&keys1=<?php echo $keys1?>" >首页</a></li><li class="pbutton"> <a href="?tid=<?php echo $tid?>&page=<?php echo ($page-1)?>&keys1=<?php echo $keys1?>" >上一页</a></li>

      <? 

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

                           <li class="pagesnow"><a href='?page=<?php echo $ys?>&tid=<?php echo $tid?>&keys1=<?php echo $keys1?>'>

 

                             <? if ($ys==$page) {?>   

                             <font color=#ff0000><b style="font-size:14px;"><?php echo $ys?></b></font>

 <? }else {?>

 <?php echo $ys?>

 <? } ?>

   

                                </a></li>

 <? } ?>                               

    <li class="pbutton"><a href="?tid=<?php echo $tid?>&page=<?php echo ($page+1)?>&keys1=<?php echo $keys1?>" >下一页</a></li><li class="pbutton"><a href="?tid=<?php echo $tid?>&page=<?php echo $pagemax?>&keys1=<?php echo $keys1?>" class="titlefont" >尾页</a></li></ul></div>

</div>

                    

                    

                   		</td>

                   </tr>

                    </table>

                    </td>

					

				</tr>

				</form>

			<? else:?>

			<div style=" padding:20px;font-size:14px; color:#990000; background:#FFFFFF; font-weight:bold; text-align:center">暂时没有信息！</div>

			<? endif?>	

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



include("../php/conn.php");

if($del=='ok' and $id<>""){

	mysql_query("delete from tb_upl where id='$id'",$conn);

	echo"<script>window.location.href='admin_upl.php';</script>" ; 

}

if( $dell=="checkbox" and $checkbox<>""){

  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项

	   if(!is_null($checkbox[$i])){

			$id=$checkbox[$i];

			mysql_query("delete from tb_upl where id='$id'",$conn);

			echo "<script>alert('批量删除成功!');location.href='admin_upl.php';</script>";

		}

	}

}

 mysql_close($conn);

?>

