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
        return $this->postViews(["category"=> $category]);
    }

    public function postViews(array $filters)
    {
        return view('posts.index', [
            'posts' => Post::filters( $filters )->latest()->paginate(15),
        ]);
    }
}
