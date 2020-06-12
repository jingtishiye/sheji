<?php
include("yz_top.php");
$qhs=3;
?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_yz.php">业主个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_yz.php">业主信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>管理装修招标</span> </div>
<?php
include("yz_left.php");
?>
  <div class="pageRightWrapper">
    <div class="owner_tipW">
            <div class="xLine clear">
                <div class="left">审核状态：</div>
                <div class="right font12">您发布的招标信息，我们的客服人员将会在24小时内<span>（审核时间：每天上午9点 - 下午6点）</span>与您核对，审核通过后，您发布的招标信息才能在网站上显示，并且进入招标状态。<span>如遇节假日，审核时间将适当延长。</span></div>
            </div>
            <div class="xLine clear">
                <div class="left">修改招标：</div>
                <div class="right font12">未审核通过前，可以随意修改招标信息，如果信息审核通过，招标信息将不能修改，如果确实需要修改，请联系您的专职客服。</div>
            </div>

        </div>
 
 
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">发布装修招标</div>
               <div class="pR_tit_r"><a href="yz_add.php" class="st2">新建装修需求</a></div>

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
	 
$rs2=mysql_query("select * from tb_zbiao where uid=$arrayuv[id]   order by   id desc ",$conn);	
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
