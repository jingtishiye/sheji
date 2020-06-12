<?php
include("gz_top.php");

?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_gz.php">工长个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_gz.php">工长信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>添加工地信息</span> </div>
<?php
$qhs=3;
include("gz_left.php");
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
	   $.alertable.alert('请填写工地名称！');	
     
      return false;
      }
if(document.form1.qid.value==''){
	 document.form1.qid.focus();
	 $.alertable.alert('请选择区域！');	
     
      return false;
      }
if(document.form1.bid.value==''){
	document.form1.bid.focus();
	 $.alertable.alert('请选择施工阶段！');	
      
      return false;
      }
if(document.form1.qname.value==''){
	document.form1.qname.focus();
	 $.alertable.alert('请填写您的小区！');	
      
      return false;
      }
 
if(document.form1.img.value==''){
	document.form1.img.focus();
	   $.alertable.alert('请上传工地图片！');	
      
      return false;
      }
if(document.form1.ktime.value==''){
	document.form1.ktime.focus();
	   $.alertable.alert('请填写开工日期！');	
      
      return false;
      }
 
	 return true;
}

</script>  
        
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">添加我的工地</div>
                <div class="pR_tit_r"></div>
            </div>
           <div class="pR_content_w">
                <div style="padding:30px 0 50px 0;">
                    <form method="post" action="chuli.php" class="userCenterFrom J_ajaxForm" name="form1" enctype="multipart/form-data"  onSubmit="return checkform();">
                    <input name="type"  type="hidden"   value="addgd" />
                   <input type="hidden"  value="<?php echo $arrayuv["id"]?>" name="uid" />
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>工地名称:</div>
                            <input type="text" class="inp2 name" name="title" value="" maxlength="50">
                        </div>
                        
      
                        
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>所在区域:</div>
                           <select class="sel province"  id="qid" name="qid">
                            <option value="" selected="selected">选择区域</option>
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
                            <select class="sel city"  name="bid" >
 <option value="" selected="selected">选择施工阶段</option>
                  <option value="1">开工大吉</option>
                  <option value="2">水电改造</option>
                  <option value="3">泥瓦阶段</option>
                  <option value="4">木工阶段</option>
                  <option value="5">油漆阶段</option>
                  <option value="6">安装阶段</option>
                  <option value="7">验收完成</option>
                            </select> 
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>所在小区:</div>
                            <input type="text" class="inp3 mobilephone" name="qname" value=""  maxlength="20">
                        </div>
                        <div class="lineW clear">
                            <div class="names">小区房型:</div>
                            <input type="text" class="inp community" name="fangx">
                        </div>
                 
                        <div class="lineW clear">
                            <div class="names">面积:</div>
                            <input type="text" class="inp3 acreage" name="mjs" maxlength="10"> ㎡
                        </div>
                        <div class="lineW clear">
                            <div class="names">业主:</div>
                           <input type="text" class="inp3 acreage" name="yname" maxlength="10">
                        </div>
                        <div class="lineW clear">
                            <div class="names">合同价:</div>
                            <input type="text" class="inp3 acreage" name="hprice" maxlength="10"> 元
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>工地图片:</div>
                           <input name="img" type="text" class="inp5"  id="img"  size="50" />
                <input type="text" id="image" value="上传图片" class="btn"  size="10"/>
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>开工日期:</div>
                            <input type="text"  class="inp3 startTime " name="ktime"  onFocus="HS_setDate(this)">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>工地详情:</div>
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
