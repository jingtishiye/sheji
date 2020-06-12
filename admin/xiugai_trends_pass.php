<?php
header("content-type:text/html;charset=utf-8");
include("session.php");
error_reporting(0);

$id=trim($_POST["id"]);

$istui=trim($_POST['istui']);
$sh=trim($_POST['sh']);
$px_id=trim($_POST['px_id']);
$title=trim($_POST['title']);
$mjs=trim($_POST['mjs']);
$qid=trim($_POST['qid']);
$bid=trim($_POST['bid']);
$uid=trim($_POST['uid']);
$xqus=trim($_POST['xqus']);
$fangx=trim($_POST['fangx']);
$imgs=trim($_POST['img']);
$yname=trim($_POST['yname']);
$hprice=trim($_POST['hprice']);
$ktime=trim($_POST['ktime']);
$contents=trim($_POST["content"]);

if ($bid==""){
echo "<script>alert('请选择施工阶段！');history.go(-1);</script>";
}

if ($uid==""){
echo "<script>alert('请选择工长！');history.go(-1);</script>";
}

if ($qid==""){
$qid=0;
}
if ($px_id==""){
$px_id=0;
}

if($title<>""   and $imgs<>""){

include("../php/dbo.php");

$_my=new Dbo("update xingxis set title='$title',mjs='$mjs',bid='$bid',uid='$uid',qid='$qid',yname='$yname',xqus='$xqus',tjs='$istui',sh='$sh',px_id='$px_id',fangx='$fangx',img='$imgs',ktime='$ktime',hprice='$hprice',content='$contents' where id=$id",0);

		echo "<script>alert('修改成功！');document.location.href='admin_product.php';</script>";

}else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

}



mysql_close($conn);

?>

