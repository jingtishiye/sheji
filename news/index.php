<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=0;
$bid=intval(trim($_GET['bid']));
$uid=intval(trim($_GET['uid'])); 
$keys=trim($_GET['keys']);

 if ($bid>0) {
 $rs5=mysql_query("select btitle,bid from tb_talk_b where bid=$bid",$conn);
 $array5=mysql_fetch_array($rs5);
  $bid=$array5['bid'];
  $btitle=$array5['btitle'];
 mysql_free_result($rs5);
 }
 if ($uid>0) {
 $rs5=mysql_query("select relname,id from tb_user where id=$uid",$conn);
 $array5=mysql_fetch_array($rs5);
  $uid=$array5['id'];
  $uname=$array5['relname'];
 mysql_free_result($rs5);
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php  if ($uid>0) {?><?php echo $uname?>工长最新业主签单<?php }else{?><?php echo $btitle?>装修知识<?php } ?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/renovation_knowledge.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>
 
<div class="clear"></div>
 <div style="background:#f7f7f7">
    	<!--面包屑导航-->
	    <div class="col mbx"> 
	    	 <table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td width="507"  align="left"><div class="font14">您现在所在的位置：<a href="/">首页</a> > <a href="./">装修知识</a> ><span class="shs"><a href="index.php?bid=<?php echo $bid?>"><?php  if ($uid>0) {?><?php echo $uname?>工长<?php }?><?php echo $btitle?></a></span> </div></td>
      <td width="693"  align="left"><script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写名称!!');
      document.thisForm.keys.focus();
      return false;
      } 
 
	 return true;
}
</script>
        <form action="index.php" name="thisForm" method="get"  onSubmit="return checkform();">
          <div class="fr">
            <input type="submit" name="sub1" class="sou01" value="搜索" />
          </div>
          <div class="fr">
            <input type="text" name="keys" class="sou02" value="" placeholder="输入名称搜索" />
          </div>
        </form></td>
    </tr>
  </table>
  <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td height="25"  ></td>
    </tr>
  </table>
	    </div>
	    <!--内容-->
	    <div class="col">
	        <div class="right fr">
	            <link rel="stylesheet" type="text/css" href="images/jquery.alertable.css">	
	    	<div class="signForm_box">
			<div class="signForm_imgBox">
				<?php
$rsw=mysql_query("select id,image,title  from tb_ads where id=1",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
 <img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>">                  
<?php 
 mysql_free_result($rsw); 
 ?>   
			</div>
	 
				<div class="signForm">
					<div><label>您的称呼</label><input type="text" id="Name" placeholder="先生/女士"></div>
						<div><label>小区名称</label><input type="text" id="Community" placeholder="请输入小区名称"></div>
						<div><label>房屋面积</label><input type="text" id="Square" placeholder="1室1厅1卫 65㎡"></div>
						<div><label>您的电话</label><input type="text" id="Mobile" placeholder="请输入手机号码" onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11" ></div>
				 
					 
					<a href="javascript:void(0)" class="confirmation"  onclick="yuesjs()">确认报名</a>
				</div>
			</form>
		</div>	
		     
	        	
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="18"  ></td></tr>
</table>
 
<DIV id=con3>
  <div id=tags3>
  <UL >  
  <LI  class="selectTag3"  ><A onmouseover="selectTag3('tagContent30',this)" href="/gong/" >推荐工长</A></LI>  
  <LI ><A onmouseover="selectTag3('tagContent31',this)" href="/design/" >推荐设计师</A></LI>   
  </UL>
 </div>   
 
 <DIV id=tagContent3> 
  <DIV class="tagContent3  selectTag3" id="tagContent30">

<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<div class="index01">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>
  <?php
$rsx=mysql_query("select  id,img,relname,xjid,glid   from tb_user where yzid=1 and bid=0 and sh=1  order by kbid desc, id desc limit 7",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/gong/show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="/gong/show.php?uid=<?php echo $arrayx['id']?>">
 <div class="font16"><b><?php echo $arrayx['relname']?></b></div>
 
 <div class="pd5">   
 <?php if ($arrayx['xjid']==1){?>
 <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==2){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==3){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==4){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/starh.png"  />
 <?php }elseif ($arrayx['xjid']==5){?>
 <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  /> <img src="/images/star.png"  />
 <?php }?></div>
 
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:8px;">工作年限：<?php echo $arrayx['glid']?>年</div>
 <div class="font14 pd2 huis">工地数量：<?php echo mysql_num_rows(mysql_query("select id from xingxis where uid=$arrayx[id]",$conn));?>个</div>
 </a>
 </td>
  <td width="10"></td> 
 </tr>
 </table>
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>

 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
  </div>  

 </DIV>   
    <DIV class="tagContent3" id="tagContent31">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="15"  ></td></tr>
</table>
<div class="index01">
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>
  <?php
$rsx=mysql_query("select  id,img,relname,jibie,glid   from tb_user where  tjs=1 and bid=1  and sh=1 order by kbid desc, id desc limit 7",$conn);
while($arrayx=mysql_fetch_array($rsx)):
 ?>
 
   <table width="280"   align="center"  cellpadding="0" cellspacing="0" border="0"  style="border:1px solid #e4e4e4;">
   <tr><td width="120" align="center">
<a href="/design/show.php?uid=<?php echo $arrayx['id']?>" target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayx['img']?>"  width="120" height="118"/></a>
 </td>
 <td width="20"></td>
 <td width="130"  align="center"  >
 <a href="/design/show.php?uid=<?php echo $arrayx['id']?>">
 <div class="font16"><b><?php echo $arrayx['relname']?></b></div>
  <div class="pd5">   
<?php
 if ($arrayx['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayx[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
  echo $array5["btitle"];
 mysql_free_result($rs5);
 }
 ?>
 </div>
 <div class="font14 pd5 huis" style="border-top:1px dashed #cccccc; margin-top:8px;">工作年限：<?php echo $arrayx['glid']?>年</div>
 <div class="font14 pd2 huis">案例套数：<?php echo mysql_num_rows(mysql_query("select id from tb_ushe where uid=$arrayx[id]",$conn));?>套</div>
 </a>
 </td>
  <td width="10"></td> 
 </tr>
 </table>
 
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>

 <?php 
	 $i++;
 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>
     </div>   
 
         
   </DIV>     
    </DIV>  
     </DIV>    
  <SCRIPT type=text/javascript>
function selectTag3(showContent3,selfObj3){
	// 操作标签
	var tag3 = document.getElementById("tags3").getElementsByTagName("li");
	var taglength3 = tag3.length;
	for(g=0; g<taglength3; g++){

		tag3[g].className = "";
	}
	selfObj3.parentNode.className = "selectTag3";
	// 操作内容
	for(g=0; h=document.getElementById("tagContent3"+g); g++){
		h.style.display = "none";
	}
	document.getElementById(showContent3).style.display = "block";
}
</SCRIPT>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="13"  ></td></tr>
</table>  
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=8",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:300px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>  
 <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>  
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=9",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:300px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?> 
  <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr><td height="10"  ></td></tr>
</table>  
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=10",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:300px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>   
 
	      	</div>
<script src="images/jquery.alertable.js"></script>
 
            
	        <div class="left fl artlist ">
	        	
	        		
	        			
	        				<div style="width:880px;height:360px;">
	        					
                                
<?php
$rsw=mysql_query("select url,image,title  from tb_ads where id=2",$conn);
$arrayw=mysql_fetch_array($rsw);
?>
<a href="<?php echo $arrayw['url']?>" target="_blank"><img src="<?php echo $arrayw['image']?>"  alt="<?php echo $arrayw['title']?>" style="width:880px;height:360px;"></a>                  
<?php 
 mysql_free_result($rsw); 
 ?>           
 </div>
	        			
<div class="listtitle">
 <?php
 $rs6=mysql_query("select  bid,btitle  from tb_talk_b order by px_id asc  ",$conn);
 while($array6=mysql_fetch_array($rs6)):
 ?>
 <a href="index.php?bid=<?php echo $array6['bid']?>" <?php if ($bid==$array6['bid']){?>class="titleactive"<?php }?>> <?php if ($bid==$array6['bid']){?>><?php }?><?php echo $array6['btitle']?></a>
 <?php 
  endwhile;
  mysql_free_result($rs6); 
 ?>
 
	            	
	            </div>
	            <div class="listbox">
<?php
if ($bid>0){
	$tiao1="and bid=$bid ";
}
if ($uid>0){
	$tiao3="and uid=$uid ";
}
 
if($keys<>""){ 
	$tiao2="and title like '%$keys%'";
}

 $rrs5=mysql_query("select id   from tb_talk where  id>0 $tiao1 $tiao2 $tiao3 ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=10;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=intval(trim($_GET["page"]));
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rsx=mysql_query("select id,title,img,hits,data,bei from tb_talk where  id>0 $tiao1 $tiao2 $tiao3 order by  id desc limit $p,$pagesize ",$conn);
 if($num>0){ 
 while($arrayx=mysql_fetch_array($rsx)):
 $tname=str_replace($keys,"<font color=#FF0000>$keys</font>",$arrayx["title"]);
?>
		                <div class="item">
		                    <div class="img fl">
<a href="show.php?id=<?php echo $arrayx['id']?>" target="_blank" title="<?php echo $arrayx['title']?>"> <img src="../<?php echo $arrayx['img']?>" width="300" height="200" alt="<?php echo $arrayx['title']?>"  onerror="this.onerror=null;this.src='images/news.jpg';" >  </a>
		                    </div>
		                    <div class="info fr rel">
<h1 class="t"><a href="show.php?id=<?php echo $arrayx['id']?>" target="_blank" title="<?php echo $arrayx['title']?>"><?php echo $arrayx['title']?></a> </h1>
		     <p class="num"><?php echo $arrayx['data']?><span><?php echo $arrayx['hits']?>人浏览</span> </p>
		                        <p class="desc"><?php echo $arrayx['bei']?></p>
		                        <div class="btnbox abs"> 
		    <a href="show.php?id=<?php echo $arrayx['id']?>" target="_blank">查看详情</a> 
 
		                        </div>
		                    </div>
		                </div>
<?php 
 endwhile;
 mysql_free_result($rsx); 
 ?>        
  <table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td height="15"  ></td>
            </tr>
          </table>        
<div class="page">

 <a href="?bid=<?php echo $bid?>&uid=<?php echo $uid?>&keys=<?php echo $keys?>&page=<?php echo ($page-1)?>"  ><span class="song"><b><</b></span></a>
<?php 
 if (($page-5)>1) {
$ys=$page-5;
$yb=$page+5;
}
else{
$ys=1;
$yb=6;
}
if ($yb>$pagemax){
$yb=$pagemax;
}
for($ys;$ys<=$yb;$ys++){ 
?>
 <a href="?bid=<?php echo $bid?>&uid=<?php echo $uid?>&keys=<?php echo $keys?>&page=<?php echo $ys?>" <?php if ($ys==$page) {?>class="now"<?php }?> ><?php echo $ys?></a>
 <?php } ?> 
 <a href="?bid=<?php echo $bid?>&uid=<?php echo $uid?>&keys=<?php echo $keys?>&page=<?php echo ($page+1)?>"  ><span class="song"><b>></b></span></a>
</div>
 <?php }?>                    
	            </div>
	        </div>
	        
	        
	        <div class="clear"></div>
	    </div>
<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="35"></td>
  </tr>
</table>
    </div>


<?php
include("../nei_foot.php");
?>
<script type="text/javascript">
   
    function yuesjs() {
        var mobile = $("#Mobile").val();
        var name = $("#Name").val();
        var community = $("#Community").val();
        var square = $("#Square").val();

        var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
        if (name.length == 0) {
            $("#Name").focus();
            $.alertable.alert('请输入您的称呼！');
        }  else if (mobile.length == 0) {
            $("#Mobile").focus();
			$.alertable.alert('请输入手机号码！');
        } else if (!reg.test(mobile)) {
            $("#Mobile").focus();
			$.alertable.alert('手机号码格式不正确！');
        }
        else if (community.length == 0) {
            $("#Community").focus();
			$.alertable.alert('请输入所在小区！');
        } 
         else {
                $.ajax({
                    async: false,
                    url: "/member/chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "yuesjs", "OName": name, "OMobile": mobile, "Community":community,"Square":square},
					
					success: function () { 
					$.alertable.alert('恭喜您，预约成功！！');					        
                            $("#Name").val("");
                            $("#Mobile").val("");
                            $("#Community").val("");
                            $("#Square").val("");
					}
                });
        }
    }
</script>
</body>
</html>
<?php
 mysql_close($conn);
?>