@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
    
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <nav class="flex text-sm text-slate-400 mb-2 space-x-2">
                <a href="#" class="hover:text-indigo-600 transition-colors">Subjects</a>
                <span>/</span>
                <span class="text-indigo-600 font-medium">{{ $topic->subject->name ?? 'Subject' }}</span>
            </nav>
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight">
                {{ $topic->title }}
            </h1>
        </div>
        
        <form action="{{ route('tests.store') }}" method="POST">
            @csrf
            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
            <button type="submit" class="relative group inline-flex items-center px-8 py-4 bg-indigo-600 text-white font-bold rounded-2xl shadow-xl shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all active:scale-95 overflow-hidden">
                <span class="relative z-10 flex items-center">
                    <svg class="w-5 h-5 mr-2 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                    Generate Smart Quiz
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
            </button>
        </form>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
        <div class="h-3 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
        
        <div class="p-8 md:p-12">
            <div class="flex items-center space-x-6 mb-8 pb-8 border-border border-b border-slate-100">
                <div class="flex items-center text-slate-500 text-sm font-medium">
                    <span class="p-2 bg-slate-50 rounded-lg mr-2">⏱️</span>
                    15 min read
                </div>
                <div class="flex items-center text-slate-500 text-sm font-medium">
                    <span class="p-2 bg-slate-50 rounded-lg mr-2">🎓</span>
                    Foundation Level
                </div>
            </div>

            <div class="prose prose-slate lg:prose-xl max-w-none prose-headings:font-black prose-headings:tracking-tight prose-p:leading-relaxed prose-p:text-slate-600 prose-strong:text-indigo-600">
                @if($topic->content)
                    {!! nl2br(e($topic->content)) !!}
                @else
                    <div class="py-20 text-center">
                        <div class="inline-flex p-6 bg-amber-50 rounded-full mb-4">
                            <svg class="w-12 h-12 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800">Content Missing</h3>
                        <p class="text-slate-500">The study material for this topic is currently being prepared by AI.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="flex justify-between items-center py-6 px-2">
        <button onclick="history.back()" class="text-slate-400 hover:text-indigo-600 font-semibold flex items-center transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Topics
        </button>
        <div class="flex space-x-2">
            <div class="w-2 h-2 rounded-full bg-indigo-600"></div>
            <div class="w-2 h-2 rounded-full bg-indigo-200"></div>
            <div class="w-2 h-2 rounded-full bg-indigo-100"></div>
        </div>
    </div>
</div>

<style>
    @keyframes shimmer {
        100% { transform: translateX(100%); }
    }
</style>
@endsection