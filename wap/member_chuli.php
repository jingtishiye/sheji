<?php
include("php/conn.php"); 
header("content-type:text/html;charset=utf-8");
error_reporting(0);
 
 

if(trim($_POST["type"])=="yuegz"){ 
	
$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$xiaoqu=trim($_POST['xiaoqu']);
$OID=trim($_POST['OID']);
$Squera=trim($_POST['Squera']);
$ODate=trim($_POST['ODate']);
$Dtype=trim($_POST['Dtype']);

date_default_timezone_set('PRC');
$datas=date("Y-m-d G:i:s");

if ($OID==""){
$OID=0;
}
 
 
 
 
include("php/dbo.php"); 
	
$_my=new Dbo("insert into tb_uyue(bname,uyid,tel,qname,ztime,mjs,data,fangs) values('$OName','$OID','$OMobile','$xiaoqu','$ODate','$Squera','$datas','$Dtype')",0);

 
 
 
}elseif(trim($_POST["type"])=="yuesj"){ 
	
$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$xiaoqu=trim($_POST['xiaoqu']);
$OID=trim($_POST['OID']);
$Squera=trim($_POST['Squera']);
$ODate=trim($_POST['ODate']);
$Dtype=trim($_POST['Dtype']);

date_default_timezone_set('PRC');
$datas=date("Y-m-d G:i:s");

if ($OID==""){
$OID=0;
}
 
 
 
 
include("php/dbo.php"); 
	
$_my=new Dbo("insert into tb_uysj(bname,uyid,tel,qname,ztime,mjs,data,fangs) values('$OName','$OID','$OMobile','$xiaoqu','$ODate','$Squera','$datas','$Dtype')",0);

 
 
}elseif($_POST["type"]=="baoms"){ 

 

$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$OID=trim($_POST['OID']);
$Community=trim($_POST['Community']);
$bren=trim($_POST['bren']);
 


if ($OID==""){
	$OID=0;
}

 

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

	

    include("php/dbo.php");

 

$_my=new Dbo("insert into tb_hbao(bname,bid,tel,xqus,bms,data) values('$OName','$OID','$OMobile','$Community','$bren','$datas')",0);



}




  mysql_close($conn);	 
 
?>
