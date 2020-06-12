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
<title>装修知识信息管理</title>
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
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">装修知识信息管理</div></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
          <form action="admin_cate.php" method="get" name="forms">
            <tr>
              <td style="text-align:left; background-color:#F1F5F8; height:25px; padding:5px;"><b>搜 索：</b>
   
                <select name="bid"  >
                  <option value="0">==全部分类==</option>
                  <?php 
				 $rs1=mysql_query("select bid,btitle from tb_talk_b order by px_id asc",$conn); 
				  while($array=mysql_fetch_array($rs1)): ?>
                  <option value="<?php echo $array['bid']?>"><?php echo $array['btitle']?></option>
    <?php
	  endwhile;
      mysql_free_result($rs1);
	  ?>
                </select>
                &nbsp;
                <input type="text" name="keys1" id="keys1"  size="30"/>
                <input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " /></td>
            </tr>
          </form>
        </table>
        <?php

 $pagesize=20;

 $keys1=trim($_GET['keys1']);

 if($keys1<>""){
	$tiao1="and title like '%$keys1%'";
 }	

 $bid=trim($_GET['bid']);
 if ($bid==""){
 $bid=0;
 }

 if($bid>0){
	 $tiao2="and bid=$bid";
 }					 

		 $rs=mysql_query("select id from tb_talk where id>0 $tiao1 $tiao2 ",$conn);
		 $num=mysql_num_rows($rs);
		 $pagemax=ceil($num/$pagesize);
		 mysql_free_result($rs);
		 $page=$_GET["page"];
		 if($page<1) $page=1;
		 if($page>$pagemax) $page=$pagemax;
		 $p=($page-1)*$pagesize;
		 $xxrs=mysql_query("select * from tb_talk where id>0 $tiao1 $tiao2 order by id desc limit $p,$pagesize",$conn);	

	 ?>
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
          <?php
			if($num>0){ 
$kk=$num-$pagesize*($page-1); 

			?>
          <form id="form1" name="form1" method="post" action="admin_cate.php?dell=checkbox">
            <tr bgcolor="#5EB1E3" align="center" >
              <td width="8%" height="30" class="bai">排 序</td>
              <td width="10%" class="bai">类 型</td>
              <td width="35%" class="bai">名 称</td>
              <td width="10%" class="bai">来 源</td>
              <td width="11%" class="bai">责 编</td>
              <td width="8%" class="bai">点 击</td>
              <td width="18%" class="bai">操作</td>
            </tr>
  <?php
 while($array=mysql_fetch_array($xxrs)):			
 $tname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["title"]);
 ?>
            <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td class="td">
              <input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" />
            <?php echo $kk?></td>
              <td class="td">
 <?php 
 $rs5=mysql_query("select btitle,bid from tb_talk_b where  bid=$array[bid]",$conn);
 $array5=mysql_fetch_array($rs5);
 ?>
 <a href="?bid=<?php echo $array5["bid"]?>"  style="color:#cc0000;"><?php echo $array5["btitle"]?></a>
  <?php
  mysql_free_result($rs5);
 ?></td>
              <td class="td td3" align="left"><a href="xiugai_cate.php?id=<?php echo $array["id"]?>" style="color:#0000cc; font-size:14px;"><?php echo $tname?></a>
                <?php if ($array['img']<>"") {?>
                <a href="../<?php echo $array['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
                <?php } ?>
                 <?php if ($array['mflv']<>"") {?>
               <img src="images/video.jpg" /> 
                <?php } ?>
                <?php if ($array["tjs"]==1){?>
                &nbsp; <font color="#FF0000"><b>推荐</b></font>
                <?php } ?></td>
              <td class="td" ><?php echo $array["uname"]?></td>
              <td class="td" ><?php echo $array["zuser"]?></td>
              <td class="td"><?php echo $array["hits"]?></td>
              <td class="td"><input type="button" name="Submit3" value=" 修 改 " onclick="window.location.href='xiugai_cate.php?id=<?php echo $array["id"]?>' "  class="btn"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='admin_cate.php?id=<?php echo $array["id"]?>&&del=ok';}else{history.go(0);}"  class="btn"/></td>
            </tr>
            <?php
                 $kk--;
				 endwhile;
				 mysql_free_result($xxrs);
				?>
            <tr   align="center"  >
              <td colspan="8" style="border:0;"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
                  <tr>
                    <td width="6%" class="td" align="center"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
                    <td align="left" colspan="2" class="td"><input type="submit" name="button" id="button" value="删除选中项"  class="btn"/></td>
                    <td width="74%" height="30" colspan="4" align="right" class="td"><div id="showpages" >
                        <div id="pagesinfo">共<?php echo $num?>个  每页<?php echo $pagesize?>个 页次：<?php echo $page?>/<?php echo $pagemax?></div>
                        <div id="pages">
                          <ul>
                            <li class="pbutton"> <a href="?page=1&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" >首页</a></li>
                            <li class="pbutton"> <a href="?page=<?php echo ($page-1)?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" >上一页</a></li>
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
  <li class="pagesnow"><a href='?page=<?php echo $ys?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>'>
                              <?php if ($ys==$page) {?>
                              <font color=#ff0000><b style="font-size:14px;"><?php echo $ys?></b></font>
                              <?php }else {?>
                              <?php echo $ys?>
                              <?php } ?>
                              </a></li>
                            <?php } ?>
                            <li class="pbutton"><a href="?page=<?php echo ($page+1)?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" >下一页</a></li>
                            <li class="pbutton"><a href="?page=<?php echo $pagemax?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" class="titlefont" >尾页</a></li>
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
	mysql_query("delete from tb_talk where id=$id",$conn);
	echo"<script>window.location.href='admin_cate.php';</script>" ; 

}

if( $dell=="checkbox" and $checkbox<>""){
  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			mysql_query("delete from tb_talk where id=$id",$conn);
		}
	}
echo "<script>alert('批量删除成功!');location.href='admin_cate.php';</script>";
}

 mysql_close($conn);

?>
