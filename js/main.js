$(window).scroll(function() {
    var height = $(window).scrollTop();
    /*Если сделали скролл на 100px задаём новый класс для header*/
    if(height > 800){
    $('header').addClass('stickyw');
    $('nav').removeClass('navbar-dark');
    $('nav').addClass('navbar-light');
    $('.brand_elem').replaceWith('<img class="brand_elem" src="/img/logo2.svg" alt="logo">' + $('.brand_elem').html());

    $('.icons').replaceWith('<img class="icons" src="/img/black1.svg" alt="heart">' + $('.icons').html());
    $('.icons1').replaceWith('<img class="icons1" src="/img/black3.svg" alt="heart">' + $('.icons1').html());
    $('.icons2').replaceWith('<img class="icons2" src="/img/black2.svg" alt="heart">' + $('.icons2').html());
    } else{
         /*Если меньше 100px удаляем класс для header*/
    $('.brand_elem').replaceWith('<img class="brand_elem" src="/img/logo1.svg" alt="logo">' + $('.brand_elem').html());

    $('.icons').replaceWith('<img class="icons" src="/img/solar_heart-broken.svg" alt="heart">' + $('.icons').html());
    $('.icons1').replaceWith('<img class="icons1" src="/img/solar_bag-broken.svg" alt="bag">' + $('.icons1').html());
    $('.icons2').replaceWith('<img class="icons2" src="/img/solar_user-broken.svg" alt="user">' + $('.icons2').html());

    $('header').removeClass('stickyw');
    $('nav').removeClass('navbar-light');
    $('nav').addClass('navbar-dark');
    }
});

