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
<title>前台导航管理</title>
</head>

<body>
<div style="margin-top:10px;">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
    <tr>
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">前台导航管理</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" >
          <?php

				

				$pagesize=15;

				$rs=mysql_query("select id from menus",$conn);

				$num=mysql_num_rows($rs);

				$pagemax=ceil($num/$pagesize);

				mysql_free_result($rs);

				$page=$_GET["page"];

				if($page<1) $page=1;

				if($page>$pagemax) $page=$pagemax;

				$p=($page-1)*$pagesize;

				$xxrs=mysql_query("select * from menus order by px_id asc limit $p,$pagesize",$conn);

				if($num>0):		

				while($array=mysql_fetch_array($xxrs)):

			?>
          <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td width="9%" class="td">ID：<?php echo $array["id"]?></td>
            <td width="27%" class="td td3" align="left">名称： <?php echo $array["title"]?></td>
            <td width="18%" class="td td3" align="left">链接： <?php echo $array["links"]?></td>
            <td width="14%" class="td">排序：<?php echo $array["px_id"]?></td>
            <td width="32%" class="td"><input type="button" onclick="window.location.href='?action1=mod&did=<?php echo $array["id"]?>#dalei' " name="button2" id="button2" value=" 修 改 "  class="btn"/>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="button" name="Submit" value=" 删 除 " onClick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='admin_qmenu.php?act=del&dd=<?php echo $array["id"]?>';}else{history.go(0);}"  class="btn"/></td>
          </tr>
          <?php

				 endwhile;

				 mysql_free_result($xxrs);

				

				?>
          <tr bgcolor="#F1F5F8" align="center" >
            <form id="form1" name="form1" method="get" action="">
              <td colspan="5" align="right" class="td"><a href="admin_qmenu.php?page=1">首页</a> <a href="admin_qmenu.php?page=<?php echo ($page-1)?>">上一页</a> <a href="admin_qmenu.php?page=<?php echo ($page+1)?>">下一页</a> <a href="admin_qmenu.php?page=<?php echo $pagemax?>">尾页</a> 当前第<?php echo $page?>/<?php echo $pagemax?>页
                <input name="page" type="text" id="page" size="2" />
                <input type="submit" name="Submit" value="GO" /></td>
            </form>
          </tr>
          <?php else:?>
          <div style=" padding:20px;font-size:14px; color:#990000; font-weight:bold; text-align:center">暂时还没有信息！</div>
          <?php endif;?>
        </table></td>
    </tr>
  </table>
</div>
<div style="margin-top:10px">
  <?php

$action1=trim($_GET["action1"]);
if ($action1=="mod"){
 $did=trim($_GET["did"]);


	$rs1=mysql_query("select * from menus where id='$did'",$conn);
	$array1=mysql_fetch_array($rs1);

 

?>
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
    <form action="admin_qmenu.php?act=edit" method="post" name="add" enctype="multipart/form-data">
      <input name="id" type="hidden"  value="<?php echo $array1["id"]?>" />
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改前台导航</div>
          <a name="dalei"></a></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF" >
              <td height="25" width="19%" class="td">名 称：</td>
              <td width="81%"  class="td"><input type="text" name="title" id="title" size="30" value="<?php echo $array1["title"]?>" />
                <font color="#FF0000"> * </font>分类名称与前面的不可重复！</td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" width="16%" class="td">链接</td>
              <td class="td"><input name="links" type="text" id="links"  size="30" value="<?php echo $array1["links"]?>"/></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td width="19%" height="13" class="td">排序ID：</td>
              <td class="td"><input type="text" name="px_id" id="px_id" size="30"  value="<?php echo $array1["px_id"]?>"/>
                <font color="#FF0000"> * </font>数字越小越靠前！</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#F1F5F8">
              <td height="25" class="td">&nbsp;</td>
              <td class="td"><input type="submit" name="button" id="button" value="确认修改"  class="btn"/></td>
            </tr>
          </table></td>
      </tr>
    </form>
  </table>
  <?php 
mysql_free_result($rs1);

}  

if ($action1==""){

?>
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
    <form action="admin_qmenu.php?act=add" method="post" name="add" enctype="multipart/form-data">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">增加前台导航</div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF" >
              <td height="25" width="19%" class="td">名 称：</td>
              <td width="81%"  class="td"><input type="text" name="title" id="title" size="30"  />
                <font color="#FF0000"> * </font>分类名称与前面的不可重复！</td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" width="16%" class="td">链接</td>
              <td class="td"><input name="links" type="text" id="links"  size="30" /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td width="19%" height="13" class="td">排序ID：</td>
              <td class="td"><input type="text" name="px_id" id="px_id" size="30"  />
                <font color="#FF0000"> * </font>数字越小越靠前！</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#F1F5F8">
              <td height="25" class="td">&nbsp;</td>
              <td class="td"><input type="submit" name="button" id="button" value="提交数据"  class="btn"/></td>
            </tr>
          </table></td>
      </tr>
    </form>
  </table>
  <?php

}

?>
</div>
</body>
</html>
<?php

	$act=trim($_GET["act"]);
	$id=trim($_POST["id"]);
	$title=trim($_POST["title"]);
	$links=trim($_POST["links"]);
	$px_id=trim($_POST["px_id"]);

	if($act=="edit" and $id<>"" and $title<>"" and $px_id<>""){

 
		include("../php/conn.php");

		mysql_query("update menus set  title='$title',px_id='$px_id',links='$links'  where  id='$id'",$conn);

		echo"<script>alert('类别修改成功!');window.location.href='admin_qmenu.php';</script>" ; 

		mysql_close($conn);

	}	

	

	$dd=$_GET["dd"];

	if($act=='del' and $dd<>""){

		include("../php/conn.php");

		mysql_query("delete from menus where  id='$dd'",$conn);

		echo"<script>alert('类别删除成功!');window.location.href='admin_qmenu.php';</script>" ; 

		mysql_close($conn);

	}

	

	if($act=='add' and $title<>"" and $px_id<>""){


		include("../php/conn.php");

		mysql_query("insert into menus(title,px_id,links) values('$title','$px_id','$links')",$conn);

		echo"<script>alert('类别添加成功!');window.location.href='admin_qmenu.php';</script>" ; 

		mysql_close($conn);

	}

?>
