<?php
include("session.php");
include("../php/conn.php");
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<?php 
$uid=intval(trim($_GET['uid']));
?>
<title>添加工地信息</title>
</head>
<style type="text/css">
.td {
	padding-left:10px;
}
</style>

<body>
<div style="margin-top:10px;">
  <form  name="form1" method="post" action="add_trends_pass.php" enctype="multipart/form-data">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
      <tr>
        <td height="30" background="images/bg_list.gif"><div style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加工地信息</div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
        
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28"  class="td">排序ID</td>
              <td  class="td"><input name="px_id"  type="text" size="10"  /> 数字越大越靠前</td>
            </tr>
        
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" class="td">推荐工地</td>
              <td   class="td"><input type="radio" name="istui"  value="0" checked>
                否
                <input type="radio" name="istui"   value="1" >
                <font color="#FF0000">推荐</font></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28"  class="td">工地名称</td>
              <td  class="td"><input name="title"  type="text" size="50"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" class="td">所在区域</td>
              <td class="td"><select name="qid">
                  <option value="" selected="selected">==所属区域==</option>
                  <?php
	   	$rs2=mysql_query("select bid,btitle from tb_uqu  order by  px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):

	   ?>
      <option value="<?php echo $array2['bid']?>"  ><?php echo $array2['btitle']?></option>
   <?php 
	endwhile;
	mysql_free_result($rs2);
	?>
                </select>
                <select name="bid">
                  <option value="" selected="selected">===选择施工阶段===</option>
                  <option value="1">开工大吉</option>
                  <option value="2">水电改造</option>
                  <option value="3">泥瓦阶段</option>
                  <option value="4">木工阶段</option>
                  <option value="5">油漆阶段</option>
                  <option value="6">安装阶段</option>
                  <option value="7">验收完成</option>
                </select>
                <input name="data"  type="hidden"   value="<?php echo date('Y-m-d G:i:s')?>" /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28" class="td">所在小区</td>
              <td   class="td"><input name="xqus"  type="text"   size="20"  />
                &nbsp;   房型：
                <input name="fangx"  type="text"  size="10"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" width="16%" class="td">面 积</td>
              <td width="84%"  class="td"><input name="mjs" id="mjs" type="text"   size="10"  />
                ㎡ &nbsp;&nbsp;   业主：
                <input name="yname"  type="text"  size="10"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28" width="16%" class="td">合同价</td>
              <td width="84%"  class="td"><input name="hprice"   type="text" size="10"  />
                元 </td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28"  class="td">所属工长</td>
              <td  class="td"><select name="uid">
                  <option value="" selected="selected">==所属工长==</option>
    <?php
	   	$rs2=mysql_query("select id,relname from tb_user where   bid=0 order by  id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
      <option value="<?php echo $array2['id']?>"  <?php if ($uid==$array2['id']) echo "selected"?>><?php echo $array2['relname']?></option>
   <?php 
	endwhile;
	mysql_free_result($rs2);
	?>
                </select>
                </td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="25" class="td">宣传图</td>
              <td class="td"><input name="img" type="text" id="img"  size="50" />
                <input type="text" id="image" value="上传图片" class="btn"  size="10"/></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28"   class="td">开工日期</td>
              <td class="td"><input name="ktime"   type="text" size="10"  onFocus="HS_setDate(this)"/></td>
            </tr>
             <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28"  class="td">简 介</td>
            <td  class="td"><textarea name="content" style="width:100%;height:300px;"></textarea></td>
          </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="25" class="td">&nbsp;</td>
              <td class="td"><input type="submit" name="button" id="button" value="确认提交"  class="btn"/></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
 
<?php mysql_close($conn);?>