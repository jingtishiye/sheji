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
                <div class="pR_tit">对我的评价信息</div>
               
            </div>
           
 
<?php 
$id=intval(trim($_GET["id"]));

if($id>0){
 
	$rs=mysql_query("select * from tb_upl where uyid=$arrayuv[id] and id='$id'",$conn);
	$array=mysql_fetch_array($rs);
	$numum=mysql_num_rows($rs);
	
	if ($numum==0){
	echo "<script>alert('信息错误不存在！');history.go(-1);</script>";
	exit; 
}
	
	?>
 
<table cellpadding="0" width="100%" cellspacing="0" align="center">
 
<tr>
<td   width="14%"   class="title32"  >
评论人姓名：</td>
<td width="86%" align="left"  class="title3">
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
<div class="jhs font16"><b><?php echo $bname?></b></div>
 
</td>
</tr>
 <tr>
<td height="10"  colspan="2">
</td>
</tr>

<tr>
<td   class="title32"  >
评论工长：</td>
<td  class="title3 font16" align="left">
    <?php
    if ($array["uyid"]>0){
	 $rs5=mysql_query("select relname,id from tb_user where  id=$array[uyid]",$conn);
	 $array5=mysql_fetch_array($rs5);
	?>				
	 <a href="/comment/show.php?uid=<?php echo $array5["id"]?>" target="_blank"><span  style="color:#006600;"><?php echo $array5["relname"]?></span>【详细】</a>
    <?php
     mysql_free_result($rs5);
	}
	?> 
</td>
</tr>

 <tr>
                <td  height="10" colspan="2" ></td>
              </tr>
               <tr>
              <td   class="title32"  >手机：</td>
                <td  class="title3 " align="left">
                
           <?php echo $array["utel"]?>
                
                </td>
              </tr>
 
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>
              <tr>
               <td   class="title32"  >评论人头像：</td>
                <td  class="title3 ">
<div style="padding:10px 0;"  align="left">
<img src="<?php echo $array["uimg"]?>" style="border:1px solid #cccccc;"  width="60" />
                    </div> 
 </td>
              </tr>
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>
          <tr>
               <td   class="title32"  >评论内容：</td>
                <td  class="title3 " align="left"><?php echo $array["content"]?> 
 </td>
              </tr>
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>
 
              
              
         
              <tr>
                <td   class="title32"  >评论时间：</td>
                  <td  class="title3 " align="left"><?php echo $array["data"]?> </td>
              </tr> 
              
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>        
<tr>
<td    class="title32"  ></td>
<td  class="title3 " align="left">
<input type="button" class="textsub" name="sub" value="返回列表" size="25"  onclick="window.location.href='gz_pl.php'"  />

</td>

</tr>
<tr>
<td  height="10" colspan="2" >
</td>
</tr>
</table>
 
<?php }?>
        
           
           
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
