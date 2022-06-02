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
                <p class="h3 mt-3 mb-10">{{ $product->price }} Руб.</p>
                @guest
                    <p class="h3">Для покупки необходима авторизация</p>
                @endguest
                @auth
                    <form action="{{ route('purchase') }}" class="product__form" method="POST">
                        @csrf
                        <input type="text" hidden name="product_id" id="product_id" value="{{ $product->id }}">
                        <input type="number" placeholder="Количество" name="quantity" id="quantity" class="product__form-item">
                        <button class="btn btn-dark">В корзину</button>
                    </form>
                @endauth
                <p>Подходит для:</p>
                @foreach($product->carmodel as $carmodel)
                <span class="badge badge-Secondary">{{ $carmodel->carbrand->title }} {{ $carmodel->title }}</span>
                @endforeach
                
            </div>
        </div>
        <div>{!! $product->description ?? '' !!}</div>

    </div>
@endsection
