<?php
header("content-type:text/html;charset=utf-8");
include("session.php");
 

error_reporting(0);

$id=trim($_POST["id"]);
$tjs=trim($_POST["tjs"]);
$qid=trim($_POST["qid"]);
$bid=trim($_POST["bid"]);
$username=trim($_POST["username"]);
$relname=trim($_POST["uname"]);
$sex=trim($_POST["sex"]);
$jiguan=trim($_POST["jiguan"]);
$tel=trim($_POST["tel"]);
$glid=trim($_POST["glid"]);
$jquyu=trim($_POST["jquyu"]);

$sprice=trim($_POST["sprice"]);

$sfeng=trim($_POST["sfeng"]);
$slnian=trim($_POST["slnian"]);
$jibie1=trim($_POST["jibie1"]);

$yzid=trim($_POST["yzid"]);

$xjid=trim($_POST["xjid"]);
$kbid=trim($_POST["kbid"]);
$img=trim($_POST["img"]);
$img2=trim($_POST["img2"]);
$sh=trim($_POST["sh"]);

$contents=trim($_POST["content"]);

$password=trim($_POST['password']);
$repassword=trim($_POST['repassword']);

 if ($tjs==""){
	 $tjs=0;
 }
 if ($sh==""){
	 $sh=0;
 }
 if ($jibie1==""){
	 $jibie1=0;
 }

 if ($glid==""){
	 $glid=0;
 }

 if ($yzid==""){
	 $yzid=0;
 }

 if ($xjid==""){
	 $xjid=0;
 }

 if ($kbid==""){
	 $kbid=0;
 }

 if ($qid==""){
	 $qid=0;
 }
 
 

if ($id<>"" and $relname<>"" and $username<>"" and $contents<>"" ){

 $contents=str_replace("'","",$contents);
 $contents=str_replace("white-space:nowrap;","",$contents); 

     include("../php/dbo.php");

if ($password<>""){
 if ($password<>$repassword){	
    echo "<script>alert('修改填写的密码不一致！');history.go(-1);</script>";
	exit;
  }else{
	  $pwd=md5($password);
	$_my=new Dbo("update  tb_user set username='$username',relname='$relname',passwords='$pwd',sex='$sex',sh='$sh',tel='$tel',img='$img',sfzimg='$img2',bei='$contents',tjs='$tjs',qid='$qid',jiguan='$jiguan',glid='$glid',xjid='$xjid',kbid='$kbid',jibie='$jibie1',sprice='$sprice',yzid='$yzid',jquyu='$jquyu',sfeng='$sfeng',slnian='$slnian'  where id='$id'",0); 
  }
}else{
 $_my=new Dbo("update  tb_user set username='$username',relname='$relname',sex='$sex',sh='$sh',tel='$tel',img='$img',sfzimg='$img2',bei='$contents',tjs='$tjs',qid='$qid',jiguan='$jiguan',glid='$glid',xjid='$xjid',kbid='$kbid',jibie='$jibie1',sprice='$sprice',yzid='$yzid',jquyu='$jquyu',sfeng='$sfeng',slnian='$slnian'  where id='$id'",0); 	
}
  
  
echo "<script>alert('信息修改成功');document.location.href='admin_user.php?bid=$bid';</script>" ; 
 

 

}else{

echo"<script language=javascript>alert('信息不完整!');history.go(-1)</script>;";

}
 

?>