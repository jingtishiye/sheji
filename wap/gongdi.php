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
$key=trim($_GET['searchwords']);

 if ($bid==""){
 $bid=0;
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
<title>在建工地_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link rel="stylesheet" href="images/css.css">
</head>
<body onselectstart="return false">
<?php
include("web_top.php");
?>
<div class="top-sct top-sct-zxzzd">
 <div class="sct-bd sct-bd-pd sct-zxzzd">
<div class="zxzzd-search-wrap">
        <form action="gongdi.php" method="get" name="secs">
          <div class="search-ipt">
          
            <input type="text" name="searchwords" value="请输入工地名称" onFocus="searchFocus()" onBlur="searchBlur()" class="search-box" onKeyDown="toSearch(this)" style="color: rgb(204, 204, 204);">
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
            
<li class="nav-tab "><a   class="<?php if ($bid==0){?>active<?php }?>" href="gongdi.php">全部工地</a></li>
          
              <?php
	   	$rs2=mysql_query("select  bid,btitle from tb_uqu  order by  px_id asc ",$conn);
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
	$tiao1="and qid=$bid"; 
}
  
if($key<>""){ 
	$tiao3="and title like '%$key%'";
}

 $rrs5=mysql_query("select id   from xingxis where id>0 $tiao1   $tiao3 ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=5;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=$_GET["page"];
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rs6=mysql_query("select *  from xingxis where id>0 $tiao1  $tiao3 order by    id desc  limit $p,$pagesize ",$conn);
 if($num>0):
 while($array6=mysql_fetch_array($rs6)):
  
 ?>  
                    <dl class="row-list first">
                        <dt><a href="gongdi_show.php?id=<?php echo $array6["id"]?>">
                            <img src="<?php echo $array6["img"]?>" alt="<?php echo $array6["title"]?>"  onerror="this.onerror=null;this.src='images/news.jpg';"/></a></dt>
                        <dd>
                            <a href="gongdi_show.php?id=<?php echo $array6["id"]?>"><?php echo $array6["title"]?></a></dd><?php $bids=$array6['bid'];?>
                        <dd>
                            <span>目前阶段：<i class="text-gray"><?php
      
						switch($bids){
							case 1: echo "水电阶段";break;
							case 2: echo "泥工阶段";break;
							case 3: echo "木工阶段";break;
							case 4: echo "油漆阶段";break;
							case 5: echo "<b>已完工</b>";break;
						}?></i></span><span>工长：<i
                                class="text-gray"> <?php
 if ($array6['uid']>0) {
 $rs5=mysql_query("select relname  from tb_user where bid=0 and id=$array6[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
 echo $array5["relname"];
 mysql_free_result($rs5);
 }
 ?>
                            </i></span>
                        </dd>
                        <dd>
                            <span>面积：<i class="text-green"><?php echo $array6["mjs"]?>m²</i></span><span>合同价：<i
                                class="text-green"><?php echo $array6["hprice"]?></i>元</span>
                        </dd>
                        <dd>
                            <a class="btn-green" href="gongdi_show.php?id=<?php echo $array6["id"]?>">预约参观</a></dd>
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
        <?php if($num>5){ ?>
        
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