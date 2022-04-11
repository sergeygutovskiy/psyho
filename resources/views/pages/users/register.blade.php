<!DOCTYPE html>
<html lang="ru">
<head>
    @include('templates.head')
    <link rel="stylesheet" href="{{ asset('css/questionnaire.css') }}">

    <title> Регистрация </title>
</head>
<body>

<div class="questionnaire"> 
    <form class="questionnaire-form" method="POST" action="{{ route('users.register') }}">
        @csrf
        
        <h2>Зарегистрироваться</h2>
        <p>Для регистрации заполните небольшую анкету</p>

        <div class="questionnaire-form-fields">
            <input 
                class="long-form-input" 
                type="text" 
                name="fio" 
                placeholder="Введите ФИО"
                required
            >
            <input 
                class="long-form-input" 
                type="email" 
                name="email" 
                placeholder="Введите Email"
                required
            > 

            <div class="grid-fields">
                <div class="grid-fields-below">
                    <label for="age_input" id="age-input-label">Укажите ваш возраст:</label>
                    <input 
                        type="number" 
                        name="age" 
                        id="age_input" 
                        min="14" 
                        max="122"
                        required
                    >
                </div>
                <div class="grid-fields-below">
                    <input id="sex-input" type="hidden" name="sex" value="m">
                    
                    <label>Укажите ваш пол:</label>
                    <div class="grid-fields-below">
                        <button 
                            class="sex-button active" 
                            type="button" 
                            data-value="m"
                        >
                            Мужской 
                        </button>
                        <button 
                            class="sex-button" 
                            type="button" 
                            data-value="w"
                        >
                            Женский
                        </button>
                    </div>
                    <script>
                        const sexButtons = document.querySelectorAll('.sex-button');
                        let activeButton = sexButtons[0];

                        for (const button of sexButtons) {
                            button.addEventListener('click', e => {
                                e.target.classList.add('active');
                                activeButton.classList.remove('active');
                                
                                activeButton = e.target;
                                document.querySelector('#sex-input').value = e.target.dataset.value;
                            });
                        }
                    </script>
                </div>
            </div>
        </div>

        <h4>Что вас беспокоит?</h4>

        <div class="questionnaire-form-fields">
            <div class="grid-fields-checkboxes">
                @foreach ($questions as $question)
                <input 
                    type="checkbox" 
                    name="questions[]"
                    id="question-{{ $question->id }}" 
                    class="checkbox"
                    value="{{ $question->id }}"
                >
                <label for="question-{{ $question->id }}" >
                    {{ $question->name }}
                </label>
                @endforeach
            </div>
            <input 
                class="long-form-input" 
                type="password" 
                name="password" 
                placeholder="Создайте пароль"
                required
            > 
        </div>        

        <button class="big-red-button" type="submit"> Зарегистрироваться </button>

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