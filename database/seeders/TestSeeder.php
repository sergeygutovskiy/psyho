<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    public function run()
    {
        DB::table('tests')->insert([
            [
                'name' => 'Тестовый тест №1',
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam alias neque veniam dolores, in error voluptates.'
            ],
            [
                'name' => 'Тестовый тест №2',
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam alias neque veniam dolores, in error voluptates.'
            ],
        ]);

        DB::table('test_results')->insert([
            [ 'test_id' => 1, 'desc' => 'Результат №1', 'recommendation' => 'Рекомендация №1', ],
            [ 'test_id' => 1, 'desc' => 'Результат №2', 'recommendation' => 'Рекомендация №2', ],
            [ 'test_id' => 2, 'desc' => 'Результат №1', 'recommendation' => 'Рекомендация №3', ],
            [ 'test_id' => 2, 'desc' => 'Результат №2', 'recommendation' => 'Рекомендация №4', ],
        ]);

        DB::table('test_questions')->insert([
            [ 'test_id' => 1, 'title' => 'Вопрос №1', 'order' => 1, ],
            [ 'test_id' => 1, 'title' => 'Вопрос №2', 'order' => 2, ],
            [ 'test_id' => 1, 'title' => 'Вопрос №3', 'order' => 3, ],
            [ 'test_id' => 2, 'title' => 'Вопрос №1', 'order' => 1, ],
        ]);

        DB::table('test_answers')->insert([
            [ 'question_id' => 1, 'title' => 'Ответ №1 на вопрос №1', 'result_id' => 1 ],
            [ 'question_id' => 1, 'title' => 'Ответ №2 на вопрос №1', 'result_id' => 2 ],
            [ 'question_id' => 1, 'title' => 'Ответ №3 на вопрос №1', 'result_id' => 1 ],

            [ 'question_id' => 2, 'title' => 'Ответ №1 на вопрос №2', 'result_id' => 1 ],
            [ 'question_id' => 2, 'title' => 'Ответ №2 на вопрос №2', 'result_id' => 2 ],
            [ 'question_id' => 2, 'title' => 'Ответ №3 на вопрос №2', 'result_id' => 1 ],

            [ 'question_id' => 3, 'title' => 'Ответ №1 на вопрос №3', 'result_id' => 1 ],
            [ 'question_id' => 3, 'title' => 'Ответ №2 на вопрос №3', 'result_id' => 2 ],
            [ 'question_id' => 3, 'title' => 'Ответ №3 на вопрос №3', 'result_id' => 1 ],

            [ 'question_id' => 4, 'title' => 'Ответ №1 на вопрос №1', 'result_id' => 1 ],
            [ 'question_id' => 4, 'title' => 'Ответ №2 на вопрос №1', 'result_id' => 2 ],
            [ 'question_id' => 4, 'title' => 'Ответ №3 на вопрос №1', 'result_id' => 1 ],
        ]);
    }
}
