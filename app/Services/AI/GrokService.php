<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;

class GrokService
{
    // Адрес локальной Ollama
    private $url = "http://localhost:11434/api/chat";

    public function ask($prompt)
    {
        // Увеличиваем таймаут до 60 секунд (для быстрой модели этого за глаза)
        $response = Http::timeout(60)->post($this->url, [
            'model' => 'llama3.2:1b', 
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
            'stream' => false,
            'options' => [
                'temperature' => 0.1, // Минимум креатива = максимум скорости
                'num_predict' => 500,  // Ограничиваем длину, чтобы не ждать долго
                'num_thread' => 4      // Используем 4 ядра процессора
            ],
        ]);

        if ($response->successful()) {
            return $response->json()['message']['content'];
        }

        throw new \Exception("Ollama не отвечает. Проверь, запущен ли сервис.");
    }
}