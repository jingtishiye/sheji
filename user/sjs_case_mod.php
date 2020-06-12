<?php
include("sjs_top.php");

?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_sjs.php">设计师个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_sjs.php">设计师信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>修改设计师案例</span> </div>
<?php
$id=intval(trim($_GET['id']));

if($id==0){
echo "<script type='text/javascript'>history.go(-1);</script>";
exit;
} 

$rsum=mysql_query("select * from tb_ushe where id=$id and uid=$userid ",$conn);
$numum=mysql_num_rows($rsum);
$arrayum=mysql_fetch_array($rsum); 

if ($numum==0){
	echo "<script>alert('信息错误不存在！');history.go(-1);</script>";
	exit; 
}


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
                <div class="pR_tit">修改设计师案例</div>
                <div class="pR_tit_r"></div>
            </div>
           <div class="pR_content_w">
                <div style="padding:30px 0 50px 0;">
                    <form method="post" action="chuli.php" class="userCenterFrom J_ajaxForm" name="form1" enctype="multipart/form-data"  onSubmit="return checkform();">
                    <input name="type"  type="hidden"   value="modcase" />
                   <input type="hidden"  value="<?php echo $arrayuv["id"]?>" name="uid" />
                   <input type="hidden"  value="<?php echo $arrayum["id"]?>" name="id" />
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>案例名称:</div>
                            <input type="text" class="inp2 name" name="title" value="<?php echo $arrayum["title"]?>" maxlength="50">
                        </div>
                        
      
                        
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>选择风格:</div>
                           <select class="sel province"  id="bid" name="bid">
		 <option value="" selected="selected">==选择风格==</option>	 
	<?php
	   	$rs2=mysql_query("select btitle,bid from tb_ustyle order by px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):
	   ?>
	 <option value="<?php echo $array2['bid']?>" <?php if ($arrayum['bid']==$array2['bid']) echo "selected"?> ><?php echo $array2['btitle']?></option>
	<?php 
	endwhile;
	mysql_free_result($rs2);
	?>		 
	</select>
     <select class="sel city"   name="hxs">
	<option value="" selected="selected">==选择户型==</option>	 
	<option value="普通住宅" <?php if ($arrayum["hxs"]=="普通住宅") echo "selected"?> >普通住宅</option>
     <option value="跃层" <?php if ($arrayum["hxs"]=="跃层") echo "selected"?> >跃层</option>
     <option value="公寓" <?php if ($arrayum["hxs"]=="公寓") echo "selected"?> >公寓</option>
     <option value="别墅" <?php if ($arrayum["hxs"]=="别墅") echo "selected"?> >别墅</option>
     <option value="其他" <?php if ($arrayum["hxs"]=="其他") echo "selected"?> >其他</option>
</select>
                        </div>
                      
                        <div class="lineW clear">
                            <div class="names">案例说明:</div>
                            <input type="text" class="inp community" name="jtitle"  maxlength="60"  value="<?php echo $arrayum["jtitle"]?>">
                        </div>
                 
                        <div class="lineW clear">
                            <div class="names">面积:</div>
                            <input type="text" class="inp3 acreage" name="mjs" maxlength="10"  value="<?php echo $arrayum["mjs"]?>"> ㎡
                        </div>
                       
                        <div class="lineW clear">
                            <div class="names">案例造价:</div>
                            <input type="text" class="inp3 acreage" name="hprice" maxlength="10"  value="<?php echo $arrayum["hprice"]?>"> 元
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>案例图片:</div>
                           <input name="img" type="text" class="inp5"  id="img"  size="50" value="<?php echo $arrayum['img']?>" />
                <input type="text" id="image" value="修改图片" class="btn"  size="10"/> <?php if ($arrayum['img']<>"") {?>
                <a href="<?php echo $arrayum['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
                <?php } ?>
                        </div>
                      
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>案例详情:</div>
                            <textarea name="content" style="width:680px;height:300px;"><?php echo $arrayum['content']?></textarea>
                        </div>
                        <div class="sendBtnW clear">
                            <input type="submit" value="修改信息" class="J_ajaxSubmitBtn sendBtn"/>
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
mysql_free_result($rsum);
mysql_free_result($rsuv);
 mysql_close($conn);
?>
