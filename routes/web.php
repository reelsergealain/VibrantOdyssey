<?php

use App\Http\Controllers\PostByCategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

$slug = '[0-9a-z\-]+';
$id = '[0-9]+';

# Post Controller
Route::get('/',[PostController::class, 'index'])->name('posts.index');
Route::get('/article/{slug}-{post}',[PostController::class, 'show'])->name('posts.show')->where([
    'slug' => $slug,
    'post' => $id,
]);

// Route __invoke pour voir les Categorys
Route::get('/categorie/{category}', PostByCategoryController::class)->name('postByCategory');
