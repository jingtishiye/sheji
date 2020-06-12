<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=0;
$id=intval(trim($_GET['id']));
 
if($id==0){
echo "<script type='text/javascript'>location.href='index.php';</script>";
exit;
} 


$rsuv=mysql_query("select * from tb_talk where id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('装修知识不存在！');history.go(-1);</script>";
	exit; 
}
mysql_query("update tb_talk set hits=hits+10 where id=$arrayuv[id] ",$conn);

$bid=$arrayuv['bid'];
$uid=$arrayuv['uid'];

 if ($bid>0) {
 $rs5=mysql_query("select btitle,bid from tb_talk_b where bid=$bid",$conn);
 $array5=mysql_fetch_array($rs5);
  $bid=$array5['bid'];
  $btitle=$array5['btitle'];
 mysql_free_result($rs5);
 }
 if ($uid>0) {
 $rs5=mysql_query("select relname,id from tb_user where id=$uid",$conn);
 $array5=mysql_fetch_array($rs5);
  $uid=$array5['id'];
  $uname=$array5['relname'];
 mysql_free_result($rs5);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $arrayuv['title']?>_<?php echo $btitle?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/renovation_knowledge.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>
<script src="/js/uaredirect.js" type="text/javascript" ></script>
<script type="text/javascript">uaredirect("/wap/news_show.php?id=<?php echo $arrayuv['id']?>","");</script>
<div class="clear"></div>
 <div style="background:#f7f7f7">
    	<!--面包屑导航-->
	    <div class="col mbx"> 
	    	 <table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="507"  align="left"><div class="font14">您现在所在的位置：<a href="/">首页</a> > <a href="./">装修知识</a> ><span class="shs"><a href="index.php?bid=<?php echo $bid?>"><?php echo $btitle?></a></span> ><span class="shs">详细正文</span> </div></td>
      <td width="693"  align="left"><script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写名称!!');
      document.thisForm.keys.focus();
      return false;
      } 
 
	 return true;
}
</script>
        <form action="index.php" name="thisForm" method="get"  onSubmit="return checkform();">
          <div class="fr">
            <input type="submit" name="sub1" class="sou01" value="搜索" />
          </div>
          <div class="fr">
            <input type="text" name="keys" class="sou02" value="" placeholder="输入名称搜索" />
          </div>
        </form></td>
    </tr>
  </table>
  <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td height="25"  ></td>
    </tr>
  </table>
	    </div>
	    <!--内容-->
	    <div class="col">
 <link rel="stylesheet" type="text/css" href="images/jquery.alertable.css">	        
<script src="images/jquery.alertable.js"></script>
<div class="right fr">
	           
	    	<div class="signForm_box">
			<div class="signForm_imgBox">
				<?php
$rsw=mysql_query("select id,image,title  from tb_ads where id=1",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
 <img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>">                  
<?php 
 mysql_free_result($rsw); 
 ?>   
			</div>
	 
				<div class="signForm">
					<div><label>您的称呼</label><input type="text" id="Name" placeholder="先生/女士"></div>
						<div><label>小区名称</label><input type="text" id="Community" placeholder="请输入小区名称"></div>
						<div><label>房屋面积</label><input type="text" id="Square" placeholder="1室1厅1卫 65㎡"></div>
						<div><label>您的电话</label><input type="text" id="Mobile" placeholder="请输入手机号码" onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11" ></div>
				 
					 
					<a href="javascript:void(0)" class="confirmation"  onclick="yuesjs()">确认报名</a>
				</div>
			</form>
		</div>	
		     
	        	
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>
 
<DIV id=con3>
  <div id=tags3>
  <UL >  
  <LI  class="selectTag3"  ><A onmouseover="selectTag3('tagContent30',this)" href="/gong/" >推荐工长</A></LI>  
  <LI ><A onmouseover="selectTag3('tagContent31',this)" href="/design/" >推荐设计师</A></LI>   
  </UL>
 </div>   
 
 <DIV id=tagContent3> 
  <DIV class="tagContent3  selectTag3" id="tagContent30">

<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<div class="index01">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>
  <?php
$rsx=mysql_query("select  id,img,relname,xjid,glid   from tb_user where yzid=1 and bid=0 and sh=1  order by kbid desc, id desc limit 7",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/gong/show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="/gong/show.php?uid=<?php echo $arrayx['id']?>">
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
 
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:8px;">工作年限：<?php echo $arrayx['glid']?>年</div>
 <div class="font14 pd2 huis">工地数量：<?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$arrayx[id]",$conn));?>个</div>
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
  </div>  

 </DIV>   
    <DIV class="tagContent3" id="tagContent31">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<div class="index01">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>
  <?php
$rsx=mysql_query("select  id,img,relname,jibie,glid   from tb_user where  tjs=1 and bid=1  and sh=1 order by kbid desc, id desc limit 7",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/design/show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="/design/show.php?uid=<?php echo $arrayx['id']?>">
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
     </div>   
 
         
   </DIV>     
    </DIV>  
     </DIV>    
  <SCRIPT type=text/javascript>
function selectTag3(showContent3,selfObj3){
	// 操作标签
	var tag3 = document.getElementById("tags3").getElementsByTagName("li");
	var taglength3 = tag3.length;
	for(g=0; g<taglength3; g++){

		tag3[g].className = "";
	}
	selfObj3.parentNode.className = "selectTag3";
	// 操作内容
	for(g=0; h=document.getElementById("tagContent3"+g); g++){
		h.style.display = "none";
	}
	document.getElementById(showContent3).style.display = "block";
}
</SCRIPT>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>  
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=8",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:300px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>  
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>  
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=9",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:300px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?> 
  <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>  
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=10",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:300px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>   
 
	      	</div>
            
            
<div class="left fl showart">
			<div class="article_title">
				<div class="article_title_info"><?php echo $arrayuv['title']?></div>
		        <div class="article_title_right">
		        	<span style="color:#515151;" class="font12">
						发布：<?php echo date("Y-m-d",strtotime($arrayuv['data']))?>&nbsp;&nbsp;来源：<?php echo $arrayuv['uname']?> &nbsp;&nbsp;责编：<?php echo $arrayuv['zuser']?> &nbsp;&nbsp;浏览次数：<?php echo $arrayuv['hits']?> &nbsp;&nbsp;|&nbsp;&nbsp;分享到：
					</span>
					<div class="shareBox">
			            <div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1461222094653">
			                <a href="#" class="bds_more" data-cmd="more"></a>
			                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
			                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
			                <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
			                <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
			                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
			            </div>
			            <script>
			            	var title = document.title;
			            	window._bd_share_config = {
				                "common": {
				                	"bdUrl" : window.location.href,
				                    "bdSnsKey": {},
				                    "bdText": "【<?php echo $arrayuv['title']?>】:"+title,
				                    "bdMini": "2",
				                    
				                    "bdStyle": "0",
				                    "bdSize": "16"
				                }, "share": {}
				            };
				            with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
			            </script>
			        </div>
		        </div>
			</div>
            <div  style="border: 1px solid #f7cc61; background:#f5f5f5; padding:15px; margin-bottom:20px; font-size:12px;">导读：<?php echo $arrayuv['bei']?> </div>
            <div class="artcon">
   <?php if ($arrayuv['mflv']<>""){?>    
    <div style="margin-bottom:25px;"><embed src="<?php echo $arrayuv['mflv']?>" allowFullScreen="true" quality="high" width="100%" height="450" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
    </div>	        
   <?php }?>        
    <?php echo $arrayuv['content']?> 
            </div>
            <div class="next_article_box">
            	<div style="overflow: hidden;height:40px;width:200px;margin:auto;margin-top:20px;line-height:34px;">
            		<div class="fl">
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
			    <!--此处的按钮 注意限制内容长度-->
			    	<p>


<?php

$rs14=mysql_query("select id,title from tb_talk  where id>$id and bid=$bid order by id asc",$conn);
$array411=mysql_fetch_array($rs14);
 $nums=mysql_num_rows($rs14); 
if ($nums==0) {
 ?>
<a href="#" class="next_article">已经是第一篇</a>  
<?php
}else{
?>
<a href='show.php?id=<?php echo $array411['id']?>' class="next_article">上一篇：<?php echo $array411['title']?></a> 
<?php
 }
 $rs13=mysql_query("select id,title  from tb_talk where id<$id and bid=$bid  order by id desc",$conn);
$array311=mysql_fetch_array($rs13);
 $num=mysql_num_rows($rs13); 
if ($num==0){
 ?>
<a href="#" class="next_article mf10">已经是最后一篇</a>  
<?php
}else {
?>
<a href='show.php?id=<?php echo $array311['id']?>' class="next_article mf10">下一篇：<?php echo $array311['title']?></a> 
<?php
}
?> 

	
       		
			    	</p>
            </div>
            
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="35"  ></td>
            </tr>
          </table>  
 <?php if ($arrayuv['bid']<>4){?>     
                 
<table width="800"  style="border-top:1px solid #eeeeee;"  align="center"  cellpadding="0" cellspacing="0" border="0">
 <tr> <td height="20"  ></td> </tr>
<tr>
<td   align="left"><div class="posa">
<div class="dianp"><a href="/news">更多</a></div><div class="btitle">猜你喜欢的文章</div>
</div>
</td>
 
</tr>
 <tr> <td height="15"  ></td> </tr>
</table>   
<table width="800"  align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
    <?php
$rsx=mysql_query("select  id,img,title  from tb_talk where tjs=1  order by  id desc limit 10",$conn);
$i=0;
while($arrayx=mysql_fetch_array($rsx)):
		if($i>0 and $i%5==0){
			?>
            </tr><tr><td colspan="9" height="15"></td></tr><tr>
            <?php }  
			if($i>=0 and $i%5==0){
			}else{
			?>
             <td width="15"></td> 
            <?php 
			} ?> 
   <td  width="148" valign="top"  align="center" >
 
<div ><a href="/news/show.php?id=<?php echo $arrayx['id']?>"><img src="<?php echo $arrayx['img']?>" width="148" height="148" /></a></div>
<div class="font14 pd5 hsouc"><a href="/news/show.php?id=<?php echo $arrayx['id']?>"><?php echo $arrayx['title']?></a></div>
 

 
   </td> 
 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     
   </tr>
     </table>   
<?php }else{?>  
     
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="25"  ></td>
            </tr>
          </table>         
<table width="800"  style="border-top:1px solid #eeeeee;"  align="center"  cellpadding="0" cellspacing="0" border="0">
 <tr> <td height="20"  ></td> </tr>
<tr>
<td   align="left"><div class="posa">
<div class="dianp"><a href="/gong/show.php?uid=<?php echo $uid?>" target="_blank">查看他的店铺</a></div><div class="btitle"><?php echo $uname?>工长最新业主签单</div>
</div>
</td>
 
</tr>
 <tr> <td height="20"  ></td> </tr>
</table>   
<table width="800"  align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td  width="148" ></td><td width="15"></td><td  width="148" ></td><td width="15"></td><td  width="148" ></td><td width="15"></td><td  width="148" ></td><td width="15"></td><td  width="148" ></td></tr>
<tr>
    <?php
$rsx=mysql_query("select  id,img,title   from tb_talk where  bid=4 and uid=$uid order by  id desc limit 10",$conn);
$i=0;
while($arrayx=mysql_fetch_array($rsx)):
		if($i>0 and $i%5==0){
			?>
            </tr><tr><td colspan="9" height="10"></td></tr><tr>
            <?php }  
			if($i>=0 and $i%5==0){
			}else{
			?>
             <td width="15"></td> 
            <?php 
			} ?> 
   <td  width="148" valign="top"  align="center" >
 
<div ><a href="/news/show.php?id=<?php echo $arrayx['id']?>"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>" width="148"  height="148"/></a></div>
<div class="font14 pd5 hsouc"><a href="/news/show.php?id=<?php echo $arrayx['id']?>"><?php echo $arrayx['title']?></a></div>
 

 
   </td> 
 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     
   </tr>
     </table>   
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="25"  ></td>
            </tr>
          </table>         
<table width="800"  style="border-top:1px solid #eeeeee;"  align="center"  cellpadding="0" cellspacing="0" border="0">
 <tr> <td height="20"  ></td> </tr>
<tr>
<td   align="left"><div class="posa">
<div class="dianp"><a href="/comment/show.php?uid=<?php echo $uid?>" target="_blank">查看更多评价</a></div><div class="btitle"><?php echo $uname?>工长最新业主评价</div>
</div>
</td>
</tr>
 <tr> <td height="20"  ></td> </tr>
</table>   
 
    <?php
$rsx=mysql_query("select  utel,uimg,content,uyid  from tb_upl where  sh=1 and bid=1 and  uyid=$uid order by  id desc limit 5",$conn);
while($arrayx=mysql_fetch_array($rsx)):
?>
    
 
   <table width="800"   align="center"  cellpadding="0" cellspacing="0" border="0">
   <tr><td width="72" align="center">
<img src="<?php echo $arrayx['uimg']?>"  width="72" height="72" style="border:1px solid #e4e4e4;"/>
 </td>
 <td width="10"></td>
 <td width="685" align="left" valign="top" >
 <div class="font14"><?php echo substr($arrayx['utel'],0,3)?>****<?php echo substr($arrayx['utel'],7,4)?></div>
 <div class="font14 oxians"><a href="/comment/show.php?uid=<?php echo $arrayx['uyid']?>"><b><?php echo $arrayuv['relname']?>工长</b>：<?php echo $arrayx['content']?></a></div>
 </td>
 <td width="24"></td>
 </tr>
 </table>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="15"  ></td>
            </tr>
          </table> 
 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
 
<?php } ?>          
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="35"  ></td>
            </tr>
          </table>            
            
        </div>

	        
	        
	        <div class="clear"></div>
	    </div>
<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="35"></td>
  </tr>
</table>
    </div>


<?php
include("../nei_foot.php");
?>
<script type="text/javascript">
   
    function yuesjs() {
        var mobile = $("#Mobile").val();
        var name = $("#Name").val();
        var community = $("#Community").val();
        var square = $("#Square").val();

        var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
        if (name.length == 0) {
            $("#Name").focus();
            $.alertable.alert('请输入您的称呼！');
        }  else if (mobile.length == 0) {
            $("#Mobile").focus();
			$.alertable.alert('请输入手机号码！');
        } else if (!reg.test(mobile)) {
            $("#Mobile").focus();
			$.alertable.alert('手机号码格式不正确！');
        }
        else if (community.length == 0) {
            $("#Community").focus();
			$.alertable.alert('请输入所在小区！');
        } 
         else {
                $.ajax({
                    async: false,
                    url: "/member/chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "yuesjs", "OName": name, "OMobile": mobile, "Community":community,"Square":square},
					
					success: function () { 
					$.alertable.alert('恭喜您，预约成功！！');					        
                            $("#Name").val("");
                            $("#Mobile").val("");
                            $("#Community").val("");
                            $("#Square").val("");
					}
                });
        }
    }
</script>
</body>
</html>
<?php
 mysql_free_result($rsuv); 
 mysql_close($conn);
?>