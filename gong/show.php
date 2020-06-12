<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=2;
$uid=intval(trim($_GET['uid']));
 
if($uid==0){
echo "<script type='text/javascript'>location.href='index.php';</script>";
exit;
} 


$rsuv=mysql_query("select * from tb_user where  sh=1 and  bid=0 and  id=$uid ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('工长不存在！');history.go(-1);</script>";
	exit; 
}
mysql_query("update tb_user set hits=hits+10 where id=$arrayuv[id] ",$conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>工长<?php echo $arrayuv['relname']?>__<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>
<script src="/js/uaredirect.js" type="text/javascript" ></script>
<script type="text/javascript">uaredirect("/wap/gong_show.php?id=<?php echo $arrayuv['id']?>","");</script>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>  
<div class="a11">
<div class="a12">
 
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="707"  align="left"><div class="font14">您现在所在的位置：<a href="/">首页</a> > <a href="./">找工长</a> > 工长<?php echo $arrayuv['relname']?>简介</div></td>
 
<td width="493"  align="left">
<script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写工长名称!!');
      document.thisForm.keys.focus();
      return false;
      } 
 
	 return true;
}
</script>
<form action="index.php" name="thisForm" method="get"  onSubmit="return checkform();">
<div class="fr"><input type="submit" name="sub1" class="sou01" value="搜索" /></div>
<div class="fr"><input type="text" name="keys" class="sou02" value="" placeholder="输入工长名，搜索工长" /></div>
</form>
</td>
</tr>
</table>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>
 
<div class="GzInfo">
            <div class="i-info-1">
                <img onerror="this.onerror=null;this.src='../<?php echo $arrayuv['img']?>';" src="../<?php echo $arrayuv['img']?>" alt="<?php echo $arrayuv['relname']?>" title="<?php echo $arrayuv['relname']?>" />
            </div>
            <div class="i-info-2">
                <ul>
                    <li><b class="font20 heis">
                    <?php echo $arrayuv['relname']?></b>&nbsp;&nbsp;&nbsp;工长&nbsp;&nbsp;&nbsp; <img src="/images/renz.png" /></li>
                    <li>
                 <b>星级：</b>
                    <span  class="Star">
   <?php if ($arrayuv['xjid']==1){?>
 <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayuv['xjid']==2){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayuv['xjid']==3){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayuv['xjid']==4){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayuv['xjid']==5){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  />
 <?php }?>
                     </span>    
                  
                 
                   </li>
                   <li><b>预约数：</b><span class="txtgreen"  ><?php echo mysql_num_rows(mysql_query("select id from tb_uyue where uyid=$arrayuv[id]",$conn));?></span>次</li>
                   <li><b>关注数：</b><span class="txtgreen"  ><?php echo $arrayuv['hits']?></span>次</li>
                    <li><b>口碑值：</b><span class="txtgreen"><?php echo $arrayuv['kbid']?></span>分   </li>
                   <li><b>签单数：</b><span class="txtgreen"><?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$arrayuv[id]",$conn));?></span>单   </li> 
                    <!--<li><b>是否亲自施工：</b><span class="txtgreen">是</span></li>-->
					<li><b>保证金：</b><span class="txtgreen"><?php echo $arrayuv['sprice']?></span>&nbsp;元</li></ul>
            </div>
            <div class="i-info-3">
                <ul class="i-left-2">
                  <li><b>出身工种：</b><?php echo $arrayuv['jiguan']?></li>
                    <li><b>从业年限：</b><?php echo $arrayuv['glid']?>年</li>
                     <li><b>保修时间：</b>水电五年，整体两年</li>
                      <li><b>接受第三方监理</b></li>
                     
                    <li><b>接单区域：</b><label title="<?php echo $arrayuv['jquyu']?>"><?php echo $arrayuv['jquyu']?></label></li>
                   
                    <li>
                        <img style="vertical-align: middle; margin-top: -10px;" src="Images/mobile.png" /><span class="txtgreen" style="margin-left: 10px; font-size: 24px;"><?php echo $tels?></span></li>
                </ul>
            </div>
            <div class="i-info-4">
                <ul>
                    <li><a href="/gong/yuegz.php?id=<?php echo $arrayuv['id']?>">预约装修</a></li>
                    <li><a style="background: #11A84E" href="/gong/pjgz.php?id=<?php echo $arrayuv['id']?>">评价工长</a></li>
                </ul>
            </div>
           
            <div class="fl" style="margin-left:38px;">
            			分享到：
            		</div>
		            <div class="bdsharebuttonbox">
		            	<a href="#" class="bds_more" data-cmd="more"></a>
		            	<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		            	<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		            	<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
		            	<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
		            	<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		            </div>
					<script>
						window._bd_share_config={
								"common":{
				                	"bdUrl" : window.location.href,
									"bdSnsKey":{},
									"bdText":"",
									"bdMini":"2",
									"bdMiniList":false,
		 
									"bdStyle":"0",
									"bdSize":"16"
								},
								"share":{}
						};
						with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
					</script>
          
        </div>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="22"  ></td></tr>
</table>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="890"  align="left" valign="top">
<div class="btitle">工长简介</div>
<div class="font14 pd15 line25" style="text-indent:28px;"><?php echo $arrayuv['bei']?></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<div class="posa">
<div class="touduo"><a href="/gongdi/index.php?uid=<?php echo $arrayuv['id']?>">更多</a></div>
<div class="btitle">在建工地</div>
</div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<table  width="890" border="0"   cellpadding="0" cellspacing="0"  align="center">
   <tr><td width="209"></td><td width="18"></td><td width="209"></td><td width="18"></td><td width="209"></td><td width="18"></td><td width="209"></td></tr>
   <tr>
    <?php
$rsx=mysql_query("select id,title,img,uid,xqus,mjs,hprice  from xingxis where  sh=1 and uid=$arrayuv[id]  order by   id desc limit 8",$conn);
$i=0;
while($arrayx=mysql_fetch_array($rsx)):
			if($i>0 and $i%4==0){
			?>
            </tr><tr><td colspan="7" height="15"></td></tr><tr>
            <?php }  
			if($i>=0 and $i%4==0){
			}else{
			?>
             <td width="18"></td> 
            <?php 
			}  
			?>
           
           
          
   <td  width="209" valign="top"  align="center" >
<div class="gyuan">
<div class="gjpic gfens"><a href="/gongdi/show.php?id=<?php echo $arrayx['id']?>"><img src="<?php echo $arrayx['img']?>" /></a></div>
<div class="gtou">总价：<b><?php echo $arrayx['hprice']?></b>元</div>
 

 <div class="gtitle"><?php echo $arrayx['xqus']?> <?php echo $arrayx['mjs']?>㎡</div>
 <div class="gcguan"><a href="/gong/yuegd.php?id=<?php echo $arrayx['id']?>">预约参观</a></div>
 </div>
   </td> 
     <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     
   </tr>
     </table>


<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<div class="posa">
<div class="touduo"><a href="/comment/show.php?uid=<?php echo $arrayuv['id']?>">更多</a></div>
<div class="btitle">业主评价</div>
</div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>

<table  width="890" border="0"   cellpadding="0" cellspacing="0"  align="center">
  <tr><td width="445"></td><td width="445"></td></tr>
   <tr>
    <?php
$rsx=mysql_query("select  utel,uimg,content,uyid  from tb_upl where  sh=1 and bid=1 and  uyid=$arrayuv[id]  order by  id desc limit 8",$conn);
$i=0;
while($arrayx=mysql_fetch_array($rsx)):
			if($i>0 and $i%2==0){
			?>
            </tr><tr><td colspan="2" height="20"></td></tr><tr>
            <?php }  ?>
   <td  width="445" valign="top"  align="center" > 
   
   <table width="445"   align="center"  cellpadding="0" cellspacing="0" border="0">
   <tr><td width="43" align="center">
<img src="<?php echo $arrayx['uimg']?>"  width="41" height="41" style="border:1px solid #e4e4e4;"/>
 </td>
 <td width="10"></td>
 <td width="365" align="left" valign="top" >
 <div class="font14"><?php echo substr($arrayx['utel'],0,3)?>****<?php echo substr($arrayx['utel'],7,4)?></div>
 <div class="font14 oxians"><a href="/comment/show.php?uid=<?php echo $arrayx['uyid']?>"><b><?php echo $arrayuv['relname']?>工长</b>：<?php echo $arrayx['content']?></a></div>
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
<td width="30" ></td>
<td width="280"  align="left" valign="top">
<div class="posa">
<div class="touduo"><a href="/news/index.php?bid=4&uid=<?php echo $arrayuv['id']?>">更多</a></div>
<div class="btitle">TA的最新签单</div>
</div>


<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>

    <?php
$rsx=mysql_query("select  id,img,title,mjs,jprice  from tb_talk where bid=4 and uid=$arrayuv[id]  order by  id desc limit 5",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/news/show.php?id=<?php echo $arrayx['id']?>"  target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="/news/show.php?id=<?php echo $arrayx['id']?>"  target="_blank">
 <div class="font16"><b><?php echo $arrayx['title']?></b></div>
 <div class="font14 "><?php echo $arrayx['mjs']?>㎡</div>
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:3px;">签约工长：<?php echo $arrayuv['relname']?></div>
 <div class="font14 pd2 huis">签单金额：<?php echo $arrayx['jprice']?></div>
 </a>
 </td>
  <td width="10"></td> 
 </tr>
 </table>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>
 <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     
 


<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="22"  ></td></tr>
</table>
 

 <DIV id=con2>
  <div id=tags2>
  <UL >  
  <LI  class="selectTag2"  ><A onmouseover="selectTag2('tagContent20',this)" href="/gong/" >推荐工长</A></LI>  <LI ><A onmouseover="selectTag2('tagContent21',this)" href="/design/" >推荐设计师</A></LI>   
  </UL>
 </div>   
 <DIV id=tagContent2> 
  <DIV class="tagContent2  selectTag2" id="tagContent20">

<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>

    <?php
$rsx=mysql_query("select  id,img,relname,xjid,glid   from tb_user where sh=1  and yzid=1 and bid=0 order by  kbid desc,xjid desc limit 5",$conn);
while($arrayx=mysql_fetch_array($rsx)):
			?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="show.php?uid=<?php echo $arrayx['id']?>"  target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="show.php?uid=<?php echo $arrayx['id']?>">
 <div class="font16"><b><?php echo $arrayx['relname']?></b></div>
 <div class="pd5">   
 <?php if ($arrayx['xjid']==1){?>
 <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==2){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==3){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==4){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==5){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  />
 <?php }?></div>
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:8px;">工长工龄：<?php echo $arrayx['glid']?>年</div>
 <div class="font14 pd2 huis">签单数量：<?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$arrayx[id]",$conn));?>单</div>
 </a>
 </td>
  <td width="10"></td> 
 </tr>
 </table>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>
 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
  </DIV>   
    <DIV class="tagContent2" id="tagContent21"> 
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>
  <?php
$rsx=mysql_query("select  id,img,relname,jibie,glid   from tb_user where  tjs=1 and bid=1  and sh=1 order by kbid desc, id desc limit 5",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/design/show.php?uid=<?php echo $arrayx['id']?>"  target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="/design/show.php?uid=<?php echo $arrayx['id']?>"  target="_blank">
 <div class="font16"><b><?php echo $arrayx['relname']?></b></div>
  <div class="pd5">   
<?php
 if ($arrayx['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayx[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
  echo $array5["btitle"];
 mysql_free_result($rs5);
 }
 ?>
 </div>
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:8px;">工作年限：<?php echo $arrayx['glid']?>年</div>
 <div class="font14 pd2 huis">案例套数：<?php echo mysql_num_rows(mysql_query("select id from tb_ushe where uid=$arrayx[id]",$conn));?>套</div>
 </a>
 </td>
  <td width="10"></td> 
 </tr>
 </table>
 
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>

 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
</DIV>     
    </DIV>     
  <SCRIPT type=text/javascript>
function selectTag2(showContent2,selfObj2){
	// 操作标签
	var tag2 = document.getElementById("tags2").getElementsByTagName("li");
	var taglength2 = tag2.length;
	for(g=0; g<taglength2; g++){

		tag2[g].className = "";
	}
	selfObj2.parentNode.className = "selectTag2";
	// 操作内容
	for(g=0; h=document.getElementById("tagContent2"+g); g++){
		h.style.display = "none";
	}
	document.getElementById(showContent2).style.display = "block";
}
</SCRIPT>
     
    
  </div> 

</td>
</tr>
</table>

   </div>        
 </div>
<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="35"></td>
  </tr>
</table>
<?php
include("../nei_foot.php");
?>
</body>
</html>
 <?php
  mysql_free_result($rsuv); 
  mysql_close($conn);
 ?>