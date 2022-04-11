<!DOCTYPE html>
<html lang="ru">
<head>
    @include('templates.head')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <title> Главная </title>
</head>
<body>
    @include('templates.navigation')

    <div class="available-tests">
        <h1>Доступные тесты</h1>

        <div class="grid-tests-select">
            <div class="select">
                <select>
                    <option value="Все категории">Все категории</option>
                    <option value="Депрессия и стресс">Депрессия и стресс</option>
                    <option value="Бизнес и работа">Бизнес и работа</option>
                </select>
            </div>

            <div class="select">
                <select>
                    <option value="Популярные">Популярные</option>
                    <option value="Недавно добавленные">Старые</option>
                </select>
            </div>
        </div>

        <div class="grid-tests">
            @foreach ($tests as $test)
            <div class="info-test-card" style="border-block-color: #A60000;">
                <h4 class="test-title" style="background-color: #A60000;">
                    {{ $test->name }}
                </h4>
                <p class="info-test-card-content">
                    {{ $test->desc }}
                </p>
                <a 
                    class="begin-button" 
                    href="{{ route('tests.sessions.start', [ 'id' => $test->id ]) }}"
                >
                    Начать тест
                </a>
            </div>
            @endforeach
        </div>
    </div>

    @include('templates.footer')
</body>
</html>