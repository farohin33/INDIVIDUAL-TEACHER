<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run(): void
    {

        $topics = [

            ['subject_id'=>1,'name'=>'natural_numbers','title'=>'Natural Numbers'],
            ['subject_id'=>1,'name'=>'fractions','title'=>'Fractions'],
            ['subject_id'=>1,'name'=>'percentages','title'=>'Percentages'],

            ['subject_id'=>4,'name'=>'motion','title'=>'Motion'],
            ['subject_id'=>4,'name'=>'force','title'=>'Force'],
            ['subject_id'=>4,'name'=>'energy','title'=>'Energy'],

            ['subject_id'=>5,'name'=>'atoms','title'=>'Atoms'],
            ['subject_id'=>5,'name'=>'chemical_reactions','title'=>'Chemical Reactions'],

            ['subject_id'=>6,'name'=>'cells','title'=>'Cells'],
            ['subject_id'=>6,'name'=>'dna','title'=>'DNA'],

            ['subject_id'=>14,'name'=>'algorithms','title'=>'Algorithms'],
            ['subject_id'=>14,'name'=>'variables','title'=>'Variables'],
            ['subject_id'=>14,'name'=>'loops','title'=>'Loops']

        ];

        foreach ($topics as $topic) {

            Topic::create($topic);

        }

    }
}