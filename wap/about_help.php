<?php
include("php/conn.php");
include("sub.php"); error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$rsur=mysql_query("select * from tb_about where  id=5 ",$conn);
$numur=mysql_num_rows($rsur);
$arrayur=mysql_fetch_array($rsur); 

if ($numur==0){
	echo "<script>history.go(-1);</script>";
	exit; 
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
<title><?php echo $arrayur['title']?>_<?php echo $dnames?></title>
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
            color:#F05909;
        }
        .suptitle p
        {
            font-weight: bold;
            line-height:25px;
			padding-top:5px;
            
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
            background: #009a58;
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
 

 
<div class="supmain">
        <div class="suptitle">
            <h2 align="center">
                <?php echo $arrayur['title']?></h2>
             
        
        </div>
        
        <div class="suplist">
            <div class="supitem">
                 
                <div class="supdetail">
                    <span> <span class="ico-t"></span></span>
                    <div class="supDes">
                      <?php
$tneir=str_replace("<img","<img  width=100% ",$arrayur["content"]);
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