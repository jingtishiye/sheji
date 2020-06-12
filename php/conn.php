<?php
$conn=mysql_connect("rm-2ze7330anj61428oj.mysql.rds.aliyuncs.com","canyinyunfu","h4eGcJkJhOrj9AEy") or die("mysql数据库登录失败");
mysql_select_db("demo",$conn) or die("数据库连接失败");
mysql_query("SET NAMES 'UTF8'");
?>
