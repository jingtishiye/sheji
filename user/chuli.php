<?php 
header("content-type:text/html;charset=utf-8");
include("../php/conn.php");
error_reporting(0);

if (!empty($_COOKIE['userid'])){
$userid=$_COOKIE['userid'];
}else{
 
  echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
  exit;
}


$types=trim($_POST['type']);

 if($types=="modinfo"){
	
	$uid=intval(trim($_POST['uid']));
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
	}
	
	$nickname=trim($_POST['nickname']);
	$sex=trim($_POST['sex']);
	$qq=trim($_POST['qq']);
	$s_province=trim($_POST['s_province']);
	$s_city=trim($_POST['s_city']);
	$address=trim($_POST['address']);
 
	
 
	$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

 
 
	
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
		}else{
			$image1=trim($_POST["pic1"]);
		}
	
 

 
	if ($uid>0 and $nickname<>""){	
 
    mysql_query("update tb_user set relname='$nickname',img='$image1',sex='$sex',qq='$qq',sadd1='$s_province',sadd2='$s_city',jiguan='$address'  where  id=$uid  ",$conn);
	 echo "<script>alert('会员信息修改成功！');window.location.href='yz_mod.php';</script>";
 
 
	
   }


 } elseif($types=="addzx"){
	
	$bname=trim($_POST['bname']);
	$tel=trim($_POST['tel']);
	 $uid=intval(trim($_POST['uid']));
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
	}
	$s_province=trim($_POST['s_province']);
	$s_city=trim($_POST['s_city']);
	$qname=trim($_POST['qname']);
	
 
	
	$leix=trim($_POST['leix']);
	$mjs=trim($_POST["mjs"]);
	$fangs=trim($_POST["fangs"]);
	$ysuan=trim($_POST["ysuan"]);
	$ltime=trim($_POST["ltime"]);
	$ztime=trim($_POST["ztime"]);
	$bei=trim($_POST["bei"]);
	
	
 
 
if ($uid==""){
	 $uid=0;
}
 
	
 
    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

 
	if ($uid>0 and $bname<>""){	
 
    mysql_query("insert into tb_zbiao(bname,uid,tel,sadd1,sadd2,data,qname,mjs,fangs,leix,ysuan,ztime,ltime,bei) values('$bname','$uid','$tel','$s_province','$s_city','$datas','$qname','$mjs','$fangs','$leix','$ysuan','$ztime','$ltime','$bei')",$conn);
	 echo "<script>alert('您的信息添加成功，我们客服在审核中！');window.location.href='yz_zb.php';</script>";
 
 
   }
} elseif($types=="modzx"){
	
	$bname=trim($_POST['bname']);
	$tel=trim($_POST['tel']);
	 $uid=intval(trim($_POST['uid']));
	 $editid=intval(trim($_POST['editid']));
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
	}
	$s_province=trim($_POST['s_province']);
	$s_city=trim($_POST['s_city']);
	$qname=trim($_POST['qname']);
	
 
	
	$leix=trim($_POST['leix']);
	$mjs=trim($_POST["mjs"]);
	$fangs=trim($_POST["fangs"]);
	$ysuan=trim($_POST["ysuan"]);
	$ltime=trim($_POST["ltime"]);
	$ztime=trim($_POST["ztime"]);
	$bei=trim($_POST["bei"]);
	
	
 
	
 
    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

 
	if ($uid>0 and $bname<>""){	
 
     mysql_query("update tb_zbiao set  bname='$bname',tel='$tel',sadd1='$s_province',sadd2='$s_city',qname='$qname',mjs='$mjs',fangs='$fangs',leix='$leix',ysuan='$ysuan',ztime='$ztime',ltime='$ltime',bei='$bei' where id=$editid ",$conn);
  
	 echo "<script>alert('您的信息修改成功，我们客服在审核中！');window.location.href='yz_zb.php';</script>";
 
 
   }  
 
 
 } elseif($types=="addgd"){
	
	$title=trim($_POST['title']);
$mjs=trim($_POST['mjs']);
$qid=trim($_POST['qid']);
$bid=trim($_POST['bid']);
	 $uid=intval(trim($_POST['uid']));
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
	}

$imgs=trim($_POST['img']);

$qname=trim($_POST['qname']);
$fangx=trim($_POST['fangx']);
$hprice=trim($_POST['hprice']);
$ktime=trim($_POST['ktime']); 

$yname=trim($_POST['yname']);
$contents=trim($_POST["content"]);
	
	
 
if ($qid==""){
$qid=0;
}
if ($bid==""){
$bid=0;
}
 
if ($ktime<>""){
$ktime=date("Y-m-d",strtotime($ktime));
}

 
    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

if ($contents<>""){
$contents=str_replace("'","",$contents);  
$contents=str_replace("white-space:nowrap;","",$contents); 
}
	
 
	if ($uid>0 and $qid>0 and $bid>0 and $title<>""){	
 
    mysql_query("insert into xingxis(title,mjs,uid,qid,bid,xqus,img,yname,data,fangx,hprice,ktime,content) values('$title','$mjs','$uid','$qid','$bid','$qname','$imgs','$yname','$datas','$fangx','$hprice','$ktime','$contents')",$conn);
	 echo "<script>alert('工地添加成功！');window.location.href='gz_gd.php';</script>";
 
 
   }
 
} elseif($types=="modgd"){
	
	$id=intval(trim($_POST['id']));
	$title=trim($_POST['title']);
$mjs=trim($_POST['mjs']);
$qid=trim($_POST['qid']);
$bid=trim($_POST['bid']);
	 $uid=intval(trim($_POST['uid']));
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
	}

$imgs=trim($_POST['img']);

$qname=trim($_POST['qname']);
$fangx=trim($_POST['fangx']);
$hprice=trim($_POST['hprice']);
$ktime=trim($_POST['ktime']); 

$yname=trim($_POST['yname']);
$contents=trim($_POST["content"]);
	
	
 
if ($qid==""){
$qid=0;
}
if ($bid==""){
$bid=0;
}
 
if ($ktime<>""){
$ktime=date("Y-m-d",strtotime($ktime));
}

 
if ($contents<>""){
$contents=str_replace("'","",$contents);  
$contents=str_replace("white-space:nowrap;","",$contents); 
}
	
 
	if ($id>0 and $qid>0 and $bid>0 and $title<>""){	
include("../php/dbo.php");

$_my=new Dbo("update xingxis set title='$title',mjs='$mjs',bid='$bid',qid='$qid',yname='$yname',xqus='$qname',fangx='$fangx',img='$imgs',ktime='$ktime',hprice='$hprice',content='$contents' where id=$id",0);

	 echo "<script>alert('工地修改成功！');window.location.href='gz_gd.php';</script>";
 
 
   }

  
}elseif($types=="modpic"){
	
	$uid=trim($_POST['uid']);
    
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
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
		}else{
			$image1=trim($_POST["pic1"]);
		}
	
 

 
	if ($uid>0 and $image1<>""){	
 
    mysql_query("update tb_user  set  sfzimg='$image1'  where id=$uid ",$conn);
	 echo "<script>alert('您的身份证件照片上传成功！');window.location.href='gz_pic.php';</script>";
 
 
   }else{
	  echo "<script>alert('没有上传照片！');history.go(-1);</script>";
	  exit; 
   }



 }elseif($types=="regadd"){
	
	$title=trim($_POST['username']);
	$uname=trim($_POST['uname']);
	$cityid=trim($_POST['cityid']);
	$utel=trim($_POST['utel']);
	$password=trim($_POST['password']);
	$ytel=trim($_POST['ytel']);
 
	if ($cityid==""){
		$cityid=0;
	}
	
	if ($utel<>""){
	$rsz=mysql_query("select id from tb_user where tel='$ytel'",$conn);
     $arrayz=mysql_fetch_array($rsz);
	 $yqid=$arrayz['id'];
     mysql_free_result($rsz); 
 
		
	}
	if ($password<>""){
		$pwd=md5($password);
	}
	
 
    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

	
$sql=mysql_query("select id from tb_user  where ( username='$title'  and sh<2 )  or  tel='$utel' ",$conn);
	$num=mysql_num_rows($sql);
	$result=mysql_fetch_array($sql);
	if ($num>0){	
       echo '0';
	}else{
       echo '1';
    mysql_query("insert into tb_user(username,relname,tel,passwords,zcdata,yqid1,bid,cityid) values('$title','$uname','$utel','$pwd','$datas','$yqid',1,'$cityid')",$conn);
    
	$rsg=mysql_query("select id from tb_user where username='$title' ",$conn);
	$arrayg=mysql_fetch_array($rsg);
	setcookie("userid",$arrayg["id"],time()+7*24*3600);
    mysql_free_result($rsg);
   }
   
   
 } elseif($types=="loginadd"){
	
	$title=trim($_POST['username']);
	$password=trim($_POST['password']);
 

	
	if ($title<>""){
	$rsz=mysql_query("select id from tb_users where u_user='$title' or u_tel='$title' ",$conn);
	$numz=mysql_num_rows($rsz);
     $arrayz=mysql_fetch_array($rsz);
	 if ($numz==0){	
	  echo '2';
	  exit;
	 }
     mysql_free_result($rsz); 
 
		
	}
 
 
    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

	
$sql=mysql_query("select id from tb_users where (u_user='$title' or u_tel='$title') and  u_pwd='$password'",$conn);
	$nums=mysql_num_rows($sql);
	$result=mysql_fetch_array($sql);
	if ($nums==0){	
       echo '0';
	}else{
       echo '1';
    mysql_query("update tb_users set u_count=u_count+1,dldata='$datas' where id=$result[id]",$conn);
    
 
	setcookie("userid",$result["id"],time()+7*24*3600);
  
   }
 
 

 } elseif($types=="modmi"){
	
	$oldPwd=trim($_POST['oldPwd']);
	$newPwd=trim($_POST['newPwd']);
 
 
 
	
	if ($userid>0){
	$rsz=mysql_query("select  passwords from tb_user  where id=$userid  ",$conn);
	$numz=mysql_num_rows($rsz);
     $arrayz=mysql_fetch_array($rsz);
	 if ($numz==0){	
	  echo '3';
	  exit;
	 }else{
		$omima=md5($oldPwd);
		if ($arrayz["passwords"]<>$omima){ 
		 echo '2';
	     exit;
		
		}
		 
	 }
     mysql_free_result($rsz); 
 
		
	}
 
    echo '1';
	
	$nmima=md5($newPwd);
	
    mysql_query("update tb_user  set passwords='$nmima' where id=$userid",$conn);
    
   
 }elseif($types=="modgz"){
	
	$uid=intval(trim($_POST['uid']));
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
	}
	
	$nickname=trim($_POST['nickname']);
	$sex=trim($_POST['sex']);
	$uemail=trim($_POST['uemail']);
	$gzs=trim($_POST['jiguan']);
	$glid=trim($_POST['glid']);
	$s_province=trim($_POST['s_province']);
	$s_city=trim($_POST['s_city']);
	$jquyu=trim($_POST['jquyu']);
	$beis=trim($_POST['intro']);
 
	
 
	$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

 
 
	
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
		}else{
			$image1=trim($_POST["pic1"]);
		}
	
 

 
	if ($uid>0 and $nickname<>""){	
 
    mysql_query("update tb_user set relname='$nickname',img='$image1',sex='$sex',uemail='$uemail',sadd1='$s_province',sadd2='$s_city',jiguan='$gzs',glid='$glid',jquyu='$jquyu',bei='$beis'  where  id=$uid  ",$conn);
	 echo "<script>alert('工长信息修改成功！');window.location.href='gz_mod.php';</script>";
 
 
	
   }


 }elseif($types=="modsjs"){
	
	$uid=intval(trim($_POST['uid']));
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
	}
	
	$nickname=trim($_POST['nickname']);
	$sex=trim($_POST['sex']);
	$uemail=trim($_POST['uemail']);
	$sprice=trim($_POST['sprice']);
	$glid=trim($_POST['glid']);
	$s_province=trim($_POST['s_province']);
	$s_city=trim($_POST['s_city']);
	$jquyu=trim($_POST['jquyu']);
	$beis=trim($_POST['intro']);
 
	
 
	$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

 
 
	
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
		}else{
			$image1=trim($_POST["pic1"]);
		}
	
 

 
	if ($uid>0 and $nickname<>""){	
 
    mysql_query("update tb_user set relname='$nickname',img='$image1',sex='$sex',uemail='$uemail',sadd1='$s_province',sadd2='$s_city',sprice='$sprice',glid='$glid',sfeng='$jquyu',bei='$beis'  where  id=$uid  ",$conn);
	 echo "<script>alert('设计师信息修改成功！');window.location.href='sjs_mod.php';</script>";
 
 
	
   }


 }elseif($types=="modspic"){
	
	$uid=trim($_POST['uid']);
    
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
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
		}else{
			$image1=trim($_POST["pic1"]);
		}
	
 

 
	if ($uid>0 and $image1<>""){	
 
    mysql_query("update tb_user  set  sfzimg='$image1'  where id=$uid ",$conn);
	 echo "<script>alert('您的身份证件照片上传成功！');window.location.href='sjs_pic.php';</script>";
 
 
   }else{
	  echo "<script>alert('没有上传照片！');history.go(-1);</script>";
	  exit; 
   }



 } elseif($types=="addsjs"){
	
	$title=trim($_POST['title']);
     $bid=trim($_POST['bid']);
	 $uid=intval(trim($_POST['uid']));
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
	}

$imgs=trim($_POST['img']);

$hxs=trim($_POST['hxs']);
$jtitle=trim($_POST['jtitle']);
$mjs=trim($_POST['mjs']);
$hprice=trim($_POST['hprice']);
 
$contents=trim($_POST["content"]);
	
	
 
if ($bid==""){
$bid=0;
}
 
 

 
    date_default_timezone_set('PRC');
	$datas=date("Y-m-d G:i:s");

if ($contents<>""){
$contents=str_replace("'","",$contents);  
$contents=str_replace("white-space:nowrap;","",$contents); 
}
	
 
	if ($uid>0 and  $bid>0 and $title<>""){	
 
    mysql_query("insert into tb_ushe(title,jtitle,mjs,bid,uid,content,data,img,hprice,hxs) values('$title','$jtitle','$mjs','$bid','$uid','$contents','$datas','$imgs','$hprice','$hxs')",$conn);
	 echo "<script>alert('设计师案例添加成功！');window.location.href='sjs_case.php';</script>";
 
 
   }
   
   
 }elseif($types=="modcase"){
	
	$id=intval(trim($_POST['id']));
	$title=trim($_POST['title']);
$mjs=trim($_POST['mjs']);
$hxs=trim($_POST['hxs']);
$bid=trim($_POST['bid']);
	 $uid=intval(trim($_POST['uid']));
	
	if ($uid<>$userid){
		 echo "<script>alert('请登录！');document.location.href='/member/login.php';</script>";	
         exit;
	}

$imgs=trim($_POST['img']);

 
$jtitle=trim($_POST['jtitle']);
$hprice=trim($_POST['hprice']);
 
$contents=trim($_POST["content"]);
	
 
if ($bid==""){
$bid=0;
}
 
 
 
if ($contents<>""){
$contents=str_replace("'","",$contents);  
$contents=str_replace("white-space:nowrap;","",$contents); 
}
	
 
	if ($id>0 and  $bid>0 and $title<>""){	
include("../php/dbo.php");

$_my=new Dbo("update tb_ushe set title='$title',mjs='$mjs',bid='$bid',hxs='$hxs',jtitle='$jtitle',img='$imgs',hprice='$hprice',content='$contents' where id=$id",0);

	 echo "<script>alert('设计师案例修改成功！');window.location.href='sjs_case.php';</script>";
 
 
   }
}
  
mysql_close($conn);
?>
