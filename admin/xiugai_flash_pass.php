<?php

header("content-type:text/html;charset=utf-8");

$id=trim($_POST['id']);
$title=trim($_POST['title']);
$url=trim($_POST['url']);
$bid=trim($_POST['bigClass']);
$px_id=trim($_POST['px_id']);
$weizhi=trim($_POST['radio']);
$img=trim($_POST['img']);

 
if($title<>""  and $url<>"" and $px_id<>""){

			include("../php/dbo.php");
			$_my=new Dbo("update tb_flash set title='$title',image='$img',url='$url',px_id='$px_id',weizhi='$weizhi' where id='$id' ",0);

			echo "<script>alert('信息修改成功');document.location.href='admin_flash.php';</script>";

}else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

}



?>