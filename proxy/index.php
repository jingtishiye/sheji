<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>分站代理_互联网工长装修O2O服务平台</title>
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
 
<script language="javascript">
function checkform(){
 
if(document.form1.bname.value==''){
	   document.form1.bname.focus();
	   $.alertable.alert('请填写您的称呼！');	
     
      return false;
      }
if(document.form1.tel.value==''){
	 document.form1.tel.focus();
	 $.alertable.alert('请填写您的电话！');	
     
      return false;
      }
if(document.form1.s_province.value==''){
	document.form1.s_province.focus();
	 $.alertable.alert('请选择所在城市！');	
      
      return false;
      }
if(document.form1.bei.value==''){
	document.form1.bei.focus();
	   $.alertable.alert('请填写您的简介！');	
      
      return false;
      }
 
 
	 return true;
}

</script> 
 
<div class="proxy-banner">
    <div class="layout-index">
        <div class="materialTogeterW" style="float:left;height:330px;margin-top:70px;">
            <form method="post" action="chuli.php" class="J_ajaxForm materialTogeterFrom" name="form1" enctype="multipart/form-data"  onSubmit="return checkform();">
                 <input name="type"  type="hidden"   value="addzx" />    
                <div class="row clear">
                    <div class="names">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</div>
                    <input type="text" class="name inp J_delDefVal" name="bname" placeholder="请填写联系人姓名"/>
                    <div class="err"></div>
                </div>
                <div class="row clear pd10">
                    <div class="names">联系电话</div>
                    <input type="text" class="mobilephone inp J_delDefVal" name="tel" placeholder="请填写联系人电话"/>
                    <div class="err"></div>
                </div>
                <div class="row clear pd10">
                    <div class="names">意向城市</div>
                    <div class="province_w">
                        <select class="province sel" id="s_province" name="s_province">
                                    </select>
                        <div class="err"></div>
                    </div>
                    <div class="city_w">
                        <select class="city sel" id="s_city" name="s_city" ></select>
                        <div class="err"></div>
                    </div>
                </div>
                <div class="row clear pd10">
                    <div class="names">您的简介</div>
                    <textarea class="remark J_delDefVal" name="bei" placeholder="请简单描述您的基本情况或者您企业的基本情况"></textarea>
                    <div class="err"></div>
                </div>
                <div class="row  clear pd10">
                    <input type="submit" class="J_ajaxSubmitBtn apply_btn" value="立即申请代理"/>
                </div>
                <div class="row">
                    <span class="t3 font12">提交申请后，我们会安排专业的招商经理与您洽淡，<span>请保持手机畅通</span>。</span>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="layout-index"><img src="images/city-dl-01.png" width="1220" height="537"/></div>
<div class="proxy-box clear"><div class="layout-index"><img src="images/city-dl-02.gif" width="1220" height="506"/></div></div>
<div class="layout-index proxy-w">
    <div class="call-w yaheiT" style="height: 54px;">
        <div class="call-l yaheiT" style="height: 54px; line-height: 54px;">加盟电话</div>
        <div class="call-r yaheiT" style="height: 36px;"><?php echo $tels?>（孙经理）</div>
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


<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>  
<?php
include("../nei_foot.php");
?>
 
 
</body>
</html>
<?php
 mysql_close($conn);
?>

