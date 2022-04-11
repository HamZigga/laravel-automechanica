@extends ('layouts.app')

@section('title', 'Корзина')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Номер товара</th>
                    <th scope="col">Наименование товара</th>
                    <th scope="col">Тип товара</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Сумма товара</th>
                    <th scope="col">Удалить</th>
                </tr>
            </thead>
            <tbody>
                <div style="display: hidden" hidden>{{ $sum=0 }}</div>
                @foreach ($purchases as $purchase)
                    <tr>
                        <th scope="row">{{ $purchase->product_id }}</th>
                        <th>{{ $purchase->product->title }}</th>
                        <th>{{ $purchase->product->producttype->title }}</th>
                        <td>{{ $purchase->quantity }} шт</td>
                        <td>{{ $item = $purchase->product->price * $purchase->quantity }} Руб.</td>
                        <td><a href="{{ route('cart.disable', $purchase->id) }}">Удалить</a></td>
                        <div style="display: hidden" hidden>{{ $sum+=$item }}</div>
                    </tr>
                @endforeach
                @empty($purchases[0])
                    <p class="h2">Корзина пуста</p>
                @endempty
            </tbody>

        </table>
        @isset($purchases[0])
            
            <p class="display-4 mb-4">Сумма заказа:{{ $sum }}Руб.</p>
            <a href="{{ route('statement') }}" class="btn btn-dark display-3">Оформить заказ</a>
        @endisset
    </div>

@endsection
