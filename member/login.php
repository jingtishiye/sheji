<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>会员登录_互联网工长装修O2O服务平台</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link type="text/css" rel="stylesheet" href="../css/style.css">
<link type="text/css" rel="stylesheet" href="../css/nyqh.css" />
<link type="text/css" rel="stylesheet" href="images/login.css" />
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
 <div class="font14" align="left">您现在所在的位置：<a href="/">首页</a> > 会员登录 </div> 
 
<div class="subwd"  align="left">
	<!--主体内容开始-->
    <style>#account-form p.input{width:245px;} .register_form table td p input.text{width:240px;}</style>
	<div class="login_box">
		<h2><b class="lt">会员登录</b><span class="rt tit">没有账号？<a href="reg.php" class="font14 jhs">立即注册</a></span></h2>
		 
	  <div class="login_lt register_form lt">
			 
            
			<table>
				<tr>
					<td class="title">登录账号</td>
					<td class="middle"><p class="input"><input class="input text"  type="text" id="uname" placeholder="请输入您的登录账号"  maxlength="16"  /></p></td>
					<td><div id="unameTip" style="width:160px;margin-top:-5px;"></div></td>
				</tr>
		
				<tr>
					<td class="title">登录密码</td>
					<td class="middle"><p class="input"><input class="text"  id="passwd" type="password" placeholder="请输入您的登录密码"  maxlength="16"/></p></td>
					<td><div id="passwdTip" style="width:160px;margin-top:-5px;"></div></td>
				</tr>
				<tr>
					<td class="title">验证码</td>
					<td class="middle"><p class="input2"><input class="short"  id="ycode" type="text" placeholder="请输入验证码"  maxlength="6"/></p> <img id="checkpic" class="ycode" onclick="changing();" src='ycode.php' /> <div class="clear"></div></td>
					<td>
                  
  
                    <div id="yzTip" style="width:160px;margin-top:-5px;"></div></td>
				</tr> 
                <tr>
					<td class="title"></td>
					<td class="middle"><div class="font14"><input type="checkbox" value="1" id="ctype"  />
 30天之内自动登录</div></td>
					<td></td>
				</tr>		 
                				<tr>
					<td></td>
					<td class="middle"><input type="button"   mini-submit="#account-form" class="btns" value="立即登录"  onclick="Addreg()"/></td>
					<td></td>
				</tr>
			</table>
			 
		</div>
		<div class="login_rt register_rt rt">
	    <img src="images/login.jpg"  /></div>
		<div class="cl"></div>
        
<div class="font13 line24 pd15"> 
如果忘记密码：请拨打 <?php echo $tels?> 联系客服修改<br />
如果您还不是会员：请点击 <span class="hongs"><a href="reg.php">会员注册</a></span> 注册属于自己的免费网络店铺
</div>
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
   
   function changing(){
     document.getElementById('checkpic').src="ycode.php?"+Math.random();
 } 
   
    function Addreg() {
		
		if($("#ctype").is(":checked")){//选中  
               var ctype = $("#ctype").val();
            } else{
				var ctype = 0;
			}
		
		
        var mobile = $("#uname").val();
        var passwd = $("#passwd").val();
	    var ycode = $("#ycode").val();

     
		if (mobile.length == 0) {
            $("#uname").focus();
            $("#unameTip").html("请输入登录账号！");
             
        }  
        else if (passwd.length == 0) {
            $("#passwd").focus();
			$("#unameTip").html("");
            $("#passwdTip").html("请输入登录密码！");
            
        } else if (passwd.length < 6 || passwd.length > 16) {
            $("#passwd").focus();
            $("#passwdTip").html("请填写您的密码，必须为6－16个字符！");
            
        } else if (ycode.length == 0) {
            $("#ycode").focus();
			$("#passwdTip").html("");
            $("#yzTip").html("请输入验证码！");
            
        } 
         else {
		 
                $.ajax({
                    async: false,
                    url: "/loginchuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "login", "OMobile": mobile, "passwd":passwd, "ctype":ctype, "ycode":ycode},
					
					
					success: function (result) {
						
					if(result == "1"){	 
					  
					     $.alertable.alert('会员登录成功！');
					    window.location.href='/user';  
						
					        $("#uname").val("");
                            $("#passwd").val("");
							$("#ycode").val("");
             
					 
					} else if(result == "2"){	
					       $.alertable.alert('账号密码输入错误！'); 
					  
					} else if(result == "3"){	
					       $.alertable.alert('验证码输入错误！'); 
						   $("#ycode").val("");
					  
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

