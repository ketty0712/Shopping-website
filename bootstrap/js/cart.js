$(document).ready(function($) {
    $(window).resize(function() {
        var height = $("nav").height() * 0.9;
        $("body").css({
            "padding-top": height
        });
    });
    $(".card.h-100").each(function() {
        $(".card.h-100").css({
            "width": "initial"
        });
    });
    // $(".card.h-100").mouseover(function() {
    //     var w = $(this).find('img').width() * 1.1;
    //     $(this).find('img').width(w);
    // });
    // $(".card.h-100").mouseout(function() {
    //     var w = $(this).find('img').width() * (1 / 1.1);
    //     $(this).find('img').width(w);
    // });
    $(".add_to_cart").click(function() {
        swal("Success!", "已成功將商品加入購物車!", "success");
    });
    $(".add_in_myfavorite").click(function() {
        swal({
            title: "Sweet!",
            text: "以將商品加入收藏",
            imageUrl: '../assets/thumbs-up.jpg'
        });
    });
});