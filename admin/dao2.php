<?php 
ob_start();
include("../php/conn.php");
$bid=intval($_GET['bid']);
 

if($bid>0){

 		

define("FILETYPE","xls");

header("Content-type:application/vnd.ms-excel"); 
if(FILETYPE=="xls")
header("Content-Disposition:filename=参团活动报名表.xls"); 
else
header("Content-Disposition:filename=参团活动报名表.csv"); 

 

echo "报名人姓名\t报名活动\t报名人电话\t报名人QQ\t报名人小区\t报名时间\n"; 
//echo "efg\t\hij\t\n"; 

 $rs5=mysql_query("select * from tb_ubao where bid=$bid order by id desc",$conn);
 $k=1;
 while($array5=mysql_fetch_array($rs5)):
 
  $rsb=mysql_query("select title  from tb_honors where  id=$array5[bid]",$conn);
  $arrayb=mysql_fetch_array($rsb);
	$titles=$arrayb["title"];
  mysql_free_result($rsb);

	
 if ($k>1){
	 echo "\n";
 }
 echo $array5["uname"]."\t".$titles."\t".$array5["tel"]."\t".$array5["qqs"]."\t".$array5["xiaoqu"]."\t".$array5["data"]; 
 
 $k++;
 endwhile;
 mysql_free_result($rs5);

 }
 
  mysql_close($conn);
?> 
