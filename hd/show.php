<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=8;

$id=intval(trim($_GET['id']));
 

if($id==0){
echo "<script type='text/javascript'>location.href='index.php';</script>";
exit;
}

if(is_numeric($id)){
}else{
echo "<script type='text/javascript'>location.href='index.php';</script>";
exit;
}

$rsur=mysql_query("select * from tb_huo where  id=$id ",$conn);
$numur=mysql_num_rows($rsur);
$arrayur=mysql_fetch_array($rsur); 

if ($numur==0){
	echo "<script>alert('活动信息不存在！');history.go(-1);</script>";
	exit; 
}

$bid=$arrayur['bid'];

 if ($bid>0) {
 $rs5=mysql_query("select btitle,bid from tb_huo_b where bid=$bid",$conn);
 $array5=mysql_fetch_array($rs5);
  $uid=$array5['bid'];
  $btitle=$array5['btitle'];
 mysql_free_result($rs5);
 }
 
mysql_query("update tb_huo set hits=hits+1 where id=$arrayur[id] ",$conn); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $arrayur['title']?>_<?php echo $btitle?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/cnei.css" type="text/css" rel="stylesheet" />
 
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
		<span><a href="index.php?bid=<?php echo $bid?>"><?php echo $btitle?></a></span>
        <span><img src="images/m_bread_gt.jpg" alt="" /></span>
		<span>活动详情</span>
	</p>
</div>

 <link rel="stylesheet" type="text/css" href="/design/images/jquery.alertable.css">

<div class="clearfix g_content">
	

        	
	<div class="g_content_left">
 
        
 <?php
 
$cnum_book=$arrayur['bms']+mysql_num_rows(mysql_query("select id from tb_hbao where  bid=$arrayur[id]",$conn));
 ?>  
		<div class="list clearfix" >
		 <img src="<?php echo $arrayur['img']?>" style="width: 438px;height: 240px;" class="list_img"/> 
						 <b class="tag2"><?php echo $arrayur['hbiao']?></b>			
                         <h1 class="g_hot_bg"><?php echo $arrayur['title']?></h1>
						<div class="list_right">
				<p class="p1"><i>活动福利：</i><strong><?php echo $arrayur['hfuli']?></strong></p>
				<p class="p2"><i>活动时间：</i><em><?php echo $arrayur['htime']?></em></p>
				<p class="p3"><i>活动简介：</i><span><?php echo $arrayur['hjian']?></span></p>
				<div class="btn">
					 
					 <span><b><?php  echo $cnum_book;?></b>人已报名</span>
				</div>
                </div>
		</div>
 	         	
        
        </div>
	<!--左侧内容结束-->
 
	<!--右侧内容开始-->
	<div class="g_content_right">

 <div class="signForm_box">
 
 <img src="images/ubao.png" >                  
     
	 <input type="hidden" id="bmid" value="<?php echo $arrayur["id"]?>" >
					 
					<div class="signForm">
						<div><label>您的称呼</label><input type="text" id="Name" placeholder="先生/女士"></div>
                        <div><label>您的电话</label><input type="text" id="Mobile" placeholder="请输入手机号码" onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11" ></div>
						<div><label>小区名称</label><input type="text" id="Community" placeholder="请输入小区名称"></div>
						<div><label>报名人数</label><input type="text" id="bren" placeholder="2人"></div>
						
				   <?php if ($arrayur["bid"]==1){?>
						<a href="javascript:void(0)" class="confirmation"  onclick="baoms()">提交信息</a>
                   <?php }else{?>
                        <a href="javascript:void(0)" class="confirmation"  >活动已结束</a>
                   <?php }?>
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
        
 
 
	
	</div>
</div>
 
<div class="clear"></div>
<div class="a11">
<div class="a12">
<SCRIPT language=JavaScript> 
var tID5=0; 
function ShowTabs5(ID5){ 
if(ID5!=tID5){ 
TabTitle5[tID5].className='menu_title55'; 
TabTitle5[ID5].className='menu_title_on55'; 
Tabs5[tID5].style.display='none'; 
Tabs5[ID5].style.display=''; 
tID5=ID5; 
} 
} 

</SCRIPT>

  <table width="1200" align="center" cellpadding="0" cellspacing="0"   border="0" style="background:url(images/bghs.jpg) repeat-x;">
            <tr>
 
<td  valign="top" class='menu_title_on55' id='TabTitle5'  onClick='ShowTabs5(0)'  > 活动介绍</td>
<td  valign="top" class='menu_title55' id='TabTitle5'  onClick='ShowTabs5(1)'  > 活动流程</td> 
<td  valign="top" class='menu_title55' id='TabTitle5'  onClick='ShowTabs5(2)'  > 活动回顾</td> 
            </tr>
          </table>
    <table width="1200" align="center" cellpadding="0" cellspacing="0" border="0"> 
<tr><td height="15" ></td></tr>
</table>
         <table id="Tabs5" style="display:" >
              <tr>
                <td  align="center" >
<div style="width:1100px; margin:0 auto; text-align:left;line-height:28px;" class="font16">
<?php
		  $tneir5=str_replace("<img","<br/><img onload='javascript:DrawImage1(this);' ",$arrayur["content"]);
          $tneir5=str_replace("<IMG","<br/><img onload='javascript:DrawImage1(this);' ",$tneir5);
		  echo $tneir5;
		  ?>
</div>	
				
  </td>
 </tr>
</table>
<table id="Tabs5" style="display:none" >
              <tr>
                <td  align="center" >
<div style="width:1100px; margin:0 auto;text-align:left;line-height:28px;" class="font16">
<?php
	 $tneir6=str_replace("<img","<br/><img onload='javascript:DrawImage1(this);' ",$arrayur["content1"]);
     $tneir6=str_replace("<IMG","<br/><img onload='javascript:DrawImage1(this);' ",$tneir6);
	 echo $tneir6;
		  ?>
</div>	
				
  </td>
 </tr>
</table>
<table id="Tabs5" style="display:none" >
              <tr>
                <td  align="center" >
<div style="width:1100px; margin:0 auto;text-align:left;line-height:28px;" class="font16">
<?php
	 $tneir7=str_replace("<img","<br/><img onload='javascript:DrawImage1(this);' ",$arrayur["content2"]);
     $tneir7=str_replace("<IMG","<br/><img onload='javascript:DrawImage1(this);' ",$tneir7);
	 echo $tneir7;
		  ?>
</div>	
				
  </td>
 </tr>
</table>
</div>
</div>

<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="50"  ></td></tr>
</table>  
<?php
include("../nei_foot.php");
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
                    url: "/member/chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "baoms", "OName": name, "OMobile": mobile, "OID": bmid,"Community":community,"bren":bren},
					
					success: function () { 
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
 mysql_free_result($rsur); 
 mysql_close($conn);
?>