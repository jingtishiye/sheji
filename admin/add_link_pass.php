<?php
header("content-type:text/html;charset=utf-8");
$title=$_POST["title"];
$url=$_POST["url"];
$px_id=$_POST["px_id"];
$data=date("Y-m-d G:i:s");


if($title<>"" and $url<>"" ){

	 

	include("../php/dbo.php");
	$_my=new Dbo("insert into tb_link(title,url,px_id,data) values('$title','$url','$px_id','$data')",0);
	
	echo "<script>alert('友情链接添加成功');document.location.href='admin_link.php';</script>";	
}else{
	echo "<script>history.go(-1);</script>";
}
?>