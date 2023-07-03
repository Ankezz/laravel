@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/assets/css/reg.css') }}">

@section('content')
    @error('login')
        <div class='form'>
            <h3>Incorrect Username/password.</h3><br />
            <p class='link'>Click here to <a href='{{ route("login") }}'>Login</a> again.</p>
        </div>
    @endif

    @error('password')
        <div class='form'>
            <h3>Incorrect Username/password.</h3><br />
            <p class='link'>Click here to <a href='{{ route("login") }}'>Login</a> again.</p>
        </div>
    @endif
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form class="form" method="post" action="{{ route('login') }}">
        <h3>Вход</h3>
        @csrf
        <input type="text" class="login-input @error('name') is-invalid @enderror" name="name" value="{{old('name') }}" placeholder="Имя"autofocus="true" required />
        <input type="password" class="login-input @error('password') is-invalid @enderror" name="password" value="{{old('password') }}" placeholder="Пароль" required />
        <button type="submit" class="login-button">Войти</button>
        <p class="link"><a href="{{ route('register') }}">Регистрация</a></p>
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Забыли пароль?') }}
        </a>


    </form>
@endsection
