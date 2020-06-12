<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>工长合作会员加盟_互联网工长装修O2O服务平台</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link type="text/css" rel="stylesheet" href="../css/style.css">
<link type="text/css" rel="stylesheet" href="../css/nyqh.css" />
<link type="text/css" rel="stylesheet" href="images/gren.css" />
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
<script type="text/javascript">

$('#if_aggree').trigger('click');
	function setRegBtn(obj){
		if(obj.checked){
			$('#regButton').removeAttr('disabled').removeClass('bggery');
		}else{
			$('#regButton').attr('disabled',true).addClass('bggery');
		}
	}
</script>
<script src="images/scros.js" type="text/javascript" ></script>
<link  href="images/main.css" rel="stylesheet" type="text/css">
<div id="gzhz_banner_wrapper">
    <div id="gzhz_banner">
        <div id="gzhz_form_w">
            <div style="padding:27px 0 0 29px;">
                <form method="post" action="" class="gzhzForm J_ajaxForm"  >
                    <div class="lineW">
                        <div class="names">用&nbsp;&nbsp;户&nbsp;&nbsp;名</div>
                        <input type="text" class="inp J_delDefVal uname" id="uname" placeholder="请填写用户名" maxlength="16">
                        <div class="err"></div>
                    </div>
                    <div class="lineW">
                        <div class="names">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱</div>
                        <input type="text" class="inp J_delDefVal email" id="email" placeholder="请填写联系人邮箱" maxlength="30">
                        <div class="err"></div>
                    </div>
                    <div class="lineW">
                        <div class="names">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</div>
                        <input type="password" class="inp J_delDefVal pwd" id="pwd" maxlength="16">
                        <div class="err"></div>
                    </div>
                    <div class="lineW">
                        <div class="names">确认密码</div>
                        <input type="password" class="inp J_delDefVal repwd" id="repwd" maxlength="16">
                        <div class="err"></div>
                    </div>
                    <div class="lineW">
                        <div class="names">工长姓名</div>
                        <input type="text" class="inp J_delDefVal fullname" id="fullname" placeholder="请填写工长姓名" maxlength="10">
                        <div class="err"></div>
                    </div>
                    <div class="lineW">
                        <div class="names">联系电话</div>
                        <input type="text" class="inp J_delDefVal phone" id="tel" placeholder="请填写联系电话" maxlength="11" onkeyup="value=value.replace(/[^\d]/g,'')">
                        <div class="err"></div>
                    </div>
                    <div class="lineW">
                        <div class="names">选择城市</div>
                        <div class="province_w">
                            <select class="sel province" id="s_province" name="s_province">
 
                            </select>
                            <div class="err"></div>
                        </div>
                        <div class="city_w">
                            <select class="sel city" id="s_city" name="s_city" >
 
                            </select> 
                            <div class="err"></div>
                        </div>
                    </div>
                    <input type="button" value="立即加入" class="J_ajaxSubmitBtn gzhzSubBtn" id="regButton"  onclick="Addreg()"/>
                    <div class="agreeW">
                        <input type="checkbox" name="agree" class="agree" checked="checked" onclick="setRegBtn(this)" id="if_aggree">我接受<a href="/about/index.php?id=5" target='_blank'>七工长服务条款</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script class="resources library" src="images/city.js" type="text/javascript"></script>
<script type="text/javascript">

var s=["s_province","s_city"];//三个select的name
var opt0 = ["选择省份","选择城市"];//初始值
function _init_area(){ //初始化函数
  for(i=0;i<s.length-1;i++){
   document.getElementById(s[i]).onchange=new Function("change("+(i+1)+")");
  }
  change(0);
}


_init_area();

</script>
<div class="gzhzForemanShow">
    <div class="titleW">
        <div class="t1 yaheiT">他们加入了七工长</div>
        <div class="t2">目前已有<span><?php echo mysql_num_rows(mysql_query("select id from  tb_user where bid=0",$conn));?></span>位工长已注册七工长网</div>
    </div>
    
<div class="mr_frbox">
  <div class="mr_frBtnL prev"></div>
  <div class="mr_frUl">
  <ul>
   <?php
$rsx=mysql_query("select relname,img,id from tb_user where bid=0 and yzid=1 and sh=1  order by xjid desc,kbid desc  limit 12",$conn);
while($arrayx=mysql_fetch_array($rsx)):
?>   
   <li>
 
  <div class="pinpic"><a href="/gong/show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><img src="../<?php echo $arrayx['img']?>" alt="<?php echo $arrayx['relname']?>" /></a></div>
  <div  class="zname font12"><a href="/gong/show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><?php echo $arrayx['relname']?></a></div>
   </li>
  <?php
endwhile;
mysql_free_result($rsx); 
?>   
 
  </ul>
  </div>
  <div  class="mr_frBtnR next" ></div>
</div>
<script language="javascript">
 
jQuery(".mr_frbox").slide({titCell:"",mainCell:".mr_frUl ul",autoPage:true,effect:"leftLoop",autoPlay:true,vis:6});
</script>
    
    
    
    
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
        var uname = $("#uname").val();
		var email = $("#email").val();
        var passwd = $("#pwd").val();
        var confirmpasswd = $("#repwd").val();
        var zname = $("#fullname").val();
		var tele = $("#tel").val();
		var sadd1=$("#s_province").val();
        var sadd2=$("#s_city").val();
  

        var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
		
		if (uname.length == 0) {
            $("#uname").focus();
			$.alertable.alert('请输入您的用户名！');

            
        } else if (email.length == 0) {
            $("#email").focus();
			$.alertable.alert('请填写你的邮箱！');
           
        } else if (!myreg.test(email)) {
            $("#email").focus();
			$.alertable.alert('联系邮箱格式不正确！');
          
        }else if (tele.length == 0) {
            $("#tel").focus();
			$.alertable.alert('请输入手机号码！');
           
        } else if (!reg.test(tele)) {
            $("#tel").focus();
			$.alertable.alert('手机号码格式不正确！');
          
        }
        else if (passwd.length == 0) {
            $("#pwd").focus();
			$.alertable.alert('请输入您的登录密码！');

            
        } else if (passwd.length < 6 || passwd.length > 16) {
            $("#pwd").focus();
			$.alertable.alert('请填写您的密码，必须为6－16个字符！');
           
        } 
        else if(confirmpasswd.length == 0)
        {
           $("#repwd").focus();
			$.alertable.alert('请再次输入您的登录密码！');

            
        }else if(confirmpasswd !== passwd){
             $("#repwd").focus();
			$.alertable.alert('两次输入的密码不一样！');
            
        }else if(zname.length == 0){
            $("#fullname").focus();
			$.alertable.alert('请输入工长姓名！');
            
        }
         else {
			  
                $.ajax({
                    async: false,
                    url: "/loginchuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "addgz", "uname": uname, "passwd":passwd,"email":email,"utel":tele,"sadd1":sadd1,"sadd2":sadd2,"zname":zname},
					
					
					success: function (result) {
						
					if(result == "1"){	 
					  
					     $.alertable.alert('工长会员加盟成功！');
					    window.location.href='/user';  
						
					        $("#uname").val("");
                            $("#pwd").val("");
                            $("#repwd").val("");
							$("#email").val("");
							$("#tel").val("");
                            $("#fullname").val("");
					 
					} else if(result == "2"){	
					       $.alertable.alert('用户名已经注册过！'); 
					  
					} else if(result == "3"){	
					       $.alertable.alert('邮箱已经注册过！'); 
					  
					} else if(result == "4"){	
					       $.alertable.alert('手机号已经注册过！'); 
					  
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

