<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/index.php"><img class="brand_elem" src="/img/logo2.svg" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-lg fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav page me-auto mb-lg-0 menu_header">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/catalog.php">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/about.php">О нас</a>
                    </li>
                </ul>
                <!-- тф -->
                <hr>
                <ul class="navbar-nav page ms-auto top-menu1 mb-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/favor.php">Избранное</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/cart.php">Корзина</a>
                    </li>
                    <?php if($_COOKIE['id'] == ''): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#staticBackdrop" aria-current="page" href="#">Личный кабинет</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/account.php">Личный кабинет</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <!-- конец тф -->
                <ul class="navbar-nav ms-auto top-menu mb-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/favor.php"><img class="icons" src="/img/black1.svg" alt="heart"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/cart.php"><img class="icons1" src="/img/black3.svg" alt="bag"></a>
                    </li>
                    <?php if($_COOKIE['id'] == ''): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#staticBackdrop" aria-current="page" href="#"><img class="icons2" src="/img/black2.svg" alt="user"></a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/account.php"><img class="icons2" src="/img/black2.svg" alt="user"></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</header>

<!-- Modal -->
<div
  class="modal fade"
  id="staticBackdrop"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Личный кабинет</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- content -->

        <!-- Pills navs -->
        <ul class="nav nav-pills mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a
            data-mdb-pill-init
            class="nav-link active active_pills"
            id="ex1-tab-1"
            href="#ex1-pills-1"
            role="tab"
            aria-controls="ex1-pills-1"
            aria-selected="true"
            >Авторизация</a
            >
        </li>
        <li class="nav-item" role="presentation">
            <a
            data-mdb-pill-init
            class="nav-link"
            id="ex1-tab-2"
            href="#ex1-pills-2"
            role="tab"
            aria-controls="ex1-pills-2"
            aria-selected="false"
            >Регистрация</a
            >
        </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content" id="ex1-content">
        <div
            class="tab-pane fade show active"
            id="ex1-pills-1"
            role="tabpanel"
            aria-labelledby="ex1-tab-1"
        >
            <!-- content2 auth -->
            <form class="auth_form my-3 row needs-validation was-validated" action="/php/actions/auth.php" method="POST" novalidate>
                <div class="col-12 my-3">
                    <input type="email" placeholder="ЭЛЕКТРОННАЯ ПОЧТА" name="email" required>
                </div>
                <div class="col-12 my-3">
                    <input type="password" placeholder="ПАРОЛЬ" name="pass" required>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-outline-dark btn_auth" data-mdb-ripple-init data-mdb-ripple-color="dark">Войти</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
            <!-- content1 reg -->
            <form class="reg_form my-3 row needs-validation" novalidate action="/php/actions/reg.php" method="POST">
                <div class="col-12 my-3">
                    <input type="text" id="validationCustom01" placeholder="ИМЯ" name="name" required>
                </div>
                <div class="col-12 my-3">
                    <input type="email" id="validationCustom02" placeholder="ЭЛЕКТРОННАЯ ПОЧТА" name="email" required>
                </div>
                <div class="col-12 my-3">
                    <input type="password" id="validationCustom03" placeholder="ПАРОЛЬ" name="pass" required>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-outline-dark btn_reg" data-mdb-ripple-init data-mdb-ripple-color="dark">Зарегистрироваться</button>
                </div>
            </form>
        </div>
        </div>
        <!-- Pills content -->

      </div>
    </div>
  </div>
</div>