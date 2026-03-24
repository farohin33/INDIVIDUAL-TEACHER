<?php

namespace App\Services\AI;

use OpenAI;

class TestGeneratorService
{
    public function generate($topic)
    {

        try {

            $client = OpenAI::client(env('OPENAI_API_KEY'));

            $prompt = "
Generate a school test with 10 questions about {$topic->title}.

Format JSON:

[
{
question: '',
a: '',
b: '',
c: '',
d: '',
correct: 'a'
}
]

Only JSON.
";

            $response = $client->chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ]
                ]
            ]);

            $text = $response->choices[0]->message->content;

            $questions = json_decode($text, true);

            if(!$questions){
                return [];
            }

            return $questions;

        } catch (\Exception $e) {

            // если OpenAI упал — сайт не падает
            return [
                [
                    "question" => "AI temporary unavailable",
                    "a" => "Retry later",
                    "b" => "Retry later",
                    "c" => "Retry later",
                    "d" => "Retry later",
                    "correct" => "a"
                ]
            ];

        }

    }
}