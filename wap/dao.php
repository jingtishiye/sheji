<?php
include("php/conn.php");
include("sub.php"); 
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<meta content="telephone=no" name="format-detection">
<meta name="applicable-device" content="mobile">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="stylesheet" type="text/css" href="images/headfooter.min.css">
<link rel="stylesheet" type="text/css" href="images/top.css">
<link rel="stylesheet" type="text/css" href="images/index.css">
<script type="text/javascript" src="images/jquery.min.js"></script>
<script type="text/javascript" src="images/swiper.min.js"></script>
<title><?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link rel="stylesheet" href="images/wcss.css">
</head>
 
<body onselectstart="return false">
 
<header id="dt-hd" class="navstyle2"> <a class="icon-logo-index goIndex" href="./"></a>  
 
<nav class="login-heads-frame"> <a href="user.php"><span class="login-heads-top" id="addhovers"></span></a> </nav>
  <!--右边导航按钮-->
  <nav id="dt-hd-nav"><a href="./">返回</a></nav>
  <div id="dt-hd-navs-wrap" >
    <ul class="dt-hd-navs">
      <li> <a class="goIndex" href="./"> <i class="icon-navf0"></i>
        <p>首页</p>
        </a> </li>
      <li> <a class="click-point" data-point="2_1_1_1" href="gong.php"> <i class="icon-navf1"></i>
        <p>找工长</p>
        </a> </li>
      <li> <a class="click-point" data-point="2_1_1_2" href="gongdi.php"> <i class="icon-navf2"></i>
        <p>在建工地</p>
        </a> </li>
      <li> <a class="click-point" data-point="2_1_1_2" href="shifu.php"> <i class="icon-navf3"></i>
        <p>找设计师</p>
        </a> </li>
      <li> <a class="click-point city-update-left" data-point="2_1_1_6" href="case.php"> <i class="icon-navf4"></i>
        <p>设计案例</p>
        </a> </li>
      <li> <a class="click-point" data-point="2_1_1_4" href="shop.php"> <i class="icon-navf6"></i>
        <p>368套餐</p>
        </a> </li>
      <li> <a class="click-point" data-point="2_1_1_5" href="zb.php"> <i class="icon-navf5"></i>
        <p>我要装修</p>
        </a> </li>
      <li> <a class="click-point" data-point="2_1_1_7" href="news.php"> <i class="icon-navf8"></i>
        <p>行业资讯</p>
        </a> </li>
      <li> <a class="click-point" data-point="2_1_1_8" href="huo.php"> <i class="icon-navf9"></i>
        <p>最新活动</p>
        </a> </li>
    </ul>
  </div>
</header>
<script>
    $(function(){
        //设置uid 身份
//        var username = getCookie('to8to_username');
//        if(typeof(username) != 'undefined' && username !="" && username != "deleted" ){
//            $("#userNav").attr('src','http://img.to8to.com/wap/v2/shop/login.png');
//        }
        $('#addhovers,#add_nav_hovers').on('touchstart',function(){
            $(this).addClass('add_hover');
    
        });
        $('#addhovers,#add_nav_hovers').on('touchend',function(){
            $(this).removeClass('add_hover');
        });
    });
</script>
 

</body>
</html>