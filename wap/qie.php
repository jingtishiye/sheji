<?php
include("php/conn.php");
include("sub.php"); 
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<meta content="telephone=no" name="format-detection">
<meta name="applicable-device" content="mobile">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
 
 
<link rel="stylesheet" type="text/css" href="images/headfooter.min.css">
 
<link rel="stylesheet" type="text/css" href="images/swiper.min.css">
<link rel="stylesheet" type="text/css" href="images/index.css">
 
 
<script type="text/javascript" src="images/jquery.min.js"></script>
<script type="text/javascript" src="images/swiper.min.js"></script>
<title><?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<?php
$num_fenz = mysql_num_rows(mysql_query("select id from tb_fenz where tuijian=1",$conn));
  function getFirstCharter($str){
        if (empty($str)) {
            return '';
        }
        $fchar = ord($str{0});
        if ($fchar >= ord('A') && $fchar <= ord('z')) return strtoupper($str{0});
        $s1 = iconv('UTF-8', 'gb2312', $str);
        $s2 = iconv('gb2312', 'UTF-8', $s1);
        $s = $s2 == $str ? $s1 : $str;
        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        if ($asc >= -20319 && $asc <= -20284) return 'A';
        if ($asc >= -20283 && $asc <= -19776) return 'B';
        if ($asc >= -19775 && $asc <= -19219) return 'C';
        if ($asc >= -19218 && $asc <= -18711) return 'D';
        if ($asc >= -18710 && $asc <= -18527) return 'E';
        if ($asc >= -18526 && $asc <= -18240) return 'F';
        if ($asc >= -18239 && $asc <= -17923) return 'G';
        if ($asc >= -17922 && $asc <= -17418) return 'H';
        if ($asc >= -17417 && $asc <= -16475) return 'J';
        if ($asc >= -16474 && $asc <= -16213) return 'K';
        if ($asc >= -16212 && $asc <= -15641) return 'L';
        if ($asc >= -15640 && $asc <= -15166) return 'M';
        if ($asc >= -15165 && $asc <= -14923) return 'N';
        if ($asc >= -14922 && $asc <= -14915) return 'O';
        if ($asc >= -14914 && $asc <= -14631) return 'P';
        if ($asc >= -14630 && $asc <= -14150) return 'Q';
        if ($asc >= -14149 && $asc <= -14091) return 'R';
        if ($asc >= -14090 && $asc <= -13319) return 'S';
        if ($asc >= -13318 && $asc <= -12839) return 'T';
        if ($asc >= -12838 && $asc <= -12557) return 'W';
        if ($asc >= -12556 && $asc <= -11848) return 'X';
        if ($asc >= -11847 && $asc <= -11056) return 'Y';
        if ($asc >= -11055 && $asc <= -10247) return 'Z';
        return null;
    }
?> 
</head>
<body onselectstart="return false">
<?php
include("web_top.php");
?>
 
  <!--banner -->
  <section>
    <div class="swiper-container swiper-container-horizontal">
      <div class="swiper-wrapper" style="transition: 0ms; -webkit-transition: 0ms; -webkit-transform: translate3d(0px, 0px, 0px);">
 <?php
 $rs5=mysql_query("select title,image,url  from tb_flash  where  weizhi=2  order by px_id asc ",$conn);
 $l=1;
 while($array5=mysql_fetch_array($rs5)):
 ?>
        
        <figure class="swiper-slide swiper-slide-<?php if($l==1){?>active<?php }else{?>next<?php }?>" style="width:400px;"> <a href="<?php echo $array5['url']?>"> <img width="400" height="" src="<?php echo $array5['image']?>" alt="<?php echo $array5['title']?>"> </a> </figure>
 <?php
  $l++;
  endwhile;
  mysql_free_result($rs5);
  ?>
                      
      </div>
      <!-- 如果需要分页器 -->
      <div class="swiper-pagination">
       <?php
 $rs5=mysql_query("select id  from tb_flash  where  weizhi=2  order by px_id asc ",$conn);
 $l=1;
 while($array5=mysql_fetch_array($rs5)):
 ?>
      <span class="swiper-pagination-bullet <?php if($l==1){?>swiper-pagination-bullet-active<?php }?>"></span>
 <?php
  $l++;
  endwhile;
  mysql_free_result($rs5);
  ?>
      
      </div>
    </div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="8" align="left"></td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td width="30%" height="33" align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;热门城市&nbsp;</span></td>
      <td width="70%" align="right"><a href="zb.php" class="org_word3"><img src="images/fabu.png" width="22" height="22" border="0"><b>发布装修招标</b></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="8" align="left"></td>
	</tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1 and ishot=1 order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++; 
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="8"  ></td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td height="33" align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;按字母选择&nbsp;</span></td>
	</tr>
</table>

<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td width="25%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagA'">A</td>
    <td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagB'">B</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagC'">C</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagD'">D</td>
  </tr>
  <tr>
    <td width="25%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagF'">F</td>
    <td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagG'">G</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagH'">H</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagJ'">J</td>
  </tr>
  <tr>
    <td width="25%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagK'">K</td>
    <td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagL'">L</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagM'">M</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagN'">N</td>
  </tr>
  <tr>
    <td width="25%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagP'">P</td>
    <td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagQ'">Q</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagR'">R</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagS'">S</td>
  </tr>
  <tr>
    <td width="25%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagT'">T</td>
    <td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagW'">W</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagX'">X</td>
	<td width="25%" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagY'">Y</td>
  </tr>
  <tr>
    <td width="25%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='#flagZ'">Z</td>
    <td width="25%" align="center"></td>
	<td width="25%" align="center"></td>
	<td width="25%" align="center"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagA"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;A&nbsp;</span></td>
    </tr>
</table>

<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="A"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>



 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagB"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;B&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="B"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagC"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;C&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="C"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagD"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;D&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="D"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagF"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;F&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="F"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagG"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;G&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="G"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagH"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;H&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="H"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagJ"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;J&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="J"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagK"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;K&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="K"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagL"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;L&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="L"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagM"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;M&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="M"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagN"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;N&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="N"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagP"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;P&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="P"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagQ"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;Q&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="Q"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagR"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;R&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="R"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagS"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;S&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="S"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagT"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;T&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="T"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagW"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;W&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="W"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagX"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;X&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="X"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagY"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;Y&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="Y"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td height="12" align="left"><a name="flagZ"></a></td>
	</tr>
</table>
<table width="138" height="33" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td align="left">&nbsp;&nbsp;&nbsp;<span class="black4">&nbsp;Z&nbsp;</span></td>
    </tr>
</table>
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
   <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 $j=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($j>0 and $j%3==0){
			?>
 </tr><tr>
 <?php }  
 if (getFirstCharter($arrayx['title'])=="Z"){
 ?>
 <td width="33%" height="35" align="center" class="menu_5" onMouseOver="this.className='menu_6';" onMouseOut="this.className='menu_5';" onMouseDown="javascript:window.location.href='<?php echo $arrayx['url']?>/wap/'"><?php echo $arrayx['title']?></td>
  <?php
  $j++;
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>
 </tr>
</table>

<table width="96%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="8" align="center"></td>
  </tr>
</table>
 
<?php
include("web_foot.php");
?>
</body>
</html>
<?php
 mysql_close($conn);
?>