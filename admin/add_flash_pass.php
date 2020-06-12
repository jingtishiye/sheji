<?php
header("content-type:text/html;charset=utf-8");
$title=$_POST['title'];
$url=$_POST['url'];
@$px_id=$_POST['px_id'];
$data=date('Y-m-d/h:i:s');
$weizhi=$_POST['radio'];

$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

if($title<>""  and $url<>"" and $px_id<>""){
	$error=$_FILES["image"]["error"];
	$tmpname=$_FILES["image"]["tmp_name"];
	$name=$_FILES["image"]["name"];
	$size=$_FILES["image"]["size"];
	$type=$_FILES["image"]["type"];
	if($name<>""){
		if(!in_array($type, $uptypes))
		//检查文件类型
		{
			echo "<script>alert('图片格式不支持！支持jpg、png、gif、bmp、jpeg');history.go(-1);</script>";
			exit;
		}
				if(is_uploaded_file($tmpname)){
			$date=date("Y-m-d");
			$imgdir='../pic/upflash/';
			$rootpath='../pic/upflash/'.time().iconv('utf-8','gbk',$name);
			if(!file_exists($imgdir)) mkdir($imgdir);
			if(!move_uploaded_file($tmpname,$rootpath))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image;
		$image='pic/upflash/'.time().$name;
		}
		else{
			$image=$_POST['img'];
		}

			include("../php/dbo.php");
			$_my=new Dbo("insert into tb_flash(title,image,url,px_id,data,weizhi) values('$title','$image','$url','$px_id','$data','$weizhi')",0);
			
			echo "<script>alert('信息添加成功');document.location.href='admin_flash.php';</script>";
			
}else{
	echo "<script>alert('信息不完整！');history.go(-1);</script>";
}
	
	?>