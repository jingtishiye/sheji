<?php
include("gz_top.php");

?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_gz.php">工长个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_gz.php">工长信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>对我的评价</span> </div>
<?php
$qhs=5;
include("gz_left.php");
?>
  <div class="pageRightWrapper">
    
 
 
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">对我的评价</div>
               
            </div>
           
<?php
$cnum_zb = mysql_num_rows(mysql_query("select id from tb_upl where  uyid=$arrayuv[id]",$conn));
?>		
      <div class="pR_content_w">
        <?php if ($cnum_zb==0) {?>
      
        <div class="noneContent">
          <div class="msg yaheiT"><i></i>您还没有评价信息哦~</div>
         
          
        </div>
        
        <?php }else{?>
         	<div style="padding:24px 0 24px 0;">
                		                	
              
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
			 
				 
				<tr bgcolor="#eeeeee" align="center" >
					<td width="7%" height="30" class="bai">序号</td>
                    <td width="10%" class="bai">评论人</td>
				    <td width="22%" class="bai">评论工长</td>
                    <td width="20%" class="bai">联系电话</td>
					<td width="10%" class="bai">头像</td>
				    <td width="16%" class="bai">评论时间</td>
                    
					<td width="15%" class="bai">操 作</td>
				</tr>
				
				<?php
				$xxrs=mysql_query("select * from tb_upl where uyid=$arrayuv[id] order by  id desc ",$conn);
				$J=1;
				while($array=mysql_fetch_array($xxrs)):
			 	?>
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><div class="wens"><?php echo $J?> </div></td>
				    <td class="td">
                    
 <?php
  
		   if ($array["uid"]>0){
		   $rs5=mysql_query("select relname  from tb_user where  id=$array[uid]",$conn);
	       $array5=mysql_fetch_array($rs5);
	          $bname=$array5["relname"];
           mysql_free_result($rs5);
		   }else{
			   $bname="游客";
		   }
		   ?>           
                    
       <a href="gz_pl_xx.php?id=<?php echo $array["id"]?>"  style="color:#ff0000;"><?php echo $bname?></a> 
                    </td>
				    <td class="td">
       <?php
  
		   if ($array["uyid"]>0){
		   $rs5=mysql_query("select relname,id from tb_user where  id=$array[uyid]",$conn);
	$array5=mysql_fetch_array($rs5);
	?>				
	<a href="/gong/show.php?id=<?php echo $array5["id"]?>" target="_blank"><span  style="color:#006600;">【<?php echo $array5["relname"]?>】</span></a>
                    
           <?php
           mysql_free_result($rs5);
		   }
		   ?> 
                    
                    </td> 
                    <td class="td"><?php echo $array["utel"]?></td>
                    <td class="td">
					
                    <div style="padding:10px;" >
<img src="<?php echo $array["uimg"]?>" style="border:1px solid #cccccc;"  width="50" />
                    </div>
                    </td>
					 <td class="td huis"><?php echo date("Y-m-d G:i",strtotime($array['data']))?></td>
                      
				    <td class="td"><input type="button" name="Submit3" value="查看" onclick="window.location.href='gz_pl_xx.php?id=<?php echo $array["id"]?>' "  class="btn"/></td>
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
