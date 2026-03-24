<?php

namespace App\Services\AI;

class LessonGeneratorService
{

    public function generate($topic)
    {

        $ai = new GrokService();

        $prompt = "
Explain the school topic '{$topic->title}'.

Structure:

1 Explanation
2 Key concepts
3 Examples
4 Summary
";

        return $ai->ask($prompt);

    }

}