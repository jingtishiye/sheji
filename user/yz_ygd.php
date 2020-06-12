<?php
include("yz_top.php");
$qhs=6;
?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_yz.php">业主个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_yz.php">业主信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>已申请参观工地</span> </div>
<?php
include("yz_left.php");
?>
  <div class="pageRightWrapper">
    
 
 
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">已申请参观工地</div>
               <div class="pR_tit_r"><a href="/gongdi" target="_blank" class="st2">进入工地页面</a></div>

            </div>
           
<?php
$cnum_zb = mysql_num_rows(mysql_query("select id from tb_uylf where  uid=$arrayuv[id]",$conn));
?>		
      <div class="pR_content_w">
        <?php if ($cnum_zb==0) {?>
      
        <div class="noneContent">
          <div class="msg yaheiT"><i></i>您还没有申请参观工地哦~</div>
         
          <div class="linkA_w"> <a class="linkA" href="/gongdi" target="_blank">进入工地页面申请参观</a> </div>
        </div>
        
        <?php }else{?>
         	<div style="padding:24px 0 24px 0;">
                		                	
              
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
			 
				 
				<tr bgcolor="#eeeeee" align="center" >
					<td width="7%" height="30" class="bai">序号</td>
                    <td width="10%" class="bai">申请人</td>
				    <td width="22%" class="bai">参观工地</td>
                    <td width="18%" class="bai">联系电话</td>
					<td width="10%" class="bai">状态</td>
				    <td width="13%" class="bai">提交时间</td>
                    
					<td width="20%" class="bai">操 作</td>
				</tr>
				
				<?php
				$xxrs=mysql_query("select * from tb_uylf where uid=$arrayuv[id] order by  id desc ",$conn);
				$J=1;
				while($array=mysql_fetch_array($xxrs)):
			 	?>
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><div class="wens"><?php echo $J?> </div></td>
				    <td class="td">
                   <a href="yz_ygd_xx.php?id=<?php echo $array["id"]?>"  style="color:#ff0000;"><?php echo $array["bname"]?></a> 
                    </td>
				    <td class="td">
       <?php
  
		   if ($array["bid"]>0){
		   $rs5=mysql_query("select title,id from xingxis where  id=$array[bid]",$conn);
	$array5=mysql_fetch_array($rs5);
	?>				
	<a href="/gongdi/show.php?id=<?php echo $array5["id"]?>" target="_blank"><span  style="color:#006600;">【<?php echo $array5["title"]?>】</span></a>
                    
           <?php
           mysql_free_result($rs5);
		   }
		   ?> 
                    
                    </td> 
                    <td class="td"><?php echo $array["tel"]?></td>
                    <td class="td"><?php if ($array["sh"]==1){?><font color="#B83066"><b>已处理</b></font><?php }else{?><font color="#666666">待处理</font><?php } ?></td>
					 <td class="td huis"><?php echo date("Y-m-d G:i",strtotime($array['data']))?></td>
                      
				    <td class="td"><input type="button" name="Submit3" value="查看" onclick="window.location.href='yz_ygd_xx.php?id=<?php echo $array["id"]?>' "  class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
				    <input type="button" name="Submit" value="删除" onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='yz_ygd.php?delid=<?php echo $array["id"]?>&del=ok';}else{history.go(0);}"  class="btn"/></td>
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

$rs=mysql_query("delete from tb_uylf where uid='$arrayuv[id]' and id='$delid'",$conn);
echo "<script>window.location.href='yz_ygd.php';</script>" ; 

}



mysql_free_result($rsuv);
 mysql_close($conn);
?>
