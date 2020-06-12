<?php
@session_start();
$admin=$_SESSION['admins'];
$password=$_SESSION['passwords'];


if($admin=="" or $password==""){

echo"<script>document.location.href='login.php';</script>";

}else{
include("../php/conn.php");	
$rsb=mysql_query("select id from tb_admin where admin='$admin' and passwords='$password' ",$conn);
$numb=mysql_num_rows($rsb);
$arrayb=mysql_fetch_array($rsb);
if ($numb==0){
echo"<script>document.location.href='login.php';</script>";	
} 
mysql_free_result($rsb); 
	
	
}

 

?>