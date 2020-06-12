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
<title>管理员管理</title>
</head>
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
}
.td3 {
	text-align:left;
	padding-left:8px;
}
-->
</style>
<script language="javascript">

<!--

function isok(theform){

if (form.admin.value == "")
  {
    alert("请输入你的用户名！");
    form.admin.focus();
    return (false);
  }

if (form.password.value=="") 
  {
    alert("请输入你的密码！");

    form.password.focus();

    return (false);

  }

if(form.password.value != form.password3.value)

{

alert("你两次的密码输入的不一致！");

    form.password3.focus();

    return (false);

}

if(form.zsname.value=="")

{

alert("你输入你的真实姓名！");

    form.zsname.focus();

    return (false);

}



if (form.mail.value == "")

  {

    alert("请填写您的Email地址！");

    form.mail.focus();

    return (false);

  }

if (form.mail.value != "" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(form.mail.value))

  {

		alert("请输入正确的Email地址!");

		form.mail.focus();

		return false;

  }

  d

return (true);

}

-->

</script>
<script language="javascript"> 

<!-- 

  function CheckClick(id) {

        var chk = document.getElementById("chk_" + id + "");

        var div = document.getElementById("tree_" + id + "");

        var inputs = div.getElementsByTagName("INPUT");

        for (var i = 0; i < inputs.length; i++) {

            if (inputs[i].type == "checkbox") {

                inputs[i].checked = chk.checked;

            }

        }

        if (chk.name != "chkss[]" && chk.checked == true) {

            CheckParentT(chk);

        }

        if (chk.name != "chkss[]" && chk.checked == false) {

            CheckParentF(chk);

        }

    } 

 function CheckParentT(chk) {
        var parent = document.getElementById(chk.name);
        parent.checked = true;
        if (parent.name != "chkss[]") {
            CheckParentT(parent)
        }
    }
    function CheckParentF(chk) {
        var a = 0;
        var div = document.getElementById("div_sp");
        var parent = document.getElementById(chk.name);
        var inputs = div.getElementsByTagName("INPUT");
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].type == "checkbox") {
                if (inputs[i].name == chk.name && inputs[i].checked == true) {
                    a++;
                }
            }
        }
        if (a == 0) {
            parent.checked = false;
            if (parent.name != "chkss[]") {
                CheckParentF(parent);
            }
        }
    }

--> 

</script>

<body>
<?php
 
	 $pagesize=10;
	 $rs=mysql_query("select id from tb_admin",$conn);
	 $num=mysql_num_rows($rs);// 函数返回结果集中行的数目
	 $pagemax=ceil($num/$pagesize);//向上舍入为最接近的整数,返回不小于 x 的下一个整数，x 如果有小数部分则进一位。ceil() 返回的类型仍然是 float，因为 float 值的范围通常比 integer 要大。
	 mysql_free_result($rs);//函数释放结果内存

	 $page=intval(trim($_GET["page"]));

	 if($page<1) $page=1;

	 if($page>$pagemax) $page=$pagemax;

	 $p=($page-1)*$pagesize;
	 $xxrs=mysql_query("select * from tb_admin limit $p,$pagesize",$conn);
?>
<div style="margin-top:10px;">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
    <tr>
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">管理员管理</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="2" >
          <tr bgcolor="#5EB1E3" align="center" >
            <td width="6%" height="30" class="bai">序号</td>
            <td width="11%" class="bai">登录账号</td>
            <td width="10%" class="bai">级 别</td>
            <td width="28%" class="bai">管理权限</td>
            <td width="9%" class="bai">登陆次数</td>
            <td width="14%" class="bai">最后登陆时间</td>
            <td width="22%" class="bai">操 作</td>
          </tr>
          <?php

				while($array=mysql_fetch_array($xxrs))://函数从结果集中取得一行作为关联数组，或数字数组，或二者兼有

			 	?>
          <tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td class="td">ID:&nbsp;<?php echo $array["id"]?></td>
            <td class="td"><?php echo $array["admin"]?></td>
            <td class="td">
<?php 
if($array['jibie']==0){
 echo "超级管理员";
 } else{
 echo "普通管理员";
 }
?></td>
            <td class="td"><?php echo substr($array["glqx"],0,31)."....";?></td>
            <td class="td"><?php echo $array["dlcs"]?></td>
            <td class="td"><?php echo $array["dldata"]?></td>
            <td class="td"><input type="button" name="Submit3" value="修改" onClick="window.location.href='xiugai_administrator.php?id=<?php echo $array["id"]?>' "  class="btn"/>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="button" name="Submit" value="删除" onClick="javascript:window.location.href='admin_administrator.php?id=<?php echo $array["id"]?>&&del=ok' "  class="btn"/></td>
          </tr>
          <?php
				 endwhile;
				 mysql_free_result($xxrs);
				?>
          <tr bgcolor="#F1F5F8" align="center" >
            <form id="form1" name="form1" method="get" action="">
              <td colspan="7" align="right" class="td"><a href="admin_administrator.php?page=1">首页</a> <a href="admin_administrator.php?page=<?php echo ($page-1)?>">上一页</a> <a href="admin_administrator.php?page=<?php echo ($page+1)?>">下一页</a> <a href="admin_administrator.php?page=<?php echo $pagemax?>">尾页</a> 当前第<?php echo $page?>/<?php echo $pagemax?>页
                <input name="page" type="text" id="page" size="2" />
                <input type="submit" name="Submit" value="GO" /></td>
            </form>
          </tr>
        </table></td>
    </tr>
  </table>
</div>
<div style="margin-top:10px">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
    <form action="add_administrator_pass.php" method="post" name="form" onsubmit="return isok(this);">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">增加管理员</div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF" >
              <td height="25" width="18%" class="td">管理员帐号</td>
              <td width="82%"  class="td"><input name="admin" type="text" size="30"  />
                * (请勿使用中文!)</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td width="18%" height="13" class="td">登陆密码</td>
              <td class="td"><input name="password" type="password" size="30"  />
                * </td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td width="18%" height="12" class="td">确认密码</td>
              <td class="td"><input name="password3" type="password" size="30"  />
                * </td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#FFFFFF">
              <td height="25" width="18%" class="td">真实姓名</td>
              <td class="td"><input name="zsname" type="text" size="30"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" class="td">邮 箱</td>
              <td class="td"><input name="email" type="text" size="30"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="25" class="td">管理员级别</td>
              <td class="td"><label>
                  <select name="glyjb" id="glyjb">
                    <option value="1">普通管理员</option>
                    <option value="0">超级管理员</option>
                  </select>
                </label></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="25" class="td">管理权限</td>
              <td class="td"  align="left" style="background:#EDF7FE;font-size:14px; line-height:20px; color: #669966;padding:20px;"><DIV id=div_sp>
      <?php
		$xxrs=mysql_query("select * from tb_list where bid>0 and sid=0  order by  id  asc",$conn);
		while($arr=mysql_fetch_array($xxrs)){		
      ?>
                  <DIV class=tree_0 id=tree_<?php echo $arr['id']?>>
                    <input id="chk_<?php echo $arr['id']?>"  onclick="javascript:CheckClick(<?php echo $arr['id']?>)" type=checkbox value="<?php echo $arr['id']?>" name="chkss[]"  checked="checked"/>
                    <?php echo $arr['title'];?>
       <?php 
	   	$a=$arr['bid'];
	   	$xxrs2=mysql_query("select * from tb_list where bid=$a and sid>0  order by  id asc",$conn);
       	while($arr2=mysql_fetch_array($xxrs2)){

	 ?>
                    <DIV class=tree_1 id=tree_<?php echo $arr2['id']?>> &nbsp;&nbsp;&nbsp;
                      <INPUT id="chk_<?php echo $arr2['id']?>" onclick="javascript:CheckClick(<?php echo $arr2['id']?>)" type=checkbox value="<?php echo $arr2['id']?>" name="chkss[]" checked="checked"  />
                      <?php echo $arr2['title'];?></DIV>
                    <?php }; ?>
                  </DIV>
                  <?php
 };
 mysql_free_result($xxrs);



     ?>
                </DIV></td>
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

$del=trim($_GET["del"]);

$id=trim($_GET["id"]);

if($del=='ok' and $id<>""){
  $rs=mysql_query("delete from tb_admin where id='$id'",$conn);
  echo "<script>window.location.href='admin_administrator.php';</script>" ; 

}
 
mysql_close($conn);
 
?>
