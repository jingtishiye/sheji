<?php
include("../php/conn.php");
 
error_reporting(0);
 
if (!empty($_COOKIE['userid'])){
$userid=$_COOKIE['userid'];
}else{
$userid=0;
  echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
  exit;
}
 if ($userid>0){
    $rsum=mysql_query("select  bid  from  tb_user where id=$userid",$conn);
    $arrayum=mysql_fetch_array($rsum);
     $num5=mysql_num_rows($rsum);
  
	$jbids=$arrayum['bid'];	
 
	mysql_free_result($rsum);
   	
	if ($num5==0){
		echo "<script>alert('会员信息不存在！');document.location.href='/';</script>";	
		exit;
	}
	
	if ($jbids==0){
		echo "<script>document.location.href='index_gz.php';</script>";	
		exit;
	}elseif ($jbids==1){
		echo "<script>document.location.href='index_sjs.php';</script>";	
		exit;
	}elseif ($jbids==2){
		echo "<script>document.location.href='index_yz.php';</script>";	
		exit;
	}
	
   }else{
	   
	   echo "<script>alert('会员信息不存在！');document.location.href='/';</script>";	
		exit;
   }
 mysql_close($conn);
?>
