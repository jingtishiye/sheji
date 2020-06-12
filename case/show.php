<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=6;

$id=intval(trim($_GET['id']));
 
if($id==0){
echo "<script type='text/javascript'>location.href='index.php';</script>";
exit;
} 


$rsuv=mysql_query("select * from tb_ushe where sh=1 and  id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('设计师案例不存在！');history.go(-1);</script>";
	exit; 
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $arrayuv['title']?>_设计师案例</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="images/case_detail.css" />
<link rel="stylesheet" href="images/idangerous.swiper.css" />
<link rel="stylesheet" href="images/swiper.min.css" />
</head>
<body>
<?php
include("../nei_top.php");
?>
<script src="/js/uaredirect.js" type="text/javascript" ></script>
<script type="text/javascript">uaredirect("/wap/case_show.php?id=<?php echo $arrayuv['id']?>","");</script>
<div class="clear"></div>
<div class="col" style="background: #eaeaea;padding-top: 20px">
  <table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="507"  align="left"><div class="font14">您现在所在的位置：<a href="/">首页</a> > <a href="./">设计师案例</a> > <span class="shs"><a href="show.php?id=<?php echo $arrayuv['id']?>"><?php echo $arrayuv['title']?></a></span> </div></td>
      <td width="200"> <div class="shareBox"   >
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
			        </div></td>
      <td width="493"  align="left"><script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写案例名称!!');
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
            <input type="text" name="keys" class="sou02" value="" placeholder="输入案例名称搜索" />
          </div>
        </form></td>
    </tr>
  </table>
  <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td height="20"  ></td>
    </tr>
  </table>
  
<script type="text/javascript">
$(function(){
	$(".case-good a").click(function(){
		var love = $(this);
		var id = love.attr("rel");
		love.fadeOut(100);
		$.ajax({
			type:"POST",
			url:"love.php",
			data:"id="+id,
			cache:false,
			success:function(data){
				love.html(data);
				love.fadeIn(100);
			}
		});
		return false;
	});
});
</script>
  
  <div class="clear"></div>
  <div class="case-bg-box" style="padding-bottom:  20px;">
    <div class="case-content-box">
      <div class="case-inner-box" style="margin-top: 0px">
        <div class="case-inner-left"> 
          <!-- Slider main container -->
          <div class="swiper-container gallery-top">
            <div class="case-good"  ><a rel="<?php echo $arrayuv['id']?>" title="赞" ><img src="images/zan.png" /> <span class="case-good-numb"><?php echo $arrayuv['hits']?></span></a>    </div>
            
            
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper"> 
              <!-- Slides -->
              
       
        <div class="swiper-slide">  <img src="<?php echo $arrayuv['img']?>" /> </div>      
             
        <?php
		$y=1;
        for($y;$y<=8;$y++){ 
		if ($arrayuv["img".$y.""]<>""){
		?>
      <div class="swiper-slide">  <img src="<?php echo $arrayuv["img".$y.""]?>" /> </div> 
          <?php 
		  }
		 } 
		  ?>        
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev gallery-top-prev" style="background-image: url('images/left.png')"></div>
            <div class="swiper-button-next gallery-top-next" style="background-image: url('images/right.png')"></div>
          </div>
          <style>
                    .swiper-wrapper-bottom{
						padding-left: 0px !important;
                    }
                    </style>
          <div style="width: 860px;overflow: hidden;">
            <div class="gallery-bottom-box">
              <div class="swiper-container gallery-bottom">
                <div class="swiper-wrapper swiper-wrapper-bottom"> 
                  <!-- Slides -->
                  
                  
                 <div class="swiper-slide swiper-thumb"><img src="<?php echo $arrayuv['img']?>" /> </div>       
           <?php
		$y=1;
        for($y;$y<=8;$y++){ 
		if ($arrayuv["img".$y.""]<>""){
		?>
      <div class="swiper-slide swiper-thumb">  <img src="<?php echo $arrayuv["img".$y.""]?>" /> </div> 
          <?php 
		  }
		 } 
		 
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
              
                </div>
              </div>
              <div class="swiper-button-prev gallery-bottom-prev" style="background-image: url('images/case_detail_left.png')"></div>
              <div class="swiper-button-next gallery-bottom-next" style="background-image: url(images/case_detail_right.png')"></div>
            </div>
          </div>
          <div class="case-table">
            <table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>案例风格</td>
                <td style="width:285px"><div><?php if ($arrayuv['bid']>0) {
 $rs5=mysql_query("select btitle  from tb_ustyle where bid=$arrayuv[bid]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 echo $array5["btitle"];
 mysql_free_result($rs5);
 }?></div></td>
                <td>案例户型</td>
                <td style="width:150px"><div><?php echo $arrayuv['hxs']?></div></td>
                <td>案例面积</td>
                <td style="width:150px"><div><?php echo $arrayuv['mjs']?>㎡</div></td>
              </tr>
              <tr>
                <td>案例名称</td>
                <td style="width:285px"><div><?php echo $arrayuv['title']?></div></td>
                <td>&nbsp;设 计 师</td>
                <td style="width:150px"><div><?php echo $ujming?></div></td>
                <td>案例造价</td>
                <td style="width:150px"><div><?php echo $arrayuv['hprice']?>元</div></td>
              </tr>
           
            </table>
 <div class="pd5"></div>
            <div class="case-good-linian"> 设计理念：<?php echo $arrayuv['jtitle']?></div>
            <div class="case-good-linian"> 设计备注：<?php echo $arrayuv['content']?></div>
          </div>
        </div>
    <link rel="stylesheet" type="text/css" href="images/jquery.alertable.css">
        <div class="case-inner-right">
          <div class="case-inner-left-title">本案例设计师简介</div>
          <div class="case-inner-left-2"> <img src="../<?php echo $uimgs?>"/>
            <h4>姓名:<?php echo $uming?></h4>
            <p>级别: <?php echo $ujming?> </p>
            <p>擅长风格：<?php echo $usfeng?></p>
            <div class="case-inner-2-btn-box"> <a class="anli" href="/design/show.php?uid=<?php echo $arrayuv['uid']?>">更多案例</a> <a class="sheji reservationDesign" href="/design/yuesjs.php?id=<?php echo $arrayuv['uid']?>">预约设计</a> </div>
          </div>
          <div class="case-inner-left-3"> 
        <?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=1",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>" class="case-inner-left-3-add"  alt="<?php echo $arrayw['title']?>"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>     
          
         
    
              <div class="case-inner-form-modal">
                <label>您的称呼</label>
               <input type="text" id="Name" placeholder="先生/女士">
              </div>
              <div class="case-inner-form-modal">
                <label>小区名称</label>
                <input type="text" id="Community" placeholder="请输入小区名称">
              </div>
              <div class="case-inner-form-modal">
                <label>房屋面积</label>
                <input type="text" id="Square" placeholder="请输入房屋面积">
              
              </div>
              <div class="case-inner-form-modal">
                <label>您的电话</label>
             <input type="text" id="Mobile" placeholder="请输入手机号码" onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11" >
              </div>
       
           
        <a href="javascript:void(0)" class="confirmation"  onclick="yuesjs()">预约设计</a>
          </div>
        </div>
        <div class="clears"></div>
      </div>
      <div class="comment-box">
        <div class="guess-favorite-box"> 
        
<div class="guess-favorite-header">
        <div class="comment-header-left"><div>相关案例</div></div>
        <div class="comment-header-right guess-favorite-header-right"  ><a href="./">更多案例</a></div>
        <div style="clear: both"></div>
    </div>
    <div class="guess-favorite-content">
<?php
$rsw=mysql_query("select id,img,title,mjs  from tb_ushe where tjs=1 and sh=1 order by id desc limit 4",$conn);
while($arrayw=mysql_fetch_array($rsw)):
?>   
	    	 <div class="guess-favorite-modal">
	            <a href="/case/show.php?id=<?php echo $arrayw['id']?>">
				   <img src="<?php echo $arrayw['img']?>">
				   </a>
	            <div style="text-align: center;background: #f0f0f0;padding:5px;font-size:12px; "><?php echo $arrayw['title']?> <?php echo $arrayw['mjs']?>㎡</div>
	        </div>
<?php 
 endwhile;
 mysql_free_result($rsw); 
 ?>          
                  
	        </div>
    	
    </div>
        
        
        </div>
      </div>
    </div>
    <!--弹窗免费报价--> 
    
  </div>
  <script src="images/idangerous.swiper.min.js"></script> 
  <script>
		$(function(){
	          var gallery_top = new Swiper ('.gallery-top', {
	            // Optional parameters
	            loop:false,
	            slidesPerView: '1',
	            effect : 'fade',
	            simulateTouch:false,
                	onFirstInit:function(swiper){
                    $('.case-good').on('click',function(){    
                        var that = $(this);
                        var id = that.data('id');
                        addPraise(id,that);
                        
                        /* if(that.children('.case-good-plus').hasClass('animate-slide-out'))
                        {
                            alert('已结点赞');   
                        }else{
                            that.children('.case-good-plus').addClass('animate-slide-out');
                        } */
                        
                    })
                }
	        })
	        var gallery_bottom = new Swiper ('.gallery-bottom', {
	            // Optional parameters
	            loop:false,
	            slidesPerView: '6',
	            touchRatio: 0.2,
	            simulateTouch:false,
                slideActiveClass:'gallery-bottom-active',
	            slideToClickedSlide: true,
                centeredSlides: true,
	            onSlideClick:function(swiper){
	            	gallery_bottom.swipeTo(gallery_bottom.clickedSlideIndex, 1000, true);
	            	gallery_top.swipeTo(gallery_bottom.clickedSlideIndex, 1000, false);
	            },
	            onSwiperCreated:function(swiper){

                },
				onFirstInit:function(){
					$('.swiper-thumb').css('opacity','1');

				},
				onSetWrapperTransform:function(swiper){
					console.log(swiper);
				}

	        });


	        
	        $('.gallery-top-next').click(function(){
	            gallery_top.swipeNext();
	            gallery_bottom.swipeNext();
	        });
	        $('.gallery-top-prev').click(function(){
	            gallery_top.swipePrev();
	            gallery_bottom.swipePrev();
                
	        });
            $('.gallery-bottom-prev').click(function(){
                gallery_top.swipePrev()
                gallery_bottom.swipePrev()
            })
	        $('.gallery-bottom-next').click(function(){
	            gallery_top.swipeNext();
	            gallery_bottom.swipeNext();   
	        });
            $($('.guess-favorite-modal')[3]).css('margin-right','0px');
            
        });
    </script> 
    
<script src="images/jquery.alertable.js"></script>
 
</div>
<?php
include("../nei_foot.php");
?>
<script type="text/javascript">
   
    function yuesjs() {
        var mobile = $("#Mobile").val();
        var name = $("#Name").val();
        var oid = <?php echo $arrayuv['uid']?>;
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
                    data: { "type": "yuesjs", "OName": name, "OMobile": mobile, "OID": oid,"Community":community,"Square":square},
					
					success: function () { 
					$.alertable.alert('恭喜您，设计师预约成功！！');					        
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