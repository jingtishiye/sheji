<?php
include("sjs_top.php");

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
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_sjs.php">设计师个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_sjs.php">设计师信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>修改登录密码</span> </div>
<?php
$qhs=5;
include("sjs_left.php");
?>
  <div class="pageRightWrapper">
    
 
 
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">修改登录密码</div>
             
            </div>
           
 	
      <div class="pR_content_w">
       <div style="padding:100px 0 150px 140px;">
                    <form method="post" action="" class="userCenterFrom J_ajaxForm" >
                        <div class="lineW clear">
                            <div class="names">用户名:</div>
                            <div class="rSide" style="width:279px;">
                                <span style="float:left;font-size:16px;font-weight:bold;"><?php echo $arrayuv["username"]?></span>

                            </div>
                        </div>
                        <div class="lineW clear">
                            <div class="names">输入旧密码:</div>
                            <input type="password" class="inp oldPwd" id="oldPwd" maxlength="16">
                        </div>
                        <div class="lineW clear">
                            <div class="names">输入新密码:</div>
                            <input type="password" class="inp newPwd" id="newPwd"  maxlength="16">
                        </div>
                        <div class="lineW clear">
                            <div class="names">再次输入新密码:</div>
                            <input type="password" class="inp renewPwd" id="renewPwd"  maxlength="16">
                        </div>
                        <div class="sendBtnW clear">
                            <input type="button" value="确  定" class="J_ajaxSubmitBtn sendBtn" onclick="modmi()"/>
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
<script type="text/javascript">
   
    function modmi() {
		
	 
		
        var oldPwd = $("#oldPwd").val();
        var newPwd = $("#newPwd").val();
		var renewPwd = $("#renewPwd").val();
	 

     
		if (oldPwd.length == 0) {
            $("#oldPwd").focus();
            $.alertable.alert('请输入旧密码！');
             
        }  
        else if (newPwd.length == 0) {
            $("#newPwd").focus();
			$.alertable.alert('请输入新密码！');
            
        } else if (newPwd.length < 6 || newPwd.length > 16) {
            $("#newPwd").focus();
			$.alertable.alert('请填写您的新密码，必须为6－16个字符！！');
            
            
        } else if ( newPwd!==renewPwd ) {
            $("#renewPwd").focus();
			$.alertable.alert('确认密码和新密码不一致！！');
            
            
        } 
         else {
		 
                $.ajax({
                    async: false,
                    url: "chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "modmi", "oldPwd": oldPwd, "newPwd":newPwd },
					
					
					success: function (result) {
						
					if(result == "1"){	 
					  
					     $.alertable.alert('您的密码修改成功！');
					    window.location.href='index_sjs.php';  
						
					        $("#oldPwd").val("");
                            $("#newPwd").val("");
							$("#renewPwd").val("");
             
					 
					} else if(result == "2"){	
					       $.alertable.alert('原密码输入错误！'); 
					  
					} else if(result == "3"){	
					       $.alertable.alert('设计师信息不存在！'); 
					  
					}  
					    
             }	 
           });
        }
    }

   
</script>
</html>
<?php
mysql_free_result($rsuv);
 mysql_close($conn);
?>
