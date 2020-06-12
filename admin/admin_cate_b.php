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
<title>装修知识管理</title>
</head>

<body>
<div style="margin-top:10px;">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
    <tr>
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">装修知识分类管理</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="0" >
          <?php

				 

				$pagesize=20;

				$rs=mysql_query("select bid from tb_talk_b",$conn);

				$num=mysql_num_rows($rs);

				$pagemax=ceil($num/$pagesize);

				mysql_free_result($rs);

				$page=$_GET["page"];

				if($page<1) $page=1;

				if($page>$pagemax) $page=$pagemax;

				$p=($page-1)*$pagesize;

				$xxrs=mysql_query("select * from tb_talk_b order by px_id asc limit $p,$pagesize",$conn);

				if($num>0):		

				while($array=mysql_fetch_array($xxrs)):

			?>
          <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <form action="admin_cate_b.php?act=edit" method="post" name="add" >
              <td width="10%" class="td">ID：<?php echo $array["bid"]?>
                <input name="id" id="id" type="hidden" size="5"  value="<?php echo $array["bid"]?>"/></td>
              <td width="30%" class="td"><input name="title" id="title" type="text" value="<?php echo $array["btitle"]?>" size="30"  /></td>
              <td width="35%" class="td"> 排序：
                <input name="px_id" id="px_id" type="text" value="<?php echo $array["px_id"]?>" size="5"  /></td>
              <td width="25%" class="td"><input type="submit" name="button2" id="button2" value=" 修 改 "  class="btn"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="Submit" value=" 删 除 " onClick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='admin_cate_b.php?act=del&dd=<?php echo $array["bid"]?>';}else{history.go(0);}"  class="btn"/></td>
            </form>
          </tr>
          <?php
				 endwhile;
				 mysql_free_result($xxrs);
				?>
          <tr bgcolor="#F1F5F8" align="center" >
            <form id="form1" name="form1" method="get" action="">
              <td colspan="5" align="right" class="td"><a href="admin_cate_b.php?page=1">首页</a> <a href="admin_cate_b.php?page=<?php echo ($page-1)?>">上一页</a> <a href="admin_cate_b.php?page=<?php echo ($page+1)?>">下一页</a> <a href="admin_cate_b.php?page=<?php echo $pagemax?>">尾页</a> 当前第<?php echo $page?>/<?php echo $pagemax?>页
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
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
    <form action="admin_cate_b.php?act=add" method="post" name="add">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">增加装修知识分类</div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF" >
              <td height="25" width="23%" class="td">名称：</td>
              <td width="77%"  class="td"><input type="text" name="title" id="title" size="30"  />
                <font color="#FF0000"> * </font>名称与前面的不可重复！</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td width="23%" height="13" class="td">排序ID：</td>
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
</div>
</body>
</html>
<?php

	$act=trim($_GET["act"]);
	$id=trim($_POST["id"]);
	$title=trim($_POST["title"]);
	$px_id=trim($_POST["px_id"]);

	if($act=="edit" and $id<>"" and $title<>"" and $px_id<>""){
		include("../php/conn.php");
		mysql_query("update tb_talk_b set btitle='$title',px_id='$px_id' where bid='$id'",$conn);
		echo"<script>alert('类别修改成功!');window.location.href='admin_cate_b.php';</script>" ; 
		mysql_close($conn);

	}	

	

	$dd=$_GET["dd"];

	if($act=='del' and $dd<>""){
		include("../php/conn.php");
		mysql_query("delete from tb_talk_b where bid='$dd'",$conn);
		echo"<script>alert('类别删除成功!');window.location.href='admin_cate_b.php';</script>" ; 
		mysql_close($conn);
	}

	if($act=='add' and $title<>"" and $px_id<>""){
		include("../php/conn.php");
		mysql_query("insert into tb_talk_b(btitle,px_id) values('$title','$px_id')",$conn);
		echo"<script>alert('类别添加成功!');window.location.href='admin_cate_b.php';</script>" ; 
		mysql_close($conn);

	}

?>
