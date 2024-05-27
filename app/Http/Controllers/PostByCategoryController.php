<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostByCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {
        return view('posts.index', [
            'posts' => Post::query()->where('category_id', $category->id)->latest()->paginate(15)
        ]);
    }
}
