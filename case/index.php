<?php
include("../php/conn.php");
include("../sub.php"); 
error_reporting(0);
$qhs=6;


$bid=intval(trim($_GET['bid']));
$mjid=intval(trim($_GET['mjid']));
$keys=trim($_GET['keys']);
$hxid=trim($_GET['hxid']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>设计师成功案例_<?php echo $dnames?></title>
<meta name="keywords" content="<?php echo $keywords?>" />
<meta name="description" content="<?php echo $description?>" />
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link href="../css/nyqh.css" type="text/css" rel="stylesheet" />
<link href="images/case_list.css" type="text/css" rel="stylesheet" />
<link href="images/listNav.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include("../nei_top.php");
?>

<div class="clear"></div>
 
 
<div class="col" style="background: #f7f7f7;padding-top: 20px">
 
<table width="1200"   align="center"  cellpadding="0" cellspacing="0" border="0">
<tr>
 
<td width="507"  align="left">
<div class="font14">您现在所在的位置：<a href="/">首页</a> > <a href="./">设计师案例</a> </div>
 </td>
<td width="693"  align="left">
<script language="javascript">
function checkform(){
 
if(document.thisForm.keys.value==''){
      alert('请填写案例名称!!');
      document.thisForm.keys.focus();
      return false;
      } 
 
	 return true;
}
</script>
<form action="index.php" name="thisForm" method="get"  onSubmit="return checkform();">
<div class="fr"><input type="submit" name="sub1" class="sou01" value="搜索" /></div>
<div class="fr"><input type="text" name="keys" class="sou02" value="" placeholder="输入案例名称搜索" /></div>
</form>
</td>
</tr>
</table>
<table width="100%"   align="center"  cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td height="20"  ></td>
  </tr>
</table>
<div class="clear"></div>
        <div class="left">
	        
       
            	
            <div class="whereBox" style="margin-top: 0px;">
                <div class="item menu_item">
				<div class="fl" id="nav-list-fg">
					<span>装修风格</span>
				</div>
				<div class="fl menu_dropDown">
					<div class="renovation_style" id="nav-list-fg-item">
<a title="全部" href="?mjid=<?php echo $mjid?>&hxid=<?php echo $hxid?>" <?php if ($bid==0){?>class="on"<?php }?>  >全部</a>

 <?php
 $rs6=mysql_query("select  bid,btitle  from tb_ustyle  order by px_id asc  ",$conn);
 while($array6=mysql_fetch_array($rs6)):
 ?>    
<a title="<?php echo $array6['btitle']?>" href="?bid=<?php echo $array6['bid']?>&mjid=<?php echo $mjid?>&hxid=<?php echo $hxid?>"   <?php if ($bid==$array6['bid']){?>class="on"<?php }?>><?php echo $array6['btitle']?></a> 
  <?php 
  endwhile;
  mysql_free_result($rs6); 
 ?>

							 
						

					</div>
				</div>
				 
				<div class="clear"></div>
			</div>
                
			<div class="item menu_item">
				<div class="fl" id="nav-list-fw">
					<span>面积范围</span>
				</div>
				<div class="fl menu_dropDown">
					<div class="renovation_style" id="nav-list-fw-item">
						<a title="全部" href="?bid=<?php echo $bid?>&hxid=<?php echo $hxid?>" <?php if ($mjid==0){?>class="on"<?php }?> code="areaRangeCode">全部</a>
						
							<a title="100㎡以下" href="?mjid=1&bid=<?php echo $bid?>&hxid=<?php echo $hxid?>"  <?php if ($mjid==1){?>class="on"<?php }?> >100㎡以下</a>
						
							<a title="100-140㎡" href="?mjid=2&bid=<?php echo $bid?>&hxid=<?php echo $hxid?>"  <?php if ($mjid==2){?>class="on"<?php }?> >100-140㎡</a>
						
							<a title="140-200㎡" href="?mjid=3&bid=<?php echo $bid?>&hxid=<?php echo $hxid?>"  <?php if ($mjid==3){?>class="on"<?php }?> >140-200㎡</a>
						
							<a title="200-300㎡" href="?mjid=4&bid=<?php echo $bid?>&hxid=<?php echo $hxid?>"  <?php if ($mjid==4){?>class="on"<?php }?> >200-300㎡</a>
						
							<a title="300㎡以上" href="?mjid=5&bid=<?php echo $bid?>&hxid=<?php echo $hxid?>"  <?php if ($mjid==5){?>class="on"<?php }?> >300㎡以上</a>
						
					</div>
				</div>
				 
				<div class="clear"></div>
			</div>
			<div class="item menu_item">
				<div class="fl" id="nav-list-hx">
					<span>户型</span>
				</div>
				<div class="fl menu_dropDown">
					<div class="renovation_style" id="nav-list-hx-item">
						<a title="全部" href="?bid=<?php echo $bid?>&mjid=<?php echo $mjid?>" <?php if ($hxid==""){?>class="on"<?php }?> >全部</a>
						
							<a title="普通住宅" href="?bid=<?php echo $bid?>&mjid=<?php echo $mjid?>&hxid=普通住宅" <?php if ($hxid=="普通住宅"){?>class="on"<?php }?> >普通住宅</a>
						
							<a title="跃层" href="?bid=<?php echo $bid?>&mjid=<?php echo $mjid?>&hxid=跃层" <?php if ($hxid=="跃层"){?>class="on"<?php }?> >跃层</a>
						
							<a title="公寓" href="?bid=<?php echo $bid?>&mjid=<?php echo $mjid?>&hxid=跃层" <?php if ($hxid=="公寓"){?>class="on"<?php }?>>公寓</a>
						
							<a title="别墅" href="?bid=<?php echo $bid?>&mjid=<?php echo $mjid?>&hxid=别墅" <?php if ($hxid=="别墅"){?>class="on"<?php }?>>别墅</a>
						
							<a title="其他" href="?bid=<?php echo $bid?>&mjid=<?php echo $mjid?>&hxid=别墅" <?php if ($hxid=="其他"){?>class="on"<?php }?>>其他</a>
						
					</div>
				</div>
				 
				<div class="clear"></div>
			</div>
			
            </div> 
            
            </form>
            
            <div class="content">
<?php
if ($bid>0){
	$tiao1="and bid=$bid ";
}
 
if($keys<>""){ 
	$tiao2="and title like '%$keys%'";
}

 $rrs5=mysql_query("select id   from tb_ushe where sh=1 $tiao1 $tiao2 ",$conn);
	 $num=mysql_num_rows($rrs5);
			 $pagesize=21;
			 $pagemax=ceil($num/$pagesize);
			 mysql_free_result($rrs5);
			 $page=intval(trim($_GET["page"]));
			 if($page<1) $page=1;
			 if($page>$pagemax) $page=$pagemax;
			 $p=($page-1)*$pagesize;
			$rsx=mysql_query("select id,title,img,mjs,uid,bid,jtitle from tb_ushe where sh=1 $tiao1  $tiao2 order by  id desc limit $p,$pagesize ",$conn);
 if($num>0){ 
 
 while($arrayx=mysql_fetch_array($rsx)):
 $tname=str_replace($keys,"<font color=#FF0000>$keys</font>",$arrayx["title"]);
 
 if ($arrayx['uid']>0) {
 $rs5=mysql_query("select relname,img,jibie  from tb_user where bid=1 and id=$arrayx[uid]",$conn);
 $array5=mysql_fetch_array($rs5);
  $uming=$array5['relname'];
  $uimgs=$array5['img'];
  $ujib=$array5['jibie'];
 mysql_free_result($rs5);
 }
  if ($ujib>0) {
 $rs5=mysql_query("select btitle  from slei where bid=$ujib ",$conn);
 $array5=mysql_fetch_array($rs5);
 $ujming=$array5["btitle"];
 mysql_free_result($rs5);
 }
?>    	
            	<div class="item ">
                        <div class="bgbox">
                       
                            <p class="img">
                                <a href="show.php?id=<?php echo $arrayx['id']?>" target="_blank" title="<?php echo $arrayx['title']?>" style="display:block"> <img  src="<?php echo $arrayx['img']?>" width="378" height="270" alt="<?php echo $arrayx['title']?>">  </a>
                            </p>
                            
                            <div class="desbox">
                             <?php
						if ($arrayx['uid']>0) {
							?>
<a href="/design/show.php?uid=<?php echo $arrayx['uid']?>" target="_blank" ><img src="<?php echo $uimgs?>" width="80" height="80" alt="<?php echo $ujming?><?php echo $uming?>"></a>
                          <?php }?>       
                                <p class="txt"><?php echo $tname?> <?php echo $arrayx['mjs']?>㎡</p>
                                <p class="desc"><?php echo $arrayx['jtitle']?></p>
                                <p>
                                    <span class="type-title">装修风格<?php if ($arrayx['bid']>0) {
 $rs5=mysql_query("select btitle  from tb_ustyle where bid=$arrayx[bid]  ",$conn);
 $array5=mysql_fetch_array($rs5);
 echo $array5["btitle"];
 mysql_free_result($rs5);
 }?></span>
 <a class="btnbox" href="show.php?id=<?php echo $arrayx['id']?>" target="_blank">查看详情</a>
      <a href="/design/yuesjs.php?id=<?php echo $arrayx['uid']?>" target="_blank" class="reservationDesign btnbox btnbox-gray">预约设计</a>
                                </p>
                            </div>          
                        </div>
                    </div>
       <?php 
	 endwhile;
	mysql_free_result($rsx); 
	 ?>          
 <div class="clear"></div>
 
        
<div class="page">

 <a href="?bid=<?php echo $bid?>&keys=<?php echo $keys?>&page=<?php echo ($page-1)?>"  ><span class="song"><b><</b></span></a>
<?php 
 if (($page-5)>1) {
$ys=$page-5;
$yb=$page+5;
}
else{
$ys=1;
$yb=6;
}
if ($yb>$pagemax){
$yb=$pagemax;
}
for($ys;$ys<=$yb;$ys++){ 
?>
 <a href="?bid=<?php echo $bid?>&keys=<?php echo $keys?>&page=<?php echo $ys?>" <?php if ($ys==$page) {?>class="now"<?php }?> ><?php echo $ys?></a>
 <?php } ?> 
 <a href="?bid=<?php echo $bid?>&keys=<?php echo $keys?>&page=<?php echo ($page+1)?>"  ><span class="song"><b>></b></span></a>
</div>
 <?php }?>    
 
<table width="100%" align="center"  cellpadding="0" cellspacing="0" border="0"  >
  <tr>
    <td    height="25"></td>
  </tr>
</table>
            </div>
        </div>
        
        
        
    </div>

 
 

<?php
include("../nei_foot.php");
?>
</body>
</html>
<?php
 mysql_close($conn);
?>