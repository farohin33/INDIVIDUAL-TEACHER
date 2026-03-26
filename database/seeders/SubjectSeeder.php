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
            ['name'=>'physics','title'=>'Физика'],
            ['name'=>'chemistry','title'=>'Химия'],
            ['name'=>'biology','title'=>'Биология'], 
            ['name'=>'programming','title'=>'Программирование'],

         

        ];

        foreach ($subjects as $subject) {

            Subject::create($subject);

        }

    }
}