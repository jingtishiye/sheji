<?php
include("gz_top.php");
?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_gz.php">工长个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_gz.php">工长信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>我的工地</span> </div>
<?php
$qhs=3;
include("gz_left.php");
?>
  <div class="pageRightWrapper">
    
 
 
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">我的工地信息</div>
               <div class="pR_tit_r"><a href="gz_add.php"  class="st2">添加工地</a></div>

            </div>
           
<?php
$cnum_zb = mysql_num_rows(mysql_query("select id from xingxis where  uid=$arrayuv[id]",$conn));
?>		
      <div class="pR_content_w">
        <?php if ($cnum_zb==0) {?>
      
          <div class="noneContent">
          <div class="msg yaheiT"><i></i>您还没有上传在建工地哦~</div>
          
        </div>
        
        <?php }else{?>
         	<div style="padding:24px 0 24px 0;">
                		                	
              
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
			 
				 
				<tr bgcolor="#eeeeee" align="center" >
					<td width="6%" height="30" class="bai">序号</td>
                    <td width="29%" class="bai">工地名称</td>
				    <td width="10%" class="bai">地区</td>
                    <td width="11%" class="bai">施工阶段</td>
					<td width="12%" class="bai">开工日期</td>
				    <td width="12%" class="bai">合同价</td>
                    
					<td width="20%" class="bai">操 作</td>
				</tr>
				
				<?php
				$xxrs=mysql_query("select * from xingxis where uid=$arrayuv[id] order by  id desc ",$conn);
				$J=1;
				while($array=mysql_fetch_array($xxrs)):
			 	?>
				<tr align="center" onmouseover="style.backgroundColor='#EEEEEE'" onmouseout="style.backgroundColor='#FFFFFF'" bgcolor="#FFFFFF">
					<td class="td"><div class="wens"><?php echo $J?> </div></td>
				    <td class="td td3 ">
                   <a href="gz_gd_mod.php?id=<?php echo $array["id"]?>"  style="color:#ff0000;"><?php echo $array["title"]?></a> <a href="/gongdi/show.php?id=<?php echo $array["id"]?>" target="_blank"><span  style="color:#006600;">【详细】</span></a> 
                   
               <?php if ($array['img']<>"") {?>
                <a href="<?php echo $array['img']?>" target="_blank" title="图片"><img src="images/h001.gif" /></a>
                <?php } ?>
                <?php if ($array["tjs"]==1){?>
                <font color="#FF0000"><b>推荐</b></font>
                <?php } ?>    
                    </td>
				    <td class="td">
 <?php
	$rs2=mysql_query("select bid,btitle from tb_uqu where bid=$array[qid]  ",$conn);
	$array2=mysql_fetch_array($rs2);
         echo $array2['btitle'];
	mysql_free_result($rs2);

	?>
                    
                    </td> 
                    <td class="td"> <?php
                       $bids=$array['bid'];
						switch($bids){
							case 1: echo "<font color='#FF0000'>开工大吉</font>";break;
							case 2: echo "<font color='#0000FF'>水电改造</font>";break;
							case 3: echo "<font color='#ff0066'>泥瓦阶段</font>";break;
							case 4: echo "<font color='#006600'>木工阶段</font>";break;
							case 5: echo "<font color='#990066'>油漆阶段</font>";break;
							case 6: echo "<font color='#333300'>安装阶段</font>";break;
							case 7: echo "<font color='#330066'>验收完成</font>";break;
						} ?></td>
                    <td class="td"><font color="#B83066"><?php echo $array["ktime"]?></font></td>
					 <td class="td huis"><?php echo $array['hprice']?>元</td>
                      
				    <td class="td"><input type="button" name="Submit3" value="修改" onclick="window.location.href='gz_gd_mod.php?id=<?php echo $array["id"]?>' "  class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
				    <input type="button" name="Submit" value="删除" onclick="javascript:if(confirm('确定删除？删除后不可恢复!')){window.location.href='gz_gd.php?delid=<?php echo $array["id"]?>&del=ok';}else{history.go(0);}"  class="btn"/></td>
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
