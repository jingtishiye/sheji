<?php
include("session.php");
header("content-type:text/html;charset=utf-8");
error_reporting(0);
$id=$_POST['id'];
$link=$_POST['link'];
$url=$_POST['url'];
$name=$_POST['name'];
$mail=$_POST['mail'];
$tel=$_POST['tel'];
$fax=trim($_POST['fax']);
$address=$_POST['address'];
$qq=trim($_POST['qq']);

$qq2=trim($_POST['img']);
$qq3=trim($_POST['qq3']);
$qq4=trim($_POST['qq4']);
$qq5=trim($_POST['qq5']);
$qq6=trim($_POST['qq6']);
 
$beian=$_POST['beian'];
$description=$_POST['description'];
$keywords=$_POST['keywords'];   
$link2=$_POST['link2'];
$link3=$_POST['link3'];

 
include("../php/dbo.php");
$_my=new Dbo("update tb_config set  name='$name',url='$url',link='$link',mail='$mail',tel='$tel',fax='$fax',beian='$beian',qq='$qq',qq2='$qq2',qq3='$qq3',qq4='$qq4',qq5='$qq5',qq6='$qq6',address='$address',keywords='$keywords',description='$description' where id=$id",0);

echo "<script>alert('网站设置成功!');window.location.href='admin_xtsz.php';</script>";
 
 

?>


