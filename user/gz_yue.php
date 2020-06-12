<?php
include("gz_top.php");
?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_gz.php">工长个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_gz.php">工长信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>预约我的信息</span> </div>
<?php
$qhs=4;
include("gz_left.php");
?>
  <div class="pageRightWrapper">
    
 
 
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">预约我的信息</div>
             
            </div>
           
<?php
$cnum_zb = mysql_num_rows(mysql_query("select id from tb_uyue where  uyid=$arrayuv[id]",$conn));
?>		
      <div class="pR_content_w">
        <?php if ($cnum_zb==0) {?>
      
          <div class="noneContent">
          <div class="msg yaheiT"><i></i>您还没有业主预约的装修信息哦~</div>
          
        </div>
        
        <?php }else{?>
         	<div style="padding:24px 0 24px 0;">
                		                	
              
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
			 
				 
				<tr bgcolor="#eeeeee" align="center" >
					<td width="6%" height="30" class="bai">序号</td>
                    <td width="26%" class="bai">预约人</td>
				    <td width="14%" class="bai">电话</td>
                    <td width="15%" class="bai">所在小区</td>
					<td width="12%" class="bai">装修方式</td>
				    <td width="12%" class="bai">预算</td>
                    
					<td width="15%" class="bai">操 作</td>
				</tr>
				
				<?php
				$xxrs=mysql_query("select * from tb_uyue where uyid=$arrayuv[id] order by  id desc ",$conn);
				$J=1;
				while($array=mysql_fetch_array($xxrs)):
			 	?>
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><div class="wens"><?php echo $J?> </div></td>
				    <td class="td td3 ">
                   <span style="color:#ff0000;"><?php echo $array["bname"]?></span> 
                   
                
                <?php if ($array["sh"]==1){?>
                <font color="#006600">已处理</font>
                <?php }else{ ?> 
                <font color="#333333">未处理</font>
                <?php } ?>    
                    </td>
				    <td class="td">
 <?php echo substr($array['tel'],0,3)?>****<?php echo substr($array['tel'],7,4)?>
                    </td> 
                    <td class="td"> <?php echo $array['qname']?> <?php echo $array['mjs']?>㎡
					</td>
                    <td class="td"><font color="#B83066"><?php echo $array['fangs']?></font></td>
					 <td class="td huis"><?php echo $array['ysuan']?></td>
                      
				    <td class="td"><input type="button" name="Submit3" value="查看" onclick="window.location.href='gz_yue_xx.php?id=<?php echo $array["id"]?>' "  class="btn"/> </td>
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
$del=trim($_GET["del"]);
$delid=intval(trim($_GET["delid"]));
if($del=='ok' and $delid>0){

$rs=mysql_query("delete from xingxis where uid='$arrayuv[id]' and id='$delid'",$conn);
echo "<script>window.location.href='gz_gd.php';</script>" ; 

}



mysql_free_result($rsuv);
 mysql_close($conn);
?>
