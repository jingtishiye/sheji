<?php
#使用dom生成xml,注意生成的xml中会没有空格。
$dom=new DOMDocument('1.0','utf-8');
@$path="../xml.xml";     //  $path 为xml文件的存储路径。

@$module=$dom->createElement('xml');// root node 
$dom->appendChild($module);

include("../php/conn.php");
$rs=mysql_query("select * from tb_flash order by id asc");
while($array=mysql_fetch_array($rs)){
	$image1=substr($array['image'],-14);
	$image2=substr($image1,0,10);
	
	
	$thumb=$dom->createElement('thumb'); 
	$module->appendChild($thumb);

	$image=$dom->createElement('image');
	$image_value=$dom->createTextNode('pictures/'.$image2);
	$image->appendChild($image_value);
	$thumb->appendChild($image);

	$thumbnail=$dom->createElement('thumbnail'); 
	$thumbnail_value=$dom->createTextNode('images/'.$image2);
	$thumbnail->appendChild($thumbnail_value);
	$thumb->appendChild($thumbnail);
}

echo $dom->saveXML();
@$dom->save($path);
?>

