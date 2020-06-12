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
<title>在建工地管理</title>
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
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF; font-size:14px;">在建工地管理</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
          <form action="admin_product.php" method="get" name="forms">
            <tr>
              <td style="text-align:left; background-color:#F1F5F8; height:25px; padding:5px;"><b>搜 索：</b>
                <select name="qid" id="qid">
                  <option value="">==全部区域==</option>
    <?php
	   	$rs2=mysql_query("select bid,btitle from tb_uqu  order by  px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
   <option value="<?php echo $array2['bid']?>"  ><?php echo $array2['btitle']?></option>
   <?php 
	endwhile;
	mysql_free_result($rs2);

	?>
                </select>
                </select>
                <select name="bid" id="bid">
                  <option value="">==施工阶段==</option>
                  <option value="1">开工大吉</option>
                  <option value="2">水电改造</option>
                  <option value="3">泥瓦阶段</option>
                  <option value="4">木工阶段</option>
                  <option value="5">油漆阶段</option>
                  <option value="6">安装阶段</option>
                  <option value="7">验收完成</option>
                </select>
                <input type="text" name="keys1" id="keys1"  size="30"/>
                <input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " /></td>
            </tr>
          </form>
        </table>
        <?php

 

				$pagesize=20;

				$bid=intval(trim($_GET['bid']));
				$qid=intval(trim($_GET['qid']));
				$uid=intval(trim($_GET['uid']));
 
				 

	 

				$keys1=trim($_GET['keys1']);

				if($bid>0){
				$tiao1="and bid=$bid";
				}

				if($uid>0){
				$tiao3="and uid=$uid";
				}

				if($keys1<>""){
				$tiao2="and title like '%$keys1%'";
				}

				if($qid>0){
				$tiao5="and qid=$qid";
				}

			 

		           $rs=mysql_query("select id from xingxis where id>0 $tiao1 $tiao2 $tiao3 $tiao5 $tiao6 ",$conn);

					$num=mysql_num_rows($rs);

					$pagemax=ceil($num/$pagesize);

					mysql_free_result($rs);

					$page=$_GET["page"];

					if($page<1) $page=1;

					if($page>$pagemax) $page=$pagemax;

					$p=($page-1)*$pagesize;

					$xxrs=mysql_query("select * from xingxis where id>0 $tiao1 $tiao2 $tiao3 $tiao5 $tiao6  order by px_id desc, id desc limit $p,$pagesize",$conn);	

				 

				?>
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
          <?php 

			if($num>0){ 
$kk=$num-$pagesize*($page-1);

			?>
          <form id="form1" name="form1" method="post" action="admin_product.php?dell=checkbox">
            <tr bgcolor="#5EB1E3" align="center" >
              <td width="8%" height="30" class="bai">排 序</td>
              <td width="9%" class="bai">区 域</td>
              <td width="28%" class="bai">名 称</td>
              <td width="8%" class="bai">施工阶段</td>
              <td width="7%" class="bai">工长</td>
              
              <td width="12%" class="bai">信 息</td>
              <td width="6%" class="bai">开工日期</td>
              <td width="22%" class="bai">操 作</td>
            </tr>
            <?php

 while($array=mysql_fetch_array($xxrs)):			

 $tname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["title"]);

 ?>
            <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td class="td"><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" /> <?php echo $kk?></td>
              <td class="td">
<?php
 if ($array['qid']>0) {
 $rs5=mysql_query("select btitle  from tb_uqu where bid=$array[qid]  ",$conn);
 $array5=mysql_fetch_array($rs5);

 ?>
 <a href="?bid=<?php echo $array["bid"]?>&qid=<?php echo $array["qid"]?>" ><font style="color:#ff0066;"><?php echo $array5["btitle"]?></font></a>
 <?php
 mysql_free_result($rs5);
 }
 ?></td>
              <td class="td td3" align="left"><a href="xiugai_trends.php?id=<?php echo $array["id"]?>" style="color:#0000ff; font-size:14px;"><?php echo $tname?></a>
                <?php if ($array['img']<>"") {?>
                <a href="../<?php echo $array['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
                <?php } ?>
                <?php if ($array["tjs"]==1){?>
                <font color="#FF0000"><b>推荐</b></font>
                <?php } ?>
                
                <?php if ($array["sh"]==1){?>
               &nbsp;&nbsp; <font color="#006600"><b>已审核</b></font>
                <?php }else{?>
                &nbsp;&nbsp; <font color="#333333">待审核</font>
                  <?php } ?>
                </td>
              <td class="td"><a href="?bid=<?php echo $array["bid"]?>" >
                <?php
                       $bids=$array['bid'];
						switch($bids){
							case 1: echo "<font color='#FF0000'>开工大吉</font>";break;
							case 2: echo "<font color='#0000FF'>水电改造</font>";break;
							case 3: echo "<font color='#ff0066'>泥瓦阶段</font>";break;
							case 4: echo "<font color='#006600'>木工阶段</font>";break;
							case 5: echo "<font color='#990066'>油漆阶段</font>";break;
							case 6: echo "<font color='#333300'>安装阶段</font>";break;
							case 7: echo "<font color='#330066'>验收完成</font>";break;
						} ?>
                </a></td>
              <td class="td" >
<?php
 if ($array['uid']>0) {
 $rs5=mysql_query("select relname  from tb_user where bid=0 and id=$array[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
 ?>
  <a href="?uid=<?php echo $array["uid"]?>" ><font style="color:#006600;"><?php echo $array5["relname"]?></font></a>
  <?php
 mysql_free_result($rs5);
 }
 
 
$cnum_bpl = mysql_num_rows(mysql_query("select id from tb_uylf where  bid=$array[id]",$conn));
$cnum_bgs = mysql_num_rows(mysql_query("select id from tb_tuangou where  bid=$array[id]",$conn));
		   ?></td>
            
              <td class="td">
              <a href="admin_tuangou.php?bid=<?php echo $array["id"]?>" style="color:#FFFFFF; background:#006600; padding:2px 5px;">报告 <?php echo $cnum_bgs?> </a> &nbsp;
              <a href="admin_thui.php?bid=<?php echo $array["id"]?>" style="color:#FFFFFF; background:#0000FF; padding:2px 5px;">预约 <?php echo $cnum_bpl?> </a>
              
              </td>
              <td class="td"><?php echo date("Y-m-d",strtotime($array["ktime"]))?></td>
              <td class="td"> 
              <input type="button" name="Submit3" value=" 添加报告 " onclick="window.location.href='add_tuangou.php?bid=<?php echo $array["id"]?>' "  class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;            
                <input type="button" name="Submit3" value=" 修 改 " onclick="window.location.href='xiugai_trends.php?id=<?php echo $array["id"]?>' "  class="btn"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后放入回收站!')){window.location.href='admin_product.php?id=<?php echo $array["id"]?>&del=ok';}else{history.go(0);}"  class="btn"/></td>
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
                    <td align="left" colspan="2" class="td"><input type="submit" name="button" id="button" value="删除选中项"  class="btn"/></td>
                    <td width="74%" height="30" colspan="4" align="right" class="td"><div id="showpages" >
                        <div id="pagesinfo">共<?php echo $num?>条  每页<?php echo $pagesize?>条 页次：<?php echo $page?>/<?php echo $pagemax?></div>
                        <div id="pages">
                          <ul>
                            <li class="pbutton"> <a href="?bid=<?php echo $bid?>&uid=<?php echo $uid?>&qid=<?php echo $qid?>&jid=<?php echo $jid?>&page=1&keys1=<?php echo $keys1?>" >首页</a></li>
                            <li class="pbutton"> <a href="?bid=<?php echo $bid?>&uid=<?php echo $uid?>&qid=<?php echo $qid?>&jid=<?php echo $jid?>&page=<?php echo ($page-1)?>&keys1=<?php echo $keys1?>" >上一页</a></li>
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
                            <li class="pagesnow"><a href='?page=<?php echo $ys?>&bid=<?php echo $bid?>&uid=<?php echo $uid?>&qid=<?php echo $qid?>&jid=<?php echo $jid?>&keys1=<?php echo $keys1?>'>
                              <?php if ($ys==$page) {?>
                              <font color=#ff0000><b style="font-size:14px;"><?php echo $ys?></b></font>
                              <?php }else {?>
                              <?php echo $ys?>
                              <?php } ?>
                              </a></li>
                            <?php } ?>
                            <li class="pbutton"><a href="?page=<?php echo ($page+1)?>&bid=<?php echo $bid?>&uid=<?php echo $uid?>&qid=<?php echo $qid?>&jid=<?php echo $jid?>&keys1=<?php echo $keys1?>" >下一页</a></li>
                            <li class="pbutton"><a href="?bid=<?php echo $bid?>&uid=<?php echo $uid?>&qid=<?php echo $qid?>&jid=<?php echo $jid?>&page=<?php echo $pagemax?>&keys1=<?php echo $keys1?>" class="titlefont" >尾页</a></li>
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

	mysql_query("delete from xingxis   where id=$id",$conn);

	echo"<script>window.location.href='admin_product.php';</script>" ; 

}

if( $dell=="checkbox" and $checkbox<>""){
  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			mysql_query("delete from xingxis   where id=$id",$conn);
		}
	}
echo "<script>alert('批量删除成功!');location.href='admin_product.php';</script>";
}

 mysql_close($conn);

?>
