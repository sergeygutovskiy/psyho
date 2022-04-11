const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .postCss('resources/css/account.css', 'public/css')
    .postCss('resources/css/edit-account.css', 'public/css')
    .postCss('resources/css/login.css', 'public/css')
    .postCss('resources/css/main.css', 'public/css')
    .postCss('resources/css/questionnaire.css', 'public/css')
    .postCss('resources/css/questions.css', 'public/css')
    .postCss('resources/css/result.css', 'public/css')
    .postCss('resources/css/style.css', 'public/css')
    ;
