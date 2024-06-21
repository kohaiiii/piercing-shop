$("#btn_card1").click(function(){
    $("#btn_card").removeClass("active");
    $(this).addClass("active");
});

$("#btn_card").click(function(){
    $("#btn_card1").removeClass("active");
    $(this).addClass("active");
});

$("#btn_card3").click(function(){
    $("#btn_card4").removeClass("active");
    $("#btn_card2").removeClass("active");
    $(this).addClass("active");
});

$("#btn_card4").click(function(){
    $("#btn_card3").removeClass("active");
    $("#btn_card2").removeClass("active");
    $(this).addClass("active");
});

$("#btn_card2").click(function(){
    $("#btn_card3").removeClass("active");
    $("#btn_card4").removeClass("active");
    $(this).addClass("active");
});