<?php
include("sjs_top.php");

?>
 
<div class="clear"></div>
<div class="userCenter_wrapper">
  <div class="userCenter_location"> <a href="index_sjs.php">设计师个人中心</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="index_sjs.php">设计师信息</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>设计师身份证件</span> </div>
<?php
$qhs=2;
include("sjs_left.php");
?>
  <div class="pageRightWrapper">
    
   <div class="pageRightWrap">
            <div class="pR_tit_w">
                <div class="pR_tit">设计师身份证件</div>
                <div class="pR_tit_r"></div>
            </div>
            <div class="pR_content_w">
                <div style="padding:24px 0;">
                  <form method="post" action="chuli.php" class="userCenterFrom J_ajaxForm"  name="form1" enctype="multipart/form-data"  onSubmit="return checkform();">
                   <input name="type"  type="hidden"   value="modspic" />
                   <input type="hidden"  value="<?php echo $arrayuv["id"]?>" name="uid" />
                    <div class="clear upImgLineW">
                        <div class="names">当前证件:</div>
                        <div class="upImgLine_rw">

             <div class="ownerHead_croped1 croped"><img src="<?php echo $arrayuv["sfzimg"]?>" alt="<?php echo $arrayuv["relname"]?>" onerror="this.onerror=null;this.src='images/zhengjian2.jpg';"  /></div>
                               <input type="hidden"  value="<?php echo $arrayuv["sfzimg"]?>" name="pic1" />
 
 <div class="picBox">
                        <div class="tit"><i class="pic_count" id="pic_count"></i></div>
                         
                        <div class="cl">
  
                            <p class="pic_box" id="pic_box"></p>
                            <div class="add_p" style=" margin-right:20px; display:block;" id="add_p">

                                <a href="javascript:;" class="on">
                                    <input style="width:119px; height:27px; opacity:0;position:relative;" type="file" id="uploadInput" multiple="true" name="image1">
                                    <i></i><b></b>
                                </a>
                            </div>
                        </div>
                    </div>
 
         
 
                           
                        </div>
                    </div>
  
                        
                           
                        
                        
                        <div class="sendBtnW clear">
                            <input type="submit" value="保存身份证照片" class="J_ajaxSubmitBtn sendBtn"/>
                        </div>
                    </form>
                </div>
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
<script>


    //图片上传

    var fileNameArr = [];
    var imgNum = 0;
    var filesNum = 0;
    var imageBox = document.getElementById('pic_box');
    var countBox = document.getElementById('pic_count');
    var oAddp = document.getElementById('add_p');
    var filesInput = document.getElementById('uploadInput');
    if (window.File && window.FileList && window.FileReader && window.Blob) {
        filesInput.addEventListener("change", fOnChange, false);
    } else {
        alert('您的浏览器不支持HTML5长传');
    }
    //定义存放图片对象的数组
    var uploadImgArr = [];
    //防止图片上传完成后，再点击上传按钮的时候重复上传图片
    var isUpload = false;
    function fOnChange(e) {
        isUpload = false;
        var e = window.event || e;
        //获取file input中的图片信息列表
        var files = e.target.files;
        filesNum += files.length;
        //验证是否是图片文件的正则
        reg = /image\/.*/i;
        //console.log(files);
        if (filesNum > 1) {
            //tishi('最多上传1张照片')
            oAddp.style.display = "none";

        } else {
            for (var i = 0, f; f = files[i]; i++) {
                //把这个if判断去掉后，也能上传别的文件
                if (!reg.test(f.type)) {
                    alert("你选择的" + f.name + "文件不是图片");
                    //跳出循环
                    continue;
                }
                //console.log(f);
                uploadImgArr.push(f);

                var reader = new FileReader();
                //类似于原生JS实现tab一样（闭包的方法），参见http://www.css119.com/archives/1418
                reader.onload = (function (file) {
                    //获取图片相关的信息
                    var fileSize = (file.size / 1024).toFixed(2) + "K",
                        fileName = file.name,
                        fileType = file.type;
                    //console.log(fileName)
                    return function (e) {
                        //console.log(e.target)
                        //获取图片的宽高
                        var img = new Image();
                        img.addEventListener("load", imgLoaded, false);
                        img.src = e.target.result;
                        function imgLoaded() {
                            imgWidth = img.width;
                            imgHeight = img.height;
                            if ((file.size / 1024).toFixed(2) > 1024 * 1) {
                                alert("上传图片大小不能超过1M");
                                return false;
                            }
                            //图片加载完成后才能获取imgWidth和imgHeight
                            fileNameArr.push(fileName);
                            imageBox.innerHTML += "<span><b class='img_close'></b><i></i><img src='" + e.target.result + "' alt='" + fileName + "' title='" + fileName + "'></span>";
                            countBox.innerHTML = '';
                            var aDel = $('#pic_box .img_close');
                            for (var i = 0; i < aDel.length; i++) {
                                aDel[i].index = i;
                                aDel[i].onclick = function () {
                                    var ImgName = this.parentNode.children[2].title;
                                    filesNum--
                                    this.parentNode.style.display = 'none';
                                    oAddp.style.display = "block";
                                    countBox.innerHTML = '(' + filesNum + '/1)';
                                    for (var i = 0; i < uploadImgArr.length; i++) {
                                        var name1 = uploadImgArr[i].name;
                                        if (ImgName == name1) {
                                            uploadImgArr.splice(i, 1);
                                        }
                                    }

                                    for (var i = 0; i < fileNameArr.length; i++) {
                                        if (ImgName == fileNameArr[i]) {
                                            fileNameArr.splice(i, 1);
                                        }
                                    }

                                };
                            }

                        }
                    }
                })(f);
                //读取文件内容
                reader.readAsDataURL(f);
            }
        }
    }


</script>
</html>
<?php
mysql_free_result($rsuv);
 mysql_close($conn);
?>
