<?php 

	include("session.php"); 

	include("../php/conn.php");

	error_reporting(0);

	$uyid=trim($_GET['uyid']);

	if ($uyid==""){

	 $uyid=0;

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" id="css" href="images/style.css">

<title>零工评论信息管理</title>

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

color:#FFFFFF;

font-size:14px;

font-weight:bold;

text-align:center;

font-family:"宋体";

background:url(images/sub1.jpg) no-repeat;

width:90px;

height:35px;

line-height:35px;

border:0;

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

			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">零工评论信息管理</div></td>

	  	</tr>

        <tr><td>	

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >

		<form action="admin_ups.php" method="get" name="forms">

		<tr>

			<td width="51%" bgcolor="#FFFFFF" style="text-align:left;  height:25px; padding:5px;"> 

            <b>搜 索：</b>

			 

                <input type="text" name="keys1" id="keys1"  size="20"/> &nbsp; 内容 &nbsp;

				<input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " />

                </td><td width="49%" bgcolor="#FFFFFF" style="text-align:left;  height:25px; padding:5px;">

                

			 </td>

              

		</tr></form>

        </table>

         

<?php





$rst=mysql_query("select  id  from tb_user where  bid=1 and  sh=1   order by  id asc  ",$conn);

$l=1;

$shhs="";

while($arrayt=mysql_fetch_array($rst)):

if ($l==1){

$shhs=$shhs.$arrayt["id"];

}else{

$shhs=$shhs.",".$arrayt["id"];

}

$l++;

endwhile;

mysql_free_result($rst); 

 

				$pagesize=20;

				$bid=$_GET['bid'];

		 

				if ($bid==""){

				$bid=2;

				}

				

				

               $uid=$_GET['uid'];

		 

				if ($uid==""){

				$uid=0;

				}

				$keys1=trim($_GET['keys1']);

	 

			 if($uid>0){

				$tiao3="and uid=$uid";

				 }

				if($uyid>0){

				$tiao5="and uyid=$uyid";

				 }

				if($keys1<>""){

				$tiao1="and  content like '%$keys1%'  ";

				}

 

				 

		            $rs=mysql_query("select id from tb_upl where uyid in ($shhs) $tiao1 $tiao2 $tiao3 $tiao5",$conn);

					$num=mysql_num_rows($rs);

					$pagemax=ceil($num/$pagesize);

					mysql_free_result($rs);

					$page=$_GET["page"];

					if($page<1) $page=1;

					if($page>$pagemax) $page=$pagemax;

					$p=($page-1)*$pagesize;

					$xxrs=mysql_query("select * from tb_upl where uyid in ($shhs) $tiao1 $tiao2 $tiao3  $tiao5 order by id  desc limit $p,$pagesize",$conn);	

				 

				?>

	 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">

			<?php 

			if($num>0): 

			?>

				<form id="form1" name="form1" method="post" action="admin_ups.php?dell=checkbox">

			<tr bgcolor="#5EB1E3" align="center" >

				<td width="8%" height="30" class="bai">排 序</td>

				<td width="14%" class="bai">评论人姓名</td>

			    <td width="15%" class="bai">评论零工</td>

				<td width="10%" class="bai">类型</td>

                <td width="31%" class="bai">评论内容</td>

  

                <td width="11%" class="bai">评论时间</td>

                <td width="11%" class="bai">操作</td>

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

    <a href="?uid=<?php echo $array["uid"]?>" ><font style="color:#983D66;"><?php echo $array5["username"]?></font></a>   

    

 <?php

           mysql_free_result($rs5);

		   }

		   ?>  

     </td>

     <td class="td">

<?php	

 if ($array['uyid']>0) {

 $array1=mysql_fetch_array(mysql_query("select relname,id from tb_user where id=$array[uyid]",$conn)) ;

?>

<a href="?uyid=<?php echo $array1["id"]?>"  style="color:#990033; font-size:12px;"><?php echo $array1["relname"]?></a> <a href="../design/show.php?id=<?php echo $array1["id"]?>" target="_blank" >(详细)</a>

<?php 

}else{

	echo "暂未选定";

}

 ?>         

                   </td>

				   <td class="td" style="color:#ff0099;">

<?php if ($array['lxid']==0) {?>  

 <font color="#ff0000">表扬</font>

<?php }elseif ($array['lxid']==1) {?>   

 <font color="#0000ff">投诉</font>

<?php } ?> 



                   </td> 

                   

                   <td class="td td3" ><?php echo $array["content"]?>

 </td> 

			<td class="td"><?php echo $array["data"]?></td>

            <td class="td" >

     

            <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='admin_ups.php?id=<?php echo $array["id"]?>&&del=ok';}else{history.go(0);}"  class="btn"/></td>

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

					<td align="left" colspan="2" class="td">

                     <select name="xuan">

                     

                    <option value="3">删除</option>

                    </select>

                    <input type="submit" name="button" id="button" value=" 提 交 "  class="btn"/>

                    </td>

				    <td width="74%" height="30" colspan="4" align="right" class="td">

                    <div id="showpages" >

	<div id="pagesinfo">共<?php echo $num?>个  每页<?php echo $pagesize?>个 页次：<?php echo $page?>/<?php echo $pagemax?></div>

	<div id="pages"><ul><li class="pbutton"> <a href="?uid=<?php echo $uid?>&uyid=<?php echo $uyid?>&page=1&keys1=<?php echo $keys1?>" >首页</a></li><li class="pbutton"> <a href="?uid=<?php echo $uid?>&uyid=<?php echo $uyid?>&page=<?php echo ($page-1)?>&keys1=<?php echo $keys1?>" >上一页</a></li>

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

                           <li class="pagesnow"><a href='?page=<?php echo $ys?>&uid=<?php echo $uid?>&uyid=<?php echo $uyid?>&keys1=<?php echo $keys1?>'>

 

                             <? if ($ys==$page) {?>   

                             <font color=#ff0000><b style="font-size:14px;"><?php echo $ys?></b></font>

 <? }else {?>

 <?php echo $ys?>

 <? } ?>

   

                                </a></li>

 <? } ?>                               

    <li class="pbutton"><a href="?uid=<?php echo $uid?>&uyid=<?php echo $uyid?>&page=<?php echo ($page+1)?>&keys1=<?php echo $keys1?>" >下一页</a></li><li class="pbutton"><a href="?uid=<?php echo $uid?>&uyid=<?php echo $uyid?>&page=<?php echo $pagemax?>&keys1=<?php echo $keys1?>" class="titlefont" >尾页</a></li></ul></div>

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

$xuan=trim($_POST["xuan"]);

$dell=$_GET["dell"];

$checkbox=$_POST['chk'];



if ($xuan==""){

	$xuan=0;

}



include("../php/conn.php");

if($del=='ok' and $id<>""){

	mysql_query("delete from tb_upl where id='$id'",$conn);

	echo"<script>window.location.href='admin_ups.php';</script>" ; 

}



if ($xuan>0){

	

if ($xuan==3){



  if( $dell=="checkbox" and $checkbox<>""){

     for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项

	   if(!is_null($checkbox[$i])){

			$id=$checkbox[$i];

			mysql_query("delete from tb_upl where id='$id'",$conn);

			echo "<script>alert('批量删除成功!');location.href='admin_ups.php';</script>";

	    }

	  }

	  }

}elseif ($xuan==1){

	if( $dell=="checkbox" and $checkbox<>""){

     for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项

	   if(!is_null($checkbox[$i])){

			$id=$checkbox[$i];

			mysql_query("update tb_upl set sh=1 where id=$id",$conn);

			echo "<script>alert('批量审核成功!');location.href='admin_ups.php';</script>";

		}

	}

  }

}elseif ($xuan==2){

	if( $dell=="checkbox" and $checkbox<>""){

     for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项

	   if(!is_null($checkbox[$i])){

			$id=$checkbox[$i];

			mysql_query("update tb_upl set sh=0 where id=$id",$conn);

			echo "<script>alert('已经设为未审核!');location.href='admin_ups.php';</script>";

		}

	}

  }

}

}

 mysql_close($conn);

?>

