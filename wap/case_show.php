<?php
include("php/conn.php");
include("sub.php"); 
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$id=intval(trim($_GET['id']));
 
if($id==0){
echo "<script type='text/javascript'>location.href='case.php';</script>";
exit;
} 


$rsuv=mysql_query("select * from tb_ushe where   id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('设计师案例不存在！');history.go(-1);</script>";
	exit; 
}
mysql_query("update tb_ushe set hits=hits+1 where id=$arrayuv[id] ",$conn);
 
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<meta content="telephone=no" name="format-detection">
<meta name="applicable-device" content="mobile">
 <meta name="hotcss" content="initial-dpr=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="stylesheet" type="text/css" href="images/headfooter.min.css">
<link rel="stylesheet" type="text/css" href="images/top.css">
<link rel="stylesheet" type="text/css" href="images/index.css">
<script type="text/javascript" src="images/jquery.min.js"></script>
<script type="text/javascript" src="images/swiper.min.js"></script>
<title><?php echo $arrayuv['title']?>_设计师案例</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link rel="stylesheet" href="images/css.css">
<link rel="stylesheet" href="images/gxia.css">
</head>
<body onselectstart="return false">
<?php
include("web_top.php");
?>
<div class="top-sct top-sct-zxzzd">
  <div class="sct-bd sct-bd-pd sct-zxzzd">
    <div class="zxzzd-search-wrap">
      <form action="case.php" method="get" name="secs">
        <div class="search-ipt">
          <input type="text" name="searchwords" value="请输入案例名称" onFocus="searchFocus()" onBlur="searchBlur()" class="search-box" onKeyDown="toSearch(this)" style="color: rgb(204, 204, 204);">
          <input type="submit" class="icon-search click-point"  value="" name="subj">
          </span> </div>
      </form>
    </div>
  </div>
</div>
     
  <!--公共头部-->
        <header>
          <a href=" javascript:history.go(-1) " class="headerAllowLeft"></a>
          
        <?php echo $arrayuv['title']?>
          	 
        </header>     

<div id="T01"></div>
<div class="chief_msg">
	<div class="chief_infor">
		<ul class="wrap">
			<li class="fl">
				<span>面积：</span>
				<em><?php echo $arrayuv['mjs']?>㎡</em>
			</li>
			<li class="fl">
				<span>户型：</span>
				<em><?php echo $arrayuv['hxs']?></em>
			</li>
			<li class="fl">
				<span>风格：</span>
				<em><?php if ($arrayuv['bid']>0) {
 $rs5=mysql_query("select btitle  from tb_ustyle where bid=$arrayuv[bid]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 echo $array5["btitle"];
 mysql_free_result($rs5);
 }?></em>
			</li>
			<li class="fl">
				<span>案例造价：</span>
				<em><?php echo $arrayuv['hprice']?>元</em>
			</li>
			<li class="fl">
				<span>设计理念：</span>
				<em><?php echo $arrayuv['jtitle']?></em>
			</li>
		</ul>
	</div>
<?php 
 if ($arrayuv['uid']>0) {
 $rs5=mysql_query("select relname,img,jibie,sfeng  from tb_user where bid=1 and id=$arrayuv[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uming=$array5['relname'];
  $uimgs=$array5['img'];
  $ujib=$array5['jibie'];
  $usfeng=$array5['sfeng'];
 mysql_free_result($rs5);
 }
  if ($ujib>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$ujib ",$conn);
 $array5=mysql_fetch_array($rs5);
 $ujming=$array5["btitle"];
 mysql_free_result($rs5);
 } 
		  ?>  
	<div class="chief_home">
		<a href="shifu_show.php?id=<?php echo $arrayuv['uid']?>" >
			<div class="wrap">
				<img src="<?php echo $uimgs?>" alt="" class="fl">
				<div class="namemsg fl">
					<span class="tx_title"><?php echo $ujming?></span>
					<span class="xm_name"><span class="fl"><?php echo $uming?></span>
					<img class="fl" src="images/gz_vip_01.png" alt="">
					</span>
				</div>
				<span class="go_home_page fr">进入TA的主页</span>
			</div>
		</a>
	</div>
	<div class="chief_cost">
		 
			<div class="wrap">
				<span>案例造价：</span>
				<em><?php echo $arrayuv['hprice']?><i>元</i></em>	 
			</div>
		 
	</div>
<link rel="stylesheet" href="js/baguettebox.min.css">
<link rel="stylesheet" href="js/lrtk.css">
<script src="js/baguettebox.min.js"></script>
	<div class="chief_case">
		<div class="intro_case">
			<div class="wrap">
				<h4>案例简介</h4>
				<p><?php echo $arrayuv['content']?></p>
			</div>
 
		</div>
 
		<div class="baguetteBoxOne item_case">
   <a   href="<?php echo $arrayuv['img']?>" title='<?php echo $arrayuv["title"]?>'><img src="<?php echo $arrayuv['img']?>" /></a> 
<?php
		$y=1;
        for($y;$y<=8;$y++){ 
		if ($arrayuv["img".$y.""]<>""){
		?>
   <div style="padding-top:5px;"><a   href="<?php echo $arrayuv["img".$y.""]?>" title='<?php echo $arrayuv["title"]?>'><img src="<?php echo $arrayuv["img".$y.""]?>" /></a></div>
        <?php 
		    }
		    } 
		  ?>       
		</div>
 <script>
baguetteBox.run('.baguetteBoxOne', {
    animation: 'fadeIn',
});
</script>
		
	</div>

 
	<div class="gray_line"></div>     
</div>
<?php
include("web_foot.php");
?>
</body>
</html>
<?php
 mysql_free_result($rsuv); 
  mysql_close($conn);
 ?>