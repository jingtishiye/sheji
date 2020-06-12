<?php
include("sjs_top.php");
?>

<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_sjs.php">设计师个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_sjs.php">设计师信息</a></div>
<?php
include("sjs_left.php");
?>
  <div class="pageRightWrapper">
    <div class="pageRightWrap" >
      <div class="userInfoWrapper"> <a href="sjs_mod.php" class="uHeadW"> <img src="<?php echo $arrayuv["img"]?>" alt="<?php echo $arrayuv["relname"]?>" onerror="this.onerror=null;this.src='images/mrtx.jpg';" width="120" height="120"/>
        <div class="txt">修改资料</div>
        </a>
        <div class="infoW"  >
          <div class="line1"><?php echo $arrayuv["relname"]?><span>&nbsp;&nbsp;&nbsp;&nbsp;欢迎来到互联网工长装修O2O服务平台！</span></div>
          <div class="line2">
          <i class="rz"></i><?php if ($arrayuv['sh']==1){?>已认证<?php }else{?>未认证<?php }?>
          <i class="level-02"></i> 
<?php  
if ($arrayuv['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayuv[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 ?>
 <font style="color:#ff0000;"><?php echo $array5["btitle"]?></font>
  <?php
 mysql_free_result($rs5);
 }else{
	 echo "普通";
 }
	  ?>
 <?php if ($arrayuv['tjs']==1){?>推荐<?php }?>设计师
          <i class="koubei"></i>收费 <?php echo $arrayuv["sprice"]?> 元一平
          <i class="time"></i>从业<?php echo $arrayuv["glid"]?>年 
          
          </div>

          <div class="line3">预约信息(<span><?php echo  mysql_num_rows(mysql_query("select id from tb_uysj where  uyid=$arrayuv[id]",$conn));?>	</span>)&nbsp;&nbsp;我的案例(<span><?php echo  mysql_num_rows(mysql_query("select id from tb_ushe where  uid=$arrayuv[id]",$conn));?></span>) </div>
          
          
          <?php if ($arrayuv['sh']==0){?><div class="font14 jhs pd5" align="left">您目前状态：未通过审核,请完善资料：1、上传头像 2、上传身份证件 3、填写自我介绍...如需帮助,请致电:<?php echo $tels?></div><?php }?>
        </div>
        
        
        
        
         <div class="clear"></div>
      </div>
      
    </div>
    <div class="clear"></div>
   
    <div class="pageRightWrap">
      <div class="pR_tit_w">
        <div class="pR_tit">设计师基本资料</div>
        <div class="pR_tit_r"></div>
      </div>
      <div class="pR_content_w">
        <div style="padding:24px 0 24px 24px;">
          <table class="basic_info_tab">
            <tr>
              <td><div class="ellipsis"><span>用户名：</span><?php echo $arrayuv["username"]?></div></td>
              <td><div class="ellipsis"><span>性别：</span><?php echo $arrayuv["sex"]?></div></td>
              <td><div class="ellipsis"><span>设计师收费：</span><?php echo $arrayuv["sprice"]?>元/㎡</div></td>
              <td><div class="ellipsis"><span>电话：</span><span style="font-size:16px;color:#000;font-weight:bold;"><?php echo $arrayuv["tel"]?></span></div></td>
            </tr>
            <tr>
              <td><div class="ellipsis"><span>姓名：</span><?php echo $arrayuv["relname"]?></div></td>
              <td><div class="ellipsis" ><span>所在地区：</span><?php  
			  if ($arrayuv['qid']>0) {
 $rs5=mysql_query("select btitle  from tb_uqu where bid=$arrayuv[qid]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 ?>
 <font style="color:#983D66;"><?php echo $array5["btitle"]?></font>
  <?php
 mysql_free_result($rs5);
 }?></div></td>
              <td><div class="ellipsis"><span>设计师级别：</span><?php  
if ($arrayuv['jibie']>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$arrayuv[jibie]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 ?>
 <font style="color:#ff0000;"><?php echo $array5["btitle"]?></font>
  <?php
 mysql_free_result($rs5);
 }else{
	 echo "普通";
 }
	  ?></div></td>
              <td><div class="ellipsis"><span>擅长风格：</span><?php echo $arrayuv["sfeng"]?></div></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">我的个人简介</div>
                <div class="pR_tit_r"><a href="gz_mod.php" class="st1">修改个人简介</a></div>
            </div>
            <div class="pR_content_w">
                <div style="font-size:14px;color:#505050;padding:24px 28px;" align="left">
                  <?php echo $arrayuv["bei"]?>
                  
                 </div>
            </div>
        </div>
 
    <div class="pageRightWrap">
      <div class="pR_tit_w">
        <div class="pR_tit">我的预约信息</div>
      </div>
    <?php
$cnum_zb = mysql_num_rows(mysql_query("select id from tb_uysj where  uyid=$arrayuv[id]",$conn));
 
?>		
      <div class="pR_content_w">
        <?php if ($cnum_zb==0) {?>
      
        <div class="noneContent">
          <div class="msg yaheiT"><i></i>您还没有业主预约的装修信息哦~</div>
          
        </div>
        
        <?php }else{
	 
$rs2=mysql_query("select * from tb_uysj where uyid=$arrayuv[id]   order by   id desc limit 10 ",$conn);	
while($array2=mysql_fetch_array($rs2)):
  ?>
         	<div style="padding:24px 0 0 0;">
                		<div class="myApplyEdW1">
                        		<div class="line1 clear">
                            		<div class="ellipsis name"><?php echo $array2['qname']?> <?php echo $array2['mjs']?>㎡</div>
 
                                    </div>
                        		<div class="line2 clear">
                            		<div class="dd ellipsis">预约人：<?php echo $array2['bname']?></div>
                            		<div class="dd ellipsis">手机号：： <?php echo substr($array2['tel'],0,3)?>****<?php echo substr($array2['tel'],7,4)?></div>
                            		<div class="dd ellipsis">装修方式： <?php echo $array2['fangs']?></div>
                            		<div class="dd ellipsis">预算：<?php echo $array2['ysuan']?></div>
                            		<div class="dd ellipsis">装修时间：<?php echo $array2['ztime']?></div>
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
    
<div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">我的案例</div>
               <div class="pR_tit_r"><a href="sjs_add.php"  class="st2">添加案例</a></div>

            </div>
           
<?php
$cnum_zb = mysql_num_rows(mysql_query("select id from tb_ushe where  uid=$arrayuv[id]",$conn));
?>		
      <div class="pR_content_w">
        <?php if ($cnum_zb==0) {?>
      
          <div class="noneContent">
          <div class="msg yaheiT"><i></i>您还没有上传设计师案例哦~</div>
          
        </div>
        
        <?php }else{?>
         	<div style="padding:24px 0 24px 0;">
                		                	
              
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
			 
				 
				<tr bgcolor="#eeeeee" align="center" >
					<td width="6%" height="30" class="bai">序号</td>
                    <td width="35%" class="bai">案例名称</td>
				    <td width="9%" class="bai">风格</td>
                    <td width="11%" class="bai">户型类型</td>
					<td width="10%" class="bai">面积</td>
				    <td width="13%" class="bai">案例造价</td>
                    
					<td width="16%" class="bai">操 作</td>
				</tr>
				
				<?php
				$xxrs=mysql_query("select * from tb_ushe where uid=$arrayuv[id] order by  id desc limit 2",$conn);
				$J=1;
				while($array=mysql_fetch_array($xxrs)):
			 	?>
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><div class="wens"><?php echo $J?> </div></td>
				    <td class="td td3 ">
                   <a href="sjs_case_mod.php?id=<?php echo $array["id"]?>"  style="color:#ff0000;"><?php echo $array["title"]?></a> <a href="/case/show.php?id=<?php echo $array["id"]?>" target="_blank"><span  style="color:#006600;">【详细】</span></a> 
                   
               <?php if ($array['img']<>"") {?>
                <a href="../<?php echo $array['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
                <?php } ?>
                <?php if ($array["tjs"]==1){?>
                <font color="#FF0000"><b>推荐</b></font>
                <?php } ?>    
                    </td>
				    <td class="td">
 <?php
 if ($array['bid']>0) {
 $rs5=mysql_query("select btitle  from tb_ustyle where bid=$array[bid]  ",$conn);
 $array5=mysql_fetch_array($rs5);

 ?>
 <font style="color:#ff0066;"><?php echo $array5["btitle"]?></font> 
 <?php
 mysql_free_result($rs5);
 }
 ?>          
                    </td> 
                    <td class="td"><?php echo $array["hxs"]?></td>
                    <td class="td"><font color="#B83066"><?php echo $array["mjs"]?>㎡</font></td>
					 <td class="td huis"><?php echo $array['hprice']?>元</td>
                      
				    <td class="td"><input type="button" name="Submit3" value="修改" onclick="window.location.href='sjs_case_mod.php?id=<?php echo $array["id"]?>' "  class="btn"/> 
				    </td>
				</tr>
				<?php
				$J++;
				 endwhile;
				 mysql_free_result($xxrs);
				 
				?>
				
				 
				 
			</table>
              
              
              
              </div>
        
        <?php }?>
        
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
