<?php 
	include("session.php"); 
    include("../php/conn.php");
	error_reporting(0);

	

$bid=intval($_GET["bid"]);
if ($bid>0){

	$rsu=mysql_query("select id,title,uid   from xingxis where id=$bid",$conn);
	$arrayu=mysql_fetch_array($rsu);
	$bname=$arrayu["title"];
	$bid=$arrayu["id"];
	$uid=$arrayu["uid"];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>工地<?php echo $bname?>验收报告信息</title>
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
.td3 {
	padding-left:10px;
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
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">工地<?php echo $bname?> 验收报告信息</div></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
          <form action="admin_tuangou.php" method="get" name="forms">
            <tr>
              <td width="65%" bgcolor="#FFFFFF" style="text-align:left;  height:25px; padding:5px;"><b>搜 索：</b>
                <input type="hidden" name="bid" value="<?php echo $bid?>" />
                <input type="text" name="keys1" id="keys1"  size="30"/>
                <input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " /></td>
              <td width="35%" bgcolor="#FFFFFF" align="center" style="padding:5px;"><input type="button" name="Submit3" value=" 添 加 " onclick="window.location.href='add_tuangou.php?bid=<?php echo $bid?>' "   class="btn1"/></td>
            </tr>
          </form>
        </table>
        <?php


if($bid>0){
 $tiao1="and bid=$bid";
}

				$pagesize=20;
				$keys1=trim($_GET['keys1']);
				if($keys1<>""){ 
				$tiao3="and title like '%$keys1%'";
				}	 

		            $rs=mysql_query("select id from tb_tuangou where id>0 $tiao1   $tiao3   ",$conn);
					$num=mysql_num_rows($rs);
					$pagemax=ceil($num/$pagesize);
					mysql_free_result($rs);
					$page=$_GET["page"];
					if($page<1) $page=1;
					if($page>$pagemax) $page=$pagemax;
					$p=($page-1)*$pagesize;

					$xxrs=mysql_query("select * from tb_tuangou where id>0 $tiao1 $tiao3 order by id desc limit $p,$pagesize",$conn);	

				?>
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
          <?php 

 if($num>0){ 
$kk=$num-$pagesize*($page-1);
 ?>
          <form id="form1" name="form1" method="post" action="admin_tuangou.php?dell=checkbox&bid=<?php echo $bid?>">
            <tr bgcolor="#5EB1E3" align="center" >
              <td width="7%" height="30" class="bai">排 序</td>
              <td width="13%" class="bai">验收阶段</td>
              <td width="23%" class="bai">名 称</td>
              <td width="11%" class="bai">验收结果</td>
              <td width="9%" class="bai">施工队</td>
              <td width="11%" class="bai">点 击</td>
              <td width="11%" class="bai">验收时间</td>
              <td width="15%" class="bai">操 作</td>
            </tr>
            <?php
				while($array=mysql_fetch_array($xxrs)):
				$tname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["title"]);
			 	?>
            <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td class="td"><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" />  <?php echo $kk?></td>
              <td class="td">
			  <?php
                            $bids=$array['jdid'];
						switch($bids){
							case 1: echo "<font color='#FF0000'>开工大吉</font>";break;
							case 2: echo "<font color='#0000FF'>水电改造</font>";break;
							case 3: echo "<font color='#ff0066'>泥瓦阶段</font>";break;
							case 4: echo "<font color='#006600'>木工阶段</font>";break;
							case 5: echo "<font color='#990066'>油漆阶段</font>";break;
							case 6: echo "<font color='#333300'>安装阶段</font>";break;
							case 7: echo "<font color='#330066'>验收完成</font>";break;
						}
 ?></td>
              <td class="td td3"  ><a href="xiugai_tuangou.php?id=<?php echo $array["id"]?>" style="color:#0000ff; font-size:14px;"><?php echo $tname?></a>
                <?php if ($array['img']<>"") {?>
                <a href="../<?php echo $array['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
                <?php } ?></td>
              <td class="td" ><?php

       $ysid=$array['ysid'];

						switch($ysid){
							case 1: echo "<font color='#FF0000'>未通过</font>";break;
							case 2: echo "<font color='#006600'>合格</font>";break;
							case 3: echo "<font color='#ff0066'>良好</font>";break;
							case 4: echo "<font color='#0000ff'>优秀</font>";break;

		 }

	   ?></td>
              <td class="td" ><?php 

    if ($array["uid"]>0){
	$rs5=mysql_query("select relname  from tb_user where  bid=0 and id=$array[uid]",$conn);
	$array5=mysql_fetch_array($rs5);
	?>
     <font style="color:#983D66;"><?php echo $array5["relname"]?></font>
       <?php
      mysql_free_result($rs5);
	  }

	  ?></td>
              <td class="td" ><?php echo $array["hits"]?></td>
              <td class="td"><?php echo $array["ytime"]?></td>
              <td class="td"><input type="button" name="Submit3" value=" 修 改 " onclick="window.location.href='xiugai_tuangou.php?id=<?php echo $array["id"]?>' "  class="btn"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后放入回收站!')){window.location.href='admin_tuangou.php?id=<?php echo $array["id"]?>&del=ok&bid=<?php echo $bid?>';}else{history.go(0);}"  class="btn"/></td>
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
                    <td align="left"  class="td"><input type="submit" name="button" id="button" value="删除选中项"  class="btn"/></td>
                    <td width="74%" height="30"   align="right" class="td"><div id="showpages" >
                        <div id="pagesinfo">共<?php echo $num?>个  每页<?php echo $pagesize?>个 页次：<?php echo $page?>/<?php echo $pagemax?></div>
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
     <li class="pagesnow"><a href='?bid=<?php echo $bid?>&page=<?php echo $ys?>&keys1=<?php echo $keys1?>'>
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

$del=$_GET["del"];

$id=$_GET["id"];

$bid=intval($_GET["bid"]);

$dell=$_GET["dell"];

$checkbox=$_POST['chk'];



include("../php/conn.php");

if($del=='ok' and $id<>""){

	mysql_query("delete from tb_tuangou  where id=$id   ",$conn);

	echo"<script>window.location.href='admin_tuangou.php?bid=$bid';</script>" ; 

}

if( $dell=="checkbox" and $checkbox<>""){
  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			mysql_query("delete from tb_tuangou  where id=$id   ",$conn);
		}
	}
	echo "<script>alert('批量删除成功!');location.href='admin_tuangou.php?bid=$bid';</script>";

}

 mysql_close($conn);

?>
