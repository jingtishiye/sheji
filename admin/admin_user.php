<?php 
	include("session.php"); 
	include("../php/conn.php");
    error_reporting(0);
	
	
$bid=intval(trim($_GET['bid']));
$qid=intval(trim($_GET['qid']));

 

if ($bid==0){

 $bname="7工长";
 $yulinks="admin_yugong.php";
 $pllinks="admin_ubm.php";
 $bname2="区域";
 $qylinks="admin_uqu.php";

}elseif ($bid==1){

 $bname="设计师";
 $yulinks="admin_yushe.php";
 $pllinks="admin_ups.php";
 $bname2="级别";

 $qylinks="admin_slei.php";

} 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title><?php echo $bname?>管理</title>
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
	cursor:pointer;
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
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF; font-size:14px;"><?php echo $bname?>管理</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
          <form action="admin_user.php" method="get" name="forms">
            <input type="hidden" value="<?php echo $bid?>" name="bid"  />
            <tr>
              <td width="50%" style="text-align:left; background-color:#F1F5F8; height:25px; padding:5px;"><b>搜 索：</b>
                <?php 

				$rs1=mysql_query("select bid,btitle from tb_uqu order by px_id asc",$conn);

				?>
                <select name="qid"  >
                  <option value="">==全 部==</option>

                </select>
                <input type="text" name="keys1" id="keys1"  size="20"/>
                &nbsp; 名称、手机号查询 &nbsp;
                <input type="submit" name="submit1" id="submit1" class="btn" value=" 查 询 " /></td>
              <td width="50%" bgcolor="#F1F5F8" align="center" style="padding:5px;"><input type="button" name="Submit3" value=" 添 加 " onclick="window.location.href='admin_user_add.php?bid=<?php echo $bid?>' "   class="btn1"/>
                &nbsp;&nbsp;
<?php 
if ($bid<2 ){ 
?>
                <input type="button" name="Submit3" value=" <?php echo $bname2?> " onclick="window.location.href='<?php echo $qylinks?>' "   class="btn1"/>
                &nbsp;&nbsp;
                <input type="button" name="Submit3" value=" 预约信息 " onclick="window.location.href='<?php echo $yulinks?>' "   class="btn1"/>

 <?php 
 }
if ($bid==0 ){ 
?>
                &nbsp;&nbsp;
                <input type="button" name="Submit3" value=" 评论信息 " onclick="window.location.href='<?php echo $pllinks?>' "   class="btn1"/>
                <?php }?></td>
            </tr>
          </form>
        </table>
        <?php

 

			 

				 

 $pagesize=20;

 $keys1=trim($_GET['keys1']);

 if($keys1<>""){

 $tiao1="and (tel like '%$keys1%' or relname like '%$keys1%')";

 }

 

 if($qid>0){
	$tiao2="and qid=$qid";
}

				 

		$rs=mysql_query("select id from tb_user where bid=$bid $tiao1 $tiao2  ",$conn);

		$num=mysql_num_rows($rs);

		$pagemax=ceil($num/$pagesize);

		mysql_free_result($rs);

		$page=$_GET["page"];

		if($page<1) $page=1;

		if($page>$pagemax) $page=$pagemax;

		$p=($page-1)*$pagesize;

		$xxrs=mysql_query("select * from tb_user where bid=$bid  $tiao1 $tiao2 order by kbid desc, id desc limit $p,$pagesize",$conn);	

 if($num>0){ 
$kk=$num-$pagesize*($page-1);
			?>
<form id="form1" name="form1" method="post" action="admin_user.php?dell=checkbox&bid=<?php echo $bid?>">
          <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
            <tr bgcolor="#5EB1E3" align="center" >
              <td width="7%" height="30" class="bai">排 序</td>
 
              <td width="7%" class="bai"><?php echo $bname2?></td>
              
              <td width="11%" class="bai">名 称</td>
              <td width="9%" class="bai">手机号</td>
<?php 
if ($bid==0){
 $lname="星级/口碑值/工龄";
 $hname="保证金/工种";
}elseif ($bid==1){
 $lname="收费 / 从业年限";
 $hname="擅长风格";
} 

?>
              <td width="10%" class="bai"><?php echo $lname?></td>
              <td width="12%" class="bai"><?php echo $hname?></td>
     
              <td width="14%" class="bai">信 息</td>
              <td width="9%" class="bai">状 态</td>
              <td width="21%" class="bai">操 作</td>
            </tr>
            <?php

 while($array=mysql_fetch_array($xxrs)):			

 $tname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["relname"]);

 $dname=str_replace($keys1,"<font color=#FF0000>$keys1</font>",$array["tel"]);

 
 ?>
 <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
  <td class="td">
 <input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $array["id"]?>" /> <?php echo $kk?></td>
<?php 
if ($bid<2){ 
?>
 <td class="td">
 <?php
 if ($bid==0){ 
 if ($array['qid']>0) {
 $rs5=mysql_query("select btitle  from tb_uqu where bid=$array[qid]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 ?>
 <a href="?bid=<?php echo $array["bid"]?>&qid=<?php echo $array["qid"]?>" ><font style="color:#983D66;"><?php echo $array5["btitle"]?></font></a>
  <?php
 mysql_free_result($rs5);
 }
 }elseif ($bid==1){ 
 if ($array['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$array[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 ?>
 <a href="?bid=<?php echo $array["bid"]?>&jbid=<?php echo $array["jibie"]?>" ><font style="color:#ff0000;"><?php echo $array5["btitle"]?></font></a>
  <?php
 mysql_free_result($rs5);
 }
 }
 ?>
 
 </td>
              <?php }?>
              <td class="td td3"><a href="xiugai_user.php?id=<?php echo $array["id"]?>" style="color:#0000cc; font-size:14px;"><?php echo $tname?></a>  <?php echo $array['sex']?>
                <?php if ($array['img']<>"") {?>
       <a href="../<?php echo $array['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
                <?php } ?>
                <?php if ($array["tjs"]==1){?>
                <font color="#0000ff"><b>推 荐</b></font>
                <?php } ?>
                <?php if ($array["yzid"]==1){?>
                <font color="#ff0000"><b>明 星</b></font>
                <?php } ?></td>
              <td class="td" style="color:#006600;"><?php echo $dname?></td>
              
              <td class="td">
    <?php if ($bid==1){?>
 <font style="color:#FF0000;"><?php echo $array['sprice']?></font>元一平
    <?php }elseif ($bid==0){?>
    <font style="color:#FF0000;"><?php echo $array['xjid']?>星级</font> / <font style="color:#0000ff;"><?php echo $array['kbid']?></font>
    <?php } ?>           
      / <?php echo $array['glid']?>年

 </td>
  <td class="td" style="color:#990066;">
    <?php if ($bid==1){?>
    
 <?php echo mb_substr($array["sfeng"],0,13,'utf-8'); ?> 
    <?php }elseif ($bid==0){?>
 <span style="color:#ff0066;"><?php echo $array["sprice"]?>元</span> /
 <span style="color:#006600;"><?php echo $array["jiguan"]?></span>
     <?php }?>
     </td>
 
              <td class="td"><?php

if ($bid==0){

 $cnum_dbuy = mysql_num_rows(mysql_query("select id from xingxis where  uid=$array[id]",$conn));
 $cnum_uyue = mysql_num_rows(mysql_query("select id from tb_uyue where  uyid=$array[id]",$conn));
 $cnum_dpl = mysql_num_rows(mysql_query("select id from tb_upl where  uyid=$array[id]",$conn));

?>
                <a href="admin_product.php?uid=<?php echo $array["id"]?>" style="color:#FFFFFF; background:#FF0000; padding:2px 5px;">工地 <?php echo $cnum_dbuy?> </a> <a href="admin_yugong.php?uyid=<?php echo $array["id"]?>" style="color:#FFFFFF; background:#006600; padding:2px 5px;">预约 <?php echo $cnum_uyue?> </a> <a href="admin_ubm.php?uyid=<?php echo $array["id"]?>" style="color:#FFFFFF; background:#0000FF; padding:2px 5px;">评论 <?php echo $cnum_dpl?> </a>
                <?php 

}elseif ($bid==1){

 $cnum_dbuy = mysql_num_rows(mysql_query("select id from tb_ushe where  uid=$array[id]",$conn));
 $cnum_uyue = mysql_num_rows(mysql_query("select id from tb_uysj where  uyid=$array[id]",$conn));
 
?>
   <a href="admin_ushe.php?uid=<?php echo $array["id"]?>" style="color:#FFFFFF; background:#FF0000; padding:2px 5px;">案例 <?php echo $cnum_dbuy?> </a> <a href="admin_yugong.php?uyid=<?php echo $array["id"]?>" style="color:#FFFFFF; background:#006600; padding:2px 5px;">预约 <?php echo $cnum_uyue?> </a>  
                <?php } ?></td>
       
              <td class="td">
			 
 <?php if ($array["sh"]==1){?>
                <font color="#006600"><b>已审核</b></font>
 <?php }elseif ($array["sh"]==0){?>
                <font color="#ff0000">待审核...</font>          
                <?php } ?> 
              </td>
              <td class="td">
 <?php if ($bid==0){?>
    <input type="button" name="Submit3" value=" 添加工地 " onclick="window.location.href='add_trends.php?uid=<?php echo $array["id"]?>' "  class="btn"/>
   &nbsp;&nbsp;&nbsp;&nbsp;
   <?php }elseif ($bid==1){?>
    <input type="button" name="Submit3" value=" 添加案例 " onclick="window.location.href='admin_ushe_add.php?uid=<?php echo $array["id"]?>' "  class="btn"/>
   &nbsp;&nbsp;&nbsp;&nbsp;
   <?php } ?>
                <input type="button" name="Submit3" value=" 修 改 " onclick="window.location.href='xiugai_user.php?id=<?php echo $array["id"]?>' "  class="btn"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="Submit" value=" 删 除 " onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='admin_user.php?id=<?php echo $array["id"]?>&del=ok&bid=<?php echo $bid?>';}else{history.go(0);}"  class="btn"/></td>
            </tr>
            <?php
				$kk--;
				 endwhile;
				 mysql_free_result($xxrs);
				?>
          </table>
          <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2"  bgcolor="#FFFFFF">
            <tr>
              <td width="7%" class="td" align="center"><input type="checkbox" name="allbox" id="allbox" onclick="CheckAll()" /></td>
              <td align="left" class="td"><select name="xuan">
                
                  <option value="2">删除</option>
                </select>
                <input type="submit" name="button" id="button" value=" 提 交 "  class="btn"/></td>
              <td width="74%" height="30"   align="right" class="td"><div id="showpages" >
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
                        <?php }else {

	 echo $ys;

	 } ?>
                        </a></li>
                      <?php } ?>
                      <li class="pbutton"><a href="?page=<?php echo ($page+1)?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" >下一页</a></li>
                      <li class="pbutton"><a href="?page=<?php echo $pagemax?>&keys1=<?php echo $keys1?>&bid=<?php echo $bid?>" class="titlefont" >尾页</a></li>
                    </ul>
                  </div>
                </div></td>
            </tr>
            <?php }else{?>
            <div style=" padding:20px;font-size:14px; color:#990000; background:#FFFFFF; font-weight:bold; text-align:center">暂时没有信息！</div>
            <?php }?>
          </table>
        </form></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php

$del=trim($_GET["del"]);
$id=trim($_GET["id"]);
$xuan=trim($_POST["xuan"]);
$bid=trim($_GET['bid']);
$dell=trim($_GET["dell"]);

$checkbox=$_POST['chk'];

if ($xuan==""){
	$xuan=0;
}



include("../php/conn.php");

if($del=='ok' and $id<>""){

	mysql_query("delete from tb_user where id=$id",$conn);

	echo "<script>window.location.href='admin_user.php?bid=$bid';</script>" ; 

}



if ($xuan>0){

	

	if ($xuan==2){



if( $dell=="checkbox" and $checkbox<>""){

	

	$bid=trim($_GET['bid']);

  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			mysql_query("delete from tb_user where id=$id",$conn);
		}
	}
	echo "<script>alert('批量删除成功!');location.href='admin_user.php?bid=$bid';</script>";

}

}elseif ($xuan==1){

	if( $dell=="checkbox" and $checkbox<>""){

  for($i=0;$i<count($checkbox);$i++){       //进入循环，依次删除选项
	   if(!is_null($checkbox[$i])){
			$id=$checkbox[$i];
			mysql_query("update tb_user set sh=1 where id=$id",$conn);
		}
	}
echo "<script>alert('批量审核成功!');location.href='admin_user.php?bid=$bid';</script>";
  }

	

 }

 }

 mysql_close($conn);

?>
