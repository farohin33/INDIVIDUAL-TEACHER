<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;

class TestGeneratorService
{
public function generate($lessonContent)
{
    $prompt = "Context: '{$lessonContent}'. 
    Create a 3-question MCQ quiz in English. 
    Return ONLY a raw JSON array. No conversational text.
    Format: [{\"question\":\"text\",\"options\":[\"a\",\"b\",\"c\",\"d\"],\"answer\":\"correct_text\"}]";

    // Увеличиваем timeout до 100 секунд, чтобы не было ошибки 30s
    $response = Http::timeout(100)->post("http://localhost:11434/api/chat", [
        'model' => 'llama3.2:1b',
        'messages' => [['role' => 'user', 'content' => $prompt]],
        'stream' => false,
        'options' => ['temperature' => 0.1] 
    ]);

    $content = $response->json()['message']['content'] ?? '';
    
    // Чистим JSON от лишних знаков ```json ... ```
    $cleanJson = preg_replace('/^```json|```$/m', '', $content);
    
    return json_decode(trim($cleanJson), true);
}
}