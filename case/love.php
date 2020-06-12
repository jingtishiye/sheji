<?php
include_once("../php/conn.php");

$ip = get_client_ip();
$id = intval($_POST['id']);
if(!isset($id) || empty($id)) exit;


	$sql = "update tb_ushe set hits=hits+10 where id='$id'";
	mysql_query( $sql,$conn);
	$result = mysql_query("select hits from tb_ushe where id='$id'",$conn);
	$row = mysql_fetch_array($result);
	$love = $row['hits'];
	echo "<img src='images/zan.png' /> <span class='case-good-numb'>".$love."</span>";


//获取用户真实IP
function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}
?>