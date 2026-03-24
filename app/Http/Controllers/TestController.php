<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Topic;
use App\Models\Question;
use App\Services\AI\TestGeneratorService;
class TestController extends Controller
{

 public function generate($topicId)
{

    $topic = Topic::findOrFail($topicId);

    $ai = new TestGeneratorService();

    $questions = $ai->generate($topic);

    return view('test.start', compact('topic','questions'));

}

}