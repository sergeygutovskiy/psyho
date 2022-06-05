<!DOCTYPE html>
<html lang="ru">
<head>
    @include('templates.head')
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
    <link rel="stylesheet" href="{{ asset('css/super-account.css') }}">

    <title> Главная </title>
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

    <div class="questionnaire-block">

        <h1>Данные анкетирования клиента</h1>

        <div class="user-questionnaire">

            <h4>Выбранные беспокоящие факторы:</h4>

            <div class="grid-fields-checkboxes">
                @foreach ($questions as $question)
                    @if ( $user->questions->contains($question->id) )
                        <input 
                            type="checkbox" 
                            name="questions[]"
                            id="question-{{ $question->id }}" 
                            class="checkbox"
                            value="{{ $question->id }}"
                            disabled
                            checked
                        >
                        <label for="question-{{ $question->id }}" >
                            {{ $question->name }}
                        </label>
                    @else
                        <input 
                            type="checkbox" 
                            name="questions[]"
                            id="question-{{ $question->id }}" 
                            class="checkbox"
                            value="{{ $question->id }}"
                            disabled
                        >
                        <label for="question-{{ $question->id }}" >
                            {{ $question->name }}
                        </label>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    @include('templates.footer')
</body>
</html>