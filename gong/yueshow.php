<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=2;

$id=intval(trim($_GET['id']));

if($id==0){
echo "<script type='text/javascript'>location.href='yuelist.php';</script>";
exit;
} 

$rsuv=mysql_query("select * from tb_news where id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('签单信息不存在！');history.go(-1);</script>";
	exit; 
}
mysql_query("update tb_news set hits=hits+1 where id=$arrayuv[id] ",$conn);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $arrayuv['title']?>_最新签单</title>
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
  <tr>
    <td height="20"  ></td>
  </tr>
</table>
<?php
 if ($arrayuv['uid']>0) {
 $rs5=mysql_query("select relname,img from tb_user where bid=0 and id=$arrayuv[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uimgs=$array5['img'];
  $uming=$array5['relname'];
 mysql_free_result($rs5);
 }
?>
<div class="a11">
  <div class="a12">
    <table width="992"   align="center"  cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="507"  align="left"><div class="font14">您现在所在的位置：<a href="/">首页</a> > <a href="yuelist.php">最新签单</a> > 恭喜<?php echo $uming?>工长签约<?php echo $arrayuv['xaddr']?><?php echo $arrayuv['yname']?></div></td>
        <td width="493"  align="left">
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
            <div class="fr">
              <input type="submit" name="sub1" class="sou01" value="搜索" />
            </div>
            <div class="fr">
              <input type="text" name="keys" class="sou02" value="" placeholder="输入名称搜索" />
            </div>
          </form></td>
      </tr>
    </table>
    <div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="25"  ></td></tr>
</table>
<div class="font24" align="center">恭喜<?php echo $uming?>工长签约<?php echo $arrayuv['xaddr']?><?php echo $arrayuv['yname']?></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>
    <div class="Main">
      <div class="title">
        <div class="logos floatL"><a  href="/gong/show.php?uid=<?php echo $arrayuv['uid']?>"><img src="http://www.sina7gz.com/<?php echo $uimgs?>" alt="<?php echo $uming?>工长" title="<?php echo $uming?>工长"/></a></div>
        <div class="des floatL"> <span class="des-title"> <?php echo $arrayuv['xqus']?></span> 
        <span>房屋面积：<?php echo $arrayuv['mjs']?>m²</span> 
        <span>签单金额：<?php echo $arrayuv['hprice']?>元</span> 
        <span><?php echo $arrayuv['fangs']?>方案</span>
        <span>业主：<?php echo $arrayuv['yname']?></span>
 <span style="float: right"><a href="/gong/show.php?uid=<?php echo $arrayuv['uid']?>">工长<?php echo $uming?></a></span> </div>
      </div>
    </div>
    <div class="supmain">
    
     
   <table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="20"></td>
  </tr>
</table>
   <div align="center" class="supitem">
    
   <div align="center" class="pd25"><img src="<?php echo $arrayuv['img']?>"  /></div>
   <div align="left" class="pd15 line26" style="padding:15px 35px;"><?php echo $arrayuv['content']?></div>
  <table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="20"></td>
  </tr>
</table>
   </div>
      
   
    </div>
 
    
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
  mysql_free_result($rsuv); 
  mysql_close($conn);
 ?>