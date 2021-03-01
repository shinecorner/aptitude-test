<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CkeditorController;

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
Route::prefix('question')->name('question.')->group(function () {
    Route::get('list', [QuestionController::class, 'list'])->name('list');
    Route::get('insert', [QuestionController::class, 'insert'])->name('insert');
    Route::post('store', [QuestionController::class, 'store'])->name('store');
    Route::get('edit/{question}', [QuestionController::class, 'edit'])->name('edit');
    Route::put('update/{question}', [QuestionController::class, 'update'])->name('update');
    Route::delete('delete/{question}', [QuestionController::class, 'delete'])->name('delete');
});


Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
