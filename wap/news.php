<?php
include("php/conn.php");
include("sub.php"); error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$bid=intval(trim($_GET['bid']));
$key=trim($_GET['searchwords']);

 if ($bid==""){
 $bid=0;
 }
 
 if ($bid>0) {
 $rs5=mysql_query("select btitle from talk_b where bid=$bid",$conn);
 $array5=mysql_fetch_array($rs5);
 $bnames=$array5["btitle"];
 mysql_free_result($rs5);
 }
 
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
<link rel="stylesheet" type="text/css" href="images/index.css">
<script type="text/javascript" src="images/jquery.min.js"></script>
<script type="text/javascript" src="images/swiper.min.js"></script>
<title>装修知识_<?php echo $bnames?>_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link rel="stylesheet" href="images/wcss.css">
</head>
<body onselectstart="return false">
<?php
include("web_top.php");
?>
<div class="top-sct top-sct-zxzzd">
 <div class="sct-bd sct-bd-pd sct-zxzzd">
<div class="zxzzd-search-wrap">
        <form action="news.php" method="get" name="secs">
          <div class="search-ipt">
          
            <input type="text" name="searchwords" value="请输入资讯名称" onFocus="searchFocus()" onBlur="searchBlur()" class="search-box" onKeyDown="toSearch(this)" style="color: rgb(204, 204, 204);">
            <input type="submit" class="icon-search click-point"  value="" name="subj"></span>
             
           
          </div>
           </form>
          
        </div>
        </div>
        </div>
 
<div class="container mt15">
        
        <div class="tabbable mt15 clearfix">
            <div class="ul-box">
                <ul class="nav nav-tabs">
            
<li class="nav-tab "><a   class="<?php if ($bid==0){?>active<?php }?>" href="news.php">全部资讯</a></li>
          
              <?php
	   	$rs2=mysql_query("select  bid,btitle from tb_talk_b  order by  px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?> 
<li class="nav-tab "><a   class="<?php if ($bid==$array2['bid']){?>active<?php }?>" href="?bid=<?php echo $array2['bid']?>"><?php echo $array2['btitle']?></a></li>
          <?php 
	endwhile;
	mysql_free_result($rs2);
	?>
                        
                    
                    
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane show">
<?php

if ($bid>0){	 
	$tiao1="and bid=$bid"; 
}
  
if($key<>""){ 
	$tiao3="and title like '%$key%'";
}

 $rrs5=mysql_query("select id   from tb_talk where id>0 $tiao1 $tiao3 ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=8;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=$_GET["page"];
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rs6=mysql_query("select *  from  tb_talk where id>0 $tiao1 $tiao3 order by  id desc  limit $p,$pagesize ",$conn);
 if($num>0):
 while($array6=mysql_fetch_array($rs6)):
 
 if ($array6['img']<>""){
  $imgs=$array6['img'];
 }else{
  $content=$array6['content'];
  $content = str_replace('\"', '', $content);
  preg_match_all('/<img[^>]*src\s?=\s?[\'|"]([^\'|"]*)[\'|"]/is', $content, $picarr);
  $imgs=$picarr[1][0];
 }
  
 ?>  
                    <dl class="row-list first">
                        <dt><a href="news_show.php?id=<?php echo $array6["id"]?>">
                            <img src="../<?php echo $imgs?>"  onerror="this.onerror=null;this.src='images/news.jpg';"/></a></dt>
                        <dd>
                            <a href="news_show.php?id=<?php echo $array6["id"]?>"><?php echo $array6["title"]?></a></dd> 
                        <dd>
 <dd>
 <span><i class="text-green"><?php echo $array6["bei"]?></i></span>
  </dd>                           
 <dd>
 
 <span><?php echo date("Y-m-d",strtotime($array6['data']))?></span>
 </dd>
 
 </dl>
<?php 
 endwhile;
 mysql_free_result($rs6); 
 endif;
 ?>       
                    
                </div>
            </div>
        </div>
        <!--翻页-->
        <?php if($num>8){ ?>
        
        <div class="pagination">
           <a style="width:48px;" href="?bid=<?php echo $bid?>&page=<?php echo ($page-1)?>&key=<?php echo $key?>">上一页</a> 
<?php 
if (($page-4)>1) {
$ys=$page-4;
$yb=$page+4;
}
else{
$ys=1;
$yb=5;
}
if ($yb>$pagemax){
$yb=$pagemax;
}
for($ys;$ys<=$yb;$ys++){ 
?>     
             <a <?php if ($ys==$page) {?>class="active"<?php }?> href="?bid=<?php echo $bid?>&page=<?php echo $ys?>&key=<?php echo $key?>"><?php echo $ys?></a> 
<?php 
} 
?>   
             <a style="width:48px;" href="?bid=<?php echo $bid?>&page=<?php echo ($page+1)?>&key=<?php echo $key?>">下一页</a> 
            
             </div>
<?php }?>
      
             
    </div>

 
 
<?php
include("mess.php");
include("web_foot.php");
?>
 
</body>
</html>
 <?php
  
  mysql_close($conn);
 ?>