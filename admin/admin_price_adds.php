<?php 

include("session.php"); 
include("../php/conn.php");
error_reporting(0);



$actions=$_GET["action"];



if ($actions=="add" ){

 

$xqus=trim($_POST['xqus']);

$bid=trim($_POST['bid']);

$uid=trim($_POST['uid']);

$hprice=trim($_POST['hprice']);

$fangs=trim($_POST['fangs']);

$imgs=trim($_POST['pic']);

$mjs=trim($_POST['mjs']);

$price1=trim($_POST['price1']);

$price2=trim($_POST['price2']);

$price3=trim($_POST['price3']);

$price4=trim($_POST['price4']);

$price5=trim($_POST['price5']);

$price6=trim($_POST['price6']);

$price7=trim($_POST['price7']);

$price8=trim($_POST['price8']);

$price9=trim($_POST['price9']);

$price10=trim($_POST['price10']);



date_default_timezone_set('PRC');

$data=$_POST['data'];

 

 

if ($uid==""){

$uid=0;

}

if ($bid==""){

$bid=0;

}



if ($hprice==""){

$hprice=0;

}



if ($mjs==""){

$mjs=0;

}





if($xqus<>""     ){

	

	include("../php/dbo.php");

	$_my=new Dbo("insert into tb_gong(bid,xqus,fangs,img,mjs,uid,data,hprice,price1,price2,price3,price4,price5,price6,price7,price8,price9,price10) values('$bid','$xqus','$fangs','$imgs','$mjs','$uid','$data','$hprice','$price1','$price2','$price3','$price4','$price5','$price6','$price7','$price8','$price9','$price10')",0);

	echo "<script>alert('添加成功！');document.location.href='admin_price.php?bid=$bid';</script>";

    }else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

    }

	

}



 

mysql_close($conn); 

?>