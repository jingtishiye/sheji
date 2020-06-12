<?php
include("php/conn.php");
include("sub.php"); 
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$id=intval(trim($_GET['id']));
if($id==0){
echo "<script type='text/javascript'>history.go(-1);</script>";
exit;
}
if(is_numeric($id)){
}else{
echo "<script type='text/javascript'>history.go(-1);</script>";
exit;
}

$rsur=mysql_query("select * from tb_talk where  id=$id ",$conn);
$numur=mysql_num_rows($rsur);
$arrayur=mysql_fetch_array($rsur); 

if ($numur==0){
	echo "<script>alert('信息不存在！');history.go(-1);</script>";
	exit; 
}

$bid=$arrayur['bid'];
 
 
 if ($bid>0) {
 $rs5=mysql_query("select btitle from tb_talk_b where bid=$bid",$conn);
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
<title><?php echo $arrayur['title']?>_<?php echo $bnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link rel="stylesheet" href="images/wcss.css">
</head>
<style type="text/css">
        .supmain
        {
            width: 100%;
            color: #666;
        }
        .suptitle
        {
            width: 90%;
            margin: 0 auto;
            padding: 20px 0 5px 0;
            border-bottom: dashed 1px #ccc;
        }
        .suptitle h2
        {
            color: #f94c08;
        }
        .suptitle p
        {
            
            line-height:22px;
			padding-top:5px;
			font-size:14px;
            
        }
        .suplist
        {
            width: 100%;
            padding-top: 10px;
        }
        .supitem
        {
            width: 90%;
            margin: 0 auto;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        .supImg
        {
            position: relative;
             
            width: 100%;
            margin-bottom: 5px;
            text-align: center;
        }
        .suptime
        {
            position: absolute;
            left: -20px;
            width: 60px;
            height: 60px;
            background: #f94c08;
            color: #fff;
            top: 50%;
            margin-top: -30px;
            border-radius: 3px;
            text-align: center;
        }
        .suptime span
        {
            padding-top: 5px;
            display: block;
        }
		.suptime span b
        {
            font-size: 16px;
        }
        
        .supobj
        {
            height: 40px;
            line-height: 40px;
            font-size: 16px;
            color: #009a58;
            font-weight: bold;
            width: 100%;
            text-align: center;
        }
        .supdetail > span
        {
            padding: 0 10px 5px 10px;
            font-size: 14px;
            font-weight: bold;
            display: inline-block;
        }
        .supdetail .supDes
        {
            padding: 0 10px 5px 10px;
        }
        .supdetail .imgBox
        {
            margin-left: 50px;
			margin-right:50px;
        }
        .supdetail .i-left
        {
            width: 8%;
            margin: 0 2%;
			margin-top:55px;
        }
        .supdetail .i-center
        {
		
            width: 75%;
            height: 150px;
        }
        
        .supdetail .i-right
        {
            width: 10%;
			margin-left:2%;
			margin-top:55px;
        }
        .i-center .bd ul
        {
            overflow: hidden;
            zoom: 1;
        }
        .i-center .bd ul li
        {
            display: inline-block;
            width: 50%;
            _display: inline;
            overflow: hidden;
        }
        .i-center .bd ul li img
        {
            width: 98px;
            height: 148px;
            border: 1px solid #ccc;
            margin-left: 2px;
        }
        .i-center .bd ul li a:hover img
        {
            border-color: #009a58;
        }
        .ShowBox
        {
            padding: 4px 0;
            border: 1px solid #ccc;
            width: 100%;
            position: fixed;
            top: 10%;
            background: #fff;
        }
         
		.supitem .ico-t{ display: inline-block;width: 8px;height: 14px;background: url(../images/ico-t.png);margin-left:3px;vertical-align: middle;margin-top:-5px;}
    </style>
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
 
<div class="worker">
  <div class="worker-intr text-align-l">
    <p> <a href="news.php?bid=<?php echo $arrayur['bid']?>"><span style="font-size: 19px;" class="bgcolor bgcolor-green"><?php echo $bnames?></span></a></p>
    </div>
    </div>
<div class="supmain">
        <div class="suptitle">
            <h2>
                <?php echo $arrayur['title']?></h2>
            <p>
         更新时间：<?php echo date("Y-m-d",strtotime($arrayur['data']))?> <br /> 
 
 浏览次数：
<?php
mysql_query("update tb_talk set hits=hits+1 where id=$arrayur[id] ",$conn);
$rs5=mysql_query("select hits from tb_talk where id=$arrayur[id] ",$conn);
$array5=mysql_fetch_array($rs5);
echo $array5['hits'];
?>
 </p>
        </div>
        
        <div class="suplist">
            <div class="supitem">
                 
                <div class="supdetail">
                    <span> <span class="ico-t"></span></span>
                    <div class="supDes">
<?php
$tneir=str_replace("<img src=\"","<img  width=100% src=\"http://www.sina7gz.com",$arrayur["content"]);
$tneir=str_replace("white-space:nowrap;","",$tneir);

 
echo $tneir; 
?></div>
                     
                    
                    
                
                </div>
            </div>
        </div>
</div>

 
 
<?php
include("mess.php");
include("web_foot.php");
?>
 
</body>
</html>
 <?php
  mysql_free_result($rsur); 
  mysql_close($conn);
 ?>