<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=7;

$uid=intval(trim($_GET['uid']));
$keys=trim($_GET['keys']);


if ($uid==0 and $keys<>""){
 $rs5=mysql_query("select id from tb_user where bid=0 and relname='$keys'",$conn);
 $num5=mysql_num_rows($rs5);
 $array5=mysql_fetch_array($rs5);
  if ($num5==0) {
      $uid=0;
	  echo "<script type='text/javascript'>location.href='index.php';</script>";
      exit;
  }else{
	  $uid=$array5['id'];
  }
 mysql_free_result($rs5);
 
	
}


$rsuv=mysql_query("select uyid from  tb_upl where sh=1 and uyid=$uid ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

 if ($arrayuv['uyid']>0) {
 $rs5=mysql_query("select relname,img from tb_user where bid=0 and id=$arrayuv[uyid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uimgs=$array5['img'];
  $uming=$array5['relname'];
 mysql_free_result($rs5);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $uming?>工长所有评价_业主点评</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/index.css" type="text/css" rel="stylesheet" />
</head>
<style type="text/css">
        
        .titlebar{ margin-bottom: 20px;}
        .Comment_L{ width: 1000px;margin: 0 auto;float: none}
        .titlebar .title{ text-align: center;float: none;width: 300px;margin: 0 auto}
        .site-page
        {
            height: 30px;
            padding: 20px 0;
            text-align: center;
        }
        .site-page a
        {
            border: 1px solid #d9e6ee;
            color: #000;
            display: inline-block;
            height: 28px;
            line-height: 28px;
            padding: 0 10px;
            text-decoration: none;
        }
        .site-page a:hover
        {
            border: 1px solid #14ae67;
            color: #14ae67;
        }
        .site-page .site-page-a
        {
            background-color: #14ae67;
            border: 1px solid #14ae67;
            color: #fff;
        }
        .site-page .site-page-a:hover
        {
            background-color: #14ae67;
            border: 1px solid #14ae67;
            color: #fff;
        }
        .input-c a{ background: #F39800;padding: 4px 20px;color: #fff;font-size: 18px;border-radius: 3px;}
		.comment-list{height:auto}
    </style>

<body>
<?php
include("../nei_top.php");
?>
<div class="clear"></div>
 
 
<div class="Comment">
        <div class="Comment_S" style="height:auto;">
          
            <a href="../gong/show.php?uid=<?php echo $arrayuv['uyid']?>" ><img class="Logo" width="200" height="200" src="../<?php echo $uimgs?>" alt="<?php echo $uming?>" title="<?php echo $uming?>" /></a><br/>
                <div class="font30 pd10"><a href="../gong/show.php?uid=<?php echo $arrayuv['uyid']?>"><?php echo $uming?></a>工长</div>
                <div class="input-c">
                    <a target="_blank" href="../gong/yuegz.php?id=<?php echo $arrayuv['uyid']?>">预约装修</a>&nbsp;&nbsp;<a  target="_blank" href="../gong/show.php?uid=<?php echo $arrayuv['uyid']?>">了解工长</a></div>
            
        </div>
        <div class="CommentList">
            <div class="Comment_L">
                <div class="titlebar">
                    <div class="btitle">
                        <?php echo $uming?>工长所有评价
                    </div>
                </div>
                <div class="clist">
<?php
 
 $rrs5=mysql_query("select id   from tb_upl where sh=1 and  uyid=$uid ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=10;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=intval(trim($_GET["page"]));
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rsx=mysql_query("select * from tb_upl where sh=1 and  uyid=$uid order by  id desc limit $p,$pagesize ",$conn);
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
            <a title="<?php echo $arrayx['content']?>"><?php echo $arrayx['content']?></a></p>
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

 <a href="?uid=<?php echo $uid?>&page=<?php echo ($page-1)?>"  ><span class="song"><b><</b></span></a>
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
 <a href="?uid=<?php echo $uid?>&page=<?php echo $ys?>" <?php if ($ys==$page) {?>class="now"<?php }?> ><?php echo $ys?></a>
 <?php } ?> 
 <a href="?uid=<?php echo $uid?>&page=<?php echo ($page+1)?>"  ><span class="song"><b>></b></span></a>
</div>
 
 <?php
 }
 ?> 
               
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
  mysql_free_result($rsuv); 
  mysql_close($conn);
 ?>