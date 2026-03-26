<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
 public function run(): void
{
    $topics = [
        ['subject' => 'Informatics', 'name' => 'algorithms', 'title' => 'Algorithms'],
        ['subject' => 'Informatics', 'name' => 'variables', 'title' => 'Variables'],
        ['subject' => 'Informatics', 'name' => 'loops', 'title' => 'Loops'],
        ['subject' => 'Biology', 'name' => 'cells', 'title' => 'Cells'],
        ['subject' => 'Biology', 'name' => 'dna', 'title' => 'DNA'],
    ];

    foreach ($topics as $data) {
        // Ищем предмет. Если его нет — создаем, заполняя и name, и title
        $subject = \App\Models\Subject::firstOrCreate(
            ['name' => $data['subject']], // По этому полю ищем
            ['title' => $data['subject']] // Это добавим при создании
        );

        // 1. Создаем тему
        $topic = \App\Models\Topic::create([
            'subject_id' => $subject->id,
            'name' => $data['name'],
            'title' => $data['title'],
        ]);

        // 2. Создаем урок, чтобы не было пустого экрана
        \App\Models\Lesson::create([
            'topic_id' => $topic->id,
            'title' => "Mastering " . $topic->title,
            'content' => "Welcome to the study material for " . $topic->title . ". Read it carefully before starting the quiz.",
        ]);
    }
}}