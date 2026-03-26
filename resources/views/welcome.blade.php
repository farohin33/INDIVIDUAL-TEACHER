<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Teacher - Smart Education Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
        [x-cloak] { display: none !important; }

        /* Мягкие анимированные пятна на фоне */
        .bg-blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(70px);
            opacity: 0.5;
            z-index: -1;
            animation: blob-bounce 20s infinite alternate;
        }
        @keyframes blob-bounce {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(50px, -80px) scale(1.1); }
            100% { transform: translate(-30px, 30px) scale(0.9); }
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
        }
        input:focus { transform: translateY(-1px); }
    </style>
</head>
<body class="bg-[#f8faff] text-slate-900" x-data="{ formState: '{{ $errors->has('name') ? 'register' : 'login' }}' }">

    <!-- Фоновые элементы -->
    <div class="bg-blob w-[500px] h-[500px] bg-indigo-200 top-[-10%] left-[-10%]"></div>
    <div class="bg-blob w-[400px] h-[400px] bg-purple-200 bottom-[-10%] right-[-5%]" style="animation-delay: -5s;"></div>

    <div class="min-h-screen flex items-center justify-center p-6 md:p-12">
        <div class="max-w-7xl w-full grid lg:grid-cols-2 gap-16 items-center">
            
            <!-- Левая колонка: Текст -->
            <div class="hidden lg:block space-y-8 animate-in fade-in slide-in-from-left duration-1000">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200">
                        <span class="text-white text-2xl font-black italic">AI</span>
                    </div>
                    <span class="text-2xl font-black tracking-tight">Teacher <span class="text-indigo-600 text-sm font-bold">v2.0</span></span>
                </div>
                
                <h1 class="text-6xl font-extrabold text-slate-900 leading-tight tracking-tighter">
                    Your Personal <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-500">AI Tutor</span> Is Here.
                </h1>
                
                <p class="text-xl text-slate-500 max-w-lg leading-relaxed font-medium">
                    Analyze topics, generate interactive quizzes, and track your progress with the smartest LMS on the market.
                </p>

                <div class="flex items-center space-x-6">
                    <div class="flex -space-x-3">
                        @for($i=1; $i<=4; $i++)
                            <img src="https://i.pravatar.cc/100?img={{$i+10}}" class="w-12 h-12 rounded-full border-4 border-white object-cover shadow-sm">
                        @endfor
                    </div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">Join 500+ Early Adopters</p>
                </div>
            </div>

            <!-- Правая колонка: Форма -->
            <div class="glass-card rounded-[3rem] p-8 md:p-14 relative overflow-hidden transition-all duration-500">
                
                <!-- Переключатель -->
                <div class="flex p-1 bg-slate-100/50 rounded-2xl mb-10 w-fit mx-auto lg:mx-0">
                    <button @click="formState = 'login'" 
                            :class="formState === 'login' ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500'"
                            class="px-8 py-2.5 rounded-xl font-bold transition-all duration-300">
                        Login
                    </button>
                    <button @click="formState = 'register'" 
                            :class="formState === 'register' ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500'"
                            class="px-8 py-2.5 rounded-xl font-bold transition-all duration-300">
                        Register
                    </button>
                </div>

                <!-- Форма Входа -->
                <div x-show="formState === 'login'" x-transition:enter="duration-300 delay-100" x-transition:enter-start="opacity-0 translate-y-4">
                    <h2 class="text-3xl font-black text-slate-900 mb-2">Welcome Back</h2>
                    <p class="text-slate-400 mb-8 font-medium">Ready to continue your education?</p>
                    
                    <form action="{{ route('login') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold uppercase text-slate-400 ml-1">Email</label>
                            <input type="email" name="email" required class="w-full px-5 py-4 rounded-2xl bg-white border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all" placeholder="name@example.com">
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold uppercase text-slate-400 ml-1">Password</label>
                            <input type="password" name="password" required class="w-full px-5 py-4 rounded-2xl bg-white border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all" placeholder="••••••••">
                        </div>
                        <button type="submit" class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-black text-lg shadow-xl shadow-indigo-200 hover:bg-indigo-700 active:scale-[0.98] transition-all">Sign In</button>
                    </form>
                </div>

                <!-- Форма Регистрации -->
                <div x-show="formState === 'register'" x-transition:enter="duration-300 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-cloak>
                    <h2 class="text-3xl font-black text-slate-900 mb-2">New Account</h2>
                    <p class="text-slate-400 mb-8 font-medium">Start your 14-day free trial today.</p>
                    
                    <form action="{{ route('register') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="space-y-1">
                            <label class="text-xs font-bold uppercase text-slate-400 ml-1">Full Name</label>
                            <input type="text" name="name" required class="w-full px-5 py-3.5 rounded-2xl bg-white border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all" placeholder="John Doe">
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold uppercase text-slate-400 ml-1">Email</label>
                            <input type="email" name="email" required class="w-full px-5 py-3.5 rounded-2xl bg-white border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all" placeholder="hello@world.com">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-xs font-bold uppercase text-slate-400 ml-1">Password</label>
                                <input type="password" name="password" required class="w-full px-5 py-3.5 rounded-2xl bg-white border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all" placeholder="••••••••">
                            </div>
                            <div class="space-y-1">
                                <label class="text-xs font-bold uppercase text-slate-400 ml-1">Confirm</label>
                                <input type="password" name="password_confirmation" required class="w-full px-5 py-3.5 rounded-2xl bg-white border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all" placeholder="••••••••">
                            </div>
                        </div>

                        <!-- Вывод ошибок Laravel -->
                        @if ($errors->any())
                            <div class="p-4 bg-red-50 rounded-xl">
                                <ul class="text-xs text-red-500 font-bold">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit" class="w-full py-4 bg-slate-900 text-white rounded-2xl font-black text-lg shadow-xl shadow-slate-200 hover:bg-slate-800 active:scale-[0.98] transition-all">Create Account</button>
                    </form>
                </div>

                <!-- Футер карточки -->
                <p class="mt-8 text-center text-xs text-slate-400 font-bold tracking-widest uppercase">
                    Trusted by developers worldwide
                </p>
            </div>
        </div>
    </div>

</body>
</html>