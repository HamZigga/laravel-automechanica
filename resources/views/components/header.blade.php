<header class="header">
    <a class="header__left" href="{{ route('main') }}">

        <img class="logo__img" src="{{ asset('storage/images/baseimg/logo.svg') }}" alt="logo">
    </a>

    <nav class="header__nav">
        <li class="nav__item">
            <a href="{{ route('main') }}" class="nav__item-link">Главная</a>
        </li>
        <li class="nav__item">
            <a href="{{ route('category') }}" class="nav__item-link">Категории</a>
        </li>
        <li class="nav__item">
            <a href="{{ route('cart') }}" class="nav__item-link">Корзина</a>
        </li>
    </nav>
    <div class="header__right">
        @auth
            <div class="header__right-element"><a href="{{ route('personal.area') }}">{{ Auth::user()->name }}</a></div>
            <form class="header__right-element" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();">Выход</a>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="header__right-element">Вход</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="header__right-element">Регистрация</a>
            @endif
        @endguest
    </div>
</header>
