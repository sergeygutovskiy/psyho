<!DOCTYPE html>
<html lang="ru">
<head>
    @include('templates.head')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">

    <title> {{ $session->test->name }} </title>
</head>
<body>
    @include('templates.navigation')

    <div class="questions-block">
        <h3>{{ $session->test->name }}</h3>

        <form 
            method="POST" 
            action="{{ route('tests.sessions.finish', [ 'id' => $session->id ]) }}"
        >
            @csrf

            @foreach ($session->test->questions as $question)
            <div class="questions">
                <div class="question-card">
                    <h4>{{ $question->title }}</h4>
                    <h4 class="question-count">
                        {{ $question->order }}
                        /
                        {{ count($session->test->questions) }}
                    </h4>

                    <div>
                    @foreach ($question->answers as $answer)
                        <input 
                            type="radio" 
                            id="answer-{{$question->id}}-{{$answer->id}}" 
                            name="question-{{$question->id}}[]" 
                            class="checkbox"
                            value="{{$answer->id}}"
                            >
                        <label for="answer-{{$question->id}}-{{$answer->id}}">
                            {{ $answer->title }}
                        </label>
                    @endforeach
                    </div>
                </div>
            </div>
            @endforeach

            <button 
                class="big-red-button" 
                type="submit"
                id="submit-form"
            >
                Завершить тестирование
            </button>
        </form>
    </div>

    @include('templates.footer')
</body>
</html>