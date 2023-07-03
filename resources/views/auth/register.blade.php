@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('../assets/css/reg.css') }}" />

@section('content')
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form class="form" action="{{ route('register') }}" method="POST">
        <h3>Регистрация</h3>
        @csrf
        <input type="text" class="login-input @error('name') is-invalid @enderror" value="{{ old('name') }}"
            name="name" placeholder="Ваше имя" required />

        <input type="email" class="login-input @error('email') is-invalid @enderror" value="{{ old('email') }}"
            name="email" placeholder="Ваш Email" required />

        <input type="text" class="login-input  @error('tell') is-invalid @enderror" id="phone"
            value="{{ old('tell') }}" name="tell" placeholder="Введите номер телефона" pattern="\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}" required>

        <script>
            $(function() {
                $('#phone').mask('+7 (999) 999-99-99');
            });
        </script>

        <input type="password" class="login-input @error('password') is-invalid @enderror" value="{{ old('password') }}"
            name="password" placeholder="Пароль" required>

        <button type="submit" class="login-button">Регистрация</button>

        <p class="link"><a href="{{ route('login') }}">Войти</a></p>
    </form>
    <script>


    </script>
@endsection
