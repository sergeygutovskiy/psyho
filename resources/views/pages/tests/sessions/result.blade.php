<!DOCTYPE html>
<html lang="ru">
<head>
    @include('templates.head')
    <link rel="stylesheet" href="{{ asset('css/result.css') }}">

    <title> {{ $session->test->name }} </title>
</head>

<body>
    @include('templates.navigation')

    <div class="result-block">
        <h3>
            {{ $session->test->name }}
        </h3>

        <div class="result-content">
            <div class="grid-result-content">
                <div class="result-card">
                    <h4>Ваши результаты:</h4>
                    <p>
                        {{ $session->result->desc }}
                    </p>
                </div>

                <div class="result-card">
                    <h4>Рекомендуем лично Вам</h4>
                    <p>
                        {{ $session->result->recommendation }}
                    </p>
                </div>
            </div>

            <img src="/images/image.png" class="result-image">
        </div>
    </div>

    @include('templates.footer')
</body>
</html>