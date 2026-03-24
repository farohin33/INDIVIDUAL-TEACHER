@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-indigo-700">Quiz: {{ $lesson->title }}</h1>

    @php 
        $questions = json_decode($test->questions_data, true); 
    @endphp

    @if(is_array($questions) && count($questions) > 0)
        <div class="space-y-6">
            @foreach($questions as $index => $q)
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                    <p class="font-bold text-lg mb-4">{{ $index + 1 }}. {{ $q['question'] ?? 'No question text' }}</p>
                    <div class="grid gap-2">
                        @foreach($q['options'] as $option)
                            <button onclick="check(this, '{{$option}}', '{{$q['answer']}}')" 
                                    class="text-left p-3 border rounded-lg hover:bg-gray-50 transition">
                                {{$option}}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="p-10 text-center bg-red-50 rounded-2xl border border-red-200">
            <p class="text-red-600 font-bold text-xl">Generation Failed</p>
            <p class="text-gray-500">AI was too slow or returned wrong format.</p>
            <a href="{{ url()->previous() }}" class="mt-4 inline-block text-indigo-600 underline">Try again</a>
        </div>
    @endif
</div>

<script>
function check(btn, selected, correct) {
    if(selected === correct) {
        btn.style.backgroundColor = '#dcfce7';
        btn.style.borderColor = '#22c55e';
        alert('Correct! 🎉');
    } else {
        btn.style.backgroundColor = '#fee2e2';
        btn.style.borderColor = '#ef4444';
        alert('Wrong. Correct answer was: ' + correct);
    }
}
</script>
@endsection