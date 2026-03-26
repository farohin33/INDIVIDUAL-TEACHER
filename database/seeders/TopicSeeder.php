<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\Subject;
use App\Models\Lesson;

class TopicSeeder extends Seeder
{

   public function run(): void
    {
        // 1. Получаем все существующие предметы из базы
        $subjects = Subject::all();

        foreach ($subjects as $subject) {
            // 2. Для каждого предмета создаем по 30 тем
            for ($i = 1; $i <= 30; $i++) {
                
                // Создаем тему
                $topic = Topic::create([
                    'subject_id' => $subject->id,
                    'name'       => strtolower($subject->name) . "-topic-{$i}",
                    'title'      => "{$subject->title} - Тема №{$i}",
                ]);

                // 3. Сразу создаем к этой теме базовый урок (заглушку)
                // Это нужно, чтобы страница урока не выдавала ошибку "404" или "null"
                Lesson::create([
                    'topic_id' => $topic->id,
                    'title'    => "Введение в тему №{$i} по предмету {$subject->title}",
                    'content'  => "Это автоматически сгенерированное содержание для темы '{$topic->title}'. Нажмите 'Сгенерировать урок', чтобы AI наполнил его знаниями.",
                ]);
            }
        }
    }
}