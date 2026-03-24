@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
Subjects
</h1>

<div class="grid grid-cols-4 gap-6">

@foreach($subjects as $subject)

<a href="/subjects/{{$subject->id}}">

<div class="bg-white p-6 rounded shadow hover:shadow-lg">

<h2 class="text-xl font-bold">

{{$subject->title}}

</h2>

</div>

</a>

@endforeach

</div>

@endsection