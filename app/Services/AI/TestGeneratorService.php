<?php

namespace App\Services\AI;

use App\Models\Topic;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TestGeneratorService
{
    /**
     * Генерирует вопросы через Ollama или другой AI API
     */
    public function generate(Topic $topic)
    {
        $prompt = "Generate a JSON array of 5 multiple-choice questions about '{$topic->title}'. 
        Each object must have: 
        'question' (string), 
        'options' (array of 4 strings), 
        'correct_answer' (integer, index 0-3).
        Return ONLY the raw JSON array, no markdown, no explanations.";

        try {
            // Замени URL на свой (например, если используешь Ollama локально)
            $response = Http::timeout(30)->post('http://localhost:11434/api/generate', [
                'model' => 'llama3', // или 'grok'/'mistral'
                'prompt' => $prompt,
                'stream' => false,
                'format' => 'json', // Заставляем ИИ отдавать только JSON
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $quizContent = $data['response'] ?? $data['content'];

                // Проверяем, что это валидный JSON, прежде чем отдавать контроллеру
                if ($this->isValidJson($quizContent)) {
                    return $quizContent;
                }
            }
        } catch (\Exception $e) {
            Log::error("AI Generation Error: " . $e->getMessage());
        }

        // РЕЗЕРВНЫЙ ВАРИАНТ: Если ИИ упал, отдаем шаблон, чтобы не было ошибки "Missing data"
        return json_encode($this->getFallbackQuestions($topic));
    }

    private function isValidJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    private function getFallbackQuestions(Topic $topic) {
        return [
            [
                'question' => "What is the main concept of {$topic->title}?",
                'options' => ["Option A", "Option B", "Option C", "Option D"],
                'correct_answer' => 0
            ],
            // Можно добавить еще пару базовых вопросов
        ];
    }
}