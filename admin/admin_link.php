<?php 
	include("session.php"); 
include("../php/conn.php");
error_reporting(0);
	$num=0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>友情链接管理</title>
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
<script language="javascript"> 

<!-- 

function CheckAll(){ 

 for (var i=0;i<eval(form1.elements.length);i++){ 

  var e=form1.elements[i]; 

  if (e.name!="allbox") e.checked=form1.allbox.checked; 

 } 

} 

--> 

</script>
</head>

<body>
<div style="margin-top:10px;">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
    <tr>
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">友情链接管理</div></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
          <form action="admin_link.php" method="get" name="forms">
            <tr>
              <td bgcolor="#FFFFFF"  style="text-align:left;height:25px; padding:5px;"><b>搜 索：</b>
      <input type="text" name="keys1" id="keys1"  size="30"/>
                <input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " /></td>
              <td width="31%" bgcolor="#FFFFFF" align="center"><input type="button" name="Submit3" value=" 添加链接" onclick="window.location.href='add_link.php' "  class="btn"/></td>
            </tr>
          </form>
        </table>
        <?php

 

				$pagesize=20;

				 

				$keys1=trim($_GET['keys1']);

			 

				if($keys1<>""){

				$tiao2="and title like'%$keys1%'";

				}

				 

		 $rs=mysql_query("select * from tb_link where id>0   $tiao2 order by px_id asc, id desc",$conn);

					$num=mysql_num_rows($rs);

					$pagemax=ceil($num/$pagesize);

					mysql_free_result($rs);

					$page=$_GET["page"];

					if($page<1) $page=1;

					if($page>$pagemax) $page=$pagemax;

					$p=($page-1)*$pagesize;

					$xxrs=mysql_query("select * from tb_link where id>0   $tiao2  order by px_id asc, id desc limit $p,$pagesize",$conn);	
?>
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
          <?php 
			if($num>0): 
			?>
          <form id="form1" name="form1" method="post" action="admin_link.php?dell=checkbox">
            <tr bgcolor="#5EB1E3" align="center" >
              <td width="7%" height="30" class="bai">排 序</td>
              <td width="28%" class="bai">名称</td>
              <td width="32%" class="bai">地址</td>
              <td width="16%" class="bai">添加时间</td>
              <td width="17%" class="bai">操作</td>
            </tr>
            <?php

				while($array=mysql_fetch_array($xxrs)):
				$tname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["title"]);

			 	?>
            <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td class="td"><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" />
                <?php echo $array["px_id"]?></td>
              <td class="td" align="left">&nbsp;&nbsp; <a href="xiugai_link.php?id=<?php echo $array["id"]?>" style="color:#003399; font-size:14px;"><?php echo $tname?></a></td>
              <td class="td"><?php echo $array["url"]?></td>
              <td class="td"><?php echo $array["data"]?></td>
              <td class="td"><input type="button" name="Submit3" value=" 修 改 " onclick="window.location.href='xiugai_link.php?id=<?php echo $array["id"]?>' "  class="btn"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='admin_link.php?id=<?php echo $array["id"]?>&&del=ok';}else{history.go(0);}"  class="btn"/></td>
            </tr>
            <?php
				 endwhile;
				 mysql_free_result($xxrs);
				?>
            <tr   align="center"  >
              <td colspan="6" style="border:0;"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
                  <tr>
                    <td width="6%" class="td" align="center"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
                    <td align="left" colspan="2" class="td"><input type="submit" name="button" id="button" value="删除选中项"  class="btn"/></td>
                    <td width="74%" height="30" colspan="4" align="right" class="td"><div id="showpages" >
                        <div id="pagesinfo">共<?php echo $num?>条  每页<?php echo $pagesize?>条 页次：<?php echo $page?>/<?php echo $pagemax?></div>
                        <div id="pages">
                          <ul>
                            <li class="pbutton"> <a href="?bid=<?php echo $bid?>&page=1&keys1=<?php echo $keys1?>" >首页</a></li>
                            <li class="pbutton"> <a href="?bid=<?php echo $bid?>&page=<?php echo ($page-1)?>&keys1=<?php echo $keys1?>" >上一页</a></li>
 <?php 
 if (($page-4)>1) {
$ys=$page-4;
$yb=$page+4;
}else{

$ys=1;

$yb=5;

}

 if ($yb>$pagemax){

$yb=$pagemax;

}

for($ys;$ys<=$yb;$ys++){ 

?>
      <li class="pagesnow"><a href='?page=<?php echo $ys?>&bid=<?php echo $bid?>&keys1=<?php echo $keys1?>'>
                              <?php if ($ys==$page) {?>
                              <font color=#ff0000><b style="font-size:14px;"><?php echo $ys?></b></font>
                              <?php }else {?>
                              <?php echo $ys?>
                              <?php } ?>
                              </a></li>
                            <?php } ?>
                            <li class="pbutton"><a href="?bid=<?php echo $bid?>&page=<?php echo ($page+1)?>&keys1=<?php echo $keys1?>" >下一页</a></li>
                            <li class="pbutton"><a href="?bid=<?php echo $bid?>&page=<?php echo $pagemax?>&keys1=<?php echo $keys1?>" class="titlefont" >尾页</a></li>
                          </ul>
                        </div>
                      </div></td>
                  </tr>
                </table></td>
            </tr>
          </form>
          <?php else:?>
          <div style=" padding:20px;font-size:14px; color:#990000; background:#FFFFFF; font-weight:bold; text-align:center">暂时没有信息！</div>
          <?php endif?>
        </table></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php

$del=$_GET["del"];

$id=$_GET["id"];



$dell=$_GET["dell"];

$checkbox=$_POST['chk'];



include("../php/conn.php");

if($del=='ok' and $id<>""){

	mysql_query("delete from tb_link where id='$id'",$conn);

	echo"<script>window.location.href='admin_link.php';</script>" ; 

}

if( $dell=="checkbox" and $checkbox<>""){

  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项

	   if(!is_null($checkbox[$i])){

			$id=$checkbox[$i];

			mysql_query("delete from tb_link where id='$id'");

			echo "<script>alert('批量删除成功!');location.href='admin_link.php';</script>";

		}

	}

}



 

 mysql_close($conn);

?>
