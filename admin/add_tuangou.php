<?php
include("session.php"); 
include("../php/conn.php");
error_reporting(0);

$bid=intval($_GET["bid"]);
if ($bid>0){
 
	$rsu=mysql_query("select id,title,uid   from xingxis where id=$bid",$conn);
	$arrayu=mysql_fetch_array($rsu);
	$bname=$arrayu["title"];
	$bid=$arrayu["id"];
	$uid=$arrayu["uid"];
 

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<script charset="utf-8" src="../kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>

<script>
var editor;
KindEditor.ready(function(K) {
  editor = K.create('textarea[name="content"]', {
    allowFileManager : true
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
<script charset="utf-8" src="js/data.js"></script>
<title>添加验收报告信息</title>

 
</head>
<body>
<div style="margin-top:10px;">
<form  name="form1" method="post" action="add_tuangou_pass.php" enctype="multipart/form-data">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
  <tr>
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加验收报告信息</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >

  <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="25" class="td">选择验收工地</td>
        <td class="td">
		<?php echo $bname?><input name="bid" type="hidden"  value="<?php echo $bid?>" />  
   
		</td>
      </tr>
       <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28" width="16%" class="td">验收名称</td>
        <td width="84%"  class="td">
          <input name="title"  type="text" size="50"  />  
           </td>
      </tr>
 <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="25" class="td">验收阶段</td>
        <td class="td">
 
		<select name="jdid">
				    <option value="" selected="selected">===选择验收阶段===</option>	 
					<option value="1">开工大吉</option>
                  <option value="2">水电改造</option>
                  <option value="3">泥瓦阶段</option>
                  <option value="4">木工阶段</option>
                  <option value="5">油漆阶段</option>
                  <option value="6">安装阶段</option>
                  <option value="7">验收完成</option>
		 </select>
    
		</td>
      </tr>
	 
           
	  <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" width="16%" class="td">验收结果</td>
        <td class="td">
        <input type="radio" name="ysid"  value="1" checked="checked" > 未通过
        <input type="radio" name="ysid"  value="2" > <font color="#ff0000">合格</font>
        <input type="radio" name="ysid"  value="3" > <font color="#006600">良好</font>
		<input type="radio" name="ysid"  value="4" > <font color="#0000ff">优秀</font>　
        <input name="uid" type="hidden"  value="<?php echo $uid?>" />
        </td>
      </tr>
 
 
       <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        <td height="25" width="16%" class="td">图 片</td>
        <td class="td"><input name="img" type="text" id="img"  size="50"  />
   <input type="text" id="image" value="上传图片" class="btn"  size="10"/></td>
      </tr>
      <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" width="16%" class="td">验收时间</td>
        <td class="td">
        <input name="ytime"   type="text" size="10"  onFocus="HS_setDate(this)"/>
        </td>
      </tr>
 
  <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" class="td">验收总结</td>
        <td class="td">
		<textarea name="content" style="width:100%;height:200px;"></textarea></td>
      </tr>
       <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        <td height="25" width="16%" class="td">监理备注</td>
        <td class="td"><textarea   name="yneir" cols="60" rows="5" ></textarea>	</td>
      </tr>
     <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" width="16%" class="td">现场图片上传</td>
        <td class="td">
        <input name="pic1" type="hidden"   size="38" value=""/> <input name="image1" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic2" type="hidden"   size="38" value=""/> <input name="image2" type="file" class="btn"  style="width:180px;" /> <br />
        <input name="pic3" type="hidden"   size="38" value=""/> <input name="image3" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic4" type="hidden"   size="38" value=""/> <input name="image4" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic5" type="hidden"   size="38" value=""/> <input name="image5" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic6" type="hidden"   size="38" value=""/> <input name="image6" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic7" type="hidden"   size="38" value=""/> <input name="image7" type="file" class="btn"  style="width:180px;" /><br />
        <input name="pic8" type="hidden"   size="38" value=""/> <input name="image8" type="file" class="btn"  style="width:180px;" /><br />
       </td>
      </tr> 
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        
        <td height="25" class="td">&nbsp;</td>
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
<?php 
mysql_free_result($rsu);
}
mysql_close($conn);
?>