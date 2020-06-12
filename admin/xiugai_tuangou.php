<?php
include("session.php");
include("../php/conn.php");
error_reporting(0);

$id=intval($_GET["id"]);

if($id>0){
	$rs=mysql_query("select * from tb_tuangou where id=$id",$conn);
	$array=mysql_fetch_array($rs);
	
$bid=$array["bid"];
if ($bid>0){
	$rsu=mysql_query("select id,title,uid   from xingxis where id=$bid",$conn);
	$arrayu=mysql_fetch_array($rsu);
	$bname=$arrayu["title"];
	$bid=$arrayu["id"];
	$uid=$arrayu["uid"];
	mysql_free_result($rsu);
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
 
<script charset="utf-8" src="js/data.js"></script>
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
<title>修改验收报告信息</title>
</head>
<body>
<div style="margin-top:10px;">
<form  name="form1" method="post" action="xiugai_tuangou_pass.php" enctype="multipart/form-data">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
  <tr>
    <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改验收报告信息</div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
 
<tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="25" class="td">选择验收工地</td>
        <td class="td">
		<?php echo $bname?><input name="bid" type="hidden"  value="<?php echo $bid?>" /> 
    
    
		</td>
      </tr>
  
     <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28" width="16%" class="td">名 称</td>
        <td width="84%"  class="td">
          <input name="title" type="text" size="50"  value="<?php echo $array["title"]?>"/>
          
          <input name="id" type="hidden" id="id" value="<?php echo $array["id"]?>" />
         
          </td>
      </tr>
<tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="25" class="td">验收阶段</td>
        <td class="td">
       
	<select name="jdid">
				<option value="" selected="selected">===选择施工阶段===</option>	 
                  <option value="1" <?php if ($array['jdid']==1) echo "selected"?>>开工大吉</option>
                  <option value="2" <?php if ($array['jdid']==2) echo "selected"?>>水电改造</option>
                  <option value="3" <?php if ($array['jdid']==3) echo "selected"?>>泥瓦阶段</option>
                  <option value="4" <?php if ($array['jdid']==4) echo "selected"?>>木工阶段</option>
                  <option value="5" <?php if ($array['jdid']==5) echo "selected"?>>油漆阶段</option>
                  <option value="6" <?php if ($array['jdid']==6) echo "selected"?>>安装阶段</option>
                  <option value="7" <?php if ($array['jdid']==7) echo "selected"?>>验收完成</option>
		 </select>
		</td>
      </tr>
	 
	  	  <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" width="16%" class="td">验收结果</td>
        <td class="td">
 <input type="radio" name="ysid"  value="1" <?php if ($array['ysid']==1) echo"checked"?> > 未通过
 <input type="radio" name="ysid"  value="2" <?php if ($array['ysid']==2) echo"checked"?>> <font color="#ff0000">合格</font>
 <input type="radio" name="ysid"  value="3" <?php if ($array['ysid']==3) echo"checked"?>> <font color="#006600">良好</font>
 <input type="radio" name="ysid"  value="4" <?php if ($array['ysid']==4) echo"checked"?>> <font color="#0000ff">优秀</font>　 
        
    
        </td>
      </tr>
 
   
 
       <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8"> 
        <td height="25" width="16%" class="td">图 片</td>
        <td class="td"><input name="img" type="text" id="img"  size="50"  value="<?php echo $array['img']?>" />
         <input type="text" id="image" value="修改图片" class="btn"  size="10"/> </td>
      </tr>
 <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" width="16%" class="td">验收时间</td>
        <td class="td">
        <input name="ytime"   type="text" size="10" value="<?php echo $array['ytime']?>"  onFocus="HS_setDate(this)"/>
        </td>
      </tr>
 
 

      <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" class="td">验收总结</td>
        <td class="td">
<textarea name="content" style="width:100%;height:200px;"><?php echo $array['content']?></textarea> 
 
		</td>
      </tr>
             <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        <td height="25" width="16%" class="td">监理备注</td>
        <td class="td"><textarea   name="yneir" cols="60" rows="5" ><?php echo $array['yneir']?></textarea>	</td>
      </tr>  
       <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="25" class="td">现场图片上传</td>
        <td class="td">
        <?php
		$y=1;
        for($y;$y<=8;$y++){ 
		?>
        <input name="pic<?php echo $y?>" type="hidden"   size="38" value="<?php echo $array["img".$y.""]?>"/> <input name="image<?php echo $y?>" type="file" class="btn"  style="width:180px;" /> <?php if ($array["img".$y.""]<>""){ ?><a  href="../<?php echo $array["img".$y.""]?>" target="_blank"><img src="images/h001.gif" /></a><?php }?><br />
       <?php }?>
       </td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
        
        <td height="25" class="td">&nbsp;</td>
        <td class="td"><input type="submit" name="button" id="button" value="确认修改"  class="btn"/></td>
      </tr>

    </table>
	</td>
  </tr>
</table></form>
</div>
</body>
</html>		
<?php 
mysql_free_result($rs);
mysql_close($conn);
?>