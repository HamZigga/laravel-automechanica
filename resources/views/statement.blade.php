@extends ('layouts.app')

@section('title', 'Заявка')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <form class="form col-md-6" action="{{ route('statement.create')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя">
            </div>
            <div class="form-group">
                <label class="form-label" for="surname">Фамилия</label>
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Введите Фамилию">
            </div>
            <div class="form-group">
                <label class="form-label" for="phone">Номер телефона</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Введите номер телефона">
            </div>
            <div class="form-check">
                <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1" style="font-size: 14px">Я подтверждаю, что, установив «галочку»
                    напротив надписи: «Согласен с условиями обработкой данных» в вышеуказанном окне, даю тем самым такое
                    согласие</label>
            </div>
            <button type="submit" class="statement__button">Отправить</button>
        </form>
        <div class="col-md-3"></div>
    </div>
@endsection
