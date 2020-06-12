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

$rsuv=mysql_query("select id,relname from tb_user where id=$id ",$conn);
$numuv=mysql_num_rows($rsuv);
$arrayuv=mysql_fetch_array($rsuv); 

if ($numuv==0){
	echo "<script>alert('预约工长不存在！');history.go(-1);</script>";
	exit; 
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>预约工长<?php echo $arrayuv['relname']?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/yue.css" type="text/css" rel="stylesheet" />

 

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
                <h2>免费预约工长<?php echo $arrayuv['relname']?></h2>
                <p>
                    (已有<?php echo mysql_num_rows(mysql_query("select id from  tb_uyue",$conn));?>人预约)</p>
            </div>
            <div class="clear">
            </div>
            <input type="hidden" id="gzid" value="<?php echo $arrayuv['id']?>">
            <!-- alert-danger -->
            <div class="errbox">
                <i>i</i><span id="topErrorMsg">请留下您的称呼和手机号码，以便我们的客服可以联系到您！</span></div>
            <div class="ibox">
                <label>
                    <span style="color:Red; vertical-align:middle">*</span>您的称呼</label>
                <div class="box-1 input" style="width: 32%">
                    <input placeholder="请输入您的称呼" type="text" id="Name" name="Community" maxlength="11"
                        class="form-control" />
                </div>
                <label>
                    <span style="color:Red; vertical-align:middle">*</span>手机号码</label>
                <div class="box-1 input" style="width: 31%">
                    <input placeholder="请输入手机号码" type="text" id="Mobile" name="Square" onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11"
                        class="form-control" />
                </div>
            </div>
            <div class="ibox">
                <label>
                    <span style="color:Red; vertical-align:middle">*</span>所在小区</label>
                <div class="box-1 input" style="width: 32%">
                    <input placeholder="请输入所在小区" type="text" id="Community" name="Community" maxlength="11"
                        class="form-control" />
                </div>
                <label>
                    <span style="color:Red; vertical-align:middle">*</span>装修方式</label>
                <div class="box-1 input" style="width: 31%">
                    <select name="DType" class="form-control" id="DType" style="width: 148px">
                        <option value="" selected="selected">请选择装修方式</option>
                        <option value="全包">全包</option>
                        <option value="半包">半包</option>
						<option value="清包">清包</option>
                        
                    </select>
                </div>
            </div>
            <div class="ibox">
                <label>
                    房屋面积&nbsp;</label>
                <div class="box-1 input" style="width: 32%">
                    <input placeholder="房屋面积(平米)" type="text" id="Square" name="Square" maxlength="11"
                        class="form-control" />
                </div>
                <label>
                    装修预算&nbsp;</label>
                <div class="box-1 input" style="width: 31%">
       
                   <select name="Price" class="form-control" id="Price" style="width: 148px">
                        <option value="" selected="selected">装修预算(元)</option>
                        <option value="3-5万">3-5万</option>
                        <option value="6-8万">6-8万</option>
						<option value="9-12万">9-12万</option>
                        <option value="13-18万">13-18万</option>
                        <option value="20万以上">20万以上</option>   
                    </select>     
                        
                        
                </div>
            </div>
            
            <div class="ibox">
                <div class="box-2 input">
                    <div class="privacy">
                        <i>i</i><span>为了您的利益及我们的口碑，您的隐私将被严格保密</span>
                    </div>
                    <input type="button" value="立即预约" class="form-btnsub" id="form-btnsub" onclick="AddOrder()" />
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
        var name = $("#Name").val();
        var oid = <?php echo $arrayuv['id']?>;
        var community = $("#Community").val();
        var square = $("#Square").val();
        var dtype = $("#DType").val();
        var price = $("#Price").val();
        var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
        if (name.length == 0) {
            $("#Name").focus();
            $("#topErrorMsg").html("请输入您的称呼！");
            $(".errbox").attr("style", "border:solid 1px #16AD66");
        }  else if (mobile.length == 0) {
            $("#Mobile").focus();
            $("#topErrorMsg").html("请输入手机号码！");
            $(".errbox").attr("style", "border:solid 1px #16AD66");
        } else if (!reg.test(mobile)) {
            $("#Mobile").focus();
            $("#topErrorMsg").html("手机号码格式不正确！");
            $(".errbox").attr("style", "border:solid 1px #16AD66");
        }
        else if (community.length == 0) {
            $("#Community").focus();
            $("#topErrorMsg").html("请输入所在小区！");
            $(".errbox").attr("style", "border:solid 1px #16AD66");
        } 
        else if(dtype == 0)
        {
            $("#DType").focus();
            $("#topErrorMsg").html("请选择装修方式！");
            $(".errbox").attr("style", "border:solid 1px #16AD66");
        }
         else {
            
            
                $.ajax({
                    async: false,
                    url: "/member/chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "yuegz", "OName": name, "OMobile": mobile, "OID": oid,"Community":community,"Square":square,"DType":dtype,"Price":price },
					
					success: function () { 
					$.alertable.alert('恭喜小主预约成功！客服MM正在审核，请您保持手机畅通！');
					 $("#topErrorMsg").html("恭喜小主预约成功！客服MM正在审核，请您保持手机畅通！");
					$(".errbox").attr("style", "border:solid 1px #16AD66");
                            $("#Name").val("");
                            $("#Mobile").val("");
                            $("#Community").val("");
                            $("#Square").val("");
                            $("#DType").val("");
                            $("#Price").val("");
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