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
<title>7天旧房翻新报名信息查看处理</title>
<style type="text/css">
<!--
.STYLE1 {
	color: #000000
}
.bai {
	color:#FFFFFF;
	font-size:12px;
	font-weight:bold;
	text-align:center;
	font-family:"宋体";
}
-->
</style>
 
</head>

<body>
<div style="margin-top:10px;">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
    <tr>
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">7天旧房翻新报名信息查看处理</div></td>
    </tr>
    <tr>
      <td align="center"  bgcolor="#FFFFFF"><?php

$id=intval(trim($_GET["id"]));
if($id>0){

	$rs=mysql_query("select * from tb_utao3  where   id=$id",$conn);
	$array=mysql_fetch_array($rs);

?>
        <table width="920"   align="center"  cellspacing="0"  style="margin:5px  auto;"  >
          <tr>
            <td  bgcolor="#ffffff" height="35" style="color:#990033; font-size:14px;"><div align="center">7天旧房翻新报名信息</strong></div></td>
          </tr>
          <tr >
            <td   align="center" valign="middle" bgcolor="#ffffff" style="font-family:'微软雅黑'; font-size:14px;"><table  width="98%" cellpadding="0" cellspacing="1" bgcolor="#cccccc"  align="center"  class="order-table" id="address_table">
                <tr  bgcolor="#ffffff">
                  <td width="169" height="35" style="text-align:right">姓 名：</td>
                  <td colspan="3" style="text-align:left"><?php echo $array['bname']?></td>
                   
                </tr>
                 
                <tr  bgcolor="#ffffff">
                  <td style="text-align:right"  height="35">手 机：</td>
                  <td width="173"   style="text-align:left"><?php echo $array['tel']?></td>
                  <td width="223" style="text-align:right"> </td>
                  <td width="328"  style="text-align:left"> </td>
                </tr>
           
                <tr  bgcolor="#ffffff">
                  <td height="30" style="text-align:right">地区：</td>
                  <td  style="text-align:left"><?php echo $array['sadd1']?><?php echo $array['sadd2']?></td>
                  <td  style="text-align:right"> </td>
                  <td  style="text-align:left"> </td>
                </tr>
         <form name="form1" id="form1" method="post" action="mchuli.php?act=utao3&id=<?php echo $array['id']?>">
                  <tr  bgcolor="#ffffff">
                    <td style="text-align:right; color:#FF0000;"><b>处理信息： </b></td>
                    <td colspan="3" height="35" style="text-align:left"><?php if ($array['sh']==0) {?>
                      <font color="#ff0000">待处理</font>
                      <?php }elseif ($array['sh']==1) {?>
                      <font color="#0000ff">已处理</font>
                      <?php } ?>
                      <?php if($array['sh']<1){?>
                      <select name="sh"  >
                        <?php if($array['sh']==0){?>
                        <option value="1"  >—>确定已处理</option>
                        <?php } ?>
                      </select>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="submit"   value=" 提 交 "   class="btn" />
                      <?php }?></td>
                  </tr>
                </form>
                <tr  bgcolor="#ffffff">
                  <td style="text-align:right; color:#000099;" height="35"><b>预约时间： </b></td>
                  <td colspan="3" style="text-align:left"><?php echo $array['data']?></td>
                </tr>
                <tr>
                  <td colspan="4" align="center"  bgcolor="#ffffff">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4" align="center"  bgcolor="#ffffff"><div class="clear" style="height:10px"></div>
                    <input type="button"   value="返回信息列表" onClick="location.href = 'admin_utao3.php';"  class="btn" />
                    <div class="clear" style="height:10px"></div></td>
                </tr>
              </table>
              <?php

mysql_free_result($rs);

}

?></td>
          </tr>
        </table></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php 
 mysql_close($conn);
?>
