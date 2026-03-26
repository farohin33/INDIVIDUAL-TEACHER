@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#020617] text-white p-6 md:p-10 font-sans relative overflow-hidden">
    
    <div class="absolute top-0 right-0 w-[60rem] h-[60rem] bg-indigo-600/10 rounded-full blur-[10rem] -translate-y-1/2 translate-x-1/2 z-0"></div>
    <div class="absolute bottom-0 left-0 w-[50rem] h-[50rem] bg-indigo-500/10 rounded-full blur-[10rem] translate-y-1/2 -translate-x-1/2 z-0"></div>

    <div class="relative z-10">
        <div class="flex items-center justify-between mb-16">
            <div>
                <div class="flex items-center gap-2 text-slate-600 text-[10px] font-black uppercase tracking-[0.3em] italic mb-3">
                    <a href="/dashboard" class="hover:text-indigo-400 transition-colors">Dashboard</a>
                    <span>/</span>
                    <span class="text-slate-400">Mathematics</span>
                </div>
                <h1 class="text-6xl font-black uppercase italic tracking-tighter leading-none">All Topics</h1>
            </div>
            <button class="flex items-center gap-2 px-8 py-4 bg-slate-900 rounded-[1.5rem] border border-slate-800 font-black uppercase italic text-xs tracking-widest hover:border-indigo-500 hover:text-indigo-400 transition-all active:scale-95 shadow-lg">
                <span>➕</span> Create New Topic
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($topics as $topic)
                <div class="group relative bg-slate-950/70 backdrop-blur-sm p-10 rounded-[3rem] border border-slate-900 transition-all hover:border-indigo-500/40 hover:shadow-2xl hover:shadow-indigo-500/10 shadow-lg">
                    
                    <div class="absolute top-0 left-12 right-12 h-[2px] bg-gradient-to-r from-transparent via-indigo-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <div class="flex items-start justify-between mb-6 pb-6 border-b border-slate-900">
                                <span class="text-[11px] font-black text-slate-600 uppercase tracking-widest bg-slate-900 px-4 py-1.5 rounded-full border border-slate-800 group-hover:border-slate-700 transition-colors">
                                    TOPIC #{{ $topic->id ?? $loop->iteration }}
                                </span>
                                <span class="text-3xl opacity-60 group-hover:opacity-100 group-hover:scale-110 transition-all">
                                    {{ $loop->iteration % 2 == 0 ? '📐' : '⚛️' }}
                                </span>
                            </div>

                            <h3 class="text-3xl font-black text-white uppercase italic tracking-tight leading-tight group-hover:text-indigo-400 transition-colors mb-4">
                                {{ $topic->name ?? $topic->title ?? 'Untitled Topic' }}
                            </h3>

                            <p class="text-slate-400 text-base leading-relaxed mb-10 italic line-clamp-3 group-hover:text-slate-200 transition-colors">
                                {{ $topic->description ?? 'Explore the core principles of this mathematical concept with AI assistance.' }}
                            </p>
                        </div>

                        <a href="{{ route('lesson.generate', $topic->id ?? 1) }}" 
                           onclick="this.innerHTML='<span class=\'animate-pulse flex items-center gap-2\'><svg class=\'w-4 h-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'3\' d=\'M13 10V3L4 14h7v7l9-11h-7z\'/></svg>🤖 Generating...</span>'; this.style.opacity='0.7'; this.style.pointerEvents='none';"
                           class="relative overflow-hidden w-full inline-flex items-center justify-center px-6 py-4.5 bg-indigo-600 text-white font-black uppercase italic text-xs tracking-[0.2em] rounded-2xl transition-all hover:bg-indigo-500 hover:scale-[1.03] active:scale-95 shadow-lg shadow-indigo-600/30">
                            
                            <span class="relative z-10 flex items-center gap-2.5">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                Сгенерировать урок
                            </span>

                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full duration-1000 transition-transform"></div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 flex flex-col items-center justify-center p-20 border-2 border-dashed border-slate-800 rounded-[3rem] text-center bg-slate-950/50">
                    <div class="text-9xl mb-8 opacity-40">📝</div>
                    <h3 class="text-3xl font-black uppercase italic mb-5 text-white">Topics List Empty</h3>
                    <p class="text-slate-500 mb-10 max-w-sm italic text-lg leading-relaxed">
                        Похоже, ты только что сделал `migrate:fresh`. Создай первую тему, чтобы ИИ мог начать писать учебные материалы!
                    </p>
                    <button class="px-10 py-5 bg-indigo-600 rounded-2xl font-black uppercase italic transition-all hover:bg-indigo-500">
                        Create First Topic
                    </button>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection