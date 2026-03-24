@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
{{$lesson->title}}
</h1>

<div class="bg-white p-8 rounded shadow mb-6">

{!! nl2br($lesson->content) !!}

</div>

<a href="/lesson/{{$lesson->id}}/test">

<button class="bg-indigo-600 text-white px-6 py-3 rounded">

Take Test

</button>

</a>

@endsection