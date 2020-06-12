<?php
header("content-type:text/html;charset=utf-8");
$rst=mysql_query("select name,keywords,link,link2,link3,mail,description,mail,tel,beian,address,fax,url,qq,qq2,qq3,qq4,qq5,qq6 from  tb_config  where id=19",$conn);
$arrayt=mysql_fetch_array($rst);
$dnames=$arrayt["name"];
$urls=$arrayt["url"];
$link1=$arrayt["link"];
$link2=$arrayt["link2"];
$link3=$arrayt["link3"];
$mingc=$arrayt["mail"];
$keywords=$arrayt["keywords"];
$description=$arrayt["description"];
$tels=$arrayt["tel"];
$fax=$arrayt["fax"];
$beian=$arrayt["beian"];
$address=$arrayt["address"];
$qqs=$arrayt["qq"];

$imgtop=$arrayt["qq2"];
$bans1=$arrayt["qq3"];
$bans2=$arrayt["qq4"];
$bans3=$arrayt["qq5"];
$bans4=$arrayt["qq6"];
 

mysql_free_result($rst); 
?>
