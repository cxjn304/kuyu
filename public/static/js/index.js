$(".menu li:first-child").click(function() {
    // $(this).addClass('current').siblings('li').removeClass('current');
    $(".menu li:first-child").addClass('current').siblings('li').removeClass('current');
    $('.left p').removeClass('current');

});
$(".left>p").click(function() {
    // $(".menu li").removeClass('current');
    $(this).addClass('current').siblings('p').removeClass('current');
});
$(".left p:nth-of-type(1)").click(function() {
    $(".right").html("<iframe src='/public/index.php/supre/other/proce' width='100%' height='1100px' scrolling='no' frameborder='0'>");
});
$(".left p:nth-of-type(2)").click(function() {
    $(".right").html("<iframe src='/public/index.php/supre/other/agree' width='100%' height='1100px' scrolling='no' frameborder='0'>");
});
$(".left p:nth-of-type(3)").click(function() {
    $(".right").html("<iframe src='/public/index.php/supre/other/rhelp' width='100%' height='1100px' scrolling='no' frameborder='0'>");
});
$(".left p:nth-of-type(4)").click(function() {
    $(".right").html("<iframe src='/public/index.php/supre/other/undmore' width='100%' height='1100px' scrolling='no' frameborder='0'>");
});
