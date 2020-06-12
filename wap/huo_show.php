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
echo "<script type='text/javascript'>location.href='huo.php';</script>";
exit;
} 


$rsuv=mysql_query("select * from tb_huo where   id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('活动信息不存在！');history.go(-1);</script>";
	exit; 
}
mysql_query("update tb_huo set hits=hits+1 where id=$arrayuv[id] ",$conn);
 
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
<title><?php echo $arrayuv['title']?>_最新活动</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link rel="stylesheet" href="images/css.css">
<link rel="stylesheet" href="images/gxia.css">
</head>
<body onselectstart="return false">
<?php
include("web_top.php");

$cnum_book=$arrayuv['bms']+mysql_num_rows(mysql_query("select id from tb_hbao where  bid=$arrayuv[id]",$conn));
?>

 <link rel="stylesheet" type="text/css" href="images/jquery.alertable.css">

<div class="top-sct top-sct-zxzzd">
  <div class="sct-bd sct-bd-pd sct-zxzzd">
    <div class="zxzzd-search-wrap">
      <form action="huo.php" method="get" name="secs">
        <div class="search-ipt">
          <input type="text" name="searchwords" value="请输入活动名称" onFocus="searchFocus()" onBlur="searchBlur()" class="search-box" onKeyDown="toSearch(this)" style="color: rgb(204, 204, 204);">
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
 
 
 	<div class="chief_cost">
	 
			<div class="wrap">
				<span>活动福利：</span>
				<em><?php echo $arrayuv['hfuli']?></em>
				 
			</div>
		 
	</div>
    
 	<div class="chief_cost">
	 
			<div class="wrap">
				<span>活动时间：</span>
				<em><?php echo $arrayuv['htime']?></em>
				 
			</div>
		 
	</div>

 	<div class="chief_cost">
	 
			<div class="wrap">
				<span>报名人数：</span>
				<em><b><?php echo $cnum_book;?></b> 人已报名</em>
				 
			</div>
		 
	</div>
   
	<div class="chief_cost">
	 
			<div class="wrap">
				<span>活动简介：</span>
				<em><?php echo $arrayuv['hjian']?></em>
				 
			</div>
		 
	</div>
    
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>
 <div class="i-btn text-align-c"> 
 <?php if ($arrayuv["bid"]==1){?>
 <a class="Add" href="javascript:ShowBox('1')">活动报名</a>
 <?php }else{?>
    <a href="javascript:void(0)"  class="Add"   >活动结束</a>
  <?php }?> 
</div>
 
    
	<div class="chief_case">
		<div class="intro_case">
			<div class="wrap">
				<h4>活动介绍</h4>
				<p><?php
		  $tneir5=str_replace("<img","<br/><img onload='javascript:DrawImage1(this);' ",$arrayuv["content"]);
          $tneir5=str_replace("<IMG","<br/><img onload='javascript:DrawImage1(this);' ",$tneir5);
		  echo $tneir5;
		  ?></p>
			</div>
 
		</div>
		<div class="item_case">
  <img src="../<?php echo $arrayuv['img']?>" /> 
  
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
	<div class="gray_line"></div>     
<script type="text/javascript">
 
    function ShowBox(parm) {
    
        if (parm == "1") {
            $("#YYBox").show();
        } 
        else if (parm == "2") {
            $("#PJBox").show();
        }
        else if (parm == "3") {
            $("#otype").val("10");
            $("#YYBox").show();
        }

    }

    function CloseYY() {
        $(".view-site01").hide();
    }

</script>

<div id="YYBox" class="view-site01" style="display: none">
<form   action="member_chuli.php?action=add" method="post" name="fh">
  <div class="fz14"> <strong>我要报名活动</strong><a class="loginclose" onclick="CloseYY()" style="cursor: pointer;"></a></div>
  <input class="mt10 input input-lg"   type="text" id="Name" maxlength="11" placeholder="您的称呼   如:某某先生/女士" />
  <input class="mt10 input input-lg" type="text"  id="Mobile" maxlength="11" placeholder="请输入您的手机号" onKeyUp="value=value.replace(/[^\d]/g,'')"  />
  <input class="mt10 input input-lg" type="text"  maxlength="20"  id="Community" placeholder="请输入小区名称"/>
<input class="mt10 input input-lg" type="text"  maxlength="20"   id="bren" placeholder="2人"/>
  
  
  <input type="button" class="button get-view"  onclick="baoms()" value="立即报名" />
  <p class="text-align-c"> <span class="text-gray">电话报名请拨：</span><b class="text-green"><a href="tel:<?php echo $tels?>"><?php echo $tels?></a></b></p>
  <input type="hidden" id="bmid" value="<?php echo $arrayuv["id"]?>" />
  </form>
</div>

<?php
include("web_foot.php");
?>

<script type="text/javascript">
   
    function baoms() {
        var mobile = $("#Mobile").val();
        var name = $("#Name").val(); 
        var community = $("#Community").val();
        var bren = $("#bren").val();
		var bmid = $("#bmid").val();

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
                    url: "member_chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "baoms", "OName": name, "OMobile": mobile, "OID": bmid,"Community":community,"bren":bren},
					
					success: function () { 
					$(".view-site01").hide();
					$.alertable.alert('恭喜您，报名信息提交成功！！');					        
                            $("#Name").val("");
                            $("#Mobile").val("");
                            $("#Community").val("");
                            $("#bren").val("");
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