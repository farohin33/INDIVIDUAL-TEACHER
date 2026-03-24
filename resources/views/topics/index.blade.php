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
    <div class="topic-item mb-4 p-4 border rounded">
        <h3 class="font-bold text-lg">{{ $topic->name }}</h3>
        <p class="text-sm text-gray-600">{{ $topic->description }}</p>
        
        <a href="{{ route('lesson.generate', $topic->id) }}" 
   onclick="this.innerHTML='Генерирую...'; this.style.opacity='0.5'; this.style.pointerEvents='none';"
   class="bg-indigo-600 text-white px-4 py-2 rounded">
   Сгенерировать урок
</a>
    </div>
@endforeach
@if(session('error'))
    <div style="background: red; color: white; padding: 10px;">
        {{ session('error') }}
    </div>
@endif
</div>

@endsection