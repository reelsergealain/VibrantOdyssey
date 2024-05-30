<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostByCategoryController;
use App\Http\Controllers\PostByTagController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

$slug = '[0-9a-z\-]+';
$id = '[0-9]+';

# Post Controller
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/article/{slug}-{post}', [PostController::class, 'show'])->name('posts.show')->where([
    'slug' => $slug,
    'post' => $id,
]);

// Route __invoke pour voir les Categorys
Route::get('/categorie/{category}', PostByCategoryController::class)->name('postByCategory');

// Route __invoke pour voir les Tags
Route::get('/etiquette/{tag}', PostByTagController::class)->name('postByTag');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [RegisterController::class, 'showLoginForm'])->name('login');
Route::post('/login', [RegisterController::class, 'login']);

Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('{post}/comment', [PostController::class, 'comment'])->name('posts.comment')->where([
    'slug' => $slug,
    'post' => $id,
]);


Route::get('/logout', function () {
    return to_route('posts.index');
});
