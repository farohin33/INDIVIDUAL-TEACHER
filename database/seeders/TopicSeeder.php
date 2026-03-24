<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        // Список предметов и их категорий
        $data = [
            'Math' => ['Algebra', 'Geometry', 'Calculus', 'Statistics', 'Trigonometry'],
            'Physics' => ['Mechanics', 'Thermodynamics', 'Electromagnetism', 'Optics', 'Quantum Physics'],
            'Informatics' => ['Programming', 'Databases', 'Networking', 'Cybersecurity', 'AI'],
            'Chemistry' => ['Organic', 'Inorganic', 'Biochemistry', 'Analytical Chemistry'],
            'Biology' => ['Genetics', 'Botany', 'Zoology', 'Microbiology', 'Ecology'],
            'History' => ['Ancient World', 'Middle Ages', 'Renaissance', 'World Wars'],
            'Geography' => ['Geology', 'Climatology', 'Demographics', 'Cartography'],
            'Literature' => ['Classical Era', 'Modernism', 'Poetry', 'Drama'],
            'English' => ['Grammar', 'Vocabulary', 'Business English'],
            'Economics' => ['Microeconomics', 'Macroeconomics', 'Finance'],
        ];

        foreach ($data as $subjectName => $categories) {
            // 1. Создаем или находим предмет
            // ВАЖНО: Убедись, что в модели Subject есть fillable для 'title' и 'name'
            $subject = Subject::firstOrCreate(
                ['name' => $subjectName],
                ['title' => $subjectName, 'slug' => Str::slug($subjectName)]
            );

            $this->command->info("Seeding $subjectName with 70+ topics...");

            // 2. Генерируем по 70 тем для каждого предмета
            for ($i = 1; $i <= 70; $i++) {
                $category = $categories[array_rand($categories)];
                $title = $category . " Part " . $i . ": " . $faker->sentence(3);

                Lesson::create([
                    // ИСПОЛЬЗУЕМ topic_id, так как твоя миграция требует его
                    // Скорее всего, у тебя в структуре 'topic' это и есть 'subject'
                    'topic_id' => $subject->id, 
                    'title' => rtrim($title, '.'),
                    'content' => $faker->paragraphs(4, true) . "\n\nKey Concept: " . $faker->sentence(10),
                ]);
            }
        }
    }
}