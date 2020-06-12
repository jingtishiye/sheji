<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=2;

$id=intval(trim($_GET['id']));

if($id==0){
echo "<script type='text/javascript'>history.go(-1);</script>";
exit;
} 

$rsuv=mysql_query("select id,relname,img from tb_user where id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('工长信息错误！');history.go(-1);</script>";
	exit; 
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>评价工长<?php echo $arrayuv['relname']?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/yue2.css" type="text/css" rel="stylesheet" />
 
</head>
<body>
<?php
include("../nei_top.php");
?>
<link rel="stylesheet" type="text/css" href="/design/images/jquery.alertable.css">  
<script src="/design/images/jquery.alertable.js"></script>
  
<div class="clear"></div>
<div class="main">
        <div class="yyitem">
            <div class="ititle">
                <h2>点评工长<?php echo $arrayuv['relname']?></h2>
                <div class="gjpic" align="center"><a href="/gong/show.php?uid=<?php echo $arrayuv['id']?>" target="_blank"><img src="http://www.sina7gz.com/<?php echo $arrayuv['img']?>" /></a></div>
                <p>
                    (已有<?php echo mysql_num_rows(mysql_query("select id from  tb_upl where  uyid=$arrayuv[id] ",$conn));?>人点评)</p>
            </div>
            
            <div class="clear">
            </div>
            <input type="hidden" id="gzid" value="<?php echo $arrayuv['id']?>">
            <!-- alert-danger -->
            
            <div class="ibox">
           
                <label>
                    <span style="color:Red; vertical-align:middle">*</span>手机号码</label>
                <div class="box-1 input" style="width: 31%">
                    <input placeholder="请输入手机号码" type="text" id="Mobile" name="Square" onKeyUp="value=value.replace(/[^\d]/g,'')" value="<?php echo $telnas?>"  maxlength="11"
                        class="form-control" />
                </div>
            </div>
            <div class="ibox">
                <label>
                    <span style="color:Red; vertical-align:middle">*</span>点评信息</label>
                <div class="box-1 input" style="width:75%">
 <textarea   id="Dneir" name="Dneir"   class="form-control1"  ></textarea>
                </div>
                 
            </div>
            <?php 
			if ($userid>0){
			?>
            <input type="hidden" id="Dpic"  value="<?php echo $zsimg?>" />
             <?php }else{?>
            <div class="ibox" >
                <label>
                    选择头像&nbsp;</label>
                <div class="box-1 input" style="width:75%">
        <select name=lanrentuku  style="float:left;" id="Dpic" onchange="document.images['idface'].src=options[selectedIndex].value;">
        <option value="/images/tou01.jpg" >头像01</option>
        <option value="/images/tou02.jpg" >头像02</option>
        <option value="/images/tou03.jpg" >头像03</option>
        <option value="/images/tou04.jpg" >头像04</option>
        <option value="/images/tou05.jpg" >头像05</option>
        <option value="/images/tou06.jpg" >头像06</option>
        <option value="/images/tou07.jpg" >头像07</option>
        <option value="/images/tou08.jpg" >头像08</option>
        <option value="/images/tou09.jpg" >头像09</option>
        <option value="/images/tou10.jpg" >头像10</option>
        <option value="/images/tou11.jpg" >头像11</option>
        <option value="/images/tou12.jpg" >头像12</option>
        <option value="/images/tou13.jpg" >头像13</option>
        <option value="/images/tou14.jpg" >头像14</option>
        <option value="/images/tou15.jpg" >头像15</option>
        <option value="/images/tou16.jpg" >头像16</option>
</select>   
<div style="float:right;"><img src="/images/tou01.jpg" id=idface width="50"></div>  
                </div>
                 
            </div>
            <?php }?>
            <div class="errbox">
                <i>i</i><span id="topErrorMsg">请填写您的手机号码！</span></div>
            <div class="ibox">
                <div class="box-2 input">
                   
                    <input type="button" value="提 交 信 息" class="form-btnsub" id="form-btnsub" onclick="AddOrder()" />
                </div>
            </div>
        </div>
    </div>

 
<?php
include("../yue_foot.php");
?>

<script type="text/javascript">
   
    function AddOrder() {
        var mobile = $("#Mobile").val();
        var oid = <?php echo $arrayuv['id']?>;
        var Dneir = $("#Dneir").val();
        var Dpic = $("#Dpic").val();

        var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
        if (mobile.length == 0) {
            $("#Mobile").focus();
            $("#topErrorMsg").html("请输入手机号码！");
            $(".errbox").attr("style", "border:solid 1px #16AD66");
        } else if (!reg.test(mobile)) {
            $("#Mobile").focus();
            $("#topErrorMsg").html("手机号码格式不正确！");
            $(".errbox").attr("style", "border:solid 1px #16AD66");
        }
        else if (Dneir.length == 0) {
            $("#Dneir").focus();
            $("#topErrorMsg").html("请填写评论信息！");
            $(".errbox").attr("style", "border:solid 1px #16AD66");
        } 
         
         else {
            
            
                $.ajax({
                    async: false,
                    url: "/member/chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "plgz", "OMobile": mobile, "OID": oid,"Dneir":Dneir,"Dpic":Dpic},
					
					success: function () { 
					
					$.alertable.alert('点评成功，请耐心等待审核！');
					 $("#topErrorMsg").html("点评成功，请耐心等待审核！");
	 
					$(".errbox").attr("style", "border:solid 1px #16AD66");
                           
                            $("#Mobile").val("");
                            $("#Dneir").val("");
            
					}
					
                 

                });
            

        }


    }

   
</script>

</body>
</html>
<?php
  mysql_free_result($rsuv); 
  mysql_close($conn);
 ?>