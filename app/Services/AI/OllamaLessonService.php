<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;

class OllamaLessonService
{

    public function generate($topic)
    {

        $response = Http::post('http://localhost:11434/api/generate', [

            "model" => "llama3",

            "prompt" => "Explain the school topic {$topic->title} with examples.",

            "stream" => false

        ]);

        return $response['response'];

    }

}