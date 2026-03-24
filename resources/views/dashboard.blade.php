<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>AI Teacher</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-gray-100">

<div class="flex h-screen">

<!-- SIDEBAR -->

<div class="w-64 bg-indigo-700 text-white">

<div class="p-6 text-2xl font-bold">
AI Teacher
</div>

<nav class="mt-8">

<a href="/dashboard" class="block px-6 py-3 hover:bg-indigo-600">
Dashboard
</a>

<a href="/subjects" class="block px-6 py-3 hover:bg-indigo-600">
Subjects
</a>

<a href="/topics" class="block px-6 py-3 hover:bg-indigo-600">
Topics
</a>

</nav>

</div>

<!-- CONTENT -->

<div class="flex-1 p-10 overflow-y-auto">

@yield('content')

</div>

</div>

</body>
</html>