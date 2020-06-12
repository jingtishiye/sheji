<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>业主个人会员免费注册_互联网工长装修O2O服务平台</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link type="text/css" rel="stylesheet" href="../css/style.css">
<link type="text/css" rel="stylesheet" href="../css/nyqh.css" />
<link type="text/css" rel="stylesheet" href="images/css.css" />
</head>
<body>
       
<?php
include("../nei_top.php");
?>
 <link rel="stylesheet" type="text/css" href="/design/images/jquery.alertable.css">  
 
<script src="/design/images/jquery.alertable.js"></script>
<script type="text/javascript">
	$(function() {
	  $('.alert-demo').on('click', function() {
		$.alertable.alert('Howdy!');
	  });
	});
</script>   
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>  
<div class="a11">
<div class="a256">
 <div class="font14" align="left">您现在所在的位置：<a href="/">首页</a> > 业主注册 </div> 
 
<div class="subwd"  align="left">
	<!--主体内容开始-->
    <style>#account-form p.input{width:245px;} .register_form table td p input.text{width:240px;}</style>
	<div class="login_box">
		<h2><b class="lt">业主注册</b><span class="rt tit">已有账号？<a href="login.php" class="fontcl2">点击登录</a></span></h2>
		<p class="bar register_two"></p>
		<div class="login_lt register_form lt">
			<h3>业主<font class="fontcl2">（注册）</font></h3>
			 
            
			<table>
				<tr>
					<td class="title">手机号</td>
					<td class="middle"><p class="input"><input class="input text"  type="text" id="uname" placeholder="请输入您的手机号"  maxlength="11" onkeyup="value=value.replace(/[^\d]/g,'')"/></p></td>
					<td><div id="unameTip" style="width:240px;margin-top:-5px;"></div></td>
				</tr>
		
				<tr>
					<td class="title">密码</td>
					<td class="middle"><p class="input"><input class="text"  id="passwd" type="password" placeholder="请输入您的登录密码"  maxlength="16"/></p></td>
					<td><div id="passwdTip" style="width:240px;margin-top:-5px;"></div></td>
				</tr>
				<tr>
					<td class="title">确认密码</td>
					<td class="middle"><p class="input"><input class="text"  id="confirmpasswd" type="password" placeholder="请再次输入您的登录密码"  maxlength="16"/></p></td>
					<td><div id="confirmpasswdTip" style="width:240px;margin-top:-5px;"></div></td>
				</tr>
                				<tr>
					<td class="title">姓名</td>
					<td class="middle"><p class="input"><input class="text"  id="zname" type="text" placeholder="请输入您的姓名"  maxlength="10"/></p></td>
					<td><div id="znameTip" style="width:240px;margin-top:-5px;"></div></td>
				</tr>
                				<tr>
					<td></td>
					<td class="middle"><input type="button"   mini-submit="#account-form" class="btns" value="立即注册"  onclick="Addreg()"/></td>
					<td></td>
				</tr>
			</table>
			 
		</div>
		<div class="login_rt register_rt rt">
			<p class="title">当前会员注册类型：</p>
			<p class="lei pd3"><font class="fontcl2">业主</font><a href="reg.php">返回重新选择</a></p>

		</div>
		<div class="cl"></div>
	</div>
	<!--主体内容结束-->
</div>

</div>
</div>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>  
<?php
include("../nei_foot.php");
?>

 
<script type="text/javascript">
   
    function Addreg() {
        var mobile = $("#uname").val();
        var passwd = $("#passwd").val();
        var confirmpasswd = $("#confirmpasswd").val();
        var zname = $("#zname").val();

        var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
        
		if (mobile.length == 0) {
            $("#uname").focus();
            $("#unameTip").html("请输入手机号码！");
             
        } else if (!reg.test(mobile)) {
            $("#uname").focus();
            $("#unameTip").html("手机号码格式不正确！");
            
        }
        else if (passwd.length == 0) {
            $("#passwd").focus();
			$("#unameTip").html("输入正确");
            $("#passwdTip").html("请输入您的登录密码！");
            
        } else if (passwd.length < 6 || passwd.length > 16) {
            $("#passwd").focus();
            $("#passwdTip").html("请填写您的密码，必须为6－16个字符！");
            
        } 
        else if(confirmpasswd.length == 0)
        {
            $("#confirmpasswd").focus();
			$("#passwdTip").html("输入正确");
            $("#confirmpasswdTip").html("请再次输入您的登录密码！");
            
        }else if(confirmpasswd !== passwd){
            $("#confirmpasswd").focus();
            $("#confirmpasswdTip").html("两次输入的密码不一样！");
            
        }else if(zname.length == 0){
            $("#zname").focus();
			$("#confirmpasswdTip").html("输入正确");
            $("#znameTip").html("请输入您的姓名！");
            
        }
         else {
			 $("#unameTip").html("");
			 $("#passwdTip").html("");
             $("#confirmpasswdTip").html("");
             $("#znameTip").html("");
                $.ajax({
                    async: false,
                    url: "/loginchuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "addreg", "OMobile": mobile, "passwd":passwd,"zname":zname},
					
					
					success: function (result) {
						
					if(result == "1"){	 
					  
					     $.alertable.alert('会员注册成功！');
					    window.location.href='/user';  
						
					        $("#uname").val("");
                            $("#passwd").val("");
                            $("#confirmpasswd").val("");
                            $("#zname").val("");
					 
					} else if(result == "2"){	
					       $.alertable.alert('账号已经注册过！'); 
					  
					}  
					    
             }	 
           });
        }
    }

   
</script>
</body>
</html>
<?php
 mysql_close($conn);
?>

