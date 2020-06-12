<?php 
ob_start();
include("../php/conn.php");

$bid=intval($_GET['bid']);
 



define("FILETYPE","xls");

header("Content-type:application/vnd.ms-excel"); 
if(FILETYPE=="xls")
header("Content-Disposition:filename=我想团购报名表.xls"); 
else
header("Content-Disposition:filename=我想团购报名表.csv"); 

 

echo "报名人姓名\t报名团购\t报名人电话\t报名人小区\t报名人数\t推荐人\t报名时间\n"; 
//echo "efg\t\hij\t\n"; 

if($bid>0){
	$tiaos="where bid=$bid";
}

 $rs5=mysql_query("select * from tb_stug $tiaos  order by id desc",$conn);
 $k=1;
 while($array5=mysql_fetch_array($rs5)):
 
  if ($array5['bid']>0) {
  $rsb=mysql_query("select title  from stuan where  id=$array5[bid]",$conn);
  $arrayb=mysql_fetch_array($rsb);
	$titles=$arrayb["title"];
  mysql_free_result($rsb);
}
	
 if ($k>1){
	 echo "\n";
 }
 echo $array5["bname"]."\t".$titles."\t".$array5["tel"]."\t".$array5["xqus"]."\t".$array5["bms"]."\t".$array5["tjren"]."\t".$array5["data"]; 
 
 $k++;
 endwhile;
 mysql_free_result($rs5);

 
  mysql_close($conn);
?> 
