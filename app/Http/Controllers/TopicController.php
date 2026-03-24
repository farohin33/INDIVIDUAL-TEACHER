<?php

namespace App\Http\Controllers;

use App\Models\Topic;
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
        $topic = Topic::findOrFail($id);
        return view('topics.show', compact('topic'));
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