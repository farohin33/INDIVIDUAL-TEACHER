<?php

namespace App\Services\AI;

use OpenAI;

class ErrorExplanationService
{

    public function explain($question,$correct,$studentAnswer)
    {

        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $prompt = "

        Student answered wrong.

        Question: {$question}

        Student answer: {$studentAnswer}

        Correct answer: {$correct}

        Explain why the correct answer is right.
        Explain simply like a teacher.

        ";

        $response = $client->chat()->create([

            'model'=>'gpt-4o-mini',

            'messages'=>[
                ['role'=>'user','content'=>$prompt]
            ]

        ]);

        return $response->choices[0]->message->content;

    }

}