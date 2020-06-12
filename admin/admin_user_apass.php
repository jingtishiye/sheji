<?php
header("content-type:text/html;charset=utf-8");
include("session.php");
include("../php/conn.php");
error_reporting(0);

if (trim($_GET["action"])=="add"){

$tjs=trim($_POST["tjs"]);
$qid=trim($_POST["qid"]);
$bid=trim($_POST["bid"]);

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
$password=trim($_POST['password']);
$repassword=trim($_POST['repassword']);

$xjid=trim($_POST["xjid"]);
$kbid=trim($_POST["kbid"]);
$img=trim($_POST["img"]);
$img2=trim($_POST["img2"]);
$contents=trim($_POST["content"]);

if ($tjs==""){
	 $tjs=0;
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
if ($password==""){
echo "<script>alert('请填写密码！');history.go(-1);</script>";
exit;
}

if ($password<>$repassword){
echo "<script>alert('两次密码输入不一致！');history.go(-1);</script>";
exit;
}
 

if ($bid<>"" and $relname<>"" and $contents<>"" ){
        $contents=str_replace("'","",$contents);
        $contents=str_replace("white-space:nowrap;","",$contents); 
 include("../php/dbo.php");

 $pwd=md5($password);	 
 
$_my=new Dbo("insert into  tb_user(relname,username,passwords,bid,sex,tel,img,sfzimg,bei,tjs,qid,jiguan,glid,xjid,kbid,sprice,yzid,jquyu,data,jibie,sfeng,slnian,sh) values('$relname','tel','$pwd','$bid','$sex','$tel','$img','$img2','$contents','$tjs','$qid','$jiguan','$glid','$xjid','$kbid','$sprice','$yzid','$jquyu',now(),'$jibie1','$sfeng','$slnian',1)",0);

  echo "<script>alert('添加成功！');document.location.href='admin_user.php?bid=$bid';</script>";
  exit;

}else{

  echo"<script language=javascript>alert('信息不完整!');history.go(-1)</script>;";
  exit;

}


}



mysql_close($conn);

?>