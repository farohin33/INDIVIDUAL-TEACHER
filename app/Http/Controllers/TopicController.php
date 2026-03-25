<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;;

class TopicController extends Controller
{

    public function index()
    {
        $topics = Topic::with('subject')->get();
        return view('topics.index', compact('topics'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('topics.create', compact('subjects'));
    }

   public function store(Request $request)
{

    Topic::create([

        'title' => $request->title,

        'name' => \Str::slug($request->title),

        'subject_id' => $request->subject_id

    ]);

    return redirect('/topics');

}

public function show($id)
{
    // Загружаем тему вместе с уроками
    $topic = Topic::with('lessons')->findOrFail($id);
    
    // Если урока нет, создаем его "на лету" (или вызываем сервис ИИ)
    $lesson = $topic->lessons->first();
    
    if (!$lesson) {
        $lesson = Lesson::create([
            'topic_id' => $topic->id,
            'title' => $topic->title,
            'content' => "Генерация контента для темы " . $topic->title . "... Пожалуйста, подождите."
            // Здесь можно вызвать твой OllamaLessonService для реальной генерации
        ]);
    }

    return view('topics.show', compact('topic', 'lesson'));
}

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        $subjects = Subject::all();

        return view('topics.edit', compact('topic','subjects'));
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);

        $topic->update($request->all());

        return redirect('/topics');
    }

    public function destroy($id)
    {
        Topic::destroy($id);

        return redirect('/topics');
    }

}