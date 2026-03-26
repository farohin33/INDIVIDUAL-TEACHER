<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | AI Teacher</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f4f7ff; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05); }
        
        /* Анимация появления списка */
        .fade-in-up { animation: fadeInUp 0.6s ease-out forwards; opacity: 0; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body x-data="{ sidebarOpen: true }">

    <!-- Боковая панель (Sidebar) -->
    <aside :class="sidebarOpen ? 'w-64' : 'w-20'" class="fixed left-0 top-0 h-screen glass transition-all duration-300 z-50 flex flex-col items-center py-8">
        <div class="mb-10 flex items-center space-x-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold">AI</div>
            <span x-show="sidebarOpen" class="font-bold text-xl tracking-tight">Teacher</span>
        </div>

        <nav class="flex-1 w-full px-4 space-y-4">
            <a href="#" class="flex items-center space-x-4 p-3 rounded-xl bg-indigo-50 text-indigo-600 font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span x-show="sidebarOpen">Dashboard</span>
            </a>
            <a href="#" class="flex items-center space-x-4 p-3 rounded-xl text-slate-400 hover:bg-slate-50 transition-all font-medium">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <span x-show="sidebarOpen">My Subjects</span>
            </a>
            <a href="#" class="flex items-center space-x-4 p-3 rounded-xl text-slate-400 hover:bg-slate-50 transition-all font-medium">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <span x-show="sidebarOpen">Analytics</span>
            </a>
        </nav>

        <form action="{{ route('logout') }}" method="POST" class="w-full px-4">
            @csrf
            <button class="flex items-center space-x-4 p-3 w-full rounded-xl text-red-400 hover:bg-red-50 transition-all font-medium">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span x-show="sidebarOpen">Logout</span>
            </button>
        </form>
    </aside>

    <!-- Основной контент -->
    <main :class="sidebarOpen ? 'ml-64' : 'ml-20'" class="transition-all duration-300 p-8">
        
        <!-- Шапка -->
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-black text-slate-900">Hello, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-slate-500 font-medium">It's a great day to learn something new.</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="w-12 h-12 rounded-2xl glass flex items-center justify-center text-slate-600 hover:text-indigo-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
                <div class="w-12 h-12 rounded-2xl bg-indigo-100 border-2 border-white shadow-sm overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=fff" alt="avatar">
                </div>
            </div>
        </header>

        <!-- Статистика -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="glass p-6 rounded-[2rem] flex items-center space-x-4 fade-in-up" style="animation-delay: 0.1s">
                <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Hours Studied</p>
                    <p class="text-2xl font-black text-slate-900">12.5h</p>
                </div>
            </div>
            <div class="glass p-6 rounded-[2rem] flex items-center space-x-4 fade-in-up" style="animation-delay: 0.2s">
                <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Tests Passed</p>
                    <p class="text-2xl font-black text-slate-900">18</p>
                </div>
            </div>
            <div class="glass p-6 rounded-[2rem] flex items-center space-x-4 fade-in-up" style="animation-delay: 0.3s">
                <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Avg. Score</p>
                    <p class="text-2xl font-black text-slate-900">92%</p>
                </div>
            </div>
        </div>

        <!-- Список предметов (Subjects) -->
        <h2 class="text-2xl font-black text-slate-900 mb-6">Your Subjects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($subjects as $index => $subject)
            <div class="glass p-8 rounded-[2.5rem] card-hover transition-all duration-300 relative overflow-hidden group fade-in-up" 
                 style="animation-delay: {{ 0.4 + ($index * 0.1) }}s">
                
                <div class="flex justify-between items-start mb-6">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        {{ $subject->name == 'Biology' ? '🧬' : '💻' }}
                    </div>
                    <span class="px-4 py-1.5 rounded-full bg-indigo-50 text-indigo-600 text-xs font-bold uppercase tracking-widest">Active</span>
                </div>

                <h3 class="text-2xl font-black text-slate-900 mb-2">{{ $subject->title }}</h3>
                <p class="text-slate-500 mb-8 font-medium">Explore lessons, take quizzes and track your progress in {{ $subject->name }}.</p>

                <div class="space-y-3">
                    <div class="flex justify-between text-sm font-bold">
                        <span class="text-slate-400">Progress</span>
                        <span class="text-indigo-600">65%</span>
                    </div>
                    <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-60