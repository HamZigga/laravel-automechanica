@extends ('layouts.app')

@section('title', 'Главная страница')

@section('content')
    @if(Route::currentRouteName() == 'main')
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner ">
            <div class="carousel-item slider__item active">
                <img src="{{ asset('storage/images/baseimg/slider1.png') }}" class="d-block w-100 slider__img"  alt="...">
                <div class="carousel-caption d-none d-md-block d-flex h-50 align-items-center justify-content-center">
                    <p class="h2 slider__text">Широкий ассортимент</p>
                    <p class="h2 slider__text">Быстрая доставка</p>
                    <p>Только сертифицированные и оригинальные товары</p>
                </div>
            </div>
            <div class="carousel-item slider__item">
                <img src="{{ asset('storage/images/baseimg/slider2.png') }}" class="d-block w-100 slider__img"  alt="...">
                <div class="carousel-caption d-none d-md-block d-flex h-50 align-items-center justify-content-center">
                    <p class="h2 slider__text">Выгодная цена</p>
                    <p>Запчасти для иномарок в широком ассортименте</p>
                </div>
            </div>
            <div class="carousel-item slider__item">
                <img src="{{ asset('storage/images/baseimg/slider3.png') }}" class="d-block w-100 slider__img" alt="...">
                <div class="carousel-caption d-none d-md-block d-flex h-50 align-items-center justify-content-center">
                    <p class="h2 slider__text">Постоянные скидки и акции</p>
                    <p>Для подбора нужной детали на сайте можно воспользоваться поиском</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    @endif
    <div class="container d-flex justify-content-center">
        <div class="row">
            <section class="products">
                <h3 class="h3 d-flex justify-content-center" style="padding-top: 35px; padding-bottom: 20px; font-size: 32px">Каталог</h3>
                <div class="row d-flex justify-content-around">
                    @if (!$products[0])
                        <p class="mt-10">Список товаров пуст</p>
                    @else
                        @foreach ($products as $product)
                            @include('components.product-card')
                        @endforeach
                    @endif
                </div>
                {{ $products->links() }}
            </section>
            
        </div>
    </div>
    @if(Route::currentRouteName() == 'main')
    <div class="container products d-flex justify-content-center flex-column advantages">
        <p class="d-flex justify-content-center advantages__title">Наши преимущества</p>
        <ul class="advantages__list">
            <li>Профессиональный подбор запчастей</li>
            <li>Быстрое согласование с клиентом для подтверждения заказа</li>
            <li>Мы не просим предоплату - оплата при получении</li>
        </ul>
    </div>
    @endif
@endsection
