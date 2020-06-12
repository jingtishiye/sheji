<?php

header("content-type:text/html;charset=utf-8");
include("session.php");
include("../php/conn.php");
error_reporting(0);


$istui=trim($_POST['istui']);
$px_id=trim($_POST['px_id']);
$title=trim($_POST['title']);
$mjs=trim($_POST['mjs']);
$qid=trim($_POST['qid']);
$bid=trim($_POST['bid']);
$uid=trim($_POST['uid']);

$imgs=trim($_POST['img']);

$xqus=trim($_POST['xqus']);
$fangx=trim($_POST['fangx']);
$hprice=trim($_POST['hprice']);
$ktime=trim($_POST['ktime']); 

$yname=trim($_POST['yname']);
$contents=trim($_POST["content"]);


date_default_timezone_set('PRC');

$data=$_POST['data'];



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

if ($ktime<>""){
$ktime=date("Y-m-d",strtotime($ktime));
}



if($title<>""  and $imgs<>""){

	

 

		include("../php/dbo.php");

		$_my=new Dbo("insert into xingxis(title,mjs,uid,qid,bid,jid,xqus,img,yname,tjs,data,fangx,hprice,ktime,content,sh,px_id) values('$title','$mjs','$uid','$qid','$bid','$jid','$xqus','$imgs','$yname','$istui','$data','$fangx','$hprice','$ktime','$contents',1,'$px_id')",0);

		echo "<script>alert('添加成功！');document.location.href='admin_product.php';</script>";

}else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

}

mysql_close($conn);

?>
