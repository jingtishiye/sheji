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
<title>会员管理</title>
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
.btn1 {
	color:#ffffff;
	font-weight:bold;
	cursor:hand;
	background:url(images/sub1.jpg) no-repeat;
	width:90px;
	height:35px;
	border:0;
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
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF; font-size:14px;">会员管理</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
          <form action="admin_upu.php" method="get" name="forms">
            <tr>
              <td style="text-align:left; background-color:#F1F5F8; height:25px; padding:5px;"><b>搜 索：</b>
                <input type="text" name="keys1" size="20"/>
                <input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " /></td>
             <td width="50%" bgcolor="#F1F5F8" align="center" style="padding:5px;"><input type="button" name="Submit3" value=" 添 加 " onclick="window.location.href='admin_upu_add.php' "  class="btn1"/>
               </td>
            </tr>
          </form>
        </table>
        <?php
 
				$pagesize=20;
			 
 
 
				$keys1=trim($_GET['keys1']);
	 
		 
				if($keys1<>""){
				$tiao2="and (username like '%$keys1%' or relname like '%$keys1%')";
				}
  
		 $rs=mysql_query("select id from tb_user where bid=2 $tiao1 $tiao2 $tiao3  ",$conn);
					$num=mysql_num_rows($rs);
					$pagemax=ceil($num/$pagesize);
					mysql_free_result($rs);
					$page=intval($_GET["page"]);
					if($page<1) $page=1;
					if($page>$pagemax) $page=$pagemax;
					$p=($page-1)*$pagesize;
					$xxrs=mysql_query("select * from tb_user where bid=2 $tiao1 $tiao2 $tiao3  order by id desc limit $p,$pagesize",$conn);	
				 
				?>
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
          <?php 
			if($num>0){ 
$kk=$num-$pagesize*($page-1);
			?>
          <form id="form1" name="form1" method="post" action="admin_upu.php?dell=checkbox">
            <tr bgcolor="#5EB1E3" align="center" >
              <td width="8%" height="30" class="bai">排 序</td>
              <td width="14%" class="bai">手 机 号</td>
              <td width="17%" class="bai">姓 名</td>
              <td width="15%" class="bai">信 息</td>
              <td width="12%" class="bai">注册时间</td>
              
              <td width="7%" class="bai">登陆次数</td>
      
              <td width="10%" class="bai">登录时间</td>
              <td width="17%" class="bai">操 作</td>
            </tr>
            <?php
 while($array=mysql_fetch_array($xxrs)):			
 $tname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["username"]);
 ?>
            <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td class="td"><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" /> <?php echo $kk?></td>
              <td class="td">
 
<a href="admin_upu_mod.php?id=<?php echo $array["id"]?>" style="color:#0000ff; font-size:14px;"><?php echo $tname?></a>
  <?php if ($array['img']<>"") {?>
                <a href="../<?php echo $array['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
                <?php } ?>
              </td>
              <td class="td" >
			  <?php echo $array['relname']?>
              
             </td>
              <td class="td" >
<?php
$cnum_zb = mysql_num_rows(mysql_query("select id from tb_zbiao where  uid=$array[id]",$conn));
 
?>		  
     <a href="admin_zbiao.php?uid=<?php echo $array["id"]?>" style="color:#FFFFFF; background:#ff0066; padding:2px 5px;">装修需求 <?php echo $cnum_zb?> </a> 
              </td>
              <td class="td"><font style="color:#006600;"><?php echo $array["data"]?></font> </td>
              
              <td class="td"> <?php echo $array["dlcs"]?>次</td>
              
              <td class="td"><?php echo date("Y-m-d",strtotime($array['dldata']))?></td>
              <td class="td"><input type="button" name="Submit3" value=" 修 改 " onclick="window.location.href='admin_upu_mod.php?id=<?php echo $array["id"]?>' "  class="btn"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后放入回收站!')){window.location.href='admin_upu.php?id=<?php echo $array["id"]?>&del=ok';}else{history.go(0);}"  class="btn"/></td>
            </tr>
            <?php
			$kk--;
				 endwhile;
				 mysql_free_result($xxrs);
				
				?>
            <tr   align="center"  >
              <td colspan="9" style="border:0;"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
                  <tr>
                    <td width="7%" class="td" align="center"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
                    <td align="left" class="td"><input type="submit" name="button" id="button" value="删除选中项"  class="btn"/></td>
                    <td width="74%" height="30" align="right" class="td"><div id="showpages" >
                        <div id="pagesinfo">共<?php echo $num?>条  每页<?php echo $pagesize?>条 页次：<?php echo $page?>/<?php echo $pagemax?></div>
                        <div id="pages">
                          <ul>
<li class="pbutton"> <a href="?page=1&keys1=<?php echo $keys1?>" >首页</a></li>
<li class="pbutton"> <a href="?page=<?php echo ($page-1)?>&keys1=<?php echo $keys1?>" >上一页</a></li>
  <?php 
	  if (($page-5)>1) {
$ys=$page-5;
$yb=$page+5;
}
else{
$ys=1;
$yb=6;
}
 if ($yb>$pagemax){
$yb=$pagemax;
}
for($ys;$ys<=$yb;$ys++){ 
?>
<li class="pagesnow"><a href='?page=<?php echo $ys?>&keys1=<?php echo $keys1?>'>
                              <?php if ($ys==$page) {?>
                              <font color=#ff0000><b style="font-size:14px;"><?php echo $ys?></b></font>
                              <?php }else {?>
                              <?php echo $ys?>
                              <?php } ?>
                              </a></li>
                            <?php } ?>
<li class="pbutton"><a href="?page=<?php echo ($page+1)?>&keys1=<?php echo $keys1?>" >下一页</a></li>
<li class="pbutton"><a href="?page=<?php echo $pagemax?>&keys1=<?php echo $keys1?>" class="titlefont" >尾页</a></li>
                          </ul>
                        </div>
                      </div></td>
                  </tr>
                </table></td>
            </tr>
          </form>
           <?php }else{?>
            <div style=" padding:20px;font-size:14px; color:#990000; background:#FFFFFF; font-weight:bold; text-align:center">暂时没有信息！</div>
            <?php }?>
        </table></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php
$del=trim($_GET["del"]);
$id=trim($_GET["id"]);

$dell=trim($_GET["dell"]);
$checkbox=$_POST['chk'];

include("../php/conn.php");
if($del=='ok' and $id<>""){
	mysql_query("delete from tb_user   where id=$id and bid=2",$conn);
	echo"<script>window.location.href='admin_upu.php';</script>" ; 
}
if( $dell=="checkbox" and $checkbox<>""){
  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			mysql_query("delete from tb_user   where id=$id and bid=2",$conn);
			
		}
	}
	echo "<script>alert('批量删除成功!');location.href='admin_upu.php';</script>";
}
 mysql_close($conn);
?>
