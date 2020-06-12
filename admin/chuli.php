<?php 
error_reporting(0);
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php

if($_GET["act"]=="mod"){

	$shid=trim($_POST['shid']);
	$cnid=trim($_POST['cnid']);
	$id=intval($_GET['id']);
	$bid=trim($_POST['bid']);
	$gourl=trim($_POST['gourl']);

if ($cnid==""){
	$cnid=0;
}

    include("../php/dbo.php");

	if ($cnid==0){
	    $_my=new Dbo("update tb_huis set shid='$shid'  where id='$id' ",0);
	}else{
		$_my=new Dbo("update tb_huis set shid='$shid',cnid='$cnid'  where id='$id' ",0);
		$_my=new Dbo("update tb_honors set jjs=1  where id='$bid' ",0); 
	}

	echo "<script>window.location.href='$gourl'</script>";



}

	mysql_close($conn);

?>

 