@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 py-10 px-4">
    <div class="max-w-3xl mx-auto">
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-200">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8">
                <h1 class="text-3xl font-bold text-white tracking-tight italic">
                    {{ $lesson->title }}
                </h1>
                <p class="text-blue-100 mt-2 text-sm uppercase tracking-widest">AI-Generated Study Note</p>
            </div>

            <div class="p-8">
                <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed font-medium">
                    {!! nl2br(e($lesson->content)) !!}
                </div>

                <div class="mt-10 pt-6 border-t border-slate-100 flex justify-between items-center">
                    <a href="{{ url()->previous() }}" class="text-slate-500 hover:text-indigo-600 font-semibold transition">
                        ← Back to Topics
                    </a>
                    
                    <button onclick="window.print()" class="bg-slate-100 text-slate-700 px-5 py-2 rounded-xl hover:bg-slate-200 transition flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2z"></path></svg>
                        Save as PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection