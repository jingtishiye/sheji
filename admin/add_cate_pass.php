<?php

header("content-type:text/html;charset=utf-8");

$title=trim($_POST['title']);
$tjs=trim($_POST['tjs']);
$bid=trim($_POST['bid']);
$uname=trim($_POST['uname']);
$zuser=trim($_POST['zuser']);
$img=trim($_POST['img']);
$mflv=trim($_POST['mflv']);
$bei=trim($_POST['bei']);
$content=trim($_POST['content']);



if ($bid==""){
$bid=0;
}

if ($tjs==""){
$tjs=0;
}

date_default_timezone_set('PRC');
$data=$_POST['data'];





if($title<>"" and $content<>"" ){ 

$content=str_replace("'","",$content);  
$content=str_replace("white-space:nowrap;","",$content); 


		include("../php/dbo.php");

		$_my=new Dbo("insert into tb_talk(title,bid,uname,zuser,img,mflv,bei,content,tjs,data) values('$title','$bid','$uname','$zuser','$img','$mflv','$bei','$content','$tjs','$data')",0);

		echo "<script>alert('添加成功');document.location.href='admin_cate.php';</script>";

	

}else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

}

?>