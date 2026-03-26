<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject->title }} Topics | AI Teacher</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f8faff; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .topic-card:hover { transform: translateY(-8px); box-shadow: 0 20px 30px -10px rgba(79, 70, 229, 0.15); }
        
        .bg-blob {
            position: fixed; border-radius: 50%; filter: blur(80px); opacity: 0.4; z-index: -1;
            animation: move 20s infinite alternate;
        }
        @keyframes move {
            from { transform: translate(0, 0); }
            to { transform: translate(40px, 40px); }
        }
    </style>
</head>
<body class="antialiased">

    <!-- Декоративные фоновые пятна -->
    <div class="bg-blob w-96 h-96 bg-indigo-200 -top-20 -left-20"></div>
    <div class="bg-blob w-80 h-80 bg-purple-200 bottom-10 right-10" style="animation-delay: -5s;"></div>

    <div class="max-w-7xl mx-auto px-6 py-12">
        
        <!-- Верхняя навигация и заголовок -->
        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-indigo-600 font-bold mb-4 hover:gap-2 transition-all">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Dashboard
                </a>
                <h1 class="text-5xl font-black text-slate-900 tracking-tight italic">
                    {{ $subject->title }} <span class="text-indigo-600">Topics</span>
                </h1>
                <p class="text-slate-500 mt-2 text-lg font-medium">Choose a path to master this subject.</p>
            </div>

            <!-- Улучшенный поиск и кнопка создания -->
            <div class="flex items-center gap-4">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" placeholder="Search topics..." class="pl-12 pr-6 py-4 w-64 glass rounded-2xl outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all font-medium">
                </div>
                <button class="bg-slate-950 text-white px-6 py-4 rounded-2xl font-bold hover:bg-indigo-600 transition-all flex items-center gap-2 active:scale-95 shadow-lg shadow-slate-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Create Topic
                </button>
            </div>
        </div>

        <!-- Сетка тем -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($subject->topics as $index => $topic)
                <div class="glass p-8 rounded-[2.5rem] topic-card transition-all duration-300 relative group overflow-hidden flex flex-col justify-between min-h-[320px]">
                    <!-- Декор на фоне карточки -->
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-50 rounded-full blur-2xl group-hover:bg-indigo-100 transition-colors"></div>
                    
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                                📚
                            </div>
                            <span class="text-xs font-black uppercase tracking-widest text-slate-400">01 / {{ str_pad($loop->remaining + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        
                        <h3 class="text-2xl font-black text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors capitalize">
                            {{ $topic->title }}
                        </h3>
                        <p class="text-slate-500 font-medium line-clamp-2">
                            Dive deep into the world of {{ $topic->title }}. Master concepts with AI-generated notes.
                        </p>
                    </div>

                    <div class="mt-8 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200"></div>
                                <div class="w-8 h-8 rounded-full border-2 border-white bg-indigo-200"></div>
                                <div class="flex items-center justify-center w-8 h-8 rounded-full border-2 border-white bg-slate-100 text-[10px] font-bold">+12</div>
                            </div>
                            <span class="text-sm font-bold text-slate-400 italic">4 Lessons</span>
                        </div>

                        <!-- Кнопка перехода -->
                        <a href="{{ route('topics.show', $topic->id) }}" class="flex items-center justify-center w-full py-4 bg-white border border-slate-100 rounded-2xl font-bold text-slate-900 group-hover:bg-indigo-600 group-hover:text-white group-hover:border-indigo-600 transition-all shadow-sm">
                            Explore Lessons
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full glass p-20 rounded-[3rem] text-center">
                    <p class="text-2xl font-bold text-slate-400">No topics found yet. Be the first to create one!</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>