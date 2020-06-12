<?php 

header('Content-Type:text/html;charset=utf-8');
setcookie("userid",NULL);
setcookie("userid",'',-86400, '/');

echo "<script language='javascript'>"; 
echo "location='/index.php';"; 
echo "</script>";

?>