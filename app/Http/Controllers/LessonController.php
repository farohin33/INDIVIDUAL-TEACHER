<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Lesson;
use App\Services\AI\LessonGeneratorService;
use App\Services\AI\OllamaLessonService;

class LessonController extends Controller
{

public function show($topicId)
{

$topic = Topic::findOrFail($topicId);

$ai = new OllamaLessonService();

$lesson = $ai->generate($topic);

return view('lesson.show',compact('lesson'));

}

}