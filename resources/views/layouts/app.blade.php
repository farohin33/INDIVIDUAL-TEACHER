<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Teacher - Smart Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        .sidebar-glass {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(12px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }
        .custom-scroll::-webkit-scrollbar { width: 5px; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #4f46e5; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 overflow-hidden" x-data="{ search: '' }">

<div class="flex h-screen">
    
    <aside class="w-80 sidebar-glass text-slate-300 flex flex-col z-50">
        <div class="p-8">
            <div class="flex items-center space-x-3 group cursor-pointer">
                <div class="w-11 h-11 bg-gradient-to-tr from-indigo-600 to-violet-500 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20 group-hover:scale-105 transition-transform">
                    <span class="text-white text-xl font-bold">AIT</span>
                </div>
                <div>
                    <h1 class="text-white font-extrabold text-lg tracking-tight leading-none">AI Teacher</h1>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mt-1">LMS Platform v2.0</p>
                </div>
            </div>
        </div>

        <div class="px-6 mb-6">
            <div class="relative group">
                <span class="absolute inset-y-0 left-4 flex items-center text-slate-500 group-focus-within:text-indigo-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <input x-model="search" type="text" placeholder="Quick search..." 
                    class="w-full bg-slate-800/40 border border-slate-700/50 rounded-2xl py-3 pl-11 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all placeholder-slate-600 text-white">
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto custom-scroll px-4 pb-10 space-y-2">
            @foreach(\App\Models\Subject::with('topics')->get() as $subject)
            <div x-data="{ open: false }" 
                 x-show="search === '' || '{{ strtolower($subject->name) }}'.includes(search.toLowerCase())"
                 class="rounded-2xl transition-all"
                 :class="open ? 'bg-indigo-500/5 ring-1 ring-white/5' : ''">
                
                <button @click="open = !open" 
                    class="w-full flex items-center justify-between px-4 py-3 hover:bg-white/5 rounded-2xl transition-all group">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-lg group-hover:bg-indigo-500 transition-colors">
                            📚
                        </div>
                        <span class="font-semibold text-sm tracking-wide group-hover:text-white">{{ $subject->name }}</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform duration-300 opacity-40" :class="open ? 'rotate-180 opacity-100 text-indigo-400' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open" x-collapse x-cloak class="mt-1 pb-2">
                    @foreach($subject->topics as $topic)
                    <a href="{{ route('topics.show', $topic->id) }}" 
                       class="flex items-center space-x-3 py-2.5 pl-12 pr-4 text-[13px] text-slate-400 hover:text-white hover:bg-indigo-500/10 transition-all border-l-2 border-transparent hover:border-indigo-500">
                        <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
                        <span class="truncate">{{ $topic->title }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </nav>
    </aside>

    <main class="flex-1 overflow-y-auto relative bg-[#f8fafc]">
        <div class="fixed top-0 right-0 -z-10 w-[500px] h-[500px] bg-indigo-100/50 blur-[120px] rounded-full translate-x-1/2 -translate-y-1/2"></div>
        <div class="fixed bottom-0 left-0 -z-10 w-[400px] h-[400px] bg-violet-100/40 blur-[100px] rounded-full -translate-x-1/2 translate-y-1/2"></div>

        <div class="p-10 max-w-6xl mx-auto">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>