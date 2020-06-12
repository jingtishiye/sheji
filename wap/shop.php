<?php
include("php/conn.php");
include("sub.php"); 
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>368套餐_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<meta content="telephone=no" name="format-detection">
<meta name="applicable-device" content="mobile">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="stylesheet" href="02/css/yz-common.3d93cf6d.css">
<link rel="stylesheet" href="02/css/index-test.c99b82a6.css">
<link type="text/css" rel="stylesheet" href="02/css/lazy-1.e76cf153.css">

 
<link rel="stylesheet" type="text/css" href="images/top.css">
 
 
</head>
<script type="text/javascript" src="images/jquery.min.js"></script>
<script src="index_files/common.js"></script>
<script type="text/javascript" src="images/swiper.min.js"></script>
<body>
<?php
include("web_top.php");
?>
 
<!-- main start -->
<div class="combo588-wrap">
  <section class="combo588-top">
    <div class="top-banner">
      <div class="bg lazy" style="background-image: url(02/img/banner.jpg);"></div>
    </div>
    <a name="top"></a>
    <div class="order-from" id="J_OrderFrom">
      <form>
        <div class="input-box-tel">
          <input class="dd-1" type="text" id="OName" placeholder="您的姓名">
          <input class="dc-1" type="text"  id="Tel" onKeyUp="value=value.replace(/[^\d]/g,'')" value="<?php echo $telnas?>"  placeholder="您的手机号码" maxlength="11">
        </div>
        <div class="input-box-code">
          <input class="dd-3" type="text" id="Community" value="<?php echo $xiaoqu?>" placeholder="您的小区 如：保利心语" maxlength="10">
        </div>
        <div class="input-box-code">
          <input class="dd-3" type="text" readonly="readonly" onclick="displayCalendar(this, &#39;yyyy年mm月&#39;, this);" id="ODate" placeholder="装修时间 如：<?php echo date("Y年m月")?>" maxlength="15" >
        </div>
        <div class="input-box-code">
          <input class="dd-3" type="text" id="Squera" placeholder="您的面积 如：96㎡" maxlength="10">
        </div>
        <input type="button" onclick="addOrder()" value="立即预约"  class="btn-order dd-4" onmousemove="this.style.backgroundPosition=&#39;0 -40&#39;" onmouseout="this.style.backgroundPosition=&#39;0 0&#39;">
        
         
      </form>
      <link type="text/css" rel="stylesheet" href="images/calendar.css">
    <script src="images/calendar.js" type="text/javascript"></script>
    </div>
    <div class="icon-stage-down"></div>
  </section>
  <section class="combo588-flow">
    <div class="bg lazy" style="background-image: url(02/img/combo588-flow.jpg);"></div>
  </section>
 
  <section class="combo588-project">
 
    <div class="combo588-project-body">
      <div id="J_ProjectTab" class="combo588-project-tab">
        <div class="combo588-project-nav-wrap">
    
    <div class="tab-nav">   
    
<DIV id=con1>
  <UL id=tags1>
      <?php
 $rs6=mysql_query("select   title from tb_xdan  order by px_id asc ",$conn);
 $kp=0;
 $k=1;
  while($array6=mysql_fetch_array($rs6)):
	 ?>  
   <li <?php if ($kp==0) {?>class=selectTag1<?php } ?>><A onMouseOver="selectTag1('tagContent1<?php echo $kp?>',this)" href="javascript:void(0)" class="wen<?php echo $k?>" ><?php echo $array6['title']?></A></li>
     <?php 
  $k++;
  $kp++;
  endwhile;
	 mysql_free_result($rs6); 
	 ?>
 
  </UL>  
  </div>
    
      
    </div>
    
    </div>
        <div class="tab-body">
        
        <DIV id=tagContent1> 
            <?php
 $rs6=mysql_query("select  content from tb_xdan  order by px_id asc ",$conn);
 $kp=0;
  while($array6=mysql_fetch_array($rs6)):
	 ?>  
     <div class="tagContent1 <?php if($kp==0){?>selectTag1<?php }?>" id=tagContent1<?php echo $kp?>>
     <?php echo $array6['content']?>
     </div>
      <?php 
  $kp++;
  endwhile;
	 mysql_free_result($rs6); 
	 ?>
                
            </div>
        
          
        </div>
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
      </div>
    </div>
  </section>
  <section class="combo588-craft">
    <div class="combo588-craft-header">
      <h1>品质工艺</h1>
    </div>
    <div class="hd-intro">
      <p>30年施工工艺总结，施工标准化，严格的质检环节，</p>
      <p>用心的态度和专业的技术为您提供满意服务</p>
    </div>
    <div id="J_Craft" class="combo588-craft-slider">
<div class="tab-header">
<DIV id=con3>
  <UL id=tags3 class="tab-nav">
      <?php
 $rs6=mysql_query("select   btitle from stuan_b  order by px_id asc ",$conn);
 $kp=0;
  while($array6=mysql_fetch_array($rs6)):
	 ?>  
   <li <?php if ($kp==0) {?>class=selectTag3<?php } ?>><A  onclick="selectTag3('tagContent3<?php echo $kp?>',this)" href="javascript:void(0)" ><?php echo $array6['btitle']?></A></li>
     <?php 
  $kp++;
  endwhile;
	 mysql_free_result($rs6); 
	 ?>
 
  </UL>  
  </div>
  
      </div>
<div class="tab-body">
<DIV id=tagContent3> 
 <?php
 $rs6=mysql_query("select   bid from stuan_b  order by px_id asc ",$conn);
 $kp=0;
  while($array6=mysql_fetch_array($rs6)):
 ?>  
 <div class="tagContent3 <?php if($kp==0){?>selectTag3<?php }?>" id=tagContent3<?php echo $kp?>>
 
        <div class="tab-item active">
          <ul class="pics">
<?php
 $rsdd=mysql_query("select title,img,beis from stuan where  bid=$array6[bid]  order by  px_id desc",$conn);
 while($arraydd=mysql_fetch_array($rsdd)):
?>    
            <li> <img class="lazy" alt="<?php echo $arraydd['title']?>" src="http://www.taoduizhang.com/<?php echo $arraydd['img']?>">
              <p class="title"><?php echo $arraydd['beis']?></p>
            </li>
  <?php
	 endwhile;
	 mysql_free_result($rsdd); 
	 ?>  
            
           
          </ul>
        </div>
         
</div>
  <?php 
  $kp++;
  endwhile;
  mysql_free_result($rs6); 
 ?>       
   </div>
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
         
        
      </div>
    </div>
  </section>
  <section class="combo588-quality">
    <div class="combo588-quality-header">
      <h1>材质亮点</h1>
    </div>
    <div id="J_QualitySlider" class="combo588-quality-slide" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    
  
      
      <div class="combo588-quality-slide-box">
      
       
        
<div class="index_cp pdiv" align="center">
  <div class="rollBox">
  <div class="LeftBotton" onMouseDown="ISL_GoUp()" onMouseUp="ISL_StopUp()" onMouseOut="ISL_StopUp()"></div>
	<div class="Cont" id="ISL_Cont">
		<div class="ScrCont">
			<div id="List1">
  
         
<?php
	$rst=mysql_query("select img,title,teds,beis from tb_xcai  order by px_id asc,id asc ",$conn);
	while($arrayt=mysql_fetch_array($rst)):

	?>
        
           <div class="pic"> <img class="lazy" alt="" src="http://www.taoduizhang.com/<?php echo $arrayt["img"]?>">
            <div class="pic-intro">
              <h4 style="font-size:18px;"><?php echo $arrayt["title"]?></h4>
              <p class="meta" style="color:#666666;"><?php echo $arrayt["teds"]?></p>
              <p class="detail"><?php echo $arrayt["beis"]?></p>
            </div>
          </div>
         
   <?php
	 endwhile;
	 mysql_free_result($rst); 
	?> 
     
    </div>
			<div id="List2"></div>
		</div>
	</div>
<div class="RightBotton" onMouseDown="ISL_GoDown()" onMouseUp="ISL_StopDown()" onMouseOut="ISL_StopDown()"></div>
<script language="JavaScript" type="text/javascript" src="02/img/pic3.js"></script>
</div>
  </div>
     
         
       
      </div>
    </div>
  </section>
  <section class="combo588-brand">
    <div class="bg lazy" style="background-image: url(02/img/igs.png);"></div>
  </section>
  <section class="combo588-service">
    <div class="bg lazy" style="background-image: url(02/img/combo588-service.3ff61be7.png);"></div>
  </section>
 
  <section class="combo588-note">
    <h1>备注</h1>
    <ol>
      <li>1、本工程套餐单在项目及其相关材料，设备不变情况下，甲乙双方视作闭口价；</li>
      <li>2、本工程套餐不含中央空调专线布设、不含地暖专线专管以及布管后地面找平布设；</li>
      <li>3、本工程套餐的计算面积为购房凭证上所书建筑面积为据(赠送面积除外)，无产权面积证明的按75%得房率推算核价所需建筑面积；</li>
      <li>4、120平方以下户型标配1个卫生间，120平方以上的户型标配2个卫生间，标准外每增加一个卫生间需加收4600元成本费用；</li>
      <li>5、368套餐不适用于：复式、别墅、商业空间；</li>
      <li>6、以上施工项目属于基础半包，如有特殊设计及复杂造型，需办理增项手续、确定造价后方可实施；</li>
      <li>7、368套餐所有施工项目均在以上列表之中，以上列表之外所有施工项均为设计项或主材项，另行核算；</li>
      <li>8、所有装修申报，出小区垃圾清运费，施工人员进场与物业发生的费用（出入证/押金/保险等）均不在预算内，如有发生由业主自负。</li>
      <li>注：以上368元/平方的基础装修套餐价不含（拆墙、新砌墙、吊顶、背景、造型、柜体、楼板、楼梯等各个区域内设计项 + 地板、地砖、门、窗、门套、窗套、橱柜、洁具、集成吊顶，三角阀，软管等主材）</li>
    </ol>
    <div id="J_ToTop" class="icon-to-top dd-10"></div>
  </section>
  <aside class="combo588-bottom-order">
    <div class="combo588-package-footer"> <strong>368品质套餐</strong> <a id="J-ToTop" class="btn dd-5" href="#top">立即预约</a> </div>
  </aside>
</div>
 

<div style="display:none;">
 <?php
    $cnum_dbuy=mysql_num_rows(mysql_query("select id from tb_uyue ",$conn))+300; 
	?>
    <div class="top-sct top-sct-mfsj bottom-half-pixel">
      <header class="sct-hd sct-hd-mfsj bottom-half-pixel">
        <h1>帮你找装修<span class="sct-hd-mfsj-info">今日已有<em><?php echo $cnum_dbuy?></em>人在找装修</span></h1>
      </header>
      <div class="sct-bd">
        <div class="lastest-zbs-wrap bottom-half-pixel">
          <ul class="lastest-zbs" style="-webkit-transform: translate(0, 0);">
 <?php
$rst=mysql_query("select bname,qname,data from tb_uyue   order by id desc limit 6",$conn);
while($arrayt=mysql_fetch_array($rst)):
?>
            <li class="text-over-hidden"> <a>【最新】<?php echo $arrayt["bname"]?>申请了装修服务</a> </li>
<?php
endwhile;
mysql_free_result($rst); 
?>
          
          </ul>
          <i class="icon-notice"></i> </div>
        <form class="mfsj-from" action="member_chuli.php?action=add" method="post">
          <div class="row">
      <input class="mfsj-name" name="uname" type="text" placeholder="您的称呼">
      </div>
      <div class="row">
      <input class="mfsj-tel" name="phone" type="text" placeholder="手机号码">
     </div>
 
          
          
          <input type="submit" value="预约免费量房" name="subt" class="row mfsj-submit">
          
          <div class="mfsj-info"><i class="icon-info"></i>
            <div>我们承诺：淘工长提供该项<em>免费服务，绝不产生任何费用</em>，为了您的利益以及我们的口碑，您的隐私将被严格保密。</div>
          </div>
        </form>
         
    </div> 
    </div> 
    </div>
</body>
</html>
<script type="text/javascript">
        function addOrder() {
            var oname = $("#OName").val();
            var omobile = $("#Tel").val();
            var community = $("#Community").val();
            var otype = "368套餐";
            var squera = $("#Squera").val();
            var odate = $("#ODate").val();

            if (oname.length == 0) {
                alert("您的称呼不能为空！");
                $("#OName").focus();
				 
            }
            else if (omobile.length == 0) {
                alert("您的手机不能为空！");
                $("#Tel").focus();
				 
            }
            else if (community.length == 0) {
                alert("您的小区名不能为空！");
                $("#Community").focus();
				 
            }
            else if (odate.length == 0) {
                alert("您的装修时间不能为空！");
                $("#ODate").focus();
				 
            }
            else if (squera.length == 0) {
                alert("您的面积不能为空！");
                $("#Squera").focus();
			} else {
                $.ajax({
                    async: false,
                    url: "member_chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "yuegz", "OName": oname, "OMobile": omobile, "Community": community, "OType": otype, "Squera": squera, "ODate": odate },
                    success: function () { 
					alert("预约成功");
					$("#OName").val(""); $("#Tel").val(""); $("#Community").val(""); $("#Squera").val(""); odate = $("#ODate").val("");
					}
					 
                });
            }

        }
         
    </script>