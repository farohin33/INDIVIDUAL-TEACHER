@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
Create Topic
</h1>

<form method="POST" action="/topics">

@csrf

<input type="text"

name="title"

placeholder="Topic title"

class="border p-2 w-full mb-4">


<select name="subject_id" class="border p-2 w-full mb-4">

@foreach(App\Models\Subject::all() as $subject)

<option value="{{$subject->id}}">

{{$subject->title}}

</option>

@endforeach

</select>

<button class="bg-indigo-600 text-white px-6 py-3 rounded">

Create

</button>

</form>

@endsection