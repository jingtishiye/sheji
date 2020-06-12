<?php 
include("session.php");
include("../php/conn.php");
error_reporting(0);

$bid=trim($_GET['bid']);
if ($bid==""){
    $bid=0;
}


if ($bid==0){
 $bname="7工长";
}elseif ($bid==1){
 $bname="设计师";
} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" id="css" href="images/style.css">
<title>添加<?php echo $bname?>信息</title>
</head>
 
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
  
 K('#image2').click(function() {
	editor.loadPlugin('image', function() {
	editor.plugin.imageDialog({
	imageUrl : K('#img2').val(),
	clickFn : function(img, title, width, height, border, align) {
	K('#img2').val(img);
	editor.hideDialog();
	}
	});
   });
  }); 
  
});
</script>
<style type="text/css">
.label {
	cursor:pointer;
}
.td {
	padding-left:10px;
}
</style>

<body>
<form   method="post" action="admin_user_apass.php?action=add" name="theform" id="theform"  enctype="multipart/form-data">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666" style="margin-top:10px;">
    <tr>
      <td height="30" background="images/bg_list.gif"><div  style="padding-left:10px; font-weight:bold; color:#FFFFFF">添加<?php echo $bname?>信息</div></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" >
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" class="td">区 域</td>
            <td class="td"> 
              <select name="qid" >
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
              </td>
          </tr>
          
        
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="28" class="td">账 号</td>
            <td class="td"><input   maxlength="30" name="uname" value="" size="20" type="text"/>
            <input name="bid" type="hidden" value="<?php echo $bid?>" /> <font color="#FF0000">*</font> 
            </td>
          </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
        <td height="28" class="td">密 码</td>
        <td class="td"><input name="password" type="password"   size="20"  />    <font color="#FF0000">*</font> 
        <input name="data"  type="hidden"   value="<?php echo date('Y-m-d G:i:s')?>" /></td>
      </tr>
      <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
        <td height="28"   class="td">确认密码</td>
        <td class="td">
<input name="repassword"  type="password"   size="20"  />  <font color="#FF0000">*</font> 
        
            </td>
      </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" class="td">性 别</td>
            <td class="td"><input type="radio" name="sex" value="男"  >
              男 &nbsp;
              <input type="radio" name="sex" value="女"  >
              <font color="#ff0000">女</font>　 </td>
          </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="28" class="td">工 种</td>
            <td class="td"> 
            
            <input type="radio" name="jiguan" value="瓦工" checked >
              瓦 工 &nbsp;
              <input type="radio" name="jiguan" value="水电工"  >
              <font color="#ff0000">水电工</font>　
              <input type="radio" name="jiguan" value="油漆工" >
              <font color="#0000ff">油漆工</font>　
              <input type="radio" name="jiguan" value="木工"   >
              <font color="#006600">木工</font>　
              <input type="radio" name="jiguan" value="设计师" >
              <font color="#ff0066">设计师</font>　
            
            </td>
          </tr>
          
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" class="td">手机号</td>
            <td class="td"><input type="text" maxlength="11" name="tel" size="20"  value="" /></td>
          </tr>
          <?php  if ($bid==0){?>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="28" class="td">装修保证金</td>
            <td class="td">
            <input  type="text"  maxlength="10" name="sprice" value=""  size="10" />
              元
              
               </td>
          </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" class="td">工长星级</td>
            <td class="td"> <input type="radio" name="xjid" value="1"  >
              一星 &nbsp;
              <input type="radio" name="xjid" value="2"  >
              <font color="#ff0000">二星</font>　
              <input type="radio" name="xjid" value="3" >
              <font color="#0000ff">三星</font>　
              <input type="radio" name="xjid" value="4"   >
              <font color="#006600">四星</font>　
              <input type="radio" name="xjid" value="5" >
              <font color="#ff0066">五星</font>　
                </td>
          </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="28" class="td">工长工龄</td>
            <td class="td"><input type="text" maxlength="10" name="glid" value=""  size="10" />
              年</td>
          </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" class="td">接单区域</td>
            <td class="td"><input type="text" maxlength="50" name="jquyu" size="50"  value="" id="textbox"/>
              <div id="lbs" style=" padding-top:6px;">
                <?php
	   	$rs2=mysql_query("select btitle from tb_uqu  order by  px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
                <span class="label"><?php echo $array2['btitle']?></span>
                <?php 
	endwhile;
	mysql_free_result($rs2);
	?>
              </div></td>
          </tr>
           <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="28" class="td">口碑值</td>
            <td class="td"><input type="text" maxlength="10" name="kbid" size="10"    /> <font color="#FF0000">口碑值越大越靠前</font></td>
          </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" class="td" style="color:#FF0000;">明星工长</td>
            <td class="td">
            <input type="radio" name="yzid" value="0"  >
              否 &nbsp;
              <input type="radio" name="yzid" value="1"  >
              <font color="#ff0000">是</font> &nbsp;&nbsp;　* <font color="#006600">推荐显示</font> </td>
          </tr>
          
          <?php }elseif ($bid==1){?>
           <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="28" class="td">推荐设计师</td>
            <td class="td">
<input type="radio" name="tjs" value="0" > 不推荐 &nbsp;
<input type="radio" name="tjs" value="1" >  <font color="#ff0000">推荐</font>　

&nbsp;&nbsp;　* <font color="#006600">推荐显示</font>   
            </td>
          </tr> 
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="28" class="td">排序值</td>
            <td class="td"><input type="text" maxlength="10" name="kbid" size="10"    /> <font color="#FF0000">排序值越大越靠前</font></td>
          </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" class="td">从业年限</td>
            <td class="td"><input type="text" maxlength="10" name="glid" value=""  size="10" />
              年</td>
          </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="28" class="td">擅长风格</td>
            <td class="td">
<input type="text" maxlength="50" name="sfeng" size="50"    id="textbox"/>
  <div id="lbs" style=" padding-top:6px;">
  <?php
	   	$rs2=mysql_query("select btitle from tb_ustyle order by  px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
         <span class="label"><?php echo $array2['btitle']?></span>
  <?php 
	endwhile;
	mysql_free_result($rs2);
	?>
              </div> 
            </td>
          </tr>
         
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" class="td">属于级别</td>
            <td class="td"><select name="jibie1">
                <option value="">==请选择级别==</option>
<?php
 $rs5=mysql_query("select btitle,bid  from slei  order by px_id asc ",$conn);
 while($array5=mysql_fetch_array($rs5)):
 ?>
<option value="<?php echo $array5["bid"];?>" ><?php echo $array5["btitle"];?></option>
<?php
  endwhile;
  mysql_free_result($rs5);

  ?>
              </select>
              </td>
          </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="28" class="td">设计理念</td>
            <td class="td">
<input type="text" maxlength="50" name="slnian" size="50"  />
   
            </td>
          </tr>
            <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" class="td">设计收费</td>
            <td class="td"><input type="text" maxlength="10" name="sprice" value=""  size="10" />
              元一平</td>
          </tr>
          <?php }?>
          <script type="text/javascript">

var tb=document.getElementById('textbox');
var labels=document.getElementById('lbs').getElementsByTagName("span");
for(i=0;i<labels.length;i++){
	labels[i].onclick=function(){
		arr=tb.value.split(" ");
		index=-1;
		for(j=0;j<arr.length;j++){
			if(arr[j]==this.innerHTML){
				index=j;
				break;
			}
		}
		if(index>=0){
			arr.splice(index,1);
			this.style.backgroundColor="white";
			this.style.color="black";
		} else {
			arr.push(this.innerHTML);
			this.style.backgroundColor="#336699";
			this.style.color="white";
		}
		str="";
		for(j=0;j<arr.length;j++){
			if(arr[j]!="")
				str+=(arr[j]+" ");
		}
		tb.value=str;
	}
}
</script>
           <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
          
            <td height="25" class="td">上传头像</td>
            <td class="td"><input name="img" type="text" id="img"  size="50" value=""/>
              <input type="text" id="image" value="上传头像" class="btn"  size="10"/></td>
          </tr>
        <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8" >
          
            <td height="25" class="td">上传身份证</td>
            <td class="td"><input name="img2" type="text" id="img2"  size="50" value=""/>
              <input type="text" id="image2" value="上传身份证" class="btn"  size="10"/></td>
          </tr>
        <tr onMouseOver="style.backgroundColor='#EEEEEE'" onMouseOut="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
            <td height="28" width="16%" class="td">简 介</td>
            <td width="84%"  class="td"><textarea name="content" style="width:100%;height:300px;"></textarea></td>
          </tr>
          <tr onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#F1F5F8'" bgcolor="#F1F5F8">
            <td height="25" class="td">&nbsp;</td>
            <td class="td"><input type="submit" name="button" id="button" value="确认添加" class="btn"/></td>
          </tr>
           
        </table></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php 
mysql_close($conn);
?>
