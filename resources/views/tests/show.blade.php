@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-8 text-center">Knowledge Check</h1>

    @php $questions = json_decode($test->questions_data, true); @endphp

    @if(is_array($questions) && count($questions) > 0)
        <div class="space-y-6">
            @foreach($questions as $index => $q)
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100" id="q-{{ $index }}">
                    <p class="font-bold text-lg mb-4">{{ $index + 1 }}. {{ $q['question'] }}</p>
                    <div class="grid gap-2">
                        @foreach($q['options'] as $opt)
                            <button onclick="check(this, '{{addslashes($opt)}}', '{{addslashes($q['answer'])}}', {{$index}})"
                                    class="opt-btn text-left p-4 rounded-2xl border-2 border-gray-50 hover:border-indigo-300 transition-all">
                                {{ $opt }}
                            </button>
                        @endforeach
                    </div>
                    <div id="msg-{{ $index }}" class="mt-4 hidden p-4 rounded-xl font-bold"></div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center p-10 bg-gray-50 rounded-3xl">
            <p class="text-gray-500">Quiz data is missing or corrupted.</p>
            <a href="{{ url()->previous() }}" class="text-indigo-600 font-bold underline">Try Again</a>
        </div>
    @endif
</div>

<script>
function check(btn, selected, correct, idx) {
    const parent = document.getElementById('q-' + idx);
    const msg = document.getElementById('msg-' + idx);
    const buttons = parent.querySelectorAll('.opt-btn');

    buttons.forEach(b => b.disabled = true); // Блокируем остальные кнопки

    if (selected === correct) {
        btn.classList.add('bg-green-500', 'text-white', 'border-green-500');
        msg.innerText = "Correct! ✨";
        msg.className = "mt-4 p-4 rounded-xl bg-green-50 text-green-700 block";
    } else {
        btn.classList.add('bg-red-500', 'text-white', 'border-red-500');
        msg.innerText = "Wrong. The correct answer was: " + correct;
        msg.className = "mt-4 p-4 rounded-xl bg-red-50 text-red-700 block";
    }
}
</script>
@endsection