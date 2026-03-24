@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">

{{$subject->title}} Topics

</h1>


<div class="flex mb-6">

<form method="GET" class="mr-4">

<input type="text"

name="search"

placeholder="Search topic..."

class="border p-2 rounded">

<button class="bg-gray-800 text-white px-4 py-2 rounded">

Search

</button>

</form>


<a href="/topics/create">

<button class="bg-indigo-600 text-white px-4 py-2 rounded">

+ Create Topic

</button>

</a>

</div>


<div class="grid grid-cols-3 gap-6">

@foreach($topics as $topic)

<a href="/lesson/{{$topic->id}}">

<div class="bg-white p-6 rounded shadow hover:shadow-lg">

<h2 class="font-bold text-lg">

{{$topic->title}}

</h2>

</div>

</a>

@endforeach

</div>

@endsection