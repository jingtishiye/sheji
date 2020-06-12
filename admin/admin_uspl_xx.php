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

<title>会员团购建材报名信息查看处理</title>

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

			<td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">会员团购建材报名信息查看处理</div></td>

	  	</tr>

        <tr><td align="center"  bgcolor="#FFFFFF">	

<?php

$id=$_GET["id"];

if($id<>""){

	$rs=mysql_query("select * from tb_ubm  where   id='$id'",$conn);

	$array=mysql_fetch_array($rs);

?>



<table width="920"   align="center"  cellspacing="0"  style="margin:5px  auto;"  >

 <tr> 

          <td  bgcolor="#ffffff" height="35" style="color:#990033; font-size:14px;"> 

<div align="center">团购信息：<strong><?php	

 if ($array['bid']>0) {

 $array1=mysql_fetch_array(mysql_query("select title,id from tb_tuangou where id=$array[bid]",$conn)) ;

?>

<a href="../showtuan.php?id=<?php echo $array1["id"]?>" target="_blank" style="color:#990033; font-size:14px;"><?php echo $array1["title"]?></a> 

<?php } ?>  </strong></div></td>

        </tr>

                <tr >

                  <td   align="center" valign="middle" bgcolor="#ffffff" style="font-family:'微软雅黑'; font-size:14px;">

                     

                               

                      <table  width="98%" cellpadding="0" cellspacing="1" bgcolor="#cccccc"  align="center"  class="order-table" id="address_table">            	

                        <tr  bgcolor="#ffffff">

                          <td width="169" height="35" style="text-align:right">姓 名：</td>

                          <td width="219"  style="text-align:left"><?php echo $array['bname']?>  </td>

                          <td width="130"   style="text-align:right">会 员：</td>

                          <td width="375"  style="text-align:left"><?php

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

                          <td style="text-align:right; " height="35"><b>团购建材： </b></td>

                          <td colspan="3" style="text-align:left"><?php	

 if ($array['bid']>0) {

 $array1=mysql_fetch_array(mysql_query("select title,id from tb_tuangou where id=$array[bid]",$conn)) ;

?>

<a href="../showtuan.php?id=<?php echo $array1["id"]?>" target="_blank" style="color:#990033; font-size:14px;"><?php echo $array1["title"]?></a> 

<?php } ?>                                    </td>

                        </tr>

                       

                <tr  bgcolor="#ffffff">

                          <td style="text-align:right"  height="35">手 机：</td>

                          <td   style="text-align:left"><?php echo $array['tel']?> (QQ：<?php echo $array['qq']?>)</td>

                           <td style="text-align:right">装修开工年月：</td>

                          <td colspan="3" style="text-align:left">

                          <?php echo $array['years']?> 

                       </td>

                </tr>

                <tr  bgcolor="#ffffff">

                    <td width="169" height="30" style="text-align:right">所在楼盘：</td>

                    <td  colspan="3"  style="text-align:left"> <?php echo $array['lpan']?></td>   

                </tr>    

               <tr  bgcolor="#ffffff">

                 <td width="169" height="30" style="text-align:right">留 言：</td>

                 <td  colspan="3"  style="text-align:left"> <?php echo $array['content']?></td>

               </tr>    

 

    

  <form name="form1" id="form1" method="post" action="chuli.php?act=mod&id=<?php echo $array['id']?>">

                         <tr  bgcolor="#ffffff">

                          <td style="text-align:right; color:#FF0000;"><b>处理信息： </b></td>

                          <td colspan="3" height="35" style="text-align:left">

                          

  <? if ($array['sh']==0) {?>

    

 <font color="#ff0000">待处理</font>

   <? }elseif ($array['sh']==1) {?>

    

 <font color="#0000ff">已处理</font>

 

 <? } ?>   

 

 <? if($array['sh']<1){?>

 <select name="sh"  >

          

   <? if($array['sh']==0){?>

   <option value="1"  >—>确定已处理</option>

    

   <? } ?>

        </select>&nbsp;&nbsp;&nbsp;&nbsp;

         

      <input type="submit"   value=" 提 交 "   class="btn" />

        <? }?>

   

 

  </td>

                        </tr>

                     

  

  

  

            </form>    

            

<tr  bgcolor="#ffffff">

     <td style="text-align:right; color:#000099;" height="35"><b>报名时间： </b></td>

       <td colspan="3" style="text-align:left"><?php echo $array['data']?>  </td>

    </tr>         

<tr><td colspan="4" align="center"  bgcolor="#ffffff">&nbsp;</td></tr>

<tr><td colspan="4" align="center"  bgcolor="#ffffff">

<div class="clear" style="height:10px"></div>         

 <input type="button"   value="返回信息列表" onClick="location.href = 'admin_ubm.php';"  class="btn" />  <div class="clear" style="height:10px"></div>

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

 