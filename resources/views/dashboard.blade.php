<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Dashboard | AI Teacher</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f8faff; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 20px 30px -10px rgba(79, 70, 229, 0.15); }
        
        .bg-blob {
            position: fixed; border-radius: 50%; filter: blur(80px); opacity: 0.4; z-index: -1;
            animation: move 20s infinite alternate;
        }
        @keyframes move { from { transform: translate(0, 0); } to { transform: translate(40px, 40px); } }

        .fade-in { animation: fadeIn 0.5s ease-out forwards; opacity: 0; }
        @keyframes fadeIn { to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="antialiased">

    <!-- Фоновые эффекты -->
    <div class="bg-blob w-96 h-96 bg-indigo-200 -top-20 -left-20"></div>
    <div class="bg-blob w-80 h-80 bg-purple-200 bottom-10 right-10" style="animation-delay: -5s;"></div>

    <div class="max-w-7xl mx-auto px-6 py-12">
        
        <!-- Header -->
        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6 fade-in">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-black italic shadow-lg shadow-indigo-200">AI</div>
                    <span class="font-bold text-slate-400 uppercase tracking-widest text-sm">Student Portal</span>
                </div>
                <h1 class="text-5xl font-extrabold text-slate-900 tracking-tight">
                    Learning <span class="text-indigo-600 italic">Dashboard</span>
                </h1>
                <p class="text-slate-500 mt-2 text-lg font-medium italic">Welcome back! Pick a subject and continue your journey.</p>
            </div>

            <div class="flex items-center gap-4">
                <button class="glass p-4 rounded-2xl text-slate-400 hover:text-indigo-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
                <div class="flex items-center gap-3 glass py-2 pl-2 pr-5 rounded-2xl">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=fff" class="w-10 h-10 rounded-xl shadow-sm">
                    <span class="font-bold text-slate-700">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>

        <!-- Сетка предметов -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($subjects as $index => $subject)
                <div class="glass p-8 rounded-[2.5rem] card-hover transition-all duration-300 relative group flex flex-col justify-between min-h-[300px] fade-in" 
                     style="animation-delay: {{ $index * 0.1 }}s">
                    
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">
                                {{-- Простая логика иконок по названию --}}
                                @if(Str::contains(strtolower($subject->title), 'math')) 📐 
                                @elseif(Str::contains(strtolower($subject->title), 'physics')) ⚡ 
                                @elseif(Str::contains(strtolower($subject->title), 'inform')) 💻 
                                @else 📚 @endif
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-[10px] font-black uppercase tracking-widest text-slate-300">Level 1</span>
                                <span class="text-indigo-600 font-bold text-xs">Active</span>
                            </div>
                        </div>
                        
                        <h3 class="text-2xl font-black text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors uppercase italic">
                            {{ $subject->title }}
                        </h3>
                        <p class="text-slate-500 font-medium leading-relaxed">
                            Master the fundamentals of {{ $subject->title }} with our AI-powered courses and interactive tests.
                        </p>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('subjects.show', $subject->id) }}" class="flex items-center justify-center w-full py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-indigo-600 transition-all shadow-lg active:scale-95 group">
                            Open Subject
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full glass p-20 rounded-[3rem] text-center fade-in">
                    <p class="text-2xl font-bold text-slate-400 italic underline decoration-indigo-500 decoration-4">No subjects found in database.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>