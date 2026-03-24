<?php

namespace App\Services\AI;

use OpenAI;

class LessonGeneratorService
{

    public function generate($topic)
    {

        $client = OpenAI::client(config('services.openai.key'));

        $prompt = "
Explain the topic '{$topic->title}' for a school student.

Structure:

1. Simple explanation
2. Key ideas
3. Examples
4. Summary
";

        $response = $client->chat()->create([
            'model' => 'gpt-4.1-mini',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt
                ]
            ]
        ]);

        return $response->choices[0]->message->content;

    }

}