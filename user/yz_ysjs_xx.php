<?php
include("yz_top.php");
$qhs=5;
?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_yz.php">业主个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_yz.php">业主信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>预约设计师</span> </div>
<?php
include("yz_left.php");
?>
  <div class="pageRightWrapper">
    
 
 
<div class="clear"></div>
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">我的预约设计师信息</div>
               <div class="pR_tit_r"><a href="/design" target="_blank" class="st2">进入设计师页面</a></div>

            </div>
           
 
<?php 
$id=intval(trim($_GET["id"]));

if($id>0){
 
	$rs=mysql_query("select * from tb_uysj where uid=$arrayuv[id] and id='$id'",$conn);
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
预约人姓名：</td>
<td width="86%" align="left"  class="title3"><span class="jhs"><b><?php echo $array["bname"]?></b></span>
 
</td>
</tr>
 <tr>
<td height="10"  colspan="2">
</td>
</tr>

<tr>
<td   class="title32"  >
预约设计师：</td>
<td  class="title3 " align="left">
 <?php
  
		   if ($array["uyid"]>0){
		   $rs5=mysql_query("select relname,id from tb_user where  id=$array[uyid]",$conn);
	$array5=mysql_fetch_array($rs5);
	?>				
	<a href="/design/show.php?uid=<?php echo $array5["id"]?>" target="_blank"><span  style="color:#006600; font-size:16px;">【<?php echo $array5["relname"]?>】</span></a>
                    
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
                
           <?php echo $array["tel"]?>
                
                </td>
              </tr>
 
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>
              <tr>
               <td   class="title32"  >所在楼盘：</td>
                <td  class="title3 " align="left"><?php echo $array["qname"]?>
 </td>
              </tr>
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>
          <tr>
               <td   class="title32"  >房屋面积：</td>
                <td  class="title3 " align="left"><?php echo $array["mjs"]?> ㎡
 </td>
              </tr>
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>
         <tr>
              <td   class="title32"  >装修方式：</td>
                <td  class="title3 " align="left"><?php echo $array["fangs"]?>
 </td>
              </tr>
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>  
              <tr>
               <td   class="title32"  >装修预算：</td>
                <td  class="title3 " align="left"><?php echo $array["ysuan"]?> 元
 </td>
              </tr>
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>  
              <tr>
                <td   class="title32"  >装修时间：</td>
                <td  class="title3 " align="left"><?php echo $array["ztime"]?>
 </td>
              </tr>
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>  
  <tr>
                <td   class="title32"  >预约时间：</td>
                  <td  class="title3 " align="left">
                   <?php echo $array["data"]?> 
                  
                   </td>
              </tr>
              
              
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>
              
              
         
              <tr>
                <td   class="title32"  >处理状态：</td>
                  <td  class="title3 " align="left"><?php if ($array["sh"]==1){?><font color="#006600"><b>已处理</b></font><?php }else{?><font color="#ff0000"><b>待处理</b></font><?php } ?></td>
              </tr> 
              
              <tr>
                <td  height="10" colspan="2" ></td>
              </tr>        
<tr>
<td    class="title32"  ></td>
<td  class="title3 " align="left">
<input type="button" class="textsub" name="sub" value="返回列表" size="25"  onclick="window.location.href='yz_ysjs.php'"  />

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
