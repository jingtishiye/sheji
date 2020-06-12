<?php
include("sjs_top.php");

?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_sjs.php">设计师个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_sjs.php">设计师信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>添加设计师案例</span> </div>
<?php
$qhs=3;
include("sjs_left.php");
?>
  <div class="pageRightWrapper">

 <link rel="stylesheet" type="text/css" href="/design/images/jquery.alertable.css">  
<script charset="utf-8" src="../admin_qgz/xyeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="../admin_qgz/xyeditor/lang/zh_CN.js"></script>

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
<script charset="utf-8" src="../admin_qgz/js/data.js"></script>
<script src="/design/images/jquery.alertable.js"></script>
<script type="text/javascript">
	$(function() {
	  $('.alert-demo').on('click', function() {
		$.alertable.alert('Howdy!');
	  });
	});
</script>       
<script language="javascript">
function checkform(){
 
if(document.form1.title.value==''){
	   document.form1.title.focus();
	   $.alertable.alert('请填写案例名称！');	
     
      return false;
      }
if(document.form1.bid.value==''){
	 document.form1.bid.focus();
	 $.alertable.alert('请选择装修风格！');	
     
      return false;
      }
if(document.form1.hxs.value==''){
	document.form1.hxs.focus();
	 $.alertable.alert('请选择户型！');	
      
      return false;
      }
 
if(document.form1.img.value==''){
	document.form1.img.focus();
	   $.alertable.alert('请上传设计案例图片！');	
      
      return false;
      }
 
 
	 return true;
}

</script>  
        
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">添加设计师案例</div>
                <div class="pR_tit_r"></div>
            </div>
           <div class="pR_content_w">
                <div style="padding:30px 0 50px 0;">
                    <form method="post" action="chuli.php" class="userCenterFrom J_ajaxForm" name="form1" enctype="multipart/form-data"  onSubmit="return checkform();">
                    <input name="type"  type="hidden"   value="addsjs" />
                   <input type="hidden"  value="<?php echo $arrayuv["id"]?>" name="uid" />
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>案例名称:</div>
                            <input type="text" class="inp2 name" name="title" value="" maxlength="50">
                        </div>
                        
      
                        
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>选择风格:</div>
                           <select class="sel province"  id="bid" name="bid">
		 <option value="" selected="selected">==选择风格==</option>	 
	<?php
	   	$rs2=mysql_query("select btitle,bid from tb_ustyle order by px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
	 <option value="<?php echo $array2['bid']?>"  ><?php echo $array2['btitle']?></option>
	<?php 
	endwhile;
	mysql_free_result($rs2);
	?>		 
	</select>
     <select class="sel city"   name="hxs">
	<option value="" selected="selected">==选择户型==</option>	 
	 <option value="普通住宅"  >普通住宅</option>
     <option value="跃层"  >跃层</option>
     <option value="公寓"  >公寓</option>
     <option value="别墅"  >别墅</option>
     <option value="其他"  >其他</option>
</select>
                        </div>
                      
                        <div class="lineW clear">
                            <div class="names">案例说明:</div>
                            <input type="text" class="inp community" name="jtitle"  maxlength="60">
                        </div>
                 
                        <div class="lineW clear">
                            <div class="names">面积:</div>
                            <input type="text" class="inp3 acreage" name="mjs" maxlength="10"> ㎡
                        </div>
                       
                        <div class="lineW clear">
                            <div class="names">案例造价:</div>
                            <input type="text" class="inp3 acreage" name="hprice" maxlength="10"> 元
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>案例图片:</div>
                           <input name="img" type="text" class="inp5"  id="img"  size="50" />
                <input type="text" id="image" value="上传图片" class="btn"  size="10"/>
                        </div>
                      
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>案例详情:</div>
                            <textarea name="content" style="width:680px;height:300px;"></textarea>
                        </div>
                        <div class="sendBtnW clear">
                            <input type="submit" value="提交信息" class="J_ajaxSubmitBtn sendBtn"/>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 


<div class="clear"></div>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
<td height="50">
</td>
</tr>
</table>
<?php
include("../nei_foot.php");
?>

</body>
 
</html>
<?php
mysql_free_result($rsuv);
 mysql_close($conn);
?>
