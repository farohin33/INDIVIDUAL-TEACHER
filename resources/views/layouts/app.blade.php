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
   

      

      
    

    <main class="flex-1 overflow-y-auto relative bg-[#f8fafc]">
        <div class="fixed top-0 right-0 -z-10 w-[500px] h-[500px] bg-indigo-100/50 blur-[120px] rounded-full translate-x-1/2 -translate-y-1/2"></div>
        <div class="fixed bottom-0 left-0 -z-10 w-[400px] h-[400px] bg-violet-100/40 blur-[100px] rounded-full -translate-x-1/2 translate-y-1/2"></div>

        <div class="p-10 max-w-6xl mx-auto">
            @yield('content')
        </div>
    </main>



</body>
</html>