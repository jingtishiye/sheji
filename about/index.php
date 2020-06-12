<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhss=6;

$id=trim($_GET['id']);
if($id==""){
$id=1;
}
if(is_numeric($id)){
}else{
echo "<script type='text/javascript'>location.href='/index.php';</script>";
exit;
}


$rsur=mysql_query("select * from tb_about where  id=$id ",$conn);
$numur=mysql_num_rows($rsur);
$arrayur=mysql_fetch_array($rsur); 

if ($numur==0){
	echo "<script>history.go(-1);</script>";
	exit; 
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $arrayur['title']?>_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link type="text/css" rel="stylesheet" href="../css/style.css">
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="index_files/saved_resource.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("../nei_top.php");
?>
<div style="clear:both;"></div>
<!--面包屑开始-->
<div class="m_bread">
  <p> <span>您的位置：</span> <a class="m_bread_icon" href="/">首页</a> <span><img src="index_files/m_bread_gt.jpg" alt=""></span> <span>关于我们</span> <span><img src="index_files/m_bread_gt.jpg" alt=""></span> <span><?php echo $arrayur['title']?></span> </p>
</div>
<!--面包屑结束-->
<!--主体部分开始-->
<div id="w-gywm-content" class="clearfix">
  <!--主体左部分开始-->
  <div class="gywm-con-l fl">
    <ul class="con-l-bigul">
<?php
 $rs6=mysql_query("select id,title   from tb_about   order by px_id asc  ",$conn);
 $num=mysql_num_rows($rs6);
 $j=1;
 while($array6=mysql_fetch_array($rs6)):
  
 ?> 
 <li class="<?php if ($j==1){?>first-li<?php }?> <?php if ($j==$num){?>last-li<?php }?>"> <a href="index.php?id=<?php echo $array6["id"]?>"><?php echo $array6["title"]?><span <?php if ($array6["id"]==$arrayur['id']){?>class="active"<?php }?> ></span></a></li>
 <?php
 
 $j++;
 endwhile;
 mysql_free_result($rs6); 
 ?>  
      
 
    </ul>
  </div>
  <!--主体左部分结束-->
  <!--主体右部分开始-->
  <div class="gywm-con-r fl">
    <h3 class="gywm-con-r-h3"><?php echo $arrayur['title']?></h3>
    <div class="gywm-con-box font14" style="line-height:30px;">
      <?php
$tneir=str_replace("<img","<img onload='javascript:DrawImage1(this);' ",$arrayur["content"]);
echo $tneir; 
 ?>
    </div>
    
     
  </div>
  <!--主体右部分结束-->
</div>
<div style="clear:both;"></div>
<table width="1000" align="center" cellpadding="0" cellspacing="0" border="0"> 
<tr><td height="38" ></td></tr>
</table>
<?php
include("../nei_foot.php");
?>
</body>
</html>
<?php
mysql_free_result($rsur); 
mysql_close($conn);

?>