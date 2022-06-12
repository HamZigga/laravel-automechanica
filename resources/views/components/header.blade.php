<header>
    <div class="container">
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
                    <div class="header__upper-link"><a class="flex align-items-center" href="{{ route('cart') }}">Корзина <img class="" style="height: 15px;" src="{{ asset('storage/images/baseimg/cart.png') }}" alt=""></a>
                    </div>
                    <div class="header__upper-link"><a href="{{ route('personal.area') }}">{{ Auth::user()->name }}</a>
                    </div>
                    <form class="header__upper-link" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">Выход</a>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="header__upper-link">Вход</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="header__upper-link">Регистрация</a>
                    @endif
                @endguest
            </div>
        </div>
        <div class="row align-items-center header__lower">
            <div class="col">
                <a class="" href="{{ route('main') }}">
                    <p>TechAuto.shop</p>
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
                            <a href="#" class="">О нас</a>
                        </li>
                        <li class="nav__item">
                            <a href="#" class="">Контакты</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
