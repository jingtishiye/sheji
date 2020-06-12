
<div style="position:relative;">
<table  width="100%" border="0" style="border-bottom:1px solid #eeeeee; z-index:9999;" cellpadding="0" cellspacing="0"  align="center" >
<tr>
<td width="26%"   align="left"  ><a href="./"><img src="images/logo1.png" border="0" /></a></td>
<td width="19%"  align="left"  >


</td>
<td width="55%"   align="right"  style="float:right;clear:both;" >

<div class="dtel"><a href="tel:<?php echo $tels?>"><?php echo $tels?></a></div>
 </td></tr>
</table>
<div style="position:absolute; z-index:88; left:27%; top:6px;">
<div class="head_add">
    <?php
$rsx=mysql_query("select title from tb_fenz where tuijian=1 and mrs=1 order by  px_id asc  ",$conn);
$arrayx=mysql_fetch_array($rsx);
 echo $arrayx['title'];
 mysql_free_result($rsx); 
 ?>
 <a href="qie.php"><span>切换</span></a>
 
     </div>
  </div>
</div>