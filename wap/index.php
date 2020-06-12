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
<link rel="stylesheet" type="text/css" href="images/common.min.css">
<link rel="stylesheet" type="text/css" href="images/swiper.min.css">
<link rel="stylesheet" type="text/css" href="images/index.css">
 
 
<script type="text/javascript" src="images/jquery.min.js"></script>
<script type="text/javascript" src="images/swiper.min.js"></script>
<title><?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
 
 
</head>
<body onselectstart="return false">
<?php
include("web_top.php");
?>
 
  <!--banner -->
  <section>
    <div class="swiper-container swiper-container-horizontal">
      <div class="swiper-wrapper" style="transition: 0ms; -webkit-transition: 0ms; -webkit-transform: translate3d(0px, 0px, 0px);">
 <?php
 $rs5=mysql_query("select title,image,url  from tb_flash  where  weizhi=2  order by px_id asc ",$conn);
 $l=1;
 while($array5=mysql_fetch_array($rs5)):
 ?>
        
        <figure class="swiper-slide swiper-slide-<?php if($l==1){?>active<?php }else{?>next<?php }?>" style="width:400px;"> <a href="<?php echo $array5['url']?>"> <img width="400" height="" src="<?php echo $array5['image']?>" alt="<?php echo $array5['title']?>"> </a> </figure>
 <?php
  $l++;
  endwhile;
  mysql_free_result($rs5);
  ?>
                      
      </div>
      <!-- 如果需要分页器 -->
      <div class="swiper-pagination">
       <?php
 $rs5=mysql_query("select id  from tb_flash  where  weizhi=2  order by px_id asc ",$conn);
 $l=1;
 while($array5=mysql_fetch_array($rs5)):
 ?>
      <span class="swiper-pagination-bullet <?php if($l==1){?>swiper-pagination-bullet-active<?php }?>"></span>
 <?php
  $l++;
  endwhile;
  mysql_free_result($rs5);
  ?>
      
      </div>
    </div>
    <!--banner end-->
    <!-- 主要功能区开始 -->
    <section>
      <ul class="main-enter bottom-half-pixel clearfix">
        <li><a class="click-point" data-point="2_1_1_6" href="gong.php"> <span class="icon-zxtuku-enter"></span>
          <h2>找工长</h2>
          </a> </li>
        <li> <a class="click-point" data-point="2_1_1_5" href="gongdi.php"> <span class="icon-zxgl-enter"></span>
          <h2>在建工地</h2>
          </a> </li>
        <li> <a class="click-point" data-point="2_1_1_4" href="shifu.php"> <span class="icon-zxgx-enter"></span>
          <h2>找设计师</h2>
          </a> </li>
        <li> <a class="click-point" data-point="2_1_1_7" href="case.php"> <span class="icon-pptm-enter"></span>
          <h2>设计案例</h2>
          </a> </li>
        <li> <a class="click-point" data-point="2_1_1_1" href="news.php"> <span class="icon-gyyf-enter"></span>
          <h2>工长模式</h2>
          </a> </li>
        <li> <a class="click-point" data-point="2_1_1_3" href="zb.php"> <span class="icon-hxsj-enter"><em>HOT</em></span>
          <h2>我要装修</h2>
          </a> </li>
        <li> <a class="click-point" data-point="2_1_1_2" href="shop.php"> <span class="icon-zxbj-enter"><em>HOT</em></span>
          <h2>老房翻新</h2>
          </a> </li>
        <li> <a class="click-point" data-point="2_1_1_6" href="huo.php"> <span class="icon-zxb-enter"></span>
          <h2>最新活动</h2>
          </a> </li>
      </ul>
    </section>
<div style="padding-top:10px; padding-bottom:10px; background-color:#FFFFFF;"><img src="images/sanbu.png" width="100%"  /></div>
    <div class="sp bottom-half-pixel"></div>
    <!-- 小导航 -->
    <section>
      <ul class="knowlage clearfix">
    <?php
$rst=mysql_query("select bid,btitle from tb_talk_b   order by px_id asc limit 3 ",$conn);
$j=1;
while($arrayt=mysql_fetch_array($rst)):
if ($j==1){
	$cname="rj";
}elseif ($j==2){
	$cname="xz";
}elseif ($j==3){
	$cname="xw";
}
?>
        <li><a href="news.php?bid=<?php echo $arrayt["bid"]?>"><i class="<?php echo $cname?>"></i><span><?php echo $arrayt["btitle"]?></span></a></li>
<?php
$j++;
endwhile;
mysql_free_result($rst); 
?>  
     
      </ul>
    </section>
    <!-- 小导航 -->
    <!-- 快速装修通道开始 -->
    <?php
    $cnum_dbuy=mysql_num_rows(mysql_query("select id from tb_uyue ",$conn)); 
	?>
 <link rel="stylesheet" type="text/css" href="images/jquery.alertable.css"> 
    
    <div class="top-sct top-sct-mfsj bottom-half-pixel">
      <header class="sct-hd sct-hd-mfsj bottom-half-pixel">
        <h1>帮你找装修<span class="sct-hd-mfsj-info">已有<em><?php echo $cnum_dbuy?></em>人在找装修</span></h1>
      </header>
      <div class="sct-bd">
        <div class="lastest-zbs-wrap bottom-half-pixel">
          <ul class="lastest-zbs" style="-webkit-transform: translate(0, 0);">
 <?php
$rst=mysql_query("select bname,tel from tb_uyue   order by id desc limit 6",$conn);
while($arrayt=mysql_fetch_array($rst)):
?>
            <li class="text-over-hidden"> <a>【最新】<?php echo $arrayt["bname"]?>  <?php echo substr($arrayt['tel'],0,3)?>****<?php echo substr($arrayt['tel'],7,4)?>  申请了装修服务</a> </li>
<?php
endwhile;
mysql_free_result($rst); 
?>
          
          </ul>
          <i class="icon-notice"></i> </div>
        <form class="mfsj-from" action="member_chuli.php?action=add" method="post">
          <input class="row mfsj-name"  id="Name2" type="text" placeholder="您的称呼">
          <input class="row mfsj-tel"  id="Mobile2" type="text" placeholder="手机号码"  onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11" >
          <input class="row  mfsj-area" id="xiaoqu" type="text" placeholder="所在小区">
    
          
          <input type="button" value="预约免费量房" name="subt"  onclick="yuegz()"  class="row mfsj-submit">
          
          <div class="mfsj-info"><i class="icon-info"></i>
            <div>我们承诺：七工长提供该项<em>免费服务，绝不产生任何费用</em>，为了您的利益以及我们的口碑，您的隐私将被严格保密。</div>
          </div>
        </form>
       </div>  
    </div>
 <script src="images/jquery.alertable.js"></script>
 <script type="text/javascript">
	$(function() {
	  $('.alert-demo').on('click', function() {
		$.alertable.alert('Howdy!');
	  });
	});
</script>  
<script type="text/javascript">
   
    function yuegz() {
        var mobile = $("#Mobile2").val();
        var name = $("#Name2").val();
		var xiaoqu = $("#xiaoqu").val();
 

        var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
        if (name.length == 0) {
            $("#Name2").focus();
            $.alertable.alert('请输入您的称呼！');
        }  else if (mobile.length == 0) {
            $("#Mobile2").focus();
			$.alertable.alert('请输入手机号码！');
        } else if (!reg.test(mobile)) {
            $("#Mobile2").focus();
			$.alertable.alert('手机号码格式不正确！');
        }
         
         else {
                $.ajax({
                    async: false,
                    url: "member_chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "yuegz", "OName": name, "OMobile": mobile, "xiaoqu": xiaoqu},
					
					success: function () { 
					$.alertable.alert('恭喜您，预约成功！！');					        
                            $("#Name2").val("");
                            $("#Mobile2").val("");
                            $("#xiaoqu").val("");
                            
					}
                });
        }
    }
</script>  
    <!-- 快速装修通道结束 -->
    <!-- 装修效果图开始 -->
    <div class="top-sct top-sct-xgt">
      <header class="sct-hd sct-hd-zxxg bottom-half-pixel">
        <h1>明星工长</h1>
        <ul class="swip-nav-hd xgt-swip-nav-hd" data-body="swipXgtBd">
        <?php
 $rs6=mysql_query("select btitle   from   tb_uqu order by px_id asc limit 4",$conn);
 $kp=0;
 while($array6=mysql_fetch_array($rs6)):
 ?>
          <li <?php if($kp==0){?>class="active"<?php }?>><span><?php echo $array6["btitle"];?></span></li>
 <?php
  $kp++;
  endwhile;
	 mysql_free_result($rs6); 
	 ?>
        </ul>
      </header>
      <div class="sct-bd sct-bd-xgt sct-bd-pd swipe" style="visibility: visible; height: 684px;">
        <div id="swipXgtBd" class="swipe_wrap swipe-xgt" style="width: 2560px;">
        
         <?php
 $rs6=mysql_query("select btitle   from   tb_uqu order by px_id asc limit 4",$conn);
 $kp=0;
 while($array6=mysql_fetch_array($rs6)):
 $jles=$kp*(-640);
 if ($kp==0){
	$jles2=0; 
 }elseif ($kp==1){
	$jles2=640; 
 }elseif ($kp==2){
	$jles2=640; 
 }elseif ($kp==3){
	$jles2=-640; 
 }
 ?>
          <div data-index="<?php echo $kp?>" style="width: 640px; left: <?php echo $jles?>px; transition: 0ms; -webkit-transition: 0ms; -webkit-transform: translate(<?php echo $jles2?>px, 0px) translateZ(0px);">
            <ul class="xgt-list clearfix">
            <?php
	$rst=mysql_query("select img,relname,id  from tb_user where bid=0   and  jquyu like '%$array6[btitle]%' order by  kbid desc,id asc limit 12",$conn);
	while($arrayt=mysql_fetch_array($rst)):
	?>
              <li> <a class="page-container" href="gong_show.php?id=<?php echo $arrayt["id"]?>">
                <div class="page-wrap"> <img onerror="this.onerror=null;this.src='/images/noavatar_medium.gif';" src="../<?php echo $arrayt["img"]?>" class="lazy" data-original="../<?php echo $arrayt["img"]?>" alt="<?php echo $arrayt["relname"]?>" width="150" height="150" style="display: block;">
                  <footer>
                    <p>明星工长：<?php echo $arrayt["relname"]?></p>
                  </footer>
                </div>
                </a> </li>
<?php
	 endwhile;
	 mysql_free_result($rst); 
	?>   
            </ul>
            <div class="sct-footer sct-footer-xgt"> <a href="gong.php">更多工长<span class="icon-more"></span></a> </div>
          </div>
       <?php
  $kp++;
  endwhile;
	 mysql_free_result($rs6); 
	 ?>
  
        </div>
      </div>
    </div>
    <!-- 装修效果图结束 -->
    
    <div class="top-sct top-sct-zxhq bottom-half-pixel">
      <header class="sct-hd sct-hd-zxhq decorationTitle bottom-half-pixel">
        <h1 style="float:left;">工长在建工地</h1>
        <span style="float:right; font-size:12px;" ><a href="gongdi.php">更多+</a>&nbsp;&nbsp;</span>
      </header>
      <div class="sct-bd sct-bd-pd">
        <div class="situation-box">
        
 <?php
	$rst=mysql_query("select id,title,xqus,img,uid,hprice,mjs from xingxis  order by  id desc  limit 6",$conn);
	$f=1;
	while($arrayt=mysql_fetch_array($rst)):
 
	?>
        
          <div class="situation-box-item"> <a class="click-point" data-point="2_1_3_1" href="gongdi_show.php?id=<?php echo $arrayt['id']?>"> <img src="../<?php echo $arrayt["img"]?>" class="lazy" data-original="../<?php echo $arrayt["img"]?>" alt="<?php echo $arrayt["title"]?>" style="display: inline;"> <span>在建工地</span> </a>
            <div> <a href="gongdi_show.php?id=<?php echo $arrayt["id"]?>">
              <h3><?php echo $arrayt["title"]?></h3>
              <p><?php 
	$rs8=mysql_query("select  relname  from tb_user where id=$arrayt[uid]",$conn);
	$array8=mysql_fetch_array($rs8);
    $unames=$array8['relname'];
    mysql_free_result($rs8);
    ?>

     施工工长: <?php echo  $unames?> &nbsp;   
     <br />
     面积：<?php echo $arrayt['mjs']?>m²
     &nbsp;合同价：<?php echo $arrayt['hprice']?>元
</p>
              </a> </div>
          </div>
  <?php
	 $f++;
	 endwhile;
	 mysql_free_result($rst); 
	?>   
          
          
        
          
        </div>
      </div>
    </div>
    
    <!-- 装修早知道开始 -->
    <div class="top-sct top-sct-zxzzd">
      <header class="sct-hd sct-hd-zxzzd bottom-half-pixel">
        <h1>专业设计师</h1>
      </header>
      <div class="sct-bd sct-bd-pd sct-zxzzd">
        
        <!-- zxzzd-items end -->
        <div class="zxzzd-search-wrap">
        <form action="shifu.php" method="post" name="secs">
          <div class="search-ipt">
          
            <input type="text" name="searchwords" value="填写设计师名称搜索" onFocus="searchFocus()" onBlur="searchBlur()" class="search-box" onKeyDown="toSearch(this)" style="color: rgb(204, 204, 204);">
            <input type="submit" class="icon-search click-point"  value="" name="subj"></span>
            <input type="hidden" name="sund" value="oks">
           
          </div>
           </form>
     
        </div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>    
 <div class="situation-box">
        
 <?php
	$rst=mysql_query("select id,relname,img,sfeng,jibie from  tb_user where  bid=1 order by  jibie asc  limit 3",$conn);
	$f=1;
	while($arrayt=mysql_fetch_array($rst)):
	
 
	?>
        
          <div class="situation-box-item"> <a class="click-point" data-point="2_1_3_1" href="shifu_show.php?id=<?php echo $arrayt['id']?>"> <img src="../<?php echo $arrayt["img"]?>" class="lazy" data-original="../<?php echo $arrayt["img"]?>" alt="<?php echo $arrayt["relname"]?>" style="display: inline;"> <span><?php echo $arrayt["relname"]?></span> </a>
            <div> <a href="shifu_show.php?id=<?php echo $arrayt["id"]?>">
              <h3><?php echo $arrayt["relname"]?></h3>
              <p><?php 
	if ($arrayt['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayt[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 $ujname=$array5["btitle"];
 mysql_free_result($rs5);
	}
    ?>

     <?php echo  $ujname?> &nbsp;  案例数：<?php echo mysql_num_rows(mysql_query("select id from tb_ushe where  uid=$arrayt[id]",$conn));?>套
     <br />
     擅长风格：<?php echo $arrayt['sfeng']?> 
     
</p>
              </a> </div>
          </div>
  <?php
	 $f++;
	 endwhile;
	 mysql_free_result($rst); 
	?>   
          
          
        
          
        </div>
        
      </div>
      <div class="sct-footer bottom-half-pixel"> <a href="shifu.php">更多设计师<span class="icon-more"></span></a> </div>
    </div>
    <!-- 装修早知道结束 -->
    <!-- 装饰行情开始 动态数据-->
    <div class="top-sct top-sct-zxhq bottom-half-pixel">
      <header class="sct-hd sct-hd-zxhq decorationTitle bottom-half-pixel">
        <h1 style="float:left;">装修不被坑</h1>
        <span style="float:right; font-size:12px;" ><a href="news.php">更多+</a>&nbsp;&nbsp;</span>
      </header>
      <div class="sct-bd sct-bd-pd">
        <div class="situation-box">
        
 <?php
	$rst=mysql_query("select id,title,img,bei,content from tb_talk where bid=2 and img<>''  order by  id desc limit 4",$conn);
	$f=1;
	while($arrayt=mysql_fetch_array($rst)):
	
	 if ($arrayt['img']<>""){
  $imgs=$arrayt['img'];
 }else{
  $content=$arrayt['content'];
  $content = str_replace('\"', '', $content);
  preg_match_all('/<img[^>]*src\s?=\s?[\'|"]([^\'|"]*)[\'|"]/is', $content, $picarr);
  $imgs=$picarr[1][0];
 }
	?>
        
          <div class="situation-box-item"> <a class="click-point" data-point="2_1_3_1" href="news_show.php?id=<?php echo $arrayt["id"]?>"> <img src="../<?php echo $imgs?>" class="lazy" data-original="<?php echo $imgs?>" alt="装修资讯" style="display: inline;"> <span>装修资讯</span> </a>
            <div> <a href="news_show.php?id=<?php echo $arrayt["id"]?>">
              <h3><?php echo $arrayt["title"]?></h3>
              <p><?php echo $arrayt["bei"]?>...</p>
              </a> </div>
          </div>
  <?php
	 $f++;
	 endwhile;
	 mysql_free_result($rst); 
	?>   
          
          
        
          
        </div>
      </div>
    </div>
    <!-- 装饰行情结束 -->
    <!-- 热门城市推荐开始 -->
    
    <!-- 热门城市推荐结束 -->
<?php
include("web_foot.php");
?>
</body>
</html>
<?php
 mysql_close($conn);
?>