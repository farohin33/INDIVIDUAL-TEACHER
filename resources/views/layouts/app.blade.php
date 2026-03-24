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
<div class="w-64 bg-indigo-700 text-white overflow-y-auto">

<div class="p-6 text-2xl font-bold">
AI Teacher
</div>

<div class="p-4">

<input type="text"
placeholder="Search topic..."
class="w-full p-2 rounded text-black">

</div>

<nav>

@foreach(App\Models\Subject::all() as $subject)

<a href="/subjects/{{$subject->id}}"

class="block px-6 py-2 hover:bg-indigo-600">

{{$subject->name}}

</a>

@endforeach

</nav>

</div>

<!-- CONTENT -->

<div class="flex-1 p-10 overflow-y-auto">

@yield('content')

</div>

</div>

</body>
</html>