<?php
header("content-type:text/html;charset=utf-8");
include("session.php"); 
include("../php/conn.php");
error_reporting(0);

$actions=trim($_GET["action"]);
 
if ($actions=="mod"){
 
$id=intval(trim($_POST["id"]));
$title=trim($_POST['title']);
$uid=trim($_POST['uid']);
$img=trim($_POST['img']);
$mjs=trim($_POST['mjs']);
$jprice=trim($_POST['jprice']);
$beis=trim($_POST['beis']);
$content=trim($_POST['content']);
$tjs=trim($_POST['tjs']);
 
$uname=trim($_POST['uname']);
$zuser=trim($_POST['zuser']);

if ($uid==""){
$uid=0;
}
if ($tjs==""){
$tjs=0;
}
if( $content<>"" ){
$content=str_replace("'","",$content);
$content=str_replace("white-space:nowrap;","",$content); 
}

if($title<>""   and $img<>""  and $uid>0 and $id>0  ){

 include("../php/dbo.php"); 
 $_my=new Dbo("update tb_talk set title='$title',uid='$uid',img='$img',mjs='$mjs',jprice='$jprice',content='$content',bei='$beis',uname='$uname',zuser='$zuser',tjs='$tjs'  where id=$id",0);
	echo "<script>alert('修改成功！');document.location.href='admin_news.php';</script>";

}else{
	echo "<script>alert('信息不完整！');history.go(-1);</script>";
}
}



$id=intval(trim($_GET["id"]));

if($id>0){
	$rs=mysql_query("select * from tb_talk where bid=4 and id=$id",$conn);
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
<title>修改签单信息</title>
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
<style type="text/css">
.td {
	padding-left:10px;
}
</style>
</head>

<body>
<div style="margin-top:10px;">
  <form  name="form1" method="post" action="?action=mod" enctype="multipart/form-data">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
      <tr>
        <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">修改签单信息</div></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
        
        
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" width="16%" class="td">名 称</td>
              <td width="84%"  class="td"><input name="title"  type="text" size="50"  value="<?php echo $array["title"]?>"/></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28"  class="td">所属工长</td>
              <td   class="td"> 
                            <select name="uid">
		 <option value="0" >==选择工长==</option>	 
	<?php
	   	$rs2=mysql_query("select id,relname from tb_user where bid=0 order by xjid desc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
	 <option value="<?php echo $array2['id']?>"  <?php if ($array['uid']==$array2['id']) echo "selected"?> ><?php echo $array2['relname']?></option>
	<?php 
	endwhile;
	mysql_free_result($rs2);
	 
	?>		 
	</select> 
              
                <input name="id"   type="hidden"   value="<?php echo $array["id"]?>" /></td>
            </tr>
           
          
         <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" class="td">面 积</td>
              <td  class="td"> 
              <input name="mjs"   type="text" size="10"   value="<?php echo $array["mjs"]?>"/> ㎡
            
                </td>
            </tr>
      
             <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28" class="td">合同价</td>
              <td  class="td"> 
              <input name="jprice"   type="text" size="10"  value="<?php echo $array["jprice"]?>"  /> 元
                </td>
            </tr>
              <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28"  class="td">来 源</td>
              <td  class="td"><input name="uname" id="uname" type="text"    value="<?php echo $array["uname"]?>" size="20"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="28" class="td">责 编</td>
              <td class="td"><input name="zuser" id="zuser" type="text"    value="<?php echo $array["zuser"]?>" size="20"  /></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28" class="td">推 荐</td>
              <td class="td">
              <input type="radio" name="tjs"  value="0" <?php if ($array['tjs']==0) echo"checked"?>>
                否
                <input type="radio" name="tjs"  value="1" <?php if ($array['tjs']==1) echo"checked"?>>
                <font color="#FF0000">是</font> 　　</td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="28"  class="td">备 注</td>
              <td  class="td"><textarea   name="beis" cols="60" rows="6" ><?php echo $array["bei"]?></textarea></td>
            </tr>   
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
              <td height="25" class="td">图 片</td>
              <td class="td">
              <input name="img" type="text" id="img"  size="50" value="<?php echo $array["img"]?>"/>
                <input type="text" id="image" value="修改图片" class="btn"  size="10"/></td>
            </tr>
            
          
           <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
              <td height="32"  class="td">简 介</td>
              <td  class="td"><textarea name="content" style="width:100%;height:350px;visibility:hidden;"><?php echo $array["content"]?></textarea></td>
            </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
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
mysql_free_result($rs);
mysql_close($conn);

?>