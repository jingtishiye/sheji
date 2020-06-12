<?php
include("php/conn.php");
include("sub.php"); error_reporting(0);
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
<title>我要装修_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
 
 
</head>
<body onselectstart="return false">
<?php
include("web_top.php");
?>
 <link rel="stylesheet" type="text/css" href="images/jquery.alertable.css"> 
    
    <?php
    $cnum_dbuy=mysql_num_rows(mysql_query("select id from tb_uyue ",$conn)); 
	?>
    <div class="top-sct top-sct-mfsj bottom-half-pixel">
      <header class="sct-hd sct-hd-mfsj bottom-half-pixel">
        <h1>预约七工长施工队<span class="sct-hd-mfsj-info">今日已有<em><?php echo $cnum_dbuy?></em>人在找装修</span></h1>
      </header>
      <div class="sct-bd">
        <div class="lastest-zbs-wrap bottom-half-pixel">
          <ul class="lastest-zbs" style="-webkit-transform: translate(0, 0);">
 <?php
$rst=mysql_query("select bname,tel from tb_uyue   order by id desc limit 6",$conn);
while($arrayt=mysql_fetch_array($rst)):
?>
            <li class="text-over-hidden"> <a>【最新】<?php echo $arrayt["bname"]?> <?php echo substr($arrayt['tel'],0,3)?>****<?php echo substr($arrayt['tel'],7,4)?>  申请了装修服务</a> </li>
<?php
endwhile;
mysql_free_result($rst); 
?>
          
          </ul>
          <i class="icon-notice"></i> </div>
        <form class="mfsj-from" action="member_chuli.php?action=add" method="post">
           <input class="row mfsj-name"  id="Name2" type="text" placeholder="您的称呼">
          <input class="row  mfsj-tel"  id="Mobile2" type="text" placeholder="手机号码"  onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11" >
       
            <input class="row  mfsj-area" id="xiaoqu" type="text" placeholder="所在小区">
       
          
          <input type="button" value="预约免费量房" name="subt"  onclick="yuegz()" class="row mfsj-submit">
          
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
     
<?php
include("web_foot.php");
?>
</body>
</html>
<?php
 mysql_close($conn);
?>