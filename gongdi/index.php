<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=5;
$bid=intval(trim($_GET['bid']));
$uid=intval(trim($_GET['uid']));
 
$keys=trim($_GET['keys']);

 if ($uid>0) {
 $rs5=mysql_query("select relname,id from tb_user where bid=0 and id=$uid",$conn);
 $array5=mysql_fetch_array($rs5);
  $uid=$array5['id'];
  $gznames=$array5['relname'];
 mysql_free_result($rs5);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>工长<?php echo $gznames?>在建工地_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/gongdi.css" type="text/css" rel="stylesheet" />
<link href="images/de2.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>
  <link rel="stylesheet" type="text/css" href="/design/images/jquery.alertable.css">
  <script src="/design/images/jquery.alertable.js"></script>
  	
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>  
<div class="a11">
<div class="a12">
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="890" align="left" valign="top">
<table width="890"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="200"  align="left"><div class="btitle">工长<?php echo $gznames?>在建工地</div></td>
<td width="397"  align="left">
<div class="font12">
<span <?php if ($bid==0){?>class="hongs"<?php }?>><a  href="index.php" >全部</a></span> &nbsp; 
    
<span <?php if ($bid==1){?>class="hongs"<?php }?>><a  href="index.php?bid=1" >开工大吉</a></span> &nbsp; 
<span <?php if ($bid==2){?>class="hongs"<?php }?>><a  href="index.php?bid=2" >水电</a></span> &nbsp;
<span <?php if ($bid==3){?>class="hongs"<?php }?>><a  href="index.php?bid=3" >泥瓦</a></span> &nbsp;
<span <?php if ($bid==4){?>class="hongs"<?php }?>><a  href="index.php?bid=4" >木工</a></span> &nbsp;
<span <?php if ($bid==5){?>class="hongs"<?php }?>><a  href="index.php?bid=5" >油漆</a></span> &nbsp;
<span <?php if ($bid==6){?>class="hongs"<?php }?>><a  href="index.php?bid=6" >安装</a></span> &nbsp;
<span <?php if ($bid==7){?>class="hongs"<?php }?>><a  href="index.php?bid=7" >验收完成</a></span> 

</div></td>
<td width="293"  align="left">

<script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写工长名或小区名!!');
      document.thisForm.keys.focus();
      return false;
      } 
 
	 return true;
}
</script>
<form action="index.php" name="thisForm" method="get"  onSubmit="return checkform();">
<div class="fr"><input type="submit" name="sub1" class="sou01" value="搜索" /></div>
<div class="fr"><input type="text" name="keys" class="sou02" value="" placeholder="输入工长名或小区搜索" /></div>
</form>
</td>
</tr>
</table>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>
<?php
if ($bid>0){
	$tiao1="and bid=$bid ";
}
if ($uid>0){
	$tiao3="and uid=$uid ";
}

if($keys<>""){ 
	$tiao2="and title like '%$keys%'";
}

 $rrs5=mysql_query("select id   from xingxis where  sh=1 $tiao1 $tiao2 $tiao3 ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=12;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=intval(trim($_GET["page"]));
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rsx=mysql_query("select * from xingxis where sh=1 $tiao1 $tiao2 $tiao3 order by  id desc limit $p,$pagesize ",$conn);
 if($num>0){ 
 while($arrayx=mysql_fetch_array($rsx)):
 
 if ($arrayx['uid']>0) {
 $rs5=mysql_query("select relname,img from tb_user where bid=0 and id=$arrayx[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uimgs=$array5['img'];
  $uming=$array5['relname'];
 mysql_free_result($rs5);
 }
 

?> 
<div class="gd-item">
                <div class="gd-left floatL">
                    <div class="pic">
 <a style="height: 170px; display: block"   href="show.php?id=<?php echo $arrayx['id']?>" target="_blank">
 <img title="<?php echo $arrayx['xqus']?>" alt="<?php echo $arrayx['xqus']?>"  src="<?php echo $arrayx['img']?>" /></a>
                        <div class="info">
<a   href="show.php?id=<?php echo $arrayx['id']?>" target="_blank"><?php echo $arrayx['xqus']?><?php echo $arrayx['mjs']?>m²</a></div>
                    </div>
                    <div class="handle">
     <a  href="/gong/show.php?uid=<?php echo $arrayx['uid']?>"  target="_blank" class="floatL gzname">
          <strong><?php echo $uming?></strong></a> <a class="floatR see" href="/gong/yuegd.php?id=<?php echo $arrayx['id']?>"  target="_blank">预约参观</a>
                    </div>
                    <?php if ($arrayx['uid']>0) {?>
                    <div class="avatar">
     <a href="/gong/show.php?uid=<?php echo $arrayx['uid']?>"  target="_blank"><img src="<?php echo $uimgs?>" ></a>
                        
                    </div>
                     <?php }?>
                </div>
                <div class="gd-right floatL">
                    <div class="gd-title">
                        <span class="des-title"><a   href="show.php?id=<?php echo $arrayx['id']?>"><?php echo $arrayx['xqus']?></a></span> <span>面积：<?php echo $arrayx['mjs']?>m²</span>
                        <span>合同价：<?php echo $arrayx['hprice']?>元</span>
                    </div>
                    

 <div class="gd-result">
               <?php
$baogs=mysql_num_rows(mysql_query("select id from tb_tuangou where bid=$arrayx[id]",$conn));	

if ($baogs>0){
 
$rsw=mysql_query("select content,ysid,yneir from tb_tuangou where bid=$arrayx[id] order by  id desc ",$conn);
$arrayw=mysql_fetch_array($rsw);
$bgneir=$arrayw['content']; 
$bgys=$arrayw['yneir']; 
$byid=$arrayw['ysid']; 
mysql_free_result($rsw);

if ($bgneir<>""){	
$content_01 = $bgneir; 
$content_02 = htmlspecialchars_decode($content_01);
$content_03 = str_replace("&nbsp;","",$content_02); 
$contents = strip_tags($content_03); 
$con66 = mb_substr($contents, 0, 100,"utf-8"); 
}
 ?>   
   <div class="wens">验收总结<span class="ico-t"></span></div>
      <div>
       <p style="height:48px; overflow:hidden;"><?php echo $con66?></p>
       <?php if ($bgys<>""){?>
       <p class="jhs">监理备注：<?php echo $bgys?></p>
       <?php } ?> 
     </div>
<?php }else{?>                    
     <div class="wens">暂无验收报告<span class="ico-t"></span></div>
                  
<?php } 

if ($baogs==0){
	$jstep=0;
}else{
	
$rsw=mysql_query("select jdid from tb_tuangou where bid=$arrayx[id] order by  jdid desc ",$conn);
$arrayw=mysql_fetch_array($rsw);
$jdid=$arrayw['jdid']; 
mysql_free_result($rsw);	
	
	
	$jstep=$jdid;
}


?>  

<div class="site_step">
    <p class="step bar"> <span class="bar step_color step<?php echo $jstep?>"></span></p>
     
     <p>
     <span class="step">开工大吉</span>
     <span class="step">水电改造</span>
     <span class="step">泥瓦阶段</span>
     <span class="step">木工阶段</span>
     <span class="step">油漆阶段</span>
     <span class="step">安装阶段</span>
     <span class="step">验收完成</span>
     </p>
      </div>
 </div>
                    
                    
                </div>
      <?php if ($baogs>0){?><div class="gd-status"><img src="images/seal<?php echo $byid?>.0.gif"  /></div><?php } ?> 
            </div>
            <div class="clear"></div>
     <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="1"  ></td></tr>
</table>
<div class="page">

 <a href="?bid=<?php echo $bid?>&uid=<?php echo $uid?>&keys=<?php echo $keys?>&page=<?php echo ($page-1)?>"  ><span class="song"><b><</b></span></a>
<?php 
 if (($page-5)>1) {
$ys=$page-5;
$yb=$page+5;
}
else{
$ys=1;
$yb=6;
}
if ($yb>$pagemax){
$yb=$pagemax;
}
for($ys;$ys<=$yb;$ys++){ 
?>
 <a href="?bid=<?php echo $bid?>&uid=<?php echo $uid?>&keys=<?php echo $keys?>&page=<?php echo $ys?>" <?php if ($ys==$page) {?>class="now"<?php }?> ><?php echo $ys?></a>
 <?php } ?> 
 <a href="?bid=<?php echo $bid?>&uid=<?php echo $uid?>&keys=<?php echo $keys?>&page=<?php echo ($page+1)?>"  ><span class="song"><b>></b></span></a>
</div>
 
 <?php
 }
 ?> 
</td>
<td width="30"></td>
<td width="280" align="left" valign="top">
 <div class="signForm_box">
				<div class="signForm_imgBox">
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=1",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>" width="280"  alt="<?php echo $arrayw['title']?>"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>  
				 
				</div>
	 
					 
					<div class="signForm">
						<div><label>您的称呼</label><input type="text" id="Name" placeholder="先生/女士"></div>
						<div><label>小区名称</label><input type="text" id="Community" placeholder="请输入小区名称"></div>
						<div><label>房屋面积</label><input type="text" id="Square" placeholder="1室1厅1卫 65㎡"></div>
						<div><label>您的电话</label><input type="text" id="Mobile" placeholder="请输入手机号码" onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11" ></div>
				  
						<a href="javascript:void(0)" class="confirmation"  onclick="yuesjs()">预约设计</a>
					</div>
			 
			</div>    
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>  
        
<div class="posa">
<div class="touduo"><a href="/gong/">更多</a></div>
<div class="btitle">推荐工长</div> 
</div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>

    <?php
$rsx=mysql_query("select  id,img,relname,xjid,glid   from tb_user where  yzid=1 and bid=0 and sh=1  order by kbid desc limit 5",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/gong/show.php?uid=<?php echo $arrayx['id']?>"  target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
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
   
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=8",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:280px;"></a>                  
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
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:280px;"></a>                  
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
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:280px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>     
  
  
    <div class="clear"></div>  
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>
<div class="posa">
<div class="touduo"><a href="/gong/yuelist.php">更多</a></div>
<div class="btitle">最新签单</div> 
</div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>

    <?php
$rsx=mysql_query("select  id,img,title,mjs,jprice,uid  from tb_talk where bid=4  order by  id desc limit 10",$conn);
while($arrayx=mysql_fetch_array($rsx)):

 if ($arrayx['uid']>0) {
 $rs5=mysql_query("select relname  from tb_user where bid=0 and id=$arrayx[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uming=$array5['relname'];
 mysql_free_result($rs5);
 }

			?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/news/show.php?id=<?php echo $arrayx['id']?>"  target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="/news/show.php?id=<?php echo $arrayx['id']?>">
 <div class="font16"><b><?php echo $arrayx['title']?></b></div>
 <div class="font16 pd2"><?php echo $arrayx['mjs']?>㎡</div>
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:3px;">签约工长：<?php echo $uming?></div>
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
</td>
</tr>
</table>
<div class="clear"></div>
 
   </div>        
 </div>
<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="35"></td>
  </tr>
</table>
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

<?php
include("../nei_foot.php");
?>
</body>
</html>
<?php
 mysql_close($conn);
?>