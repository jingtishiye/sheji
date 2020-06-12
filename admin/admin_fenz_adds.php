<?php
header("content-type:text/html;charset=utf-8");
include("session.php"); 
error_reporting(0);

$title=trim($_POST['title']);
$tuijian=trim($_POST['tuijian']);
$url=trim($_POST['url']);
$paixu=trim($_POST['paixu']);
$ishot=trim($_POST['ishot']);
$mrs=trim($_POST['mrs']);
if ($paixu==""){
$paixu=100;
}
if ($tuijian==""){
$tuijian=0;
}
if ($ishot==""){
$ishot=0;
}
if($title<>"" and $url<>"" ){
	 
		include("../php/dbo.php");
		$_my=new Dbo("insert into tb_fenz(title,px_id,url,tuijian,mrs,ishot) values('$title','$paixu','$url','$tuijian','$mrs','$ishot')",0);
		echo "<script>alert('添加成功');document.location.href='admin_fenz.php';</script>";
	
}else{
	echo "<script>alert('信息不完整！');history.go(-1);</script>";
}
?>