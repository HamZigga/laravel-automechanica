<header>
    <div class="container">
        <!--Navbar-->
        <div class="burger">
            <nav class="navbar navbar-light amber lighten-4 mb-4">

                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">TechAuto.shop</a>

                <!-- Collapse button -->
                <button class="navbar-toggler first-button" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent20" aria-controls="navbarSupportedContent20"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <div class="animated-icon1"><span></span><span></span><span></span></div>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent20">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('main') }}">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.search') }}">Поиск</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category') }}">Категории</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Корзина</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('personal.area') }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Выйти</a>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                        </li>
                        @endguest
                    </ul>
                    <!-- Links -->

                </div>
                <!-- Collapsible content -->

            </nav>
            <!--/.Navbar-->
        </div>
        <div class="pc">


            <div class="row justify-content-between align-items-center header__upper">
                <div class="col">
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item"><a href="#"><img class="header__social"
                                    src="{{ asset('storage/images/baseimg/vk.png') }}" alt="vk"></a></li>
                        <li class="nav-item"><a href="#"><img class="header__social"
                                    src="{{ asset('storage/images/baseimg/twitter.png') }}" alt="twitter"></a></li>
                        <li class="nav-item"><a href="#"><img class="header__social"
                                    src="{{ asset('storage/images/baseimg/zen.png') }}" alt="zen"></a></li>
                        <li class="nav-item"><a href="#"><img class="header__social"
                                    src="{{ asset('storage/images/baseimg/gp.png') }}" alt="gp"></a></li>
                    </ul>
                </div>
                <div class="col d-flex justify-content-end header__upper-controls">
                    @auth
                        <div class="header__upper-link"><a class="flex align-items-center"
                                href="{{ route('cart') }}">Корзина
                                <img class="" style="height: 15px;"
                                    src="{{ asset('storage/images/baseimg/cart.png') }}" alt=""></a>
                        </div>
                        <div class="header__upper-link"><a
                                href="{{ route('personal.area') }}">{{ Auth::user()->name }}</a>
                        </div>
                        <form class="header__upper-link" method="get" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">Выход</a>
                        </form>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="header__upper-link">Войти</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="header__upper-link">Регистрация</a>
                        @endif
                    @endguest
                </div>
            </div>
            <div class="row align-items-center header__lower">
                <div class="col">
                    <a class="" href="{{ route('main') }}">
                        <p style="font-size: 35px">TechAuto.shop</p>
                    </a>
                </div>
                <div class="col d-flex justify-content-end">
                    <nav class="">
                        <ul class="navbar-nav flex-row">
                            <li class="nav__item">
                                <a href="{{ route('product.search') }}" class="">Поиск</a>
                            </li>
                            <li class="nav__item">
                                <a href="{{ route('category') }}" class="">Категории</a>
                            </li>
                            <li class="nav__item">
                                <a href="{{ route('about') }}" class="">О нас</a>
                            </li>
                            <li class="nav__item">
                                <a href="{{ route('contacts') }}" class="">Контакты</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
