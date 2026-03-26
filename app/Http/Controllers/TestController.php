<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

use App\Models\Test;
use App\Models\Topic;
use App\Models\Question;
use App\Services\AI\TestGeneratorService;
use Illuminate\Http\Request;
class TestController extends Controller
{

 public function generate($topicId)
{

    $topic = Topic::findOrFail($topicId);

    $ai = new TestGeneratorService();

    $questions = $ai->generate($topic);

    return view('test.start', compact('topic','questions'));

}

public function show($id) {
    $test = Test::findOrFail($id);
    
    // Декодируем JSON из базы
    $questions = json_decode($test->questions_data, true);

    // Если данных нет, возвращаем ошибку красиво
    if (!$questions || count($questions) === 0) {
        return view('tests.show', ['error' => 'Quiz data is missing or corrupted.']);
    }

    return view('tests.show', compact('test', 'questions'));
}public function store(Request $request)
{
    // Загружаем тему с уроками
    $topic = Topic::with('lessons')->findOrFail($request->topic_id);
    
    // Получаем ID урока (если его нет — создаем пустой, чтобы не упала БД)
    $lesson = $topic->lessons->first() ?: \App\Models\Lesson::create([
        'topic_id' => $topic->id,
        'title' => $topic->title,
        'content' => 'Default content'
    ]);

    // Генерируем вопросы через наш новый сервис
    $generator = new \App\Services\AI\TestGeneratorService();
    $jsonQuestions = $generator->generate($topic);

    // Создаем запись в таблице tests
    $test = \App\Models\Test::create([
        'topic_id'       => $topic->id,
        'lesson_id'      => $lesson->id,
        'user_id'        => auth()->id() ?? 1,
        'questions_data' => $jsonQuestions, // Здесь теперь всегда валидный JSON
    ]);

    return redirect()->route('tests.show', $test->id);
}
}