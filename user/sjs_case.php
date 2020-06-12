<?php
include("sjs_top.php");
?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_sjs.php">设计师个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_sjs.php">设计师信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>我的设计案例</span> </div>
<?php
$qhs=3;
include("sjs_left.php");
?>
  <div class="pageRightWrapper">
    
 
 
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">我的设计案例</div>
               <div class="pR_tit_r"><a href="sjs_add.php"  class="st2">添加案例</a></div>

            </div>
           
<?php
$cnum_zb = mysql_num_rows(mysql_query("select id from tb_ushe where  uid=$arrayuv[id]",$conn));
?>		
      <div class="pR_content_w">
        <?php if ($cnum_zb==0) {?>
      
          <div class="noneContent">
          <div class="msg yaheiT"><i></i>您还没有上传案例哦~</div>
          
        </div>
        
        <?php }else{?>
         	<div style="padding:24px 0 24px 0;">
                		                	
              
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
			 
				 
				<tr bgcolor="#eeeeee" align="center" >
					<td width="6%" height="30" class="bai">序号</td>
                    <td width="29%" class="bai">案例名称</td>
				    <td width="10%" class="bai">风格</td>
                    <td width="11%" class="bai">户型类型</td>
					<td width="12%" class="bai">面积</td>
				    <td width="12%" class="bai">案例造价</td>
                    
					<td width="20%" class="bai">操 作</td>
				</tr>
				
				<?php
				$xxrs=mysql_query("select * from tb_ushe where uid=$arrayuv[id] order by  id desc ",$conn);
				$J=1;
				while($array=mysql_fetch_array($xxrs)):
			 	?>
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><div class="wens"><?php echo $J?> </div></td>
				    <td class="td td3 ">
                   <a href="sjs_case_mod.php?id=<?php echo $array["id"]?>"  style="color:#ff0000;"><?php echo $array["title"]?></a> <a href="/case/show.php?id=<?php echo $array["id"]?>" target="_blank"><span  style="color:#006600;">【详细】</span></a> 
                   
               <?php if ($array['img']<>"") {?>
                <a href="<?php echo $array['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
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
                    <td class="td"> 
<?php echo $array["hxs"]?>
                    </td>
                    <td class="td"><font color="#B83066"><?php echo $array["mjs"]?>㎡</font></td>
					 <td class="td huis"><?php echo $array['hprice']?>元</td>
                      
				    <td class="td"><input type="button" name="Submit3" value="修改" onclick="window.location.href='sjs_case_mod.php?id=<?php echo $array["id"]?>' "  class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
				    <input type="button" name="Submit" value="删除" onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='sjs_case.php?delid=<?php echo $array["id"]?>&del=ok';}else{history.go(0);}"  class="btn"/></td>
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

$rs=mysql_query("delete from tb_ushe where uid='$arrayuv[id]' and id='$delid'",$conn);
echo "<script>window.location.href='sjs_case.php';</script>" ; 

}



mysql_free_result($rsuv);
 mysql_close($conn);
?>
