<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=2;
 
$uid=intval(trim($_GET['uid']));
$bid=trim($_GET['bid']); 
$keys=trim($_GET['keys']);

 if ($uid>0) {
 $rs5=mysql_query("select relname,id from tb_user where bid=0 and id=$uid",$conn);
 $array5=mysql_fetch_array($rs5);
  $uid=$array5['id'];
  $gznames=$array5['relname'];
 mysql_free_result($rs5);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>工长<?php echo $gznames?>最新签约_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/gongdi.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>

<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="30"  ></td></tr>
</table>  
<div class="a11">
<div class="a12">
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="890" align="left" valign="top">
<table width="890"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td width="267"  align="left"><div class="btitle">工长<?php echo $gznames?>最新签约</div></td>
<td width="330" ><div class="font12">
<span <?php if ($bid==""){?>class="hongs"<?php }?>><a  href="yuelist.php" >全部</a></span> &nbsp; 
    
<span <?php if ($bid=="半包"){?>class="hongs"<?php }?>><a  href="yuelist.php?bid=半包" >半包</a></span> &nbsp; 
<span <?php if ($bid=="全包"){?>class="hongs"<?php }?>><a  href="yuelist.php?bid=全包" >全包</a></span> &nbsp;
<span <?php if ($bid=="清包"){?>class="hongs"<?php }?>><a  href="yuelist.php?bid=清包" >清包</a></span> &nbsp;


</div></td>
<td width="293"  align="left">
<script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写名称!!');
      document.thisForm.keys.focus();
      return false;
      } 
 
	 return true;
}
</script>
<form action="yuelist.php" name="thisForm" method="get"  onSubmit="return checkform();">
<div class="fr"><input type="submit" name="sub1" class="sou01" value="搜索" /></div>
<div class="fr"><input type="text" name="keys" class="sou02" value="" placeholder="输入名称搜索" /></div>
</form>
</td>
</tr>
</table>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>
<?php
 
if ($uid>0){
	$tiao3="and uid=$uid ";
}
if ($bid<>""){
	$tiao1="and fangs='$bid' ";
}
if($keys<>""){ 
	$tiao2="and title like '%$keys%'";
}

 $rrs5=mysql_query("select id   from tb_news where  id>0  $tiao1 $tiao2 $tiao3 ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=10;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=intval(trim($_GET["page"]));
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rsx=mysql_query("select * from tb_news where id>0  $tiao1 $tiao2 $tiao3 order by  id desc limit $p,$pagesize ",$conn);
 if($num>0){ 
 while($arrayx=mysql_fetch_array($rsx)):
 
 if ($arrayx['uid']>0) {
 $rs5=mysql_query("select relname,img from tb_user where bid=0 and id=$arrayx[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uimgs=$array5['img'];
  $uming=$array5['relname'];
 mysql_free_result($rs5);
 }
 

?> 
<div class="gd-item">
                <div class="gd-left floatL">
                    <div class="pic">
 <a style="height: 150px; display: block"   href="yueshow.php?id=<?php echo $arrayx['id']?>">
 <img title="<?php echo $arrayx['title']?>" alt="<?php echo $arrayx['title']?>"  src="<?php echo $arrayx['img']?>" /></a>
                        <div class="info">
<a   href="yueshow.php?id=<?php echo $arrayx['id']?>"><?php echo $arrayx['xaddr']?><?php echo $arrayx['mjs']?>m²</a></div>
                    </div>
                    <div class="handle">
     <a  href="/gong/show.php?uid=<?php echo $arrayx['uid']?>" class="floatL gzname">
     <strong><?php echo $uming?></strong></a> <a class="floatR see" href="yueshow.php?id=<?php echo $arrayx['id']?>">查看详细</a>
                    </div>
                    <div class="avatar">
     <a href="/gong/show.php?uid=<?php echo $arrayx['uid']?>"><img src="/<?php echo $uimgs?>" ></a>
                        
                    </div>
                </div>
                <div class="gd-right floatL">
                    <div class="gd-title">
                        <span class="des-title"><a   href="yueshow.php?id=<?php echo $arrayx['id']?>">恭喜<?php echo $uming?>工长签约<?php echo $arrayx['xaddr']?><?php echo $arrayx['yname']?></a></span> 
                        <div class="clear pd10"></div>
                        <span>面积：<?php echo $arrayx['mjs']?>m²</span>
                        <span><?php echo $arrayx['fangs']?>方案</span>
                        <span>签单金额：<?php echo $arrayx['hprice']?>元</span>
                        
                    </div>
                    

 <div class="gd-result">
 
   <div class="wens">签单说明<span class="ico-t"></span></div>
      <div>
       <p><?php echo $arrayx['bei']?></p>
       
     </div>
    </div>
                    
                    
                </div>
    
            </div>
            <div class="clear"></div>
     <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="1"  ></td></tr>
</table>
<div class="page">

 <a href="?uid=<?php echo $uid?>&bid=<?php echo $bid?>&keys=<?php echo $keys?>&page=<?php echo ($page-1)?>"  ><span class="song"><b><</b></span></a>
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
 <a href="?uid=<?php echo $uid?>&bid=<?php echo $bid?>&keys=<?php echo $keys?>&page=<?php echo $ys?>" <?php if ($ys==$page) {?>class="now"<?php }?> ><?php echo $ys?></a>
 <?php } ?> 
 <a href="?uid=<?php echo $uid?>&bid=<?php echo $bid?>&keys=<?php echo $keys?>&page=<?php echo ($page+1)?>"  ><span class="song"><b>></b></span></a>
</div>
 
 <?php
 }
 ?> 
</td>
<td width="30"></td>
<td width="280" align="left" valign="top">
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
$rsx=mysql_query("select  id,img,relname,xjid,glid   from tb_user where sh=1  and yzid=1 and bid=0 order by  xjid desc limit 10",$conn);
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
$rsx=mysql_query("select  id,img,relname,jibie,glid   from tb_user where  tjs=1 and bid=1  and sh=1 order by glid desc, id desc limit 10",$conn);
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
</body>
</html>
<?php
 mysql_close($conn);
?>