$(function() {
  // 风格
  // 北欧宜家
  jQuery(".slideTxtBox").slide({
    autoPlay: false,
    effect: "fold",
    mainCell: ".type-img-1",
    trigger: "click",
    pnLoop: true,
    delayTime: "500",
    mouseOverStop: true,
    prevCell: ".prev",
    nextCell: ".next",
  });
  // 现代简约
  jQuery(".slideTxtBox").slide({
    autoPlay: false,
    effect: "fold",
    mainCell: ".type-img-2",
    trigger: "click",
    pnLoop: true,
    delayTime: "500",
    mouseOverStop: true,
    prevCell: ".prev",
    nextCell: ".next",
  });
  // 欧美混搭
  jQuery(".slideTxtBox").slide({
    autoPlay: false,
    effect: "fold",
    mainCell: ".type-img-3",
    trigger: "click",
    pnLoop: true,
    delayTime: "500",
    mouseOverStop: true,
    prevCell: ".prev",
    nextCell: ".next",
  });
  // 美式风情
  jQuery(".slideTxtBox").slide({
    autoPlay: false,
    effect: "fold",
    mainCell: ".type-img-4",
    trigger: "click",
    pnLoop: true,
    delayTime: "500",
    mouseOverStop: true,
    prevCell: ".prev",
    nextCell: ".next",
  });

  $(".style-list li").click(function() {
    $(".style-img-box").show();
  })
  $(".close,.shade").click(function() {
    $(".style-img-box").hide();
  })
  var tab = $('.style-list li');
  tab.click(function() {
    var index = tab.index(this);
    $('div.slide-left > div').eq(index).show().siblings().hide();
    $('div.slide-right > div').eq(index).show().siblings().hide();
  });
  //将面积放到remark里面
  $('.apply-area').change(function(){
    var size = $('.apply-area').val();
    $("#remark").val("pc主材包" + size);
  })
  
})
