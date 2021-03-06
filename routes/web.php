<?php

use App\Http\Controllers\{
    PostController,
    UsuarioController
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){

    Route::any('/posts/search',[PostController::class, 'search'])->name('posts.search');
    Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
    Route::put('/posts/{id}',[PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/edit/{id}',[PostController::class, 'edit'])->name('posts.edit');
    Route::delete('/posts/{id}',[PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{id}',[PostController::class, 'show'])->name('posts.show');
    Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
    Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
    Route::get('/logout',[PostController::class, 'logout'])->name('posts.logout');

    Route::get('/usuario',[UsuarioController::class, 'index'])->name('usuario.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
