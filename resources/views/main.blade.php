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
                        @include('components.product-card')
                    @endforeach

                </div>
                {{ $products->links() }}
            </section>
            <section class="col-md-1 ml-sm-auto col-lg-1"></section>
        </div>
    </div>
@endsection
