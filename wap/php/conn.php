<?php
$conn=mysql_connect("localhost","demo","123456aaa") or die("mysql数据库登录失败");
mysql_select_db("demo",$conn) or die("数据库连接失败");
mysql_query("SET NAMES 'UTF8'");
?>
