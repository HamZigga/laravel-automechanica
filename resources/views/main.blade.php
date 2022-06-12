@extends ('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="container">
        <div class="row">
            <section class="products">
                <h3 class="h3 d-flex justify-content-center">Каталог</h3>
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
