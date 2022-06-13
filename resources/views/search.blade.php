@extends ('layouts.app')

@section('title', 'Поиск товара')

@section('content')
    <section class="container products">
        <form action="{{ route('product.search.result') }}" method="POST" class="form">
            @csrf
            <p>Фильтры поиска</p>
            <div class="mb-3">
                <label for="searchInput">Введите название товара<span class="text-muted"></span></label>
                <input type="text" class="form-control" name="searchInput" id="searchInput" placeholder="Название товара">
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <p>Выбор категории</p>
                    <select size="1" class="custom-select d-block w-100" name="producttype">
                        <option disabled>Выберите категорию</option>
                        @foreach ($producttypes as $key => $producttype)
                            <option value="{{ $producttype->id }}">{{ $producttype->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <p>Выбор марки автомобиля</p>
                    <select size="1" class="custom-select d-block w-100" name="carmodel">
                        <option disabled>Выберите марку авто</option>
                        @foreach ($carmodels as $key => $carmodel)
                            <option value="{{ $carmodel->id }}">
                                {{ $carmodel->carbrand->title . ' ' . $carmodel->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-dark">Найти</button>
        </form>
    </section>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <section class="products">
                <h3 class="h3 d-flex justify-content-center" style="padding-top: 35px; padding-bottom: 20px">Каталог
                </h3>
                <div class="row d-flex justify-content-around">
                    @if (isset($products) && isset($products[0]))

                        @foreach ($products as $product)
                            @include('components.product-card')
                        @endforeach
                    @else
                        <p class="mt-10">Список товаров пуст</p>
                    @endif
                </div>
            </section>
        </div>
    </div>
@endsection
