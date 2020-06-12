<?php 
include("session.php");
error_reporting(0);
include("../php/conn.php");
    $num_admins = mysql_num_rows(mysql_query("select id from tb_admin",$conn));
	$cnum_news = mysql_num_rows(mysql_query("select id from  tb_uyue where sh=0",$conn));
	$num_news  = mysql_num_rows(mysql_query("select id from  tb_uyue",$conn));
	
    $cnum_uysj = mysql_num_rows(mysql_query("select id from tb_uysj where sh=0",$conn));
	$num_uysj  = mysql_num_rows(mysql_query("select id from  tb_uysj",$conn));

	$cnum_ushi = mysql_num_rows(mysql_query("select id from tb_uysf where sh=0",$conn));
	$num_ushi  = mysql_num_rows(mysql_query("select id from  tb_ushe",$conn));
 
	$num_user  = mysql_num_rows(mysql_query("select id from  tb_user where bid=0",$conn));
	$num_user2  = mysql_num_rows(mysql_query("select id from  tb_user where bid=1",$conn));
	$num_user3  = mysql_num_rows(mysql_query("select id from  tb_talk  ",$conn));
	$num_user4  = mysql_num_rows(mysql_query("select id from  xingxis ",$conn));


    $cnum_uygd = mysql_num_rows(mysql_query("select id from tb_uylf where sh=0",$conn));
	$num_uygd  = mysql_num_rows(mysql_query("select id from  tb_uylf",$conn));
	
	$cnum_uyhd = mysql_num_rows(mysql_query("select id from  tb_hbao where sh=0",$conn));
	$num_uyhd  = mysql_num_rows(mysql_query("select id from  tb_hbao",$conn));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>服务器信息</title>
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
</head>

<body>
<table width="100%" border="0" cellspacing="1" align="center" class="font" >
  <tr bgcolor="#FFFFFF">
    <td class="docbutton"><div style="margin-top:10px;">
    
    <div style="margin-top:10px; padding-left:15px; padding-bottom:15px;font-size:16px;">

    </div>
    
        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
          <tr>
            <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">站点信息</div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
                <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
                  <td height="25" width="15%" class="td">管理员个数：</td>
                  <td width="39%"  class="td"><b><?php echo $num_admins?> </b>个</td>
                  <td width="16%"  class="td" style="color:#052B67;">工长预约： </td>
                  <td width="30%"  class="td"><a href="admin_yugong.php?bid=0"><font color="#FF0000"><B><?php echo $cnum_news?>(新)</B></font></a> / <a href="admin_yugong.php"><b><?php echo $num_news?></b></a> 条</td>
                </tr>
                <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
                  <td height="25" width="15%" class="td" style="color:#FF0000;"> 设计师预约：</td>
                  <td class="td"><a href="admin_yushe.php?bid=0"><font color="#FF0000"><B><?php echo $cnum_uysj?>(新)</B></font></a> / <a href="admin_yushe.php"><b><?php echo $num_uysj?></b></a> 条</td>
                  <td class="td" style="color:#0000ff;"> 案例信息：</td>
                  <td class="td"><a href="admin_ushe.php"><b><?php echo $num_ushi?></b></a> 个</td>
                </tr>
                <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
                  <td height="25" width="15%" class="td">工长管理：</td>
                  <td width="39%"  class="td"><a href="admin_user.php?bid=0"><b><?php echo $num_user?></b></a> 个</td>
                  <td width="16%"  class="td" style="color:#052B67;">设计师管理： </td>
                  <td width="30%"  class="td"><a href="admin_user.php?bid=1"><b><?php echo $num_user2?></b></a> 个</td>
                </tr>
                <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
                  <td height="25" width="15%" class="td"  style="color:#E80005;">装修知识：</td>
                  <td width="39%"  class="td"><a href="admin_cate.php"><b><?php echo $num_user3?></b></a> 个</td>
                  <td width="16%"  class="td" style="color:#056718;">工地管理： </td>
                  <td width="30%"  class="td"><a href="admin_product.php"><b><?php echo $num_user4?></b></a> 个</td>
                </tr>
                  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
                  <td height="25" width="15%" class="td">工地参观预约：</td>
                  <td width="39%"  class="td"><a href="admin_thui.php?sid=0"><font color="#FF0000"><B><?php echo $cnum_uygd?>(新)</B></font></a> / <a href="admin_thui.php"><b><?php echo $num_uygd?></b></a> 条</td>
                  <td width="16%"  class="td" style="color:#ff0066;">活动报名： </td>
                  <td width="30%"  class="td"><a href="admin_huo_bm.php?sid=0"><font color="#FF0000"><B><?php echo $cnum_uyhd?>(新)</B></font></a> / <a href="admin_huo_bm.php"><b><?php echo $num_uyhd?></b></a> 条</td>
                </tr>
              </table></td>
          </tr>
        </table>
      </div>
     <!-- <div style="margin-top:10px;">
        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
          <tr>
            <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">版权信息</div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
                <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
                  <td height="25" width="40%" class="td">当前版本</td>
                  <td width="60%"  class="td">NSWEI5.0版本</td>
                </tr>
                <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
                  <td height="25" width="40%" class="td">官方网站</td>
                  <td class="td"><a href="http://www.nswei.com" target="_blank">http://www.nswei.com</a></td>
                </tr>
                <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
                  <td height="25" width="40%" class="td">技术支持</td>
                  <td class="td">新视维网络</td>
                </tr>
              </table></td>
          </tr>
        </table>
      </div>
      
      -->
      </td>
  </tr>
</table>
</body>
</html>
