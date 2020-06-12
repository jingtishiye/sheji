
        
 
    <div class="top-sct site-info footerDesc tb-half-pixel"> <?php echo $description?> </div>
    <!-- 站点介绍结束 -->
    <!-- 咨询热线开始 -->
    <div class="top-sct top-sct-zxrx bottom-half-pixel"> <a href="tel:<?php echo $tels?>"><span class="span-info">装修咨询热线：</span><i class="icon-tel-green"></i><span class="span-tel"><?php echo $tels?></span></a> </div>
    <!-- 咨询热线结束 -->
 
</div>
 
<style>
    /*20150724*/
    .whan-ad {
		clear:both;
        background: rgba(0, 0, 0, 0.7);
        height: 53px;
        position: fixed;
        bottom: 0;
        width: 100%;
        padding-left:15px;
        z-index:10;}
    .whan-ad div {
        position: relative; }
    .whan-ad div img {
        position: absolute;
        margin-left: -60px;
        margin-top: -49px;
        width: 55px; }
    .whan-ad div h1 {
        font-size: 16px;
        font-weight: bolder;
        color: #ffe400;
        font-family: "Arial" , "Microsoft YaHei";
        margin-top: 12px;
        margin-bottom: 2px; }
    .whan-ad div h2 {
        font-size: 12px;
        color: #fff; }
    .whan-ad div h3 {
        background: #ffe400;
        width: 36%;
        height: 32px;
        font-size: 14px;
        border-radius: 4px;
        position: absolute;
        right: 16px;
        top: -1px;
        color: #fff;
        text-align: center;
        line-height: 32px; }
    .whan-ad div h3 a{
        color:#000;}
    </style>
<section class="whan-ad">
  <div>  
    <h1>免费在线报价</h1>
    <h2>10秒极速获取装修预算</h2>
    <h3><a href="zb.php" class="zxzs-set" dataptag="2_1_7_1">我要装修</a></h3>
  </div>
</section>
<script>
    $('.whan-ad').on('click', function () {
        var href = $(this).find('a').attr('href');
        window.location.href = href;
    });
    $('.zxzs-set').on('click', function () {
        var ptag = $(this).attr('dataptag');
        (typeof clickStream !== 'undefined') && clickStream.getCvParams(ptag);    //埋点
    });
</script>
 
<div class="fix-nav" id="fix-nav" style="display: none;">
  <div class="fix-nav-wrap"> <img class="i-totop" src="images/to_top.png">
    <p>置顶</p>
  </div>
</div>
<script type="text/javascript">
        jQuery(function($){
            $(window).bind("scroll",function() { 
                initScroll() 
            });

            var $fixnav = $('#fix-nav');
            function initScroll()
            {
                if ($(window).scrollTop() > $(window).height()/4) {
                    $fixnav.show();
                } else {
                    $fixnav.hide();
                }
            }

            $('.fix-nav-wrap').bind('click', function(e){
                $(window).scrollTop(0);
            });
        });
        

    </script>
<div class="pg-ft">
  <ul class="terminal-nav">
    <li><a class="active" href="javascript:void(0)">触屏版</a></li>
    
    <li><span class="i-sep"></span><a href="about.php">关于我们</a><span class="i-sep"></span></li>
    <li><a href="about_help.php">常见问题</a></li>
  </ul>
  <div class="company-info">手机七工长：<a href="./">m.七工长.com</a></div>
 
</div>

<script>
            (function () {
                /**
                 * 输入状态下隐藏导航栏
                 */
                function initInputSelectFocus() {
                    var dom_arr = document.querySelectorAll('input[type="text"]');
                    var sel_arr = document.querySelectorAll('select');
                    var txt_arr = document.querySelectorAll('textarea');
                    var dom_len = dom_arr.length;
                    var sel_len = sel_arr.length;
                    var txt_len = txt_arr.length;
                    if (sel_len > 0) {
                        for (var i = 0; i < sel_len; i++) {
                            var _i = dom_len + i;
                            dom_arr[_i] = sel_arr[i];
                        }
                        dom_len += sel_len;
                    }
                    if (txt_len > 0) {
                        for (var i = 0; i < txt_len; i++) {
                            var _i = dom_len + i;
                            dom_arr[_i] = txt_arr[i];
                        }
                        dom_len += txt_len;
                    }
                    if (dom_len > 0) {
                        var fix_dom = document.querySelector('.footer-fix');
                        var screen_dom = document.querySelector('.screen');
                        for (var i = 0; i < dom_len; i++) {
                            if (!dom_arr[i]) {
                                continue;
                            }
                            dom_arr[i].addEventListener('focus', function () {
                                fix_dom && fix_dom.style && (fix_dom.style.display = 'none');
                                if (screen_dom) {
                                    screen_dom.style.display = 'none';
                                }
                            }, false);
                            dom_arr[i].addEventListener('blur', function () {
                                fix_dom && fix_dom.style && (fix_dom.style.display = 'block');
                            }, false);
                        }
                    }
                }
                initInputSelectFocus();
            })();

        </script>
<script>
            var browser = {
                versions: function () {
                    var u = navigator.userAgent, app = navigator.appVersion;
                    return {//移动终端浏览器版本信息
                        trident: u.indexOf('Trident') > -1, //IE内核
                        presto: u.indexOf('Presto') > -1, //opera内核
                        webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                        gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                        mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                        ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                        android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器
                        iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器
                        iPad: u.indexOf('iPad') > -1, //是否iPad
                        webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
                    };
                }()
            };
            if (browser.versions.iPad) {
                $('head').find('meta[name=viewport]').attr('content', 'initial-scale=1.0,user-scalable=no,maximum-scale=1');
            }
        </script>
<script type="text/javascript" src="images/index.min.js"></script>
 
<script type="text/javascript" src="images/common.min.js"></script>
 