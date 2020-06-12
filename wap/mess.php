 <?php
    $cnum_dbuy=mysql_num_rows(mysql_query("select id from tb_uyue ",$conn)); 
	?>
    
 <link rel="stylesheet" type="text/css" href="images/jquery.alertable.css">
 
    
    <div class="top-sct top-sct-mfsj bottom-half-pixel">
      <header class="sct-hd sct-hd-mfsj bottom-half-pixel">
        <h1>帮你找装修<span class="sct-hd-mfsj-info">已有<em><?php echo $cnum_dbuy?></em>人在找装修</span></h1>
      </header>
      <div class="sct-bd">
        <div class="lastest-zbs-wrap bottom-half-pixel">
          <ul class="lastest-zbs" style="-webkit-transform: translate(0, 0);">
 <?php
$rst=mysql_query("select bname,tel from tb_uyue   order by id desc limit 6",$conn);
while($arrayt=mysql_fetch_array($rst)):
?>
            <li class="text-over-hidden"> <a>【最新】<?php echo $arrayt["bname"]?>  <?php echo substr($arrayt['tel'],0,3)?>****<?php echo substr($arrayt['tel'],7,4)?>  申请了装修服务</a> </li>
<?php
endwhile;
mysql_free_result($rst); 
?>
          
          </ul>
          <i class="icon-notice"></i> </div>
        <form class="mfsj-from" action="member_chuli.php?action=add" method="post">
          <div class="row">
      <input class="mfsj-name" id="Name2" type="text" placeholder="您的称呼">
      </div>
      <div class="row">
      <input class="mfsj-tel" id="Mobile2" type="text" placeholder="手机号码" onKeyUp="value=value.replace(/[^\d]/g,'')"  maxlength="11" >
     </div>
 
          
          
          <input type="button" value="预约免费量房"  onclick="yuegz()" name="subt" class="row mfsj-submit">
          
          <div class="mfsj-info"><i class="icon-info"></i>
            <div>我们承诺：七工长提供该项<em>免费服务，绝不产生任何费用</em>，为了您的利益以及我们的口碑，您的隐私将被严格保密。</div>
          </div>
        </form>
         
    </div> 
    </div> 
     <script src="images/jquery.alertable.js"></script>
 <script type="text/javascript">
	$(function() {
	  $('.alert-demo').on('click', function() {
		$.alertable.alert('Howdy!');
	  });
	});
</script>  


<script type="text/javascript">
   
    function yuegz() {
        var mobile = $("#Mobile2").val();
        var name = $("#Name2").val();
 

        var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
        if (name.length == 0) {
            $("#Name2").focus();
            $.alertable.alert('请输入您的称呼！');
        }  else if (mobile.length == 0) {
            $("#Mobile2").focus();
			$.alertable.alert('请输入手机号码！');
        } else if (!reg.test(mobile)) {
            $("#Mobile2").focus();
			$.alertable.alert('手机号码格式不正确！');
        }
         
         else {
                $.ajax({
                    async: false,
                    url: "member_chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "yuegz", "OName": name, "OMobile": mobile},
					
					success: function () { 
					$.alertable.alert('恭喜您，预约成功！！');					        
                            $("#Name2").val("");
                            $("#Mobile2").val("");
                 
					}
                });
        }
    }
</script>