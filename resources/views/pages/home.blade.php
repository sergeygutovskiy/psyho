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

    @if ( Auth::user()->is_admin )
    <div class="users-list">
        <h1>Зарегистрированные клиенты</h1>

        <div class="users-table">
            <table>
                @foreach ($users as $user)
                <tr>
                    <th>ФИО</th>
                    <th>Пол</th>
                    <th>Возраст</th>
                    <th>Email</th>
                    <th>Дата регистрации</th>
                    <th></th>
                </tr>

                <tr>
                    <td>{{ $user->fio }}</td>
                    <td>{{ $user->sex }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d.m.Y') }}</td>
                    <td>
                        <a 
                            class="small-button" 
                            href="{{ route('users.account.tests.page', [ 'id' => $user->id ]) }}"
                        >
                            Посмотреть результаты тестирований 
                        </a>
                        <a 
                            class="small-button" 
                            href="{{ route('users.account.info.page', [ 'id' => $user->id ]) }}"
                        > 
                            Посмотреть анкету 
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @endif

    @include('templates.footer')
</body>
</html>