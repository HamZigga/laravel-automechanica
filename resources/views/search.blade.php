@extends ('layouts.app')

@section('title', 'Поиск товара')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="aside__block">
                @include('components.sidebar')
            </div>
            <section class="col-md-8 col-lg-8 pt-3 px-4 products">
                <div class="row">
                    <form action="{{ route('product.search.result') }}" method="POST" class="form">
                        @csrf
                        <p>Фильтры поиска</p>
                        <label for="searchInput">Введите название товара</label>
                        <input type="text" name="searchInput" id="searchInput" placeholder="Название товара (необязательное поле)">
                        <p>Выбор категории</p>
                        <select size="1" name="producttype">
                            <option disabled>Выберите категорию</option>
                            @foreach($producttypes as $key => $producttype)
                                <option value="{{ $producttype->id }}">{{ $producttype->title }}</option>
                            @endforeach
                        </select>

                        <p>Выбор марки автомобиля</p>
                        <select size="1" name="carmodel">
                            <option disabled>Выберите марку авто</option>
                            @foreach($carmodels as $key => $carmodel)
                                <option value="{{ $carmodel->id }}"> {{ $carmodel->carbrand->title." ".$carmodel->title }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-secondary">Найти</button>
                    </form>
                </div>

                <div class="row">
                    @if (isset($products) && $products[0])
                        <p class="mt-10">Найденые товары:</p>
                        @foreach ($products as $key => $product)
                            @include('components.product-card')
                        @endforeach
                    @else
                        <p class="mt-10">Список товаров пуст</p>
                    @endif
                </div>
            </section>
            <section class="col-md-1 ml-sm-auto col-lg-1"></section>
        </div>
    </div>
@endsection
