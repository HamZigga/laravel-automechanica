@extends ('layouts.app')

@section('title', 'Товар')

@section('content')
    <div class="container">
        <div class="row">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="col-md-6" alt="">
            @else
                <img src="https://sbis.perm.ru/wp-content/uploads/2019/09/placeholder.png"
                    class="col-md-6" alt="">
            @endif
            <div class="col-md-6">
                <p class="h2 mb-2">{{ $product->title }}</p>
                <p>{{ $product->subtitle }}</p>
                <p class="lead">{{ $product->brand }}</p>
                <p>Осталось: {{ $product->quantity }}</p>
                <p class="h3 mt-3 mb-10">{{ $product->price }} Руб.</p>
                <form action="" class="product__form">
                    @csrf
                    <input type="number" placeholder="Количество" name="quntity" id="quntity" class="product__form-item">
                    <button class="btn btn-dark">Купить</button>
                </form>
            </div>
        </div>
        <div>{!! $product->description ?? '' !!}</div>

    </div>
@endsection
