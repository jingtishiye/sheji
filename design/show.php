<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=3;
$uid=intval(trim($_GET['uid']));
 
if($uid==0){
echo "<script type='text/javascript'>location.href='index.php';</script>";
exit;
} 


$rsuv=mysql_query("select * from tb_user where sh=1 and bid=1 and  id=$uid ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('设计师不存在！');history.go(-1);</script>";
	exit; 
}
mysql_query("update tb_user set hits=hits+10 where id=$arrayuv[id] ",$conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>设计师<?php echo $arrayuv['relname']?>个人主页</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/desi.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>
 
<div class="clear"></div>
 
<div id="index_overflow">
    <div class="recommend_banner">
    	<div class="recommend_top_info">
			<div class="recommend_top_header">
				<img  src="http://www.sina7gz.com/<?php echo $arrayuv['img']?>" alt="<?php echo $arrayuv['relname']?>——<?php echo $arrayuv['sfeng']?>">
				<p class="name"><?php echo $arrayuv['relname']?></p>
				<p class="level">
<?php
 if ($arrayuv['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayuv[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 echo $array5["btitle"];
 mysql_free_result($rs5);
 }
 ?>
                </p>
				<a class="bespoke_btn reservationDesign"  href="yuesjs.php?id=<?php echo $arrayuv['id']?>">预约TA</a>
			</div>
    	</div>
    </div>
    <!--内容-->
    <link rel="stylesheet" type="text/css" href="images/jquery.alertable.css">
    <div class="col">
    	<div class="mbx rel">
	        <span>当前位置：</span>
	        <a href="/">首页</a><span>&gt;</span>
	        <a href="/design">找设计师</a> &gt;
	        <span class="shs"><a href="/design/show.php?uid=<?php echo $arrayuv['id']?>" ><?php echo $arrayuv['relname']?>设计师主页</a></span>
	    </div>
        <div class="master_left fr">
            <div class="signForm_box">
				<div class="signForm_imgBox">
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=1",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>" width="280"  alt="<?php echo $arrayw['title']?>"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>  
				 
				</div>
	 
					 
					<div class="signForm">
						<div><label>您的称呼</label><input type="text" id="Name" placeholder="先生/女士"></div>
						<div><label>小区名称</label><input type="text" id="Community" placeholder="请输入小区名称"></div>
						<div><label>房屋面积</label><input type="text" id="Square" placeholder="1室1厅1卫 65㎡"></div>
						<div><label>您的电话</label><input type="text" id="Mobile" placeholder="请输入手机号码" onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11" ></div>
				  
						<a href="javascript:void(0)" class="confirmation"  onclick="yuesjs()">预约设计</a>
					</div>
			 
			</div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>
 
<DIV id=con3>
  <div id=tags3>
  <UL >  
  <LI  class="selectTag3"  ><A onmouseover="selectTag3('tagContent30',this)" href="/design/" >推荐设计师</A></LI>  
  <LI ><A onmouseover="selectTag3('tagContent31',this)" href="/gong/" >推荐工长</A></LI>   
  </UL>
 </div>   
 
 <DIV id=tagContent3> 
  <DIV class="tagContent3  selectTag3" id="tagContent30">

 
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<div class="index01">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>
  <?php
$rsx=mysql_query("select  id,img,relname,jibie,glid   from tb_user where  tjs=1 and bid=1  and sh=1 order by kbid desc, id desc limit 7",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/design/show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="/design/show.php?uid=<?php echo $arrayx['id']?>">
 <div class="font16"><b><?php echo $arrayx['relname']?></b></div>
  <div class="pd5">   
<?php
 if ($arrayx['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayx[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
  echo $array5["btitle"];
 mysql_free_result($rs5);
 }
 ?>
 </div>
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:8px;">工作年限：<?php echo $arrayx['glid']?>年</div>
 <div class="font14 pd2 huis">案例套数：<?php echo mysql_num_rows(mysql_query("select id from tb_ushe where uid=$arrayx[id]",$conn));?>套</div>
 </a>
 </td>
  <td width="10"></td> 
 </tr>
 </table>
 
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>

 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     </div>
 </DIV>   
    <DIV class="tagContent3" id="tagContent31">
    
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<div class="index01">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>
  <?php
$rsx=mysql_query("select  id,img,relname,xjid,glid   from tb_user where yzid=1 and bid=0 and sh=1  order by kbid desc, id desc limit 7",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/gong/show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="/gong/show.php?uid=<?php echo $arrayx['id']?>">
 <div class="font16"><b><?php echo $arrayx['relname']?></b></div>
 
 <div class="pd5">   
 <?php if ($arrayx['xjid']==1){?>
 <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==2){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==3){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==4){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==5){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  />
 <?php }?></div>
 
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:8px;">工作年限：<?php echo $arrayx['glid']?>年</div>
 <div class="font14 pd2 huis">工地数量：<?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$arrayx[id]",$conn));?>个</div>
 </a>
 </td>
  <td width="10"></td> 
 </tr>
 </table>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>

 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
  </div>  
         
   </DIV>     
    </DIV>  
     </DIV>    
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
        
<script src="images/jquery.alertable.js"></script>
 
        
        
        <div class="master_right fl ">
            <div class="showdesbox">
                <div class="infobox rel">
                    <div class="img fl">
<img  src="http://www.sina7gz.com/<?php echo $arrayuv['img']?>" alt="<?php echo $arrayuv['relname']?>" width="270" height="270" style="border-radius: 8px;">
					 </div>
                    <div class="info fl">
                        <div class="name"><strong style="color:#333;font-weight:500"><?php echo $arrayuv['relname']?></strong><i style="font-style:normal;margin:0 10px;">人气数</i><i style="font-style:normal"><?php echo $arrayuv['hits']?></i></div>
						<p style="color:#797979;"><b>
<?php
 if ($arrayuv['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayuv[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 echo $array5["btitle"];
 mysql_free_result($rs5);
 }
 ?></b>
						</p>
                        <div class="desc">设计师简介：<?php echo $arrayuv['slnian']?></div>
                        <p class="bg_3"><span>从业时间：</span><?php echo $arrayuv['glid']?>年</p>
                        <p class="bg_4"><span>预约次数：</span><?php echo mysql_num_rows(mysql_query("select id from tb_uysj where  uyid=$arrayuv[id]",$conn));?>次</p>
                        <p class="bg_1"><span>作品数量：</span><?php echo mysql_num_rows(mysql_query("select id from tb_ushe where  uid=$arrayuv[id]",$conn));?>套</p>
                        <p class="bg_3"><span>设计收费：</span><?php echo $arrayuv['sprice']?>元一平</p>
                        <p class="bg_2"><span>擅长风格：</span><?php echo $arrayuv['sfeng']?></p>
                        
                        
                    </div>
                </div>
 
		            <div class="bdsharebuttonbox">
		            	<a href="#" class="bds_more" data-cmd="more"></a>
		            	<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		            	<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		            	<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
		            	<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
		            	<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		            </div>
					<script>
						window._bd_share_config={
								"common":{
				                	"bdUrl" : window.location.href,
									"bdSnsKey":{},
									"bdText":"",
									"bdMini":"2",
									"bdMiniList":false,
		 
									"bdStyle":"0",
									"bdSize":"16"
								},
								"share":{}
						};
						with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
					</script>
                
                
                
                <div class="daitxt">
                    <img src="images/dbzp.jpg" alt="">
                </div>
                <div class="content" id="designerCase">
<?php
$rsw=mysql_query("select id,img,title,jtitle  from tb_ushe where sh=1 and uid=$arrayuv[id] order by id desc",$conn);
$h=1;
while($arrayw=mysql_fetch_array($rsw)):
?>    
<div class="item <?php if($h%3==0){?>rlast<?php }?>">
			<div class="bgbox">
               <p class="img">
			     <a href="/case/show.php?id=<?php echo $arrayw['id']?>"  target="_blank"> 
						<img src="<?php echo $arrayw['img']?>" alt="<?php echo $arrayw['title']?>" width="280" height="280">
					</a>
				</p>
				<p class="txt">
				 <?php echo $arrayw['title']?> 
				</p>
				<p class="desc"><?php echo $arrayw['jtitle']?>
				</p>
				<p class="btnbox onebtnbox">
					<a href="/case/show.php?id=<?php echo $arrayw['id']?>">查看详情</a>
				</p>
			</div>
		</div>
<?php 
 $h++;
 endwhile;
 mysql_free_result($rsw); 
 ?>   
		 
<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="5"></td>
  </tr>
</table>	 
                
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="35"></td>
  </tr>
</table>
</div>


<?php
include("../nei_foot.php");
?>
<script type="text/javascript">
   
    function yuesjs() {
        var mobile = $("#Mobile").val();
        var name = $("#Name").val();
        var oid = <?php echo $arrayuv['id']?>;
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