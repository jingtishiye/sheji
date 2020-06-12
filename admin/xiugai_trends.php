<?php
include("session.php");
include("../php/conn.php");
error_reporting(0);
$id=intval(trim($_GET["id"]));
if($id>0){ 
	$rs=mysql_query("select * from xingxis where id=$id",$conn);
	$array=mysql_fetch_array($rs);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<script charset="utf-8" src="xyeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="xyeditor/lang/zh_CN.js"></script>

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
<title>修改工地信息</title>
<script charset="utf-8" src="js/data.js"></script>
</head>
<style type="text/css">
.td {
	padding-left:10px;
}
</style>

<body >
<div style="margin-top:10px;">
  <form  name="form1" method="post" action="xiugai_trends_pass.php" enctype="multipart/form-data">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改工地信息</div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
              <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28"  class="td">排序ID</td>
              <td  class="td"><input name="px_id"  type="text" size="10"    value="<?php echo $array["px_id"]?>" /> 数字越大越靠前</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" width="16%" class="td">推荐工地</td>
              <td width="84%"  class="td">
              <input type="radio" name="istui"  value="0" <?php if ($array['tjs']==0) echo "checked"?>>
                否
              <input type="radio" name="istui"   value="1" <?php if ($array['tjs']==1) echo "checked"?>>
                <font color="#FF0000">推荐</font>
             &nbsp;&nbsp;&nbsp;&nbsp;  审核状态： 
               <input type="radio" name="sh"  value="0" <?php if ($array['sh']==0) echo "checked"?>>
                否
              <input type="radio" name="sh"   value="1" <?php if ($array['sh']==1) echo "checked"?>>
                <font color="#FF0000">已审核</font> 
                
                </td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28"  class="td">工地名称</td>
              <td  class="td">
              <input name="title" type="text" size="50"  value="<?php echo $array["title"]?>"/>
                <input name="id" type="hidden"  value="<?php echo $array["id"]?>" /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" width="16%" class="td">所在区域</td>
              <td width="84%"  class="td"><select name="qid" >
                  <option value="" selected="selected">==所属区域==</option>
 <?php
	   	$rs2=mysql_query("select bid,btitle from tb_uqu  order by  px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):

	   ?>
      <option value="<?php echo $array2['bid']?>" <?php if ($array['qid']==$array2['bid']) echo "selected"?> ><?php echo $array2['btitle']?></option>
      <?php 
	endwhile;
	mysql_free_result($rs2);

	?>
                </select>
                <select name="bid">
                  <option value="" selected="selected">===选择施工阶段===</option>
 
                  <option value="1" <?php if ($array['bid']==1) echo "selected"?>>开工大吉</option>
                  <option value="2" <?php if ($array['bid']==2) echo "selected"?>>水电改造</option>
                  <option value="3" <?php if ($array['bid']==3) echo "selected"?>>泥瓦阶段</option>
                  <option value="4" <?php if ($array['bid']==4) echo "selected"?>>木工阶段</option>
                  <option value="5" <?php if ($array['bid']==5) echo "selected"?>>油漆阶段</option>
                  <option value="6" <?php if ($array['bid']==6) echo "selected"?>>安装阶段</option>
                  <option value="7" <?php if ($array['bid']==7) echo "selected"?>>验收完成</option>
                  
                  
                </select></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28"   class="td">所在小区</td>
              <td  class="td"><input name="xqus" value="<?php echo $array["xqus"]?>" type="text"   size="20"  />
                &nbsp;   房型：
                <input name="fangx"  type="text" value="<?php echo $array["fangx"]?>" size="10"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28"   class="td">面 积</td>
              <td class="td"><input name="mjs" id="mjs" type="text"   size="10"  value="<?php echo $array["mjs"]?>"/>
                ㎡  &nbsp;&nbsp;   业主：
                <input name="yname"  type="text" value="<?php echo $array["yname"]?>" size="10"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28"   class="td">合同价</td>
              <td class="td"><input name="hprice"   type="text" size="10"  value="<?php echo $array['hprice']?>"  />
                元 </td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28"  class="td">所属工长</td>
              <td   class="td"><select name="uid">
                  <option value="" selected="selected">==所属工长==</option>
      <?php
	   	$rs2=mysql_query("select id,relname from tb_user where  bid=0 order by  id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
    <option value="<?php echo $array2['id']?>"   <?php if ($array['uid']==$array2['id']) echo "selected"?>><?php echo $array2['relname']?></option>
   <?php 
	endwhile;
	mysql_free_result($rs2);

	?>
                </select>
                 </td>
            </tr>
            <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="25"  class="td">宣传图</td>
              <td class="td">
              <input name="img" type="text" id="img"  size="50"  value="<?php echo $array['img']?>" />
                <input type="text" id="image" value="修改图片" class="btn"  size="10"/></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28"  class="td">开工日期</td>
              <td  class="td"><input name="ktime"   type="text" size="10"  onFocus="HS_setDate(this)"  value="<?php echo $array['ktime']?>"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
            <td height="28"  class="td">简 介</td>
            <td   class="td"><textarea name="content" style="width:100%;height:300px;"><?php echo $array["content"]?></textarea></td>
          </tr>  
            
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
              <td height="25" class="td">&nbsp;</td>
              <td class="td"><input type="submit" name="button" id="button" value="确认修改"  class="btn"/></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
 
<?php 
mysql_close($conn);
?>