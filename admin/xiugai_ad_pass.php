<?php

header("content-type:text/html;charset=utf-8");
error_reporting(0);
$id=trim($_POST["id"]);
$title=trim($_POST["title"]);
$urls=trim($_POST["urls"]);
$img=trim($_POST["img"]); 
$weizhi=trim($_POST["weizhi"]);

 

if($title<>"" and $img<>""  ){

 
	include("../php/dbo.php");
	$_my=new Dbo("update tb_ads set title='$title',weizhi='$weizhi',image='$img',url='$urls'  where id='$id' ",0);
	echo "<script>alert('修改成功');document.location.href='admin_ad.php?bid=$bid';</script>";	
}else{
	echo "<script>history.go(-1);</script>";
}

?>

