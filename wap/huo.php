<?php
include("php/conn.php");
include("sub.php"); 
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$bid=intval(trim($_GET['bid']));
$keys=trim($_GET['searchwords']);

 if ($bid==""){
 $bid=0;
 }
 
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<meta content="telephone=no" name="format-detection">
<meta name="applicable-device" content="mobile">
 <meta name="hotcss" content="initial-dpr=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="stylesheet" type="text/css" href="images/headfooter.min.css">
<link rel="stylesheet" type="text/css" href="images/top.css">
<link rel="stylesheet" type="text/css" href="images/index.css">
<script type="text/javascript" src="images/jquery.min.js"></script>
<script type="text/javascript" src="images/swiper.min.js"></script>
<title>最新活动_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link rel="stylesheet" href="images/css.css">
<link rel="stylesheet" href="images/gus.css">
</head>
<body onselectstart="return false">
<?php
include("web_top.php");
?>
<div class="top-sct top-sct-zxzzd">
  <div class="sct-bd sct-bd-pd sct-zxzzd">
    <div class="zxzzd-search-wrap">
      <form action="huo.php" method="get" name="secs">
        <div class="search-ipt">
          <input type="text" name="searchwords" value="请输入活动名称" onFocus="searchFocus()" onBlur="searchBlur()" class="search-box" onKeyDown="toSearch(this)" style="color: rgb(204, 204, 204);">
          <input type="submit" class="icon-search click-point"  value="" name="subj">
          </span> </div>
      </form>
    </div>
  </div>
</div>
     
        <div class="tabbable mt15 clearfix">
            <div class="ul-box">
                <ul class="nav nav-tabs">
            
<li class="nav-tab "><a   class="<?php if ($bid==0){?>active<?php }?>" href="huo.php">全部</a></li>
          
              <?php
	   	$rs2=mysql_query("select  bid,btitle from tb_huo_b  order by  px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?> 
<li class="nav-tab "><a   class="<?php if ($bid==$array2['bid']){?>active<?php }?>" href="?bid=<?php echo $array2['bid']?>"><?php echo $array2['btitle']?></a></li>
          <?php 
	endwhile;
	mysql_free_result($rs2);
	?>
                        
                    
                    
                </ul>
            </div>
             </div>
<?php
if ($bid>0){
	$tiao1="and bid=$bid ";
}
 
if($keys<>""){ 
	$tiao2="and title like '%$keys%'";
}

 $rrs5=mysql_query("select id   from tb_huo where id>0 $tiao1 $tiao2 ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=6;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=intval(trim($_GET["page"]));
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rsx=mysql_query("select * from tb_huo where id>0 $tiao1  $tiao2 order by  id desc limit $p,$pagesize ",$conn);
 if($num>0){ 
 
 while($arrayw=mysql_fetch_array($rsx)):
 $tname=str_replace($keys,"<font color=#FF0000>$keys</font>",$arrayw["title"]);
 
 

$cnum_book=$arrayw['bms']+mysql_num_rows(mysql_query("select id from tb_hbao where  bid=$arrayw[id]",$conn));
?>  

<div class="case_item">
<a href="huo_show.php?id=<?php echo $arrayw['id']?>" title=""><img src="../<?php echo $arrayw['img']?>" alt=""></a>
  <div class="tip"><span class="location"><em></em><?php echo $arrayw['hbiao']?></span><span class="comments"><em></em><?php echo $cnum_book?></span></div>
  <h4><?php echo $tname?></h4>
  <div class="wrap"><span class="fl"><?php echo $arrayw['hfuli']?></span></div>
</div>

  <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>          
 <div class="clear"></div>
 
        
<div class="pagew">

 <a href="?bid=<?php echo $bid?>&keys=<?php echo $keys?>&page=<?php echo ($page-1)?>"  ><span class="song"><b><</b></span></a>
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
 <a href="?bid=<?php echo $bid?>&keys=<?php echo $keys?>&page=<?php echo $ys?>" <?php if ($ys==$page) {?>class="now"<?php }?> ><?php echo $ys?></a>
 <?php } ?> 
 <a href="?bid=<?php echo $bid?>&keys=<?php echo $keys?>&page=<?php echo ($page+1)?>"  ><span class="song"><b>></b></span></a>
</div>
 <?php }?>       

<?php
include("mess.php");
include("web_foot.php");
?>
</body>
</html>
<?php
  mysql_close($conn);
 ?>