<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>免费量房报价_互联网工长装修O2O服务平台</title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link type="text/css" rel="stylesheet" href="../css/style.css">
<link type="text/css" rel="stylesheet" href="../css/nyqh.css" />
<link type="text/css" rel="stylesheet" href="images/gren.css" />
</head>
<body>
       
<?php
include("../nei_top.php");
?>
 <link rel="stylesheet" type="text/css" href="/design/images/jquery.alertable.css">  
 
<script src="/design/images/jquery.alertable.js"></script>
<script type="text/javascript">
	$(function() {
	  $('.alert-demo').on('click', function() {
		$.alertable.alert('Howdy!');
	  });
	});
</script>   
<div class="clear"></div>
 
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
if(document.form1.dangc.value==''){
	document.form1.dangc.focus();
	 $.alertable.alert('请选择装修档次！');	
      
      return false;
      }
if(document.form1.leix.value==''){
	document.form1.leix.focus();
	   $.alertable.alert('请选择装修类型！');	
      
      return false;
      }
 
 
	 return true;
}

</script> 
<div class="threeBannerW threeBannerW_baojia">
  
    <div class="banner_insideW">
        
        <div class="bannerApplyForm_wrapper">
            <div class="yaheiT t1">我要装修</div>
            <div class="t2 font12">七工长网已为 <span class="num"><?php echo mysql_num_rows(mysql_query("select id from  tb_uyue  ",$conn));?></span> 位业主提供专业装修保障服务</div>
            <div style="padding-left:36px;">
         
                 <form method="post" action="chuli.php" class="bannerApplyForm J_ajaxForm"  name="form1" enctype="multipart/form-data"  onSubmit="return checkform();">
                    <input name="type"  type="hidden"   value="addzx" />    
                    <div class="line">
                        <input class="inp J_delDefVal name" placeholder="您的称呼" name="bname">
                        <div class="err"></div>
                    </div>
                    <div class="line">
                        <input class="inp J_delDefVal mobilephone" placeholder="手机号码" name="tel">
                        <div class="err"></div>
                    </div>
                    <div class="line">
                        <div class="clear">
                            <div class="province_w">
                                <select class="sel province" id="s_province" name="s_province">
                                    
                                </select>
                                <div class="err"></div>
                            </div>
                            <div class="city_w">
                                <select class="sel city" id="s_city" name="s_city" >
                                    
                                </select>
                                <div class="err"></div>
                            </div>
                        </div>
                    </div>
                    <div class="line clear pd10">
                        <div class="province_w">
                         <select class="sel province" id="dangc" name="dangc">
                          <option  value=""  >选择装修档次</option> 
                              <option  value="标准档次"  >标准档次</option> 
                              <option  value="中档装修"  >中档装修</option> 
                              <option  value="高档装修"  >高档装修</option>   
                                </select>
                        
                            
                            <div class="err"></div>
                        </div>
                       <div class="city_w">
                       
                       <select class="sel city" id="leix" name="leix">
                          <option  value=""  >选择装修类型</option> 
                              <option  value="清包人工"  >清包人工</option> 
                              <option  value="半包辅料"  >半包辅料</option> 
                              <option  value="全屋整装"  >全屋整装</option>   
                                </select>
                       
                            
                            <div class="err"></div>
                        </div>
                    </div>
                    <div class="line clear pd10">
                        <select class="sel price_kind" name="fangs">
                             <option value="新房装修">新房装修</option><option value="二手房装修">二手房装修</option>                                          </select>
                        <div class="err"></div>
                    </div>
                    <input type="submit" value="立即提交申请" class="J_ajaxSubmitBtn sendApplyBtn"/>
                </form>
                <div class="promiseW font12"><span style="color:#ff4400;">我们承诺：</span>免费提交申请后，可以免费获得1-3位工长上门量房、报价，综合比较，选最佳，并可享受七工长网4大装修保障！</div>
            </div>
        </div>
    </div>
</div>

<div class="layout-index mx-w">
	<div class="tit yaheiT">七工长4大保障措施，让您放心找工长</div>
	<div class="quote-youshi4" style="padding-left:30px;">
		<img src="images/quote-ys01.png" width="159" height="159" alt="" />
		<div class="t">100%实名制认证</div>
		<div class="txt">所有加入七工长网的装修工长，必须在七工长网进行身份信息备案，身份证保留复印件。</div>
	</div>
	<div class="quote-youshi4" style="padding-left:175px;">
		<img src="images/quote-ys02.png" width="159" height="159" alt="" />
		<div class="t">网络口碑调查</div>
		<div class="txt">所有加入七工长网的装修工长，我们前期都会对其进行网络口碑调查，确保工长是讲信誉，信得过的七工长。</div>
	</div>
	<div class="quote-youshi4" style="padding-left:175px;">
		<img src="images/quote-ys03.png" width="159" height="159" alt="" />
		<div class="t">质保金约束</div>
		<div class="txt">每个加入七工长网的装修公司，均需向网站缴纳以使用保证金对工长进行约束。</div>
	</div>
	<div class="quote-youshi4" style="padding-left:175px;">
		<img src="images/quote-ys04.png" width="159" height="159" alt="" />
		<div class="t">网站媒体监督</div>
		<div class="txt">对不诚信的工长，网站一经发现，永不合作，并且会对其进行曝光络平台的力量，对工长进行舆论监督。</div>
	</div>
</div>
<div class="quote-ysdb"></div>
<div class="layout-index">
	<div class="mx-lf-tit yaheiT">最新申请量房信息</div>
	<div class="mx-lf-list-t">
		<span>装修业主</span><!--<span class="w">小区名称</span>--><span>小区名称</span><span>面积（㎡）</span><span>装修类型</span><span>预算</span><span>发布时间</span>
	</div>
<div id=demo style="overflow:hidden;height:215px;width:100%; ">
<div id=demo1> 
 	<?php
				$xxrs=mysql_query("select * from tb_uyue  order by  id desc limit 50",$conn);
				$J=1;
				while($array=mysql_fetch_array($xxrs)):
			 	?>
	<div class="mx-lf-list">
		<span><?php echo $array['bname']?></span><!--<span class="w">塘沽</span>--><span><?php echo $array['qname']?></span><span><?php echo $array['mjs']?>㎡</span><span><?php echo $array['leix']?></span><span><?php echo $array['ysuan']?></span><span><?php echo date("Y-m-d",strtotime($array['data']))?></span>
	</div>
<?php
				$J++;
				 endwhile;
				 mysql_free_result($xxrs);
				 
				?>
</div>
<div id=demo2></div>
</div>
   <script>
   var speed=50
   demo2.innerHTML=demo1.innerHTML
   function Marquee(){
   if(demo2.offsetTop-demo.scrollTop<=0)
   demo.scrollTop-=demo1.offsetHeight
   else{
   demo.scrollTop++
   }
   }
   var MyMar=setInterval(Marquee,speed)
   demo.onmouseover=function() {clearInterval(MyMar)}
   demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
   </script>
    
    
    </div>
<div class="quote-fw"></div>
<div class="layout-index"><img src="images/quote-pk.jpg" width="1220" height="587" alt="" /></div>
<div class="quote-fapk"></div>
<div class="layout-index mx-w clear" style="margin-bottom:60px;">
	<div class="tit yaheiT">权威媒体报道，七工长推动行业变革</div>
	<div class="mx-mtbd">
		<a href="javascript:;"><img src="images/mt-sjs01.jpg" width="240" height="460" alt="" style=" margin-left:56px;" /></a>
		<a href="javascript:;"><img src="images/mt-sjs02.jpg" width="240" height="460" alt="" style=" margin-left:194px;"/></a>
		<a href="javascript:;"><img src="images/mt-sjs03.jpg" width="240" height="460" alt="" style=" margin-left:194px;"/></a>
	</div>
</div>



<script class="resources library" src="images/city.js" type="text/javascript"></script>
<script type="text/javascript">

var s=["s_province","s_city"];//三个select的name
var opt0 = ["选择省份","选择城市"];//初始值
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
<tr><td height="20"  ></td></tr>
</table>  
<?php
include("../nei_foot.php");
?>
 
 
</body>
</html>
<?php
 mysql_close($conn);
?>

