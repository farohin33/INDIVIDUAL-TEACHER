<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
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

/*
|--------------------------------------------------------------------------
| Submit Test
|--------------------------------------------------------------------------
*/

Route::post('/test/submit',
    [AnswerController::class,'submit']
)->middleware('auth');


/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';