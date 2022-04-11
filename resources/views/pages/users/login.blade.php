<!DOCTYPE html>
<html lang="ru">

<head>
    @include('templates.head')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <title> Вход </title>
</head>

<body>
    <div class="login">
        <form class="login-form" method="POST" action="{{ route('users.login') }}">
            @csrf
            
            <h2>Вход</h2>

            <div class="login-form-fields">
                <input 
                    class="long-form-input" 
                    type="email" 
                    name="email" 
                    placeholder="Ваш Email"
                    required
                >
                <input 
                    class="long-form-input" 
                    type="password" 
                    name="password" 
                    placeholder="Ваш пароль"
                    required
                >
            </div>

            <button class="big-red-button" type="submit"> 
                Войти 
            </button>
            <a 
                class="big-button-without-border" 
                href="{{ route('users.register.page') }}"
            > 
                Зарегистрироваться 
            </a>

            <div class="policy">
                <span>
                    Авторизуясь, вы соглашаетесь с 
                    <a href="/policy">пользовательским соглашением</a> 
                    и даёте согласие на обработку персональных данных.
                </span>
            </div>
        </form>
    </div>
</body>

</html>