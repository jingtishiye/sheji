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
<title>七工长施工队_<?php echo $dnames?></title>
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
        <form action="gong.php" method="get" name="secs">
          <div class="search-ipt">
          
            <input type="text" name="searchwords" value="请输入工长名称" onFocus="searchFocus()" onBlur="searchBlur()" class="search-box" onKeyDown="toSearch(this)" style="color: rgb(204, 204, 204);">
            <input type="submit" class="icon-search click-point"  value="" name="subj"></span>
             
           
          </div>
           </form>
          
        </div>
        </div>
        </div>
<div class="top-sct top-sct-xgt">
  <div class="sct-bd sct-bd-xgt sct-bd-pd swipe" style="visibility: visible;">
    <div id="swipXgtBd" class="swipe_wrap swipe-xgt"  > </div>
  </div>
</div>

<div class="container mt15">
        
        <div class="tabbable mt15 clearfix">
            <div class="ul-box">
                <ul class="nav nav-tabs">
            
<li class="nav-tab "><a   class="<?php if ($bid==0){?>active<?php }?>" href="gong.php">全部工长</a></li>
          
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
	$tiao3="and relname like '%$key%'";
}

 $rrs5=mysql_query("select id   from tb_user where  bid=0 $tiao1 $tiao3 ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=8;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=trim($_GET["page"]);
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rs6=mysql_query("select *  from tb_user where  bid=0 $tiao1 $tiao3 order by xjid desc,  kbid desc,   id desc  limit $p,$pagesize ",$conn);
 if($num>0):
 while($array6=mysql_fetch_array($rs6)):
  
 ?>  
                    <dl class="row-list first">
                        <dt><a href="gong_show.php?id=<?php echo $array6["id"]?>">
                            <img src="../<?php echo $array6["img"]?>" alt="<?php echo $array6["relname"]?>"  onerror="this.onerror=null;this.src='/images/noavatar_medium.gif';"/></a></dt>
          
          <dd><a href="gong_show.php?id=<?php echo $array6["id"]?>"><?php echo $array6["relname"]?></a>
          
  <i class="tb-user tb-manager-passed" title="个人身份已认证" alt="个人身份已认证"></i>
 <span class="tb-border-green" title="该工长已交<?php echo $array6['sprice']?>保障金"><i class="tb-user tb-manager-price" title="已缴纳20000元保证金并支持先行赔付"></i>&nbsp;<?php echo $array6['sprice']?>元&nbsp;</span>                                   																																																																																																																								<i class="tb-user tb-manager-exepay" title="支持先施工后付款" alt="支持先施工后付款"></i>																															<i class="tb-user tb-manager-quality" title="整体工程质保2年水电5年" alt="整体工程质保2年水电5年"></i>  
         </dd>
         <dd style="margin-top:-5px; margin-bottom:6px;"> 
          <?php if ($array6['xjid']==1){?>
 <img src="/images/star.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  />
 <?php }elseif ($array6['xjid']==2){?>
 <img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  />
 <?php }elseif ($array6['xjid']==3){?>
 <img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/starh.png"  /><img src="/images/starh.png"  />
 <?php }elseif ($array6['xjid']==4){?>
 <img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/starh.png"  />
 <?php }elseif ($array6['xjid']==5){?>
 <img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  /><img src="/images/star.png"  />
 <?php }?></dd>
 
 <?php $bids=$array6['bid'];?>
 <dd><span>接单：<?php echo $array6["jquyu"]?></span></dd>
                        <dd>
  <span>签单：<?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$array6[id]",$conn));?></span>                        
 <span>口碑值：<?php echo $array6["kbid"]?></span>
 <span>工种：<?php echo $array6["jiguan"]?></span>

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