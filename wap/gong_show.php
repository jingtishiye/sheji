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
echo "<script type='text/javascript'>location.href='gong.php';</script>";
exit;
}

if(is_numeric($id)){
}else{
echo "<script type='text/javascript'>location.href='gong.php';</script>";
exit;
}

$rsuv=mysql_query("select * from tb_user where  bid=0 and  id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('工长不存在！');history.go(-1);</script>";
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
<link rel="stylesheet" type="text/css" href="images/zxask-v2.min.css">
<link rel="stylesheet" type="text/css" href="images/index.css">
<script type="text/javascript" src="images/jquery.min.js"></script>
<script type="text/javascript" src="images/swiper.min.js"></script>
<title>工长<?php echo $arrayuv['relname']?>_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link rel="stylesheet" href="images/css.css">
</head>
<body onselectstart="return false">
<?php
include("web_top.php");
?>
<!-- 装修效果图开始 -->
<div class="top-sct top-sct-xgt">
  <div class="sct-bd sct-bd-xgt sct-bd-pd swipe" style="visibility: visible;">
    <div id="swipXgtBd" class="swipe_wrap swipe-xgt"  > </div>
  </div>
</div>
<div class="worker">
  <div class="worker-intr text-align-l">
    <p> <span class="bgcolor bgcolor-black" style="font-size: 19px;">七工长明星工长</span><span style="font-size: 19px;" class="bgcolor bgcolor-green"><?php echo $arrayuv['relname']?></span></p>
    <p class="text-align-l fz12" style="margin-top: 10px; font-size: 13px;"> 工长联系电话：<a href="tel: <?php echo $tels?>"><?php echo $tels?></a></p>
  </div>
  <img width="50%" onerror="this.onerror=null;this.src='/images/noavatar_medium.gif';" src="../<?php echo $arrayuv["img"]?>"  alt="<?php echo $arrayuv['relname']?>"  >
  
  <div class="info">
    <div class="i-name text-align-c"  > <?php echo $arrayuv['relname']?> </div>
     <?php if ($arrayuv['xjid']==1){?>
 <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayuv['xjid']==2){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayuv['xjid']==3){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayuv['xjid']==4){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayuv['xjid']==5){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  />
 <?php }?>
    <div class="i-star text-align-c"> 口碑值：<?php echo $arrayuv['kbid']?> </div>
     <div class="i-star text-align-c"> 工种：<?php echo $arrayuv['jiguan']?> </div>
    <div class="i-area text-align-c text-gray"> 接单区域：<?php echo $arrayuv['jquyu']?></div>
    <div class="i-btn text-align-c"> <a class="Add" href="javascript:ShowBox('1')">预约量房</a>  
</div>
  </div>
</div>
<div class="container" style="text-align: center">
  <ul class="site-pro">
    <li class="text-align-c" style="width: 100%; font-weight: bold;"><span class="icon-bz icon-bzj"> 售后质保金：</span><span class="text-gray"><?php echo $arrayuv["sprice"]?>元</span></li>
    <li class="text-align-r" style="margin-right: 3%; width: 47%; font-weight: bold"><span class="icon-bz icon-jl">接受第三方监理</span></li>
    <li class="text-align-l" style="margin-left: 3%; width: 47%; font-weight: bold"><span class="icon-bz icon-zb">提供售后质保</span></li>
  </ul>
  <ul class="site-pro" style="border-top: none">
    <table border="1" bordercolor="#a0c6e5" style="border-collapse: collapse;" width="100%">
      <tbody>
        <tr style="font-size: 15px; font-weight: bold">
          <td height="25"> 工地质量 </td>
          <td> 工地数 </td>
          <td> 好评数 </td>
          <td> 预约数 </td>
          <td> 关注数 </td>
        </tr>
        <tr>
          <td height="25"><span style="margin-left: 10px; color: #FF8207"> 良 好</span></td>
          <td><span class="text-green"> <?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$arrayuv[id]",$conn));?></span></td>
          <td><span class="text-green"> <?php echo mysql_num_rows(mysql_query("select id from tb_upl where uyid=$arrayuv[id] ",$conn));?></span></td>
          <td><span class="text-green"> <?php echo mysql_num_rows(mysql_query("select id from tb_uyue where uyid=$arrayuv[id]  ",$conn));?></span></td>
          <td><span class="text-green"> <?php echo $arrayuv["hits"]?></span></td>
        </tr>
      </tbody>
    </table>
  </ul>
  <ul class="QdList">
    <p> <span class="floatL" style="font-size: 22px; color: #666; margin-left: 15px;">我的工地</span></p>
    <div class="star-box">
      <div class="star-cnt show">
 <?php
$rst=mysql_query("select * from xingxis where   uid=$arrayuv[id]  order by id desc  ",$conn);
while($arrayt=mysql_fetch_array($rst)):
?>
      
        <div class="star-list">
          <div class="img"> <a href="gongdi_show.php?id=<?php echo $arrayt["id"]?>"> <img src="<?php echo $arrayt["img"]?>" width="100" height="80" alt="<?php echo $arrayt["title"]?>" title="<?php echo $arrayt["title"]?>"></a> </div>
          <p> <a href="gongdi_show.php?id=<?php echo $arrayt["id"]?>"> <?php echo $arrayt["title"]?></a></p>
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
  <ul class="PjList">
    <p> <span class="floatL" style="font-size: 22px;margin-left: 15px; color: #666">工长的评论</span></p>
    
  </ul>
<div class="zxask-main-list">
      <ul class="zxask-ask-list">
      
<?php

$rs6=mysql_query("select *  from  tb_upl where  uyid=$arrayuv[id] order by id desc ",$conn);
while($array6=mysql_fetch_array($rs6)):
 
 if ($array6['uid']>0) {
 $rs5=mysql_query("select username  from tb_user where id=$array6[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
 $uname=$array5["username"];
 mysql_free_result($rs5);
 }else{
	 $uname="";
 }
  
 ?>
          <li class="zxask-ask-list-item">
              <div class="zxask-ask-list-left">
                  <img class="lazy"  src="<?php echo $array6['uimg']?>"  onerror="this.onerror=null;this.src='images/tavatar.jpg';"  alt="<?php echo $uname?>">
              </div>
              <div class="zxask-ask-list-right">
                  <p class="zxask-ask-user" >业主：<?php echo substr($array6['utel'],0,3)?>****<?php echo substr($array6['utel'],7,4)?>
                 &nbsp; &nbsp;  
          
                  </p><span class="zxask-ask-time"><?php echo date("Y/m/d",strtotime($array6['data']))?></span>
                  <a class="zxask-ask-title" ><?php echo $array6['content']?></a>
                  
              </div>
          </li>
<?php
endwhile;
mysql_free_result($rs6); 
?>                
    </ul>
  </div>
 
<div id="YYBox" class="view-site" style="display: none">
<form   action="member_chuli.php?action=add" method="post" name="fh">
  <div class="fz14"> <strong>预约我为您服务</strong><a class="loginclose" onclick="CloseYY()" style="cursor: pointer;"></a></div>
  <input class="mt10 input input-lg"   type="text" id="OName" maxlength="11" placeholder="您的称呼   如:某某先生/女士" />
  <input class="mt10 input input-lg" type="text"  id="Tel" maxlength="11" placeholder="请输入您的手机号" />
  <input type="button" class="button get-view" onclick="yuegz2()" value="免费预约" />
  <p class="text-align-c"> <span class="text-gray">电话预约请拨：</span><b class="text-green"><a href="tel:<?php echo $tels?>"><?php echo $tels?></a></b></p>
  <input type="hidden" id="uyid" value="<?php echo $arrayuv["id"]?>" />
  </form>
</div>



<?php
include("mess.php");
include("web_foot.php");
?>
<script type="text/javascript">
   
    function yuegz2() {
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
                    data: { "type": "yuegz", "OName": name, "OMobile": mobile, "OID": uyid},
					
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