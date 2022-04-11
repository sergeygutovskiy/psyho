<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnaireQuestionSeeder extends Seeder
{
    public function run()
    {
        DB::table('questionnaire_questions')->insert([
            [ 'name' => 'Трудности в отношениях' ],
            [ 'name' => 'Поиск себя' ],
            [ 'name' => 'Неуверенность в себе' ],
            [ 'name' => 'Профессиональное выгорание' ],
            [ 'name' => 'Зависимые отношения' ],
            [ 'name' => 'Стресс и депрессивные состояния' ],
            [ 'name' => 'Страх и тревога' ],
            [ 'name' => 'Психосоматика и физическое состояние' ],
            [ 'name' => 'Проблемы в общении' ],
            [ 'name' => 'Отношения в семье' ],
            [ 'name' => 'Карьера и планы на жизнь' ],
            [ 'name' => 'Жизненный кризис' ],
            [ 'name' => 'Другое' ],
        ]);
    }
}
