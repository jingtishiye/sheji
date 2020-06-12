<?php

header("content-type:text/html;charset=utf-8");

error_reporting(0);

$uyid=trim($_POST["uyid"]);
$utel=trim($_POST["utel"]);
$lxid=trim($_POST["lxid"]); 
$content=trim($_POST["content"]); 
 
if ($uyid==""){
	$uyid=0;
}
if ($lxid==""){
	$lxid=0;
}


date_default_timezone_set('PRC');
$datas=trim($_POST["datas"]); 
 

if($content<>"" and $utel<>"" and $uyid>0){
 

	include("../php/dbo.php");

$_my=new Dbo("insert into tb_upl(lxid,uid,uyid,bid,content,data,utel,sh) values('$lxid',0,'$uyid',1,'$content','$datas','$utel',1)",0);

	echo "<script>alert('工长评论提交成功');document.location.href='admin_ubm.php';</script>";	

}else{

	echo "<script>history.go(-1);</script>";

}



 mysql_close($conn);

?>