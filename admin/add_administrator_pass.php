<?php
header("content-type:text/html;charset=utf-8");
include("session.php");
error_reporting(0);

$admin=trim($_POST["admin"]);
$password=md5(trim($_POST["password"]));
$password3=md5(trim($_POST["password3"]));
$zsname=trim($_POST["zsname"]);
$email=trim($_POST["email"]);

date_default_timezone_set('PRC');
$dldata=date("Y-m-d G:i:s");
$jibie=trim($_POST['glyjb']);
$qxss=$_POST['chkss'];
$qxss2=implode(',',$qxss);



if($admin<>"" and $password<>"" ){

  include("../php/dbo.php");

$_my=new Dbo("insert into tb_admin(admin,password,zsname,email,glqx,jibie) values('$admin','$password','$zsname','$email','$qxss2','$jibie')",0);

echo"<script language=javascript>alert('管理员添加成功!');window.location.href='admin_administrator.php';</script>" ; 

}else{
   echo"<script language=javascript>alert('信息不完整!');history.go(-1)</script>;";
}

?>



