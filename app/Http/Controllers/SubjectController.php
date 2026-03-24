<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Topic;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        Subject::create($request->all());
        return redirect('/subjects');
    }

 public function show(Request $request,$id)
{

$subject = Subject::findOrFail($id);

$query = Topic::where('subject_id',$id);

if($request->search){

$query->where('title','LIKE','%'.$request->search.'%');

}

$topics = $query->get();

return view('topics.index',compact('topics','subject'));

}

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

        return redirect('/subjects');
    }

    public function destroy($id)
    {
        Subject::destroy($id);
        return redirect('/subjects');
    }

}