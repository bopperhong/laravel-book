<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['role:seller']], function () {
    Route::get('/books/create', [BookController::class, 'create'])
    ->name('books.create');
    Route::post('/books/create', [BookController::class, 'store'])
    ->name('books.store');
});

Route::group(['middleware' => ['role:admin']], function(){
    Route::get('/users', [AdminController::class, 'index'])
    ->name('users.index');
    Route::get('/users/create', [AdminController::class, 'create'])
    ->name('users.create');
    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])
    ->name('users.edit');
    Route::post('/users/{id}/edit', [AdminController::class, 'update'])
    ->name('users.update');
    Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit');
    Route::post('/categories/{id}/edit', [CategoryController::class, 'update'])
    ->name('categories.update');
});

Route::group(['middleware' => ['role:user|seller']], function() {
    Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');
});

require __DIR__.'/auth.php';
