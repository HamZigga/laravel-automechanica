<div class="" style="padding: 0 20px">
    <a href="{{ route('product.item', $product->id) }}">
        <div class="card cards__item mb-4">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top cards__item-img" alt="">
            @else
                <img src="https://sbis.perm.ru/wp-content/uploads/2019/09/placeholder.png"
                    class="card-img-top cards__item-img" alt="">
            @endif

            <div class="card-body">

                <p class="cards__item-title">{{ $product->title }}</p>
                <p class="cards__item-brand">{{ $product->producttype->title ?? '-' }}</p>
                <p class="cards__item-brand">{{ $product->brand ?? 'Бренд не указан' }}</p>
                <p class="cards__item-price h2 d-flex justify-content-end">
                    {{ $product->price ?? 'Цена не указана' }} Руб.</p>
            </div>
        </div>
    </a>
</div>
