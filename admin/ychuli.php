<?php 
error_reporting(0);
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php

if(trim($_GET["act"])=="mod"){

 
	$id=intval($_GET['id']);
	$sh=trim($_POST['sh']);
 
if ($sh==""){
	$sh=0;
}

    include("../php/dbo.php");

	if ($id>0){
	    $_my=new Dbo("update tb_uyue set sh='$sh'  where id='$id' ",0);
	} 

	echo "<script>window.location.href='admin_ygong_xx.php?id=$id'</script>";



}

	mysql_close($conn);

?>

 