<?php
include("session.php");
header("content-type:text/html;charset=utf-8");
error_reporting(0);
$id=intval(trim($_POST["id"]));

$admin=trim($_POST["admin"]);
$password1=md5(trim($_POST["password1"]));
$password2=md5(trim($_POST["password2"]));
$zsname=trim($_POST["zsname"]);
$email=trim($_POST["email"]);
 
$jibie=trim($_POST['glyjb']);
$qxss=$_POST['chkss'];
$qxss2=implode(',',$qxss);

if($id>0){
	if($password1==$password2){
		if($admin<>"" and $zsname<>"" and $email<>""){
			include("../php/dbo.php");
			if('d41d8cd98f00b204e9800998ecf8427e' == $password1){
				$_my=new Dbo("update tb_admin set admin='$admin',zsname='$zsname',email='$email',glqx='$qxss2',jibie='$jibie' where id='$id'",0);
			}else{

				$_my=new Dbo("update tb_admin set admin='$admin',passwords='$password1',zsname='$zsname',email='$email',glqx='$qxss2',jibie='$jibie' where id='$id'",0);

			}
            echo"<script>alert('你修改成功!');window.location.href='admin_administrator.php';</script>" ;
		}else{
			echo"<script>alert('信息不完整!');history.go(-1);</script>" ;
		}
	}else{
		echo"<script>alert('两次密码不同!');history.go(-1);</script>" ;
	}

}



?>