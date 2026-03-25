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
    $topic = Topic::with('lessons')->findOrFail($request->topic_id);
    
    // Получаем первый урок
    $lesson = $topic->lessons->first();

    // Если урока нет (например, создали тему вручную), создаем его на лету
    if (!$lesson) {
        $lesson = \App\Models\Lesson::create([
            'topic_id' => $topic->id,
            'title' => "Basic " . $topic->title,
            'content' => "Default lesson content.",
        ]);
    }

    $generator = new \App\Services\AI\TestGeneratorService();
    $jsonQuestions = $generator->generate($topic);

    $test = \App\Models\Test::create([
        'topic_id' => $topic->id,
        'lesson_id' => $lesson->id, // Теперь тут гарантированно будет ID
        'user_id' => auth()->id() ?? 1,
        'questions_data' => $jsonQuestions,
    ]);

    return redirect()->route('tests.show', $test->id);
}
}