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
    
   <a href="{{ route('lesson.generate', $topic->id ?? 1) }}" 
                           onclick="this.innerHTML='<span class=\'animate-pulse flex items-center gap-2\'><svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'3\' d=\'M13 10V3L4 14h7v7l9-11h-7z\'/></svg>🤖 Generating...</span>'; this.style.opacity='0.7'; this.style.pointerEvents='none';"
                           class="relative overflow-hidden w-full inline-flex items-center justify-center px-6 py-4.5 bg-indigo-600 text-white font-black uppercase italic text-xs tracking-[0.2em] rounded-2xl transition-all hover:bg-indigo-500 hover:scale-[1.03] active:scale-95 shadow-lg shadow-indigo-600/30">
                            
                            <span class="relative z-10 flex items-center gap-2.5">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                Generate a lesson
                            </span>

                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full duration-1000 transition-transform"></div>
                        </a>
</div>
            </div>
        </div>
    </div>
</div>
@endsection