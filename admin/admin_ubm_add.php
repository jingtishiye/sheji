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
<title>添加工长评论信息</title>
</head>

<body >
<div style="margin-top:10px;">
  <form  name="form1" method="post" action="admin_ubm_adds.php" enctype="multipart/form-data">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加工长评论信息</div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="35" width="16%" class="td">评论工长</td>
              <td width="84%"  class="td">
 <select name="uyid">
		 <option value="" selected="selected">==选择工长==</option>	 
	<?php
	   	$rs2=mysql_query("select id,relname from tb_user where sh=1 and bid=0 order by  id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
	 <option value="<?php echo $array2['id']?>"  <?php if ($uid==$array2['id']) echo "selected"?> ><?php echo $array2['relname']?></option>
	<?php 
	endwhile;
	mysql_free_result($rs2);
	date_default_timezone_set('PRC');
$datas=date('Y-m-d G:i:s');
	?>		 
	</select>  
              &nbsp; 
            评论时间：<input name="datas" type="text"   size="20"   value="<?php echo $datas?>"/>  </td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="35"  class="td">手机号</td>
              <td class="td"><input name="utel" type="text"   size="20"  maxlength="11" />
                </td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="35"   class="td">评论类型</td>
              <td  class="td"><input type="radio" value="0" name="lxid" checked  />表扬 <input type="radio" value="1" name="lxid"   />投诉</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="35"  class="td">评论内容</td>
              <td class="td"> <textarea name="content"  cols="50" rows="10"  ></textarea>
                </td>
            </tr>
           <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="35" class="td">&nbsp;</td>
              <td class="td"><input type="submit" name="button" id="button" value="确认提交"  class="btn"/></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
 
<?php  mysql_close($conn);?>