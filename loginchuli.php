<?php 
session_start();
header("content-type:text/html;charset=utf-8");
include("php/conn.php");

$types=trim($_POST['type']);

if($types=="addreg"){ 

$mobile=trim($_POST['OMobile']);
$password=md5(trim($_POST['passwd']));
$zname=trim($_POST["zname"]);
 
    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");
	
if($mobile<>'' and $password<>''){
	$sql=mysql_query("select id from tb_user where (username='$mobile' or tel='$mobile') and bid=2",$conn);
	$num=mysql_num_rows($sql);
	$result=mysql_fetch_array($sql);
	if ($num>0){  
	echo "2"; 
	}else{
         
		 
		 
	include("php/dbo.php");
$_my=new Dbo("insert into tb_user(username,passwords,relname,tel,bid,data,dlcs,dldata) values('$mobile','$password','$zname','$mobile',2,'$datas',1,'$datas')",0);
	
 
	$rsg=mysql_query("select id from tb_user where username='$mobile' ",$conn);
	$arrayg=mysql_fetch_array($rsg);
 
	setcookie("userid",$arrayg["id"],time()+7*24*3600);
 
	mysql_free_result($rsg);	
	echo "1"; 
	
	  }
		
	}
	
}elseif($types=="login"){ 

$mobile=trim($_POST['OMobile']);
$password=md5(trim($_POST['passwd']));
$ctype=intval(trim($_POST['ctype']));
$ycode=trim($_POST['ycode']);

$ycodes=md5($ycode);

if ($ycodes<>$_SESSION["verification"]){
	echo "3";
	exit;
}

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");
	
	
 $rs=mysql_query("select id from tb_user where (username='$mobile' or  tel='$mobile' ) and   passwords='$password'",$conn);
$array=mysql_fetch_array($rs);
$rows=mysql_num_rows($rs);
	if($rows>0){
	$uiid=$array["id"];
	
	
	if($ctype==0){
	    setcookie("userid",$uiid,time()+7*24*3600);
	}else{
		setcookie("userid",$uiid,time()+30*24*3600);
	}
    mysql_query("update tb_user set dlcs=dlcs+1,dldata='$datas' where id=$uiid ",$conn);
	echo "1";

	}else{
		
	echo "2";
	exit;
	
	}
	


}elseif($types=="addgz"){ 

$uname=trim($_POST['uname']);
$email=trim($_POST['email']);
$utel=trim($_POST['utel']);
$zname=trim($_POST['zname']);
$password=md5(trim($_POST['passwd']));
$sadd1=trim($_POST["sadd1"]);
$sadd2=trim($_POST["sadd2"]);

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");
	
if($uname<>'' and $email<>''and $zname<>''){
	$num1=mysql_num_rows(mysql_query("select id from tb_user where  username='$uname' ",$conn));
	$num2=mysql_num_rows(mysql_query("select id from tb_user where  tel='$utel' ",$conn));
	$num3=mysql_num_rows(mysql_query("select id from tb_user where  uemail='$email' ",$conn));
 

	if ($num1>0){  
	echo "2"; 
	exit;
	} 
	if ($num2>0){  
	echo "4"; 
	exit;
	} 
    if ($num3>0){  
	echo "3"; 
	exit;
	}      
		 
		 
	include("php/dbo.php");
$_my=new Dbo("insert into tb_user(username,passwords,relname,tel,bid,uemail,sadd1,sadd2,data,dlcs,ishui,dldata) values('$uname','$password','$zname','$utel',0,'$email','$sadd1','$sadd2','$datas',1,1,'$datas')",0);
	
 
	$rsg=mysql_query("select id from tb_user where username='$uname' ",$conn);
	$arrayg=mysql_fetch_array($rsg);
 
	setcookie("userid",$arrayg["id"],time()+7*24*3600);
 
	mysql_free_result($rsg);	
	echo "1"; 
	
 		
	}
}elseif($types=="addsjs"){ 

$uname=trim($_POST['uname']);
$email=trim($_POST['email']);
$utel=trim($_POST['utel']);
$zname=trim($_POST['zname']);
$password=md5(trim($_POST['passwd']));
$sadd1=trim($_POST["sadd1"]);
$sadd2=trim($_POST["sadd2"]);

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");
	
if($uname<>'' and $email<>''and $zname<>''){
	$num1=mysql_num_rows(mysql_query("select id from tb_user where  username='$uname' ",$conn));
	$num2=mysql_num_rows(mysql_query("select id from tb_user where  tel='$utel' ",$conn));
	$num3=mysql_num_rows(mysql_query("select id from tb_user where  uemail='$email' ",$conn));
 

	if ($num1>0){  
	echo "2"; 
	exit;
	} 
	if ($num2>0){  
	echo "4"; 
	exit;
	} 
    if ($num3>0){  
	echo "3"; 
	exit;
	}      
		 
		 
	include("php/dbo.php");
$_my=new Dbo("insert into tb_user(username,passwords,relname,tel,bid,uemail,sadd1,sadd2,data,dlcs,dldata) values('$uname','$password','$zname','$utel',1,'$email','$sadd1','$sadd2','$datas',1,'$datas')",0);
	
 
	$rsg=mysql_query("select id from tb_user where username='$uname' ",$conn);
	$arrayg=mysql_fetch_array($rsg);
 
	setcookie("userid",$arrayg["id"],time()+7*24*3600);
 
	mysql_free_result($rsg);	
	echo "1"; 
	
 		
	}

}

mysql_close($conn);
?>