<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=5;

$id=intval(trim($_GET['id']));

if($id==0){
echo "<script type='text/javascript'>location.href='index.php';</script>";
exit;
} 

$rsuv=mysql_query("select * from xingxis where sh=1 and id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('工地不存在！');history.go(-1);</script>";
	exit; 
}
mysql_query("update xingxis set hits=hits+1 where id=$arrayuv[id] ",$conn);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>工地<?php echo $arrayuv['title']?>_在建工地</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/gongdi.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>
<script src="/js/uaredirect.js" type="text/javascript" ></script>
<script type="text/javascript">uaredirect("/wap/gongdi_show.php?id=<?php echo $arrayuv['id']?>","");</script>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td height="20"  ></td>
  </tr>
</table>
<div class="a11">
  <div class="a12">
    <table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="707"  align="left"><div class="font14">您现在所在的位置：<a href="/">首页</a> > <a href="./">在建工地</a> > 工地<?php echo $arrayuv['title']?>信息</div></td>
        <td width="493"  align="left">
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
            <div class="fr">
              <input type="submit" name="sub1" class="sou01" value="搜索" />
            </div>
            <div class="fr">
              <input type="text" name="keys" class="sou02" value="" placeholder="输入工长名或小区搜索" />
            </div>
          </form></td>
      </tr>
    </table>
    <div class="clear"></div>
    <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<?php
 if ($arrayuv['uid']>0) {
 $rs5=mysql_query("select relname,img from tb_user where bid=0 and id=$arrayuv[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uimgs=$array5['img'];
  $uming=$array5['relname'];
 mysql_free_result($rs5);
 }
?>
    <div class="Main">
      <div class="title" style="position:relative;">
      <?php if ($arrayuv['uid']>0) {?>
        <div class="logos floatL"><a  href="/gong/show.php?uid=<?php echo $arrayuv['uid']?>"  target="_blank"><img src="<?php echo $uimgs?>" alt="<?php echo $uming?>工长" title="<?php echo $uming?>工长"/></a></div>
         <?php }?>
        <div class="des floatL"> <span class="des-title"> <?php echo $arrayuv['xqus']?></span> 
        <span>面积：<?php echo $arrayuv['mjs']?>m²</span> 
        <span>合同价：<?php echo $arrayuv['hprice']?>元</span> 
        <span>房型：<?php echo $arrayuv['fangx']?></span>
        <span>业主：<?php echo $arrayuv['yname']?></span>
        <span style="float: right"><a href="/gong/yuegd.php?id=<?php echo $arrayuv['id']?>"  target="_blank">预约参观</a></span> 
        
        <div class="shareBox"  style="position:absolute; right:20px; top:22px; z-index:100;">
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

 </div>  
      
    </div>
    
  
   <div class="clear pd10"></div>   
      <?php 
$baogs=mysql_num_rows(mysql_query("select id from tb_tuangou where bid=$arrayuv[id]",$conn));	

if ($baogs==0){
	$jstep=0;
}else{
	
$rsw=mysql_query("select jdid from tb_tuangou where bid=$arrayuv[id] order by  jdid desc ",$conn);
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
    
    
    <div class="supmain">
     <table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="20"></td>
  </tr> 
</table>
   <div align="center" class="supitem">
   <div align="center" class="pd25 font20"><?php echo $arrayuv['title']?></div>
   <div align="center" class="pd15"><img src="<?php echo $arrayuv['img']?>" width="680" /></div>
   <div align="center" class="pd15 line26 a99"><?php echo $arrayuv['content']?></div>
  <table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="20"></td>
  </tr>
</table>
  
   </div>
  <table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="20"></td>
  </tr>
</table>
    <?php
$rsx=mysql_query("select  *  from tb_tuangou where bid=$arrayuv[id]  order by  jdid asc",$conn);
$numx=mysql_num_rows($rsx);
 if($numx>0){ 
while($arrayx=mysql_fetch_array($rsx)):
 ?>
      <div class="suplist">
        <div class="supitem" style="position: relative">
       
          <div class="supobj"> <?php echo $arrayx['title']?></div>
          <div class="supdetail " > 
           <div class="a99"><span>验收总结<span class="ico-t"></span></span></div>
            <div class="supDes">
              <div class="line24 a99"><?php echo $arrayx['content']?></div>
              <?php if ($arrayx['yneir']<>""){?>
              <p class="jhs">监理备注：<?php echo $arrayx['yneir']?></p>
              <?php } ?> 
              <br />
              <img style="position: absolute;top:10px;right:150px;" src="Images/seal<?php echo $arrayx['ysid']?>.0.gif" alt="" /></div>
               <?php
              if ($arrayx["img1"]<>""){
			  ?>
            <span>现场图片<span class="ico-t"></span></span>
            <div class="supImg">
              <div class="suptime"> <span> <b><?php echo date("d",strtotime($arrayx['ytime']))?></b>日</span><span><?php echo date("Y-m",strtotime($arrayx['ytime']))?></span></div>
              
             
              <div class="imgBox">
                <div class="i-left floatL prev" style="border: none"> <img src="images/xleft.png" /> </div>
                <div class="i-center floatL">
                  <div class="bd">
                    <ul>
                     <?php
		$y=1;
        for($y;$y<=8;$y++){ 
		
		if ($arrayx["img".$y.""]<>""){
		?>
       <li><a title="<?php echo $arrayuv['xqus']?>" class="group" href="<?php echo $arrayx["img".$y.""]?>"> <img src="<?php echo $arrayx["img".$y.""]?>" /></a></li>
          <?php 
		  }
		 } 
		  ?>       
                    </ul>
                  </div>
                </div>
                <div class="i-right floatL next"> <img src="images/xright.png" /> </div>
              </div>
             
            </div>
             <?php }?>
          </div>
        </div>
      </div>
 <?php 
	 endwhile;
	mysql_free_result($rsx); 
 } 
	 ?>

      
   
    </div>
    <script src="images/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="images/jquery.colorbox-min.js" type="text/javascript"></script>
    <link href="images/colorbox.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        $(document).ready(function () {
            $(".group").colorbox({ rel: 'group', height: "100%" });
        });
        jQuery(".imgBox").slide({ titCell: ".hd ul", mainCell: ".bd ul", autoPage: true, effect: "leftLoop", autoPlay: false, vis: 5 });
</script>
    
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