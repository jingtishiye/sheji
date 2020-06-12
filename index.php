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
 
<body>
<?php 
include('nei_top.php');
?>
<script src="/js/uaredirect.js" type="text/javascript" ></script>
<script type="text/javascript">uaredirect("wap/","");</script>
<script src="js/index.js" type="text/javascript"></script>
<div class="mainbanner">
	<div class="mainbanner_window">
		<ul id="slideContainer">
  <?php
 $rsb=mysql_query("select  url,image from tb_flash where weizhi=0 order by px_id asc  ",$conn);
 $k=1;
 while($arrayb=mysql_fetch_array($rsb)):
 ?> 
			<li><a href="<?php echo $arrayb['url']?>"><img src="<?php echo $arrayb['image']?>"  height="360"  /></a></li>
  <?php 
	$k++;
    endwhile;
	 mysql_free_result($rsb); 
	 ?> 
			 
		</ul>
	</div>
	<ul class="mainbanner_list">
      <?php
 $rsb=mysql_query("select  url from tb_flash where weizhi=0 order by px_id asc  ",$conn);
 $k=1;
 while($arrayb=mysql_fetch_array($rsb)):
 ?>
 <li><a href="javascript:void(0);"><?php echo $k?></a></li>
   <?php 
	$k++;
    endwhile;
	 mysql_free_result($rsb); 
	 ?>      
	 
	</ul>
    
  <div class="yuyue">

 <DIV id=con8>
 <div  class="bd1"></div>
 <div  class="bd2"></div>
  <UL id=tags8>
  
<LI class=selectTag8><A onclick="selectTag8('tagContent80',this)" href="javascript:void(0)">免费量房</A></LI>
<LI ><A onclick="selectTag8('tagContent81',this)" href="javascript:void(0)">免费报价</A></LI>
<LI ><A onclick="selectTag8('tagContent82',this)" href="javascript:void(0)">设计服务</A></LI>
</UL>
  <DIV id=tagContent8>     
    <DIV class="tagContent8  selectTag8" id=tagContent80>
    多名工长上门量房，为您解决装修疑惑
    </DIV>
    <DIV class="tagContent8" id=tagContent81>
    平台监管，报价透明
    </DIV>
    <DIV class="tagContent8" id=tagContent82>
    资深设计师提供个性化设计服务
    </DIV>
  </DIV>
</DIV>
<SCRIPT type=text/javascript>
function selectTag8(showContent8,selfObj8){
	// 操作标签
	var tag8 = document.getElementById("tags8").getElementsByTagName("li");
	var taglength8 = tag8.length;
	for(g=0; g<taglength8; g++){

		tag8[g].className = "";
	}
	selfObj8.parentNode.className = "selectTag8";
	// 操作内容
	for(g=0; h=document.getElementById("tagContent8"+g); g++){
		h.style.display = "none";
	}
	document.getElementById(showContent8).style.display = "block";
}
</SCRIPT>

 
<div class="yuyue01">
  
<div class="pd5"><input type="text" class="yming" id="OName" placeholder="姓名"  value="" maxlength="4"></div>
<div ><input type="text" class="ytel" id="Tel" placeholder="电话" onKeyUp="value=value.replace(/[^\d]/g,'')" value=""  maxlength="11"></div>
<div ><input type="text" class="yaddr" id="Community"  value=""  placeholder="所在小区" maxlength="10"></div>

<div class="pd10"><input type="submit" onclick="addOrder1()" value="立即预约" class="ysub" ></div>

<div class="font12 bais pd10" align="center">已有 <span class="hs"><b><?php echo mysql_num_rows(mysql_query("select id from  tb_uyue",$conn));?></b></span> 人选择七工长装修平台</div>


<style type="text/css">
#up_zzjs{width:238px;height:40px;line-height:20px;overflow:hidden; margin-top:5px;}
#up_zzjs #up_li{list-style-type:none;margin:0;padding:0;}
/*系统支持ie8就选line-height:16px;，但不支持opera 否则选line-height:20px;*/
#up_zzjs #up_li a{font-size:12px; line-height:20px; color:#ffffff; text-align:center; display:block;}
</style>

<div id="up_zzjs">
<div id="marqueebox">
    <?php
$rsx=mysql_query("select tel,bname from tb_uyue   order by  id desc limit 8",$conn);
while($arrayx=mysql_fetch_array($rsx)):
			?>
<div id="up_li"><a href="javascript:void(0)" ><?php echo $arrayx['bname']?> <?php echo substr($arrayx['tel'],0,3)?>****<?php echo substr($arrayx['tel'],7,4)?> 申请了装修服务</a></div>
 <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
 
</div>
</div>   
<script language="javascript">
function startmarquee(lh,speed,delay) {
var p=false;
var t;
var o=document.getElementById("marqueebox");
o.innerHTML+=o.innerHTML;
o.style.marginTop=0;
o.onmouseover=function(){p=true;}
o.onmouseout=function(){p=false;}
//欢迎来到站长特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。
function start(){
t=setInterval(scrolling,speed);
if(!p) o.style.marginTop=parseInt(o.style.marginTop)-1+"px";
}
//欢迎来到站长特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。
function scrolling(){
if(parseInt(o.style.marginTop)%lh!=0){
o.style.marginTop=parseInt(o.style.marginTop)-1+"px";
if(Math.abs(parseInt(o.style.marginTop))>=o.scrollHeight/2) o.style.marginTop=0;
}else{
clearInterval(t);
setTimeout(start,delay);
}
}//欢迎来到站长特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。
setTimeout(start,delay);
}//欢迎来到站长特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。
startmarquee(20,20,2000);
</script>



     </div>
   </div>
  
    
    
</div>







<div class="clear"></div>

<link rel="stylesheet" type="text/css" href="design/images/jquery.alertable.css">       
<script src="design/images/jquery.alertable.js"></script>
 
<div class="a11">
<div class="a123">
<div class="afuwu"><div class="pd35" style="padding-left:33px;" >服务<br />流程</div></div>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="150" height="128"></td>
 
<td width="1050" align="center" valign="top">
<div class="fbuz">
<ul>
<li>
<div><img src="images/f_process_1.png" width="150"  /></div>
<div class="font16 pd5" align="center">免费预约服务</div>
</li>

<li class="xline">
<div><img src="images/f_process_2.png" width="150"  /></div>
<div class="font16 pd5" align="center">挑选工长</div>
</li>

<li class="xline">
<div><img src="images/f_process_3.png" width="150"  /></div>
<div class="font16 pd5" align="center">签订装修三方协议</div>
</li>

<li class="xline">
<div><img src="images/f_process_4.png" width="150"  /></div>
<div class="font16 pd5" align="center">装修验收服务</div>
</li>

<li class="xline">
<div><img src="images/f_process_5.png" width="150"  /></div>
<div class="font16 pd5" align="center">业主真实评价</div>
</li>

</ul>
</div>
</td>
</tr>
</table>
   </div>        
 </div>

<div class="clear"></div>


<div class="a11">
<div class="a12">
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="5"  ></td></tr>
</table>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="240"  align="left"><div class="btitle">明星工长展示</div></td>
<td width="560"  align="left">
<div class="font12">共 <span class="font18"><b><?php echo mysql_num_rows(mysql_query("select id from  tb_user where bid=0",$conn));?></b></span> 名工长由您挑选，可选1-3名同时预约</div></td>
<td width="400"  align="left">
<form action="gong/" name="thisForm" method="get"  onSubmit="return checkform();">
<div class="fr"><input type="submit" name="sub1" class="sou01" value="搜索" /></div>
<div class="fr"><input type="text" name="keys" class="sou02" value="" placeholder="输入工长名，搜索工长" /></div>
</form>
</td>
</tr>
</table>
<div class="clear"></div>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<div align="left" class="font14 bqian">热门标签：
<a href="gong/index.php?bqid=设计师">设计师</a> 
<a href="gong/index.php?bqid=水电工">水电工</a>
<a href="gong/index.php?bqid=瓦工">瓦工</a>
<a href="gong/index.php?bqid=木工">木工</a>
<a href="gong/index.php?bqid=油漆工">油漆工</a>
<a href="gong/index.php?pxxs=1">星级</a>
<a href="gong/index.php?pxks=1">口碑</a>
<a href="gong/index.php?pxqd=1">签单数</a>
<a href="gong/index.php?ishui=1">会员</a>
<a href="gong/" target="_blank">更多工长</a>
</div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<div style="border:1px solid #dfdfdf;">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<table  width="1200" border="0"   cellpadding="0" cellspacing="0"  align="center">
  
   <tr>
    <?php
$rsx=mysql_query("select id,relname,img,xjid,sprice,hits  from tb_user where sh=1 and bid=0 and yzid=1   order by xjid desc,kbid desc limit 12",$conn);
$i=0;
while($arrayx=mysql_fetch_array($rsx)):
			if($i>0 and $i%4==0){
			?>
            </tr><tr><td colspan="4" height="30"></td></tr><tr>
            <?php }  ?>
   <td  width="300" valign="top"  align="center" > 
   <div class="a270">
   <table width="270"   align="center"  cellpadding="0" cellspacing="0" border="0">
   <tr><td width="130" align="center">
   <div class="wx_tips">
   <div class="tips_hd">
 <div class="cyuan"><A href="gong/show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><img src="<?php echo $arrayx['img']?>"  width="120" height="120"/></a></div>
 </div>
 <div class="tips_bd"><div class="wens"><a href="/gong/yuegz.php?id=<?php echo $arrayx['id']?>"  target="_blank">预约工长</a></div></div>
 </div>
 </td>
 <td width="10"></td>
 <td width="130" align="left" valign="top" >
 <div  class="font18"><A href="gong/show.php?uid=<?php echo $arrayx['id']?>"  target="_blank"><?php echo $arrayx['relname']?></A> <img src="images/renz.png"   title="认证工长" /></div>
 <div  class="font14 huis pd6">星 级：
 <?php if ($arrayx['xjid']==1){?>
 <img src="images/star.png"  /><img src="images/starh.png"  /><img src="images/starh.png"  /><img src="images/starh.png"  /><img src="images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==2){?>
 <img src="images/star.png"  /><img src="images/star.png"  /><img src="images/starh.png"  /><img src="images/starh.png"  /><img src="images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==3){?>
 <img src="images/star.png"  /><img src="images/star.png"  /><img src="images/star.png"  /><img src="images/starh.png"  /><img src="images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==4){?>
 <img src="images/star.png"  /><img src="images/star.png"  /><img src="images/star.png"  /><img src="images/star.png"  /><img src="images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==5){?>
 <img src="images/star.png"  /><img src="images/star.png"  /><img src="images/star.png"  /><img src="images/star.png"  /><img src="images/star.png"  />
 <?php }?>
 </div>
 <div  class="font14 huis pd4">保证金：<?php echo $arrayx['sprice']?>元</div>
 <div  class="font14 huis pd4">签单数：<?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$arrayx[id]",$conn));?>单</div>
 <div  class="font14 huis pd4">关注数：<?php echo $arrayx['hits']?>次</div>
 </td>
 </tr>
 </table>
 </div> 
   </td> 
     <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rs6); 
	
	 
	
	 ?>
     
   </tr>
     </table>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>  
</div>
   </div>        
 </div>
 <div class="clear"></div>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<div class="clear"></div>
<div class="a18">
<div class="a12">
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="25"  ></td></tr>
</table>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="885"  height="200" valign="top" align="left" style="border-right:1px solid #e2e2e2;" >
<div class="posa">
<div class="dianp"><a href="comment">更多</a></div>
 <table width="885"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td width="212" height="25"  ><div class="btitle">业主真实点评</div></td><td width="638"  ></td><td width="34"   ></td></tr>
</table>


</div>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="25"  ></td></tr>
</table>
<table  width="884" border="0"   cellpadding="0" cellspacing="0"  align="center">
  
   <tr>
    <?php
$rsx=mysql_query("select  utel,uimg,content,uyid  from tb_upl where bid=1 and sh=1 order by  id desc limit 10",$conn);
$i=0;
while($arrayx=mysql_fetch_array($rsx)):
			if($i>0 and $i%2==0){
			?>
            </tr><tr><td colspan="2" height="28"></td></tr><tr>
            <?php }  
if ($arrayx['uimg']==""){
	
 if ($arrayx['utel']<>"") {
 $rs5=mysql_query("select  img from tb_user where username='$arrayx[utel]'",$conn);
 $array5=mysql_fetch_array($rs5);
  $uimgs=$array5['img'];
 mysql_free_result($rs5);
 }
	
}else{
	$uimgs=$arrayx['uimg'];
}
			?>
   <td  width="442" valign="top"  align="center" > 
   
   <table width="442"   align="center"  cellpadding="0" cellspacing="0" border="0">
   <tr><td width="43" align="center">
<img src="<?php echo $uimgs?>"  width="41" height="41" style="border:1px solid #e4e4e4;"/>
 </td>
 <td width="10"></td>
 <td width="365" align="left" valign="top" >
 <div class="font14"><?php echo substr($arrayx['utel'],0,3)?>****<?php echo substr($arrayx['utel'],7,4)?></div>
 <div class="otiao"><a href="comment/show.php?uid=<?php echo $arrayx['uyid']?>"  target="_blank"><?php echo $arrayx['content']?></a></div>
 </td>
 <td width="24"></td>
 </tr>
 </table>
 </td>
 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     
   </tr>
     </table>
</td>
<td width="25"  >
</td>
<td width="290"  align="left" valign="top" >
<div class="posa">
<div class="touduo"><a href="news/index.php?bid=4">更多</a></div>
<div class="toutiao xieti"><b>最新签约</b>&nbsp;</div>
</div>
<div class="clear"></div>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>
    <?php
$rsx=mysql_query("select  id,img,bei,title  from tb_talk where bid=4 order by id desc limit 3",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
   
   <table width="290"   align="center"  cellpadding="0" cellspacing="0" border="0">
   <tr><td width="95" align="center">
<a href="news/show.php?id=<?php echo $arrayx['id']?>"><img src="<?php echo $arrayx['img']?>"  width="90" height="80" style="border:1px solid #e4e4e4;"/></a>
 </td>
 <td width="8"></td>
 <td width="187" align="left" valign="top" >
 <div class="font14"><a href="news/show.php?id=<?php echo $arrayx['id']?>"  target="_blank"><?php echo $arrayx['title']?></a></div>
 <div style="height:60px; overflow:hidden; margin-top:6px;">
 <div class="font12 huis line20"><?php echo $arrayx['bei']?></div>
 </div>
 </td>
 </tr>
 </table>
  <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="12"  ></td></tr>
</table>
 <?php 
 
	 endwhile;
	mysql_free_result($rs6); 
	 ?>
 
</td>
</tr>
</table>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="35"  ></td></tr>
</table>
   </div>        
 </div>

<div class="clear"></div>


<div class="a11">
<div class="a12">
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="302"  align="left"><div class="btitle">工长实景工地</div></td>
<td width="605" ><div class="font12"  align="right"><a href="gongdi/" target="_blank">更多工地>></a></div>
 </td>
<td width="293"  align="left">
<form action="gongdi/" name="thisForm2" method="get"  onSubmit="return checkform();">
<div class="fr"><input type="submit" name="sub1" class="sou01" value="搜索" /></div>
<div class="fr"><input type="text" name="keys" class="sou02" value="" placeholder="输入工长名或小区" /></div>
</form>
</td>
</tr>
</table>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>

<table  width="1200" border="0"   cellpadding="0" cellspacing="0"  align="center">
  
   <tr>
    <?php
$rsx=mysql_query("select id,title,img,uid,xqus,mjs  from xingxis  where tjs=1 and sh=1 order by px_id desc,  id desc limit 10",$conn);
$i=0;
while($arrayx=mysql_fetch_array($rsx)):
			if($i>0 and $i%5==0){
			?>
            </tr><tr><td colspan="9" height="15"></td></tr><tr>
            <?php }  
			if($i>=0 and $i%5==0){
			}else{
			?>
             <td width="20"></td> 
            <?php 
			}  
			?>
           
           
          
   <td  width="224" valign="top"  align="center" >
<div class="gyuan">
<div class="gjpic gfens"><a href="gongdi/show.php?id=<?php echo $arrayx['id']?>"><img src="<?php echo $arrayx['img']?>" /></a></div>
<?php
 if ($arrayx['uid']>0) {
 $rs5=mysql_query("select relname,img from tb_user where bid=0 and id=$arrayx[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uimgs=$array5['img'];
  $uming=$array5['relname'];
 mysql_free_result($rs5);
 }
?>
<div class="gtou">
<div class="gtpic"><a href="gong/show.php?uid=<?php echo $arrayx['uid']?>"  target="_blank"><img src="<?php echo $uimgs?>" ></a></div>
<div class="gtart"><a href="gong/show.php?uid=<?php echo $arrayx['uid']?>"  target="_blank"><?php echo $uming?></a></div>
</div> 

 <div class="gtitle"><?php echo $arrayx['xqus']?> <?php echo $arrayx['mjs']?>㎡</div>
 <div class="gcguan"><a href="/gong/yuegd.php?id=<?php echo $arrayx['id']?>"  target="_blank">预约参观</a></div>
 </div>
   </td> 
     <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     
   </tr>
     </table>

   </div>        
 </div>
<div class="clear"></div>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<div class="a18">
<div class="a12">
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="287"  align="left"><div class="btitle">专业设计师</div></td>
 
<td width="620"><div class="font12"  align="right"><a href="design/" target="_blank">更多设计师>></a></div>
 </td>
<td width="293"  align="left">
<form action="design/" name="thisForm3" method="get"  onSubmit="return checkform();">
<div class="fr"><input type="submit" name="sub1" class="sou01" value="搜索" /></div>
<div class="fr"><input type="text" name="keys" class="sou02" value="" placeholder="输入设计师名称" /></div>
</form>
</td>
</tr>
</table>
<div class="clear"></div>



<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="25"  ></td></tr>
</table>
<DIV id=con1>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>

<td  width="220" valign="top" >
<div class="sjwen"></div>
  <UL id=tags1>
    
    <?php
 $rs6=mysql_query("select btitle  from slei  order by px_id asc limit 4",$conn);
 $kp=0;
  while($array6=mysql_fetch_array($rs6)):
 ?>  
             
<LI <?php if ($kp==0) {?>class=selectTag1<?php } ?>><A onMouseOver="selectTag1('tagContent1<?php echo $kp?>',this)" ><?php echo $array6['btitle']?></A></LI>

  <?php 
  $kp++;
  endwhile;
	 mysql_free_result($rs6); 
	 ?>

</UL>
</td>
<td width="980" align="center" valign="top" >

<script src="js/scros.js" type="text/javascript" ></script>
<link rel="stylesheet" type="text/css" href="css/main.css">

<DIV id=tagContent1>
     <?php
 $rs6=mysql_query("select bid,btitle from slei  order by px_id asc limit 4",$conn);
 $kp=0;
  while($array6=mysql_fetch_array($rs6)):
	 ?>            
    <DIV class="tagContent1 <?php if($kp==0){?>selectTag1<?php }?>" id=tagContent1<?php echo $kp?>>
     


<div class="mr_frbox">
  <div class="mr_frBtnL prev"></div>
  <div class="mr_frUl">
  <ul>
  <li>
<?php
 $rsdd=mysql_query("select id,relname,img,jibie  from tb_user where bid=1 and jibie=$array6[bid] and sh=1 order by kbid desc,id desc  ",$conn);
 $numh=mysql_num_rows($rsdd);
 if($numh>0): 
$i=0;
while($arraydd=mysql_fetch_array($rsdd)):
 if($i>0 and $i%2==0){
 ?>
  </li><li>
 <?php  }   
 if($i>=0 and $i%2==0){
  }else{
 ?>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table> 
  <?php  }  ?>
<div class="posa"> 
<div class="sjtou gfens"><a href="design/show.php?uid=<?php echo $arraydd['id']?>"  target="_blank"><img src="<?php echo $arraydd['img']?>" /></a></div>
<div class="stitle">
 <a href="design/show.php?uid=<?php echo $arraydd['id']?>"><?php echo $arraydd['relname']?></a>  <span class="font12"><?php echo $array6['btitle']?></span>
 </div>
 
</div>
<?php 
	 $i++;
 
	 endwhile;
	 endif;
	 mysql_free_result($rsdd); 
	 ?>
     
 </li>
  </ul>
  </div>
  <div  class="mr_frBtnR next" ></div>
</div>


 
 
 
    </DIV>
 
 <?php 
  $kp++;
  endwhile;
	 mysql_free_result($rs6); 
	 ?>
 
  </DIV>

<script language="javascript">
jQuery(".mr_frbox").slide({titCell:"",mainCell:".mr_frUl ul",autoPage:true,effect:"leftLoop",autoPlay:true,vis:5});
</script>

</td>
</tr>
</table>
</DIV>

<SCRIPT type=text/javascript>
function selectTag1(showContent1,selfObj1){
	// 操作标签
	var tag1 = document.getElementById("tags1").getElementsByTagName("li");
	var taglength1 = tag1.length;
	for(g=0; g<taglength1; g++){

		tag1[g].className = "";
	}
	selfObj1.parentNode.className = "selectTag1";
	// 操作内容
	for(g=0; h=document.getElementById("tagContent1"+g); g++){
		h.style.display = "none";
	}
	document.getElementById(showContent1).style.display = "block";
}
</SCRIPT>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
   </div>        
 </div>
<div class="clear"></div>

<div class="a11">
<div class="a12">
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="203"  align="left"><div class="btitle">设计师案例</div></td>
<td width="705"  align="left">
<div class="font13 pd5">
 <?php
 $rs6=mysql_query("select  bid,btitle  from tb_ustyle  order by px_id asc  ",$conn);
 while($array6=mysql_fetch_array($rs6)):
 ?>    
 <a  href="case/index.php?bid=<?php echo $array6['bid']?>"  target="_blank"><?php echo $array6['btitle']?></a> &nbsp; 
  <?php 
  endwhile;
  mysql_free_result($rs6); 
 ?>
 <a  href="case/"  target="_blank">更多案例>></a>
</div></td>
<td width="292"  align="left">
<form action="case/" name="thisForm4" method="get"  onSubmit="return checkform();">
<div class="fr"><input type="submit" name="sub1" class="sou01" value="搜索" /></div>
<div class="fr"><input type="text" name="keys" class="sou02" value="" placeholder="输入案例名称" /></div>
</form>
</td>
</tr>
</table>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="25"  ></td></tr>
</table>
<div class="posa aheis">
<?php
$rsx=mysql_query("select id,title,img,jtitle,hprice,mjs  from tb_ushe where tjs=1 and sh=1 order by id desc limit 5",$conn);
$g=1;
while($arrayx=mysql_fetch_array($rsx)):
?>       
<div class="ayuan<?php echo $g?>">
<div class="posa">
<div class="gfens"><a href="case/show.php?id=<?php echo $arrayx['id']?>"  target="_blank"><img src="<?php echo $arrayx['img']?>" /></a>
<?php if ($g==1){?>
<div class="ajian">
<div class="font20 bais"><?php echo $arrayx['title']?> &nbsp;&nbsp; <span class="font13"><?php echo $arrayx['mjs']?>平方 &nbsp;&nbsp; <?php echo $arrayx['hprice']?>元</span></div>
<div class="font12 bais pd3"><?php echo $arrayx['jtitle']?></div>
</div>
<?php }else{?>
<div class="ajian">
<div class="font20 bais"><?php echo $arrayx['title']?></div>
</div>
<?php } ?>
</div>
</div>
</div>
 
     <?php 
	 $g++;
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
</div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
   </div>        
 </div>
<div class="clear"></div>

<div class="a11">
<div class="a12">
 
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="185"  align="left"><div class="btitle">装修知识</div></td>
<td width="623"  align="left">
<div class="font14">
明明白白掌控家装从家装课堂开始
</div></td>
<td width="392" ><div align="right" class="font12"><a href="news/" target="_blank">更多资讯</a></div>
 
</td>
</tr>
</table>
<div class="clear"></div>
   </div>        
 </div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>
<div class="a18">
<div class="a12">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<table  width="1200" border="0"   cellpadding="0" cellspacing="0"  align="center">
  
   <tr>
    <?php
$rsx=mysql_query("select btitle,bid  from tb_talk_b where bid<>4  order by px_id asc limit 4",$conn);
$i=0;
while($arrayx=mysql_fetch_array($rsx)):
			if($i>0 and $i%4==0){
			?>
            </tr><tr><td colspan="7" height="15"></td></tr><tr>
            <?php }  
			if($i>=0 and $i%4==0){
			}else{
			?>
             <td width="26"></td> 
            <?php 
			}  
			?>
           
           
          
   <td  width="280" valign="top"  align="center" > 
<div class="posa">
<div class="touduo"><a href="news/index.php?bid=<?php echo $arrayx['bid']?>"  target="_blank">更多</a></div>
<div class="font20" align="left"><?php echo $arrayx['btitle']?></div>
</div>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>
   <?php
$rsw=mysql_query("select  id,title,img from tb_talk where bid=$arrayx[bid] and tjs=1 order by id desc  ",$conn);
$arrayw=mysql_fetch_array($rsw);

$jsid=$arrayw['id'];
?>   
<div class="gfens"><a href="news/show.php?id=<?php echo $arrayw['id']?>"  target="_blank"><img src="<?php echo $arrayw['img']?>" alt="<?php echo $arrayw['title']?>"  width="280" height="210" /></a></div>
<?php
mysql_free_result($rsw); 
?>   
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
   <?php
$rsw=mysql_query("select  id,title  from tb_talk where bid=$arrayx[bid] and id<>$jsid order by id desc  limit 5",$conn);
while($arrayw=mysql_fetch_array($rsw)):

?>   
<div align="left" class="onews"><a href="news/show.php?id=<?php echo $arrayw['id']?>"  target="_blank"><?php echo $arrayw['title']?></a></div>
<?php
endwhile;
mysql_free_result($rsw); 
?>  

   </td> 
   
   
   
     <?php 
	 $i++;
	 endwhile;
	mysql_free_result($rs6); 
	 ?>
     
   </tr>
     </table>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<div class="clear"></div>
   </div>        
 </div>
 
 

<div class="a11">
<div class="a12">
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="240"  align="left"><div class="btitle">合作品牌</div></td>
<td width="960"  >
 </td>
 
</tr>
</table>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>

<table  width="1200" border="0"   cellpadding="0" cellspacing="0"  align="center">
  
   <tr>
    <?php
$rsx=mysql_query("select title,img,links from tb_uhe order by px_id asc  ",$conn);
$i=0;
while($arrayx=mysql_fetch_array($rsx)):
			if($i>0 and $i%7==0){
			?>
            </tr><tr><td colspan="13" height="15"></td></tr><tr>
            <?php }  
			if($i>=0 and $i%7==0){
			}else{
			?>
             <td width="13"></td> 
            <?php 
			}  
			?>
           
           
          
   <td  width="160" valign="top"  align="center" >
 
<div align="center"><a href="<?php echo $arrayx['links']?>" target="_blank"><img src="<?php echo $arrayx['img']?>" width="160"  height="56"/></a></div>
 
   </td> 
     <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     
   </tr>
     </table>
<div class="font14 pd30" align="left">
友情链接
</div>

<div class="font12 pd5 line22"  align="left">
    <?php
$rsx=mysql_query("select title,url  from tb_link order by px_id asc  ",$conn);
while($arrayx=mysql_fetch_array($rsx)):
?>
<a href="<?php echo $arrayx['url']?>" target="_blank"><?php echo $arrayx['title']?></a> &nbsp;&nbsp;
    <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     
</div>
   </div>        
 </div>
<div class="clear"></div>
 
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="25"  ></td></tr>
</table>
 
<?php 
include('web_foot.php');
?> 
<script type="text/javascript">
  function addOrder1() {
            var oname = $("#OName").val();
            var omobile = $("#Tel").val();
            var community = $("#Community").val();
            var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
            if (oname.length == 0) {
                
                $("#OName").focus();
				$.alertable.alert('请填写您的姓名！');
				 
            }
            else if (omobile.length == 0) {
                 
                $("#Tel").focus();
				$.alertable.alert('请填写您的电话！');
				 
            }
			else if (!reg.test(omobile)) {
            $("#Tel").focus();
			$.alertable.alert('电话号码格式不正确！');
            }
            else if (community.length == 0) {
                $("#Community").focus();
				$.alertable.alert('请填写您的小区！');
            }else {
                $.ajax({
                    async: false,
                    url: "member/chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "addorder", "OName": oname, "OMobile": omobile, "Community": community},
                    success: function () { 
					 
					$.alertable.alert('恭喜您，您的预约提交成功！！');
					$("#OName").val(""); $("#Tel").val(""); $("#Community").val(""); 
					}
					 
                });
            }

        }
 
    </script> 

</body>
</html>
<?php
 mysql_close($conn);
?>

