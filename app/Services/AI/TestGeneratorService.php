<?php

namespace App\Services\AI;

class TestGeneratorService
{

    public function generate($topic)
    {

        $ai = new GrokService();

        $prompt = "
Create 10 test questions about '{$topic->title}'.

Return JSON:

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
";

        $response = $ai->ask($prompt);

        return json_decode($response, true);

    }

}