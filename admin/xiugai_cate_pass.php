<?php

header("content-type:text/html;charset=utf-8");
error_reporting(0);

$id=trim($_POST["id"]);
$title=trim($_POST['title']);
$tjs=trim($_POST['tjs']);
$bid=trim($_POST['bid']);
$uname=trim($_POST['uname']);
$zuser=trim($_POST['zuser']);
$mflv=trim($_POST['mflv']);
$img=trim($_POST['img']);
$bei=trim($_POST['bei']);
$content=trim($_POST['content']);

if ($bid==""){
$bid=0;
}

if ($tjs==""){
$tjs=0;
}

if($title<>"" and $content<>"" ){ 

$content=str_replace("'","",$content);  
$content=str_replace("white-space:nowrap;","",$content); 

 include("../php/dbo.php");

 $_my=new Dbo("update tb_talk set title='$title',bid='$bid',uname='$uname',zuser='$zuser',img='$img',mflv='$mflv',bei='$bei',content='$content',tjs='$tjs'  where id='$id' ",0);

 echo "<script>alert('修改成功');document.location.href='admin_cate.php';</script>";

	

 }else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

}

?>

