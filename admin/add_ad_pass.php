<?php
header("content-type:text/html;charset=utf-8");
$title=trim($_POST["title"]);
$urls=trim($_POST["urls"]);
$img=trim($_POST["img"]); 
$weizhi=trim($_POST["weizhi"]);
   
 
if($title<>"" and $img<>""  ){

	 
	include("../php/dbo.php");
	$_my=new Dbo("insert into tb_ads(title,weizhi,url,image) values('$title','$weizhi','$urls','$img')",0);
	
	echo "<script>alert('添加成功');document.location.href='admin_ad.php?bid=$bid';</script>";	
}else{
	echo "<script>alert('信息不完整');history.go(-1);</script>";
}
?>