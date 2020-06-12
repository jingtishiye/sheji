<?php
include("yz_top.php");
?>

<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_yz.php">业主个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_yz.php">业主信息</a></div>
<?php
include("yz_left.php");
?>
  <div class="pageRightWrapper">
    <div class="pageRightWrap" >
      <div class="userInfoWrapper"> <a href="yz_mod.php" class="uHeadW"> <img src="<?php echo $arrayuv["img"]?>" alt="<?php echo $arrayuv["relname"]?>" onerror="this.onerror=null;this.src='images/mrtx.jpg';" width="120" height="120"/>
        <div class="txt">修改资料</div>
        </a>
        <div class="infoW" style="padding-top:13px;">
          <div class="line1"><?php echo $arrayuv["relname"]?><span>&nbsp;&nbsp;&nbsp;&nbsp;欢迎来到互联网工长装修O2O服务平台！</span></div>
          <div class="line3">预约工长信息(<span><?php echo  mysql_num_rows(mysql_query("select id from tb_uyue where  uid=$arrayuv[id]",$conn));?>	</span>)&nbsp;&nbsp;对工长评价(<span><?php echo  mysql_num_rows(mysql_query("select id from tb_upl where  uid=$arrayuv[id]",$conn));?></span>)&nbsp;&nbsp;申请参观工地(<span><?php echo  mysql_num_rows(mysql_query("select id from tb_uylf where  uid=$arrayuv[id]",$conn));?></span>)&nbsp;&nbsp;预约设计师(<span><?php echo  mysql_num_rows(mysql_query("select id from tb_uysj where  uid=$arrayuv[id]",$conn));?></span>)</div>
        </div>
        
        
        
        
         <div class="clear"></div>
      </div>
      
    </div>
    <div class="clear"></div>
    <div class="pageRightWrap">
      <div class="pR_tit_w">
        <div class="pR_tit">业主基本资料</div>
        <div class="pR_tit_r"></div>
      </div>
      <div class="pR_content_w">
        <div style="padding:24px 0 24px 24px;">
          <table class="basic_info_tab">
            <tr>
              <td><div class="ellipsis"><span>用户名：</span><?php echo $arrayuv["username"]?></div></td>
              <td><div class="ellipsis"><span>性别：</span><?php echo $arrayuv["sex"]?></div></td>
              <td><div class="ellipsis"><span>QQ：</span><?php echo $arrayuv["qq"]?></div></td>
              <td><div class="ellipsis"><span>电话：</span><span style="font-size:16px;color:#000;font-weight:bold;"><?php echo $arrayuv["tel"]?></span></div></td>
            </tr>
            <tr>
              <td><div class="ellipsis"><span>昵称：</span><?php echo $arrayuv["relname"]?></div></td>
              <td colspan="3" style="width:555px;"><div class="ellipsis" style="width:555px;"><span>所在地区：</span><?php echo $arrayuv["jiguan"]?></div></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="pageRightWrap">
      <div class="pR_tit_w">
        <div class="pR_tit">我的装修需求</div>
      </div>
    <?php
$cnum_zb = mysql_num_rows(mysql_query("select id from tb_zbiao where  uid=$arrayuv[id]",$conn));
 
?>		
      <div class="pR_content_w">
        <?php if ($cnum_zb==0) {?>
      
        <div class="noneContent">
          <div class="msg yaheiT"><i></i>您还没有绑定装修信息哦~</div>
          <div class="info">现在发布装修招标信息，免费获得1-3位工长提供的设计和报价方案服务</div>
          <div class="linkA_w"> <a class="linkA" href="yz_add.php">免费发布装修需求</a> </div>
        </div>
        
        <?php }else{
	 
$rs2=mysql_query("select * from tb_zbiao where uid=$arrayuv[id]   order by   id desc limit 10 ",$conn);	
while($array2=mysql_fetch_array($rs2)):
  ?>
         	<div style="padding:24px 0 24px 0;">
                		<div class="myApplyEdW">
                        		<div class="line1 clear">
                            		<div class="ellipsis name"><?php echo $array2['qname']?></div>
 <?php if ($array2['sh']==0){?><a href="yz_zbmod.php?editid=<?php echo $array2['id']?>" class="btns">重新编辑</a><?php }?>   
                                    </div>
                        		<div class="line2 clear">
                            		<div class="dd ellipsis">招标ID：<?php echo $array2['id']?></div>
                            		<div class="dd ellipsis">称呼：<?php echo $array2['bname']?></div>
                            		<div class="dd ellipsis">手机号码： <?php echo substr($array2['tel'],0,3)?>****<?php echo substr($array2['tel'],7,4)?></div>
                            		<div class="dd ellipsis">建筑面积：<?php echo $array2['mjs']?>㎡</div>
                            		<div class="dd ellipsis">所在城市：<?php echo $array2['sadd1']?></div>
                        		</div>
                        		<div class="line3 clear">
                        			<div class="dd<?php if ($array2['sh']==0){?> cur<?php }?>">1.客服审核</div>
                                    <div class="dd<?php if ($array2['sh']==1){?> cur<?php }?>">2.分配装修工长</div>
                                    <div class="dd<?php if ($array2['sh']==2){?> cur<?php }?>">3.确定合作工长</div>
                                    <div class="dd<?php if ($array2['sh']==3){?> cur<?php }?>">4.开始装修</div>
                                    <div class="dd<?php if ($array2['sh']==4){?> cur<?php }?>">5.装修完毕</div>                        		
                                  </div>
                    		</div>                	
                            </div>
        
        <?php 
    endwhile;
	mysql_free_result($rs2);
		
		}
		 ?>
        
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
mysql_free_result($rsuv);
 mysql_close($conn);
?>
