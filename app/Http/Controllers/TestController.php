<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Test;
use App\Models\Question;
use App\Services\AI\TestGeneratorService;
class TestController extends Controller
{

  public function start($lessonId)
{

    $lesson = Lesson::findOrFail($lessonId);

    $test = Test::where('lesson_id',$lesson->id)->first();

    if(!$test){

        $test = app(TestGeneratorService::class)
        ->generate($lesson);

    }

    $questions = $test->questions;

    return view('tests.start',compact('test','questions'));

}

}