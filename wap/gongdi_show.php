<?php
include("php/conn.php");
include("sub.php"); error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$id=intval(trim($_GET['id']));

if($id==0){
echo "<script type='text/javascript'>location.href='index.php';</script>";
exit;
}

if(is_numeric($id)){
}else{
echo "<script type='text/javascript'>location.href='index.php';</script>";
exit;
}


$rsur=mysql_query("select * from xingxis where  id=$id ",$conn);
$numur=mysql_num_rows($rsur);
$arrayur=mysql_fetch_array($rsur); 

if ($numur==0){
	echo "<script>alert('工地信息不存在！');history.go(-1);</script>";
	exit; 
}


 
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<meta content="telephone=no" name="format-detection">
<meta name="applicable-device" content="mobile">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="stylesheet" type="text/css" href="images/headfooter.min.css">
 
<link rel="stylesheet" type="text/css" href="images/index.css">
<script type="text/javascript" src="images/jquery.min.js"></script>
 
<title><?php echo $arrayur['title']?>_在建工地_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
 
</head>
<body onselectstart="return false">
<?php
include("web_top.php");

  if ($arrayur["uid"]>0){
	$rs5=mysql_query("select relname  from tb_user where  bid=0 and id=$arrayur[uid]",$conn);
	$array5=mysql_fetch_array($rs5);
	$gnames=$array5["relname"];
 
	mysql_free_result($rs5);
	  }
?>
<!-- 装修效果图开始 -->
<div class="top-sct top-sct-xgt">
  <div class="sct-bd sct-bd-xgt sct-bd-pd swipe" style="visibility: visible;">
    <div id="swipXgtBd" class="swipe_wrap swipe-xgt"  > </div>
  </div>
</div>
<div class="worker">
  <div class="worker-intr text-align-l">
    <p> <span class="bgcolor bgcolor-black" style="font-size: 19px;">七工长明星工长</span><a href="gong_show.php?id=<?php echo $arrayur['uid']?>"><span style="font-size: 19px;" class="bgcolor bgcolor-green"><?php echo $gnames?></span></a></p>
    </div>
    </div>
<div class="content">

<link rel="stylesheet" href="images/photoswipe.css" type="text/css" />
<link rel="stylesheet" href="images/gd_del.css" type="text/css" />
<link rel="stylesheet" href="images/default-skin.css" type="text/css" />
<div class="supmain">
    <div class="suptitle" style="position: relative;border-bottom:none;">
        <h2 style="margin-bottom: 5px;"><?php echo $arrayur['title']?>
        </h2>
        <p style="line-height: 22px; height: 22px;">
            <span>面积：</span><span style="font-weight:normal;"><?php echo $arrayur['mjs']?>m²</span>&nbsp;&nbsp;&nbsp;
            <span>房型：</span><span style="font-weight:normal;"><?php echo $arrayur['fangx']?></span>&nbsp;&nbsp;&nbsp;
        </p>
        <p style="font-size:12px;color: #666;font-weight:normal;line-height: 22px; height: 22px;">
           合同价：<?php echo $arrayur['hprice']?>元</p>
                                        <img src="<?php echo $arrayur['img']?>" alt="<?php echo $arrayur['title']?>" style="width:70px;height:70px;border-radius:50%;position:absolute;right:0px;top:15px;" title="<?php echo $arrayur['title']?>"> 
                        </div>
    <?php
$rsx=mysql_query("select  *  from tb_tuangou where bid=$arrayur[id]  order by  jdid asc",$conn);
$numx=mysql_num_rows($rsx);
 if($numx>0){ 
while($arrayx=mysql_fetch_array($rsx)):
 ?>
       <div class="suplist">
        <div class="supitem" style="position: relative;">
            <div class="supobj">
               <?php echo $arrayx['title']?>
            </div>
            <div class="supdetail">
                <span>阶段说明<span class="ico-t"></span></span>
                <div class="supDes">
<?php
$yxis=$arrayx['content'];
$yxis=str_replace("<img src=\"","<img  width=100% src=\"",$yxis);
$yxis=str_replace("white-space:nowrap;","",$yxis);
echo $yxis; 
?>              
                
 
                </div>
                <span>现场图片<span class="ico-t"></span></span>
                <div class="supImg">
                    <div class="suptime">
                            <span><?php echo date("Y-m-d",strtotime($arrayx['ytime']))?></span></div>
                    <div class="imgBox">
                        <div class="i-left floatL next">
                            <img src="images/next.png"/>
                        </div>
                        <div class="i-center floatL">
                            <div class="bd">
                                <ul class="gallery">
                                
<?php
		$y=1;
        for($y;$y<=8;$y++){ 
		
		if ($arrayx["img".$y.""]<>""){
		?>
 
<li><a><img bigsrc="<?php echo $arrayx["img".$y.""]?>" src="<?php echo $arrayx["img".$y.""]?>"/></a></li>
       
          <?php 
		  }
		 } 
		  ?>                    

                                                                 
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="i-right floatL prev">
                            <img src="images/prev.png"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
 <?php 
	 endwhile;
	mysql_free_result($rsx); 
 } 
	 ?>



</div>
<div class="ShowBox" style="display: none">
    <a class="loginclose" onclick="CloseYY()" style="cursor: pointer;"></a>
    <img id="showarea" width="100%"/>
</div>

<!--底部-->

<!--底部end-->
<!-- 图片弹出模态框 -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar" style="opacity:0;">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__loading-indicator">
                <div class="pswp__loading-indicator__line"></div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip">
                    <a href="#" class="pswp__share--facebook"></a>
                    <a href="#" class="pswp__share--twitter"></a>
                    <a href="#" class="pswp__share--pinterest"></a>
                    <a href="#" download class="pswp__share--download"></a>
                </div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
 
 
<script src="js/photoswipe.min.js"></script>
<script src="js/photoswipe-ui-default.min.js"></script>
<script src="js/initphotoswipefromdom.js"></script>
<script src="js/jquery.superslide.2.1.1.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(".imgBox").slide({
        titCell: ".hd ul",
        mainCell: ".bd ul",
        autoPage: true,
        effect: "left",
        autoPlay: false,
        vis: 2
    });
    function ShowBig(i, bigsrc) {
        $("#showarea").attr("src", bigsrc);
        $(".ShowBox").show();
    }
    function CloseYY() {
        $(".ShowBox").hide();
    }
</script>
 
<script type="text/javascript">
    $(".gallery img").each(function (index, el) {//自定义——将其他图片做成这种形式
        var self = $(this);
        imgReady($(this).attr("bigsrc"), function () {
            $(self).wrap('<a class="gallery-item" data-size="' + this.width + "x" + this.height + '" data-med="' + $(self).attr("bigsrc") + '" data-med-size="' + this.width + "x" + this.height + '">');
        });
    });
    initPhotoSwipeFromDOM('.gallery', 'gallery');
</script>
</div>
<div style="clear:both;"></div>
<?php
include("mess.php");
include("web_foot.php");
?>
 
</body>
</html>
 <?php
  mysql_free_result($rsur); 
  mysql_close($conn);
 ?>