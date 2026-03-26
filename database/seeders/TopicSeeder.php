<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        // Списки реальных тем для твоих предметов
     $data = [
    'math' => [
        'Derivatives', 'Integrals', 'Trigonometry', 'Logarithms', 'Matrices',
        'Vectors', 'Probability Theory', 'Statistics', 'Limits', 'Fourier Series'
    ],
    'physics' => [
        'Kinematics', 'Dynamics', 'Thermodynamics', 'Optics', 'Quantum Physics',
        'Electricity', 'Magnetism', 'Nuclear Physics', 'Statics', 'Waves'
    ],
    'biology' => [
        'Cytology (Cells)', 'Genetics', 'Evolution', 'Botany', 'Zoology',
        'Anatomy', 'Ecology', 'Photosynthesis', 'DNA and RNA', 'Virology'
    ],
    'programming' => [
        'Variables', 'Loops', 'Functions', 'OOP', 'Arrays',
        'Recursion', 'Search Algorithms', 'Data Structures', 'API', 'Databases'
    ],
    'informatics' => [
        'Number Systems', 'Logic', 'Computer Architecture', 'Networks', 'Encryption',
        'Excel and Tables', 'Algorithmization', 'Cloud Computing', 'Cybersecurity', 'AI'
    ],
    'chemistry' => [
        'Periodic Table', 'Organic Chemistry', 'Acids and Bases', 'Solutions',
        'Electrolysis', 'Thermochemistry', 'Polymers', 'Gases', 'Oxidation', 'Proteins'
    ]
];

        $subjects = Subject::all();

      foreach ($data as $subjectName => $topics) {
        // Находим или создаем предмет
        $subject = \App\Models\Subject::firstOrCreate(['name' => $subjectName],['title' => $subjectName]);

        foreach ($topics as $topicName) {
            \App\Models\Topic::create([
                'subject_id' => $subject->id,
                'title' => $topicName, // Убедись, что в базе колонка называется title или name

                'name' => $topicName, // Контент будет пустой, пока не нажмешь "Generate"
            ]);
        }
    }
    }
}