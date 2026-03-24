@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
Test
</h1>

<form method="POST" action="/test/submit">

@csrf

@foreach($questions as $question)

<div class="bg-white p-6 rounded shadow mb-6">

<p class="font-bold mb-4">
{{$question->question}}
</p>

<label>
<input type="radio" name="answers[{{$question->id}}]" value="a">
{{$question->a}}
</label><br>

<label>
<input type="radio" name="answers[{{$question->id}}]" value="b">
{{$question->b}}
</label><br>

<label>
<input type="radio" name="answers[{{$question->id}}]" value="c">
{{$question->c}}
</label><br>

<label>
<input type="radio" name="answers[{{$question->id}}]" value="d">
{{$question->d}}
</label>

</div>

@endforeach

<button class="bg-green-600 text-white px-6 py-3 rounded">

Submit Test

</button>

</form>

@endsection