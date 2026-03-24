<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;

class OllamaTestService
{

    public function generate($topic)
    {

        $response = Http::post('http://localhost:11434/api/generate', [

            "model" => "llama3",

            "prompt" => "
Create 10 test questions about {$topic->title}.

Format JSON:

[
{
question:'',
a:'',
b:'',
c:'',
d:'',
correct:'a'
}
]
",

            "stream" => false

        ]);

        return $response['response'];

    }

}