<?php

header("content-type:text/html;charset=utf-8");



$id=intval(trim($_POST["id"]));
$bid=trim($_POST['bid']);
$title=trim($_POST['title']);
$jdid=trim($_POST['jdid']);
$ysid=trim($_POST['ysid']);

$img=trim($_POST['img']);
$ytime=trim($_POST['ytime']);
$yneir=trim($_POST['yneir']);
$content=trim($_POST['content']);



if ($jdid==""){
$jdid=0;
}

if ($ysid==""){
$ysid=0;
}


if ($bid==""){
$bid=0;
}


$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

if($title<>""   and $content<>""){

$content=str_replace("'","",$content);  
$content=str_replace("white-space:nowrap;","",$content); 

$error1=$_FILES["image1"]["error"];
	$tmpname1=$_FILES["image1"]["tmp_name"];
	$name1=$_FILES["image1"]["name"];
	$size1=$_FILES["image1"]["size"];
	$type1=$_FILES["image1"]["type"];
	if($name1<>""){
		if(!in_array($type1, $uptypes))
		//检查文件类型
		{
			echo "<script>alert('图片格式不支持！支持jpg、png、gif、bmp、jpeg');history.go(-1);</script>";
			exit;
		}
		if(is_uploaded_file($tmpname1)){
			$date1=date("Y-m-d");
			$imgdir1='../uploadfile/upshop/';
			$rootpath1='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name1);
			if(!file_exists($imgdir1)) mkdir($imgdir1);
			if(!move_uploaded_file($tmpname1,$rootpath1))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image1;
		$image1='/uploadfile/upshop/'.time().$name1;
		}
		else{
			$image1=$_POST['pic1'];
		}
		
    $error2=$_FILES["image2"]["error"];
	$tmpname2=$_FILES["image2"]["tmp_name"];
	$name2=$_FILES["image2"]["name"];
	$size2=$_FILES["image2"]["size"];
	$type2=$_FILES["image2"]["type"];
	if($name2<>""){
	 
		if(is_uploaded_file($tmpname2)){
			$date2=date("Y-m-d");
			$imgdir2='../uploadfile/upshop/';
			$rootpath2='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name2);
			if(!file_exists($imgdir2)) mkdir($imgdir2);
			if(!move_uploaded_file($tmpname2,$rootpath2))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image2;
		$image2='/uploadfile/upshop/'.time().$name2;
		}
		else{
			$image2=$_POST['pic2'];
		}
		
		
    $error3=$_FILES["image3"]["error"];
	$tmpname3=$_FILES["image3"]["tmp_name"];
	$name3=$_FILES["image3"]["name"];
	$size3=$_FILES["image3"]["size"];
	$type3=$_FILES["image3"]["type"];
	if($name3<>""){
	 
		if(is_uploaded_file($tmpname3)){
			$date3=date("Y-m-d");
			$imgdir3='../uploadfile/upshop/';
			$rootpath3='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name3);
			if(!file_exists($imgdir3)) mkdir($imgdir3);
			if(!move_uploaded_file($tmpname3,$rootpath3))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image3;
		$image3='/uploadfile/upshop/'.time().$name3;
		}
		else{
			$image3=$_POST['pic3'];
		}
	$error4=$_FILES["image4"]["error"];
	$tmpname4=$_FILES["image4"]["tmp_name"];
	$name4=$_FILES["image4"]["name"];
	$size4=$_FILES["image4"]["size"];
	$type4=$_FILES["image4"]["type"];
	if($name4<>""){
	 
		if(is_uploaded_file($tmpname4)){
			$date4=date("Y-m-d");
			$imgdir4='../uploadfile/upshop/';
			$rootpath4='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name4);
			if(!file_exists($imgdir4)) mkdir($imgdir4);
			if(!move_uploaded_file($tmpname4,$rootpath4))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image4;
		$image4='/uploadfile/upshop/'.time().$name4;
		}
		else{
			$image4=$_POST['pic4'];
		}
	$error5=$_FILES["image5"]["error"];
	$tmpname5=$_FILES["image5"]["tmp_name"];
	$name5=$_FILES["image5"]["name"];
	$size5=$_FILES["image5"]["size"];
	$type5=$_FILES["image5"]["type"];
	if($name5<>""){
	 
		if(is_uploaded_file($tmpname5)){
			$date5=date("Y-m-d");
			$imgdir5='../uploadfile/upshop/';
			$rootpath5='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name5);
			if(!file_exists($imgdir5)) mkdir($imgdir5);
			if(!move_uploaded_file($tmpname5,$rootpath5))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image5;
		$image5='/uploadfile/upshop/'.time().$name5;
		}
		else{
			$image5=$_POST['pic5'];
		}
		
	$error6=$_FILES["image6"]["error"];
	$tmpname6=$_FILES["image6"]["tmp_name"];
	$name6=$_FILES["image6"]["name"];
	$size6=$_FILES["image6"]["size"];
	$type6=$_FILES["image6"]["type"];
	if($name6<>""){
	 
		if(is_uploaded_file($tmpname6)){
			$date6=date("Y-m-d");
			$imgdir6='../uploadfile/upshop/';
			$rootpath6='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name6);
			if(!file_exists($imgdir6)) mkdir($imgdir6);
			if(!move_uploaded_file($tmpname6,$rootpath6))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image6;
		$image6='/uploadfile/upshop/'.time().$name6;
		}
		else{
			$image6=$_POST['pic6'];
		}
		
	$error7=$_FILES["image7"]["error"];
	$tmpname7=$_FILES["image7"]["tmp_name"];
	$name7=$_FILES["image7"]["name"];
	$size7=$_FILES["image7"]["size"];
	$type7=$_FILES["image7"]["type"];
	if($name7<>""){
	 
		if(is_uploaded_file($tmpname7)){
			$date7=date("Y-m-d");
			$imgdir7='../uploadfile/upshop/';
			$rootpath7='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name7);
			if(!file_exists($imgdir7)) mkdir($imgdir7);
			if(!move_uploaded_file($tmpname7,$rootpath7))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image7;
		$image7='/uploadfile/upshop/'.time().$name7;
		}
		else{
			$image7=$_POST['pic7'];
		}
 
    $error8=$_FILES["image8"]["error"];
	$tmpname8=$_FILES["image8"]["tmp_name"];
	$name8=$_FILES["image8"]["name"];
	$size8=$_FILES["image8"]["size"];
	$type8=$_FILES["image8"]["type"];
	if($name8<>""){
	 
		if(is_uploaded_file($tmpname8)){
			$date8=date("Y-m-d");
			$imgdir8='../uploadfile/upshop/';
			$rootpath8='../uploadfile/upshop/'.time().iconv('utf-8','gbk',$name8);
			if(!file_exists($imgdir8)) mkdir($imgdir8);
			if(!move_uploaded_file($tmpname8,$rootpath8))
			{
				echo "<script>alert('文件上传失败！');history.go(-1);</script>";
				exit;
			}
	  	}
		global $image8;
		$image8='/uploadfile/upshop/'.time().$name8;
		}
		else{
			$image8=$_POST['pic8'];
		}

		include("../php/dbo.php");

		$_my=new Dbo("update tb_tuangou set title='$title',ytime='$ytime',jdid='$jdid',yneir='$yneir',content='$content',img='$img',ysid='$ysid',img1='$image1',img2='$image2',img3='$image3',img4='$image4',img5='$image5',img6='$image6',img7='$image7',img8='$image8' where id=$id",0);

		echo "<script>alert('修改成功！');document.location.href='admin_tuangou.php?bid=$bid';</script>";

}else{

	echo "<script>alert('信息不完整！');history.go(-1);</script>";

}

 

?>

