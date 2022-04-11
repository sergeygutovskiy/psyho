<!DOCTYPE html>
<html lang="ru">
<head>
    @include('templates.head')
    <link rel="stylesheet" href="{{ asset('css/questionnaire.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit-account.css') }}">

    <title> Обновить аккаунт </title>
</head>
<body>
    @include('templates.navigation')
    
    <div class="edit"> 
        <form 
            class="edit-form" 
            action="{{ route('users.account.update') }}"
            method="POST"
            >
            @csrf
            <h2>Редактировать профиль</h2>
            
            <div class="form-fields">
                <input 
                    class="long-form-input" 
                    type="text" 
                    name="fio" 
                    value="{{$user->fio}}"
                    required
                >
                <input 
                    class="long-form-input" 
                    type="email" 
                    name="email" 
                    value="{{$user->email}}"
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
                            value="{{$user->age}}"
                            required    
                        >
                    </div>
                    
                    <div class="grid-fields-below">
                        <input id="sex-input" type="hidden" name="sex" value="{{$user->sex}}">
                        
                        <label>Укажите ваш пол:</label>
                        <div class="grid-fields-below">
                            <button 
                                class="sex-button {{$user->sex=='m' ? 'active' : ''}}" 
                                type="button" 
                                data-value="m"
                            >
                                Мужской 
                            </button>
                            <button 
                                class="sex-button {{$user->sex=='w' ? 'active' : ''}}" 
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

                <div class="form-fields">
                    <h4>Смена пароля</h4>

                    <input 
                        class="long-form-input" 
                        type="password" 
                        name="password" 
                        placeholder="Новый пароль"
                    >
                    <input 
                        class="long-form-input" 
                        type="password" 
                        name="password-confirm" 
                        placeholder="Повторите новый пароль"
                    > 
                </div>
            </div>

            <button class="big-red-button" type="submit"> 
                Сохранить данные 
            </button>
        </form>
    </div>
</body>
</html>