<?php
 include("session.php");
 include("../php/conn.php");
 error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<LINK 
href="systemManager_files/admin_systemmanage_css.css" type=text/css 
rel=stylesheet>
<LINK href="systemManager_files/tablelist.css" type=text/css 
rel=stylesheet>

<title>网站菜单管理</title>
</head>
<body>
 
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666" style="margin-top:10px;">
  <tr>
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">网站菜单管理</div></td>
  </tr>
  <tr>
    <td bgcolor="#ffffff" align="left"><div style="display:block; border:#0 1px solid; font-size:14px; padding:20px 40px; line-height:20px; font-weight:bolder;">
<?php	
	$xxrs=mysql_query("select * from tb_list where bid>0 and sid=0  order by  id  asc",$conn);
	while($arr=mysql_fetch_array($xxrs)){
		
		
?>
	
	
        <?php echo $arr['title'];?></br>
        <div style="font-size:12px; color:#999999;">
     <?php 
	   	$a=$arr['bid'];
	   	$xxrs2=mysql_query("select * from tb_list where bid=$a and sid>0  order by  id",$conn);
	  	
		
       	while($arr2=mysql_fetch_array($xxrs2)){
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		 echo "<img src=\"images/join.gif\"/>".$arr2['title'];
		 echo "</br>";
		 }
		 
		 ?>
         </div>
     
  
  	
	<?php
	};
	mysql_free_result($xxrs);
	mysql_close($conn);
?>

</div>
</td>
</tr>
</table>
</body>
</html>