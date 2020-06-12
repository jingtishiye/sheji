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

<title>会员帖子评论信息</title>

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

			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">会员帖子评论信息</div></td>

	  	</tr>

        <tr><td align="center"  bgcolor="#FFFFFF">	

<?php

$id=$_GET["id"];

if($id<>""){

	$rs=mysql_query("select * from tb_upl  where   id='$id'",$conn);

	$array=mysql_fetch_array($rs);

?>



<table width="920"   align="center"  cellspacing="0"  style="margin:5px  auto;"  >

 <tr> 

          <td  bgcolor="#ffffff" height="35" style="color:#990033; font-size:14px;"> 

<div align="center">帖子：<strong><?php	

 if ($array['bid']>0) {

 $array1=mysql_fetch_array(mysql_query("select title,id from xingxi where id=$array[bid]",$conn)) ;

?>

<a href="../showbbs.php?id=<?php echo $array1["id"]?>" target="_blank" style="color:#990033; font-size:14px;"><?php echo $array1["title"]?></a> 

<?php } ?>  </strong></div></td>

        </tr>

                <tr >

                  <td   align="center" valign="middle" bgcolor="#ffffff" style="font-family:'微软雅黑'; font-size:14px;">

                     

                               

                      <table  width="98%" cellpadding="0" cellspacing="1" bgcolor="#cccccc"  align="center"  class="order-table" id="address_table">            	

                        <tr  bgcolor="#ffffff">

                        

                          <td width="168"  height="35"  style="text-align:right">会 员：</td>

                          <td  style="text-align:left" colspan="3"><?php

if ($array['uid']>0) {

 $rs5=mysql_query("select username  from tb_user where  id=$array[uid]",$conn);

	$array5=mysql_fetch_array($rs5);

	?>				

	<font style="color:#983D66;"><?php echo $array5["username"]?></font>        

           <?php

           mysql_free_result($rs5);

		   }

		   ?> </td>

                        </tr>

                         <tr  bgcolor="#ffffff">

                          <td style="text-align:right; " height="35"><b>论坛帖子： </b></td>

                          <td colspan="3" style="text-align:left"><?php	

 if ($array['bid']>0) {

 $array1=mysql_fetch_array(mysql_query("select title,id from xingxi where id=$array[bid]",$conn)) ;

?>

<a href="../showbbs.php?id=<?php echo $array1["id"]?>" target="_blank" style="color:#990033; font-size:14px;"><?php echo $array1["title"]?></a> 

<?php } ?>                                    </td>

                        </tr>

                       

                

               <tr  bgcolor="#ffffff">

                 <td width="168" height="30" style="text-align:right">评论信息：</td>

                 <td  colspan="3"  style="text-align:left"> <?php echo $array['content']?></td>

               </tr>    

 

    

   

            

<tr  bgcolor="#ffffff">

     <td style="text-align:right; color:#000099;" height="35"><b>评论时间： </b></td>

       <td colspan="3" style="text-align:left"><?php echo $array['data']?>  </td>

    </tr>         

<tr><td colspan="4" align="center"  bgcolor="#ffffff">&nbsp;</td></tr>

<tr><td colspan="4" align="center"  bgcolor="#ffffff">

<div class="clear" style="height:10px"></div>         

 <input type="button"   value="返回信息列表" onClick="location.href = 'admin_upl.php';"  class="btn" />  <div class="clear" style="height:10px"></div>

 </td></tr>

</table>                                

<?php

mysql_free_result($rs);

}

?>		

 </td>

		</tr>

	</table>

     </td>

		</tr>

	</table>

</div>

</body>

</html>

<?php 

	mysql_close($conn);

?>

 