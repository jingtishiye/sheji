<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=3;
$bid=intval(trim($_GET['bid']));
$qid=intval(trim($_GET['qid']));

$keys=trim($_GET['keys']);

 if ($bid>0) {
 $rs5=mysql_query("select btitle,bid from slei where bid=$bid",$conn);
 $array5=mysql_fetch_array($rs5);
  $uid=$array5['bid'];
  $btitle=$array5['btitle'];
 mysql_free_result($rs5);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $btitle?>设计团队_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/gongdi.css" type="text/css" rel="stylesheet" />
<link href="images/de2.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>
<link rel="stylesheet" type="text/css" href="images/jquery.alertable.css"> 
<script src="images/jquery.alertable.js"></script>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td height="30"  ></td>
  </tr>
</table>
<div class="a11">
  <div class="a12">
    <table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="890" align="left" valign="top"><table width="890"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td width="150"  align="left"><div class="btitle">设计团队</div></td>
              <td width="468"  align="left"><div class="font12"> <span <?php if ($bid==0){?>class="hongs"<?php }?>><a  href="index.php" >全部</a></span> &nbsp;
  <?php
 $rs6=mysql_query("select  bid,btitle  from slei order by px_id asc  ",$conn);
 while($array6=mysql_fetch_array($rs6)):
 ?>
                  <span <?php if ($bid==$array6['bid']){?>class="hongs"<?php }?>><a  href="index.php?bid=<?php echo $array6['bid']?>" ><?php echo $array6['btitle']?></a></span> &nbsp;
 <?php 
  endwhile;
  mysql_free_result($rs6); 
 ?>
                </div></td>
              <td width="272"  align="left"><script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写设计师姓名!!');
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
                    <input type="text" name="keys" class="sou02" value="" placeholder="输入设计师姓名搜索" />
                  </div>
                </form></td>
            </tr>
          </table>
<div class="clear"></div>       
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<!--<div align="left" class="font14 bqian01">

所在地区：

 <a  href="index.php" <?php /*if ($qid==0){*/?>class="hongs"<?php /*}*/?>>全部</a>
 <?php
/* $rs6=mysql_query("select  bid,btitle  from tb_uqu  order by px_id asc  ",$conn);
 while($array6=mysql_fetch_array($rs6)):
 */?>
 <a  href="index.php?qid=<?php /*echo $array6['bid']*/?>" <?php /*if ($qid==$array6['bid']){*/?>class="hongs"<?php /*}*/?>><?php /*echo $array6['btitle']*/?></a>
  <?php /*
  endwhile;
  mysql_free_result($rs6); 
 */?>
 
</div>-->
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>       
  
          <div class="mainBar mod-sjs">
<?php
if ($bid>0){
	$tiao1="and jibie=$bid ";
}
if ($qid>0){
	$tiao3="and qid=$qid ";
}
if($keys<>""){ 
	$tiao2="and relname like '%$keys%'";
}

 $rrs5=mysql_query("select id   from tb_user where sh=1 and bid=1 $tiao1 $tiao2 $tiao3",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=15;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=intval(trim($_GET["page"]));
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rsx=mysql_query("select id,relname,img,sfeng,jibie,slnian,sprice,glid from tb_user where sh=1 and bid=1 $tiao1 $tiao2 $tiao3 order by kbid desc,id desc limit $p,$pagesize ",$conn);
 if($num>0){ 
?>
            <ul class="sjs-list mt20">
<?php
 while($arrayx=mysql_fetch_array($rsx)):
 $tname=str_replace($keys,"<font color=#FF0000>$keys</font>",$arrayx["relname"]);
?> 
              <li>
                <div class="box"> <a href="show.php?uid=<?php echo $arrayx['id']?>" class="pic" target="_blank"> <img src="<?php echo $arrayx['img']?>" width="120" height="120" alt="<?php echo $arrayx['relname']?>"> </a>
                  <div class="info">
                    <p><a href="show.php?uid=<?php echo $arrayx['id']?>" target="_blank" title="<?php echo $arrayx['relname']?>"><?php echo $tname?></a><span> <?php
 if ($arrayx['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayx[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 ?>
 <?php echo $array5["btitle"]?>
  <?php
 mysql_free_result($rs5);
 }
 ?></span></p>
  <div class="pd10"></div>                 
<p class="bg_3"><span>从业时间：</span><?php echo $arrayx['glid']?>年</p>
                         
                        <p class="bg_1"><span>作品数量：</span><?php echo mysql_num_rows(mysql_query("select id from tb_ushe where  uid=$arrayx[id]",$conn));?>套</p>
                        <p class="bg_4"><span>设计收费：</span><?php echo $arrayx['sprice']?>元一平</p>
                        <p class="bg_2"><span>擅长风格：</span><?php echo $arrayx['sfeng']?></p>       
                   
                   
                  </div>
                  <div class="btn">
                    <p class="book">预约数：<span><?php echo mysql_num_rows(mysql_query("select id from tb_uysj where  uyid=$arrayx[id]",$conn));?></span>个</p>
                    <a href="yuesjs.php?id=<?php echo $arrayx['id']?>"  target="_blank" class="form-btn reserve"  >预约设计</a> </div>
                </div>
                <ul class="case">
 <b>设计师简介：</b><div class="font12 pd5 line22 huis"><?php echo $arrayx['slnian']?></div>
                  
                </ul>
              </li>
     <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>  
              
            </ul>
         <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="15"  ></td>
            </tr>
          </table>        
<div class="page">

 <a href="?bid=<?php echo $bid?>&qid=<?php echo $qid?>&keys=<?php echo $keys?>&page=<?php echo ($page-1)?>"  ><span class="song"><b><</b></span></a>
<?php 
 if (($page-5)>1) {
$ys=$page-5;
$yb=$page+5;
}
else{
$ys=1;
$yb=6;
}
if ($yb>$pagemax){
$yb=$pagemax;
}
for($ys;$ys<=$yb;$ys++){ 
?>
 <a href="?bid=<?php echo $bid?>&qid=<?php echo $qid?>&keys=<?php echo $keys?>&page=<?php echo $ys?>" <?php if ($ys==$page) {?>class="now"<?php }?> ><?php echo $ys?></a>
 <?php } ?> 
 <a href="?bid=<?php echo $bid?>&qid=<?php echo $qid?>&keys=<?php echo $keys?>&page=<?php echo ($page+1)?>"  ><span class="song"><b>></b></span></a>
</div>
 <?php }?>    
          
          </div></td>
        <td width="30"></td>
        <td width="280" align="left" valign="top">
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
        
 <DIV id=con2>
  <div id=tags2>
  <UL >  
  <LI  class="selectTag2"  ><A onmouseover="selectTag2('tagContent20',this)" href="/case/" >最新案例</A></LI>  <LI ><A onmouseover="selectTag2('tagContent21',this)" href="/gongdi/" >最新工地</A></LI>   
  </UL>
 </div>   
 <DIV id=tagContent2> 
  <DIV class="tagContent2  selectTag2" id="tagContent20">
          <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="18"  ></td>
            </tr>
          </table>
          <?php
$rsx=mysql_query("select  id,img,title,uid,hprice,hxs  from tb_ushe where sh=1 and tjs=1  order by  id desc limit 15",$conn);
while($arrayx=mysql_fetch_array($rsx)):

 if ($arrayx['uid']>0) {
 $rs5=mysql_query("select relname  from tb_user where bid=1 and id=$arrayx[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uming=$array5['relname'];
 mysql_free_result($rs5);
 }
			?>
          <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
            <tr>
              <td width="120" align="center"><a href="/case/show.php?id=<?php echo $arrayx['id']?>" target="_blank"><img src="<?php echo $arrayx['img']?>"  width="120" height="118"/></a></td>
              <td width="20"></td>
              <td width="130"  align="center"  ><a href="/case/show.php?id=<?php echo $arrayx['id']?>">
                <div class="font16"><b><?php echo $arrayx['title']?></b></div>
                <div class="pd5">
                设计师：<?php echo $uming;?> 
                </div>
                <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:8px;">设计房型：<?php echo $arrayx['hxs']?></div>
                <div class="font14 pd2 huis">案例造价：<?php echo $arrayx['hprice']?></div>
                </a></td>
              <td width="10"></td>
            </tr>
          </table>
          <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="13"  ></td>
            </tr>
          </table>
     <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
      </DIV>   
    <DIV class="tagContent2" id="tagContent21">   
          <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="18"  ></td>
            </tr>
          </table>
<?php
$rsx=mysql_query("select  id,img,xqus,mjs,hprice,uid  from xingxis where sh=1 and tjs=1 order by  id desc limit 15",$conn);
while($arrayx=mysql_fetch_array($rsx)):

 if ($arrayx['uid']>0) {
 $rs5=mysql_query("select relname  from tb_user where bid=0 and id=$arrayx[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uming=$array5['relname'];
 mysql_free_result($rs5);
 }

			?>
          <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
            <tr>
              <td width="120" align="center"><a href="/gongdi/show.php?id=<?php echo $arrayx['id']?>" target="_blank"><img src="<?php echo $arrayx['img']?>"  width="120" height="118"/></a></td>
              <td width="20"></td>
              <td width="130"  align="center"  ><a href="/gongdi/show.php?id=<?php echo $arrayx['id']?>">
                <div class="font16"><b><?php echo $arrayx['xqus']?></b></div>
                <div class="font16 pd2"><?php echo $arrayx['mjs']?>㎡</div>
                <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:3px;">施工工长：<?php echo $uming?></div>
                <div class="font14 pd2 huis">合同金额：<?php echo $arrayx['hprice']?></div>
                </a></td>
              <td width="10"></td>
            </tr>
          </table>
          <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="13"  ></td>
            </tr>
          </table>
          <?php 
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
  
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>  
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=8",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:280px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>  
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>  
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=9",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:280px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?> 
  <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>  
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=10",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:280px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>     
  
     
     </td>
      </tr>
    </table>
    <div class="clear"></div>
  </div>
</div>
<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="35"></td>
  </tr>
</table>
<?php
include("../nei_foot.php");
?>
<script type="text/javascript">
   
    function yuesjs() {
        var mobile = $("#Mobile").val();
        var name = $("#Name").val();
        var oid = 0;
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