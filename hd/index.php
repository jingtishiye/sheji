<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=8;
$bid=intval(trim($_GET['bid']));
 if ($bid==0) {
	 $bid=1;
 }

 if ($bid>0) {
 $rs5=mysql_query("select btitle,bid from tb_huo_b where bid=$bid",$conn);
 $array5=mysql_fetch_array($rs5);
  $bid=$array5['bid'];
  $btitle=$array5['btitle'];
 mysql_free_result($rs5);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>最新活动_<?php echo $btitle?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/css.css" type="text/css" rel="stylesheet" />
 
</head>
 
<body>
<?php
include("../nei_top.php");
?>
<div class="clear"></div>

<div class="m_bread m_clearfix">
	<p>
		<span>您的位置：</span>
		<a class="m_bread_icon" href="/">首页</a>
		<span><img src="images/m_bread_gt.jpg" alt="" /></span>
		<span><a href="./"><?php echo $btitle?></a></span>
	</p>
</div>

 <link rel="stylesheet" type="text/css" href="/design/images/jquery.alertable.css">

<div class="clearfix g_content">
	

        	
	<div class="g_content_left">
	<!--左侧内容开始--> 
		<div class="g_content_left_tab">
  <?php
 $rs6=mysql_query("select  bid,btitle  from tb_huo_b order by px_id asc  ",$conn);
 while($array6=mysql_fetch_array($rs6)):
 ?>
 <a <?php if ($bid==$array6['bid']){?>class="on"<?php }?> href="index.php?bid=<?php echo $array6['bid']?>" ><?php echo $array6['btitle']?></a>
 <?php 
  endwhile;
  mysql_free_result($rs6); 
 ?>
 
		</div>
        
 <?php
 $rs5=mysql_query("select *  from tb_huo where bid=$bid order by id desc  ",$conn);
 $j=1;
 while($array5=mysql_fetch_array($rs5)):
 
$cnum_book=$array5['bms']+mysql_num_rows(mysql_query("select id from tb_hbao where  bid=$array5[id]",$conn));
 ?>  
		<div class="list clearfix" >
			<a href="show.php?id=<?php echo $array5['id']?>" target="_blank"><img src="<?php echo $array5['img']?>" style="width: 438px;height: 240px;" class="list_img"/></a>
						 <b class="tag2"><?php echo $array5['hbiao']?></b>			
                         <a href="show.php?id=<?php echo $array5['id']?>" target="_blank"><h1 class="g_hot_bg"><?php echo $array5['title']?></h1></a>
						<div class="list_right">
				<p class="p1"><i>活动福利：</i><strong><?php echo $array5['hfuli']?></strong></p>
				<p class="p2"><i>活动时间：</i><em><?php echo $array5['htime']?></em></p>
				<p class="p3"><i>活动简介：</i><span><?php echo $array5['hjian']?></span></p>
				<div class="btn">
					<a href="show.php?id=<?php echo $array5['id']?>" target="_blank">详细了解</a>
					 <span><b><?php  echo $cnum_book;?></b>人已报名</span>
				</div>
                </div>
		</div>
 <?php 
  $j++;
	endwhile;
	mysql_free_result($rs5);
	?>		         	
        
        </div>
	<!--左侧内容结束-->
 
	<!--右侧内容开始-->
	<div class="g_content_right">

 <div class="signForm_box">
				<div class="signForm_imgBox">
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=1",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>"></a>                 
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
<script src="/design/images/jquery.alertable.js"></script>
<script type="text/javascript">
	$(function() {
	  $('.alert-demo').on('click', function() {
		$.alertable.alert('Howdy!');
	  });
	});
</script>   
        

<DIV id=con2>
  <div id=tags2>
  <UL >  
  <LI  class="selectTag2"  ><A onmouseover="selectTag2('tagContent20',this)" href="/gong/" >推荐工长</A></LI>  <LI ><A onmouseover="selectTag2('tagContent21',this)" href="/design/" >推荐设计师</A></LI>   
  </UL>
 </div>   
 <DIV id=tagContent2> 
  <DIV class="tagContent2  selectTag2" id="tagContent20">

<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>

    <?php
$rsx=mysql_query("select  id,img,relname,xjid,glid   from tb_user where sh=1  and yzid=1 and bid=0 order by  kbid desc,xjid desc limit 5",$conn);
while($arrayx=mysql_fetch_array($rsx)):
			?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="show.php?uid=<?php echo $arrayx['id']?>"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="show.php?uid=<?php echo $arrayx['id']?>">
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
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:8px;">工长工龄：<?php echo $arrayx['glid']?>年</div>
 <div class="font14 pd2 huis">签单数量：<?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$arrayx[id]",$conn));?>单</div>
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
  </DIV>   
    <DIV class="tagContent2" id="tagContent21"> 
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>
  <?php
$rsx=mysql_query("select  id,img,relname,jibie,glid   from tb_user where  tjs=1 and bid=1  and sh=1 order by kbid desc, id desc limit 5",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/design/show.php?uid=<?php echo $arrayx['id']?>"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
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
</DIV>     
    </DIV>     
  <SCRIPT type=text/javascript>
function selectTag2(showContent2,selfObj2){
	// 操作标签
	var tag2 = document.getElementById("tags2").getElementsByTagName("li");
	var taglength2 = tag2.length;
	for(g=0; g<taglength2; g++){

		tag2[g].className = "";
	}
	selfObj2.parentNode.className = "selectTag2";
	// 操作内容
	for(g=0; h=document.getElementById("tagContent2"+g); g++){
		h.style.display = "none";
	}
	document.getElementById(showContent2).style.display = "block";
}
</SCRIPT>
     
    
  </div>
 
</td>
</tr>
</table>

	
	</div>
</div>
 
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="50"  ></td></tr>
</table>  
<?php
include("../nei_foot.php");
?>
<script type="text/javascript">
   
    function yuesjs() {
        var mobile = $("#Mobile").val();
        var name = $("#Name").val(); 
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
 mysql_close($conn);
?>