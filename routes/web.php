<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::route('index');
});


Route::get('/create-author', [AuthorController::class, 'create'])->name('author.create');

Route::post('/store-author', [AuthorController::class, 'store'])->name('author.store');


Route::get('/create-book', [BookController::class, 'create'])->name('book.create');

Route::post('/store-book', [BookController::class, 'store'])->name('book.store');


Route::get('/index', [BookController::class, 'index'])->name('index');
