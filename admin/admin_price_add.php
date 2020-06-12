<?php 

include("session.php"); 

include("../php/conn.php");

error_reporting(0);

 



$bid=intval($_GET["bid"]);

if ($bid>0){

 

	$rsu=mysql_query("select id,title,uid,xqus,hprice,mjs  from xingxis where id=$bid",$conn);

	$arrayu=mysql_fetch_array($rsu);

	$bname=$arrayu["title"];

	$bid=$arrayu["id"];

	$uid=$arrayu["uid"];

	$mjs=$arrayu["mjs"];

	$xqus=$arrayu["xqus"];

	$hprice=$arrayu["hprice"];

 

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" id="css" href="images/style.css">

 

<script charset="utf-8" src="xyeditor/kindeditor-min.js"></script>

<script charset="utf-8" src="xyeditor/lang/zh_CN.js"></script>

<title>添加装修报价</title>

 

<script>

var editor;

KindEditor.ready(function(K) {

editor = K.create('textarea[name="content"]', {

allowFileManager : true

  });

var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : 'xyeditor/php/upload_json.php?dir=file',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#url').val(url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('自定义错误信息: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});

  K('#image').click(function() {

	editor.loadPlugin('image', function() {

	editor.plugin.imageDialog({

	imageUrl : K('#img').val(),

	clickFn : function(img, title, width, height, border, align) {

	K('#img').val(img);

	editor.hideDialog();

	}

	});

  });

  });

});

</script> 

<style type="text/css">

.td{

padding-left:10px;

}

</style>

</head>

<body >

<div style="margin-top:10px;">

<form  name="form1" method="post" action="admin_price_adds.php?action=add" enctype="multipart/form-data">

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">

  <tr>

    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加装修报价</div></td>

  </tr>

  <tr>

    <td bgcolor="#FFFFFF">

    

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >

 

      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="32" width="16%" class="td">工地名称</td>

        <td width="84%"  class="td"><?php echo $bname?><input name="bid" type="hidden"  value="<?php echo $bid?>" />   </td>

      </tr>

      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

        <td height="32" width="16%" class="td">所在小区</td>

        <td width="84%"  class="td"><input name="xqus"  type="text"  value="<?php echo $xqus?>"  size="20"  />  </td>

      </tr>

        <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="32" width="16%" class="td">所属工长</td>

        <td width="84%"  class="td">

         

	<?php

	   	$rs2=mysql_query("select relname from tb_user where bid=0 and sh=1  and id=$uid",$conn);

		 $array2=mysql_fetch_array($rs2);

	   ?>

	<?php echo $array2['relname']?><input name="uid" type="hidden"  value="<?php echo $uid?>" />

	<?php 

	mysql_free_result($rs2);

	?>		 

 

       </td>

      </tr>

    

      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

        <td height="32" width="16%" class="td">合同价</td>

        <td width="84%"  class="td">

<input name="hprice" value="<?php echo $hprice?>"  onKeyUp="value=value.replace(/[^\d]/g,'') "  type="text"   size="10"  /> 元 &nbsp;&nbsp;&nbsp;&nbsp;

面积：<input name="mjs" value="<?php echo $mjs?>"  onKeyUp="value=value.replace(/[^\d]/g,'') "  type="text"   size="10"  /> ㎡

</td>

      </tr>

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >

        <td height="32" width="16%" class="td">装修方式</td>

        <td width="84%"  class="td"> <input type="radio" name="fangs"  value="半包" checked>半包 <input type="radio" name="fangs"   value="全包" ><font color="#FF0000">全包</font> <input type="radio" name="fangs"   value="清包" ><font color="#0000FF">清包</font>  <input name="data" type="hidden"   value="<?php echo date('Y-m-d G:i:s')?>" /></td>

      </tr>

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

        

        <td height="32" width="16%" class="td">装修报价</td>

        <td class="td">

    <input class="ke-input-text" size="50" type="text" id="url" name="pic" value=""  /> <input type="button" id="uploadButton" value="上传附件" /> 

       </td>

      </tr>

<tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" > 

    <td height="32" width="16%" class="td">装修项目价格</td>

        <td width="84%"  class="td" style="line-height:28px;">

  基础工程：<input name="price1"   type="text" size="10"  /> 元 &nbsp;&nbsp; 水电工程：<input name="price2"   type="text" size="10"  /> 元 <br />

  客餐厅及过道：<input name="price3"   type="text" size="10"  /> 元 <br />主 卧：<input name="price4"   type="text" size="10"  /> 元 &nbsp;&nbsp; 次 卧(含多个)：<input name="price5"   type="text" size="10"  /> 元<br />

  厨 房：<input name="price6"   type="text" size="10"  /> 元 &nbsp;&nbsp; 卫生间(含多个)：<input name="price7"   type="text" size="10"  /> 元 <br />

  阳 台：<input name="price8"   type="text" size="10"  /> 元 &nbsp;&nbsp; 杂项工程：<input name="price9"   type="text" size="10"  /> 元 <br />

  其他收费：<input name="price10"   type="text" size="10"  /> 元  

  

      　　</td>

      </tr>

      

 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">

      

        <td height="32" class="td">&nbsp;</td>

        <td class="td"><input type="submit" name="button" id="button" value="确认提交"  class="btn"/></td>

      </tr>



    </table>

    </td>

      </tr>



    </table>

	</form>

    

</div>

</body>

</html>

<div style="display:none;"><textarea id="content" name="content"  class="button1"></textarea></div>

<?php

mysql_free_result($rsu);

}







mysql_close($conn); 

?>