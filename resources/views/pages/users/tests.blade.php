<!DOCTYPE html>
<html lang="ru">
<head>
    @include('templates.head')
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">

    <title> {{ $user->fio }} </title>
</head>
<body>
    @include('templates.navigation')

    <div class="account-info">
        <img src="{{ $user->avatar }}" class="user-img">

        <div class="user-fields">
            <div class="field-name">ФИО</div>
            <div class="field-content">{{ $user->fio }}</div>
            <div class="field-name">Email</div>
            <div class="field-content">{{ $user->email }}</div>
            <div class="user-fields">
                <div class="field-name">Дата регистрации</div>
                <div class="field-content">{{ $user->created_at->format('Y.m.d') }}</div>
            </div>
            <div class="user-fields">
                <div class="field-name">Возраст</div>
                <div class="field-content">{{ $user->age }}</div>
            </div>
        </div>
    </div>

    @if ( count($user->finished_tests) > 0 )
    <div class="passed-tests-block">
        <h1>Пройденные тесты</h1>

        <div class="passed-tests">
            @foreach ($user->finished_tests as $test_session)
            <a 
                class="grid-test-card"
                href="{{ route('tests.sessions.result.page', [ 'id' => $test_session->id ]) }}"
            >
                <div class="test-card-header">
                    {{ $test_session->test->name }}
                </div>
                <div class="test-card-header">Результаты пройденного тестирования:</div>

                <div class="test-card-content">
                    <p>
                        {{ $test_session->test->desc }}
                    </p>
                </div>

                <div class="test-card-content">
                    <p>
                        {{ $test_session->result->desc }}
                    </p>
                </div>

                <div></div>

                <div class="grid-test-card">
                    <div class="field-name">Дата прохождения тестирования:</div>
                    <div class="field-content">
                        {{ $test_session->created_at->format('d.m.Y') }}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    @include('templates.footer')
</body>
</html>