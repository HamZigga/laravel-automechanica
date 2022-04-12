<aside class="col-md-3 col-lg-3 d-none d-md-block sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
        @foreach ($producttypes as $producttype)
            <li class="nav-item aside__item">
                <a href="{{ route('category.show', $producttype->id) }}" class="nav-link active" style="font-size: 24px">{{ $producttype->title }}</a>
            </li>
        @endforeach
    </ul>
    </div>
</aside>