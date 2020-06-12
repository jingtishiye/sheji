<div class="pageLeftWrapper">
    <div class="titW yaheiT">设计师个人中心</div>
    <div class="navItem">
      <div class="tit">设计师信息</div>
      <a href="sjs_mod.php" <?php if($qhs==1){?>class="cur"<?php }?>>设计师基本资料</a> 
      <a href="sjs_pic.php" <?php if($qhs==2){?>class="cur"<?php }?>>设计师身份证件</a>  
      
      </div>
    <div class="navItem">
      <div class="tit">我的店铺管理</div>
      <a href="sjs_case.php" <?php if($qhs==3){?>class="cur"<?php }?>>我的设计案例</a> 
      <a href="sjs_yue.php" <?php if($qhs==4){?>class="cur"<?php }?>>我的预约信息</a> 
 
      <a href="/design/show.php?uid=<?php echo $arrayuv["id"]?>" target="_blank" >查看我的店铺</a> </div>
    
    <div class="navItem">
      <div class="tit">密码管理</div>
      <a href="sjs_pass.php" <?php if($qhs==5){?>class="cur"<?php }?>>修改登录密码</a> </div>
    
  </div>