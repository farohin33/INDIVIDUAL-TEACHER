<?php

namespace App\Services\AI;

use App\Models\Topic;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TestGeneratorService
{
    public function generate(Topic $topic)
    {
        // Четкая инструкция для ИИ, чтобы он не писал лишнего текста
        $prompt = "Generate a quiz for the topic '{$topic->title}' in JSON format. 
        Return an array of 5 objects. Each object must have:
        'question': (string) the text of the question,
        'options': (array of 4 strings) possible answers,
        'correct_answer': (integer) the index of the correct option (0 to 3).
        Return ONLY the raw JSON array. No markdown, no explanations.";

        try {
            // Запрос к Ollama (убедись, что сервис запущен)
            $response = Http::timeout(60)->post('http://localhost:11434/api/generate', [
                'model'  => 'llama3', // или твоя модель (mistral, grok)
                'prompt' => $prompt,
                'stream' => false,
                'format' => 'json', // Критически важно для Ollama
            ]);

            if ($response->successful()) {
                $result = $response->json();
                $quizContent = $result['response'] ?? null;

                // Проверяем, что ИИ прислал валидный JSON
                if ($quizContent && $this->isValidQuizJson($quizContent)) {
                    return $quizContent;
                }
            }
        } catch (\Exception $e) {
            Log::error("AI Test Gen Error: " . $e->getMessage());
        }

        // РЕЗЕРВНЫЙ ВАРИАНТ (Fallback), чтобы база не выдавала ошибку null
        return json_encode($this->getFallbackQuestions($topic));
    }

    private function isValidQuizJson($jsonString)
    {
        $data = json_decode($jsonString, true);
        if (!is_array($data) || empty($data)) return false;
        
        // Проверяем структуру первого вопроса
        $first = $data[0];
        return isset($first['question'], $first['options'], $first['correct_answer']);
    }

    private function getFallbackQuestions(Topic $topic)
    {
        return [
            [
                'question' => "What is the primary focus of {$topic->title}?",
                'options' => ["Option A", "Option B", "Option C", "Option D"],
                'correct_answer' => 0
            ],
            [
                'question' => "Which of the following relates to {$topic->title}?",
                'options' => ["Factor 1", "Factor 2", "Factor 3", "Factor 4"],
                'correct_answer' => 1
            ]
        ];
    }
}