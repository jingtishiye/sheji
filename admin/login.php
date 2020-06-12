<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企业网站后台管理系统</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
<script>

function checkok()

{

   if(form1.admin.value=="")

   {

     alert("用户名不能为空");

	 form1.admin.focus();

	 return false;

   }

   if(form1.password.value=="")

   {

     alert("密码不能为空");

	 form1.UserPassword.focus();

	 return false;

   }

    

   return true;

}

</script>
</head>

<body>
<table width="100%" height="613" border="0" cellpadding="0" cellspacing="0" background="images/login_01.gif" align="center">
  <tr>
    <td height="49"></td>
  </tr>
  <tr>
    <td><table width="545" height="564" border="0" cellspacing="0" cellpadding="0" background="images/login_04.gif" align="center">
        <tr>
          <td><table width="380" border="0" align="center" cellpadding="5" cellspacing="0">
              <form name="form1" method="post" action="logincheck.php" id="form1" onsubmit="return checkok();">
                <tr>
                  <td height="130" colspan="3"></td>
                </tr>
                <tr>
                  <td width="58" align="right"><img src="images/user.gif" /></td>
                  <td width="85" class="blu" style="font-size:14px;"><strong>管理帐户：</strong></td>
                  <td width="207"><input type="text" name="admin" id="admin" style="width:164px;height:32px;line-height:34px;background:url(images/inputbg.gif) repeat-x;border:solid 1px #d1d1d1;font-size:9pt;font-family:Verdana, Geneva, sans-serif;"  maxlength="16"/></td>
                </tr>
                <tr>
                  <td align="right"><img src="images/password.gif" /></td>
                  <td class="blu" style="font-size:14px;"><strong>登录密码：</strong></td>
                  <td><input type="password" name="password" id="UserPassword"   style="width:164px;height:32px;line-height:34px;background:url(images/inputbg.gif) repeat-x;border:solid 1px #d1d1d1;font-size:9pt;"  maxlength="16"/></td>
                </tr>
                <tr>
                  <td height="40">&nbsp;</td>
                  <td height="60" colspan="2" align="center"><input name="image" type="image" style=" height:34px; width:95px; border:0;" value="确认" src="images/login.gif" align="middle"></td>
                </tr>
              </form>
            </table></td>
        </tr>
        <tr>
          <td height="44"   align="center"></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
