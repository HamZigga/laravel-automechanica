@extends ('layouts.app')

@section('title', 'Корзина')

@section('content')
    <div class="container products">
        <table class="table" style="font-size: 18px">
            <thead>
                <tr>
                    <th style="col">Номер товара</th>
                    <th style="col">Наименование товара</th>
                    <th style="col">Тип товара</th>
                    <th style="col">Количество</th>
                    <th style="col">Сумма товара</th>
                    <th style="col">Удалить</th>
                </tr>
            </thead>
            <tbody>
                <div style="display: hidden" hidden>{{ $sum=0 }}</div>
                @foreach ($purchases as $purchase)
                    <tr>
                        <th style="row">{{ $purchase->product_id }}</th>
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
            
            <p class=" mb-4">Сумма заказа:{{ $sum }}Руб.</p>
            <a href="{{ route('statement') }}" class="btn btn-dark" style="font-size: 24px">Оформить заказ</a>
        @endisset
    </div>

@endsection
