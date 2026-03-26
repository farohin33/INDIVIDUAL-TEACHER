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
        
       <form action="{{ route('topics.generate_content', $topic->id) }}" method="POST">
    @csrf
    <button type="submit" 
        onclick="this.disabled=true; this.innerHTML='<span class=\'animate-pulse\'>✨ Generating Lesson...</span>'; this.form.submit();"
        class="relative group inline-flex items-center px-8 py-4 bg-indigo-600 text-white font-bold rounded-2xl shadow-lg shadow-indigo-500/20 hover:scale-105 transition-all active:scale-95">
        <span class="relative z-10 flex items-center">
            {{-- Иконка книги вместо молнии --}}
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.254 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            Generate AI Lesson
        </span>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
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