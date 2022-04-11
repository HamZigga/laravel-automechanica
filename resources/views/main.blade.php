@extends ('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="aside__block">
                @include('components.sidebar')
            </div>
            <section class="col-md-8 col-lg-8 pt-3 px-4 products">
                @isset($category)
                    <p class="h2">{{ $category->title }}</p>
                @endisset
                <div class="row">
                    @if(!$products[0])
                        <p class="mt-10">Список товаров пуст</p>
                    @endif
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <a href="{{ route('product.item', $product->id) }}">
                                <div class="card mb-4 box-shadow">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                            class="card-img-top cards__item-img" alt="">
                                    @else
                                        <img src="https://sbis.perm.ru/wp-content/uploads/2019/09/placeholder.png"
                                            class="card-img-top cards__item-img" alt="">
                                    @endif

                                    <div class="card-body">

                                        <p class="cards__item-title h2">{{ $product->title }}</p>
                                        <p class="card-text">{{ $product->subtitle ?? '-' }}</p>
                                        <p class="cards__item-brand lead">{{ $product->brand ?? 'Бренд не указан' }}</p>
                                        <p class="cards__item-price h2 d-flex justify-content-end">
                                            {{ $product->price ?? 'Цена не указана' }} Руб.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
                {{ $products->links() }}
            </section>
            <section class="col-md-1 ml-sm-auto col-lg-1"></section>
        </div>
    </div>
@endsection
