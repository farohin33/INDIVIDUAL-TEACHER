@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto" x-data="quizApp()">
    <!-- Заголовок теста -->
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-slate-900 leading-tight">Smart Quiz</h1>
            <p class="text-slate-500 font-medium">{{ $test->topic->title }}</p>
        </div>
        <div class="text-right">
            <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Progress</span>
            <div class="text-2xl font-black text-indigo-600" x-text="Math.round((step / totalSteps) * 100) + '%'"></div>
        </div>
    </div>

    <!-- Основной контейнер теста -->
    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden relative">
        
        <!-- Полоса прогресса -->
        <div class="absolute top-0 left-0 h-1.5 bg-indigo-500 transition-all duration-500" :style="'width: ' + (step / totalSteps * 100) + '%'"></div>

        <div class="p-8 md:p-12">
            @php
                $questions = json_decode($test->questions_data, true);
            @endphp

            @if(!$questions || !is_array($questions))
                <div class="text-center py-12">
                    <div class="text-5xl mb-4">⚠️</div>
                    <h2 class="text-xl font-bold text-slate-800">Quiz data is corrupted</h2>
                    <p class="text-slate-500 mb-6">The AI generated an invalid response. Please try generating a new test.</p>
                    <a href="{{ url()->previous() }}" class="text-indigo-600 font-bold hover:underline">← Go Back</a>
                </div>
            @else
                <!-- Экран вопросов -->
                <template x-if="!finished">
                    <div>
                        @foreach($questions as $index => $q)
                            <div x-show="step == {{ $index + 1 }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0">
                                <h3 class="text-xl md:text-2xl font-bold text-slate-800 mb-8">
                                    <span class="text-indigo-500 mr-2">Q{{ $index + 1 }}.</span> {{ $q['question'] }}
                                </h3>

                                <div class="grid gap-4">
                                    @foreach($q['options'] as $oIndex => $option)
                                        <button @click="selectOption({{ $index }}, {{ $oIndex }}, {{ $q['correct_answer'] }})"
                                                class="w-full text-left p-5 rounded-2xl border-2 transition-all duration-200 font-semibold flex justify-between items-center group"
                                                :class="userAnswers[{{ $index }}] === {{ $oIndex }} ? 'border-indigo-600 bg-indigo-50 text-indigo-700' : 'border-slate-100 hover:border-indigo-200 hover:bg-slate-50 text-slate-600'">
                                            <span>{{ $option }}</span>
                                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-colors"
                                                 :class="userAnswers[{{ $index }}] === {{ $oIndex }} ? 'border-indigo-600 bg-indigo-600' : 'border-slate-200'">
                                                <div class="w-2 h-2 rounded-full bg-white" x-show="userAnswers[{{ $index }}] === {{ $oIndex }}"></div>
                                            </div>
                                        </button>
                                    @endforeach
                                </div>

                                <div class="mt-10 flex justify-between items-center">
                                    <button @click="step--" x-show="step > 1" class="text-slate-400 font-bold hover:text-slate-600 transition-colors">Previous</button>
                                    <div x-show="step == 1"></div>
                                    
                                    <button @click="nextStep()" 
                                            :disabled="userAnswers[{{ $index }}] === null"
                                            class="px-8 py-3 bg-slate-900 text-white rounded-xl font-bold disabled:opacity-30 disabled:cursor-not-allowed hover:bg-indigo-600 transition-all shadow-lg shadow-slate-200">
                                        <span x-text="step === totalSteps ? 'Finish Quiz' : 'Next Question'"></span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </template>

                <!-- Экран результатов -->
                <template x-if="finished">
                    <div class="text-center py-6 animate-in zoom-in duration-500">
                        <div class="w-24 h-24 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl shadow-inner">
                            🏆
                        </div>
                        <h2 class="text-3xl font-black text-slate-900 mb-2">Quiz Completed!</h2>
                        <p class="text-slate-500 mb-8 font-medium text-lg">You scored <span class="text-indigo-600 font-black" x-text="score"></span> out of <span class="font-bold" x-text="totalSteps"></span></p>
                        
                        <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100 mb-8 inline-block">
                            <p class="text-sm text-slate-400 uppercase tracking-widest font-bold mb-1">Success Rate</p>
                            <div class="text-4xl font-black text-slate-800" x-text="Math.round((score / totalSteps) * 100) + '%'"></div>
                        </div>

                        <div class="flex flex-col sm:flex-row justify-center gap-4 mt-4">
                            <a href="{{ route('topics.show', $test->topic_id) }}" class="px-8 py-4 bg-slate-100 text-slate-700 rounded-2xl font-bold hover:bg-slate-200 transition-all">Review Lesson</a>
                            <button @click="window.location.reload()" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all">Try Again</button>
                        </div>
                    </div>
                </template>
            @endif
        </div>
    </div>
</div>

<script>
    function quizApp() {
        return {
            step: 1,
            totalSteps: {{ count($questions ?? []) }},
            userAnswers: Array({{ count($questions ?? []) }}).fill(null),
            correctAnswers: [], // Здесь можно хранить правильные индексы
            score: 0,
            finished: false,

            selectOption(qIndex, oIndex, correct) {
                this.userAnswers[qIndex] = oIndex;
                // Временное хранение для подсчета (в реальном проекте лучше проверять на бэкенде)
                this.correctAnswers[qIndex] = correct;
            },

            nextStep() {
                if (this.step < this.totalSteps) {
                    this.step++;
                } else {
                    this.calculateScore();
                    this.finished = true;
                }
            },

            calculateScore() {
                this.score = 0;
                this.userAnswers.forEach((ans, i) => {
                    if (ans === this.correctAnswers[i]) this.score++;
                });
            }
        }
    }
</script>
@endsection