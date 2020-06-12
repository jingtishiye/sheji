<?php 
header("content-type:text/html;charset=utf-8");
include("../php/conn.php");
error_reporting(0);
 
 

if(trim($_POST["type"])=="addzx"){
	
	$bname=trim($_POST['bname']);
	$tel=trim($_POST['tel']);
 
 
	$s_province=trim($_POST['s_province']);
	$s_city=trim($_POST['s_city']);
	$bei=trim($_POST['bei']);
	
 
	
 
    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

 
	if ($tel<>"" and $bname<>""){	
 
    mysql_query("insert into tb_fedai(bname,tel,sadd1,sadd2,data,bei) values('$bname','$tel','$s_province','$s_city','$datas','$bei')",$conn);
	 echo "<script>alert('您的信息添加成功，我们客服在审核中！');window.location.href='index.php';</script>";
 
 
   }
} 


mysql_close($conn);

?>