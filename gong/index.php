<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=2;
$qid=intval(trim($_GET['qid']));
$pxxs=intval(trim($_GET['pxxs']));
$pxks=intval(trim($_GET['pxks']));
$pxqd=intval(trim($_GET['pxqd']));
$ishui=intval(trim($_GET['ishui']));
$bqid=trim($_GET['bqid']);
if ($qid==0){
	$qid=0;
}
$keys=trim($_GET['keys']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>找工长_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/de2.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>
<link rel="stylesheet" type="text/css" href="/design/images/jquery.alertable.css">
  <script src="/design/images/jquery.alertable.js"></script>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>  
<div class="a11">
<div class="a12">
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="707"  align="left"><div class="font14">您现在所在的位置：<a href="/">首页</a> > <a href="./">七工长展示</a>  </div></td>
      <td width="493"  align="left"><script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写工长名称!!');
      document.thisForm.keys.focus();
      return false;
      } 
 
	 return true;
}
</script>
<form action="index.php" name="thisForm" method="get"  onSubmit="return checkform();">
<div class="fr"><input type="submit" name="sub1" class="sou01" value="搜索" /></div>
<div class="fr"><input type="text" name="keys" class="sou02" value="" placeholder="输入工长名，搜索工长" /></div>
</form></td>
    </tr>
  </table>
  <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td height="20"  ></td>
    </tr>
  </table>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="895" align="left" valign="top">
	        				<div style="width:895px;height:370px;">
	        					
                                
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=11",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:895px;height:370px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>           
 </div>
</td>
<td width="25"  >

</td>
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
</td>
</tr>
</table>

 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="200"  align="left"><div class="btitle">七工长展示</div></td>
<td width="507"  align="left">
<div class="font12">
<span <?php if ($qid==0){?>class="hongs"<?php }?>><a  href="index.php" >全部</a></span> &nbsp; 
 <?php
 $rs6=mysql_query("select  bid,btitle  from tb_uqu  order by px_id asc  ",$conn);
 while($array6=mysql_fetch_array($rs6)):
 ?>    
<span <?php if ($qid==$array6['bid']){?>class="hongs"<?php }?>><a  href="index.php?qid=<?php echo $array6['bid']?>" ><?php echo $array6['btitle']?></a></span> &nbsp; 
  <?php 
  endwhile;
  mysql_free_result($rs6); 
 ?>

</div></td>
<td width="493"  align="left">

</td>
</tr>
</table>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>
<div align="left" class="font14 bqian01">热门标签：
<a href="index.php" <?php if ($bqid=="" and $pxxs==0 and $pxks==0 and $pxqd==0 and $ishui==0){?>class="hongs"<?php }?>>全部</a>
<a href="index.php?bqid=设计师" <?php if ($bqid=="设计师"){?>class="hongs"<?php }?>>设计师</a> 
<a href="index.php?bqid=水电工" <?php if ($bqid=="水电工"){?>class="hongs"<?php }?>>水电工</a>
<a href="index.php?bqid=瓦工" <?php if ($bqid=="瓦工"){?>class="hongs"<?php }?>>瓦工</a>
<a href="index.php?bqid=木工" <?php if ($bqid=="木工"){?>class="hongs"<?php }?>>木工</a>
<a href="index.php?bqid=油漆工" <?php if ($bqid=="油漆工"){?>class="hongs"<?php }?>>油漆工</a>

<a href="index.php?pxxs=1" <?php if ($pxxs==1){?>class="hongs"<?php }?>>星级</a>
<a href="index.php?pxks=1" <?php if ($pxks==1){?>class="hongs"<?php }?>>口碑</a>
<a href="index.php?pxqd=1" <?php if ($pxqd==1){?>class="hongs"<?php }?>>签单数</a>
<a href="index.php?ishui=1" <?php if ($ishui==1){?>class="hongs"<?php }?>>会员</a>


</div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<?php
if ($qid>0){
	$tiao1="and qid=$qid ";
}
 
if($bqid<>""){ 
	$tiao3="and jiguan='$bqid'";
}
 
if($keys<>""){ 
	$tiao2="and relname like '%$keys%'";
}

if ($pxxs>0){
	$paix1=" xjid desc,";
}

if ($pxks>0){
	$paix2="  kbid desc, ";
}
if ($pxqd>0){
	
 $rsx=mysql_query("select  id    from tb_user where sh=1 and  bid=0  ",$conn);
 while($arrayx=mysql_fetch_array($rsx)):	
	
	$cnum_dbuy = mysql_num_rows(mysql_query("select id from xingxis where  uid=$arrayx[id]",$conn));
	 mysql_query("update tb_user set qiands=$cnum_dbuy where id=$arrayx[id] ",$conn);
	
 endwhile;
 mysql_free_result($rsx); 	
	
	$paix3="  qiands desc, ";
}

if ($ishui>0){
	$tiao5=" and ishui=1 ";
}

 $rrs5=mysql_query("select id   from tb_user where sh=1 and bid=0 $tiao1 $tiao2 $tiao3 $tiao5",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=16;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=intval(trim($_GET["page"]));
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rsx=mysql_query("select id,relname,img,xjid,sprice,jiguan from tb_user where sh=1 and bid=0 $tiao1 $tiao2 $tiao3 $tiao5 order by $paix1 $paix2 $paix3 kbid desc limit $p,$pagesize ",$conn);
 if($num>0){ 
?>
<div style="border:1px solid #dfdfdf;">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>
<table  width="1200" border="0"   cellpadding="0" cellspacing="0"  align="center">
 <tr> <td  width="300" ></td><td  width="300" ></td><td  width="300" ></td><td  width="300" ></td></tr>
   <tr>
    <?php
$i=0;
 while($arrayx=mysql_fetch_array($rsx)):
 if($i>0 and $i%4==0){
 ?>
   </tr><tr><td colspan="4" height="30"></td></tr><tr>
 <?php }  
$tname=str_replace($keys,"<font color=#FF0000>$keys</font>",$arrayx["relname"]);
 ?>
   <td  width="300" valign="top"  align="center" > 
   <div class="a270">
   <table width="270"   align="center"  cellpadding="0" cellspacing="0" border="0">
   <tr><td width="130" align="center">
   <div class="wx_tips">
   <div class="tips_hd">
 <div class="cyuan"><A href="show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><img src="../<?php echo $arrayx['img']?>"  width="120" height="120"/></a></div>
 </div>
 <div class="tips_bd"><div class="wens"><a href="/gong/yuegz.php?id=<?php echo $arrayx['id']?>"  target="_blank">预约工长</a></div></div>
 
 
 
 </div>
 </td>
 <td width="10"></td>
 <td width="130" align="left" valign="top" >
 <div  class="font18"><A href="show.php?uid=<?php echo $arrayx['id']?>"><?php echo $tname?></A> <img src="/images/renz.png"   title="认证工长" /></div>
 <div  class="font14 huis pd6">星 级：
 <?php if ($arrayx['xjid']==1){?>
 <img src="/images/star.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==2){?>
 <img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==3){?>
 <img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==4){?>
 <img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==5){?>
 <img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  />
 <?php }?>
 </div>
 <div  class="font14 huis pd4">保证金：<?php echo $arrayx['sprice']?>元</div>
 <div  class="font14 huis pd4">签单数：<?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$arrayx[id]",$conn));?>单</div>
 <div  class="font14 huis pd4">工 &nbsp;&nbsp;种：<?php echo $arrayx['jiguan']?></div>
 </td>
 </tr>
 </table>
 
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>  
 <table width="270"   align="center"  cellpadding="0" cellspacing="0" border="0">
   <tr>
   <td width="80"  align="left"><div class="font13">【业主点评】</div></td>
   <td width="190"  align="left"><div class="wxian"></div></td>
   </tr>
   </table>
<?php 
$dps=mysql_num_rows(mysql_query("select id from tb_upl where  sh=1 and bid=1 and uyid=$arrayx[id]",$conn));
if ($dps>0){
 
$rsw=mysql_query("select content from tb_upl where sh=1 and bid=1 and uyid=$arrayx[id] order by  id desc ",$conn);
$arrayw=mysql_fetch_array($rsw);
$dneir=$arrayw['content']; 
mysql_free_result($rsw); 
?>
<div class="otiao"><a href="/comment/show.php?uid=<?php echo $arrayx['id']?>"  target="_blank"><?php echo $dneir?></a></div>
<?php }else{?>
<div class="font12 pd10">&nbsp; 暂无任何评价</div>
<?php } ?>
 </div> 
   </td> 
     <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     
   </tr>
     </table>
     
     
     
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>  
</div>

<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
<tr><td    height="20"></td></tr>
</table>
<div class="page">

 <a href="?qid=<?php echo $qid?>&bqid=<?php echo $bqid?>&pxxs=<?php echo $pxxs?>&pxks=<?php echo $pxks?>&pxqd=<?php echo $pxqd?>&ishui=<?php echo $ishui?>&keys=<?php echo $keys?>&page=<?php echo ($page-1)?>"  ><span class="song"><b><</b></span></a>
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
 <a href="?qid=<?php echo $qid?>&bqid=<?php echo $bqid?>&pxxs=<?php echo $pxxs?>&pxks=<?php echo $pxks?>&pxqd=<?php echo $pxqd?>&ishui=<?php echo $ishui?>&keys=<?php echo $keys?>&page=<?php echo $ys?>" <?php if ($ys==$page) {?>class="now"<?php }?> ><?php echo $ys?></a>
 <?php } ?> 
 <a href="?qid=<?php echo $qid?>&bqid=<?php echo $bqid?>&pxxs=<?php echo $pxxs?>&pxks=<?php echo $pxks?>&pxqd=<?php echo $pxqd?>&ishui=<?php echo $ishui?>&keys=<?php echo $keys?>&page=<?php echo ($page+1)?>"  ><span class="song"><b>></b></span></a>
</div>
 
 <?php
 }
 ?> 

   </div>        
 </div>
<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="35"></td>
  </tr>
</table>
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
                    data: { "type": "yuesjs", "OName": name, "OMobile": mobile, "Community":community,"Square":square},
					
					success: function () { 
					$.alertable.alert('恭喜您，预约成功！！');					        
                            $("#Name").val("");
                            $("#Mobile").val("");
                            $("#Community").val("");
                            $("#Square").val("");
					}
                });
        }
    }
</script>
<?php
include("../nei_foot.php");
?>
</body>
</html>
<?php
 mysql_close($conn);
?>