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
echo "<script type='text/javascript'>location.href='shifu.php';</script>";
exit;
}

if(is_numeric($id)){
}else{
echo "<script type='text/javascript'>location.href='shifu.php';</script>";
exit;
}

$rsuv=mysql_query("select * from tb_user where  bid=1 and  id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('设计师不存在！');history.go(-1);</script>";
	exit; 
}

mysql_query("update tb_user set hits=hits+1 where id=$arrayuv[id] ",$conn);
?>
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
<title>设计师<?php echo $arrayuv['relname']?>_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link rel="stylesheet" href="images/css.css">
</head>
<body onselectstart="return false">
<?php
include("web_top.php");
?>
 
<div class="worker">
  <div class="worker-intr text-align-l">
    <p> <span class="bgcolor bgcolor-black" style="font-size: 19px;">设计师</span><span style="font-size: 19px;" class="bgcolor bgcolor-green"><?php echo $arrayuv['relname']?></span></p>
    <p class="text-align-l fz12" style="margin-top: 10px; font-size: 13px;"> 联系电话：<a href="tel: <?php echo $tels?>"><?php echo $tels?></a></p>
  </div>
  <img width="50%" onerror="this.onerror=null;this.src='/images/noavatar_medium.gif';" src="../<?php echo $arrayuv["img"]?>"  alt="<?php echo $arrayuv['relname']?>"  >
  <div class="info">
    <div class="i-name text-align-c"  > <?php echo $arrayuv['relname']?> </div>
    <div class="i-star text-align-c"><?php
 if ($arrayuv['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayuv[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 echo $array5["btitle"];
 mysql_free_result($rs5);
 }
 ?></div>
    <div class="i-area text-align-c text-gray"> 作品：<?php echo mysql_num_rows(mysql_query("select id from tb_ushe where uid=$arrayuv[id]",$conn));?>套 &nbsp; 从业：<?php echo $arrayuv["glid"]?>年  
    &nbsp;
   预约：<?php echo mysql_num_rows(mysql_query("select id from tb_uysj where uyid=$arrayuv[id]",$conn));?></div>
    <div class="i-area text-align-c text-gray">风格：<?php echo $arrayuv["sfeng"]?></div>
    <div class="i-btn text-align-c"> <a class="Add" href="javascript:ShowBox('1')">预约设计</a>  
</div>
  </div>
  
  
  <ul class="QdList">
    <p> <span class="floatL" style="font-size: 22px; color: #666; margin-left:5px;">我的案例</span></p>
    <div class="star-box">
      <div class="star-cnt show">
 <?php
$rst=mysql_query("select id,img,title from tb_ushe where   uid=$arrayuv[id]  order by id desc  ",$conn);
while($arrayt=mysql_fetch_array($rst)):
?>
      
        <div class="star-list">
          <div class="img"> <a href="case_show.php?id=<?php echo $arrayt["id"]?>"> <img src="../<?php echo $arrayt["img"]?>" width="100" height="80" alt="<?php echo $arrayt["title"]?>" title="<?php echo $arrayt["title"]?>"></a> </div>
          <p> <a href="case_show.php?id=<?php echo $arrayt["id"]?>"> <?php echo $arrayt["title"]?></a></p>
        </div>
 <?php
endwhile;
mysql_free_result($rst); 
?>
        
      </div>
    </div>
  </ul>
  
  <div style="clear: both"> </div>
  
</div>

 
 
<div id="YYBox" class="view-site" style="display: none">
<form   action="member_chuli.php?action=add" method="post" name="fh">
  <div class="fz14"> <strong>预约我为您服务</strong><a class="loginclose" onclick="CloseYY()" style="cursor: pointer;"></a></div>
  <input class="mt10 input input-lg"   type="text" id="OName" maxlength="11" placeholder="您的称呼   如:某某先生/女士" />
  <input class="mt10 input input-lg" type="text"   id="Tel" maxlength="11" placeholder="请输入您的手机号" />
  <input type="button" class="button get-view"  onclick="yuesj2()" value="免费预约" />
  <p class="text-align-c"> <span class="text-gray">电话预约请拨：</span><b class="text-green"><a href="tel:<?php echo $tels?>"><?php echo $tels?></a></b></p>
  <input type="hidden" name="uyid" value="<?php echo $arrayuv["id"]?>" />
  </form>
</div>
<?php
include("mess.php");
include("web_foot.php");
?>
<script type="text/javascript">
   
    function yuesj2() {
        var mobile = $("#Tel").val();
        var name = $("#OName").val();
		var uyid = $("#uyid").val();
 

        var reg1 = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
        if (name.length == 0) {
            $("#OName").focus();
            $.alertable.alert('请输入您的称呼！');
        }  else if (mobile.length == 0) {
            $("#Tel").focus();
			$.alertable.alert('请输入手机号码！');
        } else if (!reg1.test(mobile)) {
            $("#Tel").focus();
			$.alertable.alert('手机号码格式不正确！');
        }
         
         else {
                $.ajax({
                    async: false,
                    url: "member_chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "yuesj", "OName": name, "OMobile": mobile, "OID": uyid},
					
					success: function () { 
					$(".view-site").hide();
					$.alertable.alert('恭喜您，预约成功！！');					        
                            $("#OName").val("");
                            $("#Tel").val("");
                            
					}
                });
        }
    }
</script>


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
        $(".view-site").hide();
    }

</script>
</body>
</html>
 <?php
  mysql_free_result($rsuv); 
  mysql_close($conn);
 ?>