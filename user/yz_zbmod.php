<?php
include("yz_top.php");
$qhs=2;

$editid=intval(trim($_GET['editid']));

if($editid==0){
echo "<script type='text/javascript'>history.go(-1);</script>";
exit;
} 

$rsum=mysql_query("select * from tb_zbiao where id=$editid and uid=$userid ",$conn);
$numum=mysql_num_rows($rsum);
$arrayum=mysql_fetch_array($rsum); 

if ($numum==0){
	echo "<script>alert('信息错误不存在！');history.go(-1);</script>";
	exit; 
}

if ($arrayum["sh"]>0){
	echo "<script>alert('信息不能编辑！');history.go(-1);</script>";
	exit; 
}


?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_yz.php">业主个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_yz.php">业主信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>编辑 装修招标</span> </div>
<?php
include("yz_left.php");
?>
  <div class="pageRightWrapper">
    <div class="owner_tipW">
            <div class="tit1">立即新建装修需求，您可获得以下6项免费服务！</div>
            <ul class="ul-1">
                <li>1.免费验房服务（落地城市）</li>
                <li>2.三个工长上门量房</li>
                <li>3.三个设计师提供不同的设计方案</li>
                <li>4.三个设计师免费出具三份报价对比</li>
                <li>5.免费第三方监管节点验收服务（装修保用户）</li>
                <li>6.先装修，满意后付款（装修保用户）</li>
            </ul>
        </div>
 <link rel="stylesheet" type="text/css" href="/design/images/jquery.alertable.css">  
 
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
 
if(document.form1.bname.value==''){
	   document.form1.bname.focus();
	   $.alertable.alert('请填写您的称呼！');	
     
      return false;
      }
if(document.form1.tel.value==''){
	 document.form1.tel.focus();
	 $.alertable.alert('请填写您的电话！');	
     
      return false;
      }
if(document.form1.qname.value==''){
	document.form1.qname.focus();
	 $.alertable.alert('请填写您的小区！');	
      
      return false;
      }
if(document.form1.mjs.value==''){
	document.form1.mjs.focus();
	   $.alertable.alert('请填写房屋面积！');	
      
      return false;
      }
if(document.form1.ltime.value==''){
	document.form1.ltime.focus();
	   $.alertable.alert('请填写量房时间！');	
      
      return false;
      }
if(document.form1.ztime.value==''){
	document.form1.ztime.focus();
	   $.alertable.alert('请填写装修时间！');	
      
      return false;
      }
if(document.form1.bei.value==''){
	 document.form1.bei.focus();
	   $.alertable.alert('请填写装修要求！');	
     
      return false;
      }
	 return true;
}

</script>  
        
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">修改装修招标</div>
                <div class="pR_tit_r"></div>
            </div>
           <div class="pR_content_w">
                <div style="padding:30px 0 50px 0;">
                    <form method="post" action="chuli.php" class="userCenterFrom J_ajaxForm" name="form1" enctype="multipart/form-data"  onSubmit="return checkform();">
                    <input name="type"  type="hidden"   value="modzx" />
                   <input type="hidden"  value="<?php echo $arrayuv["id"]?>" name="uid" />
                   <input type="hidden"  value="<?php echo $arrayum["id"]?>" name="editid" />
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>称呼:</div>
                            <input type="text" class="inp name" name="bname" value="<?php echo $arrayum["bname"]?>">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>电话:</div>
                            <input type="text" class="inp mobilephone" name="tel" value="<?php echo $arrayum["tel"]?>">
                        </div>
<?php 
 
    if  ($arrayum['sadd1']<>""){
	   $sfeng=$arrayum['sadd1'];
	}else{
		$sfeng="选择省份";
	}
if  ($arrayum['sadd2']<>""){
	    $cfeng=$arrayum['sadd2'];
	}else{
		$cfeng="选择地级市";
	}
?>         
                        
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>所在地区:</div>
                           <select class="sel province"  id="s_province" name="s_province">
 
                            </select>
                            <select class="sel city" id="s_city" name="s_city" >
 
                            </select> 
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>小区名称:</div>
                            <input type="text" class="inp community" name="qname" value="<?php echo $arrayum["qname"]?>" maxlength="20">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修类型:</div>
                            <select class="sel price_kind" name="leix">
                                <option value="新房装修"  <?php if ($arrayum["leix"]=="新房装修") echo "selected"?>>新房装修</option>
                                <option value="二手房装修"  <?php if ($arrayum["leix"]=="二手房装修") echo "selected"?>>二手房装修</option>                            </select>
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>面积:</div>
                            <input type="text" class="inp acreage" name="mjs"  value="<?php echo $arrayum["mjs"]?>" maxlength="10">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修方式:</div>
                            <select class="sel decoration_type" name="fangs" >
                            	<option value="清包人工" <?php if ($arrayum["fangs"]=="清包人工") echo "selected"?>>清包人工</option>
                                <option value="半包辅料" <?php if ($arrayum["fangs"]=="半包辅料") echo "selected"?>>半包辅料</option>
                                <option value="全屋整装" <?php if ($arrayum["fangs"]=="全屋整装") echo "selected"?>>全屋整装</option>                            
                                </select>
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修预算:</div>
                            <select class="sel budget" name="ysuan">
                            	 <option value="2-3万" <?php if ($arrayum["ysuan"]=="2-3万") echo "selected"?>>2-3万</option>
                                 <option value="3-5万" <?php if ($arrayum["ysuan"]=="3-5万") echo "selected"?>>3-5万</option>
                                 <option value="5-8万" <?php if ($arrayum["ysuan"]=="5-8万") echo "selected"?>>5-8万</option>
                                 <option value="8-10万" <?php if ($arrayum["ysuan"]=="8-10万") echo "selected"?>>8-10万</option>
                                 <option value="10-15万" <?php if ($arrayum["ysuan"]=="10-15万") echo "selected"?>>10-15万</option>
                                 <option value="15-20万" <?php if ($arrayum["ysuan"]=="15-20万") echo "selected"?>>15-20万</option>
                                 <option value="20-30万" <?php if ($arrayum["ysuan"]=="20-30万") echo "selected"?>>20-30万</option>
                                 <option value="30-50万" <?php if ($arrayum["ysuan"]=="30-50万") echo "selected"?>>30-50万</option>
                                 <option value="50-80万" <?php if ($arrayum["ysuan"]=="50-80万") echo "selected"?>>50-80万</option>
                                 <option value="80-100万" <?php if ($arrayum["ysuan"]=="80-100万") echo "selected"?>>80-100万</option>
                                 <option value="100万以上" <?php if ($arrayum["ysuan"]=="100万以上") echo "selected"?>>100万以上</option>                            
                                 </select>
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>量房时间:</div>
                            <input type="text"  class="inp endTime " name="ltime" value="<?php echo $arrayum["ltime"]?>" maxlength="10">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修时间:</div>
                            <input type="text"  class="inp startTime " name="ztime" value="<?php echo $arrayum["ztime"]?>" maxlength="10">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修要求:</div>
                            <textarea class="demand textarea" name="bei"><?php echo $arrayum["bei"]?></textarea>
                        </div>
                        <div class="sendBtnW clear">
                            <input type="submit" value="修改需求" class="J_ajaxSubmitBtn sendBtn"/>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script class="resources library" src="images/city.js" type="text/javascript"></script>
<script type="text/javascript">

var s=["s_province","s_city"];//三个select的name
var opt0 = ["<?php echo $sfeng?>","<?php echo $cfeng?>"];//初始值
function _init_area(){ //初始化函数
  for(i=0;i<s.length-1;i++){
   document.getElementById(s[i]).onchange=new Function("change("+(i+1)+")");
  }
  change(0);
}


_init_area();

</script>


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
