<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("php/conn.php");
include("sub.php"); 
error_reporting(0);
$qhs=1;
?>
 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/syqh.css" type="text/css" rel="stylesheet" />
</head>
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
<body>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" media="screen" />
 
<script src="/js/jquery.min.1.8.js" type="text/javascript"></script>

<div class="ab01">
<div class="ab02">
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="54" height="33"  align="left" >
<div class="head_add">
    <?php
$rsx=mysql_query("select title from tb_fenz where tuijian=1 and mrs=1 order by  px_id asc  ",$conn);
$arrayx=mysql_fetch_array($rsx);
 echo $arrayx['title'];
 mysql_free_result($rsx); 
 ?>
 </div>


 </td>
 
 <td width="48"  >
 
<div style="padding-top:1px;"  align="left" ><a href="qie.php">切换</a></div>

 </td>
 
 <?php
if (!empty($_COOKIE['userid'])){
$userid=$_COOKIE['userid'];
}else{
$userid=0;
}
 if ($userid>0){
 $rsum=mysql_query("select username,id,relname,bid,img  from  tb_user where id=$userid",$conn);
    $arrayum=mysql_fetch_array($rsum);
	
	$zsname=$arrayum['relname'];
	$zsimg=$arrayum['img'];
	$telnas=$arrayum['username'];	 
	$jbids=$arrayum['bid'];	
 
	mysql_free_result($rsum);
   }else{
	   $jbids=5;	
   }
?>
 
<td width="270"><div class="font12 huis" align="left">您好，欢迎来到互联网工长装修O2O服务平台！</div></td>
<td width="90">
<div class="wx_tips2" align="center">
<div class="tips_hd2">

<div class="font12 huis" align="left">官方微信</div>
</div>
<div class="tips_bd2">
 <?php
$rsx=mysql_query("select title,image   from tb_ads where id=7 ",$conn);
$arrayx=mysql_fetch_array($rsx);
?>
  <img src="http://www.sina7gz.com/<?php echo $arrayx['image']?>" width="150"  />
  <?php 
	mysql_free_result($rsx); 
 ?>
  
  </div>
</div>

</td>
<td width="564"  align="left" >
<div class="font12 dtop">
<?php if ($userid>0){?>

<?php if ($jbids==0){?>
工长
<?php }elseif ($jbids==1){?>
设计师
 
<?php } ?>
<span class="hongs"><a href="/user/" target="_blank" ><?php echo $arrayum['username']?></a></span> | <a href="/user/" target="_blank" >进入后台</a> | <a href="/user/logout.php">退出</a>
<?php }else{?><a href="/member/login.php" target="_blank" >请登录</a> | <a href="/member/reg.php" target="_blank" >免费注册</a> <?php } ?> | <a href="/zb/" target="_blank" >我要装修</a> | <a href="/service" target="_blank" >服务保障</a> | <a href="/proxy" target="_blank" >分站代理</a>
<?php if ($jbids==0){?>
 | <a href="/user/">工长加盟</a>
<?php }elseif ($jbids==1){?>
<?php }else{?>
 | <a href="/member/reg_gz.php" target="_blank" >工长加盟</a>
<?php } ?>

<?php if ($jbids==1){?>
| <a href="/user/" target="_blank" >设计师加盟</a>
<?php }elseif ($jbids==0){?>
<?php }else{?>
| <a href="/member/reg_sjs.php" target="_blank" >设计师加盟</a> 
<?php } ?>


 
</div></td>
<td width="174" align="right" ><div class="adtel">装修热线：<span class="hongs"><?php echo $tels?></span></div></td>
</tr>
</table>
</div>
</div>
<div class="a11">
<div class="a12">
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="270"  align="left" ><div class="logo"><a href="/"><?php echo $dnames?></a></div></td>
 
<td width="930" align="right"  valign="top">
 <link type="text/css" href="/css/lanrenzhijia.css" rel="stylesheet" />
 <div id="cssmenu">
        <ul>
 <?php
 $rs6=mysql_query("select  links,title  from menus   order by px_id asc  ",$conn);
 $j=1;
 while($array6=mysql_fetch_array($rs6)):
 ?> 
 <li >   
 <a  href="<?php echo $array6['links']?>" class="<?php if ($j==$qhs){?>active<?php }?>" target="_blank" ><?php echo $array6['title']?></a> 

 <?php if ($j==4){?>
 <ul>
  <li class="cwens"></li>
   <li class="dwen"></li> 
  <li ><a  href="/shop/" target="_blank" >368施工包</a></li>
  <li ><a  href="/shop/388.php" target="_blank" >388主材包</a></li>
  <li ><a  href="/shop/wzx.php" target="_blank" >7天旧房翻新</a></li>
  <li class="dwen"></li>
  </ul> 
 <?php }?>
 
 </li>
  <?php 
  $j++;
  endwhile;
  mysql_free_result($rs6); 
 ?>
 </ul>
</div>
<div class="clear"></div>

</td>
</tr>
</table>
</div>
</div> 
<div class="clear"></div>
<div class="a11">
<div class="a12">
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="37" height="35" align="center" bgcolor="#F08300"><img src="Images/top3.jpg" width="13" height="13" /></td>
    <td width="865" align="left" bgcolor="#F08300" class="height2">
 
	<div class="font14 bais">部分分站招聘合作代理商，具体事项咨询<?php echo $tels?></div></td>
	<td width="140" bgcolor="#F08300"><a href="/zb" target="_blank"><img src="/Images/top4.jpg" alt="免费设计户型" width="140" height="31" border="0" /></a></td>
    <td width="158" bgcolor="#F08300" align="left"><a href="/zb" target="_blank"><img src="/Images/top5.jpg" alt="免费报价预算" width="139" height="31" border="0" /></a></td>
  </tr>
</table>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="98" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="65" class="height2" style="padding-left:15px;"><span class="black72">好工长之家：</span><a href="/" class="org_word23">总站</a>&nbsp;已开通了&nbsp;<span class="orange3"><?php echo $num_fenz?></span>&nbsp;个城市<br />
          <span class="black72">热门城市榜：</span>
 <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1 and ishot=1 order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 ?>  
   <a href="<?php echo $arrayx['url']?>" class="org_word23"><?php echo $arrayx['title']?></a>
  <?php 
  endwhile;
  mysql_free_result($rsx); 
 ?>
 
         </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="68" style="padding-left:15px;" class="border13"><img src="Images/chengshi.jpg" width="144" height="43" /></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20" height="28">&nbsp;</td>
        <td width="28" align="center" class="border14"><span class="black72">A</span></td>
        <td width="20">&nbsp;</td>
        <td width="1090">
 <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="A"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?>    
       </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">B</span></td>
            <td width="20">&nbsp;</td>
            <td width="1090"> <?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="B"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">C</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="C"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">D</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="D"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">E</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="E"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">F</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="F"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">G</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="G"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
      <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">H</span></td>
            <td width="20"></td>
            <td width="1090" class="height2"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="H"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20" height="28">&nbsp;</td>
        <td width="28" align="center" class="border14"><span class="black72">J</span></td>
        <td width="20"></td>
        <td width="1090" class="height2"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="J"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">K</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="K"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
     <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">L</span></td>
        <td width="20"></td>
        <td width="1090" class="height2"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="L"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">M</span></td>
            <td width="20"></td>
            <td width="1090" align="left"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="M"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">N</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="N"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">P</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="P"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">Q</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="Q"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">R</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="R"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
      <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">S</span></td>
          <td width="20"></td>
          <td width="1090" class="height2"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="S"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">T</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="T"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">W</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="W"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">X</span></td>
            <td width="20"></td>
            <td width="1090"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="X"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
          </tr>
    </table></td>
  </tr>
  <tr>
     <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">Y</span></td>
          <td width="20"></td>
          <td width="1090" class="height2"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="Y"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
      <td height="55" class="border13" onmouseover="this.className='tdbgmouseover33';" onmouseout="this.className='border13';"><table width="1158" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20" height="28">&nbsp;</td>
            <td width="28" align="center" class="border14"><span class="black72">Z</span></td>
          <td width="20"></td>
          <td width="1090" class="height2"><?php
 $rsx=mysql_query("select url,title from tb_fenz where tuijian=1  order by  px_id asc  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):
 if (getFirstCharter($arrayx['title'])=="Z"){
 ?>   
        <a href="<?php echo $arrayx['url']?>" class="red_word13"><?php echo $arrayx['title']?></a>
  <?php 
 }
  endwhile;
  mysql_free_result($rsx); 
 ?></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="border15">&nbsp;</td>
  </tr>
</table>

 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
</div>
</div>


<?php 
include('nei_foot.php');
?>
</body>
</html>
<?php
 mysql_close($conn);
?>

