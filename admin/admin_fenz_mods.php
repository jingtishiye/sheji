<?php
header("content-type:text/html;charset=utf-8");
include("session.php"); 
error_reporting(0);

$id=intval(trim($_POST["id"]));
$title=trim($_POST['title']);
$tuijian=trim($_POST['tuijian']);
$url=trim($_POST['url']);
$paixu=trim($_POST['paixu']);
$mrs=trim($_POST['mrs']);
$ishot=trim($_POST['ishot']);

if ($paixu==""){
$paixu=100;
}
if ($tuijian==""){
$tuijian=0;
}
if ($ishot==""){
$ishot=0;
}
if($title<>"" and $url<>"" and $id>0 ){
	 
		include("../php/dbo.php");
		$_my=new Dbo("update tb_fenz set title='$title',px_id='$paixu',url='$url',tuijian='$tuijian',mrs='$mrs',ishot='$ishot' where id='$id' ",0);
		echo "<script>alert('修改成功');document.location.href='admin_fenz.php';</script>";
	
}else{
	echo "<script>alert('信息不完整！');history.go(-1);</script>";
}
?>
