<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\TestController::class, 'home_test'])->name('home_test')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test')->middleware('auth');
Route::get('/test/monitoring', [App\Http\Controllers\TestController::class, 'monitoring'])->name('monitoring')->middleware('auth');
Route::get('/test/show/{id}', [App\Http\Controllers\QuestionController::class, 'index'])->name('test_item')->middleware('auth');
Route::get('/test/create', [App\Http\Controllers\TestController::class, 'create'])->name('test_create')->middleware('auth');
Route::post('/test/store', [App\Http\Controllers\TestController::class, 'store'])->name('test_store')->middleware('auth');

Route::get('/questions/item/{id}', [App\Http\Controllers\QuestionController::class, 'index'])->name('questions_item')->middleware('auth');
Route::get('/questions/create/{id}', [App\Http\Controllers\QuestionController::class, 'create'])->name('question_create')->middleware('auth');
Route::post('/questions/create/', [App\Http\Controllers\QuestionController::class, 'store'])->name('question_store')->middleware('auth');
Route::get('/questions/answers/create/', [App\Http\Controllers\QuestionController::class, 'answer_create'])->name('answer_create')->middleware('auth');

Route::get('send-mail', [App\Http\Controllers\MailController::class, 'sendMail'])->name('send.mail')->middleware('auth');
