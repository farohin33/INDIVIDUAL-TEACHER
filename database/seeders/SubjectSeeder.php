<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {

        $subjects = [

            ['name'=>'math','title'=>'Математика'],
            ['name'=>'algebra','title'=>'Алгебра'],
            ['name'=>'geometry','title'=>'Геометрия'],

            ['name'=>'physics','title'=>'Физика'],
            ['name'=>'chemistry','title'=>'Химия'],
            ['name'=>'biology','title'=>'Биология'],

            ['name'=>'russian_language','title'=>'Русский язык'],
            ['name'=>'grammar','title'=>'Грамматика'],
            ['name'=>'literature','title'=>'Литература'],

            ['name'=>'history','title'=>'История'],
            ['name'=>'world_history','title'=>'Всемирная история'],

            ['name'=>'geography','title'=>'География'],

            ['name'=>'informatics','title'=>'Информатика'],
            ['name'=>'programming','title'=>'Программирование'],

            ['name'=>'english','title'=>'Английский язык'],

            ['name'=>'economics','title'=>'Экономика'],
            ['name'=>'law','title'=>'Право'],

            ['name'=>'astronomy','title'=>'Астрономия'],

            ['name'=>'ecology','title'=>'Экология'],

            ['name'=>'logic','title'=>'Логика'],

            ['name'=>'statistics','title'=>'Статистика']

        ];

        foreach ($subjects as $subject) {

            Subject::create($subject);

        }

    }
}