<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>修改管理员资料</title>
</head>
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
$id=$_GET["id"];

include("../php/conn.php");
$rs=mysql_query("select * from tb_admin where id='$id'",$conn);
$array=mysql_fetch_array($rs);
?>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666" style="margin-top:10px;">
  <form action="xiugai_administrator_pass.php" method="post" name="add" id="add">
    <tr>
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改管理员资料</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
        <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
          <td height="25" width="34%" class="td">管理员帐号</td>
          <td width="66%"  class="td"><input name="admin" type="text" id="admin" value="<?php echo $array["admin"]?>" size="30"><input type="hidden" name="id" /></td>
        </tr>
        <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
          <td width="34%" class="td">登陆密码</td>
          <td class="td"><input name="password1" type="password" value="" size="30"  />
            不修改请留空！</td>
        </tr>
        <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
          <td width="34%" class="td">确认密码</td>
          <td class="td"><input name="password2" type="password" value="" size="30"  /></td>
        </tr>
        <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
          <td height="25" width="34%" class="td">真实姓名</td>
          <td class="td"><input name="zsname" type="text" value="<?php echo $array["zsname"]?>" size="30"  /></td>
        </tr>
        <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
          <td height="25" class="td">邮箱</td>
          <td class="td"><input name="email" type="text" value="<?php echo $array["email"]?>" size="30"  /></td>
        </tr>
       <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
          <td height="25" class="td">级别</td>
          <td class="td"><input type="radio" name="glyjb" value="1" <?php if ($array['jibie']==1) echo"checked"?> >
            普通管理员 
<input type="radio" name="glyjb" value="0" <?php if ($array['jibie']==0) echo"checked"?>>超级管理员 </td>
        </tr>
         <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
			<td height="25" class="td">管理权限</td>
			<td class="td"  align="left" style="background:#EDF7FE;font-size:14px; line-height:20px; color: #669966;padding:20px;"><DIV id=div_sp>
          <?php
		include("../php/conn.php");	
		$xxrs=mysql_query("select * from tb_list where bid>0 and sid=0  order by  id  asc",$conn);
		while($arr=mysql_fetch_array($xxrs)){		
			?>
            <DIV class=tree_0 id=tree_<?php echo $arr['id']?>>
        <input id="chk_<?php echo $arr['id']?>"  onclick="javascript:CheckClick(<?php echo $arr['id']?>)" type=checkbox value="<?php echo $arr['id']?>" <?php /*?><? if(in_array($arr['id'],explode(',',$array['glqx']))==$arr['id']) echo "checked"?><?php */?> <?php if(strstr($array['glqx'],$arr['id'])>0)echo "checked"?> name="chkss[]" />
        <?php echo $arr['title'];?>
        
     <?php 
	   	$a=$arr['bid'];
	   	$xxrs2=mysql_query("select * from tb_list where bid=$a and sid>0  order by  id asc",$conn);

       	while($arr2=mysql_fetch_array($xxrs2)){
	 ?>
 		 
         <DIV class=tree_1 id=tree_<?php echo $arr2['id']?>>
         &nbsp;&nbsp;&nbsp;
              <INPUT id="chk_<?php echo $arr2['id']?>" onclick="javascript:CheckClick(<?php echo $arr2['id']?>)" type=checkbox value="<?php echo $arr2['id']?>" <?php if(strstr($array['glqx'],$arr2['id'])>0)echo "checked"?> name="chkss[]"  />
         <?php echo $arr2['title'];?></DIV>
         <?php }; ?>
    </DIV> 
     <?php
		};
		mysql_free_result($xxrs);
		
     ?></DIV>
           </td>
		  </tr>
        <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
          <td height="25" class="td">&nbsp;</td>
          <td class="td"><input type="submit" name="button2" id="button2" value="确定修改"  class="btn"/>
            <input name="id" type="hidden" id="id" value="<?php echo $array["id"]?>" /></td>
        </tr>
      </table>
      </td>
    </tr>
  </form>
<?php
mysql_free_result($rs);
mysql_close($conn);
?>
</table>
</body>
</html>

