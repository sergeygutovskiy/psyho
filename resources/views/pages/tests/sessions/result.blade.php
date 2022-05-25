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
                    <h4>
                        @if ( Auth::id() != $session->user_id )
                            Результаты:
                        @else
                            Ваши результаты:
                        @endif
                    </h4>
                    <p>
                        {{ $session->result->desc }}
                    </p>
                </div>

                <div class="result-card">
                    <h4>
                        @if ( Auth::id() != $session->user_id )
                            Рекомендация:
                        @else
                            Рекомендуем лично Вам
                        @endif
                    </h4>
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