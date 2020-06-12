<?php
include("gz_top.php");

?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_gz.php">工长个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_gz.php">工长信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>修改工地信息</span> </div>
<?php
$id=intval(trim($_GET['id']));

if($id==0){
echo "<script type='text/javascript'>history.go(-1);</script>";
exit;
} 

$rsum=mysql_query("select * from xingxis where id=$id and uid=$userid ",$conn);
$numum=mysql_num_rows($rsum);
$arrayum=mysql_fetch_array($rsum); 

if ($numum==0){
	echo "<script>alert('信息错误不存在！');history.go(-1);</script>";
	exit; 
}

 

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
                <div class="pR_tit">修改我的工地</div>
                <div class="pR_tit_r"></div>
            </div>
           <div class="pR_content_w">
                <div style="padding:30px 0 50px 0;">
                    <form method="post" action="chuli.php" class="userCenterFrom J_ajaxForm" name="form1" enctype="multipart/form-data"  onSubmit="return checkform();">
                    <input name="type"  type="hidden"   value="modgd" />
                   <input type="hidden"  value="<?php echo $arrayuv["id"]?>" name="uid" />
                   <input type="hidden"  value="<?php echo $arrayum["id"]?>" name="id" />
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>工地名称:</div>
                            <input type="text" class="inp2 name" name="title" value="<?php echo $arrayum["title"]?>" maxlength="50">
                        </div>
                        
      
                        
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>所在区域:</div>
                           <select class="sel province"  id="qid" name="qid">
                            <option value="" selected="selected">选择区域</option>
 <?php
	   	$rs2=mysql_query("select bid,btitle from tb_uqu  order by  px_id asc ",$conn);
		while($array2=mysql_fetch_array($rs2)):

	   ?>
      <option value="<?php echo $array2['bid']?>" <?php if ($arrayum['qid']==$array2['bid']) echo "selected"?> ><?php echo $array2['btitle']?></option>
      <?php 
	endwhile;
	mysql_free_result($rs2);

	?>
                            </select>
                            <select class="sel city"  name="bid" >
 <option value="" selected="selected">选择施工阶段</option>
 <option value="1" <?php if ($arrayum['bid']==1) echo "selected"?>>开工大吉</option>
                  <option value="2" <?php if ($arrayum['bid']==2) echo "selected"?>>水电改造</option>
                  <option value="3" <?php if ($arrayum['bid']==3) echo "selected"?>>泥瓦阶段</option>
                  <option value="4" <?php if ($arrayum['bid']==4) echo "selected"?>>木工阶段</option>
                  <option value="5" <?php if ($arrayum['bid']==5) echo "selected"?>>油漆阶段</option>
                  <option value="6" <?php if ($arrayum['bid']==6) echo "selected"?>>安装阶段</option>
                  <option value="7" <?php if ($arrayum['bid']==7) echo "selected"?>>验收完成</option>
                            </select> 
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>所在小区:</div>
                            <input type="text" class="inp3 mobilephone" name="qname" value="<?php echo $arrayum["xqus"]?>"  maxlength="20">
                        </div>
                        <div class="lineW clear">
                            <div class="names">小区房型:</div>
                            <input type="text" class="inp community" name="fangx" value="<?php echo $arrayum["fangx"]?>" >
                        </div>
                 
                        <div class="lineW clear">
                            <div class="names">面积:</div>
                            <input type="text" class="inp3 acreage" name="mjs" maxlength="10" value="<?php echo $arrayum["mjs"]?>" > ㎡
                        </div>
                        <div class="lineW clear">
                            <div class="names">业主:</div>
                           <input type="text" class="inp3 acreage" name="yname" maxlength="10" value="<?php echo $arrayum["yname"]?>" >
                        </div>
                        <div class="lineW clear">
                            <div class="names">合同价:</div>
                            <input type="text" class="inp3 acreage" name="hprice" maxlength="10" value="<?php echo $arrayum["hprice"]?>" > 元
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>工地图片:</div>
                           <input name="img" type="text" class="inp5"  id="img"  size="50"  value="<?php echo $arrayum['img']?>"  />
                <input type="text" id="image" value="修改图片" class="btn"  size="10"/>  <?php if ($arrayum['img']<>"") {?>
                <a href="<?php echo $arrayum['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
                <?php } ?>
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>开工日期:</div>
                            <input type="text"  class="inp3 startTime " name="ktime"  onFocus="HS_setDate(this)" value="<?php echo $arrayum['ktime']?>" >
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>工地详情:</div>
                            <textarea name="content" style="width:680px;height:300px;"><?php echo $arrayum["content"]?></textarea>
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
