@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 py-10 px-4">
    <div class="max-w-3xl mx-auto">
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-200">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8">
                <h1 class="text-3xl font-bold text-white tracking-tight italic">
                    {{ $lesson->title }}
                </h1>
                <p class="text-blue-100 mt-2 text-sm uppercase tracking-widest">AI-Generated Study Note</p>
            </div>

            <div class="p-8">
                <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed font-medium">
                    {!! nl2br(e($lesson->content)) !!}
                </div>

               <div class="mt-10 pt-6 border-t border-slate-100 flex justify-between items-center">
    <a href="{{ route('subjects.index') }}" class="text-slate-500 hover:text-indigo-600 font-semibold transition">
        ← Back to Topics
    </a>
    
    <a href="{{ route('lesson.test', $lesson->id) }}" 
       onclick="this.innerHTML='Generating Quiz...'; this.classList.add('opacity-50');"
       class="bg-indigo-600 text-white px-8 py-3 rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 flex items-center font-bold">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="Path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
        </svg>
        Take Interactive Test
    </a>
</div>
            </div>
        </div>
    </div>
</div>
@endsection