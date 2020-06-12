<?php 
	include("session.php");
	include("../php/conn.php");
	$ad=$_SESSION['admins'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理后台菜单</title>
<link rel="stylesheet" type="text/css" id="css" href="images/M1.css">
<script type="text/javascript">

function menu(id,onlyone){

if(!document.getElementById || !document.getElementsByTagName){return false;}

this.menu=document.getElementById(id);

this.submenu=this.menu.getElementsByTagName("ul");

this.speed=3;

this.time=10;

this.onlyone=onlyone==true?onlyone:false;

this.links = this.menu.getElementsByTagName("a");

}//欢迎来到站长特效网，我们的网址是www.zzjs. net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。

menu.prototype.init=function(){

var mainInstance = this;

for(var i=0;i<this.submenu.length;i++){

this.submenu[i].getElementsByTagName("span")[0].onclick=function(){

mainInstance.toogleMenu(this.parentNode);

};

}//欢迎来到站长特效网，我们的网址是ww w.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。

for(var i=0;i<this.links.length;i++){

this.links[i].onclick=function(){

this.className = "current";

mainInstance.removeCurrent(this);

}

}

}//欢迎来到站长特效网，我们的网址是w ww.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。

menu.prototype.removeCurrent = function(link){

for (var i = 0; i < this.links.length; i++){

if (this.links[i] != link){

this.links[i].className = " ";

}

}

}//欢迎来到站长特效z网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。

menu.prototype.toogleMenu=function(submenu){

if(submenu.className=="open"){

this.closeMenu(submenu);

}else{

this.openMenu(submenu);

}

}//欢迎来到站长特z效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。

menu.prototype.openMenu=function(submenu){

var fullHeight=submenu.getElementsByTagName("span")[0].offsetHeight;

var links = submenu.getElementsByTagName("a");

for (var i = 0; i < links.length; i++){

fullHeight += links[i].offsetHeight;

}//欢迎来到站长z特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。

 var moveBy = Math.round(this.speed * links.length);

var mainInstance = this;

 var intId = setInterval(function() {

  var curHeight = submenu.offsetHeight;

  var newHeight = curHeight + moveBy;

  if (newHeight <fullHeight){

  submenu.style.height = newHeight + "px";

  }else {

clearInterval(intId);

submenu.style.height = "";

submenu.className = "open";

}

}, this.time);

this.collapseOthers(submenu);

}//欢迎来到站长z特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。

menu.prototype.closeMenu=function(submenu){

var minHeight=submenu.getElementsByTagName("span")[0].offsetHeight;

    var moveBy = Math.round(this.speed * submenu.getElementsByTagName("a").length);

var mainInstance = this;

 var intId = setInterval(function() {

  var curHeight = submenu.offsetHeight;

  var newHeight = curHeight - moveBy;

  if (newHeight > minHeight){

  submenu.style.height = newHeight + "px";

  }else {

clearInterval(intId);

submenu.style.height = "";

submenu.className = "";

}

}, this.time);

}//欢迎来到站x长特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。

menu.prototype.collapseOthers = function(submenu){

if(this.onlyone){

for (var i = 0; i < this.submenu.length; i++){

if (this.submenu[i] != submenu){

this.closeMenu(this.submenu[i]);

}

}

}

}//欢迎来到站长特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大量高质量js代码，还有许多广告代码下载。

</script>
<style type="text/css">
* {
	margin:0;
	padding:0;
	background-color:#6AA6DB;
	font-family:Arial, Helvetica, sans-serif;
}
body {
	margin:0;
	padding:0;
}
.menu {
	width:145px;
}
.menu ul {
	list-style-type:none;
	height:34px;
	line-height:25px;
	overflow:hidden;
	cursor:pointer;
}
.menu ul.open {
	height:auto;
}
.menu ul span {
	display:block;
	padding-left:15px;
	font-size:14px;
	color:#FFFF00;
	height:28px;
	padding-top:5px;
	background:#1D82BE;
	border-bottom:2px solid #FEFAED;
}
.menu ul span a {
	font-size:14px;
	color:#FFFF00;
	background-color:#1D82BE;
}
.menu ul li {
	border-bottom:1px solid #DDDDDD;
}
.menu li a {
	color:#24568C;
	display:block;
	background:#FFFFFF;
	padding:2px 10px 2px 30px;
	text-decoration:none;
	text-align:left;
	font-size:12px;
}
.menu li a:hover {
	background-color:#006666;
	color:#ffffff;
}
.menu li a.current {
	background-color:#006666;
	color:#ffffff;
}
</style>
</head>

<body >
<div  id="menu" class="menu" style="float:left;">
  <?php 

	$xxrs=mysql_query("select * from tb_list where bid>0 and sid=0 order by id asc",$conn);

	while($array=mysql_fetch_array($xxrs)):

		$xx=mysql_query("select * from tb_admin where admin='$ad'",$conn);

		$rs=mysql_fetch_array($xx);

		$rs1=in_array($array['bid'],explode(',',$rs['glqx']));

		if($array['bid']==$rs1){

	?>
  <ul>
    <span>&nbsp;<?php echo $array['title']?></span>
    <?php

		$a=$array['bid'];

		$xxrs2=mysql_query("select * from tb_list where bid=$a and sid>0  order by  id asc",$conn);

		while($array2=mysql_fetch_array($xxrs2)):

			$rs2=in_array($array2['sid'],explode(',',$rs['glqx']));

			if($array2['sid']==$rs2){

		?>
    <LI  > <a href="<?php echo $array2['url']?>" target="main"><?php echo $array2['title']?></a> </LI>
    <?php 

					  };

					  endwhile; ?>
  </UL>
  <?php 

	};

	endwhile ;

	mysql_close($conn);



?>
  <ul>
    <span>&nbsp; <a href="exit.php"    target="_parent">安全退出</a></span>
  </ul>
</div>
<script type="text/javascript">

window.onload = function() {

myMenu = new menu("menu",true);

myMenu.init();

};

</script>
</div>
</body>
</html>