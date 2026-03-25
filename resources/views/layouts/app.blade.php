<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Teacher - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-sidebar {
            background: rgba(30, 41, 59, 0.95);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #6366f1; border-radius: 10px; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

<div class="flex h-screen overflow-hidden">
    
    <aside class="w-80 glass-sidebar text-white flex flex-col transition-all duration-300">
        <div class="p-6 flex items-center space-x-3">
            <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/50">
                <span class="text-2xl font-black">AI</span>
            </div>
            <span class="text-xl font-extrabold tracking-tight">Teacher</span>
        </div>

        <div class="px-6 mb-4">
            <div class="relative group">
                <input type="text" placeholder="Search topic..." 
                    class="w-full bg-slate-800/50 border border-slate-700 rounded-2xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all placeholder-slate-500 group-hover:border-slate-600">
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto custom-scrollbar px-4 space-y-2 pb-10">
            @foreach(\App\Models\Subject::with('topics')->get() as $subject)
                <div x-data="{ open: false }" class="rounded-2xl overflow-hidden transition-all duration-200" :class="open ? 'bg-slate-800/40' : ''">
                    <button @click="open = !open" 
                        class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-slate-700/50 transition-colors group">
                        <div class="flex items-center space-x-3">
                            <span class="text-lg opacity-70 group-hover:opacity-100 transition-opacity">📚</span>
                            <span class="font-semibold text-slate-200 group-hover:text-white">{{ $subject->name }}</span>
                        </div>
                        <svg class="w-4 h-4 transform transition-transform duration-200 opacity-50" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open" x-collapse x-cloak class="bg-slate-900/30">
                        @foreach($subject->topics as $topic)
                            <a href="/subjects/{{ $topic->id }}" 
                                class="block py-2.5 pl-12 pr-4 text-sm text-slate-400 hover:text-indigo-400 hover:bg-indigo-500/10 transition-all border-l-2 border-transparent hover:border-indigo-500">
                                {{ $topic->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </nav>
    </aside>

    <main class="flex-1 overflow-y-auto bg-slate-50 relative">
        <div class="absolute top-0 right-0 -z-10 w-96 h-96 bg-indigo-200/30 blur-3xl rounded-full translate-x-1/2 -translate-y-1/2"></div>
        
        <div class="p-8 max-w-5xl mx-auto">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>