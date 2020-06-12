<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

 <?php
if (!empty($_COOKIE['userid'])){
$userid=$_COOKIE['userid'];
}else{
$userid=0;
}
 if ($userid>0){
 $rsuv=mysql_query("select *  from  tb_user where id=$userid",$conn);
    $arrayuv=mysql_fetch_array($rsuv);
	
	$zsname=$arrayuv['relname'];
	$telnas=$arrayuv['username'];	 
	$jbids=$arrayuv['bid'];	
 
  
   }
   
  if ($jbids<>2){ 
  
     echo "<script>alert('页面进入错误！');document.location.href='index.php';</script>";	
	 exit;
  }
   
   
?>

<title><?php echo $zsname?>_业主会员中心</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link  href="../css/style.css" type="text/css" rel="stylesheet">
<link  href="images/css.css" type="text/css" rel="stylesheet">
</head>
<body>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" media="screen" />
 
<script src="/js/jquery.min.1.8.js" type="text/javascript"></script>
 
<div class="ab01">
<div class="ab02">
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="102" height="33"  align="left" >
<div class="head_add">
    <?php
$rsx=mysql_query("select title from tb_fenz where tuijian=1 and mrs=1 order by  px_id asc  ",$conn);
$arrayx=mysql_fetch_array($rsx);
 echo $arrayx['title'];
 mysql_free_result($rsx); 
 ?>
 <span></span>
	                    <ul>
    <?php
$rsx=mysql_query("select url,title from tb_fenz where tuijian=1 and mrs=0 order by  px_id asc  ",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>         
 <li><a href="<?php echo $arrayx['url']?>" target="_blank"><?php echo $arrayx['title']?></a></li>
 <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
 
			 
			 
							
            </ul>
          </div>


 </td>
 

 
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
  <img src="<?php echo $arrayx['image']?>" width="150"  />
  <?php 
	mysql_free_result($rsx); 
 ?>
  
  </div>
</div>
</td>
<td width="564"  align="left" >
<div class="font12 dtop">
<span class="hongs"><a href="/user/" target="_blank" ><?php echo $arrayuv['username']?></a></span> | <a href="/user/" target="_blank" >进入后台</a> | <a href="/user/logout.php">退出</a> 
  <a href="/zb/">我要装修</a> | <a href="/service">服务保障</a> | <a href="/proxy">分站代理</a>
<?php if ($jbids==0){?>
 | <a href="/user/">工长加盟</a>
<?php }elseif ($jbids==1){?>
<?php }else{?>
 | <a href="/member/reg_gz.php">工长加盟</a>
<?php } ?>

<?php if ($jbids==1){?>
| <a href="/user/">设计师加盟</a>
<?php }elseif ($jbids==0){?>
<?php }else{?>
| <a href="/member/reg_sjs.php">设计师加盟</a> 
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
 
<td width="630"  align="left"  valign="top">
<div class="grens"> 
<a href="/user/" ><?php if ($jbids==1){?>
工长中心
<?php }elseif ($jbids==0){?>
设计师中心
<?php }elseif ($jbids==2){?>
业主个人中心
<?php } ?></a>
</div></td>
<td width="300" align="right" valign="top">
<div class="font14 pd25 line24" >

<?php if ($userid>0){?>
<img src="images/online_member.gif" width="13" /> <span class="hongs"><a href="/user/" ><?php echo $arrayuv['relname']?></a></span>， <a href="/user/" >进入会员中心</a><br /><a href="/user/logout.php">安全退出</a>
<?php }else{?><a href="/member/login.php">请登录</a> | <a href="/member/reg.php">免费注册</a> <?php } ?> 
</div>

</td>
</tr>
</table>
</div>
</div> 


<div id="banner_txt">
            <div class="banner_txt">
                <ul class="clearfix">
                    <li class="zhuangxiu">
                        <h3>装修价格透明</h3>
                        <p>去除中间环节，直面工长</p>
                    </li>
                    <li class="free">
                        <h3>装修6+1服务</h3>
                        <p>提供多项装修服务，省力省心</p>
                    </li>
                    <li class="pay">
                        <h3>先装修 后付款</h3>
                        <p>提供装修贷款服务，享受先装后付</p>
                    </li>
                </ul>
                <div class="hotline">
                	<div class="show-img">
                		<h3>七工长互联网装修平台</h3>
                		<p>帮您找到工匠精神好工长，提供安心保障</p>
                	</div>
                    <img src="/images/nav_p1.png"/>
                    <div class="hotline_bg"></div>
                </div>
            </div>
        </div>
<div class="clear"></div>