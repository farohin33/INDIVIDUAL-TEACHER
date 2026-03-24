<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Models\Question;

class AnswerController extends Controller
{

    public function submit(Request $request)
    {

        $score = 0;

        foreach($request->answers as $questionId => $answer){

            $question = Question::find($questionId);

            $correct = $question->correct == $answer;

            if($correct){
                $score++;
            }

            StudentAnswer::create([

                'user_id'=>auth()->id(),
                'question_id'=>$questionId,
                'answer'=>$answer,
                'is_correct'=>$correct

            ]);

        }

        return view('tests.result',compact('score'));

    }

}