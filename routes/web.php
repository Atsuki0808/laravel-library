<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){
    // Route::get('/', [PostController::class, 'index'])->name('index');
 
     //Book Group
     Route::group(['prefix' => 'book', 'as' => 'book.'],function(){
         Route::get('/', [BookController::class, 'index'])->name('index');
         Route::get('/create', [BookController::class, 'create'])->name('create');
         Route::get('/{id}/show', [BookController::class, 'show'])->name('show');
         Route::get('/{id}/edit', [BookController::class, 'edit'])->name('edit');
         Route::post('/store', [BookController::class, 'store'])->name('store');
         Route::patch('/{id}/update', [BookController::class, 'update'])->name('update');
         Route::delete('/{id}/destroy', [BookController::class, 'destroy'])->name('destroy');
         
     });
 
     Route::group(['prefix' => 'author', 'as' => 'author.'],function(){
         Route::get('/', [AuthorController::class, 'index'])->name('index');
         Route::get('/create', [AuthorController::class, 'create'])->name('create');
         Route::post('/store', [AuthorController::class, 'store'])->name('store');
         Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('edit');
         Route::patch('/{id}/update', [AuthorController::class, 'update'])->name('update');
         Route::delete('/{id}/destroy', [AuthorController::class, 'destroy'])->name('destroy');
         
     });
 
 });
