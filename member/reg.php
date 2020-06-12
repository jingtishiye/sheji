<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>免费注册会员_互联网工长装修O2O服务平台</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link type="text/css" rel="stylesheet" href="../css/style.css">
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="images/css.css" />
</head>
<body>
<?php
include("../nei_top.php");
?>
<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="20"  ></td></tr>
</table>  
<div class="a11">
<div class="a256">
 <div class="font14" align="left">您现在所在的位置：<a href="/">首页</a> > 用户注册 </div> 
 
<div class="subwd" align="left">
	<!--主体内容开始-->
	<div class="login_box">
		<h2><b class="lt">用户注册</b><span class="rt tit">已有账号？<a href="login.php" class="fontcl2">点击登录</a></span></h2>
		<p class="bar register_one"></p>
		<ul class="register_list">
			<li class="first">
				<p class="tit">业主会员<font class="fontcl2">（注册）</font></p>
				<p>您可以在此发布您的装修信息，我们会尽快安排客服和您联系，可以享受1-3个工长/装修队上门免费量房、做预算、享受先施工后付款保障……</p>
				<a href="reg_pt.php" class="btn_main_big">立即注册</a>
			</li>
            
            <li >
				<p class="tit">工长加盟<font class="fontcl2">（加盟）</font></p>
				<p>注册完成后将有一个工长独立的展示页面，您可以在这里完善工长资料信息、发布最新工地等功能，同时可以让业主在线预约你上门装修……</p>
				<a href="reg_gz.php" class="btn_main_big">立即加盟</a>
			</li>
            
            <li >
				<p class="tit">设计师加盟<font class="fontcl2">（加盟）</font></p>
				<p>注册完成后将有一个设计师独立的展示页面，您可以在这里完善设计师资料信息、发布案例等功能，同时可以让业主联系到你家装设计……</p>
				<a href="reg_sjs.php" class="btn_main_big">立即加盟</a>
			</li>
		</ul>
	</div>
	<!--主体内容结束-->
</div>

</div>
</div>
<table width="100%"  style="margin:0 auto;"  align="center"  cellpadding="0" cellspacing="0" border="0">
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

