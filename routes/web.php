<?php

use Illuminate\Support\Facades\Route;
use App\Models\Subject;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AnswerController;


/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    // Получаем все предметы из базы данных
    $subjects = Subject::all(); 
    
    // Передаем их в файл resources/views/dashboard.blade.php
    return view('dashboard', compact('subjects'));
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Subjects
|--------------------------------------------------------------------------
*/

Route::resource('subjects', SubjectController::class)
->middleware('auth');


/*
|--------------------------------------------------------------------------
| Topics
|--------------------------------------------------------------------------
*/

Route::resource('topics', TopicController::class)
->middleware('auth');


/*
|--------------------------------------------------------------------------
| Lesson
|--------------------------------------------------------------------------
*/

// Генерация
Route::get('/generate/{topic}', [LessonController::class, 'generateFromTopic'])->name('lesson.generate');

// Просмотр (добавьте ->name если его нет)
Route::get('/lesson/{lesson}', [LessonController::class, 'show'])->name('lesson.show');

/*
|--------------------------------------------------------------------------
| Test
|--------------------------------------------------------------------------
*/

Route::get('/lesson/{lesson}/test',
    [TestController::class,'start']
)->middleware('auth');
Route::get('/topics/{id}', [TopicController::class, 'show'])->name('topics.show');

// Маршруты для тестов (обязательно добавь store)
Route::post('/tests/store', [TestController::class, 'store'])->name('tests.store');
Route::get('/tests/{id}', [TestController::class, 'show'])->name('tests.show');

/*
|--------------------------------------------------------------------------
| Submit Test
|--------------------------------------------------------------------------
*/

Route::get('/lesson/{lesson}/test', [LessonController::class, 'generateTest'])->name('lesson.test');

Route::post('/topics/{topic}/generate-content', [App\Http\Controllers\TopicController::class, 'generateContent'])
    ->name('topics.generate_content');
/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';