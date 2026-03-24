<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;

class TestGeneratorService
{
    public function generate($lessonContent)
    {
        $prompt = "Context: '{$lessonContent}'. 
        Create a 3-question MCQ quiz in English. 
        Return ONLY a JSON array. No text before or after.
        Format: [{\"question\":\"...\",\"options\":[\"...\"],\"answer\":\"...\"}]";

        // Ставим таймаут для HTTP запроса на 100 секунд
        $response = Http::timeout(100)->post("http://localhost:11434/api/chat", [
            'model' => 'llama3.2:1b', // Самая быстрая модель
            'messages' => [['role' => 'user', 'content' => $prompt]],
            'stream' => false,
        ]);

        $content = $response->json()['message']['content'];
        
        // Убираем возможные лишние символы ```json ... ```
        $cleanJson = preg_replace('/^```json|```$/m', '', $content);
        
        return json_decode(trim($cleanJson), true);
    }
}