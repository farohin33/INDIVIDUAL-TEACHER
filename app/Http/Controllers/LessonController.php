<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Lesson;
use App\Services\AI\LessonGeneratorService;

class LessonController extends Controller
{

   public function show($topicId)
{

    $topic = Topic::findOrFail($topicId);

    $lesson = Lesson::where('topic_id',$topic->id)->first();

    if(!$lesson){

        $ai = new LessonGeneratorService();

        $content = $ai->generate($topic);

        $lesson = Lesson::create([
            'topic_id'=>$topic->id,
            'title'=>$topic->title,
            'content'=>$content
        ]);

    }

    return view('lesson.show',compact('lesson'));

}

}