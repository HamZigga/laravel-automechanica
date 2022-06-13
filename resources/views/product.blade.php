@extends ('layouts.app')

@section('title', 'Товар')

@section('content')
    <div class="container">
        <div class="row mt-5">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="col-md-6" alt="">
            @else
                <img src="https://sbis.perm.ru/wp-content/uploads/2019/09/placeholder.png" class="col-md-6" alt="">
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
                        <p>Введите нужное количество</p>
                        <div class="input-group inline-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary btn-minus">
                                    <p>-</p>
                                </button>
                            </div>
                            <input class="form-control quantity" min="1" name="quantity" id="quantity" value="1" type="number">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary btn-plus">
                                    <p>+</p>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="statement__button">Добавить в корзину</button>
                    </form>
                @endauth
                <p>Подходит для:</p>
                @foreach ($product->carmodel as $carmodel)
                    <span class="badge badge-Secondary">{{ $carmodel->carbrand->title }} {{ $carmodel->title }}</span>
                @endforeach

            </div>
        </div>
        <div>{!! $product->description ?? '' !!}</div>

    </div>
    <script>
        $('.btn-plus, .btn-minus').on('click', function(e) {
            const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
            const input = $(e.target).closest('.input-group').find('input');
            if (input.is('input')) {
                input[0][isNegative ? 'stepDown' : 'stepUp']()
            }
        })
    </script>
@endsection
