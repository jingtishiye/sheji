<div class="pageLeftWrapper">
    <div class="titW yaheiT">工长个人中心</div>
    <div class="navItem">
      <div class="tit">工长信息</div>
      <a href="gz_mod.php" <?php if($qhs==1){?>class="cur"<?php }?>>工长基本资料</a> 
      <a href="gz_pic.php" <?php if($qhs==2){?>class="cur"<?php }?>>工长身份证件</a>  
      
      </div>
    <div class="navItem">
      <div class="tit">我的店铺管理</div>
      <a href="gz_gd.php" <?php if($qhs==3){?>class="cur"<?php }?>>在建工地管理</a> 
      <a href="gz_yue.php" <?php if($qhs==4){?>class="cur"<?php }?>>我的预约信息</a> 
 
      <a href="/gong/show.php?uid=<?php echo $arrayuv["id"]?>" target="_blank" >查看我的店铺</a> </div>
    <div class="navItem">
      <div class="tit">评价管理</div>
      <a href="gz_pl.php" <?php if($qhs==5){?>class="cur"<?php }?>>查看对我的评价</a> </div>
    <div class="navItem">
      <div class="tit">密码管理</div>
      <a href="gz_pass.php" <?php if($qhs==6){?>class="cur"<?php }?>>修改登录密码</a> </div>
    
  </div>