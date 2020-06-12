<?php
header("content-type:text/html;charset=utf-8");
$id=$_POST["id"];
$title=$_POST["title"];
$url=$_POST["url"];
$px_id=$_POST["px_id"];
$data=date("Y-m-d h:i:s");

if($title<>"" and $url<>"" ){
 
	include("../php/dbo.php");
	$_my=new Dbo("update tb_link set title='$title',url='$url',px_id='$px_id',data='$data',pic='$image' where id='$id' ",0);
	
	echo "<script>alert('友情链接修改成功');document.location.href='admin_link.php';</script>";	
}else{
	echo "<script>history.go(-1);</script>";
}
?>
