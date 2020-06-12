<?php
include("yz_top.php");

?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_yz.php">业主个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_yz.php">业主信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>发布装修招标</span> </div>
<?php
$qhs=2;
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
                <div class="pR_tit">发布装修招标</div>
                <div class="pR_tit_r"></div>
            </div>
           <div class="pR_content_w">
                <div style="padding:30px 0 50px 0;">
                    <form method="post" action="chuli.php" class="userCenterFrom J_ajaxForm" name="form1" enctype="multipart/form-data"  onSubmit="return checkform();">
                    <input name="type"  type="hidden"   value="addzx" />
                   <input type="hidden"  value="<?php echo $arrayuv["id"]?>" name="uid" />
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>称呼:</div>
                            <input type="text" class="inp name" name="bname" value="<?php echo $arrayuv["relname"]?>">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>电话:</div>
                            <input type="text" class="inp mobilephone" name="tel" value="<?php echo $arrayuv["tel"]?>">
                        </div>
<?php 
 
    if  ($arrayuv['sadd1']<>""){
	   $sfeng=$arrayuv['sadd1'];
	}else{
		$sfeng="选择省份";
	}
if  ($arrayuv['sadd2']<>""){
	    $cfeng=$arrayuv['sadd2'];
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
                            <input type="text" class="inp community" name="qname">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修类型:</div>
                            <select class="sel price_kind" name="leix">
                                <option value="新房装修">新房装修</option><option value="二手房装修">二手房装修</option>                            </select>
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>面积:</div>
                            <input type="text" class="inp acreage" name="mjs">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修方式:</div>
                            <select class="sel decoration_type" name="fangs" >
                            	<option value="清包人工">清包人工</option>
                                <option value="半包辅料">半包辅料</option>
                                <option value="全屋整装">全屋整装</option>                            
                                </select>
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修预算:</div>
                            <select class="sel budget" name="ysuan">
                            	 <option value="2-3万">2-3万</option>
                                 <option value="3-5万">3-5万</option>
                                 <option value="5-8万">5-8万</option>
                                 <option value="8-10万">8-10万</option>
                                 <option value="10-15万">10-15万</option>
                                 <option value="15-20万">15-20万</option>
                                 <option value="20-30万">20-30万</option>
                                 <option value="30-50万">30-50万</option>
                                 <option value="50-80万">50-80万</option>
                                 <option value="80-100万">80-100万</option>
                                 <option value="100万以上">100万以上</option>                            
                                 </select>
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>量房时间:</div>
                            <input type="text"  class="inp endTime " name="ltime">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修时间:</div>
                            <input type="text"  class="inp startTime " name="ztime">
                        </div>
                        <div class="lineW clear">
                            <div class="names"><span class="redStar">*</span>装修要求:</div>
                            <textarea class="demand textarea" name="bei"></textarea>
                        </div>
                        <div class="sendBtnW clear">
                            <input type="submit" value="发布需求" class="J_ajaxSubmitBtn sendBtn"/>
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
mysql_free_result($rsuv);
 mysql_close($conn);
?>
