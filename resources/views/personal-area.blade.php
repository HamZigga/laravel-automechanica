@extends ('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container container-pesonalarea">
        <div class="block-title">
            <h3 class="block-title__text h1">Личный кабинет</h3>
        </div>

        <p class="personal__label">Ваше Имя:</p>
        <p class="personal__text h3">{{ auth()->user()->name }}</p>
        <p class="personal__label">Ваш Email:</p>
        <p class="personal__text h2">{{ auth()->user()->email }}</p>
        <a class="personal__link btn btn-dark" href="{{ route('cart') }}">Моя Корзина</a>
    </div>
@endsection
