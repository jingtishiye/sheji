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