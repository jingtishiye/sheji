<?php 
session_start();
error_reporting(0);
include("../php/conn.php");

header("content-type:text/html;charset=utf-8");

$admin=trim($_POST["admin"]);
$passwords=trim($_POST["password"]);



$iipp = $_SERVER["REMOTE_ADDR"];
date_default_timezone_set('PRC');

$dldata=date("Y-m-d G:i:s");


function show_sql_keyword($str){
$refuse_str="and|or|[|]|select|update|from|where|order|by|*|delete|'|insert|into|values|create|table|database";
$arr=explode("|",$refuse_str);
for($i=0;$i<count($arr);$i++){ 
$str=str_replace($arr[$i],"",$str);
}
return $str;
}

if ($admin==""){
		echo "<script>alert('请填写登录账户！');history.go(-1);</script>";
		exit;
	}

if ($passwords==""){
		echo "<script>alert('请填写登录密码！');history.go(-1);</script>";
		exit;
	}
	
 $admin=show_sql_keyword($admin);
 $passwords=show_sql_keyword($passwords);  
 
 
if ($admin==""){
		echo "<script>alert('请填写登录账户！');history.go(-1);</script>";
		exit;
	}

if ($passwords==""){
		echo "<script>alert('请填写登录密码！');history.go(-1);</script>";
		exit;
	}
	

$password=md5($passwords); 

 

$rs=mysql_query("select * from tb_admin where admin='$admin' and passwords='$password'",$conn);
$array=mysql_fetch_array($rs);
$rows=mysql_num_rows($rs);
	if($rows>0){

 

	$_SESSION['admins']=$admin;
	$_SESSION['passwords']=$password;
 
	$_SESSION['qx']=$array["qx"];


 mysql_query("insert into tb_admincount(name,dldata,ip) values('".$_SESSION['admins']."','".$dldata."','".$iipp."')",$conn);

   mysql_query("update tb_admin set dlcs=dlcs+1,dldata='$dldata' where admin='".$_SESSION['admins']."'",$conn);

	echo "<script> document.location.href='index.php';</script>";

	}else{
	echo"<script> alert('请输入正确用户名和密码');document.location.href='login.php';</script>";
	}
 
 

mysql_free_result($rs);
mysql_close($conn);

?>