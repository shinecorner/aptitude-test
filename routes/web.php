<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/question/list', [QuestionController::class, 'list'])->name('question.list');
Route::get('/question/insert', [QuestionController::class, 'insert'])->name('question.insert');
Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');
Route::get('/question/edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
Route::put('/question/update/{id}', [QuestionController::class, 'update'])->name('question.update');
Route::delete('/question/delete/{id}', [QuestionController::class, 'delete'])->name('question.delete');

