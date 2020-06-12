 
<div class="bottom-nav pd30" align="center"> 
<div class="fmenu">
<a href="/" target="_blank" >首页</a>   |  
<a href="/about" target="_blank" >关于我们</a>  |  
<a href="/gong" target="_blank" >找工长</a>  |
<a href="/design" target="_blank" >找设计师</a>   |
<a href="/gongdi" target="_blank" >在建工地</a>   |  
<a href="/case" target="_blank" >设计案例</a>   |  
<a href="/comment" target="_blank" >业主点评</a>   |
<a href="/hd" target="_blank" >最新活动</a> |
<a href="/service" target="_blank" >服务保障</a>

</div>
<div class="copyright"  align="center">

七工长互联网装修-互联网O2O装修推荐保障服务平台<br>
Copyright © 2016-2020 <?php echo $urls;?> <?php echo $mingc;?> 保留所有权 联系热线：<?php echo $tels;?> <br>
  技术支持：新浪工长装修有限公司 &nbsp;  <?php echo $beian;?> 


 
</div>
</div>




<div class="toolbar-close">
        <img src="/images/toolbar-show.png" />
    </div>
    <div class="toolbar">
        <div class="t-background">
            <div class="t-content">
              <div class="t-niu">
                    <img src="/images/niu.png" alt="七工长装修平台" />
                </div>

                <div class="t-wenzi">
                    <img src="/images/wenzi.png" alt="<?php echo $dnames?>" />
                </div>
                <div class="t-yuyue" style="width:300px">
                    <ul>
                        <li>已有<span style="color: #F8B62D"><?php echo mysql_num_rows(mysql_query("select id from  tb_uyue",$conn));?></span>人预约七工长服务
                        </li>
                        <li>
						<input type="text" id="OName1" placeholder="您的姓名" maxlength="11" class="OName" style="width:90px;margin-right:4px" />
                            <input type="text" placeholder="您的手机" id="OMobile1" maxlength="11" class="OMobile" style="width:135px;" onKeyUp="value=value.replace(/[^\d]/g,'')" value=""  />                            
                        </li>
                        <li>
                        
                        <select name="Community1" class="checktype" id="Community1" style="width:113px;float:left;font-family:'微软雅黑'; height:34px;margin-top:8px;margin-right:9px">
                                <option value="" selected="selected">装修档次</option>
                                <option value="普通装修">普通装修</option>
                                <option value="中档装修">中档装修</option>
                                <option value="高档装修">高档装修</option>
                            </select>   
                         
                          <select name="DType" class="checktype" id="DType" style="width:158px;float:left;font-family:'微软雅黑'; height:34px;">
                                <option value="" selected="selected">装修方式</option>
                                <option value="清包人工">清包人工</option>
                                <option value="半包辅料">半包辅料</option>
                                <option value="全屋整装">全屋整装</option>
                            </select>      
                             
                        </li>
                        <li>

                            
                        </li>
                    </ul>
                </div>
                <div class="t-close">
                    <img src="/images/t-close.png" /></div>
                <div class="t-wx" style="margin-left:0px;margin-top:0px; width:150px">
                    <input type="button" id="BtnOk" value="预约工长设计师" class="btn" onclick="addOrders()"  />               
                </div>
                <input id="toolstatus" value="1" type="hidden" />
            </div>
        </div>
    </div>
        <script type="text/javascript" src="/Js/jquery.SuperSlide.2.1.1.js"></script>

 <script type="text/javascript">
    
 
        $(document).scroll(function () {
            var scrollValue = $(window).scrollTop();
            if ($("#toolstatus").val() == "1") {
                if (scrollValue > 100) {
                    $(".toolbar-close").slideLeftHide(1000, $(".toolbar").slideLeftShow(1000, null));
                }
                else {
                    $(".toolbar").slideLeftHide(1000, $(".toolbar-close").slideLeftShow(1000, null));
                }
            }

        });

 
        $(".t-close img").click(function () {
            $("#toolstatus").val("0");
            $(".toolbar").slideLeftHide(1000, $(".toolbar-close").slideLeftShow(1000, null));
        });
        $(".toolbar-close img").click(function () {
            $("#toolstatus").val("1");
            $(".toolbar-close").slideLeftHide(1000, $(".toolbar").slideLeftShow(1000, null));
        });
   
   
function addOrders() {
            var oname1 = $("#OName1").val();
            var omobile1 = $("#OMobile1").val();
            var community1 = $("#Community1").val();
			var dtype = $("#DType").val();

            var reg = /^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
            if (oname1.length == 0) {
                
                $("#OName1").focus();
				$.alertable.alert('请填写您的姓名！');
				 

            }
            else if (omobile1.length == 0) {
                 
                $("#OMobile1").focus();
				$.alertable.alert('请填写您的电话！');
				 
            }
			else if (!reg.test(omobile1)) {
            $("#OMobile1").focus();
			$.alertable.alert('电话号码格式不正确！');
            }
            else if (community1.length == 0) {
                $("#Community1").focus();
				$.alertable.alert('请选择装修级别！');
            }else {
                $.ajax({
                    async: false,
                    url: "member/chuli.php",
                    type: "post",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data: { "type": "addorder", "OName": oname1, "OMobile": omobile1, "Dtype": dtype, "Community": community1},
                    success: function () { 
					 
					$.alertable.alert('恭喜您，您的预约提交成功！！');
					$("#OName1").val(""); $("#OMobile1").val(""); $("#Community1").val(""); 
					}
					 
                });
            }

        }
 
   
    </script>
