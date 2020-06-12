<?php 
error_reporting(0);
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php

if(trim($_GET["act"])=="utao1"){
	$id=intval($_GET['id']);
	$sh=trim($_POST['sh']);
if ($sh==""){
	$sh=0;
}
    include("../php/dbo.php");
	if ($id>0){
		$_my=new Dbo("update tb_utao1 set sh=1  where id='$id' ",0); 
	}
	echo "<script>window.location.href='admin_utao1_xx.php?id=$id'</script>";
	
	
}elseif(trim($_GET["act"])=="utao2"){
	$id=intval($_GET['id']);
	$sh=trim($_POST['sh']);
if ($sh==""){
	$sh=0;
}
    include("../php/dbo.php");
	if ($id>0){
		$_my=new Dbo("update tb_utao2 set sh=1  where id='$id' ",0); 
	}
	echo "<script>window.location.href='admin_utao2_xx.php?id=$id'</script>";
	
	
}elseif(trim($_GET["act"])=="utao3"){
	$id=intval($_GET['id']);
	$sh=trim($_POST['sh']);
if ($sh==""){
	$sh=0;
}
    include("../php/dbo.php");
	if ($id>0){
		$_my=new Dbo("update tb_utao3 set sh=1  where id='$id' ",0); 
	}
	echo "<script>window.location.href='admin_utao3_xx.php?id=$id'</script>";
}

	mysql_close($conn);

?>

 