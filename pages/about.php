<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/mdb.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="/js/jquery.js"></script>
    <title>BlackFly</title>
</head>
<body>
    <?php
        $root = $_SERVER['DOCUMENT_ROOT'];

        include "$root/php/modules/header.php";
    ?>
    <main class="catalog_block">
        <section class="container">
            <h2 class="pt-4 pb-3">О нас</h2>
            <div class="row tabs-about">
                <div class="col-12 col-lg-2">
                    <!-- Tab navs -->
                    <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a data-mdb-pill-init class="nav-link active tabs_btn_about shadow-sm" id="v-pills-home-tab" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Доставка</a>

                        <a data-mdb-pill-init class="nav-link tabs_btn_about shadow-sm" id="v-pills-profile-tab" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Оплата</a>

                        <a data-mdb-pill-init class="nav-link tabs_btn_about shadow-sm" id="v-pills-messages-tab" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" >Контакты</a>
                    </div>
                    <!-- Tab navs -->
                </div>

                <div class="col-12 col-lg-10">
                    <!-- Tab content -->
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- Tab content 1 -->
                        <div class="tab-pane fade show active white_content p-3 rounded-3 about-tabs shadow-sm" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="d-flex flex-column">
                                <h2>Доставка</h2>
                                <p>Мы отправляем заказы по России, Казахстану и Беларуси.</p>
                                <p>Отправка товара осуществляется <b>в течение 5 рабочих дней</b> ( в среднем 1-2 дня) после подтверждения об оплате.</p>
                                <p><b>Минимальная сумма заказа составляет 500 руб.</b></p>
                            </div>
                            <div class="d-flex flex-column mt-3">
                                <h2>Доставка по России</h2>
                                <p>Мы отобрали лучшие и недорогие способы доставки для того, чтобы вы могли получить свой заказ быстро и удобно. Бесплатная доставка от 4000р. При выборе бесплатной доставки мы имеем право выслать заказ любым удобным нам способом. Вы всегда можете обсудить с нашим менеджером любой другой способ доставки.</p>
                            <!-- Accordion start -->
                            <div class="accordion accordion-flush accordion_aboutus" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                    <button
                                        data-mdb-collapse-init
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-mdb-toggle="collapse"
                                        data-mdb-target="#flush-collapseOne"
                                        aria-expanded="false"
                                        aria-controls="flush-collapseOne"
                                    >
                                        <h5>Посылка 1 класса</h5>
                                    </button>
                                    </h2>
                                    <div
                                    id="flush-collapseOne"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne"
                                    data-mdb-parent="#accordionFlushExample"
                                    >
                                    <div class="accordion-body">
                                        <p>Стоимость: от 259 руб (точная стоимость доставки будет указана при оформлении заказа)</p>
                                        <p>Доставка: в ближайшее почтовое отделение</p>
                                        <p>Сроки доставки: от 5 до 14 дней (сроки доставки указаны на сайте почты)</p>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                    <button
                                        data-mdb-collapse-init
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-mdb-toggle="collapse"
                                        data-mdb-target="#flush-collapseTwo"
                                        aria-expanded="false"
                                        aria-controls="flush-collapseTwo"
                                    >
                                        <h5>Самовывоз из магазина в Москве</h5>
                                    </button>
                                    </h2>
                                    <div
                                    id="flush-collapseTwo"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo"
                                    data-mdb-parent="#accordionFlushExample"
                                    >
                                    <div class="accordion-body">
                                        <p>Стоимость: бесплатно</p>
                                        <p>Вы сможете забрать в течение 3 дней с 12:30 до 20:30 по адресу Староватутинский пр-д, д.6</p>
                                    </div>
                                    </div>
                                
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                    <button
                                        data-mdb-collapse-init
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-mdb-toggle="collapse"
                                        data-mdb-target="#flush-collapseThree"
                                        aria-expanded="false"
                                        aria-controls="flush-collapseThree"
                                    >
                                        <h5>СДЭК до дверей</h5>
                                    </button>
                                    </h2>
                                    <div
                                    id="flush-collapseThree"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree"
                                    data-mdb-parent="#accordionFlushExample"
                                    >
                                    <div class="accordion-body">
                                        <p>Стоимость: от 377 руб (точная стоимость доставки будет указана при оформлении заказа)</p>
                                        <p>Доставка: курьером на дом или в офис</p>
                                        <p>Сроки доставки: от 2 до 20 дней</p>
                                    </div>
                                    </div>
                                
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                    <button
                                        data-mdb-collapse-init
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-mdb-toggle="collapse"
                                        data-mdb-target="#flush-collapseFour"
                                        aria-expanded="false"
                                        aria-controls="flush-collapseFour"
                                    >
                                        <h5>СДЭК до пункта выдачи</h5>
                                    </button>
                                    </h2>
                                    <div
                                    id="flush-collapseFour"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingFour"
                                    data-mdb-parent="#accordionFlushExample"
                                    >
                                    <div class="accordion-body">
                                        <p>Стоимость: от 185 руб (точная стоимость доставки будет указана при оформлении заказа)</p>
                                        <p>Доставка: до удобного офиса СДЭК</p>
                                        <p>Сроки доставки: от 2 до 20 дней</p>
                                    </div>
                                    </div>
                                
                                </div>

                            </div>
                            <!-- Accordion end -->
                        </div>
                        <div class="d-flex flex-column mt-3">
                                <h2>Доставка по миру</h2>
                                <p>Доставка временно осуществляется только в Казахстан и Беларусь. Вы всегда можете обсудить с нашим менеджером любой другой способ доставки.</p>
                                <p>Стоимость: от 400 руб (точная стоимость доставки будет указана при оформлении заказа)</p>
                                <p>Доставка: курьером на дом или в офис</p>
                                <p>Сроки доставки: от 12 до 45 дней</p>
                            </div>
                        </div>
                    <!-- Tab end 1 -->
                    <!-- Tab content 2 -->
                    <div
                        class="tab-pane fade white_content p-3 rounded-3 about-tabs shadow-sm"
                        id="v-pills-profile"
                        role="tabpanel"
                        aria-labelledby="v-pills-profile-tab"
                    >
                        <div class="d-flex flex-column">
                            <h2>Оплата</h2>
                            <p>После оплаты ваш заказ будет отправлен в течение 5 рабочих дней на ваш адрес выбранным Вами способом доставки.</p>
                            </div>
                            <p>Минимальная сумма заказа составляет 500р.</p>
                            <p>После оформления заказа по предоплате и неуплаты в течении 5 дней заказ снимается.</p>
                            <p>На нашем сайте ни номера кошельков, ни пароли не сохраняются, все действия проводит Сбербанк или другие сервисы при безопасном интернет-соединении.</p>
                            <p>Все необходимые инструкции вы получите в ходе оплаты.</p>
                            <ul class="pay-method">
                                <b>Способы оплаты:</b> 
                                <li>
                                    <b>Оплата при получении:</b> Доступна только в Москве в нашем магазине по адресу Староватутинский пр-д, д.6.
                                </li>
                                <li>
                                    <b>Золотая Корона:</b> Сервис быстрах денежных переводов без открытия счета, который предоставляет услуги на территории России, в странах СНГ и др.
                                </li>
                                <li>
                                    <b>Kaspi bank:</b> Оплата переводом на KASPI bank.
                                </li>
                                <li>
                                    <b>VISA/Mastercard/Мир:</b> Оплата банковской картой VISA, MasterCard, МИР в режиме онлайн.
                                </li>
                                <li>
                                    <b>Оплата по реквизитам банка:</b> При выборе данного способа оплаты вы можете оплатить заказ через интеренет банкинг (реквизиты будут даны вам в распечатке квитанции) или оплатить заказ в банке по квитанции без открытия счета. Срок поступления платежа до 3 рабочих дней.
                                </li>
                            </ul>
                        </div>
                    <!-- Tab end 2 -->
                    <!-- Tab content 3 -->
                    <div
                        class="tab-pane fade white_content p-3 rounded-3 about-tabs shadow-sm"
                        id="v-pills-messages"
                        role="tabpanel"
                        aria-labelledby="v-pills-messages-tab"
                    >
                        <div class="map d-flex flex-column">
                        <h2>Контакты</h2>
                            <div class="d-flex info_map row">
                                <div class="info_map_first col-6 col-md-4">
                                    <h6 class="fw-bold">Режим работы:</h6>
                                    <p>Ежедневно с 09:00 до 20:00</p>
                                </div>
                                <div class="info_map_second col-6 col-md-4">
                                    <h6 class="fw-bold">Почта:</h6>
                                    <p>blackfly@mail.ru</p>
                                </div>
                                <div class="info_map_second col-12 col-md-4">
                                    <h6 class="fw-bold">Телефон:</h6>
                                    <p>+7(800)2000-122</p>
                                </div>
                            </div>
                            <iframe src="https://yandex.ru/map-widget/v1/?ll=37.672912%2C55.874295&mode=whatshere&utm_source=ntp_chrome&whatshere%5Bpoint%5D=37.672381%2C55.874225&whatshere%5Bzoom%5D=17&z=18.28" width="100%" height="400" frameborder="0"></iframe>
                        </div>
                    </div>
                    <!-- Tab end 3 -->
                    <!-- Tab content -->
                </div>
            </div>

        </section>
    </main>
    <?php
        $root = $_SERVER['DOCUMENT_ROOT'];

        include "$root/php/modules/footer.php";
    ?>
    <script src="/js/main2.js"></script>
    <script src="/js/mdb.umd.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>