@extends ('layouts.app')

@section('title', 'Категории товаров')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center category">
            <div class="col-md-8 col-lg-8">
                <div class="row">
                    @foreach ($producttypes as $producttype)
                        <a href="{{ route('category.show', $producttype->id) }}" class="col-md-2 category__item" style="background-image: url('/storage/{{$producttype->description}}');">
                            <p class="h4">{{ $producttype->title }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
