<?php 
header("content-type:text/html;charset=utf-8");
 
if (!empty($_COOKIE['userid'])){
$userid=$_COOKIE['userid'];
}else{
$userid=0;
}

 

if(trim($_POST["type"])=="addorder"){ 



$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$OID=trim($_POST['OID']);
$Community=trim($_POST['Community']);
$Squera=trim($_POST['Squera']);
$ODate=trim($_POST['ODate']);
$Dtype=trim($_POST['Dtype']);

if ($OID==""){
	$OID=0;
}

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

    include("../php/dbo.php");
 
$_my=new Dbo("insert into tb_uyue(bname,uid,uyid,tel,qname,ztime,mjs,data,fangs) values('$OName','$userid','$OID','$OMobile','$Community','$ODate','$Squera','$datas','$Dtype')",0);

 

}elseif(trim($_POST["type"])=="add368"){ 



$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$Community=trim($_POST['Community']);
$Squera=trim($_POST['Squera']);
$ODate=trim($_POST['ODate']);
$Dtype=trim($_POST['Dtype']);

 

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

    include("../php/dbo.php");
 
$_my=new Dbo("insert into tb_utao1(bname,tel,qname,ztime,mjs,data,fangs) values('$OName','$OMobile','$Community','$ODate','$Squera','$datas','$Dtype')",0);

 

}elseif(trim($_POST["type"])=="addwzx"){ 



$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$sadd1=trim($_POST['sadd1']);
$sadd2=trim($_POST['sadd2']);
 

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

    include("../php/dbo.php");
 
$_my=new Dbo("insert into tb_utao3(bname,tel,sadd1,sadd2,data) values('$OName','$OMobile','$sadd1','$sadd2','$datas')",0);

 

}elseif(trim($_POST["type"])=="add388"){ 



$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$mjs=trim($_POST['mjs']);
 

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

    include("../php/dbo.php");
 
$_my=new Dbo("insert into tb_utao2(bname,tel,mjs,data) values('$OName','$OMobile','$mjs','$datas')",0);

 

}elseif(trim($_POST["type"])=="yuegz"){ 
 
$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$OID=trim($_POST['OID']);
$Community=trim($_POST['Community']);
$Square=trim($_POST['Square']);
$DType=trim($_POST['DType']);
$Price=trim($_POST['Price']);

if ($OID==""){
	$OID=0;
}

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

    include("../php/dbo.php");
 
$_my=new Dbo("insert into tb_uyue(bname,uyid,tel,qname,fangs,ysuan,mjs,data) values('$OName','$OID','$OMobile','$Community','$DType','$Price','$Square','$datas')",0);

echo "1";

 }elseif(trim($_POST["type"])=="yuesjs2"){ 
 
$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$OID=trim($_POST['OID']);
$Community=trim($_POST['Community']);
$Square=trim($_POST['Square']);
$DType=trim($_POST['DType']);
$Price=trim($_POST['Price']);

if ($OID==""){
	$OID=0;
}

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

    include("../php/dbo.php");
 
$_my=new Dbo("insert into tb_uysj(bname,uyid,tel,qname,fangs,ysuan,mjs,data) values('$OName','$OID','$OMobile','$Community','$DType','$Price','$Square','$datas')",0);

echo "1";

 }elseif(trim($_POST["type"])=="yuesjs"){ 
 
$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$OID=trim($_POST['OID']);
$Community=trim($_POST['Community']);
$Square=trim($_POST['Square']);
 

if ($OID==""){
	$OID=0;
}

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

    include("../php/dbo.php");
 
$_my=new Dbo("insert into tb_uyue(bname,uyid,tel,qname,mjs,data) values('$OName','$OID','$OMobile','$Community','$Square','$datas')",0);

echo "1";

 }elseif(trim($_POST["type"])=="yuegd"){ 
 
$OName=trim($_POST['OName']);
$OMobile=trim($_POST['OMobile']);
$OID=trim($_POST['OID']);
$Community=trim($_POST['Community']);
$Square=trim($_POST['Square']);
$DType=trim($_POST['DType']);
$Price=trim($_POST['Price']);

if ($OID==""){
	$OID=0;
}

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

    include("../php/dbo.php");
 
$_my=new Dbo("insert into tb_uylf(bname,bid,tel,qname,fangs,ysuan,mjs,data) values('$OName','$OID','$OMobile','$Community','$DType','$Price','$Square','$datas')",0);

echo "1";
 

}elseif($_POST["type"]=="plgz"){ 

 

$Content=trim($_POST['Dneir']);
$BodyID=trim($_POST['OID']);
$OMobile=trim($_POST['OMobile']);
$Dpic=trim($_POST['Dpic']);


if ($BodyID==""){
	$BodyID=0;
}

 

    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

	

    include("../php/dbo.php");

 

$_my=new Dbo("insert into tb_upl(lxid,uyid,utel,uimg,bid,content,data) values('0','$BodyID','$OMobile','$Dpic','1','$Content','$datas')",0);




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

	

    include("../php/dbo.php");

 

$_my=new Dbo("insert into tb_hbao(bname,bid,tel,xqus,bms,data) values('$OName','$OID','$OMobile','$Community','$bren','$datas')",0);



}







mysql_close($conn);

?>