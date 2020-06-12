<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=7;

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>工长最新评价</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/index.css" type="text/css" rel="stylesheet" />
</head>
	<style>
	.slideTxtBox {
    overflow: hidden;
    position: relative;
    height: 60px;
    width: 150px;
}
.slideTxtBox .hd {
    bottom: 5px;
    height: 15px;
    overflow: hidden;
    position: absolute;
    left: 50%;
    z-index: 1;
}
.slideTxtBox .hd ul {
    float: left;
    overflow: hidden;
    
}
.slideTxtBox .hd ul li {
    background: #fff none repeat scroll 0 0;
    cursor: pointer;
    float: left;
    height: 10px;
    line-height: 10px;
    margin-right: 4px;
    text-align: center;
    width: 10px;
    border-radius: 10px;
    background: #ccc;
}

.slideTxtBox .bd {
    height: 100%;
    position: relative;
    z-index: 0;
}
.slideTxtBox .bd li {
    vertical-align: middle;
}
.slideTxtBox .bd img {
    display: block;
    height: 60px;
    width: 150px;
}

	</style>
<body>
<?php
include("../nei_top.php");
?>
<div class="clear"></div>
 
<script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写工长姓名!!');
      document.thisForm.keys.focus();
      return false;
      } 
 
	 return true;
}
</script>
<div class="Comment">
<form action="show.php" name="thisForm" method="get"  onSubmit="return checkform();">
        <div class="Comment_S" style="height:auto;">
            
       <p>
                看看其他人对工长的评价&nbsp;<img style="vertical-align: middle" src="Images/c-left.png" /></p>
            <div class="input-c">
                <input type="text" id="Keyword" name="keys" placeholder="请输入工长姓名" /></div>
            <div class="input-c">
                <input type="submit" class="sour" value="立即搜索"   />
             </div>
        </div>
</form>
        <div class="CommentList">
            <div class="Comment_L">
                <div class="titlebar">
                    <div class="btitle">
                       业主最新评价  
                    </div>
                </div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
                <div class="clist">
<?php
 
 $rrs5=mysql_query("select id   from tb_upl where sh=1  ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=10;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=intval(trim($_GET["page"]));
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rsx=mysql_query("select * from tb_upl where sh=1   order by  id desc limit $p,$pagesize ",$conn);
 if($num>0){ 
 while($arrayx=mysql_fetch_array($rsx)):
 
 if ($arrayx['uyid']>0) {
 $rs5=mysql_query("select relname  from tb_user where bid=0 and id=$arrayx[uyid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $unames=$array5['relname'];
 mysql_free_result($rs5);
 }
 
if ($arrayx['uimg']==""){
	
 if ($arrayx['utel']<>"") {
 $rs5=mysql_query("select  img from tb_user where username='$arrayx[utel]'",$conn);
 $array5=mysql_fetch_array($rs5);
  $uimg2=$array5['img'];
 mysql_free_result($rs5);
 }
	
}else{
	$uimg2=$arrayx['uimg'];
}
 
?> 
            <dl class="comment-list" style="width: 100%">
                <dt>
                     <img  src="<?php echo $uimg2?>"  style="border:1px solid #e4e4e4;"/></dt>
                            <dd style="display: table">
                                <div style="display: table-cell; vertical-align: middle">
                                    <div class="clearfix">
                                        <span class="pull-right"></span>
    <b class="floatL">
      <?php echo substr($arrayx['utel'],0,3)?>****<?php echo substr($arrayx['utel'],7,4)?>
      </b>
    <div class="pjDate floatR" ><?php echo date("Y-m-d",strtotime($arrayx['data']))?></div>
    
    </div>
    
      <p class="font14">
            <b> <?php echo $unames?>工长 : </b>
            <a title="<?php echo $arrayx['content']?>" href="show.php?uid=<?php echo $arrayx['uyid']?>"><?php echo $arrayx['content']?></a></p>
       </div>
        </dd>
     </dl>
  <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>     
                        
                </div>
                <div style="clear: both"></div>
               
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>
<div class="page">

 <a href="?page=<?php echo ($page-1)?>"  ><span class="song"><b><</b></span></a>
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
 <a href="?page=<?php echo $ys?>" <?php if ($ys==$page) {?>class="now"<?php }?> ><?php echo $ys?></a>
 <?php } ?> 
 <a href="?page=<?php echo ($page+1)?>"  ><span class="song"><b>></b></span></a>
</div>
 
 <?php
 }
 ?> 
               
            </div>
<div class="Comment_R">

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
$rsx=mysql_query("select  id,img,relname,xjid,glid   from tb_user where sh=1  and yzid=1 and bid=0 order by  kbid desc limit 10",$conn);
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
$rsx=mysql_query("select  id,img,relname,jibie,glid   from tb_user where  tjs=1 and bid=1  and sh=1 order by kbid desc, id desc limit 10",$conn);
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
 </div>          
            
            
            
        </div>
    </div>
<div class="clear"></div>
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